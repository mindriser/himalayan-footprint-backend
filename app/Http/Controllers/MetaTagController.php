<?php

namespace App\Http\Controllers;

use App\Models\MetaTag;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{

    public function show($slug)
    {
        $metaTag = MetaTag::where('slug', $slug)->first();

        if (!$metaTag) {
            return response()->json([
                'success' => false,
                'message' => 'Meta tag not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $metaTag,
        ]);
    }
}
