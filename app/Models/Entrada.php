<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    //Definir qué columnas se pueden cargar con "mass assignment" a través de create()
    protected $fillable = ['titulo', 'extracto', 'cuerpo', 'imagen', 'categoria_fk'];

    /**
     * Una entrada pertenece a una categoría.
     */
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_fk', 'id');
    }

    public function etiquetas(){
        return $this->belongsToMany(
            Etiqueta::class,  //* $related:(String) El FQN del modelo que representa la tabla relacionada
            'entradas_tienen_etiquetas', // -opcional- (String) El nombre de la tabla pivot
            'entrada_fk',
            'etiqueta_fk',
            'id',
            'etiqueta_id',
        );
    }
}