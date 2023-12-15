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
            $table->id('ProductId');
            $table->string('ProductName');
            $table->unsignedBigInteger('SupplierId');
            $table->unsignedBigInteger('CategoryId');
            $table->string('Unit');
            $table->integer('Price')->length(10);
            $table->timestamps();

            // relationship
            $table->foreign('SupplierId')->references('SupplierId')->on('suppliers');
            $table->foreign('CategoryId')->references('CategoryId')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropIfExists('products');
    }
};
