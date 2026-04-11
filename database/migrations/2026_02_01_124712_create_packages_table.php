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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('old_group_price', 10, 2)->nullable();
            $table->decimal('new_group_price', 10, 2)->nullable();
            $table->integer('min_group_size')->default(4);
            $table->string('destination')->nullable(); // solukhumub
            $table->string('duration_label')->nullable(); // 10-15 days
            $table->string('badge')->nullable(); // popular, cultural, best seller
            $table->enum('difficulty', ['easy', 'moderate', 'hard'])->nullable();
            $table->string('max_elevation')->nullable();
            $table->string('activities')->nullable();
            $table->string('accomodations')->nullable();
            $table->string('meals')->nullable();
            $table->string('max_people_per_trip')->nullable();
            $table->string('best_time')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_luxury')->default(false);
            $table->string('route_map')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
