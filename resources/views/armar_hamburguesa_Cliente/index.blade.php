@extends('layouts.app')

@section('content')
<style>
body {
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('assets/img/h.jpg') }}');
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    padding: 20px;
    font-family: 'Poppins', sans-serif;
    color: white;
}

.burger-builder-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.ingredientes-panel {
    width: 37%;
    background-color: #000;
    position: relative;
    left:100px;
    padding: 20px;
    border-radius: 15px;
}

.ingredientes-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.ingrediente-btn {
    background-color: #111;
    border-radius: 15px;
    text-align: center;
    padding: 8px 10px;
    min-width: 98px;
    position: relative;
    top: 33px;
    height: 105px;
    border: 2px solid #2a2a2aff;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.ingrediente-btn:hover {
    transform: translateY(-3px);
    background-color: #edeca7ff;
    color: black;
}

/* círculo */
.ingrediente-btn .img-circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-color: #f8f0d8;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-bottom: 5px;
}
.ingrediente-btn .img-circle img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    pointer-events: none;
}

.ingrediente-btn span {
    font-size: 14px;
    margin-top: 5px;
    color: white;
    font-weight: bold;
}

.burger-preview {
    width: 40%;
    background-color: #111;
    position: relative;
    left:-70px;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
}

.hamburguesa-container {
    min-height: 350px;
    border-radius: 15px;
    background-color: #191818ff;
    display: flex;
    flex-direction: column-reverse;
    align-items: center;
    justify-content: flex-end;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
}

.ingrediente-visual {
    width: 220px;
    height: 25px;
    border-radius: 50px;
    margin: 3px 0;
    animation: drop 0.6s ease forwards;
}

.pan-ajonjoli {
  position: relative;
  background: linear-gradient(to bottom, #f7b733, #f78f1e);
  height: 50px;
  border-radius: 80px 80px 20px 20px;
  overflow: hidden;
}

/* Semillas de ajonjolí estáticas */
.pan-ajonjoli {
  position: relative;
  background: linear-gradient(to bottom, #f7b733, #f78f1e);
  height: 50px;
  border-radius: 80px 80px 20px 20px;
  overflow: hidden;
}

/* Semillas de ajonjolí estáticas */
.pan-ajonjoli::before {
  content: '';
  position: absolute;
  top: 10px;
  left: 10px;
  width: 4px;
  height: 4px;
  background: #fff;
  border-radius: 50%;
  box-shadow:
    20px 5px #fff,
    3px 19px #fff,
    40px 10px #fff,
    60px 8px #fff,
    80px 12px #fff,
    100px 6px #fff,
    120px 14px #fff,
    140px 9px #fff,
    160px 11px #fff,
    180px 7px #fff,
    200px 13px #fff,
    30px 20px #fff,
    50px 25px #fff,
    70px 22px #fff,
    90px 28px #fff,
    110px 24px #fff,
    130px 30px #fff,
    150px 26px #fff,
    170px 32px #fff,
    190px 29px #fff,
    210px 35px #fff;
}

.pan { background: linear-gradient(to bottom, #f7b733, #f78f1e); height: 50px; border-radius: 80px 80px 20px 20px; }
.pan-inferior { background: linear-gradient(to top, #f7b733, #f78f1e); height: 40px; border-radius: 20px 20px 10px 10px; }
.carne { background: linear-gradient(to bottom, #5a2d0c, #8b4513); height: 30px; border-radius: 15px; }
.queso { background: linear-gradient(to bottom, #ffd700, #ffcc00); height: 15px; border-radius: 5px; }
.lechuga { background: linear-gradient(to bottom, #4CAF50, #2E7D32); height: 12px; border-radius: 8px; }
.tocino { background: repeating-linear-gradient(45deg, #b22222, #b22222 5px, #ff6347 5px, #ff6347 10px); height: 10px; border-radius: 4px; }
.cebolla { background: repeating-linear-gradient(45deg, #901a84ff, #d8d5d5ff 5px, #901a84ff 5px, #d8d5d5ff 10px); height: 10px; border-radius: 4px; }
.pepinillos { background: linear-gradient(to bottom, #6b8e23, #556b2f); height: 10px; border-radius: 6px; }
.huevo { background: radial-gradient(circle, #fff8dc 40%, #f5deb3 100%); height: 18px; border-radius: 50%; }
.aguacate { background: linear-gradient(to bottom, #568203, #6aa84f); height: 12px; border-radius: 8px; }
.champiñones { background: radial-gradient(circle, #a89f91 40%, #dcd2c2 100%); height: 14px; border-radius: 50%; }
.jalapeño { background: linear-gradient(to bottom, #006400, #228b22); height: 10px; border-radius: 50%; }
.tomate { background: linear-gradient(to bottom, #ff6347, #d62828); height: 15px; border-radius: 50%; }
.jamon { background: linear-gradient(to bottom, #e487d6ff, #ec7ac4ff); height: 10px; border-radius: 5px; }
.carne-pollo { background: linear-gradient(to bottom, #ebb95cff, #caa32eff); height: 30px; border-radius: 15px; }

@keyframes drop { 
    from { transform: translateY(-120px) scale(0.8); opacity: 0; } 
    to { transform: translateY(0) scale(1); opacity: 1; } 
}

.precio-total { font-size: 28px; margin: 20px 0; }

.btn-custom {
    display: block;
    width: 80%;
    margin: 10px auto;
    padding: 12px;
    border-radius: 25px;
    font-weight: bold;
    font-size: 18px;
    cursor: pointer;
    border: none;
    transition: transform 0.2s ease;
}
.btn-custom:hover {
    transform: scale(1.05);
}
.btn-nueva { background: #fff; color: #000; }
.btn-agregar { background: linear-gradient(135deg, #ffffffff); color: #121111ff; }
.btn-regresar { background: #f18d2c; color: #000; width: 77%; text-decoration: none;}

/* 🧠 Estilos del asistente modal */
.asistente-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.asistente-contenido {
    background: #1b1b1b;
    color: #fff;
    text-align: center;
    padding: 30px 40px;
    border-radius: 20px;
    max-width: 420px;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
    animation: aparecer 0.5s ease forwards;
}

.asistente-img {
    width: 150px;
    height: 150px;
    object-fit: contain;
    margin-bottom: 15px;
    filter: drop-shadow(0 0 8px #303030ff);
}

.asistente-contenido h2 {
    color: #d3b860;
    font-size: 26px;
    margin-bottom: 10px;
    font-weight: bold;
}

.asistente-contenido p {
    font-size: 18px;
    color: #f0f0f0;
    margin-bottom: 20px;
}

.btn-entendido {
    background: linear-gradient(135deg, #f7b733, #f78f1e);
    color: #000;
    font-weight: bold;
    border: none;
    border-radius: 25px;
    padding: 10px 25px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-entendido:hover {
    transform: scale(1.1);
    background: linear-gradient(135deg, #ffd86f, #ffb347);
}

/* Animación de entrada */
@keyframes aparecer {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}
.btn-quitar {
    background: #ffffffff;
    color: black;
    border: none;
    border-radius: 25px;
    padding: 12px;
    font-size: 18px;
    font-weight: bold;
    width: 80%;
    margin: 10px auto;
    display: block;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-quitar:hover {
    background: #ffffffff;
    transform: scale(1.05);
}
/* 🔒 Ingredientes no disponibles */
.no-disponible {
    opacity: 0.5;
    cursor: not-allowed;
    background-color: #333 !important;
    border: 2px solid #555 !important;
}

.no-disponible:hover {
    transform: none;
    background-color: #333 !important;
    color: #ccc !important;
}

</style>

<!-- 🧠 ASISTENTE MODAL -->
<div id="asistenteModal" class="asistente-overlay">
    <div class="asistente-contenido">
        <img src="{{ asset('assets/icons/robot.png') }}" alt="Asistente Robot" class="asistente-img">
        <h2>🤖 ¡Hola Chef!</h2>
        <p>Para armar la hamburguesa, primero debes comenzar con el <strong>pan inferior 🍞</strong>.</p>
        <button id="btnEntendido" class="btn-entendido">Entendido</button>
    </div>
</div>

<div class="burger-builder-container">
    <div class="ingredientes-panel">
        <span style="color: #d3b860ff; font-size:35px; font-weight: bold;">🍔 ARMA TU</span> <span style="color: #ffffffff;font-size:35px; font-weight: bold;"> HAMBURGUESA</span>
        <div class="ingredientes-grid">
            @foreach ($ingredientes as $ingrediente)
    @php
        $disponible = $ingrediente->minimo_stock > 0;
    @endphp

    <div class="ingrediente-btn {{ $disponible ? '' : 'no-disponible' }}" 
         onclick="{{ $disponible ? 'agregarIngrediente(this)' : 'alert(\'⚠️ Ingrediente no disponible.\')' }}">
        <div class="img-circle">
            <img src="{{ asset('assets/ingredients/' . $ingrediente->imagen) }}" alt="{{ $ingrediente->nombre_producto }}">
        </div>
        <span>
            {{ $ingrediente->nombre_producto }}
            @unless($disponible)
                <br><small style="color: #ff6961;">No disponible</small>
            @endunless
        </span>
        <input type="checkbox" 
               value="{{ $ingrediente->nombre_producto }}" 
               data-precio="{{ $ingrediente->precio_compra }}" 
               style="display:none;" 
               {{ $disponible ? '' : 'disabled' }}>
    </div>
@endforeach
        </div>
    </div>

    <div class="burger-preview">
        <span style="color: #ffffffff; font-size:40px; font-weight: bold;">TU </span> <span style="color: #d3b860ff;font-size:40px; font-weight: bold;"> HAMBURGUESA</span>
        <div id="burgerOutput" class="hamburguesa-container"></div>
        <div class="precio-total">$<span id="totalPrecio">0.00</span></div>

        <!-- ❌ Botón Quitar Ingrediente -->
        <button class="btn-quitar" onclick="quitarIngrediente()">
            <img src="{{ asset('assets/icons/tache.png') }}" alt="Quitar" style="height: 28px; vertical-align: middle; margin-right: 8px;">
            Quitar Ingrediente
        </button>


        {{-- ✅ Formulario para agregar al carrito --}}
        <form id="formCarrito" action="{{ route('carritoCliente.agregar') }}" method="POST">
            @csrf
            <input type="hidden" name="nombre" value="Hamburguesa Personalizada">
            <input type="hidden" id="ingredientesInput" name="ingredientes">
            <input type="hidden" id="precioInput" name="precio">
            <input type="hidden" name="imagen" value="{{ asset('assets/icons/hamburguesa.png') }}">
            <button type="submit" class="btn-custom btn-agregar">
            <img src="{{ asset('assets/icons/carrito.png') }}" alt="Icono carrito" style="height: 29px; transform: scale(1.2); vertical-align: middle; margin-right: 8px;">
            Agregar
            </button>
        </form>

       <a href="{{ route('menucliente') }}" class="btn-custom btn-regresar">
       <img src="{{ asset('assets/icons/black2.png') }}" alt="Icono regresar" style="height: 28px; transform: scale(1.2); vertical-align: middle; margin-right: 8px;">
       Regresar
       </a>

    </div>
</div>

<script>
let seleccionados = [];
let precioTotal = 0;

// 🧩 Agregar ingrediente
function agregarIngrediente(element) {
    const checkbox = element.querySelector('input[type="checkbox"]');
    const nombre = checkbox.value;
    const precio = parseFloat(checkbox.dataset.precio);

    if (isNaN(precio)) {
        alert("⚠️ Error: el precio del ingrediente no es válido.");
        return;
    }

    seleccionados.push({ nombre, precio });
    precioTotal = parseFloat(precioTotal) + precio;

    actualizarPrecio();
    renderBurger();
}

// ❌ Quitar último ingrediente agregado
function quitarIngrediente() {
    if (seleccionados.length === 0) {
        alert("⚠️ No hay ingredientes para quitar.");
        return;
    }

    const eliminado = seleccionados.pop();
    const precioEliminado = parseFloat(eliminado.precio) || 0;
    precioTotal = parseFloat(precioTotal) - precioEliminado;

    if (isNaN(precioTotal) || precioTotal < 0) {
        precioTotal = 0;
    }

    actualizarPrecio();
    renderBurger();
}

// 💵 Actualizar precio mostrado
function actualizarPrecio() {
    const total = parseFloat(precioTotal) || 0;
    document.getElementById('totalPrecio').textContent = total.toFixed(2);
}

// 🍔 Renderizar hamburguesa visual
function renderBurger() {
    const output = document.getElementById('burgerOutput');
    output.innerHTML = seleccionados
        .map(i => `<div class="ingrediente-visual ${i.nombre.toLowerCase().replace(/\s/g,'')}"></div>`)
        .join('');
}

// 🔄 Reiniciar hamburguesa
function resetBurger() {
    seleccionados = [];
    precioTotal = 0;
    actualizarPrecio();
    renderBurger();
}

// 🛒 Preparar datos para enviar al carrito
document.getElementById('formCarrito').addEventListener('submit', function() {
    document.getElementById('ingredientesInput').value = seleccionados.map(i => i.nombre).join(', ');
    document.getElementById('precioInput').value = (parseFloat(precioTotal) || 0).toFixed(2);
});

// 🤖 Asistente inicial
window.addEventListener('load', function() {
    const modal = document.getElementById('asistenteModal');
    const btn = document.getElementById('btnEntendido');

    modal.style.display = 'flex';
    btn.addEventListener('click', function() {
        modal.style.opacity = '0';
        setTimeout(() => modal.style.display = 'none', 300);
    });
});
</script>

@endsection

