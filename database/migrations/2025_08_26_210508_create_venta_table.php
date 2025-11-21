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
        Schema::create('venta', function (Blueprint $table) {
        $table->id();
        $table->string('id_venta')->unique();
        $table->string('folio')->unique();
        $table->string('id_usuario'); // Solo string, sin foreign
        $table->string('id_cliente'); // Solo string, sin foreign
        $table->string('fecha_venta');
        $table->string('subtotal');
        $table->string('iva');
        $table->string('total');
        $table->string('metodo_pago');
        $table->string('estado');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
