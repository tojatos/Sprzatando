-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: sprzatando
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1-log

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
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offers` (
  `id_offers` int(50) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `rooms` int(50) NOT NULL,
  `todos` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_offers`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (4,'2017-01-16 21:37:00','123456789','f@email.com','ul. Testowa',343,1,1,'tojatos',1),(5,'2017-01-16 12:34:00','2353','f@email.com','ul. Testowa',343,2,2,'tojatos',1),(6,'2017-01-16 12:34:00','2353','f@email.com','ul. Testowa',343,3,3,'tojatos',1),(7,'2017-01-17 13:00:00','2145','tojatos@interia.pl','twitch chat',0,4,4,'tojatos',1),(8,'2017-01-17 13:00:00','2145','tojatos@interia.pl','twitch chat',0,5,5,'tojatos',1),(9,'2017-01-17 13:00:00','2145','tojatos@interia.pl','twitch chat',0,6,6,'tojatos',1),(10,'2017-02-26 21:37:00','123456789','wyjebnik@gmail.com','za garażami 65/2 Opole',50,7,7,'tojatos',1),(11,'2017-02-25 06:00:00','134531462','email@email.com','Bardzo ciekawe miejsce ;)',500,8,8,'tojatos',0),(12,'2017-07-28 12:34:00','885234212','foter@f55.com','ul. Kościuszki Opole główne',831,9,9,'tojatos',0),(13,'2017-02-24 21:00:00','3463246234632463','testowy@test.pl','ul. Sienkiewicza 4/3',500,10,10,'test',0),(14,'2017-02-24 21:00:00','3463246234632463','testowy@test.pl','ul. Sienkiewicza 4/3',500,11,11,'test',1),(15,'2017-02-24 21:00:00','3463246234632463','testowy@test.pl','ul. Sienkiewicza 536',23,12,12,'test',1),(16,'2017-03-18 23:59:00','505707909','hermiona@mail.pl','ul.moja hacjęda',2147483647,13,13,'Minecraft',1),(17,'2017-03-18 23:59:00','505707909','hermiona@mail.pl','ul.moja hacjęda',2147483647,14,14,'Minecraft',1),(18,'2017-02-14 15:58:00','505707909','hermiona@mail.pl','ul. dupowa 5/405',89,15,15,'Minecraft',1),(19,'0000-00-00 00:00:00','ghjkkkkkkkk','ghfstdrgfffr@frt','hhhhhhhhhhh',-1,16,16,'Minecraft',1),(20,'2017-02-25 00:47:00','2323523523232352352323','std@gsd.pl','Opole',909,17,17,'test',1);
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opinions`
--

DROP TABLE IF EXISTS `opinions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opinions` (
  `id_opinions` int(50) NOT NULL AUTO_INCREMENT,
  `stars` int(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `to_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_opinions`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opinions`
--

LOCK TABLES `opinions` WRITE;
/*!40000 ALTER TABLE `opinions` DISABLE KEYS */;
INSERT INTO `opinions` VALUES (2,5,'a masz piąteczkę','tojatos','test');
/*!40000 ALTER TABLE `opinions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id_participants` int(50) NOT NULL AUTO_INCREMENT,
  `offer_id` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_participants`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,12,'test',34,'t',1,1,1),(3,16,'test',4,'fg',0,0,0),(4,17,'test',435,'kakagh',0,0,0),(6,11,'test',4523,'5323',1,1,1),(8,13,'tojatos',50,'Polecam się',1,1,1),(9,14,'tojatos',50,'lul',0,0,0),(10,14,'tojatos',50,'lul',0,0,0),(11,15,'tojatos',234,'Kappa',0,0,0),(12,15,'tojatos',234,'Keepo',0,0,0),(13,15,'tojatos',1000000000,'A co mi tam, na bogato',0,0,0),(14,15,'tojatos',999,'999 złociszy',0,0,0);
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id_rooms` int(50) NOT NULL AUTO_INCREMENT,
  `bathroom` tinyint(1) NOT NULL DEFAULT '0',
  `kitchen` tinyint(1) NOT NULL DEFAULT '0',
  `living_room` tinyint(1) NOT NULL DEFAULT '0',
  `bedroom` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rooms`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,1,1,0,0),(2,0,0,0,0),(3,0,0,0,0),(4,1,1,1,1),(5,0,0,0,0),(6,1,1,1,1),(7,0,1,0,0),(8,0,0,1,1),(9,0,0,0,0),(10,0,1,0,0),(11,0,1,0,0),(12,0,1,0,0),(13,1,0,0,0),(14,1,0,0,0),(15,1,0,0,0),(16,1,0,0,0),(17,1,0,0,0);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `todos` (
  `id_todos` int(50) NOT NULL AUTO_INCREMENT,
  `clean_car` tinyint(1) NOT NULL DEFAULT '0',
  `clean_windows` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_todos`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
INSERT INTO `todos` VALUES (1,1,0),(2,1,1),(3,1,1),(4,1,1),(5,1,1),(6,0,0),(7,0,0),(8,1,1),(9,1,1),(10,0,0),(11,0,0),(12,1,1),(13,1,0),(14,1,0),(15,0,1),(16,1,0),(17,0,0);
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_messages` (
  `id_user_messages` int(50) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user_messages`),
  UNIQUE KEY `user_index` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_messages`
--

LOCK TABLES `user_messages` WRITE;
/*!40000 ALTER TABLE `user_messages` DISABLE KEYS */;
INSERT INTO `user_messages` VALUES (1,'test','Jestem testowym profilem, miło mi'),(2,'tojatos','To ja, Tos.');
/*!40000 ALTER TABLE `user_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_users` int(50) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'tojatos','dfd78a16b381b25866f43fc5ee1758438d81cd14','tojatos@gmail.com','standard',1,0),(9,'admin','7c99cb247ff984c46570e8331ef65ae5fe9ae76c','admin@localhost','administrator',1,0),(10,'test','3afeaa52bf36f292938d8ad6709643462a200960','test@test.pl','standard',1,0),(11,'Minecraft','b0fa7aa8daa7fe70d1e8dbcc2651f5a749db65d6','hermiona@mail.pl','standard',1,0),(12,'maciej_bajda','3afeaa52bf36f292938d8ad6709643462a200960','maciej.bajda@mbajda.pro','standard',1,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-22 10:51:57
