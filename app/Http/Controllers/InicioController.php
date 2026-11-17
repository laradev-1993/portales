<?php

namespace App\Http\Controllers;


// También hereda de la clase Controller con --extends--

class InicioController extends Controller{
   
    /**
     * Retorna una vista
     */
    public function index(){
        return view('welcome');
    }

   
}