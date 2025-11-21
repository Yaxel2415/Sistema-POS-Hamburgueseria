<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    /** 🛒 Mostrar carrito (para empleado) */
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    /** ➕ Agregar producto */
    public function agregar(Request $request)
    {
        $nombre = $request->nombre;
        $precio = floatval($request->precio);
        $imagen = $request->imagen;
        $ingredientes = $request->ingredientes ?? '';

        $carrito = session()->get('carrito', []);

            // 🔽 Descontar ingredientes del inventario
    if (!empty($ingredientes)) {
        // Separar los ingredientes enviados (por coma)
        $lista = array_map('trim', explode(',', $ingredientes));

        foreach ($lista as $nombreIngrediente) {
            // Buscar el ingrediente en inventario
            $item = Inventario::where('nombre_producto', $nombreIngrediente)->first();

            if ($item) {
                // Convertir mínimo stock a número
                $minimo = intval($item->minimo_stock);

                // Restar 1 al mínimo stock si hay existencias
                if ($minimo > 0) {
                    $item->minimo_stock = $minimo - 1;
                    $item->save();
                }
            }
        }
    }
        // Verificar si el producto ya existe (mismo nombre e ingredientes)
        $productoExistente = false;
        foreach ($carrito as $index => $item) {
            if ($item['nombre'] === $nombre && ($item['ingredientes'] ?? '') === $ingredientes) {
                $carrito[$index]['cantidad']++;
                $productoExistente = true;
                break;
            }
        }

        // Si no existe, lo agregamos como nuevo
        if (!$productoExistente) {
            $carrito[] = [
                'nombre' => $nombre,
                'ingredientes' => $ingredientes,
                'precio' => $precio,
                'imagen' => $imagen,
                'cantidad' => 1,
            ];
        }

        session(['carrito' => $carrito]);
        return redirect()->route('carrito.index');
    }

    /** ➖ Quitar producto del carrito */
    public function quitar($index)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$index])) {
            unset($carrito[$index]);
            $carrito = array_values($carrito);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index');
    }

    /** 🔁 Actualizar cantidad (sumar/restar) */
    public function update($index, Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$index])) {
            $accion = $request->accion;

            if (!isset($carrito[$index]['cantidad'])) {
                $carrito[$index]['cantidad'] = 1;
            }

            if ($accion === 'mas') {
                $carrito[$index]['cantidad']++;
            } elseif ($accion === 'menos') {
                $carrito[$index]['cantidad']--;

                if ($carrito[$index]['cantidad'] <= 0) {
                    unset($carrito[$index]);
                    $carrito = array_values($carrito);
                }
            }

            session()->put('carrito', $carrito);
        }

        return back();
    }

    /** ✅ Confirmar venta (para empleado) */
    public function confirmarVenta()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío.');
        }

        // Calcular totales
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * ($item['cantidad'] ?? 1);
        }

        $subtotal = $total / 1.16;
        $iva = $total - $subtotal;

        // Generar ID de venta
        $idVenta = uniqid('VTA_');
        $idUsuario = auth()->id() ?? 1;

        // Guardar venta principal
        DB::table('ventas')->insert([
            'id_venta' => $idVenta,
            'id_usuario' => $idUsuario,
            'fecha' => now(),
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Guardar detalle de productos
        foreach ($carrito as $item) {
            DB::table('venta_detalle')->insert([
                'id_venta_detalle' => uniqid('DET_'),
                'id_venta' => $idVenta,
                'id_producto' => $item['nombre'],
                'nombre_producto' => $item['nombre'],
                'ingredientes' => $item['ingredientes'] ?? '',
                'cantidad' => $item['cantidad'] ?? 1,
                'precio_unitario' => $item['precio'],
                'subtotal' => $item['precio'] * ($item['cantidad'] ?? 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Guardar datos del ticket en sesión
        session([
            'ticket_data' => [
                'id_venta' => $idVenta,
                'carrito' => $carrito,
                'subtotal' => $subtotal,
                'iva' => $iva,
                'total' => $total,
                'fecha' => now()->format('d/m/Y H:i'),
                'usuario' => auth()->user()->name ?? 'Empleado',
            ],
        ]);

        // Vaciar carrito
        session()->forget('carrito');

        // Redirigir a la generación del ticket
        return redirect()->route('ticket.generar');
    }

    /** 🧾 Historial de ventas (empleado) */
    public function historialVentas(Request $request)
    {
        $search = $request->get('search');
        $query = DB::table('ventas')->orderBy('fecha', 'desc');

        if ($search) {
            $query->where('id_venta', 'LIKE', "%{$search}%");
        }

        $ventasPaginadas = $query->paginate(10);
        $idsVentas = $ventasPaginadas->pluck('id_venta');

        $detalles = DB::table('venta_detalle')
            ->whereIn('id_venta', $idsVentas)
            ->get()
            ->groupBy('id_venta');

        return view('carrito.historial', [
            'ventasPaginadas' => $ventasPaginadas,
            'detalles' => $detalles,
            'search' => $search,
        ]);
    }

    /** 👤 Carrito del cliente */
    public function indexCliente()
    {
        $carrito = session()->get('carrito', []);
        return view('carritoCliente.index', compact('carrito'));
    }

    /** ➕ Agregar producto al carrito del cliente */
    public function agregarCliente(Request $request)
    {

            // 🔽 Descontar ingredientes del inventario
    if (!empty($ingredientes)) {
        // Separar los ingredientes enviados (por coma)
        $lista = array_map('trim', explode(',', $ingredientes));

        foreach ($lista as $nombreIngrediente) {
            // Buscar el ingrediente en inventario
            $item = Inventario::where('nombre_producto', $nombreIngrediente)->first();

            if ($item) {
                // Convertir mínimo stock a número
                $minimo = intval($item->minimo_stock);

                // Restar 1 al mínimo stock si hay existencias
                if ($minimo > 0) {
                    $item->minimo_stock = $minimo - 1;
                    $item->save();
                }
            }
        }
    }
        $this->agregar($request);
        return redirect()->route('carritoCliente.index');
    }

    /** ➖ Quitar producto del carrito del cliente */
    public function quitarCliente($index)
    {
        $this->quitar($index);
        return redirect()->route('carritoCliente.index');
    }

    /** 🔁 Actualizar cantidad del cliente */
    public function updateCliente($index, Request $request)
    {
        $this->update($index, $request);
        return back();
    }

    /** ✅ Confirmar venta del cliente */
    public function confirmarVentaCliente()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carritoCliente.index')->with('error', 'El carrito está vacío.');
        }

        // Calcular totales
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * ($item['cantidad'] ?? 1);
        }

        $subtotal = $total / 1.16;
        $iva = $total - $subtotal;

        // Generar ID de venta
        $idVenta = uniqid('VTA_');

        // Guardar venta principal
        DB::table('ventas')->insert([
            'id_venta' => $idVenta,
            'id_usuario' => null,
            'fecha' => now(),
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Guardar detalle de productos
        foreach ($carrito as $item) {
            DB::table('venta_detalle')->insert([
                'id_venta_detalle' => uniqid('DET_'),
                'id_venta' => $idVenta,
                'id_producto' => $item['nombre'],
                'nombre_producto' => $item['nombre'],
                'ingredientes' => $item['ingredientes'] ?? '',
                'cantidad' => $item['cantidad'] ?? 1,
                'precio_unitario' => $item['precio'],
                'subtotal' => $item['precio'] * ($item['cantidad'] ?? 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Guardar datos para el ticket
        session([
            'ticket_data' => [
                'id_venta' => $idVenta,
                'carrito' => $carrito,
                'subtotal' => $subtotal,
                'iva' => $iva,
                'total' => $total,
                'fecha' => now()->format('d/m/Y H:i'),
                'usuario' => 'Cliente',
            ],
        ]);

        // Vaciar carrito
        session()->forget('carrito');

        // Redirigir al ticket
        return redirect()->route('ticket.generar');
    }
}
