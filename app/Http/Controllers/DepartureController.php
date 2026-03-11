<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomDepartureRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Departure;
use App\Models\Package;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function indexx(Request $request)
    {

        $limit = $request->query('limit', 3);

        $data = Departure::fixed()->with([
            'package:id,category_id,slug',
            'package.category:id,name,slug'
        ])
            ->where("start_date", ">=", today())
            ->orderBy("start_date")
            ->limit($limit)
            ->get()
            ->makeHidden(['package.total_reviews', 'package.rating']);

        return response()->json(["data" => $data]);
    }

    public function indexs(Request $request)
    {
        $limit = $request->query('limit', 3);
        $packageId = $request->query('package_id');
        $dateFrom = $request->query('date_from');
        $dateTo = $request->query('date_to');

        $query = Departure::fixed()->with([
            'package:id,title,category_id,slug',
            'package.category:id,name,slug'
        ])
            ->where('start_date', '>=', today())
            ->orderBy('start_date');

        if ($packageId) {
            $query->where('package_id', $packageId);
        }

        if ($dateFrom) {
            $query->where('start_date', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->where('start_date', '<=', $dateTo);
        }

        if ($limit != -1) {
            $query->limit($limit);
        }

        $data = $query->get()
            ->makeHidden(['package.total_reviews', 'package.rating']);

        return response()->json(['data' => $data]);
    }

    public function indexasdf(Request $request)
    {
        $limit     = $request->query('limit', 15);
        $page      = $request->query('page', 1);
        $packageId = $request->query('package_id');
        $dateFrom  = $request->query('date_from');
        $dateTo    = $request->query('date_to');

        $query = Departure::fixed()->with([
            'package:id,title,category_id,slug',
            'package.category:id,name,slug',
        ])
            ->where('start_date', '>=', today())
            ->orderBy('start_date');

        if ($packageId) $query->where('package_id', $packageId);
        if ($dateFrom)  $query->where('start_date', '>=', $dateFrom);
        if ($dateTo)    $query->where('start_date', '<=', $dateTo);

        if ($limit == -1) {
            $data = $query->get()->makeHidden(['package.total_reviews', 'package.rating']);
            return response()->json(['data' => $data, 'total' => $data->count()]);
        }

        $paginated = $query->paginate((int) $limit, ['*'], 'page', (int) $page);

        return response()->json([
            'data'      => collect($paginated->items())->map->makeHidden(['package.total_reviews', 'package.rating']),
            'total'     => $paginated->total(),
            'page'      => $paginated->currentPage(),
            'per_page'  => $paginated->perPage(),
            'last_page' => $paginated->lastPage(),
        ]);
    }

    public function indeasdfx(Request $request)
    {
        $limit     = $request->query('limit', 15);
        $packageId = $request->query('package_id');
        $year      = $request->query('year');
        $month     = $request->query('month');

        $query = Departure::fixed()->with([
            'package:id,title,category_id,slug',
            'package.category:id,name,slug',
        ])
            ->where('start_date', '>=', today())
            ->orderBy('start_date');

        if ($packageId) {
            $query->where('package_id', $packageId);
        }

        if ($year) {
            $query->whereYear('start_date', $year);
        }

        if ($month) {
            $query->whereMonth('start_date', $month);
        }

        if ($limit == -1) {
            $data = $query->get()->makeHidden(['package.total_reviews', 'package.rating']);
            return response()->json(['data' => $data, 'total' => $data->count()]);
        }

        $paginated = $query->paginate((int) $limit);

        return response()->json([
            'data'      => collect($paginated->items())->map->makeHidden(['package.total_reviews', 'package.rating']),
            'total'     => $paginated->total(),
            'page'      => $paginated->currentPage(),
            'last_page' => $paginated->lastPage(),
        ]);
    }

    public function indexasdaf(Request $request)
    {
        $limit     = $request->query('limit', 15);
        $packageId = $request->query('package_id');
        $year      = $request->query('year');
        $month     = $request->query('month');

        $query = Departure::fixed()->with([
            'package:id,title,category_id,slug',
            'package.category:id,name,slug',
        ])
            ->where('start_date', '>=', today())
            ->orderBy('start_date');

        if ($packageId) {
            $query->where('package_id', $packageId);
        }

        if ($year) {
            $query->whereYear('start_date', $year);
        }

        if ($month) {
            $query->whereMonth('start_date', $month);
        }

        if ($limit == -1) {
            $data = $query->get()->makeHidden(['package.total_reviews', 'package.rating']);
            return response()->json(['data' => $data, 'total' => $data->count()]);
        }

        $paginated = $query->paginate((int) $limit);

        return response()->json([
            'data'      => collect($paginated->items())->map->makeHidden(['package.total_reviews', 'package.rating']),
            'total'     => $paginated->total(),
            'page'      => $paginated->currentPage(),
            'last_page' => $paginated->lastPage(),
        ]);
    }

    public function index(Request $request)
    {
        $limit = $request->query('limit', 15);

        $query = Departure::fixed()->with([
            'package:id,title,category_id,slug,old_group_price,new_group_price,min_group_size',
            'package.category:id,name,slug',
        ])
            ->where('start_date', '>=', today())
            ->orderBy('start_date');

        if ($limit == -1) {
            $data = $query->get()->makeHidden(['package.total_reviews', 'package.rating']);

            return response()->json([
                'data'  => $data,
                'total' => $data->count(),
            ]);
        }

        $paginated = $query->paginate((int) $limit);

        return response()->json([
            'data'      => collect($paginated->items())->map->makeHidden(['package.total_reviews', 'package.rating']),
            'total'     => $paginated->total(),
            'page'      => $paginated->currentPage(),
            'last_page' => $paginated->lastPage(),
        ]);
    }

    public function getDepartuesByPackage(Package $package)
    {
        $departures = $package->departures()
            ->whereDate('start_date', '>=', now()) // optional: future only
            ->orderBy('start_date')
            ->get();

        return response()->json([
            'data' => $departures
        ]);
    }

    public function requestCustomDeparture(CustomDepartureRequest $request)
    {
        // Prevent duplicate pending custom requests for same package + date range
        $duplicate = Departure::custom()
            ->where('package_id', $request->package_id)
            ->where('start_date', $request->start_date)
            ->where('status', 'open')
            ->exists();

        if ($duplicate) {
            return response()->json([
                'message' => 'You already have a pending custom departure request for this package and date.',
            ], 409);
        }

        $departure = Departure::create([
            'type'              => 'custom',
            'package_id'        => $request->package_id,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
            'description'       => $request->remarks,
            'max_capacity'      => $request->pax,   // requested group size
            'current_occupancy' => 0,
            'status'            => 'pending',           // pending admin review

        ]);

        $departure->customDetail()->create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'remarks' => $request->remarks,
        ]);

        return response()->json([
            'message' => 'Custom departure request submitted successfully.',
            'data'    => $departure->load('package.category'),
        ], 201);
    }
}
