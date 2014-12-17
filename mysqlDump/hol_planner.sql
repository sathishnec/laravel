-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: holiday_planner
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.04.1

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
-- Table structure for table `annualLeave`
--
USE holiday_planner;

DROP TABLE IF EXISTS `annualLeave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annualLeave` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` decimal(3,1) NOT NULL DEFAULT '0.0',
  `remaining_days` decimal(3,1) NOT NULL DEFAULT '0.0',
  `sick_leave_days` decimal(3,1) NOT NULL DEFAULT '0.0',
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annualLeave`
--

LOCK TABLES `annualLeave` WRITE;
/*!40000 ALTER TABLE `annualLeave` DISABLE KEYS */;
INSERT INTO `annualLeave` VALUES (2,1,'2014-01-01','2014-12-31',30.0,0.0,0.0,1,'2014-07-20 23:19:25','2014-07-20 23:19:25'),(3,3,'2014-01-01','2014-12-31',34.0,0.0,0.0,1,'2014-07-20 23:19:51','2014-07-20 23:19:51'),(4,4,'2014-01-01','2014-12-31',32.0,0.0,0.0,1,'2014-07-20 23:20:58','2014-07-20 23:20:58'),(5,5,'2014-01-01','2014-12-31',34.0,0.0,0.0,1,'2014-07-20 23:21:13','2014-07-20 23:21:13'),(6,6,'2014-01-01','2014-12-31',30.0,0.0,0.0,1,'2014-07-20 23:21:24','2014-07-20 23:21:24'),(7,13,'2014-01-01','2014-12-31',32.0,0.0,0.0,1,'2014-07-20 23:21:36','2014-07-20 23:21:36');
/*!40000 ALTER TABLE `annualLeave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `head` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Management','1',0,'2014-07-20 21:17:35','2014-07-20 21:17:35'),(2,'IT','1',0,'2014-07-20 21:17:40','2014-07-20 21:17:40'),(3,'Design','1',0,'2014-07-20 21:18:05','2014-07-20 21:18:05'),(4,'Marketing','1',0,'2014-07-20 21:18:16','2014-07-20 21:18:16'),(5,'Customer Services','1',0,'2014-07-20 21:18:29','2014-07-20 21:21:07'),(6,'Finance','1',0,'2014-07-20 21:45:29','2014-07-20 21:45:29'),(7,'Operations','1',0,'2014-07-20 21:45:35','2014-07-20 21:45:35');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaveHistory`
--

DROP TABLE IF EXISTS `leaveHistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leaveHistory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `am_pm` enum('AM','PM','') COLLATE utf8_unicode_ci NOT NULL,
  `no_of_days` decimal(3,1) NOT NULL,
  `authorized_by` int(11) DEFAULT NULL,
  `holiday_chart_added_by` int(11) DEFAULT NULL,
  `leaveStatus_id` int(11) NOT NULL,
  `leaveType_id` int(11) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `user_declared` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `reduce_leave_count` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dpt_declared` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaveHistory`
--

LOCK TABLES `leaveHistory` WRITE;
/*!40000 ALTER TABLE `leaveHistory` DISABLE KEYS */;
INSERT INTO `leaveHistory` VALUES (1,1,'2014-07-21','2014-07-25','',5.0,NULL,NULL,1,16,'Test','1',NULL,NULL,'2014-07-21 12:39:10','2014-07-21 12:39:10');
/*!40000 ALTER TABLE `leaveHistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaveStatus`
--

DROP TABLE IF EXISTS `leaveStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leaveStatus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leave_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaveStatus`
--

LOCK TABLES `leaveStatus` WRITE;
/*!40000 ALTER TABLE `leaveStatus` DISABLE KEYS */;
INSERT INTO `leaveStatus` VALUES (1,'Pending','1',1,'2014-07-20 17:22:16','2014-07-20 17:22:16'),(2,'Approved','1',1,'2014-07-20 17:22:27','2014-07-20 17:22:27'),(3,'Cancelled','1',1,'2014-07-20 17:22:36','2014-07-20 17:22:36'),(6,'Declined','1',1,'2014-07-20 17:44:51','2014-07-20 19:03:21');
/*!40000 ALTER TABLE `leaveStatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaveType`
--

DROP TABLE IF EXISTS `leaveType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leaveType` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `added_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaveType`
--

LOCK TABLES `leaveType` WRITE;
/*!40000 ALTER TABLE `leaveType` DISABLE KEYS */;
INSERT INTO `leaveType` VALUES (2,'Unpaid Holiday','1',1,'2014-07-20 17:04:36','2014-07-20 17:04:36'),(9,'Office Duty','1',1,'2014-07-20 18:23:23','2014-07-20 18:23:23'),(12,'Sick','1',1,'2014-07-20 18:27:24','2014-07-20 18:27:24'),(16,'Paid Holiday','1',1,'2014-07-20 21:15:46','2014-07-20 21:15:46');
/*!40000 ALTER TABLE `leaveType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_07_20_134912_create_users_table',1),('2014_07_20_135612_create_leaveHistory_table',2),('2014_07_20_141222_create_leaveStatus_table',2),('2014_07_20_141507_create_leaveType_table',2),('2014_07_20_141847_create_department_table',2),('2014_07_20_142432_create_annualLeave_table',2),('2014_07_20_143028_add_some_users',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sathishs@dietchef.co.uk','$2y$10$7MsSL5U5B5v05q7Dd88FRubmBKIg4KevAZgeebWEgjFLwvMSaR4rW','Sathish Sengodan',2,0,'2014-07-20 13:42:56','2014-07-20 23:21:44','w6owQq5EcPhGpsy6V57QuLkhohFJIQKsuLv5Q5Xm4nus62vyiP1stb5qKa3A'),(2,'kevin@dietchef.co.uk','$2y$10$UzWyhrMUoa2txTBwBaLqPueg7KMSlxoqI.io6MarxsapQuAktulUy','Kevin Dorren',1,1,'2014-07-20 21:29:24','2014-07-20 23:22:55','W32G8AcZdm4Qhs7kqHuS73D4zf32ENp0cvKrodgjfX7S3dzCQqt3FEoSCLim'),(3,'mikes@dietchef.co.uk','$2y$10$vKtiL8iPpPsxaCCoo3Ciy.qVjCRa97yU1dykYfDfwcCD2TEZmV.R2','Mike Smith',2,1,'2014-07-20 21:30:45','2014-07-20 21:30:45',NULL),(4,'davea@dietchef.co.uk','$2y$10$01v7XPKXyxBeDOwKpfD3SOxh3l/yF7GuEvH9/Vv0wHJVOpnILNE82','Dave Allen',2,1,'2014-07-20 21:38:23','2014-07-20 21:38:23',NULL),(5,'Stuart@dietchef.co.uk','$2y$10$QdGmGu9DWwKvTrDAY7Ns.Oq7ms7BVY4oHcRBYwvnpOIP5dOSib4IK','Stuart Morrison',2,1,'2014-07-20 21:39:15','2014-07-20 21:39:15',NULL),(6,'dawidp@dietchef.co.uk','$2y$10$pr8u1a5HVRWRzyRchdqmue4nTV.QzRB94nxgYw1CsZWPF/8n1m0JW','Dawid Pachla',2,1,'2014-07-20 21:39:33','2014-07-20 21:39:33',NULL),(7,'brianw@dietchef.co.uk','$2y$10$fYQzJOGTc2d7EHK8PYvFNup90zKGJXof5unfXnPSUJqjmfGixZXE.','Brian Woodburn',3,1,'2014-07-20 21:40:08','2014-07-20 21:40:08',NULL),(8,'jordanm@dietchef.co.uk','$2y$10$Ch7.zoKVmagbufcnpj5dLexddsTC8bLeLO1QFwOZlJTEHEzJTKtDG','Jordan M',3,1,'2014-07-20 21:41:33','2014-07-20 21:41:33',NULL),(9,'gillian@dietchef.co.uk','$2y$10$bKauIzkGblx7RsduLAyoCOPYuKmGBmxYZX5K6qYp1i9UWvkzstaDK','Gillian Hope',4,1,'2014-07-20 21:42:11','2014-07-20 21:42:11',NULL),(10,'jenniferw@dietchef.co.uk','$2y$10$7f2AZduxOuR8ArVvbGYaf.cW/dAyr50gEzdp1Wn.hFOe/4uWnZrjW','Jennifer Williams',4,1,'2014-07-20 21:42:47','2014-07-20 21:42:47',NULL),(11,'josefcw@dietchef.co.uk','$2y$10$Khnc8Yxuqccl.8DIg4YGiO2SggaNiEyqeYYBpB5TPz4FGy3LnjGQG','Josef Church-Woods',4,1,'2014-07-20 21:43:31','2014-07-20 21:43:31',NULL),(12,'brigitter@dietchef.co.uk','$2y$10$shoyz9yzBhsEuhwj4SFoL.xkAsdYKv4XMzofOPpfvtqYnFHgMW8Jy','Brigitte Read',1,1,'2014-07-20 21:44:16','2014-07-20 21:44:16',NULL),(13,'martinl@dietchef.co.uk','$2y$10$bfp4hrwE3cjlkfbxxKEqru4uQuywZG4n2Y0YrsvlmGvLDzwGDMujW','Martin Love',2,1,'2014-07-20 21:44:37','2014-07-20 21:44:37',NULL),(14,'izzyc@dietchef.co.uk','$2y$10$Bl.20ZN0dyx9llJm7UDtWeIR0FO3TFJwAv5anOL2rQ5O9RuO22ZwO','Izzy Cameron',4,1,'2014-07-20 21:45:05','2014-07-20 21:45:05',NULL),(15,'michael.harkness@dietchef.co.uk','$2y$10$umjuxl.aWcmm/y8KWxT1/uId3EwtJeXrgrOrdu3Gvslv8Vr8yOAAW','Michael Harkness',6,1,'2014-07-20 21:46:53','2014-07-20 21:46:53',NULL),(16,'soniaf@dietchef.co.uk','$2y$10$EIfyIIKECnTxKmNCm01.CeQsr/U9itbp7kxaokHmf9t.YUHWIVzZq','Sonia Fraser',6,1,'2014-07-20 21:47:21','2014-07-20 21:47:21',NULL),(17,'staceyc@dietchef.co.uk','$2y$10$qnHILd.1S43tDnRs4uNRMeZLvAXJ.eO5.tApBRYt4ylzfjB0cTqmW','Stacey Cheung',7,1,'2014-07-20 21:48:03','2014-07-20 21:48:03',NULL),(18,'carloc@dietchef.co.uk','$2y$10$dH8xR0BDBmFWYAkuz5sl/.CVyogT59eytcd3u9aH9NefG4oaScp3W','Carlo Crolla',7,1,'2014-07-20 21:48:36','2014-07-20 21:48:36',NULL),(19,'briang@dietchef.co.uk','$2y$10$7Fum23sN1KCT1pCezEfJ2uc207jAX5kuyGY8XH4j7yYt4GepkK2t.','Brian Gray',7,1,'2014-07-20 21:48:54','2014-07-20 23:22:27','YNQuL40IpHGQP4uBgLmNfEPo07DzlWpqo0zvYVsHVtgTYXneUryBmKwIkBU1'),(20,'fionaw@dietchef.co.uk','$2y$10$YzunN6EpNzm8TaMYkM8GeuC3XSAYyswHAK.KT3z4NQDv.uxmKdgtu','Fiona Williams',7,1,'2014-07-20 21:49:22','2014-07-20 21:49:22',NULL),(21,'abbyl@dietchef.co.uk','$2y$10$V5.X7Ic0F/jWLiAK/hfn7eHVDiqj6u5CJl4nPcZhEjk7mE4JJ63HO','Abby Low',5,1,'2014-07-20 21:50:07','2014-07-20 21:50:07',NULL),(22,'graemeo@dietchef.co.uk','$2y$10$wl8pitdHweFjn/PUAXn4QuDGPmXXWvFPJOQvb2ByHd7mMonFO0iwS','Graeme Owenson',5,1,'2014-07-20 21:51:02','2014-07-20 21:51:02',NULL),(23,'paulw@dietchef.co.uk','$2y$10$e548NDifLC8kY.Q7mmSJZuzRdM0Ll9Yj3QamnWltIyDMD3AkO3YVe','Paul Wansell',5,1,'2014-07-20 21:51:39','2014-07-20 21:51:39',NULL),(24,'suzzanem@dietchef.co.uk','$2y$10$eVx4NnALuLUompcM/Tu3xeCaPy1YDqwQpMf2KpoESD1UpjK7xKRc.','Suzzane Mulgrew',5,1,'2014-07-20 21:52:12','2014-07-20 21:52:12',NULL),(25,'valeries@dietchef.co.uk','$2y$10$rZva7Hw52yrwzctU4uweee1WhA3cU2OTJlo3DN154Ojxkyyq0sOp6','Valerie Sinclair',5,1,'2014-07-20 21:53:23','2014-07-20 21:53:23',NULL);
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

-- Dump completed on 2014-07-22 12:14:24
