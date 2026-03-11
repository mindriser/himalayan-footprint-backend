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
        Schema::create('related_packages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_id')
                ->constrained('packages')
                ->cascadeOnDelete();

            $table->foreignId('related_package_id')
                ->constrained('packages')
                ->cascadeOnDelete();

            $table->timestamps();

            // Prevent duplicate recommendations per tour
            $table->unique(
                ['package_id', 'related_package_id'],
                'tour_related_unique'
            );

            // Optional: prevent self-referencing (tour cannot recommend itself)
            // $table->check('package_id <> related_package_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_packages');
    }
};
