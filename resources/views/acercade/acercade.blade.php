@extends('layouts.app')

@section('title', 'Acerca de')

<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

@section('content')
<style>
    /* --- Estilos existentes del Acerca de --- */
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.79), rgba(0, 0, 0, 0.77)), url('{{ asset('assets/img/h.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        padding: 20px;
        font-family: 'Arial', sans-serif;
        overflow-x: hidden;
    }

    .container {
        max-width: 2000px;
        margin: 0 auto;
        background: rgba(2, 2, 2, 0.01);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    h1, h3 { color: #ffb347; text-align: center; }
    h1 { font-size: 3rem; margin-bottom: 40px; }
    h3 { font-size: 1.8rem; margin-bottom: 15px; }
    p, li { color: #f1f1f1; font-size: 1.4rem; line-height: 1.6; }
    ul li { margin-bottom: 10px; }

    .card-section {
        background-color: rgba(0, 0, 0, 0.85);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        transition: all 0.3s ease-in-out;
    }

    .card-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 179, 71, 0.5);
    }

    .row-cards { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
    .card-left, .card-right { flex: 1 1 45%; min-width: 280px; }
    .card-left img, .card-right img, .full-card img { width: 100%; border-radius: 15px; margin-top: 15px; }

    .full-card .row-cards img {
        width: 48%;
        margin-top: 15px;
        border-radius: 15px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .row-cards, .full-card .row-cards { flex-direction: column; align-items: center; }
        .card-left, .card-right { flex: 1 1 100%; }
        .full-card .row-cards img { width: 90%; }
    }

    /* --- Estilos del Navbar y Sidebar --- */
    .navbar-custom {
        background-color: #0e0e0e09;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 40px;
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

    /* Sidebar mejorado */
    .sidebar {
        position: fixed;
        top: 0;
        left: -260px;
        width: 260px;
        height: 100%;
        background: linear-gradient(180deg, #bd8d40ff, #bb8942ff);
        color: black;
        transition: all 0.4s ease;
        box-shadow: 4px 0 12px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        padding-top: 15px;
        overflow-y: auto;
    }
    .sidebar.open { left: 0; }
    .sidebar-header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        padding: 0 20px; 
        margin-bottom: 10px;
    }
    .sidebar-header h3 { 
        font-family: 'Fredoka One', cursive; 
        color: #000; 
        font-size: 1.4rem;
        margin: 0;
    }
    .sidebar-links { 
        list-style: none; 
        padding: 0; 
        margin: 0;
    }
    .sidebar-links li { 
        padding: 12px 20px; 
        transition: background 0.3s ease; 
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        font-size: 1rem;
    }
    .sidebar-links li:hover { background: rgba(255,255,255,0.2); }
    .sidebar-links a { 
        color: black; 
        text-decoration: none; 
        font-weight: bold; 
        display: flex; 
        align-items: center; 
        gap: 12px;
        font-size: 1rem;
    }
    .sidebar-links img {
        width: 22px;
        height: 22px;
        object-fit: contain;
    }

    /* --- Estilos del pie de información de la empresa --- */
    .info-empresa {
        background-color: #000;
        color: white;
        padding: 2.5rem 2rem;
        width:1435px;
        position:absolute;
        top:1980px;
        left: 5px;
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

    .carrito-link {
        margin-left: 1px;
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

    /* Media Queries para responsividad */
    @media (max-width: 768px) {
        .navbar-left {
            gap: 15px;
        }
        
        .navbar-left a {
            font-size: 1.2rem;
        }
        
        h1 {
            font-size: 2.5rem;
        }
        
        h3 {
            font-size: 1.5rem;
        }
        
        p, li {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .navbar-custom {
            padding: 10px 20px;
        }
        
        .navbar-left {
            gap: 10px;
        }
        
        .navbar-left a {
            font-size: 1rem;
        }
        
        h1 {
            font-size: 2rem;
        }
    }

</style>

<!-- NAVBAR -->
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

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3>Menú Cliente</h3>
    </div>
    <ul class="sidebar-links">
        <li>
            <a href="{{ route('hamburguesasCliente.index') }}">
                <img src="{{ asset('assets/icons/burgerblack.png') }}" alt="Hamburguesa">
                Hamburguesas
            </a>
        </li>
        <li>
            <a href="{{ route('bebidasCliente.index') }}">
                <img src="{{ asset('assets/icons/bebida.png') }}" alt="Bebidas">
                Bebidas
            </a>
        </li>
        <li>
            <a href="{{ route('combosCliente.index') }}">
                <img src="{{ asset('assets/icons/combo.png') }}" alt="Combos">
                Combos
            </a>
        </li>
        <li>
            <a href="{{ route('complementosCliente.index') }}">
                <img src="{{ asset('assets/icons/complementos.png') }}" alt="Complementos">
                Complementos
            </a>
        </li>
        <li>
            <a href="{{ route('armarHamburguesaCliente.index') }}">
                <img src="{{ asset('assets/icons/chef.png') }}" alt="Armar Hamburguesa">
                Armar Hamburguesa
            </a>
        </li>
        <li>
            <a href="{{ route('catalogo.index') }}">
                <img src="{{ asset('assets/icons/menu.png') }}" alt="Catalogo">
                Catalogo
            </a>
        </li>
        <li>
            <a href="{{ route('menucliente') }}">
                <img src="{{ asset('assets/icons/salir.png') }}" alt="Cerrar Menú">
                Regresar al Menú
            </a>
        </li>
    </ul>
</div>

<!-- ACERCA DE CONTENIDO -->
<div class="container">
    <h1>ACERCA DE NOSOTROS</h1>

    <div class="card-section">
        <p>
            No solo servimos hamburguesas: creamos experiencias. Nuestra página refleja una pasión por la comida hecha con cariño, ingredientes frescos y un toque auténtico que nos distingue. Desde el primer mordisco, queremos que sientas que estás en el lugar correcto.
        </p>
    </div>

    <div class="row-cards">
        <div class="card-section card-left">
            <h3>NUESTROS VALORES</h3>
            <ul>
                <li><strong>Calidad sin compromisos:</strong> Cada hamburguesa se prepara al momento, con carne 100% de res, pan artesanal y vegetales frescos.</li>
                <li><strong>Sabor con identidad:</strong> Combinamos recetas clásicas con creaciones únicas que solo encontrarás aquí.</li>
                <li><strong>Respeto por el cliente:</strong> Tu satisfacción es nuestra prioridad. Escuchamos, mejoramos y agradecemos cada visita.</li>
            </ul>
            <img src="{{ asset('assets/img/h5.jpg') }}" alt="Nuestros valores">
        </div>

        <div class="card-section card-right">
            <h3>SATISFACCIÓN GARANTIZADA</h3>
            <p>
                Creemos que una buena hamburguesa puede alegrarte el día. Por eso cuidamos cada detalle, desde el servicio hasta el sabor. Si no estás feliz, nosotros tampoco. Queremos que cada cliente se vaya con una sonrisa… y ganas de volver.
            </p>
            <img src="{{ asset('assets/img/h2.jpg') }}" alt="Satisfacción">
        </div>
    </div>

    <div class="card-section full-card">
        <h3>VARIEDAD PARA TODOS LOS GUSTOS</h3>
        <p>
            En Hamburgueseria no solo encontrarás hamburguesas irresistibles, también ofrecemos una amplia gama de complementos y bebidas para acompañar tu comida. Desde papas crujientes, aros de cebolla y alitas, hasta malteadas artesanales, refrescos, jugos naturales y opciones sin azúcar...
        </p>
        <div class="row-cards">
            <img src="{{ asset('assets/img/h6.webp') }}" alt="Imagen 1">
            <img src="{{ asset('assets/img/h7.jpg') }}" alt="Imagen 2">
        </div>
    </div>
</div>

<!-- INFORMACIÓN DE LA EMPRESA -->
<section class="info-empresa">
    <h3>🍔Hamburgueseria</h3>
    <p>Dirección: Av. Principal #123, Ciudad del Sabor, México</p>
    <p>Teléfono: (555) 123-4567 | Correo: contacto@burgerreal.com</p>
    <p>Horario: Lunes a Domingo de 10:00 a 22:00 hrs</p>
    <p style="font-size: 0.9rem; color: #aaa; margin-top: 10px;">© 2025 Burger Real - Todos los derechos reservados</p>
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