<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Inserta los roles de usuario y administrador en la tabla de roles. 
     */
    public function run(): void
    {
        DB::table('roles')->insert([
        [ 'rol_id' => 1, 
        'nombre' => 'Administrador', 
        'created_at' => now(), 
        'updated_at' => now(), 
        ],
        [ 
        'rol_id' => 2, 
        'nombre' => 'Usuario',       
        'created_at' => now(), 
        'updated_at' => now(), 
        ],
    ]);
    }
}
