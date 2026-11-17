<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsuarioEncargaProductoSeeder extends Seeder
{
    /**
     *
     * Carga los productos que encargaron los usuarios en la tabla pivote.
     */
    public function run(): void
    {
       
        DB::table('users_encargan_productos')->insert([
            [
             'user_fk' => 2,
              'producto_fk' => 1,
              'created_at' => now(),
               'updated_at' => now(),
            ],
            [
                'user_fk' => 2,
                'producto_fk' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
