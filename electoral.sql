-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: electoral
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `nominal`
--

DROP TABLE IF EXISTS `nominal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nominal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `curp` varchar(45) DEFAULT NULL,
  `idseccion` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nominal_secciones1_idx` (`idseccion`),
  CONSTRAINT `fk_nominal_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nominal`
--

LOCK TABLES `nominal` WRITE;
/*!40000 ALTER TABLE `nominal` DISABLE KEYS */;
/*!40000 ALTER TABLE `nominal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizaciones`
--

DROP TABLE IF EXISTS `organizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `organizacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizaciones`
--

LOCK TABLES `organizaciones` WRITE;
/*!40000 ALTER TABLE `organizaciones` DISABLE KEYS */;
INSERT INTO `organizaciones` VALUES (106,'PRINCIPAL');
/*!40000 ALTER TABLE `organizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `persona_clave` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  `ine` varchar(45) DEFAULT NULL,
  `curp` varchar(45) DEFAULT NULL,
  `idseccion` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persona_clave_UNIQUE` (`persona_clave`),
  KEY `id` (`id`),
  KEY `fk_personas_secciones_idx` (`idseccion`)
) ENGINE=MyISAM AUTO_INCREMENT=6522 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Admin','Del','Sistema','Conocido','Conocido','Conocido','Administrador','',NULL,'',NULL,NULL,NULL,'1975mao',NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problematicas`
--

DROP TABLE IF EXISTS `problematicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `problematicas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `problematica` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(245) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problematicas`
--

LOCK TABLES `problematicas` WRITE;
/*!40000 ALTER TABLE `problematicas` DISABLE KEYS */;
INSERT INTO `problematicas` VALUES (1,'NINGUNA','NINGUNA'),(2,'PRUEBA','123');
/*!40000 ALTER TABLE `problematicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promovidos`
--

DROP TABLE IF EXISTS `promovidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promovidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ine` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `id_solicitud` int DEFAULT NULL,
  `detalle_sol` text COLLATE utf8mb4_general_ci,
  `id_problematica` int DEFAULT NULL,
  `detalle_prob` text COLLATE utf8mb4_general_ci,
  `enlace_clave` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `persona_clave` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1708 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promovidos`
--

LOCK TABLES `promovidos` WRITE;
/*!40000 ALTER TABLE `promovidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `promovidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secciones`
--

DROP TABLE IF EXISTS `secciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipo_casilla` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ubicacion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `zona` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
INSERT INTO `secciones` VALUES (1,'1B','BASICA','CENTRO','URBANA'),(3,'2B','CONTIGUA','CENTRO','BAJA');
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitudes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `solicitud` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(245) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `solicitud_UNIQUE` (`solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `perfil` varchar(45) DEFAULT NULL,
  `estado` tinyint NOT NULL,
  `ultimo_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `organizaciones_id` int DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `persona_clave` varchar(45) DEFAULT NULL,
  `enlace` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `persona_clave_UNIQUE` (`persona_clave`),
  KEY `fk_usuarios_organizaciones1_idx` (`organizaciones_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','Administrador',1,'2021-02-24 19:17:47','2021-02-24 19:17:47',1,NULL,'1975mao','1975mao'),(96,'mao','$2a$07$asxx54ahjppf45sd87a5auw8grQW7ZLraL8d7kIZFhUiti550Oun.','Administrador',1,'2023-11-15 17:23:55','2023-11-15 17:23:55',NULL,NULL,'76887Mao',NULL);
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

-- Dump completed on 2023-11-16  7:46:24
