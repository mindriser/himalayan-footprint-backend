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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            // field  eg phone, email, whatsapp,viber
            // value  eg: 98xx, abc@gmail.com
            // phone, email, whatsapp, viber, facebook, etc
            $table->string('type');

            // actual value: phone number, email, url, etc
            $table->string('value', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
