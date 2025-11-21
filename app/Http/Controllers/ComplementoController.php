<?php

namespace App\Http\Controllers;

use App\Models\Complementos;
use Illuminate\Http\Request;

class ComplementoController extends Controller
{
    public function index()
    {
        $complementos = Complementos::all();
        return view('complementos.index', compact('complementos'));
    }

    public function indexCliente()
    {
    $complementos = Complementos::all();
    return view('complementosCliente.index', compact('complementos'));
    }
}
