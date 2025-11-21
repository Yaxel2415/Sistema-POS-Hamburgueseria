<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $productos = Inventario::when($search, function($query, $search) {
            return $query->where('nombre_producto', 'LIKE', "%{$search}%")
                        ->orWhere('categoria', 'LIKE', "%{$search}%")
                        ->orWhere('proveedor', 'LIKE', "%{$search}%")
                        ->orWhere('id_producto', 'LIKE', "%{$search}%");
        })->paginate(10);
        
        return view('inventario.index', compact('productos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|unique:inventario',
            'nombre_producto' => 'required',
            'categoria' => 'required',
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required',
            'proveedor' => 'required',
            'precio_compra' => 'required|numeric',
            'minimo_stock' => 'required|numeric',
            'activo' => 'required',
        ]);

        Inventario::create($request->all());
        return redirect()->route('inventario.index')->with('success', 'Producto agregado con éxito.');
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
    public function edit(Inventario $inventario)
    {
         return view('inventario.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
         $request->validate([
            'nombre_producto' => 'required',
            'categoria' => 'required',
            'cantidad' => 'required|numeric',
            'unidad_medida' => 'required',
            'proveedor' => 'required',
            'precio_compra' => 'required|numeric',
            'minimo_stock' => 'required|numeric',
            'activo' => 'required',
        ]);

        $inventario->update($request->all());
        return redirect()->route('inventario.index')->with('success', 'Producto actualizado con éxito.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
         $inventario->delete();
        return redirect()->route('inventario.index')->with('success', 'Producto eliminado.');
    
    }

    public function armar()
    {
        $ingredientes = Inventario::where('categoria', 'ingrediente')
                                ->where('activo', '1')
                                ->get();

        return view('armar_hamburguesa.index', compact('ingredientes'));
    }

    public function armarCliente()
    {
        $ingredientes = Inventario::where('categoria', 'ingrediente')
                                ->where('activo', '1')
                                ->get();

        return view('armar_hamburguesa_Cliente.index', compact('ingredientes'));
    }
}