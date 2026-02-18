<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function index()
    {
        $data = Departure::fixed()->with('package')
            ->where("start_date", ">=", today())
            ->orderBy("start_date")
            ->get();
        return response()->json(["data" => $data]);
    }
}
