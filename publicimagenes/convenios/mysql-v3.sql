CREATE DATABASE  IF NOT EXISTS `bd_convenio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_convenio`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_convenio
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.22-MariaDB

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
-- Table structure for table `ambito`
--

DROP TABLE IF EXISTS `ambito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambito` (
  `idambito` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idambito`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambito`
--

LOCK TABLES `ambito` WRITE;
/*!40000 ALTER TABLE `ambito` DISABLE KEYS */;
INSERT INTO `ambito` VALUES (2,'Nacional'),(3,'Internacional');
/*!40000 ALTER TABLE `ambito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo`
--

DROP TABLE IF EXISTS `archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo` (
  `idarchivo` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) DEFAULT NULL,
  `convenio_idconvenio` int(11) DEFAULT NULL,
  `contrato_idcontrato` int(11) DEFAULT NULL,
  `extencion` varchar(45) DEFAULT NULL,
  `patch` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `state` char(1) DEFAULT NULL,
  PRIMARY KEY (`idarchivo`),
  KEY `fk_archivo_convenio1_idx` (`convenio_idconvenio`),
  KEY `fk_archivo_contrato1_idx` (`contrato_idcontrato`),
  CONSTRAINT `fk_archivo_contrato1` FOREIGN KEY (`contrato_idcontrato`) REFERENCES `contrato` (`idcontrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_archivo_convenio1` FOREIGN KEY (`convenio_idconvenio`) REFERENCES `convenio` (`idconvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo`
--

LOCK TABLES `archivo` WRITE;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(210) DEFAULT NULL,
  `otro` varchar(200) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL COMMENT '1:convenio\n2:contrato',
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'proyeccion social',NULL,'1'),(2,'investigacion',NULL,'1'),(3,'movil estudiantil',NULL,'1'),(4,'movil docente',NULL,'1'),(5,'fomentacion empleo',NULL,'1'),(6,'desarrollo espiritual',NULL,'1'),(7,'donacion',NULL,'2'),(8,'sesion de derechos',NULL,'2'),(9,'prestacion de servicios',NULL,'2');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_has_convenio`
--

DROP TABLE IF EXISTS `categoria_has_convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_has_convenio` (
  `categoria_idcategoria` int(11) DEFAULT NULL,
  `convenio_idconvenio` int(11) DEFAULT NULL,
  KEY `fk_categoria_has_convenio_convenio1_idx` (`convenio_idconvenio`),
  KEY `fk_categoria_has_convenio_categoria1_idx` (`categoria_idcategoria`),
  CONSTRAINT `fk_categoria_has_convenio_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_has_convenio_convenio1` FOREIGN KEY (`convenio_idconvenio`) REFERENCES `convenio` (`idconvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_has_convenio`
--

LOCK TABLES `categoria_has_convenio` WRITE;
/*!40000 ALTER TABLE `categoria_has_convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_has_convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `idcontrato` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(220) DEFAULT NULL,
  `codigo` varchar(200) DEFAULT NULL,
  `objeto` varchar(200) DEFAULT NULL,
  `duracion` varchar(200) DEFAULT NULL,
  `fecha_inicio` varchar(200) DEFAULT NULL,
  `fecha_fin` varchar(200) DEFAULT NULL,
  `ambito_idambito` int(11) DEFAULT NULL,
  `pais_idpais` int(11) DEFAULT NULL,
  `estado_idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcontrato`),
  KEY `fk_contrato_ambito1_idx` (`ambito_idambito`),
  KEY `fk_contrato_pais1_idx` (`pais_idpais`),
  KEY `fk_contrato_estado1_idx` (`estado_idestado`),
  CONSTRAINT `fk_contrato_ambito1` FOREIGN KEY (`ambito_idambito`) REFERENCES `ambito` (`idambito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_estado1` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_pais1` FOREIGN KEY (`pais_idpais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (1,'construcción','co-005',':s','1 año','24/10/17','24/10/18',2,2,1);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato_has_categoria`
--

DROP TABLE IF EXISTS `contrato_has_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato_has_categoria` (
  `contrato_idcontrato` int(11) DEFAULT NULL,
  `categoria_idcategoria` int(11) DEFAULT NULL,
  KEY `fk_contrato_has_categoria_categoria1_idx` (`categoria_idcategoria`),
  KEY `fk_contrato_has_categoria_contrato1_idx` (`contrato_idcontrato`),
  CONSTRAINT `fk_contrato_has_categoria_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_has_categoria_contrato1` FOREIGN KEY (`contrato_idcontrato`) REFERENCES `contrato` (`idcontrato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato_has_categoria`
--

LOCK TABLES `contrato_has_categoria` WRITE;
/*!40000 ALTER TABLE `contrato_has_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato_has_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato_has_responsable`
--

DROP TABLE IF EXISTS `contrato_has_responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato_has_responsable` (
  `contrato_idcontrato` int(11) DEFAULT NULL,
  `responsable_idresponsable` int(11) DEFAULT NULL,
  KEY `fk_contrato_has_responsable_responsable1_idx` (`responsable_idresponsable`),
  KEY `fk_contrato_has_responsable_contrato1_idx` (`contrato_idcontrato`),
  CONSTRAINT `fk_contrato_has_responsable_contrato1` FOREIGN KEY (`contrato_idcontrato`) REFERENCES `contrato` (`idcontrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_has_responsable_responsable1` FOREIGN KEY (`responsable_idresponsable`) REFERENCES `responsable` (`idresponsable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato_has_responsable`
--

LOCK TABLES `contrato_has_responsable` WRITE;
/*!40000 ALTER TABLE `contrato_has_responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato_has_responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenio`
--

DROP TABLE IF EXISTS `convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenio` (
  `idconvenio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `resolucion` varchar(100) DEFAULT NULL,
  `objetivo` varchar(150) DEFAULT NULL,
  `duracion` varchar(100) DEFAULT NULL,
  `fecha_ini` varchar(45) DEFAULT NULL,
  `fecha_fin` varchar(45) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `tipo_idtipo` int(11) DEFAULT NULL,
  `ambito_idambito` int(11) DEFAULT NULL,
  `pais_idpais` int(11) DEFAULT NULL,
  `estado_idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idconvenio`),
  KEY `fk_convenio_tipo_idx` (`tipo_idtipo`),
  KEY `fk_convenio_ambito1_idx` (`ambito_idambito`),
  KEY `fk_convenio_pais1_idx` (`pais_idpais`),
  KEY `fk_convenio_estado1_idx` (`estado_idestado`),
  CONSTRAINT `fk_convenio_ambito1` FOREIGN KEY (`ambito_idambito`) REFERENCES `ambito` (`idambito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_convenio_estado1` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_convenio_pais1` FOREIGN KEY (`pais_idpais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_convenio_tipo` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenio`
--

LOCK TABLES `convenio` WRITE;
/*!40000 ALTER TABLE `convenio` DISABLE KEYS */;
INSERT INTO `convenio` VALUES (1,'DIGETI','005-abc','172-bc','ganar','6 meses','24/10/2017','24/04/2017',NULL,3,2,2,1);
/*!40000 ALTER TABLE `convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenio_has_responsable`
--

DROP TABLE IF EXISTS `convenio_has_responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenio_has_responsable` (
  `idcontrol` int(11) NOT NULL AUTO_INCREMENT,
  `convenio_idconvenio` int(11) DEFAULT NULL,
  `responsable_idresponsable` int(11) DEFAULT NULL,
  `usuario_idusuario` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcontrol`),
  KEY `fk_convenio_has_responsable_responsable1_idx` (`responsable_idresponsable`),
  KEY `fk_convenio_has_responsable_convenio1_idx` (`convenio_idconvenio`),
  KEY `fk_convenio_has_responsable_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_convenio_has_responsable_convenio1` FOREIGN KEY (`convenio_idconvenio`) REFERENCES `convenio` (`idconvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_convenio_has_responsable_responsable1` FOREIGN KEY (`responsable_idresponsable`) REFERENCES `responsable` (`idresponsable`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_convenio_has_responsable_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenio_has_responsable`
--

LOCK TABLES `convenio_has_responsable` WRITE;
/*!40000 ALTER TABLE `convenio_has_responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `convenio_has_responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `otro` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Vigente',NULL),(2,'Vencido',NULL),(3,'Trámite',NULL);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha`
--

DROP TABLE IF EXISTS `ficha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha` (
  `idficha` int(11) NOT NULL AUTO_INCREMENT,
  `num_resolucion` varchar(150) DEFAULT NULL,
  `num_registro` varchar(150) DEFAULT NULL,
  `ambito` varchar(150) DEFAULT NULL,
  `nombre_ins` varchar(250) DEFAULT NULL,
  `sector` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `nombre_coor` varchar(150) DEFAULT NULL,
  `telefono_coor` varchar(150) DEFAULT NULL,
  `email_coor` varchar(200) DEFAULT NULL,
  `nom_area` varchar(150) DEFAULT NULL,
  `coor_area` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `convenio_idconvenio` int(11) DEFAULT NULL,
  `otro` varchar(200) DEFAULT NULL,
  `meta_anual` varchar(200) DEFAULT NULL,
  `mt_ene_mar` varchar(200) DEFAULT NULL,
  `mt_abr_jun` varchar(200) DEFAULT NULL,
  `mt_jul_set` varchar(200) DEFAULT NULL,
  `mt_oct_dic` varchar(200) DEFAULT NULL,
  `linea_base` varchar(100) DEFAULT NULL,
  `valor_esperado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idficha`),
  KEY `fk_ficha_convenio1_idx` (`convenio_idconvenio`),
  CONSTRAINT `fk_ficha_convenio1` FOREIGN KEY (`convenio_idconvenio`) REFERENCES `convenio` (`idconvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha`
--

LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (2,'Perú'),(3,'Colombia');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsable` (
  `idresponsable` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado_idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresponsable`),
  KEY `fk_responsable_estado1_idx` (`estado_idestado`),
  CONSTRAINT `fk_responsable_estado1` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsable`
--

LOCK TABLES `responsable` WRITE;
/*!40000 ALTER TABLE `responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador'),(2,'Cliente');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (2,'Marco'),(3,'Específico');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET dec8 DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `rol_idrol` int(11) DEFAULT NULL,
  `estado_idestado` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_rol1_idx` (`rol_idrol`),
  KEY `fk_usuario_estado1_idx` (`estado_idestado`),
  CONSTRAINT `fk_usuario_estado1` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin','$2y$10$IFWeRYVaenqFL2hHwqkr/u5Tp4XA5.Rf03OzYQ1697UAFuPsp3u4u','admin@convenios.upe.edu.pe',1,1,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-05 14:50:13
