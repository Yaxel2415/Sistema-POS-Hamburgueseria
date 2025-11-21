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
        Schema::table('bebidas', function (Blueprint $table) {
             $table->renameColumn('nombre', 'nombre_bebida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bebidas', function (Blueprint $table) {
            $table->renameColumn('nombre_bebida', 'nombre');
        });
    }
};
