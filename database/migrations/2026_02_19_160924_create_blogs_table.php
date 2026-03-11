<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->string('category'); // Optional category
            $table->string('title'); // Blog title
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->text('content'); // Main content of the blog
            $table->text('readingTime');
            $table->foreignId('user_id')
                ->nullable()             // allows NULL
                ->constrained()          // links to users table
                ->nullOnDelete();
            $table->string('image_url')->nullable(); // Optional image path
            $table->boolean('is_published')->default(false); // Draft/published status
            $table->unsignedBigInteger('initial_view_count')->default(0); // fake initial views
            $table->unsignedBigInteger('view_count')->default(0); // current view count
            $table->boolean('is_featured')->default(false); // to show in home page
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
