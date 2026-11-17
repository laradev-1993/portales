<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

     /**
     * Campos que se pueden asignar en masa.
     *
     */
    protected $fillable = [
        'imagen',
        'nombre',
        'descripcion',
        'caracteristicas',
        'precio',
    ];

/**
 * un Producto puede ser encargado por muchos usuarios
 */
public function usuarios(){
    return $this->belongsToMany( 
        User::class,
        'users_encargan_productos',
        'producto_fk',
        'user_fk',
        'id',
        'id',
    )->withTimestamps();
}

//     //Accessors y mutators

//    /**
//      * Devuelve el precio con formato de pesos - ej: 26.000).
//      */
//     public function precio(): Attribute{
//         return Attribute::make(
//             function($value){
//                 return number_format($value, 0, ',', '.');
//             }
//         );
//     }
}
