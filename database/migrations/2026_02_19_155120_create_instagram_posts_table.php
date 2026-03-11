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
        Schema::create('instagram_posts', function (Blueprint $table) {
            $table->id();
            $table->string('photo_url'); // the uploaded photo path
            $table->string('instagram_link'); // link to Instagram post/profile
            $table->text('caption'); // optional caption
            $table->text('location')->nullable(); // optional caption
            $table->integer('likes_count')->default(150); // static likes
            $table->integer('order')->default(10); // static likes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagram_posts');
    }
};
