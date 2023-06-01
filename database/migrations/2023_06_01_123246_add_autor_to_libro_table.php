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
        Schema::table('libro', function (Blueprint $table) {
            $table->unsignedBigInteger('autor_codigo');
            $table->foreign('autor_codigo')->references('codigo')->on('autor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('libro', function (Blueprint $table) {
            $table->dropForeign(['autor_codigo']);
            $table->dropColumn('autor_codigo');
        });
    }
};
