<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Models\Booking;
use App\Models\Departure;
use App\Traits\ProcessesItineraryImages;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingController extends Controller
{

    use ProcessesItineraryImages;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeOld(Request $request)
    {
        $validated = $request->validate([
            'departure_id'    => 'nullable|exists:departures,id',
            'num_travelers'   => 'required|integer|min:1',
            'special_request' => 'nullable|string|max:1000',
        ]);

        // Create the booking
        $booking = Booking::create($validated);
        dd($booking);

        // Load relationships needed for the mail & PDF
        $booking->load('departure');

        // Send confirmation email with itinerary PDF attached
        Mail::to($booking->email)->send(new BookingConfirmationMail($booking));

        // --- OR queue it so the API responds instantly ---
        // Mail::to($booking->email)->queue(new BookingConfirmationMail($booking));

        return response()->json([
            'message' => 'Booking confirmed. A confirmation email has been sent.',
            'booking' => $booking,
        ], 201);
    }


    public function storeTwo(Request $request)
    {

        // $validated = $request->validate([
        //     'departure_id'    => 'required|exists:departures,id',
        //     'num_travelers'   => 'required|integer|min:1',
        //     'special_request' => 'nullable|string|max:1000',
        //     // Members validation
        //     'members' => 'required|array|min:1',
        //     'members.*.full_name' => 'required|string|max:255',
        //     'members.*.email' => 'nullable|email',
        //     'members.*.phone' => 'nullable|string|max:20',
        //     'members.*.gender' => 'nullable|in:male,female,other',
        //     'members.*.dob' => 'nullable|date',
        //     'members.*.nationality' => 'nullable|string|max:100',
        //     'members.*.passport_number' => 'nullable|string|max:50',
        //     'members.*.is_lead_member' => 'boolean',
        // ]);

        $rules = [
            'members' => 'required|array|min:1',
        ];

        dd($request->members); // why is validation not throwing error prior to this?
        foreach ($request->members as $index => $member) {

            $rules["members.$index.full_name"] = 'required|string|max:255';
            $rules["members.$index.is_lead_member"] = 'required|boolean';

            if (!empty($member['is_lead_member'])) {
                $rules["members.$index.email"] = 'required|email';
                $rules["members.$index.phone"] = 'required|string|max:20';
                $rules["members.$index.gender"] = 'required|in:male,female,other';
                $rules["members.$index.dob"] = 'required|date';
                $rules["members.$index.nationality"] = 'required|string|max:100';
                $rules["members.$index.passport_number"] = 'required|string|max:50';
            } else {
                $rules["members.$index.email"] = 'nullable|email';
                $rules["members.$index.phone"] = 'nullable|string|max:20';
                $rules["members.$index.gender"] = 'nullable|in:male,female,other';
                $rules["members.$index.dob"] = 'nullable|date';
                $rules["members.$index.nationality"] = 'nullable|string|max:100';
                $rules["members.$index.passport_number"] = 'nullable|string|max:50';
            }
        }

        $request->validate($rules);


        if ($request->num_travelers != count($request->members)) {

            return response()->json([
                'members' => 'Number of members must match number of travelers.'
            ]);
        }

        $leadCount = collect($request->members)
            ->where('is_lead_member', true)
            ->count();

        if ($leadCount !== 1) {
            return response()->json([
                'members' => 'Exactly one lead member is required.'
            ]);
        }


        // 1. Load departure with its package/variant for snapshots
        $departure = Departure::with('package')->findOrFail($request['departure_id']);

        $package = $departure->package;         // has name

        $numTravelers = $request['num_travelers'];
        $basePrice    = $package->new_group_price;
        $totalPrice   = $basePrice * $numTravelers;

        // 2. Generate booking reference
        // Format: PKG-YYYY-MM-NNNN  e.g. EVEREST-2025-03-0042
        $slug      = strtoupper(Str::slug($package->name, ''));
        $yearMonth = now()->format('Y-m');
        $count     = Booking::whereMonth('booked_at', now()->month)
            ->whereYear('booked_at', now()->year)
            ->count() + 1;
        $reference = "{$slug}-{$yearMonth}-" . str_pad($count, 4, '0', STR_PAD_LEFT);

        // 3. Create the booking
        $booking = Booking::create([
            'departure_id'         => $departure->id,

            // Snapshots — preserved even if departure/variant/package is deleted
            'package_name'         => $package->title,
            'departure_start_date' => $departure->start_date,
            'departure_end_date'   => $departure->end_date,
            'base_price'           => $basePrice,
            'total_price'          => $totalPrice,
            // 'currency'             => $package->currency,
            'booking_reference'    => $reference,
            'num_travelers'        => $numTravelers,
            'special_request'      => $validated['special_request'] ?? null,

            'booking_status'       => 'pending',
            'payment_status'       => 'unpaid',
            'booked_at'            => now(),
        ]);

        foreach ($request->members as $member) {
            $booking->members()->create($member);
        }

        $booking->load('departure');

        // 4. Send confirmation email  /// quwue
        Mail::to("dev.sagartmg@gmail.com")->send(new BookingConfirmationMail($booking));

        return response()->json([
            'message' => 'Booking created successfully.',
            'booking' => $booking,
        ], 201);
    }

    public function store(Request $request)
    {
        // ── Step 1: validate the shape of members array first ──────────────────
        $request->validate([
            'departure_id'    => 'required|exists:departures,id',
            'num_travelers'   => 'required|integer|min:1',
            'special_request' => 'nullable|string|max:1000',
            'members'         => 'required|array|min:1',
        ]);


        // ── Step 2: build per-member rules dynamically ──────────────────────────
        $memberRules = [];

        foreach ($request->members as $index => $member) {
            $isLead = !empty($member['is_lead_member']);

            // $memberRules["members.$index.full_name"]       = 'required|string|max:255';
            $memberRules["members.$index.is_lead_member"]  = 'required|boolean';
            $memberRules["members.$index.full_name"]           = ($isLead ? 'required' : 'nullable') . '|string|max:255';
            $memberRules["members.$index.email"]           = ($isLead ? 'required' : 'nullable') . '|email';
            $memberRules["members.$index.phone"]           = ($isLead ? 'nullable' : 'nullable') . '|string|max:20';
            $memberRules["members.$index.gender"]          = ($isLead ? 'nullable' : 'nullable') . '|in:male,female,other';
            $memberRules["members.$index.dob"]             = ($isLead ? 'nullable' : 'nullable') . '|date';
            $memberRules["members.$index.nationality"]     = ($isLead ? 'nullable' : 'nullable') . '|string|max:100';
            $memberRules["members.$index.passport_number"] = ($isLead ? 'nullable' : 'nullable') . '|string|max:50';
        }

        $request->validate($memberRules);

        // ── Step 3: business logic checks ──────────────────────────────────────
        // if ($request->num_travelers !== count($request->members)) {
        //     return response()->json([
        //         'message' => 'Validation failed.',
        //         'errors'  => ['members' => ['Number of members must match number of travelers.']],
        //     ], 422);
        // }

        $leadCount = collect($request->members)->where('is_lead_member', true)->count();

        if ($leadCount !== 1) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors'  => ['members' => ['Exactly one lead member is required.']],
            ], 422);
        }

        // ── Step 4: create booking ──────────────────────────────────────────────
        $departure = Departure::with('package')->findOrFail($request->departure_id);
        $package   = $departure->package;

        $numTravelers = $request->num_travelers;

        // if ($package->min_group_size >= $numTravelers) {
        //     $basePrice    = $package->new_single_price;
        // } else {
        // }

        $basePrice    = $package->new_group_price;
        $totalPrice   = $basePrice * $numTravelers;

        $slug = strtoupper($package->slug);

        $yearMonth = now()->format('y-m');
        $count     = Booking::whereMonth('booked_at', now()->month)
            ->whereYear('booked_at', now()->year)
            ->count() + 1;
        $reference = "{$slug}-{$yearMonth}-" . str_pad($count, 4, '0', STR_PAD_LEFT) . '-' . strtoupper(Str::random(6));

        $booking = Booking::create([
            'departure_id'         => $departure->id,
            'package_name'         => $package->title,
            'departure_start_date' => $departure->start_date,
            'departure_end_date'   => $departure->end_date,
            'min_group_size'          => $package->min_group_size,
            // 'single_person_price'          => $package->new_single_price,
            'group_person_price'          => $package->new_group_price,
            'base_price'           => $basePrice,
            'total_price'          => $totalPrice,
            'booking_reference'    => $reference,
            'num_travelers'        => $numTravelers,
            'special_request'      => $request->special_request,
            'booking_status'       => 'pending',
            'payment_status'       => 'unpaid',
            'booked_at'            => now(),
        ]);

        foreach ($request->members as $member) {
            $booking->members()->create($member);
        }

        $booking->load('departure');

        // Mail::to("dev.sagartmg@gmail.com")->send(new BookingConfirmationMail($booking));

        return response()->json([
            'message' => 'Booking created successfully.',
            'booking' => $booking,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }


    // BookingController.php
    public function downloadItinerary(Booking $booking)
    {
        $itineraries = $booking->departure->package->itineraries()
            ->orderBy('day_number')
            ->get();


        $itineraries = $this->processItineraryImages($itineraries);

        $pdf = Pdf::loadView('itinerary-pdf', compact('booking', 'itineraries'))
            ->setPaper('a4');

        return $pdf->download('itinerary-' . $booking->booking_reference . '.pdf');
    }
}
