<?php

namespace App\Observers;

use App\Models\Booking;

class BookingObserver
{
    /**
     * Handle the Booking "created" event.
     */
    public function created(Booking $booking): void
    {
        //
    }


    /**
     * Handle the Booking "updated" event.
     */
    public function updated(Booking $booking): void
    {
        // Only act when booking_status changes TO 'confirmed'
        if (
            $booking->wasChanged('booking_status') &&
            $booking->booking_status === 'confirmed' &&
            $booking->getOriginal('booking_status') !== 'confirmed'
        ) {
            $departure = $booking->departure;

            if ($departure) {
                $departure->increment('current_occupancy', $booking->num_travelers);
            }

            $booking->updateQuietly(['confirmed_at' => now()]);
            $booking->updateQuietly(['cancelled_at' => null]);
        }

        // Optional: restore occupancy if a confirmed booking is cancelled/reverted
        if (
            $booking->wasChanged('booking_status') &&
            $booking->getOriginal('booking_status') === 'confirmed' &&
            in_array($booking->booking_status, ['cancelled', 'pending', 'expired'])
        ) {
            $departure = $booking->departure;

            if ($departure) {
                $departure->decrement('current_occupancy', $booking->num_travelers);
            }
        }

        // Set cancelled_at when status changes TO 'cancelled'
        if (
            $booking->wasChanged('booking_status') &&
            $booking->booking_status === 'cancelled' &&
            $booking->getOriginal('booking_status') !== 'cancelled'
        ) {
            $booking->updateQuietly(['cancelled_at' => now()]);
            $booking->updateQuietly(['confirmed_at' => null]);
        }

        // Clear dates if reverted to pending only
        if ($booking->wasChanged('booking_status') && $booking->booking_status === 'pending') {
            $booking->updateQuietly([
                'confirmed_at' => null,
                'cancelled_at' => null,
            ]);
        }
    }

    /**
     * Handle the Booking "deleted" event.
     */
    public function deleted(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     */
    public function restored(Booking $booking): void
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     */
    public function forceDeleted(Booking $booking): void
    {
        //
    }
}
