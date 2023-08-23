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
        Schema::create('documentos_mta', function (Blueprint $table) {
            $table->id();
            $table->string('doc_constitucion_mta');
            $table->string('doc_promotor_mta')->nullable();
            $table->string('doc_listado_firmas')->nullable();
            $table->string('doc_aval_cc')->nullable();
            $table->string('doc_constancia_cc');
            $table->string('doc_rif_mta');
            $table->unsignedBigInteger('mta_id');
            $table->foreign('mta_id')->references('id')->on('mesa_tecnica');
            //$table->foreignId('mta_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_mta');
    }
};
