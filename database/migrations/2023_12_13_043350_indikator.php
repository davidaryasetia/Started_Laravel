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
        Schema::create('indikator', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->string('kode');
            $table->string('indikator_kinerja');
            $table->string('target');
        });

        Schema::table('indikator', function(Blueprint $table){
            $table->foreign('unit_id')->references('id')->on('unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('indikator', function(Blueprint $table){
            dropIfExists('indikator');
        });
    }
};
