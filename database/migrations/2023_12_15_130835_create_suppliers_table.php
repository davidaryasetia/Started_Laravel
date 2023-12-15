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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('SupplierId');
            $table->string('SupplierName');
            $table->string('ContactName');
            $table->string('Address');
            $table->string('City');
            $table->integer('PostalCode')->length(8);
            $table->string('Country');
            $table->integer('Phone')->length(14);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
