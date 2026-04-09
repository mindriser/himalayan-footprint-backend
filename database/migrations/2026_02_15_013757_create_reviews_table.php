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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('reviewer_name');
            $table->string('reviewer_image')->nullable(); 
            $table->string('title')->nullable();
            $table->text('description')->nullable(); 
            $table->tinyInteger('rating')->default(5); 
            $table->date('review_date')->nullable();
            $table->boolean('is_featured')->default(false); 
            $table->enum('created_by', ['admin', 'user'])->default('admin'); 
            $table->enum('status', ['approved', 'pending', 'rejected'])->default('pending'); 
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
