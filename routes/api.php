<?php

use App\Filament\Resources\Subscriptions\SubscriptionResource;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DepartureController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/bookings', [BookingController::class, 'store']);
Route::post('/reviews', [ReviewController::class, 'store']);
// Route::post('/departure-custom-request', [ReviewController::class, 'store']);
Route::post('/custom-departures', [DepartureController::class, 'requestCustomDeparture']);

Route::post('/enquiries', [EnquiryController::class, 'store']);
Route::post('/subscriptions', [SubscriptionController::class, 'store']);

Route::patch('/blogs/{blog:slug}/view-count', [BlogController::class, 'incrementView']);




// Route::post('/nav-links', [BookingController::class, 'store']);

// Route::post('/nav-links', function () {
//     return response()->json(["a" => 1]);
// });
