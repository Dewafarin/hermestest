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
        Schema::create('transactionheaders', function (Blueprint $table) {
            $table->id();
            $table->string("document_code", 18)->nullable();
            $table->string("document_number", 30)->nullable();
            $table->string("user", 5)->nullable();
            $table->bigInteger("total")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionheaders');
    }
};
