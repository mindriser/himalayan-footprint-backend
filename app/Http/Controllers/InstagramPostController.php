<?php

namespace App\Http\Controllers;

use App\Models\InstagramPost;

class InstagramPostController extends Controller
{
    public function index()
    {
        $data = InstagramPost::orderBy('order', 'asc')
            ->limit(8)
            ->get();

        return response()->json(["data" => $data]);
    }
}
