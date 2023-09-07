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
        Schema::create('transactiondetails', function (Blueprint $table) {
            $table->id();
            $table->string("document_code", 18)->nullable();
            $table->string("document_number", 30)->nullable();
            $table->string("product_code", 18)->nullable();
            $table->bigInteger("price")->nullable();
            $table->bigInteger("qty")->nullable();
            $table->string("unit",5)->nullable();
            $table->bigInteger("subtotal")->nullable();
            $table->string("currency", 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactiondetails');
    }
};
