-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 16:17:46
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sar_remodelacion`
--
CREATE DATABASE IF NOT EXISTS `sar_remodelacion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sar_remodelacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `identificacion` int(11) NOT NULL,
  `tipo_doc` varchar(20) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `clave` varchar(200) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `contrato` varchar(50) DEFAULT NULL,
  `foto` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`identificacion`, `tipo_doc`, `nombres`, `apellidos`, `email`, `telefono`, `clave`, `rol`, `contrato`, `foto`) VALUES
(123456789, 'CC', 'Empleado', 'Prueba', 'empleadoprueba@gmail.com', 12345, '25f9e794323b453885f5181f1b624d0b', 'Empleado', 'Fijo', '../Uploads/Empleados/10.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` int(11) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ingredientes` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `precio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `nombre`, `ingredientes`, `descripcion`, `foto`, `estado`, `precio`) VALUES
(17, 'Hamburguesa con queso ', 'pan,carne,vegetales,Queso', 'es una hamburguesa', '../Uploads/Productos/hambu-removebg-preview.png', 'Activo', '$15.000'),
(18, 'salchi papa ', 'paps,carne,salchica', 'es una salchipapa', '../Uploads/Productos/salchi2.png', 'Activo', '$ 20.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioPedido` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pro` bigint(20) NOT NULL,
  `nombre_pro` varchar(100) NOT NULL,
  `categoria_pro` varchar(50) NOT NULL,
  `precio_pro` decimal(20,0) NOT NULL,
  `descripcion_pro` varchar(500) NOT NULL,
  `estado_pro` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `encargado` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`id`, `direccion`, `encargado`, `fecha`) VALUES
(2, 'MODELIA', 1014856785, '2023-10-14'),
(5, 'Suba', 1014856785, '2023-10-13'),
(6, 'SUBA', 1234, '2023-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `identificacion_admin` int(11) NOT NULL,
  `tipo_doc` varchar(50) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono_sede` bigint(15) NOT NULL,
  `direccion_sede` varchar(100) NOT NULL,
  `estado_sede` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `identificacion_admin`, `tipo_doc`, `nombres`, `apellidos`, `email`, `telefono_sede`, `direccion_sede`, `estado_sede`, `foto`) VALUES
(3, 111, 'CC', 'aaaaaa', 'eeeee', 'aaa@gmail.com', 3112013824, 'Suba', 'Activa', '../Uploads/Sedes/'),
(8, 1234, 'CC', 'MIKE ', 'CAMACHO', 'michaelestivenc@gmail.com', 1233444, 'Villa del Prado', 'Activa', '../Uploads/Sedes/'),
(12, 1050602492, 'CC', 'Hector', 'Moreras', 'hectorcaro722@gmail.com', 1212311, 'Bosa', 'Activa', '../Uploads/Sedes/logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `identificacion` int(11) NOT NULL,
  `tipo_doc` varchar(20) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`identificacion`, `tipo_doc`, `nombres`, `apellidos`, `email`, `telefono`, `clave`, `rol`, `estado`, `foto`) VALUES
(111, 'CC', 'aaaaaa', 'eeeee', 'ssss@gmail.com', 3195338476, '202cb962ac59075b964b07152d234b70', 'Administrador', 'Activo', ''),
(1234, 'CC', 'Michael', 'Camacho', 'michaelestivenc@gmail.com', 3212333, '202cb962ac59075b964b07152d234b70', 'Administrador', 'Activo', ''),
(12345789, 'CC', 'Empleado', 'Prueba', 'empleadoprueba@gmail.com', 12345789, '192c3425f0a3a4cca70e96149b5f3ff9', 'Empleado', 'Activo', '../Uploads/Usuarios/10.png'),
(1014856785, 'CC', 'sds', 'ddd', 'wwwww@gmail.com', 3112035467, '202cb962ac59075b964b07152d234b70', 'Administrador', 'Activo', ''),
(1023242474, 'CC', 'sebastian', 'gamez', 'sebsgamez27@gmail.com', 3102488271, 'ad4714faaa8e85cc562eb8d4515299e0', 'Empleado', 'Activo', '../Uploads/Usuarios/sebas.png'),
(1050602492, 'CC', 'Hector', 'Caro', 'hectorcaro722@gmail.com', 3224401981, 'b4e3f638689291b4570875abdef6b4b1', 'Administrador', 'Activo', '../Uploads/Usuarios/fotoHC.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recibo_ibfk_1` (`encargado`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `FKs` (`identificacion_admin`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `identificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`encargado`) REFERENCES `users` (`identificacion`);

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `FKs` FOREIGN KEY (`identificacion_admin`) REFERENCES `users` (`identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
