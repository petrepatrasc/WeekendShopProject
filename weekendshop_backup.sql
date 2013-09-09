-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: weekendshop
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `apiKey` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'2013-09-08 18:00:54','2013-09-08 18:00:54','petrep','4aa0d62e54b1d4a9a5f216d0f656c0b7c2fc2764','petre@dreamlabs.ro','Petre Patrasc','cf26fd44d4a3c987519e8b2bdab812f9a46c5780'),(2,'2013-09-08 20:47:30','2013-09-08 20:47:30','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','c0f886453cde5358ff8a59067a899ec5f4f1cb71'),(3,'2013-09-08 20:47:40','2013-09-08 20:47:40','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','15222a65d86d60bee3fc3eaa6ba475ae5fb4eab3'),(4,'2013-09-08 20:47:54','2013-09-08 20:47:54','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','530c6a353ab1f157df8017fe2364548041c649d4'),(5,'2013-09-08 20:49:53','2013-09-08 20:49:53','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','9c6c1454d43c7af5f097403ff7a5c7472ef4e4ae'),(6,'2013-09-08 20:50:47','2013-09-08 20:50:47','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','f56b473962792685f816e389bedbbeddfda5f1dd'),(7,'2013-09-08 20:50:58','2013-09-08 20:50:58','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','b153628d50e6e5208c152ab87c8e6fd23afe119f'),(8,'2013-09-08 20:51:11','2013-09-08 20:51:11','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','2bb35641635e5c3da92648cd569f9e3700dd6a48'),(9,'2013-09-08 20:51:33','2013-09-08 20:51:33','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','889d0d307ce7833e1f9151f22fd127e42b74aa52'),(10,'2013-09-08 20:52:02','2013-09-08 20:52:02','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','92f06900a7f472742b999b5f6df02086eda9e8d3'),(11,'2013-09-08 20:52:21','2013-09-08 20:52:21','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','5f2801d9287852e01fb8cce0302394222aee7a69'),(12,'2013-09-08 20:52:23','2013-09-08 20:52:23','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','5889ef8501afc74c671704c76fce984095466a05'),(13,'2013-09-08 20:53:10','2013-09-08 20:53:10','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','9de15e73874fc3960000814f4a38f81b7a07ee70'),(14,'2013-09-08 20:53:18','2013-09-08 20:53:18','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','f34eea3951bfa3f9caa2a7d7d1b2d6001f397acc'),(15,'2013-09-08 20:53:36','2013-09-08 20:53:36','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','f88aa42e736d03442ad2df70c058fd8392d92134'),(16,'2013-09-08 20:54:10','2013-09-08 20:54:10','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','a75b73be42fb11d45a71b877b5ea8e5c3eb432d8'),(17,'2013-09-08 20:54:22','2013-09-08 20:54:22','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','f8f86304389cf6037b0f91b8cd70458e6b01e49f'),(18,'2013-09-08 20:54:48','2013-09-08 20:54:48','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','0ad2433ae68a0d665a1121d8132be3bfd22c0bd1'),(19,'2013-09-08 20:55:08','2013-09-08 20:55:08','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','267b66b3dc924511f0ad1de936e1a317af646d43'),(20,'2013-09-08 20:56:40','2013-09-08 20:56:40','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','9c48a2373a8cefc713032cdd19cf36b3b920fc33'),(21,'2013-09-08 20:57:59','2013-09-08 20:57:59','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','f5594bf2906acfaea1b0bdfd28e5ed94200a9416'),(22,'2013-09-08 20:58:41','2013-09-08 20:58:41','petrepatrasc','1251a4b0ecd58c8c26f4fc644afbd5bdb13bd18b','petre@dreamlabs.ro','Petre Patrasc','4fb78be10f7a807e373497e9c5fb9969386d8cf6');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_key`
--

DROP TABLE IF EXISTS `application_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_key`
--

LOCK TABLES `application_key` WRITE;
/*!40000 ALTER TABLE `application_key` DISABLE KEYS */;
INSERT INTO `application_key` VALUES (1,'2013-09-07 16:43:20','2013-09-07 16:43:20','web_app_key','bcae1066f80901c8547e013bc7315377f5e47b76');
/*!40000 ALTER TABLE `application_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `order_shop_id` int(11) DEFAULT NULL,
  `closed` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F0FE25279B6B5FBA` (`account_id`),
  KEY `IDX_F0FE2527BB6C6D96` (`order_shop_id`),
  KEY `IDX_F0FE25274584665A` (`product_id`),
  CONSTRAINT `FK_F0FE2527BB6C6D96` FOREIGN KEY (`order_shop_id`) REFERENCES `order_shop` (`id`),
  CONSTRAINT `FK_F0FE25274584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_F0FE25279B6B5FBA` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_item`
--

LOCK TABLES `cart_item` WRITE;
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
INSERT INTO `cart_item` VALUES (8,1,1,11,1,'2013-09-09 07:16:58','2013-09-09 07:16:58'),(9,1,1,11,1,'2013-09-09 07:17:01','2013-09-09 07:17:01'),(10,1,1,11,1,'2013-09-09 07:23:21','2013-09-09 07:23:21'),(11,2,1,11,1,'2013-09-09 08:02:10','2013-09-09 08:02:10'),(12,1,1,12,1,'2013-09-09 08:16:16','2013-09-09 08:16:16'),(13,2,1,12,1,'2013-09-09 08:16:22','2013-09-09 08:16:22'),(14,1,1,13,1,'2013-09-09 08:17:55','2013-09-09 08:17:55'),(15,1,1,14,1,'2013-09-09 08:18:54','2013-09-09 08:18:54'),(16,1,1,15,1,'2013-09-09 08:19:37','2013-09-09 08:19:37'),(17,1,1,16,1,'2013-09-09 08:22:57','2013-09-09 08:22:57'),(18,2,1,16,1,'2013-09-09 08:23:05','2013-09-09 08:23:05'),(19,1,NULL,17,1,'2013-09-09 08:23:33','2013-09-09 08:23:33'),(20,1,NULL,17,1,'2013-09-09 08:24:39','2013-09-09 08:24:39'),(21,1,NULL,17,1,'2013-09-09 08:24:53','2013-09-09 08:24:53'),(22,1,NULL,18,1,'2013-09-09 08:26:08','2013-09-09 08:26:08'),(23,1,1,19,1,'2013-09-09 08:27:37','2013-09-09 08:27:37');
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Toys','2013-09-08 14:22:50','2013-09-08 14:22:50'),(2,'Games','2013-09-08 14:22:50','2013-09-08 14:22:50'),(3,'Consoles','2013-09-08 14:22:50','2013-09-08 14:22:50'),(4,'Trips','2013-09-08 14:22:50','2013-09-08 14:22:50');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_shop`
--

DROP TABLE IF EXISTS `order_shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `closed` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E19B76B59B6B5FBA` (`account_id`),
  CONSTRAINT `FK_E19B76B59B6B5FBA` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_shop`
--

LOCK TABLES `order_shop` WRITE;
/*!40000 ALTER TABLE `order_shop` DISABLE KEYS */;
INSERT INTO `order_shop` VALUES (11,1,1,'2013-09-09 07:16:58','2013-09-09 07:16:58'),(12,1,1,'2013-09-09 08:16:16','2013-09-09 08:16:16'),(13,1,1,'2013-09-09 08:17:55','2013-09-09 08:17:55'),(14,1,1,'2013-09-09 08:18:54','2013-09-09 08:18:54'),(15,1,1,'2013-09-09 08:19:37','2013-09-09 08:19:37'),(16,1,1,'2013-09-09 08:22:57','2013-09-09 08:22:57'),(17,NULL,1,'2013-09-09 08:23:33','2013-09-09 08:23:33'),(18,NULL,1,'2013-09-09 08:26:08','2013-09-09 08:26:08'),(19,1,1,'2013-09-09 08:27:37','2013-09-09 08:27:37');
/*!40000 ALTER TABLE `order_shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_id` int(11) DEFAULT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pictureUrl` longtext COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD5DC6FE57` (`subcategory_id`),
  CONSTRAINT `FK_D34A04AD5DC6FE57` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,'Barbie Doll','BD101',5,13.99,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim eleifend convallis. Nunc ultricies elementum risus. Curabitur tortor justo, cursus vitae ultricies id, pellentesque id felis. Mauris lacus nibh, pretium id mauris vel, egestas suscipit turpis. Morbi hendrerit eleifend mauris tincidunt iaculis. Cras vitae ante ac libero facilisis condimentum eu sed mauris. Aliquam faucibus ultricies scelerisque. Integer adipiscing nec metus ut varius. Pellentesque consectetur ut orci sed convallis. ','http://www.fictorians.com/wp-content/uploads/2013/05/barbie1.jpg','2013-09-08 17:02:52','2013-09-08 17:02:52'),(2,1,'Teddy Bear','TB101',10,15.99,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim eleifend convallis. Nunc ultricies elementum risus. Curabitur tortor justo, cursus vitae ultricies id, pellentesque id felis. Mauris lacus nibh, pretium id mauris vel, egestas suscipit turpis. Morbi hendrerit eleifend mauris tincidunt iaculis. Cras vitae ante ac libero facilisis condimentum eu sed mauris. Aliquam faucibus ultricies scelerisque. Integer adipiscing nec metus ut varius. Pellentesque consectetur ut orci sed convallis. ','http://2.bp.blogspot.com/-9Sadhwe5Hp4/UVlP8uEXAlI/AAAAAAAAHKA/_FAlNLMA_Z4/s320/teddy+bear.jpg','2013-09-08 17:02:52','2013-09-08 17:02:52');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DDCA44812469DE2` (`category_id`),
  CONSTRAINT `FK_DDCA44812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES (1,1,'Dolls','2013-09-08 14:58:13','2013-09-08 14:58:13'),(2,1,'Test','2013-09-08 15:56:16','2013-09-08 15:56:16');
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-08 22:44:00
