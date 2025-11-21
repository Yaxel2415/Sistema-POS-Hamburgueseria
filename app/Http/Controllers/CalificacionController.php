<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;

class CalificacionController extends Controller
{
    public function store(Request $request)
{
    try {
        // Verificar si el cliente está autenticado
        if (!session()->has('cliente_email')) {
            return response()->json(['error' => 'Cliente no autenticado.'], 401);
        }

        // Obtener el correo desde la sesión
        $email = session('cliente_email');

        // Validar que la calificación esté entre 1 y 5
        $validated = $request->validate([
            'estrellas' => 'required|integer|min:1|max:5',
        ]);

        // Guardar la calificación en la base de datos
        \DB::table('calificaciones')->insert([
            'email' => $email,
            'estrellas' => $validated['estrellas'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['success' => '⭐ Calificación guardada correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['error' => '❌ Error al guardar la calificación: ' . $e->getMessage()], 500);
    }
}
}
