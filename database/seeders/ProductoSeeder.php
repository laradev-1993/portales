<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('productos')->insert([
            [
                'imagen' => 'torta-1.jpg',
                'nombre' => 'Torta Oreo Premium',
                'descripcion' => 'Llevamos un clásico moderno a un nivel superior. Nuestra Torta Oreo está elaborada de forma 100% artesanal, cuidando el equilibrio justo de dulzor. Presenta una base compacta de galletas de chocolate amargo, un relleno untuoso de crema chantilly marmolada con trozos de Oreo y una delicada capa que aporta suavidad en cada bocado. Una opción perfecta para quienes buscan un postre vistoso, fresco y que le gusta a grandes y chicos por igual.',
                'caracteristicas' => 'COMPLETAR',
                'precio' => 26000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imagen' => 'torta-3.jpg',
                'nombre' => 'Torta de Limón y Crema',
                'descripcion' => 'Si buscas un postre ligero, refrescante y lleno de sabor, nuestra torta de limón es la elección ideal. Horneamos un bizcochuelo súper esponjoso y húmedo, que se deshace en la boca, y lo rellenamos con una crema de limón artesanal suave y con el punto exacto de acidez. Cada bocado combina la textura aireada del bizcocho con la intensidad cítrica de nuestra crema.',
                'caracteristicas' => 'COMPLETAR',
                'precio' => 33000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imagen' => 'torta-2.jpg',
                'nombre' => 'Tiramisu Italiano',
                'descripcion' => 'Déjate tentar por nuestro Tiramisú artesanal, elaborado fielmente según la receta tradicional italiana. Combinamos capas de suaves y ligeras vainillas, delicadamente humedecidas en un intenso café expreso de especialidad y un sutil toque de licor.',
                'caracteristicas' => 'COMPLETAR',
                'precio' => 22000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
