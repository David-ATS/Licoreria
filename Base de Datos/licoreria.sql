-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2022 a las 04:08:06
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `licoreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE IF NOT EXISTS `boleta` (
  `idboleta` int(11) NOT NULL AUTO_INCREMENT,
  `serie` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `tipopago` varchar(10) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`idboleta`),
  UNIQUE KEY `serie` (`serie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`idboleta`, `serie`, `fecha`, `hora`, `cliente`, `tipopago`, `estado`) VALUES
(10, 'ERrzACF2mpUdM5R', '2021-08-04', '05:45:27', 'diana', 'Efectivo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `idcargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idcargo`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idcargo`, `nombre`) VALUES
(5, 'administrador'),
(2, 'cajero'),
(3, 'despachador'),
(4, 'encargado de reclamos'),
(1, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleboleta`
--

CREATE TABLE IF NOT EXISTS `detalleboleta` (
  `idboleta` int(11) NOT NULL,
  `total` float NOT NULL,
  `idproforma` int(11) NOT NULL,
  KEY `idboleta` (`idboleta`,`idproforma`),
  KEY `idproforma` (`idproforma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleboleta`
--

INSERT INTO `detalleboleta` (`idboleta`, `total`, `idproforma`) VALUES
(10, 94.5, 72);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproforma`
--

CREATE TABLE IF NOT EXISTS `detalleproforma` (
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` float NOT NULL,
  `idproforma` int(11) NOT NULL,
  KEY `INDEXPRODUCTO` (`idproducto`),
  KEY `INDEXPROFORMA` (`idproforma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleproforma`
--

INSERT INTO `detalleproforma` (`idproducto`, `cantidad`, `monto`, `idproforma`) VALUES
(3, 1, 5.5, 60),
(3, 11, 60.5, 62),
(4, 11, 308, 62),
(5, 11, 55, 62),
(3, 5, 27.5, 70),
(4, 4, 112, 70),
(3, 1, 5.5, 71),
(3, 1, 5.5, 72),
(4, 3, 84, 72),
(5, 1, 5, 72),
(3, 1, 5.5, 73),
(4, 1, 28, 73),
(3, 2, 11, 74),
(4, 1, 28, 74),
(3, 2, 11, 75),
(4, 2, 56, 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadousuarios`
--

CREATE TABLE IF NOT EXISTS `estadousuarios` (
  `idestado` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadousuarios`
--

INSERT INTO `estadousuarios` (`idestado`, `nombre`) VALUES
(0, 'inhabilitado'),
(1, 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `btn` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `label`, `path`, `btn`, `image`) VALUES
(1, 'Gestionar Productos', '../moduloVentas/indexGestionarProductos.php', 'btnGestionarProductos', 'gestionarproductos.png'),
(2, 'Generar Proforma', '../moduloVentas/indexGenerarProforma.php', 'btnGenerarProforma', 'generarproforma.png'),
(3, 'Generar Boleta', '../moduloVentas/indexGenerarBoletas.php', 'btnGenerarBoleta', 'generarboleta.png'),
(4, 'Registrar Despacho', './index.php', 'btnRegistrarDespacho', 'registrardespacho.png'),
(5, 'Cerrar Caja', './index.php', 'btnCerrarCaja', 'cerrarcaja.png'),
(6, 'Quejas o Reclamos', './index.php', 'btnQuejasReclamos', 'quejasoreclamos.png'),
(8, 'Administracion', './index.php', 'btnAdministracion', 'administracion.png'),
(9, 'Cambiar Contraseña', '../moduloSeguridad/indexCambiarContrasenia.php', 'btnCambiarContrasenia', 'cambiarcontraseña.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `codigo`, `stock`, `precio`, `descripcion`) VALUES
(3, 'cod001', 49, 5.5, 'Gaseosa Coca Cola Botella 1.5L'),
(4, 'cod002', 21, 28, 'Ron CARTAVIO Black Botella 1L'),
(5, 'cod003', 11, 5, 'Gaseosa Inka Cola Botella 1.5L'),
(6, 'cod004', 40, 5, 'Gaseosa Pepsi Cola Botella 2.0L'),
(7, 'cod005', 20, 7, 'INCA COLA 1.5L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proformas`
--

CREATE TABLE IF NOT EXISTS `proformas` (
  `idproforma` int(11) NOT NULL AUTO_INCREMENT,
  `serie` varchar(50) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`idproforma`),
  UNIQUE KEY `serie` (`serie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Volcado de datos para la tabla `proformas`
--

INSERT INTO `proformas` (`idproforma`, `serie`, `cliente`, `fecha`, `hora`, `estado`) VALUES
(60, 'DS4S5o24KNGZkYw', 'sergio', '2021-08-02', '09:26:23', 0),
(62, 'h9l9MFVF56tnjfG', 'diego', '2021-08-02', '19:45:45', 0),
(70, '8euCL0PgYhH03Eb', 'javier', '2021-08-04', '01:15:09', 0),
(71, 'awHQoNvNv9pDb5G', 'luis ramos', '2021-08-04', '03:36:38', 0),
(72, 'ERrzACF2mpUdM5R', 'diana', '2021-08-04', '05:44:15', 1),
(73, 'SeqKAxevX51YyEF', 'daniel', '2021-08-04', '05:49:09', 0),
(74, 'wLhegBpntQEEf33', 'CHAMBI', '2022-09-28', '21:15:34', 0),
(75, 'Yga4n1MwiH3o4VF', 'chambi', '2022-09-28', '22:21:17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioprivilegios`
--

CREATE TABLE IF NOT EXISTS `usuarioprivilegios` (
  `login` varchar(20) NOT NULL,
  `idprivilegio` int(11) NOT NULL,
  PRIMARY KEY (`login`,`idprivilegio`),
  KEY `idprivilegio` (`idprivilegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarioprivilegios`
--

INSERT INTO `usuarioprivilegios` (`login`, `idprivilegio`) VALUES
('ficofico', 1),
('javier', 1),
('ficofico', 2),
('javier', 2),
('javier', 3),
('ficofico', 9),
('javier', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cargo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `login` (`login`),
  KEY `cargo` (`cargo`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `cargo`, `estado`) VALUES
('ficofico', '123123', 1, 1),
('javier', '123456', 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  ADD CONSTRAINT `detalleboleta_ibfk_1` FOREIGN KEY (`idboleta`) REFERENCES `boleta` (`idboleta`),
  ADD CONSTRAINT `detalleboleta_ibfk_2` FOREIGN KEY (`idproforma`) REFERENCES `proformas` (`idproforma`);

--
-- Filtros para la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD CONSTRAINT `detalleproforma_ibfk_1` FOREIGN KEY (`idproforma`) REFERENCES `proformas` (`idproforma`),
  ADD CONSTRAINT `detalleproforma_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `usuarioprivilegios`
--
ALTER TABLE `usuarioprivilegios`
  ADD CONSTRAINT `usuarioprivilegios_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuarios` (`login`),
  ADD CONSTRAINT `usuarioprivilegios_ibfk_2` FOREIGN KEY (`idprivilegio`) REFERENCES `privilegios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `cargos` (`idcargo`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estadousuarios` (`idestado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
