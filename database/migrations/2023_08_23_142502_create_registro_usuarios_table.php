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
        Schema::create('registro_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('password');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('consejo_comunal');
            $table->unsignedBigInteger('parroquia_id')->default(4);
            // $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->timestamps();
            $table->integer('nivel')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_usuarios');
    }
};
