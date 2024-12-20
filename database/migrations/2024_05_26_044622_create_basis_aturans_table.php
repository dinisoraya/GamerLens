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
        Schema::create('basis_aturans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecanduan_id')->references('id')->on('kecanduans')->onDelete('cascade');
            $table->foreignId('gejala_id')->references('id')->on('gejalas')->onDelete('cascade');
            $table->float('value_cf',7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis_aturans');
    }
};
