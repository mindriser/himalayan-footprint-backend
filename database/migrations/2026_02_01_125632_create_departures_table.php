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
        //  this is us(company) saying, for this daate, we are open, we are going to go.
        // for departures date
        Schema::create('departures', function (Blueprint $table) {
            $table->id();

            $table->enum('type', ['fixed', 'custom'])->default('fixed');
            // user who will ask for custom departure request
            // only fixed ones will be shown to normal vistor users

            $table->text('description')->nullable();

            $table->foreignId('package_id')  // variant of a tour package eg: luxury
                ->constrained('packages')
                ->cascadeOnDelete();

            $table->date('start_date');
            $table->date('end_date');

            $table->integer('max_capacity');
            $table->integer('current_occupancy')->default(0);

            $table->enum('status', ['open', 'full', 'closed', 'guaranteed'])
                ->default('open');
            //  guaranteed, we will organize this tour.

            $table->date('cutoff_date')->nullable();  // why cut off date ?
            // last date when customer are allowed to book  that departure. because if they book just before the departure, we may not be
            // able to  prepare accordingly for them. we have to prepare and manage according to the number of booked visitors.
            $table->timestamps();
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
