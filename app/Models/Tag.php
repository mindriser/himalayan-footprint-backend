<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $guarded = [];


    // public function taggables()
    // {
    //     return $this->morphedByMany(Package::class, 'taggable');
    // }

    public function taggable()
    {
        return $this->morphTo();
    }
}
