@extends('layouts.app')

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

@section('content')
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.74), rgba(0, 0, 0, 0.77)), url('{{ asset('assets/img/h.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        padding: 20px;
        color: #fff;
    }

    h2 {
        font-family: 'Fredoka One', cursive;
        color: #ffb347;
        text-align: center;
        margin-bottom: 40px;
        font-size:50px;
    }

    .tarjeta-oferta {
        background: linear-gradient(135deg, #ed961eff, #e6a52cff);
        border-radius: 20px;
        overflow: hidden;
        font-family: 'Arial';
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 179, 71, 0.2);
        text-align: center;
        padding: 15px;
        width: 270px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
    }

    .tarjeta-oferta:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(255, 179, 71, 0.4);
    }

    .tarjeta-oferta img {
        width: 100%;
        height: 210px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 10px;
    }

    .tarjeta-oferta h5 {
        color: #000;
        font-weight: bold;
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .tarjeta-oferta p {
        color: #333;
        font-size: 0.9rem;
        margin-bottom: 10px;
        height: 45px;
        overflow: hidden;
    }

    .precio-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .precio-original {
        text-decoration: line-through;
        color: #000000a4;
        font-size: 0.9rem;
    }

    .precio-oferta {
        color: #fff;
        font-size: 1.3rem;
        font-weight: bold;
        background: rgba(0, 0, 0, 0.2);
        padding: 5px 10px;
        border-radius: 8px;
    }

    .btn-carrito {
        background-color: #fff;
        color: #000;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 8px 20px;
        transition: all 0.3s ease-in-out;
    }

    .btn-carrito:hover {
        background-color: #000;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .contenedor-ofertas {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    /* ======= NUEVO DIV DE DATOS DE EMPRESA ======= */
        .info-empresa {
        background-color: #000;
        color: white;
        padding: 2.5rem 2rem;
        width:1540px;
        position:absolute;
        left: -90px;
        top:1145px;
        border-top: 2px solid white;
        border-bottom: 2px solid white;
        text-align: center;
  }

  .info-empresa h3 {
      color: #ff9d00;
      font-family: 'Fredoka One', cursive;
      font-size: 2rem;
  }

  .info-empresa p {
      font-family: 'Arial';
      margin: 5px 0;
      font-size: 1rem;
  }
</style>

<div class="container mt-5">
    <h2>Combos en Oferta</h2>

    <div class="contenedor-ofertas">
        @foreach($combosOferta as $combo)
        <div class="tarjeta-oferta">
            <img src="{{ asset($combo->imagen) }}" alt="{{ $combo->nombre }}">
            <h5>{{ $combo->nombre }}</h5>
            <p>{{ $combo->descripcion }}</p>

            <div class="precio-container">
                <span class="precio-original">${{ number_format($combo->precio, 2) }}</span>
                <span class="precio-oferta">${{ number_format($combo->precio_oferta, 2) }}</span>
            </div>

            <form action="{{ route('carritoCliente.agregar') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $combo->id }}">
                <input type="hidden" name="nombre" value="{{ $combo->nombre }}">
                <input type="hidden" name="precio" value="{{ $combo->precio_oferta }}">
                <input type="hidden" name="tipo" value="combo">

                <button type="submit" class="btn btn-carrito">
                    🛒 Agregar al Carrito
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>

<!-- NUEVO DIV - DATOS DE LA EMPRESA -->
<section class="info-empresa">
  <div class="container text-center">
    <h3 class="fw-bold mb-3">🍔Hamburgueseria</h3>
    <p>Dirección: Av. Principal #123, Ciudad del Sabor, México</p>
    <p>Teléfono: (555) 123-4567 | Correo: contacto@burgeseria.com</p>
    <p>Horario: Lunes a Domingo de 10:00 a 22:00 hrs</p>
    <p style="font-size: 0.9rem; color: #aaa; margin-top: 10px;">
      © 2025 Burgeseria - Todos los derechos reservados
    </p>
  </div>
</section>
@endsection
