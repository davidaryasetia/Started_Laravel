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
        Schema::create('periode_pengisian', function(Blueprint $table){
            $table->id();
            $table->year('tahun');
            $table->int('periode');
            $table->dateTime('tanggal_audite_isi');
            $table->dateTime('tanggal_audite_tutup');
            $table->dateTime('tanggal_auditor_isi');
            $table->dateTime('tanggal_auditor_tutup');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('periode_pengisian', function(Blueprint $table){
           dropIfExists('periode_pengisian');
        });
    }
};
