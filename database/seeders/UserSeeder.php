<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('users')->insert([

                    [
                        'name' => 'Juan',
                        'email' => 'juan@mail.com',
                        'password' => Hash::make('random'), //Método que Laravel provee para el hasheo
                        'rol_fk' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Lara',
                        'email' => 'lara@mail.com',
                        'password' => Hash::make('random'),
                        'rol_fk' => 2,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

       ]);
    }
}
