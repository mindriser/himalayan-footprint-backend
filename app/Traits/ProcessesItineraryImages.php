<?php
// app/Traits/ProcessesItineraryImages.php

namespace App\Traits;

use Intervention\Image\Laravel\Facades\Image;

trait ProcessesItineraryImages
{
    private function processItineraryImages($itineraries)
    {
        return $itineraries->map(function ($day) {
            $day->processedImages = $day->images->take(2)->map(function ($image) {
                $path = storage_path('app/private/' . $image->image_url);

                if (!file_exists($path)) return null;

                $data = Image::read($path)
                    ->scale(width: 200)
                    ->toJpeg(quality: 50);

                return [
                    'data' => base64_encode($data),
                    'alt'  => $image->alt ?? '',
                ];
            })->filter();

            return $day;
        });
    }
}
