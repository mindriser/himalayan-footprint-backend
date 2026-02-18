<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    protected $guarded = [];

    public function scopeFixed($query)
    {
        return $query->where('type', "fixed");
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
