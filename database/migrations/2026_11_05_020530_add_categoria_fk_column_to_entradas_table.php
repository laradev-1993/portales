<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Agrega la columna y la fk que relaciona cada entrada con una categoría.
     */
    public function up(): void
    {
        Schema::table('entradas', function (Blueprint $table) {

            $table->unsignedBigInteger('categoria_fk');
            $table->foreign('categoria_fk')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::table('entradas', function (Blueprint $table) {
            
            $table->dropForeign(['categoria_fk']);
            $table->dropColumn('categoria_fk');
        });
    }
};
