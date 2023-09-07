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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_code", 18)->nullable();
            $table->string("product_name", 30)->nullable();
            $table->bigInteger("price")->nullable();
            $table->string("currency", 5)->nullable();
            $table->bigInteger("discount")->nullable();
            $table->string("dimension", 50)->nullable();
            $table->string("unit",5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
