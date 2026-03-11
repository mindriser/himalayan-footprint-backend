<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomDepartureRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Departure;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //

    public function getFeaturedReviews(Request $request)
    {
        $data = Review::with('package')->where('is_featured', true)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    // TODO: review should only be sent from our frontend. not any apis....
    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        // Handle reviewer image upload
        // if ($request->hasFile('reviewer_image')) {
        //     $data['reviewer_image'] = $request->file('reviewer_image')->store('reviews', 'public');
        //     //   store in same path as that of filament FileUpload::make('reviewer_image')
        //             // ->image(),
        // }

        // if ($request->hasFile('reviewer_image')) {
        //     $data['reviewer_image'] = $request->file('reviewer_image')
        //         ->store();
        //     // ->store( 'private'); // <-- same folder as Filament
        // }


        // Fill static/default fields
        $data['created_by']  = 'user';          // default creator
        $data['status']      = 'pending';       // default status
        $data['is_featured'] = false;           // default not featured
        $data['review_date'] = now()->toDateString(); // current date

        $review = Review::create($data);

        return response()->json([
            'message' => 'Review submitted successfully',
            'data'    => $review
        ], 201);
    }

}
