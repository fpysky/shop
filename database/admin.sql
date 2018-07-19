-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Dumping data for table `shop_admin_menu`
--

LOCK TABLES `shop_admin_menu` WRITE;
/*!40000 ALTER TABLE `shop_admin_menu` DISABLE KEYS */;
INSERT INTO `shop_admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,'2018-07-16 07:02:51'),(2,0,5,'系统设置','fa-tasks',NULL,NULL,'2018-07-18 08:20:00'),(3,2,6,'用户','fa-users','auth/users',NULL,'2018-07-18 08:20:00'),(4,2,7,'角色','fa-user','auth/roles',NULL,'2018-07-18 08:20:00'),(5,2,8,'权限','fa-ban','auth/permissions',NULL,'2018-07-18 08:20:00'),(6,2,9,'菜单','fa-bars','auth/menu',NULL,'2018-07-18 08:20:00'),(7,2,10,'操作日志','fa-history','auth/logs',NULL,'2018-07-18 08:20:00'),(8,0,3,'商品管理','fa-cubes','/products','2018-07-17 06:35:45','2018-07-17 06:41:15'),(9,0,2,'用户管理','fa-users','/users','2018-07-17 06:40:33','2018-07-17 06:41:15'),(10,8,4,'商品列表','fa-adn','/products','2018-07-18 08:19:21','2018-07-18 08:22:03'),(11,8,0,'商品分类','fa-align-justify','/productClassify','2018-07-18 08:28:28','2018-07-18 08:28:28');
/*!40000 ALTER TABLE `shop_admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_permissions`
--

LOCK TABLES `shop_admin_permissions` WRITE;
/*!40000 ALTER TABLE `shop_admin_permissions` DISABLE KEYS */;
INSERT INTO `shop_admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','','/users*','2018-07-17 06:46:19','2018-07-17 06:46:35');
/*!40000 ALTER TABLE `shop_admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_role_menu`
--

LOCK TABLES `shop_admin_role_menu` WRITE;
/*!40000 ALTER TABLE `shop_admin_role_menu` DISABLE KEYS */;
INSERT INTO `shop_admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `shop_admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_role_permissions`
--

LOCK TABLES `shop_admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `shop_admin_role_permissions` DISABLE KEYS */;
INSERT INTO `shop_admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `shop_admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_role_users`
--

LOCK TABLES `shop_admin_role_users` WRITE;
/*!40000 ALTER TABLE `shop_admin_role_users` DISABLE KEYS */;
INSERT INTO `shop_admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `shop_admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_roles`
--

LOCK TABLES `shop_admin_roles` WRITE;
/*!40000 ALTER TABLE `shop_admin_roles` DISABLE KEYS */;
INSERT INTO `shop_admin_roles` VALUES (1,'Administrator','administrator','2018-07-16 06:55:20','2018-07-16 06:55:20');
/*!40000 ALTER TABLE `shop_admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_user_permissions`
--

LOCK TABLES `shop_admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `shop_admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_admin_users`
--

LOCK TABLES `shop_admin_users` WRITE;
/*!40000 ALTER TABLE `shop_admin_users` DISABLE KEYS */;
INSERT INTO `shop_admin_users` VALUES (1,'admin','$2y$10$SS69EwdiTLfaPargtVlhL.m0VrYuykNDs5AvNkUYPZW2p.YaUJHWO','Administrator',NULL,'kdfGhmrpuVoTSpq6ram2y9ywd25Yp9TNttAqae6cqNWRaYQQn43NtMYhfUkn','2018-07-16 06:55:20','2018-07-16 06:55:20');
/*!40000 ALTER TABLE `shop_admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-19  1:43:28
