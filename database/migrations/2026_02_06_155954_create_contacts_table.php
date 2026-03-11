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
            $table->string("type");
            $table->tinyInteger('order')->default(5); // order of display
            // field  eg phone, email, whatsapp,viber
            // value  eg: 98xx, abc@gmail.com
            // phone, email, whatsapp, viber, facebook, etc
            $table->string('service');
            // actual value: phone number, email, url, etc
            $table->string('value', 1000);
            $table->string('href',1000)->nullable();
            // $table->string('href', 500)->nullable();
            $table->string('label', 50)->nullable(); // display label eg: Whatsapp
            $table->string('sub', 50)->nullable(); // sub texts, descriptions
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
