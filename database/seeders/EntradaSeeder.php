<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('entradas')->insert([
            [
                'titulo' => 'Tendencias en tortas para celebraciones',
                'categoria_fk' => 1,
                'cuerpo' => 'Descubrí las tendencias actuales en tortas para cumpleaños y eventos especiales, con diseños personalizados, combinaciones de sabores y detalles artesanales.',
                'imagen' => 'entradas/tendencias-tortas.jpg',
                'extracto' => 'Conocé las tendencias que inspiran las tortas para tus celebraciones.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Cómo elegir la torta ideal para tu evento',
                'categoria_fk' => 2,
                'cuerpo' => 'Para elegir la torta ideal es importante considerar el tipo de evento, la cantidad de invitados, los sabores preferidos y el estilo de decoración que buscás.',
                'imagen' => 'entradas/torta-evento.jpg',
                'extracto' => 'Algunas recomendaciones para encontrar la torta adecuada para cada ocasión.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'La importancia de una mesa dulce',
                'categoria_fk' => 3,
                'cuerpo' => 'Una mesa dulce aporta variedad y una presentación especial a cumpleaños y celebraciones. La elección de sus productos permite acompañar la temática y el estilo de cada evento.',
                'imagen' => 'entradas/mesa-dulce.jpg',
                'extracto' => 'Ideas para complementar tus celebraciones con una mesa dulce.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
