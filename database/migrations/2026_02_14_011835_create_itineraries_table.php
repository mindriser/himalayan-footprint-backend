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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            // package wise iternary.
            // package level itinerary
            $table->foreignId('package_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            // itinerary title (Day 1, Day 2, etc.)
            $table->string('title')->nullable();

            // rich text editor content
            $table->text('description');

            // extra notes (optional)
            $table->text('extra_notes')->nullable();

            // order of day
            $table->integer('day_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
