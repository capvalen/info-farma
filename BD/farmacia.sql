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
-- Table structure for table `categoriaproducto`
--

DROP TABLE IF EXISTS `categoriaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriaproducto` (
  `idCategoriaProducto` int(11) NOT NULL AUTO_INCREMENT,
  `catprodDescipcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoriaProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriaproducto`
--

LOCK TABLES `categoriaproducto` WRITE;
/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` VALUES (1,'Cosmética y belleza'),(2,'Nutrición'),(3,'Vitaminas'),(4,'Suplementos'),(5,'Higiene corporal'),(6,'Botiquín'),(7,'Complementos'),(8,'Regalos'),(9,'Perfumería'),(10,'Pastillas'),(11,'Jarabes'),(12,'Anticonceptivos'),(13,'Enemas'),(14,'Soluciones'),(15,'Cremas'),(16,'Jabones'),(17,'Polvos'),(18,'Gels'),(19,'Supositorios'),(20,'Inyectables'),(21,'Ungüentos'),(22,'Analgésicos'),(23,'Sueros'),(24,'Instrumentos quirúrgicos'),(25,'Gotas'),(26,'Cápsulas'),(27,'Antibióticos'),(28,'Antigripales'),(29,'Antisépticos'),(30,'Laxantes'),(31,'Mucolíticos'),(32,'Otros'),(33,'Aseo personal'),(34,'Limpieza');
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
  `compTitulo` varchar(100) DEFAULT NULL,
  `comptFecha` datetime DEFAULT NULL,
  `comprSubTotal` float DEFAULT NULL,
  `comprIGV` float DEFAULT NULL,
  `comprTotal` float DEFAULT NULL,
  `idTipoComprobante` int(11) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCompras`),
  KEY `fkCompt_Tipo_idx` (`idTipoComprobante`),
  KEY `fkCompr_Proveedor_idx` (`idProveedor`),
  KEY `fkCompr_usuario_idx` (`idUsuario`),
  CONSTRAINT `fkCompr_Proveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkCompr_Tipo` FOREIGN KEY (`idTipoComprobante`) REFERENCES `tipocomprobante` (`idTipoComprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkCompr_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'Inventario','2015-12-21 15:21:29',0,0,0,41,1,1),(2,'Inventario','2016-11-21 17:14:16',0,0,0,41,1,1),(3,'Inventario','2016-12-21 17:16:24',0,0,0,41,1,1),(4,'Inventario','2016-12-21 17:27:22',0,0,0,41,1,1),(5,'Inventario','2016-12-21 17:30:24',0,0,0,41,1,1),(6,'Inventario','2016-12-21 17:32:56',0,0,0,41,1,1),(7,'Inventario','2016-12-21 17:33:23',0,0,0,41,1,1),(8,'Inventario','2016-12-21 17:34:16',0,0,0,41,1,1),(9,'Inventario','2016-12-21 17:34:48',0,0,0,41,1,1),(10,'Inventario','2016-12-21 17:36:38',0,0,0,41,1,1),(11,'Inventario','2016-12-21 17:46:31',0,0,0,41,1,1),(12,'Inventario','2016-12-21 19:12:56',0,0,0,41,1,1),(13,'Inventario','2016-12-21 19:15:28',0,0,0,41,1,1),(14,'Inventario','2016-12-21 20:13:47',0,0,0,41,1,1),(15,'Inventario','2016-12-21 20:16:35',0,0,0,41,1,1),(16,'Inventario','2016-12-21 20:19:49',0,0,0,41,1,1),(17,'Inventario','2016-12-21 20:24:18',0,0,0,41,1,1),(18,'Inventario','2016-12-21 20:25:47',0,0,0,41,1,1),(19,'Inventario','2016-12-21 20:33:13',0,0,0,41,1,1),(20,'Inventario','2016-12-21 20:34:31',0,0,0,41,1,1),(21,'Inventario','2016-12-21 20:35:20',0,0,0,41,1,1),(22,'Inventario','2016-12-21 20:36:58',0,0,0,41,1,1),(23,'Inventario','2016-12-21 20:41:00',0,0,0,41,1,1),(24,'Inventario','2016-12-21 20:43:37',0,0,0,41,1,1),(25,'Inventario','2016-12-21 20:46:05',0,0,0,41,1,1),(26,'Inventario','2016-12-21 20:46:48',0,0,0,41,1,1),(27,'Inventario','2016-12-21 20:47:45',0,0,0,41,1,1),(28,'Inventario','2016-12-21 20:47:58',0,0,0,41,1,1),(29,'Inventario','2016-12-21 20:50:08',0,0,0,41,1,1),(30,'Inventario','2016-12-21 20:55:17',0,0,0,41,1,1),(31,'Inventario','2016-12-21 20:55:52',0,0,0,41,1,1),(32,'Inventario','2016-12-21 20:57:24',0,0,0,41,1,1),(33,'Inventario','2016-12-21 20:57:53',0,0,0,41,1,1),(34,'Inventario','2016-12-21 20:59:34',0,0,0,41,1,1),(35,'Inventario','2016-12-22 11:53:42',0,0,0,41,1,1),(36,'Inventario','2016-12-23 15:15:57',0,0,0,41,1,1),(37,'Inventario','2016-12-23 15:23:45',0,0,0,41,1,1),(38,'Inventario','2016-12-23 15:24:53',0,0,0,41,1,1),(39,'Inventario','2016-12-23 15:25:03',0,0,0,41,1,1),(40,'Inventario','2016-12-23 15:25:44',0,0,0,41,1,1),(41,'Inventario','2016-12-23 15:45:13',0,0,0,41,1,1),(42,'Inventario','2016-12-23 15:46:49',0,0,0,41,1,1),(43,'Inventario','2016-12-23 15:48:57',0,0,0,41,1,1),(44,'Inventario','2016-12-23 15:49:49',0,0,0,41,1,1),(45,'Inventario','2016-12-23 15:50:37',0,0,0,41,1,1),(46,'Inventario','2016-12-23 15:52:22',0,0,0,41,1,1),(47,'Inventario','2016-12-23 16:02:43',0,0,0,41,1,1),(48,'Inventario','2016-12-23 16:03:34',0,0,0,41,1,1),(49,'Inventario','2016-12-23 16:23:40',0,0,0,41,1,1),(50,'Inventario','2016-12-23 16:25:48',0,0,0,41,1,1),(51,'Inventario','2016-12-23 16:28:41',0,0,0,41,1,1),(52,'Inventario','2016-12-23 16:32:23',0,0,0,41,1,1),(53,'Inventario','2016-12-23 16:32:30',0,0,0,41,1,1),(54,'Inventario','2016-12-23 16:40:10',0,0,0,41,1,1),(55,'Inventario','2016-12-23 16:40:18',0,0,0,41,1,1),(56,'Inventario','2016-12-23 16:40:38',0,0,0,41,1,1),(57,'Inventario','2016-12-23 16:41:07',0,0,0,41,1,1),(58,'Inventario','2016-12-23 16:41:24',0,0,0,41,1,1),(59,'Inventario','2016-12-23 16:42:27',0,0,0,41,1,1),(60,'Inventario','2016-12-23 16:44:47',0,0,0,41,1,1),(61,'Inventario','2016-12-23 17:07:42',0,0,0,41,1,1),(62,'Inventario','2016-12-23 17:32:51',0,0,0,41,1,1),(63,'Inventario','2016-12-23 17:58:01',0,0,0,41,1,1),(64,'Inventario','2016-12-26 20:07:18',0,0,0,41,1,1),(65,'Inventario','2016-12-26 21:06:14',0,0,0,41,1,1),(66,'Inventario','2016-12-26 22:21:43',0,0,0,41,1,1),(67,'Inventario','2017-01-05 17:07:50',0,0,0,41,1,1);
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
INSERT INTO `detallecompra` VALUES (1,1,21,10,210),(2,2,4,2,8),(3,3,1,4,4),(3,4,6,20,120),(3,5,6,9,54),(4,6,4,65,260),(12,7,21,21,441),(1,1,12,12,144),(14,2,56,8,448),(16,3,21,21,441),(18,4,51,7,357),(19,5,15,2,30),(20,6,85,9,765),(23,7,1,51,51),(34,8,5,2,10),(36,9,41,52,2132),(36,10,15,9,135),(40,11,52,41,2132),(41,12,51,1,51),(42,13,4,4,16),(43,14,2,5,10),(44,15,36,18,648),(45,16,15,99,1485),(46,17,21,31,651),(46,18,51,3,153),(49,19,25,51,1275),(49,20,51,5,255),(50,21,1,4,4),(50,22,69,12,828),(50,23,69,12,828),(51,24,99,6.6,653.4),(59,25,21,4,84),(60,26,9,97,873),(60,27,51,19,969),(61,28,22,5.6,123.2),(61,29,18,18.6,334.8),(61,30,19,7.3,138.7),(66,31,199,25.6,5094.4),(67,32,5,16,80),(1,7,1,51,51),(1,7,1,51,51),(1,7,1,51,51);
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
  `prodLote` varchar(45) DEFAULT NULL,
  `prodCodigoBarra` varchar(50) DEFAULT NULL,
  `prodFechaVencimiento` varchar(45) DEFAULT NULL,
  `prodFechaRegistro` varchar(45) DEFAULT NULL,
  KEY `fkDetalle_Producto` (`idProducto`),
  CONSTRAINT `fkDetalle_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleproductos`
--

LOCK TABLES `detalleproductos` WRITE;
/*!40000 ALTER TABLE `detalleproductos` DISABLE KEYS */;
INSERT INTO `detalleproductos` VALUES (1,12,'fad','','22/12/2016','2016-12-21 20:10:09'),(2,8,'fsd','','04/01/2017','2016-12-21 20:14:08'),(3,21,'','','27/12/2016','2016-12-21 20:19:50'),(4,7,'vvfds','','03/01/2017','2016-12-21 20:25:49'),(5,2,'','','03/01/2017','2016-12-21 20:33:34'),(6,9,'12dsaw','','28/12/2016','2016-12-21 20:35:05'),(7,51,'','','27/12/2016','2016-12-21 20:41:16'),(8,2,'','','28/12/2016','2016-12-21 20:59:51'),(9,52,'fsd','','28/12/2016','2016-12-23 15:17:28'),(10,9,'posm','','03/01/2017','2016-12-23 15:20:16'),(11,41,'dasd8','','28/12/2016','2016-12-23 15:26:12'),(12,1,'','','04/01/2017','2016-12-23 15:45:41'),(13,4,'','','27/12/2016','2016-12-23 15:47:15'),(14,5,'','','03/01/2017','2016-12-23 15:49:19'),(15,18,'','','04/01/2017','2016-12-23 15:50:14'),(16,99,'FEQWQ','','03/01/2017','2016-12-23 15:51:12'),(17,31,'512dqw','','','2016-12-23 15:52:48'),(18,3,'jhgf','','','2016-12-23 15:53:17'),(19,51,'','','','2016-12-23 16:24:01'),(20,5,'dqgq36','','28/12/2016','2016-12-23 16:24:45'),(21,4,'da','','27/12/2016','2016-12-23 16:26:15'),(22,12,'51ffr','','27/12/2016','2016-12-23 16:26:45'),(23,12,'51ffr','','27/12/2016','2016-12-23 16:28:25'),(24,6.6,'2dq888','','31/12/2016','2016-12-23 16:29:30'),(25,4,'51','','04/01/2017','2016-12-23 16:43:11'),(26,97,'dsdwq','','08/01/2017','2016-12-23 16:45:17'),(27,19,'pommyt','','02/07/2017','2016-12-23 16:51:18'),(28,5.6,'','','28/12/2016','2016-12-23 17:08:14'),(29,18.6,'dqwdq','','28/12/2016','2016-12-23 17:09:09'),(30,7.3,'','','08/01/2017','2016-12-23 17:11:20'),(31,25.6,'43dde','','07/01/2017','2016-12-26 22:22:34'),(32,16,'okmmaj','','24/01/2017','2017-01-05 17:08:51');
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
INSERT INTO `detalleventas` VALUES (2,7,1,51,51),(1,7,2,51,102),(1,32,3,16,48),(7,7,2,51,102),(7,32,3,16,48),(11,7,2,51,102),(11,32,3,16,48),(46,7,1,51,51),(47,7,1,51,51),(48,7,1,51,51),(51,7,1,51,51),(60,7,1,51,51),(61,7,1,51,51),(64,7,1,51,51),(66,7,1,51,51),(68,7,1,51,51),(69,7,1,51,51),(70,7,1,51,51),(71,7,1,51,51),(72,7,1,51,51),(73,7,1,51,51),(74,7,1,51,51),(74,32,1,16,16),(75,7,1,51,51),(75,32,2,16,32),(75,18,3,3,9),(75,5,2,2,4),(75,28,2,5.6,11.2),(78,7,1,51,51),(78,32,2,16,32),(78,18,3,3,9),(78,5,2,2,4),(78,28,2,5.6,11.2),(79,7,1,51,51),(79,32,2,16,32),(79,18,3,3,9),(79,5,2,2,4),(79,28,2,5.6,11.2);
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `economia`
--

DROP TABLE IF EXISTS `economia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `economia` (
  `idIGV` int(11) NOT NULL AUTO_INCREMENT,
  `nombreIGV` varchar(45) DEFAULT NULL,
  `actualIGV` float DEFAULT NULL,
  `porcentajeGanancia` float DEFAULT NULL,
  `empresaMoneda` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idIGV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `economia`
--

LOCK TABLES `economia` WRITE;
/*!40000 ALTER TABLE `economia` DISABLE KEYS */;
/*!40000 ALTER TABLE `economia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresaprincipal`
--

DROP TABLE IF EXISTS `empresaprincipal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresaprincipal` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `RUC` varchar(40) DEFAULT NULL,
  `RazonSocial` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresaprincipal`
--

LOCK TABLES `empresaprincipal` WRITE;
/*!40000 ALTER TABLE `empresaprincipal` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresaprincipal` ENABLE KEYS */;
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
-- Table structure for table `laboratorio`
--

DROP TABLE IF EXISTS `laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorio` (
  `idLaboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `labNombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLaboratorio`)
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorio`
--

LOCK TABLES `laboratorio` WRITE;
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` VALUES (1,'3M Perú S.A.'),(2,'Abbott Laboratorios S.A.'),(3,'Abbvie S.A.S.'),(4,'Accord Healthcare S.A.C.'),(5,'Ache'),(6,'Advance Scientific del Perú'),(7,'Ajanta Pharma LTD.'),(8,'Albis S.A.'),(9,'Alcon Perú S.A.'),(10,'Alicorp'),(11,'Alifarma Perú S.A.C.'),(12,'Amilpharm SAC'),(13,'Apoyo a Programas de Población'),(14,'ASG Inversiones EIRL'),(15,'Aspen Perú S.A.'),(16,'Astellas Pharma US INC.'),(17,'Atlantic Comerce Trading S.A.C.'),(18,'Atlas Vision'),(19,'Axon Pharma Perú S.A.C.'),(20,'B. Braun Medical Perú S.A.'),(21,'BACON'),(22,'Bayer Consumer Care'),(23,'Bayer S.A.'),(24,'Bayer Schering Pharma'),(25,'Beiersdorf S.A.C.'),(26,'Bio Reg Pharma S.A.C.'),(27,'Biobasal S.A., Basilea Suiza'),(28,'Biologische Heilmittel Heel Gmbh - Alemania'),(29,'Biomedical Sciences'),(30,'Biosyntec S.A.C.'),(31,'Biotefar Perú SAC'),(32,'Biotoscana Farma S.A.'),(33,'Bonapharm S.A.'),(34,'Brand And Marketing Consultores S.A.C.'),(35,'Brisafarma S.A.C.'),(36,'Bristol Myers Squibb S.A.'),(37,'Caferma S.A.C.'),(38,'Calanit S.A.C.'),(39,'Cardio Perfusión EIRL'),(40,'Ceci Farma Import S.R.L.'),(41,'Chriscal Cleaning Products'),(42,'Cipa'),(43,'Colgate Palmolive Perú S.A.'),(44,'Comiesa Druc S.A.'),(45,'Concept Pharma S.A.C.'),(46,'Contilab'),(47,'Continental'),(48,'Corporación Arion S.A.C.'),(49,'Corporación de Inversiones Farma Perú S.A.C.'),(50,'Corporación Farbiomedic S.A.C.'),(51,'Corporación Farmacéutica Afarmach S.A.C.'),(52,'Corporación Farmacéutica Dajos S.A.C.'),(53,'Corporación Farmacológica J & J Salud'),(54,'Corporación Farmacológica J&J'),(55,'Corporación Medco S.A.C.'),(56,'Corporation Trade Plus del Perú S.A.C.'),(57,'D&M Pharma Perú S.A.C.'),(58,'Danone Nutricia Early Life Nutrition'),(59,'Dentilab del Perú'),(60,'Dispolab Farmacéutica Perú S.A.'),(61,'Distribuidor: Albis S.A.'),(62,'Distribuidora Continental 6 S.A.'),(63,'Distribuidora Dany S.R.L.'),(64,'Distribuidora Droguería Las Américas S.A.C.'),(65,'Distribuidora Quiarsa S.A.C.'),(66,'Doctor Andreu Q.F. S.A.'),(67,'Dr. Reddy\'s Laboratories'),(68,'Droguería AG Farma SAC'),(69,'Droguería Avsa Farmacéutica S.A.C.'),(70,'Droguería Carlos Castańeda Veckarich'),(71,'Droguería CFarma E.I.R.L.'),(72,'Droguería F.J.F. Pharma Perú S.A.C.'),(73,'Droguería Farbo S.A.'),(74,'Droguería Farmedic S.A.C.'),(75,'Droguería G & R S.R.L.'),(76,'Droguería Global Pharma S.A.C.'),(77,'Droguería Hanai SRL'),(78,'Droguería Infarval E.I.R.L.'),(79,'Droguería International Farma S.A.'),(80,'Droguería Laboratorio Baxley Group S.A.C.'),(81,'Droguería Laboratorio Farvet S.A.C.'),(82,'Droguería Laboratorios Biosana S.A.C.'),(83,'Droguería Laboratorios Pharmex S.A.C.'),(84,'Droguería Lafarpe S.A.C.'),(85,'Droguería Lipharma S.A.'),(86,'Droguería Ludber S.A.C'),(87,'Droguería Oftalmomédica S.A.C.'),(88,'Droguería Pacífico S.A.C.'),(89,'Droguería Pak Farma S.A.C.'),(90,'Droguería Vifarma E.I.R.L.'),(91,'Droguería Wilfar SAC'),(92,'Droguerías D\'olapharm S.A.C.'),(93,'Droguerías Unidas del Perú S.A.C.'),(94,'Drokasa Perú S.A.'),(95,'Dronnvels S.A.C.'),(96,'Drugs & Business Perú S.A.C.'),(97,'E.B. Pareja Lecaros S.A.'),(98,'Echopharma S.A.C.'),(99,'Eficiencia Laboral S.A.'),(100,'Emdiex S.A. Emp. Multinacional de Imp. y Exp. S.A.'),(101,'EMS Sigma Pharma'),(102,'Eske Group'),(103,'Especialidades Oftalmológicas S.A.'),(104,'Euroderma Droguería S.A.C.'),(105,'Eurofarma Perú S.A.C.'),(106,'European Chemicals'),(107,'Fada Pharma'),(108,'Faes Farma'),(109,'Family Doctor'),(110,'Farmacéutica Biotech S.A.C.'),(111,'Farmacéutica Latina S.A.C.'),(112,'Farmacéutica Otarvasq S.A.C.'),(113,'Farmadual S.A.C.'),(114,'Farmindustria S.A.'),(115,'Ferring Pharmaceuticals'),(116,'Fresenius Kabi Perú'),(117,'Frexen'),(118,'Gadorpharma S.A.C.'),(119,'Galenicum Health Perú SAC'),(120,'Gedeon Richter'),(121,'Gedeon Richter Perú S.A.C.'),(122,'Genomma Lab'),(123,'Genzyme del Perú S.A.C.'),(124,'GlaxoSmithKline Perú S.A.'),(125,'Glenmark Pharmaceuticals Perú S.A.'),(126,'Global Med Farma'),(127,'GP Pharm S.A.'),(128,'Grey Inversiones S.A.C.'),(129,'Grünenthal Peruana S.A.'),(130,'Grupo 2M y BR S.A.C.'),(131,'Grupo Atral-Cipan'),(132,'Grupo Faes S.A.'),(133,'Grupo Farmakonsuma S.A.'),(134,'Grupo Sanofi Aventis'),(135,'Hermes Sweeteners LTD.'),(136,'Hospira Perú S.R.L.'),(137,'Infermed S.A.C.'),(138,'Instituto Bioquímico Dr. F. Remy S.A.'),(139,'Instituto Quimioterápico S.A.'),(140,'Intipharma S.A.C.'),(141,'Intradevco Industrial S.A.'),(142,'Inversiones Farmacom S.A.'),(143,'Inversiones Ita SAC'),(144,'IPCA Laboratories Limited'),(145,'Isdin Perú S.A.'),(146,'Isis Pharma'),(147,'Istituto Ganassini S.P.A.'),(148,'J&M Especialidades Farmacéuticas S.A.C.'),(149,'Janssen-Cilag'),(150,'Johnson & Johnson del Perú'),(151,'Johnson & Johnson Medical'),(152,'Keyfarm S.A.C.'),(153,'Kimberly Clark del Perú'),(154,'La Santé'),(155,'Labex Corporation S.A.C.'),(156,'Labomed S.A.C.'),(157,'Laboratoires Dermatologiques Uriage'),(158,'Laboratorio AC Farma S.A.'),(159,'Laboratorio Algotec S.A.'),(160,'Laboratorio Allergan Internacional'),(161,'Laboratorio AstraZeneca Perú S.A.'),(162,'Laboratorio Bagó del Perú S.A.'),(163,'Laboratorio Bausch & Lomb'),(164,'Laboratorio Becton Dickinson del Uruguay S.A.'),(165,'Laboratorio Boehringer Ingelheim'),(166,'Laboratorio C.B. Fleet Co. Inc.'),(167,'Laboratorio Dentaid Perú S.A.C.'),(168,'Laboratorio Deutsche Pharma S.A.C.'),(169,'Laboratorio Dropesac'),(170,'Laboratorio Dubonp S.A.'),(171,'Laboratorio Eli Lilly Interamerican Inc.'),(172,'Laboratorio Elifarma S.A.'),(173,'Laboratorio Famy Care S.A.C.'),(174,'Laboratorio Farmacéutico Medical Perú S.A.'),(175,'Laboratorio Farmacéutico Peruano S.R.L.'),(176,'Laboratorio Farmacéutico San Joaquin Roxfarma S.A.'),(177,'Laboratorio Farmacéuticos Markos S.A.'),(178,'Laboratorio Farmaquil Perú S.A.C.'),(179,'Laboratorio Farmaval Perú S.A.'),(180,'Laboratorio Farnatu E.I.R.L.'),(181,'Laboratorio Ferrer Grupo Internacional S.A.'),(182,'Laboratorio Galderma Perú'),(183,'Laboratorio Garden House S.A.'),(184,'Laboratorio Gencopharmaceutical'),(185,'Laboratorio Genfar Perú S.A.'),(186,'Laboratorio Gianfarma S.A.'),(187,'Laboratorio Hersil S.A.'),(188,'Laboratorio Induquímica S.A. (Natural World)'),(189,'Laboratorio Innovaderm'),(190,'Laboratorio Inti Perú S.A.C.'),(191,'Laboratorio Lafage S.A.C.'),(192,'Laboratorio Lansier S.A.C.'),(193,'Laboratorio Lemery'),(194,'Laboratorio Lupin'),(195,'Laboratorio Mallinckrodt'),(196,'Laboratorio Marvic Trading S.R.L.'),(197,'Laboratorio Master Farma'),(198,'Laboratorio Medrock'),(199,'Laboratorio Merck Sharp & Dohme Perú S.R.L.'),(200,'Laboratorio Ophtha'),(201,'Laboratorio Ordesa'),(202,'Laboratorio Personal Products S.A.'),(203,'Laboratorio Pharma-C S.A.C.'),(204,'Laboratorio Pharmatech'),(205,'Laboratorio Portugal S.R.L.'),(206,'Laboratorio Quilla Pharma S.A.C.'),(207,'Laboratorio Quirofano'),(208,'Laboratorio Roker Perú S.A.'),(209,'Laboratorio Rowa Pharmaceuticals'),(210,'Laboratorio Sherfarma S.A.'),(211,'Laboratorio Sundown'),(212,'Laboratorio Terbol Perú S.A.'),(213,'Laboratorio Unión Farmacéutica Nacional S.R.L.'),(214,'Laboratorio Welfark Perú S.A.'),(215,'Laboratorios Americanos - Labot S.A.'),(216,'Laboratorios Ares Pharma S.A.C.'),(217,'Laboratorios Baxter del Perú S.A.'),(218,'Laboratorios Biopas'),(219,'Laboratorios Catalysis S.L.'),(220,'Laboratorios Crespal del Perú'),(221,'Laboratorios Delfarma S.A.C.'),(222,'Laboratorios Farmacéutica del Perú S.A.C.'),(223,'Laboratorios Farmachif'),(224,'Laboratorios Farmasur S.A.C.'),(225,'LABORATORIOS GABBLAN S.A.C.'),(226,'Laboratorios La Cooper'),(227,'Laboratorios M & G Vida Natural E.I.R.L.'),(228,'Laboratorios Naturales y Genéricos S.A.C.'),(229,'Laboratorios Nycomed'),(230,'Laboratorios Oftálmicos S.A.C.'),(231,'Laboratorios Pharmed Corporation S.A.C.'),(232,'Laboratorios Proteld S.A.C.'),(233,'Laboratorios Saval'),(234,'Laboratorios Unidos S.A.'),(235,'Laboratorios Unidos S.A.'),(236,'Labotarorios Siegfried S.A.C.'),(237,'Lafar Corporación Internacional S.A.C.'),(238,'Lamosan S.A.'),(239,'LKM Perú S.A.'),(240,'LMB H. Colichón S.A.'),(241,'Lukoll S.A.C.'),(242,'Lundbeck Perú S.A.C.'),(243,'Luxor Pharmaceutical S.A.C.'),(244,'Macleods Pharmaceuticals Limited Perú S.A.C.'),(245,'Maperb Drug S.A.C.'),(246,'Maquifarma E.I.R.L.'),(247,'Maver Perú S.A.'),(248,'Mc Globe Incorporate S.A.C.'),(249,'Mead Johnson Nutrition'),(250,'Meda Pharma'),(251,'Medical Devices & Pharma S.A.C. - Medphar S.A.C.'),(252,'Medifarma S.A.'),(253,'Medigroup'),(254,'Medine Pharmaceuticals S.A.C.'),(255,'Mega Lifesciences PTY. PERU'),(256,'Merck Peruana S.A.'),(257,'Merz Pharmaceuticals'),(258,'Mi Farma'),(259,'MKS Unidos S.A.'),(260,'N y S Compańia S.A.'),(261,'Nestlé Perú S.A.'),(262,'Nipro Medical Corporation Sucursal del Perú'),(263,'Nordic Pharmaceutical Company S.A.C.'),(264,'Nordic Pharmaceutical Company S.A.C.'),(265,'Norgine Pharma'),(266,'Novaderma S.A.C.'),(267,'Novartis Biosciences - Ciba Vision'),(268,'Novartis Biosciences Perú S.A.'),(269,'Novartis Div. Transplante'),(270,'Novartis Div.Oncológica'),(271,'Novartis Ophthalmics'),(272,'Novartis Pharma Biosciences Perú S.A.'),(273,'Novax Eirl'),(274,'Novo Nordisk Pharma Operations'),(275,'Okasa Pharma'),(276,'Oli Med Perú S.A.C.'),(277,'OM Pharma S.A.'),(278,'Omdica S.A.'),(279,'OQ Pharma S.A.C.'),(280,'Orbis International S.A.C.'),(281,'Organon International BV'),(282,'Palmagyar S.A.'),(283,'Peruano Germano S.A.'),(284,'Perufarma'),(285,'Perulab S.A.'),(286,'Pfizer Consumer Healthcare'),(287,'Pfizer S.A.'),(288,'Pharbal S.A.'),(289,'Pharma Hosting Perú S.A.C.'),(290,'Pharma Roy SAC'),(291,'Pharmaceutical Distoloza SA'),(292,'Pharmacheck Perú S.A.'),(293,'Pharmagen S.A.C.'),(294,'Pharmaris Perú S.A.C.'),(295,'Pharmavisión'),(296,'Procter & Gamble S.R.L.'),(297,'Productos Roche Q.F. S.A.'),(298,'Qualipharm Orthopedic'),(299,'Qualipharm S.R.L.'),(300,'Quality Pharma E.I.R.L.'),(301,'Quilab'),(302,'Quimfa Peru S.A.C.'),(303,'Química Suiza S.A.'),(304,'R&V Food Group S.A.C.'),(305,'Ranbaxy-PRP Perú S.A.C.'),(306,'Reckitt Benckiser'),(307,'Reimed Pharma S.A.'),(308,'Representaciones Farmacéuticas S.A.'),(309,'Representaciones Segura S.A.C.'),(310,'Representante: Albis S.A.'),(311,'Representante: Albis S.A.'),(312,'Representante: Albis S.A.'),(313,'Representante: Albis S.A.'),(314,'Rhovic Pharmaceutical S.A.'),(315,'Roca S.A.C.'),(316,'Rodmad International'),(317,'Roel Grace S.A.C.'),(318,'Roemmers S.A.'),(319,'Roha Arznelmittel Gmbh'),(320,'Roster S.A.'),(321,'Sancela'),(322,'Sanderson S.A.'),(323,'Sanofi Pasteur'),(324,'Scalup Importaciones S.A.C.'),(325,'Seven Pharma S.A.C.'),(326,'SIFI'),(327,'SIT Desma Health Care N.V.'),(328,'Skin Master Perú SAC'),(329,'Solton Pharma S.A.C.'),(330,'Solutions Medical Import SAC'),(331,'Sun Pharmaceutical'),(332,'Tablets (India) LTD.'),(333,'Takeda SRL'),(334,'Techsphere Perú S.A.C.'),(335,'Tecnofarma S.A.'),(336,'Temis Lostaló'),(337,'Teofarma Perú S.A.C.'),(338,'TEVA PERU S.A.'),(339,'Torres Pharma S.A.C.'),(340,'Unimed del Perú S.A.'),(341,'Unipharm S.A.C.'),(342,'Valeant Farmacéutica Perú SRL'),(343,'VANOCI E.I.R.L.'),(344,'Vendiband'),(345,'Ver Novartis Biosciences Perú S.A.'),(346,'Vidasol E.I.R.L.'),(347,'Vifor'),(348,'Vitabiotics'),(349,'Vitalis Perú S.A.C.'),(350,'Wockhardt Limited'),(351,'World Pharma S.A.C.'),(352,'WYETH NUTRICION'),(353,'Yobel Supply Chain Management S.A'),(354,'Ninguno'),(355,'Otro');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;
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
INSERT INTO `nivelusuario` VALUES (1,'Dioses'),(2,'Semidioses'),(3,'Mortales');
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
  `prodStock` int(11) DEFAULT NULL COMMENT 'Contiene el stock actual.',
  `prodStockMinimo` varchar(45) DEFAULT NULL COMMENT 'Contiene el mínimo de stock para que salga la alerta de que falta productos.',
  `idCategoriaProducto` int(11) DEFAULT NULL,
  `idPropiedadProducto` int(11) DEFAULT NULL,
  `idLaboratorio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fkProduc_categoria_idx` (`idCategoriaProducto`),
  KEY `fkProduc_propiedad_idx` (`idPropiedadProducto`),
  KEY `fkProduc_laboratorio_idx` (`idLaboratorio`),
  CONSTRAINT `fkProduc_categoria` FOREIGN KEY (`idCategoriaProducto`) REFERENCES `categoriaproducto` (`idCategoriaProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkProduc_laboratorio` FOREIGN KEY (`idLaboratorio`) REFERENCES `laboratorio` (`idLaboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkProduc_propiedad` FOREIGN KEY (`idPropiedadProducto`) REFERENCES `propiedadproducto` (`idpropiedadProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'ca','',10,'41',6,2,NULL),(2,'qtq v','',54,'10',26,2,7),(3,'dqw 51','',21,'10',15,3,8),(4,'tqwt ew','',51,'10',26,1,7),(5,'esmeralda x6 und','',11,'10',6,2,5),(6,'shampoo h&s limon 720ml','',85,'10',12,1,2),(7,'dasd1 qw','',-1,'10',1,1,6),(8,'black 21','',5,'5',12,1,3),(9,'Cloruro de sodio vijosa 2% 50ml','',41,'10',12,3,5),(10,'vitamina a natural ford pote x 25caps','',15,'10',29,3,4),(11,'heno de pravia jabon','',52,'10',6,1,5),(12,'jabon palmolive barra 51gr','',51,'10',6,2,4),(13,'palmolive primavera jabon 51gr','',4,'10',29,2,6),(14,'cloro pim jarabe 5ml','',2,'10',22,1,2),(15,'rodalon solución 15ml','',36,'8',6,2,6),(16,'complejo b vitamina 8-12 54ml','',15,'15',29,2,6),(17,'zentel tabletas 150und','',21,'10',6,2,5),(18,'acid mantle crema pote','',45,'10',7,3,7),(19,'caballa jabon 41gr','',25,'10',29,2,6),(20,'Ferridoce formula 5 caja x8 und','',51,'10',7,3,8),(21,'primiec gotas 21ml','',1,'10',29,2,5),(22,'bendramin tabletas 26mg','',69,'10',7,3,7),(23,'bendramin tabletas 26mg','',69,'10',7,3,7),(24,'Sedobital 100gr','',99,'19',10,1,5),(25,'Ampiben 50mg','',21,'10',28,1,11),(26,'funji sil crema forte 55gr','',9,'10',6,3,8),(27,'Metrodinazol inyectable 42ml','',51,'10',11,2,6),(28,'sanagrip tableta x16 und','',18,'11',22,1,2),(29,'polyabem 502ml','',18,'10',27,2,3),(30,'flubidron x10 cápsulas','',19,'10',13,1,11),(31,'talco Jhonson babys 170gr','',199,'10',27,1,2),(32,'shampoo h&s citrico 785ml','',1,'10',32,2,3);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propiedadproducto`
--

DROP TABLE IF EXISTS `propiedadproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propiedadproducto` (
  `idpropiedadProducto` int(11) NOT NULL AUTO_INCREMENT,
  `proproNombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpropiedadProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedadproducto`
--

LOCK TABLES `propiedadproducto` WRITE;
/*!40000 ALTER TABLE `propiedadproducto` DISABLE KEYS */;
INSERT INTO `propiedadproducto` VALUES (1,'Genérico'),(2,'Comercial'),(3,'Muestra médica');
/*!40000 ALTER TABLE `propiedadproducto` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'000000000','Inventario Inicial','-','0000-00-00 00:00:00',NULL,NULL,'');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocambio`
--

LOCK TABLES `tipocambio` WRITE;
/*!40000 ALTER TABLE `tipocambio` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocomprobante`
--

LOCK TABLES `tipocomprobante` WRITE;
/*!40000 ALTER TABLE `tipocomprobante` DISABLE KEYS */;
INSERT INTO `tipocomprobante` VALUES (1,'Factura'),(2,'Recibo por honorarios'),(3,'Boleta de venta'),(4,'Liquidación de compra'),(7,'Nota de crédito'),(8,'Nota de débito'),(9,'Guía de remisión'),(10,'Recibo por arrendamiento'),(11,'Ticket'),(12,'Liquidación de cobranza'),(41,'Venta interna');
/*!40000 ALTER TABLE `tipocomprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuNombre` varchar(60) DEFAULT NULL,
  `usuApellidos` varchar(85) DEFAULT NULL,
  `usuUser` varchar(25) DEFAULT NULL,
  `usuPassword` varchar(100) DEFAULT NULL,
  `idNivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fkNivel_usuario_idx` (`idNivel`),
  CONSTRAINT `fkNivel_usuario` FOREIGN KEY (`idNivel`) REFERENCES `nivelusuario` (`idNivelUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Carlos','Pariona Valencia','cpariona','00',1);
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
  `ventMonedaEnDuro` float DEFAULT NULL,
  `ventCambioVuelto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `idUsuario_idx` (`idUsuario`),
  CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2017-01-06 22:31:06',34.75,6.25,41,1,0,'-'),(2,'2017-01-06 22:31:20',0,0,0,1,0,'-'),(3,'2017-01-06 23:14:23',127.12,22.88,150,1,0,'-'),(4,'2017-01-06 23:15:42',127.12,22.88,150,1,0,'-'),(5,'2017-01-06 23:18:05',127.12,22.88,150,1,0,'-'),(6,'2017-01-06 23:18:24',127.12,22.88,150,1,0,'-'),(7,'2017-01-06 23:19:00',127.12,22.88,150,1,0,'-'),(8,'2017-01-06 23:19:54',127.12,22.88,150,1,0,'-'),(9,'2017-01-06 23:20:13',127.12,22.88,150,1,0,'-'),(10,'2017-01-06 23:20:33',127.12,22.88,150,1,0,'-'),(11,'2017-01-06 23:20:58',127.12,22.88,150,1,0,'-'),(12,'2017-01-06 23:21:51',127.12,22.88,150,1,0,'-'),(13,'2017-01-06 23:22:36',127.12,22.88,150,1,0,'-'),(14,'2017-01-06 23:22:54',127.12,22.88,150,1,0,'-'),(15,'2017-01-06 23:26:26',127.12,22.88,150,1,0,'-'),(16,'2017-01-06 23:27:13',127.12,22.88,150,1,0,'-'),(17,'2017-01-06 23:27:39',127.12,22.88,150,1,0,'-'),(18,'2017-01-06 23:28:35',127.12,22.88,150,1,0,'-'),(19,'2017-01-06 23:29:15',127.12,22.88,150,1,0,'-'),(20,'2017-01-06 23:30:48',127.12,22.88,150,1,0,'-'),(21,'2017-01-06 23:30:54',127.12,22.88,150,1,0,'-'),(22,'2017-01-06 23:31:31',127.12,22.88,150,1,0,'-'),(23,'2017-01-06 23:31:49',127.12,22.88,150,1,0,'-'),(24,'2017-01-06 23:32:00',127.12,22.88,150,1,0,'-'),(25,'2017-01-06 23:32:39',127.12,22.88,150,1,0,'-'),(26,'2017-01-06 23:32:50',127.12,22.88,150,1,0,'-'),(27,'2017-01-06 23:33:34',127.12,22.88,150,1,0,'-'),(28,'2017-01-06 23:33:39',127.12,22.88,150,1,0,'-'),(29,'2017-01-06 23:33:51',127.12,22.88,150,1,0,'-'),(30,'2017-01-06 23:35:44',127.12,22.88,150,1,0,'-'),(31,'2017-01-06 23:35:50',127.12,22.88,150,1,0,'-'),(32,'2017-01-06 23:36:10',127.12,22.88,150,1,0,'-'),(33,'2017-01-06 23:47:19',43.22,7.78,51,1,0,'-'),(34,'2017-01-06 23:47:30',43.22,7.78,51,1,0,'-'),(35,'2017-01-06 23:47:58',43.22,7.78,51,1,0,'-'),(36,'2017-01-06 23:49:07',43.22,7.78,51,1,0,'-'),(37,'2017-01-06 23:49:20',43.22,7.78,51,1,0,'-'),(38,'2017-01-06 23:49:30',43.22,7.78,51,1,0,'-'),(39,'2017-01-06 23:50:08',43.22,7.78,51,1,0,'-'),(40,'2017-01-06 23:50:27',43.22,7.78,51,1,0,'-'),(41,'2017-01-06 23:50:59',43.22,7.78,51,1,0,'-'),(42,'2017-01-06 23:51:32',43.22,7.78,51,1,0,'-'),(43,'2017-01-06 23:51:43',43.22,7.78,51,1,0,'-'),(44,'2017-01-06 23:52:49',43.22,7.78,51,1,0,'-'),(45,'2017-01-06 23:53:34',43.22,7.78,51,1,0,'-'),(46,'2017-01-06 23:53:48',43.22,7.78,51,1,0,'-'),(47,'2017-01-06 23:54:21',43.22,7.78,51,1,0,'-'),(48,'2017-01-06 23:55:09',43.22,7.78,51,1,0,'-'),(49,'2017-01-06 23:55:15',43.22,7.78,51,1,0,'-'),(50,'2017-01-06 23:55:20',43.22,7.78,51,1,0,'-'),(51,'2017-01-06 23:55:25',43.22,7.78,51,1,0,'-'),(52,'2017-01-06 23:56:08',43.22,7.78,51,1,0,'-'),(53,'2017-01-06 23:56:32',43.22,7.78,51,1,0,'-'),(54,'2017-01-06 23:57:57',43.22,7.78,51,1,0,'-'),(55,'2017-01-06 23:58:09',43.22,7.78,51,1,0,'-'),(56,'2017-01-07 00:00:07',43.22,7.78,51,1,0,'-'),(57,'2017-01-07 00:00:20',43.22,7.78,51,1,0,'-'),(58,'2017-01-07 00:00:29',43.22,7.78,51,1,0,'-'),(59,'2017-01-07 00:01:15',43.22,7.78,51,1,0,'-'),(60,'2017-01-07 00:01:36',43.22,7.78,51,1,0,'-'),(61,'2017-01-07 00:02:08',43.22,7.78,51,1,0,'-'),(62,'2017-01-07 00:02:35',43.22,7.78,51,1,0,'-'),(63,'2017-01-07 00:02:55',43.22,7.78,51,1,0,'-'),(64,'2017-01-07 00:03:17',43.22,7.78,51,1,0,'-'),(65,'2017-01-07 00:04:22',43.22,7.78,51,1,0,'-'),(66,'2017-01-07 00:04:38',43.22,7.78,51,1,0,'-'),(67,'2017-01-07 00:06:13',43.22,7.78,51,1,0,'-'),(68,'2017-01-07 00:06:21',43.22,7.78,51,1,0,'-'),(69,'2017-01-07 00:07:04',43.22,7.78,51,1,0,'-'),(70,'2017-01-07 00:07:12',43.22,7.78,51,1,0,'-'),(71,'2017-01-07 00:07:25',43.22,7.78,51,1,0,'-'),(72,'2017-01-07 00:08:02',43.22,7.78,51,1,0,'-'),(73,'2017-01-07 00:09:20',43.22,7.78,51,1,0,'-'),(74,'2017-01-07 00:09:32',56.78,10.22,67,1,0,'-'),(75,'2017-01-07 00:09:58',90.85,16.35,107.2,1,0,'-'),(76,'2017-01-07 00:29:11',90.85,16.35,107.2,1,0,'-'),(77,'2017-01-07 00:29:19',90.85,16.35,107.2,1,0,'-'),(78,'2017-01-07 00:30:08',90.85,16.35,107.2,1,0,'-'),(79,'2017-01-07 00:30:35',90.85,16.35,107.2,1,0,'-');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'farmacia'
--
/*!50003 DROP FUNCTION IF EXISTS `returnIdCategoriaProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `returnIdCategoriaProducto`(datoCateg text) RETURNS int(11)
BEGIN
declare ids int;
select idCategoriaProducto into ids from categoriaproducto
where lower(catprodDescipcion) = datoCateg;
RETURN ids;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `returnIdLaboratorio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `returnIdLaboratorio`(datoLab text) RETURNS int(11)
BEGIN
declare ids int;
select idLaboratorio into ids from laboratorio
where lower(labNombre) = datoLab;
RETURN ids;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `returnIdPropiedad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `returnIdPropiedad`(datoProd text) RETURNS int(11)
BEGIN
declare ids int;
select idpropiedadProducto into ids from propiedadproducto
where lower(proproNombre) = datoProd;
RETURN ids;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `returnNombreUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `returnNombreUsuario`(idUser int) RETURNS text CHARSET utf8
BEGIN
declare nombr text;
select usuUser into nombr from usuario
where idUsuario = idUser;

RETURN nombr;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `actualizarInventarioInicio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarInventarioInicio`()
BEGIN
UPDATE `farmacia`.`compras`
SET
`comptFecha` = now()
WHERE `idCompras` =1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `actualizarProductoPorInventario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarProductoPorInventario`(in idProduct int,
in nombre text, in stk int, in stkmin int, in categ text, in precio float, in lote text,
in vence text, in iduser int, in idcompr int, in labo text, in propi text)
BEGIN
UPDATE `farmacia`.`producto`
SET
`prodNombre` = nombre,
`prodDescripcion` = '',
`prodStock` = stk,
`prodStockMinimo` = stkmin,
`idCategoriaProducto` = returnIdCategoriaProducto(categ),
`idPropiedadProducto` = returnIdPropiedad(propi),
`idLaboratorio` = returnIdLaboratorio(labo)
WHERE `idProducto` =idProduct;


UPDATE `farmacia`.`detalleproductos`
SET
`prodPrecioUnitario` = precio,
`prodLote` = lote,
`prodCodigoBarra` = '',
`prodFechaVencimiento` = vence
WHERE `idProducto`=idProduct;


UPDATE `farmacia`.`detallecompra`
SET
`detcomprCantidad` = stk,
`detcomprPrecioUnitario` = precio,
`detcomprSubTotal` = stk*precio
WHERE `idCompra` =  idcompr and `idProducto`=idProduct;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `buscarProductoInventario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProductoInventario`(in nombr text)
BEGIN
select * from producto
where prodDescripcion like concat(nombr , '%');

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `buscarProductoXNombreOLote` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarProductoXNombreOLote`(in filtro text)
BEGIN
SELECT prd.idProducto, prodNombre, prodPrecioUnitario , catprodDescipcion,
case prodLote when '' then '-' else  upper(prodLote) end as lote,
prodFechaVencimiento, prodStock
FROM `producto` as prd
INNER JOIN `detalleproductos` as det ON prd.`idProducto`=det.`idProducto`
inner join categoriaproducto as cat on cat.idcategoriaproducto= prd.idcategoriaproducto
WHERE concat(catprodDescipcion , ' ',prodnombre  ) like filtro
or prodLote like filtro
ORDER BY prd.`prodNombre` asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarDetalleVentaProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarDetalleVentaProducto`(in idvent int, in idprod int,in ventCant float,in ventPrec float,in VentParc float)
BEGIN
insert INTO `detalleventas` (`idVenta`,`idProducto`,`detventCantidad`,`detventPrecio`,`detentPrecioparcial`)
values
(idvent, idprod ,ventCant ,ventPrec ,VentParc );

UPDATE `producto`
SET
`prodStock` =`prodStock` - ventCant
WHERE `idProducto` = idprod;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarEconomia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarInfoEmpresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarNuevoInventario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarNuevoInventario`(in iduser int)
BEGIN
INSERT INTO `farmacia`.`compras`
(`idCompras`,compTitulo,
`comptFecha`,
`comprSubTotal`,
`comprIGV`,
`comprTotal`,
`idTipoComprobante`,
`idProveedor`,
`idUsuario`)
VALUES
(null,'Inventario',
now(),
0,
0,
0,
41,
1,
iduser);
set @id = (select LAST_INSERT_ID());
select @id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarProductoPorInventario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarProductoPorInventario`(
in nombre text, in stk int, in stkmin int, in categ text, in precio float, in lote text,
in vence text, in iduser int, in idcompr int, in labo text, in propi text)
BEGIN
INSERT INTO `farmacia`.`producto`
(`idProducto`,
`prodNombre`,
`prodDescripcion`,
`prodStock`,
`prodStockMinimo`,
`idCategoriaProducto`, `idPropiedadProducto`, `idLaboratorio`)
VALUES
(null,
nombre,
'',
stk,
stkmin,
returnIdCategoriaProducto(categ),returnIdPropiedad(propi), returnIdLaboratorio(labo)
);

set @idProducto = (select LAST_INSERT_ID());

INSERT INTO `farmacia`.`detalleproductos`
(`idProducto`,
`prodPrecioUnitario`,
`prodLote`,
`prodCodigoBarra`,
`prodFechaVencimiento`, `prodFechaRegistro`)
VALUES
(@idProducto,
precio,
lote,
'',
vence, now());


INSERT INTO `farmacia`.`detallecompra`
(`idCompra`,
`idProducto`,
`detcomprCantidad`,
`detcomprPrecioUnitario`,
`detcomprSubTotal`)
VALUES
(idcompr,
@idProducto,
stk,
precio,
stk*precio);


select @idProducto as idProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertarVentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarVentas`(in sub float,in igv float,in total float, in iduser int, in moneda float, in vuelto text)
BEGIN
	INSERT INTO `farmacia`.`ventas`
(`idVenta`,
`ventFecha`,
`ventSubtotal`,
`ventIGV`,
`ventTotal`,
`idUsuario`,
`ventMonedaEnDuro`,
`ventCambioVuelto`)
VALUES
(null,
now(),
sub,
igv,
total,
iduser,
moneda,
vuelto);

set @id = (select LAST_INSERT_ID());
select @id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `listarCategoriaProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCategoriaProducto`()
BEGIN
SELECT idCategoriaProducto, Lower(catprodDescipcion) as catprodDescipcion FROM farmacia.categoriaproducto
order by catprodDescipcion asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `listarDetalleInventarioPorId` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarDetalleInventarioPorId`(in idInv int)
BEGIN
SET @row=0;
SELECT concat((@row:=@row+1), '. ', pro.prodNombre) as prodNombre,
detcomprCantidad,
round(detcomprPrecioUnitario,2) as detcomprPrecioUnitario,
round(detcomprSubTotal,2) as detcomprSubTotal
 FROM detallecompra det
inner join producto pro on pro.idProducto=det.idProducto
where idcompra = idInv;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `listarLaboratorios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarLaboratorios`()
BEGIN
SELECT * FROM farmacia.laboratorio
 order by lower(labNombre) asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `listarPropiedadProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPropiedadProducto`()
BEGIN
SELECT `propiedadproducto`.`idpropiedadProducto`,
    `propiedadproducto`.`proproNombre`
FROM `farmacia`.`propiedadproducto`
order by proproNombre asc;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `listarTodoInventarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarTodoInventarios`(in anio int, in mes int)
BEGIN
SELECT 
concat('INV-',right(concat('0000',idCompras), 5)) as idCompras,
idCompras as idSimple,
comptFecha ,
returnNombreUsuario(idUsuario) as Usuario,
round(sum(detcomprSubTotal),2) as total FROM compras co
inner join detallecompra det on co.idcompras=det.idcompra
where idTipoComprobante =41 and compTitulo='Inventario'
and year(comptFecha) =anio and month(comptFecha)=mes
group by idcompras
order by comptFecha desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retornarAñosCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retornarAñosCompras`()
BEGIN
SELECT distinct  year(comptFecha) as ano FROM compras
order by comptFecha desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retornarMesesAñoCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retornarMesesAñoCompras`(in ano int)
BEGIN
SELECT distinct month(comptFecha) as mes FROM compras
where year(comptFecha)= ano
order by comptFecha asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-07  0:36:42
