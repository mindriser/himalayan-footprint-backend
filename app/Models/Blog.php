<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guarded = [];

    // public function images()
    // {
    //     return $this->morphMany(Image::class, 'imageable');
    // }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Blogs related to this blog
    // public function relatedBlogs()
    // {
    //     return $this->belongsToMany(
    //         Blog::class,
    //         'blog_related',
    //         'blog_id',
    //         'related_blog_id'
    //     );
    // }

    public function relatedBlogs()
    {
        return $this->belongsToMany(
            Blog::class,
            'related_blogs',      // 👈 correct table name
            'blog_id',            // 👈 current model key
            'related_blog_id'     // 👈 related model key
        );
    }


    // Optional: Blogs that relate back to this one
    public function relatedTo()
    {
        return $this->belongsToMany(
            Blog::class,
            'blog_related',
            'related_blog_id',
            'blog_id'
        );
    }


    public function packages()
    {
        return $this->belongsToMany(
            Package::class,
            'blog_packages',
            'blog_id',
            'package_id'
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
