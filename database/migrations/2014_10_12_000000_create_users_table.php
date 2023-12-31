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
       Schema::create('users', function(Blueprint $table){
        $table->id('userId');
        $table->integer('nip');
        $table->string('nama');
        $table->string('email');
        $table->string('email_verified');
        $table->string('password');
        $table->string('password_verified');
        $table->boolean('status_auditor');
        $table->boolean('status_auditee');
        $table->boolean('status_admin');
        $table->timestamps();
       });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
