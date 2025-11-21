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
        Schema::table('hamburguesas', function (Blueprint $table) {
            $table->boolean('oferta')->default(false)->after('imagen');
            $table->decimal('precio_oferta', 8, 2)->nullable()->after('oferta');
        });

        Schema::table('combos', function (Blueprint $table) {
            $table->boolean('oferta')->default(false)->after('imagen');
            $table->decimal('precio_oferta', 8, 2)->nullable()->after('oferta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hamburguesas', function (Blueprint $table) {
            $table->dropColumn(['oferta', 'precio_oferta']);
        });

        Schema::table('combos', function (Blueprint $table) {
            $table->dropColumn(['oferta', 'precio_oferta']);
        });
    }
};
