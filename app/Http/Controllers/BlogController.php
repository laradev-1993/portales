<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;

class BlogController extends Controller
{

/**
 * Muestra el listado completo de entradas del blog.
 *
 * Este método obtiene todos los registros de la tabla "entradas". Luego retorna la vista "blog.index" con la colección de entradas.
 *
 * @return \Illuminate\Contracts\View\View  
 */
    public function index(){

        
        // # Traer todos los registros:
        $entradas = Entrada::all();

            return view('blog.index', [
                
                'entradas' => $entradas
            ]);
    }


/**
 * Muestra una entrada del blog completa sola.
 *
 * @param  int  $id  Id de la entrada (parámetro de la ruta).
 * @return \Illuminate\Contracts\View\View
 */
    public function show(int $id){
        // #Traer datos con método findOrFail() o null, si no se encuentra registro devuelve 404.

         $entrada = Entrada::findOrFail($id);

            return view('blog.show', [
                'entrada' => $entrada,
      ]);
    }
    
}
