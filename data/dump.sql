-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: despegar
-- ------------------------------------------------------
-- Server version	5.7.23-log

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
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `expiration_days` int(11) NOT NULL DEFAULT '0',
  `booking_expiration_strategy` varchar(100) NOT NULL DEFAULT 'NormalStrategy',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airlines`
--

LOCK TABLES `airlines` WRITE;
/*!40000 ALTER TABLE `airlines` DISABLE KEYS */;
INSERT INTO `airlines` VALUES (1,'Aerolineas Argentinas','AAR',7,'NormalDay'),(2,'American Airlines','AAI',11,'BusinessDay'),(3,'Sol','SOL',-1,'LastBusinessDay'),(4,'Turkish Airlines','TUR',-1,'LastBusinessDay25'),(5,'Qatar Airlines','QAA',2,'BusinessDay'),(6,'Air Europa','AIE',-1,'LastBusinessDay'),(7,'Aeroméxico','AER',5,'BusinessDay'),(8,'Latam','LAT',2,'NormalDay');
/*!40000 ALTER TABLE `airlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_id` int(11) NOT NULL,
  `departure_city_id` int(11) NOT NULL,
  `destination_city_id` int(11) NOT NULL,
  `departure_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `arrive_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `expiration_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index2` (`airline_id`),
  KEY `index3` (`departure_city_id`),
  KEY `index4` (`destination_city_id`),
  CONSTRAINT `fk_airlines` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`),
  CONSTRAINT `fk_dep_city` FOREIGN KEY (`departure_city_id`) REFERENCES `cities` (`id`),
  CONSTRAINT `fk_des_city` FOREIGN KEY (`destination_city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (56,1,2,1,'2018-12-12 13:00:00','2018-12-12 18:00:00','2018-12-23','2018-12-16 20:57:49'),(57,2,1,2,'2018-12-17 13:00:00','2018-12-17 18:00:00','2018-12-31','2018-12-16 20:58:06'),(58,3,1,2,'2018-12-17 13:00:00','2018-12-17 18:00:00','2018-12-31','2018-12-16 20:58:15'),(59,4,1,2,'2018-12-24 13:00:00','2018-12-24 18:00:00','2018-12-31','2018-12-16 21:02:33'),(60,5,1,2,'2018-12-17 13:00:00','2018-12-17 18:00:00','2018-12-18','2018-12-16 20:58:35'),(61,6,1,2,'2018-12-17 13:00:00','2018-12-17 18:00:00','2018-12-31','2018-12-16 20:58:44'),(62,7,1,2,'2018-12-24 13:00:00','2018-12-24 18:00:00','2018-12-21','2018-12-16 20:58:53'),(63,8,1,2,'2018-12-18 13:00:00','2018-12-18 18:00:00','2018-12-18','2018-12-16 20:59:02');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index2` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Buenos Aires','BUE'),(2,'Miami','MIA');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-16 18:39:25
