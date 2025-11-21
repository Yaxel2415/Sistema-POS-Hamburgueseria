-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2025 a las 06:17:27
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hamburgercrud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Coca-Cola 600ml', 'Refresco original bien frío.', 25.00, 'assets/img-bebidas/coca_cola.png', '2025-09-20 22:28:40', '2025-09-20 22:28:40'),
(2, 'Sprite 600ml', 'Refresco sabor lima-limón refrescante.', 25.00, 'assets/img-bebidas/sprite.png', '2025-09-20 22:28:40', '2025-09-20 22:28:40'),
(3, 'Fanta Naranja 600ml', 'Refresco con un delicioso sabor a naranja.', 25.00, 'assets/img-bebidas/fanta.png', '2025-09-20 22:28:40', '2025-09-20 22:28:40'),
(4, 'Agua Natural 500ml', 'Agua purificada para acompañar tu comida.', 20.00, 'assets/img-bebidas/agua.png', '2025-09-20 22:28:40', '2025-09-20 22:28:40'),
(5, 'Jugo Jumex', 'Jugo con pulpa natural mango.', 30.00, 'assets/img-bebidas/jumex.png', '2025-09-20 22:28:40', '2025-09-20 22:28:40'),
(8, 'Manzanita Sol 355ml', 'Refresco sabor manzana en lata.', 16.00, 'assets/img-bebidas/manzanita.png', '2025-09-20 22:48:23', '2025-09-20 22:48:23'),
(9, 'Boing Mango 500ml', 'Bebida de pulpa de fruta Boing sabor mango.', 20.00, 'assets/img-bebidas/boing_mango.png', '2025-09-20 22:48:23', '2025-09-20 22:48:23'),
(10, 'Boing Guayaba 500ml', 'Bebida de pulpa de fruta Boing sabor guayaba.', 20.00, 'assets/img-bebidas/boing_guayaba.png', '2025-09-20 22:48:23', '2025-09-20 22:48:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `estrellas` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `email`, `estrellas`, `created_at`, `updated_at`) VALUES
(1, 'vania@gmail.com', 4, '2025-11-02 04:29:05', '2025-11-02 04:29:05'),
(2, 'vania@gmail.com', 2, '2025-11-02 05:14:24', '2025-11-02 05:14:24'),
(3, 'bahena@gmail.com', 5, '2025-11-02 05:59:01', '2025-11-02 05:59:01'),
(4, 'cliente@gmail.com', 3, '2025-11-21 03:40:41', '2025-11-21 03:40:41'),
(5, 'cliente@gmail.com', 4, '2025-11-21 04:05:18', '2025-11-21 04:05:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `Ap_Paterno` varchar(255) NOT NULL,
  `Ap_Materno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `id_cliente`, `nombre`, `Ap_Paterno`, `Ap_Materno`, `email`, `password`, `telefono`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'P001', 'AXEL', 'BAHENA', 'VAZQUEZ', 'axel@gmail.com', 'halamadrid', '7333357378', 'COLONIA MIRADOR, CERRO DEL NARANJO #25', '2025-09-02 03:37:21', '2025-10-19 01:20:57'),
(2, 'P002', 'JUESUS', 'RABADAN', 'PEREZ', 'jesus@gmail.com', NULL, '7332226745', 'FRACCIONAMIENTO REFORMA', '2025-09-09 02:44:08', '2025-09-09 02:44:08'),
(3, 'CLI001', 'Luis', 'Gonzalez', 'Ramirez', 'lgonzalez@example.com', NULL, '5551112233', 'Av. Reforma 101, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(4, 'CLI002', 'Ana', 'Martinez', 'Lopez', 'amartinez@example.com', NULL, '5552223344', 'Calle Juarez 202, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(5, 'CLI003', 'Carlos', 'Hernandez', 'Soto', 'chernandez@example.com', NULL, '5553334455', 'Calle Hidalgo 303, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(6, 'CLI004', 'Laura', 'Diaz', 'Fernandez', 'ldiaz@example.com', NULL, '5554445566', 'Calle Morelos 404, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(7, 'CLI005', 'Jorge', 'Ruiz', 'Torres', 'jruiz@example.com', NULL, '5555556677', 'Calle Matamoros 505, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(8, 'CLI006', 'Beatriz', 'Cruz', 'Mendoza', 'bcruz@example.com', NULL, '5556667788', 'Calle Zaragoza 606, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(9, 'CLI007', 'Fernando', 'Navarro', 'Vega', 'fnavarro@example.com', NULL, '5557778899', 'Calle Allende 707, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(10, 'CLI008', 'Patricia', 'Sanchez', 'Campos', 'psanchez@example.com', NULL, '5558889900', 'Calle Independencia 808, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(11, 'CLI009', 'Ricardo', 'Morales', 'Silva', 'rmorales@example.com', NULL, '5559990011', 'Calle Niños Heroes 909, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(12, 'CLI010', 'Monica', 'Reyes', 'Ortega', 'mreyes@example.com', NULL, '5550001122', 'Calle Insurgentes 1010, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(13, 'CLI011', 'Sofia', 'Aguilar', 'Delgado', 'saguilar@example.com', NULL, '5551012131', 'Calle Tlalpan 1111, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(14, 'CLI012', 'Hugo', 'Salas', 'Carrillo', 'hsalas@example.com', NULL, '5552123141', 'Calle Xola 1212, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(15, 'CLI013', 'Valeria', 'Miranda', 'Bautista', 'vmiranda@example.com', NULL, '5553134151', 'Calle División del Norte 1313, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(16, 'CLI014', 'Oscar', 'Avila', 'Palacios', 'oavila@example.com', NULL, '5554145161', 'Calle Universidad 1414, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(17, 'CLI015', 'Julio', 'Rosales', 'Escobar', 'jrosales@example.com', NULL, '5555156171', 'Calle Copilco 1515, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(18, 'CLI016', 'Yolanda', 'Serrano', 'Peña', 'yserrano@example.com', NULL, '5556167181', 'Calle Taxqueña 1616, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(19, 'CLI017', 'Marco', 'Delgado', 'Cordero', 'mdelgado@example.com', NULL, '5557178191', 'Calle Periférico 1717, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(20, 'CLI018', 'Lucia', 'Palacios', 'Galvez', 'lpalacios@example.com', NULL, '5558189201', 'Calle San Antonio 1818, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(21, 'CLI019', 'Guillermo', 'Escobar', 'Ramos', 'gescobar@example.com', NULL, '5559190211', 'Calle Patriotismo 1919, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(22, 'CLI020', 'Marcela', 'Peña', 'Jimenez', 'mpena@example.com', NULL, '5550201221', 'Calle Revolución 2020, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(23, 'CLI021', 'Javier', 'Cordero', 'Luna', 'jcordero@example.com', NULL, '5551212231', 'Calle Benito Juárez 2121, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(24, 'CLI022', 'Esteban', 'Galvez', 'Nunez', 'egalvez@example.com', NULL, '5552223241', 'Calle Emiliano Zapata 2222, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(25, 'CLI023', 'Sandra', 'Jimenez', 'Flores', 'sjimenez@example.com', NULL, '5553234251', 'Calle Francisco Villa 2323, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(26, 'CLI024', 'Raul', 'Luna', 'Cano', 'rluna@example.com', NULL, '5554245261', 'Calle Miguel Hidalgo 2424, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(27, 'CLI025', 'Nora', 'Nunez', 'Salas', 'nnunez@example.com', NULL, '5555256271', 'Calle Ignacio Zaragoza 2525, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(28, 'CLI026', 'Ernesto', 'Flores', 'Miranda', 'eflores@example.com', NULL, '5556267281', 'Calle Vicente Guerrero 2626, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(29, 'CLI027', 'Carla', 'Cano', 'Avila', 'ccano@example.com', NULL, '5557278291', 'Calle José María Morelos 2727, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(30, 'CLI028', 'Jorge', 'Salas', 'Rosales', 'jsalas@example.com', NULL, '5558289301', 'Calle Ignacio Allende 2828, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(31, 'CLI029', 'Ana', 'Miranda', 'Serrano', 'amiranda@example.com', NULL, '5559290311', 'Calle Juan Escutia 2929, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(32, 'CLI030', 'Luis', 'Avila', 'Delgado', 'lavila@example.com', NULL, '5550301321', 'Calle Mariano Matamoros 3030, CDMX', '2025-10-11 00:04:05', '2025-10-11 00:04:05'),
(34, 'CLIYAQVFP', 'Juan', 'Pérez', 'López', 'juan@ejemplo.com', '123456', '1234567890', 'Calle 123', '2025-10-13 08:17:38', '2025-10-13 08:17:38'),
(36, 'VAN7561', 'Vania', 'Bahena', 'Rubiales', 'vania@gmail.com', '$2y$12$jlwoiQO0Yl1HDbNOdD81heJgqqYfVw5a75b5aWbycWGZxwZ5j3ldm', '733 333 3333', 'COL IPOL', '2025-10-23 09:53:18', '2025-11-21 03:24:35'),
(37, 'PEP9758', 'PEPE', 'PEPE', 'PEPE', 'PEP@gmail.com', '$2y$12$ttfTjVsPigZTVu52OKOwGuwfl/qUPixwJwhxW9Pc/lf/Pz.y5GxPe', '733 111 1133', 'Calle 1, CDMX', '2025-10-23 10:55:11', '2025-10-23 10:55:11'),
(39, 'CLI9657', 'ClienteA', 'ClienteAP', 'ClienteAM', 'cliente@gmail.com', '$2y$12$xZ2Skl7.eVPZZ5p4JmRGC.WGv1QwsTXEn0EA/W39tskbB/KfUEczO', '7331234567', 'Calle1234', '2025-11-21 03:21:12', '2025-11-21 03:21:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `oferta` tinyint(1) NOT NULL DEFAULT 0,
  `precio_oferta` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `combos`
--

INSERT INTO `combos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `oferta`, `precio_oferta`, `created_at`, `updated_at`) VALUES
(1, 'Combo Clásico', 'Hamburguesa clásica + papas + refresco', 120.00, 'assets/img-combos/combo_clasico.png', 1, 100.00, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(2, 'Combo Doble Queso', 'Hamburguesa doble queso + papas + refresco', 150.00, 'assets/img-combos/combo_doble_queso.png', 1, 120.00, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(3, 'Combo Vegetariano', 'Hamburguesa vegetariana + ensalada + jugo', 130.00, 'assets/img-combos/combo_vegetariano.png', 1, 115.00, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(4, 'Combo Pollo Crispy', 'Hamburguesa de pollo crispy + papas + refresco', 145.00, 'assets/img-combos/combo_pollo_crispy.png', 0, NULL, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(5, 'Combo Tocino Extra', 'Hamburguesa con tocino extra + papas + refresco', 160.00, 'assets/img-combos/combo_tocino.png', 0, NULL, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(6, 'Combo Familiar', '2 Hamburguesas + 2 papas grandes + 2 refrescos', 280.00, 'assets/img-combos/combo-familiar.png', 0, NULL, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(7, 'Combo Mini', 'Mini hamburguesa + papas pequeñas + jugo', 90.00, 'assets/img-combos/combo-mini.png', 1, 70.00, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(8, 'Combo Gourmet', 'Hamburguesa gourmet con queso brie + papas + bebida', 200.00, 'assets/img-combos/combo_tocino.png', 2, 150.00, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(9, 'Combo Picante', 'Hamburguesa con jalapeños + papas + refresco', 155.00, 'assets/img-combos/combo_tocino.png', 0, NULL, '2025-09-17 01:14:21', '2025-09-17 01:14:21'),
(10, 'Combo Veggie Deluxe', 'Hamburguesa vegetal + aguacate + ensalada + jugo', 170.00, 'assets/img-combos/combo_tocino.png', 0, NULL, '2025-09-17 01:14:21', '2025-09-17 01:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementos`
--

CREATE TABLE `complementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `complementos`
--

INSERT INTO `complementos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Papas a la Francesa', 'Crujientes papas doradas con sal al gusto.', 35.00, 'assets/complementos/papas_fritas.png', NULL, NULL),
(2, 'Aros de Cebolla', 'Deliciosos aros de cebolla empanizados y dorados.', 40.00, 'assets/complementos/aros_cebolla.png', NULL, NULL),
(3, 'Nuggets de Pollo', 'Nuggets de pollo empanizados, dorados al punto.', 45.00, 'assets/complementos/nuggets_pollo.png', NULL, NULL),
(4, 'Ensalada Fresca', 'Ensalada de lechuga, jitomate y aderezo ranch.', 38.00, 'assets/complementos/ensalada.png', NULL, NULL),
(5, 'Papas Gajo', 'Papas gajo sazonadas con especias caseras.', 42.00, 'assets/complementos/papas_gajo.png', NULL, NULL),
(6, 'Dedos de Queso', 'Crujientes dedos de queso mozzarella derretido.', 50.00, 'assets/complementos/dedos_queso.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hamburguesas`
--

CREATE TABLE `hamburguesas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `oferta` tinyint(1) NOT NULL DEFAULT 0,
  `precio_oferta` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hamburguesas`
--

INSERT INTO `hamburguesas` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `oferta`, `precio_oferta`, `created_at`, `updated_at`) VALUES
(1, 'Hamburguesa Clásica', 'Carne de res 150g, lechuga, tomate, cebolla, queso americano y salsa especial', 89.00, 'assets\\img-hamburgesas\\BBQ Ranch.png', 1, 75.00, NULL, NULL),
(2, 'Doble Queso', 'Doble carne de res, doble queso cheddar, tocino crujiente y salsa BBQ', 129.00, 'assets\\img-hamburgesas\\doblequeso.png', 1, 85.00, NULL, NULL),
(3, 'Pollo Crispy', 'Pechuga de pollo empanizada, lechuga, mayonesa y pan tostado', 95.00, 'assets\\img-hamburgesas\\hamburgerpollo.png', 0, NULL, NULL, NULL),
(4, 'Vegetariana', 'Medallón de lentejas, aguacate, espinacas, queso de cabra y aderezo de hierbas', 105.00, 'assets\\img-hamburgesas\\vegetariana.png', 0, NULL, NULL, NULL),
(5, 'BBQ Ranch', 'Carne de res, aros de cebolla, queso pepper jack y salsa ranch', 115.00, 'assets\\img-hamburgesas\\hamburger_tosino.png', 1, 100.00, NULL, NULL),
(6, 'Mexicana', 'Carne de res, jalapeños, guacamole, queso monterrey y pico de gallo', 110.00, 'assets\\img-hamburgesas\\burger_mexicana.png', 1, 90.00, NULL, NULL),
(7, 'Hawaiana', 'Carne de res, piña, jamón, queso suizo y salsa teriyaki', 120.00, 'assets\\img-hamburgesas\\hawai.png', 0, NULL, NULL, NULL),
(8, 'Pollo BBQ', 'Pechuga de pollo, queso cheddar, tocino y salsa BBQ', 112.00, 'assets\\img-hamburgesas\\hamburgerpollo.png', 0, NULL, NULL, NULL),
(9, 'Triple Carne', 'Tres carnes de res, doble queso cheddar, lechuga, tomate y salsa especial', 150.00, 'assets\\img-hamburgesas\\burger_sandwich.png', 2, 110.00, NULL, NULL),
(10, 'Veggie Deluxe', 'Medallón de garbanzos, aguacate, espinacas, queso vegano y aderezo de mostaza', 125.00, 'assets\\img-hamburgesas\\hamburgerpollo.png', 1, 95.00, NULL, NULL),
(11, 'Bacon Cheese', 'Carne de res, doble queso cheddar, tocino crujiente y salsa especial', 135.00, 'assets\\img-hamburgesas\\hamburger_tosino.png', 0, NULL, NULL, NULL),
(12, 'Picante Extreme', 'Carne de res, jalapeños, chipotle, queso pepper jack y salsa picante', 118.00, 'assets\\img-hamburgesas\\hamburgerpollo.png', 2, 100.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` varchar(255) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `unidad_medida` varchar(255) NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `minimo_stock` varchar(255) NOT NULL,
  `activo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `id_producto`, `nombre_producto`, `categoria`, `cantidad`, `unidad_medida`, `proveedor`, `precio_compra`, `minimo_stock`, `activo`, `created_at`, `updated_at`, `imagen`) VALUES
(1, 'P001', 'Pan', 'ingrediente', '52', 'piezas', 'Proveedor Local', '2.50', '1', '1', '2025-09-01 20:04:40', '2025-11-21 05:05:26', 'sinajonjo.png'),
(2, 'P002', 'pan-inferior', 'ingrediente', '100', 'kg', 'Carnes Selectas', '120.00', '5', '1', '2025-09-01 20:31:33', '2025-11-21 05:14:24', 'pan_inferior.png'),
(3, 'P003', 'queso', 'ingrediente', '30', 'kg', 'Proveedor C', '90.00', '29', '1', '2025-10-07 22:38:19', '2025-11-21 04:47:58', 'queso.png'),
(4, 'P004', 'lechuga', 'ingrediente', '40', 'pz', 'Proveedor D', '15.00', '6', '1', '2025-10-07 22:38:19', '2025-11-21 05:01:41', 'lechuga.png'),
(6, 'P006', 'tocino', 'ingrediente', '25', 'kg', 'Proveedor E', '150.00', '12', '1', '2025-10-07 22:38:19', '2025-11-21 05:14:24', 'tocino.png'),
(7, 'P007', 'Pepinillos', 'ingrediente', '50', 'pz', 'Proveedor F', '12.00', '9', '1', '2025-10-07 22:38:19', '2025-11-21 05:14:24', 'pepinillo.png'),
(8, 'P008', 'huevo', 'ingrediente', '80', 'pz', 'Proveedor G', '8.50', '7', '1', '2025-10-07 22:38:19', '2025-11-21 03:28:13', 'huevo.png'),
(9, 'P009', 'champiñones', 'ingrediente', '30', 'kg', 'Proveedor H', '70.00', '5', '1', '2025-10-07 22:38:19', '2025-10-07 22:38:19', 'champinon.png'),
(10, 'P010', 'jalapeño', 'ingrediente', '40', 'pz', 'Proveedor I', '10.00', '10', '1', '2025-10-07 22:38:19', '2025-10-07 22:38:19', 'jalapeno.png'),
(11, 'P011', 'aguacate', 'ingrediente', '25', 'pz', 'Proveedor J', '18.00', '5', '1', '2025-10-07 23:02:15', '2025-10-07 23:02:15', 'aguacate.png'),
(12, 'P012', 'cebolla', 'ingrediente', '50', 'pz', 'Proveedor K', '12.00', '8', '1', '2025-10-07 23:02:15', '2025-11-12 08:22:10', 'cebolla.png'),
(13, 'P013', 'carne', 'ingrediente', '100', 'pz', 'Proveedor L', '4.00', '11', '1', '2025-10-07 23:02:15', '2025-11-21 04:47:58', 'carne.png'),
(14, 'P014', 'pan-ajonjoli', 'ingrediente', '100', 'pz', 'Proveedor L', '6.00', '14', '1', '2025-10-07 23:02:15', '2025-11-21 05:14:24', 'pan.png'),
(15, 'PO15', 'jamon', 'ingrediente', '31', 'kg', 'Proveedor Local', '2.50', '15', '1', '2025-10-11 08:37:49', '2025-11-21 04:47:58', 'jamon.png'),
(16, 'P017', 'tomate', 'ingrediente', '40', 'Pz', 'Proveedor Local', '8.50', '15', '1', '2025-10-11 08:44:07', '2025-10-11 08:44:07', 'tomate.png'),
(17, 'P018', 'carne-pollo', 'ingrediente', '100', '50', 'PROVEDOR 18', '6.00', '28', '1', '2025-11-27 02:36:50', '2025-11-21 05:14:24', 'carnepollo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_26_210406_create_usuario_table', 1),
(5, '2025_08_26_210448_create_inventario_table', 1),
(6, '2025_08_26_210508_create_venta_table', 1),
(7, '2025_08_26_210521_create_cliente_table', 1),
(8, '2025_08_26_220454_create_venta_detalle_table', 1),
(9, '2025_09_16_223442_create_hamburguesas_table', 2),
(10, '2025_09_17_010043_create_combos_table', 3),
(11, '2025_09_20_215725_create_complementos_table', 4),
(12, '2025_09_20_222722_create_bebidas_table', 5),
(13, '2025_10_07_222622_add_imagen_to_inventario_table', 6),
(14, '2025_10_09_024520_rename_nombre_to_nombre_hamburguesa_in_hamburguesas_table', 7),
(15, '2025_10_09_024805_rename_nombre_to_nombre_bebida_in_bebidas_table', 8),
(16, '2025_10_09_025029_rename_nombre_to_nombre_combo_in_combos_table', 9),
(17, '2025_10_09_025526_rename_nombre_to_nombre_complemento_in_complementos_table', 10),
(18, '2025_10_09_031953_rename_nombre_hamburguesa_to_nombre_in_hamburguesas_table', 11),
(19, '2025_10_09_032225_rename_nombre_bebida_to_nombre_in_bebidas_table', 12),
(20, '2025_10_09_032426_rename_nombre_combo_to_nombre_in_combos_table', 13),
(21, '2025_10_09_032545_rename_nombre_complemento_to_nombre_in_complementos_table', 14),
(22, '2025_10_09_221355_create_ventas_table', 15),
(23, '2025_10_11_014232_add_password_to_cliente_table', 16),
(24, '2025_10_11_014502_add_password_to_cliente_table', 17),
(25, '2025_10_14_224430_add_oferta_to_hamburguesas_and_combos', 18),
(26, '2025_10_30_015231_create_calificaciones_table', 19),
(27, '2025_10_30_021507_create_calificacion_table', 20),
(28, '2025_10_30_023032_create_calificaciones_table', 21),
(29, '2025_10_30_024352_create_calificaciones_table', 22),
(30, '2025_10_30_033111_create_calificaciones_table', 23),
(31, '2025_10_30_034403_create_calificaciones_table', 24),
(32, '2025_11_01_214138_create_calificaciones_table', 25),
(33, '2025_11_19_015235_add_ingredientes_to_venta_detalle', 26),
(34, '2025_11_19_210358_add_ingredientes_to_venta_detalle_table', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EKJtbPzNMvx0HIACrM6B8THzA2sjfbCamsQ03zYH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6ImhTUGRxVG14QWIwenVZNzBjeUp5czlhb2pyZnVBS0xMcUtmZjRQWVUiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE5OiJ1c3VhcmlvX2F1dGVudGljYWRvIjtiOjE7czoxMDoidXN1YXJpb19pZCI7czo2OiJVU1I1NjciO3M6MTQ6InVzdWFyaW9fbm9tYnJlIjtzOjM6IlVVVSI7czoxOToiY2xpZW50ZV9hdXRlbnRpY2FkbyI7YjoxO3M6MTA6ImNsaWVudGVfaWQiO3M6NzoiQ0xJOTY1NyI7czoxNDoiY2xpZW50ZV9ub21icmUiO3M6MTg6IkNsaWVudGVBIENsaWVudGVBUCI7czoxMzoiY2xpZW50ZV9lbWFpbCI7czoxNzoiY2xpZW50ZUBnbWFpbC5jb20iO30=', 1763702224);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `nombre_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `Ap_Paterno` varchar(255) NOT NULL,
  `Ap_Materno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero_tel` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_usuario`, `nombre_user`, `password`, `nombre`, `Ap_Paterno`, `Ap_Materno`, `email`, `numero_tel`, `direccion`, `created_at`, `updated_at`) VALUES
(3, 'admin24', 'admin2', 'hola123', 'adminDos', 'adminDos', 'adminDos', 'adminDos@gmail.com', '7331455544', 'col cerro #24 sureste', NULL, '2025-10-02 02:34:07'),
(5, 'S002', 'Rpk24', '$2y$12$AZq/V8FexbEMAxNHgFTdMeDVjzHLiQJMAMF309DZvpf2VzqeHrZ0u', 'Juan', 'Perez', 'Lopez', 'juanperz@gmail.com', '7333337890', 'COLONIA MIRADOR, CERRO DEL NARANJO #25', '2025-10-11 05:57:00', '2025-10-11 05:57:00'),
(6, 'USR001', 'jlopez', '$2y$12$wPxwvpUGUDpb9NSl5dD//.5GKNOZK3k46AfKJdNje/k6ZW536eOcW', 'Juan', 'Lopez', 'Martinez', 'jlopez@example.com', '5551234567', 'Calle 1, CDMX', '2025-10-11 00:01:14', '2025-10-11 07:12:29'),
(7, 'USR002', 'mgarcia', 'pass456', 'Maria', 'Garcia', 'Hernandez', 'mgarcia@example.com', '5552345678', 'Calle 2, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(8, 'USR003', 'rcastro', 'pass789', 'Roberto', 'Castro', 'Diaz', 'rcastro@example.com', '5553456789', 'Calle 3, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(9, 'USR004', 'lfernandez', 'pass321', 'Laura', 'Fernandez', 'Soto', 'lfernandez@example.com', '5554567890', 'Calle 4, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(10, 'USR005', 'dperez', 'pass654', 'Daniel', 'Perez', 'Ruiz', 'dperez@example.com', '5555678901', 'Calle 5, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(11, 'USR006', 'acortes', 'pass987', 'Ana', 'Cortes', 'Mendoza', 'acortes@example.com', '5556789012', 'Calle 6, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(12, 'USR007', 'jramirez', 'pass147', 'Jorge', 'Ramirez', 'Flores', 'jramirez@example.com', '5557890123', 'Calle 7, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(13, 'USR008', 'cnavarro', 'pass258', 'Carla', 'Navarro', 'Torres', 'cnavarro@example.com', '5558901234', 'Calle 8, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(14, 'USR009', 'emartinez', 'pass369', 'Ernesto', 'Martinez', 'Vega', 'emartinez@example.com', '5559012345', 'Calle 9, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(15, 'USR010', 'srojas', 'pass741', 'Sandra', 'Rojas', 'Campos', 'srojas@example.com', '5550123456', 'Calle 10, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(16, 'USR011', 'hvaldez', 'pass852', 'Hector', 'Valdez', 'Luna', 'hvaldez@example.com', '5551234560', 'Calle 11, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(17, 'USR012', 'nleon', 'pass963', 'Nora', 'Leon', 'Silva', 'nleon@example.com', '5552345671', 'Calle 12, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(18, 'USR013', 'rvera', 'pass159', 'Raul', 'Vera', 'Ortega', 'rvera@example.com', '5553456782', 'Calle 13, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(19, 'USR014', 'mgomez', 'pass753', 'Monica', 'Gomez', 'Reyes', 'mgomez@example.com', '5554567893', 'Calle 14, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(20, 'USR015', 'jmorales', 'pass456', 'Jose', 'Morales', 'Nunez', 'jmorales@example.com', '5555678904', 'Calle 15, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(21, 'USR016', 'lrios', 'pass789', 'Luis', 'Rios', 'Cano', 'lrios@example.com', '5556789015', 'Calle 16, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(22, 'USR017', 'farias', 'pass321', 'Fernanda', 'Arias', 'Salas', 'farias@example.com', '5557890126', 'Calle 17, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(23, 'USR018', 'gcruz', 'pass654', 'Gabriel', 'Cruz', 'Miranda', 'gcruz@example.com', '5558901237', 'Calle 18, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(24, 'USR019', 'vhernandez', 'pass987', 'Valeria', 'Hernandez', 'Avila', 'vhernandez@example.com', '5559012348', 'Calle 19, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(25, 'USR020', 'omendoza', 'pass147', 'Oscar', 'Mendoza', 'Lozano', 'omendoza@example.com', '5550123459', 'Calle 20, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(26, 'USR021', 'jcastillo', 'pass258', 'Julio', 'Castillo', 'Rosales', 'jcastillo@example.com', '5551234561', 'Calle 21, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(27, 'USR022', 'btorres', 'pass369', 'Beatriz', 'Torres', 'Serrano', 'btorres@example.com', '5552345672', 'Calle 22, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(28, 'USR023', 'mmolina', 'pass741', 'Marco', 'Molina', 'Delgado', 'mmolina@example.com', '5553456783', 'Calle 23, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(29, 'USR024', 'yflores', 'pass852', 'Yolanda', 'Flores', 'Carrillo', 'yflores@example.com', '5554567894', 'Calle 24, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(30, 'USR025', 'rsolis', 'pass963', 'Ricardo', 'Solis', 'Bautista', 'rsolis@example.com', '5555678905', 'Calle 25, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(31, 'USR026', 'lreynoso', 'pass159', 'Lucia', 'Reynoso', 'Palacios', 'lreynoso@example.com', '5556789016', 'Calle 26, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(32, 'USR027', 'gaguilar', 'pass753', 'Guillermo', 'Aguilar', 'Escobar', 'gaguilar@example.com', '5557890127', 'Calle 27, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(33, 'USR028', 'mromero', 'pass456', 'Marcela', 'Romero', 'Peña', 'mromero@example.com', '5558901238', 'Calle 28, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(34, 'USR029', 'jvargas', 'pass789', 'Javier', 'Vargas', 'Cordero', 'jvargas@example.com', '5559012349', 'Calle 29, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(35, 'USR030', 'eavila', 'pass321', 'Esteban', 'Avila', 'Galvez', 'eavila@example.com', '5550123460', 'Calle 30, CDMX', '2025-10-11 00:01:14', '2025-10-11 00:01:14'),
(37, 'USR567', 'USUARIO U', '$2y$12$Bv/mXEZsqCS5kZ72dRNG1uvH1CL/A/FpAUANwOsiruPQ3H.zP3wSG', 'UUU', 'UUU', 'UUU', 'UUU@gmail.com', '733 111 1111', 'Calle 1, CDMX', '2025-10-23 10:11:29', '2025-11-20 04:25:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_venta` varchar(255) NOT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `iva` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_venta`, `id_usuario`, `fecha`, `subtotal`, `iva`, `total`, `created_at`, `updated_at`) VALUES
(1, 'VTA_68e834a009f53', 1, '2025-10-09 22:18:08', 125.00, 20.00, 145.00, '2025-10-10 04:18:08', '2025-10-10 04:18:08'),
(2, 'VTA_68e836282ce61', 1, '2025-10-09 22:24:40', 193.97, 31.03, 225.00, '2025-10-10 04:24:40', '2025-10-10 04:24:40'),
(3, 'VTA_68e83958d6465', 1, '2025-10-09 22:38:16', 210.34, 33.66, 244.00, '2025-10-10 04:38:16', '2025-10-10 04:38:16'),
(4, 'VTA_68e874f16dca6', 1, '2025-10-10 02:52:33', 130.17, 20.83, 151.00, '2025-10-10 08:52:33', '2025-10-10 08:52:33'),
(5, 'VTA_68e8853861809', 1, '2025-10-10 04:02:00', 637.07, 101.93, 739.00, '2025-10-10 10:02:00', '2025-10-10 10:02:00'),
(6, 'VTA_68e9aa150c656', 1, '2025-10-11 00:51:33', 529.31, 84.69, 614.00, '2025-10-11 06:51:33', '2025-10-11 06:51:33'),
(7, 'VTA_68e9afd5e7374', 1, '2025-10-11 01:16:05', 426.72, 68.28, 495.00, '2025-10-11 07:16:05', '2025-10-11 07:16:05'),
(8, 'VTA_68e9b017eb1d4', 1, '2025-10-11 01:17:11', 297.41, 47.59, 345.00, '2025-10-11 07:17:11', '2025-10-11 07:17:11'),
(9, 'VTA_68e9c7dbb3880', 1, '2025-10-11 02:58:35', 250.43, 40.07, 290.50, '2025-10-11 08:58:35', '2025-10-11 08:58:35'),
(10, 'VTA_68eee6b57fe9a', 1, '2025-10-15 00:11:33', 196.98, 31.52, 228.50, '2025-10-15 06:11:33', '2025-10-15 06:11:33'),
(11, 'VTA_68f40215354c3', 1, '2025-10-18 21:09:41', 391.81, 62.69, 454.50, '2025-10-19 03:09:41', '2025-10-19 03:09:41'),
(12, 'VTA_68f40b4bedec1', 1, '2025-10-18 21:48:59', 112.07, 17.93, 130.00, '2025-10-19 03:48:59', '2025-10-19 03:48:59'),
(13, 'VTA_68f6c09439c55', 1, '2025-10-20 23:07:00', 515.52, 82.48, 598.00, '2025-10-21 05:07:00', '2025-10-21 05:07:00'),
(14, 'VTA_68f6c278b29e8', 1, '2025-10-20 23:15:04', 278.02, 44.48, 322.50, '2025-10-21 05:15:04', '2025-10-21 05:15:04'),
(15, 'VTA_68f6c3020b395', NULL, '2025-10-20 23:17:22', 168.10, 26.90, 195.00, '2025-10-21 05:17:22', '2025-10-21 05:17:22'),
(16, 'VTA_68f997f977a8a', NULL, '2025-10-23 02:50:33', 90.52, 14.48, 105.00, '2025-10-23 08:50:33', '2025-10-23 08:50:33'),
(17, 'VTA_68fae3680fde3', 1, '2025-10-24 02:24:40', 111.21, 17.79, 129.00, '2025-10-24 08:24:40', '2025-10-24 08:24:40'),
(18, 'VTA_68fae50d01117', NULL, '2025-10-24 02:31:41', 354.31, 56.69, 411.00, '2025-10-24 08:31:41', '2025-10-24 08:31:41'),
(19, 'VTA_68faf57186849', 1, '2025-10-24 03:41:37', 395.69, 63.31, 459.00, '2025-10-24 09:41:37', '2025-10-24 09:41:37'),
(20, 'VTA_68faf7b1951ef', 1, '2025-10-24 03:51:13', 107.76, 17.24, 125.00, '2025-10-24 09:51:13', '2025-10-24 09:51:13'),
(21, 'VTA_68faf8d722be2', 1, '2025-10-24 03:56:07', 155.17, 24.83, 180.00, '2025-10-24 09:56:07', '2025-10-24 09:56:07'),
(22, 'VTA_68fb00ed72054', 1, '2025-10-24 04:30:37', 21.55, 3.45, 25.00, '2025-10-24 10:30:37', '2025-10-24 10:30:37'),
(23, 'VTA_68fb0154aabf8', 1, '2025-10-24 04:32:20', 334.91, 53.59, 388.50, '2025-10-24 10:32:20', '2025-10-24 10:32:20'),
(24, 'VTA_68fb021a2743e', 1, '2025-10-24 04:35:38', 90.52, 14.48, 105.00, '2025-10-24 10:35:38', '2025-10-24 10:35:38'),
(25, 'VTA_6902c054c9bdb', 1, '2025-10-30 01:33:08', 363.36, 58.14, 421.50, '2025-10-30 07:33:08', '2025-10-30 07:33:08'),
(26, 'VTA_69067b8b776cf', 1, '2025-11-01 21:28:43', 262.93, 42.07, 305.00, '2025-11-02 03:28:43', '2025-11-02 03:28:43'),
(27, 'VTA_69069b0f2310a', 1, '2025-11-01 23:43:11', 267.67, 42.83, 310.50, '2025-11-02 05:43:11', '2025-11-02 05:43:11'),
(28, 'VTA_690c0ae860f12', 1, '2025-11-06 02:41:44', 818.53, 130.97, 949.50, '2025-11-06 08:41:44', '2025-11-06 08:41:44'),
(29, 'VTA_690c19007983d', 1, '2025-11-06 03:41:52', 98.28, 15.72, 114.00, '2025-11-06 09:41:52', '2025-11-06 09:41:52'),
(30, 'VTA_690c1b72349e9', 1, '2025-11-06 03:52:18', 168.10, 26.90, 195.00, '2025-11-06 09:52:18', '2025-11-06 09:52:18'),
(31, 'VTA_690c1bad042d7', 1, '2025-11-06 03:53:17', 150.86, 24.14, 175.00, '2025-11-06 09:53:17', '2025-11-06 09:53:17'),
(32, 'VTA_690c1bfe6dffc', 1, '2025-11-06 03:54:38', 116.38, 18.62, 135.00, '2025-11-06 09:54:38', '2025-11-06 09:54:38'),
(33, 'VTA_690c1d8c4de58', 1, '2025-11-06 04:01:16', 361.64, 57.86, 419.50, '2025-11-06 10:01:16', '2025-11-06 10:01:16'),
(34, 'VTA_6913eda600683', 1, '2025-11-12 02:15:02', 649.57, 103.93, 753.50, '2025-11-12 08:15:02', '2025-11-12 08:15:02'),
(35, 'VTA_6913efede58db', 1, '2025-11-12 02:24:45', 171.55, 27.45, 199.00, '2025-11-12 08:24:45', '2025-11-12 08:24:45'),
(36, 'VTA_691d17e68ba49', 1, '2025-11-19 01:05:42', 94.83, 15.17, 110.00, '2025-11-19 07:05:42', '2025-11-19 07:05:42'),
(37, 'VTA_691d18633c679', NULL, '2025-11-19 01:07:47', 181.03, 28.97, 210.00, '2025-11-19 07:07:47', '2025-11-19 07:07:47'),
(38, 'VTA_691d214a05916', NULL, '2025-11-19 01:45:46', 217.24, 34.76, 252.00, '2025-11-19 07:45:46', '2025-11-19 07:45:46'),
(39, 'VTA_691d267dd8754', NULL, '2025-11-19 02:07:57', 336.21, 53.79, 390.00, '2025-11-19 08:07:57', '2025-11-19 08:07:57'),
(40, 'VTA_691d293650252', NULL, '2025-11-19 02:19:34', 530.17, 84.83, 615.00, '2025-11-19 08:19:34', '2025-11-19 08:19:34'),
(41, 'VTA_691d2e9f3b3e5', NULL, '2025-11-18 20:42:39', 320.69, 51.31, 372.00, '2025-11-19 02:42:39', '2025-11-19 02:42:39'),
(42, 'VTA_691d329e17ee8', NULL, '2025-11-18 20:59:42', 181.03, 28.97, 210.00, '2025-11-19 02:59:42', '2025-11-19 02:59:42'),
(43, 'VTA_691d34c070c14', NULL, '2025-11-18 21:08:48', 98.28, 15.72, 114.00, '2025-11-19 03:08:48', '2025-11-19 03:08:48'),
(44, 'VTA_691d4751828a1', NULL, '2025-11-18 22:28:01', 175.00, 28.00, 203.00, '2025-11-19 04:28:01', '2025-11-19 04:28:01'),
(45, 'VTA_691d4985c6236', NULL, '2025-11-19 04:37:25', 116.38, 18.62, 135.00, '2025-11-19 10:37:25', '2025-11-19 10:37:25'),
(46, 'VTA_691d4e8692d81', NULL, '2025-11-19 04:58:46', 129.31, 20.69, 150.00, '2025-11-19 10:58:46', '2025-11-19 10:58:46'),
(47, 'VTA_691d507dc1823', NULL, '2025-11-19 05:07:09', 73.28, 11.72, 85.00, '2025-11-19 11:07:09', '2025-11-19 11:07:09'),
(48, 'VTA_691e7b7d0ee1f', NULL, '2025-11-20 02:22:53', 133.62, 21.38, 155.00, '2025-11-20 08:22:53', '2025-11-20 08:22:53'),
(49, 'VTA_691e7d0ccffbc', NULL, '2025-11-19 20:29:32', 116.38, 18.62, 135.00, '2025-11-20 02:29:32', '2025-11-20 02:29:32'),
(50, 'VTA_691e7df5dea4f', 1, '2025-11-19 20:33:25', 120.69, 19.31, 140.00, '2025-11-20 02:33:25', '2025-11-20 02:33:25'),
(51, 'VTA_691e8069bf582', 1, '2025-11-19 20:43:53', 90.52, 14.48, 105.00, '2025-11-20 02:43:53', '2025-11-20 02:43:53'),
(52, 'VTA_691e80fdebb4c', NULL, '2025-11-19 20:46:21', 120.69, 19.31, 140.00, '2025-11-20 02:46:21', '2025-11-20 02:46:21'),
(53, 'VTA_691e86323d6f8', NULL, '2025-11-19 21:08:34', 299.14, 47.86, 347.00, '2025-11-20 03:08:34', '2025-11-20 03:08:34'),
(54, 'VTA_691e8946e8b1e', NULL, '2025-11-19 21:21:42', 125.00, 20.00, 145.00, '2025-11-20 03:21:42', '2025-11-20 03:21:42'),
(55, 'VTA_691e8c3ba1dd9', 1, '2025-11-19 21:34:19', 64.66, 10.34, 75.00, '2025-11-20 03:34:19', '2025-11-20 03:34:19'),
(56, 'VTA_691e900ddc954', NULL, '2025-11-19 21:50:37', 120.69, 19.31, 140.00, '2025-11-20 03:50:37', '2025-11-20 03:50:37'),
(57, 'VTA_691e942d405d7', NULL, '2025-11-19 22:08:13', 276.29, 44.21, 320.50, '2025-11-20 04:08:13', '2025-11-20 04:08:13'),
(58, 'VTA_691fdc6155fe8', NULL, '2025-11-20 21:28:33', 277.59, 44.41, 322.00, '2025-11-21 03:28:33', '2025-11-21 03:28:33'),
(59, 'VTA_691fef10a1d09', NULL, '2025-11-20 22:48:16', 381.47, 61.03, 442.50, '2025-11-21 04:48:16', '2025-11-21 04:48:16'),
(60, 'VTA_691ff24c586cd', NULL, '2025-11-20 23:02:04', 161.21, 25.79, 187.00, '2025-11-21 05:02:04', '2025-11-21 05:02:04'),
(61, 'VTA_691ff33145ffc', NULL, '2025-11-20 23:05:53', 257.33, 41.17, 298.50, '2025-11-21 05:05:53', '2025-11-21 05:05:53'),
(62, 'VTA_691ff540eec32', 1, '2025-11-20 23:14:40', 275.00, 44.00, 319.00, '2025-11-21 05:14:40', '2025-11-21 05:14:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_venta_detalle` varchar(255) NOT NULL,
  `id_venta` varchar(255) NOT NULL,
  `id_producto` varchar(255) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `ingredientes` text DEFAULT NULL,
  `cantidad` varchar(255) NOT NULL,
  `precio_unitario` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `venta_detalle`
--

INSERT INTO `venta_detalle` (`id`, `id_venta_detalle`, `id_venta`, `id_producto`, `nombre_producto`, `ingredientes`, `cantidad`, `precio_unitario`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'DET_68e83254d6956', 'VTA_68e83254d5feb', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '300.00', '300', '2025-10-10 04:08:20', '2025-10-10 04:08:20'),
(2, 'DET_68e83254d924f', 'VTA_68e83254d5feb', 'Doble Queso', 'Doble Queso', NULL, '1', '129.00', '129', '2025-10-10 04:08:20', '2025-10-10 04:08:20'),
(3, 'DET_68e83254da851', 'VTA_68e83254d5feb', 'Combo Doble Queso', 'Combo Doble Queso', NULL, '1', '150.00', '150', '2025-10-10 04:08:20', '2025-10-10 04:08:20'),
(4, 'DET_68e83254dbdab', 'VTA_68e83254d5feb', 'Agua Natural 500ml', 'Agua Natural 500ml', NULL, '2', '20.00', '40', '2025-10-10 04:08:20', '2025-10-10 04:08:20'),
(5, 'DET_68e83254de3d7', 'VTA_68e83254d5feb', 'Aros de Cebolla', 'Aros de Cebolla', NULL, '1', '40.00', '40', '2025-10-10 04:08:20', '2025-10-10 04:08:20'),
(6, 'DET_68e834a00c6b3', 'VTA_68e834a009f53', 'BBQ Ranch', 'BBQ Ranch', NULL, '1', '115.00', '115', '2025-10-10 04:18:08', '2025-10-10 04:18:08'),
(7, 'DET_68e834a00e2e8', 'VTA_68e834a009f53', 'Jugo Jumex', 'Jugo Jumex', NULL, '1', '30.00', '30', '2025-10-10 04:18:08', '2025-10-10 04:18:08'),
(8, 'DET_68e836282eb37', 'VTA_68e836282ce61', 'Pollo Crispy', 'Pollo Crispy', NULL, '1', '95.00', '95', '2025-10-10 04:24:40', '2025-10-10 04:24:40'),
(9, 'DET_68e836282fd27', 'VTA_68e836282ce61', 'Combo Vegetariano', 'Combo Vegetariano', NULL, '1', '130.00', '130', '2025-10-10 04:24:40', '2025-10-10 04:24:40'),
(10, 'DET_68e83958db52f', 'VTA_68e83958d6465', 'Doble Queso', 'Doble Queso', NULL, '1', '129.00', '129', '2025-10-10 04:38:16', '2025-10-10 04:38:16'),
(11, 'DET_68e83958dd262', 'VTA_68e83958d6465', 'Combo Mini', 'Combo Mini', NULL, '1', '90.00', '90', '2025-10-10 04:38:16', '2025-10-10 04:38:16'),
(12, 'DET_68e83958deb35', 'VTA_68e83958d6465', 'Sprite 600ml', 'Sprite 600ml', NULL, '1', '25.00', '25', '2025-10-10 04:38:16', '2025-10-10 04:38:16'),
(13, 'DET_68e874f172ef8', 'VTA_68e874f16dca6', 'Hamburguesa Clásica', 'Hamburguesa Clásica', NULL, '1', '89.00', '89', '2025-10-10 08:52:33', '2025-10-10 08:52:33'),
(14, 'DET_68e874f17595d', 'VTA_68e874f16dca6', 'Boing Mango 500ml', 'Boing Mango 500ml', NULL, '1', '20.00', '20', '2025-10-10 08:52:33', '2025-10-10 08:52:33'),
(15, 'DET_68e874f176d43', 'VTA_68e874f16dca6', 'Papas Gajo', 'Papas Gajo', NULL, '1', '42.00', '42', '2025-10-10 08:52:33', '2025-10-10 08:52:33'),
(16, 'DET_68e885386a438', 'VTA_68e8853861809', 'Combo Vegetariano', 'Combo Vegetariano', NULL, '1', '130.00', '130', '2025-10-10 10:02:00', '2025-10-10 10:02:00'),
(17, 'DET_68e885386e5b7', 'VTA_68e8853861809', 'Nuggets de Pollo', 'Nuggets de Pollo', NULL, '1', '45.00', '45', '2025-10-10 10:02:00', '2025-10-10 10:02:00'),
(18, 'DET_68e885386f9a9', 'VTA_68e8853861809', 'Doble Queso', 'Doble Queso', NULL, '1', '129.00', '129', '2025-10-10 10:02:00', '2025-10-10 10:02:00'),
(19, 'DET_68e8853870c3e', 'VTA_68e8853861809', 'Jugo Jumex', 'Jugo Jumex', NULL, '1', '30.00', '30', '2025-10-10 10:02:00', '2025-10-10 10:02:00'),
(20, 'DET_68e8853875593', 'VTA_68e8853861809', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '405.00', '405', '2025-10-10 10:02:00', '2025-10-10 10:02:00'),
(21, 'DET_68e9aa151128f', 'VTA_68e9aa150c656', 'Combo Gourmet', 'Combo Gourmet', NULL, '1', '200.00', '200', '2025-10-11 06:51:33', '2025-10-11 06:51:33'),
(22, 'DET_68e9aa1512ece', 'VTA_68e9aa150c656', 'Fanta Naranja 600ml', 'Fanta Naranja 600ml', NULL, '1', '25.00', '25', '2025-10-11 06:51:33', '2025-10-11 06:51:33'),
(23, 'DET_68e9aa15142d3', 'VTA_68e9aa150c656', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '389.00', '389', '2025-10-11 06:51:33', '2025-10-11 06:51:33'),
(24, 'DET_68e9afd5e9e6c', 'VTA_68e9afd5e7374', 'Doble Queso', 'Doble Queso', NULL, '1', '129.00', '129', '2025-10-11 07:16:05', '2025-10-11 07:16:05'),
(25, 'DET_68e9afd5ec0dd', 'VTA_68e9afd5e7374', 'Aros de Cebolla', 'Aros de Cebolla', NULL, '1', '40.00', '40', '2025-10-11 07:16:05', '2025-10-11 07:16:05'),
(26, 'DET_68e9afd5ee0d2', 'VTA_68e9afd5e7374', 'Fanta Naranja 600ml', 'Fanta Naranja 600ml', NULL, '1', '25.00', '25', '2025-10-11 07:16:05', '2025-10-11 07:16:05'),
(27, 'DET_68e9afd5ef4c4', 'VTA_68e9afd5e7374', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '301.00', '301', '2025-10-11 07:16:05', '2025-10-11 07:16:05'),
(28, 'DET_68e9b017ed489', 'VTA_68e9b017eb1d4', 'BBQ Ranch', 'BBQ Ranch', NULL, '3', '115.00', '345', '2025-10-11 07:17:11', '2025-10-11 07:17:11'),
(29, 'DET_68e9c7dbb63ca', 'VTA_68e9c7dbb3880', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '270.50', '270.5', '2025-10-11 08:58:35', '2025-10-11 08:58:35'),
(30, 'DET_68e9c7dbb9b04', 'VTA_68e9c7dbb3880', 'Boing Mango 500ml', 'Boing Mango 500ml', NULL, '1', '20.00', '20', '2025-10-11 08:58:35', '2025-10-11 08:58:35'),
(31, 'DET_68eee6b5859ba', 'VTA_68eee6b57fe9a', 'Nuggets de Pollo', 'Nuggets de Pollo', NULL, '1', '45.00', '45', '2025-10-15 06:11:33', '2025-10-15 06:11:33'),
(32, 'DET_68eee6b587013', 'VTA_68eee6b57fe9a', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '183.50', '183.5', '2025-10-15 06:11:33', '2025-10-15 06:11:33'),
(33, 'DET_68f4021539b6a', 'VTA_68f40215354c3', 'Combo Doble Queso', 'Combo Doble Queso', NULL, '1', '120.00', '120', '2025-10-19 03:09:41', '2025-10-19 03:09:41'),
(34, 'DET_68f402153b86e', 'VTA_68f40215354c3', 'Agua Natural 500ml', 'Agua Natural 500ml', NULL, '1', '20.00', '20', '2025-10-19 03:09:41', '2025-10-19 03:09:41'),
(35, 'DET_68f402153cd31', 'VTA_68f40215354c3', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '314.50', '314.5', '2025-10-19 03:09:41', '2025-10-19 03:09:41'),
(36, 'DET_68f40b4bf1fde', 'VTA_68f40b4bedec1', 'Triple Carne', 'Triple Carne', NULL, '1', '110.00', '110', '2025-10-19 03:48:59', '2025-10-19 03:48:59'),
(37, 'DET_68f40b4bf3edd', 'VTA_68f40b4bedec1', 'Boing Mango 500ml', 'Boing Mango 500ml', NULL, '1', '20.00', '20', '2025-10-19 03:48:59', '2025-10-19 03:48:59'),
(38, 'DET_68f6c0943c802', 'VTA_68f6c09439c55', 'Hamburguesa Clásica', 'Hamburguesa Clásica', NULL, '1', '89.00', '89', '2025-10-21 05:07:00', '2025-10-21 05:07:00'),
(39, 'DET_68f6c0943debf', 'VTA_68f6c09439c55', 'Coca-Cola 600ml', 'Coca-Cola 600ml', NULL, '1', '25.00', '25', '2025-10-21 05:07:00', '2025-10-21 05:07:00'),
(40, 'DET_68f6c0943f045', 'VTA_68f6c09439c55', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '310.00', '310', '2025-10-21 05:07:00', '2025-10-21 05:07:00'),
(41, 'DET_68f6c0944021b', 'VTA_68f6c09439c55', 'Hamburguesa Clásica', 'Hamburguesa Clásica', NULL, '1', '89.00', '89', '2025-10-21 05:07:00', '2025-10-21 05:07:00'),
(42, 'DET_68f6c0944145f', 'VTA_68f6c09439c55', 'Doble Queso', 'Doble Queso', NULL, '1', '85.00', '85', '2025-10-21 05:07:00', '2025-10-21 05:07:00'),
(43, 'DET_68f6c278b5cfb', 'VTA_68f6c278b29e8', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '302.50', '302.5', '2025-10-21 05:15:04', '2025-10-21 05:15:04'),
(44, 'DET_68f6c278b74e4', 'VTA_68f6c278b29e8', 'Boing Guayaba 500ml', 'Boing Guayaba 500ml', NULL, '1', '20.00', '20', '2025-10-21 05:15:04', '2025-10-21 05:15:04'),
(45, 'DET_68f6c3020cceb', 'VTA_68f6c3020b395', 'BBQ Ranch', 'BBQ Ranch', NULL, '1', '100.00', '100', '2025-10-21 05:17:22', '2025-10-21 05:17:22'),
(46, 'DET_68f6c3020eb1f', 'VTA_68f6c3020b395', 'Coca-Cola 600ml', 'Coca-Cola 600ml', NULL, '1', '25.00', '25', '2025-10-21 05:17:22', '2025-10-21 05:17:22'),
(47, 'DET_68f6c3020fee4', 'VTA_68f6c3020b395', 'Combo Mini', 'Combo Mini', NULL, '1', '70.00', '70', '2025-10-21 05:17:22', '2025-10-21 05:17:22'),
(48, 'DET_68f997f979a99', 'VTA_68f997f977a8a', 'Doble Queso', 'Doble Queso', NULL, '1', '85.00', '85', '2025-10-23 08:50:33', '2025-10-23 08:50:33'),
(49, 'DET_68f997f97afbc', 'VTA_68f997f977a8a', 'Boing Mango 500ml', 'Boing Mango 500ml', NULL, '1', '20.00', '20', '2025-10-23 08:50:33', '2025-10-23 08:50:33'),
(50, 'DET_68fae368130ab', 'VTA_68fae3680fde3', 'Doble Queso', 'Doble Queso', NULL, '1', '129.00', '129', '2025-10-24 08:24:40', '2025-10-24 08:24:40'),
(51, 'DET_68fae50d0342a', 'VTA_68fae50d01117', 'Pollo Crispy', 'Pollo Crispy', NULL, '1', '95.00', '95', '2025-10-24 08:31:41', '2025-10-24 08:31:41'),
(52, 'DET_68fae50d04b67', 'VTA_68fae50d01117', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '316.00', '316', '2025-10-24 08:31:41', '2025-10-24 08:31:41'),
(53, 'DET_68faf571890dc', 'VTA_68faf57186849', 'Doble Queso', 'Doble Queso', NULL, '1', '129.00', '129', '2025-10-24 09:41:37', '2025-10-24 09:41:37'),
(54, 'DET_68faf5718b449', 'VTA_68faf57186849', 'Papas a la Francesa', 'Papas a la Francesa', NULL, '1', '35.00', '35', '2025-10-24 09:41:37', '2025-10-24 09:41:37'),
(55, 'DET_68faf5718d552', 'VTA_68faf57186849', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '295.00', '295', '2025-10-24 09:41:37', '2025-10-24 09:41:37'),
(56, 'DET_68faf7b196edd', 'VTA_68faf7b1951ef', 'Papas a la Francesa', 'Papas a la Francesa', NULL, '1', '35.00', '35', '2025-10-24 09:51:13', '2025-10-24 09:51:13'),
(57, 'DET_68faf7b198511', 'VTA_68faf7b1951ef', 'Combo Mini', 'Combo Mini', NULL, '1', '90.00', '90', '2025-10-24 09:51:13', '2025-10-24 09:51:13'),
(58, 'DET_68faf8d72599c', 'VTA_68faf8d722be2', 'Combo Mini', 'Combo Mini', NULL, '1', '90.00', '90', '2025-10-24 09:56:07', '2025-10-24 09:56:07'),
(59, 'DET_68faf8d727437', 'VTA_68faf8d722be2', 'Combo Mini', 'Combo Mini', NULL, '1', '90.00', '90', '2025-10-24 09:56:07', '2025-10-24 09:56:07'),
(60, 'DET_68fb00ed747f2', 'VTA_68fb00ed72054', 'Coca-Cola 600ml', 'Coca-Cola 600ml', NULL, '1', '25.00', '25', '2025-10-24 10:30:37', '2025-10-24 10:30:37'),
(61, 'DET_68fb0154ad85e', 'VTA_68fb0154aabf8', 'Hamburguesa Clásica', 'Hamburguesa Clásica', NULL, '1', '89.00', '89', '2025-10-24 10:32:20', '2025-10-24 10:32:20'),
(62, 'DET_68fb0154aec44', 'VTA_68fb0154aabf8', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '299.50', '299.5', '2025-10-24 10:32:20', '2025-10-24 10:32:20'),
(63, 'DET_68fb021a29517', 'VTA_68fb021a2743e', 'Hamburguesa Clásica', 'Hamburguesa Clásica', NULL, '1', '75.00', '75', '2025-10-24 10:35:38', '2025-10-24 10:35:38'),
(64, 'DET_68fb021a2a8b6', 'VTA_68fb021a2743e', 'Jugo Jumex', 'Jugo Jumex', NULL, '1', '30.00', '30', '2025-10-24 10:35:38', '2025-10-24 10:35:38'),
(65, 'DET_6902c054cdfe6', 'VTA_6902c054c9bdb', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '396.50', '396.5', '2025-10-30 07:33:08', '2025-10-30 07:33:08'),
(66, 'DET_6902c054cf3de', 'VTA_6902c054c9bdb', 'Fanta Naranja 600ml', 'Fanta Naranja 600ml', NULL, '1', '25.00', '25', '2025-10-30 07:33:08', '2025-10-30 07:33:08'),
(67, 'DET_69067b8b7c7c9', 'VTA_69067b8b776cf', 'Combo Familiar', 'Combo Familiar', NULL, '1', '280.00', '280', '2025-11-02 03:28:43', '2025-11-02 03:28:43'),
(68, 'DET_69067b8b7ef21', 'VTA_69067b8b776cf', 'Sprite 600ml', 'Sprite 600ml', NULL, '1', '25.00', '25', '2025-11-02 03:28:43', '2025-11-02 03:28:43'),
(69, 'DET_69069b0f27c51', 'VTA_69069b0f2310a', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '310.50', '310.5', '2025-11-02 05:43:11', '2025-11-02 05:43:11'),
(70, 'DET_690c0ae863bea', 'VTA_690c0ae860f12', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '313.00', '313', '2025-11-06 08:41:44', '2025-11-06 08:41:44'),
(71, 'DET_690c0ae8654d6', 'VTA_690c0ae860f12', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '636.50', '636.5', '2025-11-06 08:41:44', '2025-11-06 08:41:44'),
(72, 'DET_690c19007c1e1', 'VTA_690c19007983d', 'Hamburguesa Clásica', 'Hamburguesa Clásica', NULL, '1', '89', '89', '2025-11-06 09:41:52', '2025-11-06 09:41:52'),
(73, 'DET_690c19007d17e', 'VTA_690c19007983d', 'Coca-Cola 600ml', 'Coca-Cola 600ml', NULL, '1', '25', '25', '2025-11-06 09:41:52', '2025-11-06 09:41:52'),
(74, 'DET_690c1b7236af8', 'VTA_690c1b72349e9', 'Doble Queso', 'Doble Queso', NULL, '1', '85', '85', '2025-11-06 09:52:18', '2025-11-06 09:52:18'),
(75, 'DET_690c1b7237f77', 'VTA_690c1b72349e9', 'Mexicana', 'Mexicana', NULL, '1', '110', '110', '2025-11-06 09:52:18', '2025-11-06 09:52:18'),
(76, 'DET_690c1bad069ff', 'VTA_690c1bad042d7', 'Combo Doble Queso', 'Combo Doble Queso', NULL, '1', '150', '150', '2025-11-06 09:53:17', '2025-11-06 09:53:17'),
(77, 'DET_690c1bad094ac', 'VTA_690c1bad042d7', 'Coca-Cola 600ml', 'Coca-Cola 600ml', NULL, '1', '25', '25', '2025-11-06 09:53:17', '2025-11-06 09:53:17'),
(78, 'DET_690c1bfe709a3', 'VTA_690c1bfe6dffc', 'Combo Vegetariano', 'Combo Vegetariano', NULL, '1', '115', '115', '2025-11-06 09:54:38', '2025-11-06 09:54:38'),
(79, 'DET_690c1bfe71d58', 'VTA_690c1bfe6dffc', 'Agua Natural 500ml', 'Agua Natural 500ml', NULL, '1', '20', '20', '2025-11-06 09:54:38', '2025-11-06 09:54:38'),
(80, 'DET_690c1d8c5010c', 'VTA_690c1d8c4de58', 'Sprite 600ml', 'Sprite 600ml', NULL, '1', '25', '25', '2025-11-06 10:01:16', '2025-11-06 10:01:16'),
(81, 'DET_690c1d8c51734', 'VTA_690c1d8c4de58', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '394.5', '394.5', '2025-11-06 10:01:16', '2025-11-06 10:01:16'),
(82, 'DET_6913eda60259e', 'VTA_6913eda600683', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '285', '285', '2025-11-12 08:15:02', '2025-11-12 08:15:02'),
(83, 'DET_6913eda603449', 'VTA_6913eda600683', 'Sprite 600ml', 'Sprite 600ml', NULL, '1', '25', '25', '2025-11-12 08:15:02', '2025-11-12 08:15:02'),
(84, 'DET_6913eda604285', 'VTA_6913eda600683', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '443.5', '443.5', '2025-11-12 08:15:02', '2025-11-12 08:15:02'),
(85, 'DET_6913efede9225', 'VTA_6913efede58db', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '164', '164', '2025-11-12 08:24:45', '2025-11-12 08:24:45'),
(86, 'DET_6913efedeab84', 'VTA_6913efede58db', 'Papas a la Francesa', 'Papas a la Francesa', NULL, '1', '35', '35', '2025-11-12 08:24:45', '2025-11-12 08:24:45'),
(87, 'DET_691d17e692208', 'VTA_691d17e68ba49', 'Doble Queso', 'Doble Queso', NULL, '1', '85', '85', '2025-11-19 07:05:42', '2025-11-19 07:05:42'),
(88, 'DET_691d17e6950a1', 'VTA_691d17e68ba49', 'Fanta Naranja 600ml', 'Fanta Naranja 600ml', NULL, '1', '25', '25', '2025-11-19 07:05:42', '2025-11-19 07:05:42'),
(89, 'DET_691d18633df99', 'VTA_691d18633c679', 'Combo Veggie Deluxe', 'Combo Veggie Deluxe', NULL, '1', '170', '170', '2025-11-19 07:07:47', '2025-11-19 07:07:47'),
(90, 'DET_691d18633f35a', 'VTA_691d18633c679', 'Aros de Cebolla', 'Aros de Cebolla', NULL, '1', '40', '40', '2025-11-19 07:07:47', '2025-11-19 07:07:47'),
(91, 'DET_691d214a0a3ab', 'VTA_691d214a05916', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '227', '227', '2025-11-19 07:45:46', '2025-11-19 07:45:46'),
(92, 'DET_691d214a0c889', 'VTA_691d214a05916', 'Sprite 600ml', 'Sprite 600ml', NULL, '1', '25', '25', '2025-11-19 07:45:46', '2025-11-19 07:45:46'),
(93, 'DET_691d293653993', 'VTA_691d293650252', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '390', '390', '2025-11-19 08:19:34', '2025-11-19 08:19:34'),
(94, 'DET_691d293657201', 'VTA_691d293650252', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', NULL, '1', '225', '225', '2025-11-19 08:19:34', '2025-11-19 08:19:34'),
(103, 'DET_691d4985c82f6', 'VTA_691d4985c6236', 'Mexicana', 'Mexicana', NULL, '1', '110', '110', '2025-11-19 10:37:25', '2025-11-19 10:37:25'),
(104, 'DET_691d4985c9b59', 'VTA_691d4985c6236', 'Fanta Naranja 600ml', 'Fanta Naranja 600ml', NULL, '1', '25', '25', '2025-11-19 10:37:25', '2025-11-19 10:37:25'),
(105, 'DET_691d4e8694a0e', 'VTA_691d4e8692d81', 'Combo Doble Queso', 'Combo Doble Queso', NULL, '1', '120', '120', '2025-11-19 10:58:46', '2025-11-19 10:58:46'),
(106, 'DET_691d4e869660a', 'VTA_691d4e8692d81', 'Jugo Jumex', 'Jugo Jumex', NULL, '1', '30', '30', '2025-11-19 10:58:46', '2025-11-19 10:58:46'),
(107, 'DET_691d507dc345c', 'VTA_691d507dc1823', 'Nuggets de Pollo', 'Nuggets de Pollo', NULL, '1', '45', '45', '2025-11-19 11:07:09', '2025-11-19 11:07:09'),
(108, 'DET_691d507dc4cbf', 'VTA_691d507dc1823', 'Agua Natural 500ml', 'Agua Natural 500ml', NULL, '2', '20', '40', '2025-11-19 11:07:09', '2025-11-19 11:07:09'),
(109, 'DET_691e7b7f76ec9', 'VTA_691e7b7d0ee1f', 'Bacon Cheese', 'Bacon Cheese', NULL, '1', '135', '135', '2025-11-20 08:22:55', '2025-11-20 08:22:55'),
(110, 'DET_691e7b7fe7b14', 'VTA_691e7b7d0ee1f', 'Boing Mango 500ml', 'Boing Mango 500ml', NULL, '1', '20', '20', '2025-11-20 08:22:55', '2025-11-20 08:22:55'),
(111, 'DET_691e7d0cd1bab', 'VTA_691e7d0ccffbc', 'Combo Vegetariano', 'Combo Vegetariano', NULL, '1', '115', '115', '2025-11-20 02:29:32', '2025-11-20 02:29:32'),
(112, 'DET_691e7d0cd3338', 'VTA_691e7d0ccffbc', 'Agua Natural 500ml', 'Agua Natural 500ml', NULL, '1', '20', '20', '2025-11-20 02:29:32', '2025-11-20 02:29:32'),
(113, 'DET_691e7df5e0c43', 'VTA_691e7df5dea4f', 'Hawaiana', 'Hawaiana', NULL, '1', '120', '120', '2025-11-20 02:33:25', '2025-11-20 02:33:25'),
(114, 'DET_691e7df5e2440', 'VTA_691e7df5dea4f', 'Boing Guayaba 500ml', 'Boing Guayaba 500ml', NULL, '1', '20', '20', '2025-11-20 02:33:25', '2025-11-20 02:33:25'),
(115, 'DET_691e8069c1a86', 'VTA_691e8069bf582', 'Nuggets de Pollo', 'Nuggets de Pollo', NULL, '1', '45', '45', '2025-11-20 02:43:53', '2025-11-20 02:43:53'),
(116, 'DET_691e8069c3281', 'VTA_691e8069bf582', 'Papas a la Francesa', 'Papas a la Francesa', NULL, '1', '35', '35', '2025-11-20 02:43:53', '2025-11-20 02:43:53'),
(117, 'DET_691e8069c471f', 'VTA_691e8069bf582', 'Coca-Cola 600ml', 'Coca-Cola 600ml', NULL, '1', '25', '25', '2025-11-20 02:43:53', '2025-11-20 02:43:53'),
(118, 'DET_691e80fded862', 'VTA_691e80fdebb4c', 'Triple Carne', 'Triple Carne', NULL, '1', '110', '110', '2025-11-20 02:46:21', '2025-11-20 02:46:21'),
(119, 'DET_691e80fdeeaea', 'VTA_691e80fdebb4c', 'Jugo Jumex', 'Jugo Jumex', NULL, '1', '30', '30', '2025-11-20 02:46:21', '2025-11-20 02:46:21'),
(120, 'DET_691e86323fbf5', 'VTA_691e86323d6f8', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, queso, huevo, carne, huevo, queso, pan-ajonjoli', '1', '327', '327', '2025-11-20 03:08:34', '2025-11-20 03:08:34'),
(121, 'DET_691e863241191', 'VTA_691e86323d6f8', 'Boing Mango 500ml', 'Boing Mango 500ml', '', '1', '20', '20', '2025-11-20 03:08:34', '2025-11-20 03:08:34'),
(122, 'DET_691e8946ea147', 'VTA_691e8946e8b1e', 'Combo Clásico', 'Combo Clásico', '', '1', '120', '120', '2025-11-20 03:21:42', '2025-11-20 03:21:42'),
(123, 'DET_691e8946ec252', 'VTA_691e8946e8b1e', 'Coca-Cola 600ml', 'Coca-Cola 600ml', '', '1', '25', '25', '2025-11-20 03:21:42', '2025-11-20 03:21:42'),
(124, 'DET_691e8c3ba498b', 'VTA_691e8c3ba1dd9', 'Nuggets de Pollo', 'Nuggets de Pollo', '', '1', '45', '45', '2025-11-20 03:34:19', '2025-11-20 03:34:19'),
(125, 'DET_691e8c3ba6583', 'VTA_691e8c3ba1dd9', 'Jugo Jumex', 'Jugo Jumex', '', '1', '30', '30', '2025-11-20 03:34:19', '2025-11-20 03:34:19'),
(126, 'DET_691e900dde85b', 'VTA_691e900ddc954', 'BBQ Ranch', 'BBQ Ranch', '', '1', '100', '100', '2025-11-20 03:50:37', '2025-11-20 03:50:37'),
(127, 'DET_691e900de00ba', 'VTA_691e900ddc954', 'Boing Guayaba 500ml', 'Boing Guayaba 500ml', '', '2', '20', '40', '2025-11-20 03:50:37', '2025-11-20 03:50:37'),
(128, 'DET_691e942d42608', 'VTA_691e942d405d7', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, huevo, carne-pollo, carne-pollo, jamon, tocino, Pan', '1', '295.5', '295.5', '2025-11-20 04:08:13', '2025-11-20 04:08:13'),
(129, 'DET_691e942d43c84', 'VTA_691e942d405d7', 'Sprite 600ml', 'Sprite 600ml', '', '1', '25', '25', '2025-11-20 04:08:13', '2025-11-20 04:08:13'),
(130, 'DET_691fdc6157ad2', 'VTA_691fdc6155fe8', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, huevo, carne, carne-pollo, jamon, tocino, pan-ajonjoli', '1', '297', '297', '2025-11-21 03:28:33', '2025-11-21 03:28:33'),
(131, 'DET_691fdc6158f15', 'VTA_691fdc6155fe8', 'Fanta Naranja 600ml', 'Fanta Naranja 600ml', '', '1', '25', '25', '2025-11-21 03:28:33', '2025-11-21 03:28:33'),
(132, 'DET_691fef10a42b0', 'VTA_691fef10a1d09', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, lechuga, queso, carne, jamon, tocino, pan-ajonjoli', '1', '387.5', '387.5', '2025-11-21 04:48:16', '2025-11-21 04:48:16'),
(133, 'DET_691fef10a6260', 'VTA_691fef10a1d09', 'Agua Natural 500ml', 'Agua Natural 500ml', '', '1', '20', '20', '2025-11-21 04:48:16', '2025-11-21 04:48:16'),
(134, 'DET_691fef10a7be9', 'VTA_691fef10a1d09', 'Papas a la Francesa', 'Papas a la Francesa', '', '1', '35', '35', '2025-11-21 04:48:16', '2025-11-21 04:48:16'),
(135, 'DET_691ff24c5a598', 'VTA_691ff24c586cd', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, lechuga, carne-pollo, lechuga, pan-ajonjoli', '1', '162', '162', '2025-11-21 05:02:04', '2025-11-21 05:02:04'),
(136, 'DET_691ff24c5c86a', 'VTA_691ff24c586cd', 'Coca-Cola 600ml', 'Coca-Cola 600ml', '', '1', '25', '25', '2025-11-21 05:02:04', '2025-11-21 05:02:04'),
(137, 'DET_691ff3314897c', 'VTA_691ff33145ffc', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, tocino, carne-pollo, Pan', '1', '278.5', '278.5', '2025-11-21 05:05:53', '2025-11-21 05:05:53'),
(138, 'DET_691ff3314a1fc', 'VTA_691ff33145ffc', 'Agua Natural 500ml', 'Agua Natural 500ml', '', '1', '20', '20', '2025-11-21 05:05:53', '2025-11-21 05:05:53'),
(139, 'DET_691ff540f111c', 'VTA_691ff540eec32', 'Hamburguesa Personalizada', 'Hamburguesa Personalizada', 'pan-inferior, Pepinillos, tocino, carne-pollo, pan-ajonjoli', '1', '294', '294', '2025-11-21 05:14:40', '2025-11-21 05:14:40'),
(140, 'DET_691ff540f2804', 'VTA_691ff540eec32', 'Sprite 600ml', 'Sprite 600ml', '', '1', '25', '25', '2025-11-21 05:14:40', '2025-11-21 05:14:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cliente_id_cliente_unique` (`id_cliente`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `complementos`
--
ALTER TABLE `complementos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `hamburguesas`
--
ALTER TABLE `hamburguesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventario_id_producto_unique` (`id_producto`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id_usuario_unique` (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ventas_id_venta_unique` (`id_venta`);

--
-- Indices de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venta_detalle_id_venta_detalle_unique` (`id_venta_detalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `complementos`
--
ALTER TABLE `complementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hamburguesas`
--
ALTER TABLE `hamburguesas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
