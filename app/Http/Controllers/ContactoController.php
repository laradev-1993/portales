<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto.index');
    }


    /**
     * Valida y guarda una consulta enviada desde el formulario de contacto.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
    'nombre_completo' => ['required', 'max:100'],
    'email' => ['nullable', 'email'],
    'telefono' => ['required', 'max:30'],
    'tipo_torta' => ['required', 'max:100'],
    'cantidad_personas' => ['required', 'integer', 'min:1', 'max:255'],
    'descripcion_tematica' => ['required'],
    'fecha_evento' => ['required', 'date', 'after:today'],
], [
    'nombre_completo.required' => 'El nombre completo es obligatorio.',
    'nombre_completo.max' => 'El nombre no puede superar los 100 caracteres.',
    'email.email' => 'El email no tiene un formato válido.',
    'telefono.required' => 'El teléfono es obligatorio.',
    'telefono.max' => 'El teléfono no puede superar los 30 caracteres.',
    'tipo_torta.required' => 'Indicá qué tipo de torta querés.',
    'tipo_torta.max' => 'El tipo de torta no puede superar los 100 caracteres.',
    'cantidad_personas.required' => 'Indicá para cuántas personas es la torta.',
    'cantidad_personas.integer' => 'La cantidad de personas debe ser un número entero.',
    'cantidad_personas.min' => 'La cantidad de personas debe ser al menos 1.',
    'cantidad_personas.max' => 'La cantidad de personas no puede superar 255.',
    'descripcion_tematica.required' => 'Contanos la temática o descripción de la torta.',
    'fecha_evento.required' => 'La fecha del evento es obligatoria.',
    'fecha_evento.date' => 'La fecha del evento no es válida.',
    'fecha_evento.after' => 'La fecha del evento debe ser posterior a hoy.',
]);

        Contacto::create($request->only([
            'nombre_completo',
            'email',
            'telefono',
            'tipo_torta',
            'cantidad_personas',
            'descripcion_tematica',
            'fecha_evento',
        ]));

        return to_route('contacto')
            ->with('feedback.message', 'Tu consulta fue enviada. Te respondemos a la brevedad.');
    }
}
