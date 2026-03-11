<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramPost extends Model
{
    protected $guarded = [];

    // Polymorphic relation to Image
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
