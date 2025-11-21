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
        Schema::create('usuario', function (Blueprint $table) {
        $table->id();
        $table->string('id_usuario')->unique();
        $table->string('nombre_user');
        $table->string('password', 255);
        $table->string('nombre');
        $table->string('Ap_Paterno');
        $table->string('Ap_Materno');
        $table->string('email');
        $table->string('numero_tel');
        $table->string('direccion');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
