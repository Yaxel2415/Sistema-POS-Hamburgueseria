<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen','oferta', 'precio_oferta'];

}
