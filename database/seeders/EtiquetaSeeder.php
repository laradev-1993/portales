<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetaSeeder extends Seeder
{
    /**
     * Carga las etiquetas iniciales del blog
     */
   public function run(): void
{
    //también se puede usar el modelo --> Etiqueta::insert(); en lugar de DB::table
    DB::table('etiquetas')->insert([
        [
            'etiqueta_id' => 1,
            'nombre' => 'Cumpleaños',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'etiqueta_id' => 2,
            'nombre' => 'Chocolate',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'etiqueta_id' => 3,
            'nombre' => 'Mesa dulce',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'etiqueta_id' => 4,
            'nombre' => 'Eventos',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'etiqueta_id' => 5,
            'nombre' => 'Personalizadas',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}
}