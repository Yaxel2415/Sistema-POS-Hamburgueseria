@extends('layouts.app')

@section('content')
<style>
/* Contenedor general */
.combos-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}

/* Fondo */
body {
    background: linear-gradient(rgba(0, 0, 0, 0.73), rgba(0,0,0,0.7)), url('{{ asset('assets/img/h.jpg') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 100vh;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
}

/* Header */
.header-combos {
    text-align: center;
    margin-bottom: 40px;
}
.header-combos h1 {
    color: #E99412;
    font-weight: bold;
    font-size: 2.5rem;
    margin-bottom: 10px;
}
.header-combos p {
    color: #f0f0f0;
    font-size: 1.1rem;
}

/* Grid */
.row.g-4 {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 20px;
}

/* Card combos */
.card-combo {
    background: #1e1e1e;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.card-combo:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 25px rgba(233, 148, 18, 0.4);
}

/* Imagen */
.card-img-top {
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(45deg, #E99412, #ff6700);
    padding: 15px;
}
.card-img-top img {
    max-height: 180px;
    border-radius: 10px;
    transition: transform 0.3s;
}
.card-img-top img:hover {
    transform: scale(1.05);
}

/* Contenido card */
.card-body {
    padding: 20px;
}
.card-body h5 {
    color: #E99412;
    font-weight: bold;
    font-size: 1.4rem;
    margin-bottom: 10px;
}
.card-body p {
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

/* Botón */
.btn-agregar {
    background: linear-gradient(135deg, #E99412, #ff6700);
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
    background: linear-gradient(135deg, #ff6700, #E99412);
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

<div class="combos-container">
    <div class="header-combos">
        <h1>🍔 Nuestros Combos</h1>
        <p>Selecciona tu combo favorito y agrégalo a tu carrito</p>
    </div>

    <div class="row g-4">
        @foreach($combos as $combo)
        <div>
            <div class="card-combo">
                <div class="card-img-top">
                    <img src="{{ asset($combo->imagen) }}" alt="{{ $combo->nombre }}">
                </div>
                <div class="card-body">
                    <h5>{{ $combo->nombre }}</h5>
                    <p>{{ $combo->descripcion }}</p>
                    <div class="precio">${{ number_format($combo->precio, 2) }}</div>
                    {{-- ✅ Formulario para agregar al carrito --}}
                    <form action="{{ route('carritoCliente.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nombre" value="{{ $combo->nombre }}">
                        <input type="hidden" name="precio" value="{{ $combo->precio }}">
                        <input type="hidden" name="imagen" value="{{ asset($combo->imagen) }}">
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
<a href="{{ route('catalogo.index') }}" class="btn-volver" style="display:flex;justify-content:center;align-items:center;font-size: 20px;gap:8px;">
<img src="{{ asset('assets/icons/black2.png') }}" alt="Carrito" style="width:35px;height:35px;"> Regresar</a>
</div>

@endsection
