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
            $table->id();   
            $table->string('category'); 
            $table->string('title'); 
            $table->string('slug')->unique(); 
            $table->text('content'); 
            $table->text('readingTime');
            $table->foreignId('user_id')
                ->nullable()             
                ->constrained()          
                ->nullOnDelete();
            $table->string('image_url')->nullable(); 
            $table->boolean('is_published')->default(false); 
            $table->unsignedBigInteger('initial_view_count')->default(0); 
            $table->unsignedBigInteger('view_count')->default(0); 
            $table->boolean('is_featured')->default(false); 
            $table->timestamps(); 
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
