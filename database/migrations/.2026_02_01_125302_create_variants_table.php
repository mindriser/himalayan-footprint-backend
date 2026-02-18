<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')
                ->constrained('packages')
                ->cascadeOnDelete();

            $table->string('variation_name'); // standard, luxury

            $table->decimal('old_single_price', 10, 2)->nullable();
            $table->decimal('new_single_price', 10, 2)->nullable();

            $table->decimal('old_group_price', 10, 2)->nullable();
            $table->decimal('new_group_price', 10, 2)->nullable();

            $table->enum('currency', ['USD', 'EUR', 'NPR'])->default("USD");

            $table->integer('min_group_size')->nullable(); // this define how travellers will be treated as  person  or a group

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->boolean('is_default')->default(false); // only one varaint can be default  per package
            $table->boolean('is_active')->default(true); // active variant or draft variant

            // Optional: only one default variant per tour
            $table->unique(['package_id', 'is_default'], 'tour_default_variant_unique');

            $table->timestamps();
        });

        // Partial unique index for default variant
        // DB::statement('CREATE UNIQUE INDEX tour_default_variant_unique ON variants(package_id) WHERE is_default = 1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
