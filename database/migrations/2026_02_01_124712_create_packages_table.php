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
            // $table->foreignId('category_id')
            //     ->constrained()
            //     ->restrictOnDelete();
            $table->enum('category', ['tour', 'trek'])->default('travel');

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->decimal('old_single_price', 10, 2)->nullable();
            $table->decimal('new_single_price', 10, 2)->nullable();

            $table->decimal('old_group_price', 10, 2)->nullable();
            $table->decimal('new_group_price', 10, 2)->nullable();

            $table->enum('currency', ['USD', 'EUR', 'NPR'])->default("USD");

            $table->integer('min_group_size')->nullable(); // this define how travellers will be treated as  person  or a group


            $table->string('destination')->nullable(); // solukhumub
            $table->string('duration_label')->nullable(); // 10-15 days
            $table->string('badge')->nullable(); // popular, cultural, best seller

            $table->enum('difficulty', ['easy', 'moderate', 'hard'])->nullable();

            $table->string('max_elevation')->nullable();
            $table->string('activities')->nullable();
            $table->string('accomodations')->nullable();
            $table->string('meals')->nullable();
            $table->string('max_people_per_trip')->nullable(); // 8 - 12
            $table->unsignedInteger('total_reviews')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->string('best_time')->nullable();

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_luxury')->default(false);

            // $table->longText('inclusions')->nullable(); // HTML/Markdown
            // $table->longText('exclusions')->nullable(); // HTML/Markdown


            $table->boolean('is_active')->default(true); // something will keep in draft so.
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
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
