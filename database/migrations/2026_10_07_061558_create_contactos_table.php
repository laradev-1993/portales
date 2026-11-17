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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo', 100);
            $table->string('email')->nullable();
            $table->string('telefono', 30);
            $table->string('tipo_torta', 100);
            $table->unsignedTinyInteger('cantidad_personas');
            $table->text('descripcion_tematica');
            $table->date('fecha_evento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
