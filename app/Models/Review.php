<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
        use SoftDeletes;

    //
    protected $guarded = [];

    protected $dates = ['review_date'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
