@extends('layouts.app')

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

@section('content')
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.73), rgba(0, 0, 0, 0.77)), url('{{ asset('assets/img/h.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        padding: 20px;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    /* === NAVBAR === */
    /* --- Estilos del Navbar y Sidebar --- */
.navbar-custom {
    position: fixed; /* o usa 'sticky' si prefieres */
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000; /* asegura que esté por encima de otros elementos */
    background-color: #0e0e0eff;
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
}


    .navbar-left { display: flex; align-items: center; gap: 30px; }
    .navbar-left a { color: white; text-decoration: none; font-weight: bold; font-size: 1.5rem; display: flex; align-items: center; gap: 10px; transition: color 0.3s; }
    .navbar-left a:hover { color: #ff9d00; transform: scale(1.1); }
    .navbar-left img { width: 60px; height: 45px; }

    .navbar-right { display: flex; align-items: center; gap: 8px; }
    .navbar-right span { font-weight: bold; color: white; font-size: 1.5rem; }
    .apagar-icon { width: 70px; height: 38px; cursor: pointer; position: relative; top: 8px; transition: 0.3s; filter: invert(67%) sepia(78%) saturate(1300%) hue-rotate(2deg) brightness(102%) contrast(80%); }
    .apagar-icon:hover { filter: invert(84%) sepia(90%) saturate(1800%) hue-rotate(15deg) brightness(115%) contrast(80%); transform: scale(1.1); }

        .carrito-link {
    margin-left: 1px; /* separa el carrito de los otros enlaces */
    display: flex;
    align-items: center;
    gap: 10px;
}

.carrito-icon {
    width: 30px;
    height: 30px;
    transition: transform 0.3s ease;
}

.carrito-link:hover .carrito-icon {
    transform: scale(1.1) rotate(10deg);
}
    .sidebar {
        position: fixed;
        top: 0;
        left: -260px;
        width: 280px;
        height: 100%;
        background: linear-gradient(180deg, #bd8d40ff, #bb8942ff);
        color: black;
        transition: all 0.4s ease;
        box-shadow: 4px 0 12px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        padding-top: 15px;
    }
    .sidebar.open { left: 0; }
    .sidebar-header { display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
    .sidebar-header h3 { font-family: 'Fredoka One', cursive; color: #000; font-size: 1.3rem;}
    .sidebar-header button { background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer; }
    .sidebar-links { list-style: none; padding: 0; margin-top: 10px; }
    .sidebar-links li { padding: 13px 15px; transition: background 0.3s ease; font-size: 1.rem;}
    .sidebar-links li:hover { background: rgba(255,255,255,0.2); }
    .sidebar-links a { color: black; text-decoration: none; font-weight: bold; display: flex; align-items: center; gap: 8px; }
    /* === OFERTAS === */
    h2 {
    font-family: 'Fredoka One', cursive;
    color: #ffb347;
    font-size:50px;
    text-align: center;
    margin-bottom: 1px;
    margin-top: 80px; /* antes era 30px */
    padding-top: 50px;

}


    .tarjeta-oferta {
        background: linear-gradient(135deg, #ed961eff, #e6a52cff);
        border-radius: 20px;
        overflow: hidden;
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
    .info-empresa {
        background-color: #000;
        color: white;
        padding: 2.5rem 2rem;
        width:1430px;
        position:absolute;
        top:2470px;
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
      margin: 5px 0;
      font-size: 1rem;
  }
</style>

<!-- ===== NAVBAR ===== -->
<div class="navbar-custom">
    <div class="navbar-left">
        <a href="#" id="menuToggle">
            <img src="{{ asset('assets/icons/home.png') }}" alt="Inicio">
            <span>Menu</span>
        </a>
        <a href="{{ route('ofertas_todas.todas') }}">Ofertas</a>
        <a href="{{ route('acercade') }}">Acerca de!</a>
        <a href="{{ route('carritoCliente.index') }}" class="carrito-link">
            <span>Carrito</span>
            <img src="{{ asset('assets/icons/carrito.png') }}" alt="Carrito" class="carrito-icon">
        </a>
    </div>

    <div class="navbar-right">
        <a href="{{ route('login') }}" style="text-decoration: none; color: inherit;">
            <span>Salir</span>
            <img src="{{ asset('assets/icons/apagar.png') }}" alt="Salir" class="apagar-icon">
        </a>
    </div>
</div>

<!-- ===== SIDEBAR ===== -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3>Menú Cliente</h3>
    </div>
    <ul class="sidebar-links">
        <li><a href="{{ route('hamburguesasCliente.index') }}">🍔 Hamburguesas</a></li>
        <li><a href="{{ route('bebidasCliente.index') }}">🥤 Bebidas</a></li>
        <li><a href="{{ route('combosCliente.index') }}">🍟 Combos</a></li>
        <li><a href="{{ route('complementosCliente.index') }}">🍞 Complementos</a></li>
        <li><a href="{{ route('armarHamburguesaCliente.index') }}">👨‍🍳 Armar Hamburguesa</a></li>
        <li><a href="{{ route('catalogo.index') }}">📋 Catálogo</a></li>
        <li><a href="{{ route('menucliente') }}">◀️ Regresar</a></li>
    </ul>
</div>

<!-- ===== CONTENIDO DE OFERTAS ===== -->
<div class="container mt-5">
    <h2>🍔 Hamburguesas en Oferta</h2>
    <div class="contenedor-ofertas">
        @foreach($hamburguesasOferta as $hamburguesa)
        <div class="tarjeta-oferta">
            <img src="{{ asset($hamburguesa->imagen) }}" alt="{{ $hamburguesa->nombre }}">
            <h5>{{ $hamburguesa->nombre }}</h5>
            <p>{{ $hamburguesa->descripcion }}</p>
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
                <button type="submit" class="btn btn-carrito">🛒 Agregar al Carrito</button>
            </form>
        </div>
        @endforeach
    </div>

    <h2 class="mt-5">🍟 Combos en Oferta</h2>
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
            <form action="{{ route('carrito.agregar') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $combo->id }}">
                <input type="hidden" name="nombre" value="{{ $combo->nombre }}">
                <input type="hidden" name="precio" value="{{ $combo->precio_oferta }}">
                <input type="hidden" name="tipo" value="combo">
                <button type="submit" class="btn btn-carrito">🛒 Agregar al Carrito</button>
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

<script>
    // Toggle sidebar
    document.getElementById('menuToggle').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('sidebar').classList.toggle('open');
    });

    // Cerrar sidebar al hacer clic fuera
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('menuToggle');
        const isOpen = sidebar.classList.contains('open');
        const clickedInsideSidebar = sidebar.contains(event.target);
        const clickedToggleButton = toggleButton.contains(event.target);

        if (isOpen && !clickedInsideSidebar && !clickedToggleButton) {
            sidebar.classList.remove('open');
        }
    });
</script>

@endsection
