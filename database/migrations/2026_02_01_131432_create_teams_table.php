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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('image')->nullable(); // profile photo path / URL

            $table->string('designation')->nullable(); // Guide, Porter, Leader

            $table->string('department')->nullable();
            // guide, executive, marketing, leaders

            $table->string('contact')->nullable(); // phone / whatsapp / email

            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
