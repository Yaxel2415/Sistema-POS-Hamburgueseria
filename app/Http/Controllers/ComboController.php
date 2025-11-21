<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combos;

class ComboController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $combos = Combos::all();
        $combosOferta = Combos::whereNotNull('precio_oferta')->get();
        return view('combos.index', compact('combos', 'combosOferta'));
    }

        public function indexCliente()
    {
    $combos = Combos::all();
    return view('combosCliente.index', compact('combos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
