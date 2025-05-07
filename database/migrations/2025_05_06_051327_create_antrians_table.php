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
        Schema::create('apm_antrian', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_antrian');
            $table->foreignId('kategori_antrian_id')->constrained('apm_kategori_antrian');
            $table->string('nomor_antrian');
            $table->enum('status_antrian', ['1', '2', '3']);
            $table->timestamps();

            $table->index('kategori_antrian_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apm_antrian');
    }
};
