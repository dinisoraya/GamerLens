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
        Schema::create('riwayat_diagnosas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengguna',3)->references('id')->on('users')->onDelete('cascade');
            $table->string('id_kecanduan',3);
            $table->string('tingkat_kecanduan',20);
            $table->string('value_cf',7);
            $table->json('gejala_pengguna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_diagnosas');
    }
};
