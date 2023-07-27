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
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_fakultas')->unsigned();
            $table->string('nama', 100);
            $table->timestamps();
        });
        // menghapus data prodi otomatis jika data di fakultas terhapus
        Schema::table('prodis', function (Blueprint $table) {
            $table->foreign('id_fakultas')->references('id')->on('fakultas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
