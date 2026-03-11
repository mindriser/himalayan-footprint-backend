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
        Schema::create('package_recommentations', function (Blueprint $table) {
            $table->id();
            // current package
            $table->foreignId('package_id')
                ->constrained()
                ->cascadeOnDelete();

            // recommended package
            $table->foreignId('recommended_package_id')
                ->constrained('packages')
                ->cascadeOnDelete();

            // optional ordering
            $table->integer('sort_order')->default(0);

            $table->timestamps();

            // prevent duplicates
            $table->unique(['package_id', 'recommended_package_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_recommentations');
    }
};
