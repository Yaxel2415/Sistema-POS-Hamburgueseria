<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClienteAuthController extends Controller
{
    // Mostrar formulario de login de cliente
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // LOGIN de cliente
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar cliente
        $cliente = Cliente::where('email', $credentials['email'])->first();

        if ($cliente && Hash::check($credentials['password'], $cliente->password)) {
            Auth::guard('cliente')->login($cliente);
            $request->session()->regenerate();
            return redirect()->route('menucliente');
        }

        return back()->withErrors(['email' => 'Email o contraseña incorrectos.'])->withInput();
    }

    // REGISTRO de nuevo cliente
    public function register(Request $request)
    {
        $data = $request->validate([
            'id_cliente' => ['required', 'string', 'max:10', Rule::unique('cliente', 'id_cliente')],
            'nombre' => 'required|string|max:100',
            'Ap_Paterno' => 'nullable|string|max:100',
            'Ap_Materno' => 'nullable|string|max:100',
            'email' => ['required','email','max:150', Rule::unique('cliente', 'email')],
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Encriptar la contraseña
        $data['password'] = Hash::make($data['password']);

        $cliente = Cliente::create($data);
        Auth::guard('cliente')->login($cliente);

        return redirect()->route('menucliente');
    }

    // LOGOUT del cliente
    public function logout(Request $request)
    {
        Auth::guard('cliente')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
