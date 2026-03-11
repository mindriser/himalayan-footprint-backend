<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Traits\ProcessesItineraryImages;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{

    use ProcessesItineraryImages;

    /**
     * Display a listing of the resource.
     */
    public function packageList()
    {
        $packages = Package::active()->select('id', 'title', "slug", 'category_id')->with(['category:id,name,slug'])->get()
            ->makeHidden(['total_reviews', 'rating']); // hide appends here;
        return response()->json(["data" => $packages]);
    }

    public function getPopularPackages()
    {
        $packages = Package::active()
            ->where("is_popular", true)
            ->select('id', 'title', "slug", 'category_id')->with(['category:id,name,slug'])
            ->limit(7)
            ->get()
            ->makeHidden(['total_reviews', 'rating']); // hide appends here;
        return response()->json(["data" => $packages]);
    }

    public function index()
    {
        // fetch packages with their associalted variations
        // send son resonse

        $packages = Package::active()
            ->with([
                'category:id,name,slug',
                'topImages:id,imageable_id,imageable_type,image_url,is_primary'
            ])
            ->get()
            ->map(function ($package) {
                $package->description = Str::limit(
                    strip_tags($package->description),
                    200
                );
                $package->setRelation('images', $package->topImages);
                unset($package->topImages);
                return $package;
            });

        return response()->json(["data" => $packages]);


        // $packages = Package::active()->with(['category', "images"])->get();
        // return response()->json(["data" => $packages]);
        // return response()->json(["data" => [1,2,3]]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // $package = Package::active()->with(['images', "itineraries", "faqs", "itineraries.images", "fixedDepartures"])
        $package = Package::active()
            ->with([
                'category',
                'images',
                // 'itineraries',
                // 'itineraries.images',
                'itineraries' => function ($query) {
                    $query->with(['images:id,image_url,imageable_id,imageable_type']); // worsk
                    // $query->with(['images:id,image_url']); // doesnot work
                },

                'faqs',
                'costInclusions',
                'costExclusions',
                // 'reviews.images', // <-- eager load reviews AND their images
                // // 'reviews' => function ($query) {
                // //     $query->with(['images:id,image_url']);
                // // },
                'reviews' => function ($query) {
                    $query->where('status', 'approved');
                    $query->with(['images:id,image_url,imageable_id,imageable_type']); // worsk
                    // $query->with(['images:id,image_url']); // doesnot work
                },
                'relatedPackages' => function ($query) {
                    $query->with(['category', 'images:id,image_url,imageable_id,imageable_type,is_primary']); // worsk ?//FIXME: no need to send all the images
                    // $query->with(['images:id,image_url']); // doesnot work
                },
            ])
            // ->with(['images', "itineraries", "faqs", "itineraries.images", "costInclusions", "costExclusions", "reviews.images", "relatedPackages"])
            ->where('slug', $slug)
            ->firstOrFail(); // throws 404 if not found

        $package->departures = $package->fixedDepartures->take(2);
        unset($package->fixedDepartures); // optional

        return response()->json(['data' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }

    // routes/api.php

    // PackageController.php
    public function downloadItineraryold(string $slug)
    {
        $package = Package::where('slug', $slug)
            ->with(['itineraries' => fn($q) => $q->orderBy('day_number')])
            ->firstOrFail();

        $pdf = Pdf::loadView('itinerary-pdf', [
            'package'     => $package,
            'itineraries' => $package->itineraries,
        ])->setPaper('a4');

        return $pdf->download($package->slug . '-itinerary.pdf');
    }

    public function downloadItinerary(string $slug)
    {
        // dd(12);
        $package = Package::where('slug', $slug)
            ->with([
                'itineraries' => fn($q) => $q->orderBy('day_number'),
                'itineraries.images',  // eager load polymorphic images
            ])
            ->firstOrFail();


        $itineraries = $this->processItineraryImages($package->itineraries);

        $pdf = Pdf::loadView('itinerary-pdf', [
            'package'     => $package,           // $booking is absent — view handles it
            'itineraries' => $itineraries
        ])->setPaper('a4');

        // return view('itinerary-pdf', [
        //     'package'     => $package,           // $booking is absent — view handles it
        //     'itineraries' => $package->itineraries,
        // ]);

        return $pdf->download($package->slug . '-itinerary.pdf');
    }
}
