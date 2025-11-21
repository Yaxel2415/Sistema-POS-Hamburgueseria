<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hamburguesa;
use App\Models\Combos;

class OfertasController extends Controller
{
    // Mostrar hamburguesas en oferta
    public function hamburguesas()
    {
        $hamburguesasOferta = Hamburguesa::where('precio_oferta', '>', 0)->get();
        return view('ofertas.hamburguesas', compact('hamburguesasOferta'));
    }

    // Mostrar combos en oferta
    public function combos()
    {
        $combosOferta = Combos::where('precio_oferta', '>', 0)->get();
        return view('ofertas.combos', compact('combosOferta'));
    }

    public function todas()
    {
    $hamburguesasOferta = Hamburguesa::whereNotNull('precio_oferta')->get();
    $combosOferta = Combos::whereNotNull('precio_oferta')->get();

    return view('ofertas_todas.todas', compact('hamburguesasOferta', 'combosOferta'));
   }

}
