-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-05-2020 a las 02:23:01
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id13245444_dell`
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
('Gerardo Abundis Morales', 'abu@gmail.com', ' Es una página muy interactiva, felicidades :D'),
('Angel Jesús Abundis Morales', 'abundis@gmail.com', ' Fatal la pagina'),
('Alan Bibiano', 'alan@hotmail.com', ' Prueba para consultar comentario con nuevo diseño de tabla y comprobar funcionamiento :3'),
('Abril Clarisa Tolentino Bracamontes', 'clarisa-abril98@hotmail.com', ' La pagina tiene un diseño muy atractivo, excelente'),
('Cristobal Caballero Patricio', 'cristo-gay@outlook.com', ' Su página es bonita'),
('Cristóbal caballero patricio ', 'cristoloco01@hotmaiI.com', ' dea'),
('Equipo4', 'Equipo4@gmail.com', ' Demostración de comentario en dispositivo móvil '),
('Jesus Erasmo Gallardo Cabrera', 'Erasmo@gmail.com', ' No me gusto su página web'),
('Kevin Leonel Abundis Morales', 'kevin_abundis@outlook.com', ' Muy buena página, se ve genial...'),
('Marko Alan Bibiano Cortes', 'marko@gmail.com', ' Su página es muy interactiva'),
('Nancy Morales Hernández', 'nancy@gmail.com', ' Genial :D'),
('Prueba 2', 'prueba@gmail.com', ' Esto es una segunda prueba '),
('Prueba 3', 'prueba3@gmail.com', ' Se realiza prueba para ver diseño del archivo PHP insertar comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
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
(1, 'OptiPlex 7040 ', 'Computadora de videojuegos de escritorio potente y compacta con capacidad de actualización simple y procesadores Intel Core de 9.ª. Impresionante rendimiento en tareas de renderizado', 25400.5, 'computadora1.jpg', 'Intel Core i5 9300H', 'Intel iGPU UHD 530', '720p', '1.8 KG', 'Negra', 'escritorio'),
(2, 'Dell Precision T3610 Tower Workstation ', 'Proporcione una gran potencia de procesamiento para la creación de contenidos en 3D estándar y otras tareas intensivas gracias a la potente y confiable workstation en torre Dell T3610. ', 6500, 'computadora2.jpg', 'AMD Ryzen 5 3400g', 'AMD RX Vega 11', '1080p', '5 KG', 'Negro', 'escritorio'),
(3, 'Optiplex 755 ', 'La OptiPlex 755 ofrece un rendimiento de consumo reducido, estabilidad y variedad de opciones en una computadora de sobremesa estándar.', 3232.74, 'computadora3.jpg', 'AMD Ryzen 5 3200g', 'AMD RX Vega 11', '720p', '3 KG', 'Negro', 'escritorio'),
(4, 'Laptop Latitude 3400', 'Esta laptop pequeña y elegante de 14\" con funciones de conectividad y administración es ideal para empresas en crecimiento.', 12979, 'laptop1.jpg', 'AMD Ryzen 5 3500', 'AMD RX Vega 11', '1080p', '1.4 KG', 'Dorado', 'laptop'),
(5, 'Laptop Dell serie G3', 'Diseñadas y creadas para cumplir con las necesidades de rendimiento de los nuevos jugadores de equipo o de aquellos que juegan con un presupuesto.', 21695.4, 'laptop2.jpg', 'Intel Core i7 9850H', 'Nvidia RTX 2080 Super Max-Q', '1440p', '2.7 KG', 'Plataeado', 'laptop'),
(6, 'Dell Laptop Inspiron 3593', 'Portátil de 15\" con todo lo necesario para el uso diario y un diseño elegante. Con procesadores Intel® de 10a generación y una gran variedad de puertos.', 14499, 'laptop3.jpg', 'Intel Core i5 9300HQ', 'Nvidia GTX 1050Ti', '1080p', '2.1 KG', 'Plateado', 'laptop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `rfc` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_postal` int(10) NOT NULL,
  `colonia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero_exterior` int(10) NOT NULL,
  `numero_interior` int(10) NOT NULL,
  `referencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_venta` int(11) NOT NULL,
  `no_ticket` int(12) NOT NULL,
  `no_sucursal` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`rfc`, `razon_social`, `pais`, `estado`, `ciudad`, `codigo_postal`, `colonia`, `numero_exterior`, `numero_interior`, `referencia`, `email`, `id_venta`, `no_ticket`, `no_sucursal`) VALUES
('AUMK980228BU5', 'Prueba A.C de C.V', 'México', 'Guerrero', 'Acapulco', 39810, 'Unidad Habitacional El Coloso', 1, 301, 'Ubicados dentro de la gran plaza', 'kevin_abundis@outlook.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(2, 1, 2, 1, 6500, 6500),
(3, 1, 6, 1, 14499, 14499);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `no_ticket` int(12) NOT NULL,
  `no_sucursal` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `total`, `fecha`, `no_ticket`, `no_sucursal`) VALUES
(1, 20999, '2020-05-06', 1, 1);

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
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`rfc`),
  ADD KEY `fk_facturas_ventas` (`id_venta`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_venta_equipos` (`id_producto`),
  ADD KEY `fk_productos_venta_ventas` (`id_venta`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD CONSTRAINT `fk_productos_venta_equipos` FOREIGN KEY (`id_producto`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `fk_productos_venta_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
