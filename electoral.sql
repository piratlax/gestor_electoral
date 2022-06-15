-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: electoral
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `organizaciones`
--

DROP TABLE IF EXISTS `organizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizaciones`
--

LOCK TABLES `organizaciones` WRITE;
/*!40000 ALTER TABLE `organizaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `direccion` varchar(245) DEFAULT NULL,
  `colonia` varchar(245) DEFAULT NULL,
  `localidad` varchar(145) DEFAULT NULL,
  `ocupacion` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `inef` varchar(250) DEFAULT NULL,
  `inet` varchar(250) DEFAULT NULL,
  `localizacion` varchar(100) DEFAULT NULL,
  `seccion` varchar(10) DEFAULT NULL,
  `persona_clave` varchar(45) DEFAULT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6522 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Admin','Del','Sistema','Conocido','Conocido','Conocido','Administrador','',NULL,'',NULL,NULL,NULL,NULL,'','1975mao',NULL,NULL);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problematicas`
--

DROP TABLE IF EXISTS `problematicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `problematicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problematica` varchar(45) NOT NULL,
  `descripcion` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problematicas`
--

LOCK TABLES `problematicas` WRITE;
/*!40000 ALTER TABLE `problematicas` DISABLE KEYS */;
INSERT INTO `problematicas` VALUES (1,'NINGUNA','NINGUNA');
/*!40000 ALTER TABLE `problematicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promovidos`
--

DROP TABLE IF EXISTS `promovidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promovidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ine` varchar(2) NOT NULL,
  `id_solicitud` int(11) DEFAULT NULL,
  `id_problematica` int(11) DEFAULT NULL,
  `detalle_prob` text,
  `detalle_sol` text,
  `enlace_clave` varchar(45) NOT NULL,
  `persona_clave` varchar(45) NOT NULL,
  `voto` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1708 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promovidos`
--

LOCK TABLES `promovidos` WRITE;
/*!40000 ALTER TABLE `promovidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `promovidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitud` varchar(45) NOT NULL,
  `descripcion` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (1,'NINGUNA','NINGUNA');
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `perfil` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `ultimo_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `organizaciones_id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `persona_clave` varchar(45) DEFAULT NULL,
  `enlace` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`organizaciones_id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','Administrador',1,'2021-02-24 19:17:47','2021-02-24 19:17:47',1,NULL,'1975mao','1975mao'),(87,'2461024474','$2a$07$asxx54ahjppf45sd87a5auf3EwD9RAWYnOyF.m5B9g8Mw48.jPeqe','coordinador',1,'2022-04-05 14:51:18','2022-04-05 14:51:18',101,'federal','41252eymard',''),(86,'1618623','$2a$07$asxx54ahjppf45sd87a5auxRsWvN1naNjBWoRPrjZBcgSlokmqX1e','promotor',1,'2022-03-28 17:06:42','2022-03-28 17:06:42',100,NULL,'96851GERARDO ','85447GERARDO'),(85,'2461618623','$2a$07$asxx54ahjppf45sd87a5auxRsWvN1naNjBWoRPrjZBcgSlokmqX1e','coordinador',1,'2022-03-28 17:02:36','2022-03-28 17:02:36',100,'federal','85447GERARDO',''),(88,'2464024474','$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2','coordinador',1,'2022-04-05 15:00:37','2022-04-05 15:00:37',101,'federal','97378eymard',''),(89,'mayolo','$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','coordinador',1,'2022-04-05 15:24:36','2022-04-05 15:24:36',102,'federal','88052eymard',''),(90,'2461975358','$2a$07$asxx54ahjppf45sd87a5auxRsWvN1naNjBWoRPrjZBcgSlokmqX1e','promotor',1,'2022-04-05 15:36:22','2022-04-05 15:36:22',102,NULL,'2888Cristina','88052eymard'),(91,'2463113891','$2a$07$asxx54ahjppf45sd87a5aubpQm/eHXUZt31jl/.T0lmWtL13oS1eK','coordinador',1,'2022-04-05 16:41:11','2022-04-05 16:41:11',99,'federal','89290Pedro',''),(92,'2462229760','$2a$07$asxx54ahjppf45sd87a5auxRsWvN1naNjBWoRPrjZBcgSlokmqX1e','coordinador',1,'2022-04-06 20:15:04','2022-04-06 20:15:04',103,'distrital','75133Arithzel',''),(93,'2223677480','$2a$07$asxx54ahjppf45sd87a5auxRsWvN1naNjBWoRPrjZBcgSlokmqX1e','coordinador',1,'2022-04-06 20:37:18','2022-04-06 20:37:18',104,'distrital','92250palemon ','');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-15  8:37:54
