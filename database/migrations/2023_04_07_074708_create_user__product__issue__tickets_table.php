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
        Schema::create('user__product__issue__tickets', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->default();
            $table->string('lname')->default();
            $table->string('productId')->default();
            $table->string('invoice', 300)->default();
            $table->string('address')->default();
            $table->string('additionalInfo')->default();
            $table->string('zipCode')->default();
            $table->string('place')->default();
            $table->string('country')->default();
            $table->string('code')->default();
            $table->string('phone')->default();
            $table->string('email')->default();
            $table->string('Ticket_Status')->default(1);
            $table->string('Issue_Description')->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__product__issue__tickets');
    }
};
