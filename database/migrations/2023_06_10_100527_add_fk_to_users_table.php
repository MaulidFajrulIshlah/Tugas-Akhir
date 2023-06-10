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
        Schema::table('users', function (Blueprint $table) {
            // menambah fk
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->unsignedBigInteger('id_fakultas')->nullable();
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_fakultas')->references('id')->on('fakultas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['id_jabatan']);
            $table->dropColumn(['id_jabatan']);
            $table->dropForeign(['id_fakultas']);
            $table->dropColumn(['id_fakultas']);
        });
    }
};
