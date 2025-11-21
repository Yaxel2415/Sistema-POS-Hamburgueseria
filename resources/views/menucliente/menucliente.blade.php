<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - Hamburguesería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #0d0d0d;
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar-custom {
            background-color: #0e0e0e09;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .navbar-left a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.3s;
        }

        .navbar-left a:hover {
            color: #ff9d00;
        }

        .navbar-left img {
            width: 60px;
            height: 45px;
        }

        .navbar-right {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-right span {
            font-weight: bold;
            color: white;
            font-size: 1.5rem;
        }

        .apagar-icon {
            width: 70px;
            height: 38px;
            cursor: pointer;
            transition: 0.3s;
            filter: invert(67%) sepia(78%) saturate(1000%) hue-rotate(2deg) brightness(102%) contrast(80%);
        }

        .apagar-icon:hover {
            filter: invert(84%) sepia(90%) saturate(1000%) hue-rotate(15deg) brightness(115%) contrast(80%);
            transform: scale(1.1);
        }

        /* HERO */
        .hero-section {
            position: relative;
            width: 100%;
            height: 470px;
            background: linear-gradient(rgba(0, 0, 0, 0.63), rgba(0, 0, 0, 0.66)),
                        url('{{ asset('assets/img/h.jpg') }}') center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-text {
            position: relative;
            z-index: 1;
            text-transform: uppercase;
        }

        .hero-text h1 {
            font-size: 6rem;
            font-family: 'Fredoka One', cursive;
            color: #ce9e4b;
            margin-bottom: 0.4rem;
        }

        .hero-text h2 {
            font-size: 6rem;
            font-family: 'Fredoka One', cursive;
            color: #e2a67a;
        }

        /* OFERTAS */
        .offers-section {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 2rem 1rem;
        }

        .offers-section h2 {
            font-size: 3.5rem;
            font-family: 'Fredoka One', cursive;
            letter-spacing: 1px;
            margin-bottom: 2rem;
        }

        /* TARJETAS DE OFERTAS */
        .card-hamburguesa {
            background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
            border-radius: 15px;
            border: 2px solid #ff9d00;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .card-hamburguesa:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 157, 0, 0.3);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid #ff9d00;
        }

        .card-body {
            padding: 1.5rem;
            color: white;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #ff9d00;
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: #ccc;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .precio-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 1rem;
        }

        .precio-original {
            text-decoration: line-through;
            color: #888;
            font-size: 1.1rem;
        }

        .precio-oferta {
            color: #ff4444;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .badge-oferta {
            background: linear-gradient(45deg, #ff4444, #ff8800);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 10px;
            display: inline-block;
        }

        .ahorro {
            color: #4CAF50;
            font-weight: bold;
            font-size: 0.9rem;
        }
            /* Navbar superior */
    .navbar-left a {
        color: white;
        text-decoration: none;
        margin-right: 15px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: transform 0.2s ease;
    }

    .navbar-left a:hover {
        transform: scale(1.1);
    }

    /* Sidebar (oculto por defecto) */
    .sidebar {
        position: fixed;
        top: 0;
        left: -260px;
        width: 260px;
        height: 100%;
        background: linear-gradient(180deg,  #bd8d40ff, #bb8942ff);
        color: black;
        transition: all 0.4s ease;
        box-shadow: 4px 0 12px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        padding-top: 15px;
    }

    .sidebar.open {
        left: 0;
    }

    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }

    .sidebar-header h3 {
        font-family: 'Fredoka One', cursive;
    }

    .sidebar-header button {
        background: none;
        border: none;
        color: white;
        font-size: 1.8rem;
        cursor: pointer;
    }

    .sidebar-links {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }

    .sidebar-links li {
        padding: 12px 20px;
        transition: background 0.3s ease;
    }

    .sidebar-links li:hover {
        background: rgba(255,255,255,0.2);
    }

    .sidebar-links a {
        color: black;
        text-decoration: none;
        font-weight: bold;
        display: flex;
        align-items: center;
        gap: 8px;
    }
      .info-empresa {
      background-color: #000;
      color: white;
      padding: 2.5rem 1rem;
      border-top: 2px solid white; /* línea divisoria blanca */
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
.rating-container {
  text-align: center;
  background-color: #0e0e0e;
  color: white;
  padding: 30px;
  border-radius: 20px;
  width: 500px;
  margin: 40px auto;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.1);
}

.rating-container h2 {
  font-family: 'Fredoka One', cursive;
  color: #ff9d00;
  margin-bottom: 15px;
}

.stars {
  display: flex;
  justify-content: center;
  gap: 10px;
  cursor: pointer;
}

.star {
  font-size: 50px;
  color: gray;
  transition: transform 0.2s, color 0.2s;
}

.star:hover {
  transform: scale(1.2);
  color: #ffcc00;
}

.star.selected {
  color: #ffcc00;
}

#rating-text {
  margin-top: 15px;
  font-size: 1.2rem;
  color: #ccc;
}

    </style>
</head>
<body>

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
    </div>
</div>

<!-- SIDEBAR (menú lateral oculto) -->
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
        <li><a href="{{ route('catalogo.index') }}">📋 Catalogo</a></li>
        <li><a href="{{ route('menucliente') }}">❌ Cerrar Menu</a></li>
    </ul>
</div>

    <!-- HERO -->
    <section class="hero-section">
        <div class="hero-text">
            <h1>Hecha con pasión</h1>
            <h2>Servida con orgullo</h2>
        </div>
    </section>

    <!-- OFERTAS -->
<section class="offers-section py-5" style="background: #111; color: #fff;">
  <div class="container text-center">
    <h2 class="mb-5" style="font-weight: bold; letter-spacing: 1px;">🔥 OFERTAS ¡APROVÉCHALAS! 🔥</h2>

    <div class="row justify-content-center g-4">
      <!-- Tarjeta de Hamburguesas -->
      <div class="col-md-5">
        <div class="card h-100 border-0 shadow-lg"
             style="background: linear-gradient(135deg, #ffc107, #ff9800); border-radius: 20px;">
          <div class="card-body d-flex flex-column justify-content-between text-center text-dark">
            <div>
              <img src="{{ asset('assets/icons/hamburgesa.png') }}" alt="Combos" width="100" class="mb-3">
              <h4 class="fw-bold">Hamburguesas en Oferta</h4>
              <p>Deliciosas hamburguesas con descuentos irresistibles 🍔</p>
            </div>
            <a href="{{ route('ofertas.hamburguesas') }}" 
            class="btn mt-3 fw-bold rounded-pill"
            style="background-color: #050505ff; color: white; border: none; transition: 0.3s;">
             Ver Ofertas</a>
          </div>
        </div>
      </div>

      <!-- Tarjeta de Combos -->
      <div class="col-md-5">
        <div class="card h-100 border-0 shadow-lg"
             style="background: linear-gradient(135deg, #03a9f4, #0288d1); border-radius: 20px;">
          <div class="card-body d-flex flex-column justify-content-between text-center text-light">
            <div>
              <img src="{{ asset('assets/icons/combos.png') }}" alt="Combos" width="110" class="mb-3">
              <h4 class="fw-bold">Combos Especiales</h4>
              <p>Disfruta de combos completos a precios únicos 🍟🥤</p>
            </div>
            <a href="{{ route('ofertas.combos') }}" 
            class="btn mt-3 fw-bold rounded-pill"
            style="background-color: #000000ff; color: white; border: none; transition: 0.3s;">
            Ver Combos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        
<div class="rating-container">
  <h2>Califica nuestra página</h2>

  <div class="stars">
    <span class="star" data-value="1">★</span>
    <span class="star" data-value="2">★</span>
    <span class="star" data-value="3">★</span>
    <span class="star" data-value="4">★</span>
    <span class="star" data-value="5">★</span>
  </div>

  <p id="rating-text">Selecciona una calificación</p>
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


<script>
  const token = '{{ csrf_token() }}';
  const stars = document.querySelectorAll('.star');
  const ratingText = document.getElementById('rating-text');

  function updateStars(value) {
    stars.forEach(star => {
      star.classList.toggle('active', star.getAttribute('data-value') <= value);
    });
  }

  stars.forEach(star => {
    star.addEventListener('click', async () => {
      const estrellas = star.getAttribute('data-value');
      updateStars(estrellas);
      ratingText.textContent = `Has calificado con ${estrellas} ${estrellas == 1 ? 'estrella' : 'estrellas'} ⭐`;

      try {
        const response = await fetch("{{ route('guardar.calificacion') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token,
          },
          body: JSON.stringify({ estrellas }),
        });

        const data = await response.json();

        if (data.success) {
          alert(data.success); // ✅ Muestra mensaje de éxito del controlador
        } else if (data.error) {
          alert(data.error); // ⚠️ Muestra mensaje de error del controlador
        } else {
          alert("❌ Ocurrió un error inesperado.");
        }

      } catch (error) {
        alert("❌ Error al conectar con el servidor.");
        console.error(error);
      }
    });
  });
</script>

</body>
</html>