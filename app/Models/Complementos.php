<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complementos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen'];

}
