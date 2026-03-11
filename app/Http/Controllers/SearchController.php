<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Package;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:1|max:100',
        ]);

        $query = $request->string('q')->trim();
        $lower = strtolower($query);


        $packages = Package::query()
            ->where('is_active', true)
            ->with('category:id,name,slug')
            ->where(function ($q) use ($lower) {
                $q->whereRaw('LOWER(title) LIKE ?', ["%{$lower}%"])
                    ->orWhereRaw('LOWER(short_description) LIKE ?', ["%{$lower}%"])
                    ->orWhereRaw('LOWER(description) LIKE ?', ["%{$lower}%"])
                    ->orWhereRaw('LOWER(duration_label) LIKE ?', ["%{$lower}%"])
                    ->orWhereRaw('LOWER(best_time) LIKE ?', ["%{$lower}%"])
                    ->orWhereRaw('LOWER(destination) LIKE ?', ["%{$lower}%"]);
            })
            ->select('id', 'title', 'slug', 'category_id')
            ->limit(10)
            ->get()
            ->makeHidden(['total_reviews', 'rating'])
            ->map(fn($trip) => [
                'id'    => $trip->id,
                'label' => $trip->title,
                'type'  => "package",
                'slug'  => $trip->slug,
                'category'  => $trip->category,
            ]);

        $blogs = Blog::query()
            ->where('is_published', true)
            ->where(function ($q) use ($lower) {
                $q->whereRaw('LOWER(title) LIKE ?', ["%{$lower}%"])
                    ->orWhereRaw('LOWER(content) LIKE ?', ["%{$lower}%"]);
            })
            ->select('id', 'title', 'slug', 'category')
            ->limit(5)
            ->get()
            ->map(fn($item) => [
                'id'       => $item->id,
                'label'    => $item->title,
                'type'     => 'blog',
                'slug'     => $item->slug,
                'category' => $item->category,
            ]);

        return response()->json([
            'data' => [...$packages, ...$blogs],
        ]);
    }
}
