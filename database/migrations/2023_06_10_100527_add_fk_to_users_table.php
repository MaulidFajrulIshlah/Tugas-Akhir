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
            $table->unsignedBigInteger('id_role')->nullable();
            $table->unsignedBigInteger('id_fakultas')->nullable();
            $table->unsignedBigInteger('id_prodi')->nullable();
            $table->foreign('id_role')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_fakultas')->references('id')->on('fakultas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['id_role']);
            $table->dropColumn(['id_role']);
            $table->dropForeign(['id_fakultas']);
            $table->dropColumn(['id_fakultas']);
            $table->dropForeign(['id_prodi']);
            $table->dropColumn(['id_prodi']);
        });
    }
};
