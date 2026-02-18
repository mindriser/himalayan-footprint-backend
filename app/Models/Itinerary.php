<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    //
    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
