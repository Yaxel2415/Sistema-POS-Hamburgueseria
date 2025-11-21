<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente - Hamburguesería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background: rgba(0, 0, 0, 0.71);
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: -1;
        }

        .container {
            max-width: 600px;
            background: #131212ff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 46px 28px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            position: relative;
            border: 1px solid #fafafaff;
        }

        h2 {
            font-weight: bold;
            color: #fffefeff;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 40px;
        }

        label {
            font-family: 'Segoe UI', sans-serif;
            font-weight: 600;
            color: #fff;
            margin-bottom: 6px;
            display: block;
            text-align: left;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #ff9900;
            background: transparent;
            color: white;
            padding: 6px 0;
            border-radius: 0;
            margin-bottom: 35px;
        }

        .form-control:focus {
            border-bottom: 2px solid #ffaa33;
            box-shadow: none;
            outline: none;
        }

        .btn-warning, .btn-secondary {
            background-color: #ff9900;
            border: none;
            border-radius: 5px;
            padding: 12px 0;
            font-weight: bold;
            font-family: 'Segoe UI', sans-serif;
            font-size:16px;
            color: white;
            text-decoration: none !important;
            transition: 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-warning:hover, .btn-secondary:hover {
            background-color: #ffaa33;
            color: white;
            animation: bounce 0.4s;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            20% {
                transform: translateY(-10px);
            }
            40% {
                transform: translateY(-5px);
            }
        }

        .botones-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-group {
            flex: 1;
        }

        .full-width {
            width: 100%;
        }

        .alert {
            border-radius: 10px;
            padding: 15px;
            font-size: 14px;
            background: rgba(231, 76, 60, 0.2);
            border-left: 4px solid #e74c3c;
            color: #ffcccc;
        }

        .form-group.full-width .form-control {
            width: 100%;
        }

        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .alert li {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="container">
        <h2 class="text-center">✏️ Editar Cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Primera fila: 3 campos -->
            <div class="form-row">
                <div class="form-group">
                    <label>ID Cliente</label>
                    <input type="text" name="id_cliente" class="form-control" value="{{ $cliente->id_cliente }}">
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno</label>
                    <input type="text" name="Ap_Paterno" class="form-control" value="{{ $cliente->Ap_Paterno }}">
                </div>
            </div>

            <!-- Segunda fila: 3 campos -->
            <div class="form-row">
                <div class="form-group">
                    <label>Apellido Materno</label>
                    <input type="text" name="Ap_Materno" class="form-control" value="{{ $cliente->Ap_Materno }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $cliente->email }}">
                </div>
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
                </div>
            </div>

            <!-- Campo Dirección full width -->
            <div class="form-group full-width">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}">
            </div>

            <div class="botones-container">
                <button type="submit" class="btn btn-warning">💾 Actualizar</button>
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary text-decoration-none">❌ Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>