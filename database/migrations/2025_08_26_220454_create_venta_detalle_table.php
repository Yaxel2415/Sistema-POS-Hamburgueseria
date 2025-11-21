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
        Schema::create('venta_detalle', function (Blueprint $table) {
        $table->id();
        $table->string('id_venta_detalle')->unique();
        $table->string('id_venta'); // Solo string, sin foreign
        $table->string('id_producto'); // Solo string, sin foreign
        $table->string('nombre_producto');
        $table->string('cantidad');
        $table->string('precio_unitario');
        $table->string('subtotal');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_detalle');
    }
};
