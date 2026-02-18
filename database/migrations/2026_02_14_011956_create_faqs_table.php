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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_id')
                ->nullable() // if this is not of specific pacakge and is global website faq
                ->constrained()
                ->cascadeOnDelete();

            // FAQ content
            $table->string('question');
            $table->text('answer'); // rich text editor
            $table->boolean('is_active')->default(true);

            // optional: ordering
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
