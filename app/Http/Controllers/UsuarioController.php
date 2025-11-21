<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $usuarios = Usuario::when($search, function($query, $search) {
            return $query->where('nombre', 'LIKE', "%{$search}%")
                        ->orWhere('nombre_user', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('id_usuario', 'LIKE', "%{$search}%");
        })->paginate(10);
        
        return view('usuario.index', compact('usuarios', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'id_usuario'   => 'required|unique:usuario',
            'nombre_user'  => 'required|unique:usuario',
            'password'     => 'required|min:6',
            'nombre'       => 'required',
            'Ap_Paterno'   => 'required',
            'Ap_Materno'   => 'required',
            'email'        => 'required|email|unique:usuario',
            'numero_tel'   => 'required',
            'direccion'    => 'required',
        ]);

        Usuario::create([
            'id_usuario'  => $request->id_usuario,
            'nombre_user' => $request->nombre_user,
            'password'    => Hash::make($request->password),
            'nombre'      => $request->nombre,
            'Ap_Paterno'  => $request->Ap_Paterno,
            'Ap_Materno'  => $request->Ap_Materno,
            'email'       => $request->email,
            'numero_tel'  => $request->numero_tel,
            'direccion'   => $request->direccion,
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuario agregado correctamente.');
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
    public function edit(Usuario $usuario)
    {
         return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
         $request->validate([
            'id_usuario'   => 'required|unique:usuario,id_usuario,' . $usuario->id,
            'nombre_user'  => 'required|unique:usuario,nombre_user,' . $usuario->id,
            'nombre'       => 'required',
            'Ap_Paterno'   => 'required',
            'Ap_Materno'   => 'required',
            'email'        => 'required|email|unique:usuario,email,' . $usuario->id,
            'numero_tel'   => 'required',
            'direccion'    => 'required',
        ]);

        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
         $usuario->delete();
        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente.');
    }
}