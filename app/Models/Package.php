<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded  = [];

    // protected static function booted()
    // {
    //     static::addGlobalScope('active', function (Builder $builder) {
    //         $builder->where('is_active', true);
    //     });
    // }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function variants()
    // {
    //     return $this->hasMany(Variant::class);
    // }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function primaryImage()
    {
        return $this->images()->where('is_primary', true);
    }

    public function recommendations()
    {
        return $this->belongsToMany(
            Package::class,
            'package_recommendations',
            'package_id',
            'recommended_package_id'
        );
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function departures()
    {
        return $this->hasMany(Departure::class);
    }

    // helper to fetch only fixed departures
    public function fixedDepartures()
    {
        return $this->hasMany(Departure::class)->where('type', 'fixed');
    }

    // helper to fetch only custom departures
    public function customDepartures()
    {
        return $this->hasMany(Departure::class)->where('type', 'custom');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function costClauses()
    {
        return $this->hasMany(PackageCostClause::class);
    }

    public function costInclusions()
    {
        return $this->costClauses()
            ->where('type', 'inclusion')
            ->orderBy('sort_order');
    }

    public function costExclusions()
    {
        return $this->costClauses()
            ->where('type', 'exclusion')
            ->orderBy('sort_order');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
