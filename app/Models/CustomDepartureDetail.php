<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departure;

class CustomDepartureDetail extends Model
{
    //
    protected $guarded = [];


    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }
}
