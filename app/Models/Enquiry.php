<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{

    use SoftDeletes;

    protected $guarded = [];
    //
    // public function packages(){
    //     return $this->hasMany(Package::class);
    // }

     public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
