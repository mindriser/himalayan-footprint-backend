<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // snapshots
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('departure_id')
                ->constrained('departures')
                ->restrictOnDelete();
            $table->string('package_name'); // snapshot 
            $table->date('departure_start_date'); //snapshot
            $table->date('departure_end_date'); //snapshot
            $table->string('booking_reference')->unique(); 
            $table->integer('num_travelers');
            $table->decimal('base_price', 10, 2); // snapshot
            $table->decimal('total_price', 10, 2); // snapshot
            $table->enum('booking_status', [
                'pending',
                'confirmed',
                'cancelled',
            ])->default('pending');
            $table->enum('payment_status', [
                'unpaid',
                'partial',
                'paid',
                'refunded',
            ])->default('unpaid');

            $table->text('special_request')->nullable();
            $table->text('remarks')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamp('booked_at')->useCurrent();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
