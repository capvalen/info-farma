-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2016 a las 03:39:49
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `farmacia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarEconomia`(in nomIGV text,
in cantIGV int,
in porcGanancia int,
in MonedaLocal text)
BEGIN
INSERT INTO `farmacia`.`economia`
(`idIGV`,
`nombreIGV`,
`actualIGV`,
`porcentajeGanancia`,
`empresaMoneda`)
VALUES
(null, nomIGV,
cantIGV,
porcGanancia,
MonedaLocal);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarInfoEmpresa`(in RUCs text,in RazonSoc text,in direcciones text,in telefonos text,in correos text)
BEGIN
INSERT INTO `farmacia`.`empresaprincipal`
(`idEmpresa`,
`RUC`,
`RazonSocial`,
`Direccion`,
`Telefono`,
`Correo`)
VALUES
(null,
RUCs,
RazonSoc,
direcciones,
telefonos,
correos);
set @ultimoid = (select LAST_INSERT_ID());
select @ultimoid as 'id';	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproducto`
--

CREATE TABLE IF NOT EXISTS `categoriaproducto` (
`idCategoriaProducto` int(11) NOT NULL,
  `catprodDescipcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`idCategoriaProducto`, `catprodDescipcion`) VALUES
(1, 'Cosmética y belleza'),
(2, 'Nutrición'),
(3, 'Vitaminas'),
(4, 'Suplementos'),
(5, 'Higiene corporal'),
(6, 'Botiquín'),
(7, 'Complementos'),
(8, 'Regalos'),
(9, 'Perfumería'),
(10, 'Pastillas'),
(11, 'Jarabes'),
(12, 'Anticonceptivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`idCompras` int(11) NOT NULL,
  `comptFecha` datetime DEFAULT NULL,
  `comprSubTotal` float DEFAULT NULL,
  `comprIGV` float DEFAULT NULL,
  `comprTotal` float DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idTipoComprobante` int(11) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE IF NOT EXISTS `detallecompra` (
  `idCompra` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `detcomprCantidad` int(11) DEFAULT NULL,
  `detcomprPrecioUnitario` float DEFAULT NULL,
  `detcomprSubTotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproductos`
--

CREATE TABLE IF NOT EXISTS `detalleproductos` (
  `idProducto` int(11) DEFAULT NULL,
  `prodPrecioUnitario` float DEFAULT NULL,
  `prodLote` varchar(45) DEFAULT NULL,
  `prodCodigoBarra` varchar(50) DEFAULT NULL,
  `prodFechaVencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE IF NOT EXISTS `detalleventas` (
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `detventCantidad` int(11) DEFAULT NULL,
  `detventPrecio` float DEFAULT NULL,
  `detentPrecioparcial` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `economia`
--

CREATE TABLE IF NOT EXISTS `economia` (
`idIGV` int(11) NOT NULL,
  `nombreIGV` varchar(45) DEFAULT NULL,
  `actualIGV` float DEFAULT NULL,
  `porcentajeGanancia` float DEFAULT NULL,
  `empresaMoneda` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresaprincipal`
--

CREATE TABLE IF NOT EXISTS `empresaprincipal` (
`idEmpresa` int(11) NOT NULL,
  `RUC` varchar(40) DEFAULT NULL,
  `RazonSocial` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcambiosprecio`
--

CREATE TABLE IF NOT EXISTS `historialcambiosprecio` (
`idHistorialCambios` int(11) NOT NULL,
  `idTipoCambio` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `cambprecioFecha` datetime DEFAULT NULL,
  `histDescripcion` text,
  `HistorialCambiosPreciocol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcomprasventas`
--

CREATE TABLE IF NOT EXISTS `historialcomprasventas` (
  `idHistorialComprasVentas` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idTipoCambio` int(11) DEFAULT NULL,
  `detalleCambio` text,
  `historFecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelusuario`
--

CREATE TABLE IF NOT EXISTS `nivelusuario` (
`idNivelUsuario` int(11) NOT NULL,
  `nivusuDescripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`idProducto` int(11) NOT NULL,
  `prodNombre` varchar(200) DEFAULT NULL,
  `prodDescripcion` text,
  `prodStock` int(11) DEFAULT NULL,
  `idCategoriaProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`idProveedor` int(11) NOT NULL,
  `provRUC` varchar(11) DEFAULT NULL,
  `provRazonSocial` varchar(150) DEFAULT NULL,
  `provDireccion` text,
  `provFechaCreacion` datetime DEFAULT NULL,
  `provTelefono` varchar(45) DEFAULT NULL,
  `provCelular` varchar(45) DEFAULT NULL,
  `provActivo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocambio`
--

CREATE TABLE IF NOT EXISTS `tipocambio` (
`idTipoCambio` int(11) NOT NULL,
  `descripcionTipoCambio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocomprobante`
--

CREATE TABLE IF NOT EXISTS `tipocomprobante` (
`idTipoComprobante` int(11) NOT NULL,
  `tipcompDescipcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `usuNombre` varchar(60) DEFAULT NULL,
  `usuApellidos` varchar(85) DEFAULT NULL,
  `usuUser` varchar(25) DEFAULT NULL,
  `usuPassword` varchar(100) DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`idVenta` int(11) NOT NULL,
  `ventFecha` datetime DEFAULT NULL,
  `ventSubtotal` float DEFAULT NULL,
  `ventIGV` float DEFAULT NULL,
  `ventTotal` float DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
 ADD PRIMARY KEY (`idCategoriaProducto`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`idCompras`), ADD KEY `fkCompr_Producto_idx` (`idProducto`), ADD KEY `fkCompt_Tipo_idx` (`idTipoComprobante`), ADD KEY `fkCompr_Proveedor_idx` (`idProveedor`), ADD KEY `fkCompr_usuario_idx` (`idUsuario`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
 ADD KEY `fkCompra_detalle_idx` (`idCompra`);

--
-- Indices de la tabla `detalleproductos`
--
ALTER TABLE `detalleproductos`
 ADD KEY `fkDetalle_Producto` (`idProducto`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
 ADD KEY `fk_IdVenta_idx` (`idVenta`), ADD KEY `fkDetalle_Product_idx` (`idProducto`);

--
-- Indices de la tabla `economia`
--
ALTER TABLE `economia`
 ADD PRIMARY KEY (`idIGV`);

--
-- Indices de la tabla `empresaprincipal`
--
ALTER TABLE `empresaprincipal`
 ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `historialcambiosprecio`
--
ALTER TABLE `historialcambiosprecio`
 ADD PRIMARY KEY (`idHistorialCambios`), ADD KEY `fkCambio_idx` (`idTipoCambio`);

--
-- Indices de la tabla `historialcomprasventas`
--
ALTER TABLE `historialcomprasventas`
 ADD PRIMARY KEY (`idHistorialComprasVentas`), ADD KEY `fkTipoCambio_idx` (`idTipoCambio`);

--
-- Indices de la tabla `nivelusuario`
--
ALTER TABLE `nivelusuario`
 ADD PRIMARY KEY (`idNivelUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`idProducto`), ADD KEY `fkProduc_categoria_idx` (`idCategoriaProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
 ADD PRIMARY KEY (`idTipoCambio`);

--
-- Indices de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
 ADD PRIMARY KEY (`idTipoComprobante`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`), ADD KEY `fkNivel_usuario_idx` (`idNivel`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`idVenta`), ADD KEY `idUsuario_idx` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
MODIFY `idCategoriaProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
MODIFY `idCompras` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `economia`
--
ALTER TABLE `economia`
MODIFY `idIGV` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresaprincipal`
--
ALTER TABLE `empresaprincipal`
MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historialcambiosprecio`
--
ALTER TABLE `historialcambiosprecio`
MODIFY `idHistorialCambios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivelusuario`
--
ALTER TABLE `nivelusuario`
MODIFY `idNivelUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipocambio`
--
ALTER TABLE `tipocambio`
MODIFY `idTipoCambio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
MODIFY `idTipoComprobante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
ADD CONSTRAINT `fkCompr_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fkCompr_Proveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fkCompr_Tipo` FOREIGN KEY (`idTipoComprobante`) REFERENCES `tipocomprobante` (`idTipoComprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fkCompr_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
ADD CONSTRAINT `fkCompra_detalle` FOREIGN KEY (`idCompra`) REFERENCES `compras` (`idCompras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleproductos`
--
ALTER TABLE `detalleproductos`
ADD CONSTRAINT `fkDetalle_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
ADD CONSTRAINT `fkDetalle_Product` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fkVenta_Detalle` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historialcambiosprecio`
--
ALTER TABLE `historialcambiosprecio`
ADD CONSTRAINT `fkCambio` FOREIGN KEY (`idTipoCambio`) REFERENCES `tipocambio` (`idTipoCambio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historialcomprasventas`
--
ALTER TABLE `historialcomprasventas`
ADD CONSTRAINT `fkTipoCambio` FOREIGN KEY (`idTipoCambio`) REFERENCES `tipocambio` (`idTipoCambio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `fkProduc_categoria` FOREIGN KEY (`idCategoriaProducto`) REFERENCES `categoriaproducto` (`idCategoriaProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fkNivel_usuario` FOREIGN KEY (`idNivel`) REFERENCES `nivelusuario` (`idNivelUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
