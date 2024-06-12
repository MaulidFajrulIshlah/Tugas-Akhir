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
        Schema::create('data_spada_bulanan', function (Blueprint $table) {
            $table->id();
            $table->string('bulan');
            $table->string('tahun');
            $table->integer('hari_ditemukan')->default(0);
            $table->integer('hari_tidak_ditemukan')->default(0);
            $table->timestamp('created_at')->nullable(); // Buat kolom created_at
            // Hapus timestamps() untuk menghindari kolom updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_spada_bulanan');
    }
};
