<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variant extends Model
{
    protected $guarded = [];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    // public function images(): HasMany
    // {
    //     return $this->hasMany(VariantImage::class);
    // }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
