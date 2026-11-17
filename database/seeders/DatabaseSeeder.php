<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Pedir que se ejecute los otros seeder con el método "call()".
        //pasarle en un array los FQN de los Seeders que se quiere ejecutar, en el orden en que quiero que se ejecuten.

        $this->call([
            RolSeeder::class,
            UserSeeder::class,
             CategoriaSeeder::class,
             EtiquetaSeeder::class,
            EntradaSeeder::class,
             EntradaTieneEtiquetaSeeder::class,
            ProductoSeeder::class,
            UsuarioEncargaProductoSeeder::class,
           
        ]);
    }
}
