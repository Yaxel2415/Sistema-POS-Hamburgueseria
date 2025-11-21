@extends('layouts.app')

@section('content')
<style>
body {
    background-color: #1d1b1bff;
    color: #fff;
    font-family: 'Poppins', sans-serif;
}

/* Contenedor */
.carrito-container {
    max-width: 4100px;
    margin: 40px auto;
    padding: 60px 50px;
    background: #1c1c1c;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(14, 14, 14, 0.3);
}

/* Encabezado */
.carrito-container h1 {
    text-align: center;
    color: #ff8c00;
    margin-bottom: 30px;
    font-weight: bold;
    font-size: 2.2rem;
}

/* Tabla */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
    position: relative;
    top:-70px;
}

thead th {
    background: #dba445ff;
    color: #000;
    padding: 10px;
    border-radius: 4px #ffffffff;
    font-size: 1.1rem;
}

tbody tr {
    background: #2b2b2b;
    border-radius: 10px;
    transition: transform 0.2s, box-shadow 0.2s;
}

tbody tr:hover {
    transform: scale(1.02);
    box-shadow: 0 5px 15px rgba(45, 44, 44, 0.3);
}

td {
    padding: 15px;
    text-align: center;
    vertical-align: middle;
    color: #f0f0f0;
    font-size: 1rem;
}

/* Imagen del producto */
td img {
    max-height: 80px;
    border-radius: 10px;
}

/* Botón quitar */
.btn-quitar {
    background: linear-gradient(135deg, #2b2b2b);
    color: #2b2b2b;
    border: none;
    padding: 8px 15px;
    position: relative;
    border-radius: 25px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s;
}

/* Hover dinámico */
.btn-quitar:hover {
    background: linear-gradient(100deg);
    transform: scale(1.20) rotate(-1deg);
    box-shadow: 0 16px 35px;
}

/* Efecto de "rebote" */
.btn-quitar:active {
    transform: scale(1.75);
}

/* Total */
.total {
    text-align: right;
    font-size: 1.6rem;
    position: relative;
    top:-80px;
    margin-top: 25px;
    font-weight: bold;
    color: #ffffffff;
    position: relative;
    left:100;
    padding: 10px;
    border-top: 5px solid #dba445ff;
}

/* Botón seguir comprando */
.btn-seguir {
    display: block;
    margin: 30px auto 0 auto;
    background: linear-gradient(135deg, #dba445ff);
    border: none;
    color: black;
    padding: 12px 25px;
    position: relative;
    top:-85px;
    left:-540px;
    border-radius: 5px;
    font-weight: bold;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.3s;
    text-align: center;
    width: 230px;
}

.btn-seguir:hover {
    background: linear-gradient(135deg, #de7e29ff, #e18c25ff);
    transform: scale(1.05);
}
/* Botón generar ticket */
.btn-menu {
    display: block;
    margin: 30px auto 0 auto;
    background: linear-gradient(135deg, #dba445ff);
    border: none;
    color: black;
    padding: 12px 25px;
    position: relative;
    top:-136px;
    left:-280px;
    border-radius: 3px;
    font-weight: bold;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.3s;
    text-align: center;
    width: 230px;
}

.btn-menu:hover {
    background: linear-gradient(135deg, #de7e29ff, #e18c25ff);
    transform: scale(1.05);
}
/* Botón generar pago */
.btn-pago {
    display: block;
    margin: 30px auto 0 auto;
    background: linear-gradient(135deg, #dba445ff);
    border: none;
    color: black;
    padding: 12px 25px;
    position: relative;
    top:-55px;
    left:-565px;
    border-radius: 3px;
    font-weight: bold;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.3s;
    text-align: center;
    width: 230px;
}

.btn-pago:hover {
    background: linear-gradient(135deg, #de7e29ff, #e18c25ff);
    transform: scale(1.05);
}
/* Botones + y - */
.btn-cantidad {
    background: #dba445ff;
    border: none;
    color: #fff;
    font-size: 1.2rem;
    font-weight: bold;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.btn-cantidad:hover {
    background: #ffa733;
    transform: scale(1.1);
}

.btn-cantidad:active {
    transform: scale(0.9);
}

</style>

<div class="carrito-container">
    <h1>
   <span style="color: #d3b860ff; font-size:50px;">🛒 TU ORDEN</span> <span style="color: #ffffffff;font-size:50px;">PERFECTA</span>
    </h1>

    <a href="{{ route('sugerencias.index') }}" class="btn-seguir"><img src="{{ asset('assets/icons/black2.png') }}" alt="Icono" style="height: 27px; vertical-align: middle; margin-right: 8px;">
  Seguir comprando
</a>

    @if(count($carrito) > 0)
        <table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>   <!-- Nueva columna -->
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($carrito as $index => $item)
            <tr>
                <td>
                    <strong>{{ $item['nombre'] }}</strong>
                </td>
                <td>
                    ${{ number_format($item['precio'], 2) }}
                </td>
                
                <!-- CANTIDAD -->
                <td>
                    <form action="{{ url('/carrito/update/'.$index) }}" method="POST" style="display:flex; align-items:center; justify-content:center; gap:8px;">
                        @csrf
                        <button type="submit" name="accion" value="menos" class="btn-cantidad">➖</button>
                        <span style="min-width:25px; text-align:center;">{{ $item['cantidad'] ?? 1 }}</span>
                        <button type="submit" name="accion" value="mas" class="btn-cantidad">➕</button>
                    </form>
                </td>

                <!-- ELIMINAR -->
                <td>
                    <form action="{{ url('/carrito/quitar/'.$index) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-quitar">
                            <img src="{{ asset('assets/icons/delete.png') }}" alt="Quitar" style="width:40px; height:40px; vertical-align:middle;">
                        </button>
                    </form>
                </td>
            </tr>
            @php 
                $total += ($item['precio'] * ($item['cantidad'] ?? 1)); 
            @endphp
        @endforeach
    </tbody>
</table>
        <div class="total">
            Total: ${{ number_format($total, 2) }}
            
            
            <div class="d-flex gap-2 mt-4">
            <form action="{{ route('carrito.confirmar') }}" method="POST">
             @csrf
            <button type="submit" class="btn-pago"><img src="{{ asset('assets/icons/pago.png') }}" alt="Icono" style="height: 27px; vertical-align: middle; margin-right: 8px;">
            Confirmar Venta
            </button>
            </form>
    
            <a href="{{ route('menu') }}" class="btn-menu"><img src="{{ asset('assets/icons/casa.png') }}" alt="Icono" style="height: 27px; vertical-align: middle; margin-right: 8px;">
            Menú Principal</a> </div>

        </div>
    @else
        <p style="text-align:center; font-size:1.2rem; color:#aaa; position: relative; top:-50px;">Tu carrito está vacío.</p>
    @endif
</div>
@endsection
