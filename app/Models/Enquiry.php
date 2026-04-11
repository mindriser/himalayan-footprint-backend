<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Enquiry extends Model
{

    use SoftDeletes;
    use LogsActivity;

    protected $guarded = [];
    //
    // public function packages(){
    //     return $this->hasMany(Package::class);
    // }

     public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn(string $eventName) => "Enquiry was {$eventName}");
    }
}
