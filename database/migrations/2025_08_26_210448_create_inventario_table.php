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
        Schema::create('inventario', function (Blueprint $table) {
        $table->id();
        $table->string('id_producto')->unique();
        $table->string('nombre_producto');
        $table->string('categoria');
        $table->string('cantidad');
        $table->string('unidad_medida');
        $table->string('proveedor');
        $table->string('precio_compra');
        $table->string('minimo_stock');
        $table->string('activo');
        $table->string('imagen');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
