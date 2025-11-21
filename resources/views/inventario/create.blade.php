<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - Hamburguesería</title>
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
            max-width: 800px;
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
            margin-bottom: 25px;
        }

        .form-control:focus {
            border-bottom: 2px solid #ffaa33;
            box-shadow: none;
            outline: none;
        }

        select.form-control {
            background: #131212ff;
            color: white;
        }

        .btn-success, .btn-secondary {
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

        .btn-success:hover, .btn-secondary:hover {
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
            margin-top: 30px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
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
            margin-bottom: 20px;
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
        <h2 class="text-center">➕ Agregar Producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inventario.store') }}" method="POST">
            @csrf

            <!-- Primera fila: 3 campos -->
            <div class="form-row">
                <div class="form-group">
                    <label>ID Producto</label>
                    <input type="text" name="id_producto" class="form-control" value="{{ old('id_producto') }}" required>
                </div>
                <div class="form-group">
                    <label>Nombre Producto</label>
                    <input type="text" name="nombre_producto" class="form-control" value="{{ old('nombre_producto') }}" required>
                </div>
                <div class="form-group">
                    <label>Categoría</label>
                    <input type="text" name="categoria" class="form-control" value="{{ old('categoria') }}" required>
                </div>
            </div>

            <!-- Segunda fila: 3 campos -->
            <div class="form-row">
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad') }}" required>
                </div>
                <div class="form-group">
                    <label>Unidad de Medida</label>
                    <input type="text" name="unidad_medida" class="form-control" value="{{ old('unidad_medida') }}" required>
                </div>
                <div class="form-group">
                    <label>Proveedor</label>
                    <input type="text" name="proveedor" class="form-control" value="{{ old('proveedor') }}" required>
                </div>
            </div>

            <!-- Tercera fila: 3 campos -->
            <div class="form-row">
                <div class="form-group">
                    <label>Precio Compra</label>
                    <input type="number" name="precio_compra" class="form-control" value="{{ old('precio_compra') }}" step="0.01" required>
                </div>
                <div class="form-group">
                    <label>Mínimo Stock</label>
                    <input type="number" name="minimo_stock" class="form-control" value="{{ old('minimo_stock') }}" required>
                </div>
                <div class="form-group">
                    <label>Activo</label>
                    <select name="activo" class="form-control" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="botones-container">
                <button type="submit" class="btn btn-success">💾 Guardar</button>
                <a href="{{ route('inventario.index') }}" class="btn btn-secondary text-decoration-none">❌ Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>