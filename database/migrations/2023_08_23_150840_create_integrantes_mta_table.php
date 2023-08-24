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
        Schema::create('integrantes_mta', function (Blueprint $table) {
            $table->string('cedula_integrante')->primary();
            $table->string('nombre_integrante');
            $table->string('apellido_integrante');
            $table->string('correo_integrante')->nullable();
            $table->string('telefono_integrante')->nullable();
            $table->string('cargo_integrante');
            $table->unsignedBigInteger('mta_id');
            $table->foreign('mta_id')->references('id')->on('mesa_tecnica');
            //$table->foreignId('mta_id')->constrained()->onDelete('cascade');
            $table->string('doc_copia_cedula');
            $table->string('doc_rif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrantes_mta');
    }
};