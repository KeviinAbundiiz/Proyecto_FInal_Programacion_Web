-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2020 a las 01:56:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dell`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contactanos`
--

INSERT INTO `contactanos` (`nombre`, `email`, `comentario`) VALUES
('Kevin Leonel Abundis Morales', 'Abundiiz_Keviin@outlook.es', 'Su p?gina es muy buena'),
('Angel Jesús Abundis Morales', 'abundis@gmail.com', ' Fatal la pagina'),
('Abril Clarisa Tolentino Bracamontes', 'clarisa@hotmail.com', ' Buen diseño'),
('Cristobal Caballero Patricio', 'cristo-gay@outlook.com', ' Su página es bonita'),
('Jesus Erasmo Gallardo Cabrera', 'Erasmo@gmail.com', ' No me gusto su página web'),
('Marko Alan Bibiano Cortes', 'marko@gmail.com', 'Su p?gina es muy interactiva'),
('Nancy Morales HernÃ¡ndez', 'naney@gmail.com', ' Buena pÃ¡gina web'),
('consultar comentario', 'prueba@consultar', ' prueba para consultar comentario'),
('Prueba pdo', 'prueba@pdo', ' goood');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `gpu` varchar(100) NOT NULL,
  `resolucion` varchar(100) NOT NULL,
  `peso` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `cpu`, `gpu`, `resolucion`, `peso`, `color`, `tipo`) VALUES
(1, 'OptiPlex 7040 ', 'Computadora de videojuegos de escritorio potente y compacta con capacidad de actualización simple y procesadores Intel Core de 9.ª. Impresionante rendimiento en tareas de renderizado', '25,400.51 ', 'computadora1.jpg', 'Intel Core i5 9300H', 'Intel iGPU UHD 530', '720p', '1.8 KG', 'Negra', 'escritorio'),
(2, 'Dell Precision T3610 Tower Workstation ', 'Proporcione una gran potencia de procesamiento para la creación de contenidos en 3D estándar y otras tareas intensivas gracias a la potente y confiable workstation en torre Dell T3610. ', '6,500.00 ', 'computadora2.jpg', 'AMD Ryzen 5 3400g', 'AMD RX Vega 11', '1080p', '5 KG', 'Negro', 'escritorio'),
(3, 'Optiplex 755 ', 'La OptiPlex 755 ofrece un rendimiento de consumo reducido, estabilidad y variedad de opciones en una computadora de sobremesa estándar.', '3,232.74', 'computadora3.jpg', 'AMD Ryzen 5 3200g', 'AMD RX Vega 11', '720p', '3 KG', 'Negro', 'escritorio'),
(4, 'Laptop Latitude 3400', 'Esta laptop pequeña y elegante de 14\" con funciones de conectividad y administración es ideal para empresas en crecimiento.', '12,979.00', 'laptop1.jpg', 'AMD Ryzen 5 3500', 'AMD RX Vega 11', '1080p', '1.4 KG', 'Dorado', 'laptop'),
(5, 'Laptop Dell serie G3', 'Diseñadas y creadas para cumplir con las necesidades de rendimiento de los nuevos jugadores de equipo o de aquellos que juegan con un presupuesto.', '21,695.38', 'laptop2.jpg', 'Intel Core i7 9850H', 'Nvidia RTX 2080 Super Max-Q', '1440p', '2.7 KG', 'Plataeado', 'laptop'),
(6, 'Dell Laptop Inspiron 3593', 'Portátil de 15\" con todo lo necesario para el uso diario y un diseño elegante. Con procesadores Intel® de 10a generación y una gran variedad de puertos.', '14,499.00', 'laptop3.jpg', 'Intel Core i5 9300HQ', 'Nvidia GTX 1050Ti', '1080p', '2.1 KG', 'Plateado', 'laptop');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
