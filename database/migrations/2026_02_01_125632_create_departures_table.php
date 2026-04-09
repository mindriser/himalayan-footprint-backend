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
        Schema::create('departures', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['fixed', 'custom'])->default('fixed');
            $table->text('description');
            $table->foreignId('package_id')
                ->constrained('packages')
                ->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('max_capacity');
            $table->integer('current_occupancy')->default(0);
            $table->enum('status', ['pending', 'open', 'full', 'closed', 'guaranteed'])
                ->default('open');
            $table->date('cutoff_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departures');
    }
};
