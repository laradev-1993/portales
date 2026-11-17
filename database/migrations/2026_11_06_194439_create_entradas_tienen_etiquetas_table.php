<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla pivote que une entradas con etiquetas
     */
    public function up(): void
    {
        Schema::create('entradas_tienen_etiquetas', function (Blueprint $table) {

        //Forma alternativa para definir la FK. Laravel ofrece: Con el método foreignId() - una forma que simplifica el proceso.- 
            $table->foreignId('entrada_fk')->constrained('entradas', 'id');

            $table->unsignedSmallInteger('etiqueta_fk');
            $table->foreign('etiqueta_fk')->references('etiqueta_id')->on('etiquetas');

            $table->timestamps();

            $table->primary(['entrada_fk', 'etiqueta_fk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas_tienen_etiquetas');
    }
};
