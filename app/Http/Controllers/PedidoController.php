<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        // Consulta base para ventas de clientes
        $query = DB::table('ventas')
            ->whereNull('id_usuario')
            ->orderBy('fecha', 'desc');

        // Aplicar búsqueda si existe
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('id_venta', 'LIKE', "%{$search}%")
                  ->orWhere('fecha', 'LIKE', "%{$search}%");
                
                // 🔽 CONVERTIR FORMATOS DE FECHA PARA BÚSQUEDA
                $this->aplicarBusquedaFecha($q, $search);
            });
        }

        // Paginación de 10 en 10
        $ventasPaginadas = $query->paginate(10);
        $idsVentas = $ventasPaginadas->pluck('id_venta');

        // Obtener detalles de las ventas paginadas
        $detalles = DB::table('venta_detalle')
            ->whereIn('id_venta', $idsVentas)
            ->get()
            ->groupBy('id_venta');

        // Calcular totales para cada venta
        foreach ($ventasPaginadas as $venta) {
            $venta->detalles = $detalles->get($venta->id_venta, collect());
            
            $subtotal = 0;
            foreach ($venta->detalles as $detalle) {
                $subtotal += $detalle->precio_unitario * $detalle->cantidad;
            }
            
            $iva = $subtotal * 0.16;
            $total = $subtotal + $iva;
            
            $venta->subtotal_calculado = $subtotal;
            $venta->iva_calculado = $iva;
            $venta->total_calculado = $total;
            
            // Formatear fecha para mostrar
            $venta->fecha_formateada = Carbon::parse($venta->fecha)
                ->format('d/m/Y H:i');
        }

        return view('pedidos.index', [
            'ventasPaginadas' => $ventasPaginadas,
            'detalles' => $detalles,
            'search' => $search
        ]);
    }

    /** 🔽 MÉTODO PARA CONVERTIR FORMATOS DE FECHA EN BÚSQUEDA */
    private function aplicarBusquedaFecha($query, $search)
    {
        try {
            // Intentar convertir "19/11/2025 21:50" a "2025-11-19 21:50:00"
            if (preg_match('/(\d{1,2})\/(\d{1,2})\/(\d{4}) (\d{1,2}):(\d{2})/', $search, $matches)) {
                $dia = $matches[1];
                $mes = $matches[2];
                $ano = $matches[3];
                $hora = $matches[4];
                $minuto = $matches[5];
                
                $fechaMySQL = sprintf('%04d-%02d-%02d %02d:%02d:00', $ano, $mes, $dia, $hora, $minuto);
                $query->orWhere('fecha', 'LIKE', "%{$fechaMySQL}%");
            }
            // Buscar solo fecha "19/11/2025"
            elseif (preg_match('/(\d{1,2})\/(\d{1,2})\/(\d{4})/', $search, $matches)) {
                $dia = $matches[1];
                $mes = $matches[2];
                $ano = $matches[3];
                
                $fechaMySQL = sprintf('%04d-%02d-%02d', $ano, $mes, $dia);
                $query->orWhere('fecha', 'LIKE', "%{$fechaMySQL}%");
            }
            // Buscar fecha sin año "19/11"
            elseif (preg_match('/(\d{1,2})\/(\d{1,2})/', $search, $matches)) {
                $dia = $matches[1];
                $mes = $matches[2];
                
                $query->orWhere('fecha', 'LIKE', "%-{$mes}-{$dia} %")
                      ->orWhere('fecha', 'LIKE', "%-{$mes}-{$dia}");
            }
            // Buscar solo hora "21:50"
            elseif (preg_match('/(\d{1,2}):(\d{2})/', $search, $matches)) {
                $hora = $matches[1];
                $minuto = $matches[2];
                
                $query->orWhere('fecha', 'LIKE', "% {$hora}:{$minuto}:%");
            }
        } catch (\Exception $e) {
            // Si hay error en la conversión, continuar con búsqueda normal
        }
    }

    public function contarPedidosNuevosApi()
    {
        $pedidosNuevos = DB::table('ventas')
            ->whereNull('id_usuario')
            ->where('created_at', '>=', now()->subHours(24))
            ->count();

        return response()->json(['pedidosNuevos' => $pedidosNuevos]);
    }

    /** 🔔 NUEVO MÉTODO PARA OBTENER PEDIDOS RECIENTES */
    public function obtenerPedidosRecientes()
    {
        $pedidosRecientes = DB::table('ventas')
            ->whereNull('id_usuario')
            ->where('created_at', '>=', now()->subMinutes(5)) // Últimos 5 minutos
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($pedido) {
                $pedido->fecha_formateada = Carbon::parse($pedido->fecha)->format('d/m/Y H:i');
                return $pedido;
            });

        return response()->json(['pedidosRecientes' => $pedidosRecientes]);
    }
}