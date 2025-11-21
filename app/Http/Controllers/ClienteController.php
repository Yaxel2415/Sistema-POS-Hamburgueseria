<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $clientes = Cliente::when($search, function($query, $search) {
            return $query->where('nombre', 'LIKE', "%{$search}%")
                        ->orWhere('Ap_Paterno', 'LIKE', "%{$search}%")
                        ->orWhere('Ap_Materno', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('id_cliente', 'LIKE', "%{$search}%");
        })->paginate(10);
        
        return view('cliente.index', compact('clientes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|unique:cliente',
            'nombre' => 'required',
            'Ap_Paterno' => 'required',
            'Ap_Materno' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success', 'Cliente agregado correctamente.');
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
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'id_cliente' => 'required|unique:cliente,id_cliente,' . $cliente->id,
            'nombre' => 'required',
            'Ap_Paterno' => 'required',
            'Ap_Materno' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
         $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}