<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Hamburguesería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('assets/img/h.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            color: #fff;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.67);
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: -1;
        }

        .navbar {
            background: rgba(0, 0, 0, 0) !important;
        }

        .navbar .nav-link, .navbar .btn {
            color: #fff !important;
            margin-right: 10px;
            font-size: 23px;
            font-weight: bold;
        }

        .navbar .btn-salir {
            background-color: #b7230a;
            border: none;
            color: #fff;
        }

        .navbar .btn-productos {
            background-color: #b76c2e;
            border: none;
            color: #fff;
        }

        .hero-text {
            margin-top: 200px;
            
        }

        .hero-text h1 {
            font-size: 3rem;
            font-family: 'Fredoka One', cursive;
            font-weight: bold;
            font-size: 63px;
            color: #f1c40f;
        }

        .hero-text h2 {
            font-size: 2rem;
            font-family: 'Fredoka One', cursive;
            font-weight: bold;
            font-size: 63px;
            color: #fff;
        }

        .btn-productos:hover {
            transform: translateY(-3px);
            background-color: #c47611ff;
            color: black;
        }

        /* 🔴 ESTILOS PARA LA NOTIFICACIÓN */
        .notification-badge {
            position: relative;
            display: inline-block;
        }

        .notification-dot {
            position: absolute;
            top: 2px;
            right: 180px;
            width: 15px;
            height: 15px;
            background-color: #ff0000;
            border: 2px solid #fff;
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }

        .notification-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff0000;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid #fff;
            animation: pulse 1.5s infinite;
        }

        /* 🔔 ESTILOS PARA NOTIFICACIONES EMERGENTES */
        .notification-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 350px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            border-left: 5px solid #a77828ff;
            animation: slideInRight 0.5s ease-out;
        }

        .notification-header {
            background: #be8022ff;
            color: white;
            padding: 10px 15px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .notification-body {
            padding: 15px;
            color: #333;
            text-align: left;
        }

        .notification-item {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .close-notification {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <!-- 🔔 CONTENEDOR PARA NOTIFICACIONES EMERGENTES -->
    <div id="notificationsContainer"></div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a class="nav-link" href="{{ route('usuario.index') }}"><span>👤</span> usuario</a>
                <a class="nav-link" href="{{ route('inventario.index') }}"><span>📋</span> inventario</a>
                <a class="nav-link" href="{{ route('carrito.historial') }}"><span>🛒</span> ventas</a>
                <a class="nav-link" href="{{ route('cliente.index') }}"><span>🧑‍🤝‍🧑</span> cliente</a>
                <a class="nav-link notification-badge" href="{{ route('pedidos.index') }}">
                    <span>🔔</span> Pedidos/Cliente
                    <!-- 🔴 PUNTO ROJO DE NOTIFICACIÓN -->
                    @php
                        use Illuminate\Support\Facades\DB;
                        $pedidosNuevos = DB::table('ventas')
                            ->whereNull('id_usuario')
                            ->where('created_at', '>=', now()->subHours(24))
                            ->count();
                    @endphp
                    
                    @if($pedidosNuevos > 0)
                        @if($pedidosNuevos > 9)
                            <span class="notification-dot"></span>
                        @else
                            <span class="notification-count">{{ $pedidosNuevos }}</span>
                        @endif
                    @endif
                </a>
            </div>
            <div class="d-flex">
                <a href="{{ route('sugerencias.index') }}" class="btn btn-productos">Productos <img src="{{ asset('assets/icons/burger2.png') }}" alt="Productos" width="35" height="35"></a>
                <a href="{{ url('/login') }}" class="btn btn-salir">Salir <img src="{{ asset('assets/icons/salida.png') }}" alt="Salir" width="30" height="30"></a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero-text">
        <h1>HECHA CON PASIÓN</h1>
        <h2>SERVIDA CON ORGULLO</h2>
    </div>

    <script>
        // Variable para controlar notificaciones ya mostradas
        let pedidosNotificados = new Set();

        // Función para mostrar notificación emergente
        function mostrarNotificacion(pedidos) {
            if (pedidos.length === 0) return;

            const container = document.getElementById('notificationsContainer');
            
            // Crear elemento de notificación
            const notification = document.createElement('div');
            notification.className = 'notification-toast';
            notification.innerHTML = `
                <div class="notification-header">
                    <strong>🍔 Nuevo Pedido Recibido</strong>
                    <button class="close-notification" onclick="this.parentElement.parentElement.remove()">×</button>
                </div>
                <div class="notification-body">
                    ${pedidos.map(pedido => `
                        <div class="notification-item">
                            <strong>Pedido #${pedido.id_venta}</strong><br>
                            <small>Hora: ${pedido.fecha_formateada}</small>
                        </div>
                    `).join('')}
                    <div class="text-center mt-2">
                        <a href="{{ route('pedidos.index') }}" class="btn btn-warning btn-sm" style="background-color: #c19742ff; color: white;">Ver Pedidos</a>
                    </div>
                </div>
            `;

            // Agregar al contenedor
            container.appendChild(notification);

            // Auto-eliminar después de 8 segundos
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 8000);
        }

        // Función para verificar nuevos pedidos
        function verificarNuevosPedidos() {
            fetch('{{ route("pedidos.recientes") }}')
                .then(response => response.json())
                .then(data => {
                    const nuevosPedidos = data.pedidosRecientes.filter(pedido => 
                        !pedidosNotificados.has(pedido.id_venta)
                    );

                    if (nuevosPedidos.length > 0) {
                        // Mostrar notificación
                        mostrarNotificacion(nuevosPedidos);
                        
                        // Agregar a notificados
                        nuevosPedidos.forEach(pedido => {
                            pedidosNotificados.add(pedido.id_venta);
                        });

                        // Actualizar contador en tiempo real
                        actualizarContadorNotificaciones();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Función para actualizar contador de notificaciones
        function actualizarContadorNotificaciones() {
            fetch('{{ route("pedidos.contar") }}')
                .then(response => response.json())
                .then(data => {
                    const badgeElement = document.querySelector('.notification-badge');
                    const existingBadge = badgeElement.querySelector('.notification-dot, .notification-count');
                    
                    if (existingBadge) {
                        existingBadge.remove();
                    }
                    
                    if (data.pedidosNuevos > 0) {
                        if (data.pedidosNuevos > 9) {
                            const dot = document.createElement('span');
                            dot.className = 'notification-dot';
                            badgeElement.appendChild(dot);
                        } else {
                            const count = document.createElement('span');
                            count.className = 'notification-count';
                            count.textContent = data.pedidosNuevos;
                            badgeElement.appendChild(count);
                        }
                    }
                });
        }

        // Verificar cada 10 segundos (más frecuente para notificaciones inmediatas)
        setInterval(verificarNuevosPedidos, 10000);

        // Verificar inmediatamente al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            verificarNuevosPedidos();
            // También verificar contador cada 30 segundos
            setInterval(actualizarContadorNotificaciones, 30000);
        });
    </script>
</body>
</html>