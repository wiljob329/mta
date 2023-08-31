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
        Schema::create('mesa_tecnicas', function (Blueprint $table) {
            $table->id()->startingValue(6100);
            $table->string('nombre_mta');
            $table->string('telefono_encargado')->nullable();
            $table->string('correo_encargado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesa_tecnica');
    }
};
