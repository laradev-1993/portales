<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'nombre_completo',
        'email',
        'telefono',
        'tipo_torta',
        'cantidad_personas',
        'descripcion_tematica',
        'fecha_evento',
    ];
}
