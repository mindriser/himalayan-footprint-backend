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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('package_id')
            //     ->constrained('packages')
            //     ->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('label')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url');
            $table->string("redirect_url")->nullable();
            $table->string("redirect_label")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
