-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2016 a las 00:24:00
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appguacacallo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id_Administrador` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Identificacion` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id_Administrador`, `Nombre`, `Apellidos`, `Correo`, `Identificacion`, `contrasena`) VALUES
(3, 'Enuar', 'Muñoz', 'enu-44@hotmail.com', '123456789', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alcantarillado_predio`
--

CREATE TABLE `alcantarillado_predio` (
  `Id_Alcantarillado` bigint(20) NOT NULL,
  `Nombre_Acantarillado` varchar(50) DEFAULT NULL,
  `Descripcion_Alcantarillado` varchar(50) DEFAULT NULL,
  `Valor_Servicio_Alcantarillado` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alcantarillado_predio`
--

INSERT INTO `alcantarillado_predio` (`Id_Alcantarillado`, `Nombre_Acantarillado`, `Descripcion_Alcantarillado`, `Valor_Servicio_Alcantarillado`) VALUES
(1, 'Servicio Alcantarillado', 'se presta servicio alcantarillado', '1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `Id_Asistencia` bigint(20) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Detalle` bigint(20) NOT NULL,
  `Asistio` tinyint(1) NOT NULL,
  `Fecha_Asistencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`Id_Asistencia`, `Id_Usuario`, `Id_Detalle`, `Asistio`, `Fecha_Asistencia`) VALUES
(9, 11, 1, 1, '2016-02-07'),
(10, 12, 1, 0, '2016-02-07'),
(11, 13, 1, 1, '2016-02-07'),
(12, 14, 1, 1, '2016-02-07'),
(13, 11, 2, 0, '2016-02-07'),
(14, 12, 2, 1, '2016-02-07'),
(15, 13, 2, 1, '2016-02-07'),
(16, 14, 2, 1, '2016-02-07'),
(17, 11, 3, 0, '2016-02-08'),
(18, 12, 3, 1, '2016-02-08'),
(19, 13, 3, 1, '2016-02-08'),
(20, 14, 3, 1, '2016-02-08'),
(21, 11, 4, 0, '2016-02-08'),
(22, 12, 4, 1, '2016-02-08'),
(23, 13, 4, 1, '2016-02-08'),
(24, 14, 4, 1, '2016-02-08'),
(25, 11, 5, 1, '2016-02-10'),
(26, 12, 5, 1, '2016-02-10'),
(27, 13, 5, 1, '2016-02-10'),
(28, 14, 5, 0, '2016-02-10'),
(29, 12, 6, 1, '2016-02-16'),
(30, 13, 6, 1, '2016-02-16'),
(31, 14, 6, 1, '2016-02-16'),
(32, 15, 6, 1, '2016-02-16'),
(33, 16, 6, 0, '2016-02-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_contador`
--

CREATE TABLE `consumo_contador` (
  `Id_Consumo_Contador` bigint(20) NOT NULL,
  `Id_Valor_Consumo` bigint(20) DEFAULT NULL,
  `Fecha_Lectura` date DEFAULT NULL,
  `Consumo` bigint(20) DEFAULT NULL,
  `Estado_Lectura` int(11) DEFAULT NULL,
  `Suspendido` int(11) DEFAULT NULL,
  `Id_Facrura` bigint(20) DEFAULT NULL,
  `Id_Contador` bigint(20) DEFAULT NULL,
  `Fecha_Corte` date DEFAULT NULL,
  `Fecha_Elaboracion` date DEFAULT NULL,
  `Fecha_Pago_Oportuno` date DEFAULT NULL,
  `Contador` int(11) DEFAULT NULL,
  `estado_factura` int(11) DEFAULT NULL,
  `Referencia_Pago` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consumo_contador`
--

INSERT INTO `consumo_contador` (`Id_Consumo_Contador`, `Id_Valor_Consumo`, `Fecha_Lectura`, `Consumo`, `Estado_Lectura`, `Suspendido`, `Id_Facrura`, `Id_Contador`, `Fecha_Corte`, `Fecha_Elaboracion`, `Fecha_Pago_Oportuno`, `Contador`, `estado_factura`, `Referencia_Pago`) VALUES
(62, 1, NULL, NULL, NULL, 0, 117, NULL, NULL, '2016-02-16', '2016-02-17', 0, 1, NULL),
(63, 1, NULL, NULL, NULL, 0, 118, NULL, NULL, '2016-02-16', '2016-02-17', 0, 1, NULL),
(64, 1, NULL, NULL, NULL, 0, 119, NULL, NULL, '2016-02-16', '2016-02-17', 0, 1, NULL),
(65, 1, NULL, NULL, NULL, 0, 120, NULL, NULL, '2016-02-16', '2016-02-17', 0, 1, NULL),
(66, 1, NULL, NULL, NULL, 0, 121, NULL, NULL, '2016-02-16', '2016-02-17', 0, 1, NULL),
(67, 1, NULL, NULL, NULL, 0, 122, NULL, NULL, '2016-02-16', '2016-02-17', 0, 1, NULL),
(68, 1, NULL, NULL, NULL, 0, 123, NULL, NULL, '2016-02-16', '2016-03-31', 0, 1, NULL),
(69, 1, NULL, NULL, NULL, 0, 124, NULL, NULL, '2016-02-16', '2016-03-31', 0, 1, NULL),
(70, 1, NULL, NULL, NULL, 0, 125, NULL, NULL, '2016-02-16', '2016-03-31', 0, 1, NULL),
(71, 1, NULL, NULL, NULL, 0, 126, NULL, NULL, '2016-02-16', '2016-03-31', 0, 1, NULL),
(72, 1, NULL, NULL, NULL, 0, 127, NULL, NULL, '2016-02-16', '2016-03-31', 0, 1, NULL),
(73, 1, NULL, NULL, NULL, 0, 128, NULL, NULL, '2016-02-16', '2016-03-31', 0, 1, NULL),
(74, 1, NULL, NULL, NULL, 0, 129, NULL, '2016-03-30', '2016-02-16', '2016-04-08', 0, 1, NULL),
(75, 1, NULL, NULL, NULL, 0, 130, NULL, NULL, '2016-02-16', '2016-04-08', 0, 1, NULL),
(76, 1, NULL, NULL, NULL, 0, 131, NULL, '2016-03-30', '2016-02-16', '2016-04-08', 0, 1, NULL),
(77, 1, NULL, NULL, NULL, 0, 132, NULL, '2016-03-30', '2016-02-16', '2016-04-08', 0, 1, NULL),
(78, 1, NULL, NULL, NULL, 0, 133, NULL, '2016-03-30', '2016-02-16', '2016-04-08', 0, 1, NULL),
(79, 1, NULL, NULL, NULL, 0, 134, NULL, '2016-03-30', '2016-02-16', '2016-04-08', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `Id_Contador` bigint(20) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Codigo_Contador` varchar(100) NOT NULL,
  `Marca_Contador` varchar(50) NOT NULL,
  `Fecha_Instalacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `Id_Credito` bigint(20) NOT NULL,
  `Id_Factura` bigint(20) NOT NULL,
  `Fecha_Credito` date NOT NULL,
  `Fecha_Vencimiento_Credito` date DEFAULT NULL,
  `Valor_Total_Factura` decimal(10,0) NOT NULL,
  `Valor_Total_Deuda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credito`
--

INSERT INTO `credito` (`Id_Credito`, `Id_Factura`, `Fecha_Credito`, `Fecha_Vencimiento_Credito`, `Valor_Total_Factura`, `Valor_Total_Deuda`) VALUES
(6, 115, '2016-02-16', '0000-00-00', '10000', '0'),
(7, 137, '2016-02-16', '2016-02-16', '10000', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_credito`
--

CREATE TABLE `detalle_credito` (
  `Id_Detalle_Credito` bigint(20) NOT NULL,
  `Id_Credito` bigint(20) NOT NULL,
  `Valor_Abono` decimal(10,0) NOT NULL,
  `Fecha_Abono` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_credito`
--

INSERT INTO `detalle_credito` (`Id_Detalle_Credito`, `Id_Credito`, `Valor_Abono`, `Fecha_Abono`) VALUES
(10, 6, '5000', '2016-02-16'),
(11, 6, '4000', '0000-00-00'),
(12, 6, '0', '0000-00-00'),
(13, 7, '5000', '2016-02-16'),
(14, 7, '34', '2016-02-16'),
(15, 7, '0', '2016-02-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `Id_Detalle_Factura` bigint(20) NOT NULL,
  `Id_Factura` bigint(20) NOT NULL,
  `Id_Servi_Producto` bigint(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_Unitario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`Id_Detalle_Factura`, `Id_Factura`, `Id_Servi_Producto`, `Cantidad`, `Precio_Unitario`) VALUES
(19, 113, 10, 1, '10000'),
(20, 114, 10, 1, '10000'),
(21, 115, 10, 1, '10000'),
(22, 135, 10, 1, '10000'),
(23, 136, 10, 1, '10000'),
(24, 137, 10, 1, '10000'),
(25, 138, 10, 1, '10000'),
(26, 140, 10, 1, '10000'),
(27, 141, 10, 1, '10000'),
(28, 142, 7, 1, '7000'),
(29, 143, 7, 1, '7000'),
(30, 145, 7, 1, '7000'),
(31, 146, 7, 1, '7000'),
(32, 147, 7, 1, '7000'),
(33, 148, 7, 1, '7000'),
(34, 149, 7, 1, '7000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reunion`
--

CREATE TABLE `detalle_reunion` (
  `Id_Detalle_Reunion` bigint(20) NOT NULL,
  `Detalle_Reunion` varchar(200) DEFAULT NULL,
  `Nombre_Reunion` varchar(50) DEFAULT NULL,
  `Fecha_Reunion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_reunion`
--

INSERT INTO `detalle_reunion` (`Id_Detalle_Reunion`, `Detalle_Reunion`, `Nombre_Reunion`, `Fecha_Reunion`) VALUES
(1, 'SAD', 'PRUEBA', '2016-02-07'),
(2, 'SSAA', 'PRUEBA 2', '2016-02-08'),
(3, 'sad', 'prueba 3ws', '2016-02-08'),
(4, 'dwsdw', 'prueba 4', '2016-02-08'),
(5, 'asdas', 'prueba67', '2016-02-11'),
(6, 'se creo esta reuniÃ³n para legalizar el software', 'reunirnos con la contadora', '2016-02-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos_empresas`
--

CREATE TABLE `egresos_empresas` (
  `Id_Egresos` bigint(20) NOT NULL,
  `Nombre_Producto_Egreso` varchar(50) DEFAULT NULL,
  `Cantidad_Producto` bigint(20) DEFAULT NULL,
  `Valor_Unitrario` decimal(10,0) DEFAULT NULL,
  `Descripcion_Productos` varchar(200) DEFAULT NULL,
  `Id_Factura` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id_Factura` bigint(20) NOT NULL,
  `Id_Predio_Usuario` bigint(20) DEFAULT NULL,
  `Id_Tipo_Pago` bigint(20) DEFAULT NULL,
  `Id_Tipo_Movimiento` bigint(20) DEFAULT NULL,
  `Fecha_Factura` date DEFAULT NULL,
  `Valor_Total_Factura` decimal(10,0) DEFAULT NULL,
  `Id_Usuario` bigint(20) DEFAULT NULL,
  `Pago_mes_agua` varchar(50) DEFAULT NULL,
  `Estado_facturas_agua` int(11) DEFAULT NULL,
  `Id_Servi_Producto` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Id_Factura`, `Id_Predio_Usuario`, `Id_Tipo_Pago`, `Id_Tipo_Movimiento`, `Fecha_Factura`, `Valor_Total_Factura`, `Id_Usuario`, `Pago_mes_agua`, `Estado_facturas_agua`, `Id_Servi_Producto`) VALUES
(113, NULL, 9, 19, '2016-02-16', '10000', 12, NULL, NULL, NULL),
(114, NULL, 9, 19, '2016-02-16', '10000', 12, NULL, NULL, NULL),
(115, NULL, 9, 19, '2016-02-16', '10000', 12, NULL, NULL, NULL),
(117, 9, 8, 19, '2016-02-16', '10000', NULL, 'Enero/2017', 1, 7),
(118, 10, 8, 19, '2016-02-16', '10000', NULL, 'Enero/2017', 1, 7),
(119, 11, 8, 19, '2016-02-16', '10000', NULL, 'Enero/2017', 1, 7),
(120, 12, 8, 19, '2016-02-16', '10000', NULL, 'Enero/2017', 1, 7),
(121, 14, 8, 19, '2016-02-16', '10000', NULL, 'Enero/2017', 1, 7),
(122, 15, 8, 19, '2016-02-16', '10000', NULL, 'Enero/2017', 1, 7),
(123, 9, 8, 19, '2016-02-16', '10000', NULL, 'Febrero/2017', 1, 7),
(124, 10, 8, 19, '2016-02-16', '10000', NULL, 'Febrero/2017', 1, 7),
(125, 11, 8, 19, '2016-02-16', '10000', NULL, 'Febrero/2017', 1, 7),
(126, 12, 8, 19, '2016-02-16', '10000', NULL, 'Febrero/2017', 1, 7),
(127, 14, 8, 19, '2016-02-16', '10000', NULL, 'Febrero/2017', 1, 7),
(128, 15, 8, 19, '2016-02-16', '10000', NULL, 'Febrero/2017', 1, 7),
(129, 9, 8, 19, '2016-02-16', '10000', NULL, 'Marzo/2017', 1, 7),
(130, 10, 8, 19, '2016-02-16', '10000', NULL, 'Marzo/2017', 1, 7),
(131, 11, 8, 19, '2016-02-16', '10000', NULL, 'Marzo/2017', 1, 7),
(132, 12, 8, 19, '2016-02-16', '10000', NULL, 'Marzo/2017', 1, 7),
(133, 14, 8, 19, '2016-02-16', '10000', NULL, 'Marzo/2017', 1, 7),
(134, 15, 8, 19, '2016-02-16', '10000', NULL, 'Marzo/2017', 1, 7),
(135, NULL, 8, 19, '2016-02-16', NULL, 12, NULL, NULL, NULL),
(136, NULL, 8, 19, '2016-02-16', '10000', 12, NULL, NULL, NULL),
(137, NULL, 9, 19, '2016-02-16', '10000', 12, NULL, NULL, NULL),
(138, NULL, 9, 19, '2016-02-16', '10000', 14, NULL, NULL, NULL),
(139, NULL, 9, 19, '2016-02-16', NULL, 14, NULL, NULL, NULL),
(140, NULL, 9, 19, '2016-02-16', '10000', 14, NULL, NULL, NULL),
(141, NULL, 9, 19, '2016-02-16', '10000', 14, NULL, NULL, NULL),
(142, NULL, 9, 19, '2016-02-16', '7000', 14, NULL, NULL, NULL),
(143, NULL, 9, 19, '2016-02-17', '7000', 14, NULL, NULL, NULL),
(144, NULL, 8, 19, '2016-02-16', '0', 14, NULL, NULL, NULL),
(145, NULL, 9, 19, '2016-02-17', '7000', 14, NULL, NULL, NULL),
(146, NULL, 9, 19, '2016-02-17', '7000', 14, NULL, NULL, NULL),
(147, NULL, 9, 19, '2016-02-17', '7000', 14, NULL, NULL, NULL),
(148, NULL, 9, 19, '2016-02-17', '7000', 14, NULL, NULL, NULL),
(149, NULL, 9, 19, '2016-02-17', '7000', 14, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_perfil`
--

CREATE TABLE `foto_perfil` (
  `Id_Foto` int(11) NOT NULL,
  `Id_Administrador` int(11) NOT NULL,
  `Nombre_Foto` varchar(45) DEFAULT NULL,
  `Tamanio_Foto` varchar(45) DEFAULT NULL,
  `Temp_Foto` varchar(45) DEFAULT NULL,
  `Tipo_Foto` varchar(45) DEFAULT NULL,
  `Foto` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto_perfil`
--

INSERT INTO `foto_perfil` (`Id_Foto`, `Id_Administrador`, `Nombre_Foto`, `Tamanio_Foto`, `Temp_Foto`, `Tipo_Foto`, `Foto`) VALUES
(3, 3, 'citywallpaperhd.com-237.jpg', '1628992', 'C:xampp	mpphp4EB6.tmp', 'image/jpeg', 0x433a78616d7070096d70706870344542362e746d70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multa`
--

CREATE TABLE `multa` (
  `Id_Multa` bigint(20) NOT NULL,
  `Referencia_Pago` bigint(20) DEFAULT NULL,
  `Id_Tipo_Multa` bigint(20) DEFAULT NULL,
  `Id_Usuario` bigint(20) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Valor_Multa` decimal(10,0) DEFAULT NULL,
  `Fecha_Multa` date DEFAULT NULL,
  `Id_Predio_Usuario` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `multa`
--

INSERT INTO `multa` (`Id_Multa`, `Referencia_Pago`, `Id_Tipo_Multa`, `Id_Usuario`, `Estado`, `Valor_Multa`, `Fecha_Multa`, `Id_Predio_Usuario`) VALUES
(5, NULL, 8, 14, 0, NULL, '2016-02-16', 9),
(6, NULL, 8, 12, 0, NULL, '2016-02-16', 11),
(7, NULL, 8, 12, 0, NULL, '2016-02-16', 12),
(8, NULL, 8, 16, 0, NULL, '2016-02-16', 14),
(9, NULL, 8, 13, 0, NULL, '2016-02-16', 15),
(10, NULL, 8, 14, 0, NULL, '2016-02-16', 9),
(11, NULL, 8, 12, 0, NULL, '2016-02-16', 11),
(12, NULL, 8, 12, 0, NULL, '2016-02-16', 12),
(13, NULL, 8, 16, 0, NULL, '2016-02-16', 14),
(14, NULL, 8, 13, 0, NULL, '2016-02-16', 15),
(15, NULL, 6, 14, 0, NULL, '2016-02-16', 9),
(16, NULL, 7, 14, 1, NULL, '2016-02-16', 9),
(17, NULL, 6, 12, 0, NULL, '2016-02-16', 11),
(18, NULL, 7, 12, 0, NULL, '2016-02-16', 11),
(19, NULL, 6, 12, 0, NULL, '2016-02-16', 12),
(20, NULL, 7, 12, 0, NULL, '2016-02-16', 12),
(21, NULL, 6, 16, 0, NULL, '2016-02-16', 14),
(22, NULL, 7, 16, 0, NULL, '2016-02-16', 14),
(23, NULL, 6, 13, 0, NULL, '2016-02-16', 15),
(24, NULL, 7, 13, 0, NULL, '2016-02-16', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predio_usuario`
--

CREATE TABLE `predio_usuario` (
  `Id_Predio_Usuario` bigint(20) NOT NULL,
  `Id_Tipo_Predio` bigint(20) DEFAULT NULL,
  `Id_Usuario` bigint(20) DEFAULT NULL,
  `Nombre_Predio` varchar(50) DEFAULT NULL,
  `Fecha_Inscripcion` date DEFAULT NULL,
  `Estado_predio` int(11) DEFAULT NULL,
  `Alcantarillado` varchar(50) DEFAULT NULL,
  `Id_Alcantarillado` bigint(20) DEFAULT NULL,
  `Tamano_Predio` bigint(20) DEFAULT NULL,
  `Valor_Hectarea` int(11) DEFAULT NULL,
  `Valor_Total` int(11) DEFAULT NULL,
  `Fecha_Suspension_Predio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `predio_usuario`
--

INSERT INTO `predio_usuario` (`Id_Predio_Usuario`, `Id_Tipo_Predio`, `Id_Usuario`, `Nombre_Predio`, `Fecha_Inscripcion`, `Estado_predio`, `Alcantarillado`, `Id_Alcantarillado`, `Tamano_Predio`, `Valor_Hectarea`, `Valor_Total`, `Fecha_Suspension_Predio`) VALUES
(9, 2, 14, 'predio camiloooo', '2016-02-12', 1, 'SI', 1, 2, 4000, 8000, '2016-02-16'),
(10, 2, 11, 'predio catalina ', '2016-02-12', 1, 'NO', 1, 2, 3000, 6000, NULL),
(11, 2, 12, 'predio enuar', '2016-02-15', 1, 'SI', 1, 0, 0, 0, '2016-02-16'),
(12, 2, 12, 'predio enuar', '2016-02-15', 1, 'SI', 1, 2, 2000, 4000, '2016-02-16'),
(14, 2, 16, 'BellaVista', '2016-02-15', 1, 'SI', 1, 0, 0, 0, '2016-02-16'),
(15, 2, 13, 'predio juan', '2016-02-16', 1, 'SI', 1, 0, 0, 0, '2016-02-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servi_productos`
--

CREATE TABLE `servi_productos` (
  `Id_Servi_Producto` bigint(20) NOT NULL,
  `Nombre_Servi_Producto` varchar(100) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Valor_Servi_Producto` decimal(10,0) NOT NULL,
  `Id_Tipo_Servi_Producto` bigint(20) DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servi_productos`
--

INSERT INTO `servi_productos` (`Id_Servi_Producto`, `Nombre_Servi_Producto`, `Descripcion`, `Valor_Servi_Producto`, `Id_Tipo_Servi_Producto`, `cantidad`) VALUES
(7, 'Agua', 'agua para la comunidad', '7000', 1, NULL),
(8, 'Contadores', 'Contadores para la comunidad', '10000', 1, NULL),
(9, 'Cable', 'adquirir 2 metros de cable', '30000', 1, NULL),
(10, 'Matricula de agua', 'Matricula de agua', '10000', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `Id_Tipo_Movimiento` bigint(20) NOT NULL,
  `Nombre_Tipo_Movimiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`Id_Tipo_Movimiento`, `Nombre_Tipo_Movimiento`) VALUES
(19, 'Ingreso'),
(20, 'Egreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_multa`
--

CREATE TABLE `tipo_multa` (
  `Id_Tipo_Multa` bigint(20) NOT NULL,
  `Nombre_Multa` varchar(50) NOT NULL,
  `Valor_Tipo_Multa` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_multa`
--

INSERT INTO `tipo_multa` (`Id_Tipo_Multa`, `Nombre_Multa`, `Valor_Tipo_Multa`) VALUES
(5, 'Asistencia', '3000'),
(6, 'Corte Agua', '2000'),
(7, 'Reconexion Agua', '2000'),
(8, 'Recargo atraso mes', '3000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `Id_Tipo_Pago` bigint(20) NOT NULL,
  `Nombre_Tipo_Pago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`Id_Tipo_Pago`, `Nombre_Tipo_Pago`) VALUES
(8, 'Contado'),
(9, 'Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_predio`
--

CREATE TABLE `tipo_predio` (
  `Id_Tipo_Predio` bigint(20) NOT NULL,
  `Nombre_Tipo_Predio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_predio`
--

INSERT INTO `tipo_predio` (`Id_Tipo_Predio`, `Nombre_Tipo_Predio`) VALUES
(1, 'Urbano'),
(2, 'Rural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_serviproducto`
--

CREATE TABLE `tipo_serviproducto` (
  `Id_Tipo_Servi_Producto` bigint(20) NOT NULL,
  `NombreTipoServiProducto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_serviproducto`
--

INSERT INTO `tipo_serviproducto` (`Id_Tipo_Servi_Producto`, `NombreTipoServiProducto`) VALUES
(1, 'Servicio'),
(2, 'Producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` bigint(20) NOT NULL,
  `Nombre_Usuario` varchar(50) DEFAULT NULL,
  `Apellido_Usuario` varchar(50) DEFAULT NULL,
  `Telefono_Usuario` varchar(50) DEFAULT NULL,
  `Documento_Usuario` varchar(50) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Estrato_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre_Usuario`, `Apellido_Usuario`, `Telefono_Usuario`, `Documento_Usuario`, `Estado`, `Estrato_Usuario`) VALUES
(11, 'catalina', 'gomes', '2321312', '54321', 0, 2),
(12, 'Enuar', 'MuÃ±oz', '1234567890', '13579', 1, 1),
(13, 'juan', 'muÃ±oz', '123453321', '98765', 1, 1),
(14, 'camilo', 'muÃ±oz', '3122342342', '12323232432434', 1, 2),
(15, 'joel', 'peÃ±a', '12312323123', '23456712', 1, 1),
(16, 'jorge Eliecer', 'rojas', '3131313131', '12234696', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_consumo`
--

CREATE TABLE `valor_consumo` (
  `Id_Valor_Consumo` bigint(20) NOT NULL,
  `Nombre_Valor` varchar(50) NOT NULL,
  `Valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valor_consumo`
--

INSERT INTO `valor_consumo` (`Id_Valor_Consumo`, `Nombre_Valor`, `Valor`) VALUES
(1, 'Fijo', '10000'),
(3, 'consumo agua', '4000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Id_Administrador`);

--
-- Indices de la tabla `alcantarillado_predio`
--
ALTER TABLE `alcantarillado_predio`
  ADD PRIMARY KEY (`Id_Alcantarillado`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`Id_Asistencia`),
  ADD KEY `Id_Usuario_idx` (`Id_Usuario`),
  ADD KEY `Id_Detalle_Reunion_idx` (`Id_Detalle`);

--
-- Indices de la tabla `consumo_contador`
--
ALTER TABLE `consumo_contador`
  ADD PRIMARY KEY (`Id_Consumo_Contador`),
  ADD KEY `Id_Facrura` (`Id_Facrura`),
  ADD KEY `Id_Valor_Consumo` (`Id_Valor_Consumo`),
  ADD KEY `Id_Contador` (`Id_Contador`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`Id_Contador`);

--
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`Id_Credito`),
  ADD KEY `Id_Factura` (`Id_Factura`);

--
-- Indices de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD PRIMARY KEY (`Id_Detalle_Credito`),
  ADD KEY `Id_Credito` (`Id_Credito`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`Id_Detalle_Factura`),
  ADD KEY `Id_Factura` (`Id_Factura`),
  ADD KEY `Id_Servi_Producto` (`Id_Servi_Producto`);

--
-- Indices de la tabla `detalle_reunion`
--
ALTER TABLE `detalle_reunion`
  ADD PRIMARY KEY (`Id_Detalle_Reunion`);

--
-- Indices de la tabla `egresos_empresas`
--
ALTER TABLE `egresos_empresas`
  ADD PRIMARY KEY (`Id_Egresos`),
  ADD KEY `Id_Factura` (`Id_Factura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_Factura`),
  ADD KEY `Id_Predio_Usuario` (`Id_Predio_Usuario`),
  ADD KEY `Id_Tipo_Pago` (`Id_Tipo_Pago`),
  ADD KEY `Id_Tipo_Movimiento` (`Id_Tipo_Movimiento`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Servi_Producto` (`Id_Servi_Producto`);

--
-- Indices de la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  ADD PRIMARY KEY (`Id_Foto`),
  ADD KEY `Id_Administrador_idx` (`Id_Administrador`);

--
-- Indices de la tabla `multa`
--
ALTER TABLE `multa`
  ADD PRIMARY KEY (`Id_Multa`),
  ADD KEY `Id_Tipo_Multa` (`Id_Tipo_Multa`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Predio_Usuario` (`Id_Predio_Usuario`);

--
-- Indices de la tabla `predio_usuario`
--
ALTER TABLE `predio_usuario`
  ADD PRIMARY KEY (`Id_Predio_Usuario`),
  ADD KEY `Id_Tipo_Usuario` (`Id_Tipo_Predio`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Alcantarillado` (`Id_Alcantarillado`);

--
-- Indices de la tabla `servi_productos`
--
ALTER TABLE `servi_productos`
  ADD PRIMARY KEY (`Id_Servi_Producto`),
  ADD KEY `Id_Tipo_Servi_Producto` (`Id_Tipo_Servi_Producto`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`Id_Tipo_Movimiento`);

--
-- Indices de la tabla `tipo_multa`
--
ALTER TABLE `tipo_multa`
  ADD PRIMARY KEY (`Id_Tipo_Multa`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`Id_Tipo_Pago`);

--
-- Indices de la tabla `tipo_predio`
--
ALTER TABLE `tipo_predio`
  ADD PRIMARY KEY (`Id_Tipo_Predio`);

--
-- Indices de la tabla `tipo_serviproducto`
--
ALTER TABLE `tipo_serviproducto`
  ADD PRIMARY KEY (`Id_Tipo_Servi_Producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- Indices de la tabla `valor_consumo`
--
ALTER TABLE `valor_consumo`
  ADD PRIMARY KEY (`Id_Valor_Consumo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Id_Administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `alcantarillado_predio`
--
ALTER TABLE `alcantarillado_predio`
  MODIFY `Id_Alcantarillado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `Id_Asistencia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `consumo_contador`
--
ALTER TABLE `consumo_contador`
  MODIFY `Id_Consumo_Contador` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `Id_Contador` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `Id_Credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  MODIFY `Id_Detalle_Credito` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `Id_Detalle_Factura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `detalle_reunion`
--
ALTER TABLE `detalle_reunion`
  MODIFY `Id_Detalle_Reunion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `egresos_empresas`
--
ALTER TABLE `egresos_empresas`
  MODIFY `Id_Egresos` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_Factura` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT de la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  MODIFY `Id_Foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `multa`
--
ALTER TABLE `multa`
  MODIFY `Id_Multa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `predio_usuario`
--
ALTER TABLE `predio_usuario`
  MODIFY `Id_Predio_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `servi_productos`
--
ALTER TABLE `servi_productos`
  MODIFY `Id_Servi_Producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `Id_Tipo_Movimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tipo_multa`
--
ALTER TABLE `tipo_multa`
  MODIFY `Id_Tipo_Multa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `Id_Tipo_Pago` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipo_predio`
--
ALTER TABLE `tipo_predio`
  MODIFY `Id_Tipo_Predio` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_serviproducto`
--
ALTER TABLE `tipo_serviproducto`
  MODIFY `Id_Tipo_Servi_Producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `valor_consumo`
--
ALTER TABLE `valor_consumo`
  MODIFY `Id_Valor_Consumo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `Id_Detalle_Reunion` FOREIGN KEY (`Id_Detalle`) REFERENCES `detalle_reunion` (`Id_Detalle_Reunion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consumo_contador`
--
ALTER TABLE `consumo_contador`
  ADD CONSTRAINT `consumo_contador_ibfk_1` FOREIGN KEY (`Id_Valor_Consumo`) REFERENCES `valor_consumo` (`Id_Valor_Consumo`),
  ADD CONSTRAINT `consumo_contador_ibfk_2` FOREIGN KEY (`Id_Facrura`) REFERENCES `factura` (`Id_Factura`),
  ADD CONSTRAINT `consumo_contador_ibfk_3` FOREIGN KEY (`Id_Contador`) REFERENCES `contador` (`Id_Contador`);

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`Id_Factura`) REFERENCES `factura` (`Id_Factura`);

--
-- Filtros para la tabla `detalle_credito`
--
ALTER TABLE `detalle_credito`
  ADD CONSTRAINT `detalle_credito_ibfk_1` FOREIGN KEY (`Id_Credito`) REFERENCES `credito` (`Id_Credito`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`Id_Factura`) REFERENCES `factura` (`Id_Factura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`Id_Servi_Producto`) REFERENCES `servi_productos` (`Id_Servi_Producto`);

--
-- Filtros para la tabla `egresos_empresas`
--
ALTER TABLE `egresos_empresas`
  ADD CONSTRAINT `egresos_empresas_ibfk_1` FOREIGN KEY (`Id_Factura`) REFERENCES `factura` (`Id_Factura`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Id_Predio_Usuario`) REFERENCES `predio_usuario` (`Id_Predio_Usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`Id_Tipo_Pago`) REFERENCES `tipo_pago` (`Id_Tipo_Pago`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`Id_Tipo_Movimiento`) REFERENCES `tipo_movimiento` (`Id_Tipo_Movimiento`),
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`),
  ADD CONSTRAINT `factura_ibfk_5` FOREIGN KEY (`Id_Servi_Producto`) REFERENCES `servi_productos` (`Id_Servi_Producto`);

--
-- Filtros para la tabla `foto_perfil`
--
ALTER TABLE `foto_perfil`
  ADD CONSTRAINT `Id_Administrador` FOREIGN KEY (`Id_Administrador`) REFERENCES `administrador` (`Id_Administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `multa`
--
ALTER TABLE `multa`
  ADD CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`Id_Tipo_Multa`) REFERENCES `tipo_multa` (`Id_Tipo_Multa`),
  ADD CONSTRAINT `multa_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Filtros para la tabla `predio_usuario`
--
ALTER TABLE `predio_usuario`
  ADD CONSTRAINT `predio_usuario_ibfk_1` FOREIGN KEY (`Id_Tipo_Predio`) REFERENCES `tipo_predio` (`Id_Tipo_Predio`),
  ADD CONSTRAINT `predio_usuario_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`),
  ADD CONSTRAINT `predio_usuario_ibfk_3` FOREIGN KEY (`Id_Alcantarillado`) REFERENCES `alcantarillado_predio` (`Id_Alcantarillado`);

--
-- Filtros para la tabla `servi_productos`
--
ALTER TABLE `servi_productos`
  ADD CONSTRAINT `servi_productos_ibfk_1` FOREIGN KEY (`Id_Tipo_Servi_Producto`) REFERENCES `tipo_serviproducto` (`Id_Tipo_Servi_Producto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
