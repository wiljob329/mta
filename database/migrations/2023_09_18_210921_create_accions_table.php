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
        Schema::create('accions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('accion');
            $table->unsignedBigInteger('mesa_tecnica_id')->unique();
            $table->foreign('mesa_tecnica_id')->references('id')->on('mesa_tecnicas')->onDelete('cascade');
            $table->unsignedBigInteger('registro_usuario_id')->unique();
            $table->foreign('registro_usuario_id')->references('id')->on('registro_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accions');
    }
};
