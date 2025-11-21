<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    public function index()
    {
        $bebidas = Bebida::all();
        return view('bebidas.index', compact('bebidas'));
    }

    public function indexCliente()
{
    $bebidas = Bebida::all();
    return view('bebidasCliente.index', compact('bebidas'));
}

}
