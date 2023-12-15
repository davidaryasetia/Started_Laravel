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
        Schema::create('customers', function(Blueprint $table){
           $table->id('CustomerId');
           $table->string('CustomerName');
           $table->string('ContactName');
           $table->string('Address');
           $table->string('City');
           $table->integer('PostalCode');
           $table->string('Country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('customers');
    }
};
