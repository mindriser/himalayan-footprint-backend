<?php

use App\Http\Controllers\DepartureController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')
    ->middleware(['api']) // stateless middleware
    ->group(function () {
        Route::get('/packages', [PackageController::class, 'index']);
        Route::get('/packages/{slug}', [PackageController::class, 'show']);
        Route::get('/departures', [DepartureController::class, 'index']);

        // routes/api.php
        Route::get('/images/{filename}', function ($filename) {
            $path = storage_path('app/private/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }

            return response()->file($path, [
                'Content-Type' => mime_content_type($path),
                'Cache-Control' => 'public, max-age=31536000',
            ]);
        })->where('filename', '.*');
    });
