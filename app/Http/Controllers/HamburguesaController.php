<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hamburguesa;

class HamburguesaController extends Controller
{
    public function index()
{
    // Trae todas las hamburguesas
    $hamburguesas = Hamburguesa::all();
    $hamburguesasOferta = Hamburguesa::whereNotNull('precio_oferta')->get();
    
    // Envía las hamburguesas a la vista
    return view('hamburguesas.index', compact('hamburguesas', 'hamburguesasOferta'));
}

public function menu()
    {
        // Obtener hamburguesas que tienen oferta (precio_oferta diferente de precio)
        $hamburguesas = Hamburguesa::where('precio_oferta', '<', \DB::raw('precio'))
                                  ->get();
        
        return view('menu2', compact('hamburguesas'));
    }

    public function indexCliente()
    {

    $hamburguesas = Hamburguesa::all();
    return view('hamburguesasCliente.index', compact('hamburguesas'));
}

}
