-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2022 a las 20:13:19
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopint`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_ma`
--

CREATE TABLE `administrador_ma` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `clave` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador_ma`
--

INSERT INTO `administrador_ma` (`id_admin`, `nombre`, `usuario`, `clave`) VALUES
(2, 'David Aldana', 'DSAP', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `usuario`, `clave`) VALUES
(2, 'Joan AvendaÃ±o', 'JSAA', '250cf8b51c773f3f8dc8b4be867a9a02'),
(3, 'pablo', 'pa', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `nombre_cliente` varchar(80) NOT NULL,
  `nombre_tienda` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `t_id_Tienda` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `valor` int(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `t_id_Tienda`, `nombre`, `imagen`, `valor`, `cantidad`, `descripcion`) VALUES
(100, 1, 'pan de queso', '1646438897_panqueso.jpg', 300, 10, 'pan relleno de queso'),
(101, 1, 'costeño', '1646438977_costeño.jpg', 2000, 10, 'pan relleno de bocadillo'),
(200, 2, 'Fresas', '1646439028_fresa.jpg', 3000, 10, 'libra de fresas'),
(201, 2, 'moras', '1646439194_moras.jpeg', 5000, 10, 'libra de moras'),
(300, 3, 'pastel de frutas', '1646446597_paste.jpg', 15000, 10, 'pastel hecho de frutos rojos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tendero`
--

CREATE TABLE `tendero` (
  `id_tendero` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tendero`
--

INSERT INTO `tendero` (`id_tendero`, `nombre`, `usuario`, `clave`) VALUES
(1, 'Enrique Rodriguez', 'Enri', '9cfefed8fb9497baa5cd519d7d2bb5d7'),
(2, 'Maria del Carmen', 'Mace', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `id_tienda` int(11) NOT NULL,
  `cod` varchar(10) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id_tienda`, `cod`, `nombre`) VALUES
(1, 'PAN', 'Panaderia Don Enrique'),
(2, 'SFE', 'Supermercado Felicidad Eterna'),
(3, 'REPO', 'Postres de Juliana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cl_id_cliente` int(11) NOT NULL,
  `te_id_tendero` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador_ma`
--
ALTER TABLE `administrador_ma`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD KEY `t_id_Tienda` (`t_id_Tienda`);

--
-- Indices de la tabla `tendero`
--
ALTER TABLE `tendero`
  ADD PRIMARY KEY (`id_tendero`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `cl_id_cliente` (`cl_id_cliente`),
  ADD KEY `te_id_tendero` (`te_id_tendero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador_ma`
--
ALTER TABLE `administrador_ma`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tendero`
--
ALTER TABLE `tendero`
  MODIFY `id_tendero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_tienda_id` FOREIGN KEY (`t_id_Tienda`) REFERENCES `tienda` (`id_tienda`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`cl_id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_id_tendero` FOREIGN KEY (`te_id_tendero`) REFERENCES `tendero` (`id_tendero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
