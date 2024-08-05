-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-07-2024 a las 05:31:26
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cocina_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_para_cocina`
--

CREATE TABLE `equipos_para_cocina` (
 `id` int NOT NULL AUTO_INCREMENT,
 `nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `tipo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `marca` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `precio` decimal(10,2) DEFAULT NULL,
 `cantidad` int DEFAULT NULL,
 `proveedor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 `codigo_barra` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Volcado de datos para la tabla `equipos_para_cocina`
--
INSERT INTO `equipos_para_cocina` (`nombre`, `tipo`, `marca`, `precio`, `cantidad`, `proveedor`, `codigo_barra`) VALUES
('Horno Eléctrico', 'Horno', 'Samsung', 500.00, 10, 'Distribuidora A', '123456789012'),
('Licuadora', 'Electrodoméstico', 'Oster', 75.50, 25, 'Proveedor B', '123456789013'),
('Refrigerador', 'Electrodoméstico', 'LG', 1200.00, 5, 'Distribuidora C', '123456789014'),
('Freidora', 'Electrodoméstico', 'Tefal', 150.00, 15, 'Proveedor D', '123456789015'),
('Microondas', 'Electrodoméstico', 'Panasonic', 300.00, 8, 'Distribuidora E', '123456789016'),
('Lavavajillas', 'Electrodoméstico', 'Bosch', 600.00, 3, 'Proveedor F', '123456789017'),
('Batidora', 'Electrodoméstico', 'KitchenAid', 350.00, 20, 'Distribuidora G', '123456789018'),
('Cafetera', 'Electrodoméstico', 'Nespresso', 120.00, 30, 'Proveedor H', '123456789019'),
('Plancha para Cocina', 'Utensilio', 'Hamilton Beach', 80.00, 12, 'Distribuidora I', '123456789020'),
('Extractor de Jugos', 'Electrodoméstico', 'Breville', 200.00, 18, 'Proveedor J', '123456789021'),
('Parrilla', 'Utensilio', 'Weber', 450.00, 6, 'Distribuidora K', '123456789022'),
('Olla de Presión', 'Utensilio', 'Presto', 110.00, 22, 'Proveedor L', '123456789023'),
('Tostadora', 'Electrodoméstico', 'Black & Decker', 40.00, 25, 'Distribuidora M', '123456789024'),
('Sartén', 'Utensilio', 'T-fal', 35.00, 40, 'Proveedor N', '123456789025'),
('Procesador de Alimentos', 'Electrodoméstico', 'Cuisinart', 180.00, 10, 'Distribuidora O', '123456789026'),
('Mezcladora', 'Electrodoméstico', 'Sunbeam', 90.00, 15, 'Proveedor P', '123456789027'),
('Ventilador de Cocina', 'Electrodoméstico', 'Honeywell', 45.00, 20, 'Distribuidora Q', '123456789028'),
('Deshidratador de Alimentos', 'Electrodoméstico', 'Nesco', 130.00, 7, 'Proveedor R', '123456789029'),
('Cortadora de Pan', 'Electrodoméstico', 'Waring', 250.00, 5, 'Distribuidora S', '123456789030'),
('Máquina de Helados', 'Electrodoméstico', 'Cuisinart', 220.00, 8, 'Proveedor T', '123456789031');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo_electronico` VARCHAR(255) PRIMARY KEY,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` DATE varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo_electronico`, `nombre`, `contrasena`, `registration_date`) VALUES
('admin@admin.com', 'Carlos', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', "2024-07-18");
INSERT INTO `usuarios` (`correo_electronico`, `nombre`, `contrasena`, `registration_date`) VALUES
('pol@pol.com', 'Pol', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', "2024-07-18");