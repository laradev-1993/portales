<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradaTieneEtiquetaSeeder extends Seeder
{
   /**
     * relacionar cada entrada con sus etiquetas en la tabla pivote
     * 
     */
    public function run(): void {
       DB::table('entradas_tienen_etiquetas')->insert([
            [ 'entrada_fk' => 1, 
            'etiqueta_fk' => 1, 
            'created_at' => now(), 
            'updated_at' => now(), 
            ],
            [ 
                'entrada_fk' => 1, 
                'etiqueta_fk' => 5, 
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [
                'entrada_fk' => 2, 
                'etiqueta_fk' => 4, 
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'entrada_fk' => 2, 
                'etiqueta_fk' => 5, 
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [ 
                'entrada_fk' => 3, 
            'etiqueta_fk' => 3, 
            'created_at' => now(), 
            'updated_at' => now(), 
            ],
            [ 
                'entrada_fk' => 3, 
                'etiqueta_fk' => 4, 
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
        ]);
    }
}
