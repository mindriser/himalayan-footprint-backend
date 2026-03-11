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
}
