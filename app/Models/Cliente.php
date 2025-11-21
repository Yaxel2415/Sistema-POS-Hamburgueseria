<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;

    protected $table = 'cliente'; // nombre exacto de la tabla

    protected $fillable = [
        'id_cliente',
        'nombre',
        'Ap_Paterno',
        'Ap_Materno',
        'email',
        'password',
        'telefono',
        'direccion'
    ];

    protected $hidden = ['password', 'remember_token'];

    public $timestamps = true;
}
