<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
   * Agrega la FK que relaciona cada usuario con un rol.
   * 
   * Por defecto, un usuario nuevo es usuario común -le asigna el rol 2- 
   */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->unsignedTinyInteger('rol_fk')->default(2); 
             $table->foreign('rol_fk')->references('rol_id')->on('roles');
        });
    }

    /**
     * sirve para quitar la fk y la columna rol_fk de users.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rol_fk']);
            $table->dropColumn('rol_fk');
        });
    }
};
