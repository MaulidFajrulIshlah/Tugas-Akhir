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
        Schema::create('data_spada', function (Blueprint $table) {
            $table->id();
            $table->string('universitas');
            $table->string('status')->nullable(); // Kolom status bisa memiliki nilai null
            $table->timestamp('created_at')->nullable(); // Buat kolom created_at
            // Hapus timestamps() untuk menghindari kolom updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_spada');
    }
};
