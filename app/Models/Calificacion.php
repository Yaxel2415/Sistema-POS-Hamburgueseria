<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use Illuminate\Support\Facades\Auth;

class CalificacionController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Verificamos que el cliente esté autenticado
            if (!Auth::check()) {
                return response()->json(['success' => false, 'message' => '❌ No hay sesión activa.']);
            }

            $request->validate([
                'estrellas' => 'required|integer|min:1|max:5',
            ]);

            // Obtenemos el correo del cliente logueado
            $email = Auth::user()->email;

            // Guardamos la calificación
            Calificacion::create([
                'email' => $email,
                'estrellas' => $request->estrellas,
            ]);

            return response()->json(['success' => true, 'message' => '✅ Calificación guardada correctamente.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => '❌ Error: '.$e->getMessage()]);
        }
    }
}
