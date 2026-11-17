<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Un usuario pertenece a un rol. (usuario - administrador)
     * 
     */

    public function rol(){
        return $this->belongsTo(Rol::class, 'rol_fk', 'rol_id');
    }

    /**
 * Un usuario puede encargar muchos productos (relación de muchos a muchos).
 */
public function productosEncargados(){
    return $this->belongsToMany( Producto::class, 
        'users_encargan_productos',
        'user_fk',
        'producto_fk',
        'id',
        'id',
    )->withTimestamps();
}
}
