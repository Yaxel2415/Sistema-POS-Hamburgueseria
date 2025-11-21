<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugerencias - Hamburguesería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('assets/img/h.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            padding: 20px;
        }
        
        .sugerencias-container {
            max-width: 1000px;
            margin: 0 auto;
            background: rgba(2, 2, 2, 0.01);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        
        .header-sugerencias {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header-sugerencias h1 {
            color: #d35400;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .categoria-card {
            background: linear-gradient(135deg, #ff8c00, #ff6b00);
            border-radius: 10px;
            padding: 25px;
            color: white;
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
            border: none;
        }
        
        .categoria-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 140, 0, 0.3);
        }
        
        .categoria-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        
        .categoria-card h3 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .categoria-card p {
            opacity: 0.9;
            margin-bottom: 20px;
        }
        
        .btn-categoria {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid white;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-categoria:hover {
            background: white;
            color: #ff8c00;
        }
        
    .btn-volver {
    display: inline-flex;              /* Para que ícono y texto estén alineados */
    justify-content: center;
    align-items: center;
    gap: 8px;                          /* Espacio entre ícono y texto */
    font-size: 16px;                   /* Tamaño de texto moderado */
    padding: 10px 20px;                /* Botón no tan grande */
    max-width: 280px;                  /* Limita el ancho */
    border: 1px solid #333333;            /* Opcional: borde */
    border-radius: 4px;                /* Bordes redondeados */
    text-decoration: none;             /* Quita subrayado */
    background: linear-gradient(135deg, #ff8c00, #ff6b00);         /* Color de fondo */
    color: #ffffffff;                       /* Color del texto */
    transition: background-color 0.3s; /* Animación suave */
}

.btn-volver img {
    width: 24px;   /* Ícono más pequeño */
    height: 24px;
}

.btn-volver:hover {
    background: linear-gradient(135deg, #ff7300ff, #e78037ff);         /* Efecto hover */
    cursor: pointer;
}

    </style>
</head>
<body>
    <div class="sugerencias-container">
        <!-- Header -->
        <div class="header-sugerencias">
            <h1>🍔 Catalogo de Productos</h1>
            <p class="text-white">Selecciona una categoría para explorar nuestras opciones</p>
        </div>

        <!-- Grid de Categorías -->
        <div class="row g-4">
            <!-- Hamburguesas -->
            <div class="col-md-4">
                <div class="categoria-card">
                    <div class="categoria-icon">🍔</div>
                    <h3>Hamburguesas</h3>
                    <p>Descubre nuestras deliciosas hamburguesas con ingredientes frescos y opciones de personalización</p>
                    <a href="{{ route('hamburguesasCliente.index') }}" class="btn-categoria">Explorar</a>
                </div>
            </div>
            
            <!-- Combos -->
            <div class="col-md-4">
                <div class="categoria-card">
                    <div class="categoria-icon">🎁</div>
                    <h3>Combos</h3>
                    <p>Paquetes completos con todo lo que necesitas para disfrutar una comida perfecta</p>
                    <a href="{{ route('combosCliente.index') }}" class="btn-categoria">Ver Combos</a>
                </div>
            </div>
            
            <!-- Complementos -->
            <div class="col-md-4">
                <div class="categoria-card">
                    <div class="categoria-icon">🍟</div>
                    <h3>Complementos</h3>
                    <p>Papas fritas, aros de cebolla, ensaladas y más para acompañar tu hamburguesa</p>
                    <a href="{{ route('complementosCliente.index') }}" class="btn-categoria">Ver Acompañamientos</a>
                </div>
            </div>
            
            <!-- Bebidas -->
            <div class="col-md-4">
                <div class="categoria-card">
                    <div class="categoria-icon">🥤</div>
                    <h3>Bebidas</h3>
                    <p>Refrescos, aguas, jugos naturales y malteadas para refrescar tu comida</p>
                    <a href="{{ route('bebidasCliente.index') }}" class="btn-categoria">Ver Bebidas</a>
                </div>
            </div>
            
            <!-- Arma tu Hamburguesa -->
<div class="col-md-4">
    <div class="categoria-card">
        <div class="categoria-icon">🧑‍🍳</div>
        <h3>Arma tu Hamburguesa</h3>
        <p>Elige el pan, la carne, los vegetales y las salsas para crear tu hamburguesa perfecta</p>
        <a href="{{ route('armarHamburguesaCliente.index') }}" class="btn-categoria">Comenzar</a>
    </div>
</div>
            
            <!-- Personalizar -->
            <div class="col-md-4">
                <div class="categoria-card">
                    <div class="categoria-icon">🛒</div>
                    <h3>Orden Personalizada</h3>
                    <p>Arma tu propio combo con los ingredientes y productos que más te gusten</p>
                    <a href="{{ route('carritoCliente.index') }}" class="btn-categoria">Crear Orden</a>
                </div>
            </div>
        </div>

        <!-- Botón Volver -->
<div class="text-center mt-4">
    <a href="{{ url('/menucliente') }}" class="btn-volver">
        <img src="{{ asset('assets/icons/black2.png') }}" alt="Regresar"> 
        Volver al Menú Principal
    </a>
</div>
    </div>
</body>
</html>