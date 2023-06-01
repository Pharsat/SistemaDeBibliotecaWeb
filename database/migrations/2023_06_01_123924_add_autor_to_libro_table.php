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
        Schema::table('ejemplar', function (Blueprint $table) {
            $table->unsignedBigInteger('libro_codigo');
            $table->foreign('libro_codigo')->references('codigo')->on('libro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ejemplar', function (Blueprint $table) {
            $table->unsignedBigInteger('libro_codigo');
            $table->foreign('libro_codigo')->references('codigo')->on('libro');
        });
    }
};
