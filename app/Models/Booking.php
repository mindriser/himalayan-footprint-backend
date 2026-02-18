<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(BookingMember::class);
    }
}
