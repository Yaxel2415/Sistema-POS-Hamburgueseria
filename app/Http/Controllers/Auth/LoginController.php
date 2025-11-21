<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar formulario de login general
    public function showLoginFormUsuario()
    {
        return view('auth.login');
    }

    // Procesar login de usuario (EMPLEADOS - CON ENCRIPCIÓN)
    public function loginUsuario(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Buscar usuario por ID
        $usuario = Usuario::where('id_usuario', $request->id_usuario)->first();

        // Verificar contraseña encriptada
        if ($usuario && Hash::check($request->password, $usuario->password)) {
            session([
                'usuario_autenticado' => true,
                'usuario_id' => $usuario->id_usuario,
                'usuario_nombre' => $usuario->nombre,
            ]);

            return redirect()->route('menu');
        }

        return back()->withErrors(['id_usuario' => 'Usuario o contraseña incorrectos.']);
    }

    // Mostrar login de cliente
    public function showLoginFormCliente()
    {
        return view('auth.logincliente');
    }

    // Procesar login de cliente (CON ENCRIPCIÓN)
    public function loginCliente(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar cliente por email
        $cliente = Cliente::where('email', $request->email)->first();

        // Verificar contraseña encriptada
        if ($cliente && Hash::check($request->password, $cliente->password)) {
            session([
                'cliente_autenticado' => true,
                'cliente_id' => $cliente->id_cliente,
                'cliente_nombre' => $cliente->nombre . ' ' . $cliente->Ap_Paterno,
                'cliente_email' => $cliente->email
            ]);

            return redirect()->route('menucliente');
        }

        return back()->withErrors(['email' => 'Email o contraseña incorrectos.']);
    }

    // Generar ID automático para clientes
    private function generarIdCliente($nombre)
    {
        // Tomar las 3 primeras letras del nombre (en mayúsculas)
        $iniciales = strtoupper(substr($nombre, 0, 3));
        
        // Generar 4 números aleatorios
        $numeros = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        
        $idPropuesto = $iniciales . $numeros;
        
        // Verificar si el ID ya existe
        $existe = Cliente::where('id_cliente', $idPropuesto)->exists();
        
        // Si existe, generar uno nuevo
        if ($existe) {
            return $this->generarIdCliente($nombre);
        }
        
        return $idPropuesto;
    }

    // REGISTRO de nuevo cliente (CON ENCRIPCIÓN)
    public function registerCliente(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'Ap_Paterno' => 'nullable|string|max:100',
            'Ap_Materno' => 'nullable|string|max:100',
            'email' => 'required|email|max:150|unique:cliente,email',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:30',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Generar ID automático
        $data['id_cliente'] = $this->generarIdCliente($data['nombre']);

        // Encriptar la contraseña
        $data['password'] = Hash::make($data['password']);

        // Crear cliente
        $cliente = Cliente::create($data);

        // Iniciar sesión automáticamente después del registro
        session([
            'cliente_autenticado' => true,
            'cliente_id' => $cliente->id_cliente,
            'cliente_nombre' => $cliente->nombre . ' ' . $cliente->Ap_Paterno,
            'cliente_email' => $cliente->email
        ]);

        // Mostrar ID generado al usuario
        return redirect()->route('menucliente')->with([
            'success' => '¡Registro exitoso! Tu ID de cliente es: ' . $data['id_cliente'],
            'id_generado' => $data['id_cliente']
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}