@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
        font-family: Arial, sans-serif;
    }

    .container {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
        font-weight: bold;
        color: #333;
    }

    .btn-success {
        background-color: #54c46eff;
        border: none;
        color:black;
        border-radius: 8px;
        padding: 8px 15px;
        transition: 0.3s;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-warning {
        background-color: #e2bc4bff;
        color:black;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #d94d5bff;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 15px;
    }

    table thead {
        background: #343a40;
        color: #fff;
    }

    table th, table td {
        text-align: center;
        padding: 12px;
        border: 1px solid #dee2e6;
    }

    table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .alert {
        border-radius: 8px;
        padding: 10px 15px;
    }
    a {
    text-decoration: none !important;
}
 .btn-primary {
        background-color: #3a7ac4ff;
        border: none;
        color: white;
        border-radius: 8px;
        padding: 8px 15px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: #357abd;
    }

    /* 🔹 Estilos para el buscador */
    .search-container {
        display: flex;
        gap: 10px;
        position: absolute;
        top:100px;
        left: 470px;
        align-items: center;
        margin-left: auto;
    }

    .search-form {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .search-input {
        padding: 8px 12px;
        border: 2px solid #ddd;
        border-radius: 8px;
        width: 250px;
        transition: all 0.3s;
    }

    .search-input:focus {
        border-color: #3a7ac4ff;
        box-shadow: 0 0 0 0.2rem rgba(58, 122, 196, 0.25);
        outline: none;
    }

    .btn-search {
        background-color: #3a7ac4ff;
        border: none;
        color: white;
        border-radius: 8px;
        padding: 8px 15px;
        transition: 0.3s;
        cursor: pointer;
    }

    .btn-search:hover {
        background-color: #357abd;
    }

    .btn-clear {
        background-color: #6c757d;
        border: none;
        color: white;
        border-radius: 8px;
        padding: 8px 15px;
        transition: 0.3s;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-clear:hover {
        background-color: #5a6268;
        color: white;
    }

    /* 🔹 Para que los botones de acciones estén en línea */
    .action-buttons {
        display: flex;
        gap: 5px;
        justify-content: center;
        align-items: center;
    }

    .action-buttons form {
        margin: 0;
        display: inline;
    }

    /* 🔹 Estilos para botones con ícono y texto en línea */
    .btn-with-icon {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    /* 🔹 Alineación de la paginación arriba a la derecha */
    .pagination-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 10px;
    }
    .pagination-minimal {
        position: absolute;
        right: 120px;
        top: 100px;
        display: flex;
        gap: 8px;
        z-index: 15;
    }

    .pagination-arrow {
        color: white;
        font-size: 20px;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(55, 38, 205, 0.8);
        border-radius: 50%;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .pagination-arrow:hover {
        background: rgba(33, 30, 126, 0.9);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }

    .pagination-arrow.disabled {
        background: rgba(51, 51, 51, 0.4);
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
        color: #777;
    }

    .pagination-arrow:not(.disabled):active {
        transform: translateY(1px);
    }
</style>

<div class="container mt-4">
    <h2 class="text-center mb-4">📋 Inventario</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex gap-2">
            <a href="{{ route('inventario.create') }}" class="btn btn-success">➕ Agregar Producto</a>
            <a href="{{ route('menu') }}" class="btn btn-primary">🏠 Regresar al Menú Principal</a>
        </div>

        <!-- BUSCADOR AL LADO DEL BOTÓN -->
        <div class="search-container">
            <form method="GET" action="{{ route('inventario.index') }}" class="search-form">
                <input type="text" 
                       name="search" 
                       class="search-input" 
                       placeholder="🔍 Buscar por nombre..." 
                       value="{{ request('search') }}">
                <button type="submit" class="btn-search">Buscar</button>
                @if(request('search'))
                    <a href="{{ route('inventario.index') }}" class="btn-clear">Limpiar</a>
                @endif
            </form>
        </div>
    </div>

    <!-- PAGINACIÓN ARRIBA -->
    <div class="pagination-minimal">
        @if ($productos->onFirstPage())
            <span class="pagination-arrow disabled">❮</span>
        @else
            <a href="{{ $productos->previousPageUrl() }}{{ request('search') ? '&search=' . request('search') : '' }}" class="pagination-arrow">❮</a>
        @endif
        
        @if ($productos->hasMorePages())
            <a href="{{ $productos->nextPageUrl() }}{{ request('search') ? '&search=' . request('search') : '' }}" class="pagination-arrow">❯</a>
        @else
            <span class="pagination-arrow disabled">❯</span>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Proveedor</th>
                <th>Precio Compra</th>
                <th>Mínimo Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $item)
            <tr>
                <td>{{ $item->id_producto }}</td>
                <td>{{ $item->nombre_producto }}</td>
                <td>{{ $item->categoria }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>{{ $item->unidad_medida }}</td>
                <td>{{ $item->proveedor }}</td>
                <td>${{ $item->precio_compra }}</td>
                <td>{{ $item->minimo_stock }}</td>

                <td>
                    <!-- BOTONES DE ACCIÓN EN LÍNEA CON ÍCONO Y TEXTO JUNTOS -->
                    <div class="action-buttons">
                        <a href="{{ route('inventario.edit', $item->id) }}" class="btn btn-warning btn-sm btn-with-icon">
                            ✏️ Editar
                        </a>
                        <form action="{{ route('inventario.destroy', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-with-icon" onclick="return confirm('¿Eliminar producto?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection