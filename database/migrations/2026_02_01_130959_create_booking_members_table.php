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
        Schema::create('booking_members', function (Blueprint $table) {
            $table->id();
            // $table->uuid('booking_id'); // why uuid
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->restrictOnDelete(); // this means we cant delte bookings ?
            // lets store the snapshot instead..

            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('dob')->nullable(); // better than age
            $table->string('nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->boolean('is_lead_member')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_members');
    }
};
