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
        Schema::create('user_product_registration_data', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->default();
            $table->string('lname')->default();
            $table->string('productId')->default();
            $table->string('invoice')->default();
            $table->string('address')->default();
            $table->string('additionalInfo')->default();
            $table->string('zipCode')->default();
            $table->string('place')->default();
            $table->string('country')->default();
            $table->string('code')->default();
            $table->string('phone')->default();
            $table->string('email')->default()->unique();
            $table->string('registrationStatus')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_product_registration_data');
    }
};
