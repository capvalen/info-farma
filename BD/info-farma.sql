-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: farmacia
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barraproductos`
--

DROP TABLE IF EXISTS `barraproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barraproductos` (
  `idProductos` int(11) DEFAULT NULL,
  `codigoBarra` varchar(15) DEFAULT NULL,
  KEY `fkBarra_Producto_idx` (`idProductos`),
  CONSTRAINT `fkBarra_Producto` FOREIGN KEY (`idProductos`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barraproductos`
--

LOCK TABLES `barraproductos` WRITE;
/*!40000 ALTER TABLE `barraproductos` DISABLE KEYS */;
/*!40000 ALTER TABLE `barraproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriaproducto`
--

DROP TABLE IF EXISTS `categoriaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriaproducto` (
  `idCategoriaProducto` int(11) NOT NULL AUTO_INCREMENT,
  `catprodDescipcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoriaProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriaproducto`
--

LOCK TABLES `categoriaproducto` WRITE;
/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` VALUES (1,'Antibióticos'),(2,'Antiinflamatorios'),(3,'Analgésicos'),(4,'Antiestaminicos'),(5,'Vitaminas'),(6,'Bebidas'),(7,'Regalos'),(8,'Otros'),(9,'Antigripales');
/*!40000 ALTER TABLE `categoriaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `idCompras` int(11) NOT NULL AUTO_INCREMENT,
  `comptFecha` datetime DEFAULT NULL,
  `comprSubTotal` float DEFAULT NULL,
  `comprIGV` float DEFAULT NULL,
  `comprTotal` float DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idTipoComprobante` int(11) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCompras`),
  KEY `fkCompr_Producto_idx` (`idProducto`),
  KEY `fkCompt_Tipo_idx` (`idTipoComprobante`),
  KEY `fkCompr_Proveedor_idx` (`idProveedor`),
  KEY `fkCompr_usuario_idx` (`idUsuario`),
  CONSTRAINT `fkCompr_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkCompr_Proveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkCompr_Tipo` FOREIGN KEY (`idTipoComprobante`) REFERENCES `tipocomprobante` (`idTipoComprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkCompr_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallecompra`
--

DROP TABLE IF EXISTS `detallecompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallecompra` (
  `idCompra` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `detcomprCantidad` int(11) DEFAULT NULL,
  `detcomprPrecioUnitario` float DEFAULT NULL,
  `detcomprSubTotal` float DEFAULT NULL,
  KEY `fkCompra_detalle_idx` (`idCompra`),
  CONSTRAINT `fkCompra_detalle` FOREIGN KEY (`idCompra`) REFERENCES `compras` (`idCompras`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecompra`
--

LOCK TABLES `detallecompra` WRITE;
/*!40000 ALTER TABLE `detallecompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleproductos`
--

DROP TABLE IF EXISTS `detalleproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleproductos` (
  `idProducto` int(11) DEFAULT NULL,
  `prodPrecioUnitario` float DEFAULT NULL,
  `prodCantidadPack` int(11) DEFAULT '0',
  `prodPrecioPack` float DEFAULT '0',
  KEY `fkDetalle_Producto` (`idProducto`),
  CONSTRAINT `fkDetalle_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleproductos`
--

LOCK TABLES `detalleproductos` WRITE;
/*!40000 ALTER TABLE `detalleproductos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventas`
--

DROP TABLE IF EXISTS `detalleventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventas` (
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `detventCantidad` int(11) DEFAULT NULL,
  `detventPrecio` float DEFAULT NULL,
  `detentPrecioparcial` float DEFAULT NULL,
  KEY `fk_IdVenta_idx` (`idVenta`),
  KEY `fkDetalle_Product_idx` (`idProducto`),
  CONSTRAINT `fkDetalle_Product` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkVenta_Detalle` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventas`
--

LOCK TABLES `detalleventas` WRITE;
/*!40000 ALTER TABLE `detalleventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `RUC` varchar(8) DEFAULT NULL,
  `RazonSocial` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (0,'20601044','SERVICIOS MEDICOS OTORRINO E.I.R.L.','AV. 13 DE NOVIEMBRE N° 832 - EL TAMBO - HUANCAYO - JUNIN','064-789440');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historialcambiosprecio`
--

DROP TABLE IF EXISTS `historialcambiosprecio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historialcambiosprecio` (
  `idHistorialCambios` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoCambio` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `cambprecioFecha` datetime DEFAULT NULL,
  `histDescripcion` text,
  `HistorialCambiosPreciocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idHistorialCambios`),
  KEY `fkCambio_idx` (`idTipoCambio`),
  CONSTRAINT `fkCambio` FOREIGN KEY (`idTipoCambio`) REFERENCES `tipocambio` (`idTipoCambio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historialcambiosprecio`
--

LOCK TABLES `historialcambiosprecio` WRITE;
/*!40000 ALTER TABLE `historialcambiosprecio` DISABLE KEYS */;
/*!40000 ALTER TABLE `historialcambiosprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historialcomprasventas`
--

DROP TABLE IF EXISTS `historialcomprasventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historialcomprasventas` (
  `idHistorialComprasVentas` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idTipoCambio` int(11) DEFAULT NULL,
  `detalleCambio` text,
  `historFecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idHistorialComprasVentas`),
  KEY `fkTipoCambio_idx` (`idTipoCambio`),
  CONSTRAINT `fkTipoCambio` FOREIGN KEY (`idTipoCambio`) REFERENCES `tipocambio` (`idTipoCambio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historialcomprasventas`
--

LOCK TABLES `historialcomprasventas` WRITE;
/*!40000 ALTER TABLE `historialcomprasventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `historialcomprasventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igv`
--

DROP TABLE IF EXISTS `igv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igv` (
  `idIGV` int(11) NOT NULL,
  `actualIGV` float DEFAULT NULL,
  `porcentajeGanancia` float DEFAULT NULL,
  PRIMARY KEY (`idIGV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igv`
--

LOCK TABLES `igv` WRITE;
/*!40000 ALTER TABLE `igv` DISABLE KEYS */;
INSERT INTO `igv` VALUES (0,18,30);
/*!40000 ALTER TABLE `igv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivelusuario`
--

DROP TABLE IF EXISTS `nivelusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivelusuario` (
  `idNivelUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nivusuDescripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNivelUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivelusuario`
--

LOCK TABLES `nivelusuario` WRITE;
/*!40000 ALTER TABLE `nivelusuario` DISABLE KEYS */;
INSERT INTO `nivelusuario` VALUES (1,'Administrador'),(2,'Vendedor'),(3,'Reporte');
/*!40000 ALTER TABLE `nivelusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `prodNombre` varchar(200) DEFAULT NULL,
  `prodDescripcion` text,
  `prodStock` int(11) DEFAULT NULL,
  `idCategoriaProducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fkProduc_categoria_idx` (`idCategoriaProducto`),
  CONSTRAINT `fkProduc_categoria` FOREIGN KEY (`idCategoriaProducto`) REFERENCES `categoriaproducto` (`idCategoriaProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `provRUC` varchar(11) DEFAULT NULL,
  `provRazonSocial` varchar(150) DEFAULT NULL,
  `provDireccion` text,
  `provFechaCreacion` datetime DEFAULT NULL,
  `provTelefono` varchar(45) DEFAULT NULL,
  `provCelular` varchar(45) DEFAULT NULL,
  `provActivo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocambio`
--

DROP TABLE IF EXISTS `tipocambio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocambio` (
  `idTipoCambio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionTipoCambio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoCambio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocambio`
--

LOCK TABLES `tipocambio` WRITE;
/*!40000 ALTER TABLE `tipocambio` DISABLE KEYS */;
INSERT INTO `tipocambio` VALUES (1,'Creación'),(2,'Emininación'),(3,'Actualización');
/*!40000 ALTER TABLE `tipocambio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocomprobante`
--

DROP TABLE IF EXISTS `tipocomprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocomprobante` (
  `idTipoComprobante` int(11) NOT NULL AUTO_INCREMENT,
  `tipcompDescipcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoComprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocomprobante`
--

LOCK TABLES `tipocomprobante` WRITE;
/*!40000 ALTER TABLE `tipocomprobante` DISABLE KEYS */;
INSERT INTO `tipocomprobante` VALUES (1,'Boleta de venta'),(2,'Factura'),(3,'Ticket'),(4,'Recibo por honorarios');
/*!40000 ALTER TABLE `tipocomprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuNombre` varchar(60) DEFAULT NULL,
  `usuApellidos` varchar(85) DEFAULT NULL,
  `usuUser` varchar(25) DEFAULT NULL,
  `usuPassword` varchar(100) DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fkNivel_usuario_idx` (`idNivel`),
  CONSTRAINT `fkNivel_usuario` FOREIGN KEY (`idNivel`) REFERENCES `nivelusuario` (`idNivelUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `ventFecha` datetime DEFAULT NULL,
  `ventSubtotal` float DEFAULT NULL,
  `ventIGV` float DEFAULT NULL,
  `ventTotal` float DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `idUsuario_idx` (`idUsuario`),
  CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-25 22:27:16
