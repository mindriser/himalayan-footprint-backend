<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index(Request $request)
    {
        $faqs = Faq::active()->whereNull('package_id')->get();
        return response()->json([
            'data' => $faqs
        ]);
    }
}
