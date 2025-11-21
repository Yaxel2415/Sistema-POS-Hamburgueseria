<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hamburguesería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos Base */
        body {
            background-image: url('{{ asset('assets/img/h.jpg') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
            position: relative;
            z-index: 1;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }
        
        /* Contenedor Principal: ANCHO ESTRECHO (400px) por defecto */
        .login-container {
            background-color: rgba(25, 25, 25, 0.98);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(255, 140, 0, 0.3);
            width: 95%;
            max-width: 400px; /* Ancho para el LOGIN (Estrecho) */
            padding: 35px;
            border: 2px solid #fdfdfdff;
            transition: all 0.5s ease-in-out; /* Importante para el efecto de expansión */
        }
        
        /* CLASE DE EXPANSIÓN: Hace el contenedor MUCHO MÁS ANCHO solo para el REGISTRO */
        .login-container.wider-register {
            max-width: 700px; /* Ancho amplio para el formulario de 3 columnas */
        }

        .login-container:hover {
            box-shadow: 0 15px 45px rgba(255, 140, 0, 0.5);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .login-header h2 {
            color: #ff8c00;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 5px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }
        
        .login-header p {
            color: #bdc3c7;
            font-size: 16px;
        }
        
        .form-label {
            font-weight: 700;
            color: #ffffffff;
            margin-bottom: 6px; 
            display: block;
            font-size: 0.95rem; 
        }
        
        /* Estilo de Inputs más Pequeño y Compacto Verticalmente */
        .form-control {
            border-radius: 8px; 
            padding: 8px 12px; /* MUCHO MÁS PEQUEÑO verticalmente */
            border: 1px solid #444;
            background-color: #333;
            color: #fff;
            transition: all 0.4s ease;
            font-size: 0.9rem;
        }
        
        .form-control::placeholder {
            color: #888;
        }

        /* Efecto de foco y hover en inputs */
        .form-control:focus {
            border-color: #ff8c00;
            box-shadow: 0 0 0 0.25rem rgba(255, 140, 0, 0.4);
            background-color: #fbf9f9ff;
        }

        .form-control:hover:not(:focus) {
            border-color: #e67e22;
        }
        
        /* Estilos de Botones (Compactos) */
        .btn-login {
            background: linear-gradient(to right, #ff8c00, #e67e22);
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            color: white;
            box-shadow: 0 4px 10px rgba(255, 140, 0, 0.3);
            font-size: 0.95rem;
        }
        
        .btn-login:hover {
            background: linear-gradient(to right, #e67e22, #d35400);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(230, 126, 34, 0.5);
        }
        
        .btn-register {
            background: linear-gradient(to right, #2ecc71, #27ae60);
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            color: white;
            box-shadow: 0 4px 10px rgba(46, 204, 113, 0.3);
            font-size: 0.95rem;
        }
        
        .btn-register:hover {
            background: linear-gradient(to right, #27ae60, #1e8449);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 204, 113, 0.5);
        }
        
        /* Otros Estilos */
        .brand-text {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #ffffffff;
        }

        .tab-container {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #555;
        }
        
        .tab {
            flex: 1;
            text-align: center;
            padding: 12px;
            cursor: pointer;
            color: #bdc3c7;
            border-bottom: 3px solid transparent;
            transition: all 0.4s;
            font-size: 15px;
        }
        
        .tab.active {
            color: #ff8c00;
            border-bottom: 3px solid #ff8c00;
            font-weight: bold;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .switch-text {
            text-align: center;
            margin-top: 15px;
            color: #bdc3c7;
            font-size: 14px;
        }
        
        .switch-text a {
            color: #2ecc71;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
            transition: color 0.3s;
        }
        
        .switch-text a:hover {
            color: #ff8c00;
            text-decoration: underline;
        }

        .form-label i {
            margin-right: 6px;
            font-size: 1em;
            vertical-align: middle;
        }

        /* Espaciado Compacto para el Formulario de Registro */
        .row {
            margin-bottom: 0.5rem; 
        }
        .col-md-4 .mb-3, .col-md-6 .mb-3 {
            margin-bottom: 0.5rem !important; 
        }
            /* MENSAJES DE ERROR Y ÉXITO MEJORADOS */
    .error-message {
        background-color: rgba(232, 59, 39, 0.43);
        border-left: 4px solid #c0392b;
        color: #ffffff !important;
        padding: 12px 15px;
        border-radius: 6px;
        font-size: 14px;
        margin-top: 15px;
        font-weight: 500;
        box-shadow: 0 2px 10px rgba(231, 76, 60, 0.3);
    }
    
    .success-message {
        background-color: rgba(46, 204, 113, 0.9);
        border-left: 4px solid #27ae60;
        color: #ffffff !important;
        padding: 12px 15px;
        border-radius: 6px;
        font-size: 14px;
        margin-top: 15px;
        font-weight: 500;
        box-shadow: 0 2px 10px rgba(46, 204, 113, 0.3);
    }
    
    .alert-info {
        background-color: rgba(52, 152, 219, 0.9) !important;
        border-left: 4px solid #2980b9 !important;
        color: #ffffff !important;
        padding: 12px 15px;
        border-radius: 6px;
        font-size: 14px;
        margin-top: 15px;
        font-weight: 500;
        box-shadow: 0 2px 10px rgba(52, 152, 219, 0.3);
    }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Acceso</h2>
            <p>Sistema de Gestión de Hamburguesería</p>
        </div>
        
        <div class="tab-container">
            <div class="tab active" data-tab="usuario">Empleado</div>
            <div class="tab" data-tab="cliente">Cliente</div>
        </div>
        
        <div class="tab-content active" id="usuario-tab">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="id_usuario" class="form-label">
                        <i class="fas fa-user-tie"></i> Usuario
                    </label>
                    <input type="text" class="form-control" id="id_usuario" name="id_usuario" 
                           placeholder="Ingresa tu nombre de usuario" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" 
                           placeholder="Ingresa tu contraseña" required>
                </div>

                <button type="submit" class="btn btn-login w-100">Entrar</button>
            </form>
        </div>
        
        <div class="tab-content" id="cliente-tab">
            <div id="cliente-login">
                <form method="POST" action="{{ route('cliente.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="cliente_email" class="form-label">📧 Email</label>
                        <input type="email" class="form-control" id="cliente_email" name="email" 
                               placeholder="Ingresa tu email" required>
                    </div>

                    <div class="mb-4">
                        <label for="cliente_password" class="form-label">🔒 Contraseña</label>
                        <input type="password" class="form-control" id="cliente_password" name="password" 
                               placeholder="Ingresa tu contraseña" required>
                    </div>

                    <button type="submit" class="btn btn-login w-100">Entrar como Cliente</button>
                </form>
                
                <div class="switch-text">
                    ¿No tienes cuenta? <a onclick="showRegister()">Regístrate aquí</a>
                </div>
            </div>
            
            <div id="cliente-register" style="display: none;">
                <form method="POST" action="{{ route('cliente.register') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="reg_nombre" class="form-label"><i class="fas fa-user"></i> Nombre *</label>
                            <input type="text" class="form-control" id="reg_nombre" name="nombre" 
                                   placeholder="Tu nombre" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_ap_paterno" class="form-label"><i class="fas fa-user-tag"></i> Apellido Paterno</label>
                            <input type="text" class="form-control" id="reg_ap_paterno" name="Ap_Paterno" 
                                   placeholder="Ape. Paterno">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_ap_materno" class="form-label"><i class="fas fa-user-tag"></i> Apellido Materno</label>
                            <input type="text" class="form-control" id="reg_ap_materno" name="Ap_Materno" 
                                   placeholder="Ape. Materno">
                        </div>
                    </div>
                    
                    <div class="row">
                         <div class="col-md-4 mb-3">
                            <label for="reg_email" class="form-label"><i class="fas fa-envelope"></i> Email *</label>
                            <input type="email" class="form-control" id="reg_email" name="email" 
                                   placeholder="Tu email" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_telefono" class="form-label"><i class="fas fa-phone-alt"></i> Teléfono</label>
                            <input type="tel" class="form-control" id="reg_telefono" name="telefono" 
                                   placeholder="Tu teléfono">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_direccion" class="form-label"><i class="fas fa-home"></i> Dirección</label>
                            <input type="text" class="form-control" id="reg_direccion" name="direccion" 
                                   placeholder="Tu dirección">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reg_password" class="form-label"><i class="fas fa-key"></i> Contraseña *</label>
                            <input type="password" class="form-control" id="reg_password" name="password" 
                                   placeholder="Crea una contraseña" required minlength="6">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reg_password_confirmation" class="form-label"><i class="fas fa-key"></i> Confirmar Contraseña *</label>
                            <input type="password" class="form-control" id="reg_password_confirmation" 
                                   name="password_confirmation" placeholder="Confirma contraseña" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-register w-100 mt-2">Registrarse</button>
                </form>
                
                <div class="switch-text">
                    ¿Ya tienes cuenta? <a onclick="showLogin()">Inicia sesión aquí</a>
                </div>
            </div>
        </div>

        @if($errors->any())
            <div class="error-message">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="brand-text">
            <p>Hamburguesería © 2025 - Hecho con pasión</p>
        </div>
    </div>

    <script>
        // Obtener el contenedor principal
        const loginContainer = document.querySelector('.login-container');

        // Cambio de pestañas
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remover active de todas las pestañas
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Activar pestaña clickeada
                this.classList.add('active');
                document.getElementById(this.dataset.tab + '-tab').classList.add('active');

                // Si cambiamos de pestaña (y no es la de cliente), asegurar que el ancho vuelva a ser estrecho
                if (this.dataset.tab !== 'cliente') {
                    loginContainer.classList.remove('wider-register');
                }
            });
        });
        
        // Mostrar registro de cliente
        function showRegister() {
            document.getElementById('cliente-login').style.display = 'none';
            document.getElementById('cliente-register').style.display = 'block';
            
            // AÑADIR LA CLASE DE ANCHO (expande el contenedor a 700px)
            loginContainer.classList.add('wider-register'); 
        }
        
        // Mostrar login de cliente
        function showLogin() {
            document.getElementById('cliente-register').style.display = 'none';
            document.getElementById('cliente-login').style.display = 'block';
            
            // QUITAR LA CLASE DE ANCHO (contrae el contenedor a 400px)
            loginContainer.classList.remove('wider-register');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>