@extends('layouts.app')

@section('content')
<style>
/* Contenedor general */
.hamburguesas-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}
body {
    background: linear-gradient(rgba(0, 0, 0, 0.73), rgba(0,0,0,0.7)), url('{{ asset('assets/img/h.jpg') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
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

/* Grid de tarjetitas */
.row.g-4 {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

/* Tarjetas */
.card-hamburguesa {
    background: #1e1e1e;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
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

/* Cuerpo de la tarjeta */
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
.precio {
    font-size: 1.3rem;
    font-weight: bold;
    color: #ff9500;
    margin-bottom: 15px;
}

/* Botón Agregar */
.btn-agregar {
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
.btn-agregar:hover {
    background: linear-gradient(135deg, #ff6700, #ff8c00);
    transform: scale(1.05);
}
.btn-volver{
    background: linear-gradient(135deg, #ff8c00, #ff6700);
    border: none;
    color: white;
    padding: 3px 10px;
    border-radius: 25px;
    font-weight: bold;
    height: -40px;
    width: 10%;
    transition: all 0.3s;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    position:center;
    align-items: center;
}
.btn-container {
  display: flex;
  justify-content: center;
  align-items: center; /* solo útil si hay altura definida */
  height: 100px; /* opcional, para centrar verticalmente */
  text-decoration: none;
}
</style>

<div class="hamburguesas-container">
    <div class="header-hamburguesas">
        <h1>🥗 Nuestros Complementos</h1>
        <p>Elige los mejores acompañamientos para tu hamburguesa</p>
    </div>

    <div class="row g-4">
        @foreach($complementos as $complemento)
        <div class="col-md-4">
            <div class="card-hamburguesa">
                <div class="card-img-top">
                    <img src="{{ asset($complemento->imagen) }}" alt="{{ $complemento->nombre }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $complemento->nombre }}</h5>
                    <p class="card-text">{{ $complemento->descripcion }}</p>
                    <div class="precio">${{ number_format($complemento->precio, 2) }}</div>
                    {{-- ✅ Formulario para agregar al carrito --}}
                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nombre" value="{{ $complemento->nombre }}">
                        <input type="hidden" name="precio" value="{{ $complemento->precio }}">
                        <input type="hidden" name="imagen" value="{{ asset($complemento->imagen) }}">
                        <button type="submit" class="btn-agregar">
                            🛒 Agregar al Carrito
                        </button>
                    </form>
                    {{-- ✅ Fin formulario --}}  
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="btn-container">
<a href="{{ route('sugerencias.index') }}" class="btn-volver" style="display:flex;justify-content:center;align-items:center;font-size: 20px;gap:8px;">
<img src="{{ asset('assets/icons/black2.png') }}" alt="Carrito" style="width:35px;height:35px;"> Regresar</a>
</div>

@endsection

