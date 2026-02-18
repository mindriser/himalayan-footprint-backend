<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Livewire\Attributes\Json;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // fetch packages with their associalted variations
        // send son resonse

        $packages = Package::active()->with(["images"])->get();
        return response()->json(["data" => $packages]);
        // return response()->json(["data" => [1,2,3]]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // $package = Package::active()->with(['images', "itineraries", "faqs", "itineraries.images", "fixedDepartures"])
        $package = Package::active()->with(['images', "itineraries", "faqs", "itineraries.images","costInclusions","costExclusions","reviews"])
            ->where('slug', $slug)
            ->firstOrFail(); // throws 404 if not found

        $package->departures = $package->fixedDepartures;
        unset($package->fixedDepartures); // optional

        return response()->json(['data' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }
}
