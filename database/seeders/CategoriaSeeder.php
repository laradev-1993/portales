<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Carga las categorías iniciales del blog
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Tendencias',
                'descripcion' => 'Novedades y estilos del mundo de las tortas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Consejos',
                'descripcion' => 'Recomendaciones para elegir y disfrutar tu torta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Eventos',
                'descripcion' => 'Ideas para celebraciones y mesas dulces.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}