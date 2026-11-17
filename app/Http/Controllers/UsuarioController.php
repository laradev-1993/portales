<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
   /**
     *  Mostrar el listado de usuarios registrados con su rol
     *
     */

     public function index()
    {
        $usuarios = User::with(['rol'])->get();

        return view('usuarios.index', [
            'usuarios' => $usuarios,
        ]);
    }
}
