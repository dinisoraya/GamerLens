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
        Schema::create('kecanduans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kecanduan',3);
            $table->string('nama_kecanduan',20);
            $table->text('saran_kecanduan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecanduans');
    }
};
