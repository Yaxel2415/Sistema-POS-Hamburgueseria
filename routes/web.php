<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SugerenciasController;
use App\Http\Controllers\HamburguesaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\BebidaController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\ComplementoController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\PedidoController;

// ----------------------
// RUTAS GENERALES
// ----------------------
Route::get('/', function () {
    return redirect('/login');
});

// ----------------------
// RUTAS DE LOGIN/LOGOUT USUARIOS
// ----------------------
Route::get('/login', [LoginController::class, 'showLoginFormUsuario'])->name('login');
Route::post('/login', [LoginController::class, 'loginUsuario']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ----------------------
// RUTAS DE LOGIN/REGISTRO CLIENTES (CORREGIDAS)
// ----------------------
Route::get('/login/cliente', [LoginController::class, 'showLoginFormCliente'])->name('cliente.login');
Route::post('/login/cliente', [LoginController::class, 'loginCliente']);
Route::post('/cliente/register', [LoginController::class, 'registerCliente'])->name('cliente.register');

// ----------------------
// MENÚS SEGÚN SESIÓN
// ----------------------
Route::get('/menu', function () {
    if (session('usuario_autenticado')) {
        return view('menu.menu');
    }
    return redirect('/login');
})->name('menu');

Route::get('/menucliente', function () {
    if (session('cliente_autenticado')) {
        return view('menucliente.menucliente');
    }
    return redirect('/login/cliente');
})->name('menucliente');

// ----------------------
// RUTAS DE INVENTARIO
// ----------------------
Route::get('/inventario', function () {
    return view('inventario.index');
})->name('inventario.index');

Route::resource('inventario', InventarioController::class);

// ----------------------
// RUTAS DE CLIENTE Y USUARIO
// ----------------------
Route::resource('cliente', ClienteController::class);
Route::resource('usuario', UsuarioController::class);

// ----------------------
// RUTAS DE SUGERENCIAS
// ----------------------
Route::get('/sugerencias', function () {
    return view('sugerencias.index');
})->name('sugerencias.index');

Route::get('/sugerencias/hamburguesas', function () {
    return view('sugerencias.hamburguesas');
})->name('sugerencias.hamburguesas');

Route::get('/sugerencias/combos', function () {
    return view('sugerencias.combos');
})->name('sugerencias.combos');

Route::get('/sugerencias/complementos', function () {
    return view('sugerencias.complementos');
})->name('sugerencias.complementos');

Route::get('/sugerencias/bebidas', function () {
    return view('sugerencias.bebidas');
})->name('sugerencias.bebidas');

Route::get('/sugerencias/postres', function () {
    return view('sugerencias.postres');
})->name('sugerencias.postres');

Route::get('/sugerencias/personalizar', function () {
    return view('sugerencias.personalizar');
})->name('sugerencias.personalizar');

Route::get('/sugerencias/armar', [SugerenciasController::class, 'armar'])->name('sugerencias.armar');

Route::get('/sugerencias/carrito', function () {
    return view('sugerencias.carrito');
})->name('sugerencias.carrito');

// ----------------------
// RUTAS DE HAMBURGUESAS, COMPLEMENTOS, BEBIDAS Y COMBOS
// ----------------------
Route::get('/hamburguesas', [HamburguesaController::class, 'index'])->name('hamburguesas.index');
Route::get('/complementos', [ComplementoController::class, 'index'])->name('complementos.index');
Route::get('/bebidas', [BebidaController::class, 'index'])->name('bebidas.index');
Route::get('/combos', [ComboController::class, 'index'])->name('combos.index');

// ----------------------
// RUTAS DE CARRITO
// ----------------------
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/update/{index}', [CarritoController::class, 'update'])->name('carrito.update');
Route::post('/carrito/quitar/{index}', [CarritoController::class, 'quitar'])->name('carrito.quitar');
Route::get('/carrito/historial', [CarritoController::class, 'historialVentas'])->name('carrito.historial');

// ----------------------
// RUTAS DE ARMAR ORDEN
// ----------------------
Route::get('/armar', [InventarioController::class, 'armar'])->name('armar');

// ----------------------
// OFERTAS
// ----------------------
Route::get('/ofertas/hamburguesas', [OfertasController::class, 'hamburguesas'])->name('ofertas.hamburguesas');
Route::get('/ofertas/combos', [OfertasController::class, 'combos'])->name('ofertas.combos');
Route::get('/ofertas_todas/todas', [OfertasController::class, 'todas'])->name('ofertas_todas.todas');

// ----------------------
// ACERCA DE
// ----------------------
Route::get('/acercade', function () {
    return view('acercade.acercade');
})->name('acercade');

// ----------------------
// DEBUG TEMPORAL
// ----------------------
Route::get('/debug-clientes', [LoginController::class, 'debugClientes']);

// Nuevo catálogo de sugerencias para cliente
Route::get('/catalogo', function () {
    return view('catalogo.index');
})->name('catalogo.index');

// Hamburguesas cliente
Route::get('/hamburguesasCliente', [HamburguesaController::class, 'indexCliente'])->name('hamburguesasCliente.index');

// Combos cliente
Route::get('/combosCliente', [ComboController::class, 'indexCliente'])->name('combosCliente.index');

// Bebidas cliente
Route::get('/bebidasCliente', [BebidaController::class, 'indexCliente'])->name('bebidasCliente.index');

// Complementos cliente
Route::get('/complementosCliente', [ComplementoController::class, 'indexCliente'])->name('complementosCliente.index');

// Armar hamburguesa cliente
Route::get('/armarHamburguesaCliente', [InventarioController::class, 'armarCliente'])->name('armarHamburguesaCliente.index');

// Carrito cliente
Route::get('/carritoCliente', [CarritoController::class, 'indexCliente'])->name('carritoCliente.index');
Route::post('/carritoCliente/agregar', [CarritoController::class, 'agregarCliente'])->name('carritoCliente.agregar');
Route::post('/carritoCliente/quitar/{index}', [CarritoController::class, 'quitarCliente'])->name('carritoCliente.quitar');
Route::post('/carritoCliente/update/{index}', [CarritoController::class, 'updateCliente'])->name('carritoCliente.update');

// En routes/web.php
Route::post('/carrito/confirmar', [CarritoController::class, 'confirmarVenta'])->name('carrito.confirmar');
Route::post('/carritoCliente/confirmar', [CarritoController::class, 'confirmarVentaCliente'])->name('carritoCliente.confirmar');
Route::get('/ticket/generar', [TicketController::class, 'generarTicket'])->name('ticket.generar');

Route::post('/guardar-calificacion', [CalificacionController::class, 'store'])
    ->name('guardar.calificacion');

Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/contar', [PedidoController::class, 'contarPedidosNuevos'])->name('pedidos.contar');
Route::get('/pedidos/recientes', [PedidoController::class, 'obtenerPedidosRecientes'])->name('pedidos.recientes');