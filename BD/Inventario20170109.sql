-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: farmacia
-- ------------------------------------------------------
-- Server version	5.6.16

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriaproducto`
--

LOCK TABLES `categoriaproducto` WRITE;
/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` VALUES (1,'Cosmética y belleza'),(2,'Nutrición'),(3,'Vitaminas'),(4,'Suplementos'),(5,'Higiene corporal'),(6,'Botiquín'),(7,'Complementos'),(8,'Regalos'),(9,'Perfumería'),(10,'Pastillas'),(11,'Jarabes'),(12,'Anticonceptivos'),(13,'Enemas'),(14,'Soluciones'),(15,'Cremas'),(16,'Jabones'),(17,'Polvos'),(18,'Gels'),(19,'Supositorios'),(20,'Inyectables'),(21,'Ungüentos'),(22,'Analgésicos'),(23,'Sueros'),(24,'Instrumentos quirúrgicos'),(25,'Gotas'),(26,'Cápsulas'),(27,'Antibióticos'),(28,'Antigripales'),(29,'Antisépticos'),(30,'Laxantes'),(31,'Mucolíticos'),(32,'Otros'),(33,'Aseo personal'),(34,'Limpieza'),(35,'Ampollas'),(36,'Comprimidos'),(37,'Tabletas'),(38,'Suspención'),(39,'Grageas'),(40,'Spray'),(41,'Efervecentes'),(42,'Esteroides'),(43,'Compuestos');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'Inventario','2017-01-07 18:30:45',0,0,0,41,1,1),(2,'Inventario','2017-01-07 19:35:51',0,0,0,41,1,1),(3,'Inventario','2017-01-07 19:41:10',0,0,0,41,1,1),(4,'Inventario','2017-01-09 08:25:14',0,0,0,41,1,1),(5,'Inventario','2017-01-09 08:32:35',0,0,0,41,1,1),(6,'Inventario','2017-01-09 10:24:22',0,0,0,41,1,1),(7,'Inventario','2017-01-09 12:26:34',0,0,0,41,1,1),(8,'Inventario','2017-01-09 13:59:25',0,0,0,41,1,1),(9,'Inventario','2017-01-09 14:14:38',0,0,0,41,1,1);
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
INSERT INTO `detallecompra` VALUES (2,1,7,27,189),(2,2,1,18,18),(3,3,6,10,60),(3,4,3,21.3,63.9),(3,5,29,0.5,14.5),(3,6,13,0.9,11.7),(3,7,13,2,26),(3,8,10,0.8,8),(3,9,18,1.5,27),(3,10,49,0.8,39.2),(3,11,22,0.8,17.6),(3,12,14,0.8,11.2),(3,13,12,1.8,21.6),(3,14,43,0.8,34.4),(3,15,4,7,28),(3,16,2,12.5,25),(3,17,1,17.5,17.5),(3,18,13,0.8,10.4),(3,19,13,0.8,10.4),(3,20,5,17.5,87.5),(3,21,21,3.5,73.5),(3,22,2,18,36),(3,23,122,4.4,536.8),(3,24,4,76.5,306),(3,25,6,33.3,199.8),(3,26,423,2.2,930.6),(3,27,159,1.9,302.1),(3,28,3,13.2,39.6),(3,29,68,1.3,88.4),(3,30,9,1.8,16.2),(3,31,6,70.5,423),(3,32,4,12.5,50),(3,33,1,20,20),(3,34,3,22,66),(3,35,5,14,70),(3,36,47,8,376),(3,37,1,3.5,3.5),(3,38,43,15,645),(3,39,10,48.8,488),(3,40,5,57.8,289),(3,41,31,38.8,1202.8),(3,42,57,18,1026),(3,43,10,23,230),(3,44,2,29.9,59.8),(3,45,51,5.9,300.9),(3,46,274,2,548),(3,47,56,5.7,319.2),(3,48,134,3,402),(3,49,23,0.7,16.1),(3,50,14,28,392),(3,51,39,4.2,163.8),(3,52,95,6,570),(3,53,90,1.5,135),(3,54,4,3.5,14),(3,55,53,2.3,121.9),(3,56,4,41.5,166),(3,57,14,2.7,37.8),(3,58,1689,3.8,6418.2),(3,59,215,5.3,1139.5),(3,60,99,2,198),(4,61,8167,1,8167),(4,62,36,3.5,126),(4,63,3,30.3,90.9),(5,64,146,3,438),(5,65,37,1.9,70.3),(5,66,7,1,7),(5,67,9,13.5,121.5),(5,68,6,21.5,129),(5,69,4,27.7,110.8),(5,70,9,24,216),(5,71,4,10.9,43.6),(5,72,447,1.5,670.5),(5,73,73,1.9,138.7),(5,74,9,57.5,517.5),(5,75,8,14,112),(5,76,6,49.9,299.4),(5,77,9,17.5,157.5),(5,78,101,3.9,393.9),(5,79,1,5.2,5.2),(5,80,87,7.6,661.2),(5,81,116,7.8,904.8),(5,82,2,17,34),(5,83,53,2,106),(5,84,4,4.9,19.6),(5,85,64,1.5,96),(5,86,8,9.5,76),(5,87,54,1,54),(5,88,109,10.8,1177.2),(5,89,12,1.7,20.4),(5,90,2,11,22),(5,91,81,2,162),(5,92,12,1,12),(5,93,26,2.5,65),(5,94,50,8.7,435),(5,95,50,12,600),(5,96,50,4.4,220),(5,97,6,1.5,9),(5,98,6,1.3,7.8),(5,99,9,1.5,13.5),(5,100,7,1.5,10.5),(5,101,10,1.2,12),(5,102,1,2.9,2.9),(5,103,24,7.4,177.6),(5,104,234,1,234),(5,105,266,1,266),(5,106,117,2.5,292.5),(5,107,50,1.5,75),(5,108,338,4.3,1453.4),(5,109,8,63,504),(5,110,14,34,476),(5,111,26,23.8,618.8),(5,112,31,5.8,179.8),(5,113,320,2.8,896),(5,114,30,15.5,465),(5,115,48,1.5,72),(5,116,5,5.8,29),(5,117,26,14.7,382.2),(5,118,276,3.2,883.2),(5,119,45,1.5,67.5),(5,120,218,2.8,610.4),(5,121,9,10,90),(5,122,14,11.5,161),(5,123,5,0.3,1.5),(5,124,32,0.9,28.8),(5,125,4,44,176),(5,126,7,44,308),(5,127,14,2.6,36.4),(5,128,51,2,102),(5,129,140,2.6,364),(5,130,73,4.6,335.8),(5,131,1,24,24),(5,132,7,25,175),(5,133,4,18,72),(5,134,64,2,128),(5,135,66,31.9,2105.4),(5,136,12,1.1,13.2),(5,137,3,5.4,16.2),(5,138,6,6.5,39),(6,139,7,6,42),(6,140,106,3.9,413.4),(6,141,315,4.9,1543.5),(6,142,84,4.5,378),(6,143,32,26,832),(6,144,39,14,546),(6,145,8,23.5,188),(6,146,8,31.5,252),(6,147,43,6,258),(6,148,105,3.2,336),(6,149,39,2.5,97.5),(6,150,102,0.6,61.2),(6,151,55,0.8,44),(6,152,28,1.2,33.6),(6,153,52,1.5,78),(6,154,10,1.5,15),(6,155,26,1.5,39),(6,156,6,1.6,9.6),(6,157,76,0.9,68.4),(6,158,30,3,90),(6,159,9,0.8,7.2),(6,160,27,2,54),(6,161,94,1,94),(6,162,25,1.2,30),(6,163,56,0.5,28),(6,164,2,19,38),(6,165,8,20.3,162.4),(6,166,4,47.7,190.8),(6,167,34,6,204),(6,168,7,4.5,31.5),(6,169,42,4.4,184.8),(6,170,2,3.5,7),(6,171,3,9.5,28.5),(6,172,8,4.6,36.8),(6,173,7,4.5,31.5),(6,174,3,18,54),(6,175,6,5,30),(6,176,5,7,35),(6,177,5,3.5,17.5),(6,178,264,0.1,26.4),(6,179,7,0.3,2.1),(6,180,4,28,112),(6,181,159,2,318),(6,182,8,2,16),(6,183,3,3.5,10.5),(6,184,3,2.8,8.4),(6,185,2,7.5,15),(6,186,21,0.3,6.3),(6,187,59,0.3,17.7),(6,188,30,1.8,54),(6,189,6,4.5,27),(6,190,6,3.5,21),(6,191,33,0.3,9.9),(6,192,72,0.3,21.6),(6,193,79,0.5,39.5),(6,194,69,0.8,55.2),(6,195,164,0.9,147.6),(6,196,77,0.3,23.1),(6,197,72,1.2,86.4),(6,198,20,0.5,10),(6,199,511,0.2,102.2),(6,200,465,0.2,93),(6,201,20,0.5,10),(6,202,63,0.3,18.9),(6,203,82,0.4,32.8),(6,204,49,0.6,29.4),(6,205,85,0.5,42.5),(6,206,95,0.8,76),(6,207,9,0.6,5.4),(6,208,97,0.3,29.1),(6,209,52,0.2,10.4),(6,210,58,0.5,29),(6,211,7,0.8,5.6),(6,212,98,0.3,29.4),(6,213,100,0.3,30),(6,214,55,0.8,44),(6,215,150,0.4,60),(7,216,57,0.6,34.2),(7,217,62,0.3,18.6),(7,218,87,0.5,43.5),(7,219,64,0.2,12.8),(7,220,388,0.3,116.4),(7,221,54,0.3,16.2),(7,222,9,0.3,2.7),(7,223,57,0.1,5.7),(7,224,66,0.5,33),(7,225,18,39.9,718.2),(7,226,84,1.8,151.2),(7,227,134,4.5,603),(7,228,546,0.3,163.8),(7,229,273,2,546),(7,230,90,1.3,117),(7,231,200,2.5,500),(7,232,12,5.8,69.6),(7,233,58,28,1624),(7,234,82,8.9,729.8),(7,235,39,53,2067),(7,236,20,18,360),(7,237,6,26,156),(7,238,3,69,207),(7,239,5,39.9,199.5),(7,240,4,9.5,38),(7,241,14,58.4,817.6),(7,242,14,22,308),(7,243,150,2.8,420),(7,244,52,3.5,182),(7,245,3,124,372),(7,246,1140,2,2280),(7,247,2844,2.5,7110),(7,248,96,4.4,422.4),(8,249,350,0.8,280),(8,250,144,0.5,72),(8,251,83,0.2,16.6),(8,252,3,2.5,7.5),(8,253,39,1,39),(8,254,30,1,30),(9,255,21,0.9,18.9),(9,256,7,1,7),(9,257,14,1.2,16.8),(9,258,31,1.3,40.3);
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
INSERT INTO `detalleproductos` VALUES (1,27,'','','01/03/2020','2017-01-07 19:37:44'),(2,18,'','','01/10/2017','2017-01-07 19:39:13'),(3,10,'','','01/06/2017','2017-01-07 19:41:55'),(4,21.3,'','','01/08/2017','2017-01-07 19:43:06'),(5,0.5,'','','01/12/2017','2017-01-07 19:45:53'),(6,0.9,'','','','2017-01-07 19:46:46'),(7,2,'','','01/05/2019','2017-01-07 19:47:51'),(8,0.8,'','','','2017-01-07 19:48:47'),(9,1.5,'','','01/04/2019','2017-01-07 19:49:42'),(10,0.8,'','','','2017-01-07 19:50:34'),(11,0.8,'','','','2017-01-07 19:51:33'),(12,0.8,'','','','2017-01-07 19:52:24'),(13,1.8,'','','','2017-01-07 19:53:18'),(14,0.8,'','','','2017-01-07 19:54:03'),(15,7,'','','','2017-01-07 19:55:34'),(16,12.5,'','','','2017-01-07 19:56:13'),(17,17.5,'','','','2017-01-07 19:57:02'),(18,0.8,'','','','2017-01-07 19:57:46'),(19,0.8,'','','','2017-01-07 19:58:31'),(20,17.5,'','','','2017-01-07 19:59:27'),(21,3.5,'','','','2017-01-07 20:00:06'),(22,18,'','','01/10/2017','2017-01-07 20:01:00'),(23,4.4,'','','01/11/2017','2017-01-07 20:02:21'),(24,76.5,'','','01/10/2017','2017-01-07 20:04:10'),(25,33.3,'','','','2017-01-07 20:05:35'),(26,2.2,'','','01/04/2019','2017-01-07 20:08:45'),(27,1.9,'','','01/11/2017','2017-01-07 20:10:23'),(28,13.2,'','','01/10/2017','2017-01-07 20:11:43'),(29,1.3,'','','01/12/2017','2017-01-07 20:12:44'),(30,1.8,'','','01/06/2017','2017-01-07 20:13:37'),(31,70.5,'','','01/05/2017','2017-01-07 20:14:37'),(32,12.5,'','','01/03/2018','2017-01-07 20:16:07'),(33,20,'','','01/07/2017','2017-01-07 20:17:23'),(34,22,'','','01/09/2017','2017-01-07 20:18:14'),(35,14,'','','01/09/2018','2017-01-07 20:19:01'),(36,8,'','','01/04/2018','2017-01-07 20:19:53'),(37,3.5,'','','01/02/2019','2017-01-07 20:20:58'),(38,15,'','','01/04/2019','2017-01-07 20:21:57'),(39,48.8,'','','01/09/2017','2017-01-07 20:23:54'),(40,57.8,'','','01/11/2017','2017-01-07 20:25:23'),(41,38.8,'','','01/12/2017','2017-01-07 20:26:25'),(42,18,'','','01/04/2019','2017-01-07 20:29:08'),(43,23,'','','01/10/2018','2017-01-07 20:30:17'),(44,29.9,'','','01/12/2017','2017-01-07 20:31:27'),(45,5.9,'','','01/07/2019','2017-01-07 20:32:51'),(46,2,'','','01/10/2018','2017-01-07 20:34:22'),(47,5.7,'','','01/09/2017','2017-01-07 20:35:47'),(48,3,'','','01/06/2018','2017-01-07 20:37:03'),(49,0.7,'','','01/04/2017','2017-01-07 20:38:15'),(50,28,'','','01/10/2018','2017-01-07 20:39:22'),(51,4.2,'','','01/04/2017','2017-01-07 20:40:36'),(52,6,'','','01/11/2017','2017-01-07 20:41:58'),(53,1.5,'','','01/02/2017','2017-01-07 20:44:11'),(54,3.5,'','','01/04/2017','2017-01-07 20:45:07'),(55,2.3,'','','01/11/2018','2017-01-07 20:47:53'),(56,41.5,'','','01/05/2020','2017-01-07 20:48:56'),(57,2.7,'','','01/04/2018','2017-01-07 20:50:11'),(58,3.8,'','','01/07/2019','2017-01-07 20:51:09'),(59,5.3,'','','01/03/2019','2017-01-07 20:52:04'),(60,2,'','','01/02/2018','2017-01-07 20:53:00'),(61,1,'','','01/12/2019','2017-01-09 08:27:41'),(62,3.5,'','','01/01/2018','2017-01-09 08:28:53'),(63,30.3,'','','01/09/2017','2017-01-09 08:30:38'),(64,3,'','','01/04/2017','2017-01-09 08:33:12'),(65,1.9,'','','01/07/2017','2017-01-09 08:34:29'),(66,1,'','','01/06/2018','2017-01-09 08:35:24'),(67,13.5,'','','01/01/2019','2017-01-09 08:36:28'),(68,21.5,'','','01/06/2020','2017-01-09 08:37:35'),(69,27.7,'','','01/06/2018','2017-01-09 08:38:42'),(70,24,'','','01/08/2018','2017-01-09 08:40:18'),(71,10.9,'','','01/09/2017','2017-01-09 08:41:17'),(72,1.5,'','','01/08/2017','2017-01-09 08:45:46'),(73,1.9,'','','01/03/2018','2017-01-09 08:47:45'),(74,57.5,'','','01/09/2017','2017-01-09 08:49:06'),(75,14,'','','01/07/2019','2017-01-09 08:50:08'),(76,49.9,'','','01/12/2018','2017-01-09 08:51:06'),(77,17.5,'','','01/08/2018','2017-01-09 08:52:11'),(78,3.9,'','','01/12/2017','2017-01-09 08:53:21'),(79,5.2,'','','01/08/2017','2017-01-09 08:54:23'),(80,7.6,'','','01/03/2018','2017-01-09 08:55:29'),(81,7.8,'','','01/06/2018','2017-01-09 08:56:46'),(82,17,'','','01/04/2017','2017-01-09 08:58:07'),(83,2,'','','01/09/2017','2017-01-09 08:59:02'),(84,4.9,'','','01/10/18','2017-01-09 09:00:46'),(85,1.5,'','','01/01/2020','2017-01-09 09:02:52'),(86,9.5,'','','01/06/2019','2017-01-09 09:04:17'),(87,1,'','','01/04/2018','2017-01-09 09:05:21'),(88,10.8,'','','01/07/2017','2017-01-09 09:06:41'),(89,1.7,'','','01/09/2019','2017-01-09 09:07:38'),(90,11,'','','01/01/2019','2017-01-09 09:08:29'),(91,2,'','','01/04/2019','2017-01-09 09:09:23'),(92,1,'','','01/07/2018','2017-01-09 09:10:30'),(93,2.5,'','','01/10/2018','2017-01-09 09:12:49'),(94,8.7,'','','01/02/2020','2017-01-09 09:13:39'),(95,12,'','','01/10/2018','2017-01-09 09:14:32'),(96,4.4,'','','01/05/2019','2017-01-09 09:15:32'),(97,1.5,'','','','2017-01-09 09:16:13'),(98,1.3,'','','','2017-01-09 09:16:43'),(99,1.5,'','','01/11/2019','2017-01-09 09:17:31'),(100,1.5,'','','01/04/2019','2017-01-09 09:18:21'),(101,1.2,'','','','2017-01-09 09:18:58'),(102,2.9,'','','','2017-01-09 09:19:36'),(103,7.4,'','','01/07/2017','2017-01-09 09:20:37'),(104,1,'','','01/05/2019','2017-01-09 09:21:43'),(105,1,'','','01/05/2018','2017-01-09 09:23:01'),(106,2.5,'','','01/04/2018','2017-01-09 09:24:18'),(107,1.5,'','','01/01/2019','2017-01-09 09:26:39'),(108,4.3,'','','01/05/2018','2017-01-09 09:27:51'),(109,63,'','','01/05/2017','2017-01-09 09:29:49'),(110,34,'','','01/01/2020','2017-01-09 09:30:55'),(111,23.8,'','','01/09/2019','2017-01-09 09:31:44'),(112,5.8,'','','01/04/2017','2017-01-09 09:32:42'),(113,2.8,'','','01/09/2018','2017-01-09 09:33:25'),(114,15.5,'','','01/09/2018','2017-01-09 09:34:19'),(115,1.5,'','','01/05/2018','2017-01-09 09:35:49'),(116,5.8,'','','01/03/2017','2017-01-09 09:36:55'),(117,14.7,'','','01/04/2017','2017-01-09 09:38:06'),(118,3.2,'','','01/09/2018','2017-01-09 09:38:51'),(119,1.5,'','','01/04/2019','2017-01-09 09:41:12'),(120,2.8,'','','01/08/2018','2017-01-09 09:42:00'),(121,10,'','','01/03/2017','2017-01-09 09:43:06'),(122,11.5,'','','01/07/2019','2017-01-09 09:44:45'),(123,0.3,'','','01/03/2017','2017-01-09 09:45:27'),(124,0.9,'','','01/04/2019','2017-01-09 09:47:31'),(125,44,'','','01/09/2018','2017-01-09 09:48:43'),(126,44,'','','01/03/2019','2017-01-09 09:50:00'),(127,2.6,'','','01/11/2017','2017-01-09 09:51:14'),(128,2,'','','01/02/2017','2017-01-09 09:52:31'),(129,2.6,'','','01/09/2018','2017-01-09 10:01:23'),(130,4.6,'','','01/05/2020','2017-01-09 10:02:27'),(131,24,'','','01/01/2018','2017-01-09 10:03:20'),(132,25,'','','01/03/2018','2017-01-09 10:05:33'),(133,18,'','','01/07/2017','2017-01-09 10:18:15'),(134,2,'','','01/07/2019','2017-01-09 10:19:12'),(135,31.9,'','','01/02/2018','2017-01-09 10:20:38'),(136,1.1,'','','01/09/2017','2017-01-09 10:22:33'),(137,5.4,'','','01/04/2017','2017-01-09 10:23:10'),(138,6.5,'','','01/05/2019','2017-01-09 10:24:01'),(139,6,'','','01/01/2019','2017-01-09 10:25:17'),(140,3.9,'','','01/03/2018','2017-01-09 10:26:20'),(141,4.9,'','','01/12/2017','2017-01-09 10:27:21'),(142,4.5,'','','01/07/2018','2017-01-09 10:34:43'),(143,26,'','','01/03/2019','2017-01-09 10:36:13'),(144,14,'','','01/03/2019','2017-01-09 10:37:09'),(145,23.5,'','','01/09/2019','2017-01-09 10:41:19'),(146,31.5,'','','01/07/2018','2017-01-09 10:42:09'),(147,6,'','','01/07/2018','2017-01-09 10:42:43'),(148,3.2,'','','01/04/2019','2017-01-09 10:43:39'),(149,2.5,'','','01/07/2017','2017-01-09 10:44:24'),(150,0.6,'','','01/07/2018','2017-01-09 10:45:34'),(151,0.8,'','','01/02/2018','2017-01-09 10:47:44'),(152,1.2,'','','01/03/2017','2017-01-09 10:49:29'),(153,1.5,'','','01/06/2018','2017-01-09 10:51:42'),(154,1.5,'','','01/12/2018','2017-01-09 10:52:46'),(155,1.5,'','','01/07/2017','2017-01-09 10:54:35'),(156,1.6,'','','','2017-01-09 10:55:11'),(157,0.9,'','','01/04/2017','2017-01-09 10:55:57'),(158,3,'','','01/02/2018','2017-01-09 10:56:51'),(159,0.8,'','','01/06/2018','2017-01-09 11:00:34'),(160,2,'','','01/04/2019','2017-01-09 11:03:11'),(161,1,'','','01/07/2017','2017-01-09 11:03:49'),(162,1.2,'','','01/09/2019','2017-01-09 11:04:39'),(163,0.5,'','','01/07/2018','2017-01-09 11:06:16'),(164,19,'','','01/02/2018','2017-01-09 11:16:39'),(165,20.3,'','','01/01/2018','2017-01-09 11:17:28'),(166,47.7,'','','01/01/2018','2017-01-09 11:18:40'),(167,6,'','','01/12/2017','2017-01-09 11:20:07'),(168,4.5,'','','01/06/2019','2017-01-09 11:21:15'),(169,4.4,'','','01/08/2017','2017-01-09 11:22:15'),(170,3.5,'','','01/05/2017','2017-01-09 11:23:26'),(171,9.5,'','','01/06/2019','2017-01-09 11:24:04'),(172,4.6,'','','01/11/2018','2017-01-09 11:25:02'),(173,4.5,'','','01/09/2020','2017-01-09 11:26:05'),(174,18,'','','01/06/2018','2017-01-09 11:26:43'),(175,5,'','','01/12/2019','2017-01-09 11:27:31'),(176,7,'','','01/08/2019','2017-01-09 11:28:23'),(177,3.5,'','','01/08/2017','2017-01-09 11:29:57'),(178,0.1,'','','01/06/2019','2017-01-09 11:31:24'),(179,0.3,'','','01/03/2019','2017-01-09 11:32:04'),(180,28,'','','01/11/2017','2017-01-09 11:32:58'),(181,2,'','','03/02/2019','2017-01-09 11:34:03'),(182,2,'','','','2017-01-09 11:35:48'),(183,3.5,'','','01/09/2018','2017-01-09 11:36:58'),(184,2.8,'','','01/03/2017','2017-01-09 11:37:06'),(185,7.5,'','','01/02/2019','2017-01-09 11:40:24'),(186,0.3,'','','','2017-01-09 11:40:47'),(187,0.3,'','','01/03/2020','2017-01-09 11:44:32'),(188,1.8,'','','01/05/2019','2017-01-09 11:45:22'),(189,4.5,'','','01/08/2019','2017-01-09 11:46:38'),(190,3.5,'','','01/05/2019','2017-01-09 11:47:30'),(191,0.3,'','','01/06/2018','2017-01-09 11:48:23'),(192,0.3,'','','01/03/2019','2017-01-09 11:49:10'),(193,0.5,'','','01/12/2017','2017-01-09 11:50:24'),(194,0.8,'','','01/07/2017','2017-01-09 11:51:15'),(195,0.9,'','','01/08/2017','2017-01-09 11:53:18'),(196,0.3,'','','01/10/2017','2017-01-09 11:54:33'),(197,1.2,'','','01/06/2018','2017-01-09 11:55:32'),(198,0.5,'','','01/10/2018','2017-01-09 11:57:34'),(199,0.2,'','','01/08/2019','2017-01-09 11:58:22'),(200,0.2,'','','01/07/2018','2017-01-09 12:01:24'),(201,0.5,'','','01/09/2019','2017-01-09 12:02:42'),(202,0.3,'','','01/03/2018','2017-01-09 12:03:25'),(203,0.4,'','','01/07/2019','2017-01-09 12:04:27'),(204,0.6,'','','01/06/2017','2017-01-09 12:05:41'),(205,0.5,'','','01/05/2019','2017-01-09 12:06:23'),(206,0.8,'','','','2017-01-09 12:07:38'),(207,0.6,'','','01/02/2018','2017-01-09 12:08:23'),(208,0.3,'','','01/09/2017','2017-01-09 12:09:02'),(209,0.2,'','','01/08/2017','2017-01-09 12:10:46'),(210,0.5,'','','01/02/2019','2017-01-09 12:11:29'),(211,0.8,'','','01/11/2018','2017-01-09 12:12:10'),(212,0.3,'','','01/07/2018','2017-01-09 12:14:19'),(213,0.3,'','','01/12/2018','2017-01-09 12:15:19'),(214,0.8,'','','01/01/2018','2017-01-09 12:24:54'),(215,0.4,'','','01/04/2017','2017-01-09 12:26:05'),(216,0.6,'','','01/09/2017','2017-01-09 12:27:23'),(217,0.3,'','','01/12/2017','2017-01-09 12:28:31'),(218,0.5,'','','01/05/2019','2017-01-09 12:30:35'),(219,0.2,'','','01/03/2018','2017-01-09 12:31:16'),(220,0.3,'','','01/04/2019','2017-01-09 12:33:01'),(221,0.3,'','','01/03/2019','2017-01-09 12:48:26'),(222,0.3,'','','01/07/2017','2017-01-09 12:49:06'),(223,0.1,'','','01/03/2019','2017-01-09 12:49:52'),(224,0.5,'','','01/07/2018','2017-01-09 12:50:50'),(225,39.9,'','','01/04/2018','2017-01-09 12:51:45'),(226,1.8,'','','01/07/2019','2017-01-09 12:52:49'),(227,4.5,'','','01/12/2017','2017-01-09 12:53:49'),(228,0.3,'','','01/08/2019','2017-01-09 12:55:35'),(229,2,'','','01/04/2018','2017-01-09 12:57:11'),(230,1.3,'','','01/11/2017','2017-01-09 12:58:56'),(231,2.5,'','','','2017-01-09 13:01:56'),(232,5.8,'','','','2017-01-09 13:04:48'),(233,28,'','','','2017-01-09 13:05:41'),(234,8.9,'','','01/06/2019','2017-01-09 13:06:29'),(235,53,'','','','2017-01-09 13:06:58'),(236,18,'','','','2017-01-09 13:07:29'),(237,26,'','','','2017-01-09 13:08:05'),(238,69,'','','','2017-01-09 13:08:45'),(239,39.9,'','','','2017-01-09 13:09:22'),(240,9.5,'','','','2017-01-09 13:09:59'),(241,58.4,'','','','2017-01-09 13:10:30'),(242,22,'','','','2017-01-09 13:11:03'),(243,2.8,'','','','2017-01-09 13:42:04'),(244,3.5,'','','','2017-01-09 13:43:28'),(245,124,'','','','2017-01-09 13:44:41'),(246,2,'','','01/07/2017','2017-01-09 13:45:37'),(247,2.5,'','','','2017-01-09 13:46:56'),(248,4.4,'','','','2017-01-09 13:59:12'),(249,0.8,'','','','2017-01-09 14:07:22'),(250,0.5,'','','','2017-01-09 14:09:03'),(251,0.2,'','','','2017-01-09 14:10:37'),(252,2.5,'','','','2017-01-09 14:11:34'),(253,1,'','','','2017-01-09 14:12:36'),(254,2.7,'','','','2017-01-09 14:14:28'),(255,0.9,'','','','2017-01-09 14:15:42'),(256,1,'','','','2017-01-09 14:21:51'),(257,1.2,'','','','2017-01-09 14:22:18'),(258,1.3,'','','','2017-01-09 14:22:51');
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
INSERT INTO `detalleventas` VALUES (1,59,10,5.3,5.3),(2,64,10,3,30),(3,128,2,2,4),(4,89,1,1.7,1.7),(5,61,20,1,20),(6,120,5,2.8,14),(7,124,2,0.9,1.8),(8,61,24,1,24),(8,58,10,3.8,38),(8,26,7,2.2,15.4),(8,120,3,2.8,8.4),(9,188,28,1.8,50.4),(9,38,1,15,15),(9,105,1,1,1),(9,104,1,1,1),(10,111,1,23.8,23.8),(10,142,3,4.5,13.5),(11,118,16,3.2,51.2),(11,58,40,3.8,152),(11,26,20,2.2,44),(11,181,15,2,30),(12,38,4,15,60),(12,105,4,1,4),(12,104,4,1,4),(12,143,1,26,26),(12,234,12,8.9,106.8),(12,199,15,0.2,3),(13,246,18,2,36),(13,45,14,5.9,82.6),(13,72,30,1.5,45),(13,199,20,0.2,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'hirudoid forte 0.445% 14gr','',7,'10',32,2,354),(2,'aerox plus gotas 15ml','',1,'10',32,2,354),(3,'aseptil rojo 5%','',6,'10',14,2,354),(4,'evacuol pediatrico 65ml','',3,'10',13,2,354),(5,'supositori de glicerina adultos 2.37g','',29,'10',32,2,354),(6,'concha de nacar sachet','',13,'10',15,2,354),(7,'bahia solar bloqueador sachet 90%','',13,'10',15,2,354),(8,'ponds clarant b3 sachet 12.5g','',10,'10',15,2,354),(9,'bahia solar bloqueador sachet 45%','',18,'10',15,2,354),(10,'ponds c sachet 10g','',49,'10',15,2,354),(11,'ponds clarant b3 piel normal a grasa sachet 10gr','',22,'10',15,2,354),(12,'ponds s humectante sachet 10g','',14,'10',15,2,354),(13,'dermasol bebe s-50','',12,'10',15,2,354),(14,'ponds rejuveness contra arrugas sachet 10g','',43,'10',15,2,354),(15,'desodorante axe varios 90ml (58g)','',4,'10',33,2,354),(16,'desodorante rexona varios 175ml (105g)','',2,'10',33,2,354),(17,'intima gel hipoalergenico 300ml','',1,'10',5,2,354),(18,'desodorante lady speed stick sachet 10g','',13,'10',5,2,354),(19,'desodorante speed stick 24/7 sachet 12g','',13,'10',5,2,354),(20,'dermosol spf caja 70%','',5,'10',15,2,354),(21,'rasuradora schick aloe Xtreme 3','',21,'10',33,2,354),(22,'betasporina intravenosa 1g','',2,'10',20,2,131),(23,'amizal 45mg','',122,'10',32,2,131),(24,'clavoxilin plus 400 suspencion 100ml','',4,'10',32,2,131),(25,'aneurin 25000 ampolla 3ml','',6,'10',20,2,354),(26,'Aneurin Forte grageas','',396,'10',32,2,354),(27,'helopanzym nf enzimatico digestivo 100mg/ 40ml/ 10ml','',159,'10',32,2,354),(28,'clotil compuesto 20g','',3,'10',15,2,354),(29,'ponstan 220mg','',68,'10',32,2,354),(30,'stresam 50mg','',9,'10',32,2,354),(31,'flucomix fluticasona propionato 50mcg','',6,'10',32,2,162),(32,'microgynon levonogestrel x caja x21 grageas','',4,'10',12,2,354),(33,'depo-provera medroxiprogesterona 150mg/ml','',1,'10',20,2,354),(34,'postinor 2 levonogestrel 0.75mg','',3,'10',12,2,354),(35,'norifam ampolla 1ml','',5,'10',12,2,354),(36,'d-sigyem 1 levonorgestrel 1.5mg','',47,'10',12,2,354),(37,'sildecin silddenafilo 100mg','',1,'10',32,2,354),(38,'betasporina intramuscular 1g','',38,'10',32,2,354),(39,'xylisol cloruro de sodio spray nasal 25ml','',10,'10',32,2,354),(40,'budesonida aerosol para inhalacion 200mcg','',5,'10',6,2,354),(41,'rinokid clorudo de sodio 3% 25ml','',31,'10',32,2,354),(42,'cefalogen ceftriaxona 1g','',57,'10',20,2,354),(43,'transamin acido tranexamico intravenoso 10% 250mg','',10,'10',20,2,354),(44,'sucragant sucralfato 200ml','',2,'10',32,2,354),(45,'transamin acido tranexamio capsula 250mg','',37,'10',10,2,105),(46,'mucocar acetilcisteina 200mg','',274,'10',32,2,105),(47,'esoproton esomeprazol 40mg','',56,'10',10,2,355),(48,'gaspan pantoprazol 40mg','',134,'10',10,2,354),(49,'toban loperamida antidiarreico 2mg','',23,'10',10,2,354),(50,'clenbuvent expectorante jarabe 120ml','',14,'10',11,2,354),(51,'fluidasa acetilcisteina sobre 600mg','',39,'10',32,2,354),(52,'candiderm cream esteroide antibiotico antimicotico 15g','',95,'10',32,2,354),(53,'mumfer fierro pollimaltosa + acido folico 100mg','',90,'10',32,2,354),(54,'trilat tramadol clorhidrato paracetamol 325mg','',4,'10',10,2,354),(55,'cinageron cinarizina dihidroergocristina compuesto','',53,'10',10,2,354),(56,'megacilina forte 1 ampolla','',4,'10',20,2,354),(57,'gamalate compuesto b6','',14,'10',3,2,354),(58,'microser betahistina dihidrocloruro 16mg','',1639,'10',10,2,354),(59,'microser betahistina 24mg','',205,'10',10,2,354),(60,'microser betahistina 8mg','',99,'10',10,2,354),(61,'paldolor extra forte 550mg','',8123,'10',28,2,354),(62,'isorbide dinitrato de isosorbida 10mg','',36,'10',32,2,354),(63,'fluixx acetilcisteina 120ml','',3,'10',11,2,354),(64,'Fluixx Acetilcisteina Granulado Sobre 2g','',136,'10',14,2,354),(65,'pyridium complex norfloxacino 400mg','',37,'10',32,2,354),(66,'corifan clorfenamina malfeato 4mg','',7,'10',32,2,354),(67,'doloral ibuprofeno 100mg/5ml','',9,'10',32,2,354),(68,'corifan clorfenamina jarabe 120ml','',6,'10',11,2,354),(69,'mucovit multivitaminico jarabe 110ml','',4,'10',3,2,354),(70,'mucovit crema  30g','',9,'10',15,2,354),(71,'tropicrem antiinflamtorio crema 10g','',4,'10',15,2,354),(72,'mucovit nf capsula compuesto','',417,'10',43,2,354),(73,'geromucovit nf compuesto','',73,'10',43,2,354),(74,'cimafix cefixima 100mg/5ml','',9,'10',17,2,354),(75,'merthiolete plus incoloro 0.13% 60ml','',8,'10',6,2,354),(76,'azimut azitromicina 200mg/5ml','',6,'10',32,2,354),(77,'banes forte 60ml','',9,'10',22,2,354),(78,'azimut azitromicina 500mg','',101,'10',32,2,354),(79,'levonelle levofloxacino 500mg','',1,'10',32,2,354),(80,'unathen sultamicilina 375mg','',87,'10',32,2,354),(81,'cefaloximecefuroxima 500mg','',116,'10',32,2,354),(82,'rhino-dazol clorhidrato nafazolina 15ml','',2,'10',32,2,354),(83,'clindacin clindamicina 300mg','',53,'10',32,2,354),(84,'zitrozin azitromicina 500mg','',4,'10',6,2,354),(85,'hepavit b complex compuesto','',64,'10',43,2,354),(86,'framidex nd framicetina dexametasona 2.5ml','',8,'10',32,2,354),(87,'neoenzimax nf antiflatulento compuesto','',54,'10',43,2,354),(88,'ismigen lisado bacteriano Liofilizado','',109,'10',32,2,354),(89,'miofedrol relax Plus','',11,'10',6,2,354),(90,'colirio eyemo 0.05%','',2,'10',6,2,354),(91,'hepabionta gragea','',81,'10',32,2,354),(92,'miodrol orfenadrina citrato 100mg','',12,'10',37,2,354),(93,'duo cvp-k compuesto','',26,'10',32,2,354),(94,'zentel albendazol 400mg','',50,'10',32,2,354),(95,'zentel albendazol 400mg/10ml','',50,'10',32,2,354),(96,'floratil saccharomyces boulardi cncm 250mg','',50,'10',17,2,354),(97,'tintura arnica 30ml','',6,'10',6,2,354),(98,'agua oxigenada 12ml','',6,'10',6,2,354),(99,'aceite lagarto 30ml','',9,'10',6,2,354),(100,'agua de azahar 120ml','',7,'10',6,2,354),(101,'agua de florida 22ml','',10,'10',6,2,354),(102,'agua de florviva 100ml','',1,'10',6,2,354),(103,'promalgen-n 1.5g/3ml','',24,'10',20,2,354),(104,'clorfenamina subcutaneo 10mg/1ml','',229,'10',20,2,354),(105,'dexametasona 4mg/2ml','',261,'10',20,2,354),(106,'dimenhidrinato 50mg/5ml','',117,'10',20,2,354),(107,'lincomicina 600mg/2ml','',50,'10',20,2,354),(108,'amoxidin cl 1000','',338,'10',37,2,354),(109,'amoxidin cl 400/57 70ml','',8,'10',17,2,354),(110,'isodine yodo polividiona 100% 60ml','',14,'10',32,2,354),(111,'rynat d descongestionante 15ml','',25,'10',28,2,354),(112,'medicort ampolla 2ml','',31,'10',20,2,354),(113,'lincoplus lincomicina 500mg','',320,'10',32,2,354),(114,'lincoplus lincomicina ampolla 2ml','',30,'10',20,2,354),(115,'espasmodel compuesto','',48,'10',6,2,354),(116,'levopharm lexofloxacino 750mg','',5,'10',37,2,354),(117,'ponaris levofloxacino 750mg','',26,'10',32,2,354),(118,'urzac flex compuesto','',260,'10',32,2,354),(119,'Umquan Comprimido','',45,'10',32,2,354),(120,'meloxx 15mg','',210,'10',32,2,354),(121,'repriman metamizol sodico 10ml','',9,'10',32,2,354),(122,'repriman metamizol sodico 50ml','',14,'10',32,2,354),(123,'repriman metamizol sodico 500mg','',5,'10',32,2,354),(124,'Bactrim Sulfametoxazol + Trimetoprima 400/800mg','',30,'10',32,2,354),(125,'colufase nitazoxanida 600ml','',4,'10',11,2,354),(126,'colufase nitazoxanida caja x6 und 500mg','',7,'10',37,2,354),(127,'cheltin folic 150mg','',14,'10',36,2,354),(128,'migradorixina compuesto','',49,'10',43,2,354),(129,'tanakan 40 comprimido','',140,'10',43,2,354),(130,'tanakan Forte','',73,'10',43,2,354),(131,'brosol compuesto 120ml','',1,'10',14,2,354),(132,'germiderm crema dermica 15g','',7,'10',15,2,354),(133,'dolo liviolex forte diclofenaco 2% 50g','',4,'10',15,2,354),(134,'immuvit plus Q10','',64,'10',32,2,354),(135,'benzetacil i.m. l-a','',66,'10',17,2,354),(136,'dolo liviolex Forte','',12,'10',22,2,354),(137,'Amoxiclin Cl 12h','',3,'10',32,2,354),(138,'notizol crema 10g','',6,'10',15,2,354),(139,'furoxinol cefuroxima 500mg','',7,'10',37,2,354),(140,'kastmar montelukast 4mg','',106,'10',37,2,354),(141,'kastmar montelukast 10mg','',315,'10',37,2,354),(142,'kastmar montelukast 5mg','',81,'10',37,2,354),(143,'ciproval optico 5ml','',31,'10',25,2,354),(144,'opticum 5ml','',39,'10',25,2,354),(145,'cortiprex prednisona 5mg/5ml','',8,'10',32,2,354),(146,'rapiler levocetirizina diclorhidrato 2.5mg/5ml','',8,'10',32,2,354),(147,'Clavinex Duo','',43,'10',32,2,354),(148,'rapiler levocetirizina 5mg','',105,'10',32,2,354),(149,'dexacort dexametasona 4mg','',39,'10',32,2,354),(150,'amigdazol nf','',102,'10',22,2,354),(151,'biomagnes polvo 2g','',55,'10',17,2,354),(152,'doloflam ibuprofeno 400mg','',28,'10',22,2,354),(153,'chao antigripal compuesto','',52,'10',28,2,354),(154,'kitadol migraña compuesto','',10,'10',28,2,354),(155,'nastiflu sobre','',26,'10',28,2,354),(156,'panadol pastilla','',6,'10',28,2,354),(157,'nastizol compositum junior','',76,'10',28,2,162),(158,'vitapyrena furte sobre 5g','',30,'10',28,2,354),(159,'andrews sobre 7.9g','',9,'10',41,2,354),(160,'tapsin noche sobre 5g','',27,'10',28,2,354),(161,'Migralivia Tableta','',94,'10',28,2,354),(162,'bismutol subsalicilato de bismuto 262mg','',25,'10',10,2,354),(163,'sal de andrews sobre 5g','',56,'10',41,2,354),(164,'gingisona l nf 30ml','',2,'10',11,2,354),(165,'otozambon gotas 10ml','',8,'10',25,2,354),(166,'rinofluimucil acetilcisteina 10ml','',4,'10',40,2,354),(167,'fluimucil acetilcisteina ampolla 3ml','',34,'10',20,2,354),(168,'amoxicilina antibacteriano 250mg','',7,'10',38,1,354),(169,'fluimucil oral acetilcisteina 600mg','',42,'10',32,2,354),(170,'ambroxol pediatrico mucolitico 120ml','',2,'10',11,1,354),(171,'azitromicina antibacteriano 15ml','',3,'10',32,1,354),(172,'cetrizina jarabe 60ml','',8,'10',11,1,354),(173,'clorfenamina meleato antihistaminico 60ml','',7,'10',32,1,354),(174,'amoxicilina acido clavulanico 60ml','',3,'10',32,1,354),(175,'ibuprofeno genfar 120ml','',6,'10',11,2,354),(176,'tylex kids paracetamol 60ml','',5,'10',11,2,354),(177,'salbutamol genfar 170ml','',5,'10',11,2,354),(178,'complejo b capsula','',264,'10',10,2,354),(179,'dimenhidrinato 50mg','',7,'10',10,2,354),(180,'nastizol 60ml','',4,'10',11,2,162),(181,'neuryl clonazepam 0.5','',144,'10',36,2,354),(182,'anzatax Clonazepam','',8,'10',37,2,354),(183,'clotrimazol 1% Tubo 20g','',3,'10',15,2,354),(184,'dolantag compuesto','',3,'10',36,2,354),(185,'aciclovir crema 5%','',2,'10',21,2,354),(186,'aciclovir capsula','',21,'10',10,1,354),(187,'albendazol 200mg','',59,'10',37,2,354),(188,'amoxicilina + acido clavulanico 500mg + 125mg','',2,'10',37,2,354),(189,'diclofenaco 1% gel 50g','',6,'10',18,2,354),(190,'betametazona 0.005% corticosteriode tubo 20g','',6,'10',15,2,354),(191,'amoxicilina 500mg','',33,'10',10,1,354),(192,'ampicilina amtibiotico amplio esprectro 500mg','',72,'10',10,1,354),(193,'celecoxib 200mg','',79,'10',22,2,354),(194,'cefalexina 500mg','',69,'10',10,2,354),(195,'colchicina 0.5mg','',164,'10',37,1,41),(196,'cloranfenicol 500mg','',77,'10',37,1,354),(197,'claritromicina 500mg','',72,'10',37,1,354),(198,'dicloxacilina 500mg','',20,'10',37,1,354),(199,'cetirizina 10mg','',476,'10',37,1,354),(200,'clorfenamina maleato antihistaminico 4mg','',465,'10',37,1,354),(201,'diclofenaco 50mg','',20,'10',37,1,354),(202,'dexametasona 1mg','',63,'10',37,1,354),(203,'dexametasona 4mg','',82,'10',37,1,354),(204,'eritromicina estearato 500mg','',49,'10',37,1,354),(205,'doxiciclina 100mg','',85,'10',37,1,354),(206,'fluconazol 150mg','',95,'10',37,1,354),(207,'glibenclamida 5mg','',9,'10',37,1,354),(208,'enalapril 20mg','',97,'10',37,1,354),(209,'ibuprofeno 400mg','',52,'10',37,1,354),(210,'losartan 50mg','',58,'10',37,1,354),(211,'licomicina 500mg','',7,'10',37,1,354),(212,'loratadina 10mg','',98,'10',37,1,354),(213,'ketorolaco 10mg','',100,'10',37,1,354),(214,'metronidazol 500mg','',55,'10',37,1,354),(215,'nimodipino 30mg','',150,'10',37,1,354),(216,'melformina 850mg','',57,'10',37,1,354),(217,'predinsona 20mg','',62,'10',37,1,354),(218,'meloxicam 15mg','',87,'10',37,1,354),(219,'paracetamol 500mg','',64,'10',37,1,354),(220,'omeprazol 20mg','',388,'10',37,1,354),(221,'naproxeno sodigo 550mg','',54,'10',37,1,354),(222,'ranitidina 300mg','',9,'10',37,1,354),(223,'captopril 25mg','',57,'10',37,1,354),(224,'sulfametoxazol + trimetoprima 160mg','',66,'10',37,1,354),(225,'ciproval oftalmico 0.3% 5ml','',18,'10',25,2,354),(226,'aciclav 500mg+ 125mg','',84,'10',37,1,354),(227,'deflazacort 30mg','',134,'10',37,2,354),(228,'ciprofloxacino 500mg','',546,'10',37,1,354),(229,'levofloxacino 500mg','',273,'10',37,2,354),(230,'azitromicina 500mg','',90,'10',37,1,354),(231,'tramado 50ml','',200,'10',37,1,354),(232,'dexacort 4ml/Ml','',12,'10',20,2,354),(233,'Hesper vit gotas','',58,'10',25,2,354),(234,'cimafix 400mg','',70,'10',10,2,354),(235,'momate spray','',39,'10',40,2,354),(236,'ab ambromox ampolla 1200mg','',20,'10',20,2,354),(237,'aci basic 800mg/60ml/10ml','',6,'10',32,2,354),(238,'trinaler suspencion 200mg/5ml','',3,'10',38,2,354),(239,'plasyodine Solucion','',5,'10',14,2,354),(240,'rhino Bb 0.9%','',4,'10',32,2,354),(241,'foroxinol 250mg/5ml','',14,'10',11,2,354),(242,'acepot ampolla 1ml','',14,'10',20,2,354),(243,'metagesic 325mg/37.5mg','',150,'10',10,2,354),(244,'glemont 10mg','',52,'10',10,2,354),(245,'flutivent 125/25 mcg','',3,'10',32,2,354),(246,'hesper-c capsula','',1122,'10',32,2,354),(247,'zinasen 10mg','',2844,'10',10,3,354),(248,'amizal 45mg','',96,'10',10,3,354),(249,'jeringa 10ml','',350,'10',24,1,354),(250,'jeringa 5ml','',144,'10',24,1,354),(251,'aguja #18','',83,'10',24,1,354),(252,'plenitud adulto pañal t/m','',3,'10',33,1,354),(253,'pampers pañal t/g x1 und','',39,'10',33,1,354),(254,'pamper pañal T/P-M X2 Und','',30,'10',33,1,354),(255,'huggies pañal active sec t/m','',21,'10',33,2,354),(256,'huggies pañal active sec t/g','',7,'10',33,2,354),(257,'huggies pañal active sec t/xg','',14,'10',33,2,354),(258,'huggies pañal active sec t/xxg','',31,'10',33,2,354);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedadproducto`
--

LOCK TABLES `propiedadproducto` WRITE;
/*!40000 ALTER TABLE `propiedadproducto` DISABLE KEYS */;
INSERT INTO `propiedadproducto` VALUES (1,'Genérico'),(2,'Comercial'),(3,'Muestra médica'),(4,'Servicio');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2017-01-09 08:25:59',4.49,0.81,5.3,1,0,'-'),(2,'2017-01-09 10:07:33',25.42,4.58,30,1,30,'Sin vuelto'),(3,'2017-01-09 10:13:44',3.39,0.61,4,1,0,'-'),(4,'2017-01-09 10:14:07',1.44,0.26,1.7,1,0,'-'),(5,'2017-01-09 10:17:03',16.95,3.05,20,1,0,'-'),(6,'2017-01-09 10:36:45',11.86,2.14,14,1,0,'-'),(7,'2017-01-09 10:59:29',1.53,0.27,1.8,1,0,'-'),(8,'2017-01-09 12:19:50',72.71,13.09,85.8,1,0,'-'),(9,'2017-01-09 12:36:11',57.12,10.28,67.4,1,0,'-'),(10,'2017-01-09 13:13:54',31.61,5.69,37.3,1,0,'-'),(11,'2017-01-09 13:25:33',234.92,42.28,277.2,1,0,'-'),(12,'2017-01-09 13:29:08',172.71,31.09,203.8,1,0,'-'),(13,'2017-01-09 13:53:20',142.03,25.57,167.6,1,0,'-');
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
SELECT idCategoriaProducto, Lower(catprodDescipcion) as catprodDescipcion FROM categoriaproducto
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
SELECT idLaboratorio, lower(labNombre) as labNombre
 FROM laboratorio
 order by labNombre asc;
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
/*!50003 DROP PROCEDURE IF EXISTS `listarTodoVentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listarTodoVentas`(in anio int, in mes int)
BEGIN
SELECT 
concat('VEN-',right(concat('0000',ve.idVenta), 5)) as idVenta,
ve.idVenta as idSimple,
ventFecha ,
returnNombreUsuario(idUsuario) as Usuario,
round(sum(ventTotal),2) as total FROM ventas ve
inner join detalleventas det on ve.idventa=det.idventa
where /*idTipoComprobante =41 and compTitulo='Inventario'and*/
year(ventFecha) =anio and month(ventFecha)=mes
group by idventa
order by ventFecha desc;
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
/*!50003 DROP PROCEDURE IF EXISTS `retornarAñosVentas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retornarAñosVentas`()
BEGIN
SELECT distinct  year(ventFecha) as ano FROM ventas
order by ventFecha desc;
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

-- Dump completed on 2017-01-09 14:57:23
