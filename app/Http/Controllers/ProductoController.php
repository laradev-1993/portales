<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Muestra el listado de productos.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', [
            'productos' => $productos,
        ]);
    }
   
}
