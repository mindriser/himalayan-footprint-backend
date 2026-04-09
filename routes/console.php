<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('test-cmd', function () {
    // echo "test command";
    // $a = $b + $c;
    // Log::info('test command');
});


// Schedule::command('queue:work --stop-when-empty')
//     ->everyMinute()
//     ->withoutOverlapping();
