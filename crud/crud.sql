-- MySQL dump 10.13  Distrib 5.5.44, for Win32 (x86)
--
-- Host: localhost    Database: crud
-- ------------------------------------------------------
-- Server version	5.5.44-log

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `idcity` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`idcity`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Zaragoza'),(2,'Barcelona'),(3,'Bilbao'),(4,'Madrid'),(5,'Valencia'),(6,'Santiago');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `idgender` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`idgender`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Mujer'),(2,'Hombre'),(3,'Otros');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `idlanguage` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`idlanguage`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'Castellano'),(2,'English');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pet`
--

DROP TABLE IF EXISTS `pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pet` (
  `idpet` int(11) NOT NULL AUTO_INCREMENT,
  `pet` varchar(255) NOT NULL,
  PRIMARY KEY (`idpet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet`
--

LOCK TABLES `pet` WRITE;
/*!40000 ALTER TABLE `pet` DISABLE KEYS */;
INSERT INTO `pet` VALUES (1,'Gato'),(2,'Perro');
/*!40000 ALTER TABLE `pet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bdate` datetime NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `city_idcity` int(11) NOT NULL,
  `gender_idgender` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_city_idx` (`city_idcity`),
  KEY `fk_user_gender1_idx` (`gender_idgender`),
  CONSTRAINT `fk_user_city` FOREIGN KEY (`city_idcity`) REFERENCES `city` (`idcity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_gender1` FOREIGN KEY (`gender_idgender`) REFERENCES `gender` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('uuid','c@c.com','12345','c','1920-10-10 00:00:00','c.tiff','ccc','2015-11-24 18:35:51',NULL,1,2),('uuid1','a@a.com','1234','a','1915-10-10 00:00:00','a.jpg','aaad','2015-11-24 18:35:51',NULL,1,1),('uuid2','b@b.com','1234','b','1915-01-01 00:00:00','b.jpg','bbbd','2015-11-24 18:35:51',NULL,2,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_language`
--

DROP TABLE IF EXISTS `user_has_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_language` (
  `user_iduser` varchar(255) NOT NULL,
  `language_idlanguage` int(11) NOT NULL,
  PRIMARY KEY (`user_iduser`,`language_idlanguage`),
  KEY `fk_user_has_language_language1_idx` (`language_idlanguage`),
  KEY `fk_user_has_language_user1_idx` (`user_iduser`),
  CONSTRAINT `fk_user_has_language_language1` FOREIGN KEY (`language_idlanguage`) REFERENCES `language` (`idlanguage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_language_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_language`
--

LOCK TABLES `user_has_language` WRITE;
/*!40000 ALTER TABLE `user_has_language` DISABLE KEYS */;
INSERT INTO `user_has_language` VALUES ('uuid',1),('uuid2',1),('uuid',2),('uuid1',2),('uuid2',2);
/*!40000 ALTER TABLE `user_has_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_pet`
--

DROP TABLE IF EXISTS `user_has_pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_pet` (
  `user_iduser` varchar(255) NOT NULL,
  `pet_idpet` int(11) NOT NULL,
  PRIMARY KEY (`user_iduser`,`pet_idpet`),
  KEY `fk_user_has_pet_pet1_idx` (`pet_idpet`),
  KEY `fk_user_has_pet_user1_idx` (`user_iduser`),
  CONSTRAINT `fk_user_has_pet_pet1` FOREIGN KEY (`pet_idpet`) REFERENCES `pet` (`idpet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_pet_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_pet`
--

LOCK TABLES `user_has_pet` WRITE;
/*!40000 ALTER TABLE `user_has_pet` DISABLE KEYS */;
INSERT INTO `user_has_pet` VALUES ('uuid',1),('uuid1',1),('uuid2',1),('uuid',2),('uuid2',2);
/*!40000 ALTER TABLE `user_has_pet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-25 18:41:15
