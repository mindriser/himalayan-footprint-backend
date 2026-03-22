<?php

namespace App\Mail;

use App\Models\Booking;
use App\Traits\ProcessesItineraryImages;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, ProcessesItineraryImages;

    public function __construct(public Booking $booking)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmation - ' . $this->booking->booking_reference,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-confirmation',
            with: ['booking' => $this->booking],
        );
    }

    public function attachments(): array
    {
        // Load itineraries via the booking's package
        $itineraries = $this->booking->departure->package->itineraries()
            ->with('images')
            ->orderBy('day_number')
            ->get();

        $itineraries = $this->processItineraryImages($itineraries);

        $pdf = Pdf::loadView('itinerary-pdf', [
            'booking'     => $this->booking,
            'package' => $this->booking->departure->package,
            'itineraries' => $itineraries,
        ])->setPaper('a4');

        return [
            \Illuminate\Mail\Mailables\Attachment::fromData(
                fn() => $pdf->output(),
                $this->booking->package_name . 'itinerary-' . $this->booking->booking_reference . '.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
