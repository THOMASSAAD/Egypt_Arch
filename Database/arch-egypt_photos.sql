-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: arch-egypt
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `image` mediumblob NOT NULL,
  `user_id` int NOT NULL,
  `location_id` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`),
  KEY `photos_ibfk_1` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (4,_binary 'uploads/Screenshot (6).png',2315135,11),(5,_binary 'uploads/_- 84 - -104 - -111 - -109 - -97 - -115 - -32 - -83 - -97 - -97 - -100 - -32 - -84 - -97 - -119 - -102 - -105 - -107-ts1224-fayoum-edu-eg-62add297-3b66-4c79-a740-a5f99bba485a (1)_page-0001.jpg',2315135,11),(6,_binary 'uploads/_- 84 - -104 - -111 - -109 - -97 - -115 - -32 - -83 - -97 - -97 - -100 - -32 - -84 - -97 - -119 - -102 - -105 - -107-ts1224-fayoum-edu-eg-fd5258c1-52a0-4bd5-a23a-cb260c2debd8 (1)_page-0001.jpg',2315135,14),(7,_binary 'uploads/_- 84 - -104 - -111 - -109 - -97 - -115 - -32 - -83 - -97 - -97 - -100 - -32 - -84 - -97 - -119 - -102 - -105 - -107-ts1224-fayoum-edu-eg-fd5258c1-52a0-4bd5-a23a-cb260c2debd8 (1)_page-0001.jpg',2315135,11),(8,_binary 'uploads/photo_2025-03-04_18-28-30.jpg',2315135,14),(9,_binary 'uploads/Screenshot (12).png',2315135,4),(10,_binary 'uploads/Screenshot (14).png',2315135,4),(11,_binary 'uploads/photo_2025-03-04_18-28-30.jpg',2315135,4),(12,_binary 'uploads/_- 84 - -104 - -111 - -109 - -97 - -115 - -32 - -83 - -97 - -97 - -100 - -32 - -84 - -97 - -119 - -102 - -105 - -107-ts1224-fayoum-edu-eg-fd5258c1-52a0-4bd5-a23a-cb260c2debd8 (1)_page-0001.jpg',2315135,4),(13,_binary 'uploads/_- 84 - -104 - -111 - -109 - -97 - -115 - -32 - -83 - -97 - -97 - -100 - -32 - -84 - -97 - -119 - -102 - -105 - -107-ts1224-fayoum-edu-eg-62add297-3b66-4c79-a740-a5f99bba485a (1)_page-0001.jpg',2315135,4),(14,_binary 'uploads/php certifcate.jpg',2315135,4),(15,_binary 'uploads/download.jfif',1200883040,11);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-04 22:11:45
