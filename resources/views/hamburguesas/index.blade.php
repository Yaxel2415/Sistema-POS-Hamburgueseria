@extends('layouts.app')

@section('content')
<style>
/* ==================== ESTILOS GENERALES ==================== */
body {
    background: linear-gradient(rgba(0, 0, 0, 0.73), rgba(0,0,0,0.7)), url('{{ asset('assets/img/h.jpg') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 100vh;
    padding: 20px;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    margin: 0;
}

/* ==================== SECCIÓN DE HAMBURGUESAS ==================== */
.hamburguesas-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}

/* Header */
.header-hamburguesas {
    text-align: center;
    margin-bottom: 40px;
}
.header-hamburguesas h1 {
    color: #ff6700;
    font-weight: bold;
    font-size: 2.5rem;
    margin-bottom: 10px;
}
.header-hamburguesas p {
    color: #f0f0f0;
    font-size: 1.1rem;
}

/* Grid */
.row.g-4, .row-ofertas {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

/* Tarjetas generales */
.card-hamburguesa {
    background: #1e1e1e;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 5px 15px rgba(255, 103, 0, 0.2);
}
.card-hamburguesa:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 25px rgba(255, 103, 0, 0.4);
}

/* Imagen */
.card-img-top {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(45deg, #ff8c00, #ff6700);
    padding: 15px;
}
.card-img-top img {
    max-height: 200px;
    border-radius: 10px;
    transition: transform 0.3s;
}
.card-img-top img:hover {
    transform: scale(1.05);
}

/* Cuerpo */
.card-body {
    padding: 20px;
}
.card-title {
    color: #ff8c00;
    font-weight: bold;
    font-size: 1.4rem;
    margin-bottom: 10px;
}
.card-text {
    color: #ddd;
    font-size: 0.95rem;
    margin-bottom: 15px;
    min-height: 60px;
}

/* Precios normales y de oferta */
.precio {
    font-size: 1.3rem;
    font-weight: bold;
    color: #ff9500;
    margin-bottom: 15px;
}
.precio-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-bottom: 15px;
}
.precio-original {
    text-decoration: line-through;
    color: #aaa;
    font-size: 1rem;
}
.precio-oferta {
    color: #ffb347;
    font-size: 1.4rem;
    font-weight: bold;
}

/* Botón agregar */
.btn-agregar, .btn-carrito {
    background: linear-gradient(135deg, #ff8c00, #ff6700);
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: bold;
    width: 100%;
    transition: all 0.3s;
    cursor: pointer;
}
.btn-agregar:hover, .btn-carrito:hover {
    background: linear-gradient(135deg, #ff6700, #ff8c00);
    transform: scale(1.05);
}

/* ==================== BOTÓN VOLVER ==================== */
.btn-volver {
    background: linear-gradient(135deg, #ff8c00, #ff6700);
    border: none;
    color: white;
    padding: 3px 10px;
    border-radius: 25px;
    font-weight: bold;
    width: 10%;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}
.btn-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
}

/* ==================== FOOTER ==================== */
.footer-empresa {
    background-color: rgba(0, 0, 0, 0.85);
    color: #f8f8f8;
    text-align: center;
    padding: 25px 10px;
    border-top: 2px solid #ffb347;
    margin-top: 60px;
    font-family: 'Poppins', sans-serif;
    font-size: 0.95rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.footer-empresa h4 {
    color: #ffb347;
    margin-bottom: 10px;
    font-weight: bold;
}
.footer-empresa p {
    margin: 3px 0;
}
</style>

<!-- ==================== HAMBURGUESAS NORMALES ==================== -->
<div class="hamburguesas-container">
    <div class="header-hamburguesas">
        <h1>🍔 Nuestras Hamburguesas</h1>
        <p>Selecciona tu hamburguesa favorita y disfruta de tus sabores preferidos</p>
    </div>

    <div class="row g-4">
        @foreach($hamburguesas as $hamburguesa)
        <div>
            <div class="card-hamburguesa">
                <div class="card-img-top">
                    <img src="{{ asset($hamburguesa->imagen) }}" alt="{{ $hamburguesa->nombre }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $hamburguesa->nombre }}</h5>
                    <p class="card-text">{{ $hamburguesa->descripcion }}</p>
                    <div class="precio">${{ number_format($hamburguesa->precio, 2) }}</div>

                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nombre" value="{{ $hamburguesa->nombre }}">
                        <input type="hidden" name="precio" value="{{ $hamburguesa->precio }}">
                        <input type="hidden" name="imagen" value="{{ asset($hamburguesa->imagen) }}">
                        <button type="submit" class="btn-agregar">
                            🛒 Agregar al Carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==================== HAMBURGUESAS EN OFERTA ==================== -->
<div class="hamburguesas-container">
    <div class="header-hamburguesas">
        <h1>🔥 Hamburguesas en Oferta</h1>
        <p>¡Aprovecha nuestras promociones limitadas y disfruta al máximo!</p>
    </div>

    <div class="row-ofertas">
        @foreach($hamburguesasOferta as $hamburguesa)
        <div>
            <div class="card-hamburguesa">
                <div class="card-img-top">
                    <img src="{{ asset($hamburguesa->imagen) }}" alt="{{ $hamburguesa->nombre }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $hamburguesa->nombre }}</h5>
                    <p class="card-text">{{ $hamburguesa->descripcion }}</p>
                    <div class="precio-container">
                        <span class="precio-original">${{ number_format($hamburguesa->precio, 2) }}</span>
                        <span class="precio-oferta">${{ number_format($hamburguesa->precio_oferta, 2) }}</span>
                    </div>

                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $hamburguesa->id }}">
                        <input type="hidden" name="nombre" value="{{ $hamburguesa->nombre }}">
                        <input type="hidden" name="precio" value="{{ $hamburguesa->precio_oferta }}">
                        <input type="hidden" name="tipo" value="hamburguesa">
                        <button type="submit" class="btn-carrito">
                            🛒 Agregar al Carrito
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- ==================== BOTÓN REGRESAR ==================== -->
<div class="btn-container">
    <a href="{{ route('sugerencias.index') }}" class="btn-volver" style="display:flex;justify-content:center;align-items:center;font-size:20px;gap:8px;">
        <img src="{{ asset('assets/icons/black2.png') }}" alt="Regresar" style="width:35px;height:35px;"> Regresar
    </a>
</div>

@endsection
