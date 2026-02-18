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
                ->nullable()
                ->constrained('departures')
                ->nullOnDelete();

            //  soft dlete departures, not hard delete

            // ->restrictOnDelete(); // this means we cant delete departures
            //   variant -> slots
            // variant on delete cascade slots...
            // what if i delete variant then ?
            // package -> variant
            // package on delete cascade variants
            //  what if i delete package ?
            //  what will happen to my bookings.

            $table->string('package_name'); // snapshot // befacuse dearptures may be dleted
            $table->date('departure_start_date'); //snapshot
            $table->date('departure_end_date'); //snapshot

            $table->string('booking_reference')->unique(); // ? where will this be used ?
            //  visitors will use this to track their booking..
            //  generate on the bais of package-name, year, start month-travellernumber-like this....,

            // $table->string('customer_name');
            // $table->string('customer_email');
            // $table->string('customer_phone');
            // $table->string('customer_country')->nullable(); // ISO code

            $table->integer('num_travelers');

            $table->decimal('base_price', 10, 2); // snapshot
            $table->decimal('total_price', 10, 2); // snapshot

            $table->string('currency', 4); // USD, EUR, NPR  // snapshot from product variant

            $table->enum('booking_status', [
                'pending',
                'confirmed',
                'cancelled',
                'expired',
            ])->default('pending');
            // we may need to cancel custom departures
            // or we may need to cancel for users who donot response.

            $table->enum('payment_status', [
                'unpaid',
                'partial',
                'paid',
                'refunded',
            ])->default('unpaid');

            $table->text('special_request')->nullable();
            //  visitors may request us something like, please pick us

            $table->timestamp('booked_at')->useCurrent();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();
            // Helpful indexes
            $table->index('booking_status');
            $table->index('payment_status');
            // $table->index('customer_email');
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
