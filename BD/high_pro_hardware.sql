-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 13:45:00
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `high_pro_hardware`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `estado`) VALUES
(8, 'Juan Carlos', 1),
(9, 'Pedro Alfonso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_clientes`
--

CREATE TABLE `categoria_clientes` (
  `id_cat_cliente` int(11) NOT NULL,
  `nombre_cat` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` varchar(10) NOT NULL,
  `nombre_c` varchar(100) NOT NULL,
  `apellido_c` varchar(100) NOT NULL,
  `direccion_c` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` text NOT NULL,
  `tipo_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_c`, `apellido_c`, `direccion_c`, `telefono`, `correo`, `tipo_cliente`) VALUES
('018', 'Juan', 'Beltran', 'Ilopango ', 75789564, 'juancho@gmail.com', 0),
('019', 'Marcos', 'Escobar', 'San Vicente', 649491, 'Marcobar@gmial.com', 0),
('0015', 'Fernando', 'Hernandez', 'Ilopango', 54891548, 'juancho@gmail.com', 2984891);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_proveedores`
--

CREATE TABLE `contacto_proveedores` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_dorden_abastecimiento`
--

CREATE TABLE `detalle_dorden_abastecimiento` (
  `id_d_orden` int(11) NOT NULL,
  `id_detalle_ab` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_c` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden_venta`
--

CREATE TABLE `detalle_orden_venta` (
  `id_d_orden` int(11) NOT NULL,
  `id_orden_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `DUI` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Apellido` varchar(50) NOT NULL DEFAULT '0',
  `direccion` text,
  `telefono` varchar(20) DEFAULT NULL,
  `Sexo` tinyint(4) NOT NULL DEFAULT '0',
  `FechaNacimiento` varchar(50) DEFAULT NULL,
  `cargo` varchar(100) NOT NULL,
  `FechaRegistro` varchar(20) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_empleados`
--

CREATE TABLE `entrada_empleados` (
  `id_entrada` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_prod`
--

CREATE TABLE `inventario_prod` (
  `id_i_p` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `stock_up` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_prod`
--

INSERT INTO `inventario_prod` (`id_i_p`, `id_producto`, `stock_up`) VALUES
(9, 0, 20),
(10, 0, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_abastecimiento`
--

CREATE TABLE `orden_abastecimiento` (
  `id_detalle_ab` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_venta`
--

CREATE TABLE `orden_venta` (
  `id_orden_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` text NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `nombre_p` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_proveedor` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text,
  `telefono_fijo` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` text,
  `id_contacto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `direccion`, `telefono_fijo`, `celular`, `email`, `id_contacto`) VALUES
('0146', '949', '', 0, 0, 'r', 0),
('0018', 'Alfonso Pedro', '', 84618154, 49489498, 'correo_nuevo@gmial.com', 0),
('0019', 'Victor Manuel', 'Soypango', 2147483647, 2147483647, 'Correo_user09@gmial.com', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_de_abastecimiento`
--

CREATE TABLE `recibo_de_abastecimiento` (
  `id_recibo` int(11) NOT NULL,
  `id_orden_abastecimiento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_de_venta`
--

CREATE TABLE `recibo_de_venta` (
  `id_recibo` int(11) NOT NULL,
  `id_orden_venta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_empleados`
--

CREATE TABLE `salida_empleados` (
  `id_salida` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `nombre`, `clave`, `tipo`) VALUES
(8, 'new_user02@gmail.com', '$2y$10$iZzmXJg5M6hPZcDvEWv7Iu6n6PAEMZf0bRIiZSaq/KtZZ/g4IFBbC', 'operador'),
(7, 'nuevo_usuario09@gmail.com', '$2y$10$AI2aFAEeNADW5DkX8cUHn.mgGaYzUwM268piLOBVuswf4J1wx9kzO', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categoria_clientes`
--
ALTER TABLE `categoria_clientes`
  ADD PRIMARY KEY (`id_cat_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `clientes_ibfk_1` (`tipo_cliente`);

--
-- Indices de la tabla `contacto_proveedores`
--
ALTER TABLE `contacto_proveedores`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `detalle_dorden_abastecimiento`
--
ALTER TABLE `detalle_dorden_abastecimiento`
  ADD PRIMARY KEY (`id_d_orden`),
  ADD KEY `detalle_dorden_abastecimiento_ibfk_1` (`id_detalle_ab`),
  ADD KEY `ddetalle_dorden_abastecimiento_ibfk_2` (`id_producto`);

--
-- Indices de la tabla `detalle_orden_venta`
--
ALTER TABLE `detalle_orden_venta`
  ADD PRIMARY KEY (`id_d_orden`),
  ADD KEY `detalle_orden_venta_ibfk_1` (`id_orden_venta`),
  ADD KEY `ddetalle_orden_venta_ibfk_2` (`id_producto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrada_empleados`
--
ALTER TABLE `entrada_empleados`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `entrada_empleados_ibfk_1` (`id_empleado`);

--
-- Indices de la tabla `inventario_prod`
--
ALTER TABLE `inventario_prod`
  ADD PRIMARY KEY (`id_i_p`),
  ADD KEY `inventario_prod_ibfk_1` (`id_producto`);

--
-- Indices de la tabla `orden_abastecimiento`
--
ALTER TABLE `orden_abastecimiento`
  ADD PRIMARY KEY (`id_detalle_ab`),
  ADD KEY `orden_abastecimiento_ibfk_1` (`id_empleado`);

--
-- Indices de la tabla `orden_venta`
--
ALTER TABLE `orden_venta`
  ADD PRIMARY KEY (`id_orden_venta`),
  ADD KEY `orden_venta_ibfk_1` (`id_empleado`),
  ADD KEY `orden_venta_ibfk_2` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `productos_ibfk_1` (`id_proveedor`),
  ADD KEY `productos_ibfk_2` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `proveedores_ibfk_1` (`id_contacto`);

--
-- Indices de la tabla `recibo_de_abastecimiento`
--
ALTER TABLE `recibo_de_abastecimiento`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `recibo_de_abastecimiento_ibfk_1` (`id_orden_abastecimiento`);

--
-- Indices de la tabla `recibo_de_venta`
--
ALTER TABLE `recibo_de_venta`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `recibo_de_venta_ibfk_1` (`id_orden_venta`);

--
-- Indices de la tabla `salida_empleados`
--
ALTER TABLE `salida_empleados`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `salida_empleados_ibfk_1` (`id_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categoria_clientes`
--
ALTER TABLE `categoria_clientes`
  MODIFY `id_cat_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contacto_proveedores`
--
ALTER TABLE `contacto_proveedores`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_dorden_abastecimiento`
--
ALTER TABLE `detalle_dorden_abastecimiento`
  MODIFY `id_d_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden_venta`
--
ALTER TABLE `detalle_orden_venta`
  MODIFY `id_d_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `entrada_empleados`
--
ALTER TABLE `entrada_empleados`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_prod`
--
ALTER TABLE `inventario_prod`
  MODIFY `id_i_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibo_de_abastecimiento`
--
ALTER TABLE `recibo_de_abastecimiento`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibo_de_venta`
--
ALTER TABLE `recibo_de_venta`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salida_empleados`
--
ALTER TABLE `salida_empleados`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
