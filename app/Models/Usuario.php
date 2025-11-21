<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario'; // nombre exacto de la tabla

    protected $fillable = [
        'id_usuario',
        'nombre_user',
        'password',
        'nombre',
        'Ap_Paterno',
        'Ap_Materno',
        'email',
        'numero_tel',
        'direccion'
    ];

    protected $hidden = ['password', 'remember_token'];
}
