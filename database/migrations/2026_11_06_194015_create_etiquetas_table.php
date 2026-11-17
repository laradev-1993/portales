<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  Crea la tabla de etiquetas del blog.
     */
    public function up(): void
    {
    Schema::create('etiquetas', function (Blueprint $table) {
        $table->smallIncrements('etiqueta_id');
        $table->string('nombre', 50);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etiquetas');
    }
};
