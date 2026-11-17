<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *Crea la tabla pivote que une usuarios con los productos que encargaron.
     */
    public function up(): void
    {
        Schema::create('users_encargan_productos', function (Blueprint $table) {

             $table->foreignId('user_fk')->constrained('users', 'id');
             $table->foreignId('producto_fk')->constrained('productos', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_encargan_productos');
    }
};
