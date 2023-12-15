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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id('orderDetailId');
            $table->unsignedBigInteger('OrderId');
            $table->unsignedBigInteger('ProductId');
            $table->integer('Quantity')->length(10);
            $table->timestamps();

            // relationship
            $table->foreign('OrderId')->references('OrderId')->on('orders');
            $table->foreign('ProductId')->references('ProductId')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderDetails');
    }
};
