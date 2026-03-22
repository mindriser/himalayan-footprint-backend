<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(BookingMember::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }
}
