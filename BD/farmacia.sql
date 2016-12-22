CREATE DATABASE  IF NOT EXISTS `farmacia` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `farmacia`;
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
-- Dumping data for table `categoriaproducto`
--

LOCK TABLES `categoriaproducto` WRITE;
/*!40000 ALTER TABLE `categoriaproducto` DISABLE KEYS */;
INSERT INTO `categoriaproducto` VALUES (1,'Cosmética y belleza'),(2,'Nutrición'),(3,'Vitaminas'),(4,'Suplementos'),(5,'Higiene corporal'),(6,'Botiquín'),(7,'Complementos'),(8,'Regalos'),(9,'Perfumería'),(10,'Pastillas'),(11,'Jarabes'),(12,'Anticonceptivos'),(13,'Enemas'),(14,'Soluciones'),(15,'Cremas'),(16,'Jabones'),(17,'Polvos'),(18,'Gels'),(19,'Supositorios'),(20,'Inyectables'),(21,'Ungüentos'),(22,'Analgésicos'),(23,'Sueros'),(24,'Instrumentos quirúrgicos'),(25,'Gotas'),(26,'Cápsulas'),(27,'Antibióticos'),(28,'Antigripales'),(29,'Antisépticos'),(30,'Laxantes'),(31,'Mucolíticos'),(32,'Otros');
/*!40000 ALTER TABLE `categoriaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'2016-12-21 15:21:29',0,0,0,41,1,1),(2,'2016-12-21 17:14:16',0,0,0,41,1,1),(3,'2016-12-21 17:16:24',0,0,0,41,1,1),(4,'2016-12-21 17:27:22',0,0,0,41,1,1),(5,'2016-12-21 17:30:24',0,0,0,41,1,1),(6,'2016-12-21 17:32:56',0,0,0,41,1,1),(7,'2016-12-21 17:33:23',0,0,0,41,1,1),(8,'2016-12-21 17:34:16',0,0,0,41,1,1),(9,'2016-12-21 17:34:48',0,0,0,41,1,1),(10,'2016-12-21 17:36:38',0,0,0,41,1,1),(11,'2016-12-21 17:46:31',0,0,0,41,1,1),(12,'2016-12-21 19:12:56',0,0,0,41,1,1),(13,'2016-12-21 19:15:28',0,0,0,41,1,1),(14,'2016-12-21 20:13:47',0,0,0,41,1,1),(15,'2016-12-21 20:16:35',0,0,0,41,1,1),(16,'2016-12-21 20:19:49',0,0,0,41,1,1),(17,'2016-12-21 20:24:18',0,0,0,41,1,1),(18,'2016-12-21 20:25:47',0,0,0,41,1,1),(19,'2016-12-21 20:33:13',0,0,0,41,1,1),(20,'2016-12-21 20:34:31',0,0,0,41,1,1),(21,'2016-12-21 20:35:20',0,0,0,41,1,1),(22,'2016-12-21 20:36:58',0,0,0,41,1,1),(23,'2016-12-21 20:41:00',0,0,0,41,1,1),(24,'2016-12-21 20:43:37',0,0,0,41,1,1),(25,'2016-12-21 20:46:05',0,0,0,41,1,1),(26,'2016-12-21 20:46:48',0,0,0,41,1,1),(27,'2016-12-21 20:47:45',0,0,0,41,1,1),(28,'2016-12-21 20:47:58',0,0,0,41,1,1),(29,'2016-12-21 20:50:08',0,0,0,41,1,1),(30,'2016-12-21 20:55:17',0,0,0,41,1,1),(31,'2016-12-21 20:55:52',0,0,0,41,1,1),(32,'2016-12-21 20:57:24',0,0,0,41,1,1),(33,'2016-12-21 20:57:53',0,0,0,41,1,1),(34,'2016-12-21 20:59:34',0,0,0,41,1,1);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detallecompra`
--

LOCK TABLES `detallecompra` WRITE;
/*!40000 ALTER TABLE `detallecompra` DISABLE KEYS */;
INSERT INTO `detallecompra` VALUES (1,1,21,10,210),(2,2,4,2,8),(3,3,1,4,4),(3,4,6,20,120),(3,5,6,9,54),(4,6,4,65,260),(12,7,21,21,441),(1,1,12,12,144),(14,2,56,8,448),(16,3,21,21,441),(18,4,51,7,357),(19,5,15,2,30),(20,6,85,9,765),(23,7,1,51,51),(34,8,5,2,10);
/*!40000 ALTER TABLE `detallecompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalleproductos`
--

LOCK TABLES `detalleproductos` WRITE;
/*!40000 ALTER TABLE `detalleproductos` DISABLE KEYS */;
INSERT INTO `detalleproductos` VALUES (1,12,'fad','','22/12/2016','2016-12-21 20:10:09'),(2,8,'fsd','','04/01/2017','2016-12-21 20:14:08'),(3,21,'','','27/12/2016','2016-12-21 20:19:50'),(4,7,'vvfds','','03/01/2017','2016-12-21 20:25:49'),(5,2,'','','03/01/2017','2016-12-21 20:33:34'),(6,9,'12dsaw','','28/12/2016','2016-12-21 20:35:05'),(7,51,'','','27/12/2016','2016-12-21 20:41:16'),(8,2,'','','28/12/2016','2016-12-21 20:59:51');
/*!40000 ALTER TABLE `detalleproductos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detalleventas`
--

LOCK TABLES `detalleventas` WRITE;
/*!40000 ALTER TABLE `detalleventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `economia`
--

LOCK TABLES `economia` WRITE;
/*!40000 ALTER TABLE `economia` DISABLE KEYS */;
/*!40000 ALTER TABLE `economia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empresaprincipal`
--

LOCK TABLES `empresaprincipal` WRITE;
/*!40000 ALTER TABLE `empresaprincipal` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresaprincipal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historialcambiosprecio`
--

LOCK TABLES `historialcambiosprecio` WRITE;
/*!40000 ALTER TABLE `historialcambiosprecio` DISABLE KEYS */;
/*!40000 ALTER TABLE `historialcambiosprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `historialcomprasventas`
--

LOCK TABLES `historialcomprasventas` WRITE;
/*!40000 ALTER TABLE `historialcomprasventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `historialcomprasventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `laboratorio`
--

LOCK TABLES `laboratorio` WRITE;
/*!40000 ALTER TABLE `laboratorio` DISABLE KEYS */;
INSERT INTO `laboratorio` VALUES (1,'3M Perú S.A.'),(2,'Abbott Laboratorios S.A.'),(3,'Abbvie S.A.S.'),(4,'Accord Healthcare S.A.C.'),(5,'Ache'),(6,'Advance Scientific del Perú'),(7,'Ajanta Pharma LTD.'),(8,'Albis S.A.'),(9,'Alcon Perú S.A.'),(10,'Alicorp'),(11,'Alifarma Perú S.A.C.'),(12,'Amilpharm SAC'),(13,'Apoyo a Programas de Población'),(14,'ASG Inversiones EIRL'),(15,'Aspen Perú S.A.'),(16,'Astellas Pharma US INC.'),(17,'Atlantic Comerce Trading S.A.C.'),(18,'Atlas Vision'),(19,'Axon Pharma Perú S.A.C.'),(20,'B. Braun Medical Perú S.A.'),(21,'BACON'),(22,'Bayer Consumer Care'),(23,'Bayer S.A.'),(24,'Bayer Schering Pharma'),(25,'Beiersdorf S.A.C.'),(26,'Bio Reg Pharma S.A.C.'),(27,'Biobasal S.A., Basilea Suiza'),(28,'Biologische Heilmittel Heel Gmbh - Alemania'),(29,'Biomedical Sciences'),(30,'Biosyntec S.A.C.'),(31,'Biotefar Perú SAC'),(32,'Biotoscana Farma S.A.'),(33,'Bonapharm S.A.'),(34,'Brand And Marketing Consultores S.A.C.'),(35,'Brisafarma S.A.C.'),(36,'Bristol Myers Squibb S.A.'),(37,'Caferma S.A.C.'),(38,'Calanit S.A.C.'),(39,'Cardio Perfusión EIRL'),(40,'Ceci Farma Import S.R.L.'),(41,'Chriscal Cleaning Products'),(42,'Cipa'),(43,'Colgate Palmolive Perú S.A.'),(44,'Comiesa Druc S.A.'),(45,'Concept Pharma S.A.C.'),(46,'Contilab'),(47,'Continental'),(48,'Corporación Arion S.A.C.'),(49,'Corporación de Inversiones Farma Perú S.A.C.'),(50,'Corporación Farbiomedic S.A.C.'),(51,'Corporación Farmacéutica Afarmach S.A.C.'),(52,'Corporación Farmacéutica Dajos S.A.C.'),(53,'Corporación Farmacológica J & J Salud'),(54,'Corporación Farmacológica J&J'),(55,'Corporación Medco S.A.C.'),(56,'Corporation Trade Plus del Perú S.A.C.'),(57,'D&M Pharma Perú S.A.C.'),(58,'Danone Nutricia Early Life Nutrition'),(59,'Dentilab del Perú'),(60,'Dispolab Farmacéutica Perú S.A.'),(61,'Distribuidor: Albis S.A.'),(62,'Distribuidora Continental 6 S.A.'),(63,'Distribuidora Dany S.R.L.'),(64,'Distribuidora Droguería Las Américas S.A.C.'),(65,'Distribuidora Quiarsa S.A.C.'),(66,'Doctor Andreu Q.F. S.A.'),(67,'Dr. Reddy\'s Laboratories'),(68,'Droguería AG Farma SAC'),(69,'Droguería Avsa Farmacéutica S.A.C.'),(70,'Droguería Carlos Castańeda Veckarich'),(71,'Droguería CFarma E.I.R.L.'),(72,'Droguería F.J.F. Pharma Perú S.A.C.'),(73,'Droguería Farbo S.A.'),(74,'Droguería Farmedic S.A.C.'),(75,'Droguería G & R S.R.L.'),(76,'Droguería Global Pharma S.A.C.'),(77,'Droguería Hanai SRL'),(78,'Droguería Infarval E.I.R.L.'),(79,'Droguería International Farma S.A.'),(80,'Droguería Laboratorio Baxley Group S.A.C.'),(81,'Droguería Laboratorio Farvet S.A.C.'),(82,'Droguería Laboratorios Biosana S.A.C.'),(83,'Droguería Laboratorios Pharmex S.A.C.'),(84,'Droguería Lafarpe S.A.C.'),(85,'Droguería Lipharma S.A.'),(86,'Droguería Ludber S.A.C'),(87,'Droguería Oftalmomédica S.A.C.'),(88,'Droguería Pacífico S.A.C.'),(89,'Droguería Pak Farma S.A.C.'),(90,'Droguería Vifarma E.I.R.L.'),(91,'Droguería Wilfar SAC'),(92,'Droguerías D\'olapharm S.A.C.'),(93,'Droguerías Unidas del Perú S.A.C.'),(94,'Drokasa Perú S.A.'),(95,'Dronnvels S.A.C.'),(96,'Drugs & Business Perú S.A.C.'),(97,'E.B. Pareja Lecaros S.A.'),(98,'Echopharma S.A.C.'),(99,'Eficiencia Laboral S.A.'),(100,'Emdiex S.A. Emp. Multinacional de Imp. y Exp. S.A.'),(101,'EMS Sigma Pharma'),(102,'Eske Group'),(103,'Especialidades Oftalmológicas S.A.'),(104,'Euroderma Droguería S.A.C.'),(105,'Eurofarma Perú S.A.C.'),(106,'European Chemicals'),(107,'Fada Pharma'),(108,'Faes Farma'),(109,'Family Doctor'),(110,'Farmacéutica Biotech S.A.C.'),(111,'Farmacéutica Latina S.A.C.'),(112,'Farmacéutica Otarvasq S.A.C.'),(113,'Farmadual S.A.C.'),(114,'Farmindustria S.A.'),(115,'Ferring Pharmaceuticals'),(116,'Fresenius Kabi Perú'),(117,'Frexen'),(118,'Gadorpharma S.A.C.'),(119,'Galenicum Health Perú SAC'),(120,'Gedeon Richter'),(121,'Gedeon Richter Perú S.A.C.'),(122,'Genomma Lab'),(123,'Genzyme del Perú S.A.C.'),(124,'GlaxoSmithKline Perú S.A.'),(125,'Glenmark Pharmaceuticals Perú S.A.'),(126,'Global Med Farma'),(127,'GP Pharm S.A.'),(128,'Grey Inversiones S.A.C.'),(129,'Grünenthal Peruana S.A.'),(130,'Grupo 2M y BR S.A.C.'),(131,'Grupo Atral-Cipan'),(132,'Grupo Faes S.A.'),(133,'Grupo Farmakonsuma S.A.'),(134,'Grupo Sanofi Aventis'),(135,'Hermes Sweeteners LTD.'),(136,'Hospira Perú S.R.L.'),(137,'Infermed S.A.C.'),(138,'Instituto Bioquímico Dr. F. Remy S.A.'),(139,'Instituto Quimioterápico S.A.'),(140,'Intipharma S.A.C.'),(141,'Intradevco Industrial S.A.'),(142,'Inversiones Farmacom S.A.'),(143,'Inversiones Ita SAC'),(144,'IPCA Laboratories Limited'),(145,'Isdin Perú S.A.'),(146,'Isis Pharma'),(147,'Istituto Ganassini S.P.A.'),(148,'J&M Especialidades Farmacéuticas S.A.C.'),(149,'Janssen-Cilag'),(150,'Johnson & Johnson del Perú'),(151,'Johnson & Johnson Medical'),(152,'Keyfarm S.A.C.'),(153,'Kimberly Clark del Perú'),(154,'La Santé'),(155,'Labex Corporation S.A.C.'),(156,'Labomed S.A.C.'),(157,'Laboratoires Dermatologiques Uriage'),(158,'Laboratorio AC Farma S.A.'),(159,'Laboratorio Algotec S.A.'),(160,'Laboratorio Allergan Internacional'),(161,'Laboratorio AstraZeneca Perú S.A.'),(162,'Laboratorio Bagó del Perú S.A.'),(163,'Laboratorio Bausch & Lomb'),(164,'Laboratorio Becton Dickinson del Uruguay S.A.'),(165,'Laboratorio Boehringer Ingelheim'),(166,'Laboratorio C.B. Fleet Co. Inc.'),(167,'Laboratorio Dentaid Perú S.A.C.'),(168,'Laboratorio Deutsche Pharma S.A.C.'),(169,'Laboratorio Dropesac'),(170,'Laboratorio Dubonp S.A.'),(171,'Laboratorio Eli Lilly Interamerican Inc.'),(172,'Laboratorio Elifarma S.A.'),(173,'Laboratorio Famy Care S.A.C.'),(174,'Laboratorio Farmacéutico Medical Perú S.A.'),(175,'Laboratorio Farmacéutico Peruano S.R.L.'),(176,'Laboratorio Farmacéutico San Joaquin Roxfarma S.A.'),(177,'Laboratorio Farmacéuticos Markos S.A.'),(178,'Laboratorio Farmaquil Perú S.A.C.'),(179,'Laboratorio Farmaval Perú S.A.'),(180,'Laboratorio Farnatu E.I.R.L.'),(181,'Laboratorio Ferrer Grupo Internacional S.A.'),(182,'Laboratorio Galderma Perú'),(183,'Laboratorio Garden House S.A.'),(184,'Laboratorio Gencopharmaceutical'),(185,'Laboratorio Genfar Perú S.A.'),(186,'Laboratorio Gianfarma S.A.'),(187,'Laboratorio Hersil S.A.'),(188,'Laboratorio Induquímica S.A. (Natural World)'),(189,'Laboratorio Innovaderm'),(190,'Laboratorio Inti Perú S.A.C.'),(191,'Laboratorio Lafage S.A.C.'),(192,'Laboratorio Lansier S.A.C.'),(193,'Laboratorio Lemery'),(194,'Laboratorio Lupin'),(195,'Laboratorio Mallinckrodt'),(196,'Laboratorio Marvic Trading S.R.L.'),(197,'Laboratorio Master Farma'),(198,'Laboratorio Medrock'),(199,'Laboratorio Merck Sharp & Dohme Perú S.R.L.'),(200,'Laboratorio Ophtha'),(201,'Laboratorio Ordesa'),(202,'Laboratorio Personal Products S.A.'),(203,'Laboratorio Pharma-C S.A.C.'),(204,'Laboratorio Pharmatech'),(205,'Laboratorio Portugal S.R.L.'),(206,'Laboratorio Quilla Pharma S.A.C.'),(207,'Laboratorio Quirofano'),(208,'Laboratorio Roker Perú S.A.'),(209,'Laboratorio Rowa Pharmaceuticals'),(210,'Laboratorio Sherfarma S.A.'),(211,'Laboratorio Sundown'),(212,'Laboratorio Terbol Perú S.A.'),(213,'Laboratorio Unión Farmacéutica Nacional S.R.L.'),(214,'Laboratorio Welfark Perú S.A.'),(215,'Laboratorios Americanos - Labot S.A.'),(216,'Laboratorios Ares Pharma S.A.C.'),(217,'Laboratorios Baxter del Perú S.A.'),(218,'Laboratorios Biopas'),(219,'Laboratorios Catalysis S.L.'),(220,'Laboratorios Crespal del Perú'),(221,'Laboratorios Delfarma S.A.C.'),(222,'Laboratorios Farmacéutica del Perú S.A.C.'),(223,'Laboratorios Farmachif'),(224,'Laboratorios Farmasur S.A.C.'),(225,'LABORATORIOS GABBLAN S.A.C.'),(226,'Laboratorios La Cooper'),(227,'Laboratorios M & G Vida Natural E.I.R.L.'),(228,'Laboratorios Naturales y Genéricos S.A.C.'),(229,'Laboratorios Nycomed'),(230,'Laboratorios Oftálmicos S.A.C.'),(231,'Laboratorios Pharmed Corporation S.A.C.'),(232,'Laboratorios Proteld S.A.C.'),(233,'Laboratorios Saval'),(234,'Laboratorios Unidos S.A.'),(235,'Laboratorios Unidos S.A.'),(236,'Labotarorios Siegfried S.A.C.'),(237,'Lafar Corporación Internacional S.A.C.'),(238,'Lamosan S.A.'),(239,'LKM Perú S.A.'),(240,'LMB H. Colichón S.A.'),(241,'Lukoll S.A.C.'),(242,'Lundbeck Perú S.A.C.'),(243,'Luxor Pharmaceutical S.A.C.'),(244,'Macleods Pharmaceuticals Limited Perú S.A.C.'),(245,'Maperb Drug S.A.C.'),(246,'Maquifarma E.I.R.L.'),(247,'Maver Perú S.A.'),(248,'Mc Globe Incorporate S.A.C.'),(249,'Mead Johnson Nutrition'),(250,'Meda Pharma'),(251,'Medical Devices & Pharma S.A.C. - Medphar S.A.C.'),(252,'Medifarma S.A.'),(253,'Medigroup'),(254,'Medine Pharmaceuticals S.A.C.'),(255,'Mega Lifesciences PTY. PERU'),(256,'Merck Peruana S.A.'),(257,'Merz Pharmaceuticals'),(258,'Mi Farma'),(259,'MKS Unidos S.A.'),(260,'N y S Compańia S.A.'),(261,'Nestlé Perú S.A.'),(262,'Nipro Medical Corporation Sucursal del Perú'),(263,'Nordic Pharmaceutical Company S.A.C.'),(264,'Nordic Pharmaceutical Company S.A.C.'),(265,'Norgine Pharma'),(266,'Novaderma S.A.C.'),(267,'Novartis Biosciences - Ciba Vision'),(268,'Novartis Biosciences Perú S.A.'),(269,'Novartis Div. Transplante'),(270,'Novartis Div.Oncológica'),(271,'Novartis Ophthalmics'),(272,'Novartis Pharma Biosciences Perú S.A.'),(273,'Novax Eirl'),(274,'Novo Nordisk Pharma Operations'),(275,'Okasa Pharma'),(276,'Oli Med Perú S.A.C.'),(277,'OM Pharma S.A.'),(278,'Omdica S.A.'),(279,'OQ Pharma S.A.C.'),(280,'Orbis International S.A.C.'),(281,'Organon International BV'),(282,'Palmagyar S.A.'),(283,'Peruano Germano S.A.'),(284,'Perufarma'),(285,'Perulab S.A.'),(286,'Pfizer Consumer Healthcare'),(287,'Pfizer S.A.'),(288,'Pharbal S.A.'),(289,'Pharma Hosting Perú S.A.C.'),(290,'Pharma Roy SAC'),(291,'Pharmaceutical Distoloza SA'),(292,'Pharmacheck Perú S.A.'),(293,'Pharmagen S.A.C.'),(294,'Pharmaris Perú S.A.C.'),(295,'Pharmavisión'),(296,'Procter & Gamble S.R.L.'),(297,'Productos Roche Q.F. S.A.'),(298,'Qualipharm Orthopedic'),(299,'Qualipharm S.R.L.'),(300,'Quality Pharma E.I.R.L.'),(301,'Quilab'),(302,'Quimfa Peru S.A.C.'),(303,'Química Suiza S.A.'),(304,'R&V Food Group S.A.C.'),(305,'Ranbaxy-PRP Perú S.A.C.'),(306,'Reckitt Benckiser'),(307,'Reimed Pharma S.A.'),(308,'Representaciones Farmacéuticas S.A.'),(309,'Representaciones Segura S.A.C.'),(310,'Representante: Albis S.A.'),(311,'Representante: Albis S.A.'),(312,'Representante: Albis S.A.'),(313,'Representante: Albis S.A.'),(314,'Rhovic Pharmaceutical S.A.'),(315,'Roca S.A.C.'),(316,'Rodmad International'),(317,'Roel Grace S.A.C.'),(318,'Roemmers S.A.'),(319,'Roha Arznelmittel Gmbh'),(320,'Roster S.A.'),(321,'Sancela'),(322,'Sanderson S.A.'),(323,'Sanofi Pasteur'),(324,'Scalup Importaciones S.A.C.'),(325,'Seven Pharma S.A.C.'),(326,'SIFI'),(327,'SIT Desma Health Care N.V.'),(328,'Skin Master Perú SAC'),(329,'Solton Pharma S.A.C.'),(330,'Solutions Medical Import SAC'),(331,'Sun Pharmaceutical'),(332,'Tablets (India) LTD.'),(333,'Takeda SRL'),(334,'Techsphere Perú S.A.C.'),(335,'Tecnofarma S.A.'),(336,'Temis Lostaló'),(337,'Teofarma Perú S.A.C.'),(338,'TEVA PERU S.A.'),(339,'Torres Pharma S.A.C.'),(340,'Unimed del Perú S.A.'),(341,'Unipharm S.A.C.'),(342,'Valeant Farmacéutica Perú SRL'),(343,'VANOCI E.I.R.L.'),(344,'Vendiband'),(345,'Ver Novartis Biosciences Perú S.A.'),(346,'Vidasol E.I.R.L.'),(347,'Vifor'),(348,'Vitabiotics'),(349,'Vitalis Perú S.A.C.'),(350,'Wockhardt Limited'),(351,'World Pharma S.A.C.'),(352,'WYETH NUTRICION'),(353,'Yobel Supply Chain Management S.A'),(354,'Ninguno'),(355,'Otro');
/*!40000 ALTER TABLE `laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `nivelusuario`
--

LOCK TABLES `nivelusuario` WRITE;
/*!40000 ALTER TABLE `nivelusuario` DISABLE KEYS */;
INSERT INTO `nivelusuario` VALUES (1,'Dioses'),(2,'Semidioses'),(3,'Mortales');
/*!40000 ALTER TABLE `nivelusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'ca','',12,'41',6,2,NULL),(2,'qtq v','',56,'10',26,2,7),(3,'dqw 51','',21,'10',15,3,8),(4,'tqwt ew','',51,'10',26,1,7),(5,'esmeralda x6 und','',15,'10',6,2,5),(6,'shampoo h&s limon 720ml','',85,'10',12,1,2),(7,'dasd1 qw','',1,'10',1,1,6),(8,'black 21','',5,'5',12,1,3);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `propiedadproducto`
--

LOCK TABLES `propiedadproducto` WRITE;
/*!40000 ALTER TABLE `propiedadproducto` DISABLE KEYS */;
INSERT INTO `propiedadproducto` VALUES (1,'Genérico'),(2,'Comercial'),(3,'Muestra médica');
/*!40000 ALTER TABLE `propiedadproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'000000000','Inventario Inicial','-','0000-00-00 00:00:00',NULL,NULL,'');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipocambio`
--

LOCK TABLES `tipocambio` WRITE;
/*!40000 ALTER TABLE `tipocambio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocambio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipocomprobante`
--

LOCK TABLES `tipocomprobante` WRITE;
/*!40000 ALTER TABLE `tipocomprobante` DISABLE KEYS */;
INSERT INTO `tipocomprobante` VALUES (1,'Factura'),(2,'Recibo por honorarios'),(3,'Boleta de venta'),(4,'Liquidación de compra'),(7,'Nota de crédito'),(8,'Nota de débito'),(9,'Guía de remisión'),(10,'Recibo por arrendamiento'),(11,'Ticket'),(12,'Liquidación de cobranza'),(41,'Venta interna');
/*!40000 ALTER TABLE `tipocomprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Carlos','Pariona Valencia','cpariona','00',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
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
(`idCompras`,
`comptFecha`,
`comprSubTotal`,
`comprIGV`,
`comprTotal`,
`idTipoComprobante`,
`idProveedor`,
`idUsuario`)
VALUES
(null,
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-21 21:01:45
