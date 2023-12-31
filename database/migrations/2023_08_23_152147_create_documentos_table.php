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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('doc_constitucion_mta');
            $table->string('doc_promotor_mta')->nullable();
            $table->string('doc_listado_firmas')->nullable();
            $table->string('doc_aval_cc')->nullable();
            $table->string('doc_constancia_cc');
            $table->string('doc_rif_mta');
            $table->unsignedBigInteger('mesa_tecnica_id');
            $table->foreign('mesa_tecnica_id')->references('id')->on('mesa_tecnicas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
