<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['review_date'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
