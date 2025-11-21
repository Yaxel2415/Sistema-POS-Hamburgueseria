<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - Hamburguesería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .order-card {
            border-left: 4px solid #007bff;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .order-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }
        .order-items {
            padding: 15px;
        }
        .table-products {
            font-size: 0.9rem;
        }
        .ingredientes-list {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }
        .search-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .pagination-info {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Encabezado -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">📋 Pedidos Confirmados</h1>
            <a href="{{ route('menu') }}" class="btn btn-primary"><img src="{{ asset('assets/icons/black2.png') }}" alt="Volver"style="width: 20px; margin-right: 5px;">Volver al Menú Principal</a>
        </div>

        <!-- Buscador y Paginación -->
        <div class="search-container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <!-- Formulario de Búsqueda -->
                    <form method="GET" action="{{ route('pedidos.index') }}" class="d-flex">
                        <div class="input-group">
                            <input type="text" 
                                   name="search" 
                                   class="form-control" 
                                   placeholder="Buscar por ID de venta o fecha..." 
                                   value="{{ $search ?? '' }}"
                                   aria-label="Buscar pedidos">
                            <button class="btn btn-outline-primary" type="submit">
                                🔍 Buscar
                            </button>
                            @if($search)
                                <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary">
                                    ✕ Limpiar
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-end">
                    <!-- Información de Paginación -->
                    @if($ventasPaginadas->total() > 0)
                        <div class="pagination-info">
                            Mostrando 
                            <strong>{{ $ventasPaginadas->firstItem() }} - {{ $ventasPaginadas->lastItem() }}</strong>
                            de <strong>{{ $ventasPaginadas->total() }}</strong> pedidos
                        </div>
                        <!-- Paginación -->
                        <nav aria-label="Paginación de pedidos">
                            <ul class="pagination pagination-sm justify-content-end mb-0 mt-2">
                                {{ $ventasPaginadas->appends(['search' => $search])->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>

        @if($ventasPaginadas->count() > 0)
            <div class="row">
                @foreach($ventasPaginadas as $venta)
                <div class="col-12 mb-4">
                    <div class="card order-card">
                        <div class="order-header">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="mb-1">Pedido #{{ $venta->id_venta }}</h5>
                                    <small class="text-muted">
                                       <strong>Fecha:</strong> {{ $venta->fecha_formateada }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-success">CONFIRMADO</span>
                                    <div class="mt-1">
                                        <small class="text-muted">Total: ${{ number_format($venta->total_calculado, 2) }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="order-items">
                            <!-- Productos del Pedido -->
                            <h6 class="mb-3">🍔 Productos del Pedido:</h6>
                            @if($venta->detalles && count($venta->detalles) > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered table-products">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Producto</th>
                                                <th width="100" class="text-center">Cantidad</th>
                                                <th width="120" class="text-end">Precio Unitario</th>
                                                <th width="120" class="text-end">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($venta->detalles as $detalle)
                                            <tr>
                                                <td>
                                                    <div class="fw-bold">{{ $detalle->nombre_producto }}</div>
                                                    @if(!empty($detalle->ingredientes))
                                                        <div class="ingredientes-list">
                                                            <small class="text-muted">
                                                                <strong>Ingredientes:</strong> 
                                                                {{ $detalle->ingredientes }}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $detalle->cantidad }}</td>
                                                <td class="text-end">${{ number_format($detalle->precio_unitario, 2) }}</td>
                                                <td class="text-end">${{ number_format($detalle->precio_unitario * $detalle->cantidad, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="table-light">
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                                <td class="text-end">${{ number_format($venta->subtotal_calculado, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>IVA (16%):</strong></td>
                                                <td class="text-end">${{ number_format($venta->iva_calculado, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                                <td class="text-end"><strong>${{ number_format($venta->total_calculado, 2) }}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    No hay información de productos para este pedido.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Paginación Inferior -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="pagination-info">
                    Mostrando 
                    <strong>{{ $ventasPaginadas->firstItem() }} - {{ $ventasPaginadas->lastItem() }}</strong>
                    de <strong>{{ $ventasPaginadas->total() }}</strong> pedidos
                </div>
                <nav aria-label="Paginación inferior">
                    <ul class="pagination justify-content-end">
                        {{ $ventasPaginadas->appends(['search' => $search])->links('pagination::bootstrap-5') }}
                    </ul>
                </nav>
            </div>
        @else
            <div class="alert alert-info text-center">
                <h4>📭 No hay pedidos confirmados</h4>
                <p class="mb-0">
                    @if($search)
                        No se encontraron pedidos para "{{ $search }}"
                    @else
                        Aún no hay ventas confirmadas por los clientes.
                    @endif
                </p>
                @if($search)
                    <a href="{{ route('pedidos.index') }}" class="btn btn-primary mt-2">Ver todos los pedidos</a>
                @endif
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>