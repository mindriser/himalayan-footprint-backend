<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {


        $limit = $request->query('limit', 6);
        $sort = $request->query('sort', 'newest');
        $category = $request->query('category');
        $search = $request->query('q');


        // handle search query as well

        $blogsQuery = Blog::with(['packages', 'relatedBlogs']);

        if ($category && $category !== 'All') {
            $blogsQuery->where('category', $category);
        }

        if ($search) {
            $blogsQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        switch ($sort) {
            case 'oldest':
                $blogsQuery->oldest('created_at');
                break;
            case 'popular':
                $blogsQuery->orderBy('view_count', 'desc'); // assuming you have a views column
                break;
            case 'newest':
            default:
                $blogsQuery->latest('created_at');
                break;
        }


        $blogs = $blogsQuery->paginate($limit);

        $blogs->getCollection()->transform(function ($blog) {
            $blog->content = Str::limit(strip_tags($blog->content), 250);
            return $blog;
        });

        $categories = Blog::distinct()
            ->whereNotNull('category')
            ->pluck('category')
            ->sort()
            ->values();

        $blogsArray = $blogs->toArray();

        $blogsArray['categories'] = collect(["All"])
            ->merge($categories) // existing categories
            // ->merge(
            //     collect(range(1, 20))->map(fn($i) => "FakeCategory{$i}") // 20 fake categories
            // )
            ->values();


        return response()->json($blogsArray);
    }

    public function getFeaturedBlogs()
    {
        $data = Blog::with('user:id,name')->where("is_featured", true)
            ->where('is_published', true)
            ->limit(5)->get()
            ->map(function ($blog) {
                $blog->content = Str::limit(strip_tags($blog->content), 250);
                return $blog;
            });

        return response()->json([
            "data" => $data
        ]);
    }

    public function showold($slug)
    {
        // Find blog by slug with relationships
        $blog = Blog::with(['packages', 'relatedBlogs:id,title,slug,image_url,view_count,category,user_id,content', 'relatedBlogs.user', 'packages' => function ($query) {
            $query->select('packages.id', 'title', 'slug', 'destination', 'badge', 'category_id', "short_description", 'duration_label', 'max_people_per_trip', 'old_group_price', 'new_group_price'); // columns from packages table // category being package realationship
            $query->with(['primaryImages', 'category:id,name,slug']);  // relation, will eager load
        }])
            ->where('slug', $slug)
            ->first();

        if (! $blog) {
            return response()->json([
                'status' => false,
                'message' => 'Blog not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Blog fetched successfully',
            'data' => $blog,
        ]);
    }

    public function show($slug)
    {
        $blog = Blog::with([
            'packages',
            'relatedBlogs:id,title,slug,image_url,view_count,category,user_id,content',
            'relatedBlogs.user',
            'packages' => function ($query) {
                $query->select(
                    'packages.id',
                    'title',
                    'slug',
                    'destination',
                    'badge',
                    'category_id',
                    'short_description',
                    'duration_label',
                    'max_people_per_trip',
                    'old_group_price',
                    'new_group_price'
                );

                $query->with(['primaryImages', 'category:id,name,slug']);
            }
        ])
            ->where('slug', $slug)
            ->first();

        if (!$blog) {
            return response()->json([
                'status' => false,
                'message' => 'Blog not found',
            ], 404);
        }

        // Limit related blog content to 200 characters
        $blog->relatedBlogs->transform(function ($related) {
            $related->content = Str::limit(strip_tags($related->content), 200);
            return $related;
        });

        return response()->json([
            'status' => true,
            'message' => 'Blog fetched successfully',
            'data' => $blog,
        ]);
    }

    // BlogController.php
    public function incrementView(Blog $blog)
    {
        $blog->increment('view_count');
        return response()->json(['view_count' => $blog->view_count]);
    }
}
