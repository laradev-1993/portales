<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles'; //para que no busque la tabla "rols"

     protected $primaryKey = 'rol_id';
}
