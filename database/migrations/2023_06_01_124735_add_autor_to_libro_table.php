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
        Schema::table('prestamo', function (Blueprint $table) {
            $table->unsignedBigInteger('ejemplar_codigo');
            $table->foreign('ejemplar_codigo')->references('codigo')->on('ejemplar');
            $table->unsignedBigInteger('usuario_codigo');
            $table->foreign('usuario_codigo')->references('codigo')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestamo', function (Blueprint $table) {
            $table->unsignedBigInteger('ejemplar_codigo');
            $table->foreign('ejemplar_codigo')->references('codigo')->on('ejemplar');
            $table->unsignedBigInteger('usuario_codigo');
            $table->foreign('usuario_codigo')->references('codigo')->on('usuario');
        });
    }
};
