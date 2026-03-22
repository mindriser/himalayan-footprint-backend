<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;

class Departure extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function delete(): bool
    {
        $hasActiveBookings = $this->bookings()
            ->whereNull('deleted_at')
            ->exists();


        if ($hasActiveBookings) {
            Notification::make()
                ->title('Cannot delete departure')
                ->body('This departure has active bookings.  Delete all related bookings first.')
                ->danger()
                ->persistent()
                ->send();

            throw new Halt();

        }

        return parent::delete(); 
    }


    public function scopeFixed($query)
    {
        return $query->where('type', "fixed");
    }


    // ─── Scopes ──────────────────────────────────────────────────

    public function scopeCustom($query)
    {
        return $query->where('type', 'custom');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }



    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function customDetail()
    {
        return $this->hasOne(CustomDepartureDetail::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
