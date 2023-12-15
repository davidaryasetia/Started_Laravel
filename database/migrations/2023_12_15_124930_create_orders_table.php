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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderId');
            $table->unsignedBigInteger('CustomerId');
            $table->unsignedBigInteger('EmployeeId');
            $table->dateTime('OrderDate');
            $table->unsignedBigInteger('ShipperId');
            $table->timestamps();

            // relation
            $table->foreign('CustomerId')->references('CustomerId')->on('customers');
            $table->foreign('EmployeeId')->references('EmployeeId')->on('employees');
            $table->foreign('ShipperId')->references('ShipperId')->on('shippers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
