@extends('layouts.app')

@section('content')
<style>
body {
    background-color: #1d1b1b;
    color: #fff;
    font-family: 'Poppins', sans-serif;
}

.historial-container {
    max-width: 2300px;
    position: relative;
    top:-50px;
    margin: 40px auto;
    padding: 40px;
    background: #1c1c1c;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(14, 14, 14, 0.3);
}

.historial-container h1 {
    text-align: center;
    color: #e3bc8dff;
    font-weight: bold;
    margin-bottom: 30px;
}

.venta-card {
    background: #1d1b1b;
    border-radius: 10px;
    margin-bottom: 25px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(30, 30, 29, 0.2);
}

.venta-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #ff8c00;
    margin-bottom: 15px;
    padding-bottom: 10px;
}

.venta-header h3 {
    margin: 0;
    color: #e28c22ff;
}

.venta-header span {
    font-size: 0.9rem;
    color: #ccc;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

thead th {
    background: #e28c22ff;
    color: #000;
    padding: 8px;
    text-align: left;
}

tbody td {
    padding: 8px;
    border-bottom: 1px solid #444;
}

.total {
    text-align: right;
    margin-top: 10px;
    color: #e7922bff;
    font-weight: bold;
}

.btn-volver {
    display: block;
    margin: 30px auto;
    text-align: center;
    background: linear-gradient(135deg, #ff8c00, #ff6700);
    color: #fff;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: bold;
    text-decoration: none;
    width: 220px;
    transition: 0.3s;
}

.btn-volver:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #ff6700, #ff8c00);
}
.btn-regresar {
  display: inline-block;
  transition: transform 0.2s ease;
}

.btn-regresar:active {
  transform: scale(1.1);
}

.pagination-top {
    position: absolute;
    top: 70px;
    right: 80px;
}

.pagination {
    display: flex;
    gap: 15px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.page-circle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

.page-circle.prev {
    background-color: #aba9a9ff;
    color: #333;
}

.page-circle.prev:hover {
    background-color: #6c5ce7;
}
.page-circle.next {
    background-color: #6c5ce7;
    color: #fff;
}

.page-circle:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}

.disabled .page-circle {
    opacity: 0.5;
    pointer-events: none;
}

.search-container {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 20px;
    justify-content: center;
}

.search-form {
    display: flex;
    gap: 8px;
    align-items: center;
}

.search-input {
    padding: 10px 15px;
    border: 2px solid #444;
    border-radius: 8px;
    width: 300px;
    transition: all 0.3s;
    background: #2d2d2d;
    color: #fff;
    font-size: 14px;
}

.search-input:focus {
    border-color: #ff8c00;
    box-shadow: 0 0 0 0.2rem rgba(255, 140, 0, 0.25);
    outline: none;
}

.search-input::placeholder {
    color: #888;
}

.btn-search {
    background: linear-gradient(135deg, #ff8c00, #ff6700);
    border: none;
    color: white;
    border-radius: 8px;
    padding: 10px 20px;
    transition: 0.3s;
    cursor: pointer;
    font-weight: bold;
}

.btn-search:hover {
    background: linear-gradient(135deg, #ff6700, #ff8c00);
    transform: translateY(-2px);
}

.btn-clear {
    background: #6c5ce7;
    border: none;
    color: white;
    border-radius: 8px;
    padding: 10px 20px;
    transition: 0.3s;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-weight: bold;
}

.btn-clear:hover {
    background: #5744e6ff;
    color: white;
    transform: translateY(-2px);
}

/* NUEVOS ESTILOS PARA INGREDIENTES EN HISTORIAL */
.ingredientes-historial {
    font-size: 0.8rem;
    color: #dba445ff;
    margin-top: 4px;
    padding-left: 10px;
}

.ingredientes-title {
    font-weight: bold;
    font-size: 0.75rem;
    color: #e28c22ff;
    margin-bottom: 2px;
}

.ingrediente-item {
    display: block;
    margin: 1px 0;
    line-height: 1.2;
}

.producto-con-ingredientes {
    padding: 4px 0;
}

.contenedor-producto {
    border-left: 2px solid #e28c22ff;
    padding-left: 8px;
    margin: 4px 0;
}
</style>

<div class="historial-container">
    <h1>HISTORIAL DE VENTAS</h1>

    <!-- BUSCADOR -->
    <div class="search-container">
        <form method="GET" action="{{ route('carrito.historial') }}" class="search-form">
            <input type="text" 
                   name="search" 
                   class="search-input" 
                   placeholder="🔍 Buscar por ID de Venta..." 
                   value="{{ request('search') }}">
            <button type="submit" class="btn-search">Buscar</button>
            @if(request('search'))
                <a href="{{ route('carrito.historial') }}" class="btn-clear">Limpiar</a>
            @endif
        </form>
    </div>

    <div class="pagination-top">
        {{ $ventasPaginadas->appends(['search' => request('search')])->links('pagination.custom') }}
    </div>

    <a href="{{ route('menu') }}" class="btn-custom btn-regresar">
       <img src="{{ asset('assets/icons/back3.png') }}" alt="Icono regresar" style="height: 40px; transform: scale(1.2); vertical-align: middle;
        margin-right: 8px;  position: relative; top:-60px; left: 60px;">
    </a>

    @if($ventasPaginadas->isEmpty())
        @if(request('search'))
            <p style="text-align:center; color:#aaa; margin-top: 20px;">
                No se encontraron ventas con el ID: "{{ request('search') }}"
            </p>
        @else
            <p style="text-align:center; color:#aaa;">Aún no hay ventas registradas.</p>
        @endif
    @else
        @foreach($ventasPaginadas as $venta)
            <div class="venta-card">
                <div class="venta-header">
                    <h3>Venta #{{ $venta->id_venta }}</h3>
                    <span>Fecha: {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}</span>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach($detalles[$venta->id_venta] ?? [] as $detalle)
                            @php
                                $subtotal += $detalle->precio_unitario * $detalle->cantidad;
                            @endphp
                            <tr>
                                <td>
                                    <div class="contenedor-producto">
                                        <div class="producto-con-ingredientes">
                                            {{ $detalle->nombre_producto }}
                                            @if(!empty($detalle->ingredientes))
                                                <div class="ingredientes-historial">
                                                    <div class="ingredientes-title">🍔 Ingredientes:</div>
                                                    @php
                                                        // Convertir ingredientes a array si es string
                                                        if (is_string($detalle->ingredientes)) {
                                                            $ingredientesArray = array_map('trim', explode(',', $detalle->ingredientes));
                                                        } else {
                                                            $ingredientesArray = $detalle->ingredientes;
                                                        }
                                                    @endphp
                                                    
                                                    @foreach($ingredientesArray as $ingrediente)
                                                        @if(!empty(trim($ingrediente)))
                                                            <span class="ingrediente-item">• {{ trim($ingrediente) }}</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>${{ number_format($detalle->precio_unitario, 2) }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>${{ number_format($detalle->precio_unitario * $detalle->cantidad, 2) }}</td>
                            </tr>
                        @endforeach

                        @php
                            $iva = $subtotal * 0.16;
                            $total = $subtotal + $iva;
                        @endphp
                    </tbody>
                </table>

                <div class="total">
                    Subtotal: ${{ number_format($subtotal, 2) }} |
                    IVA (16%): ${{ number_format($iva, 2) }} |
                    Total: ${{ number_format($total, 2) }}
                </div>
            </div>
        @endforeach
    @endif

    <a href="{{ route('menu') }}" class="btn-volver">⬅ Volver Sugerencias</a>
</div>
@endsection