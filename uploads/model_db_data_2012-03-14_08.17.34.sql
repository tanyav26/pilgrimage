-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.61


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema networkapp
--

CREATE DATABASE IF NOT EXISTS networkapp;
USE networkapp;

--
-- Definition of table `networkapp`.`dd_authority`
--

DROP TABLE IF EXISTS `networkapp`.`dd_authority`;
CREATE TABLE  `networkapp`.`dd_authority` (
  `authority_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `authority_title` varchar(100) NOT NULL,
  `authority_parent_id` bigint(20) NOT NULL,
  `authority_name` varchar(45) NOT NULL COMMENT '	',
  `authority_description` varchar(255) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  PRIMARY KEY (`authority_id`),
  UNIQUE KEY `authority_name_UNIQUE` (`authority_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_authority`
--

/*!40000 ALTER TABLE `dd_authority` DISABLE KEYS */;
LOCK TABLES `dd_authority` WRITE;
INSERT INTO `networkapp`.`dd_authority` VALUES  (1,'PUBLIC',0,'PUBLIC','All unregistered nodes, users and applications',1,8),
 (2,'Registered Users',1,'REGISTEREDUSERS','All registered nodes with a known unique identifier',2,7),
 (3,'Moderators',2,'MODERATORS','System moderators, Users allowed to manage user generated import',3,6),
 (4,'Master Administrators',3,'MASTERADMINISTRATORS','Special users with awesome powers',4,5);
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_authority` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_authority_permissions`
--

DROP TABLE IF EXISTS `networkapp`.`dd_authority_permissions`;
CREATE TABLE  `networkapp`.`dd_authority_permissions` (
  `authority_permission_key` bigint(20) NOT NULL AUTO_INCREMENT,
  `authority_id` bigint(20) NOT NULL,
  `permission_area_uri` varchar(255) NOT NULL,
  `permission` varchar(45) NOT NULL DEFAULT '1',
  `permission_type` varchar(45) NOT NULL,
  `permission_title` varchar(45) NOT NULL,
  PRIMARY KEY (`authority_permission_key`),
  UNIQUE KEY `UNIQUE` (`permission_area_uri`,`permission_type`,`authority_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_authority_permissions`
--

/*!40000 ALTER TABLE `dd_authority_permissions` DISABLE KEYS */;
LOCK TABLES `dd_authority_permissions` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_authority_permissions` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_menu`
--

DROP TABLE IF EXISTS `networkapp`.`dd_menu`;
CREATE TABLE  `networkapp`.`dd_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_title` varchar(45) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_classes` varchar(45) DEFAULT NULL,
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `menu_group_id` int(11) NOT NULL,
  `menu_type` varchar(45) NOT NULL DEFAULT 'link',
  `menu_callback` varchar(255) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_menu`
--

/*!40000 ALTER TABLE `dd_menu` DISABLE KEYS */;
LOCK TABLES `dd_menu` WRITE;
INSERT INTO `networkapp`.`dd_menu` VALUES  (1,0,'Dashboard','/system/admin/index',' ',1,1,'link',NULL,1,2),
 (2,0,'Content','/system/admin/content/lists','',2,1,'link',NULL,3,12),
 (3,2,'Stories','/system/admin/content/lists/stories',' ',3,1,'link',NULL,4,11),
 (4,2,'Photos','/system/admin/content/lists/photos',' ',4,1,'link',NULL,5,10),
 (5,2,'Locations','/system/admin/content/lists/location',' ',5,1,'link',NULL,6,9),
 (6,2,'${Extensions}','/system/admin/content/lists/:application',' ',6,1,'method','lookup',7,8),
 (7,0,'Network','/system/admin/network/index','',7,1,'link','',13,24),
 (8,7,'Members','/system/admin/network/members/lists','',8,1,'link','',14,23),
 (9,7,'Authorities & Roles','/system/admin/network/authorities','',9,1,'link','',15,22),
 (10,7,'Relationships','/system/admin/network/relationships','',10,1,'link','',16,21),
 (11,7,'Analytics','/system/admin/network/analytics','',11,1,'link','',17,20),
 (12,7,'${Extensions}','/system/admin/network','',12,1,'method','lookup',18,19),
 (13,0,'Manager','/system/admin/manage',NULL,13,1,'link','',25,36),
 (14,13,'Categories','/system/admin/manage/categories','',14,1,'link','',26,35),
 (15,13,'Groups','/system/admin/manage/groups','',15,1,'link','',27,34),
 (16,13,'Custom fields','/system/admin/manage/fields','',16,1,'link','',28,33),
 (17,13,'Emails','/system/admin/manage/emails','',17,1,'link','',29,32),
 (18,13,'${Extensions}','/system/admin/manage/:extensions','',18,1,'method','lookup',30,31),
 (19,0,'Settings','/system/admin/settings/configuration','',19,1,'link','',37,48),
 (20,19,'System settings','/system/admin/settings/configuration','',20,1,'link','',38,47),
 (21,19,'Appearance settings','/system/admin/settings/appearance','',21,1,'link','',39,46),
 (22,19,'Maintenance settings','/system/admin/settings/maintenance','',22,1,'link','',40,45),
 (23,19,'Privacy & Permissions','/system/admin/settings/privacy','',23,1,'link','',41,44),
 (24,19,'${Extensions}','/system/admin/settings/:application','',24,1,'method','lookup',42,43),
 (25,0,'Extensions','/system/admin/extensions/index','',25,1,'link','',49,56),
 (26,25,'Installed','/system/admin/extensions/installed','',26,1,'link','',50,55),
 (27,25,'Repositories','/system/admin/extensions/repositories','',27,1,'link','',51,54),
 (28,25,'Add extension','/system/admin/extensions/add','',28,1,'link','',52,53),
 (29,0,'Applications','/system/admin/applications/index','',29,1,'link','',56,61),
 (30,29,'System','/system/admin/applications/master','',30,1,'link','',57,60),
 (31,29,'${Extensions}','/system/admin/applicaations/','',31,1,'method','lookup',58,59);
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_menu` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_menu_group`
--

DROP TABLE IF EXISTS `networkapp`.`dd_menu_group`;
CREATE TABLE  `networkapp`.`dd_menu_group` (
  `menu_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_group_title` varchar(45) NOT NULL,
  `menu_group_order` int(11) NOT NULL DEFAULT '0',
  `menu_group_uid` varchar(45) NOT NULL,
  PRIMARY KEY (`menu_group_id`),
  UNIQUE KEY `menu_group_id_UNIQUE` (`menu_group_id`),
  UNIQUE KEY `menu_group_uid_UNIQUE` (`menu_group_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_menu_group`
--

/*!40000 ALTER TABLE `dd_menu_group` DISABLE KEYS */;
LOCK TABLES `dd_menu_group` WRITE;
INSERT INTO `networkapp`.`dd_menu_group` VALUES  (1,'Admin Navigation',1,'adminmenu');
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_menu_group` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_options`
--

DROP TABLE IF EXISTS `networkapp`.`dd_options`;
CREATE TABLE  `networkapp`.`dd_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_group_id` int(11) NOT NULL DEFAULT '0',
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `option_autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_options`
--

/*!40000 ALTER TABLE `dd_options` DISABLE KEYS */;
LOCK TABLES `dd_options` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_options` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_postmeta`
--

DROP TABLE IF EXISTS `networkapp`.`dd_postmeta`;
CREATE TABLE  `networkapp`.`dd_postmeta` (
  `postmeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `postmeta_post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `postmeta_key` varchar(255) DEFAULT NULL,
  `postmeta_value` longtext,
  PRIMARY KEY (`postmeta_id`),
  KEY `post_id` (`postmeta_post_id`),
  KEY `meta_key` (`postmeta_key`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_postmeta`
--

/*!40000 ALTER TABLE `dd_postmeta` DISABLE KEYS */;
LOCK TABLES `dd_postmeta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_postmeta` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_posts`
--

DROP TABLE IF EXISTS `networkapp`.`dd_posts`;
CREATE TABLE  `networkapp`.`dd_posts` (
  `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_date_gmt` datetime NOT NULL,
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `post_comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `post_to_ping` text NOT NULL,
  `post_pinged` text NOT NULL,
  `post_modified` datetime NOT NULL,
  `post_modified_gmt` datetime NOT NULL,
  `post_content_filtered` text NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_guid` varchar(255) NOT NULL DEFAULT '',
  `post_menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `post_comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`post_id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_posts`
--

/*!40000 ALTER TABLE `dd_posts` DISABLE KEYS */;
LOCK TABLES `dd_posts` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_posts` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_session`
--

DROP TABLE IF EXISTS `networkapp`.`dd_session`;
CREATE TABLE  `networkapp`.`dd_session` (
  `session_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_token` varchar(150) NOT NULL,
  `session_host` varchar(80) NOT NULL,
  `session_ip` varchar(45) NOT NULL,
  `session_agent` text NOT NULL,
  `session_expires` int(11) NOT NULL,
  `session_lastactive` int(11) NOT NULL,
  `session_registry` text NOT NULL,
  `session_key` varchar(100) NOT NULL,
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `session_key_UNIQUE` (`session_key`),
  UNIQUE KEY `session_token_UNIQUE` (`session_token`),
  UNIQUE KEY `session_key_token` (`session_token`,`session_key`)
) ENGINE=MyISAM AUTO_INCREMENT=498 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_session`
--

/*!40000 ALTER TABLE `dd_session` DISABLE KEYS */;
LOCK TABLES `dd_session` WRITE;
INSERT INTO `networkapp`.`dd_session` VALUES  (496,'a5a74bcc365a49389eebc5444efac3c8','84ac4de1e7cb274109b2bbbb017ca52a','e52e1d9a0bf3de7bd1f20d4336d9664b','f13dafcf03ad8a884a671ea2704724bb',1331713233,1331712333,'eJy1UstuwyAQzLdw7ImXjY1PvVeqlF5zWWCdoDh2arCqtPK/F7txHn0cywU0zOzMrhY01x9BK00c1jA0kVTPmktNnrzpoT9tXjAE37WbNW59iP2JaDEJBNVk9Rdn1XR2TyqjaTWXXj2sWjggqe6Nlj8HEUgFmk2FmdAkdhGaNb4OGGIgldeyGsegUyoY4u6fE15cfo2XoB20rsF+jkGvMR6TCNvoLUQkUxuJXc4FhoC9d1Mf9Kt+PB1nq6SerkKTibIEuKJHCOGt690NmmmCB/DNPbEemuanvIF2O8D2Gxr9Ad+79hadZg438d0yGa6JP04MkV6YcWSuBGpq4VAZx2pOnRQid2WeS3OOlwzbuGhqJhzUtqYCXAFFISFXDIErKhWXZtbkaSW61FO7iBLLSocMlTVcSUZLw006lCkLGYezUez2eNFABkoaa0WegSxFUSIam0kp07JZYQuSNmgcPwGEKePv','6745c417e4d705ad54e6b2a66e6275b1'),
 (497,'ea15a13864800bfbfce579f2dc1792f2','84ac4de1e7cb274109b2bbbb017ca52a','e52e1d9a0bf3de7bd1f20d4336d9664b','f19f3d20582f5dacc1eebe585866452d',1331713678,1331712778,'eJy1kktvwyAQhPNbOPYE2PiBT71XqpRec1lgSVCInRqsKq3834vdOI8+jvXF1nhm51sESC4/giwlMWhh8JE0z5Lnkjw51UN/2rxgCK5rN2vcuhD7E5HZFMioJKu/PCvf6T1plKTNPHr1sGrhgKS5L1r+GYhAGpBsGswySWIXwa/xdcAQA2mcLJpxDDJRwRB3/0x4afkVL0k7aI3HfsagV4zHFMI2Og0RybRGctfzgCFg78y0B/2aH0/HuSqlp1clyWRZAK7qEUJ463pzowpJ8ADO3xvt4P3PuId2O8D2mxrdAd+79ladzhxu8M1yMlwSd5wcWfpCwZGZGqiymcFSGWY5NXmWFaYuilyd8VJhG5eMZXUycyoqboUBrRmiQlGJKiUEnzcr0pXo0k7tEqpy0LlBhqVWvMwZrRVX6aGs1CA4nItit8dLBoEJYFlV5BVNgMpqFGVtudGsrLnlJN2gcfwEb8HjcQ==','d63649cd6126bf7f69e86445bf9e896a');
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_session` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_usermeta`
--

DROP TABLE IF EXISTS `networkapp`.`dd_usermeta`;
CREATE TABLE  `networkapp`.`dd_usermeta` (
  `usermeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usermeta_user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `usermeta_key` varchar(255) DEFAULT NULL,
  `usermeta_value` longtext,
  PRIMARY KEY (`usermeta_id`),
  KEY `user_id` (`usermeta_user_id`),
  KEY `meta_key` (`usermeta_key`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_usermeta`
--

/*!40000 ALTER TABLE `dd_usermeta` DISABLE KEYS */;
LOCK TABLES `dd_usermeta` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_usermeta` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_users`
--

DROP TABLE IF EXISTS `networkapp`.`dd_users`;
CREATE TABLE  `networkapp`.`dd_users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name_id` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(250) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_unique` (`user_name_id`,`user_email`),
  UNIQUE KEY `user_email_unique` (`user_email`),
  UNIQUE KEY `user_name_unique` (`user_name_id`),
  KEY `user_login_key` (`user_name_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_users`
--

/*!40000 ALTER TABLE `dd_users` DISABLE KEYS */;
LOCK TABLES `dd_users` WRITE;
INSERT INTO `networkapp`.`dd_users` VALUES  (1,'livingstone.fultang','Livingstone Fultang','450e6d0cd4f17da6d6b2ead2ac12cc315bd84e6640b93cbea32bb005:32996154cccff416f30096f0b6456b6c','livingstonefultang@gmail.com','','2012-03-06 22:41:27','',0),
 (2,'tvyland26','Tanya Vyland','90d732a252b6577f84591e885bd90a68f32caf5702fec374807104bd:ae93b6e0d3519d4248de4621aaf3da04','tanya.vyland@student.pcmd.ac.uk','','2012-03-08 00:20:51','',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_users` ENABLE KEYS */;


--
-- Definition of table `networkapp`.`dd_users_authority`
--

DROP TABLE IF EXISTS `networkapp`.`dd_users_authority`;
CREATE TABLE  `networkapp`.`dd_users_authority` (
  `user_authority_key` varchar(45) NOT NULL,
  `authority_id` bigint(20) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  PRIMARY KEY (`user_authority_key`),
  UNIQUE KEY `UNIQUE_authority` (`authority_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `networkapp`.`dd_users_authority`
--

/*!40000 ALTER TABLE `dd_users_authority` DISABLE KEYS */;
LOCK TABLES `dd_users_authority` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `dd_users_authority` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
