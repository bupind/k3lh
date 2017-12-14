/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.5-10.1.26-MariaDB : Database - k3lh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `apd_monitoring` */

DROP TABLE IF EXISTS `apd_monitoring`;

CREATE TABLE `apd_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `am_name` varchar(50) NOT NULL,
  `am_type` varchar(10) DEFAULT NULL,
  `am_brand` varchar(10) DEFAULT NULL,
  `am_amount` varchar(20) DEFAULT NULL,
  `am_location` varchar(50) DEFAULT NULL,
  `am_good_value` varchar(20) DEFAULT NULL,
  `am_bad_value` varchar(20) DEFAULT NULL,
  `am_ref` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_apd_monitoring_power_plant` (`power_plant_id`),
  KEY `FK_apd_monitoring_sector` (`sector_id`),
  CONSTRAINT `FK_apd_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_apd_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `apd_monitoring` */

insert  into `apd_monitoring`(`id`,`sector_id`,`power_plant_id`,`am_name`,`am_type`,`am_brand`,`am_amount`,`am_location`,`am_good_value`,`am_bad_value`,`am_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'APD 1','AAT1','AAB1','1654','Lokasi 1','13','12313','awdad',8,1511747657,8,1511747657),(2,10,6,'APD 2','AAT1','AAB1','123','daw','123','123123','aw',8,1511748434,8,1511748434);

/*Table structure for table `attachment` */

DROP TABLE IF EXISTS `attachment`;

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atf_filename` varchar(255) NOT NULL,
  `atf_filesize` int(11) DEFAULT NULL,
  `atf_filetype` varchar(50) NOT NULL,
  `atf_location` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

/*Data for the table `attachment` */

insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'1485318881_eTicket_GNLREQ.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881),(2,'1485318881_eTicket_KEGBAF.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881),(3,'1485318881_eTicket_DVWQIV_165908.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881),(9,'1486839310_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','WORKPLAN',8,1486839310,8,1486839310),(19,'1487435691_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','PPU_EMS_SRC',8,1487435691,8,1487435691),(21,'1488016931_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','PPU_EMS_SRC',8,1488016931,8,1488016931),(28,'1488831200_160328125755Form_SA-Izin_Lingkungan_2016_15-01-26.xls',NULL,'xls','PPU_EMS_SRC',8,1488831200,8,1488831200),(34,'1488991628_160328125755Form_SA-Izin_Lingkungan_2016_15-01-26.xls',NULL,'xls','PPU_TECH_PROV',8,1488991628,8,1488991628),(35,'1488991704_160328125755Form_SA-Izin_Lingkungan_2016_15-01-26.xls',NULL,'xls','PPU_TECH_PROV',8,1488991704,8,1488991704),(40,'1488992001_160328125755Form_SA-Izin_Lingkungan_2016_15-01-26.xls',NULL,'xls','PPU_TECH_PROV',8,1488992001,8,1488992001),(56,'1493058301_PROSENTASE_NERACA_LB3.xls',NULL,'xls','PPA_SETUP_CERT_NUM',8,1493058302,8,1493058302),(77,'1493203461_Attachment1.xls',NULL,'xls','ENV_PERM_DSTRCT',8,1493203462,8,1493203462),(78,'1493203462_Attachment2.xls',NULL,'xls','ENV_PERM_PRVNCE',8,1493203463,8,1493203463),(79,'1493203463_Attachment3.xls',NULL,'xls','ENV_PERM_MNSTRY',8,1493203464,8,1493203464),(80,'1493203499_Attachment2.xls',NULL,'xls','ENV_PERM_DSTRCT',8,1493203500,8,1493203500),(81,'1493203500_Attachment3.xls',NULL,'xls','ENV_PERM_PRVNCE',8,1493203501,8,1493203501),(82,'1493203501_Attachment4.xls',NULL,'xls','ENV_PERM_MNSTRY',8,1493203502,8,1493203502),(83,'1493203531_Attachment3.xls',NULL,'xls','ENV_PERM_DSTRCT',8,1493203532,8,1493203532),(84,'1493203533_Attachment4.xls',NULL,'xls','ENV_PERM_PRVNCE',8,1493203534,8,1493203534),(85,'1493203534_Attachment5.xls',NULL,'xls','ENV_PERM_MNSTRY',8,1493203535,8,1493203535),(86,'1493203567_Attachment4.xls',NULL,'xls','ENV_PERM_DSTRCT',8,1493203568,8,1493203568),(87,'1493203568_Attachment5.xls',NULL,'xls','ENV_PERM_PRVNCE',8,1493203569,8,1493203569),(88,'1493203569_Attachment1.xls',NULL,'xls','ENV_PERM_MNSTRY',8,1493203570,8,1493203570),(89,'1493203597_Attachment5.xls',NULL,'xls','ENV_PERM_DSTRCT',8,1493203598,8,1493203598),(90,'1493203598_Attachment1.xls',NULL,'xls','ENV_PERM_PRVNCE',8,1493203599,8,1493203599),(91,'1493203599_Attachment2.xls',NULL,'xls','ENV_PERM_MNSTRY',8,1493203600,8,1493203600),(92,'1493203627_Attachment1.xls',NULL,'xls','ENV_PERM_DTL',8,1493203628,8,1493203628),(93,'1493203652_Attachment2.xls',NULL,'xls','ENV_PERM_DTL',8,1493203653,8,1493203653),(94,'1493203675_Attachment3.xls',NULL,'xls','ENV_PERM_DTL',8,1493203676,8,1493203676),(95,'1493203904_Attachment1.xls',NULL,'xls','SKKO_DOCUMENT',8,1493203905,8,1493203905),(96,'1493203905_Attachment2.xls',NULL,'xls','SKKO_DOCUMENT',8,1493203906,8,1493203906),(97,'1493203907_Attachment3.xls',NULL,'xls','SKKO_DOCUMENT',8,1493203908,8,1493203908),(100,'1496853908_Attachment1.xls',NULL,'xls','EMER_RESPONSE',8,1496853909,8,1496853909),(103,'1496898292_Attachment1.xls',NULL,'xls','SAFETY_CAMP',8,1496898293,8,1496898293),(104,'1496898358_Attachment1.xls',NULL,'xls','SAFETY_CAMP',8,1496898359,8,1496898359),(105,'1498749886_Attachment1.xls',NULL,'xls','PROJECT_TRACKING',8,1498749887,8,1498749887),(106,'1498749887_Attachment2.xls',NULL,'xls','PROJECT_TRACKING',8,1498749888,8,1498749888),(107,'1498749888_Attachment3.xls',NULL,'xls','PROJECT_TRACKING',8,1498749889,8,1498749889),(108,'1498797570_Attachment5.xls',NULL,'xls','SLO_TOOLS',8,1498797572,8,1498797572),(109,'1498797572_Attachment4.xls',NULL,'xls','SLO_TOOLS',8,1498797573,8,1498797573),(110,'1498798166_Attachment5.xls',NULL,'xls','COMPETENCY_CERTIFICATION',8,1498798167,8,1498798167),(111,'1498798167_Attachment4.xls',NULL,'xls','COMPETENCY_CERTIFICATION',8,1498798168,8,1498798168),(112,'1498805071_Attachment5.xls',NULL,'xls','WORKING_PERMIT',8,1498805072,8,1498805072),(113,'1498805073_Attachment4.xls',NULL,'xls','WORKING_PERMIT',8,1498805074,8,1498805074),(116,'1498808428_Attachment5.xls',NULL,'xls','HOUSEKEEPING_IMPLEMENTATION',8,1498808429,8,1498808429),(117,'1498808429_Attachment4.xls',NULL,'xls','HOUSEKEEPING_IMPLEMENTATION',8,1498808430,8,1498808430),(118,'1499176698_Attachment5.xls',NULL,'xls','SLO_GENERATOR',8,1499176699,8,1499176699),(119,'1499176699_Attachment4.xls',NULL,'xls','SLO_GENERATOR',8,1499176700,8,1499176700),(120,'1499176700_Attachment3.xls',NULL,'xls','SLO_GENERATOR',8,1499176701,8,1499176701),(121,'1499177135_Attachment3.xls',NULL,'xls','SLO_GENERATOR',8,1499177136,8,1499177136),(122,'1499177136_Attachment2.xls',NULL,'xls','SLO_GENERATOR',8,1499177137,8,1499177137),(123,'1499177137_Attachment1.xls',NULL,'xls','SLO_GENERATOR',8,1499177138,8,1499177138),(124,'1499177166_Attachment4.xls',NULL,'xls','SLO_GENERATOR',8,1499177167,8,1499177167),(125,'1499178331_Attachment3.xls',NULL,'xls','COMPETENCY_CERTIFICATION',8,1499178332,8,1499178332),(126,'1499178332_Attachment2.xls',NULL,'xls','COMPETENCY_CERTIFICATION',8,1499178333,8,1499178333),(127,'1499178333_Attachment1.xls',NULL,'xls','COMPETENCY_CERTIFICATION',8,1499178334,8,1499178334),(128,'1499180149_Attachment5.xls',NULL,'xls','BEYOND_OBEDIENCE',8,1499180150,8,1499180150),(129,'1499180169_Attachment4.xls',NULL,'xls','BEYOND_OBEDIENCE',8,1499180170,8,1499180170),(130,'1499180823_Attachment5.xls',NULL,'xls','BEYOND_OBEDIENCE_PROGRAM',8,1499180824,8,1499180824),(131,'1499180896_Attachment4.xls',NULL,'xls','BEYOND_OBEDIENCE_PROGRAM',8,1499180897,8,1499180897),(132,'1499181062_Attachment3.xls',NULL,'xls','BEYOND_OBEDIENCE_PROGRAM',8,1499181063,8,1499181063),(135,'1499182950_Attachment5.xls',NULL,'xls','BEYOND_OBEDIENCE_COMDEV',8,1499182951,8,1499182951),(136,'1499182951_Attachment4.xls',NULL,'xls','BEYOND_OBEDIENCE_COMDEV',8,1499182952,8,1499182952),(137,'1499185109_Attachment5.xls',NULL,'xls','BEYOND_OBEDIENCE_PROGRAM',8,1499185110,8,1499185110),(138,'1499185110_Attachment4.xls',NULL,'xls','BEYOND_OBEDIENCE_PROGRAM',8,1499185111,8,1499185111),(139,'1500306369_Attachment2.xls',NULL,'xls','ENV_PERM_DTL',8,1500306370,8,1500306370),(140,'1500306984_Attachment3.xls',NULL,'xls','ENV_PERM_DSTRCT',8,1500306985,8,1500306985),(141,'1500306985_Attachment5.xls',NULL,'xls','ENV_PERM_PRVNCE',8,1500306986,8,1500306986),(142,'1500306986_Attachment4.xls',NULL,'xls','ENV_PERM_MNSTRY',8,1500306987,8,1500306987),(143,'1500562623_Attachment5.xls',NULL,'xls','PPU_EMS_SRC',8,1500562624,8,1500562624),(144,'1500648741_Attachment3.xls',NULL,'xls','PPU_EMS_SRC',8,1500648742,8,1500648742),(145,'1500782994_Attachment4.xls',NULL,'xls','PPU_LOAD_CALC_GRK',8,1500782995,8,1500782995),(146,'1500782995_Attachment2.xls',NULL,'xls','PPU_LOAD_CALC_GRK',8,1500782996,8,1500782996),(147,'1500783060_Attachment1.xls',NULL,'xls','PPU_LOAD_CALC_GRK',8,1500783061,8,1500783061),(148,'1500783062_Attachment4.xls',NULL,'xls','PPU_LOAD_CALC_GRK',8,1500783063,8,1500783063),(149,'1500965848_Attachment3.xls',NULL,'xls','PPU_TECH_PROV',8,1500965849,8,1500965849),(150,'1500965849_Attachment2.xls',NULL,'xls','PPU_TECH_PROV',8,1500965850,8,1500965850),(151,'1508004481_3_PROSENTASE_NERACA_LB3.xls',NULL,'xls','PLB3_CHECKLIST',8,1508004482,8,1508004482),(152,'1508072930_3_PROSENTASE_NERACA_LB3.xls',NULL,'xls','PLB3_CHECKLIST',8,1508072931,8,1508072931),(153,'1508072931_NERACA_LB3_2016,_rev_2014.xls',NULL,'xls','PLB3_CHECKLIST',8,1508072932,8,1508072932),(155,'1511512470_Attachment4.xls',NULL,'xls','K3L_ACTIVITY',8,1511512471,8,1511512471),(156,'1511513904_Attachment5.xls',NULL,'xls','MAT_LEV',8,1511513905,8,1511513905);

/*Table structure for table `attachment_owner` */

DROP TABLE IF EXISTS `attachment_owner`;

CREATE TABLE `attachment_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_id` int(11) NOT NULL,
  `atfo_module_code` varchar(50) NOT NULL,
  `atfo_module_pk` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_attachment_owner_attachment` (`attachment_id`),
  CONSTRAINT `FK_attachment_owner_attachment` FOREIGN KEY (`attachment_id`) REFERENCES `attachment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

/*Data for the table `attachment_owner` */

insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,1,'WORKPLAN',1,8,1485318881,8,1485318881),(8,2,'WORKPLAN',2,8,1485318881,8,1485318881),(9,3,'WORKPLAN',6,8,1485318881,8,1485318881),(15,9,'WORKPLAN',7,8,1486839310,8,1486839310),(21,19,'PPU_EMS_SRC',1,8,1487435691,8,1487435691),(23,21,'PPU_EMS_SRC',2,8,1488016931,8,1488016931),(30,28,'PPU_EMS_SRC',5,8,1488831200,8,1488831200),(36,34,'PPU_TECH_PROV',56,8,1488991628,8,1488991628),(37,35,'PPU_TECH_PROV',55,8,1488991704,8,1488991704),(42,40,'PPU_TECH_PROV',57,8,1488992001,8,1488992001),(57,56,'PPA_SETUP_CERT_NUM',1,8,1493058302,8,1493058302),(78,77,'ENV_PERM_DSTRCT',4,8,1493203462,8,1493203462),(79,78,'ENV_PERM_PRVNCE',4,8,1493203463,8,1493203463),(80,79,'ENV_PERM_MNSTRY',4,8,1493203464,8,1493203464),(81,80,'ENV_PERM_DSTRCT',5,8,1493203500,8,1493203500),(82,81,'ENV_PERM_PRVNCE',5,8,1493203501,8,1493203501),(83,82,'ENV_PERM_MNSTRY',5,8,1493203502,8,1493203502),(84,83,'ENV_PERM_DSTRCT',6,8,1493203532,8,1493203532),(85,84,'ENV_PERM_PRVNCE',6,8,1493203534,8,1493203534),(86,85,'ENV_PERM_MNSTRY',6,8,1493203535,8,1493203535),(87,86,'ENV_PERM_DSTRCT',7,8,1493203568,8,1493203568),(88,87,'ENV_PERM_PRVNCE',7,8,1493203569,8,1493203569),(89,88,'ENV_PERM_MNSTRY',7,8,1493203570,8,1493203570),(90,89,'ENV_PERM_DSTRCT',8,8,1493203598,8,1493203598),(91,90,'ENV_PERM_PRVNCE',8,8,1493203599,8,1493203599),(92,91,'ENV_PERM_MNSTRY',8,8,1493203600,8,1493203600),(93,92,'ENV_PERM_DTL',16,8,1493203628,8,1493203628),(94,93,'ENV_PERM_DTL',17,8,1493203653,8,1493203653),(95,94,'ENV_PERM_DTL',18,8,1493203676,8,1493203676),(96,95,'SKKO_DOCUMENT',2,8,1493203905,8,1493203905),(97,96,'SKKO_DOCUMENT',3,8,1493203906,8,1493203906),(98,97,'SKKO_DOCUMENT',4,8,1493203908,8,1493203908),(101,100,'EMER_RESPONSE',3,8,1496853909,8,1496853909),(104,103,'SAFETY_CAMP',3,8,1496898293,8,1496898293),(105,104,'SAFETY_CAMP',4,8,1496898359,8,1496898359),(106,105,'PROJECT_TRACKING',2,8,1498749887,8,1498749887),(107,106,'PROJECT_TRACKING',2,8,1498749888,8,1498749888),(108,107,'PROJECT_TRACKING',2,8,1498749889,8,1498749889),(109,108,'SLO_TOOLS',4,8,1498797572,8,1498797572),(110,109,'SLO_TOOLS',4,8,1498797573,8,1498797573),(111,110,'COMPETENCY_CERTIFICATION',1,8,1498798167,8,1498798167),(112,111,'COMPETENCY_CERTIFICATION',1,8,1498798168,8,1498798168),(113,112,'WORKING_PERMIT',2,8,1498805072,8,1498805072),(114,113,'WORKING_PERMIT',2,8,1498805074,8,1498805074),(117,116,'HOUSEKEEPING_IMPLEMENTATION',6,8,1498808429,8,1498808429),(118,117,'HOUSEKEEPING_IMPLEMENTATION',6,8,1498808430,8,1498808430),(119,118,'SLO_GENERATOR',3,8,1499176699,8,1499176699),(120,119,'SLO_GENERATOR',3,8,1499176700,8,1499176700),(121,120,'SLO_GENERATOR',3,8,1499176701,8,1499176701),(122,121,'SLO_GENERATOR',5,8,1499177136,8,1499177136),(123,122,'SLO_GENERATOR',5,8,1499177137,8,1499177137),(124,123,'SLO_GENERATOR',5,8,1499177138,8,1499177138),(125,124,'SLO_GENERATOR',6,8,1499177167,8,1499177167),(126,125,'COMPETENCY_CERTIFICATION',2,8,1499178332,8,1499178332),(127,126,'COMPETENCY_CERTIFICATION',2,8,1499178333,8,1499178333),(128,127,'COMPETENCY_CERTIFICATION',2,8,1499178334,8,1499178334),(129,128,'BEYOND_OBEDIENCE',23,8,1499180150,8,1499180150),(130,129,'BEYOND_OBEDIENCE',24,8,1499180170,8,1499180170),(131,130,'BEYOND_OBEDIENCE_PROGRAM',8,8,1499180824,8,1499180824),(132,131,'BEYOND_OBEDIENCE_PROGRAM',8,8,1499180898,8,1499180898),(136,135,'BEYOND_OBEDIENCE_COMDEV',5,8,1499182951,8,1499182951),(137,136,'BEYOND_OBEDIENCE_COMDEV',5,8,1499182952,8,1499182952),(138,137,'BEYOND_OBEDIENCE_PROGRAM',11,8,1499185110,8,1499185110),(139,138,'BEYOND_OBEDIENCE_PROGRAM',11,8,1499185111,8,1499185111),(140,139,'ENV_PERM_DTL',19,8,1500306370,8,1500306370),(141,140,'ENV_PERM_DSTRCT',9,8,1500306985,8,1500306985),(142,141,'ENV_PERM_PRVNCE',9,8,1500306986,8,1500306986),(143,142,'ENV_PERM_MNSTRY',9,8,1500306987,8,1500306987),(144,143,'PPU_EMS_SRC',10,8,1500562624,8,1500562624),(145,144,'PPU_EMS_SRC',11,8,1500648742,8,1500648742),(146,145,'PPU_LOAD_CALC_GRK',5,8,1500782995,8,1500782995),(147,146,'PPU_LOAD_CALC_GRK',6,8,1500782996,8,1500782996),(148,147,'PPU_LOAD_CALC_GRK',7,8,1500783061,8,1500783061),(149,148,'PPU_LOAD_CALC_GRK',8,8,1500783063,8,1500783063),(150,149,'PPU_TECH_PROV',58,8,1500965849,8,1500965849),(151,150,'PPU_TECH_PROV',59,8,1500965850,8,1500965850),(152,151,'PLB3_CHECKLIST',54,8,1508004482,8,1508004482),(153,152,'PLB3_CHECKLIST',68,8,1508072931,8,1508072931),(154,153,'PLB3_CHECKLIST',71,8,1508072932,8,1508072932),(156,155,'K3L_ACTIVITY',5,8,1511512471,8,1511512471),(157,156,'MAT_LEV',1,8,1511513905,8,1511513905);

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('Administrator','8',NULL),('Operator','12',NULL),('project-tracking','8',NULL),('unggah-umum','8',NULL);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('Administrator',4,'Level akses admin',NULL,NULL,NULL,NULL),('aktivitas-k3l',2,NULL,NULL,NULL,NULL,NULL),('apd-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('apd-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('apd-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('apd-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('apd-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('apd-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-ajax-codeset',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-create',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-delete',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-export',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-index',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-update',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-comdev-view',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-create',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-delete',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-export',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-index',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-ajax-codeset',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-create',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-delete',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-export',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-index',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-update',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-program-view',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-update',1,NULL,NULL,NULL,NULL,NULL),('beyond-obedience-view',1,NULL,NULL,NULL,NULL,NULL),('bo-assessment-aspect-create',1,NULL,NULL,NULL,NULL,NULL),('bo-assessment-aspect-delete',1,NULL,NULL,NULL,NULL,NULL),('bo-assessment-aspect-index',1,NULL,NULL,NULL,NULL,NULL),('bo-assessment-aspect-update',1,NULL,NULL,NULL,NULL,NULL),('bo-assessment-aspect-view',1,NULL,NULL,NULL,NULL,NULL),('boas-criteria-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('boc-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('bop-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-realization',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('budget-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('checklist-hydrant',2,NULL,NULL,NULL,NULL,NULL),('codeset',2,NULL,NULL,NULL,NULL,NULL),('codeset-create',1,NULL,NULL,NULL,NULL,NULL),('codeset-delete',1,NULL,NULL,NULL,NULL,NULL),('codeset-index',1,NULL,NULL,NULL,NULL,NULL),('codeset-update',1,NULL,NULL,NULL,NULL,NULL),('codeset-view',1,NULL,NULL,NULL,NULL,NULL),('common-upload-create',1,NULL,NULL,NULL,NULL,NULL),('common-upload-delete',1,NULL,NULL,NULL,NULL,NULL),('common-upload-index',1,NULL,NULL,NULL,NULL,NULL),('common-upload-update',1,NULL,NULL,NULL,NULL,NULL),('competency-certification-create',1,NULL,NULL,NULL,NULL,NULL),('competency-certification-delete',1,NULL,NULL,NULL,NULL,NULL),('competency-certification-export',1,NULL,NULL,NULL,NULL,NULL),('competency-certification-index',1,NULL,NULL,NULL,NULL,NULL),('competency-certification-update',1,NULL,NULL,NULL,NULL,NULL),('competency-certification-view',1,NULL,NULL,NULL,NULL,NULL),('contract-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('contract-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('contract-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('contract-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('contract-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('contract-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('data-lingkungan-kerja',2,NULL,NULL,NULL,NULL,NULL),('detector-alarm',2,NULL,NULL,NULL,NULL,NULL),('emergency-response-create',1,NULL,NULL,NULL,NULL,NULL),('emergency-response-delete',1,NULL,NULL,NULL,NULL,NULL),('emergency-response-export',1,NULL,NULL,NULL,NULL,NULL),('emergency-response-index',1,NULL,NULL,NULL,NULL,NULL),('emergency-response-update',1,NULL,NULL,NULL,NULL,NULL),('emergency-response-view',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-company-profile-create',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-company-profile-delete',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-company-profile-export',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-company-profile-index',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-company-profile-update',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-company-profile-view',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-create',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-delete',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-detail-create',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-detail-index',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-detail-update',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-detail-view',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-export',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-index',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-report-create',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-report-delete',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-report-index',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-report-update',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-report-view',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-update',1,NULL,NULL,NULL,NULL,NULL),('environment-permit-view',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-create',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-date',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-delete',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-export',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-index',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-update',1,NULL,NULL,NULL,NULL,NULL),('fire-detector-view',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-implementation-create',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-implementation-delete',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-implementation-export',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-implementation-index',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-implementation-update',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-implementation-view',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-question-create',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-question-delete',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-question-index',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-question-update',1,NULL,NULL,NULL,NULL,NULL),('housekeeping-question-view',1,NULL,NULL,NULL,NULL,NULL),('hq-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('hydrant-checklist-create',1,NULL,NULL,NULL,NULL,NULL),('hydrant-checklist-delete',1,NULL,NULL,NULL,NULL,NULL),('hydrant-checklist-export',1,NULL,NULL,NULL,NULL,NULL),('hydrant-checklist-index',1,NULL,NULL,NULL,NULL,NULL),('hydrant-checklist-update',1,NULL,NULL,NULL,NULL,NULL),('hydrant-checklist-view',1,NULL,NULL,NULL,NULL,NULL),('hydrant-question-create',1,NULL,NULL,NULL,NULL,NULL),('hydrant-question-delete',1,NULL,NULL,NULL,NULL,NULL),('hydrant-question-index',1,NULL,NULL,NULL,NULL,NULL),('hydrant-question-update',1,NULL,NULL,NULL,NULL,NULL),('hydrant-question-view',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-create',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-delete',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-detail-create',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-detail-index',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-detail-update',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-detail-view',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-export',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-index',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-update',1,NULL,NULL,NULL,NULL,NULL),('hydrant-testing-view',1,NULL,NULL,NULL,NULL,NULL),('implementasi-housekeeping',2,NULL,NULL,NULL,NULL,NULL),('important-phone-number-create',1,NULL,NULL,NULL,NULL,NULL),('important-phone-number-delete',1,NULL,NULL,NULL,NULL,NULL),('important-phone-number-export',1,NULL,NULL,NULL,NULL,NULL),('important-phone-number-index',1,NULL,NULL,NULL,NULL,NULL),('important-phone-number-update',1,NULL,NULL,NULL,NULL,NULL),('important-phone-number-view',1,NULL,NULL,NULL,NULL,NULL),('izin-kerja',2,NULL,NULL,NULL,NULL,NULL),('izin-lingkungan',2,NULL,NULL,NULL,NULL,NULL),('izin-lingkungan-detail',2,NULL,NULL,NULL,NULL,NULL),('izin-lingkungan-laporan',2,NULL,NULL,NULL,NULL,NULL),('izin-lingkungan-profil-perusahaan',2,NULL,NULL,NULL,NULL,NULL),('k3-supervision-create',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-delete',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-detail-create',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-detail-index',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-detail-update',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-detail-view',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-export',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-index',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-update',1,NULL,NULL,NULL,NULL,NULL),('k3-supervision-view',1,NULL,NULL,NULL,NULL,NULL),('k3l-activity-create',1,NULL,NULL,NULL,NULL,NULL),('k3l-activity-delete',1,NULL,NULL,NULL,NULL,NULL),('k3l-activity-export',1,NULL,NULL,NULL,NULL,NULL),('k3l-activity-index',1,NULL,NULL,NULL,NULL,NULL),('k3l-activity-update',1,NULL,NULL,NULL,NULL,NULL),('k3l-activity-view',1,NULL,NULL,NULL,NULL,NULL),('k3l-problem-create',1,NULL,NULL,NULL,NULL,NULL),('k3l-problem-delete',1,NULL,NULL,NULL,NULL,NULL),('k3l-problem-export',1,NULL,NULL,NULL,NULL,NULL),('k3l-problem-index',1,NULL,NULL,NULL,NULL,NULL),('k3l-problem-update',1,NULL,NULL,NULL,NULL,NULL),('k3l-problem-view',1,NULL,NULL,NULL,NULL,NULL),('kecelakaan-kerja',2,NULL,NULL,NULL,NULL,NULL),('log',2,NULL,NULL,NULL,NULL,NULL),('log-dirty-delete-all',1,NULL,NULL,NULL,NULL,NULL),('log-dirty-index',1,NULL,NULL,NULL,NULL,NULL),('login-history-delete-all',1,NULL,NULL,NULL,NULL,NULL),('login-history-index',1,NULL,NULL,NULL,NULL,NULL),('loto-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('loto-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('loto-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('loto-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('loto-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('loto-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('maturity-level',2,NULL,NULL,NULL,NULL,NULL),('maturity-level-create',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-delete',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-export',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-index',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-question-create',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-question-delete',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-question-index',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-question-update',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-question-view',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-title-ajax-create',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-title-create',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-title-delete',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-title-index',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-title-update',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-title-view',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-update',1,NULL,NULL,NULL,NULL,NULL),('maturity-level-view',1,NULL,NULL,NULL,NULL,NULL),('melebihi-ketaatan',2,NULL,NULL,NULL,NULL,NULL),('monitoring-anggaran',2,NULL,NULL,NULL,NULL,NULL),('monitoring-apar',2,NULL,NULL,NULL,NULL,NULL),('monitoring-apar-create',1,NULL,NULL,NULL,NULL,NULL),('monitoring-apar-delete',1,NULL,NULL,NULL,NULL,NULL),('monitoring-apar-export',1,NULL,NULL,NULL,NULL,NULL),('monitoring-apar-index',1,NULL,NULL,NULL,NULL,NULL),('monitoring-apar-update',1,NULL,NULL,NULL,NULL,NULL),('monitoring-apar-view',1,NULL,NULL,NULL,NULL,NULL),('monitoring-apd',2,NULL,NULL,NULL,NULL,NULL),('monitoring-jam-kerja',2,NULL,NULL,NULL,NULL,NULL),('monitoring-kontrak',2,NULL,NULL,NULL,NULL,NULL),('monitoring-loto',2,NULL,NULL,NULL,NULL,NULL),('monitoring-p2k3',2,NULL,NULL,NULL,NULL,NULL),('monitoring-p3k',2,NULL,NULL,NULL,NULL,NULL),('monitoring-sprinkle',2,NULL,NULL,NULL,NULL,NULL),('nomor-telepon-penting',2,NULL,NULL,NULL,NULL,NULL),('Operator',3,'Level akses operator',NULL,NULL,NULL,NULL),('p2k3-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-detail-create',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-detail-index',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-detail-update',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-detail-view',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('p2k3-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-detail-create',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-detail-index',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-detail-update',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-detail-view',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('p3k-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('pembangkit-listrik',2,NULL,NULL,NULL,NULL,NULL),('pengawasan-k3',2,NULL,NULL,NULL,NULL,NULL),('pengendalian-pencemaran-air',2,NULL,NULL,NULL,NULL,NULL),('pengguna',2,NULL,NULL,NULL,NULL,NULL),('pengujian-hydrant',2,NULL,NULL,NULL,NULL,NULL),('permasalahan-k3l',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-housekeeping',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-hydrant',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-maturity-level',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-melebihi-ketaatan',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-pengendalian-pencemaran-air',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-plb3-self-assessment',2,NULL,NULL,NULL,NULL,NULL),('pertanyaan-smk3',2,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-detail-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-detail-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-detail-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-detail-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-export',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-balance-sheet-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-ceklist',2,NULL,NULL,NULL,NULL,NULL),('plb3-ceklist-detail',2,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-detail-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-detail-export',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-detail-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-detail-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-detail-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-checklist-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-neraca',2,NULL,NULL,NULL,NULL,NULL),('plb3-neraca-detail',2,NULL,NULL,NULL,NULL,NULL),('plb3-pertanyaan',2,NULL,NULL,NULL,NULL,NULL),('plb3-question-ajax-question-type',1,NULL,NULL,NULL,NULL,NULL),('plb3-question-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-question-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-question-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-question-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-question-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-company-profile-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-company-profile-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-company-profile-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-company-profile-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-company-profile-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-form-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-form-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-form-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-form-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-form-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-question-create',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-question-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-question-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-question-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-sa-question-view',1,NULL,NULL,NULL,NULL,NULL),('plb3-self-assessment',2,NULL,NULL,NULL,NULL,NULL),('plb3-self-assessment-delete',1,NULL,NULL,NULL,NULL,NULL),('plb3-self-assessment-export',1,NULL,NULL,NULL,NULL,NULL),('plb3-self-assessment-index',1,NULL,NULL,NULL,NULL,NULL),('plb3-self-assessment-update',1,NULL,NULL,NULL,NULL,NULL),('plb3-self-assessment-view',1,NULL,NULL,NULL,NULL,NULL),('power-plant-ajax-plant',1,NULL,NULL,NULL,NULL,NULL),('power-plant-create',1,NULL,NULL,NULL,NULL,NULL),('power-plant-delete',1,NULL,NULL,NULL,NULL,NULL),('power-plant-index',1,NULL,NULL,NULL,NULL,NULL),('power-plant-update',1,NULL,NULL,NULL,NULL,NULL),('power-plant-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-export',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-monitoring-point-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-monitoring-point-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-monitoring-point-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-monitoring-point-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-monitoring-point-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-report-bm-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-report-bm-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-report-bm-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-report-bm-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-report-bm-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-ba-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-export',1,NULL,NULL,NULL,NULL,NULL),('ppa-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-laboratorium-accreditation-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-laboratorium-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load-actual',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load-decrease-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load-decrease-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load-decrease-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load-decrease-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-pollution-load-decrease-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-question-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-question-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-question-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-question-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-question-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-report-bm-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-report-bm-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-report-bm-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-report-bm-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-report-bm-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-setup-permit-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-setup-permit-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-setup-permit-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-setup-permit-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-setup-permit-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-technical-provision-create',1,NULL,NULL,NULL,NULL,NULL),('ppa-technical-provision-delete',1,NULL,NULL,NULL,NULL,NULL),('ppa-technical-provision-index',1,NULL,NULL,NULL,NULL,NULL),('ppa-technical-provision-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-technical-provision-view',1,NULL,NULL,NULL,NULL,NULL),('ppa-update',1,NULL,NULL,NULL,NULL,NULL),('ppa-view',1,NULL,NULL,NULL,NULL,NULL),('ppu',2,NULL,NULL,NULL,NULL,NULL),('ppu-ambient',2,NULL,NULL,NULL,NULL,NULL),('ppu-ambient-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-ambient-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-ambient-export',1,NULL,NULL,NULL,NULL,NULL),('ppu-ambient-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-ambient-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-ambient-view',1,NULL,NULL,NULL,NULL,NULL),('ppu-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-load-calc',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-load-grk-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-load-grk-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-load-grk-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-load-grk-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-load-grk-view',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-source-ajax-emission',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-source-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-source-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-source-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-source-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-emission-source-view',1,NULL,NULL,NULL,NULL,NULL),('ppu-export',1,NULL,NULL,NULL,NULL,NULL),('ppu-export-cems',1,NULL,NULL,NULL,NULL,NULL),('ppu-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-ketaatan-parameter-ambient',2,NULL,NULL,NULL,NULL,NULL),('ppu-ketaatan-parameter-pelaporan-bm',2,NULL,NULL,NULL,NULL,NULL),('ppu-ketentuan-teknis',2,NULL,NULL,NULL,NULL,NULL),('ppu-parameter-obligation-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-parameter-obligation-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-parameter-obligation-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-parameter-obligation-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-parameter-obligation-view',1,NULL,NULL,NULL,NULL,NULL),('ppu-pelaporan-bm-cems',2,NULL,NULL,NULL,NULL,NULL),('ppu-pelaporan-parameter-cems',2,NULL,NULL,NULL,NULL,NULL),('ppu-perhitungan-beban-emisi-grk',2,NULL,NULL,NULL,NULL,NULL),('ppu-pertanyaan',2,NULL,NULL,NULL,NULL,NULL),('ppu-pollution-load',1,NULL,NULL,NULL,NULL,NULL),('ppu-question-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-question-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-question-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-question-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-question-view',1,NULL,NULL,NULL,NULL,NULL),('ppu-sumber-emisi',2,NULL,NULL,NULL,NULL,NULL),('ppu-technical-provision-create',1,NULL,NULL,NULL,NULL,NULL),('ppu-technical-provision-delete',1,NULL,NULL,NULL,NULL,NULL),('ppu-technical-provision-index',1,NULL,NULL,NULL,NULL,NULL),('ppu-technical-provision-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-technical-provision-view',1,NULL,NULL,NULL,NULL,NULL),('ppu-titik-pemantauan-ambient',2,NULL,NULL,NULL,NULL,NULL),('ppu-update',1,NULL,NULL,NULL,NULL,NULL),('ppu-view',1,NULL,NULL,NULL,NULL,NULL),('ppua-monitoring-point-create',1,NULL,NULL,NULL,NULL,NULL),('ppua-monitoring-point-delete',1,NULL,NULL,NULL,NULL,NULL),('ppua-monitoring-point-index',1,NULL,NULL,NULL,NULL,NULL),('ppua-monitoring-point-update',1,NULL,NULL,NULL,NULL,NULL),('ppua-monitoring-point-view',1,NULL,NULL,NULL,NULL,NULL),('ppua-parameter-obligation-create',1,NULL,NULL,NULL,NULL,NULL),('ppua-parameter-obligation-delete',1,NULL,NULL,NULL,NULL,NULL),('ppua-parameter-obligation-index',1,NULL,NULL,NULL,NULL,NULL),('ppua-parameter-obligation-update',1,NULL,NULL,NULL,NULL,NULL),('ppua-parameter-obligation-view',1,NULL,NULL,NULL,NULL,NULL),('ppucems-report-bm-ajax-parameter',1,NULL,NULL,NULL,NULL,NULL),('ppucems-report-bm-create',1,NULL,NULL,NULL,NULL,NULL),('ppucems-report-bm-delete',1,NULL,NULL,NULL,NULL,NULL),('ppucems-report-bm-index',1,NULL,NULL,NULL,NULL,NULL),('ppucems-report-bm-update',1,NULL,NULL,NULL,NULL,NULL),('ppucems-report-bm-view',1,NULL,NULL,NULL,NULL,NULL),('ppucemsrb-parameter-report-create',1,NULL,NULL,NULL,NULL,NULL),('ppucemsrb-parameter-report-delete',1,NULL,NULL,NULL,NULL,NULL),('ppucemsrb-parameter-report-index',1,NULL,NULL,NULL,NULL,NULL),('ppucemsrb-parameter-report-update',1,NULL,NULL,NULL,NULL,NULL),('ppucemsrb-parameter-report-view',1,NULL,NULL,NULL,NULL,NULL),('profil-pengguna',2,NULL,NULL,NULL,NULL,NULL),('profil-perusahaan',2,NULL,NULL,NULL,NULL,NULL),('profile-create',1,NULL,NULL,NULL,NULL,NULL),('profile-delete',1,NULL,NULL,NULL,NULL,NULL),('profile-index',1,NULL,NULL,NULL,NULL,NULL),('profile-update',1,NULL,NULL,NULL,NULL,NULL),('profile-view',1,NULL,NULL,NULL,NULL,NULL),('program-melebihi-ketaatan',2,NULL,NULL,NULL,NULL,NULL),('project-tracking',2,NULL,NULL,NULL,NULL,NULL),('project-tracking-create',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-delete',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-detail-create',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-detail-index',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-detail-update',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-detail-view',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-export',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-index',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-update',1,NULL,NULL,NULL,NULL,NULL),('project-tracking-view',1,NULL,NULL,NULL,NULL,NULL),('rencana-kerja',2,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-ajax-create',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-ajax-search',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-create',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-delete',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-index',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-update',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-attribute-view',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-create',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-delete',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-export',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-index',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-item-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-kitsbs',2,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-target-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-update',1,NULL,NULL,NULL,NULL,NULL),('roadmap-k3l-view',1,NULL,NULL,NULL,NULL,NULL),('safety-campaign',2,NULL,NULL,NULL,NULL,NULL),('safety-campaign-create',1,NULL,NULL,NULL,NULL,NULL),('safety-campaign-delete',1,NULL,NULL,NULL,NULL,NULL),('safety-campaign-export',1,NULL,NULL,NULL,NULL,NULL),('safety-campaign-index',1,NULL,NULL,NULL,NULL,NULL),('safety-campaign-update',1,NULL,NULL,NULL,NULL,NULL),('safety-campaign-view',1,NULL,NULL,NULL,NULL,NULL),('sector-create',1,NULL,NULL,NULL,NULL,NULL),('sector-delete',1,NULL,NULL,NULL,NULL,NULL),('sector-index',1,NULL,NULL,NULL,NULL,NULL),('sector-update',1,NULL,NULL,NULL,NULL,NULL),('sector-view',1,NULL,NULL,NULL,NULL,NULL),('sektor',2,NULL,NULL,NULL,NULL,NULL),('sertifikasi-kompetensi',2,NULL,NULL,NULL,NULL,NULL),('skko',2,NULL,NULL,NULL,NULL,NULL),('skko-create',1,NULL,NULL,NULL,NULL,NULL),('skko-delete',1,NULL,NULL,NULL,NULL,NULL),('skko-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('skko-index',1,NULL,NULL,NULL,NULL,NULL),('skko-update',1,NULL,NULL,NULL,NULL,NULL),('skko-view',1,NULL,NULL,NULL,NULL,NULL),('slo-generator-create',1,NULL,NULL,NULL,NULL,NULL),('slo-generator-delete',1,NULL,NULL,NULL,NULL,NULL),('slo-generator-export',1,NULL,NULL,NULL,NULL,NULL),('slo-generator-index',1,NULL,NULL,NULL,NULL,NULL),('slo-generator-update',1,NULL,NULL,NULL,NULL,NULL),('slo-generator-view',1,NULL,NULL,NULL,NULL,NULL),('slo-pembangkit',2,NULL,NULL,NULL,NULL,NULL),('slo-peralatan',2,NULL,NULL,NULL,NULL,NULL),('slo-tools-create',1,NULL,NULL,NULL,NULL,NULL),('slo-tools-delete',1,NULL,NULL,NULL,NULL,NULL),('slo-tools-export',1,NULL,NULL,NULL,NULL,NULL),('slo-tools-index',1,NULL,NULL,NULL,NULL,NULL),('slo-tools-update',1,NULL,NULL,NULL,NULL,NULL),('slo-tools-view',1,NULL,NULL,NULL,NULL,NULL),('smk3',2,NULL,NULL,NULL,NULL,NULL),('smk3-create',1,NULL,NULL,NULL,NULL,NULL),('smk3-criteria-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('smk3-delete',1,NULL,NULL,NULL,NULL,NULL),('smk3-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('smk3-index',1,NULL,NULL,NULL,NULL,NULL),('smk3-subtitle-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('smk3-title-create',1,NULL,NULL,NULL,NULL,NULL),('smk3-title-delete',1,NULL,NULL,NULL,NULL,NULL),('smk3-title-index',1,NULL,NULL,NULL,NULL,NULL),('smk3-title-update',1,NULL,NULL,NULL,NULL,NULL),('smk3-title-view',1,NULL,NULL,NULL,NULL,NULL),('smk3-update',1,NULL,NULL,NULL,NULL,NULL),('smk3-view',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-detail-create',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-detail-index',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-detail-update',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-detail-view',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('sprinkle-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('tanggap-darurat',2,NULL,NULL,NULL,NULL,NULL),('unggah-umum',2,NULL,NULL,NULL,NULL,NULL),('user-create',1,NULL,NULL,NULL,NULL,NULL),('user-delete',1,NULL,NULL,NULL,NULL,NULL),('user-index',1,NULL,NULL,NULL,NULL,NULL),('user-profile-update',1,NULL,NULL,NULL,NULL,NULL),('user-update',1,NULL,NULL,NULL,NULL,NULL),('user-view',1,NULL,NULL,NULL,NULL,NULL),('wev-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL),('work-accident-create',1,NULL,NULL,NULL,NULL,NULL),('work-accident-delete',1,NULL,NULL,NULL,NULL,NULL),('work-accident-detail-create',1,NULL,NULL,NULL,NULL,NULL),('work-accident-detail-delete',1,NULL,NULL,NULL,NULL,NULL),('work-accident-detail-index',1,NULL,NULL,NULL,NULL,NULL),('work-accident-detail-update',1,NULL,NULL,NULL,NULL,NULL),('work-accident-detail-view',1,NULL,NULL,NULL,NULL,NULL),('work-accident-export',1,NULL,NULL,NULL,NULL,NULL),('work-accident-index',1,NULL,NULL,NULL,NULL,NULL),('work-accident-update',1,NULL,NULL,NULL,NULL,NULL),('work-accident-view',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-ajax-codeset',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-create',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-delete',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-export',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-index',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-update',1,NULL,NULL,NULL,NULL,NULL),('working-env-data-view',1,NULL,NULL,NULL,NULL,NULL),('working-hour-monitoring-create',1,NULL,NULL,NULL,NULL,NULL),('working-hour-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL),('working-hour-monitoring-export',1,NULL,NULL,NULL,NULL,NULL),('working-hour-monitoring-index',1,NULL,NULL,NULL,NULL,NULL),('working-hour-monitoring-update',1,NULL,NULL,NULL,NULL,NULL),('working-hour-monitoring-view',1,NULL,NULL,NULL,NULL,NULL),('working-permit-create',1,NULL,NULL,NULL,NULL,NULL),('working-permit-delete',1,NULL,NULL,NULL,NULL,NULL),('working-permit-export',1,NULL,NULL,NULL,NULL,NULL),('working-permit-index',1,NULL,NULL,NULL,NULL,NULL),('working-permit-update',1,NULL,NULL,NULL,NULL,NULL),('working-permit-view',1,NULL,NULL,NULL,NULL,NULL),('working-plan-ajax-delete-detail',1,NULL,NULL,NULL,NULL,NULL),('working-plan-ajax-read-detail',1,NULL,NULL,NULL,NULL,NULL),('working-plan-ajax-save-detail',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-ajax-create',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-ajax-search',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-create',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-delete',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-index',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-update',1,NULL,NULL,NULL,NULL,NULL),('working-plan-attribute-view',1,NULL,NULL,NULL,NULL,NULL),('working-plan-create',1,NULL,NULL,NULL,NULL,NULL),('working-plan-delete',1,NULL,NULL,NULL,NULL,NULL),('working-plan-export',1,NULL,NULL,NULL,NULL,NULL),('working-plan-index',1,NULL,NULL,NULL,NULL,NULL),('working-plan-update',1,NULL,NULL,NULL,NULL,NULL),('working-plan-view',1,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','aktivitas-k3l'),('Administrator','checklist-hydrant'),('Administrator','codeset'),('Administrator','data-lingkungan-kerja'),('Administrator','detector-alarm'),('Administrator','implementasi-housekeeping'),('Administrator','izin-kerja'),('Administrator','izin-lingkungan'),('Administrator','izin-lingkungan-detail'),('Administrator','izin-lingkungan-laporan'),('Administrator','izin-lingkungan-profil-perusahaan'),('Administrator','kecelakaan-kerja'),('Administrator','log'),('Administrator','maturity-level'),('Administrator','melebihi-ketaatan'),('Administrator','monitoring-anggaran'),('Administrator','monitoring-apar'),('Administrator','monitoring-apd'),('Administrator','monitoring-jam-kerja'),('Administrator','monitoring-kontrak'),('Administrator','monitoring-loto'),('Administrator','monitoring-p2k3'),('Administrator','monitoring-p3k'),('Administrator','monitoring-sprinkle'),('Administrator','nomor-telepon-penting'),('Administrator','pembangkit-listrik'),('Administrator','pengawasan-k3'),('Administrator','pengendalian-pencemaran-air'),('Administrator','pengguna'),('Administrator','pengujian-hydrant'),('Administrator','permasalahan-k3l'),('Administrator','pertanyaan-housekeeping'),('Administrator','pertanyaan-hydrant'),('Administrator','pertanyaan-maturity-level'),('Administrator','pertanyaan-melebihi-ketaatan'),('Administrator','pertanyaan-pengendalian-pencemaran-air'),('Administrator','pertanyaan-plb3-self-assessment'),('Administrator','pertanyaan-smk3'),('Administrator','plb3-ceklist'),('Administrator','plb3-ceklist-detail'),('Administrator','plb3-neraca'),('Administrator','plb3-neraca-detail'),('Administrator','plb3-pertanyaan'),('Administrator','plb3-self-assessment'),('Administrator','ppu'),('Administrator','ppu-ambient'),('Administrator','ppu-ketaatan-parameter-ambient'),('Administrator','ppu-ketaatan-parameter-pelaporan-bm'),('Administrator','ppu-ketentuan-teknis'),('Administrator','ppu-pelaporan-bm-cems'),('Administrator','ppu-pelaporan-parameter-cems'),('Administrator','ppu-perhitungan-beban-emisi-grk'),('Administrator','ppu-pertanyaan'),('Administrator','ppu-sumber-emisi'),('Administrator','ppu-titik-pemantauan-ambient'),('Administrator','profil-pengguna'),('Administrator','profil-perusahaan'),('Administrator','program-melebihi-ketaatan'),('Administrator','rencana-kerja'),('Administrator','roadmap-k3l-kitsbs'),('Administrator','safety-campaign'),('Administrator','sektor'),('Administrator','sertifikasi-kompetensi'),('Administrator','skko'),('Administrator','slo-pembangkit'),('Administrator','slo-peralatan'),('Administrator','smk3'),('Administrator','tanggap-darurat'),('aktivitas-k3l','k3l-activity-create'),('aktivitas-k3l','k3l-activity-delete'),('aktivitas-k3l','k3l-activity-export'),('aktivitas-k3l','k3l-activity-index'),('aktivitas-k3l','k3l-activity-update'),('aktivitas-k3l','k3l-activity-view'),('checklist-hydrant','hydrant-checklist-create'),('checklist-hydrant','hydrant-checklist-delete'),('checklist-hydrant','hydrant-checklist-export'),('checklist-hydrant','hydrant-checklist-index'),('checklist-hydrant','hydrant-checklist-update'),('checklist-hydrant','hydrant-checklist-view'),('codeset','codeset-create'),('codeset','codeset-delete'),('codeset','codeset-index'),('codeset','codeset-update'),('codeset','codeset-view'),('data-lingkungan-kerja','wev-detail-ajax-delete'),('data-lingkungan-kerja','working-env-data-ajax-codeset'),('data-lingkungan-kerja','working-env-data-create'),('data-lingkungan-kerja','working-env-data-delete'),('data-lingkungan-kerja','working-env-data-export'),('data-lingkungan-kerja','working-env-data-index'),('data-lingkungan-kerja','working-env-data-update'),('data-lingkungan-kerja','working-env-data-view'),('detector-alarm','fire-detector-create'),('detector-alarm','fire-detector-date'),('detector-alarm','fire-detector-delete'),('detector-alarm','fire-detector-export'),('detector-alarm','fire-detector-index'),('detector-alarm','fire-detector-update'),('detector-alarm','fire-detector-view'),('implementasi-housekeeping','housekeeping-implementation-create'),('implementasi-housekeeping','housekeeping-implementation-delete'),('implementasi-housekeeping','housekeeping-implementation-export'),('implementasi-housekeeping','housekeeping-implementation-index'),('implementasi-housekeeping','housekeeping-implementation-update'),('implementasi-housekeeping','housekeeping-implementation-view'),('izin-kerja','working-permit-create'),('izin-kerja','working-permit-delete'),('izin-kerja','working-permit-export'),('izin-kerja','working-permit-index'),('izin-kerja','working-permit-update'),('izin-kerja','working-permit-view'),('izin-lingkungan','environment-permit-create'),('izin-lingkungan','environment-permit-delete'),('izin-lingkungan','environment-permit-export'),('izin-lingkungan','environment-permit-index'),('izin-lingkungan','environment-permit-update'),('izin-lingkungan','environment-permit-view'),('izin-lingkungan-detail','environment-permit-detail-ajax-delete'),('izin-lingkungan-detail','environment-permit-detail-create'),('izin-lingkungan-detail','environment-permit-detail-delete'),('izin-lingkungan-detail','environment-permit-detail-index'),('izin-lingkungan-detail','environment-permit-detail-update'),('izin-lingkungan-detail','environment-permit-detail-view'),('izin-lingkungan-laporan','environment-permit-report-create'),('izin-lingkungan-laporan','environment-permit-report-delete'),('izin-lingkungan-laporan','environment-permit-report-index'),('izin-lingkungan-laporan','environment-permit-report-update'),('izin-lingkungan-laporan','environment-permit-report-view'),('izin-lingkungan-profil-perusahaan','environment-permit-company-profile-create'),('izin-lingkungan-profil-perusahaan','environment-permit-company-profile-delete'),('izin-lingkungan-profil-perusahaan','environment-permit-company-profile-export'),('izin-lingkungan-profil-perusahaan','environment-permit-company-profile-index'),('izin-lingkungan-profil-perusahaan','environment-permit-company-profile-update'),('izin-lingkungan-profil-perusahaan','environment-permit-company-profile-view'),('kecelakaan-kerja','work-accident-create'),('kecelakaan-kerja','work-accident-delete'),('kecelakaan-kerja','work-accident-detail-create'),('kecelakaan-kerja','work-accident-detail-delete'),('kecelakaan-kerja','work-accident-detail-index'),('kecelakaan-kerja','work-accident-detail-update'),('kecelakaan-kerja','work-accident-detail-view'),('kecelakaan-kerja','work-accident-export'),('kecelakaan-kerja','work-accident-index'),('kecelakaan-kerja','work-accident-update'),('kecelakaan-kerja','work-accident-view'),('log','log-dirty-delete-all'),('log','log-dirty-index'),('log','login-history-delete-all'),('log','login-history-index'),('maturity-level','maturity-level-create'),('maturity-level','maturity-level-delete'),('maturity-level','maturity-level-export'),('maturity-level','maturity-level-index'),('maturity-level','maturity-level-update'),('maturity-level','maturity-level-view'),('melebihi-ketaatan','beyond-obedience-create'),('melebihi-ketaatan','beyond-obedience-delete'),('melebihi-ketaatan','beyond-obedience-export'),('melebihi-ketaatan','beyond-obedience-index'),('melebihi-ketaatan','beyond-obedience-update'),('melebihi-ketaatan','beyond-obedience-view'),('monitoring-anggaran','budget-monitoring-create'),('monitoring-anggaran','budget-monitoring-delete'),('monitoring-anggaran','budget-monitoring-detail-ajax-delete'),('monitoring-anggaran','budget-monitoring-export'),('monitoring-anggaran','budget-monitoring-index'),('monitoring-anggaran','budget-monitoring-realization'),('monitoring-anggaran','budget-monitoring-update'),('monitoring-anggaran','budget-monitoring-view'),('monitoring-apar','monitoring-apar-create'),('monitoring-apar','monitoring-apar-delete'),('monitoring-apar','monitoring-apar-export'),('monitoring-apar','monitoring-apar-index'),('monitoring-apar','monitoring-apar-update'),('monitoring-apar','monitoring-apar-view'),('monitoring-apd','apd-monitoring-create'),('monitoring-apd','apd-monitoring-delete'),('monitoring-apd','apd-monitoring-export'),('monitoring-apd','apd-monitoring-index'),('monitoring-apd','apd-monitoring-update'),('monitoring-apd','apd-monitoring-view'),('monitoring-jam-kerja','working-hour-monitoring-create'),('monitoring-jam-kerja','working-hour-monitoring-delete'),('monitoring-jam-kerja','working-hour-monitoring-export'),('monitoring-jam-kerja','working-hour-monitoring-index'),('monitoring-jam-kerja','working-hour-monitoring-update'),('monitoring-jam-kerja','working-hour-monitoring-view'),('monitoring-kontrak','contract-monitoring-create'),('monitoring-kontrak','contract-monitoring-delete'),('monitoring-kontrak','contract-monitoring-export'),('monitoring-kontrak','contract-monitoring-index'),('monitoring-kontrak','contract-monitoring-update'),('monitoring-kontrak','contract-monitoring-view'),('monitoring-loto','loto-monitoring-create'),('monitoring-loto','loto-monitoring-delete'),('monitoring-loto','loto-monitoring-export'),('monitoring-loto','loto-monitoring-index'),('monitoring-loto','loto-monitoring-update'),('monitoring-loto','loto-monitoring-view'),('monitoring-p2k3','p2k3-monitoring-create'),('monitoring-p2k3','p2k3-monitoring-delete'),('monitoring-p2k3','p2k3-monitoring-detail-create'),('monitoring-p2k3','p2k3-monitoring-detail-delete'),('monitoring-p2k3','p2k3-monitoring-detail-index'),('monitoring-p2k3','p2k3-monitoring-detail-update'),('monitoring-p2k3','p2k3-monitoring-detail-view'),('monitoring-p2k3','p2k3-monitoring-export'),('monitoring-p2k3','p2k3-monitoring-index'),('monitoring-p2k3','p2k3-monitoring-update'),('monitoring-p2k3','p2k3-monitoring-view'),('monitoring-p3k','p3k-monitoring-create'),('monitoring-p3k','p3k-monitoring-delete'),('monitoring-p3k','p3k-monitoring-detail-create'),('monitoring-p3k','p3k-monitoring-detail-delete'),('monitoring-p3k','p3k-monitoring-detail-index'),('monitoring-p3k','p3k-monitoring-detail-update'),('monitoring-p3k','p3k-monitoring-detail-view'),('monitoring-p3k','p3k-monitoring-export'),('monitoring-p3k','p3k-monitoring-index'),('monitoring-p3k','p3k-monitoring-update'),('monitoring-p3k','p3k-monitoring-view'),('monitoring-sprinkle','sprinkle-monitoring-create'),('monitoring-sprinkle','sprinkle-monitoring-delete'),('monitoring-sprinkle','sprinkle-monitoring-detail-create'),('monitoring-sprinkle','sprinkle-monitoring-detail-delete'),('monitoring-sprinkle','sprinkle-monitoring-detail-index'),('monitoring-sprinkle','sprinkle-monitoring-detail-update'),('monitoring-sprinkle','sprinkle-monitoring-detail-view'),('monitoring-sprinkle','sprinkle-monitoring-export'),('monitoring-sprinkle','sprinkle-monitoring-index'),('monitoring-sprinkle','sprinkle-monitoring-update'),('monitoring-sprinkle','sprinkle-monitoring-view'),('nomor-telepon-penting','important-phone-number-create'),('nomor-telepon-penting','important-phone-number-delete'),('nomor-telepon-penting','important-phone-number-export'),('nomor-telepon-penting','important-phone-number-index'),('nomor-telepon-penting','important-phone-number-update'),('nomor-telepon-penting','important-phone-number-view'),('Operator','pembangkit-listrik'),('Operator','profil-pengguna'),('Operator','sektor'),('pembangkit-listrik','power-plant-ajax-plant'),('pembangkit-listrik','power-plant-create'),('pembangkit-listrik','power-plant-delete'),('pembangkit-listrik','power-plant-index'),('pembangkit-listrik','power-plant-update'),('pembangkit-listrik','power-plant-view'),('pengawasan-k3','k3-supervision-create'),('pengawasan-k3','k3-supervision-delete'),('pengawasan-k3','k3-supervision-detail-create'),('pengawasan-k3','k3-supervision-detail-delete'),('pengawasan-k3','k3-supervision-detail-index'),('pengawasan-k3','k3-supervision-detail-update'),('pengawasan-k3','k3-supervision-detail-view'),('pengawasan-k3','k3-supervision-export'),('pengawasan-k3','k3-supervision-index'),('pengawasan-k3','k3-supervision-update'),('pengawasan-k3','k3-supervision-view'),('pengendalian-pencemaran-air','ppa-ba-create'),('pengendalian-pencemaran-air','ppa-ba-delete'),('pengendalian-pencemaran-air','ppa-ba-export'),('pengendalian-pencemaran-air','ppa-ba-index'),('pengendalian-pencemaran-air','ppa-ba-monitoring-point-create'),('pengendalian-pencemaran-air','ppa-ba-monitoring-point-delete'),('pengendalian-pencemaran-air','ppa-ba-monitoring-point-index'),('pengendalian-pencemaran-air','ppa-ba-monitoring-point-update'),('pengendalian-pencemaran-air','ppa-ba-monitoring-point-view'),('pengendalian-pencemaran-air','ppa-ba-report-bm-create'),('pengendalian-pencemaran-air','ppa-ba-report-bm-delete'),('pengendalian-pencemaran-air','ppa-ba-report-bm-index'),('pengendalian-pencemaran-air','ppa-ba-report-bm-update'),('pengendalian-pencemaran-air','ppa-ba-report-bm-view'),('pengendalian-pencemaran-air','ppa-ba-update'),('pengendalian-pencemaran-air','ppa-ba-view'),('pengendalian-pencemaran-air','ppa-create'),('pengendalian-pencemaran-air','ppa-delete'),('pengendalian-pencemaran-air','ppa-export'),('pengendalian-pencemaran-air','ppa-index'),('pengendalian-pencemaran-air','ppa-laboratorium-accreditation-ajax-delete'),('pengendalian-pencemaran-air','ppa-laboratorium-ajax-delete'),('pengendalian-pencemaran-air','ppa-pollution-load'),('pengendalian-pencemaran-air','ppa-pollution-load-actual'),('pengendalian-pencemaran-air','ppa-pollution-load-decrease-create'),('pengendalian-pencemaran-air','ppa-pollution-load-decrease-delete'),('pengendalian-pencemaran-air','ppa-pollution-load-decrease-index'),('pengendalian-pencemaran-air','ppa-pollution-load-decrease-update'),('pengendalian-pencemaran-air','ppa-pollution-load-decrease-view'),('pengendalian-pencemaran-air','ppa-report-bm-create'),('pengendalian-pencemaran-air','ppa-report-bm-delete'),('pengendalian-pencemaran-air','ppa-report-bm-index'),('pengendalian-pencemaran-air','ppa-report-bm-update'),('pengendalian-pencemaran-air','ppa-report-bm-view'),('pengendalian-pencemaran-air','ppa-setup-permit-create'),('pengendalian-pencemaran-air','ppa-setup-permit-delete'),('pengendalian-pencemaran-air','ppa-setup-permit-index'),('pengendalian-pencemaran-air','ppa-setup-permit-update'),('pengendalian-pencemaran-air','ppa-setup-permit-view'),('pengendalian-pencemaran-air','ppa-technical-provision-create'),('pengendalian-pencemaran-air','ppa-technical-provision-delete'),('pengendalian-pencemaran-air','ppa-technical-provision-index'),('pengendalian-pencemaran-air','ppa-technical-provision-update'),('pengendalian-pencemaran-air','ppa-technical-provision-view'),('pengendalian-pencemaran-air','ppa-update'),('pengendalian-pencemaran-air','ppa-view'),('pengguna','user-create'),('pengguna','user-delete'),('pengguna','user-index'),('pengguna','user-update'),('pengguna','user-view'),('pengujian-hydrant','hydrant-testing-create'),('pengujian-hydrant','hydrant-testing-delete'),('pengujian-hydrant','hydrant-testing-detail-create'),('pengujian-hydrant','hydrant-testing-detail-delete'),('pengujian-hydrant','hydrant-testing-detail-index'),('pengujian-hydrant','hydrant-testing-detail-update'),('pengujian-hydrant','hydrant-testing-detail-view'),('pengujian-hydrant','hydrant-testing-export'),('pengujian-hydrant','hydrant-testing-index'),('pengujian-hydrant','hydrant-testing-update'),('pengujian-hydrant','hydrant-testing-view'),('permasalahan-k3l','k3l-problem-create'),('permasalahan-k3l','k3l-problem-delete'),('permasalahan-k3l','k3l-problem-export'),('permasalahan-k3l','k3l-problem-index'),('permasalahan-k3l','k3l-problem-update'),('permasalahan-k3l','k3l-problem-view'),('pertanyaan-housekeeping','housekeeping-question-create'),('pertanyaan-housekeeping','housekeeping-question-delete'),('pertanyaan-housekeeping','housekeeping-question-index'),('pertanyaan-housekeeping','housekeeping-question-update'),('pertanyaan-housekeeping','housekeeping-question-view'),('pertanyaan-housekeeping','hq-detail-ajax-delete'),('pertanyaan-hydrant','hydrant-question-create'),('pertanyaan-hydrant','hydrant-question-delete'),('pertanyaan-hydrant','hydrant-question-index'),('pertanyaan-hydrant','hydrant-question-update'),('pertanyaan-hydrant','hydrant-question-view'),('pertanyaan-maturity-level','maturity-level-question-create'),('pertanyaan-maturity-level','maturity-level-question-delete'),('pertanyaan-maturity-level','maturity-level-question-index'),('pertanyaan-maturity-level','maturity-level-question-update'),('pertanyaan-maturity-level','maturity-level-question-view'),('pertanyaan-maturity-level','maturity-level-title-ajax-create'),('pertanyaan-maturity-level','maturity-level-title-create'),('pertanyaan-maturity-level','maturity-level-title-delete'),('pertanyaan-maturity-level','maturity-level-title-index'),('pertanyaan-maturity-level','maturity-level-title-update'),('pertanyaan-maturity-level','maturity-level-title-view'),('pertanyaan-melebihi-ketaatan','bo-assessment-aspect-create'),('pertanyaan-melebihi-ketaatan','bo-assessment-aspect-delete'),('pertanyaan-melebihi-ketaatan','bo-assessment-aspect-index'),('pertanyaan-melebihi-ketaatan','bo-assessment-aspect-update'),('pertanyaan-melebihi-ketaatan','bo-assessment-aspect-view'),('pertanyaan-melebihi-ketaatan','boas-criteria-ajax-delete'),('pertanyaan-pengendalian-pencemaran-air','ppa-question-create'),('pertanyaan-pengendalian-pencemaran-air','ppa-question-delete'),('pertanyaan-pengendalian-pencemaran-air','ppa-question-index'),('pertanyaan-pengendalian-pencemaran-air','ppa-question-update'),('pertanyaan-pengendalian-pencemaran-air','ppa-question-view'),('pertanyaan-plb3-self-assessment','plb3-sa-question-create'),('pertanyaan-plb3-self-assessment','plb3-sa-question-delete'),('pertanyaan-plb3-self-assessment','plb3-sa-question-index'),('pertanyaan-plb3-self-assessment','plb3-sa-question-update'),('pertanyaan-plb3-self-assessment','plb3-sa-question-view'),('pertanyaan-smk3','smk3-criteria-ajax-delete'),('pertanyaan-smk3','smk3-detail-ajax-delete'),('pertanyaan-smk3','smk3-subtitle-ajax-delete'),('pertanyaan-smk3','smk3-title-create'),('pertanyaan-smk3','smk3-title-delete'),('pertanyaan-smk3','smk3-title-index'),('pertanyaan-smk3','smk3-title-update'),('pertanyaan-smk3','smk3-title-view'),('plb3-ceklist','plb3-checklist-create'),('plb3-ceklist','plb3-checklist-delete'),('plb3-ceklist','plb3-checklist-index'),('plb3-ceklist','plb3-checklist-update'),('plb3-ceklist','plb3-checklist-view'),('plb3-ceklist-detail','plb3-checklist-detail-create'),('plb3-ceklist-detail','plb3-checklist-detail-delete'),('plb3-ceklist-detail','plb3-checklist-detail-export'),('plb3-ceklist-detail','plb3-checklist-detail-index'),('plb3-ceklist-detail','plb3-checklist-detail-update'),('plb3-ceklist-detail','plb3-checklist-detail-view'),('plb3-neraca','plb3-balance-sheet-create'),('plb3-neraca','plb3-balance-sheet-delete'),('plb3-neraca','plb3-balance-sheet-export'),('plb3-neraca','plb3-balance-sheet-index'),('plb3-neraca','plb3-balance-sheet-update'),('plb3-neraca','plb3-balance-sheet-view'),('plb3-neraca-detail','plb3-balance-sheet-detail-create'),('plb3-neraca-detail','plb3-balance-sheet-detail-delete'),('plb3-neraca-detail','plb3-balance-sheet-detail-index'),('plb3-neraca-detail','plb3-balance-sheet-detail-update'),('plb3-neraca-detail','plb3-balance-sheet-detail-view'),('plb3-pertanyaan','plb3-question-ajax-question-type'),('plb3-pertanyaan','plb3-question-create'),('plb3-pertanyaan','plb3-question-delete'),('plb3-pertanyaan','plb3-question-index'),('plb3-pertanyaan','plb3-question-update'),('plb3-pertanyaan','plb3-question-view'),('plb3-self-assessment','plb3-sa-company-profile-create'),('plb3-self-assessment','plb3-sa-company-profile-delete'),('plb3-self-assessment','plb3-sa-company-profile-index'),('plb3-self-assessment','plb3-sa-company-profile-update'),('plb3-self-assessment','plb3-sa-company-profile-view'),('plb3-self-assessment','plb3-sa-form-create'),('plb3-self-assessment','plb3-sa-form-delete'),('plb3-self-assessment','plb3-sa-form-index'),('plb3-self-assessment','plb3-sa-form-update'),('plb3-self-assessment','plb3-sa-form-view'),('plb3-self-assessment','plb3-self-assessment-delete'),('plb3-self-assessment','plb3-self-assessment-export'),('plb3-self-assessment','plb3-self-assessment-index'),('plb3-self-assessment','plb3-self-assessment-update'),('plb3-self-assessment','plb3-self-assessment-view'),('ppu','ppu-create'),('ppu','ppu-delete'),('ppu','ppu-emission-load-calc'),('ppu','ppu-export'),('ppu','ppu-export-cems'),('ppu','ppu-index'),('ppu','ppu-pollution-load'),('ppu','ppu-update'),('ppu','ppu-view'),('ppu-ambient','ppu-ambient-create'),('ppu-ambient','ppu-ambient-delete'),('ppu-ambient','ppu-ambient-export'),('ppu-ambient','ppu-ambient-index'),('ppu-ambient','ppu-ambient-update'),('ppu-ambient','ppu-ambient-view'),('ppu-ketaatan-parameter-ambient','ppua-parameter-obligation-create'),('ppu-ketaatan-parameter-ambient','ppua-parameter-obligation-delete'),('ppu-ketaatan-parameter-ambient','ppua-parameter-obligation-index'),('ppu-ketaatan-parameter-ambient','ppua-parameter-obligation-update'),('ppu-ketaatan-parameter-ambient','ppua-parameter-obligation-view'),('ppu-ketaatan-parameter-pelaporan-bm','ppu-parameter-obligation-create'),('ppu-ketaatan-parameter-pelaporan-bm','ppu-parameter-obligation-delete'),('ppu-ketaatan-parameter-pelaporan-bm','ppu-parameter-obligation-index'),('ppu-ketaatan-parameter-pelaporan-bm','ppu-parameter-obligation-update'),('ppu-ketaatan-parameter-pelaporan-bm','ppu-parameter-obligation-view'),('ppu-ketentuan-teknis','ppu-technical-provision-create'),('ppu-ketentuan-teknis','ppu-technical-provision-delete'),('ppu-ketentuan-teknis','ppu-technical-provision-index'),('ppu-ketentuan-teknis','ppu-technical-provision-update'),('ppu-ketentuan-teknis','ppu-technical-provision-view'),('ppu-pelaporan-bm-cems','ppucems-report-bm-ajax-parameter'),('ppu-pelaporan-bm-cems','ppucems-report-bm-create'),('ppu-pelaporan-bm-cems','ppucems-report-bm-delete'),('ppu-pelaporan-bm-cems','ppucems-report-bm-index'),('ppu-pelaporan-bm-cems','ppucems-report-bm-update'),('ppu-pelaporan-bm-cems','ppucems-report-bm-view'),('ppu-pelaporan-parameter-cems','ppucemsrb-parameter-report-create'),('ppu-pelaporan-parameter-cems','ppucemsrb-parameter-report-delete'),('ppu-pelaporan-parameter-cems','ppucemsrb-parameter-report-index'),('ppu-pelaporan-parameter-cems','ppucemsrb-parameter-report-update'),('ppu-pelaporan-parameter-cems','ppucemsrb-parameter-report-view'),('ppu-perhitungan-beban-emisi-grk','ppu-emission-load-grk-create'),('ppu-perhitungan-beban-emisi-grk','ppu-emission-load-grk-delete'),('ppu-perhitungan-beban-emisi-grk','ppu-emission-load-grk-index'),('ppu-perhitungan-beban-emisi-grk','ppu-emission-load-grk-update'),('ppu-perhitungan-beban-emisi-grk','ppu-emission-load-grk-view'),('ppu-pertanyaan','ppu-question-create'),('ppu-pertanyaan','ppu-question-delete'),('ppu-pertanyaan','ppu-question-index'),('ppu-pertanyaan','ppu-question-update'),('ppu-pertanyaan','ppu-question-view'),('ppu-sumber-emisi','ppu-emission-source-ajax-emission'),('ppu-sumber-emisi','ppu-emission-source-create'),('ppu-sumber-emisi','ppu-emission-source-delete'),('ppu-sumber-emisi','ppu-emission-source-index'),('ppu-sumber-emisi','ppu-emission-source-update'),('ppu-sumber-emisi','ppu-emission-source-view'),('ppu-titik-pemantauan-ambient','ppua-monitoring-point-create'),('ppu-titik-pemantauan-ambient','ppua-monitoring-point-delete'),('ppu-titik-pemantauan-ambient','ppua-monitoring-point-index'),('ppu-titik-pemantauan-ambient','ppua-monitoring-point-update'),('ppu-titik-pemantauan-ambient','ppua-monitoring-point-view'),('profil-pengguna','user-profile-update'),('profil-perusahaan','profile-create'),('profil-perusahaan','profile-delete'),('profil-perusahaan','profile-index'),('profil-perusahaan','profile-update'),('profil-perusahaan','profile-view'),('program-melebihi-ketaatan','beyond-obedience-comdev-ajax-codeset'),('program-melebihi-ketaatan','beyond-obedience-comdev-create'),('program-melebihi-ketaatan','beyond-obedience-comdev-delete'),('program-melebihi-ketaatan','beyond-obedience-comdev-export'),('program-melebihi-ketaatan','beyond-obedience-comdev-index'),('program-melebihi-ketaatan','beyond-obedience-comdev-update'),('program-melebihi-ketaatan','beyond-obedience-comdev-view'),('program-melebihi-ketaatan','beyond-obedience-program-ajax-codeset'),('program-melebihi-ketaatan','beyond-obedience-program-create'),('program-melebihi-ketaatan','beyond-obedience-program-delete'),('program-melebihi-ketaatan','beyond-obedience-program-export'),('program-melebihi-ketaatan','beyond-obedience-program-index'),('program-melebihi-ketaatan','beyond-obedience-program-update'),('program-melebihi-ketaatan','beyond-obedience-program-view'),('program-melebihi-ketaatan','boc-detail-ajax-delete'),('program-melebihi-ketaatan','bop-detail-ajax-delete'),('project-tracking','project-tracking-create'),('project-tracking','project-tracking-delete'),('project-tracking','project-tracking-detail-create'),('project-tracking','project-tracking-detail-delete'),('project-tracking','project-tracking-detail-index'),('project-tracking','project-tracking-detail-update'),('project-tracking','project-tracking-detail-view'),('project-tracking','project-tracking-export'),('project-tracking','project-tracking-index'),('project-tracking','project-tracking-update'),('project-tracking','project-tracking-view'),('rencana-kerja','working-plan-ajax-delete-detail'),('rencana-kerja','working-plan-ajax-read-detail'),('rencana-kerja','working-plan-ajax-save-detail'),('rencana-kerja','working-plan-attribute-ajax-create'),('rencana-kerja','working-plan-attribute-ajax-search'),('rencana-kerja','working-plan-attribute-create'),('rencana-kerja','working-plan-attribute-delete'),('rencana-kerja','working-plan-attribute-index'),('rencana-kerja','working-plan-attribute-update'),('rencana-kerja','working-plan-attribute-view'),('rencana-kerja','working-plan-create'),('rencana-kerja','working-plan-delete'),('rencana-kerja','working-plan-export'),('rencana-kerja','working-plan-index'),('rencana-kerja','working-plan-update'),('rencana-kerja','working-plan-view'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-ajax-create'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-ajax-search'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-create'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-delete'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-index'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-update'),('roadmap-k3l-kitsbs','roadmap-k3l-attribute-view'),('roadmap-k3l-kitsbs','roadmap-k3l-create'),('roadmap-k3l-kitsbs','roadmap-k3l-delete'),('roadmap-k3l-kitsbs','roadmap-k3l-export'),('roadmap-k3l-kitsbs','roadmap-k3l-index'),('roadmap-k3l-kitsbs','roadmap-k3l-item-ajax-delete'),('roadmap-k3l-kitsbs','roadmap-k3l-target-ajax-delete'),('roadmap-k3l-kitsbs','roadmap-k3l-update'),('roadmap-k3l-kitsbs','roadmap-k3l-view'),('safety-campaign','safety-campaign-create'),('safety-campaign','safety-campaign-delete'),('safety-campaign','safety-campaign-export'),('safety-campaign','safety-campaign-index'),('safety-campaign','safety-campaign-update'),('safety-campaign','safety-campaign-view'),('sektor','sector-create'),('sektor','sector-delete'),('sektor','sector-index'),('sektor','sector-update'),('sektor','sector-view'),('sertifikasi-kompetensi','competency-certification-create'),('sertifikasi-kompetensi','competency-certification-delete'),('sertifikasi-kompetensi','competency-certification-export'),('sertifikasi-kompetensi','competency-certification-index'),('sertifikasi-kompetensi','competency-certification-update'),('sertifikasi-kompetensi','competency-certification-view'),('skko','skko-create'),('skko','skko-delete'),('skko','skko-detail-ajax-delete'),('skko','skko-index'),('skko','skko-update'),('skko','skko-view'),('slo-pembangkit','slo-generator-create'),('slo-pembangkit','slo-generator-delete'),('slo-pembangkit','slo-generator-export'),('slo-pembangkit','slo-generator-index'),('slo-pembangkit','slo-generator-update'),('slo-pembangkit','slo-generator-view'),('slo-peralatan','slo-tools-create'),('slo-peralatan','slo-tools-delete'),('slo-peralatan','slo-tools-export'),('slo-peralatan','slo-tools-index'),('slo-peralatan','slo-tools-update'),('slo-peralatan','slo-tools-view'),('smk3','smk3-create'),('smk3','smk3-delete'),('smk3','smk3-index'),('smk3','smk3-update'),('smk3','smk3-view'),('tanggap-darurat','emergency-response-create'),('tanggap-darurat','emergency-response-delete'),('tanggap-darurat','emergency-response-export'),('tanggap-darurat','emergency-response-index'),('tanggap-darurat','emergency-response-update'),('tanggap-darurat','emergency-response-view'),('unggah-umum','common-upload-create'),('unggah-umum','common-upload-delete'),('unggah-umum','common-upload-index'),('unggah-umum','common-upload-update');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `beyond_obedience` */

DROP TABLE IF EXISTS `beyond_obedience`;

CREATE TABLE `beyond_obedience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_form_type_code` varchar(10) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `bo_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_beyond_obedience_power_plant` (`power_plant_id`),
  KEY `FK_beyond_obedience_sector` (`sector_id`),
  CONSTRAINT `FK_beyond_obedience_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_beyond_obedience_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `beyond_obedience` */

insert  into `beyond_obedience`(`id`,`bo_form_type_code`,`sector_id`,`power_plant_id`,`bo_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,'DRKPL',2,4,2017,8,1494518850,8,1494947036),(12,'EE',2,4,2017,8,1494671995,8,1494951127),(13,'SML',2,4,2017,8,1494674229,8,1494674229),(14,'PPLB3',2,4,2017,8,1494674482,8,1494674482),(15,'PPLNB3',2,4,2017,8,1494674662,8,1494674662),(16,'PGPU',2,4,2017,8,1494674687,8,1494674687),(17,'KA',2,4,2017,8,1494674700,8,1494674700),(18,'KH',2,4,2017,8,1494674712,8,1494674712),(19,'CD',2,4,2017,8,1494674757,8,1494674757),(20,'SML',4,2,2017,8,1494674806,8,1494674806),(21,'PPLNB3',10,6,2017,8,1496484278,8,1496484379),(22,'PGPU',10,6,1234,8,1497155733,8,1497155733),(23,'SML',10,6,1234,8,1499180045,8,1499180149),(24,'DRKPL',10,6,1234,8,1499180169,8,1499192415),(25,'CD',10,6,1234,8,1500221260,8,1500221260);

/*Table structure for table `beyond_obedience_comdev` */

DROP TABLE IF EXISTS `beyond_obedience_comdev`;

CREATE TABLE `beyond_obedience_comdev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boc_form_type_code` varchar(10) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `boc_year` int(4) NOT NULL,
  `boc_production` int(15) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_beyond_obedience_comdev_power_plant` (`power_plant_id`),
  KEY `FK_beyond_obedience_comdev_sector` (`sector_id`),
  CONSTRAINT `FK_beyond_obedience_comdev_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_beyond_obedience_comdev_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `beyond_obedience_comdev` */

insert  into `beyond_obedience_comdev`(`id`,`boc_form_type_code`,`sector_id`,`power_plant_id`,`boc_year`,`boc_production`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'CD',10,6,2017,100000,8,1496639504,8,1499182950);

/*Table structure for table `beyond_obedience_program` */

DROP TABLE IF EXISTS `beyond_obedience_program`;

CREATE TABLE `beyond_obedience_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bop_form_type_code` varchar(10) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `bop_year` int(4) NOT NULL,
  `bop_production` int(15) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_beyond_obedience_program_power_plant` (`power_plant_id`),
  KEY `FK_beyond_obedience_program_sector` (`sector_id`),
  CONSTRAINT `FK_beyond_obedience_program_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_beyond_obedience_program_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `beyond_obedience_program` */

insert  into `beyond_obedience_program`(`id`,`bop_form_type_code`,`sector_id`,`power_plant_id`,`bop_year`,`bop_production`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'PPLNB3',10,6,2017,100000,8,1496483225,8,1496483225),(4,'PBP',10,6,2016,1000001,8,1496495978,8,1496554690),(5,'PBP',10,6,2016,1231,8,1496554755,8,1496554880),(6,'PBP',10,6,123,123,8,1496638574,8,1496638574),(7,'PBP',10,6,123,123,8,1496638574,8,1496638574),(8,'EE',10,6,1234,12314,8,1499180823,8,1499180896),(11,'PGPU',10,6,2015,1,8,1499185109,8,1499185109);

/*Table structure for table `bo_assessment` */

DROP TABLE IF EXISTS `bo_assessment`;

CREATE TABLE `bo_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beyond_obedience_id` int(11) NOT NULL,
  `boas_criteria_id` int(11) NOT NULL,
  `boa_value` decimal(4,2) DEFAULT NULL,
  `boa_ref` varchar(200) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bo_assessment_bo` (`beyond_obedience_id`),
  KEY `FK_bo_assessment_criteria` (`boas_criteria_id`),
  CONSTRAINT `FK_bo_assessment_bo` FOREIGN KEY (`beyond_obedience_id`) REFERENCES `beyond_obedience` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_bo_assessment_criteria` FOREIGN KEY (`boas_criteria_id`) REFERENCES `boas_criteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=904 DEFAULT CHARSET=latin1;

/*Data for the table `bo_assessment` */

insert  into `bo_assessment`(`id`,`beyond_obedience_id`,`boas_criteria_id`,`boa_value`,`boa_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (32,11,16,'0.50','',8,1494518850,8,1494947036),(34,11,18,'0.50','',8,1494518850,8,1494947036),(35,11,19,'0.50','',8,1494518850,8,1494947036),(36,11,20,'0.50','',8,1494518850,8,1494947036),(44,12,28,'2.00','asd',8,1494671995,8,1494951127),(45,12,29,'2.00','asd',8,1494671995,8,1494951127),(46,12,30,'1.00','asd',8,1494671995,8,1494951127),(47,13,42,'1.00','Sesuai',8,1494674230,8,1494674230),(48,13,43,'1.00','Sesuai',8,1494674230,8,1494674230),(49,13,44,'1.00','Sesuai',8,1494674230,8,1494674230),(50,13,45,'1.00','Sesuai',8,1494674230,8,1494674230),(51,13,46,'1.00','Sesuai',8,1494674230,8,1494674230),(52,13,47,'1.00','Aspek dampak lingkungan telah disusun secara terstruktur',8,1494674230,8,1494674230),(53,13,48,'1.00','Prioritas 1 aspek lingkungan : a) buangan majun terkontaminasi, b) buangan cartrdge, c) penggunaan lampu neon, d) limbah b3 cair sisa wtp  . Yg sudah dilaakukan pengelolaan.',8,1494674230,8,1494674230),(54,13,49,'2.00','Asdam diperbaharui t',8,1494674230,8,1494674230),(55,13,50,'1.00','Update',8,1494674230,8,1494674230),(56,13,51,'1.00','Update',8,1494674230,8,1494674230),(57,13,52,'1.00','Update',8,1494674230,8,1494674230),(58,13,53,'0.00','Temuan proper tahun 2014-2015 belum dimasukan kedalam asdam ',8,1494674230,8,1494674230),(59,13,55,'1.00','Tujuan dan Sasaran ada namun belum disampaikan',8,1494674230,8,1494674230),(60,13,56,'0.00','Belum ada RJP yang secara detail dibuat untuk mencapai tujuan dan sasaran',8,1494674230,8,1494674230),(61,13,57,'0.00','Belum memasukan perspektif masyarakat dan pemerintah',8,1494674230,8,1494674230),(62,13,58,'1.00','Tujuan dan Sasaran ada namun belum disampaikan',8,1494674230,8,1494674230),(63,14,31,NULL,'',8,1494674482,8,1494674482),(64,14,32,NULL,'',8,1494674482,8,1494674482),(65,14,33,NULL,'',8,1494674482,8,1494674482),(66,15,59,NULL,'',8,1494674662,8,1494674662),(67,15,60,NULL,'',8,1494674662,8,1494674662),(68,15,61,NULL,'',8,1494674663,8,1494674663),(69,16,34,NULL,'',8,1494674687,8,1494674687),(70,16,35,NULL,'',8,1494674687,8,1494674687),(71,16,36,NULL,'',8,1494674687,8,1494674687),(72,16,37,NULL,'',8,1494674687,8,1494674687),(73,16,38,NULL,'',8,1494674687,8,1494674687),(74,17,39,NULL,'',8,1494674700,8,1494674700),(75,17,40,NULL,'',8,1494674700,8,1494674700),(76,17,41,NULL,'',8,1494674700,8,1494674700),(77,18,62,NULL,'',8,1494674712,8,1494674712),(78,18,63,NULL,'',8,1494674712,8,1494674712),(79,18,64,NULL,'',8,1494674712,8,1494674712),(80,18,65,NULL,'',8,1494674712,8,1494674712),(81,19,66,'0.00','Kebijakan belum ditandatangani, sudah dibuat draft kebijakan',8,1494674757,8,1494674757),(82,19,67,'0.00','Belum terdapat sistem tata kelola comdev secara khusus dan belum diterapkan secara konsisten',8,1494674757,8,1494674757),(83,19,68,'0.00','Belum dapat menunjukan data',8,1494674757,8,1494674757),(84,19,69,'0.00','SDM pengelola comdev belum mendapatkan pelatihan comdev',8,1494674757,8,1494674757),(85,19,70,'0.00','Belum dapat menunjukan data',8,1494674757,8,1494674757),(86,20,42,NULL,'',8,1494674806,8,1494674806),(87,20,43,NULL,'',8,1494674806,8,1494674806),(88,20,44,NULL,'',8,1494674807,8,1494674807),(89,20,45,NULL,'',8,1494674807,8,1494674807),(90,20,46,NULL,'',8,1494674807,8,1494674807),(91,20,47,NULL,'',8,1494674807,8,1494674807),(92,20,48,NULL,'',8,1494674807,8,1494674807),(93,20,49,NULL,'',8,1494674807,8,1494674807),(94,20,50,NULL,'',8,1494674807,8,1494674807),(95,20,51,NULL,'',8,1494674807,8,1494674807),(96,20,52,NULL,'',8,1494674807,8,1494674807),(97,20,53,NULL,'',8,1494674807,8,1494674807),(98,20,55,NULL,'',8,1494674807,8,1494674807),(99,20,56,NULL,'',8,1494674807,8,1494674807),(100,20,57,NULL,'',8,1494674807,8,1494674807),(101,20,58,NULL,'',8,1494674807,8,1494674807),(102,11,71,'0.50','',8,1494917712,8,1494947036),(120,11,89,'0.50','',8,1494919342,8,1494947036),(121,11,90,'0.50','',8,1494919342,8,1494947036),(122,11,91,'0.50','',8,1494919342,8,1494947036),(123,11,92,'0.00','',8,1494919342,8,1494947036),(124,11,93,'0.00','',8,1494919342,8,1494947036),(125,11,94,'0.00','',8,1494919342,8,1494947036),(126,11,95,'0.00','',8,1494919342,8,1494947036),(127,11,96,'0.00','',8,1494919342,8,1494947036),(128,11,97,'0.00','',8,1494919342,8,1494947036),(129,11,98,'0.00','',8,1494919342,8,1494947036),(130,11,99,'0.00','',8,1494919342,8,1494947036),(131,11,100,'0.00','',8,1494919342,8,1494947036),(132,11,101,'0.00','',8,1494919342,8,1494947036),(133,11,102,'0.00','',8,1494919342,8,1494947036),(134,11,103,'0.00','',8,1494919723,8,1494947036),(135,11,104,'0.00','',8,1494919723,8,1494947036),(136,11,105,'0.00','',8,1494919723,8,1494947036),(137,11,106,'0.00','',8,1494919723,8,1494947036),(138,11,107,'0.00','',8,1494919723,8,1494947036),(139,11,108,'0.00','',8,1494919723,8,1494947036),(140,11,109,'0.00','',8,1494919723,8,1494947036),(141,11,110,'0.00','',8,1494919723,8,1494947036),(142,11,111,'0.00','',8,1494919724,8,1494947036),(143,11,112,'0.00','',8,1494919724,8,1494947036),(144,11,113,'0.00','',8,1494919724,8,1494947036),(145,11,114,'0.00','',8,1494919724,8,1494947036),(146,11,115,'0.00','',8,1494919724,8,1494947036),(147,11,116,'0.00','',8,1494919724,8,1494947036),(148,11,117,'0.00','',8,1494919724,8,1494947036),(149,11,118,'0.00','',8,1494922427,8,1494947036),(150,11,119,'0.00','',8,1494922427,8,1494947036),(151,11,120,'0.00','',8,1494922427,8,1494947036),(152,11,121,'0.00','',8,1494922427,8,1494947036),(153,11,122,'0.00','',8,1494922427,8,1494947036),(154,11,123,'0.00','',8,1494922427,8,1494947036),(155,11,124,'0.00','',8,1494922427,8,1494947036),(156,11,125,'0.00','',8,1494922427,8,1494947036),(157,11,126,'0.00','',8,1494922427,8,1494947036),(158,11,127,'0.00','',8,1494922428,8,1494947036),(159,11,128,'0.00','',8,1494922428,8,1494947036),(160,11,129,'0.00','',8,1494922428,8,1494947036),(161,11,130,'0.00','',8,1494922428,8,1494947036),(162,11,131,'0.00','',8,1494943185,8,1494947036),(163,11,132,'0.00','',8,1494943185,8,1494947036),(164,11,133,'0.00','',8,1494943185,8,1494947036),(165,11,134,'0.00','',8,1494943185,8,1494947036),(166,11,135,'0.00','',8,1494943185,8,1494947036),(167,11,136,'0.00','',8,1494943186,8,1494947036),(168,11,137,'0.00','',8,1494943186,8,1494947036),(169,11,138,'0.00','',8,1494943186,8,1494947036),(170,11,139,'0.00','',8,1494943186,8,1494947036),(171,11,140,'0.00','',8,1494943186,8,1494947036),(172,11,141,'0.00','',8,1494943186,8,1494947036),(173,11,142,'0.00','',8,1494943186,8,1494947036),(174,11,143,'0.00','',8,1494943186,8,1494947036),(175,11,144,'0.00','',8,1494943516,8,1494947036),(176,11,145,'0.00','',8,1494943517,8,1494947036),(177,11,146,'0.00','',8,1494943517,8,1494947036),(178,11,147,'0.00','',8,1494943517,8,1494947036),(179,11,148,'0.00','',8,1494943517,8,1494947036),(180,11,149,'0.00','',8,1494943517,8,1494947037),(181,11,150,'0.00','',8,1494943517,8,1494947037),(182,11,151,'0.00','',8,1494943517,8,1494947037),(183,11,152,'0.00','',8,1494943517,8,1494947037),(184,11,153,'0.00','',8,1494943517,8,1494947037),(185,11,154,'0.00','',8,1494943517,8,1494947037),(186,11,155,'0.00','',8,1494943517,8,1494947037),(187,11,156,'0.00','',8,1494943517,8,1494947037),(188,11,157,'0.00','',8,1494943517,8,1494947037),(189,11,158,'0.00','',8,1494943517,8,1494947037),(190,11,159,'0.00','',8,1494943517,8,1494947037),(191,11,160,'0.00','',8,1494943517,8,1494947037),(192,11,161,'0.00','',8,1494943517,8,1494947037),(193,11,162,'0.00','',8,1494943517,8,1494947037),(194,11,163,'0.00','',8,1494943517,8,1494947037),(195,11,164,'0.00','',8,1494943517,8,1494947037),(196,11,165,'0.00','',8,1494943517,8,1494947037),(197,11,166,'0.00','',8,1494943517,8,1494947037),(198,11,167,'0.00','',8,1494944132,8,1494947037),(199,11,168,'0.00','',8,1494944133,8,1494947037),(200,11,169,'0.00','',8,1494944133,8,1494947037),(201,11,170,'0.00','',8,1494944133,8,1494947037),(202,11,171,'0.00','',8,1494944133,8,1494947037),(203,11,172,'0.00','',8,1494944133,8,1494947037),(204,11,173,'0.00','',8,1494944133,8,1494947037),(205,11,174,'0.00','',8,1494944133,8,1494947037),(206,11,175,'0.00','',8,1494944133,8,1494947037),(207,11,176,'0.00','',8,1494944515,8,1494947037),(216,11,185,'0.00','',8,1494946813,8,1494947037),(217,11,186,'0.00','',8,1494946813,8,1494947037),(218,11,187,'0.00','',8,1494946813,8,1494947037),(219,11,188,'0.00','',8,1494946814,8,1494947037),(220,11,189,'0.00','',8,1494946814,8,1494947037),(221,11,190,'0.00','',8,1494946814,8,1494947037),(222,11,191,'0.00','',8,1494946814,8,1494947037),(223,11,192,'0.00','',8,1494946814,8,1494947037),(224,12,193,'0.00',NULL,8,1494951182,8,1494951182),(225,12,194,'0.00',NULL,8,1494951182,8,1494951182),(226,12,195,'0.00',NULL,8,1494951182,8,1494951182),(227,12,196,'0.00',NULL,8,1494953792,8,1494953792),(228,12,197,'0.00',NULL,8,1494953792,8,1494953792),(229,12,198,'0.00',NULL,8,1494953793,8,1494953793),(230,12,199,'0.00',NULL,8,1494953793,8,1494953793),(231,12,200,'0.00',NULL,8,1494953793,8,1494953793),(232,12,201,'0.00',NULL,8,1494953793,8,1494953793),(233,12,202,'0.00',NULL,8,1494953832,8,1494953832),(234,12,203,'0.00',NULL,8,1494953832,8,1494953832),(235,12,204,'0.00',NULL,8,1494953832,8,1494953832),(236,12,205,'0.00',NULL,8,1494953870,8,1494953870),(237,12,206,'0.00',NULL,8,1494953870,8,1494953870),(238,12,207,'0.00',NULL,8,1494953870,8,1494953870),(239,12,208,'0.00',NULL,8,1494953982,8,1494953982),(240,12,209,'0.00',NULL,8,1494953982,8,1494953982),(241,12,210,'0.00',NULL,8,1494953982,8,1494953982),(242,12,211,'0.00',NULL,8,1494953982,8,1494953982),(243,12,212,'0.00',NULL,8,1494953982,8,1494953982),(244,12,213,'0.00',NULL,8,1494953983,8,1494953983),(245,12,214,'0.00',NULL,8,1494953983,8,1494953983),(246,12,215,'0.00',NULL,8,1494953983,8,1494953983),(247,12,216,'0.00',NULL,8,1494953983,8,1494953983),(248,12,217,'0.00',NULL,8,1494953983,8,1494953983),(249,12,218,'0.00',NULL,8,1494953983,8,1494953983),(250,12,219,'0.00',NULL,8,1494954101,8,1494954101),(251,12,220,'0.00',NULL,8,1494954101,8,1494954101),(252,12,221,'0.00',NULL,8,1494954101,8,1494954101),(253,12,222,'0.00',NULL,8,1494954101,8,1494954101),(254,12,223,'0.00',NULL,8,1494954101,8,1494954101),(255,12,224,'0.00',NULL,8,1494954101,8,1494954101),(256,12,225,'0.00',NULL,8,1494954101,8,1494954101),(257,12,226,'0.00',NULL,8,1494954101,8,1494954101),(258,14,227,'0.00',NULL,8,1494954278,8,1494954278),(259,14,228,'0.00',NULL,8,1494954278,8,1494954278),(260,14,229,'0.00',NULL,8,1494954291,8,1494954291),(261,14,230,'0.00',NULL,8,1494954320,8,1494954320),(262,14,231,'0.00',NULL,8,1494954320,8,1494954320),(263,14,232,'0.00',NULL,8,1494954320,8,1494954320),(264,14,233,'0.00',NULL,8,1494954406,8,1494954406),(265,14,234,'0.00',NULL,8,1494954406,8,1494954406),(266,14,235,'0.00',NULL,8,1494954406,8,1494954406),(267,14,236,'0.00',NULL,8,1494954406,8,1494954406),(268,14,237,'0.00',NULL,8,1494954406,8,1494954406),(269,14,238,'0.00',NULL,8,1494954406,8,1494954406),(270,14,239,'0.00',NULL,8,1494954406,8,1494954406),(271,14,240,'0.00',NULL,8,1494954406,8,1494954406),(272,14,241,'0.00',NULL,8,1494954406,8,1494954406),(273,14,242,'0.00',NULL,8,1494954406,8,1494954406),(274,14,243,'0.00',NULL,8,1494954406,8,1494954406),(275,14,244,'0.00',NULL,8,1494954592,8,1494954592),(276,14,245,'0.00',NULL,8,1494954592,8,1494954592),(277,14,246,'0.00',NULL,8,1494954592,8,1494954592),(278,14,247,'0.00',NULL,8,1494954592,8,1494954592),(279,14,248,'0.00',NULL,8,1494954592,8,1494954592),(280,14,249,'0.00',NULL,8,1494954593,8,1494954593),(281,14,250,'0.00',NULL,8,1494954593,8,1494954593),(282,14,251,'0.00',NULL,8,1494954593,8,1494954593),(283,14,252,'0.00',NULL,8,1494954593,8,1494954593),(284,14,253,'0.00',NULL,8,1494954593,8,1494954593),(285,14,254,'0.00',NULL,8,1494954593,8,1494954593),(286,14,255,'0.00',NULL,8,1494954593,8,1494954593),(287,14,256,'0.00',NULL,8,1494954593,8,1494954593),(288,14,257,'0.00',NULL,8,1494954593,8,1494954593),(289,14,258,'0.00',NULL,8,1494954593,8,1494954593),(290,14,259,'0.00',NULL,8,1494954593,8,1494954593),(291,14,260,'0.00',NULL,8,1494954593,8,1494954593),(292,14,261,'0.00',NULL,8,1494954593,8,1494954593),(293,14,262,'0.00',NULL,8,1494954593,8,1494954593),(294,16,263,'0.00',NULL,8,1494957618,8,1494957618),(295,16,264,'0.00',NULL,8,1494957618,8,1494957618),(296,16,265,'0.00',NULL,8,1494957618,8,1494957618),(297,16,266,'0.00',NULL,8,1494957710,8,1494957710),(305,16,274,'0.00',NULL,8,1494957969,8,1494957969),(306,16,275,'0.00',NULL,8,1494957969,8,1494957969),(307,16,276,'0.00',NULL,8,1494957969,8,1494957969),(308,16,277,'0.00',NULL,8,1494957969,8,1494957969),(309,16,278,'0.00',NULL,8,1494957969,8,1494957969),(310,16,279,'0.00',NULL,8,1494957969,8,1494957969),(311,16,280,'0.00',NULL,8,1494957969,8,1494957969),(312,16,281,'0.00',NULL,8,1494957969,8,1494957969),(313,16,282,'0.00',NULL,8,1494957969,8,1494957969),(314,16,283,'0.00',NULL,8,1494957969,8,1494957969),(315,16,284,'0.00',NULL,8,1494957969,8,1494957969),(316,16,285,'0.00',NULL,8,1494958003,8,1494958003),(317,16,286,'0.00',NULL,8,1494958088,8,1494958088),(318,16,287,'0.00',NULL,8,1494958088,8,1494958088),(319,16,288,'0.00',NULL,8,1494958088,8,1494958088),(320,16,289,'0.00',NULL,8,1494958088,8,1494958088),(321,16,290,'0.00',NULL,8,1494958442,8,1494958442),(322,16,291,'0.00',NULL,8,1494958442,8,1494958442),(323,16,292,'0.00',NULL,8,1494958442,8,1494958442),(324,16,293,'0.00',NULL,8,1494958442,8,1494958442),(325,16,294,'0.00',NULL,8,1494958442,8,1494958442),(326,16,295,'0.00',NULL,8,1494958442,8,1494958442),(327,16,296,'0.00',NULL,8,1494958442,8,1494958442),(328,16,297,'0.00',NULL,8,1494958442,8,1494958442),(329,16,298,'0.00',NULL,8,1494958442,8,1494958442),(330,16,299,'0.00',NULL,8,1494958442,8,1494958442),(331,16,300,'0.00',NULL,8,1494958442,8,1494958442),(332,16,301,'0.00',NULL,8,1494960772,8,1494960772),(333,16,302,'0.00',NULL,8,1494960772,8,1494960772),(334,16,303,'0.00',NULL,8,1494960772,8,1494960772),(335,16,304,'0.00',NULL,8,1494960772,8,1494960772),(336,16,305,'0.00',NULL,8,1494960772,8,1494960772),(337,16,306,'0.00',NULL,8,1494960772,8,1494960772),(338,16,307,'0.00',NULL,8,1494960773,8,1494960773),(339,16,308,'0.00',NULL,8,1494960773,8,1494960773),(340,16,309,'0.00',NULL,8,1494960773,8,1494960773),(341,16,310,'0.00',NULL,8,1494960773,8,1494960773),(342,16,311,'0.00',NULL,8,1494960773,8,1494960773),(343,16,312,'0.00',NULL,8,1494960773,8,1494960773),(344,16,313,'0.00',NULL,8,1494960773,8,1494960773),(345,16,314,'0.00',NULL,8,1494960773,8,1494960773),(346,16,315,'0.00',NULL,8,1494960773,8,1494960773),(347,16,316,'0.00',NULL,8,1494960773,8,1494960773),(348,16,317,'0.00',NULL,8,1494960773,8,1494960773),(349,16,318,'0.00',NULL,8,1494960773,8,1494960773),(350,17,319,'0.00',NULL,8,1494960982,8,1494960982),(351,17,320,'0.00',NULL,8,1494960982,8,1494960982),(352,17,321,'0.00',NULL,8,1494960982,8,1494960982),(353,17,322,'0.00',NULL,8,1494961004,8,1494961004),(354,17,323,'0.00',NULL,8,1494961004,8,1494961004),(355,17,324,'0.00',NULL,8,1494961041,8,1494961041),(356,17,325,'0.00',NULL,8,1494961041,8,1494961041),(357,17,326,'0.00',NULL,8,1494961041,8,1494961041),(358,17,327,'0.00',NULL,8,1494961071,8,1494961071),(359,17,328,'0.00',NULL,8,1494961071,8,1494961071),(360,17,329,'0.00',NULL,8,1494961071,8,1494961071),(361,17,330,'0.00',NULL,8,1494961173,8,1494961173),(362,17,331,'0.00',NULL,8,1494961173,8,1494961173),(363,17,332,'0.00',NULL,8,1494961173,8,1494961173),(364,17,333,'0.00',NULL,8,1494961173,8,1494961173),(365,17,334,'0.00',NULL,8,1494961173,8,1494961173),(366,17,335,'0.00',NULL,8,1494961173,8,1494961173),(367,17,336,'0.00',NULL,8,1494961173,8,1494961173),(368,17,337,'0.00',NULL,8,1494961174,8,1494961174),(369,17,338,'0.00',NULL,8,1494961174,8,1494961174),(370,17,339,'0.00',NULL,8,1494961174,8,1494961174),(371,17,340,'0.00',NULL,8,1494961174,8,1494961174),(372,17,341,'0.00',NULL,8,1494961290,8,1494961290),(373,17,342,'0.00',NULL,8,1494961290,8,1494961290),(374,17,343,'0.00',NULL,8,1494961290,8,1494961290),(375,17,344,'0.00',NULL,8,1494961290,8,1494961290),(376,17,345,'0.00',NULL,8,1494961290,8,1494961290),(377,17,346,'0.00',NULL,8,1494961290,8,1494961290),(378,17,347,'0.00',NULL,8,1494961290,8,1494961290),(379,17,348,'0.00',NULL,8,1494961290,8,1494961290),(380,17,349,'0.00',NULL,8,1494961290,8,1494961290),(381,17,350,'0.00',NULL,8,1494961290,8,1494961290),(382,17,351,'0.00',NULL,8,1494961290,8,1494961290),(383,17,352,'0.00',NULL,8,1494961290,8,1494961290),(384,17,353,'0.00',NULL,8,1494961290,8,1494961290),(385,17,354,'0.00',NULL,8,1494961290,8,1494961290),(386,17,355,'0.00',NULL,8,1494961290,8,1494961290),(387,13,356,'0.00',NULL,8,1494962074,8,1494962074),(388,20,356,'0.00',NULL,8,1494962075,8,1494962075),(389,13,357,'0.00',NULL,8,1494962075,8,1494962075),(390,20,357,'0.00',NULL,8,1494962075,8,1494962075),(391,13,358,'0.00',NULL,8,1494962075,8,1494962075),(392,20,358,'0.00',NULL,8,1494962075,8,1494962075),(393,13,359,'0.00',NULL,8,1494962491,8,1494962491),(394,20,359,'0.00',NULL,8,1494962491,8,1494962491),(395,13,360,'0.00',NULL,8,1494962491,8,1494962491),(396,20,360,'0.00',NULL,8,1494962491,8,1494962491),(397,13,361,'0.00',NULL,8,1494962491,8,1494962491),(398,20,361,'0.00',NULL,8,1494962491,8,1494962491),(399,13,362,'0.00',NULL,8,1494962491,8,1494962491),(400,20,362,'0.00',NULL,8,1494962491,8,1494962491),(401,13,363,'0.00',NULL,8,1494962491,8,1494962491),(402,20,363,'0.00',NULL,8,1494962491,8,1494962491),(403,13,364,'0.00',NULL,8,1494962491,8,1494962491),(404,20,364,'0.00',NULL,8,1494962491,8,1494962491),(405,13,365,'0.00',NULL,8,1494962491,8,1494962491),(406,20,365,'0.00',NULL,8,1494962491,8,1494962491),(407,13,366,'0.00',NULL,8,1494962491,8,1494962491),(408,20,366,'0.00',NULL,8,1494962491,8,1494962491),(409,13,367,'0.00',NULL,8,1494962491,8,1494962491),(410,20,367,'0.00',NULL,8,1494962491,8,1494962491),(411,13,368,'0.00',NULL,8,1494962491,8,1494962491),(412,20,368,'0.00',NULL,8,1494962491,8,1494962491),(413,13,369,'0.00',NULL,8,1494962491,8,1494962491),(414,20,369,'0.00',NULL,8,1494962491,8,1494962491),(415,13,370,'0.00',NULL,8,1494962491,8,1494962491),(416,20,370,'0.00',NULL,8,1494962491,8,1494962491),(417,13,371,'0.00',NULL,8,1494962491,8,1494962491),(418,20,371,'0.00',NULL,8,1494962491,8,1494962491),(419,13,372,'0.00',NULL,8,1494962491,8,1494962491),(420,20,372,'0.00',NULL,8,1494962491,8,1494962491),(421,13,373,'0.00',NULL,8,1494962491,8,1494962491),(422,20,373,'0.00',NULL,8,1494962491,8,1494962491),(423,13,374,'0.00',NULL,8,1494962491,8,1494962491),(424,20,374,'0.00',NULL,8,1494962491,8,1494962491),(425,13,375,'0.00',NULL,8,1494962491,8,1494962491),(426,20,375,'0.00',NULL,8,1494962491,8,1494962491),(427,13,376,'0.00',NULL,8,1494962491,8,1494962491),(428,20,376,'0.00',NULL,8,1494962491,8,1494962491),(429,13,377,'0.00',NULL,8,1494962491,8,1494962491),(430,20,377,'0.00',NULL,8,1494962491,8,1494962491),(431,13,378,'0.00',NULL,8,1494962491,8,1494962491),(432,20,378,'0.00',NULL,8,1494962491,8,1494962491),(433,13,379,'0.00',NULL,8,1494962491,8,1494962491),(434,20,379,'0.00',NULL,8,1494962491,8,1494962491),(435,13,380,'0.00',NULL,8,1494962491,8,1494962491),(436,20,380,'0.00',NULL,8,1494962491,8,1494962491),(437,13,381,'0.00',NULL,8,1494962491,8,1494962491),(438,20,381,'0.00',NULL,8,1494962491,8,1494962491),(439,13,382,'0.00',NULL,8,1494962491,8,1494962491),(440,20,382,'0.00',NULL,8,1494962491,8,1494962491),(441,13,383,'0.00',NULL,8,1494962643,8,1494962643),(442,20,383,'0.00',NULL,8,1494962643,8,1494962643),(443,13,384,'0.00',NULL,8,1494962643,8,1494962643),(444,20,384,'0.00',NULL,8,1494962643,8,1494962643),(445,13,385,'0.00',NULL,8,1494962643,8,1494962643),(446,20,385,'0.00',NULL,8,1494962643,8,1494962643),(447,13,386,'0.00',NULL,8,1494962643,8,1494962643),(448,20,386,'0.00',NULL,8,1494962643,8,1494962643),(449,13,387,'0.00',NULL,8,1494962643,8,1494962643),(450,20,387,'0.00',NULL,8,1494962643,8,1494962643),(451,13,388,'0.00',NULL,8,1494962643,8,1494962643),(452,20,388,'0.00',NULL,8,1494962643,8,1494962643),(453,13,389,'0.00',NULL,8,1494962643,8,1494962643),(454,20,389,'0.00',NULL,8,1494962643,8,1494962643),(455,13,390,'0.00',NULL,8,1494962643,8,1494962643),(456,20,390,'0.00',NULL,8,1494962643,8,1494962643),(457,13,391,'0.00',NULL,8,1494962643,8,1494962643),(458,20,391,'0.00',NULL,8,1494962643,8,1494962643),(459,13,392,'0.00',NULL,8,1494962643,8,1494962643),(460,20,392,'0.00',NULL,8,1494962643,8,1494962643),(461,13,393,'0.00',NULL,8,1494962643,8,1494962643),(462,20,393,'0.00',NULL,8,1494962643,8,1494962643),(463,13,394,'0.00',NULL,8,1494962658,8,1494962658),(464,20,394,'0.00',NULL,8,1494962658,8,1494962658),(465,13,395,'0.00',NULL,8,1494962677,8,1494962677),(466,20,395,'0.00',NULL,8,1494962677,8,1494962677),(467,13,396,'0.00',NULL,8,1494962677,8,1494962677),(468,20,396,'0.00',NULL,8,1494962677,8,1494962677),(469,13,397,'0.00',NULL,8,1494962712,8,1494962712),(470,20,397,'0.00',NULL,8,1494962712,8,1494962712),(471,13,398,'0.00',NULL,8,1494962712,8,1494962712),(472,20,398,'0.00',NULL,8,1494962712,8,1494962712),(473,13,399,'0.00',NULL,8,1494962712,8,1494962712),(474,20,399,'0.00',NULL,8,1494962712,8,1494962712),(475,13,400,'0.00',NULL,8,1494962712,8,1494962712),(476,20,400,'0.00',NULL,8,1494962712,8,1494962712),(477,15,401,'0.00',NULL,8,1494963056,8,1494963056),(478,15,402,'0.00',NULL,8,1494963056,8,1494963056),(479,15,403,'0.00',NULL,8,1494963075,8,1494963075),(480,15,404,'0.00',NULL,8,1494963190,8,1494963190),(481,15,405,'0.00',NULL,8,1494963190,8,1494963190),(482,15,406,'0.00',NULL,8,1494963191,8,1494963191),(483,15,407,'0.00',NULL,8,1494963191,8,1494963191),(484,15,408,'0.00',NULL,8,1494963191,8,1494963191),(485,15,409,'0.00',NULL,8,1494963191,8,1494963191),(486,15,410,'0.00',NULL,8,1494963191,8,1494963191),(487,15,411,'0.00',NULL,8,1494963191,8,1494963191),(488,15,412,'0.00',NULL,8,1494963191,8,1494963191),(489,15,413,'0.00',NULL,8,1494963191,8,1494963191),(490,15,414,'0.00',NULL,8,1494963191,8,1494963191),(491,15,415,'0.00',NULL,8,1494963191,8,1494963191),(492,15,416,'0.00',NULL,8,1494963191,8,1494963191),(493,15,417,'0.00',NULL,8,1494963191,8,1494963191),(494,15,418,'0.00',NULL,8,1494963317,8,1494963317),(495,15,419,'0.00',NULL,8,1494963317,8,1494963317),(496,15,420,'0.00',NULL,8,1494963317,8,1494963317),(497,15,421,'0.00',NULL,8,1494963317,8,1494963317),(498,15,422,'0.00',NULL,8,1494963317,8,1494963317),(499,15,423,'0.00',NULL,8,1494963317,8,1494963317),(500,15,424,'0.00',NULL,8,1494963317,8,1494963317),(501,15,425,'0.00',NULL,8,1494963317,8,1494963317),(502,15,426,'0.00',NULL,8,1494963317,8,1494963317),(503,15,427,'0.00',NULL,8,1494963317,8,1494963317),(504,15,428,'0.00',NULL,8,1494963317,8,1494963317),(505,15,429,'0.00',NULL,8,1494963317,8,1494963317),(506,15,430,'0.00',NULL,8,1494963317,8,1494963317),(507,15,431,'0.00',NULL,8,1494963317,8,1494963317),(508,18,432,'0.00',NULL,8,1494963482,8,1494963482),(509,18,433,'0.00',NULL,8,1494963482,8,1494963482),(510,18,434,'0.00',NULL,8,1494963482,8,1494963482),(511,18,435,'0.00',NULL,8,1494963482,8,1494963482),(512,18,436,'0.00',NULL,8,1494963482,8,1494963482),(513,18,437,'0.00',NULL,8,1494963482,8,1494963482),(514,18,438,'0.00',NULL,8,1494963482,8,1494963482),(515,18,439,'0.00',NULL,8,1494963482,8,1494963482),(516,18,440,'0.00',NULL,8,1494963482,8,1494963482),(517,18,441,'0.00',NULL,8,1494963482,8,1494963482),(518,18,442,'0.00',NULL,8,1494963530,8,1494963530),(519,18,443,'0.00',NULL,8,1494963530,8,1494963530),(520,18,444,'0.00',NULL,8,1494963530,8,1494963530),(521,18,445,'0.00',NULL,8,1494963530,8,1494963530),(522,18,446,'0.00',NULL,8,1494963630,8,1494963630),(523,18,447,'0.00',NULL,8,1494963630,8,1494963630),(524,18,448,'0.00',NULL,8,1494963630,8,1494963630),(525,18,449,'0.00',NULL,8,1494963630,8,1494963630),(526,18,450,'0.00',NULL,8,1494963630,8,1494963630),(527,18,451,'0.00',NULL,8,1494963630,8,1494963630),(528,18,452,'0.00',NULL,8,1494963630,8,1494963630),(529,18,453,'0.00',NULL,8,1494963630,8,1494963630),(530,18,454,'0.00',NULL,8,1494963630,8,1494963630),(531,18,455,'0.00',NULL,8,1494963630,8,1494963630),(532,18,456,'0.00',NULL,8,1494963630,8,1494963630),(533,19,457,'0.00',NULL,8,1495003680,8,1495003680),(534,19,458,'0.00',NULL,8,1495003680,8,1495003680),(535,19,459,'0.00',NULL,8,1495004018,8,1495004018),(536,19,460,'0.00',NULL,8,1495004018,8,1495004018),(537,19,461,'0.00',NULL,8,1495004018,8,1495004018),(538,19,462,'0.00',NULL,8,1495004018,8,1495004018),(539,19,463,'0.00',NULL,8,1495004018,8,1495004018),(540,19,464,'0.00',NULL,8,1495004018,8,1495004018),(541,19,465,'0.00',NULL,8,1495004018,8,1495004018),(542,19,466,'0.00',NULL,8,1495004018,8,1495004018),(543,19,467,'0.00',NULL,8,1495004018,8,1495004018),(544,19,468,'0.00',NULL,8,1495004018,8,1495004018),(545,19,469,'0.00',NULL,8,1495004018,8,1495004018),(546,19,470,'0.00',NULL,8,1495004018,8,1495004018),(547,19,471,'0.00',NULL,8,1495004018,8,1495004018),(548,19,472,'0.00',NULL,8,1495004018,8,1495004018),(549,19,473,'0.00',NULL,8,1495004018,8,1495004018),(550,19,474,'0.00',NULL,8,1495004018,8,1495004018),(551,19,475,'0.00',NULL,8,1495004018,8,1495004018),(552,19,476,'0.00',NULL,8,1495004018,8,1495004018),(553,19,477,'0.00',NULL,8,1495004018,8,1495004018),(554,19,478,'0.00',NULL,8,1495004018,8,1495004018),(555,19,479,'0.00',NULL,8,1495004018,8,1495004018),(556,19,480,'0.00',NULL,8,1495004018,8,1495004018),(557,19,481,'0.00',NULL,8,1495004018,8,1495004018),(558,19,482,'0.00',NULL,8,1495004018,8,1495004018),(559,19,483,'0.00',NULL,8,1495004086,8,1495004086),(560,19,484,'0.00',NULL,8,1495004086,8,1495004086),(561,19,485,'0.00',NULL,8,1495004087,8,1495004087),(562,19,486,'0.00',NULL,8,1495004087,8,1495004087),(563,19,487,'0.00',NULL,8,1495004087,8,1495004087),(564,19,488,'0.00',NULL,8,1495004087,8,1495004087),(565,19,489,'0.00',NULL,8,1495004087,8,1495004087),(566,19,490,'0.00',NULL,8,1495004181,8,1495004181),(567,19,491,'0.00',NULL,8,1495004181,8,1495004181),(568,19,492,'0.00',NULL,8,1495004181,8,1495004181),(569,19,493,'0.00',NULL,8,1495004181,8,1495004181),(570,19,494,'0.00',NULL,8,1495004181,8,1495004181),(571,19,495,'0.00',NULL,8,1495004181,8,1495004181),(572,19,496,'0.00',NULL,8,1495004181,8,1495004181),(573,19,497,'0.00',NULL,8,1495004181,8,1495004181),(574,19,498,'0.00',NULL,8,1495004181,8,1495004181),(575,19,499,'0.00',NULL,8,1495004181,8,1495004181),(576,19,500,'0.00',NULL,8,1495004181,8,1495004181),(577,19,501,'0.00',NULL,8,1495004181,8,1495004181),(578,19,502,'0.00',NULL,8,1495004181,8,1495004181),(579,19,503,'0.00',NULL,8,1495004181,8,1495004181),(580,19,504,'0.00',NULL,8,1495004239,8,1495004239),(581,19,505,'0.00',NULL,8,1495004239,8,1495004239),(582,19,506,'0.00',NULL,8,1495004239,8,1495004239),(583,19,507,'0.00',NULL,8,1495004239,8,1495004239),(584,19,508,'0.00',NULL,8,1495004239,8,1495004239),(585,19,509,'0.00',NULL,8,1495004239,8,1495004239),(586,19,510,'0.00',NULL,8,1495004240,8,1495004240),(587,19,511,'0.00',NULL,8,1495004240,8,1495004240),(588,19,512,'0.00',NULL,8,1495004277,8,1495004277),(589,19,513,'0.00',NULL,8,1495004277,8,1495004277),(590,19,514,'0.00',NULL,8,1495004277,8,1495004277),(591,21,59,NULL,'',8,1496484278,8,1496484379),(592,21,60,NULL,'',8,1496484279,8,1496484379),(593,21,61,NULL,'',8,1496484279,8,1496484379),(594,21,401,NULL,'',8,1496484279,8,1496484379),(595,21,402,NULL,'',8,1496484279,8,1496484379),(596,21,403,NULL,'',8,1496484279,8,1496484379),(597,21,404,NULL,'',8,1496484279,8,1496484379),(598,21,405,NULL,'',8,1496484279,8,1496484379),(599,21,406,NULL,'',8,1496484279,8,1496484379),(600,21,407,NULL,'',8,1496484279,8,1496484379),(601,21,408,NULL,'',8,1496484279,8,1496484379),(602,21,409,NULL,'',8,1496484279,8,1496484379),(603,21,410,NULL,'',8,1496484279,8,1496484379),(604,21,411,NULL,'',8,1496484279,8,1496484379),(605,21,412,NULL,'',8,1496484279,8,1496484379),(606,21,413,NULL,'',8,1496484279,8,1496484379),(607,21,414,NULL,'',8,1496484279,8,1496484379),(608,21,415,NULL,'',8,1496484279,8,1496484379),(609,21,416,NULL,'',8,1496484279,8,1496484379),(610,21,417,NULL,'',8,1496484279,8,1496484379),(611,21,418,NULL,'',8,1496484279,8,1496484379),(612,21,419,NULL,'',8,1496484279,8,1496484379),(613,21,420,NULL,'',8,1496484279,8,1496484379),(614,21,421,NULL,'',8,1496484279,8,1496484379),(615,21,422,NULL,'',8,1496484279,8,1496484379),(616,21,423,NULL,'',8,1496484279,8,1496484379),(617,21,424,NULL,'',8,1496484279,8,1496484379),(618,21,425,NULL,'',8,1496484279,8,1496484379),(619,21,426,NULL,'',8,1496484279,8,1496484379),(620,21,427,NULL,'',8,1496484279,8,1496484379),(621,21,428,NULL,'',8,1496484279,8,1496484379),(622,21,429,NULL,'',8,1496484279,8,1496484379),(623,21,430,NULL,'',8,1496484279,8,1496484379),(624,21,431,NULL,'',8,1496484279,8,1496484379),(625,22,34,NULL,'',8,1497155733,8,1497155733),(626,22,35,NULL,'',8,1497155733,8,1497155733),(627,22,36,NULL,'',8,1497155733,8,1497155733),(628,22,37,NULL,'',8,1497155733,8,1497155733),(629,22,38,NULL,'',8,1497155733,8,1497155733),(630,22,263,NULL,'',8,1497155733,8,1497155733),(631,22,264,NULL,'',8,1497155733,8,1497155733),(632,22,265,NULL,'',8,1497155733,8,1497155733),(633,22,266,NULL,'',8,1497155733,8,1497155733),(634,22,274,NULL,'',8,1497155733,8,1497155733),(635,22,275,NULL,'',8,1497155733,8,1497155733),(636,22,276,NULL,'',8,1497155733,8,1497155733),(637,22,277,NULL,'',8,1497155733,8,1497155733),(638,22,278,NULL,'',8,1497155733,8,1497155733),(639,22,279,NULL,'',8,1497155733,8,1497155733),(640,22,280,NULL,'',8,1497155733,8,1497155733),(641,22,281,NULL,'',8,1497155733,8,1497155733),(642,22,282,NULL,'',8,1497155733,8,1497155733),(643,22,283,NULL,'',8,1497155733,8,1497155733),(644,22,284,NULL,'',8,1497155733,8,1497155733),(645,22,285,NULL,'',8,1497155733,8,1497155733),(646,22,286,NULL,'',8,1497155733,8,1497155733),(647,22,287,NULL,'',8,1497155733,8,1497155733),(648,22,288,NULL,'',8,1497155733,8,1497155733),(649,22,289,NULL,'',8,1497155733,8,1497155733),(650,22,290,NULL,'',8,1497155733,8,1497155733),(651,22,291,NULL,'',8,1497155733,8,1497155733),(652,22,292,NULL,'',8,1497155733,8,1497155733),(653,22,293,NULL,'',8,1497155733,8,1497155733),(654,22,294,NULL,'',8,1497155733,8,1497155733),(655,22,295,NULL,'',8,1497155733,8,1497155733),(656,22,296,NULL,'',8,1497155733,8,1497155733),(657,22,297,NULL,'',8,1497155733,8,1497155733),(658,22,298,NULL,'',8,1497155733,8,1497155733),(659,22,299,NULL,'',8,1497155733,8,1497155733),(660,22,300,NULL,'',8,1497155733,8,1497155733),(661,22,301,NULL,'',8,1497155733,8,1497155733),(662,22,302,NULL,'',8,1497155733,8,1497155733),(663,22,303,NULL,'',8,1497155733,8,1497155733),(664,22,304,NULL,'',8,1497155733,8,1497155733),(665,22,305,NULL,'',8,1497155733,8,1497155733),(666,22,306,NULL,'',8,1497155733,8,1497155733),(667,22,307,NULL,'',8,1497155733,8,1497155733),(668,22,308,NULL,'',8,1497155733,8,1497155733),(669,22,309,NULL,'',8,1497155733,8,1497155733),(670,22,310,NULL,'',8,1497155733,8,1497155733),(671,22,311,NULL,'',8,1497155733,8,1497155733),(672,22,312,NULL,'',8,1497155733,8,1497155733),(673,22,313,NULL,'',8,1497155733,8,1497155733),(674,22,314,NULL,'',8,1497155733,8,1497155733),(675,22,315,NULL,'',8,1497155733,8,1497155733),(676,22,316,NULL,'',8,1497155733,8,1497155733),(677,22,317,NULL,'',8,1497155733,8,1497155733),(678,22,318,NULL,'',8,1497155733,8,1497155733),(679,23,42,NULL,'',8,1499180045,8,1499180150),(680,23,43,NULL,'',8,1499180045,8,1499180150),(681,23,44,NULL,'',8,1499180045,8,1499180150),(682,23,45,NULL,'',8,1499180045,8,1499180150),(683,23,46,NULL,'',8,1499180045,8,1499180150),(684,23,47,NULL,'',8,1499180045,8,1499180150),(685,23,48,NULL,'',8,1499180045,8,1499180150),(686,23,49,NULL,'',8,1499180045,8,1499180150),(687,23,50,NULL,'',8,1499180045,8,1499180150),(688,23,51,NULL,'',8,1499180045,8,1499180150),(689,23,52,NULL,'',8,1499180045,8,1499180150),(690,23,53,NULL,'',8,1499180045,8,1499180150),(691,23,55,NULL,'',8,1499180045,8,1499180150),(692,23,56,NULL,'',8,1499180045,8,1499180150),(693,23,57,NULL,'',8,1499180045,8,1499180150),(694,23,58,NULL,'',8,1499180045,8,1499180150),(695,23,356,NULL,'',8,1499180045,8,1499180150),(696,23,357,NULL,'',8,1499180045,8,1499180150),(697,23,358,NULL,'',8,1499180045,8,1499180150),(698,23,359,NULL,'',8,1499180045,8,1499180150),(699,23,360,NULL,'',8,1499180045,8,1499180150),(700,23,361,NULL,'',8,1499180045,8,1499180150),(701,23,362,NULL,'',8,1499180045,8,1499180150),(702,23,363,NULL,'',8,1499180045,8,1499180150),(703,23,364,NULL,'',8,1499180045,8,1499180150),(704,23,365,NULL,'',8,1499180045,8,1499180150),(705,23,366,NULL,'',8,1499180045,8,1499180150),(706,23,367,NULL,'',8,1499180045,8,1499180150),(707,23,368,NULL,'',8,1499180045,8,1499180150),(708,23,369,NULL,'',8,1499180045,8,1499180150),(709,23,370,NULL,'',8,1499180045,8,1499180150),(710,23,371,NULL,'',8,1499180045,8,1499180150),(711,23,372,NULL,'',8,1499180045,8,1499180150),(712,23,373,NULL,'',8,1499180045,8,1499180150),(713,23,374,NULL,'',8,1499180045,8,1499180150),(714,23,375,NULL,'',8,1499180045,8,1499180150),(715,23,376,NULL,'',8,1499180045,8,1499180150),(716,23,377,NULL,'',8,1499180045,8,1499180150),(717,23,378,NULL,'',8,1499180045,8,1499180150),(718,23,379,NULL,'',8,1499180045,8,1499180150),(719,23,380,NULL,'',8,1499180045,8,1499180150),(720,23,381,NULL,'',8,1499180045,8,1499180150),(721,23,382,NULL,'',8,1499180045,8,1499180150),(722,23,383,NULL,'',8,1499180045,8,1499180150),(723,23,384,NULL,'',8,1499180045,8,1499180150),(724,23,385,NULL,'',8,1499180045,8,1499180150),(725,23,386,NULL,'',8,1499180045,8,1499180150),(726,23,387,NULL,'',8,1499180045,8,1499180150),(727,23,388,NULL,'',8,1499180045,8,1499180150),(728,23,389,NULL,'',8,1499180045,8,1499180150),(729,23,390,NULL,'',8,1499180045,8,1499180150),(730,23,391,NULL,'',8,1499180045,8,1499180150),(731,23,392,NULL,'',8,1499180045,8,1499180150),(732,23,393,NULL,'',8,1499180045,8,1499180150),(733,23,394,NULL,'',8,1499180045,8,1499180150),(734,23,395,NULL,'',8,1499180045,8,1499180150),(735,23,396,NULL,'',8,1499180045,8,1499180150),(736,23,397,NULL,'',8,1499180045,8,1499180150),(737,23,398,NULL,'',8,1499180045,8,1499180150),(738,23,399,NULL,'',8,1499180045,8,1499180150),(739,23,400,NULL,'',8,1499180045,8,1499180150),(740,24,16,'0.50','',8,1499180170,8,1499192415),(741,24,71,'0.50','',8,1499180170,8,1499192415),(742,24,18,'0.50','',8,1499180170,8,1499192415),(743,24,19,'0.50','',8,1499180170,8,1499192415),(744,24,20,'0.50','',8,1499180170,8,1499192415),(745,24,89,'0.50','',8,1499180170,8,1499192415),(746,24,90,'0.50','',8,1499180170,8,1499192415),(747,24,91,'0.00','',8,1499180170,8,1499192415),(748,24,92,NULL,'',8,1499180170,8,1499192415),(749,24,93,NULL,'',8,1499180170,8,1499192415),(750,24,94,NULL,'',8,1499180170,8,1499192415),(751,24,95,NULL,'',8,1499180170,8,1499192415),(752,24,96,NULL,'',8,1499180170,8,1499192415),(753,24,97,NULL,'',8,1499180170,8,1499192415),(754,24,98,NULL,'',8,1499180170,8,1499192415),(755,24,99,NULL,'',8,1499180170,8,1499192415),(756,24,100,NULL,'',8,1499180170,8,1499192415),(757,24,101,NULL,'',8,1499180170,8,1499192415),(758,24,102,NULL,'',8,1499180170,8,1499192415),(759,24,103,NULL,'',8,1499180170,8,1499192415),(760,24,104,NULL,'',8,1499180170,8,1499192415),(761,24,105,NULL,'',8,1499180170,8,1499192415),(762,24,106,NULL,'',8,1499180170,8,1499192415),(763,24,107,NULL,'',8,1499180170,8,1499192415),(764,24,108,NULL,'',8,1499180170,8,1499192415),(765,24,109,NULL,'',8,1499180170,8,1499192415),(766,24,110,NULL,'',8,1499180170,8,1499192415),(767,24,111,NULL,'',8,1499180170,8,1499192415),(768,24,112,NULL,'',8,1499180170,8,1499192415),(769,24,113,NULL,'',8,1499180170,8,1499192415),(770,24,114,NULL,'',8,1499180170,8,1499192415),(771,24,115,NULL,'',8,1499180170,8,1499192415),(772,24,116,NULL,'',8,1499180170,8,1499192415),(773,24,117,NULL,'',8,1499180170,8,1499192415),(774,24,118,NULL,'',8,1499180170,8,1499192415),(775,24,119,NULL,'',8,1499180170,8,1499192415),(776,24,120,NULL,'',8,1499180170,8,1499192415),(777,24,121,NULL,'',8,1499180170,8,1499192415),(778,24,122,NULL,'',8,1499180170,8,1499192415),(779,24,123,NULL,'',8,1499180170,8,1499192415),(780,24,124,NULL,'',8,1499180170,8,1499192415),(781,24,125,NULL,'',8,1499180170,8,1499192415),(782,24,126,NULL,'',8,1499180170,8,1499192415),(783,24,127,NULL,'',8,1499180170,8,1499192415),(784,24,128,NULL,'',8,1499180170,8,1499192415),(785,24,129,NULL,'',8,1499180170,8,1499192415),(786,24,130,NULL,'',8,1499180170,8,1499192415),(787,24,131,NULL,'',8,1499180170,8,1499192415),(788,24,132,NULL,'',8,1499180170,8,1499192415),(789,24,133,NULL,'',8,1499180170,8,1499192415),(790,24,134,NULL,'',8,1499180170,8,1499192415),(791,24,135,NULL,'',8,1499180170,8,1499192415),(792,24,136,NULL,'',8,1499180170,8,1499192415),(793,24,137,NULL,'',8,1499180170,8,1499192415),(794,24,138,NULL,'',8,1499180170,8,1499192415),(795,24,139,NULL,'',8,1499180170,8,1499192415),(796,24,140,NULL,'',8,1499180170,8,1499192415),(797,24,141,NULL,'',8,1499180170,8,1499192415),(798,24,142,NULL,'',8,1499180170,8,1499192415),(799,24,143,NULL,'',8,1499180170,8,1499192415),(800,24,144,NULL,'',8,1499180170,8,1499192415),(801,24,145,NULL,'',8,1499180170,8,1499192415),(802,24,146,NULL,'',8,1499180170,8,1499192415),(803,24,147,NULL,'',8,1499180170,8,1499192415),(804,24,148,NULL,'',8,1499180170,8,1499192415),(805,24,149,NULL,'',8,1499180170,8,1499192415),(806,24,150,NULL,'',8,1499180170,8,1499192415),(807,24,151,NULL,'',8,1499180170,8,1499192415),(808,24,152,NULL,'',8,1499180170,8,1499192415),(809,24,153,NULL,'',8,1499180170,8,1499192415),(810,24,154,NULL,'',8,1499180170,8,1499192415),(811,24,155,NULL,'',8,1499180170,8,1499192415),(812,24,156,NULL,'',8,1499180170,8,1499192415),(813,24,157,NULL,'',8,1499180170,8,1499192415),(814,24,158,NULL,'',8,1499180170,8,1499192415),(815,24,159,NULL,'',8,1499180170,8,1499192415),(816,24,160,NULL,'',8,1499180170,8,1499192415),(817,24,161,NULL,'',8,1499180170,8,1499192415),(818,24,162,NULL,'',8,1499180170,8,1499192415),(819,24,163,NULL,'',8,1499180170,8,1499192415),(820,24,164,NULL,'',8,1499180170,8,1499192415),(821,24,165,NULL,'',8,1499180170,8,1499192415),(822,24,166,NULL,'',8,1499180170,8,1499192415),(823,24,167,NULL,'',8,1499180170,8,1499192415),(824,24,168,NULL,'',8,1499180170,8,1499192415),(825,24,169,NULL,'',8,1499180170,8,1499192415),(826,24,170,NULL,'',8,1499180170,8,1499192415),(827,24,171,NULL,'',8,1499180170,8,1499192415),(828,24,172,NULL,'',8,1499180170,8,1499192415),(829,24,173,NULL,'',8,1499180170,8,1499192415),(830,24,174,NULL,'',8,1499180170,8,1499192415),(831,24,175,NULL,'',8,1499180170,8,1499192415),(832,24,176,NULL,'',8,1499180170,8,1499192415),(833,24,185,NULL,'',8,1499180170,8,1499192415),(834,24,186,NULL,'',8,1499180170,8,1499192415),(835,24,187,NULL,'',8,1499180170,8,1499192415),(836,24,188,NULL,'',8,1499180170,8,1499192415),(837,24,189,NULL,'',8,1499180170,8,1499192415),(838,24,190,NULL,'',8,1499180170,8,1499192415),(839,24,191,NULL,'',8,1499180170,8,1499192415),(840,24,192,NULL,'',8,1499180170,8,1499192415),(841,25,66,NULL,'',8,1500221260,8,1500221260),(842,25,67,NULL,'',8,1500221261,8,1500221261),(843,25,68,NULL,'',8,1500221261,8,1500221261),(844,25,69,NULL,'',8,1500221261,8,1500221261),(845,25,70,NULL,'',8,1500221261,8,1500221261),(846,25,457,NULL,'',8,1500221261,8,1500221261),(847,25,458,NULL,'',8,1500221261,8,1500221261),(848,25,459,NULL,'',8,1500221261,8,1500221261),(849,25,460,NULL,'',8,1500221261,8,1500221261),(850,25,461,NULL,'',8,1500221261,8,1500221261),(851,25,462,NULL,'',8,1500221261,8,1500221261),(852,25,463,NULL,'',8,1500221261,8,1500221261),(853,25,464,NULL,'',8,1500221261,8,1500221261),(854,25,465,NULL,'',8,1500221261,8,1500221261),(855,25,466,NULL,'',8,1500221261,8,1500221261),(856,25,467,NULL,'',8,1500221261,8,1500221261),(857,25,468,NULL,'',8,1500221261,8,1500221261),(858,25,469,NULL,'',8,1500221261,8,1500221261),(859,25,470,NULL,'',8,1500221261,8,1500221261),(860,25,471,NULL,'',8,1500221261,8,1500221261),(861,25,472,NULL,'',8,1500221261,8,1500221261),(862,25,473,NULL,'',8,1500221261,8,1500221261),(863,25,474,NULL,'',8,1500221261,8,1500221261),(864,25,475,NULL,'',8,1500221261,8,1500221261),(865,25,476,NULL,'',8,1500221261,8,1500221261),(866,25,477,NULL,'',8,1500221261,8,1500221261),(867,25,478,NULL,'',8,1500221261,8,1500221261),(868,25,479,NULL,'',8,1500221261,8,1500221261),(869,25,480,NULL,'',8,1500221261,8,1500221261),(870,25,481,NULL,'',8,1500221261,8,1500221261),(871,25,482,NULL,'',8,1500221261,8,1500221261),(872,25,483,NULL,'',8,1500221261,8,1500221261),(873,25,484,NULL,'',8,1500221261,8,1500221261),(874,25,485,NULL,'',8,1500221261,8,1500221261),(875,25,486,NULL,'',8,1500221261,8,1500221261),(876,25,487,NULL,'',8,1500221261,8,1500221261),(877,25,488,NULL,'',8,1500221261,8,1500221261),(878,25,489,NULL,'',8,1500221261,8,1500221261),(879,25,490,NULL,'',8,1500221261,8,1500221261),(880,25,491,NULL,'',8,1500221261,8,1500221261),(881,25,492,NULL,'',8,1500221261,8,1500221261),(882,25,493,NULL,'',8,1500221261,8,1500221261),(883,25,494,NULL,'',8,1500221261,8,1500221261),(884,25,495,NULL,'',8,1500221261,8,1500221261),(885,25,496,NULL,'',8,1500221261,8,1500221261),(886,25,497,NULL,'',8,1500221261,8,1500221261),(887,25,498,NULL,'',8,1500221261,8,1500221261),(888,25,499,NULL,'',8,1500221261,8,1500221261),(889,25,500,NULL,'',8,1500221261,8,1500221261),(890,25,501,NULL,'',8,1500221261,8,1500221261),(891,25,502,NULL,'',8,1500221261,8,1500221261),(892,25,503,NULL,'',8,1500221261,8,1500221261),(893,25,504,NULL,'',8,1500221261,8,1500221261),(894,25,505,NULL,'',8,1500221261,8,1500221261),(895,25,506,NULL,'',8,1500221261,8,1500221261),(896,25,507,NULL,'',8,1500221261,8,1500221261),(897,25,508,NULL,'',8,1500221261,8,1500221261),(898,25,509,NULL,'',8,1500221261,8,1500221261),(899,25,510,NULL,'',8,1500221261,8,1500221261),(900,25,511,NULL,'',8,1500221261,8,1500221261),(901,25,512,NULL,'',8,1500221261,8,1500221261),(902,25,513,NULL,'',8,1500221261,8,1500221261),(903,25,514,NULL,'',8,1500221261,8,1500221261);

/*Table structure for table `bo_assessment_aspect` */

DROP TABLE IF EXISTS `bo_assessment_aspect`;

CREATE TABLE `bo_assessment_aspect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_form_type_code` varchar(10) NOT NULL,
  `boas_aspect` text NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bo_assessment_aspect` (`bo_form_type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `bo_assessment_aspect` */

insert  into `bo_assessment_aspect`(`id`,`bo_form_type_code`,`boas_aspect`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'DRKPL','<p>PENDAHULUAN</p>',8,1494381743,8,1494384094),(6,'DRKPL','<p>SML</p>',8,1494386031,8,1494386031),(7,'DRKPL','<p>EFISIENSI ENERGI</p>',8,1494386094,8,1494386094),(8,'EE','<p>1. Kebijakan Energi </p>',8,1494671910,8,1494671910),(9,'EE','<p>2. Struktur dan Tanggung jawab </p>',8,1494671955,8,1494671955),(10,'PPLB3','<p>a. Kebijakan Pengurangan dan Pemanfaatan LB3 </p>',8,1494672763,8,1494672763),(11,'PPLB3','<p>b. Struktur dan Tanggung jawab </p>',8,1494672795,8,1494672795),(12,'PGPU','<p>1. Kebijakan Pengurangan Pencemaran Udara</p>',8,1494672937,8,1494672937),(13,'PGPU','<p>2. Struktur dan Tanggung jawab </p>',8,1494673004,8,1494673004),(14,'KA','<p>1. Kebijakan Konservasi Air </p>',8,1494673074,8,1494673074),(15,'KA','<p>2. Struktur dan Tanggung jawab </p>',8,1494673107,8,1494673107),(16,'SML','<p>Kebijakan Lingkungan </p>',8,1494673161,8,1494673161),(17,'SML','<p>Perencanaan</p>',8,1494673321,8,1494673321),(18,'PPLNB3','<p>a. Kebijakan Pengelolaan Limbah Padat Non B3 </p>',8,1494673641,8,1494673641),(19,'PPLNB3','<p>b. Struktur dan Tanggung jawab </p>',8,1494673675,8,1494673675),(20,'KH','<p>1. Kebijakan Perlindungan Keanekaragaman Hayati </p>',8,1494673773,8,1494673773),(21,'KH','<p>2. Struktur dan Tanggung jawab </p>',8,1494673814,8,1494673814),(22,'CD','<p>1. Kebijakan Community Development</p>',8,1494673847,8,1494673847),(23,'CD','<p>2. Struktur dan Tanggung Jawab</p>',8,1494673885,8,1494673885),(24,'DRKPL','<strong></strong><p><strong>PENURUNAN EMISI</strong></p>',8,1494919721,8,1494919721),(25,'DRKPL','<strong></strong><p><strong>3R Limbah B3</strong></p>',8,1494922427,8,1494922427),(26,'DRKPL','<p><strong>3R Limbah Padat Non B3</strong><strong></strong></p>',8,1494943184,8,1494943184),(27,'DRKPL','<strong></strong><p><strong>Efisiensi Air dan Penurunan Beban pencemaran air</strong></p>',8,1494943515,8,1494943515),(28,'DRKPL','<p><strong>Perlindungan dan Keanekaragaman Hayati</strong><strong></strong></p>',8,1494944132,8,1494944132),(29,'DRKPL','<p><strong>Pemberdayaan Masyarakat</strong><strong></strong></p>',8,1494944515,8,1494944515),(30,'EE','<p>3. Perencanaan </p>',8,1494951180,8,1494951180),(31,'EE','<p>4. Audit Energy </p>',8,1494953792,8,1494953792),(32,'EE','<p>5. Pelatihan/ kompetensi </p>',8,1494953832,8,1494953832),(33,'EE','<p>6. Pelaporan </p>',8,1494953870,8,1494953870),(34,'EE','<p>7. Benchmarking </p>',8,1494953982,8,1494953982),(35,'EE','<p>8. Implementasi Program </p>',8,1494954101,8,1494954101),(36,'PPLB3','<p>c. Perencanaan </p>',8,1494954277,8,1494954277),(37,'PPLB3','<p>d. Pelatihan/kompetensi </p>',8,1494954291,8,1494954291),(38,'PPLB3','<p>e. Pelaporan </p>',8,1494954319,8,1494954319),(39,'PPLB3','<p>f. Benchmarking </p>',8,1494954405,8,1494954405),(40,'PPLB3','<p>g. Implementasi Program </p>',8,1494954592,8,1494954592),(41,'PGPU','<p>3. Perencanaan </p>',8,1494957618,8,1494957618),(42,'PGPU','<p>4. Inventarisasi Emisi </p>',8,1494957710,8,1494957710),(43,'PGPU','<p>5. Pelatihan/ kompetensi </p>',8,1494958003,8,1494958003),(44,'PGPU','<p>6. Pelaporan </p>',8,1494958087,8,1494958087),(45,'PGPU','<strong></strong><p>7.Benchmarking </p>',8,1494958442,8,1494958442),(46,'PGPU','<p>8. Implementasi Program </p>',8,1494960772,8,1494960772),(47,'KA','<p>3. Perencanaan </p>',8,1494960982,8,1494960982),(48,'KA','<p>4. Pelatihan/kompetensi </p>',8,1494961004,8,1494961004),(49,'KA','<p>5. Pelaporan konservasi air</p>',8,1494961041,8,1494961041),(50,'KA','<p>6. Pelaporan penurunan beban pencemaran</p>',8,1494961071,8,1494961071),(51,'KA','<p>7. Benchmarking </p>',8,1494961173,8,1494961173),(52,'KA','<p>8. Implementasi Program </p>',8,1494961290,8,1494961290),(53,'SML','<p>3. Implementasi </p>',8,1494962491,8,1494962491),(54,'SML','<p>4. Checking and Corrective Action </p>',8,1494962643,8,1494962643),(55,'SML','<p>E. Review Oleh Manajemen</p>',8,1494962657,8,1494962657),(56,'SML','<p>F.Rentang Pengaruh </p>',8,1494962677,8,1494962677),(57,'SML','<p>G. Sertifikasi </p>',8,1494962712,8,1494962712),(58,'PPLNB3','<p>c. Perencanaan </p>',8,1494963056,8,1494963056),(59,'PPLNB3','<del></del><p>d. Pelatihan/ kompetensi </p><span class=\"redactor-invisible-space\"></span>',8,1494963075,8,1494963075),(60,'PPLNB3','<p>e. Pelaporan</p>',8,1494963190,8,1494963190),(61,'PPLNB3','<p>g. Implementasi Program </p>',8,1494963317,8,1494963317),(62,'KH','<p>3. Perencanaan </p>',8,1494963482,8,1494963482),(63,'KH','<p>4. Pelaporan </p>',8,1494963530,8,1494963530),(64,'KH','<p>5. Implementasi Program </p>',8,1494963630,8,1494963630),(65,'CD','<p>3. Alokasi dana Pengembangan Masyarakat (CD)</p>',8,1495003680,8,1495003680),(66,'CD','<p>4. Perencanaan</p>',8,1495004017,8,1495004017),(67,'CD','<p>5. Implementasi</p>',8,1495004086,8,1495004086),(68,'CD','<p>6. Monitoring dan evaluasi</p>',8,1495004181,8,1495004181),(69,'CD','<p>7. Hubungan sosial (internal dan eksternal)</p>',8,1495004239,8,1495004239),(70,'CD','<p>8. Publikasi dan penghargaan</p>',8,1495004277,8,1495004277);

/*Table structure for table `boas_criteria` */

DROP TABLE IF EXISTS `boas_criteria`;

CREATE TABLE `boas_criteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bo_assessment_aspect_id` int(11) NOT NULL,
  `boas_description` text,
  `boas_value` decimal(4,2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_boas_criteria` (`bo_assessment_aspect_id`),
  CONSTRAINT `FK_boas_criteria` FOREIGN KEY (`bo_assessment_aspect_id`) REFERENCES `bo_assessment_aspect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=515 DEFAULT CHARSET=latin1;

/*Data for the table `boas_criteria` */

insert  into `boas_criteria`(`id`,`bo_assessment_aspect_id`,`boas_description`,`boas_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,5,'<p><strong></strong></p><p><strong>1. Profil Perusahaan</strong></p>','0.50',8,1494382659,8,1494384083),(18,6,'<strong></strong><p><strong>1. Status SML<br></strong></p><p><strong></strong>Penjelasan singkat status sertifikasi SML, deskripsi harus dapat memberikan penjelasan mengenai :<br></p><p>a. Apakah SML sudah tersertifikasi oleh badan sertifiaksi<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">b. Badan apa yang mensertifiaksi<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">c. Kapan disertifikasi dan apakah masih berlaku</span></span><strong><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"></span></span></span></strong></p>','0.50',8,1494386033,8,1494386033),(19,6,'<strong></strong><p><strong>2. Ruang Linkup SML<br></strong></p><p><strong></strong>Menjelaskan secara singkat mengenai ruamg lingkup SML, apakah mencakup seluruh proses produksi yang dinilai Proper atau hanya sebgaian saja<strong></strong></p>','0.50',8,1494386033,8,1494386033),(20,7,'<p><strong></strong></p><p><strong>1. Menjelaskan status pemakaian energi :<br></strong></p><p><strong></strong>a. Total pemakaian energi di unit bisnis yang dinilai dalam proper<strong></strong><strong><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"></span></span></span></strong></p>','0.50',8,1494386096,8,1494386259),(28,8,'<p>1. Memiliki kebijakan tertulis tentang efisiensi energi </p>','2.00',8,1494671910,8,1494672342),(29,9,'<p>a.Memiliki manager energi yang mempunyai tugas dan tanggung jawab untuk melaksanakan management energi.</p>','2.00',8,1494671955,8,1494672316),(30,9,'<p>b.Memiliki tim yang bertugas melakukan managemen energi </p>','2.00',8,1494671955,8,1494672316),(31,10,'<p>Memiliki kebijakan tertulis tentang pemanfaatan limbah B3 </p>','2.00',8,1494672763,8,1494672763),(32,11,'<p>Menyediakan sumber daya yang memadai untuk melaksanakan pemanfaatan limbah B3 </p><p>1) Manusia (personil memiliki latar belakang pendidikan pelatihan yang relevan dengan pelaksanaan pemanfaatan limbah B3). </p>','2.00',8,1494672795,8,1494672795),(33,11,'<p>2) Dapat menunjukkan ketersediaan dana untuk pelaksanaan pemanfaatan limbah B3 selama minimal 2 tahun berturut-turut. </p>','2.00',8,1494672795,8,1494672795),(34,12,'<p>Memiliki kebijakan tertulis tentang pengurangan pencemaran udara </p>','1.00',8,1494672937,8,1494672937),(35,12,'<p>b. Gas Rumah Kaca </p>','1.00',8,1494672938,8,1494672938),(36,13,'<p>a. Memiliki tim dengan kewenangan, tanggung jawab dan akuntabilitas yang jelas untuk melaksanakan pengurangan pencemar udara.</p>','0.50',8,1494673004,8,1494673004),(37,13,'<p> b. Menyediakan sumber daya yang memadai untuk melaksanakan pengurangan pencemar udara : <br>i) Manusia (personil memiliki latar belakang pendidikan dan pelatihan yang relevan dengan pelaksanaan pengurangan pencemar udara). </p>','0.50',8,1494673004,8,1494673033),(38,13,'<p>ii) Dapat menunjukkan ketersediaan dana untuk pelaksanaan pengurangan pencemar udara selama minimal 2 tahun berturut­turut. </p>','0.50',8,1494673004,8,1494673004),(39,14,'<p>Memiliki kebijakan tertulis tentang konservasi air </p>','1.00',8,1494673075,8,1494673075),(40,15,'<p>Menyediakan sumber daya yang memadai untuk melaksanakan konservasi air: </p><p>a) Manusia (personil memiliki latar belakang pendidikan dan pelatihan yang relevan dengan pelaksanaan konservasi air). </p>','1.00',8,1494673107,8,1494673107),(41,15,'<p>b) Dapat menunjukkan ketersediaan dana untuk pelaksanaan konservasi air selama minimal 2 tahun berturut-turut. </p>','1.00',8,1494673107,8,1494673107),(42,16,'<p>1. Kebijakan lingkungan mempertimbangkan karakteristik, skala dan dampak dari kegiatan. </p>','1.00',8,1494673161,8,1494673161),(43,16,'<p>2. Kebijakan lingkungan mencakup komitmen untuk perbaikan terus menerus dan pencegahan pencemaran (pollution prevention). </p>','1.00',8,1494673161,8,1494673161),(44,16,'<p>3. Kebijakan Lingkungan mencakup komitmen untuk taat terhadap peraturan lingkungan </p>','1.00',8,1494673161,8,1494673161),(45,16,'<p>4. Kebijakan lingkungan tercermin dalam penetapan tujuan dan sasaran lingkungan. </p>','1.00',8,1494673161,8,1494673161),(46,16,'<p>5. Terdapat bukti yang menunjukkan bahwa kebijakan lingkungan ditandatangani oleh pucuk pimpinan, dikomunikasikan kepada semua orang yang bekerja pada atau atas nama organisasi dan tersedia bagi masyarakat luas. </p>','1.00',8,1494673161,8,1494673161),(47,17,'<p><strong></strong></p><p><strong></strong></p><p><strong>1. Aspek Lingkungan <br></strong></p><p>a) Dapat menunjukkan bahwa aspek lingkungan telah dilakukan secara terstruktur dengan mempertimbangkan dampak dari kegiatan, produk atau jasa yang dihasilkan organisasi.<br><strong></strong></p>','1.00',8,1494673321,8,1494674091),(48,17,'<p>b) Dapat menyebutkan aspek lingkungan utama yang sedang dikelola minimal selama 2 tahun terakhir. </p>','1.00',8,1494673321,8,1494673321),(49,17,'<p>c) Dapat menunjukkan bahwa proses penetapan aspek lingkungan didokumentasikan dan dipelihara kemutakhirannya. </p>','1.00',8,1494673321,8,1494673321),(50,17,'<p><strong></strong></p><p><strong></strong></p><p><strong>2. Pemenuhan Peraturan <br></strong></p><p>a. Perusahaan telah menggunakan peraturan terbaru untuk mengukur ketaatannya dalam: </p><p> a) Pengendalian pencemaran air </p><p><strong></strong></p>','1.00',8,1494673321,8,1494674091),(51,17,'<p> b) Pengendalian pencemaran udara </p>','1.00',8,1494673321,8,1494673321),(52,17,'<p> c) Pengelolaan limbah B3 </p>','1.00',8,1494673321,8,1494673321),(53,17,'<p>b) Perusahaan telah memasukkan hasil temuan PROPER sebagai salah satu penetapan aspek lingkungan yang perlu dikelola. </p>','1.00',8,1494673321,8,1494673321),(55,17,'<p><strong>3. Tujuan dan sasaran </strong><br></p><p>a) Perusahaan telah menetapkan tujuan dan sasaran lingkungan secara kualitatif terhadap aspek-aspek lingkungan utama sebagaimana tercantum dalam angka a. 2).</p>','1.00',8,1494673321,8,1494674091),(56,17,'<p>b) Memiliki rencana strategis (jangka panjang) untuk mencapai tujuan dan sasaran. </p>','1.00',8,1494673321,8,1494673321),(57,17,'<p>c) Dapat menunjukkan bukti bahwa tujuan dan sasaran, salah satunya, ditetapkan berdasarkan masukan dari masyarakat atau dari pemerintah atau dari konsumen perusahaan. </p>','1.00',8,1494673321,8,1494673321),(58,17,'<p>d) Tujuan dan sasaran yang ditetapkan mencerminkan penerapan prinsip pencegahan pencemaran/ kerusakan lingkungan (pollution prevention). </p>','1.00',8,1494673321,8,1494673321),(59,18,'<p>a. Memiliki kebijakan tertulis tentang pemanfaatan sampah. </p>','2.00',8,1494673641,8,1494673641),(60,19,'<p>Menyediakan sumber daya yang memadai untuk melaksanakan pemanfaatan sampah </p><p>1) Manusia (personil memiliki latar belakang pendidikan dan pelatihan yang relevan dengan pelaksanaan pemanfaatan sampah). </p>','2.00',8,1494673675,8,1494673675),(61,19,'<p>2) Dapat menunjukkan ketersediaan dana untuk pelaksanaan pemanfaatan sampah selama minimal 2 tahun berturut-turut. </p>','2.00',8,1494673675,8,1494673675),(62,20,'<p>Memiliki kebijakan Perlindungan Keanekaragaman Hayati </p>','2.00',8,1494673773,8,1494673773),(63,21,'<p>Memiliki unit yang menangani perlindungan keanekaragaman hayati: </p><p>a) Manusia (personil memiliki latar belakang pendidikan dan pelatihan yang relevan dengan perlindungan keanekaragaman hayati). </p>','2.00',8,1494673815,8,1494673815),(64,21,'<p>b) Dapat menunjukkan ketersediaan dana untuk pelaksanaan perlindungan keanekaragaman hayati selama minimal 2 tahun </p>','2.00',8,1494673815,8,1494673815),(65,21,'<p>c) Memiliki kerjasama dengan lembaga/organisasi yang menangani perlindungan keanekaragaman hayati </p>','2.00',8,1494673815,8,1494673815),(66,22,'<p>a. Terdapat kebijakan tertulis perusahaan mengenai penegmbangan masyarakat (CD) di Unit yang dinilai</p>','2.00',8,1494673847,8,1494673847),(67,22,'<p>b. Terdapat sistem tata kelola program Pengembangan Masyarakat (CD)</p>','1.00',8,1494673847,8,1494673847),(68,23,'<p>a. Terdapat struktur yang secara tertulis memiliki tugas dan fungsi khusus untuk melaksanakan Pengembangan Masyarakat (CD) </p>','5.00',8,1494673885,8,1494673885),(69,23,'<p>b.Kualifikasi sumberdaya manusia yang melaksanakan pengembangan masyarakat (tingkat pendidikan dan pelatihan yang relevan dengan pengembangan masyarakat/CD)</p>','3.00',8,1494673885,8,1494673885),(70,23,'<p>c. Rasio jumlah sumberdaya manusia di Unit/bagian yang khusus melaksanakan pengembangan masyarakat (CD) dengan seluruh sumberdaya manusia di Unit yang dinilai </p>','0.50',8,1494673885,8,1494673885),(71,5,'<p><strong></strong></p><p><strong>2. Menjelaskan secara singkat argumentasi yang menjelaskan mengapa perusahaan berhak mendapatkan peringkat hijau dan emas<br></strong></p><p><strong></strong>a. Keunggulan perusahaan<br></p><p>b. Pencapaian yang telah diperoleh<br></p><p>c. Hal hal yang membedakan perusahaan dengan perusahaan lain yang sejenis<strong><span class=\"redactor-invisible-space\"></span></strong></p>','0.50',8,1494917712,8,1494917730),(89,7,'<p>b. Pemakaian energi untuk proses produksi/jasa yang dihasilkan</p>','0.50',8,1494919342,8,1494919342),(90,7,'<p>c. Pemakaian energi untuk fasilitas pendukung yang tidak berkaitan dengan proses produksi dan jasa yang dihasilkan</p>','0.50',8,1494919342,8,1494919342),(91,7,'<p>d. Rasio hasil efisiensi energi yang dilaporkan dalam Proper dengan total pemakaian energi</p>','0.50',8,1494919342,8,1494919342),(92,7,'<strong></strong><p><strong>2. ADISIONALITAS</strong></p><p>Menjelaskan apakah dari kegiatan efisiensi yang dilaporkan memenuhi aspek aspek additionalitas berdasarkan kriteria :<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">a. Penilaian kewajiban yang diatur dalam peraturan<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">b. Penilaian praktik umum<span class=\"redactor-invisible-space\"><br></span></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">c. Penilaian hambatan pelaksanaan investasi<span class=\"redactor-invisible-space\"><br></span></span></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">d. Penilaian investasi<span class=\"redactor-invisible-space\"></span></span></span></span></span></p>','6.00',8,1494919342,8,1494919342),(93,7,'<strong></strong><p><strong>3. INOVASI</strong></p><p>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<br></p><p><strong>a. Dimensi desain<span class=\"redactor-invisible-space\"></span></strong><strong><br></strong></p><p>i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<br><strong></strong></p>','0.50',8,1494919342,8,1494919342),(94,7,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494919342,8,1494919342),(95,7,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494919342,8,1494919342),(96,7,'<p><strong>b. Dimensi pengguna</strong><strong><br></strong></p><p>i. Pengembangan inovasi berasal dari perusahaan sendiri<br><strong></strong></p>','0.50',8,1494919342,8,1494919342),(97,7,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494919342,8,1494919342),(98,7,'<p><strong>c. Dimensi Produk service</strong><strong></strong><br></p><p>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan<br></p>','1.50',8,1494919342,8,1494919342),(99,7,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494919342,8,1494919342),(100,7,'<strong></strong><p><strong>4. HASIL ABSOLUT<br></strong></p><p><strong></strong>Hasil absolut efisiensi energi selama 4 tahun terakhir yang dinyatakan dengan unit energi yang sama<strong></strong></p>','4.00',8,1494919342,8,1494919342),(101,7,'<p><strong>5. INTENSITAS </strong>Pemakaian energi per produk atau jasa yang dihasilkan</p>','0.50',8,1494919342,8,1494919342),(102,7,'<p><strong>6. Posisi Intensitas </strong>pemakaian energi dibandingkan dengan industri sejenis</p>','1.00',8,1494919342,8,1494919342),(103,24,'<strong></strong><p><strong>1. Menjelaskan status emisi yang dihasilkan :</strong><strong><br></strong></p><p>a. total emisi yang dihasilkan unit bisnis yang dinilai dalam proper, termasuk didalamnya adalah emisi, parameter kriteria, dan gas rumah kaca</p>','0.50',8,1494919723,8,1494919723),(104,24,'<p>b. Total emisi yang berkaitan dengan proses produksi/ jasa yang dihasilkan </p>','0.50',8,1494919723,8,1494919723),(105,24,'<p>c. Total emisi yang berkaitan dengan fasilitas pendukung yang tidak berkaitan dengan proses produksi dan jasa yang dihasilkan </p>','0.50',8,1494919723,8,1494919723),(106,24,'<p>d. Rasio hasil penurunan emisi yang dilaporkan dalam PROPER dengan total emisi yang dihasilkan</p>','0.50',8,1494919723,8,1494919723),(107,24,'<p><strong>2. ADISIONALITAS</strong><strong><br></strong></p><p>Menjelaskan apakah dari kegiatan pnurunan emisi yang dilaporkan memenuhi aspek aspek additionalitas berdasarkan kriteria :<br></p><p>a. Penilaian kewajiban yang diatur dalam peraturan<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">b. Penilaian praktik umum<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">c. Penilaian hambatan pelaksanaan investasi<span class=\"redactor-invisible-space\"><br></span></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">d. Penilaian investasi<span class=\"redactor-invisible-space\"></span></span></span></span><br><strong></strong></p>','6.00',8,1494919723,8,1494919723),(108,24,'<strong></strong><p><strong>3. INOVASI<br></strong></p><p>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<span class=\"redactor-invisible-space\"><br></span></p><p><strong>a. Dimensi desain</strong><strong><br></strong></p><p><span class=\"redactor-invisible-space\">i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<span class=\"redactor-invisible-space\"></span></span><br><span class=\"redactor-invisible-space\"></span></p>','0.50',8,1494919723,8,1494919723),(109,24,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494919723,8,1494919723),(110,24,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494919723,8,1494919723),(111,24,'<strong></strong><p><strong>b. Dimensi pengguna<br></strong></p><p>i. Pengembangan inovasi berasal dari perusahaan sendiri<span class=\"redactor-invisible-space\"><br></span></p>','0.50',8,1494919723,8,1494919723),(112,24,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494919724,8,1494919724),(113,24,'<strong></strong><p><strong>c. Dimensi Produk service<br></strong></p><p>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan<span class=\"redactor-invisible-space\"><br></span></p>','1.50',8,1494919724,8,1494919724),(114,24,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494919724,8,1494919724),(115,24,'<strong></strong><p><strong>4. HASIL ABSOLUT<br></strong></p><p><strong></strong>Hasil absolut penurunan emisi selama 4 tahun terakhir yang dinyatakan dengan unit energi yang sama<strong></strong></p>','4.00',8,1494919724,8,1494919724),(116,24,'<p><strong>5. INTENSITAS</strong> emisi yang dihasilkan dibandingkan dengan produk atau jasa yang dihasilkan</p>','0.50',8,1494919724,8,1494919724),(117,24,'<p><strong>6. Posisi Intensitas</strong> penurunan emisi dibandingkan dengan industri sejenis</p>','1.00',8,1494919724,8,1494919724),(118,25,'<p><strong>1. Menjelaskan Jumlah Limbah B3 yang dihasilkan :</strong><strong></strong><br></p><p>a. total limbah B3 yang dihasilkan unit bisnis yang dinilai dalam proper<br></p>','0.50',8,1494922427,8,1494922427),(119,25,'<p>b. Rasio hasil 3R yang dilaporkan dalam Proper dengan total limbah B3 yang dihasilkan </p>','0.50',8,1494922427,8,1494922427),(120,25,'<strong></strong><p><strong>2. ADISIONALITAS</strong></p><p><strong></strong>Menjelaskan apakah dari kegiatan3R limbah B3 yang dilaporkan memenuhi aspek aspek additionalitas berdasarkan kriteria :<strong><br></strong></p><p>a. Penilaian kewajiban yang diatur dalam peraturan<br></p><p>b. Penilaian praktik umum<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">c. Penilaian hambatan pelaksanaan investasi<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">d. Penilaian investasi<span class=\"redactor-invisible-space\"></span></span></span><br><strong></strong></p>','6.00',8,1494922427,8,1494922427),(121,25,'<p><strong>3. INOVASI</strong><strong><br></strong></p><p>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<br></p><p><strong>a. Dimensi desain</strong><br></p><p>i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<span class=\"redactor-invisible-space\"></span><br><strong></strong></p>','0.50',8,1494922427,8,1494922427),(122,25,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494922427,8,1494922427),(123,25,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494922427,8,1494922427),(124,25,'<strong></strong><p><strong>b. Dimensi pengguna<br></strong></p><p><strong></strong>i. Pengembangan inovasi berasal dari perusahaan sendiri<strong></strong></p>','0.50',8,1494922427,8,1494922427),(125,25,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494922427,8,1494922427),(126,25,'<strong></strong><p><strong>c. Dimensi Produk service<br></strong></p><p><strong></strong>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan<strong></strong></p>','1.50',8,1494922427,8,1494922427),(127,25,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494922427,8,1494922427),(128,25,'<strong></strong><p><strong>4. HASIL ABSOLUT<br></strong></p><p><strong></strong>Hasil absolut pengurangan dan atau pemanfaatan limbah B3 selama 4 tahun terakhir yang dinyatakan dengan unit ton limbah B3 per tahun<strong></strong></p>','4.00',8,1494922428,8,1494922428),(129,25,'<p><strong>5. INTENSITAS </strong>limbah B3 yang dihasilkan dibandingkan dengan produk atau jasa yang dihasilkan</p>','0.50',8,1494922428,8,1494922428),(130,25,'<p><strong>6. Posisi Intensitas</strong> limbah B3 yang dihasilkan dibandingkan dengan industri sejenis<br></p>','1.00',8,1494922428,8,1494922428),(131,26,'<strong></strong><p><strong>1. Menjelaskan Jumlah Limbah padat non B3 yang dihasilkan :</strong></p><strong></strong>a. total limbah padat non B3 yang dihasilkan unit bisnis yang dinilai dalam proper<strong></strong>','0.50',8,1494943185,8,1494943185),(132,26,'<p>b. Rasio hasil 3R yang dilaporkan dalam Proper dengan total limbah padat non B3 yang dihasilkan </p>','0.50',8,1494943185,8,1494943185),(133,26,'<p><strong>2. ADISIONALITAS</strong><strong><br></strong></p><p>Menjelaskan apakah dari kegiatan 3R limpah padat non B3 yang dilaporkan memenuhi aspek aspek additionalitas berdasarkan kriteria :<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">a. Penilaian kewajiban yang diatur dalam peraturan<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">b. Penilaian praktik umum<span class=\"redactor-invisible-space\"></span></span></span></p><p>c. Penilaian hambatan pelaksanaan investasi<br></p><p>d. Penilaian investasi<span class=\"redactor-invisible-space\"></span><br><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"></span></span></span><strong></strong></p>','6.00',8,1494943185,8,1494943185),(134,26,'<strong></strong><p><strong>3. INOVASI<br></strong></p><p><strong></strong>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<strong><br></strong></p><p><strong>a. Dimensi desain</strong><strong><br></strong></p><p><strong></strong>i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<span class=\"redactor-invisible-space\"><strong></strong></span><br><strong></strong></p>','0.50',8,1494943185,8,1494943185),(135,26,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494943185,8,1494943185),(136,26,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494943186,8,1494943186),(137,26,'<p><strong>b. Dimensi pengguna</strong><br></p><p>i. Pengembangan inovasi berasal dari perusahaan sendiri<br></p>','0.50',8,1494943186,8,1494943186),(138,26,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494943186,8,1494943186),(139,26,'<p><strong>c. Dimensi Produk service</strong><strong><br></strong></p><p>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan<br><strong></strong></p>','1.50',8,1494943186,8,1494943186),(140,26,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494943186,8,1494943186),(141,26,'<strong></strong><p><strong>4. HASIL ABSOLUT<br></strong></p><p>Hasil absolut pengurangan dan atau pemanfaatan limbah padat non B3 selama 4 tahun terakhir yang dinyatakan dengan unit ton limbah padat non B3 per tahun<br><strong></strong></p>','4.00',8,1494943186,8,1494943186),(142,26,'<p><strong>5. INTENSITAS</strong> limbah padat non B3 yang dihasilkan dibandingkan dengan produk atau jasa yang dihasilkan</p>','0.50',8,1494943186,8,1494943186),(143,26,'<p><strong>6. Posisi Intensitas </strong>limbah padat non B3yang dihasilkan dibandingkan dengan industri sejenis</p>','1.00',8,1494943186,8,1494943186),(144,27,'<strong></strong><p><strong>1. Efisiensi Air<br></strong></p><p><strong>A. Menjelaskan jumlah air yang dipakai oleh perusahaan <br></strong></p><p>i. Total air yang digunakan oleh unit bisnis yang dinilai dalam proper<br><strong></strong></p><p><strong></strong></p>','0.50',8,1494943516,8,1494943516),(145,27,'<p>ii. Total air yang digunakan untuk proses produksi/jasa yang dihasilkan</p>','0.50',8,1494943517,8,1494943517),(146,27,'<p>iii. Total iar yang digunakan untuk fasilitas pendukung yang tidak berkaitan dengan proses produksi dan jasa yang dihasilkan</p>','0.50',8,1494943517,8,1494943517),(147,27,'<p>iv. Rasio hasil 3R air yang dilaporkan dalam Proper dengan total air yang digunakan </p>','0.50',8,1494943517,8,1494943517),(148,27,'<p><strong>B. ADISIONALITAS</strong><strong><br></strong></p><p>Menjelaskan apakah dari kegiatan 3R air yang dilaporkan memenuhi aspek aspek additionalitas berdasarkan kriteria :<br></p><p>a. Penilaian kewajiban yang diatur dalam peraturan<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">b. Penilaian praktik umum<span class=\"redactor-invisible-space\"></span></span></p><p>c. Penilaian hambatan pelaksanaan investas<br></p><p>d. Penilaian investasi<span class=\"redactor-invisible-space\"></span><br><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"></span></span><strong></strong></p>','6.00',8,1494943517,8,1494943517),(149,27,'<p><strong>C</strong>. <strong>Hasil absolut</strong> 3R air selama 4 tahun terakhir yang dinyatakan dengan unit m3/tahun</p>','4.00',8,1494943517,8,1494943517),(150,27,'<p><strong>D. Intensitas air</strong> yang digunakan dibandingkan dengan produk atau jasa yang dihasilkan </p>','0.50',8,1494943517,8,1494943517),(151,27,'<p><strong>E. Posisi intensitas</strong> air dibandingkan dengan industri sejenis</p>','1.00',8,1494943517,8,1494943517),(152,27,'<strong></strong><p><strong>2. Penurunan Beban Pencemaran Air<br></strong></p><p>a. menjelaskan jumlah air limbah yang dihasilkan oleh perusahaan :<span class=\"redactor-invisible-space\"><br></span></p><p>i. Total air limbah yang dihasilkan oleh unit bisnis yang dinilai dlm proper<br><span class=\"redactor-invisible-space\"></span></p>','0.50',8,1494943517,8,1494943517),(153,27,'<p>ii. Total air limbah yang diahsilkan dari suatu proses produksi/jasa yang dihasilkan</p>','0.50',8,1494943517,8,1494943517),(154,27,'<p>iii. Total air limbah yang dihasilkan dari fasilitas pendukung yang tidak berkaitan dengan proses produksi dan jasa yang dihasilkan<br></p>','0.50',8,1494943517,8,1494943517),(155,27,'<p>b. Adisionalitas<br></p><p>Menjelaskan apakah dari kegiatan penurunan beban pencemaran air yang dilaporkan memenuhi aspek aspek additionalitas berdasarkan kriteria :<br></p><p>a. Penilaian kewajiban yang diatur dalam peraturan<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">b. Penilaian praktik umum<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">c. Penilaian hambatan pelaksanaan investasi<span class=\"redactor-invisible-space\"><br></span></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">d. Penilaian investasi<span class=\"redactor-invisible-space\"></span></span></span></span><br></p>','6.00',8,1494943517,8,1494943517),(156,27,'<p>C. INOVASI<br></p><p>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<br></p><p>a. Dimensi desain<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<span class=\"redactor-invisible-space\"></span></span><br></p>','0.50',8,1494943517,8,1494943517),(157,27,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494943517,8,1494943517),(158,27,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494943517,8,1494943517),(159,27,'<p><strong>b. Dimensi pengguna</strong><strong></strong><br></p><p>i. Pengembangan inovasi berasal dari perusahaan sendiri<br></p>','0.50',8,1494943517,8,1494943517),(160,27,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494943517,8,1494943517),(161,27,'<p><strong>c. Dimensi Produk service</strong><strong><br></strong></p><p>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan<br><strong></strong></p>','1.50',8,1494943517,8,1494943517),(162,27,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494943517,8,1494943517),(163,27,'<p>D. Hasil absolut penurunan beban pencemaran air selama 4 tahun terakhir yang dinyatakan dengan unit m3/tahun</p>','4.00',8,1494943517,8,1494943517),(164,27,'<p>E. Intensitas air limbah yang digunakan dibandingkan dengan produk atau jasa yang dihasilkan </p>','0.50',8,1494943517,8,1494943517),(165,27,'<p>F. Rasio jumlah air yang digunakan dengan air limbah yang dihasilkan dari kegiatan produksi barang/jasa yang dihasilkan</p>','0.50',8,1494943517,8,1494943517),(166,27,'<p>G.Posisi intensitas air dibandingkan dengan industri sejenis</p>','1.00',8,1494943517,8,1494943517),(167,28,'<strong></strong><p><strong>1. Adisionalitas<br></strong></p><p>Menjelakan apakah dari kegiatan perlindungan keanekaragaman hayati yang dilaporkan memenuhi aspek aspek adisionalotas berdasarkan kriteria :<span class=\"redactor-invisible-space\"><br></span></p><p>a. Penilaian kewajiban yang diatur dalam peraturan<br></p><p>b. Penilaian praktik umum<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">c. Penilaian hambatan pelaksanaan investasi<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">d. Penilaian investasi<span class=\"redactor-invisible-space\"></span></span></span><br><span class=\"redactor-invisible-space\"></span></p>','6.00',8,1494944132,8,1494944132),(168,28,'<strong></strong><p><strong>2. INOVASI<br></strong></p><p><strong></strong>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<strong><br></strong></p><p><strong>a. Dimensi desain</strong></p><p>i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<br><strong></strong><strong></strong></p>','0.50',8,1494944132,8,1494944132),(169,28,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494944133,8,1494944133),(170,28,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494944133,8,1494944133),(171,28,'<p><strong>b. Dimensi pengguna</strong><br></p><p><strong></strong>i. Pengembangan inovasi berasal dari perusahaan sendiri<strong></strong><br></p>','0.50',8,1494944133,8,1494944133),(172,28,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494944133,8,1494944133),(173,28,'<strong>c. Dimensi Produk service</strong><p><strong><br></strong>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan</p>','1.50',8,1494944133,8,1494944133),(174,28,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494944133,8,1494944133),(175,28,'<p>Kegiatan perlindungan keanekaragaman hayati selama 4 tahun terakhir (absolute)</p>','4.00',8,1494944133,8,1494944133),(176,29,'<p>1. Adisionalitas<br></p><p>Menjelakan apakah dari kegiatan pemberdayaan masyarakat yang dilaporkan memenuhi aspek aspek adisionalotas berdasarkan kriteria :<br></p><p>a. Penilaian kewajiban yang diatur dalam peraturan<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">b. Penilaian praktik umum<span class=\"redactor-invisible-space\"><br></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">c. Penilaian hambatan pelaksanaan investasi<span class=\"redactor-invisible-space\"><br></span></span></span></p><p><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\"><span class=\"redactor-invisible-space\">d. Penilaian investasi<span class=\"redactor-invisible-space\"></span></span></span></span><br></p>','6.00',8,1494944515,8,1494944515),(185,29,'<strong></strong><p><strong>2. INOVASI<br></strong></p><p><strong></strong>Menjelaskan aapakah dari kegiatan yang dilakukan memenuhi aspek aspek inovasi :<strong><br></strong></p><p><strong>a. Dimensi desain<br></strong></p><p><strong></strong>i. Penambahan komponen membangun alat/sistem tambahan untuk mengurangi dampak negatif terhadap lingkungan<strong></strong><strong></strong><br><strong></strong></p>','0.50',8,1494946813,8,1494946813),(186,29,'<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','0.50',8,1494946813,8,1494946813),(187,29,'<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>','0.50',8,1494946813,8,1494946813),(188,29,'<p><strong>b. Dimensi pengguna</strong><br></p><p>i. Pengembangan inovasi berasal dari perusahaan sendiri<br></p>','0.50',8,1494946813,8,1494946813),(189,29,'<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>','0.50',8,1494946814,8,1494946814),(190,29,'<p><strong>c. Dimensi Produk service</strong><strong></strong><br></p><p>i. Perubahan dalam pelayanan produk hasil kegiatan memberikan nilai tambah bagi konsumen atau pengguna dan memberikan keuntungan kompetitif terhadap alternatif kegiatan lainnya selain menurunkan dampak terhadap lingkungan<br></p>','1.50',8,1494946814,8,1494946814),(191,29,'<p>ii. Perubahan dalam rantai nila (value chain) menyebabkan perubahan dalam keseluruhan rantai nilai produksi, konsumsi, pelayanan konsumen, dan pembuangan produk </p>','3.00',8,1494946814,8,1494946814),(192,29,'<p>3. Hasil dan dana Kegiatan selama 4 tahun terakhir (dana &amp; % keberhasilan)</p>','4.00',8,1494946814,8,1494946814),(193,30,'<p>a. Perusahaan telah memiliki rencana strategis efisiensi energi (bersifat jangka panjang) dengan menetapkan tujuan dan sasaran efisiensi energi yang relevan dengan kebijakan lingkungan </p>','2.00',8,1494951182,8,1494951182),(194,30,'<p>b. Telah menetapkan program yang jelas untuk mencapai tujuan dan sasaran lingkungan mencakup : </p><p>i) Pemberian tanggungjawab untuk mencapai tujuan dan sasaran pada fungsi dan tingkatan yang sesuai dalam organisasi tersebut. </p>','3.00',8,1494951182,8,1494951182),(195,30,'<p>ii) Cara dan jadual waktu untuk mencapai tujuan dan sasaran tersebut. </p>','5.00',8,1494951182,8,1494951182),(196,31,'<p>a. Telah melaksanakan audit energi, dengan menunjukkan adanya laporan hasil audit yang dilakukan paling lama 3 tahun terakhir. </p>','2.00',8,1494953792,8,1494953792),(197,31,'<p>b. Dapat menunjukkan Laporan Audit Energi, yang di dalamnya terdapat informasi tentang : </p><p>1) Tujuan melakukan audit </p>','1.00',8,1494953792,8,1494953792),(198,31,'<p>2) Deskripsi fasilitas yang diaudit </p>','1.00',8,1494953793,8,1494953793),(199,31,'<p>3) Deskripsi status energi saat ini. </p>','1.00',8,1494953793,8,1494953793),(200,31,'<p>4) Potensi efisiensi energi yang dapat dilakukan.</p>','3.00',8,1494953793,8,1494953793),(201,31,'<p>5) Rencana Kerja Energi efisiensi. </p>','2.00',8,1494953793,8,1494953793),(202,32,'<p>Di dalam tim management energi terdapat staf yang memiliki kualifikasi: </p><p>a.auditor energy </p>','5.00',8,1494953832,8,1494953832),(203,32,'<p>b.Training di bidang auditor energi </p>','3.00',8,1494953832,8,1494953832),(204,32,'<p>c. Back ground pendidikan yang berkaitan dengan auditor energi </p>','1.00',8,1494953832,8,1494953832),(205,33,'<p>Data Efisiensi Energi </p><p>a. Menyampaikan data efisiensi energy minimal 3 tahun terakhir.<br></p>','1.00',8,1494953870,8,1494953870),(206,33,'<p> b. Data efisiensi energy dilengkapi dengan bukti perhitungan atau pengukuran yang dapat menunjukkan telah dicapai. </p>','2.00',8,1494953870,8,1494953870),(207,33,'<p>c. Data efisiensi telah dinormalisasi dengan data produksi. </p>','3.00',8,1494953870,8,1494953870),(208,34,'<p>Dapat menunjukan bukti yang valid dan relevan yang menunjukan: </p><p>a.Telah dilakukan benchmarking dengan industri sejenis, tingkat pemanfaatan energi pada level nasional, Asia dan Dunia/global. Peringkat Perusahaan dalam Benchmarking: </p><p>1) Dunia </p><p>a) Masuk kedalam 10 Besar. </p>','20.00',8,1494953982,8,1494953982),(209,34,'<p>b) Berada di rata-rata </p>','15.00',8,1494953982,8,1494953982),(210,34,'<p>c) Berada di bawah rata-rata. </p>','7.00',8,1494953982,8,1494953982),(211,34,'<p>2) Asia<br></p><p>a) Masuk kedalam 5 Besar </p><p><br></p>','12.00',8,1494953982,8,1494953982),(212,34,'<p>b) Berada di rata-rata </p>','8.00',8,1494953982,8,1494953982),(213,34,'<p>c) Berada di bawah rata-rata </p>','5.00',8,1494953983,8,1494953983),(214,34,'<p>3) Nasional </p><p>a) Masuk kedalam 5 Besar. </p>','5.00',8,1494953983,8,1494953983),(215,34,'<p>b) Berada di rata-rata </p>','3.00',8,1494953983,8,1494953983),(216,34,'<strong></strong><p>c) Berada di bawah rata-rata </p>','1.00',8,1494953983,8,1494953983),(217,34,'<p>b. Benchmarking dilakukan secara : </p><p>1) Internal </p>','5.00',8,1494953983,8,1494953983),(218,34,'<p>2) Eksternal </p>','10.00',8,1494953983,8,1494953983),(219,35,'<p>a. Keberhasilan efisiensi energi: </p><p>i) Hasil efisiensi energi masuk dalam 25 % terbaik dari seluruh kandidat hijau di Sektor masing-masing. </p>','10.00',8,1494954101,8,1494954101),(220,35,'<p>ii) Hasil efisiensi energi berada dalam interval 25 – 75 % percentile dari seluruh kandidat hijau di sector masing-masing. </p>','5.00',8,1494954101,8,1494954101),(221,35,'<p>iii) Hasil efisiensi energi berada di bawah percentile 25 % dari seluruh kandidat hijau di sector masing­masing. </p>','2.50',8,1494954101,8,1494954101),(222,35,'<p>b. Penerapan Managemen pengetahuan 9knowledge management) dalam mendorong inovasi di bidang efisiensi energi :<br></p><p>i) Teknologi yang dikembangkan telah memperoleh paten dari pihak yang berwenang<br></p>','10.00',8,1494954101,8,1494954101),(223,35,'<p>ii) Inovasi di-diseminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam 3 tahun terakhir</p>','5.00',8,1494954101,8,1494954101),(224,35,'<p>iii) Inovasi di-diseminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir</p>','2.00',8,1494954101,8,1494954101),(225,35,'<p>iv) Memperoleh penghargaan dalam bidang efisiensi energi dalam 3 tahun terakhir</p>','0.50',8,1494954101,8,1494954101),(226,35,'<p>c. Menunjukkan bahwa kegiatan efisiensi energi berkontribusi secara signifikan terhadap pemberdayaan masyarakat. </p>','10.00',8,1494954101,8,1494954101),(227,36,'<p>1) Perusahaan telah melakukan inventarisasi Limbah B3 selama minimal 2 tahun berturut turut. </p>','2.00',8,1494954278,8,1494954278),(228,36,'<p>2). Perusahaan telah memiliki program pemanfaatan limbah B3 dengan cara, jadual waktu dan indicator untuk mencapai tujuan dan sasaran tersebut. </p>','2.00',8,1494954278,8,1494954278),(229,37,'<p>Personil yang melakukan kegiatan pemanfaatan limbah telah memperoleh pelatihan yang relevan dengan kegiatan pemanfaatan limbah paling lama dalam 3 tahun terakhir. </p>','2.00',8,1494954291,8,1494954291),(230,38,'<p>a. Menyampaikan data neraca limbah B3 selamapaling lambat 3 tahun terakhir. </p>','4.00',8,1494954320,8,1494954320),(231,38,'<p>b. Menyampaikan data keberhasilan pemanfaatan limbah B3 paling lambat 3 tahun terakhir. </p>','4.00',8,1494954320,8,1494954320),(232,38,'<p>c. Data pemanfaatan limbah B3 telah diverifikasi oleh pihak eksternal yang memiliki kompentensi di bidang tersebut. </p>','5.00',8,1494954320,8,1494954320),(233,39,'<p>a. Telah dilakukan benchmarking dengan industri sejenis, dalam pemanfaatan limbah B3. Peringkat Perusahaan dalam Benchmarking: </p><p>1) Dunia<br></p><p>a) Masuk kedalam 10 Besar<span class=\"redactor-invisible-space\"></span><br></p>','10.00',8,1494954406,8,1494954406),(234,39,'<p>b) Berada di rata-rata </p>','5.00',8,1494954406,8,1494954406),(235,39,'<p>c) Berada di bawah rata-rata. </p>','2.00',8,1494954406,8,1494954406),(236,39,'<p>2) Asia </p><p>a) Masuk kedalam 5 Besar<br></p>','5.00',8,1494954406,8,1494954406),(237,39,'<p>b) Berada di rata-rata </p>','2.00',8,1494954406,8,1494954406),(238,39,'<p>c) Berada di bawah rata-rata </p>','0.50',8,1494954406,8,1494954406),(239,39,'<p>3) Nasional </p><p>a) Masuk kedalam 5 Besar<br></p>','2.00',8,1494954406,8,1494954406),(240,39,'<p>b) Berada di rata-rata</p>','0.50',8,1494954406,8,1494954406),(241,39,'<p>c) Berada di bawah rata-rata </p>','0.00',8,1494954406,8,1494954406),(242,39,'<p>b. Benchmarking dilakukan secara: </p><p>1) Internal </p>','5.00',8,1494954406,8,1494954406),(243,39,'<p>2) Eksternal </p>','10.00',8,1494954406,8,1494954406),(244,40,'<p>1. Melakukan pengurangan jumlah salah satu LB3 dominan dari jumlah yang dihasilkan. Basis waktu perhitungan dari tahun sebelumnya </p><p>a) x &lt;2% </p>','0.00',8,1494954592,8,1494954592),(245,40,'<p>b) 2 ? x &lt; 5% </p>','5.00',8,1494954592,8,1494954592),(246,40,'<p>c) 5 ? x &lt; 10% </p>','10.00',8,1494954592,8,1494954592),(247,40,'<p>d) x ? 10% </p>','15.00',8,1494954592,8,1494954592),(248,40,'<p>2. Melakukan pengurangan jumlah LB3 non dominan dari jumlah yang dihasilkan. Basis waktu perhitungan dari tahun sebelumnya<br></p><p>a) x &lt;2%<br></p>','0.00',8,1494954592,8,1494954592),(249,40,'<p>b) 2 ? x &lt; 5% </p>','4.00',8,1494954593,8,1494954593),(250,40,'<p>c) 5 ? x 10 &lt; % </p>','6.00',8,1494954593,8,1494954593),(251,40,'<p>d) x ? 10% </p>','10.00',8,1494954593,8,1494954593),(252,40,'<p>3. Melakukan kegiatan pemanfaatan salah satu limbah B3 dominan dari jumlah yang dihasilkan di lokasi atau tempat lain akumulasi limbah 1 tahun </p><p>a) x &lt; 5% </p>','0.00',8,1494954593,8,1494954593),(253,40,'<p>b) 5 ? x &lt; 25% </p>','4.00',8,1494954593,8,1494954593),(254,40,'<p>c) 25 ? x &lt; 50% </p>','6.00',8,1494954593,8,1494954593),(255,40,'<p>d) x ? 50% </p>','10.00',8,1494954593,8,1494954593),(256,40,'<p>4. Melakukan kegiatan pemanfaatan salah satu limbah B3 non dominan dari jumlah yang dihasilkan di lokasi atau tempat lain akumulasi 1 tahun </p><p>a) x &lt; 5% </p>','0.00',8,1494954593,8,1494954593),(257,40,'<p>b) 5 ? x &lt; 25% </p>','4.00',8,1494954593,8,1494954593),(258,40,'<p>c) 25 ? x &lt; 50% </p>','6.00',8,1494954593,8,1494954593),(259,40,'<p>d) x ? 50% </p>','10.00',8,1494954593,8,1494954593),(260,40,'<p>5. Menunjukkan inovasi di bidang pengelolaan Limbah B3:<br></p><p>1) Teknologi yang dikembangkan telah memperoleh paten dari pihak berwenang<br></p>','10.00',8,1494954593,8,1494954593),(261,40,'<p>2) Inovasi di-diseminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam 3 tahun terakhir</p>','5.00',8,1494954593,8,1494954593),(262,40,'<p>3) Inovasi di-diseminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir</p>','2.50',8,1494954593,8,1494954593),(263,41,'<p>a. Perusahaan telah memiliki rencana strategis untuk pengurangan pencemar udara dengan menetapkan tujuan dan sasaran pengurangan pencemar udara yang relevan dengan kebijakan lingkungan. </p>','1.00',8,1494957618,8,1494957618),(264,41,'<p>b. Telah menetapkan program yang jelas untuk mencapai tujuan dan sasaran lingkungan mencakup : <br>i) Pemberian tanggungjawab untuk mencapai tujuan dan sasaran pada fungsi dan tingkatan yang sesuai dalam organisasi tersebut. </p>','0.50',8,1494957618,8,1494957618),(265,41,'<p>ii) Cara dan jadual waktu untuk mencapai tujuan dan sasaran tersebut. </p>','1.00',8,1494957618,8,1494957618),(266,42,'<p>Telah memiliki sistem Inventarisasi Emisi yang mencakup antara lain : </p><p><br><br>a) identifikasi sumber emisi dan proses yang menyebabkan terjadinya emisi, termasuk nama atau kode yang digunakan untuk identitas sumber emisi, titik koordinat dan parameter emisi utama yang dihasilkan dari sumber emisi: </p><p>i) Bahan pencemar udara konvensional. </p>','1.00',8,1494957710,8,1494957710),(274,42,'<p>ii) Gas Rumah Kaca </p>','1.00',8,1494957969,8,1494957969),(275,42,'<p>b) Deskripsi metode yang digunakan untuk menghitung beban emisi: </p><p><br><br>i) Bahan pencemar udara konvensional.</p>','0.50',8,1494957969,8,1494957969),(276,42,'<p>ii) Gas Rumah Kaca. </p>','0.50',8,1494957969,8,1494957969),(277,42,'<p>c) Pencatatan dan uraian data aktifitas, faktor emisi, faktor oksidasi dan konversi dari masing-masing sumber emisi yang dihitung beban emisinya: </p><p><br><br>i) Bahan pencemar udara konvensional. </p>','1.00',8,1494957969,8,1494957969),(278,42,'<p>ii) Gas Rumah Kaca </p>','1.00',8,1494957969,8,1494957969),(279,42,'<p>d) Pendokumentasian bukti­bukti yang dapat menunjukkan kebenaran perhitungan data aktifitas yang digunakan sebagai pendukung untuk perhitungan beban emisi: </p><p><br><br>i) Bahan pencemar udara konvensional.</p>','1.00',8,1494957969,8,1494957969),(280,42,'<p>ii) Gas Rumah Kaca </p>','1.00',8,1494957969,8,1494957969),(281,42,'<p>e) Pendiskripsian pendekatan yang digunakan untuk mengambil contoh atau analisa untuk menentukan nilai kalori bersih (net calorific value), kandungan karbon (carbon content), faktor emisi (emission factors), faktor oksidasi, dan konversi (oxidation and conversion factor) untuk masing masing sumber emisi: </p>','0.50',8,1494957969,8,1494957969),(282,42,'<p>ii) Gas Rumah Kaca </p>','0.50',8,1494957969,8,1494957969),(283,42,'<p>f) Penghitungan beban emisi dari seluruh sumber emisi yang berada dalam area kewenangan kegiatannya: </p><p><br><br>i) Bahan pencemar udara konvensional. </p>','0.50',8,1494957969,8,1494957969),(284,42,'<p>ii) Gas Rumah Kaca </p>','0.50',8,1494957969,8,1494957969),(285,43,'<p>Di dalam tim pengelolaan emisi terdapat staf yang memiliki kompentensi untuk melakukan inventarisasi emisi berdasarkan training , back ground pendidikan yang relevan. </p>','1.00',8,1494958003,8,1494958003),(286,44,'<p>a. Data Pengurangan Pencemar Udara <br> Menyampaikan data pengurangan pencemar udara minimal 4 tahun terakhir. <br>i) Bahan pencemar udara konvensional. </p>','3.00',8,1494958088,8,1494958088),(287,44,'<p>ii) Gas Rumah Kaca </p>','3.00',8,1494958088,8,1494958088),(288,44,'<p>iii) Data telah di normalisasi ke dalam data intensitas emisi ( beban emisi per satuan produk atau bahan baku yang digunakan– dengan satuan yang lazim untuk masing­masing sektor industry ) </p>','2.00',8,1494958088,8,1494958088),(289,44,'<p>b. Inventarisasi Emisi telah diverifikasi oleh pihak eksternal yang memiliki kompentensi di bidang tersebut maksimal dalam 3 tahun terakhir. </p>','1.00',8,1494958088,8,1494958088),(290,45,'<p>a. Telah dilakukan benchmarking dengan industri sejenis, tingkat pemanfaatan energy pada level nasional, Asia dan Dunia/global. Peringkat Perusahaan dalam Benchmarking: </p><p>i) Dunia </p><p>a) Masuk kedalam 10 Besar. </p>','10.00',8,1494958442,8,1494958442),(291,45,'<p>b) Berada di rata-rata </p>','5.00',8,1494958442,8,1494958442),(292,45,'<p>c) Berada di bawah rata­rata. </p>','2.50',8,1494958442,8,1494958442),(293,45,'<p>2) Asia </p><p>a) Masuk kedalam 5 Besar. </p>','5.00',8,1494958442,8,1494958442),(294,45,'<p>b) Berada di rata-rata </p>','2.50',8,1494958442,8,1494958442),(295,45,'<p>c) Berada di bawah rata-rata </p>','0.50',8,1494958442,8,1494958442),(296,45,'<p>3) Nasional </p><p>a) Masuk kedalam 5 Besar. </p>','99.99',8,1494958442,8,1494958442),(297,45,'<em></em><p>b) Berada di rata-rata </p><em></em>','0.50',8,1494958442,8,1494958442),(298,45,'<p>c) Berada di bawah rata-rata </p>','0.00',8,1494958442,8,1494958442),(299,45,'<p>b. Benchmarking dilakukan secara: </p><p>1) Internal </p>','5.00',8,1494958442,8,1494958442),(300,45,'<p>2) Eksternal </p>','10.00',8,1494958442,8,1494958442),(301,46,'<p>a. Keberhasilan Pengurangan Pencemar Udara: . <br>1) Hasil pengurangan pencemar udara masuk dalam 25 % terbaik dari seluruh kandidat hijau di Sektor masing-masing<br>i) Bahan pencemar udara konvensional.</p>','10.00',8,1494960772,8,1494960772),(302,46,'<p>ii) Gas Rumah Kaca </p>','10.00',8,1494960772,8,1494960772),(303,46,'<p>2) Hasil pencemar udara berada dalam interval 25 – 75 % percentile dari seluruh kandidat hijau di sector masing-masing. <br>i) Bahan pencemar udara konvensional. </p>','5.00',8,1494960772,8,1494960772),(304,46,'<p>ii) Gas Rumah Kaca </p>','5.00',8,1494960772,8,1494960772),(305,46,'<p>3) Hasil pencemar udara berada di bawah percentile 25 % dari seluruh kandidat hijau di sector masing-masing. <br>i) Bahan pencemar udara konvensional. </p>','0.50',8,1494960772,8,1494960772),(306,46,'<p>ii) Gas Rumah Kaca </p>','0.50',8,1494960772,8,1494960772),(307,46,'<p>b. Telah mengikuti Project CDM :<br>i) Dalam tahap sudah disetujui oleh Komite Nasional Mekanisme Pembangunan bersih (KMPB) dengan menunjukkan bukti persetuan dari Komnas</p>','0.50',8,1494960772,8,1494960772),(308,46,'<p>ii) Dalam Proses Persetujuan Executive Board CDM dengan menunjukkan bukti-bukti yang relevan. </p>','2.00',8,1494960773,8,1494960773),(309,46,'<p>iii) Telah Memperoleh Kredit Karbon setelah disetujui oleh Executive Board, dengan menunjukkan bukti persetujuan EB dan kredit karbon yang telah diperoleh. </p>','5.00',8,1494960773,8,1494960773),(310,46,'<p>c. Penerapan management pengetahuan (knowledge management) dalam mendorong inovasi di bidang penurunan emisi :<br></p><p>i) Teknologi yang dikembangkan telah memperoleh paten dari pihak yang berwenang<br></p>','10.00',8,1494960773,8,1494960773),(311,46,'<p>ii) Inovasi di-diseminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam 3 tahun terakhir</p>','5.00',8,1494960773,8,1494960773),(312,46,'<p>iii) Inovasi di-diseminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir</p>','2.50',8,1494960773,8,1494960773),(313,46,'<p>iv) Memperoleh penghargaan dalam bidang efisiensi energi dalam 3 tahun terakhir</p>','0.50',8,1494960773,8,1494960773),(314,46,'<p>d. Program penurunan emisi berkontribusi secara signifikan terhadap program pemberdayaan masyarakat. </p>','10.00',8,1494960773,8,1494960773),(315,46,'<p>e. Menggunakan bahan bakar dapat diperbaharui (renewable) untuk kegiatan utama: </p><p><br><br>i) ? 20% bahan bakar yang digunakan berasal dari bahan bakar dapat diperbaharui </p>','5.00',8,1494960773,8,1494960773),(316,46,'<p>ii) 10-20% bahan bakar yang digunakan berasal dari bahan bakar diperbaharui </p>','2.00',8,1494960773,8,1494960773),(317,46,'<p>iii) 2.5-10% bahan bakar yang digunakan berasal dari bahan bakar diperbaharui </p>','0.50',8,1494960773,8,1494960773),(318,46,'<p>f. Tidak menggunakan bahan perusak ozon &gt;50% bahan bakar yang digunakan untuk kegiatan utama menggunakan bahan bakar gas </p>','5.00',8,1494960773,8,1494960773),(319,47,'<p>a. Perusahaan telah memiliki rencana strategis untuk efisiensi air dan penurunan beban pencemaran dari air limbah dengan menetapkan tujuan dan sasaran efisiensi air yang relevan dengan kebijakan lingkungan. </p>','1.00',8,1494960982,8,1494960982),(320,47,'<p>b. Telah menetapkan program yang jelas untuk mencapai tujuan dan sasaran lingkungan mencakup : </p><p>1) Pemberian tanggungjawab untuk mencapai tujuan dan sasaran pada fungsi dan tingkatan yang sesuai dalam organisasi tersebut. </p>','1.00',8,1494960982,8,1494960982),(321,47,'<p>2) Cara dan jadual waktu untuk mencapai tujuan dan sasaran tersebut. </p>','1.00',8,1494960982,8,1494960982),(322,48,'<p>a. Di dalam tim efisiensi air dan penurunan terhadap beban pencemaran air limbah t terdapat staf yang memiliki kompentensi untuk melakukan pengelolaan air limbah</p>','1.00',8,1494961004,8,1494961004),(323,48,'<p>b. Personel pengelolaan air Memiliki Sertifikasi EPCM</p>','4.00',8,1494961004,8,1494961004),(324,49,'<p>Data efisiensi air </p><p>a) Menyampaikan data keberhasilan konservasi air minimal 4 tahun terakhir. </p>','4.00',8,1494961041,8,1494961041),(325,49,'<p>b) Data telah di normalisasi ke dalam data intensitas pemakaian air ( jumlah air per satuan produk atau bahan baku yang digunakan – dengan satuan yang lazim untuk masing-masing sektor industry) </p>','4.00',8,1494961041,8,1494961041),(326,49,'<p>c) Data konservasi air telah diverifikasi oleh pihak eksternal yang memiliki kompentensi di bidang tersebut. </p>','2.00',8,1494961041,8,1494961041),(327,50,'<p>Data penurunan beban pencemaran air limbah: </p><p>a) Menyampaikan data keberhasilan penurunan beban pencemaran air limbah paling sedikit 4 tahun terakhir. </p>','4.00',8,1494961071,8,1494961071),(328,50,'<p>b) Data telah di normalisasi ke dalam data intensitas pemakaian air (jumlah air per satuan produk atau bahan baku yang digunakan dengan satuan yang lazim untuk masing-masing sektor industri) </p>','3.00',8,1494961071,8,1494961071),(329,50,'<p>c) Data konservasi air telah diverifikasi oleh pihak eksternal yang memiliki kompentensi di bidang tersebut. </p>','2.00',8,1494961071,8,1494961071),(330,51,'<p>a. Telah dilakukan benchmarking dengan industri sejenis, dalam bidang konservasi air pada level nasional, Asia dan Dunia/global. Peringkat Perusahaan dalam Benchmarking: </p><p>1) Dunia </p><p>a) Masuk kedalam 10 Besar. </p>','10.00',8,1494961173,8,1494961173),(331,51,'<p>b) Berada di rata-rata </p>','5.00',8,1494961173,8,1494961173),(332,51,'<p>c) Berada di bawah rata-rata. </p>','2.50',8,1494961173,8,1494961173),(333,51,'<p>2) Asia<br></p><p>a) Masuk kedalam 5 Besar. </p><p><br></p>','5.00',8,1494961173,8,1494961173),(334,51,'<p>b) Berada di rata-rata </p>','2.50',8,1494961173,8,1494961173),(335,51,'<p>c) Berada di bawah rata-rata </p>','0.50',8,1494961173,8,1494961173),(336,51,'<p>3) Nasional<br></p><p>a) Masuk kedalam 5 Besar. </p><p><br></p>','2.50',8,1494961173,8,1494961173),(337,51,'<p>b) Berada di rata-rata </p>','0.50',8,1494961174,8,1494961174),(338,51,'<p>c) Berada di bawah rata-rata </p>','0.00',8,1494961174,8,1494961174),(339,51,'<p>b. Benchmarking dilakukan secara : </p><p>1) Internal </p>','5.00',8,1494961174,8,1494961174),(340,51,'<p>2) Eksternal </p>','10.00',8,1494961174,8,1494961174),(341,52,'<p>a. Keberhasilan Konservasi Air: </p><p>i) Kinerja termasuk dalam 25 % terbaik dari seluruh kandidat hijau di Sektor masing-masing. </p>','10.00',8,1494961290,8,1494961290),(342,52,'<p>ii) Kinerja termasuk dalam interval 25 – 75 % percentile dari seluruh kandidat hijau di sector masing­masing. </p>','5.00',8,1494961290,8,1494961290),(343,52,'<p>iii) Kinerja termasuk dibawah interval 25 percentile dari seluruh kandidat hijau di sector masing-masing </p>','0.00',8,1494961290,8,1494961290),(344,52,'<p>b. Penerapan management pengetahuan (kowledge management) dalam mendorong inovasi di bidang efisiensi air :<br></p><p>i) Teknologi yang dikembangkan telah memperoleh paten dari pihak yang berwenang.<br></p>','10.00',8,1494961290,8,1494961290),(345,52,'<p>ii) Inovasi di-diseminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam 3 tahun terakhir.</p>','5.00',8,1494961290,8,1494961290),(346,52,'<p>iii) Inovasi di-diseminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir.</p>','2.50',8,1494961290,8,1494961290),(347,52,'<p>iv) Memperoleh penghargaan dalam bidang penurunan emisi dalam 3 tahun terakhir.</p>','0.50',8,1494961290,8,1494961290),(348,52,'<p>c. Keberhasilan penurunan beban pencemaran air :<br></p><p>i) Kinerja termasuk dalam 25 % terbaik dari seluruh kandidat hijau di Sektor masing-masing. </p><p><br></p>','10.00',8,1494961290,8,1494961290),(349,52,'<p>ii) Kinerja termasuk dalam interval 25 % - 75 % percentile dari seluruh kandidat hijau di sektor masing-masing. </p>','5.00',8,1494961290,8,1494961290),(350,52,'<p>iii) Kinerja termasuk di bawah 25 % percentile dari seluruh kandidat hijau di sektor masing-masing. </p>','0.00',8,1494961290,8,1494961290),(351,52,'<p>d. Penerapan management pengetahuan (knowledge management) dalam mendorong inovasi di bidang penurunan beban pencemaran air limbah :<br></p><p>i) Teknologi yang dikembangkan telah memperoleh paten dari pihak yang berwenang.<br></p>','10.00',8,1494961290,8,1494961290),(352,52,'<p>ii) Inovasi di-diseminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam 3 tahun terakhir.</p>','5.00',8,1494961290,8,1494961290),(353,52,'<p>iii) Inovasi di-diseminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir.</p>','2.50',8,1494961290,8,1494961290),(354,52,'<p>iv) Memperoleh penghargaan dalam bidang penurunan emisi dalam 3 tahun terakhir.</p>','0.50',8,1494961290,8,1494961290),(355,52,'<p>e. Program penurunan beban pencemaran air berkontribusi secara signifikan terhadap pemberdayaan masyarakat :</p>','10.00',8,1494961290,8,1494961290),(356,17,'<p><strong>4. Program Manajemen Lingkungan Telah menetapkan program yang jelas untuk mencapai tujuan dan sasaran lingkungan mencakup: <br></strong></p><p>a) Penunjukkan penanggungjawab untuk mencapai tujuan dan sasaran yang ditetapkan (baik secara fungsional maupun struktural organisasi). </p><p><strong></strong></p>','1.00',8,1494962074,8,1494962074),(357,17,'<p>b) Metode dan jadual waktu untuk mencapai tujuan dan sasaran tersebut. </p>','1.00',8,1494962075,8,1494962075),(358,17,'<p>c) Dapat menunjukkan adanya EMS Manual yang mengcover seluruh dampak kegiatan. </p>','2.00',8,1494962075,8,1494962075),(359,53,'<p><strong></strong></p><p><strong>1. Struktur dan tanggung jawab <br></strong></p><p>a. Memiliki struktur dengan kewenangan, tanggung jawab dan akuntabilitas yang jelas untuk melaksanakan EMS. </p><p><strong></strong></p>','1.00',8,1494962491,8,1494962491),(360,53,'<p>b. Menyediakan sumber daya yang memadai untuk melaksanakan EMS: </p>','1.00',8,1494962491,8,1494962491),(361,53,'<em></em><p>i) Manusia (personil memiliki latar belakang pendidikan dan pelatihan yang relevan dengan pelaksanaan EMS). </p><em></em>','1.00',8,1494962491,8,1494962491),(362,53,'<p>ii) Dapat menunjukkan ketersediaan dana untuk pelaksanaan EMS selama minimal 2 tahun berturut­turut. </p>','1.00',8,1494962491,8,1494962491),(363,53,'<p>c. Bagian manajemen yang menangani EMS melapor langsung ke puncak pimpinan. </p>','1.00',8,1494962491,8,1494962491),(364,53,'<p><strong>b. Pelatihan, Kesadaran dan Kompentensi <br></strong></p><p><strong></strong></p><p>a. Dapat menunjukkan daftar kebutuhan training yang berkaitan dengan lingkungan minimal selama 2 tahun terakhir untuk seluruh departemen. </p><p><strong></strong></p><p><br></p>','1.00',8,1494962491,8,1494962491),(365,53,'<p>b. Dapat menunjukkan nama personel, jenis pelatihan dan asal departemen yang telah memperoleh pelatihan lingkungan minimal selama 2 tahun terakhir. </p>','1.00',8,1494962491,8,1494962491),(366,53,'<p>c. Dapat menunjukkan prosedur untuk meningkatkan kesadaran lingkungan karyawan dan atau kontraktor. </p>','1.00',8,1494962491,8,1494962491),(367,53,'<p>d. Dapat menunjukkan bukti bahwa karyawan atau kontraktor yang melaksanakan pengelolaan lingkungan di bawah adalah kompeten, dengan menunjukkan bukti latar belakang pendidikan, pelatihan dan pengalaman yang relevan. </p><p>i) Pengendalian pencemaran air </p>','2.00',8,1494962491,8,1494962491),(368,53,'<p>ii) Pengendalian Pencemaran Udara</p>','2.00',8,1494962491,8,1494962491),(369,53,'<p>iii) Pengelolaan Limbah B3 </p>','2.00',8,1494962491,8,1494962491),(370,53,'<p>iv) Sistem Manajemen Lingkungan </p>','2.00',8,1494962491,8,1494962491),(371,53,'<p><strong>3. Komunikasi <br></strong></p><p>a. Dapat menunjukkan bukti bahwa temuan PROPER telah dikomunikasikan kepada pihak-pihak yang terkait untuk di tindak lanjuti. </p><p><strong></strong></p>','1.00',8,1494962491,8,1494962491),(372,53,'<p>b. Dapat menunjukkan bukti bahwa temuan PROPER telah dikomunikasikan kepada pimpinan tertinggi di perusahaan tersebut. </p>','1.00',8,1494962491,8,1494962491),(373,53,'<p><strong>4. Dokumentasi EMS </strong><br>Dapat menunjukkan bahwa temuan dan tindak lanjut PROPER selama minimal 2 tahun berturut-turut terdokumentasi dengan baik dan dapat dilacak dengan mudah. </p>','2.00',8,1494962491,8,1494962491),(374,53,'<p><strong>5. Kontrol Dokumen </strong><br>Dapat menunjukkan bukti bahwa laporan pengelolaan lingkungan di bawah telah dilaporkan kepada instansi yang relevan dan disetujui oleh manajemen yang mempunyai wewenang, minimal selama 2 tahun berturut-turut: </p><p>a. Laporan Pemantauan Air Limbah </p>','1.00',8,1494962491,8,1494962491),(375,53,'<p>b. Laporan Pemantauan Emisi </p>','1.00',8,1494962491,8,1494962491),(376,53,'<p>c. Laporan Pengelolaan Limbah B3 </p>','1.00',8,1494962491,8,1494962491),(377,53,'<p>d. Laporan Pelaksanaan RKL/RPL / UKL UPL </p>','1.00',8,1494962491,8,1494962491),(378,53,'<p><strong>6. Kontrol Operasional </strong><br>Dapat menunjukkan bukti bahwa perusahaan telah mempunyai prosedur untuk “memaksa” kontraktor melaksanakan pengelolaan aspek lingkungan sesuai dengan EMS yang dimiliki perusahaan. </p>','2.00',8,1494962491,8,1494962491),(379,53,'<p><strong>7. Sistem Tanggap Darurat <br></strong></p><p>a. Dapat menunjukkan bahwa perusahaan telah memiliki prosedur untuk mengidentifikasi potensi bahaya dan mengembangkan sistem tanggap darurat untuk mengatasinya. </p><p><strong></strong></p>','2.00',8,1494962491,8,1494962491),(380,53,'<p>b. Dapat menunjukkan bahwa sistem tanggap darurat telah di-review secara reguler dalam kurun waktu 2 tahun terakhir. </p>','2.00',8,1494962491,8,1494962491),(381,53,'<p>c. Dapat menunjukkan catatan terjadinya kecelakaan atau kondisi darurat selama dua tahun terakhir. </p>','2.00',8,1494962491,8,1494962491),(382,53,'<p>d. Dapat menunjukkan bahwa kejadian kecelakaan atau kondisi darurat selama dua tahun terakhir mengalami penurunan. </p>','2.00',8,1494962491,8,1494962491),(383,54,'<p><strong>1. Pemantauan dan Pengukuran <br></strong></p><p>a. Dapat menunjukkan metodologi atau prosedur untuk memantau atau mengukur pencapaian target dan sasaran yang ditetapkan dalam EMS. </p><p><strong></strong></p>','1.00',8,1494962643,8,1494962643),(384,54,'<p>b. Dapat menunjukkan metodologi atau prosedur untuk memantau atau mengukur ketaatan terhadap peraturan:<br></p><p>a) Pemantauan Air Limbah </p><p><br></p>','1.00',8,1494962643,8,1494962643),(385,54,'<p>b) Laporan Pemantauan Emisi </p>','1.00',8,1494962643,8,1494962643),(386,54,'<p>c) Laporan Pengelolaan Limbah B3</p>','1.00',8,1494962643,8,1494962643),(387,54,'<p>d) Laporan Pemantauan Lingkungan sesuai dengan RKL/RPL atau UKL-UPL </p>','1.00',8,1494962643,8,1494962643),(388,54,'<p>c. Pemantauan Air Limbah dilakukan oleh Laboratorium yang terakreditasi atau yang ditunjuk Gubernur. </p>','1.00',8,1494962643,8,1494962643),(389,54,'<p><strong>2. Ketidaksesuaian, Upaya perbaikan dan pencegahan <br></strong></p><p><strong></strong><br></p><p>a. Dapat menunjukkan bukti bahwa hasil pemantauan dievaluasi secara reguler dan jika ditemukan ketidak sesuaian ditindaklanjuti dengan upaya perbaikan. </p><p><strong></strong></p>','1.00',8,1494962643,8,1494962643),(390,54,'<p>b. Dapat menunjukkan bukti bahwa temuan PROPER telah ditindaklanjuti secara paripurna. </p>','4.00',8,1494962643,8,1494962643),(391,54,'<p><strong>3. Catatan <br></strong></p><p><strong></strong></p><p>Dapat menunjukkan bahwa pendokumentasian hasil pemantauan lingkungan telah dilakukan dengan baik </p><p><strong></strong></p>','1.00',8,1494962643,8,1494962643),(392,54,'<p><strong></strong></p><p><strong></strong><strong>4. Audit EMS <br></strong></p><p>a. Dapat menunjukkan bukti bahwa Audit Internal dilaksanakan secara reguler dengan menunjukkan waktu, pelaksana dan ringkasan hasil audit yang telah dilaksanakan minimal 1 tahun terakhir. </p><p><strong></strong></p>','3.00',8,1494962643,8,1494962643),(393,54,'<p>b. Dapat menunjukkan bukti bahwa Audit eksternal telah dilakukan sesuai dengan jadual dan ringkasan temuan hasil audit. </p>','4.00',8,1494962643,8,1494962643),(394,55,'<p>Dapat menunjukkan bukti bahwa pimpinan puncak telah melakukan review pelaksanaan EMS untuk memastikan keberlanjutan suitability, adequacy dan effectiveness </p>','4.00',8,1494962657,8,1494962657),(395,56,'<p>1. Aspek lingkungan yang dikelola dalam sistem manajemen lingkungan hanya dalam lingkup perusahaan memiliki aspek penting dalam sistem manajemen lingkungan. </p>','1.00',8,1494962677,8,1494962677),(396,56,'<p>2. Aspek lingkungan yang dikelola dalam sistem manajemen lingkungan hanya dalam lingkup perusahaan memiliki aspek penting dalam sistem manajemen lingkungan telah mencakup pengaturan oleh supplier (input) dan/atau konsumen (output). </p>','7.00',8,1494962677,8,1494962677),(397,57,'<p>1. Sertifikasi dilakukan oleh: </p><p>a. pihak ketiga independen; </p>','15.00',8,1494962712,8,1494962712),(398,57,'<p>b. sertifikasi oleh group perusahaan induk; </p>','10.00',8,1494962712,8,1494962712),(399,57,'<p>c. masih dalam proses sertifikasi; </p>','5.00',8,1494962712,8,1494962712),(400,57,'<p>d. belum tersertifikasi </p>','0.00',8,1494962712,8,1494962712),(401,58,'<p>a. Perusahaan telah melakukan inventarisasi Sampah selama minimal 2 tahun berturut turut. </p>','2.00',8,1494963056,8,1494963056),(402,58,'<p>b. Perusahaan telah memiliki program pemanfaatan sampah dengan cara, jadual waktu dan indicator untuk mencapai tujuan dan sasaran tersebut. </p>','2.00',8,1494963056,8,1494963056),(403,59,'<p>Personil yang melakukan kegiatan pemanfaatan limbah telah memperoleh pelatihan yang relevan dengan kegiatan pemanfaatan limbah paling lama dalam 3 tahun terakhir. </p>','3.00',8,1494963075,8,1494963075),(404,60,'<p>1. Menyampaikan data neraca sampah selama minimal 2 tahun terakhir</p>','3.00',8,1494963190,8,1494963190),(405,60,'<p>2. Menyampaikan data keberhasilan pemanfaatan sampah minimal 3 tahun terakhir</p>','3.00',8,1494963190,8,1494963190),(406,60,'<p> 3. Data pemanfaatan sampah telah diverifikasi oleh pihak eksternal yang memiliki kompentensi di bidang tersebut. </p>','4.00',8,1494963190,8,1494963190),(407,60,'<p>f. Benchmarking </p><p>1. Telah dilakukan benchmarking dengan industri sejenis, dalam pemanfaatan sampah. Peringkat Perusahaan dalam Benchmarking: </p><p>1) Dunia </p><p>a) Masuk kedalam 10 Besar. </p>','10.00',8,1494963191,8,1494963191),(408,60,'<p>b) Berada di rata-rata </p>','5.00',8,1494963191,8,1494963191),(409,60,'<p>c) Berada di bawah rata-rata. </p>','2.00',8,1494963191,8,1494963191),(410,60,'<p>2) Asia </p>','5.00',8,1494963191,8,1494963191),(411,60,'<p>b) Berada di rata-rata </p>','2.00',8,1494963191,8,1494963191),(412,60,'<p>c) Berada di bawah rata-rata </p>','0.50',8,1494963191,8,1494963191),(413,60,'<p>3) Nasional </p><p>a) Masuk kedalam 5 Besar. </p>','2.00',8,1494963191,8,1494963191),(414,60,'<p>b) Berada di rata-rata </p>','0.50',8,1494963191,8,1494963191),(415,60,'<p>c) Berada di bawah rata-rata </p>','0.00',8,1494963191,8,1494963191),(416,60,'<p>2. Benchmarking dilakukan secara : </p><p>1) Internal </p>','5.00',8,1494963191,8,1494963191),(417,60,'<p>2) Eksternal </p>','10.00',8,1494963191,8,1494963191),(418,61,'<p>1. Melakukan pengurangan sampah dari jumlah yang dihasilkan. Basis waktu perhitungan dari tahun sebelumnya </p><p>a) x &lt;2% </p>','0.00',8,1494963317,8,1494963317),(419,61,'<p>b) 2 ? x &lt; 5% </p>','5.00',8,1494963317,8,1494963317),(420,61,'<p>c) 5 ? x &lt; 10% </p>','10.00',8,1494963317,8,1494963317),(421,61,'<p>d) x ? 10% </p>','15.00',8,1494963317,8,1494963317),(422,61,'<p>2. Melakukan kegiatan pemanfaatan sampah </p><p>a) x &lt; 5% </p>','0.00',8,1494963317,8,1494963317),(423,61,'<p>b) 5 ? x &lt; 25% </p>','4.00',8,1494963317,8,1494963317),(424,61,'<p>c) 25 ? x &lt; 50% </p>','6.00',8,1494963317,8,1494963317),(425,61,'<p>d) x ? 50% </p>','10.00',8,1494963317,8,1494963317),(426,61,'<p>3. Kegiatan Pemanfaatan sampah berkontribusi secara siginifikan terhadap upaya pemberdayaan masyarakat </p>','10.00',8,1494963317,8,1494963317),(427,61,'<p>4. Memiliki dan mengimplementasikan kebijakan Extended Producer Responsible untuk pengelolaan sampah dari hasil kegiatan yang dihasilkannya. </p>','12.00',8,1494963317,8,1494963317),(428,61,'<p>5. Menunjukkan inovasi di bidang pengelolaan sampah:<br></p><p>a. Teknologi yang dikembangkan telah memperoleh paten dari pihak yang berwenang<br></p>','10.00',8,1494963317,8,1494963317),(429,61,'<p>b. Inovasi di-diseminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam 3 tahun terakhir</p>','5.00',8,1494963317,8,1494963317),(430,61,'<p>c. Inovasi di-diseminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir</p>','2.00',8,1494963317,8,1494963317),(431,61,'<p>d. Memperoleh penghargaan dalam bidang pengelolaan sampah dalam 3 tahun terakhir</p>','0.50',8,1494963317,8,1494963317),(432,62,'<p>a. Perusahaan menetapkan secara formal, kawasan konservasi alam atau perlindungan keanekaragaman hayati.</p>','4.00',8,1494963482,8,1494963482),(433,62,'<p>b. Perusahaan telah memiliki rencana strategis konservasi alam atau perlindungan keanekaragaman hayati di kawasan yang telah ditetapkan.</p>','2.00',8,1494963482,8,1494963482),(434,62,'<p>c. Memiliki baseline data status keanekaragaman hayati atau rona lingkungan awal kawasan konservasi yang telah ditetapkan. </p>','5.00',8,1494963482,8,1494963482),(435,62,'<p>d. Mengidentifikasi dan menetapkan parameter sumberdaya biologi atau spesies hayati yang akan dilindungi atau dilestarikan.</p>','2.00',8,1494963482,8,1494963482),(436,62,'<p>e. Parameter sumberdaya biologi atau spesies yang dilindungi merupakan sumber hayati yang langka dan dilindungi.</p>','2.00',8,1494963482,8,1494963482),(437,62,'<p>f. Telah menetapkan program yang jelas untuk mencapai tujuan dan sasaran lingkungan mencakup : </p><p>i) Pemberian tanggungjawab untuk mencapai tujuan dan sasaran pada fungsi dan tingkatan yang sesuai dalam organisasi tersebut<br></p>','2.00',8,1494963482,8,1494963482),(438,62,'<p>ii) Cara dan jadual waktu untuk mencapai tujuan dan sasaran tersebut. </p>','2.00',8,1494963482,8,1494963482),(439,62,'<p>g. Melibatkan masyarakat setempat dalam proses perencanaan</p>','2.00',8,1494963482,8,1494963482),(440,62,'<p>h. Melibatkan lembaga sosial masyarakat dalam perencanaan.</p>','2.00',8,1494963482,8,1494963482),(441,62,'<p>i. Sinergi dengan pemerintah dalam perencanaan.</p>','5.00',8,1494963482,8,1494963482),(442,63,'<p>a. Memiliki sistem informasi yang dapat mengumpulkan dan mengevaluasi status dan kecenderungan sumber daya keanekaragaman hayati dan sumber daya biologis yang dikelola </p>','3.00',8,1494963530,8,1494963530),(443,63,'<p>b. Partisipasi pihak-pihak terkait dalam monitoring dan evaluasi</p>','4.00',8,1494963530,8,1494963530),(444,63,'<p>b. Memiliki data tentang status dan kecenderungan sumber daya keanekaragaman hayati dan sumber daya biologis yang dikelola paling sedikit selama 2 tahun terakhir </p>','5.00',8,1494963530,8,1494963530),(445,63,'<p>c. Memiliki publikasi yang disampaikan kepada publik atau instansi pemerintah yang relevan tentang status dan kecenderungan sumber daya keanekaragaman hayati dan sumber daya biologis yang dikelola paling sedikit diterbitkan 2 tahun terakhir </p>','5.00',8,1494963530,8,1494963530),(446,64,'<p>a. Terjadi peningkatan status keanekaragaman hayati di kawasan yang ditetapkan sebagai kawasan konservasi alam atau perlindungan keanekaragaman hayati.</p>','10.00',8,1494963630,8,1494963630),(447,64,'<p>b. Perlndungan keanekaragaman hayati memiliki dampak positif yang terukur terhadap komponen ekosistem yang lain, seperti perbaikan kondisi hidrolis dengan munculnya mata air atau terlindunginya mata air.</p>','5.00',8,1494963630,8,1494963630),(448,64,'<p>c. Lokasi perlindungan sumber daya ekologi atau keanekaragaman hayati mmenjadi tempat penelitian, penyebaran informasi dan peningkatan pengetahuan pemangku kepentingan di luar perusahaan.</p>','5.00',8,1494963630,8,1494963630),(449,64,'<p>d. Program perlindungan keanekaragaman hayati berkontribusi secara signifikan terhadap pemberdayaan masyarakat.</p>','7.00',8,1494963630,8,1494963630),(450,64,'<p>e. Keberhasilan perlindungan keanekaragaman hayati: </p><p>i) Kinerja termasuk dalam 25 % terbaik dari seluruh kandidat hijau di sektor masing-masing. </p>','10.00',8,1494963630,8,1494963630),(451,64,'<p>ii) Kinerja termasuk dalam interval 25 – 75 % percentile dari seluruh kandidat hijau di sector masing­masing. </p>','5.00',8,1494963630,8,1494963630),(452,64,'<p>iii) Kinerja termasuk dalam interval 25 – 75 % percentile dari seluruh kandidat hijau di sektor masing­masing </p>','2.50',8,1494963630,8,1494963630),(453,64,'<p>f. Menunjukkan inovasi di bidang konservasi sumberdaya biologi dan perlindungan keanekaragaman hayati:<br></p><p>i). Teknologi yang dikembangkan telah memperoleh paten dari pihak yang berwenang<br></p>','10.00',8,1494963630,8,1494963630),(454,64,'<p>ii) Inovasi di-seminasi melalui jurnal ilmiah internasional atau buku yang memiliki ISBN dalam kurun waktu 3 tahun terakhir.</p>','5.00',8,1494963630,8,1494963630),(455,64,'<p>iii) Inovasi di-seminasi melalui jurnal ilmiah nasional dalam 3 tahun terakhir</p>','2.00',8,1494963630,8,1494963630),(456,64,'<p>iv. Memperoleh penghargaan dalam bidang konservasis sumber daya biologi dan perlindungan keanekaragaman hayati dalam 3 tahun terakhir. </p>','1.00',8,1494963630,8,1494963630),(457,65,'<p><strong></strong></p><p><strong></strong></p><p><strong></strong>a. Terdapat struktur yang secara tertulis memiliki tugas dan fungsi khusus untuk melaksanakan Pengembangan Masyarakat (CD) <strong></strong></p>','2.00',8,1495003680,8,1495003694),(458,65,'<p>b. Menyampaikan data perbandingan dana pengembangan masyarakat (CD) dengan laba unit satu tahun terakhir</p>','3.00',8,1495003680,8,1495003680),(459,66,'<strong></strong><p><strong>a. Pemetaan Sosial (Social mapping)<br></strong></p><p><strong></strong>1) Memiliki dokumen pemetaan sosial (social mapping) yang disusun maksimal 4 tahun terakhir<strong></strong></p>','0.50',8,1495004018,8,1495004018),(460,66,'<p>2. Melengkapi dokumen pemetaan sosial (social mapping) yang diperbaharui (update) 1 tahun terakhir</p>','0.50',8,1495004018,8,1495004018),(461,66,'<p>3) Dokumen pemetaan sosial mencakup subtansi berikut ini: </p><p> a) Pemetaan aktor (stakeholders) dan jaringan hubungan antar aktor yang terdiri dari individu, kelompok, dan organisasi<br></p>','2.50',8,1495004018,8,1495004018),(462,66,'<p> b) Deskripsi posisi sosial dan peranan sosial aktor dalam kehidupan masyarakat </p>','2.50',8,1495004018,8,1495004018),(463,66,'<p> c) Analisis derajat kekuatan (power) dan kepentingan (interest) aktor </p>','2.50',8,1495004018,8,1495004018),(464,66,'<p> d) Identifikasi mekanisme/forum-forum yang menjadi sarana yang digunakan masyarakat dalam membahas kepentingan umum/publik</p>','2.00',8,1495004018,8,1495004018),(465,66,'<p> e) Deskripsi potensi penghidupan berkelanjutan yang mencakup potensi sumberdaya manusia, potensi sumber daya alam, modal sosial, modal keuangan, kondisi infrastruktur publik</p>','2.50',8,1495004018,8,1495004018),(466,66,'<p> f) analisa kebutuhan masyarakat untuk mendukung penghidupan berkelanjutan</p>','2.50',8,1495004018,8,1495004018),(467,66,'<p> g) Deskripsi jenis-jenis kerentanan (vulnarability) dan kelompok rentan</p>','2.50',8,1495004018,8,1495004018),(468,66,'<p> h) deskripsi masalah sosial</p>','2.50',8,1495004018,8,1495004018),(469,66,'<p> g) Rekomendasi program pengembangan masyarakat (CD)<br></p><p><strong>b. Perencanaan Strategis (Renstra) dan Rencana Kerja (Renja) pengembangan masyarakat (CD)</strong><strong><br></strong></p><p><strong></strong>1) Perencanaan Strategis (Renstra) 5 tahun<br></p><p>a) Proses penyusunan Renstra melibatkan pihak-pihak terkait (masyarakat, pemerintah, perusahaan lain)<span class=\"redactor-invisible-space\"><strong></strong></span><br></p>','3.00',8,1495004018,8,1495004018),(470,66,'<p>b) Perencanaan Strategis pengembangan masyarakat mencakup substansi berikut ini:<br></p><p>i. Visi, misi, dan tujuan pengembangan masyarakat (CD)<br></p>','1.00',8,1495004018,8,1495004018),(471,66,'<p>ii. Analisis isu strategis pengembangan masyarakat (CD)</p>','1.00',8,1495004018,8,1495004018),(472,66,'<p>iii. Program jangka panjang yang dirinci program tahunan<br></p>','1.00',8,1495004018,8,1495004018),(473,66,'<p>iv. Indikator program yang terukur</p>','1.00',8,1495004018,8,1495004018),(474,66,'<p>v. kebutuhan anggaran</p>','1.00',8,1495004018,8,1495004018),(475,66,'<p>vi. Target sasaran program (individu dan/kelompok dan/atau organisasi</p>','1.00',8,1495004018,8,1495004018),(476,66,'<p>vii. Program menjawab kebutuhan kelompok rentan</p>','2.00',8,1495004018,8,1495004018),(477,66,'<p><strong>2) Program Kerja (Renja) tahunan</strong><strong><br></strong></p><p>a) Proses penyusunan rencana kerja (Renja) melibatkan pihak-pihak terkait (masyarakat, pemerintah, perusahaan lain)<br><strong></strong></p>','3.00',8,1495004018,8,1495004018),(478,66,'<p>b) Program yang dideskripsikan dalam kegiatan-kegiatan</p>','1.00',8,1495004018,8,1495004018),(479,66,'<p>c) Indikator kegiatan yang terukur</p>','1.00',8,1495004018,8,1495004018),(480,66,'<p>d) Jadwal pelaksanaan kegiatan</p>','1.00',8,1495004018,8,1495004018),(481,66,'<p>e) Anggaran masing-masing kegiatan</p>','1.00',8,1495004018,8,1495004018),(482,66,'<p>f) Target sasaran kegiatan (individu dan/atau kelompok dan/atau organisasi)</p>','1.00',8,1495004018,8,1495004018),(483,67,'<p>a. Kesesuaian implementasi dengan rencana kerja<br></p><p>1) Program dan kegiatan<br></p>','1.00',8,1495004086,8,1495004086),(484,67,'<p>2) indikator kegiatan</p>','1.00',8,1495004086,8,1495004086),(485,67,'<p>3) Jadwal pelaksanaan kegiatan</p>','1.00',8,1495004086,8,1495004086),(486,67,'<p>4) Anggaran masing-masing kegiatan</p>','1.00',8,1495004087,8,1495004087),(487,67,'<p>5) Target sasaran Program (individu dan/atau kelompok dan/atau organisasi)</p>','1.00',8,1495004087,8,1495004087),(488,67,'<p>b. Implementasi program dan kegiatan yang tidak direncanakan</p>','5.00',8,1495004087,8,1495004087),(489,67,'<p>c. Partisipasi pihak-pihak terkait dalam pelaksanaan program dan kegiatan </p>','3.00',8,1495004087,8,1495004087),(490,68,'<p>a. Memiliki sistem tata kelola monitoring dan evaluasi pengembangan masyarakat (CD)</p>','1.00',8,1495004181,8,1495004181),(491,68,'<p>b. Partisipasi pihak terkait dalam monitoring dan evaluasi</p>','3.00',8,1495004181,8,1495004181),(492,68,'<p>c. Memiliki bukti tertulis proses dan hasil monitoring secara berkala</p>','1.00',8,1495004181,8,1495004181),(493,68,'<p>d. Memiliki dokumen evaluasi yang disyahkan oleh pimpinan tertinggi di Unit yang dinilai</p>','1.00',8,1495004181,8,1495004181),(494,68,'<p>e. Dokumen evaluasi mencakup substansi berikut ini:<br></p><p>1. 75% program dan kegiatan sesuai dengan rencana kerja tahunan<br></p>','1.00',8,1495004181,8,1495004181),(495,68,'<p>2. 75% indikator kegiatan sesuai dengan indikator yang ditetapkan dalam rencana kerja tahunan</p>','1.00',8,1495004181,8,1495004181),(496,68,'<p>3. 75% pelaksanaan program dan kegiatan sesuai dengan jadwal dalam rencana kerja tahunan</p>','1.00',8,1495004181,8,1495004181),(497,68,'<p>4. 75% realisasi anggaran sesuai dengan alokasi anggaran dalam rencana kerja tahunan</p>','1.00',8,1495004181,8,1495004181),(498,68,'<p>4. 75% realisasi anggaran sesuai dengan alokasi anggaran dalam rencana kerja tahunan</p>','1.00',8,1495004181,8,1495004181),(499,68,'<p>6. Bukti-bukti perbaikan program dan kegiatan berdasarkan hasil monitoring dan evaluasi</p>','1.00',8,1495004181,8,1495004181),(500,68,'<p>7. Memiliki indeks kepuasan masyarakat terkait dengan program pengembangan masyarakat (CD)</p>','1.00',8,1495004181,8,1495004181),(501,68,'<p>8. Lahirnya institusi ekonomi atau institusi sosial, keberlanjutan institusi dan perkembangan institusi sebagai dampak program pengembangan masyarakat (CD)</p>','2.00',8,1495004181,8,1495004181),(502,68,'<p>9. Kelompok sasaran menerapkan pengetahuan/keterampilan yang diperoleh dalam program pengembangan masyarakat (CD)</p>','1.00',8,1495004181,8,1495004181),(503,68,'<p>10. Kelompok sasaran mampu menyebarluaskan pengetahuan/keterampilan kepada pihak-pihak lain (individu, kelompok, organisasi)</p>','1.00',8,1495004181,8,1495004181),(504,69,'<p>a. Hubungan Kerja<br></p><p>1. Adanya serikat pekerja<br></p>','1.00',8,1495004239,8,1495004239),(505,69,'<p>2. Memiliki Perjanjian Kerja Bersama</p>','1.00',8,1495004239,8,1495004239),(506,69,'<p>3. Memiliki sistem tata kelola penyelesaian perselisihan hubungan kerja</p>','1.00',8,1495004239,8,1495004239),(507,69,'<p>4. Catatan perselisihan hubungan kerja dalam 2 tahun terakhir</p>','0.50',8,1495004239,8,1495004239),(508,69,'<p>5. Menunjukkan penurunan perselisihan hubungan kerja dalam 2 tahun terakhir</p>','0.50',8,1495004239,8,1495004239),(509,69,'<p>b. Hubungan eksternal<br></p><p>1. Memiliki sistem tata kelola penyelesaian konflik dengan pihak-pihak terkait (masyarakat atau pemerintah)<br></p>','2.00',8,1495004239,8,1495004239),(510,69,'<p>2. Memiliki catatan konflik dengan pihak-pihak terkait (masyarakat atau pemerintah) dalam 2 tahun terakhir</p>','1.00',8,1495004240,8,1495004240),(511,69,'<p>3. Menunjukkan bukti penurunan konflik dengan pihak-pihak terkait selama 2 tahun terakhir</p>','0.50',8,1495004240,8,1495004240),(512,70,'Menunjukkan inovasi di bidang pengembangan masyarakat dalam waktu 2 tahun terakhir<p>a. Inovasi di-diseminasi melalui jurnal internasional atau buku dengan ISBN </p>','4.00',8,1495004277,8,1495004277),(513,70,'<p>b. Inovasi di-diseminasi melalui jurnal ilmiah nasional</p>','2.00',8,1495004277,8,1495004277),(514,70,'<p>c. Memperoleh penghargaan dalam bidang pengembangan masyarakat minimal dari pemerintah di tingkat kabupaten/kota atau lembaga non pemerintah</p>','0.50',8,1495004277,8,1495004277);

/*Table structure for table `boc_detail` */

DROP TABLE IF EXISTS `boc_detail`;

CREATE TABLE `boc_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beyond_obedience_comdev_id` int(11) NOT NULL,
  `bocd_program` varchar(255) NOT NULL,
  `bocd_public_income` int(15) NOT NULL,
  `bocd_impact` int(15) NOT NULL,
  `bocd_effort` int(15) NOT NULL,
  `bocd_budget` int(15) NOT NULL,
  `bocd_unit_code` varchar(10) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_boc_detail` (`beyond_obedience_comdev_id`),
  CONSTRAINT `FK_boc_detail` FOREIGN KEY (`beyond_obedience_comdev_id`) REFERENCES `beyond_obedience_comdev` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `boc_detail` */

insert  into `boc_detail`(`id`,`beyond_obedience_comdev_id`,`bocd_program`,`bocd_public_income`,`bocd_impact`,`bocd_effort`,`bocd_budget`,`bocd_unit_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,5,'Program 1',150000,10,20,30,'BOC1',8,1496639504,8,1499182952),(7,5,'Program 2',150000,15,25,35,'BOC1',8,1496639504,8,1499182952);

/*Table structure for table `bop_detail` */

DROP TABLE IF EXISTS `bop_detail`;

CREATE TABLE `bop_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beyond_obedience_program_id` int(11) NOT NULL,
  `bopd_program` varchar(255) NOT NULL,
  `bopd_result` int(15) NOT NULL,
  `bopd_unit_code` varchar(10) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bop_detail` (`beyond_obedience_program_id`),
  CONSTRAINT `FK_bop_detail` FOREIGN KEY (`beyond_obedience_program_id`) REFERENCES `beyond_obedience_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `bop_detail` */

insert  into `bop_detail`(`id`,`beyond_obedience_program_id`,`bopd_program`,`bopd_result`,`bopd_unit_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,2,'Program 1',100000,'BOC1',8,1496483225,8,1496483225),(4,2,'Program 2',200000,'BOC1',8,1496483225,8,1496483225),(7,4,'12345',14123,'BOC1',8,1496495978,8,1496554690),(11,4,'1234',1323,'BOC1',8,1496553820,8,1496554690),(12,4,'1234',2323,'BOC1',8,1496553820,8,1496554690),(13,5,'123',123,'BOC1',8,1496554755,8,1496554880),(14,5,'3123',123,'BOC1',8,1496554755,8,1496554880),(15,5,'12312',1231,'BOC1',8,1496554755,8,1496554880),(18,5,'123',123,'BOC1',8,1496554880,8,1496554880),(19,6,'123',123,'BOC1',8,1496638574,8,1496638574),(20,7,'123',123,'BOC1',8,1496638574,8,1496638574),(21,8,'awdwad',12312,'BOC1',8,1499180825,8,1499180898),(22,8,'awdad',1231,'BOC1',8,1499180825,8,1499180898),(23,8,'adwada',123,'BOC1',8,1499180825,8,1499180898),(26,11,'Program 1',125000,'BOC1',8,1499185111,8,1499185111),(27,11,'Program 2',150000,'BOC1',8,1499185111,8,1499185111),(28,11,'Program 3',175000,'BOC1',8,1499185111,8,1499185111);

/*Table structure for table `budget_monitoring` */

DROP TABLE IF EXISTS `budget_monitoring`;

CREATE TABLE `budget_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_type_code` varchar(10) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `k3l_year` varchar(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_budget_monitoring_sector` (`sector_id`),
  KEY `FK_budget_monitoring_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_budget_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_budget_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `budget_monitoring` */

insert  into `budget_monitoring`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,'LH',7,5,'2017',8,1496305951,8,1509511582);

/*Table structure for table `budget_monitoring_detail` */

DROP TABLE IF EXISTS `budget_monitoring_detail`;

CREATE TABLE `budget_monitoring_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget_monitoring_id` int(11) NOT NULL,
  `bmd_no_prk` varchar(150) NOT NULL,
  `bmd_program` varchar(255) NOT NULL,
  `bmd_value` int(9) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_budget_monitoring_detail` (`budget_monitoring_id`),
  CONSTRAINT `FK_budget_monitoring_detail` FOREIGN KEY (`budget_monitoring_id`) REFERENCES `budget_monitoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `budget_monitoring_detail` */

insert  into `budget_monitoring_detail`(`id`,`budget_monitoring_id`,`bmd_no_prk`,`bmd_program`,`bmd_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,16,'12','Program 1',100000,8,1496305951,8,1509511582),(25,16,'34','Program 2',200000,8,1496305951,8,1509511583),(26,16,'56','Program 3',300000,8,1496305951,8,1509511583);

/*Table structure for table `budget_monitoring_month` */

DROP TABLE IF EXISTS `budget_monitoring_month`;

CREATE TABLE `budget_monitoring_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget_monitoring_detail_id` int(11) NOT NULL,
  `bmv_month` int(2) NOT NULL,
  `bmv_plan_value` int(11) DEFAULT NULL,
  `bmv_realization_value` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_budget_monitoring_month` (`budget_monitoring_detail_id`),
  CONSTRAINT `FK_budget_monitoring_month` FOREIGN KEY (`budget_monitoring_detail_id`) REFERENCES `budget_monitoring_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

/*Data for the table `budget_monitoring_month` */

insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (205,24,1,100,1,8,1496305951,8,1509511582),(206,24,2,200,2,8,1496305951,8,1509511582),(207,24,3,300,3,8,1496305951,8,1509511582),(208,24,4,400,4,8,1496305951,8,1509511582),(209,24,5,500,5,8,1496305951,8,1509511582),(210,24,6,600,6,8,1496305951,8,1509511582),(211,24,7,2147483647,7,8,1496305951,8,1509511582),(212,24,8,80012314,8,8,1496305951,8,1509511583),(213,24,9,900,9,8,1496305951,8,1509511583),(214,24,10,1000,10,8,1496305951,8,1509511583),(215,24,11,1100,11,8,1496305951,8,1509511583),(216,24,12,1200,12,8,1496305951,8,1509511583),(217,25,1,1300,13,8,1496305951,8,1509511583),(218,25,2,1400,14,8,1496305951,8,1509511583),(219,25,3,1500,15,8,1496305951,8,1509511583),(220,25,4,1600,16,8,1496305951,8,1509511583),(221,25,5,1700,17,8,1496305951,8,1509511583),(222,25,6,1800,18,8,1496305951,8,1509511583),(223,25,7,1900,19,8,1496305951,8,1509511583),(224,25,8,2000,20,8,1496305951,8,1509511583),(225,25,9,2100,21,8,1496305951,8,1509511583),(226,25,10,2200,22,8,1496305951,8,1509511583),(227,25,11,2300,23,8,1496305951,8,1509511583),(228,25,12,2400,24,8,1496305951,8,1509511583),(229,26,1,2500,25,8,1496305951,8,1509511583),(230,26,2,260,26,8,1496305951,8,1509511583),(231,26,3,2700,27,8,1496305951,8,1509511583),(232,26,4,2800,28,8,1496305951,8,1509511583),(233,26,5,2900,29,8,1496305951,8,1509511583),(234,26,6,3000,30,8,1496305951,8,1509511583),(235,26,7,3100,31,8,1496305951,8,1509511583),(236,26,8,3200,32,8,1496305951,8,1509511583),(237,26,9,3300,33,8,1496305951,8,1509511583),(238,26,10,3400,34,8,1496305951,8,1509511583),(239,26,11,3500,35,8,1496305951,8,1509511583),(240,26,12,3600,36,8,1496305951,8,1509511583);

/*Table structure for table `codeset` */

DROP TABLE IF EXISTS `codeset`;

CREATE TABLE `codeset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cset_name` varchar(150) NOT NULL,
  `cset_code` varchar(50) NOT NULL,
  `cset_value` varchar(255) NOT NULL,
  `cset_description` text,
  `cset_parent_pk` varchar(50) DEFAULT NULL,
  `cset_order` int(2) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=293 DEFAULT CHARSET=latin1;

/*Data for the table `codeset` */

insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,'WEB_CONFIG','ALLOWED_IP','127.0.0.1; ::1; 36.68.179.127; 36.77.140.14; 36.77.110.187','IP Address yang diijinkan untuk akses aplikasi. Pisahkan berdasarkan titik koma. Cth: 127.0.01; 128.1.1.2','',6,1462779626,1462786889,5,5),(2,'POST_TYPE_CODE','PAGE','Halaman','','',NULL,1474948722,1474948722,8,8),(3,'POST_TYPE_CODE','NEWS','Berita','','',NULL,1475051416,1475051416,8,8),(4,'FORM_TYPE_CODE','K3','K3','K3','',NULL,1482483701,1482483701,8,8),(5,'FORM_TYPE_CODE','LH','Lingkungan Hidup','Lingkungan Hidup','',NULL,1482483722,1482483722,8,8),(6,'ATTRIBUTE_TYPE_CODE','TGT','Target','','',NULL,1482729769,1482729769,8,8),(7,'ATTRIBUTE_TYPE_CODE','PHDR','Header','','',1,1482729801,1482729801,8,8),(8,'ATTRIBUTE_TYPE_CODE','PSHDR','Sub Header','','',2,1482729814,1482729814,8,8),(9,'ATTRIBUTE_TYPE_CODE','PITEM','Item','','',3,1482729825,1482729825,8,8),(10,'WP_LEGEND','1','Persiapan Program (TOR, RAB)','','',NULL,1484796129,1484796129,8,8),(11,'WP_LEGEND','2','Proses Pengadaan Barang / Jasa','','',NULL,1484796147,1484796147,8,8),(12,'WP_LEGEND','3','Pelaksanaan Program','','',NULL,1484796162,1484796162,8,8),(13,'WP_LEGEND','4','Monitoring Evaluasi','','',NULL,1484796174,1484796174,8,8),(14,'WP_LEGEND','5','Penyusunan Laporan','','',NULL,1484796190,1484796190,8,8),(15,'PPU_ES_CHIMNEY_SHAPE_CODE','SQR','Kotak','Bentuk Cerobong','',NULL,1487361038,1487676283,8,8),(16,'PPU_ES_CHIMNEY_SHAPE_CODE','CYL','Silinder','Bentuk Cerobong','',NULL,1487361112,1487676301,8,8),(17,'PPU_ES_CHIMNEY_SHAPE_CODE','CON','Kerucut','Bentuk Cerobong','',NULL,1487361142,1487676294,8,8),(18,'PPU_ES_MONITORING_DATA_STATUS_CODE','WATCHED','Dipantau','Status data pemantauan pada PPU','',NULL,1487416822,1487676321,8,8),(19,'PPU_ES_MONITORING_DATA_STATUS_CODE','NWATCHED','Tidak Dipantau','Status data pemantauan pada PPU','',NULL,1487416843,1487676327,8,8),(20,'PPU_ES_FREQ_MONITORING_OBLIGATION_CODE','FMOC1','1 Tahun 2 Kali','Frekuensi Kewajiban Pemantauan pada PPU','',NULL,1487417000,1487676312,8,8),(21,'PPU_ES_FUEL_NAME_CODE','FNC1','Batubara','Nama Bahan Bakar','',NULL,1487417127,1487676341,8,8),(22,'PPU_ES_FUEL_UNIT_CODE','FUC1','kg','Satuan Bahan Bakar','',NULL,1487417150,1487676352,8,8),(23,'PPU_RBM_PARAM_CODE','PRPC1','NO2','Parameter code for RBM','',NULL,1487669901,1487669901,8,8),(24,'PPU_RBM_PARAM_CODE','PRPC2','SO2','Parameter code for RBM','',NULL,1487669918,1487669918,8,8),(25,'PPU_RBM_PARAM_UNIT_CODE','PRPUC1','(m3/detik)','Parameter unit code for RBM','',NULL,1487669953,1487669953,8,8),(26,'PPU_RBM_QS_UNIT_CODE','PRQUC1','mg/Nm3','QS unit code for RBM','',NULL,1487669996,1487669996,8,8),(27,'PPU_RBM_QS_LOAD_UNIT_CODE','PRQLUC1','kg/ton','QS load unit code for RBM','',NULL,1487670022,1487670022,8,8),(28,'PPU_AP_FREQ_MONITORING_OBLIGATION_CODE','PAFMOC1','1 Tahun 2 Kali','AP Frequency monitoring','',NULL,1487677803,1487677803,8,8),(29,'PPU_RBM_PARAM_CODE','LAJUALIR','Laju Alir','Laju AIr RBM','',NULL,1487775070,1487775070,8,8),(30,'PPU_RBM_PARAM_CODE','PRPC3','Opasitas','','',NULL,1487842345,1487842345,8,8),(31,'PPU_RBM_PARAM_CODE','PRPC4','Partikulat','','',NULL,1487842359,1487842359,8,8),(32,'PPU_RBM_QS_UNIT_CODE','PRQUC2','%','','',NULL,1487842427,1487842427,8,8),(33,'PPUA_MP_MONITORING_DATA_STATUS_CODE','PMMDSC1','3 Bulan Sekali','','',NULL,1488135214,1488135214,8,8),(34,'PPUA_MP_FREQ_MONITORING_OBLIGATION_CODE','PMFMOC1','Dipantau','','',NULL,1488135240,1488135240,8,8),(35,'PPUA_RBM_PARAM_CODE','PRPC1','SO2','','',NULL,1488185215,1488185215,8,8),(36,'PPUA_RBM_PARAM_CODE','PRPC2','NO2','','',NULL,1488185226,1488185226,8,8),(37,'PPUA_RBM_PARAM_CODE','PRPC3','TSP','','',NULL,1488185234,1488185234,8,8),(38,'PPUA_RBM_PARAM_CODE','PRPC4','PM10','','',NULL,1488185245,1488185245,8,8),(39,'PPUA_RBM_PARAM_CODE','PRPC5','CO','','',NULL,1488185253,1488185253,8,8),(40,'PPUA_RBM_QS_UNIT_CODE','PRQUC1','gram/m3','','',NULL,1488185284,1488185284,8,8),(41,'PPUA_RBM_QS_LOAD_UNIT_CODE','PRQLUC1','gram/m3','','',NULL,1488185298,1488185298,8,8),(42,'PPUCEMS_RBM_PARAM_CODE','PRPC1','SOx','','',NULL,1488389277,1488389277,8,8),(43,'PPUCEMS_RBM_PARAM_CODE','PRPC2','NOx','','',NULL,1488389286,1488389286,8,8),(44,'PPUCEMS_RBM_PARAM_CODE','PRPC3','Partikulat','','',NULL,1488389298,1488389298,8,8),(45,'PPUCEMS_RBM_PARAM_REPORT_QS_UNIT_CODE','PRPRQUC1','mg/Nm3','','',NULL,1488572218,1488572218,8,8),(46,'WWATER_TECH_CODE','AER','Aerob','Aerob','',NULL,1487480771,1487480771,8,8),(47,'WWATER_TECH_CODE','ANAER','Anaerob','Anaerob','',NULL,1487480798,1487480798,8,8),(48,'PPA_RBM_PARAM_CODE','PH','pH','pH','',NULL,1487578197,1487578197,8,8),(49,'PPA_RBM_PARAM_CODE','TSS','TSS','TSS','',NULL,1487578410,1487578410,8,8),(50,'PPA_RBM_PARAM_CODE','OIL_FAT','Minyak dan Lemak','Minyak dan Lemak','',NULL,1487578436,1487578436,8,8),(51,'PPA_RBM_PARAM_CODE','CL2','Cl2','Cl2','',NULL,1487578456,1487578456,8,8),(52,'PPA_RBM_PARAM_CODE','CR','Cr','Cr','',NULL,1487578473,1487578473,8,8),(53,'PPA_RBM_PARAM_CODE','CU','Tembaga (Cu)','Tembaga (Cu)','',NULL,1487578489,1487578489,8,8),(54,'PPA_RBM_PARAM_CODE','DBT','Debit','Debit','',NULL,1487578698,1487578698,8,8),(55,'PPA_RBM_PARAM_CODE','PRD','Produksi','Produksi','',NULL,1487578712,1487578712,8,8),(56,'PPA_RBM_PARAM_UNIT_CODE','TON_P_M','Ton/Bulan','Ton/bulan','',NULL,1487578817,1487578817,8,8),(57,'PPA_RBM_PARAM_UNIT_CODE','MW_P_M','MW/Bulan','MW/bulan','',NULL,1487578841,1487578841,8,8),(58,'PPA_RBM_PARAM_UNIT_CODE','BRL_P_M','Barrel/Bulan','Barrel/bulan','',NULL,1487578873,1487578873,8,8),(59,'PPA_RBM_PARAM_UNIT_CODE','M3_P_M','m3/bulan','m3/bulan','',NULL,1487578895,1487578895,8,8),(60,'QS_UNIT_CODE','MG_P_L','mg/L','mg/L','',NULL,1487590895,1487590895,8,8),(61,'QS_LOAD_UNIT_CODE','TON_P_M','Ton/bulan','Ton/bulan','',NULL,1487590957,1487590957,8,8),(62,'PPA_QUESTION_TYPE_CODE','GNRL','Umum','Pertanyaan Umum Ketentuan Teknis','',NULL,1487738034,1487738034,8,8),(63,'PPA_QUESTION_TYPE_CODE','OIL_IND','Industri Sawit','Khusus untuk Industri Sawit melakukan Land Aplikasi ditambahkan:','',NULL,1487738110,1487738110,8,8),(64,'PPA_QUESTION_TYPE_CODE','PETRO_IND','Industri Petrokimia','Khusus untuk Industri Petrokimia ditambahkan:','',NULL,1487738163,1487738163,8,8),(65,'QS_LOAD_UNIT_CODE','GR_P_M3','Gram/m3','Gram/m3','',NULL,1489745755,1489745755,8,8),(66,'QS_LOAD_UNIT_CODE','KG_P_TON','Kg/Ton','Kg/Ton','',NULL,1489745788,1489745788,8,8),(67,'PPABA_MONITORING_FREQUENCY','NON','Tidak Wajib Dipantau','Tidak Wajib Dipantau','',6,1490422256,1490422256,8,8),(68,'PPABA_MONITORING_FREQUENCY','1M','1 Bulan Sekali','1 Bulan Sekali','',1,1490422281,1490422281,8,8),(69,'PPABA_MONITORING_FREQUENCY','3M','3 Bulan Sekali','3 Bulan Sekali','',2,1490422296,1490422296,8,8),(70,'PPABA_MONITORING_FREQUENCY','6M','6 Bulan Sekali','6 Bulan Sekali','',3,1490422310,1490422310,8,8),(71,'PPABA_MONITORING_FREQUENCY','1Y','1 Tahun Sekali','1 Tahun Sekali','',4,1490422326,1490422326,8,8),(72,'PPABA_MONITORING_FREQUENCY','3Y','3 Tahun Sekali','3 Tahun Sekali','',5,1490422344,1490422344,8,8),(73,'PPABA_MONITORING_STATUS_PERIOD','Y','Dipantau','Dipantau','',1,1490422399,1490422399,8,8),(74,'PPABA_MONITORING_STATUS_PERIOD','N','Tidak Dipantau','Tidak Dipantau','',2,1490422413,1490422413,8,8),(75,'FORM_TYPE_CODE','AD','Dominan di Ash Disposal','Ash DIsposal','',NULL,1491901009,1491901164,8,8),(76,'FORM_TYPE_CODE','GD','Non Dominan Gudang LB3','Gudang LB3','',NULL,1491901030,1491901182,8,8),(77,'PLB3_BS_WASTE_TYPE_CODE','PBWTC1','Proses','','',NULL,1491923820,1491923820,8,8),(78,'PLB3_BS_WASTE_TYPE_CODE','PBWTC2','Utilitas','','',NULL,1491923832,1491923832,8,8),(79,'PLB3_BS_WASTE_TYPE_CODE','PBWTC3','Proses & Utilitas','','',NULL,1491923843,1491923843,8,8),(80,'PLB3_BS_WASTE_UNIT_CODE','PBWUC1','Ton','','',NULL,1491923955,1491923955,8,8),(81,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC1','Dihasilkan','','',1,1491983907,1491984260,8,8),(82,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC3','Dimanfaatkan Sendiri','','',2,1491983982,1491984633,8,8),(83,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC4','Diolah Sendiri','','',3,1491983995,1491984624,8,8),(84,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC5','Ditimbun Sendiri','','',4,1491984008,1491984616,8,8),(85,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC6','Diserahkan Kepihak Ketiga Berizin','','',5,1491984024,1491984606,8,8),(86,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC7','Tidak Dikelola','','',6,1491984048,1491984597,8,8),(87,'PLB3_BS_TREATMENT_TYPE_CODE','PBTTC2','Disimpan di TPS','','',7,1492052493,1492052536,8,8),(93,'PLB3_CHECKLIST_FORM_TYPE_CODE','PCFTC1','TPS','','',NULL,1492488297,1492488297,8,8),(94,'PLB3_CHECKLIST_FORM_TYPE_CODE','PCFTC2','LandFill','','',NULL,1492488307,1492488307,8,8),(95,'PLB3_CHECKLIST_FORM_TYPE_CODE','PCFTC3','Pihak Ketiga','','',NULL,1492488319,1492488319,8,8),(96,'PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP11','Bangunan dan Penyimpanan','','',1,1492590892,1492590980,8,8),(97,'PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP12','Pengemasan','','',2,1492590927,1492590927,8,8),(98,'PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP13','Pemantauan','','',3,1492590941,1492590941,8,8),(99,'PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP14','Pengelolaan Lanjutan','','',4,1492590955,1492590955,8,8),(100,'PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP15','Tanggap Darurat dan Kebersihan','','',5,1492590965,1492590965,8,8),(101,'PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP21','Data Penataan','','',1,1492610220,1492610220,8,8),(102,'PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP22','Rancang Bangun Fasilitas Penimbunan','','',2,1492610331,1492620705,8,8),(103,'PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP23','Bak Pengumpul Lindi','','',3,1492610364,1492610364,8,8),(104,'PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP24','Lain Lain','','',4,1492610379,1492620932,8,8),(105,'PLB3_QUESTION_TYPE_CODE_PCFTC3','PQTCP31','Pihak Ketiga Penerima Limbah B3 Memiliki Izin Yang Sesuai Ketentuan','','',1,1492610558,1492610558,8,8),(106,'PLB3_QUESTION_TYPE_CODE_PCFTC3','PQTCP32','Pengangkutan Limbah B3 Memenuhi Ketentuan Yang Berlaku','','',2,1492610594,1492610594,8,8),(107,'PLB3_QUESTION_TYPE_CODE_PCFTC3','PQTCP33','Manifest Dan Pengelolaan Manifest Sesuai Dengan Ketentuan','','',3,1492610619,1492610619,8,8),(109,'PLB3_SA_QUESTION_CATEGORY','GNRL','Umum','Umum','',1,1492342442,1492342442,8,8),(110,'PLB3_SA_QUESTION_CATEGORY','HZRD','Pengelolaan Limbah Bahan Berbahaya dan Beracun','Pengelolaan Limbah Bahan Berbahaya dan Beracun','',2,1492342514,1492342514,8,8),(111,'PLB3_SA_QUESTION_INPUT_TYPE','YN','Ya / Tidak','Ya / Tidak','',1,1492342645,1492342645,8,8),(112,'PLB3_SA_QUESTION_INPUT_TYPE','QTR','Triwulan','Triwulan','',2,1492342683,1492342683,8,8),(113,'PLB3_SA_QUESTION_INPUT_TYPE','PCT','Prosentase','Prosentase','',3,1492342723,1492342723,8,8),(114,'PLB3_SA_QUESTION_INPUT_TYPE','FILE','File Dokumen','File Dokumen','',4,1492344463,1492344463,8,8),(115,'BO_FORM_TYPE_CODE','DRKPL','Dokumen Ringkasan Kinerja Pengelolaan Lingkungan','','',NULL,1494338349,1494338589,8,8),(116,'BO_FORM_TYPE_CODE','EE','Efisiensi Energi','','',NULL,1494338370,1494338370,8,8),(117,'BO_FORM_TYPE_CODE','PPLB3','Pengurangan dan Pemanfaatan Limbah B3','','',NULL,1494338446,1494338446,8,8),(118,'BO_FORM_TYPE_CODE','PGPU','Pengurangan Pencemaran Udara','','',NULL,1494338471,1494338471,8,8),(119,'BO_FORM_TYPE_CODE','KA','Konservasi Air','','',NULL,1494338485,1494338485,8,8),(120,'BO_FORM_TYPE_CODE','SML','Sistem Manajemen Lingkungan','','',NULL,1494338504,1494338504,8,8),(121,'BO_FORM_TYPE_CODE','PPLNB3','Pengurangan dan Pemanfaatan Limbah non B3','','',NULL,1494338532,1494338532,8,8),(122,'BO_FORM_TYPE_CODE','KH','Keanekaragaman Hayati','','',NULL,1494338550,1494338550,8,8),(123,'BO_FORM_TYPE_CODE','CD','Community Development','','',NULL,1494338567,1494338567,8,8),(124,'BO_FORM_TYPE_CODE','PBP','Penurunan Beban Pencemaran','Penurunan Beban Pencemaran','',NULL,1496468643,1496468643,8,8),(125,'BOP_UNIT_CODE','BOC1','kWh','','',NULL,1496473182,1496473182,8,8),(126,'SLOG_GEN_UNIT_CODE','SGUC1','BEROPERASI','','',NULL,1496740336,1496740336,8,8),(127,'SLOG_GEN_UNIT_CODE','SGUC2','TIDAK BEROPERASI','','',NULL,1496740346,1496740346,8,8),(128,'FORM_MONTH_TYPE_CODE','FMTC1','Januari','','',1,1496993036,1496993502,8,8),(129,'FORM_MONTH_TYPE_CODE','FMTC2','Februari','','',2,1496993044,1496993516,8,8),(130,'FORM_MONTH_TYPE_CODE','FMTC3','Maret','','',3,1496993053,1496993518,8,8),(131,'FORM_MONTH_TYPE_CODE','FMTC4','April','','',4,1496993062,1496993520,8,8),(132,'FORM_MONTH_TYPE_CODE','FMTC5','Mei','','',5,1496993070,1496993522,8,8),(133,'FORM_MONTH_TYPE_CODE','FMTC6','Juni','','',6,1496993076,1496993524,8,8),(134,'FORM_MONTH_TYPE_CODE','FMTC7','Juli','','',7,1496993082,1496993539,8,8),(135,'FORM_MONTH_TYPE_CODE','FMTC8','Agustus','','',8,1496993089,1496993541,8,8),(136,'FORM_MONTH_TYPE_CODE','FMTC9','September','','',9,1496993095,1496993543,8,8),(137,'FORM_MONTH_TYPE_CODE','FMTC10','Oktober','','',10,1496993101,1496993546,8,8),(138,'FORM_MONTH_TYPE_CODE','FMTC11','November','','',11,1496993109,1496993548,8,8),(139,'FORM_MONTH_TYPE_CODE','FMTC12','Desember','','',12,1496993116,1496993557,8,8),(140,'SLOT_CAT_CODE','SCC1','A. Pesawat Angkat Angkut','','',1,1496996284,1496996389,8,8),(141,'SLOT_CAT_CODE','SCC2','B. Pesawat Tenaga','','',2,1496996295,1496996403,8,8),(142,'SLOT_GEN_CODE','SGC1','Operasi','','',1,1496996969,1496996969,8,8),(143,'SLOT_GEN_CODE','SGC2','Standby','','',2,1496996981,1496996981,8,8),(144,'SLOT_GEN_CODE','SGC3','Tidak Operasi','','',3,1496996989,1496996989,8,8),(145,'SLOT_NC_CODE','SNC1','Setiap 4 Tahun','','',1,1496997021,1496997021,8,8),(146,'WP_JOB_CLASSIFICATION','JC1','Pipanisasi','','',1,1496806870,1496806870,8,8),(147,'WP_JOB_CLASSIFICATION','JC2','Perakitan','','',2,1496806899,1496806899,8,8),(148,'WP_JOB_CLASSIFICATION','JC3','Konstruksi','','',3,1496806914,1496806914,8,8),(149,'WP_JOB_CLASSIFICATION','JC4','Pengelasan','','',4,1496806925,1496806925,8,8),(150,'WP_JOB_CLASSIFICATION','JC5','Pemeriksaan / Inspeksi','','',5,1496806940,1496806940,8,8),(151,'WP_JOB_CLASSIFICATION','JC6','Pekerjaan PVC','','',6,1496806957,1496806957,8,8),(152,'WP_JOB_CLASSIFICATION','JC7','Pengecatan','','',7,1496806973,1496806973,8,8),(153,'WP_JOB_CLASSIFICATION','JC8','Pekerjaan Dalam Ruang Tertutup / Terbatas','','',8,1496806997,1496806997,8,8),(154,'WP_JOB_CLASSIFICATION','JC8','Penggalian','','',9,1496807008,1496807008,8,8),(155,'WP_JOB_CLASSIFICATION','JC9','Isolasi','','',10,1496807020,1496807020,8,8),(156,'WP_JOB_CLASSIFICATION','JC10','Instrumentasi','','',11,1496807031,1496807031,8,8),(157,'WP_JOB_CLASSIFICATION','JC11','Penyetelan','','',12,1496807051,1496807051,8,8),(158,'WP_JOB_CLASSIFICATION','JC12','Kelistrikan','','',13,1496807065,1496807065,8,8),(159,'WP_JOB_CLASSIFICATION','JCO','Pekerjaan Lainnya','','',14,1496807084,1496807084,8,8),(160,'WP_K3_RULES','R1','Undang-undang K3 - UU No.1 tahun 1970','','',1,1496807184,1496807184,8,8),(161,'WP_K3_RULES','R2','Peraturan Umum K3 untuk Kontraktor','','',2,1496807202,1496807202,8,8),(162,'WP_K3_RULES','R3','Surat Izin Kerja Berbahaya','','',3,1496807222,1496807222,8,8),(163,'WP_K3_RULES','R4','Syarat-syarat Kerja yang Akan Dilaksanakan','','',4,1496807244,1496807244,8,8),(164,'WP_K3_RULES','R5','Claim dan Ganti Rugi','','',5,1496807260,1496807260,8,8),(165,'WP_K3_RULES','R6','Pelaporan & Penyelidikan Kecelakaan','','',6,1496807282,1496807282,8,8),(166,'WP_K3_RULES','R7','P3K','','',7,1496807297,1496807297,8,8),(167,'WP_K3_RULES','RO','Peraturan Lainnya','','',8,1496807316,1496807316,8,8),(168,'WP_SELF_PROTECTION','SP1','APD Kepala','','',1,1496807367,1496807367,8,8),(169,'WP_SELF_PROTECTION','SP2','APD Pernapasan','','',2,1496807381,1496807381,8,8),(170,'WP_SELF_PROTECTION','SP3','APD Pendengaran','','',3,1496807394,1496807394,8,8),(171,'WP_SELF_PROTECTION','SP4','APD Kaki','','',4,1496807405,1496807405,8,8),(172,'WP_SELF_PROTECTION','SP5','APD Tangan','','',5,1496807417,1496807417,8,8),(173,'WP_SELF_PROTECTION','SP6','APD / Pelindung Jatuh dari Ketinggian','','',6,1496807438,1496807438,8,8),(174,'WP_SELF_PROTECTION','SP7','APD Mata','','',7,1496807455,1496807455,8,8),(175,'WP_SELF_PROTECTION','SP8','APD Muka','','',8,1496807466,1496807466,8,8),(176,'WP_SELF_PROTECTION','SP9','Proteksi Kebakaran Jenis','','',10,1496807543,1496807543,8,8),(177,'WP_SELF_PROTECTION','SP10','Rambu K3','','',9,1496807564,1496807564,8,8),(178,'WP_SELF_PROTECTION','SPO','Sarana K3 Lainnya','','',11,1496807582,1496807582,8,8),(179,'WP_DANGEROUS_WORK','DW1','Masuk Areal Kritikal / Berpotensi Bahaya Tinggi / Terlarang dan Sejenisnya, sebutkan Areal tersebut','','',10,1496807758,1496807758,8,8),(180,'WP_DANGEROUS_WORK','DW2','Melakukan Pekerjaan Panas','','',1,1496807781,1496807781,8,8),(181,'WP_DANGEROUS_WORK','DW3','Gudang Zat Kimia','','',2,1496807796,1496807796,8,8),(182,'WP_DANGEROUS_WORK','DW4','Pipa Gas / Bahan Bakar','','',3,1496807813,1496807813,8,8),(183,'WP_DANGEROUS_WORK','DW5','Basement Power Plant','','',4,1496807827,1496807827,8,8),(184,'WP_DANGEROUS_WORK','DW6','Tangki Bahan Bakar','','',5,1496807845,1496807845,8,8),(185,'WP_DANGEROUS_WORK','DW7','Pekerjaan Penggalian','','',6,1496807865,1496807865,8,8),(186,'WP_DANGEROUS_WORK','DW8','Melakukan Pekerjaan di Ketinggian (semua pekerjaan yang tingginya lebih dari 2M dari atas tanah, lantai atau flatform)','','',7,1496808270,1496808270,8,8),(187,'WP_DANGEROUS_WORK','DW9','Masuk Ruang Tertutup','','',8,1496808434,1496808434,8,8),(188,'WP_DANGEROUS_WORK','DW10','Tanki / Vessel','','',9,1496808451,1496808451,8,8),(189,'WP_DANGEROUS_WORK','DWO','Pekerjaan Berbahaya Lainnya','','',11,1496808474,1496808474,8,8),(190,'M_APAR_FC','MAF1','A','','',1,1497181884,1497181884,8,8),(191,'M_APAR_FC','MAF2','B','','',2,1497181892,1497181892,8,8),(192,'M_APAR_FC','MAF3','C','','',3,1497181897,1497181926,8,8),(193,'M_APAR_FC','MAF4','D','','',4,1497181903,1497181903,8,8),(194,'M_APAR_FC','MAF5','E','','',5,1497181909,1497181909,8,8),(195,'M_APAR_COND','MAC1','Baik','','',1,1497181951,1497181951,8,8),(196,'M_APAR_COND','MAC2','Rusak','','',2,1497181960,1497181960,8,8),(197,'M_APAR_T_P','MATP1','Ya','','',1,1497181980,1497181980,8,8),(198,'M_APAR_T_P','MATP2','Tidak','','',2,1497181987,1497181987,8,8),(199,'FD_DETECT_TYPE','FDT1','Heat','','',1,1497254766,1497254766,8,8),(200,'FD_DETECT_TYPE','FDT2','Smoke','','',2,1497254773,1497254773,8,8),(201,'FD_DETECT_TYPE','FDT3','Unknown','','',3,1497254781,1497254781,8,8),(202,'FD_ALARM_ZONE','FAZ1','Unknown','','',1,1497254797,1497254797,8,8),(203,'FD_ALARM_ZONE','FAZ2','1','','',2,1497254804,1497254804,8,8),(204,'FD_ALARM_ZONE','FAZ3','2','','',2,1497254809,1497254809,8,8),(205,'FD_ALARM_ZONE','FAZ4','3','','',4,1497254835,1497254835,8,8),(206,'FD_ALARM_ZONE','FAZ5','4','','',5,1497254841,1497254841,8,8),(207,'FD_ALARM_ZONE','FAZ6','5','','',6,1497254851,1497254851,8,8),(208,'FD_ALARM_ZONE','FAZ7','6','','',7,1497254857,1497254857,8,8),(209,'FD_ALARM_ZONE','FAZ8','7','','',8,1497254862,1497254862,8,8),(210,'FD_ALARM_ZONE','FAZ9','8','','',9,1497254869,1497254869,8,8),(211,'FD_ALARM_ZONE','FAZ10','9','','',10,1497254876,1497254876,8,8),(212,'FD_ALARM_ZONE','FAZ11','10','','',11,1497254884,1497254884,8,8),(213,'FD_FLOOR_TYPE','FDT1','Lantai III','','',1,1497254913,1497254913,8,8),(214,'FD_FLOOR_TYPE','FDT2','Lantai II','','',2,1497254921,1497254921,8,8),(215,'FD_FLOOR_TYPE','FDT3','Lantai I','','',3,1497254930,1497254930,8,8),(216,'FD_FLOOR_TYPE','FDT4','Basement','','',4,1497254942,1497254942,8,8),(217,'FDD_TEST_RESULT','FTR1','Not Checked','','',1,1497254964,1497254974,8,8),(218,'FDD_TEST_RESULT','FTR2','Unknown','','',2,1497254986,1497254986,8,8),(219,'FDD_TEST_RESULT','FTR3','Normal','','',3,1497254994,1497254994,8,8),(220,'FDD_TEST_RESULT','FTR4','Abnormal','','',4,1497255003,1498897387,8,8),(221,'WEDD_UNIT_CODE','WUC1','Lux','','',NULL,1497335302,1497335302,8,8),(222,'WEDD_UNIT_CODE','WUC2','dB','','',NULL,1497335310,1497335310,8,8),(223,'KP_STATUS_CODE','KSC1','Open','','',1,1497379497,1497379497,8,8),(224,'KP_STATUS_CODE','KSC2','Close','','',2,1497379504,1497379504,8,8),(225,'SLOG_MACHINE_BRAND','SMB1','ALSTHOM','','',NULL,1498054168,1498054168,8,8),(226,'SLOG_GEN_BRAND','SGB1','ALSTHOM','','',NULL,1498054182,1498054182,8,8),(227,'SLOG_BOILER_BRAND','SBB1','Type 1','','',NULL,1498054195,1498054195,8,8),(228,'PROJECT_TRACKING_LIST','PTL1','MSKRM','MSKRM','',NULL,1497947985,1497947985,8,8),(229,'PROJECT_TRACKING_LIST','PTL2','SPVK3L','SPVK3L','',NULL,1497948009,1497948009,8,8),(230,'UPLOAD_TYPE_CODE','HIRADC','HIRADC','','',NULL,1498386240,1498386240,8,8),(231,'UPLOAD_TYPE_CODE','ENV_POLICY','Kebijakan Lingkungan','','',NULL,1498623606,1498623606,8,8),(232,'UPLOAD_TYPE_CODE','K3_POLICY','Kebijakan K3','','',NULL,1498623728,1498623728,8,8),(233,'UPLOAD_TYPE_CODE','IADL','Identifikasi Aspek Dampak Lingkungan','','',NULL,1498623885,1498623885,8,8),(234,'UPLOAD_TYPE_CODE','JSA','Job Safety Analysis','','',NULL,1498624376,1498624376,8,8),(235,'UPLOAD_TYPE_CODE','WORK_SOP','SOP Pekerjaan','','',NULL,1498624395,1498624395,8,8),(236,'UPLOAD_TYPE_CODE','COM_SUPER','Sertifikat Pengawas','','',NULL,1498624421,1498624551,8,8),(237,'UPLOAD_TYPE_CODE','COM_CERT','Sertifikat Kompetensi','','',NULL,1498624466,1498624466,8,8),(238,'UPLOAD_TYPE_CODE','APD','APD','','',NULL,1498624492,1498624492,8,8),(239,'UPLOAD_TYPE_CODE','LOTO','Lock Out Tag Out','','',NULL,1498624520,1498624520,8,8),(240,'UPLOAD_TYPE_CODE','APAT','APAT','','',NULL,1498632424,1498632424,8,8),(241,'UPLOAD_TYPE_CODE','EMER_TEAM','Tim Tanggap Darurat','','',NULL,1498632447,1498632447,8,8),(242,'UPLOAD_TYPE_CODE','F_OFF_CERT','Sertifikat Petugas Kebakaran','','',NULL,1498632466,1498632466,8,8),(243,'UPLOAD_TYPE_CODE','P3K','Kotak P3K','','',NULL,1498632480,1498632480,8,8),(244,'UPLOAD_TYPE_CODE','CLINIC','Klinik','','',NULL,1498632493,1498632493,8,8),(245,'UPLOAD_TYPE_CODE','COMP_DOC','Dokter Perusahaan','','',NULL,1498632516,1498632516,8,8),(246,'UPLOAD_TYPE_CODE','AMBULANCE','Ambulance','','',NULL,1498632525,1498632525,8,8),(247,'UPLOAD_TYPE_CODE','P3K_OFF_CERT','Sertifikat Petugas P3K','','',NULL,1498632551,1498632551,8,8),(248,'UPLOAD_TYPE_CODE','K3_SIGN','Rambu K3','','',NULL,1498632563,1498632563,8,8),(249,'UPLOAD_TYPE_CODE','INF_BOARD','Papan Informasi','','',NULL,1498632575,1498632575,8,8),(250,'FD_INSTALLATION','FI1','Baik','','',1,1498829077,1498829077,8,8),(251,'FD_INSTALLATION','FD2','Tidak Baik','','',2,1498829083,1498829083,8,8),(252,'FD_WIRING_COND','FWC1','Normal','','',1,1498829096,1498829096,8,8),(253,'FD_WIRING_COND','FWC2','Abnormal','','',2,1498829107,1498829107,8,8),(254,'FD_DET_PHY','FDP1','Baik','','',1,1498829174,1498829174,8,8),(255,'FD_DET_PHY','FDP2','Tidak Baik','','',2,1498829186,1498829186,8,8),(256,'FD_LAST_CHECK','FLC1','Berfungsi','','',1,1498829213,1498829213,8,8),(257,'FD_LAST_CHECK','FLC2','Tidak Berfungsi','','',2,1498829224,1498829224,8,8),(258,'UNIT_CODE','UC1','Buah','','',NULL,1492887010,1502425678,8,8),(259,'UNIT_CODE','UC2','Kali','','',NULL,1502425697,1502425697,8,8),(260,'UNIT_CODE','UC3','Rupiah','','',NULL,1502425710,1502425710,8,8),(261,'UNIT_CODE','UC4','Unit Induk & Pelaksana','','',NULL,1502425730,1502425730,8,8),(262,'UNIT_CODE','UC5','Unit Pelaksana','','',NULL,1502425748,1502425748,8,8),(263,'CM_AOAI','CA1','AO','AO','',NULL,1511422792,1511422792,8,8),(264,'CM_AOAI','CA2','AI','AI','',NULL,1511422802,1511422802,8,8),(265,'CM_PROGRAM_STATUS','CPS1','AO','AO','',NULL,1511434648,1511434648,8,8),(266,'CM_PROGRAM_STATUS','CMS2','Open','Open\r\n','',NULL,1511434655,1511434655,8,8),(267,'CM_TOR_RAB_STATUS','CTRS1','Selesai','Selesai','',NULL,1511434677,1511434677,8,8),(268,'CM_TOR_RAB_STATUS','CTRS2','On Progress','On Progress','',NULL,1511434688,1511434688,8,8),(269,'CM_GM_STATUS','CGS1','Selesai','Selesai','',NULL,1511434789,1511434789,8,8),(270,'CM_PROCURE_RECEIVER','CPR1','Mansum','Mansum','',NULL,1511434809,1511434809,8,8),(271,'CM_METHOD','CM1','Persekot Dinas','Persekot Dinas','',NULL,1511434866,1511434866,8,8),(272,'LM_TOOL_STATUS','LTS1','Baik','Good','',NULL,1511575819,1511575819,8,8),(273,'SM_SPRINKLE_HEAD','SSH1','Baik','Baik','',NULL,1511668166,1511668166,8,8),(274,'SM_SPRINKLE_HEAD','SSH2','Tidak Baik','Tidak Baik','',NULL,1511668173,1511668173,8,8),(275,'SM_DETECTOR','SD1','Baik','Baik','',NULL,1511668185,1511668185,8,8),(276,'SM_DETECTOR','SD2','Tidak Baik','Tidak Baik','',NULL,1511668194,1511668194,8,8),(277,'SM_PIPING_CONDITION','SPC1','Normal','Normal','',NULL,1511668209,1511668209,8,8),(278,'SM_PIPING_CONDITION','SPC2','Abnormal','Abnormal','',NULL,1511668219,1511668219,8,8),(279,'AM_APD_TYPE','AAT1','Jenis 1','','',NULL,1511747623,1511747623,8,8),(280,'AM_APD_BRAND','AAB1','Jenis 1','','',NULL,1511747633,1511747633,8,8),(281,'P2K3M_STATUS','PS1','Open','','',NULL,1511796252,1511796252,8,8),(282,'P2K3M_STATUS','PS2','On Progress','','',NULL,1511796261,1511796261,8,8),(283,'P2K3M_STATUS','PS3','Close','','',NULL,1511796267,1511796267,8,8),(284,'WHM_WORKER_TYPE','WWT1','Karyawan PLN','','',NULL,1511875904,1511875904,8,8),(285,'WHM_WORKER_TYPE','WWT2','Karyawan Outsourcing','','',NULL,1511875914,1511875914,8,8),(286,'WHM_WORKER_TYPE','WWT3','Sub Kontraktor','','',NULL,1511875926,1511875926,8,8),(287,'WA_WORK_ACCIDENT_TYPE','WWAT1','Kecelakaan Kerja','','',NULL,1511927397,1511927397,8,8),(288,'WA_WORK_ACCIDENT_TYPE','WWAT2','Kecelakaan Instalasi','','',NULL,1511927406,1511927406,8,8),(289,'WA_WORK_ACCIDENT_TYPE','WWAT3','Kecelakaan Masyarakat Umum','','',NULL,1511927415,1511927415,8,8),(290,'WA_WORK_ACCIDENT_TYPE','WWAT4','Nearmiss','','',NULL,1511927423,1511927423,8,8),(291,'HT_DETAIL_PUMP_TYPE','HDPT1',' Electrical Pump','','',NULL,1511957101,1511957101,8,8),(292,'HT_DETAIL_PUMP_TYPE','HDPT2','Diesel Pump','','',NULL,1511957110,1511957110,8,8);

/*Table structure for table `common_upload` */

DROP TABLE IF EXISTS `common_upload`;

CREATE TABLE `common_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `upload_type_code` varchar(10) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_common_upload_sector` (`sector_id`),
  KEY `FK_common_upload_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_common_upload_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_common_upload_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `common_upload` */

insert  into `common_upload`(`id`,`sector_id`,`power_plant_id`,`upload_type_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,'HIRADC',8,1498390428,8,1498390428);

/*Table structure for table `competency_certification` */

DROP TABLE IF EXISTS `competency_certification`;

CREATE TABLE `competency_certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `cc_name` varchar(100) NOT NULL,
  `cc_position` varchar(100) NOT NULL,
  `cc_type` varchar(100) NOT NULL,
  `cc_number` varchar(100) NOT NULL,
  `cc_date` date NOT NULL,
  `cc_certificate_publisher` varchar(100) NOT NULL,
  `cc_pjk3` varchar(100) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_competency_certification_pp` (`power_plant_id`),
  KEY `FK_competency_certification_sector` (`sector_id`),
  CONSTRAINT `FK_competency_certification_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_competency_certification_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `competency_certification` */

insert  into `competency_certification`(`id`,`sector_id`,`power_plant_id`,`cc_name`,`cc_position`,`cc_type`,`cc_number`,`cc_date`,`cc_certificate_publisher`,`cc_pjk3`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'Personil 1','Jabatan 1','Jenis 1','NO 1','2017-06-12','Penerbit 1','PJK 1',8,1497153918,8,1498798166),(2,10,6,'Personil 2','Jabatan 2','Jenis 2','NO 2','2017-07-19','Penerbit 2','PJK 2',8,1499178330,8,1499178330);

/*Table structure for table `contract_monitoring` */

DROP TABLE IF EXISTS `contract_monitoring`;

CREATE TABLE `contract_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `cm_name` varchar(100) NOT NULL,
  `cm_prk` varchar(50) NOT NULL,
  `cm_pagu` varchar(50) NOT NULL,
  `cm_aoai` varchar(10) NOT NULL,
  `cm_prog_status` varchar(10) NOT NULL,
  `cm_tor_rab_status` varchar(10) DEFAULT NULL,
  `cm_tor_rab_date` date DEFAULT NULL,
  `cm_nd_number` varchar(50) DEFAULT NULL,
  `cm_nd_date` date DEFAULT NULL,
  `cm_gm_status` varchar(10) DEFAULT NULL,
  `cm_gm_date` date DEFAULT NULL,
  `cm_procure_receiver` varchar(10) DEFAULT NULL,
  `cm_date` date DEFAULT NULL,
  `cm_method` varchar(10) DEFAULT NULL,
  `cm_contr_number` varchar(50) DEFAULT NULL,
  `cm_contr_start_date` date DEFAULT NULL,
  `cm_contr_end_date` date DEFAULT NULL,
  `cm_contr_value` varchar(100) DEFAULT NULL,
  `cm_ref` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contract_monitoring_power_plant` (`power_plant_id`),
  KEY `FK_contract_monitoring_sector` (`sector_id`),
  CONSTRAINT `FK_contract_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_contract_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contract_monitoring` */

insert  into `contract_monitoring`(`id`,`sector_id`,`power_plant_id`,`cm_name`,`cm_prk`,`cm_pagu`,`cm_aoai`,`cm_prog_status`,`cm_tor_rab_status`,`cm_tor_rab_date`,`cm_nd_number`,`cm_nd_date`,`cm_gm_status`,`cm_gm_date`,`cm_procure_receiver`,`cm_date`,`cm_method`,`cm_contr_number`,`cm_contr_start_date`,`cm_contr_end_date`,`cm_contr_value`,`cm_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'Kegiatan Bulan K3','2101-12/RM.KI/2017/001','10000','CA1','CPS1','CTRS1','1901-12-07','616','1901-12-05','CGS1','1901-12-23','CPR1','1901-12-26','CM1','123','1901-12-19','1901-12-12','100000','adwad',8,1511435148,8,1511447068);

/*Table structure for table `emergency_response` */

DROP TABLE IF EXISTS `emergency_response`;

CREATE TABLE `emergency_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `er_training_name` varchar(255) NOT NULL,
  `er_participant` int(11) NOT NULL,
  `er_team` varchar(100) NOT NULL,
  `er_simulation_time` int(11) NOT NULL,
  `er_simulation_victim` int(6) NOT NULL,
  `er_simulation_loss` int(11) NOT NULL,
  `er_location` varchar(100) NOT NULL,
  `er_date` date NOT NULL,
  `er_evaluation_time` int(11) NOT NULL,
  `er_evaluation_victim` int(6) NOT NULL,
  `er_evaluation_loss` int(11) NOT NULL,
  `er_failure_detail` text NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_emergency_response_pp` (`power_plant_id`),
  KEY `FK_emergency_response_sector` (`sector_id`),
  CONSTRAINT `FK_emergency_response_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_emergency_response_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `emergency_response` */

insert  into `emergency_response`(`id`,`sector_id`,`power_plant_id`,`er_training_name`,`er_participant`,`er_team`,`er_simulation_time`,`er_simulation_victim`,`er_simulation_loss`,`er_location`,`er_date`,`er_evaluation_time`,`er_evaluation_victim`,`er_evaluation_loss`,`er_failure_detail`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,'Simulasi Bahaya Kebakaran',100,'Seluruh Bagian',2,0,0,'PLTG Batanghari','2017-05-10',5,2,0,'<p>Ketidaksiapan tim evaluasi dalam mengevakuasi korban</p>',8,1496853908,8,1496853908);

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(32) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `commission` decimal(5,2) DEFAULT NULL,
  `note` text,
  `joined_date` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y',
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`id`,`name`,`address`,`email`,`phone`,`salary`,`commission`,`note`,`joined_date`,`status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Joko Hermanto','Lorong Jengkol. Talang Banjar.','joko.hermanto19@gmail.com','085228292014',0,'20.00','','2016-04-01','Y',0,0,8,1480133297),(2,'Supervisor','',NULL,'0819',NULL,NULL,NULL,'2016-03-24','Y',0,0,5,1460139806),(3,'Operator','',NULL,'0852',NULL,NULL,NULL,'2016-03-24','Y',0,0,0,0),(6,'Joko Test','Bhayangkara','','123123131231231',0,NULL,NULL,'2016-06-30','Y',8,1467276747,12,1480133435);

/*Table structure for table `environment_permit` */

DROP TABLE IF EXISTS `environment_permit`;

CREATE TABLE `environment_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ep_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_sector` (`sector_id`),
  KEY `FK_environment_permit_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_environment_permit_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_environment_permit_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit` */

insert  into `environment_permit`(`id`,`sector_id`,`power_plant_id`,`ep_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,4,2017,8,1493111108,8,1493111108),(2,10,6,2016,8,1499186543,8,1499186543),(3,11,7,2016,8,1499186571,8,1499186571),(4,10,6,2016,8,1500483467,8,1500483467);

/*Table structure for table `environment_permit_company_profile` */

DROP TABLE IF EXISTS `environment_permit_company_profile`;

CREATE TABLE `environment_permit_company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ep_profile_name` varchar(255) NOT NULL,
  `ep_profile_activity_loc_address` text,
  `ep_profile_phone_fax` varchar(100) DEFAULT NULL,
  `ep_profile_main_office_address` text,
  `ep_profile_holding_name` varchar(255) DEFAULT NULL,
  `ep_profile_holding_office_address` text,
  `ep_profile_holding_phone_fax` varchar(100) DEFAULT NULL,
  `ep_profile_company_established_year` varchar(100) DEFAULT NULL,
  `ep_profile_industry_field` varchar(150) DEFAULT NULL,
  `ep_profile_capital_status` varchar(150) DEFAULT NULL,
  `ep_profile_area_factory` varchar(50) DEFAULT NULL,
  `ep_profile_number_of_employees` varchar(150) DEFAULT NULL,
  `ep_profile_production_capacity_installed` varchar(50) DEFAULT NULL,
  `ep_profile_production_capacity_realization` varchar(50) DEFAULT NULL,
  `ep_profile_raw_material` varchar(150) DEFAULT NULL,
  `ep_profile_adjuvant_material` varchar(150) DEFAULT NULL,
  `ep_profile_production_process` text,
  `ep_profile_export_marketing_percentage` varchar(150) DEFAULT NULL,
  `ep_profile_local_marketing_percentage` varchar(150) DEFAULT NULL,
  `ep_profile_environment_document` text,
  `ep_profile_contacts_name` text,
  `ep_profile_contacts_mobile_phone` text,
  `ep_profile_contacts_email` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_company_profile_pp` (`power_plant_id`),
  KEY `FK_environment_permit_company_profile_sector` (`sector_id`),
  CONSTRAINT `FK_environment_permit_company_profile_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_environment_permit_company_profile_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_company_profile` */

insert  into `environment_permit_company_profile`(`id`,`sector_id`,`power_plant_id`,`ep_profile_name`,`ep_profile_activity_loc_address`,`ep_profile_phone_fax`,`ep_profile_main_office_address`,`ep_profile_holding_name`,`ep_profile_holding_office_address`,`ep_profile_holding_phone_fax`,`ep_profile_company_established_year`,`ep_profile_industry_field`,`ep_profile_capital_status`,`ep_profile_area_factory`,`ep_profile_number_of_employees`,`ep_profile_production_capacity_installed`,`ep_profile_production_capacity_realization`,`ep_profile_raw_material`,`ep_profile_adjuvant_material`,`ep_profile_production_process`,`ep_profile_export_marketing_percentage`,`ep_profile_local_marketing_percentage`,`ep_profile_environment_document`,`ep_profile_contacts_name`,`ep_profile_contacts_mobile_phone`,`ep_profile_contacts_email`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,10,6,'awdaadadzxczxczxczx','awda','awd','adawd','awda','dwad','adawd','awda','dawd','adawd','awda','dawd','wadwa','dwada','dwada','dawdwa','dwa','wad','awdad','ad','awd','awda','dawda',8,1500394649,8,1500394742);

/*Table structure for table `environment_permit_detail` */

DROP TABLE IF EXISTS `environment_permit_detail`;

CREATE TABLE `environment_permit_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `environment_permit_id` int(11) NOT NULL,
  `ep_document_name` varchar(1000) NOT NULL,
  `ep_institution` varchar(1000) NOT NULL,
  `ep_date` date NOT NULL,
  `ep_limit_capacity` int(11) NOT NULL,
  `ep_realization_capacity` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_detail` (`environment_permit_id`),
  CONSTRAINT `FK_environment_permit_detail` FOREIGN KEY (`environment_permit_id`) REFERENCES `environment_permit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_detail` */

insert  into `environment_permit_detail`(`id`,`environment_permit_id`,`ep_document_name`,`ep_institution`,`ep_date`,`ep_limit_capacity`,`ep_realization_capacity`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,1,'Dokumen 1','Institusi 1','2017-04-07',100000,200000,8,1493203627,8,1493203627),(17,1,'Dokumen 2','Institusi 2','2017-04-08',200000,300000,8,1493203652,8,1493203652),(18,1,'Dokumen 3','Institusi 3','2017-04-12',300000,4000000,8,1493203675,8,1493203675),(19,2,'Dokumen 1','Institusi 1','2017-07-03',123456,789456,8,1500306369,8,1500306369);

/*Table structure for table `environment_permit_district` */

DROP TABLE IF EXISTS `environment_permit_district`;

CREATE TABLE `environment_permit_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `environment_permit_report_id` int(11) NOT NULL,
  `ep_district` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_district` (`environment_permit_report_id`),
  CONSTRAINT `FK_environment_permit_district` FOREIGN KEY (`environment_permit_report_id`) REFERENCES `environment_permit_report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_district` */

insert  into `environment_permit_district`(`id`,`environment_permit_report_id`,`ep_district`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,5,'Bukti Kabupaten 1',8,1493203461,8,1493203461),(5,6,'Bukti Kabupaten 2',8,1493203499,8,1493203499),(6,7,'Bukti Kabupaten 3',8,1493203531,8,1493203531),(7,8,'Bukti Kabupaten 4',8,1493203567,8,1493203567),(8,9,'Bukti Kabupaten 5',8,1493203597,8,1493203597),(9,10,'Bukti 1',8,1500306984,8,1500306984),(10,11,'asd',8,1500307027,8,1500307027);

/*Table structure for table `environment_permit_ministry` */

DROP TABLE IF EXISTS `environment_permit_ministry`;

CREATE TABLE `environment_permit_ministry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `environment_permit_report_id` int(11) NOT NULL,
  `ep_ministry` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_ministry` (`environment_permit_report_id`),
  CONSTRAINT `FK_environment_permit_ministry` FOREIGN KEY (`environment_permit_report_id`) REFERENCES `environment_permit_report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_ministry` */

insert  into `environment_permit_ministry`(`id`,`environment_permit_report_id`,`ep_ministry`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,5,'Menteri Lingkungan Hidup 1',8,1493203463,8,1493203463),(5,6,'Menteri Lingkungan Hidup 2',8,1493203501,8,1493203501),(6,7,'Menteri Lingkungan Hidup 3',8,1493203534,8,1493203534),(7,8,'Menteri Lingkungan Hidup 4',8,1493203569,8,1493203569),(8,9,'Menteri Lingkungan Hidup 5',8,1493203599,8,1493203599),(9,10,'Menteri 1',8,1500306986,8,1500306986),(10,11,'asd',8,1500307027,8,1500307027);

/*Table structure for table `environment_permit_province` */

DROP TABLE IF EXISTS `environment_permit_province`;

CREATE TABLE `environment_permit_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `environment_permit_report_id` int(11) NOT NULL,
  `ep_province` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_province` (`environment_permit_report_id`),
  CONSTRAINT `FK_environment_permit_province` FOREIGN KEY (`environment_permit_report_id`) REFERENCES `environment_permit_report` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_province` */

insert  into `environment_permit_province`(`id`,`environment_permit_report_id`,`ep_province`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,5,'Provinsi 1',8,1493203462,8,1493203462),(5,6,'Provinsi 2',8,1493203500,8,1493203500),(6,7,'Provinsi 3',8,1493203533,8,1493203533),(7,8,'Provinsi 4',8,1493203568,8,1493203568),(8,9,'Provinsi 5',8,1493203598,8,1493203598),(9,10,'Provinsi 1',8,1500306985,8,1500306985),(10,11,'asd',8,1500307027,8,1500307027);

/*Table structure for table `environment_permit_report` */

DROP TABLE IF EXISTS `environment_permit_report`;

CREATE TABLE `environment_permit_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `environment_permit_id` int(11) NOT NULL,
  `ep_quarter` varchar(20) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_report` (`environment_permit_id`),
  CONSTRAINT `FK_environment_permit_report` FOREIGN KEY (`environment_permit_id`) REFERENCES `environment_permit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_report` */

insert  into `environment_permit_report`(`id`,`environment_permit_id`,`ep_quarter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,'Triwulan III 2016',8,1493203461,8,1493203461),(6,1,'Triwulan IV 2016',8,1493203499,8,1493203499),(7,1,'Semester 1 2016',8,1493203531,8,1493203531),(8,1,'Semester 2 2016',8,1493203567,8,1493203567),(9,1,'Triwulan 1 2017',8,1493203597,8,1493203597),(10,2,'Triwulan 1 2017',8,1500306984,8,1500306984),(11,2,'asd',8,1500307027,8,1500307027);

/*Table structure for table `fcd_detail` */

DROP TABLE IF EXISTS `fcd_detail`;

CREATE TABLE `fcd_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fd_check_date_id` int(11) NOT NULL,
  `fcd_date` date DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fcd_detail` (`fd_check_date_id`),
  CONSTRAINT `FK_fcd_detail` FOREIGN KEY (`fd_check_date_id`) REFERENCES `fd_check_date` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `fcd_detail` */

insert  into `fcd_detail`(`id`,`fd_check_date_id`,`fcd_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,3,'2017-06-14',8,1497676310,8,1497676518),(3,3,'2017-06-13',8,1497676310,8,1497676518),(4,3,NULL,8,1497676310,8,1497676518),(5,3,NULL,8,1497676310,8,1497676518),(6,3,NULL,8,1497676310,8,1497676518),(7,3,NULL,8,1497676310,8,1497676518),(8,3,NULL,8,1497676310,8,1497676518),(9,3,NULL,8,1497676310,8,1497676518),(10,3,'2017-06-27',8,1497676310,8,1497676518),(11,3,NULL,8,1497676310,8,1497676518),(12,3,NULL,8,1497676310,8,1497676518),(13,3,NULL,8,1497676310,8,1497676519),(14,4,'2017-05-29',8,1497676545,8,1497676545),(15,4,NULL,8,1497676545,8,1497676545),(16,4,NULL,8,1497676545,8,1497676545),(17,4,NULL,8,1497676545,8,1497676545),(18,4,NULL,8,1497676545,8,1497676545),(19,4,NULL,8,1497676545,8,1497676545),(20,4,NULL,8,1497676545,8,1497676545),(21,4,NULL,8,1497676545,8,1497676545),(22,4,NULL,8,1497676545,8,1497676545),(23,4,NULL,8,1497676545,8,1497676545),(24,4,NULL,8,1497676545,8,1497676545),(25,4,NULL,8,1497676545,8,1497676545);

/*Table structure for table `fd_check_date` */

DROP TABLE IF EXISTS `fd_check_date`;

CREATE TABLE `fd_check_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fd_check_date_pp` (`power_plant_id`),
  KEY `FK_fd_check_date_sector` (`sector_id`),
  CONSTRAINT `FK_fd_check_date_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_fd_check_date_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `fd_check_date` */

insert  into `fd_check_date`(`id`,`sector_id`,`power_plant_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,8,1497676310,8,1497676518),(4,11,7,8,1497676545,8,1497676545);

/*Table structure for table `fd_detail` */

DROP TABLE IF EXISTS `fd_detail`;

CREATE TABLE `fd_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fire_detector_id` int(11) NOT NULL,
  `fdd_month` int(2) NOT NULL,
  `fdd_floor_type_code` varchar(10) NOT NULL,
  `fdd_monthly_test_code` varchar(10) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fd_detail` (`fire_detector_id`),
  CONSTRAINT `FK_fd_detail` FOREIGN KEY (`fire_detector_id`) REFERENCES `fire_detector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Data for the table `fd_detail` */

insert  into `fd_detail`(`id`,`fire_detector_id`,`fdd_month`,`fdd_floor_type_code`,`fdd_monthly_test_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,3,1,'FDT1','FTR1',8,1498898017,8,1500271675),(26,3,2,'FDT1','FTR1',8,1498898017,8,1500271675),(27,3,3,'FDT1','FTR4',8,1498898017,8,1500271675),(28,3,4,'FDT1','FTR1',8,1498898017,8,1500271675),(29,3,5,'FDT1','',8,1498898017,8,1500271675),(30,3,6,'FDT1','',8,1498898017,8,1500271675),(31,3,7,'FDT1','',8,1498898017,8,1500271675),(32,3,8,'FDT1','',8,1498898017,8,1500271675),(33,3,9,'FDT1','',8,1498898017,8,1500271675),(34,3,10,'FDT1','',8,1498898017,8,1500271675),(35,3,11,'FDT1','',8,1498898017,8,1500271675),(36,3,12,'FDT1','',8,1498898017,8,1500271675),(37,4,1,'FDT1','FTR1',8,1498902985,8,1498902985),(38,4,2,'FDT1','FTR1',8,1498902985,8,1498902985),(39,4,3,'FDT1','FTR4',8,1498902985,8,1498902985),(40,4,4,'FDT1','FTR1',8,1498902985,8,1498902985),(41,4,5,'FDT1','',8,1498902985,8,1498902985),(42,4,6,'FDT1','',8,1498902985,8,1498902985),(43,4,7,'FDT1','',8,1498902985,8,1498902985),(44,4,8,'FDT1','',8,1498902985,8,1498902985),(45,4,9,'FDT1','',8,1498902985,8,1498902985),(46,4,10,'FDT1','',8,1498902985,8,1498902985),(47,4,11,'FDT1','',8,1498902985,8,1498902985),(48,4,12,'FDT1','',8,1498902985,8,1498902985),(49,5,1,'FDT1','FTR1',8,1498903018,8,1498903018),(50,5,2,'FDT1','FTR1',8,1498903018,8,1498903018),(51,5,3,'FDT1','FTR3',8,1498903018,8,1498903018),(52,5,4,'FDT1','FTR1',8,1498903018,8,1498903018),(53,5,5,'FDT1','',8,1498903018,8,1498903018),(54,5,6,'FDT1','',8,1498903018,8,1498903018),(55,5,7,'FDT1','',8,1498903018,8,1498903018),(56,5,8,'FDT1','',8,1498903018,8,1498903018),(57,5,9,'FDT1','',8,1498903018,8,1498903018),(58,5,10,'FDT1','',8,1498903018,8,1498903018),(59,5,11,'FDT1','',8,1498903018,8,1498903018),(60,5,12,'FDT1','',8,1498903018,8,1498903018),(61,6,1,'FDT1','FTR1',8,1498903057,8,1498903057),(62,6,2,'FDT1','FTR1',8,1498903057,8,1498903057),(63,6,3,'FDT1','FTR4',8,1498903057,8,1498903057),(64,6,4,'FDT1','FTR1',8,1498903057,8,1498903057),(65,6,5,'FDT1','',8,1498903057,8,1498903057),(66,6,6,'FDT1','',8,1498903057,8,1498903057),(67,6,7,'FDT1','',8,1498903057,8,1498903057),(68,6,8,'FDT1','',8,1498903057,8,1498903057),(69,6,9,'FDT1','',8,1498903057,8,1498903057),(70,6,10,'FDT1','',8,1498903057,8,1498903057),(71,6,11,'FDT1','',8,1498903057,8,1498903057),(72,6,12,'FDT1','',8,1498903057,8,1498903057),(73,7,1,'FDT2','FTR1',8,1498903087,8,1498903087),(74,7,2,'FDT2','FTR1',8,1498903087,8,1498903087),(75,7,3,'FDT2','FTR3',8,1498903087,8,1498903087),(76,7,4,'FDT2','FTR1',8,1498903087,8,1498903087),(77,7,5,'FDT2','',8,1498903087,8,1498903087),(78,7,6,'FDT2','',8,1498903087,8,1498903087),(79,7,7,'FDT2','',8,1498903087,8,1498903087),(80,7,8,'FDT2','',8,1498903087,8,1498903087),(81,7,9,'FDT2','',8,1498903087,8,1498903087),(82,7,10,'FDT2','',8,1498903087,8,1498903087),(83,7,11,'FDT2','',8,1498903087,8,1498903087),(84,7,12,'FDT2','',8,1498903087,8,1498903087),(85,8,1,'FDT2','FTR1',8,1498903112,8,1498903112),(86,8,2,'FDT2','FTR1',8,1498903113,8,1498903113),(87,8,3,'FDT2','FTR4',8,1498903113,8,1498903113),(88,8,4,'FDT2','FTR1',8,1498903113,8,1498903113),(89,8,5,'FDT2','',8,1498903113,8,1498903113),(90,8,6,'FDT2','',8,1498903113,8,1498903113),(91,8,7,'FDT2','',8,1498903113,8,1498903113),(92,8,8,'FDT2','',8,1498903113,8,1498903113),(93,8,9,'FDT2','',8,1498903113,8,1498903113),(94,8,10,'FDT2','',8,1498903113,8,1498903113),(95,8,11,'FDT2','',8,1498903113,8,1498903113),(96,8,12,'FDT2','',8,1498903113,8,1498903113),(97,9,1,'FDT3','FTR1',8,1498903242,8,1498903242),(98,9,2,'FDT3','FTR1',8,1498903242,8,1498903242),(99,9,3,'FDT3','FTR1',8,1498903242,8,1498903242),(100,9,4,'FDT3','FTR4',8,1498903242,8,1498903242),(101,9,5,'FDT3','',8,1498903242,8,1498903242),(102,9,6,'FDT3','',8,1498903242,8,1498903242),(103,9,7,'FDT3','',8,1498903242,8,1498903242),(104,9,8,'FDT3','',8,1498903242,8,1498903242),(105,9,9,'FDT3','',8,1498903242,8,1498903242),(106,9,10,'FDT3','',8,1498903242,8,1498903242),(107,9,11,'FDT3','',8,1498903242,8,1498903242),(108,9,12,'FDT3','',8,1498903242,8,1498903242);

/*Table structure for table `fire_detector` */

DROP TABLE IF EXISTS `fire_detector`;

CREATE TABLE `fire_detector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `fd_year` int(4) NOT NULL,
  `fd_form_month_type_code` varchar(10) NOT NULL,
  `fd_floor_code` varchar(10) NOT NULL,
  `fd_location` varchar(100) NOT NULL,
  `fd_detector_type_code` varchar(10) NOT NULL,
  `fd_alarm_zone_code` varchar(10) NOT NULL,
  `fd_installation` varchar(10) DEFAULT NULL,
  `fd_detector_physic` varchar(10) DEFAULT NULL,
  `fd_wiring_condition` varchar(10) DEFAULT NULL,
  `fd_last_check` varchar(10) DEFAULT NULL,
  `fd_test_result_record` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fire_detector_pp` (`power_plant_id`),
  KEY `FK_fire_detector_sector` (`sector_id`),
  CONSTRAINT `FK_fire_detector_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_fire_detector_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `fire_detector` */

insert  into `fire_detector`(`id`,`sector_id`,`power_plant_id`,`fd_year`,`fd_form_month_type_code`,`fd_floor_code`,`fd_location`,`fd_detector_type_code`,`fd_alarm_zone_code`,`fd_installation`,`fd_detector_physic`,`fd_wiring_condition`,`fd_last_check`,`fd_test_result_record`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,2016,'FMTC4','FDT1','Toilet Pria','FDT1','FAZ1','','','','','<strong>awadwadwa</strong>',8,1498898017,8,1500271675),(4,10,6,2016,'FMTC4','FDT1','ruang panel deket toilet','FDT1','FAZ1','','','','','',8,1498902984,8,1498902984),(5,10,6,2016,'FMTC4','FDT1','Lobby & Koridor','FDT1','FAZ9','','','','','',8,1498903018,8,1498903018),(6,10,6,2016,'FMTC4','FDT1','Ruang Administrasi Kepegawaian','FDT2','FAZ1','','','','','',8,1498903057,8,1498903057),(7,10,6,2016,'FMTC4','FDT2','Ruang Rapat GM','FDT1','FAZ6','','','','','',8,1498903087,8,1498903087),(8,10,6,2016,'FMTC4','FDT2','Ruang Arsip Keuangan & Anggaran','FDT1','FAZ1','','','','','',8,1498903112,8,1498903112),(9,10,6,2016,'FMTC4','FDT3','Toilet Pria','FDT3','FAZ1','','','','','',8,1498903241,8,1498903241);

/*Table structure for table `hc_detail` */

DROP TABLE IF EXISTS `hc_detail`;

CREATE TABLE `hc_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hydrant_checklist_id` int(11) NOT NULL,
  `hydrant_question_id` int(11) NOT NULL,
  `hcd_answer` int(1) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hc_detail_checklist` (`hydrant_checklist_id`),
  KEY `FK_hc_detail_question` (`hydrant_question_id`),
  CONSTRAINT `FK_hc_detail_checklist` FOREIGN KEY (`hydrant_checklist_id`) REFERENCES `hydrant_checklist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hc_detail_question` FOREIGN KEY (`hydrant_question_id`) REFERENCES `hydrant_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `hc_detail` */

insert  into `hc_detail`(`id`,`hydrant_checklist_id`,`hydrant_question_id`,`hcd_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,3,1,2,8,1498414050,8,1498414050),(15,3,2,2,8,1498414051,8,1498414051),(16,3,3,1,8,1498414051,8,1498414051),(17,3,4,1,8,1498414051,8,1498414051),(18,3,5,1,8,1498414051,8,1498414051),(19,3,6,0,8,1498414051,8,1498414051),(20,3,7,0,8,1498414051,8,1498414051),(21,3,8,2,8,1498414075,8,1498414075),(22,4,1,2,8,1498913156,8,1498913156),(23,4,2,2,8,1498913156,8,1498913156),(24,4,3,2,8,1498913156,8,1498913156),(25,4,4,2,8,1498913156,8,1498913156),(26,4,5,2,8,1498913156,8,1498913156),(27,4,6,2,8,1498913156,8,1498913156),(28,4,7,2,8,1498913156,8,1498913156),(29,4,8,2,8,1498913156,8,1498913156);

/*Table structure for table `hi_detail` */

DROP TABLE IF EXISTS `hi_detail`;

CREATE TABLE `hi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `housekeeping_implementation_id` int(11) NOT NULL,
  `hq_detail_id` int(11) NOT NULL,
  `hi_criteria_value` int(1) NOT NULL,
  `hi_quality_value` int(3) NOT NULL,
  `hi_recommendation` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hi_detail` (`housekeeping_implementation_id`),
  CONSTRAINT `FK_hi_detail` FOREIGN KEY (`housekeeping_implementation_id`) REFERENCES `housekeeping_implementation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `hi_detail` */

insert  into `hi_detail`(`id`,`housekeeping_implementation_id`,`hq_detail_id`,`hi_criteria_value`,`hi_quality_value`,`hi_recommendation`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,6,5,2,55,'<p>Perlu dilakukan identifikasi kembali, barang mana yang masih diperlukan dan mana yang tidak diperlukan, untuk memudahkan dilakukan penadaan (tag). Kemudian barang yang dibutuhkan ditentukan jumlah serta kondisinya. Mengacu kepada Buku Panduan 5S.</p>',8,1497522259,8,1499067594),(25,6,6,1,20,'<p>Prosedur pemilahan perlu dibuat (lebh baik sekaligus untuk prosedur 5S), disosialisasikan, ditempel dan di evaluasi secara periodik. </p>',8,1497522259,8,1499067594),(26,6,7,3,60,'<p>Dilakukan pemilahan sebagaiman poin 1 diatas, kemudian dibuat daftar barang yang dibutuhkan, ditentukan standar jumlahnya dan dilakukan prioritisasi barang berdasarkan frekwensi pemakaian.</p>',8,1497522260,8,1499067594),(27,6,8,2,50,'<p>Perlu dilakukan identifikasi kembali, barang mana yang rusak dan masih baik, untuk memudahkan dilakukan penadaan (tag). Barag rusak dipindahkan ke TPS yang telah ditentukan. Mengacu kepada Buku Panduan 5S.</p>',8,1497522260,8,1499067594),(28,6,9,4,80,'<p>Menentukan lokasi/tempat penyimpanan untuk barang - barang yang dibutuhkan, dibuat klasifikasi penyimpanan (misal berdasarkan tema, frekuensi pakai, dll). Barang rusak/ tidak dibutuhkan harus ditempatkan di TPS yg ditentukan.</p>',8,1497522260,8,1499067594),(29,6,11,0,0,'',8,1497629010,8,1499067594),(30,6,12,0,0,'',8,1497629010,8,1499067594),(33,6,13,0,0,NULL,8,1499072586,8,1499072586);

/*Table structure for table `housekeeping_implementation` */

DROP TABLE IF EXISTS `housekeeping_implementation`;

CREATE TABLE `housekeeping_implementation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `hi_unit` varchar(150) NOT NULL,
  `hi_date` date NOT NULL,
  `hi_auditee` varchar(150) NOT NULL,
  `hi_auditor` varchar(150) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_housekeeping_implementation_pp` (`power_plant_id`),
  KEY `FK_housekeeping_implementation_sector` (`sector_id`),
  CONSTRAINT `FK_housekeeping_implementation_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_housekeeping_implementation_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `housekeeping_implementation` */

insert  into `housekeeping_implementation`(`id`,`sector_id`,`power_plant_id`,`hi_unit`,`hi_date`,`hi_auditee`,`hi_auditor`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,10,6,'Unit 1','2017-06-21','Auditee 1','Auditor 1',8,1497522258,8,1499067594);

/*Table structure for table `housekeeping_question` */

DROP TABLE IF EXISTS `housekeeping_question`;

CREATE TABLE `housekeeping_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hq_title` varchar(150) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `housekeeping_question` */

insert  into `housekeeping_question`(`id`,`hq_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'SEIRI / PEMILAHAN',8,1497521321,8,1497521321),(6,'adwa',8,1497629010,8,1497629010),(7,'ada',8,1499072586,8,1499072586);

/*Table structure for table `hq_detail` */

DROP TABLE IF EXISTS `hq_detail`;

CREATE TABLE `hq_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `housekeeping_question_detail_id` int(11) NOT NULL,
  `hqd_subtitle` varchar(150) NOT NULL,
  `hqd_criteria_1` text,
  `hqd_criteria_2` text,
  `hqd_criteria_3` text,
  `hqd_criteria_4` text,
  `hqd_criteria_5` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hq_detail` (`housekeeping_question_detail_id`),
  CONSTRAINT `FK_hq_detail` FOREIGN KEY (`housekeeping_question_detail_id`) REFERENCES `housekeeping_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `hq_detail` */

insert  into `hq_detail`(`id`,`housekeeping_question_detail_id`,`hqd_subtitle`,`hqd_criteria_1`,`hqd_criteria_2`,`hqd_criteria_3`,`hqd_criteria_4`,`hqd_criteria_5`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,4,'Area kerja sudah tidak menyimpan barang yang tidak dibutuhkan.','<p>Area kerja sudah tidak sama sekali tidak menyimpan barang yang tidak dibutuhkan lagi dan jumlah barang yang dibutuhkan jumlahnya sesuai kebutuhan serta barang dalam keadaan siap pakai.</p>','<p>Area kerja sudah tidak sama sekali tidak menyimpan barang yang tidak dibutuhkan lagi dan jumlah barang yang dibutuhkan jumlahnya sesuai kebutuhan saja.</p>','<p>Area kerja sudah tidak sama sekali tidak menyimpan barang yang tidak dibutuhkan lagi saja. </p>','<p>Area kerja masih menyimpan / ada barang yang tidak diperlukan / dibutuhkan</p>','<p>Belum dilakukan pemilahan</p>',8,1497521321,8,1497521321),(6,4,'Sudah ada prosedur/ tata cara membuang barang-barang yang tidak diperlukan (bernilai dan tidak bernilai)','<p>Sudah ada prosedur /tata cara mengeluarkan/ membuang barang yang tidak dibutuhkan dan mengetahui, mengerti , memahami prosedur tersebut serta form – form penerapan sudah ada. </p>','<p>Sudah ada prosedur /tata cara mengeluarkan/ membuang barang yang tidak dibutuhkan dan mengetahui, mengerti , memahami prosedur tersebut.</p>','<p>Sudah ada prosedur /tata cara mengeluarkan/ membuang barang yang tidak dibutuhkan.</p>','<p>Sudah ada prosedur /tata cara mengeluarkan/ membuang barang yang tidak dibutuhkan tapi tidak jelas. </p>','<p>Belum ada prosedur /tata cara mengeluarkan/ membuang barang yang tidak dibutuhkan.</p>',8,1497521321,8,1497521321),(7,4,'Barang yang dibutuhkan berada di dekat area kerja, jumlah dan jenis sesuai kebutuhan kerja bidang/ bagian tersebut. ','<p>Daftar ringkas sudah ada dan lengkap di area kerja serta sudah memeprtimbangkan frekwensi pemakaian.</p>','<p>Daftar ringkas sudah ada dan lengkap di area kerja serta sudah memeprtimbangkan frekwensi pemakaian.</p>','<p>Barang yang dibutuhkan telah berada didekat area kerja dan jumlahnya sesuai kebutuhan namun daftar ringkas belum ada.</p>','<p>Barang yang dibutuhkan telah berada didekat area kerja dan jumlahnya sesuai kebutuhan namun daftar ringkas belum ada.</p>','<p>Barang yang dibutuhkan tidak berada didekat area kerja serta jumlahnya tidak sesuai kebutuhan.</p>',8,1497521321,8,1497521321),(8,4,'Tidak ada barang rusak / peralatan kerja rusak yang dibiarkan begitu saja dibiarkan di area kerja.','<p>Mesin /peralatan / barang yang berada di area kerja siap pakai serta dalam kondisi optimal (siap pakai dan handal).</p>','<p>Mesin/peralatan/ barang yang berada di area kerja siap pakai.</p>','<p>Mesin/peralatan/ barang yang berada di area kerja sebagian ada yang perlu perhatian/perlakuan khusus (barang tdk rusak).</p>','<p>Masih ada sebagian Mesin/peralatan/ barang yang berada di area kerja dalam keadaan rusak.</p>','<p>Sebagain besar / seluruh mesin/peralatan/ barang yang berada di area kerja dalam kondisi rusak.</p>',8,1497521321,8,1497521321),(9,4,'Lokasi penyimpanan (termasuk alat ukur/ pemeriksaan) sudah ditentukan serta mudah dan cepat untuk mendapatkan dan mengembalikannya.','<p>Lokasi penyimpanan sudah ditentukan serta barang mudah dan cepat untuk mendapatkan / mengembalikannya.</p>','<p>Lokasi penyimpanan sudah ditentukan tapi kadang – kadang barang masih sulit untuk mendapatkan dan mengembalikannya.</p>','<p>Lokasi penyimpanan sudah ditentukan untuk seluruh barang.</p>','<p>Hanya sebagian barang yang telah ditentukan lokasi penyimpanannya.</p>','<p>Belum dilakukan penentuan lokasi penyimpanan barang.</p>',8,1497521321,8,1497521321),(11,6,'dawdadsadaw','<p>dawddsadasd</p>','<p>awdaasdasdsa</p>','<p>awddasdas</p>','<p>awd</p>','<p>awd</p>',8,1497629010,8,1497629088),(12,6,'awda','<p>awd</p>','<p>awd</p>','<p>awd</p>','<p>awd</p>','<p>wad</p>',8,1497629010,8,1497629010),(13,7,'ada','<p>dawd</p>','<p>daw</p>','<p>adw</p>','<p>awd</p>','<p>awd</p>',8,1499072586,8,1499072586);

/*Table structure for table `htd_month` */

DROP TABLE IF EXISTS `htd_month`;

CREATE TABLE `htd_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hydrant_testing_detail_id` int(11) NOT NULL,
  `htdm_month` int(2) NOT NULL,
  `htdm_date` date DEFAULT NULL,
  `htdm_pressure` int(11) DEFAULT NULL,
  `htdm_flow_rate` int(11) DEFAULT NULL,
  `htdm_vertical` int(11) DEFAULT NULL,
  `htdm_horizontal` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_htd_month` (`hydrant_testing_detail_id`),
  CONSTRAINT `FK_htd_month` FOREIGN KEY (`hydrant_testing_detail_id`) REFERENCES `hydrant_testing_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `htd_month` */

insert  into `htd_month`(`id`,`hydrant_testing_detail_id`,`htdm_month`,`htdm_date`,`htdm_pressure`,`htdm_flow_rate`,`htdm_vertical`,`htdm_horizontal`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,1,'2017-11-22',123,3123,12,NULL,8,1511958378,8,1511958378),(2,1,2,'2017-11-27',312,312,31,231,8,1511958378,8,1511958378),(3,1,3,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(4,1,4,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(5,1,5,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(6,1,6,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(7,1,7,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(8,1,8,'2017-11-06',3123,12,123,NULL,8,1511958378,8,1511958378),(9,1,9,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(10,1,10,'2017-11-15',123,NULL,123,NULL,8,1511958378,8,1511958378),(11,1,11,'2017-11-21',123,123,3123,12,8,1511958378,8,1511958378),(12,1,12,NULL,NULL,NULL,NULL,NULL,8,1511958378,8,1511958378),(13,2,1,'2017-11-27',123,123,123,123123,8,1512020900,8,1512020900),(14,2,2,'2017-11-15',21311,2,13,123,8,1512020900,8,1512020900),(15,2,3,'2017-11-22',123,12331,1,12323,8,1512020900,8,1512020900),(16,2,4,NULL,NULL,NULL,NULL,NULL,8,1512020900,8,1512020900),(17,2,5,NULL,NULL,NULL,NULL,NULL,8,1512020901,8,1512020901),(18,2,6,NULL,NULL,NULL,NULL,NULL,8,1512020901,8,1512020901),(19,2,7,NULL,NULL,NULL,NULL,NULL,8,1512020901,8,1512020901),(20,2,8,'2017-11-22',123,123,123,123,8,1512020901,8,1512020901),(21,2,9,NULL,NULL,NULL,NULL,NULL,8,1512020901,8,1512020901),(22,2,10,NULL,NULL,NULL,NULL,NULL,8,1512020901,8,1512020901),(23,2,11,'2017-11-21',123,123,241,124124124,8,1512020901,8,1512020901),(24,2,12,'2017-11-21',23123,1231231,123,123,8,1512020901,8,1512020901);

/*Table structure for table `hydrant_checklist` */

DROP TABLE IF EXISTS `hydrant_checklist`;

CREATE TABLE `hydrant_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `hc_number` int(11) NOT NULL,
  `hc_location` varchar(100) NOT NULL,
  `hc_date` date NOT NULL,
  `hc_note` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hydrant_checklist_pp` (`power_plant_id`),
  KEY `FK_hydrant_checklist_sector` (`sector_id`),
  CONSTRAINT `FK_hydrant_checklist_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hydrant_checklist_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hydrant_checklist` */

insert  into `hydrant_checklist`(`id`,`sector_id`,`power_plant_id`,`hc_number`,`hc_location`,`hc_date`,`hc_note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,2147483647,'awdwada','2017-06-28','<p>wdawda</p>',8,1498414050,8,1498414050),(4,11,7,123211,'12312','2017-07-20','<p>awdad</p>',8,1498913156,8,1498913156);

/*Table structure for table `hydrant_question` */

DROP TABLE IF EXISTS `hydrant_question`;

CREATE TABLE `hydrant_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hq_question` text NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `hydrant_question` */

insert  into `hydrant_question`(`id`,`hq_question`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'<p>Periksa Selang</p>',8,1497348163,8,1497348191),(2,'<p>Periksa Tonggak Hydrant</p>',8,1497353792,8,1497353792),(3,'<p>Lumasi Tonggak Hydrant</p>',8,1497353803,8,1497353803),(4,'<p>Periksa Kunci Box</p>',8,1497353811,8,1497353811),(5,'<p>Periksa Nozzle</p>',8,1497353821,8,1497353821),(6,'<p>Periksa Kebersihan</p>',8,1497353829,8,1497353829),(7,'<p>awdddd</p>',8,1497628519,8,1497628703),(8,'<p>Item 99</p>',8,1498414075,8,1498414075);

/*Table structure for table `hydrant_testing` */

DROP TABLE IF EXISTS `hydrant_testing`;

CREATE TABLE `hydrant_testing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ht_year` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hydrant_testing_power_plant` (`power_plant_id`),
  KEY `FK_hydrant_testing_sector` (`sector_id`),
  CONSTRAINT `FK_hydrant_testing_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hydrant_testing_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hydrant_testing` */

insert  into `hydrant_testing`(`id`,`sector_id`,`power_plant_id`,`ht_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,2016,8,1511956178,8,1511956178);

/*Table structure for table `hydrant_testing_detail` */

DROP TABLE IF EXISTS `hydrant_testing_detail`;

CREATE TABLE `hydrant_testing_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hydrant_testing_id` int(11) NOT NULL,
  `htd_number` varchar(50) NOT NULL,
  `htd_location` varchar(50) DEFAULT NULL,
  `htd_pump_type` varchar(10) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hydrant_testing_detail` (`hydrant_testing_id`),
  CONSTRAINT `FK_hydrant_testing_detail` FOREIGN KEY (`hydrant_testing_id`) REFERENCES `hydrant_testing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hydrant_testing_detail` */

insert  into `hydrant_testing_detail`(`id`,`hydrant_testing_id`,`htd_number`,`htd_location`,`htd_pump_type`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'dwa','daw','HDPT1',8,1511958378,8,1511958378),(2,1,'123','123','HDPT2',8,1512020900,8,1512020900);

/*Table structure for table `important_phone_number` */

DROP TABLE IF EXISTS `important_phone_number`;

CREATE TABLE `important_phone_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ipn_instance_name` varchar(100) NOT NULL,
  `ipn_phone_number` text NOT NULL,
  `ipn_address` text NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_important_phone_number_pp` (`power_plant_id`),
  KEY `FK_important_phone_number_sector` (`sector_id`),
  CONSTRAINT `FK_important_phone_number_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_important_phone_number_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `important_phone_number` */

insert  into `important_phone_number`(`id`,`sector_id`,`power_plant_id`,`ipn_instance_name`,`ipn_phone_number`,`ipn_address`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,'Instansi 1','081277788888<p>081378889999</p>','<p>Jalan 1</p><p>Jalan 2<br></p>',8,1496722662,8,1496722662),(4,10,6,'Instansi 2','0812475767<p>0981534677</p>','<p>Jalan 1</p><p>Jalan 2<br></p>',8,1496722693,8,1496722693);

/*Table structure for table `k3_supervision` */

DROP TABLE IF EXISTS `k3_supervision`;

CREATE TABLE `k3_supervision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ks_name` varchar(50) NOT NULL,
  `ks_permission_number` varchar(50) DEFAULT NULL,
  `ks_operator` varchar(50) DEFAULT NULL,
  `ks_duration_time` varchar(50) DEFAULT NULL,
  `ks_start_date` date DEFAULT NULL,
  `ks_end_date` date DEFAULT NULL,
  `ks_contr_number` varchar(50) DEFAULT NULL,
  `ks_fo_name` varchar(50) DEFAULT NULL,
  `ks_fo_phone` varchar(50) DEFAULT NULL,
  `ks_supervisor` text,
  `ks_sheet_creator` varchar(50) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_k3_supervision_sector` (`sector_id`),
  KEY `FK_k3_supervision_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_k3_supervision_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_k3_supervision_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `k3_supervision` */

insert  into `k3_supervision`(`id`,`sector_id`,`power_plant_id`,`ks_name`,`ks_permission_number`,`ks_operator`,`ks_duration_time`,`ks_start_date`,`ks_end_date`,`ks_contr_number`,`ks_fo_name`,`ks_fo_phone`,`ks_supervisor`,`ks_sheet_creator`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'Perbaikan Pompa','Izin kerja 1','PT Pelaksana 1','10 Hari','2017-11-15','2017-11-25','01.K/KITSBS?2017','Nama 1 ','081267657646','Asep Saepudin, Tony Arfandi','M. Dedy',8,1511598087,8,1511598189),(3,10,6,'awdaw','adw','awd','',NULL,NULL,'','','','','',8,1511601878,8,1511601878);

/*Table structure for table `k3_supervision_detail` */

DROP TABLE IF EXISTS `k3_supervision_detail`;

CREATE TABLE `k3_supervision_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `k3_supervision_id` int(11) NOT NULL,
  `ksd_date` date NOT NULL,
  `ksd_finding` varchar(50) DEFAULT NULL,
  `ksd_officer_action` varchar(100) DEFAULT NULL,
  `ksd_response` varchar(100) DEFAULT NULL,
  `ksd_finding_desc` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_k3_supervision_detail` (`k3_supervision_id`),
  CONSTRAINT `FK_k3_supervision_detail` FOREIGN KEY (`k3_supervision_id`) REFERENCES `k3_supervision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `k3_supervision_detail` */

insert  into `k3_supervision_detail`(`id`,`k3_supervision_id`,`ksd_date`,`ksd_finding`,`ksd_officer_action`,`ksd_response`,`ksd_finding_desc`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,3,'2017-02-07','awd','awd','awd','awd',8,1511601895,8,1511601895);

/*Table structure for table `k3l_activity` */

DROP TABLE IF EXISTS `k3l_activity`;

CREATE TABLE `k3l_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ka_name` varchar(100) NOT NULL,
  `ka_description` text,
  `ka_date` date NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_k3l_activity_sector` (`sector_id`),
  KEY `FK_k3l_activity_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_k3l_activity_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_k3l_activity_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `k3l_activity` */

insert  into `k3l_activity`(`id`,`sector_id`,`power_plant_id`,`ka_name`,`ka_description`,`ka_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'Aktifitas 1','Abcde','2017-11-28',8,1511509312,8,1511509323),(2,10,6,'Aktifitas 2','','2017-11-24',8,1511509330,8,1511509330),(3,10,6,'Aktivitas 3','','2017-11-22',8,1511509982,8,1511509982),(4,10,6,'Aktifitas 1','','2017-11-21',8,1511510097,8,1511510097),(5,10,6,'Aktiffiat12','awd123','2017-11-20',8,1511512470,8,1511512470);

/*Table structure for table `k3l_problem` */

DROP TABLE IF EXISTS `k3l_problem`;

CREATE TABLE `k3l_problem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `kp_problem_number` varchar(100) NOT NULL,
  `kp_date` date DEFAULT NULL,
  `kp_problem_description` text NOT NULL,
  `kp_mitigation_plan` text NOT NULL,
  `kp_mitigation_dateline_date` date DEFAULT NULL,
  `kp_status_code` varchar(10) DEFAULT NULL,
  `kp_progress` int(3) DEFAULT NULL,
  `kp_description` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_k3l_problem_sector` (`sector_id`),
  KEY `FK_k3l_problem_pp` (`power_plant_id`),
  CONSTRAINT `FK_k3l_problem_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_k3l_problem_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `k3l_problem` */

insert  into `k3l_problem`(`id`,`sector_id`,`power_plant_id`,`kp_problem_number`,`kp_date`,`kp_problem_description`,`kp_mitigation_plan`,`kp_mitigation_dateline_date`,`kp_status_code`,`kp_progress`,`kp_description`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'001.E3.2012','2017-06-22','<p>Pengelolaan Limbah Abu Batubara PLTU Ombilin melebihi ketentuan masa simpan limbah (Izin TPS Abu Batubara hanya 90hari)</p>','<p>Pemanfaatan Limbah B3 dengan PT Semen Padang<br></p><p>Pembuatan Penimbunan Limbah Batubara (Landfill)<br></p>','2017-06-07','KSC1',70,'Dalam proses...',8,1497379541,8,1497379541),(2,10,6,'002.E1.2014','2017-06-20','<p>Landfill PLTU Ombilin harus dilengkapi dengan AMDAL Landfill (yang juga merupakan dokumen IPPKH)</p>','<p>Pengurusan AMDAL</p>',NULL,'',NULL,'',8,1498311950,8,1498311950);

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(7) DEFAULT NULL,
  `table_name` varchar(100) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_log_updated_by` (`updated_by`),
  KEY `FK_log_created_by` (`created_by`),
  CONSTRAINT `FK_log_created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_log_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10978 DEFAULT CHARSET=latin1;

/*Data for the table `log` */

insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10461,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #150',8,1500965850,8,1500965850),(10462,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #151',8,1500965850,8,1500965850),(10463,'SUCCESS','ppu_technical_provision_detail','INSERTING NEW DATA WITH ID #60',8,1500965850,8,1500965850),(10464,'SUCCESS','ppu_technical_provision_detail','INSERTING NEW DATA WITH ID #61',8,1500965850,8,1500965850),(10465,'SUCCESS','ppu_technical_provision_detail','INSERTING NEW DATA WITH ID #62',8,1500965850,8,1500965850),(10466,'SUCCESS','ppu_technical_provision_detail','INSERTING NEW DATA WITH ID #63',8,1500965850,8,1500965850),(10467,'SUCCESS','ppu_technical_provision_detail','INSERTING NEW DATA WITH ID #64',8,1500965850,8,1500965850),(10468,'SUCCESS','ppu_ambient','INSERTING NEW DATA WITH ID #8',8,1500992309,8,1500992309),(10469,'SUCCESS','ppucems_report_bm','INSERTING NEW DATA WITH ID #8',8,1501086794,8,1501086794),(10470,'SUCCESS','ppucemsrb_quarter','INSERTING NEW DATA WITH ID #29',8,1501086794,8,1501086794),(10471,'SUCCESS','ppucemsrb_quarter','INSERTING NEW DATA WITH ID #30',8,1501086794,8,1501086794),(10472,'SUCCESS','ppucemsrb_quarter','INSERTING NEW DATA WITH ID #31',8,1501086794,8,1501086794),(10473,'SUCCESS','ppucemsrb_quarter','INSERTING NEW DATA WITH ID #32',8,1501086794,8,1501086794),(10474,'SUCCESS','ppucems_report_bm','UPDATING DATA ID #1',8,1501149139,8,1501149139),(10475,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #151',8,1501149140,8,1501149140),(10476,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #152',8,1501149140,8,1501149140),(10477,'SUCCESS','ppucemsrb_quarter','UPDATING DATA ID #1',8,1501149140,8,1501149140),(10478,'SUCCESS','ppucemsrb_quarter','UPDATING DATA ID #2',8,1501149140,8,1501149140),(10479,'SUCCESS','ppucemsrb_quarter','UPDATING DATA ID #3',8,1501149140,8,1501149140),(10480,'SUCCESS','ppucemsrb_quarter','UPDATING DATA ID #4',8,1501149140,8,1501149140),(10481,'SUCCESS','attachment','DELETING DATA ID #151',8,1501469370,8,1501469370),(10482,'SUCCESS','ppucems_report_bm','DELETING DATA ID #1',8,1501469370,8,1501469370),(10483,'SUCCESS','plb3_self_assessment','INSERTING NEW DATA WITH ID #5',8,1507126945,8,1507126945),(10484,'SUCCESS','plb3_balance_sheet','INSERTING NEW DATA WITH ID #3',8,1507127582,8,1507127582),(10485,'SUCCESS','plb3_checklist','INSERTING NEW DATA WITH ID #2',8,1507127587,8,1507127587),(10486,'SUCCESS','plb3_balance_sheet','INSERTING NEW DATA WITH ID #4',8,1507732514,8,1507732514),(10487,'SUCCESS','plb3_balance_sheet_detail','INSERTING NEW DATA WITH ID #44',8,1507732541,8,1507732541),(10488,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #156',8,1507732541,8,1507732541),(10489,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1249',8,1507732541,8,1507732541),(10490,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1250',8,1507732541,8,1507732541),(10491,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1251',8,1507732541,8,1507732541),(10492,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1252',8,1507732541,8,1507732541),(10493,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1253',8,1507732541,8,1507732541),(10494,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1254',8,1507732541,8,1507732541),(10495,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1255',8,1507732541,8,1507732541),(10496,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1256',8,1507732541,8,1507732541),(10497,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1257',8,1507732541,8,1507732541),(10498,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1258',8,1507732541,8,1507732541),(10499,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1259',8,1507732541,8,1507732541),(10500,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1260',8,1507732541,8,1507732541),(10501,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #157',8,1507732541,8,1507732541),(10502,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #158',8,1507732541,8,1507732541),(10503,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1261',8,1507732541,8,1507732541),(10504,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1262',8,1507732541,8,1507732541),(10505,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1263',8,1507732541,8,1507732541),(10506,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1264',8,1507732541,8,1507732541),(10507,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1265',8,1507732541,8,1507732541),(10508,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1266',8,1507732541,8,1507732541),(10509,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1267',8,1507732541,8,1507732541),(10510,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1268',8,1507732541,8,1507732541),(10511,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1269',8,1507732541,8,1507732541),(10512,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1270',8,1507732541,8,1507732541),(10513,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1271',8,1507732541,8,1507732541),(10514,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1272',8,1507732541,8,1507732541),(10515,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #159',8,1507732541,8,1507732541),(10516,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1273',8,1507732541,8,1507732541),(10517,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1274',8,1507732541,8,1507732541),(10518,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1275',8,1507732541,8,1507732541),(10519,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1276',8,1507732541,8,1507732541),(10520,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1277',8,1507732541,8,1507732541),(10521,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1278',8,1507732541,8,1507732541),(10522,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1279',8,1507732541,8,1507732541),(10523,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1280',8,1507732541,8,1507732541),(10524,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1281',8,1507732541,8,1507732541),(10525,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1282',8,1507732541,8,1507732541),(10526,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1283',8,1507732541,8,1507732541),(10527,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1284',8,1507732541,8,1507732541),(10528,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #160',8,1507732541,8,1507732541),(10529,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1285',8,1507732541,8,1507732541),(10530,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1286',8,1507732541,8,1507732541),(10531,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1287',8,1507732541,8,1507732541),(10532,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1288',8,1507732541,8,1507732541),(10533,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1289',8,1507732541,8,1507732541),(10534,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1290',8,1507732541,8,1507732541),(10535,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1291',8,1507732541,8,1507732541),(10536,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1292',8,1507732541,8,1507732541),(10537,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1293',8,1507732541,8,1507732541),(10538,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1294',8,1507732541,8,1507732541),(10539,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1295',8,1507732541,8,1507732541),(10540,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1296',8,1507732541,8,1507732541),(10541,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #161',8,1507732541,8,1507732541),(10542,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1297',8,1507732541,8,1507732541),(10543,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1298',8,1507732541,8,1507732541),(10544,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1299',8,1507732541,8,1507732541),(10545,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1300',8,1507732541,8,1507732541),(10546,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1301',8,1507732541,8,1507732541),(10547,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1302',8,1507732541,8,1507732541),(10548,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1303',8,1507732541,8,1507732541),(10549,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1304',8,1507732541,8,1507732541),(10550,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1305',8,1507732541,8,1507732541),(10551,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1306',8,1507732541,8,1507732541),(10552,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1307',8,1507732541,8,1507732541),(10553,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1308',8,1507732541,8,1507732541),(10554,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #162',8,1507732541,8,1507732541),(10555,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1309',8,1507732541,8,1507732541),(10556,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1310',8,1507732541,8,1507732541),(10557,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1311',8,1507732541,8,1507732541),(10558,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1312',8,1507732541,8,1507732541),(10559,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1313',8,1507732541,8,1507732541),(10560,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1314',8,1507732541,8,1507732541),(10561,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1315',8,1507732541,8,1507732541),(10562,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1316',8,1507732541,8,1507732541),(10563,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1317',8,1507732541,8,1507732541),(10564,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1318',8,1507732541,8,1507732541),(10565,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1319',8,1507732541,8,1507732541),(10566,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1320',8,1507732541,8,1507732541),(10567,'SUCCESS','plb3_balance_sheet_detail','INSERTING NEW DATA WITH ID #45',8,1507871214,8,1507871214),(10568,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #163',8,1507871214,8,1507871214),(10569,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1321',8,1507871214,8,1507871214),(10570,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1322',8,1507871214,8,1507871214),(10571,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1323',8,1507871214,8,1507871214),(10572,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1324',8,1507871214,8,1507871214),(10573,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1325',8,1507871214,8,1507871214),(10574,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1326',8,1507871214,8,1507871214),(10575,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1327',8,1507871214,8,1507871214),(10576,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1328',8,1507871214,8,1507871214),(10577,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1329',8,1507871214,8,1507871214),(10578,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1330',8,1507871214,8,1507871214),(10579,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1331',8,1507871214,8,1507871214),(10580,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1332',8,1507871214,8,1507871214),(10581,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #164',8,1507871214,8,1507871214),(10582,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #165',8,1507871214,8,1507871214),(10583,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1333',8,1507871214,8,1507871214),(10584,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1334',8,1507871214,8,1507871214),(10585,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1335',8,1507871214,8,1507871214),(10586,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1336',8,1507871214,8,1507871214),(10587,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1337',8,1507871214,8,1507871214),(10588,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1338',8,1507871214,8,1507871214),(10589,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1339',8,1507871214,8,1507871214),(10590,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1340',8,1507871214,8,1507871214),(10591,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1341',8,1507871214,8,1507871214),(10592,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1342',8,1507871214,8,1507871214),(10593,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1343',8,1507871214,8,1507871214),(10594,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1344',8,1507871214,8,1507871214),(10595,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #166',8,1507871214,8,1507871214),(10596,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1345',8,1507871215,8,1507871215),(10597,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1346',8,1507871215,8,1507871215),(10598,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1347',8,1507871215,8,1507871215),(10599,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1348',8,1507871215,8,1507871215),(10600,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1349',8,1507871215,8,1507871215),(10601,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1350',8,1507871215,8,1507871215),(10602,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1351',8,1507871215,8,1507871215),(10603,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1352',8,1507871215,8,1507871215),(10604,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1353',8,1507871215,8,1507871215),(10605,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1354',8,1507871215,8,1507871215),(10606,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1355',8,1507871215,8,1507871215),(10607,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1356',8,1507871215,8,1507871215),(10608,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #167',8,1507871215,8,1507871215),(10609,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1357',8,1507871215,8,1507871215),(10610,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1358',8,1507871215,8,1507871215),(10611,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1359',8,1507871215,8,1507871215),(10612,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1360',8,1507871215,8,1507871215),(10613,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1361',8,1507871215,8,1507871215),(10614,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1362',8,1507871215,8,1507871215),(10615,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1363',8,1507871215,8,1507871215),(10616,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1364',8,1507871215,8,1507871215),(10617,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1365',8,1507871215,8,1507871215),(10618,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1366',8,1507871215,8,1507871215),(10619,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1367',8,1507871215,8,1507871215),(10620,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1368',8,1507871215,8,1507871215),(10621,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #168',8,1507871215,8,1507871215),(10622,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1369',8,1507871215,8,1507871215),(10623,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1370',8,1507871215,8,1507871215),(10624,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1371',8,1507871215,8,1507871215),(10625,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1372',8,1507871215,8,1507871215),(10626,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1373',8,1507871215,8,1507871215),(10627,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1374',8,1507871215,8,1507871215),(10628,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1375',8,1507871215,8,1507871215),(10629,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1376',8,1507871215,8,1507871215),(10630,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1377',8,1507871215,8,1507871215),(10631,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1378',8,1507871215,8,1507871215),(10632,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1379',8,1507871215,8,1507871215),(10633,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1380',8,1507871215,8,1507871215),(10634,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #169',8,1507871215,8,1507871215),(10635,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1381',8,1507871215,8,1507871215),(10636,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1382',8,1507871215,8,1507871215),(10637,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1383',8,1507871215,8,1507871215),(10638,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1384',8,1507871215,8,1507871215),(10639,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1385',8,1507871215,8,1507871215),(10640,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1386',8,1507871215,8,1507871215),(10641,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1387',8,1507871215,8,1507871215),(10642,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1388',8,1507871215,8,1507871215),(10643,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1389',8,1507871215,8,1507871215),(10644,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1390',8,1507871215,8,1507871215),(10645,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1391',8,1507871215,8,1507871215),(10646,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1392',8,1507871215,8,1507871215),(10647,'SUCCESS','plb3_balance_sheet_detail','DELETING DATA ID #44',8,1507871256,8,1507871256),(10648,'SUCCESS','plb3_balance_sheet_detail','INSERTING NEW DATA WITH ID #46',8,1507871360,8,1507871360),(10649,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #170',8,1507871360,8,1507871360),(10650,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1393',8,1507871360,8,1507871360),(10651,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1394',8,1507871360,8,1507871360),(10652,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1395',8,1507871360,8,1507871360),(10653,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1396',8,1507871360,8,1507871360),(10654,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1397',8,1507871360,8,1507871360),(10655,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1398',8,1507871360,8,1507871360),(10656,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1399',8,1507871360,8,1507871360),(10657,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1400',8,1507871360,8,1507871360),(10658,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1401',8,1507871360,8,1507871360),(10659,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1402',8,1507871360,8,1507871360),(10660,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1403',8,1507871360,8,1507871360),(10661,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1404',8,1507871360,8,1507871360),(10662,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #171',8,1507871360,8,1507871360),(10663,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #172',8,1507871360,8,1507871360),(10664,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1405',8,1507871360,8,1507871360),(10665,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1406',8,1507871360,8,1507871360),(10666,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1407',8,1507871360,8,1507871360),(10667,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1408',8,1507871360,8,1507871360),(10668,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1409',8,1507871360,8,1507871360),(10669,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1410',8,1507871360,8,1507871360),(10670,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1411',8,1507871360,8,1507871360),(10671,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1412',8,1507871360,8,1507871360),(10672,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1413',8,1507871360,8,1507871360),(10673,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1414',8,1507871360,8,1507871360),(10674,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1415',8,1507871360,8,1507871360),(10675,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1416',8,1507871360,8,1507871360),(10676,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #173',8,1507871360,8,1507871360),(10677,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1417',8,1507871360,8,1507871360),(10678,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1418',8,1507871360,8,1507871360),(10679,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1419',8,1507871360,8,1507871360),(10680,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1420',8,1507871360,8,1507871360),(10681,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1421',8,1507871360,8,1507871360),(10682,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1422',8,1507871360,8,1507871360),(10683,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1423',8,1507871360,8,1507871360),(10684,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1424',8,1507871360,8,1507871360),(10685,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1425',8,1507871360,8,1507871360),(10686,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1426',8,1507871360,8,1507871360),(10687,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1427',8,1507871360,8,1507871360),(10688,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1428',8,1507871360,8,1507871360),(10689,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #174',8,1507871360,8,1507871360),(10690,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1429',8,1507871360,8,1507871360),(10691,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1430',8,1507871360,8,1507871360),(10692,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1431',8,1507871360,8,1507871360),(10693,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1432',8,1507871360,8,1507871360),(10694,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1433',8,1507871360,8,1507871360),(10695,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1434',8,1507871360,8,1507871360),(10696,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1435',8,1507871360,8,1507871360),(10697,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1436',8,1507871360,8,1507871360),(10698,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1437',8,1507871360,8,1507871360),(10699,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1438',8,1507871360,8,1507871360),(10700,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1439',8,1507871360,8,1507871360),(10701,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1440',8,1507871360,8,1507871360),(10702,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #175',8,1507871360,8,1507871360),(10703,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1441',8,1507871360,8,1507871360),(10704,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1442',8,1507871360,8,1507871360),(10705,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1443',8,1507871360,8,1507871360),(10706,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1444',8,1507871360,8,1507871360),(10707,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1445',8,1507871360,8,1507871360),(10708,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1446',8,1507871360,8,1507871360),(10709,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1447',8,1507871360,8,1507871360),(10710,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1448',8,1507871360,8,1507871360),(10711,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1449',8,1507871360,8,1507871360),(10712,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1450',8,1507871360,8,1507871360),(10713,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1451',8,1507871360,8,1507871360),(10714,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1452',8,1507871360,8,1507871360),(10715,'SUCCESS','plb3_balance_sheet_treatment','INSERTING NEW DATA WITH ID #176',8,1507871360,8,1507871360),(10716,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1453',8,1507871360,8,1507871360),(10717,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1454',8,1507871360,8,1507871360),(10718,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1455',8,1507871360,8,1507871360),(10719,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1456',8,1507871360,8,1507871360),(10720,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1457',8,1507871360,8,1507871360),(10721,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1458',8,1507871360,8,1507871360),(10722,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1459',8,1507871360,8,1507871360),(10723,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1460',8,1507871360,8,1507871360),(10724,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1461',8,1507871360,8,1507871360),(10725,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1462',8,1507871360,8,1507871360),(10726,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1463',8,1507871360,8,1507871360),(10727,'SUCCESS','plb3bsd_month','INSERTING NEW DATA WITH ID #1464',8,1507871360,8,1507871360),(10728,'SUCCESS','plb3_checklist','INSERTING NEW DATA WITH ID #3',8,1508003956,8,1508003956),(10729,'SUCCESS','plb3_checklist_detail','INSERTING NEW DATA WITH ID #8',8,1508004481,8,1508004481),(10730,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #54',8,1508004481,8,1508004481),(10731,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #151',8,1508004482,8,1508004482),(10732,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #152',8,1508004482,8,1508004482),(10733,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #55',8,1508004482,8,1508004482),(10734,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #56',8,1508004482,8,1508004482),(10735,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #57',8,1508004482,8,1508004482),(10736,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #58',8,1508004482,8,1508004482),(10737,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #59',8,1508004482,8,1508004482),(10738,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #60',8,1508004483,8,1508004483),(10739,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #61',8,1508004483,8,1508004483),(10740,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #62',8,1508004483,8,1508004483),(10741,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #63',8,1508004483,8,1508004483),(10742,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #64',8,1508004483,8,1508004483),(10743,'SUCCESS','plb3_checklist_detail','INSERTING NEW DATA WITH ID #9',8,1508072929,8,1508072929),(10744,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #65',8,1508072929,8,1508072929),(10745,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #66',8,1508072929,8,1508072929),(10746,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #67',8,1508072929,8,1508072929),(10747,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #68',8,1508072929,8,1508072929),(10748,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #152',8,1508072931,8,1508072931),(10749,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #153',8,1508072931,8,1508072931),(10750,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #69',8,1508072931,8,1508072931),(10751,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #70',8,1508072931,8,1508072931),(10752,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #71',8,1508072931,8,1508072931),(10753,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #153',8,1508072932,8,1508072932),(10754,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #154',8,1508072932,8,1508072932),(10755,'SUCCESS','plb3_checklist_answer','INSERTING NEW DATA WITH ID #72',8,1508072932,8,1508072932),(10756,'SUCCESS','budget_monitoring','UPDATING DATA ID #16',8,1509511582,8,1509511582),(10757,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #24',8,1509511582,8,1509511582),(10758,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #205',8,1509511582,8,1509511582),(10759,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #206',8,1509511582,8,1509511582),(10760,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #207',8,1509511582,8,1509511582),(10761,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #208',8,1509511582,8,1509511582),(10762,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #209',8,1509511582,8,1509511582),(10763,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #210',8,1509511582,8,1509511582),(10764,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #211',8,1509511582,8,1509511582),(10765,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #423',8,1509511583,8,1509511583),(10766,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #212',8,1509511583,8,1509511583),(10767,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #424',8,1509511583,8,1509511583),(10768,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #213',8,1509511583,8,1509511583),(10769,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #214',8,1509511583,8,1509511583),(10770,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #215',8,1509511583,8,1509511583),(10771,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #216',8,1509511583,8,1509511583),(10772,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #25',8,1509511583,8,1509511583),(10773,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #217',8,1509511583,8,1509511583),(10774,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #218',8,1509511583,8,1509511583),(10775,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #219',8,1509511583,8,1509511583),(10776,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #220',8,1509511583,8,1509511583),(10777,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #221',8,1509511583,8,1509511583),(10778,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #222',8,1509511583,8,1509511583),(10779,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #223',8,1509511583,8,1509511583),(10780,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #224',8,1509511583,8,1509511583),(10781,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #225',8,1509511583,8,1509511583),(10782,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #226',8,1509511583,8,1509511583),(10783,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #227',8,1509511583,8,1509511583),(10784,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #228',8,1509511583,8,1509511583),(10785,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #26',8,1509511583,8,1509511583),(10786,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #229',8,1509511583,8,1509511583),(10787,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #230',8,1509511583,8,1509511583),(10788,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #231',8,1509511583,8,1509511583),(10789,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #232',8,1509511583,8,1509511583),(10790,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #233',8,1509511583,8,1509511583),(10791,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #234',8,1509511583,8,1509511583),(10792,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #235',8,1509511583,8,1509511583),(10793,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #236',8,1509511583,8,1509511583),(10794,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #237',8,1509511583,8,1509511583),(10795,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #238',8,1509511583,8,1509511583),(10796,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #239',8,1509511583,8,1509511583),(10797,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #240',8,1509511583,8,1509511583),(10798,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #263',8,1511422792,8,1511422792),(10799,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #264',8,1511422802,8,1511422802),(10800,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #265',8,1511434648,8,1511434648),(10801,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #266',8,1511434655,8,1511434655),(10802,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #267',8,1511434677,8,1511434677),(10803,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #268',8,1511434688,8,1511434688),(10804,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #269',8,1511434789,8,1511434789),(10805,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #270',8,1511434809,8,1511434809),(10806,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #271',8,1511434867,8,1511434867),(10807,'SUCCESS','contract_monitoring','INSERTING NEW DATA WITH ID #1',8,1511435148,8,1511435148),(10808,'SUCCESS','contract_monitoring','UPDATING DATA ID #1',8,1511446862,8,1511446862),(10809,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #425',8,1511446862,8,1511446862),(10810,'SUCCESS','contract_monitoring','UPDATING DATA ID #1',8,1511447022,8,1511447022),(10811,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #426',8,1511447022,8,1511447022),(10812,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #427',8,1511447023,8,1511447023),(10813,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #428',8,1511447023,8,1511447023),(10814,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #429',8,1511447023,8,1511447023),(10815,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #430',8,1511447023,8,1511447023),(10816,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #431',8,1511447023,8,1511447023),(10817,'SUCCESS','contract_monitoring','UPDATING DATA ID #1',8,1511447039,8,1511447039),(10818,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #432',8,1511447039,8,1511447039),(10819,'SUCCESS','contract_monitoring','UPDATING DATA ID #1',8,1511447056,8,1511447056),(10820,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #433',8,1511447056,8,1511447056),(10821,'SUCCESS','contract_monitoring','UPDATING DATA ID #1',8,1511447069,8,1511447069),(10822,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #272',8,1511508690,8,1511508690),(10823,'SUCCESS','codeset','DELETING DATA ID #272',8,1511508828,8,1511508828),(10824,'SUCCESS','k3l_activity','INSERTING NEW DATA WITH ID #1',8,1511509312,8,1511509312),(10825,'SUCCESS','k3l_activity','UPDATING DATA ID #1',8,1511509323,8,1511509323),(10826,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #434',8,1511509323,8,1511509323),(10827,'SUCCESS','k3l_activity','INSERTING NEW DATA WITH ID #2',8,1511509330,8,1511509330),(10828,'SUCCESS','k3l_activity','INSERTING NEW DATA WITH ID #3',8,1511509982,8,1511509982),(10829,'SUCCESS','k3l_activity','INSERTING NEW DATA WITH ID #4',8,1511510097,8,1511510097),(10830,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #154',8,1511510098,8,1511510098),(10831,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #155',8,1511510098,8,1511510098),(10832,'SUCCESS','attachment','DELETING DATA ID #154',8,1511510191,8,1511510191),(10833,'SUCCESS','k3l_activity','INSERTING NEW DATA WITH ID #5',8,1511512470,8,1511512470),(10834,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #155',8,1511512471,8,1511512471),(10835,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #156',8,1511512471,8,1511512471),(10836,'SUCCESS','maturity_level','UPDATING DATA ID #19',8,1511513904,8,1511513904),(10837,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #1',8,1511513904,8,1511513904),(10838,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #156',8,1511513905,8,1511513905),(10839,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #157',8,1511513905,8,1511513905),(10840,'SUCCESS','loto_monitoring','INSERTING NEW DATA WITH ID #1',8,1511575591,8,1511575591),(10841,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #272',8,1511575819,8,1511575819),(10842,'SUCCESS','loto_monitoring','DELETING DATA ID #1',8,1511575873,8,1511575873),(10843,'SUCCESS','loto_monitoring','INSERTING NEW DATA WITH ID #2',8,1511576043,8,1511576043),(10844,'SUCCESS','loto_monitoring','UPDATING DATA ID #2',8,1511576186,8,1511576186),(10845,'SUCCESS','loto_monitoring','UPDATING DATA ID #2',8,1511577466,8,1511577466),(10846,'SUCCESS','loto_monitoring','INSERTING NEW DATA WITH ID #3',8,1511577572,8,1511577572),(10847,'SUCCESS','k3_supervision','INSERTING NEW DATA WITH ID #1',8,1511598087,8,1511598087),(10848,'SUCCESS','k3_supervision','UPDATING DATA ID #1',8,1511598189,8,1511598189),(10849,'SUCCESS','k3_supervision_detail','INSERTING NEW DATA WITH ID #1',8,1511601087,8,1511601087),(10850,'SUCCESS','k3_supervision_detail','DELETING DATA ID #1',8,1511601680,8,1511601680),(10851,'SUCCESS','k3_supervision_detail','INSERTING NEW DATA WITH ID #2',8,1511601748,8,1511601748),(10852,'SUCCESS','k3_supervision_detail','DELETING DATA ID #2',8,1511601752,8,1511601752),(10853,'SUCCESS','k3_supervision','INSERTING NEW DATA WITH ID #2',8,1511601864,8,1511601864),(10854,'SUCCESS','k3_supervision','DELETING DATA ID #2',8,1511601871,8,1511601871),(10855,'SUCCESS','k3_supervision','INSERTING NEW DATA WITH ID #3',8,1511601878,8,1511601878),(10856,'SUCCESS','k3_supervision_detail','INSERTING NEW DATA WITH ID #3',8,1511601895,8,1511601895),(10857,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #273',8,1511668166,8,1511668166),(10858,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #274',8,1511668173,8,1511668173),(10859,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #275',8,1511668185,8,1511668185),(10860,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #276',8,1511668194,8,1511668194),(10861,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #277',8,1511668209,8,1511668209),(10862,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #278',8,1511668219,8,1511668219),(10863,'SUCCESS','sprinkle_monitoring','INSERTING NEW DATA WITH ID #1',8,1511668265,8,1511668265),(10864,'SUCCESS','sprinkle_monitoring','UPDATING DATA ID #1',8,1511668450,8,1511668450),(10865,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #435',8,1511668450,8,1511668450),(10866,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #436',8,1511668450,8,1511668450),(10867,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #437',8,1511668450,8,1511668450),(10868,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #438',8,1511668450,8,1511668450),(10869,'SUCCESS','sprinkle_monitoring','UPDATING DATA ID #1',8,1511669253,8,1511669253),(10870,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #439',8,1511669253,8,1511669253),(10871,'SUCCESS','sprinkle_monitoring','INSERTING NEW DATA WITH ID #2',8,1511700414,8,1511700414),(10872,'SUCCESS','sprinkle_monitoring_detail','INSERTING NEW DATA WITH ID #1',8,1511701422,8,1511701422),(10873,'SUCCESS','sprinkle_monitoring_detail','DELETING DATA ID #1',8,1511701573,8,1511701573),(10874,'SUCCESS','sprinkle_monitoring_detail','INSERTING NEW DATA WITH ID #2',8,1511701633,8,1511701633),(10875,'SUCCESS','sprinkle_monitoring_detail','DELETING DATA ID #2',8,1511701635,8,1511701635),(10876,'SUCCESS','sprinkle_monitoring_detail','INSERTING NEW DATA WITH ID #3',8,1511701658,8,1511701658),(10877,'SUCCESS','sprinkle_monitoring_detail','DELETING DATA ID #3',8,1511701660,8,1511701660),(10878,'SUCCESS','sprinkle_monitoring_detail','INSERTING NEW DATA WITH ID #4',8,1511701667,8,1511701667),(10879,'SUCCESS','sprinkle_monitoring_detail','INSERTING NEW DATA WITH ID #5',8,1511701899,8,1511701899),(10880,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #279',8,1511747623,8,1511747623),(10881,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #280',8,1511747633,8,1511747633),(10882,'SUCCESS','apd_monitoring','INSERTING NEW DATA WITH ID #1',8,1511747657,8,1511747657),(10883,'SUCCESS','apd_monitoring','INSERTING NEW DATA WITH ID #2',8,1511748434,8,1511748434),(10884,'SUCCESS','p3k_monitoring','INSERTING NEW DATA WITH ID #1',8,1511773953,8,1511773953),(10885,'SUCCESS','p3k_monitoring_detail','INSERTING NEW DATA WITH ID #1',8,1511777113,8,1511777113),(10886,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #1',8,1511777113,8,1511777113),(10887,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #2',8,1511777113,8,1511777113),(10888,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #3',8,1511777113,8,1511777113),(10889,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #4',8,1511777113,8,1511777113),(10890,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #5',8,1511777113,8,1511777113),(10891,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #6',8,1511777113,8,1511777113),(10892,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #7',8,1511777113,8,1511777113),(10893,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #8',8,1511777113,8,1511777113),(10894,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #9',8,1511777113,8,1511777113),(10895,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #10',8,1511777113,8,1511777113),(10896,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #11',8,1511777113,8,1511777113),(10897,'SUCCESS','pmd_month','INSERTING NEW DATA WITH ID #12',8,1511777113,8,1511777113),(10898,'SUCCESS','p2k3_monitoring','INSERTING NEW DATA WITH ID #1',8,1511795703,8,1511795703),(10899,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #281',8,1511796252,8,1511796252),(10900,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #282',8,1511796261,8,1511796261),(10901,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #283',8,1511796268,8,1511796268),(10902,'SUCCESS','p2k3_monitoring_detail','INSERTING NEW DATA WITH ID #1',8,1511796350,8,1511796350),(10903,'SUCCESS','p2k3_monitoring','INSERTING NEW DATA WITH ID #2',8,1511796366,8,1511796366),(10904,'SUCCESS','p2k3_monitoring_detail','INSERTING NEW DATA WITH ID #2',8,1511847205,8,1511847205),(10905,'SUCCESS','p2k3_monitoring_detail','INSERTING NEW DATA WITH ID #3',8,1511847392,8,1511847392),(10906,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #284',8,1511875904,8,1511875904),(10907,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #285',8,1511875914,8,1511875914),(10908,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #286',8,1511875926,8,1511875926),(10909,'SUCCESS','working_hour_monitoring','INSERTING NEW DATA WITH ID #1',8,1511877010,8,1511877010),(10910,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #1',8,1511877010,8,1511877010),(10911,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #2',8,1511877010,8,1511877010),(10912,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #3',8,1511877010,8,1511877010),(10913,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #4',8,1511877010,8,1511877010),(10914,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #5',8,1511877010,8,1511877010),(10915,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #6',8,1511877010,8,1511877010),(10916,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #7',8,1511877010,8,1511877010),(10917,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #8',8,1511877010,8,1511877010),(10918,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #9',8,1511877010,8,1511877010),(10919,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #10',8,1511877010,8,1511877010),(10920,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #11',8,1511877010,8,1511877010),(10921,'SUCCESS','whm_month','INSERTING NEW DATA WITH ID #12',8,1511877010,8,1511877010),(10922,'SUCCESS','working_hour_monitoring','UPDATING DATA ID #1',8,1511877037,8,1511877037),(10923,'SUCCESS','working_hour_monitoring','UPDATING DATA ID #1',8,1511877048,8,1511877048),(10924,'SUCCESS','working_hour_monitoring','UPDATING DATA ID #1',8,1511877082,8,1511877082),(10925,'SUCCESS','working_hour_monitoring','UPDATING DATA ID #1',8,1511877111,8,1511877111),(10926,'SUCCESS','whm_month','UPDATING DATA ID #1',8,1511877111,8,1511877111),(10927,'SUCCESS','whm_month','UPDATING DATA ID #2',8,1511877111,8,1511877111),(10928,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #440',8,1511877111,8,1511877111),(10929,'SUCCESS','whm_month','UPDATING DATA ID #3',8,1511877111,8,1511877111),(10930,'SUCCESS','whm_month','UPDATING DATA ID #4',8,1511877111,8,1511877111),(10931,'SUCCESS','whm_month','UPDATING DATA ID #5',8,1511877111,8,1511877111),(10932,'SUCCESS','whm_month','UPDATING DATA ID #6',8,1511877111,8,1511877111),(10933,'SUCCESS','whm_month','UPDATING DATA ID #7',8,1511877111,8,1511877111),(10934,'SUCCESS','whm_month','UPDATING DATA ID #8',8,1511877111,8,1511877111),(10935,'SUCCESS','whm_month','UPDATING DATA ID #9',8,1511877111,8,1511877111),(10936,'SUCCESS','whm_month','UPDATING DATA ID #10',8,1511877111,8,1511877111),(10937,'SUCCESS','whm_month','UPDATING DATA ID #11',8,1511877111,8,1511877111),(10938,'SUCCESS','whm_month','UPDATING DATA ID #12',8,1511877111,8,1511877111),(10939,'SUCCESS','work_accident','INSERTING NEW DATA WITH ID #1',8,1511926720,8,1511926720),(10940,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #287',8,1511927397,8,1511927397),(10941,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #288',8,1511927406,8,1511927406),(10942,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #289',8,1511927415,8,1511927415),(10943,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #290',8,1511927424,8,1511927424),(10944,'SUCCESS','work_accident_detail','INSERTING NEW DATA WITH ID #1',8,1511927982,8,1511927982),(10945,'SUCCESS','work_accident_detail','UPDATING DATA ID #1',8,1511928066,8,1511928066),(10946,'SUCCESS','work_accident_detail','UPDATING DATA ID #1',8,1511928224,8,1511928224),(10947,'SUCCESS','work_accident','INSERTING NEW DATA WITH ID #2',8,1511928267,8,1511928267),(10948,'SUCCESS','work_accident_detail','INSERTING NEW DATA WITH ID #2',8,1511948424,8,1511948424),(10949,'SUCCESS','hydrant_testing','INSERTING NEW DATA WITH ID #1',8,1511956178,8,1511956178),(10950,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #291',8,1511957101,8,1511957101),(10951,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #292',8,1511957110,8,1511957110),(10952,'SUCCESS','hydrant_testing_detail','INSERTING NEW DATA WITH ID #1',8,1511958378,8,1511958378),(10953,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #1',8,1511958378,8,1511958378),(10954,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #2',8,1511958378,8,1511958378),(10955,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #3',8,1511958378,8,1511958378),(10956,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #4',8,1511958378,8,1511958378),(10957,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #5',8,1511958378,8,1511958378),(10958,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #6',8,1511958378,8,1511958378),(10959,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #7',8,1511958378,8,1511958378),(10960,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #8',8,1511958378,8,1511958378),(10961,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #9',8,1511958378,8,1511958378),(10962,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #10',8,1511958378,8,1511958378),(10963,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #11',8,1511958378,8,1511958378),(10964,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #12',8,1511958378,8,1511958378),(10965,'SUCCESS','hydrant_testing_detail','INSERTING NEW DATA WITH ID #2',8,1512020900,8,1512020900),(10966,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #13',8,1512020900,8,1512020900),(10967,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #14',8,1512020900,8,1512020900),(10968,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #15',8,1512020900,8,1512020900),(10969,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #16',8,1512020901,8,1512020901),(10970,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #17',8,1512020901,8,1512020901),(10971,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #18',8,1512020901,8,1512020901),(10972,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #19',8,1512020901,8,1512020901),(10973,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #20',8,1512020901,8,1512020901),(10974,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #21',8,1512020901,8,1512020901),(10975,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #22',8,1512020901,8,1512020901),(10976,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #23',8,1512020901,8,1512020901),(10977,'SUCCESS','htd_month','INSERTING NEW DATA WITH ID #24',8,1512020901,8,1512020901);

/*Table structure for table `log_dirty` */

DROP TABLE IF EXISTS `log_dirty`;

CREATE TABLE `log_dirty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `controller` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `label` varchar(255) NOT NULL,
  `original_value` varchar(255) NOT NULL,
  `changed_value` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=latin1;

/*Data for the table `log_dirty` */

insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'sector','Sector','Nama','Pekanbaru','Pekanbaru1',8,1479442515,8,1479442515),(2,1,'sector','Sector','Nama','Pekanbaru1','Pekanbaru',8,1479442528,8,1479442528),(3,1,'power-plant','PowerPlant','Sektor','4','8',8,1479444562,8,1479444562),(4,1,'power-plant','PowerPlant','Sektor','8','4',8,1479444587,8,1479444587),(5,1,'user-profile','Employee','Alamat','Lorong Jengkol. Talang Banjar.','Lorong Jengkol. Talang Banjar. Edit',8,1480133279,8,1480133279),(6,1,'user-profile','Employee','Alamat','Lorong Jengkol. Talang Banjar. Edit','Lorong Jengkol. Talang Banjar.',8,1480133297,8,1480133297),(7,6,'user-profile','Employee','Nama','Joko Test','Joko Test Edit',12,1480133428,12,1480133428),(8,6,'user-profile','Employee','Nama','Joko Test Edit','Joko Test',12,1480133435,12,1480133435),(9,1,'roadmap-k3l','RoadmapK3l','Pembangkit Listrik','2','1',8,1483676974,8,1483676974),(11,1,'roadmap-k3l','RoadmapK3l','Pembangkit Listrik','1','3',8,1483694441,8,1483694441),(12,1,'roadmap-k3l','RoadmapK3lTarget','Nilai','50%','51%',8,1483694734,8,1483694734),(13,2,'roadmap-k3l','RoadmapK3lTarget','Nilai','100%','99%',8,1483694734,8,1483694734),(14,1,'roadmap-k3l','RoadmapK3l','Pembangkit Listrik','3','2',8,1483694887,8,1483694887),(18,1,'working-plan','WorkingPlanDetail','R / NR','NR','R',8,1485315493,8,1485315493),(19,4,'smk3-title','Smk3Title','Judul SMK3','awda','awdas',8,1486400612,8,1486400612),(20,5,'smk3-title','Smk3Title','Judul SMK3','Judul','Pembangunan dan Pemeliharaan Komitmen',8,1486401422,8,1486401422),(21,3,'smk3-title','Smk3Subtitle','Sub-Judul SMK3','awda','Kebijakan',8,1486401422,8,1486401422),(22,4,'smk3-title','Smk3Criteria','Kriteria','awda','Terdapat kebijakan K3 yang tertulis, bertanggal, ditandatangan oleh pengusaha atau pengurus secara jelas menyatakan tujuan dan sasaran K3 serta komitmen terhadap peningkatan K3',8,1486401422,8,1486401422),(23,5,'smk3-title','Smk3Criteria','Kriteria','aawdawd','Kebijakan disusun oleh pengusaha dan atau pengurus setelah melalui proses konsultasi dengan wakil tenaga kerja.',8,1486402988,8,1486402988),(24,6,'smk3-title','Smk3Criteria','Kriteria','adwadadawda','Perusahaan mengkomunikasikan kebijakan K3\r\nkepada seluruh tenaga kerja, tamu, kontraktor, pelanggan dan pemasok dengan tata cara yang tepat.',8,1486402988,8,1486402988),(25,4,'smk3-title','Smk3Subtitle','Sub-Judul SMK3','adwwadasd','Tanggung Jawab & Wewenang untuk Bertindak',8,1486402988,8,1486402988),(26,7,'smk3-title','Smk3Criteria','Kriteria','asdsadwad','Tanggung jawab dan wewenang untuk mengambil tindakan dan melaporkan kepada semua pihak yang terkait dalam perusahaan di bidang K3 yang telah ditetapkan, diinformasikan dan didokumentasikan.',8,1486402988,8,1486402988),(27,8,'smk3-title','Smk3Criteria','Kriteria','asdasd','Penunjukan penanggung jawab K3 harus sesuai peraturan perundang-undangan.',8,1486402988,8,1486402988),(28,13,'smk3-title','Smk3Criteria','Kriteria','Kebijakan khusus dibuat untuk masalah K3 yang bersifat khusus.','Pimpinan unit kerja dalam suatu perusahaan bertanggung jawab atas kinerja K3 pada unit kerjanya.',8,1486409906,8,1486409906),(29,14,'smk3-title','Smk3Criteria','Kriteria','Kebijakan K3 dan kebijakan khusus lainnya ditinjau ulang secara berkala untuk menjamin bahwa kebijakan tersebut sesuai dengan perubahan yang terjadi dalam perusahaan dan dalam peraturan per undang-undangan','Pengusaha atau pengurus bertanggung jawab secara penuh untuk menjamin pelaksanaan SMK3.',8,1486409906,8,1486409906),(30,5,'smk3-title','Smk3Subtitle','Sub-Judul SMK3','asdadasd','Tinjauan dan Evaluasi',8,1486409906,8,1486409906),(31,9,'smk3-title','Smk3Criteria','Kriteria','azcxzczxvzxv','Tinjauan terhadap penerapan SMK3 meliputi kebijakan, perencanaan, pelaksanaan, pemantauan\r\ndan evaluasi telah dilakukan, dicatat dan\r\ndidokumentasikan.',8,1486409906,8,1486409906),(32,10,'smk3-title','Smk3Criteria','Kriteria','zxvxzv','Hasil tinjauan ulang dimasukkan dalam perencanaan tindakan manajemen.',8,1486409906,8,1486409906),(33,11,'smk3-title','Smk3Criteria','Kriteria','zxvzxv','Keterlibatan tenaga kerja dan penjadwalan konsultasi tenaga kerja dengan wakil perusahaan didokumentasikan dan disebarluaskan ke seluruh tenaga kerja.',8,1486409906,8,1486409906),(34,12,'smk3-title','Smk3Criteria','Kriteria','zxvxzvzx','Pengurus harus meninjau ulang pelaksanaan SMK3 secara berkala untuk menilai kesesuaian dan efektivitas SMK3.',8,1486409906,8,1486409906),(35,169,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273),(36,170,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273),(37,171,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273),(38,172,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273),(39,189,'smk3','Smk3Detail','Jawaban','0','1',8,1486545296,8,1486545296),(40,190,'smk3','Smk3Detail','Jawaban','0','1',8,1486551854,8,1486551854),(41,4,'smk3-title','Smk3Criteria','Kriteria','Terdapat kebijakan K3 yang tertulis, bertanggal, ditandatangan oleh pengusaha atau pengurus secara jelas menyatakan tujuan dan sasaran K3 serta komitmen terhadap peningkatan K3','<strong></strong><p>Terdapat kebijakan K3 yang tertulis, bertanggal, ditandatangan oleh pengusaha atau pengurus secara jelas menyatakan tujuan dan sasaran K3 serta komitmen terhadap peningkatan </p>',8,1486564003,8,1486564003),(42,5,'smk3-title','Smk3Criteria','Kriteria','Kebijakan disusun oleh pengusaha dan atau pengurus setelah melalui proses konsultasi dengan wakil tenaga kerja.','<p>Kebijakan disusun oleh pengusaha dan atau pengurus setelah melalui proses konsultasi dengan wakil tenaga kerja.</p>',8,1486564003,8,1486564003),(43,6,'smk3-title','Smk3Criteria','Kriteria','Perusahaan mengkomunikasikan kebijakan K3\r\nkepada seluruh tenaga kerja, tamu, kontraktor, pelanggan dan pemasok dengan tata cara yang tepat.','<p>Perusahaan mengkomunikasikan kebijakan K3</p><p>kepada seluruh tenaga kerja, tamu, kontraktor, pelanggan dan pemasok dengan tata cara yang tepat.</p>',8,1486564003,8,1486564003),(44,20,'smk3-title','Smk3Criteria','Kriteria','awd','<p>awd</p>',8,1486564003,8,1486564003),(45,7,'smk3-title','Smk3Criteria','Kriteria','Tanggung jawab dan wewenang untuk mengambil tindakan dan melaporkan kepada semua pihak yang terkait dalam perusahaan di bidang K3 yang telah ditetapkan, diinformasikan dan didokumentasikan.','<p>Tanggung jawab dan wewenang untuk mengambil tindakan dan melaporkan kepada semua pihak yang terkait dalam perusahaan di bidang K3 yang telah ditetapkan, diinformasikan dan didokumentasikan.</p>',8,1486564003,8,1486564003),(46,8,'smk3-title','Smk3Criteria','Kriteria','Penunjukan penanggung jawab K3 harus sesuai peraturan perundang-undangan.','<p>Penunjukan penanggung jawab K3 harus sesuai peraturan perundang-undangan.</p>',8,1486564003,8,1486564003),(47,13,'smk3-title','Smk3Criteria','Kriteria','Pimpinan unit kerja dalam suatu perusahaan bertanggung jawab atas kinerja K3 pada unit kerjanya.','<p>Pimpinan unit kerja dalam suatu perusahaan bertanggung jawab atas kinerja K3 pada unit kerjanya.</p>',8,1486564003,8,1486564003),(48,14,'smk3-title','Smk3Criteria','Kriteria','Pengusaha atau pengurus bertanggung jawab secara penuh untuk menjamin pelaksanaan SMK3.','<p>Pengusaha atau pengurus bertanggung jawab secara penuh untuk menjamin pelaksanaan SMK3.</p>',8,1486564004,8,1486564004),(49,15,'smk3-title','Smk3Criteria','Kriteria','Kebijakan khusus dibuat untuk masalah K3 yang bersifat khusus.','<p>Kebijakan khusus dibuat untuk masalah K3 yang bersifat khusus.</p>',8,1486564004,8,1486564004),(50,16,'smk3-title','Smk3Criteria','Kriteria','Kebijakan K3 dan kebijakan khusus lainnya ditinjau ulang secara berkala untuk menjamin bahwa kebijakan tersebut sesuai dengan perubahan yang terjadi dalam perusahaan dan dalam peraturan per undang-undangan','<p>Kebijakan K3 dan kebijakan khusus lainnya ditinjau ulang secara berkala untuk menjamin bahwa kebijakan tersebut sesuai dengan perubahan yang terjadi dalam perusahaan dan dalam peraturan per undang-undangan</p>',8,1486564004,8,1486564004),(51,9,'smk3-title','Smk3Criteria','Kriteria','Tinjauan terhadap penerapan SMK3 meliputi kebijakan, perencanaan, pelaksanaan, pemantauan\r\ndan evaluasi telah dilakukan, dicatat dan\r\ndidokumentasikan.','<p>Tinjauan terhadap penerapan SMK3 meliputi kebijakan, perencanaan, pelaksanaan, pemantauan</p><p>dan evaluasi telah dilakukan, dicatat dan</p><p>didokumentasikan.</p>',8,1486564004,8,1486564004),(52,10,'smk3-title','Smk3Criteria','Kriteria','Hasil tinjauan ulang dimasukkan dalam perencanaan tindakan manajemen.','<p>Hasil tinjauan ulang dimasukkan dalam perencanaan tindakan manajemen.</p>',8,1486564004,8,1486564004),(53,11,'smk3-title','Smk3Criteria','Kriteria','Keterlibatan tenaga kerja dan penjadwalan konsultasi tenaga kerja dengan wakil perusahaan didokumentasikan dan disebarluaskan ke seluruh tenaga kerja.','<p>Keterlibatan tenaga kerja dan penjadwalan konsultasi tenaga kerja dengan wakil perusahaan didokumentasikan dan disebarluaskan ke seluruh tenaga kerja.</p>',8,1486564004,8,1486564004),(54,12,'smk3-title','Smk3Criteria','Kriteria','Pengurus harus meninjau ulang pelaksanaan SMK3 secara berkala untuk menilai kesesuaian dan efektivitas SMK3.','<p>Pengurus harus meninjau ulang pelaksanaan SMK3 secara berkala untuk menilai kesesuaian dan efektivitas SMK3.</p>',8,1486564004,8,1486564004),(55,17,'smk3-title','Smk3Criteria','Kriteria','Petugas yang bertanggung jawab untuk menangani keadaan darurat telah ditetapkan dan mendapatkan pelatihan.','<p>Petugas yang bertanggung jawab untuk menangani keadaan darurat telah ditetapkan dan mendapatkan pelatihan.</p>',8,1486564004,8,1486564004),(56,18,'smk3-title','Smk3Criteria','Kriteria','Perusahaan mendapatkan saran-saran dari para ahli di bidang K3 yang berasal dari dalam dan/atau luar perusahaan.','<p>Perusahaan mendapatkan saran-saran dari para ahli di bidang K3 yang berasal dari dalam dan/atau luar perusahaan.</p>',8,1486564004,8,1486564004),(57,19,'smk3-title','Smk3Criteria','Kriteria','Kinerja K3 termuat dalam laporan tahunan perusahaan atau laporan lain yang setingkat.','<strong></strong><p>Kinerja K3 termuat dalam laporan tahunan perusahaan atau laporan lain yang setingkat.<strong>asdasdawd</strong></p>',8,1486564004,8,1486564004),(58,21,'smk3-title','Smk3Criteria','Kriteria','test','testatat',8,1486564491,8,1486564491),(63,22,'smk3-title','Smk3Criteria','Kriteria','test','testaadasdaw',8,1486565232,8,1486565232),(64,5,'smk3','Smk3','Triwulan','6','IV',8,1486636814,8,1486636814),(65,6,'smk3','Smk3','Triwulan','1','V',8,1486636827,8,1486636827),(66,10,'environment-permit','EnvironmentPermitDetail','Tanggal','2017-02-01','2017-02-21',8,1486840181,8,1486840181),(67,1,'environment-permit','EnvironmentPermitDetail','Batasan Kapasitas','123123','12312332',8,1487061634,8,1487061634),(68,1,'ppu-emission-source','PpuEmissionSource','Lokasi','PLTU TARAHAN','PLTU TARAHAN 2',8,1487419278,8,1487419278),(69,1,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','999.99','4884.98',8,1487430511,8,1487430511),(70,1,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Ppucmesm Operation Time','5153.00','5153.500',8,1487560583,8,1487560583),(71,2,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Nama Sumber Emisi','awdad','Boiler Unit 3',8,1487586573,8,1487586573),(72,2,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Kode Cerobong','adwd','CEROBONG 3',8,1487586573,8,1487586573),(73,2,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Waktu Operasi (Jam/Tahun)','1231.00','4884.98',8,1487586573,8,1487586573),(74,1,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','5153.50','729.283',8,1487586573,8,1487586573),(75,2,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','13.00','644.033',8,1487586573,8,1487586573),(76,3,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','135.00','720',8,1487586573,8,1487586573),(77,4,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','13.00','645.25',8,1487586573,8,1487586573),(78,5,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','135.00','521.55',8,1487586573,8,1487586573),(79,6,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','135.00','453.03333',8,1487586573,8,1487586573),(80,7,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','135.00','744.000',8,1487586573,8,1487586573),(81,8,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','135.00','193.3333333',8,1487586573,8,1487586573),(82,9,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','135.00','234.5',8,1487586573,8,1487586573),(83,10,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','153.00','1',8,1487586573,8,1487586573),(84,11,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','13.00','1',8,1487586573,8,1487586573),(85,12,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Waktu Operasi','531.00','1',8,1487586573,8,1487586573),(86,2,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Frekuensi Kewajiban Pemantauan','FMOC1','PAFMOC1',8,1487677825,8,1487677825),(87,1,'ppu-parameter-obligation','PpuParameterObligation','Baku Mutu','850.00','8500',8,1487746257,8,1487746257),(88,1,'ppu-parameter-obligation','PpuParameterObligation','Baku Mutu','999.99','850',8,1487746279,8,1487746279),(89,1,'ppu-emission-load-grk','PpuEmissionLoadGrkCalc','Pemakaian Batubara','293.316','293.317',8,1487746462,8,1487746462),(90,1,'ppu-emission-load-grk','PpuEmissionLoadGrk','Parameter','CO2','CO23',8,1487746612,8,1487746612),(91,1,'ppu-emission-load-grk','PpuEmissionLoadGrkCalc','Pemakaian Batubara','293.317','293.316',8,1487748744,8,1487748744),(92,1,'ppu-emission-load-grk','PpuEmissionLoadGrk','Parameter','CO23','CO2',8,1487748758,8,1487748758),(93,1,'ppu-parameter-obligation','PpuParameterObligation','Baku Mutu','850.00','85',8,1487791045,8,1487791045),(94,1,'ppu-parameter-obligation','PpupoMonth','Nilai','113.00','113.74',8,1487791138,8,1487791138),(95,14,'ppu-parameter-obligation','PpupoMonth','Nilai','19.23','19.32',8,1487791173,8,1487791173),(96,2,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Waktu Operasi (Jam/Tahun)','4884.98','4884.983333',8,1487791238,8,1487791238),(97,2,'ppu-emission-source','PpuEmissionSource','Nama Sumber Emisi','Boiler Unit 3','Boiler Unit 4',8,1487791794,8,1487791794),(98,1,'ppu','Ppu','Tahun','2014','2016',8,1487792049,8,1487792049),(99,2,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Waktu Operasi (Jam/Tahun)','4884.980000','4884.983333',8,1487841876,8,1487841876),(100,1,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841877,8,1487841877),(101,2,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841877,8,1487841877),(102,3,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841877,8,1487841877),(103,4,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841877,8,1487841877),(104,5,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841877,8,1487841877),(105,6,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841877,8,1487841877),(106,7,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841877,8,1487841877),(107,8,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841877,8,1487841877),(108,9,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841877,8,1487841877),(109,10,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841877,8,1487841877),(110,11,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841877,8,1487841877),(111,12,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841877,8,1487841877),(112,3,'ppu-compulsory-monitored-emission-source','PpuCompulsoryMonitoredEmissionSource','Waktu Operasi (Jam/Tahun)','5413.000000','5412.996667',8,1487841902,8,1487841902),(113,13,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841902,8,1487841902),(114,14,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841902,8,1487841902),(115,15,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841902,8,1487841902),(116,16,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841902,8,1487841902),(117,17,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841902,8,1487841902),(118,18,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2013','2015',8,1487841902,8,1487841902),(119,19,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841902,8,1487841902),(120,20,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841902,8,1487841902),(121,21,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841902,8,1487841902),(122,22,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841903,8,1487841903),(123,23,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841903,8,1487841903),(124,24,'ppu-compulsory-monitored-emission-source','PpucmesMonth','Tahun','2014','2016',8,1487841903,8,1487841903),(125,86,'ppu-parameter-obligation','PpupoMonth','Nilai','178.70','178.75',8,1487842149,8,1487842149),(126,90,'ppu-parameter-obligation','PpupoMonth','Nilai','456.60','456.63',8,1487842150,8,1487842150),(127,93,'ppu-parameter-obligation','PpupoMonth','Nilai','542.39','542.59',8,1487842150,8,1487842150),(128,111,'ppu-parameter-obligation','PpupoMonth','Nilai','11.80','11.89',8,1487842240,8,1487842240),(129,113,'ppu-parameter-obligation','PpupoMonth','Nilai','69.70','69.71',8,1487842240,8,1487842240),(130,10,'ppu-parameter-obligation','PpuParameterObligation','Baku Mutu','850.00','750',8,1487842455,8,1487842455),(131,11,'ppu-parameter-obligation','PpuParameterObligation','Baku Mutu','850.00','750',8,1487842468,8,1487842468),(132,1,'ppucems-report-bm','PpucemsrbQuarter','Nilai','92','91',8,1488443327,8,1488443327),(133,1,'ppucems-report-bm','PpucemsrbQuarter','Nilai','91','92',8,1488443346,8,1488443346),(134,4,'ppucems-report-bm','PpucemsrbQuarter','Nilai Baku Mutu','93','30',8,1488521426,8,1488521426),(135,3,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','5413.00','4884.98',8,1488798713,8,1488798713),(136,73,'ppu-parameter-obligation','PpupoMonth','Nilai','15.26','18.54',8,1488799005,8,1488799005),(137,74,'ppu-parameter-obligation','PpupoMonth','Nilai','19.32','17.55',8,1488799005,8,1488799005),(138,75,'ppu-parameter-obligation','PpupoMonth','Nilai','21.56','6.98',8,1488799005,8,1488799005),(139,76,'ppu-parameter-obligation','PpupoMonth','Nilai','17.15','14.05',8,1488799005,8,1488799005),(140,77,'ppu-parameter-obligation','PpupoMonth','Nilai','17.18','11.41',8,1488799005,8,1488799005),(141,78,'ppu-parameter-obligation','PpupoMonth','Nilai','11.41','10.83',8,1488799005,8,1488799005),(142,79,'ppu-parameter-obligation','PpupoMonth','Nilai','19.21','10.52',8,1488799005,8,1488799005),(143,80,'ppu-parameter-obligation','PpupoMonth','Nilai','20.98','10.52',8,1488799005,8,1488799005),(144,81,'ppu-parameter-obligation','PpupoMonth','Nilai','13.96','15.01',8,1488799005,8,1488799005),(145,97,'ppu-parameter-obligation','PpupoMonth','Nilai','18.54','15.26',8,1488799099,8,1488799099),(146,98,'ppu-parameter-obligation','PpupoMonth','Nilai','17.55','19.32',8,1488799100,8,1488799100),(147,99,'ppu-parameter-obligation','PpupoMonth','Nilai','6.98','21.56',8,1488799100,8,1488799100),(148,100,'ppu-parameter-obligation','PpupoMonth','Nilai','14.05','17.15',8,1488799100,8,1488799100),(149,101,'ppu-parameter-obligation','PpupoMonth','Nilai','11.41','17.18',8,1488799100,8,1488799100),(150,102,'ppu-parameter-obligation','PpupoMonth','Nilai','10.83','11.41',8,1488799100,8,1488799100),(151,103,'ppu-parameter-obligation','PpupoMonth','Nilai','10.52','19.21',8,1488799100,8,1488799100),(152,104,'ppu-parameter-obligation','PpupoMonth','Nilai','10.52','20.98',8,1488799100,8,1488799100),(153,105,'ppu-parameter-obligation','PpupoMonth','Nilai','15.01','13.96',8,1488799100,8,1488799100),(154,61,'ppu-parameter-obligation','PpupoMonth','Nilai','113.74','66.73',8,1488799201,8,1488799201),(155,62,'ppu-parameter-obligation','PpupoMonth','Nilai','279.31','178.75',8,1488799201,8,1488799201),(156,63,'ppu-parameter-obligation','PpupoMonth','Nilai','259.00','195',8,1488799201,8,1488799201),(157,64,'ppu-parameter-obligation','PpupoMonth','Nilai','281.05','258.14',8,1488799201,8,1488799201),(158,65,'ppu-parameter-obligation','PpupoMonth','Nilai','428.09','590.19',8,1488799201,8,1488799201),(159,66,'ppu-parameter-obligation','PpupoMonth','Nilai','453.94','456.63',8,1488799201,8,1488799201),(160,67,'ppu-parameter-obligation','PpupoMonth','Nilai','281.60','401.75',8,1488799201,8,1488799201),(161,68,'ppu-parameter-obligation','PpupoMonth','Nilai','472.88','143.21',8,1488799201,8,1488799201),(162,69,'ppu-parameter-obligation','PpupoMonth','Nilai','408.15','542.59',8,1488799201,8,1488799201),(163,2,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','5413.00','5412.996667',8,1488799302,8,1488799302),(164,2,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','5413.000000','5412.996667',8,1488799340,8,1488799340),(165,29,'ppu-emission-source','PpuesMonth','Waktu Operasi','521.55','521.56',8,1488823209,8,1488823209),(166,29,'ppu-emission-source','PpuesMonth','Waktu Operasi','521.56','521.55',8,1488823217,8,1488823217),(167,181,'ppu-parameter-obligation','PpupoMonth','Nilai','113.70','113.71',8,1488824352,8,1488824352),(168,181,'ppu-parameter-obligation','PpupoMonth','Nilai','113.71','113.70',8,1488824360,8,1488824360),(169,19,'ppu-parameter-obligation','PpuParameterObligation','Satuan Baku Mutu','PRQUC1','PRQUC2',8,1488825157,8,1488825157),(170,5,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','4884.690000','4884.98',8,1488826078,8,1488826078),(171,25,'ppu-emission-source','PpuesMonth','Waktu Operasi','729.000000','729.283',8,1488826078,8,1488826078),(172,26,'ppu-emission-source','PpuesMonth','Waktu Operasi','644.030000','644.033333',8,1488826078,8,1488826078),(173,30,'ppu-emission-source','PpuesMonth','Waktu Operasi','453.030000','453.033333',8,1488826078,8,1488826078),(174,32,'ppu-emission-source','PpuesMonth','Waktu Operasi','193.330000','193.333333',8,1488826078,8,1488826078),(175,5,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','4884.980000','4884.982999',8,1488826210,8,1488826210),(176,5,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','4884.982999','4884.983332',8,1488826272,8,1488826272),(177,25,'ppu-emission-source','PpuesMonth','Waktu Operasi','729.283000','729.283333',8,1488826272,8,1488826272),(178,2,'ppucemsrb-parameter-report','PpucemsrbParameterReport','Tanggal','2015-07-01','2015-08-01',8,1488877035,8,1488877035),(179,2,'ppucemsrb-parameter-report','PpucemsrbParameterReport','Bulan','7','8',8,1488877093,8,1488877093),(180,2,'ppucemsrb-parameter-report','PpucemsrbParameterReport','Bulan','8','7',8,1488878113,8,1488878113),(181,2,'ppucemsrb-parameter-report','PpucemsrbParameterReport','Tanggal','2015-08-01','2015-07-01',8,1488878113,8,1488878113),(182,5,'environment-permit','EnvironmentPermit','Tahun','2014','2015',8,1491822841,8,1491822841),(183,35,'plb3-balance-sheet-detail','Plb3BalanceSheetDetail','Limbah Periode sebelumnya','999999.999999999','1000000',8,1492153238,8,1492153238),(184,889,'plb3-balance-sheet-detail','Plb3bsdMonth','Plb3bsdm Value','99999.99','99',8,1492153931,8,1492153931),(185,889,'plb3-balance-sheet-detail','Plb3bsdMonth','Plb3bsdm Value','99.00','1231299',8,1492153955,8,1492153955),(186,1018,'plb3-balance-sheet-detail','Plb3bsdMonth','Plb3bsdm Value','0.00','400',8,1492286565,8,1492286565),(187,973,'plb3-balance-sheet-detail','Plb3bsdMonth','Plb3bsdm Value','0.00','1230',8,1492286630,8,1492286630),(188,973,'plb3-balance-sheet-detail','Plb3bsdMonth','Plb3bsdm Value','1230.00','0',8,1492410673,8,1492410673),(189,1018,'plb3-balance-sheet-detail','Plb3bsdMonth','Plb3bsdm Value','400.00','0',8,1492410673,8,1492410673),(190,10,'plb3-question','Plb3Question','Kategori','PQTCP11','PQTCP12',8,1492596398,8,1492596398),(191,1,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492599291,8,1492599291),(192,13,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492600290,8,1492600290),(193,9,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492600305,8,1492600305),(194,11,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492600305,8,1492600305),(195,8,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492609475,8,1492609475),(196,12,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492609591,8,1492609591),(197,12,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','1','0',8,1492609687,8,1492609687),(198,24,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492609877,8,1492609877),(199,26,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492609911,8,1492609911),(200,24,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','1','0',8,1492609911,8,1492609911),(201,24,'plb3-question','Plb3Question','Kategori','PQTCP11','PQTCP12',8,1492620062,8,1492620062),(202,36,'plb3-question','Plb3Question','Kategori','PQTCP23','PQTCP24',8,1492620976,8,1492620976),(203,37,'plb3-question','Plb3Question','Kategori','PQTCP23','PQTCP24',8,1492620987,8,1492620987),(204,29,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','1','0',8,1492625954,8,1492625954),(205,52,'plb3-checklist-detail','Plb3ChecklistAnswer','Jawaban','0','1',8,1492677200,8,1492677200),(206,7,'roadmap-k3l','RoadmapK3lItem','When','2017-04-12','2017-04-13',8,1492857202,8,1492857202),(207,5,'sector','Sector','Nama','Bandar Lampung','Sektor Bandar Lampung',8,1492871279,8,1492871279),(208,8,'sector','Sector','Nama','Bukit Asam','Sektor Bukit Asam',8,1492871289,8,1492871289),(209,7,'sector','Sector','Nama','Bengkulu','Sektor Bengkulu',8,1492871346,8,1492871346),(210,6,'sector','Sector','Nama','Bukit Tinggi','Sektor Bukit Tinggi',8,1492871353,8,1492871353),(211,4,'sector','Sector','Nama','Jambi','Sektor Jambi',8,1492871359,8,1492871359),(212,2,'sector','Sector','Nama','Keramasan','Sektor Keramasan',8,1492871365,8,1492871365),(213,3,'sector','Sector','Nama','Medan','Sektor Medan',8,1492871370,8,1492871370),(214,1,'sector','Sector','Nama','Pekanbaru','Sektor Pekanbaru',8,1492871377,8,1492871377),(215,9,'sector','Sector','Nama','Tarahan','Sektor Tarahan',8,1492871384,8,1492871384),(216,414,'smk3','Smk3Detail','Jawaban','0','1',8,1492884852,8,1492884852),(217,415,'smk3','Smk3Detail','Jawaban','0','2',8,1492884852,8,1492884852),(218,421,'smk3','Smk3Detail','Jawaban','0','1',8,1492884852,8,1492884852),(219,422,'smk3','Smk3Detail','Jawaban','0','2',8,1492884852,8,1492884852),(220,1,'skko','SkkoDetail','Tanggal','2017-04-28','2017-04-17',8,1493027626,8,1493027626),(221,12,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>123213</p>','<p>12321312321</p>',8,1494381615,8,1494381615),(222,14,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<strong></strong><p><strong></strong><strong>1. </strong><strong>Profil Perusahaan</strong></p>','<p><strong></strong></p><p><strong></strong><strong>1. </strong><strong>Profil Perusahaan</strong></p>',8,1494381755,8,1494381755),(223,14,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.50','1.50',8,1494381755,8,1494381755),(224,14,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','1.50','0.50',8,1494381849,8,1494381849),(225,5,'bo-assessment-aspect','BoAssessmentAspect','Aspek Penilaian','<p>PENDAHULUAN</p>','<p>PENDAHULUANa</p>',8,1494384083,8,1494384083),(226,16,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<strong></strong><p><strong>1. Profil Perusahaan</strong></p>','<p><strong></strong></p><p><strong>1. Profil Perusahaan</strong></p>',8,1494384083,8,1494384083),(227,5,'bo-assessment-aspect','BoAssessmentAspect','Aspek Penilaian','<p>PENDAHULUANa</p>','<p>PENDAHULUAN</p>',8,1494384094,8,1494384094),(228,1,'beyond-obedience','BeyondObedience','Tahun','12312','112312',8,1494384221,8,1494384221),(229,1,'beyond-obedience','BoAssessment','Nilai Kriteria','99.99','79.99',8,1494384221,8,1494384221),(230,1,'beyond-obedience','BoAssessment','Keterangan','123','1231',8,1494384221,8,1494384221),(231,2,'beyond-obedience','BoAssessment','Nilai Kriteria','99.99','89.99',8,1494384221,8,1494384221),(232,2,'beyond-obedience','BoAssessment','Keterangan','123','1231',8,1494384221,8,1494384221),(233,4,'beyond-obedience','BoAssessment','Keterangan','123','1231',8,1494385815,8,1494385815),(234,33,'beyond-obedience','BoAssessment','Nilai Kriteria','2.00','23.00',8,1494519003,8,1494519003),(235,33,'beyond-obedience','BoAssessment','Nilai Kriteria','23.00','223',8,1494520773,8,1494520773),(236,32,'beyond-obedience','BoAssessment','Nilai Kriteria','1.00','1.12',8,1494520844,8,1494520844),(237,17,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.50','123',8,1494521378,8,1494521378),(238,26,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>123</p>','<p>1234</p>',8,1494522451,8,1494522451),(239,29,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','a.Memiliki manager energi yang mempunyai tugas dan tanggung jawab untuk melaksanakan management energi. ','<p>a.Memiliki manager energi yang mempunyai tugas dan tanggung jawab untuk melaksanakan management energi.</p>',8,1494672316,8,1494672316),(240,29,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.00','2.00',8,1494672316,8,1494672316),(241,30,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.00','2.00',8,1494672316,8,1494672316),(242,28,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.00','2.00',8,1494672342,8,1494672342),(243,37,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p> b. Menyediakan sumber daya yang memadai untuk melaksanakan pengurangan pencemar udara : </p>','<p> b. Menyediakan sumber daya yang memadai untuk melaksanakan pengurangan pencemar udara : <br>i) Manusia (personil memiliki latar belakang pendidikan dan pelatihan yang relevan dengan pelaksanaan pengurangan pencemar udara). </p>',8,1494673033,8,1494673033),(244,50,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<strong></strong><p><strong></strong></p><p><strong>2. Pemenuhan Peraturan <br></strong></p><p>a. Perusahaan telah menggunakan peraturan terbaru untuk mengukur ketaatannya dalam: </p><p> a) Pengendalian pencemaran air </p><p><strong></strong></p>','<p><strong></strong></p><p><strong></strong></p><p><strong>2. Pemenuhan Peraturan <br></strong></p><p>a. Perusahaan telah menggunakan peraturan terbaru untuk mengukur ketaatannya dalam: </p><p> a) Pengendalian pencemaran air </p><p><strong></strong></p>',8,1494674091,8,1494674091),(245,55,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>a) Perusahaan telah menetapkan tujuan dan sasaran lingkungan secara kualitatif terhadap aspek-aspek lingkungan utama sebagaimana tercantum dalam angka a. 2).</p>','<p><strong>3. Tujuan dan sasaran </strong><br></p><p>a) Perusahaan telah menetapkan tujuan dan sasaran lingkungan secara kualitatif terhadap aspek-aspek lingkungan utama sebagaimana tercantum dalam angka a. 2).</p>',8,1494674091,8,1494674091),(246,22,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>c. Pemakaian energi untuk fasilitas pendukung yang tidak berkaitan dengan proses produksi dan jasa yang dihasilkan</p>','<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>',8,1494918013,8,1494918013),(247,23,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>d. Rasio hasil efisiensi energi yang dilaporkan dalam Proper dengan total pemakaian energi</p>','<p>iii. Perubahan sistem melakukan redesain keseluruhan sistem sehingga dampak terhadap ekosistem dapat dihilangkan atau dikurangi</p>',8,1494918013,8,1494918013),(248,24,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','6.00','0.5',8,1494918013,8,1494918013),(249,11,'beyond-obedience','BeyondObedience','Tahun','1234','2017',8,1494942917,8,1494942917),(250,178,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>ii. Perubahan subsistem memberikan kontribusi perbaikan kinerja dari subsistem untuk mengurangi dampak negatif terhadap lingkungan, misalnya penerapan eco-efisiensi dan optimasi dar suatu subsistem</p>','<p>ii. Penerimaan menyebabkan perubahan perilaku, praktek dan proses, di pengguna</p>',8,1494944643,8,1494944643),(251,179,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.50','1.5',8,1494944643,8,1494944643),(252,32,'beyond-obedience','BoAssessment','Nilai Kriteria','1.12','0.50',8,1494947036,8,1494947036),(253,102,'beyond-obedience','BoAssessment','Nilai Kriteria','0.00','0.50',8,1494947036,8,1494947036),(254,34,'beyond-obedience','BoAssessment','Nilai Kriteria','3.00','0.50',8,1494947036,8,1494947036),(255,35,'beyond-obedience','BoAssessment','Nilai Kriteria','4.00','0.50',8,1494947036,8,1494947036),(256,36,'beyond-obedience','BoAssessment','Nilai Kriteria','5.00','0.50',8,1494947036,8,1494947036),(257,120,'beyond-obedience','BoAssessment','Nilai Kriteria','0.00','0.50',8,1494947036,8,1494947036),(258,121,'beyond-obedience','BoAssessment','Nilai Kriteria','0.00','0.50',8,1494947036,8,1494947036),(259,122,'beyond-obedience','BoAssessment','Nilai Kriteria','0.00','0.50',8,1494947036,8,1494947036),(260,12,'beyond-obedience','BeyondObedience','Tahun','1234','2017',8,1494951127,8,1494951127),(261,267,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','1.00','0.5',8,1494957816,8,1494957816),(262,268,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>b) Deskripsi metode yang digunakan untuk menghitung beban emisi: </p><p><br><br>i) Bahan pencemar udara konvensional.</p>','<p>ii) Gas Rumah Kaca </p>',8,1494957816,8,1494957816),(263,269,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>ii) Gas Rumah Kaca. </p>','<p>f) Penghitungan beban emisi dari seluruh sumber emisi yang berada dalam area kewenangan kegiatannya: </p><p><br><br>i) Bahan pencemar udara konvensional. </p>',8,1494957816,8,1494957816),(264,270,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<p>c) Pencatatan dan uraian data aktifitas, faktor emisi, faktor oksidasi dan konversi dari masing-masing sumber emisi yang dihitung beban emisinya: </p><p><br><br>i) Bahan pencemar udara konvensional. </p>','<p>ii) Gas Rumah Kaca </p>',8,1494957816,8,1494957816),(265,270,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','1.00','0.5',8,1494957816,8,1494957816),(266,272,'bo-assessment-aspect','BoasCriteria','Nilai Kriteria','0.50','1',8,1494957816,8,1494957816),(267,457,'bo-assessment-aspect','BoasCriteria','Deskripsi Kriteria','<strong></strong><p><strong></strong></p><p><strong>a. Terdapat struktur yang secara tertulis memiliki tugas dan fungsi khusus untuk melaksanakan Pengembangan Masyarakat (CD) </strong></p>','<p><strong></strong></p><p><strong></strong></p><p><strong></strong>a. Terdapat struktur yang secara tertulis memiliki tugas dan fungsi khusus untuk melaksanakan Pengembangan Masyarakat (CD) <strong></strong></p>',8,1495003694,8,1495003694),(268,4,'power-plant','PowerPlant','Nama','PLTU Pembangkit 1','Kantor Sektor',8,1495616676,8,1495616676),(269,1,'power-plant','PowerPlant','Nama','PLTG Batanghari 1','Kantor Sektor',8,1495616793,8,1495616793),(270,2,'power-plant','PowerPlant','Nama','PLTG Batanghari 2','PLTG Batanghari',8,1495616811,8,1495616811),(271,3,'power-plant','PowerPlant','Nama','PLTG Payo Selincah','PLTMG Sei Gelam',8,1495616832,8,1495616832),(272,5,'power-plant','PowerPlant','Nama','PLTG Pembangkit 1','Kantor Sektor',8,1495617078,8,1495617078),(273,3,'roadmap-k3l','RoadmapK3l','Tahun','1234','2016',8,1496250618,8,1496250618),(274,4,'beyond-obedience-program','BeyondObedienceProgram','Tahun','2017','2016',8,1496551446,8,1496551446),(275,4,'beyond-obedience-program','BeyondObedienceProgram','Produksi','1234','100000',8,1496551446,8,1496551446),(276,7,'beyond-obedience-program','BopDetail','Program','123','1234',8,1496551446,8,1496551446),(277,7,'beyond-obedience-program','BopDetail','Hasil','123','1423',8,1496551446,8,1496551446),(278,4,'beyond-obedience-program','BeyondObedienceProgram','Produksi','100000','1000001',8,1496552689,8,1496552689),(279,7,'beyond-obedience-program','BopDetail','Program','1234','12345',8,1496552689,8,1496552689),(280,7,'beyond-obedience-program','BopDetail','Hasil','1423','14123',8,1496552689,8,1496552689),(281,1,'beyond-obedience-comdev','BocDetail','Kebelangsungan Usaha','123','1234',8,1496638656,8,1496638656),(282,3,'slo-generator','SloGenerator','Terbit','2017-06-05','2017-06-07',8,1496741581,8,1496741581),(283,2,'emergency-response','EmergencyResponse','Bagian / Tim','1a','1a13',8,1496853817,8,1496853817),(284,3,'slo-generator','SloGenerator','Tahun Operasi','0','1983',8,1496992978,8,1496992978),(285,3,'slo-generator','SloGenerator','Tahun','1983','2017',8,1496992978,8,1496992978),(286,1,'slo-tools','SloTools','Tahun','21321','12321321',8,1496997252,8,1496997252),(287,1,'slo-tools','SloTools','Unit Pembangkit','123','12345',8,1496997252,8,1496997252),(288,1,'slo-tools','SloTools','Lokasi (Kota / Kabupaten)','123','123123',8,1496997252,8,1496997252),(289,1,'slo-tools','SloTools','Status Pembangkit','SGC1','SGC2',8,1496997252,8,1496997252),(290,1,'slo-tools','SloTools','Kategori Peralatan','SCC1','SCC2',8,1496997252,8,1496997252),(291,1,'slo-tools','SloTools','Jenis Peralatan','123','123123',8,1496997252,8,1496997252),(292,1,'slo-tools','SloTools','Lokasi','13','13123',8,1496997252,8,1496997252),(293,1,'slo-tools','SloTools','Nomor Pengesahan','123','123123',8,1496997252,8,1496997252),(294,1,'slo-tools','SloTools','Terbit','2017-05-29','2017-12-07',8,1496997252,8,1496997252),(295,1,'slo-tools','SloTools','Riksa Uji 1','2017-06-20','2017-06-27',8,1496997252,8,1496997252),(296,1,'slo-tools','SloTools','Riksa Uji 2','2017-06-12','2017-06-27',8,1496997252,8,1496997252),(297,1,'slo-tools','SloTools','Penerbit Sertifikasi','123','123123',8,1496997252,8,1496997252),(298,1,'slo-tools','SloTools','Terbit','2017-12-07','2017-12-27',8,1496997267,8,1496997267),(299,4,'slo-tools','SloTools','Terbit','2017-05-29','2017-06-14',8,1496998893,8,1496998893),(300,1,'competency-certification','CompetencyCertification','Unit Kerja','Unit Kerja 1','Unit Kerja 2',8,1497153932,8,1497153932),(301,1,'monitoring-apar','MonitoringApar','Bulan','FMTC1','FMTC2',8,1497182610,8,1497182610),(302,1,'monitoring-apar','MonitoringApar','Tahun','12312','1231456452',8,1497182610,8,1497182610),(303,1,'monitoring-apar','MonitoringApar','Lokasi','123','123456456',8,1497182610,8,1497182610),(304,1,'monitoring-apar','MonitoringApar','Media Pemadam Api','123','123456',8,1497182610,8,1497182610),(305,1,'monitoring-apar','MonitoringApar','Rating Api','123','123456456',8,1497182610,8,1497182610),(306,1,'monitoring-apar','MonitoringApar','Kelas Kebakaran','MAF1','MAF2',8,1497182610,8,1497182610),(307,1,'monitoring-apar','MonitoringApar','Berat (KG)','123','456123',8,1497182610,8,1497182610),(308,1,'monitoring-apar','MonitoringApar','Tekanan Kerja (Bar)','123','6456123',8,1497182610,8,1497182610),(309,1,'monitoring-apar','MonitoringApar','Tabung','MAC1','MAC2',8,1497182610,8,1497182610),(310,1,'monitoring-apar','MonitoringApar','Nozzle','MAC1','MAC2',8,1497182610,8,1497182610),(311,1,'monitoring-apar','MonitoringApar','Handle','MAC1','MAC2',8,1497182610,8,1497182610),(312,1,'monitoring-apar','MonitoringApar','Segitiga APAR','MATP1','MATP2',8,1497182610,8,1497182610),(313,1,'monitoring-apar','MonitoringApar','IK APAR/APAB','MATP1','MATP2',8,1497182610,8,1497182610),(314,1,'monitoring-apar','MonitoringApar','Kartu Gantung','MATP1','MATP2',8,1497182610,8,1497182610),(315,1,'monitoring-apar','MonitoringApar','Tinggi < 1.25m','MATP2','MATP1',8,1497182610,8,1497182610),(316,1,'monitoring-apar','MonitoringApar','Jarak < 15m','MATP2','MATP1',8,1497182610,8,1497182610),(317,1,'monitoring-apar','MonitoringApar','Tanggal','2017-06-19','2017-06-22',8,1497182610,8,1497182610),(318,1,'monitoring-apar','MonitoringApar','Diisi oleh','1232','12326546',8,1497182610,8,1497182610),(319,1,'monitoring-apar','MonitoringApar','Aktifitas','<p>123123</p>','<p>12312345654</p>',8,1497182610,8,1497182610),(320,2,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(321,4,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(322,5,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(323,7,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(324,8,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(325,9,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(326,11,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(327,12,'monitoring-apar','MaMonth','Nilai','123','123456',8,1497182610,8,1497182610),(328,1,'monitoring-apar','MaMonth','Nilai','23','232',8,1497183177,8,1497183177),(329,1,'fire-detector','FireDetector','Tahun','2017','2016',8,1497257328,8,1497257328),(330,1,'fire-detector','FireDetector','Bulan','FMTC1','FMTC2',8,1497257328,8,1497257328),(331,1,'fire-detector','FireDetector','Lantai','FDT1','FDT2',8,1497257328,8,1497257328),(332,1,'fire-detector','FireDetector','Lokasi','123','123454',8,1497257328,8,1497257328),(333,1,'fire-detector','FireDetector','Tipe Detektor','FDT1','FDT2',8,1497257328,8,1497257328),(334,1,'fire-detector','FireDetector','Zona Alarm','FAZ1','FAZ3',8,1497257328,8,1497257328),(335,1,'fire-detector','FireDetector','Pemasangan','<p>awda</p>','<p>awdad545454</p>',8,1497257328,8,1497257328),(336,1,'fire-detector','FireDetector','Fisik Detektor','awd','awd45454',8,1497257328,8,1497257328),(337,1,'fire-detector','FireDetector','Kondisi Wiring','<p>awd</p>','<p>awd454545</p>',8,1497257328,8,1497257328),(338,1,'fire-detector','FireDetector','Last Checked','2017-06-22','1928-01-09',8,1497257328,8,1497257328),(339,1,'fire-detector','FireDetector','Catatan Hasil Pengujian','<p>adad</p>','<p>adad545454</p>',8,1497257328,8,1497257328),(340,2,'fire-detector','FdDetail','Bulan','FTR1','FTR2',8,1497257328,8,1497257328),(341,3,'fire-detector','FdDetail','Bulan','FTR1','FTR2',8,1497257328,8,1497257328),(342,4,'fire-detector','FdDetail','Bulan','FTR1','FDT4',8,1497257328,8,1497257328),(343,5,'fire-detector','FdDetail','Bulan','FTR1','FTR3',8,1497257328,8,1497257328),(344,8,'working-env-data','WevDetail','Satuan','WUC1','WUC2',8,1497341934,8,1497341934),(345,8,'working-env-data','WevDetail','Baku Mutu','12312312','1123',8,1497341934,8,1497341934),(346,1,'hydrant-question','HydrantQuestion','Item','<p>Periksa Selang</p>','<p>Periksa Selanga</p>',8,1497348181,8,1497348181),(347,1,'hydrant-question','HydrantQuestion','Item','<p>Periksa Selanga</p>','<p>Periksa Selang</p>',8,1497348191,8,1497348191),(348,2,'hydrant-checklist','HydrantChecklist','Hydrant No.','12321','1231546412321',8,1497354500,8,1497354500),(349,2,'hydrant-checklist','HydrantChecklist','Lokasi','awdada','awdadaadwad',8,1497354500,8,1497354500),(350,2,'hydrant-checklist','HcDetail','Jawaban','1','0',8,1497354500,8,1497354500),(351,3,'hydrant-checklist','HcDetail','Jawaban','1','0',8,1497354500,8,1497354500),(352,4,'hydrant-checklist','HcDetail','Jawaban','0','1',8,1497354501,8,1497354501),(353,4,'hydrant-checklist','HcDetail','Jawaban','1','0',8,1497354523,8,1497354523),(354,6,'hydrant-checklist','HcDetail','Jawaban','1','0',8,1497354523,8,1497354523),(355,8,'hydrant-checklist','HcDetail','Jawaban','2','1',8,1497355007,8,1497355007),(356,2,'hydrant-checklist','HcDetail','Jawaban','0','1',8,1497355494,8,1497355494),(357,2,'hydrant-checklist','HydrantChecklist','Tanggal','0000-00-00','2017-06-14',8,1497355551,8,1497355551),(358,2,'housekeeping-question','HqDetail','Kriteria Nilai 3','<em></em><p>awdad</p>','<p><em></em></p><p>awdad</p>',8,1497503560,8,1497503560),(359,1,'housekeeping-question','HqDetail','Kriteria Nilai 5','<p>daw</p>','<p>dawdwadawd</p>',8,1497503653,8,1497503653),(360,1,'housekeeping-question','HqDetail','Kriteria Nilai 4','<p>awd</p>','<p>awddwad</p>',8,1497503653,8,1497503653),(361,1,'housekeeping-question','HqDetail','Kriteria Nilai 3','<p>awda</p>','<p>awdaawda</p>',8,1497503653,8,1497503653),(362,1,'housekeeping-question','HqDetail','Kriteria Nilai 2','<p>adw</p>','<p>adwawd</p>',8,1497503653,8,1497503653),(363,1,'housekeeping-question','HqDetail','Kriteria Nilai 1','<p>awdawd</p>','<em></em><p>awdawdawdad</p>',8,1497503653,8,1497503653),(364,2,'housekeeping-question','HqDetail','Kriteria Nilai 5','<p>awdawd</p>','<p>awdawdawdawdawdad</p>',8,1497503653,8,1497503653),(365,2,'housekeeping-question','HqDetail','Kriteria Nilai 4','<p>awdaw</p>','<p>awdawawdada1231</p>',8,1497503653,8,1497503653),(366,2,'housekeeping-question','HqDetail','Kriteria Nilai 3','<p><em></em></p><p>awdad</p>','<p><em></em></p><p>awdad313214</p>',8,1497503653,8,1497503653),(367,2,'housekeeping-question','HqDetail','Kriteria Nilai 1','<p>awdad</p>','<p>awdad31242</p>',8,1497503653,8,1497503653),(368,3,'housekeeping-question','HqDetail','Subtitle','wada','wada34534543',8,1497503653,8,1497503653),(369,3,'housekeeping-question','HqDetail','Kriteria Nilai 5','<p>daw</p>','<p>daw545345345</p>',8,1497503653,8,1497503653),(370,3,'housekeeping-question','HqDetail','Kriteria Nilai 4','<p>awd</p>','<p>awd345345</p>',8,1497503653,8,1497503653),(371,3,'housekeeping-question','HqDetail','Kriteria Nilai 3','<p>awda</p>','<p>awda43543</p>',8,1497503653,8,1497503653),(372,3,'housekeeping-question','HqDetail','Kriteria Nilai 2','<p>adw</p>','<p>adw34543</p>',8,1497503653,8,1497503653),(373,3,'housekeeping-question','HqDetail','Kriteria Nilai 1','<p>awdawd</p>','<p>awdawd345345</p>',8,1497503653,8,1497503653),(374,4,'housekeeping-question','HqDetail','Kriteria Nilai 5','<p>awdawd</p>','<p>awdawd34534</p>',8,1497503653,8,1497503653),(375,4,'housekeeping-question','HqDetail','Kriteria Nilai 4','<p>awdaw</p>','<p>awdaw54354</p>',8,1497503653,8,1497503653),(376,4,'housekeeping-question','HqDetail','Kriteria Nilai 3','<p><em></em></p><p>awdad</p>','<p><em></em></p><p>awdad534534543</p>',8,1497503653,8,1497503653),(377,4,'housekeeping-question','HqDetail','Kriteria Nilai 1','<p>awdad</p>','<p>awdad345</p>',8,1497503653,8,1497503653),(378,2,'housekeeping-implementation','HousekeepingImplementation','Unit','adwa','adwa43434',8,1497520363,8,1497520363),(379,2,'housekeeping-implementation','HousekeepingImplementation','Tanggal','2017-06-20','2017-06-29',8,1497520363,8,1497520363),(380,2,'housekeeping-implementation','HousekeepingImplementation','Auditor','1231','12313434343',8,1497520363,8,1497520363),(381,5,'housekeeping-implementation','HiDetail','Kriteria','1','4',8,1497520363,8,1497520363),(382,5,'housekeeping-implementation','HiDetail','Kualitas','123','434',8,1497520363,8,1497520363),(383,5,'housekeeping-implementation','HiDetail','Rekomendasi','123','123434343',8,1497520363,8,1497520363),(384,6,'housekeeping-implementation','HiDetail','Kriteria','1','4',8,1497520363,8,1497520363),(385,6,'housekeeping-implementation','HiDetail','Kualitas','1','434',8,1497520363,8,1497520363),(386,6,'housekeeping-implementation','HiDetail','Rekomendasi','123','123434343',8,1497520363,8,1497520363),(387,7,'housekeeping-implementation','HiDetail','Kriteria','1','4',8,1497520363,8,1497520363),(388,7,'housekeeping-implementation','HiDetail','Kualitas','231','343',8,1497520363,8,1497520363),(389,7,'housekeeping-implementation','HiDetail','Rekomendasi','123','12334343',8,1497520363,8,1497520363),(390,8,'housekeeping-implementation','HiDetail','Kriteria','1','4',8,1497520363,8,1497520363),(391,8,'housekeeping-implementation','HiDetail','Kualitas','123','3',8,1497520363,8,1497520363),(392,8,'housekeeping-implementation','HiDetail','Rekomendasi','123','34343434434343423123123',8,1497520363,8,1497520363),(393,7,'hydrant-question','HydrantQuestion','Item','<p>awd</p>','<p>awdd</p>',8,1497628686,8,1497628686),(394,7,'hydrant-question','HydrantQuestion','Item','<p>awdd</p>','<p>awdddd</p>',8,1497628703,8,1497628703),(395,11,'housekeeping-question','HqDetail','Subtitle','dawd','dawdadsadaw',8,1497629088,8,1497629088),(396,11,'housekeeping-question','HqDetail','Kriteria Nilai 5','<p>dawd</p>','<p>dawddsadasd</p>',8,1497629088,8,1497629088),(397,11,'housekeeping-question','HqDetail','Kriteria Nilai 4','<p>awda</p>','<p>awdaasdasdsa</p>',8,1497629088,8,1497629088),(398,11,'housekeeping-question','HqDetail','Kriteria Nilai 3','<p>awd</p>','<p>awddasdas</p>',8,1497629088,8,1497629088),(399,2,'fire-detector','FcdDetail','Tanggal','2017-06-06','2017-06-14',8,1497676479,8,1497676479),(400,3,'slo-generator','SloGenerator','Tahun','2017','2015',8,1498064342,8,1498064342),(401,3,'slo-generator','SloGenerator','Daya Terpasang (MW)','18.00','17',8,1498064433,8,1498064433),(402,3,'slo-generator','SloGenerator','Daya Terpasang (MW)','17.00','18',8,1498064505,8,1498064505),(403,3,'slo-generator','SloGenerator','Daya Terpasang (MW)','18.00','17.52',8,1498064573,8,1498064573),(404,5,'slo-generator','SloGenerator','Nama Mesin','17.515','PLTG PAUH LIMO 2',8,1498064964,8,1498064964),(405,1,'monitoring-apar','MaMonth','Nilai','232','9/15',8,1498133283,8,1498133283),(406,1,'working-env-data','WevDetail','Hasil Pengujian','123123','123123dawda',8,1498413703,8,1498413703),(407,15,'fire-detector','FdDetail','Bulan','FDT4','FTR4',8,1498897669,8,1498897669),(408,6,'slo-tools','SloTools','Tahun','1312312','2015',8,1498916079,8,1498916079),(409,6,'slo-tools','SloTools','Terbit','2017-05-29','2017-12-21',8,1498916079,8,1498916079),(410,6,'slo-tools','SloTools','Riksa Uji 1','2017-06-20','2017-06-07',8,1498916079,8,1498916079),(411,6,'slo-tools','SloTools','Riksa Uji 2','2017-06-19','2017-06-27',8,1498916079,8,1498916079),(412,2,'monitoring-apar','MonitoringApar','Aktifitas','<p>123123</p>','<p>123123<strong>dawdadada</strong></p>',8,1500271412,8,1500271412),(413,2,'environment-permit-company-profile','EnvironmentPermitCompanyProfile','Nama Perusahaan','awda','awdaadadzxczxczxczx',8,1500394742,8,1500394742),(414,10,'ppu-emission-source','PpuEmissionSource','Waktu Operasi (Jam/Tahun)','1367.000000','15426',8,1500570766,8,1500570766),(415,86,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','142',8,1500570766,8,1500570766),(416,87,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','213',8,1500570766,8,1500570766),(417,89,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','12312',8,1500570766,8,1500570766),(418,90,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','32',8,1500570766,8,1500570766),(419,92,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','1231',8,1500570766,8,1500570766),(420,93,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','3',8,1500570766,8,1500570766),(421,95,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','123',8,1500570766,8,1500570766),(422,96,'ppu-emission-source','PpuesMonth','Waktu Operasi','0.000000','3',8,1500570766,8,1500570766),(423,211,'budget-monitoring','BudgetMonitoringMonth','Nilai Rencana','700','7001231231',8,1509511582,8,1509511582),(424,212,'budget-monitoring','BudgetMonitoringMonth','Nilai Rencana','800','80012314',8,1509511583,8,1509511583),(425,1,'contract-monitoring','ContractMonitoring','Nilai Pagu (Rp.)','100000000','10000',8,1511446862,8,1511446862),(426,1,'contract-monitoring','ContractMonitoring','Tanggal','0000-00-00','1901-12-07',8,1511447022,8,1511447022),(427,1,'contract-monitoring','ContractMonitoring','Tanggal','0000-00-00','1901-12-05',8,1511447022,8,1511447022),(428,1,'contract-monitoring','ContractMonitoring','Tanggal','0000-00-00','1901-12-23',8,1511447023,8,1511447023),(429,1,'contract-monitoring','ContractMonitoring','Tanggal','0000-00-00','1901-12-26',8,1511447023,8,1511447023),(430,1,'contract-monitoring','ContractMonitoring','Tanggal','0000-00-00','1901-12-19',8,1511447023,8,1511447023),(431,1,'contract-monitoring','ContractMonitoring','Tanggal Akhir','0000-00-00','12 December 1901',8,1511447023,8,1511447023),(432,1,'contract-monitoring','ContractMonitoring','Tanggal Akhir','0000-00-00','06 June 1903',8,1511447039,8,1511447039),(433,1,'contract-monitoring','ContractMonitoring','Tanggal Akhir','0000-00-00','1901-12-12',8,1511447056,8,1511447056),(434,1,'k3l-activity','K3lActivity','Tanggal Aktifitas','2017-11-21','2017-11-28',8,1511509323,8,1511509323),(435,1,'sprinkle-monitoring','SprinkleMonitoring','Lokasi','Lokasi 1','Lokasi 12',8,1511668450,8,1511668450),(436,1,'sprinkle-monitoring','SprinkleMonitoring','Head Sprinkle','SSH1','SSH2',8,1511668450,8,1511668450),(437,1,'sprinkle-monitoring','SprinkleMonitoring','Fisik Detector','SD1','SD2',8,1511668450,8,1511668450),(438,1,'sprinkle-monitoring','SprinkleMonitoring','Catatan Hasil Pengecekan','asd','asdd',8,1511668450,8,1511668450),(439,1,'sprinkle-monitoring','SprinkleMonitoring','Tahun','0','2016',8,1511669253,8,1511669253),(440,2,'working-hour-monitoring','WhmMonth','J. Pekerja','23','12323',8,1511877111,8,1511877111);

/*Table structure for table `login_history` */

DROP TABLE IF EXISTS `login_history`;

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_login_history_user` (`user_id`),
  CONSTRAINT `FK_login_history_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

/*Data for the table `login_history` */

insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (1,8,NULL,NULL,'LOGOUT','::1',1479269759,1479269759),(2,8,NULL,NULL,'LOGIN SUCCESS','::1',1479269767,1479269767),(3,8,NULL,NULL,'LOGOUT','::1',1479398320,1479398320),(4,8,NULL,NULL,'LOGIN SUCCESS','::1',1479440555,1479440555),(5,8,NULL,NULL,'LOGOUT','::1',1479730129,1479730129),(6,8,NULL,NULL,'LOGIN SUCCESS','::1',1480046393,1480046393),(7,12,NULL,NULL,'LOGIN SUCCESS','::1',1480052102,1480052102),(8,12,NULL,NULL,'LOGOUT','::1',1480052214,1480052214),(9,12,NULL,NULL,'LOGIN SUCCESS','::1',1480052222,1480052222),(10,12,NULL,NULL,'LOGOUT','::1',1480053606,1480053606),(11,8,NULL,NULL,'LOGOUT','::1',1480053612,1480053612),(12,12,NULL,NULL,'LOGIN SUCCESS','::1',1480053621,1480053621),(13,8,NULL,NULL,'LOGIN SUCCESS','::1',1480053978,1480053978),(14,12,NULL,NULL,'LOGOUT','::1',1480129987,1480129987),(15,8,NULL,NULL,'LOGIN SUCCESS','::1',1480130000,1480130000),(16,8,NULL,NULL,'LOGOUT','::1',1480131778,1480131778),(17,12,NULL,NULL,'LOGIN SUCCESS','::1',1480131788,1480131788),(18,12,NULL,NULL,'LOGOUT','::1',1480149980,1480149980),(19,12,NULL,NULL,'LOGIN SUCCESS','::1',1480150043,1480150043),(20,12,NULL,NULL,'LOGOUT','::1',1480150050,1480150050),(21,8,NULL,NULL,'LOGOUT','::1',1480150107,1480150107),(22,8,NULL,NULL,'LOGIN SUCCESS','::1',1481598277,1481598277),(23,8,NULL,NULL,'LOGOUT','::1',1481599145,1481599145),(24,8,NULL,NULL,'LOGIN SUCCESS','::1',1482375151,1482375151),(25,8,NULL,NULL,'LOGOUT','::1',1482394645,1482394645),(26,8,NULL,NULL,'LOGIN SUCCESS','::1',1482394655,1482394655),(27,8,NULL,NULL,'LOGOUT','::1',1482413207,1482413207),(28,8,NULL,NULL,'LOGIN SUCCESS','::1',1482482524,1482482524),(29,8,NULL,NULL,'LOGOUT','::1',1482826243,1482826243),(30,8,NULL,NULL,'LOGIN SUCCESS','::1',1482826390,1482826390),(31,8,NULL,NULL,'LOGOUT','::1',1482830435,1482830435),(32,8,NULL,NULL,'LOGIN SUCCESS','::1',1482904018,1482904018),(33,8,NULL,NULL,'LOGOUT','::1',1482908945,1482908945),(34,8,NULL,NULL,'LOGIN SUCCESS','::1',1482908955,1482908955),(35,8,NULL,NULL,'LOGOUT','::1',1482913301,1482913301),(36,8,NULL,NULL,'LOGIN SUCCESS','::1',1482913439,1482913439),(37,8,NULL,NULL,'LOGOUT','::1',1482980058,1482980058),(38,8,NULL,NULL,'LOGIN SUCCESS','::1',1483074651,1483074651),(39,8,NULL,NULL,'LOGOUT','::1',1483082347,1483082347),(40,8,NULL,NULL,'LOGIN SUCCESS','::1',1483082384,1483082384),(41,8,NULL,NULL,'LOGOUT','::1',1483419405,1483419405),(42,8,NULL,NULL,'LOGIN SUCCESS','::1',1483419453,1483419453),(43,8,NULL,NULL,'LOGIN SUCCESS','::1',1483590963,1483590963),(44,8,NULL,NULL,'LOGOUT','::1',1483676171,1483676171),(45,8,NULL,NULL,'LOGIN SUCCESS','::1',1483676266,1483676266),(46,8,NULL,NULL,'LOGOUT','::1',1483699644,1483699644),(47,8,NULL,NULL,'LOGIN SUCCESS','::1',1483760748,1483760748),(48,8,NULL,NULL,'LOGOUT','::1',1484042329,1484042329),(49,8,NULL,NULL,'LOGIN SUCCESS','::1',1484105381,1484105381),(50,8,NULL,NULL,'LOGOUT','::1',1484301026,1484301026),(51,8,NULL,NULL,'LOGIN SUCCESS','::1',1484301803,1484301803),(52,8,NULL,NULL,'LOGOUT','::1',1484543719,1484543719),(53,8,NULL,NULL,'LOGIN SUCCESS','::1',1484543730,1484543730),(54,8,NULL,NULL,'LOGOUT','::1',1484714239,1484714239),(55,8,NULL,NULL,'LOGIN SUCCESS','::1',1484795562,1484795562),(56,8,NULL,NULL,'LOGOUT','::1',1485264263,1485264263),(57,8,NULL,NULL,'LOGIN SUCCESS','::1',1485264914,1485264914),(58,8,NULL,NULL,'LOGOUT','::1',1485344838,1485344838),(59,8,NULL,NULL,'LOGIN SUCCESS','::1',1485422635,1485422635),(60,8,NULL,NULL,'LOGOUT','::1',1485444933,1485444933),(61,8,NULL,NULL,'LOGIN SUCCESS','::1',1486025491,1486025491),(62,8,NULL,NULL,'LOGIN SUCCESS','::1',1495615651,1495615651),(63,8,NULL,NULL,'LOGOUT','::1',1497613670,1497613670),(64,8,NULL,NULL,'LOGIN SUCCESS','::1',1497613681,1497613681),(65,NULL,'admin','admin1234','LOGIN FAILED','::1',1501337356,1501337356),(66,8,NULL,NULL,'LOGIN SUCCESS','::1',1501337361,1501337361),(67,NULL,'ADMIN','ADMIN','LOGIN FAILED','::1',1502189238,1502189238),(68,8,NULL,NULL,'LOGIN SUCCESS','::1',1502189285,1502189285),(69,NULL,'ADMIN','admin1234','LOGIN FAILED','::1',1506954110,1506954110),(70,8,NULL,NULL,'LOGIN SUCCESS','::1',1506954121,1506954121);

/*Table structure for table `loto_monitoring` */

DROP TABLE IF EXISTS `loto_monitoring`;

CREATE TABLE `loto_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `lm_key_name` varchar(50) NOT NULL,
  `lm_permission_number` varchar(50) NOT NULL,
  `lm_tool_description` text,
  `lm_tool_status` varchar(10) DEFAULT NULL,
  `lm_open_date` date DEFAULT NULL,
  `lm_open_hour` varchar(5) DEFAULT NULL,
  `lm_open_operation` varchar(50) DEFAULT NULL,
  `lm_open_maint` varchar(50) DEFAULT NULL,
  `lm_open_k3` varchar(50) DEFAULT NULL,
  `lm_close_date` date DEFAULT NULL,
  `lm_close_hour` varchar(5) DEFAULT NULL,
  `lm_close_operation` varchar(50) DEFAULT NULL,
  `lm_close_maint` varchar(50) DEFAULT NULL,
  `lm_close_k3` varchar(50) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_loto_monitoring_power_plant` (`power_plant_id`),
  KEY `FK_loto_monitoring_sector` (`sector_id`),
  CONSTRAINT `FK_loto_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_loto_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `loto_monitoring` */

insert  into `loto_monitoring`(`id`,`sector_id`,`power_plant_id`,`lm_key_name`,`lm_permission_number`,`lm_tool_description`,`lm_tool_status`,`lm_open_date`,`lm_open_hour`,`lm_open_operation`,`lm_open_maint`,`lm_open_k3`,`lm_close_date`,`lm_close_hour`,`lm_close_operation`,`lm_close_maint`,`lm_close_k3`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,10,6,'Kunci 1','Nomor 1','asd','LTS1','2017-11-15','14:00','dw','ad','daw',NULL,'','','','',8,1511576043,8,1511577466),(3,10,6,'Kunci 2','awda','daw','','2017-11-22','12:31','da','w','ad','2017-11-07','12:00','d','awd','da',8,1511577571,8,1511577571);

/*Table structure for table `ma_month` */

DROP TABLE IF EXISTS `ma_month`;

CREATE TABLE `ma_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `monitoring_apar_id` int(11) NOT NULL,
  `mam_month` int(2) NOT NULL,
  `mam_value` varchar(10) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ma_month` (`monitoring_apar_id`),
  CONSTRAINT `FK_ma_month` FOREIGN KEY (`monitoring_apar_id`) REFERENCES `monitoring_apar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `ma_month` */

insert  into `ma_month`(`id`,`monitoring_apar_id`,`mam_month`,`mam_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,2,1,'123',8,1498135857,8,1500271412),(14,2,2,'123',8,1498135857,8,1500271412),(15,2,3,'123',8,1498135857,8,1500271412),(16,2,4,'123',8,1498135857,8,1500271412),(17,2,5,'123',8,1498135857,8,1500271412),(18,2,6,'123',8,1498135857,8,1500271412),(19,2,7,'1',8,1498135857,8,1500271412),(20,2,8,'23123',8,1498135857,8,1500271412),(21,2,9,'123',8,1498135857,8,1500271412),(22,2,10,'123',8,1498135857,8,1500271412),(23,2,11,'123',8,1498135857,8,1500271412),(24,2,12,'123',8,1498135857,8,1500271412);

/*Table structure for table `maturity_level` */

DROP TABLE IF EXISTS `maturity_level`;

CREATE TABLE `maturity_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `mlvl_quarter` varchar(2) NOT NULL,
  `mlvl_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maturity_level_sector` (`sector_id`),
  CONSTRAINT `FK_maturity_level_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level` */

insert  into `maturity_level`(`id`,`sector_id`,`mlvl_quarter`,`mlvl_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,10,'12',1231,8,1492887754,8,1511513904);

/*Table structure for table `maturity_level_detail` */

DROP TABLE IF EXISTS `maturity_level_detail`;

CREATE TABLE `maturity_level_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maturity_level_id` int(11) NOT NULL,
  `maturity_level_question_id` int(11) NOT NULL,
  `mld_target` decimal(14,2) DEFAULT NULL,
  `mld_realization` decimal(14,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maturity_level_detail` (`maturity_level_id`),
  KEY `FK_maturity_level_detail_question` (`maturity_level_question_id`),
  CONSTRAINT `FK_maturity_level_detail` FOREIGN KEY (`maturity_level_id`) REFERENCES `maturity_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_maturity_level_detail_question` FOREIGN KEY (`maturity_level_question_id`) REFERENCES `maturity_level_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_detail` */

insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,19,1,NULL,NULL,8,1511513904,8,1511513904);

/*Table structure for table `maturity_level_question` */

DROP TABLE IF EXISTS `maturity_level_question`;

CREATE TABLE `maturity_level_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maturity_level_title_id` int(11) NOT NULL,
  `q_action_plan` text,
  `q_criteria` text,
  `q_unit_code` varchar(10) NOT NULL,
  `q_weight` decimal(5,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maturity_level_question_title` (`maturity_level_title_id`),
  CONSTRAINT `FK_maturity_level_question_title` FOREIGN KEY (`maturity_level_title_id`) REFERENCES `maturity_level_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_question` */

insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'<p>dawd</p>','<p>adwad</p>','UC1','999.99',8,1492887022,8,1492887022);

/*Table structure for table `maturity_level_title` */

DROP TABLE IF EXISTS `maturity_level_title`;

CREATE TABLE `maturity_level_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_text` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_title` */

insert  into `maturity_level_title`(`id`,`title_text`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'ASD',8,1488015722,8,1488015722);

/*Table structure for table `monitoring_apar` */

DROP TABLE IF EXISTS `monitoring_apar`;

CREATE TABLE `monitoring_apar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ma_form_month_type_code` varchar(10) NOT NULL,
  `ma_year` int(4) NOT NULL,
  `ma_location` varchar(100) NOT NULL,
  `ma_extinguish_media` varchar(100) NOT NULL,
  `ma_fire_rating` varchar(50) NOT NULL,
  `ma_fire_class` varchar(10) NOT NULL,
  `ma_weight` int(11) NOT NULL,
  `ma_working_pressure` int(11) NOT NULL,
  `ma_tube_condition_code` varchar(10) NOT NULL,
  `ma_nozzle_condition_code` varchar(10) NOT NULL,
  `ma_handle_condition_code` varchar(10) NOT NULL,
  `ma_pin_condition_code` varchar(10) NOT NULL,
  `ma_technical_triangle` varchar(10) NOT NULL,
  `ma_technical_ik` varchar(10) NOT NULL,
  `ma_technical_card` varchar(10) NOT NULL,
  `ma_technical_height` varchar(10) NOT NULL,
  `ma_technical_dis` varchar(10) NOT NULL,
  `ma_noting_date` date NOT NULL,
  `ma_officer` varchar(100) NOT NULL,
  `ma_using_date` date NOT NULL,
  `ma_activity` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_monitoring_apar_pp` (`power_plant_id`),
  KEY `FK_monitoring_apar` (`sector_id`),
  CONSTRAINT `FK_monitoring_apar` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_monitoring_apar_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `monitoring_apar` */

insert  into `monitoring_apar`(`id`,`sector_id`,`power_plant_id`,`ma_form_month_type_code`,`ma_year`,`ma_location`,`ma_extinguish_media`,`ma_fire_rating`,`ma_fire_class`,`ma_weight`,`ma_working_pressure`,`ma_tube_condition_code`,`ma_nozzle_condition_code`,`ma_handle_condition_code`,`ma_pin_condition_code`,`ma_technical_triangle`,`ma_technical_ik`,`ma_technical_card`,`ma_technical_height`,`ma_technical_dis`,`ma_noting_date`,`ma_officer`,`ma_using_date`,`ma_activity`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,10,6,'FMTC8',2015,'awd','awdawd','awda','MAF1',123123,12312,'MAC1','MAC1','MAC1','MAC1','MATP1','MATP1','MATP1','MATP2','MATP2','2017-06-19','12312','2017-06-13','<p>123123<strong>dawdadada</strong></p>',8,1498135857,8,1500271412);

/*Table structure for table `p2k3_monitoring` */

DROP TABLE IF EXISTS `p2k3_monitoring`;

CREATE TABLE `p2k3_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `pm_form_month_type_code` varchar(10) NOT NULL,
  `pm_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p2k3_monitoring_power_plant` (`power_plant_id`),
  KEY `FK_p2k3_monitoring` (`sector_id`),
  CONSTRAINT `FK_p2k3_monitoring` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_p2k3_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `p2k3_monitoring` */

insert  into `p2k3_monitoring`(`id`,`sector_id`,`power_plant_id`,`pm_form_month_type_code`,`pm_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'FMTC7',2017,8,1511795703,8,1511795703),(2,10,6,'FMTC2',123,8,1511796366,8,1511796366);

/*Table structure for table `p2k3_monitoring_detail` */

DROP TABLE IF EXISTS `p2k3_monitoring_detail`;

CREATE TABLE `p2k3_monitoring_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p2k3_monitoring_id` int(11) NOT NULL,
  `pmd_finding` varchar(50) NOT NULL,
  `pmd_action` text,
  `pmd_deadline` date DEFAULT NULL,
  `pmd_status` varchar(10) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p2k3_monitoring_detail` (`p2k3_monitoring_id`),
  CONSTRAINT `FK_p2k3_monitoring_detail` FOREIGN KEY (`p2k3_monitoring_id`) REFERENCES `p2k3_monitoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `p2k3_monitoring_detail` */

insert  into `p2k3_monitoring_detail`(`id`,`p2k3_monitoring_id`,`pmd_finding`,`pmd_action`,`pmd_deadline`,`pmd_status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'awd','ad','2017-11-22','PS3',8,1511796350,8,1511796350),(2,1,'awd','ad','2017-11-28','PS3',8,1511847205,8,1511847205),(3,1,'awdawd','awd',NULL,'PS2',8,1511847392,8,1511847392);

/*Table structure for table `p3k_monitoring` */

DROP TABLE IF EXISTS `p3k_monitoring`;

CREATE TABLE `p3k_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `pm_number` varchar(50) NOT NULL,
  `pm_location` varchar(50) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p3k_monitoring_power_plant` (`power_plant_id`),
  KEY `FK_p3k_monitoring_sector` (`sector_id`),
  CONSTRAINT `FK_p3k_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_p3k_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `p3k_monitoring` */

insert  into `p3k_monitoring`(`id`,`sector_id`,`power_plant_id`,`pm_number`,`pm_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'01','Ruang Workshop',8,1511773953,8,1511773953);

/*Table structure for table `p3k_monitoring_detail` */

DROP TABLE IF EXISTS `p3k_monitoring_detail`;

CREATE TABLE `p3k_monitoring_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p3k_monitoring_id` int(11) NOT NULL,
  `pmd_value` varchar(50) NOT NULL,
  `pmd_standard_amount` varchar(50) DEFAULT NULL,
  `pmd_ref` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p3k_monitoring_detail` (`p3k_monitoring_id`),
  CONSTRAINT `FK_p3k_monitoring_detail` FOREIGN KEY (`p3k_monitoring_id`) REFERENCES `p3k_monitoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `p3k_monitoring_detail` */

insert  into `p3k_monitoring_detail`(`id`,`p3k_monitoring_id`,`pmd_value`,`pmd_standard_amount`,`pmd_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'wd','awd','awd',8,1511777113,8,1511777113);

/*Table structure for table `plb3_balance_sheet` */

DROP TABLE IF EXISTS `plb3_balance_sheet`;

CREATE TABLE `plb3_balance_sheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `plb3_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_balance_sheet_power_plant` (`power_plant_id`),
  KEY `FK_plb3_balance_sheet_sector` (`sector_id`),
  CONSTRAINT `FK_plb3_balance_sheet_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_balance_sheet_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_balance_sheet` */

insert  into `plb3_balance_sheet`(`id`,`sector_id`,`power_plant_id`,`plb3_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,4,2017,8,1491896765,8,1491896765),(2,2,4,23,8,1492438405,8,1492438405),(3,4,1,2017,8,1507127582,8,1507127582),(4,10,6,2016,8,1507732514,8,1507732514);

/*Table structure for table `plb3_balance_sheet_detail` */

DROP TABLE IF EXISTS `plb3_balance_sheet_detail`;

CREATE TABLE `plb3_balance_sheet_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_type_code` varchar(10) NOT NULL,
  `plb3_balance_sheet_id` int(11) NOT NULL,
  `plb3_waste_type` varchar(100) NOT NULL,
  `plb3_waste_source_code` varchar(10) NOT NULL,
  `plb3_waste_unit_code` varchar(10) NOT NULL,
  `plb3_previous_waste` decimal(15,9) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_dominant_ash_disposal` (`plb3_balance_sheet_id`),
  CONSTRAINT `FK_plb3_dominant_ash_disposal` FOREIGN KEY (`plb3_balance_sheet_id`) REFERENCES `plb3_balance_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_balance_sheet_detail` */

insert  into `plb3_balance_sheet_detail`(`id`,`form_type_code`,`plb3_balance_sheet_id`,`plb3_waste_type`,`plb3_waste_source_code`,`plb3_waste_unit_code`,`plb3_previous_waste`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,'GD',1,'FLY ASH & BOTTOM ASH','PBWTC1','PBWUC1','189333.515000000',8,1492281063,8,1492410673),(41,'AD',1,'1232132312adwada','PBWTC3','PBWUC1','123213.000000000',8,1492366292,8,1492366292),(43,'GD',1,'asdasdwad','PBWTC1','PBWUC1','943784.000000000',8,1492416280,8,1492416280),(45,'AD',4,'Bensi','PBWTC1','PBWUC1','15000.000000000',8,1507871214,8,1507871214),(46,'AD',4,'Oli','PBWTC1','PBWUC1','100.000000000',8,1507871360,8,1507871360);

/*Table structure for table `plb3_balance_sheet_treatment` */

DROP TABLE IF EXISTS `plb3_balance_sheet_treatment`;

CREATE TABLE `plb3_balance_sheet_treatment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_balance_sheet_detail_id` int(11) NOT NULL,
  `plb3bst_treatment_type_code` varchar(10) NOT NULL,
  `plb3bst_ref` varchar(255) DEFAULT NULL,
  `plb3bst_manifest_code` varchar(50) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_balance_sheet_treatment` (`plb3_balance_sheet_detail_id`),
  CONSTRAINT `FK_plb3_balance_sheet_treatment` FOREIGN KEY (`plb3_balance_sheet_detail_id`) REFERENCES `plb3_balance_sheet_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_balance_sheet_treatment` */

insert  into `plb3_balance_sheet_treatment`(`id`,`plb3_balance_sheet_detail_id`,`plb3bst_treatment_type_code`,`plb3bst_ref`,`plb3bst_manifest_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (128,40,'PBTTC1','abc','def',8,1492281063,8,1492281063),(129,40,'PBTTC2','','',8,1492281064,8,1492281064),(130,40,'PBTTC3','0','0',8,1492281064,8,1492281064),(131,40,'PBTTC4','0','0',8,1492281064,8,1492281064),(132,40,'PBTTC5','0','0',8,1492281064,8,1492281064),(133,40,'PBTTC6','0','0',8,1492281064,8,1492281064),(134,40,'PBTTC7','0','0',8,1492281064,8,1492281064),(135,41,'PBTTC1','','',8,1492366292,8,1492366292),(136,41,'PBTTC2','','',8,1492366292,8,1492366292),(137,41,'PBTTC3','','',8,1492366292,8,1492366292),(138,41,'PBTTC4','','',8,1492366293,8,1492366293),(139,41,'PBTTC5','','',8,1492366293,8,1492366293),(140,41,'PBTTC6','','',8,1492366293,8,1492366293),(141,41,'PBTTC7','','',8,1492366293,8,1492366293),(149,43,'PBTTC1','','',8,1492416280,8,1492416280),(150,43,'PBTTC2','','',8,1492416280,8,1492416280),(151,43,'PBTTC3','','',8,1492416280,8,1492416280),(152,43,'PBTTC4','','',8,1492416280,8,1492416280),(153,43,'PBTTC5','','',8,1492416281,8,1492416281),(154,43,'PBTTC6','','',8,1492416281,8,1492416281),(155,43,'PBTTC7','','',8,1492416281,8,1492416281),(163,45,'PBTTC1','','',8,1507871214,8,1507871214),(164,45,'PBTTC2','','',8,1507871214,8,1507871214),(165,45,'PBTTC3','','',8,1507871214,8,1507871214),(166,45,'PBTTC4','','',8,1507871214,8,1507871214),(167,45,'PBTTC5','','',8,1507871215,8,1507871215),(168,45,'PBTTC6','','',8,1507871215,8,1507871215),(169,45,'PBTTC7','','',8,1507871215,8,1507871215),(170,46,'PBTTC1','','',8,1507871360,8,1507871360),(171,46,'PBTTC2','','',8,1507871360,8,1507871360),(172,46,'PBTTC3','','',8,1507871360,8,1507871360),(173,46,'PBTTC4','','',8,1507871360,8,1507871360),(174,46,'PBTTC5','','',8,1507871360,8,1507871360),(175,46,'PBTTC6','','',8,1507871360,8,1507871360),(176,46,'PBTTC7','','',8,1507871360,8,1507871360);

/*Table structure for table `plb3_checklist` */

DROP TABLE IF EXISTS `plb3_checklist`;

CREATE TABLE `plb3_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `plb3c_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_checklist_power_plant` (`power_plant_id`),
  KEY `FK_plb3_checklist_sector` (`sector_id`),
  CONSTRAINT `FK_plb3_checklist_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_checklist_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_checklist` */

insert  into `plb3_checklist`(`id`,`sector_id`,`power_plant_id`,`plb3c_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,4,2017,8,1492543020,8,1492543020),(2,4,1,2017,8,1507127586,8,1507127586),(3,10,6,2016,8,1508003956,8,1508003956);

/*Table structure for table `plb3_checklist_answer` */

DROP TABLE IF EXISTS `plb3_checklist_answer`;

CREATE TABLE `plb3_checklist_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_checklist_detail_id` int(11) NOT NULL,
  `plb3_question_id` int(11) NOT NULL,
  `plb3ca_answer` int(2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_checklist_answer` (`plb3_checklist_detail_id`),
  KEY `FK_plb3_checklist_answer_question` (`plb3_question_id`),
  CONSTRAINT `FK_plb3_checklist_answer` FOREIGN KEY (`plb3_checklist_detail_id`) REFERENCES `plb3_checklist_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_checklist_answer_question` FOREIGN KEY (`plb3_question_id`) REFERENCES `plb3_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_checklist_answer` */

insert  into `plb3_checklist_answer`(`id`,`plb3_checklist_detail_id`,`plb3_question_id`,`plb3ca_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (28,5,21,1,8,1492620466,8,1492677199),(29,5,22,0,8,1492620466,8,1492677199),(30,5,23,1,8,1492620466,8,1492677200),(31,5,24,1,8,1492620466,8,1492677200),(32,5,25,1,8,1492620466,8,1492677200),(33,5,26,1,8,1492620466,8,1492677200),(34,5,27,1,8,1492620466,8,1492677200),(35,5,29,1,8,1492620466,8,1492677200),(36,5,28,1,8,1492620466,8,1492677200),(37,6,30,1,8,1492621043,8,1492621043),(38,6,31,1,8,1492621043,8,1492621043),(39,6,45,1,8,1492621043,8,1492621043),(40,6,46,1,8,1492621043,8,1492621043),(41,6,34,1,8,1492621043,8,1492621043),(42,6,35,1,8,1492621043,8,1492621043),(43,6,37,1,8,1492621043,8,1492621043),(44,6,36,1,8,1492621043,8,1492621043),(45,7,39,1,8,1492621145,8,1492621145),(46,7,38,1,8,1492621145,8,1492621145),(47,7,42,1,8,1492621145,8,1492621145),(48,7,40,1,8,1492621145,8,1492621145),(49,7,41,1,8,1492621145,8,1492621145),(50,7,43,1,8,1492621145,8,1492621145),(51,7,44,1,8,1492621145,8,1492621145),(52,5,47,1,8,1492673527,8,1492677199),(53,5,48,0,8,1492673537,8,1492677200),(54,8,21,0,8,1508004481,8,1508004481),(55,8,22,1,8,1508004482,8,1508004482),(56,8,47,0,8,1508004482,8,1508004482),(57,8,48,0,8,1508004482,8,1508004482),(58,8,23,0,8,1508004482,8,1508004482),(59,8,24,1,8,1508004482,8,1508004482),(60,8,25,0,8,1508004483,8,1508004483),(61,8,26,1,8,1508004483,8,1508004483),(62,8,27,1,8,1508004483,8,1508004483),(63,8,29,0,8,1508004483,8,1508004483),(64,8,28,0,8,1508004483,8,1508004483),(65,9,30,0,8,1508072929,8,1508072929),(66,9,31,1,8,1508072929,8,1508072929),(67,9,45,0,8,1508072929,8,1508072929),(68,9,46,1,8,1508072929,8,1508072929),(69,9,34,0,8,1508072931,8,1508072931),(70,9,35,1,8,1508072931,8,1508072931),(71,9,37,1,8,1508072931,8,1508072931),(72,9,36,0,8,1508072932,8,1508072932);

/*Table structure for table `plb3_checklist_detail` */

DROP TABLE IF EXISTS `plb3_checklist_detail`;

CREATE TABLE `plb3_checklist_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_checklist_id` int(11) NOT NULL,
  `plb3cd_form_type_code` varchar(10) NOT NULL,
  `plb3cd_company_name` varchar(100) NOT NULL,
  `plb3cd_industrial_sector` varchar(100) NOT NULL,
  `plb3cd_location` varchar(50) NOT NULL,
  `plb3cd_assessment_team` varchar(50) DEFAULT NULL,
  `plb3cd_assessment_date` date DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_checklist_detail` (`plb3_checklist_id`),
  CONSTRAINT `FK_plb3_checklist_detail` FOREIGN KEY (`plb3_checklist_id`) REFERENCES `plb3_checklist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_checklist_detail` */

insert  into `plb3_checklist_detail`(`id`,`plb3_checklist_id`,`plb3cd_form_type_code`,`plb3cd_company_name`,`plb3cd_industrial_sector`,`plb3cd_location`,`plb3cd_assessment_team`,`plb3cd_assessment_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,'PCFTC1','PT. PLN (PERSERO) PEMBANGKITAN SBS ','ENERGI','Kab. LAMPUNG SELATAN','Penilai 1','2017-04-03',8,1492620464,8,1492677199),(6,1,'PCFTC2','PT. PLN (PERSERO) PEMBANGKITAN SBS ','ENERGI','Kab./Kota Lampung Selatan','Tim Penilai 2','2017-04-05',8,1492621041,8,1492621041),(7,1,'PCFTC3','PT. PLN (PERSERO) PEMBANGKITAN SBS ','ENERGI','Kab. LAMPUNG SELATAN','Tim Penilai 3','2017-03-14',8,1492621143,8,1492621143),(8,3,'PCFTC1','PT Perusahaan 1','Sektor 1','Lokasi 1','Tim 1','2017-10-24',8,1508004481,8,1508004481),(9,3,'PCFTC2','Perushaan 3','Sektor 123','Lokasi 24','Tim 13','2017-10-19',8,1508072929,8,1508072929);

/*Table structure for table `plb3_question` */

DROP TABLE IF EXISTS `plb3_question`;

CREATE TABLE `plb3_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_form_type_code` varchar(10) NOT NULL,
  `plb3_question_type_code` varchar(10) NOT NULL,
  `plb3_question` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_question` */

insert  into `plb3_question`(`id`,`plb3_form_type_code`,`plb3_question_type_code`,`plb3_question`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,'PCFTC1','PQTCP11','<p>apakah bagian luar bangunan diberi papan nama? </p>',8,1492619986,8,1492619986),(22,'PCFTC1','PQTCP11','<p>apakah bagian luar diberi simbol limbah B3 sesuai dengan karakteristik limbah B3 yang disimpan?</p>',8,1492620019,8,1492620019),(23,'PCFTC1','PQTCP12','<p>apakah pengemasan limbah B3 dilakukan sesuai dengan bentuk limbah B3?</p>',8,1492620040,8,1492620040),(24,'PCFTC1','PQTCP12','<p>apakah pengemasan limbah B3 dilakukan sesuai dengan karakteristik limbah B3?</p>',8,1492620054,8,1492620062),(25,'PCFTC1','PQTCP13','<p>apakah ada logbook/catatan untuk mencatat keluar masuk limbah limbah B3?</p>',8,1492620084,8,1492620084),(26,'PCFTC1','PQTCP13','<p>apakah jumlah dan jenis limbah B3 sesuai dengan yang tercatat di logbook/catatan?</p>',8,1492620097,8,1492620097),(27,'PCFTC1','PQTCP14','<p>apakah melakukan pengelolaan lanjutan terhadap limbah B3 yang disimpan? (diserahkan ke pihak ketiga/dimanfaatkan internal)</p>',8,1492620113,8,1492620113),(28,'PCFTC1','PQTCP15','<p>apakah memiliki SOP tanggap darurat?</p>',8,1492620127,8,1492620127),(29,'PCFTC1','PQTCP15','<p>Apakah memiliki Sistem Tanggap Darurat dalam melakukan pengelolaan limbah B3</p>',8,1492620138,8,1492620138),(30,'PCFTC2','PQTCP21','<p>apakah Jenis limbah B3 yang ditimbun sesuai dengan izin ?</p>',8,1492620154,8,1492620154),(31,'PCFTC2','PQTCP21','<p>apakah jenis limbah yang ditimbun memenuhi bakumutu TCLP?</p>',8,1492620165,8,1492620165),(34,'PCFTC2','PQTCP23','<p>apakah berada di area lokasi landfill dan memiliki 1 unit pompa?</p>',8,1492620208,8,1492620208),(35,'PCFTC2','PQTCP23','<p>apakah konstruksi pondasi, lantai dan dinding dari beton?</p>',8,1492620223,8,1492620223),(36,'PCFTC2','PQTCP24','<p>terdiakah tersedia alat tanggap darurat yang sesuai dan mudah dijangkau?</p>',8,1492620234,8,1492620976),(37,'PCFTC2','PQTCP24','<p>apakah memiliki SOP tanggap darurat?</p>',8,1492620246,8,1492620987),(38,'PCFTC3','PQTCP31','<p>Pihak ke-3 memiliki izin sebagai Pengelola limbah B3 (pengangkut/pengumpul/pengolah/pemanfaat)</p>',8,1492620262,8,1492620262),(39,'PCFTC3','PQTCP31','<p>Izin pengelolaan Limbah B3 pihak ke-3 belum habis masa berlaku</p>',8,1492620272,8,1492620272),(40,'PCFTC3','PQTCP32','<p>Perpindahan / pergerakan limbah B3 yang dilakukan oleh pihak ke-3 dilengkapi dengan dokumen manifest limbah B3</p>',8,1492620285,8,1492620285),(41,'PCFTC3','PQTCP32','<p>Pihak yang melakukan pengelola limbah B3 memperoleh salinan dokumen manifest limbah B3 sesuai dipersyaratkan</p>',8,1492620298,8,1492620298),(42,'PCFTC3','PQTCP32','<p>Dokumen manifest limbah B3 diisi sesuai dengan tatacara pengisian Dokumen Limbah B3</p>',8,1492620306,8,1492620306),(43,'PCFTC3','PQTCP33','<p>Dokumen manifest limbah B3 diisi sesuai dengan tatacara pengisian Dokumen Limbah B3</p>',8,1492620317,8,1492620317),(44,'PCFTC3','PQTCP33','<p>Kode manifest sesuai dengan yang tercantum pada rekomendasi pengangkutan limbah B3</p>',8,1492620328,8,1492620328),(45,'PCFTC2','PQTCP22','<p>apakah lapisan dasar (sub base) adalah tanah lempung yang dipadatkan dengan permeabilitas 1 x 10-9 m/det?</p>',8,1492620748,8,1492620748),(46,'PCFTC2','PQTCP22','<p>apakah permeabilitas dari sistem pendeteksi kebocoran (k) = 1 x 10-4 m/det?</p>',8,1492620759,8,1492620759),(47,'PCFTC1','PQTCP11','<p>awdadaw</p>',8,1492673527,8,1492673527),(48,'PCFTC1','PQTCP11','<p>awdawdwad</p>',8,1492673537,8,1492673537);

/*Table structure for table `plb3_sa_company_profile` */

DROP TABLE IF EXISTS `plb3_sa_company_profile`;

CREATE TABLE `plb3_sa_company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_self_assessment_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `profile_activity_loc_address` text,
  `profile_phone_fax` varchar(100) DEFAULT NULL,
  `profile_main_office_address` text,
  `profile_main_office_phone_fax_test` varchar(100) DEFAULT NULL,
  `profile_holding_name` varchar(255) DEFAULT NULL,
  `profile_holding_office_address` text,
  `profile_holding_phone_fax` varchar(100) DEFAULT NULL,
  `profile_company_established_year` varchar(100) DEFAULT NULL,
  `profile_industry_field` varchar(150) DEFAULT NULL,
  `profile_capital_status` varchar(150) DEFAULT NULL,
  `profile_area_factory` varchar(50) DEFAULT NULL,
  `profile_number_of_employees` varchar(150) DEFAULT NULL,
  `profile_production_capacity_installed` varchar(50) DEFAULT NULL,
  `profile_production_capacity_realization` varchar(50) DEFAULT NULL,
  `profile_raw_material` varchar(150) DEFAULT NULL,
  `profile_adjuvant_material` varchar(150) DEFAULT NULL,
  `profile_production_process` text,
  `profile_export_marketing_percentage` varchar(150) DEFAULT NULL,
  `profile_local_marketing_percentage` varchar(150) DEFAULT NULL,
  `profile_environment_document` text,
  `profile_contacts_name` text,
  `profile_contacts_mobile_phone` text,
  `profile_contacts_email` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_company_profile_sa` (`plb3_self_assessment_id`),
  CONSTRAINT `FK_plb3_sa_company_profile_sa` FOREIGN KEY (`plb3_self_assessment_id`) REFERENCES `plb3_self_assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_company_profile` */

insert  into `plb3_sa_company_profile`(`id`,`plb3_self_assessment_id`,`profile_name`,`profile_activity_loc_address`,`profile_phone_fax`,`profile_main_office_address`,`profile_main_office_phone_fax_test`,`profile_holding_name`,`profile_holding_office_address`,`profile_holding_phone_fax`,`profile_company_established_year`,`profile_industry_field`,`profile_capital_status`,`profile_area_factory`,`profile_number_of_employees`,`profile_production_capacity_installed`,`profile_production_capacity_realization`,`profile_raw_material`,`profile_adjuvant_material`,`profile_production_process`,`profile_export_marketing_percentage`,`profile_local_marketing_percentage`,`profile_environment_document`,`profile_contacts_name`,`profile_contacts_mobile_phone`,`profile_contacts_email`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,'PT. PLN (PERSERO) PEMBANGKITAN SUMATERA BAGIAN SELATAN SEKTOR PEMBANGKITAN TARAHAN','JALAN LINTAS SUMATERA KM.15, KECAMATAN KATIBUNG, KABUPATEN LAMPUNG SELATAN, LAMPUNG, 35452','0721-341815/ 341819','PT. PLN (PERSERO) PEMBANGKITAN SUMATERA BAGIAN SELATAN \r\nJALAN DEMANG LEBAR DAUN NO. 375, PALEMBANG 30128',NULL,'PT. PLN (PERSERO) KANTOR PUSAT','JALAN TRUNOJOYO BLOK M I/135 KEBAYORAN BARU, JAKARTA 12160','021-72616875,7261122/ 7251234','20 Februari 2008 (STO Desember 2007)','KETENAGALISTRIKAN','BADAN USAHA MILIK NEGARA','374.705 m2','121 PEGAWAI (per Mei 2016)','2 X 100 MW','2 X 100 MW','BATUBARA KELAS SUB BITUMINOUS','LIMESTONE (KAPUR)','BAHAN BAKAR (BATUBARA) --> BOILER CFB DENGAN FLUIDA AIR --> AIR BERUBAH MENJADI UAP --> UAP MEMUTAR TURBIN GENERATOR --> TRAFO STEP UP 6/11 kV MENJADI 150 kV --> GARDU INDUK NEW TARAHAN','NIHIL','MENYUPLAI SISTEM KELISTRIKAN PROVINSI LAMPUNG','AMDAL DENGAN PERSETUJUAN NOMOR : 3463/0115/SJ.T/1996 TANGGAL 03 SEPTEMBER 1996','SAHRONI ; TIZADIN ASHSEPTIAN ; MEILY PRILIANI','085378002526 ; 085268934407 ; 081214686288','s_roni16@yahoo.co.id ; tizadin2@pln.co.id ; meilypriliani@pln.co.id',8,1492163271,8,1492247368),(2,3,'123','','','',NULL,'','','','','','','','','','','','','','','','','','','',8,1492946802,8,1492946802);

/*Table structure for table `plb3_sa_form` */

DROP TABLE IF EXISTS `plb3_sa_form`;

CREATE TABLE `plb3_sa_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_self_assessment_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_self_assessment` (`plb3_self_assessment_id`),
  CONSTRAINT `FK_plb3_sa_form_self_assessment` FOREIGN KEY (`plb3_self_assessment_id`) REFERENCES `plb3_self_assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form` */

insert  into `plb3_sa_form`(`id`,`plb3_self_assessment_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,2,8,1492696547,8,1492703355);

/*Table structure for table `plb3_sa_form_detail` */

DROP TABLE IF EXISTS `plb3_sa_form_detail`;

CREATE TABLE `plb3_sa_form_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_sa_form_id` int(11) NOT NULL,
  `plb3_sa_question_id` int(11) NOT NULL,
  `plb3safd_yes_no` varchar(1) DEFAULT NULL,
  `plb3safd_percentage` int(3) DEFAULT NULL,
  `plb3safd_description` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_detail_form` (`plb3_sa_form_id`),
  KEY `FK_plb3_sa_form_detail_question` (`plb3_sa_question_id`),
  CONSTRAINT `FK_plb3_sa_form_detail_form` FOREIGN KEY (`plb3_sa_form_id`) REFERENCES `plb3_sa_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_sa_form_detail_question` FOREIGN KEY (`plb3_sa_question_id`) REFERENCES `plb3_sa_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form_detail` */

insert  into `plb3_sa_form_detail`(`id`,`plb3_sa_form_id`,`plb3_sa_question_id`,`plb3safd_yes_no`,`plb3safd_percentage`,`plb3safd_description`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,1,NULL,NULL,NULL,8,1492696547,8,1492703355),(2,3,3,'Y',NULL,'Izin Tempat Penyimpanan Sementara Ash Disposal Area',8,1492696550,8,1492703355),(3,3,4,'Y',NULL,'Izin TPS Gudang Limbah B3',8,1492696550,8,1492703355),(4,3,7,NULL,100,NULL,8,1492696550,8,1492703355),(5,3,9,'Y',NULL,'',8,1492696550,8,1492703355),(6,3,10,NULL,NULL,NULL,8,1492696550,8,1492703355),(7,3,13,'Y',NULL,'- Nama pihak ketiga : PT. SEMEN BATURAJA PERSERO\r\n- Izin/SK Nomor : 203 TAHUN 2012\r\n- Jenis Limbah B3 yang diizinkan dikelola oleh pihak ketiga : PEMANFAATAN\r\n- Instansi yang mengeluarkan izin : KEMENTERIAN LINGKUNGAN HIDUP',8,1492696550,8,1492703355),(8,3,14,'Y',NULL,'',8,1492696550,8,1492703355),(9,3,21,'Y',NULL,'',8,1492696550,8,1492703355),(10,3,16,'Y',NULL,'',8,1492696550,8,1492703355),(11,3,17,'Y',NULL,'',8,1492696550,8,1492703355),(12,3,18,'Y',NULL,'',8,1492696550,8,1492703355),(13,3,19,'Y',NULL,'',8,1492696550,8,1492703355),(14,3,20,'Y',NULL,'',8,1492696550,8,1492703355);

/*Table structure for table `plb3_sa_form_detail_static` */

DROP TABLE IF EXISTS `plb3_sa_form_detail_static`;

CREATE TABLE `plb3_sa_form_detail_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_sa_form_id` int(11) NOT NULL,
  `plb3safds_ans_1` varchar(1) DEFAULT NULL,
  `plb3safds_ans_2` varchar(1) DEFAULT NULL,
  `plb3safds_ans_3` varchar(1) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_detail_static` (`plb3_sa_form_id`),
  CONSTRAINT `FK_plb3_sa_form_detail_static` FOREIGN KEY (`plb3_sa_form_id`) REFERENCES `plb3_sa_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form_detail_static` */

insert  into `plb3_sa_form_detail_static`(`id`,`plb3_sa_form_id`,`plb3safds_ans_1`,`plb3safds_ans_2`,`plb3safds_ans_3`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,'Y','N','Y',8,1492696550,8,1492703284);

/*Table structure for table `plb3_sa_form_detail_static_quarter` */

DROP TABLE IF EXISTS `plb3_sa_form_detail_static_quarter`;

CREATE TABLE `plb3_sa_form_detail_static_quarter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_sa_form_id` int(11) NOT NULL,
  `plb3safdsq_quarter` int(1) NOT NULL,
  `plb3safdsq_ans_1` varchar(1) DEFAULT NULL,
  `plb3safdsq_ans_2` varchar(1) DEFAULT NULL,
  `plb3safdsq_ans_3` varchar(1) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_detail_static_quarter` (`plb3_sa_form_id`),
  CONSTRAINT `FK_plb3_sa_form_detail_static_quarter` FOREIGN KEY (`plb3_sa_form_id`) REFERENCES `plb3_sa_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form_detail_static_quarter` */

insert  into `plb3_sa_form_detail_static_quarter`(`id`,`plb3_sa_form_id`,`plb3safdsq_quarter`,`plb3safdsq_ans_1`,`plb3safdsq_ans_2`,`plb3safdsq_ans_3`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,3,'Y','Y','Y',8,1492696552,8,1492703355),(2,3,4,'N','N','N',8,1492696552,8,1492703355),(3,3,1,'Y','Y','Y',8,1492696552,8,1492703355),(4,3,2,'N','N','N',8,1492696552,8,1492703355);

/*Table structure for table `plb3_sa_question` */

DROP TABLE IF EXISTS `plb3_sa_question`;

CREATE TABLE `plb3_sa_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(10) NOT NULL,
  `input_type_code` varchar(10) DEFAULT NULL,
  `label` text,
  `is_question` varchar(1) NOT NULL DEFAULT 'Y',
  `parent_id` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_question_self` (`parent_id`),
  CONSTRAINT `FK_plb3_sa_question_self` FOREIGN KEY (`parent_id`) REFERENCES `plb3_sa_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_question` */

insert  into `plb3_sa_question`(`id`,`category_code`,`input_type_code`,`label`,`is_question`,`parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'GNRL','FILE','<p>Jelaskan gambaran secara umum pengelolaan untuk masing-masing jenis limbah B3 yang dilakukan perusahaan Saudara, dan lengkapi dengan diagram proses produksi (maksimal 1 lembar A4):</p>','Y',NULL,8,1492344596,8,1492344596),(2,'HZRD','','<p><strong>Perizinan Pengelolaan Limbah B3</strong><strong></strong></p>','N',NULL,8,1492345665,8,1492420923),(3,'HZRD','YN','<p>- Memiliki izin pengelolaan limbah B3</p>','Y',2,8,1492345728,8,1492658462),(4,'HZRD','YN','<p>- Memiliki izin pengelolaan limbah B3</p>','Y',2,8,1492421349,8,1492421349),(5,'HZRD','','<p><strong>Pemenuhan ketentuan izin</strong><strong></strong></p>','N',NULL,8,1492421369,8,1492421369),(6,'HZRD','','<p><strong>a. Mengisi cheklist sesuai pengelolaan limbah B3 yang dilakukan (Form terlampir)</strong><strong></strong></p>','N',5,8,1492421386,8,1492421386),(7,'HZRD','PCT','<p>- Persentase pemenuhan ketentuan teknis pengelolaan limbah B3sesuai checklist yang telah diisi<br>(jika izin lebih dari satu, silahkan menambahkan baris)</p>','Y',6,8,1492421415,8,1492421415),(8,'HZRD','','<p><strong>Jumlah limbah B3 yang dikelola</strong><strong></strong></p>','N',NULL,8,1492421589,8,1492421589),(9,'HZRD','YN','- Apakah memiliki pencatatan jumlah limbah B3 yang telah dikelola selama periode penilaian','Y',8,8,1492421632,8,1492421632),(10,'HZRD','PCT','<p>-Prosentase Limbah B3 yang dikelola sesuai dengan ketentuan</p>','Y',8,8,1492421654,8,1492421654),(11,'HZRD','','<p><strong>Pengelolaan limbah B3 oleh pihak ke-3</strong><strong></strong></p>','N',NULL,8,1492421679,8,1492421679),(12,'HZRD','','<strong>a. Pengumpul/pengolah/pemanfaat/penimbun</strong><strong></strong>','N',11,8,1492421699,8,1492421699),(13,'HZRD','YN','<p>- Apakah limbah B3 dikelola oleh pihak ketiga (pengumpul/pengolah/pemanfaat/penimbun) yang berizin</p>','Y',12,8,1492421786,8,1492421786),(14,'HZRD','YN','<p>- Apakah memiliki kontrak kerja sama antara penghasil dengan pihak ketiga yang mengelola limbah B3 (pengumpul/pengolah/pemanfaat/penimbun)</p>','Y',12,8,1492421833,8,1492421833),(15,'HZRD','','<p><strong>b. Pengangkut</strong><strong></strong></p>','N',11,8,1492421865,8,1492421865),(16,'HZRD','YN','- Apakah pihak pengangkut memiliki rekomendasi pengangkutan limbah B3 dari KLH (PT. SEMEN BATURAJA PERSERO)','Y',15,8,1492421900,8,1492421900),(17,'HZRD','YN','- Apakah pihak pengangkut memiliki izin pengangkutan limbah B3 dari kementerian perhubungan ( PT. SEMEN BATURAJA PERSEO)','Y',15,8,1492421975,8,1492421975),(18,'HZRD','YN','- Apakah jenis limbah B3 yang diangkut telah sesuai dengan rekomendasi dan izin yang dimiliki oleh pihak pengangkut','Y',15,8,1492422000,8,1492422000),(19,'HZRD','YN','- Apakah pihak pengangkut memiliki dokumen manifest yang sah sesuai dengan ketentuan kep.Ka. Bapedal Nomor: Kep-02/Bapedal/09/1996','Y',15,8,1492422036,8,1492422036),(20,'HZRD','YN','- Apakah pihak pengangkut sedang memiliki permasalahan pencemaran lingkungan (PT. PRIMANRU JAYA)','Y',15,8,1492422054,8,1492422054),(21,'HZRD','YN','<p>- Apakah pihak ketiga (pengumpul/pengolah/pemanfaat/ penimbun) sedang memiliki permasalahan pencemaran lingkungan (PT. SEMEN BATURAJA PERSERO)</p>','Y',12,8,1492602290,8,1492602290);

/*Table structure for table `plb3_self_assessment` */

DROP TABLE IF EXISTS `plb3_self_assessment`;

CREATE TABLE `plb3_self_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `plb3_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_self_assessment_power_plant` (`power_plant_id`),
  KEY `FK_plb3_self_assessment_sector` (`sector_id`),
  CONSTRAINT `FK_plb3_self_assessment_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_self_assessment_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_self_assessment` */

insert  into `plb3_self_assessment`(`id`,`sector_id`,`power_plant_id`,`plb3_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,4,1,2016,8,1492149488,8,1492149488),(3,2,4,2017,8,1492946603,8,1492946603),(4,10,6,2016,8,1499234981,8,1499234981),(5,11,7,2017,8,1507126945,8,1507126945);

/*Table structure for table `plb3bsd_month` */

DROP TABLE IF EXISTS `plb3bsd_month`;

CREATE TABLE `plb3bsd_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_balance_sheet_treatment_id` int(11) NOT NULL,
  `plb3bsdm_month` int(2) NOT NULL,
  `plb3bsdm_year` int(4) NOT NULL,
  `plb3bsdm_value` decimal(10,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3bsd_month_balance_sheet_treatment` (`plb3_balance_sheet_treatment_id`),
  CONSTRAINT `FK_plb3bsd_month_balance_sheet_treatment` FOREIGN KEY (`plb3_balance_sheet_treatment_id`) REFERENCES `plb3_balance_sheet_treatment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1465 DEFAULT CHARSET=latin1;

/*Data for the table `plb3bsd_month` */

insert  into `plb3bsd_month`(`id`,`plb3_balance_sheet_treatment_id`,`plb3bsdm_month`,`plb3bsdm_year`,`plb3bsdm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (961,128,7,2016,'1710.00',8,1492281063,8,1492410673),(962,128,8,2016,'1152.00',8,1492281064,8,1492410673),(963,128,9,2016,'1386.00',8,1492281064,8,1492410673),(964,128,10,2016,'1188.00',8,1492281064,8,1492410673),(965,128,11,2016,'1134.00',8,1492281064,8,1492410673),(966,128,12,2016,'1044.00',8,1492281064,8,1492410673),(967,128,1,2017,'684.00',8,1492281064,8,1492410673),(968,128,2,2017,'828.00',8,1492281064,8,1492410673),(969,128,3,2017,'1458.00',8,1492281064,8,1492410673),(970,128,4,2017,NULL,8,1492281064,8,1492410673),(971,128,5,2017,NULL,8,1492281064,8,1492410673),(972,128,6,2017,NULL,8,1492281064,8,1492410673),(973,130,7,2016,'0.00',8,1492281064,8,1492410673),(974,130,8,2016,'0.00',8,1492281064,8,1492410673),(975,130,9,2016,'0.00',8,1492281064,8,1492410673),(976,130,10,2016,'0.00',8,1492281064,8,1492410673),(977,130,11,2016,'0.00',8,1492281064,8,1492410673),(978,130,12,2016,'0.00',8,1492281064,8,1492410673),(979,130,1,2017,'0.00',8,1492281064,8,1492410673),(980,130,2,2017,'0.00',8,1492281064,8,1492410673),(981,130,3,2017,'0.00',8,1492281064,8,1492410673),(982,130,4,2017,'0.00',8,1492281064,8,1492410673),(983,130,5,2017,'0.00',8,1492281064,8,1492410673),(984,130,6,2017,'0.00',8,1492281064,8,1492410673),(985,131,7,2016,'0.00',8,1492281064,8,1492410673),(986,131,8,2016,'0.00',8,1492281064,8,1492410673),(987,131,9,2016,'0.00',8,1492281064,8,1492410673),(988,131,10,2016,'0.00',8,1492281064,8,1492410673),(989,131,11,2016,'0.00',8,1492281064,8,1492410673),(990,131,12,2016,'0.00',8,1492281064,8,1492410673),(991,131,1,2017,'0.00',8,1492281064,8,1492410673),(992,131,2,2017,'0.00',8,1492281064,8,1492410673),(993,131,3,2017,'0.00',8,1492281064,8,1492410673),(994,131,4,2017,'0.00',8,1492281064,8,1492410673),(995,131,5,2017,'0.00',8,1492281064,8,1492410673),(996,131,6,2017,'0.00',8,1492281064,8,1492410673),(997,132,7,2016,'0.00',8,1492281064,8,1492410673),(998,132,8,2016,'0.00',8,1492281064,8,1492410673),(999,132,9,2016,'0.00',8,1492281064,8,1492410673),(1000,132,10,2016,'0.00',8,1492281064,8,1492410673),(1001,132,11,2016,'0.00',8,1492281064,8,1492410673),(1002,132,12,2016,'0.00',8,1492281064,8,1492410673),(1003,132,1,2017,'0.00',8,1492281064,8,1492410673),(1004,132,2,2017,'0.00',8,1492281064,8,1492410673),(1005,132,3,2017,'0.00',8,1492281064,8,1492410673),(1006,132,4,2017,'0.00',8,1492281064,8,1492410673),(1007,132,5,2017,'0.00',8,1492281064,8,1492410673),(1008,132,6,2017,'0.00',8,1492281064,8,1492410673),(1009,133,7,2016,'163.28',8,1492281064,8,1492410673),(1010,133,8,2016,'373.91',8,1492281064,8,1492410673),(1011,133,9,2016,'474.63',8,1492281064,8,1492410673),(1012,133,10,2016,'507.87',8,1492281064,8,1492410673),(1013,133,11,2016,'662.79',8,1492281064,8,1492410673),(1014,133,12,2016,'639.58',8,1492281064,8,1492410673),(1015,133,1,2017,'276.82',8,1492281064,8,1492410673),(1016,133,2,2017,'423.48',8,1492281064,8,1492410673),(1017,133,3,2017,'402.21',8,1492281064,8,1492410673),(1018,133,4,2017,'0.00',8,1492281064,8,1492410673),(1019,133,5,2017,'0.00',8,1492281064,8,1492410673),(1020,133,6,2017,'0.00',8,1492281064,8,1492410673),(1021,134,7,2016,'0.00',8,1492281064,8,1492410673),(1022,134,8,2016,'0.00',8,1492281064,8,1492410673),(1023,134,9,2016,'0.00',8,1492281064,8,1492410673),(1024,134,10,2016,'0.00',8,1492281064,8,1492410673),(1025,134,11,2016,'0.00',8,1492281064,8,1492410673),(1026,134,12,2016,'0.00',8,1492281064,8,1492410673),(1027,134,1,2017,'0.00',8,1492281064,8,1492410673),(1028,134,2,2017,'0.00',8,1492281064,8,1492410673),(1029,134,3,2017,'0.00',8,1492281064,8,1492410673),(1030,134,4,2017,'0.00',8,1492281064,8,1492410673),(1031,134,5,2017,'0.00',8,1492281064,8,1492410673),(1032,134,6,2017,'0.00',8,1492281064,8,1492410673),(1033,135,7,2016,'123.00',8,1492366292,8,1492366292),(1034,135,8,2016,'123.00',8,1492366292,8,1492366292),(1035,135,9,2016,NULL,8,1492366292,8,1492366292),(1036,135,10,2016,NULL,8,1492366292,8,1492366292),(1037,135,11,2016,NULL,8,1492366292,8,1492366292),(1038,135,12,2016,NULL,8,1492366292,8,1492366292),(1039,135,1,2017,NULL,8,1492366292,8,1492366292),(1040,135,2,2017,NULL,8,1492366292,8,1492366292),(1041,135,3,2017,NULL,8,1492366292,8,1492366292),(1042,135,4,2017,NULL,8,1492366292,8,1492366292),(1043,135,5,2017,NULL,8,1492366292,8,1492366292),(1044,135,6,2017,NULL,8,1492366292,8,1492366292),(1045,137,7,2016,'123.00',8,1492366292,8,1492366292),(1046,137,8,2016,'123.00',8,1492366292,8,1492366292),(1047,137,9,2016,NULL,8,1492366292,8,1492366292),(1048,137,10,2016,NULL,8,1492366292,8,1492366292),(1049,137,11,2016,NULL,8,1492366292,8,1492366292),(1050,137,12,2016,NULL,8,1492366292,8,1492366292),(1051,137,1,2017,NULL,8,1492366292,8,1492366292),(1052,137,2,2017,NULL,8,1492366293,8,1492366293),(1053,137,3,2017,NULL,8,1492366293,8,1492366293),(1054,137,4,2017,NULL,8,1492366293,8,1492366293),(1055,137,5,2017,NULL,8,1492366293,8,1492366293),(1056,137,6,2017,NULL,8,1492366293,8,1492366293),(1057,138,7,2016,NULL,8,1492366293,8,1492366293),(1058,138,8,2016,NULL,8,1492366293,8,1492366293),(1059,138,9,2016,NULL,8,1492366293,8,1492366293),(1060,138,10,2016,NULL,8,1492366293,8,1492366293),(1061,138,11,2016,NULL,8,1492366293,8,1492366293),(1062,138,12,2016,NULL,8,1492366293,8,1492366293),(1063,138,1,2017,NULL,8,1492366293,8,1492366293),(1064,138,2,2017,NULL,8,1492366293,8,1492366293),(1065,138,3,2017,NULL,8,1492366293,8,1492366293),(1066,138,4,2017,NULL,8,1492366293,8,1492366293),(1067,138,5,2017,NULL,8,1492366293,8,1492366293),(1068,138,6,2017,NULL,8,1492366293,8,1492366293),(1069,139,7,2016,NULL,8,1492366293,8,1492366293),(1070,139,8,2016,NULL,8,1492366293,8,1492366293),(1071,139,9,2016,NULL,8,1492366293,8,1492366293),(1072,139,10,2016,NULL,8,1492366293,8,1492366293),(1073,139,11,2016,NULL,8,1492366293,8,1492366293),(1074,139,12,2016,NULL,8,1492366293,8,1492366293),(1075,139,1,2017,NULL,8,1492366293,8,1492366293),(1076,139,2,2017,NULL,8,1492366293,8,1492366293),(1077,139,3,2017,NULL,8,1492366293,8,1492366293),(1078,139,4,2017,NULL,8,1492366293,8,1492366293),(1079,139,5,2017,NULL,8,1492366293,8,1492366293),(1080,139,6,2017,NULL,8,1492366293,8,1492366293),(1081,140,7,2016,NULL,8,1492366293,8,1492366293),(1082,140,8,2016,NULL,8,1492366293,8,1492366293),(1083,140,9,2016,NULL,8,1492366293,8,1492366293),(1084,140,10,2016,NULL,8,1492366293,8,1492366293),(1085,140,11,2016,NULL,8,1492366293,8,1492366293),(1086,140,12,2016,NULL,8,1492366293,8,1492366293),(1087,140,1,2017,NULL,8,1492366293,8,1492366293),(1088,140,2,2017,NULL,8,1492366293,8,1492366293),(1089,140,3,2017,NULL,8,1492366293,8,1492366293),(1090,140,4,2017,NULL,8,1492366293,8,1492366293),(1091,140,5,2017,NULL,8,1492366293,8,1492366293),(1092,140,6,2017,NULL,8,1492366293,8,1492366293),(1093,141,7,2016,NULL,8,1492366293,8,1492366293),(1094,141,8,2016,NULL,8,1492366293,8,1492366293),(1095,141,9,2016,NULL,8,1492366293,8,1492366293),(1096,141,10,2016,NULL,8,1492366293,8,1492366293),(1097,141,11,2016,NULL,8,1492366293,8,1492366293),(1098,141,12,2016,NULL,8,1492366293,8,1492366293),(1099,141,1,2017,NULL,8,1492366293,8,1492366293),(1100,141,2,2017,NULL,8,1492366293,8,1492366293),(1101,141,3,2017,NULL,8,1492366293,8,1492366293),(1102,141,4,2017,NULL,8,1492366293,8,1492366293),(1103,141,5,2017,NULL,8,1492366293,8,1492366293),(1104,141,6,2017,NULL,8,1492366293,8,1492366293),(1177,149,7,2016,'12312.00',8,1492416280,8,1492416280),(1178,149,8,2016,'3123.00',8,1492416280,8,1492416280),(1179,149,9,2016,'123.00',8,1492416280,8,1492416280),(1180,149,10,2016,'123.00',8,1492416280,8,1492416280),(1181,149,11,2016,'123.00',8,1492416280,8,1492416280),(1182,149,12,2016,'123123.00',8,1492416280,8,1492416280),(1183,149,1,2017,'323.00',8,1492416280,8,1492416280),(1184,149,2,2017,'414.00',8,1492416280,8,1492416280),(1185,149,3,2017,NULL,8,1492416280,8,1492416280),(1186,149,4,2017,NULL,8,1492416280,8,1492416280),(1187,149,5,2017,NULL,8,1492416280,8,1492416280),(1188,149,6,2017,NULL,8,1492416280,8,1492416280),(1189,151,7,2016,NULL,8,1492416280,8,1492416280),(1190,151,8,2016,NULL,8,1492416280,8,1492416280),(1191,151,9,2016,NULL,8,1492416280,8,1492416280),(1192,151,10,2016,NULL,8,1492416280,8,1492416280),(1193,151,11,2016,NULL,8,1492416280,8,1492416280),(1194,151,12,2016,NULL,8,1492416280,8,1492416280),(1195,151,1,2017,NULL,8,1492416280,8,1492416280),(1196,151,2,2017,'42423.00',8,1492416280,8,1492416280),(1197,151,3,2017,NULL,8,1492416280,8,1492416280),(1198,151,4,2017,NULL,8,1492416280,8,1492416280),(1199,151,5,2017,NULL,8,1492416280,8,1492416280),(1200,151,6,2017,NULL,8,1492416280,8,1492416280),(1201,152,7,2016,NULL,8,1492416280,8,1492416280),(1202,152,8,2016,NULL,8,1492416280,8,1492416280),(1203,152,9,2016,'123.00',8,1492416280,8,1492416280),(1204,152,10,2016,'123.00',8,1492416280,8,1492416280),(1205,152,11,2016,'123.00',8,1492416280,8,1492416280),(1206,152,12,2016,'123.00',8,1492416280,8,1492416280),(1207,152,1,2017,NULL,8,1492416280,8,1492416280),(1208,152,2,2017,'244.00',8,1492416280,8,1492416280),(1209,152,3,2017,NULL,8,1492416280,8,1492416280),(1210,152,4,2017,NULL,8,1492416280,8,1492416280),(1211,152,5,2017,NULL,8,1492416281,8,1492416281),(1212,152,6,2017,NULL,8,1492416281,8,1492416281),(1213,153,7,2016,NULL,8,1492416281,8,1492416281),(1214,153,8,2016,NULL,8,1492416281,8,1492416281),(1215,153,9,2016,'123.00',8,1492416281,8,1492416281),(1216,153,10,2016,NULL,8,1492416281,8,1492416281),(1217,153,11,2016,NULL,8,1492416281,8,1492416281),(1218,153,12,2016,NULL,8,1492416281,8,1492416281),(1219,153,1,2017,'3.00',8,1492416281,8,1492416281),(1220,153,2,2017,'124.00',8,1492416281,8,1492416281),(1221,153,3,2017,NULL,8,1492416281,8,1492416281),(1222,153,4,2017,NULL,8,1492416281,8,1492416281),(1223,153,5,2017,NULL,8,1492416281,8,1492416281),(1224,153,6,2017,NULL,8,1492416281,8,1492416281),(1225,154,7,2016,NULL,8,1492416281,8,1492416281),(1226,154,8,2016,NULL,8,1492416281,8,1492416281),(1227,154,9,2016,'3123.00',8,1492416281,8,1492416281),(1228,154,10,2016,'123.00',8,1492416281,8,1492416281),(1229,154,11,2016,NULL,8,1492416281,8,1492416281),(1230,154,12,2016,'123.00',8,1492416281,8,1492416281),(1231,154,1,2017,NULL,8,1492416281,8,1492416281),(1232,154,2,2017,'12.00',8,1492416281,8,1492416281),(1233,154,3,2017,NULL,8,1492416281,8,1492416281),(1234,154,4,2017,NULL,8,1492416281,8,1492416281),(1235,154,5,2017,NULL,8,1492416281,8,1492416281),(1236,154,6,2017,NULL,8,1492416281,8,1492416281),(1237,155,7,2016,NULL,8,1492416281,8,1492416281),(1238,155,8,2016,NULL,8,1492416281,8,1492416281),(1239,155,9,2016,NULL,8,1492416281,8,1492416281),(1240,155,10,2016,NULL,8,1492416281,8,1492416281),(1241,155,11,2016,NULL,8,1492416281,8,1492416281),(1242,155,12,2016,NULL,8,1492416281,8,1492416281),(1243,155,1,2017,'123.00',8,1492416281,8,1492416281),(1244,155,2,2017,NULL,8,1492416281,8,1492416281),(1245,155,3,2017,NULL,8,1492416281,8,1492416281),(1246,155,4,2017,NULL,8,1492416281,8,1492416281),(1247,155,5,2017,NULL,8,1492416281,8,1492416281),(1248,155,6,2017,NULL,8,1492416281,8,1492416281),(1321,163,7,2015,'150.00',8,1507871214,8,1507871214),(1322,163,8,2015,'154.00',8,1507871214,8,1507871214),(1323,163,9,2015,'164.00',8,1507871214,8,1507871214),(1324,163,10,2015,'7678.00',8,1507871214,8,1507871214),(1325,163,11,2015,'787.00',8,1507871214,8,1507871214),(1326,163,12,2015,'8.00',8,1507871214,8,1507871214),(1327,163,1,2016,'78.00',8,1507871214,8,1507871214),(1328,163,2,2016,'787.00',8,1507871214,8,1507871214),(1329,163,3,2016,'87.00',8,1507871214,8,1507871214),(1330,163,4,2016,'7.00',8,1507871214,8,1507871214),(1331,163,5,2016,'79.00',8,1507871214,8,1507871214),(1332,163,6,2016,'7979.00',8,1507871214,8,1507871214),(1333,165,7,2015,'1156.00',8,1507871214,8,1507871214),(1334,165,8,2015,'165.00',8,1507871214,8,1507871214),(1335,165,9,2015,'156.00',8,1507871214,8,1507871214),(1336,165,10,2015,'156.00',8,1507871214,8,1507871214),(1337,165,11,2015,'16.00',8,1507871214,8,1507871214),(1338,165,12,2015,NULL,8,1507871214,8,1507871214),(1339,165,1,2016,NULL,8,1507871214,8,1507871214),(1340,165,2,2016,'161.00',8,1507871214,8,1507871214),(1341,165,3,2016,'165.00',8,1507871214,8,1507871214),(1342,165,4,2016,'46.00',8,1507871214,8,1507871214),(1343,165,5,2016,'54.00',8,1507871214,8,1507871214),(1344,165,6,2016,'5.00',8,1507871214,8,1507871214),(1345,166,7,2015,'651.00',8,1507871214,8,1507871214),(1346,166,8,2015,NULL,8,1507871215,8,1507871215),(1347,166,9,2015,'651.00',8,1507871215,8,1507871215),(1348,166,10,2015,'16.00',8,1507871215,8,1507871215),(1349,166,11,2015,NULL,8,1507871215,8,1507871215),(1350,166,12,2015,NULL,8,1507871215,8,1507871215),(1351,166,1,2016,NULL,8,1507871215,8,1507871215),(1352,166,2,2016,NULL,8,1507871215,8,1507871215),(1353,166,3,2016,NULL,8,1507871215,8,1507871215),(1354,166,4,2016,NULL,8,1507871215,8,1507871215),(1355,166,5,2016,NULL,8,1507871215,8,1507871215),(1356,166,6,2016,NULL,8,1507871215,8,1507871215),(1357,167,7,2015,'15.00',8,1507871215,8,1507871215),(1358,167,8,2015,'1545.00',8,1507871215,8,1507871215),(1359,167,9,2015,'1564.00',8,1507871215,8,1507871215),(1360,167,10,2015,'1564.00',8,1507871215,8,1507871215),(1361,167,11,2015,NULL,8,1507871215,8,1507871215),(1362,167,12,2015,NULL,8,1507871215,8,1507871215),(1363,167,1,2016,NULL,8,1507871215,8,1507871215),(1364,167,2,2016,NULL,8,1507871215,8,1507871215),(1365,167,3,2016,NULL,8,1507871215,8,1507871215),(1366,167,4,2016,NULL,8,1507871215,8,1507871215),(1367,167,5,2016,NULL,8,1507871215,8,1507871215),(1368,167,6,2016,NULL,8,1507871215,8,1507871215),(1369,168,7,2015,'561.00',8,1507871215,8,1507871215),(1370,168,8,2015,'156.00',8,1507871215,8,1507871215),(1371,168,9,2015,'16.00',8,1507871215,8,1507871215),(1372,168,10,2015,'165.00',8,1507871215,8,1507871215),(1373,168,11,2015,NULL,8,1507871215,8,1507871215),(1374,168,12,2015,NULL,8,1507871215,8,1507871215),(1375,168,1,2016,NULL,8,1507871215,8,1507871215),(1376,168,2,2016,NULL,8,1507871215,8,1507871215),(1377,168,3,2016,NULL,8,1507871215,8,1507871215),(1378,168,4,2016,NULL,8,1507871215,8,1507871215),(1379,168,5,2016,NULL,8,1507871215,8,1507871215),(1380,168,6,2016,NULL,8,1507871215,8,1507871215),(1381,169,7,2015,'26.00',8,1507871215,8,1507871215),(1382,169,8,2015,NULL,8,1507871215,8,1507871215),(1383,169,9,2015,'62.00',8,1507871215,8,1507871215),(1384,169,10,2015,NULL,8,1507871215,8,1507871215),(1385,169,11,2015,NULL,8,1507871215,8,1507871215),(1386,169,12,2015,NULL,8,1507871215,8,1507871215),(1387,169,1,2016,NULL,8,1507871215,8,1507871215),(1388,169,2,2016,NULL,8,1507871215,8,1507871215),(1389,169,3,2016,NULL,8,1507871215,8,1507871215),(1390,169,4,2016,NULL,8,1507871215,8,1507871215),(1391,169,5,2016,NULL,8,1507871215,8,1507871215),(1392,169,6,2016,NULL,8,1507871215,8,1507871215),(1393,170,7,2015,'50.00',8,1507871360,8,1507871360),(1394,170,8,2015,'25.00',8,1507871360,8,1507871360),(1395,170,9,2015,NULL,8,1507871360,8,1507871360),(1396,170,10,2015,NULL,8,1507871360,8,1507871360),(1397,170,11,2015,NULL,8,1507871360,8,1507871360),(1398,170,12,2015,NULL,8,1507871360,8,1507871360),(1399,170,1,2016,NULL,8,1507871360,8,1507871360),(1400,170,2,2016,NULL,8,1507871360,8,1507871360),(1401,170,3,2016,NULL,8,1507871360,8,1507871360),(1402,170,4,2016,NULL,8,1507871360,8,1507871360),(1403,170,5,2016,NULL,8,1507871360,8,1507871360),(1404,170,6,2016,NULL,8,1507871360,8,1507871360),(1405,172,7,2015,NULL,8,1507871360,8,1507871360),(1406,172,8,2015,NULL,8,1507871360,8,1507871360),(1407,172,9,2015,NULL,8,1507871360,8,1507871360),(1408,172,10,2015,NULL,8,1507871360,8,1507871360),(1409,172,11,2015,NULL,8,1507871360,8,1507871360),(1410,172,12,2015,NULL,8,1507871360,8,1507871360),(1411,172,1,2016,NULL,8,1507871360,8,1507871360),(1412,172,2,2016,NULL,8,1507871360,8,1507871360),(1413,172,3,2016,NULL,8,1507871360,8,1507871360),(1414,172,4,2016,NULL,8,1507871360,8,1507871360),(1415,172,5,2016,NULL,8,1507871360,8,1507871360),(1416,172,6,2016,NULL,8,1507871360,8,1507871360),(1417,173,7,2015,NULL,8,1507871360,8,1507871360),(1418,173,8,2015,NULL,8,1507871360,8,1507871360),(1419,173,9,2015,NULL,8,1507871360,8,1507871360),(1420,173,10,2015,NULL,8,1507871360,8,1507871360),(1421,173,11,2015,NULL,8,1507871360,8,1507871360),(1422,173,12,2015,NULL,8,1507871360,8,1507871360),(1423,173,1,2016,NULL,8,1507871360,8,1507871360),(1424,173,2,2016,NULL,8,1507871360,8,1507871360),(1425,173,3,2016,NULL,8,1507871360,8,1507871360),(1426,173,4,2016,NULL,8,1507871360,8,1507871360),(1427,173,5,2016,NULL,8,1507871360,8,1507871360),(1428,173,6,2016,NULL,8,1507871360,8,1507871360),(1429,174,7,2015,NULL,8,1507871360,8,1507871360),(1430,174,8,2015,NULL,8,1507871360,8,1507871360),(1431,174,9,2015,NULL,8,1507871360,8,1507871360),(1432,174,10,2015,NULL,8,1507871360,8,1507871360),(1433,174,11,2015,NULL,8,1507871360,8,1507871360),(1434,174,12,2015,NULL,8,1507871360,8,1507871360),(1435,174,1,2016,NULL,8,1507871360,8,1507871360),(1436,174,2,2016,NULL,8,1507871360,8,1507871360),(1437,174,3,2016,NULL,8,1507871360,8,1507871360),(1438,174,4,2016,NULL,8,1507871360,8,1507871360),(1439,174,5,2016,NULL,8,1507871360,8,1507871360),(1440,174,6,2016,NULL,8,1507871360,8,1507871360),(1441,175,7,2015,NULL,8,1507871360,8,1507871360),(1442,175,8,2015,NULL,8,1507871360,8,1507871360),(1443,175,9,2015,NULL,8,1507871360,8,1507871360),(1444,175,10,2015,NULL,8,1507871360,8,1507871360),(1445,175,11,2015,NULL,8,1507871360,8,1507871360),(1446,175,12,2015,NULL,8,1507871360,8,1507871360),(1447,175,1,2016,NULL,8,1507871360,8,1507871360),(1448,175,2,2016,NULL,8,1507871360,8,1507871360),(1449,175,3,2016,NULL,8,1507871360,8,1507871360),(1450,175,4,2016,NULL,8,1507871360,8,1507871360),(1451,175,5,2016,NULL,8,1507871360,8,1507871360),(1452,175,6,2016,NULL,8,1507871360,8,1507871360),(1453,176,7,2015,NULL,8,1507871360,8,1507871360),(1454,176,8,2015,NULL,8,1507871360,8,1507871360),(1455,176,9,2015,NULL,8,1507871360,8,1507871360),(1456,176,10,2015,NULL,8,1507871360,8,1507871360),(1457,176,11,2015,NULL,8,1507871360,8,1507871360),(1458,176,12,2015,NULL,8,1507871360,8,1507871360),(1459,176,1,2016,NULL,8,1507871360,8,1507871360),(1460,176,2,2016,NULL,8,1507871360,8,1507871360),(1461,176,3,2016,NULL,8,1507871360,8,1507871360),(1462,176,4,2016,NULL,8,1507871360,8,1507871360),(1463,176,5,2016,NULL,8,1507871360,8,1507871360),(1464,176,6,2016,NULL,8,1507871360,8,1507871360);

/*Table structure for table `pmd_month` */

DROP TABLE IF EXISTS `pmd_month`;

CREATE TABLE `pmd_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p3k_monitoring_detail_id` int(11) NOT NULL,
  `pmdm_month` int(2) NOT NULL,
  `pmdm_value` varchar(50) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pmd_month` (`p3k_monitoring_detail_id`),
  CONSTRAINT `FK_pmd_month` FOREIGN KEY (`p3k_monitoring_detail_id`) REFERENCES `p3k_monitoring_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `pmd_month` */

insert  into `pmd_month`(`id`,`p3k_monitoring_detail_id`,`pmdm_month`,`pmdm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,1,'12312',8,1511777113,8,1511777113),(2,1,2,'',8,1511777113,8,1511777113),(3,1,3,'',8,1511777113,8,1511777113),(4,1,4,'123',8,1511777113,8,1511777113),(5,1,5,'',8,1511777113,8,1511777113),(6,1,6,'',8,1511777113,8,1511777113),(7,1,7,'123',8,1511777113,8,1511777113),(8,1,8,'',8,1511777113,8,1511777113),(9,1,9,'',8,1511777113,8,1511777113),(10,1,10,'',8,1511777113,8,1511777113),(11,1,11,'',8,1511777113,8,1511777113),(12,1,12,'',8,1511777113,8,1511777113);

/*Table structure for table `power_plant` */

DROP TABLE IF EXISTS `power_plant`;

CREATE TABLE `power_plant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `pp_name` varchar(150) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_power_plant_sector` (`sector_id`),
  CONSTRAINT `FK_power_plant_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `power_plant` */

insert  into `power_plant`(`id`,`sector_id`,`pp_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,'Kantor Sektor',8,1479444423,8,1495616793),(2,4,'PLTG Batanghari',8,1479444739,8,1495616811),(3,4,'PLTMG Sei Gelam',8,1479444770,8,1495616832),(4,2,'Kantor Sektor',8,1479444945,8,1495616676),(5,7,'Kantor Sektor',8,1479445219,8,1495617078),(6,10,'Kantor Induk',8,1495616509,8,1495616509),(7,11,'PLTU Ombilin',8,1495616543,8,1495616543),(8,11,'PLTG Pauh Limo',8,1495616554,8,1495616554),(9,8,'PLTU Bukit Asam',8,1495616599,8,1495616599),(10,9,'PLTU Tarahan',8,1495616608,8,1495616608),(11,12,'PLTU Teluk Sirih',8,1495616617,8,1495616617),(12,13,'PLTU Sebalang',8,1495616628,8,1495616628),(13,2,'PLTG Keramasan',8,1495616705,8,1495616705),(14,2,'PLTGU Indralaya',8,1495616713,8,1495616713),(15,2,'PLTG Borang',8,1495616725,8,1495616725),(16,2,'PLTG Jakabaring',8,1495616734,8,1495616734),(17,2,'PLTG Talang Duku',8,1495616754,8,1495616754),(18,2,'PLTD Sungai Juaro',8,1495616764,8,1495616764),(19,5,'Kantor Sektor',8,1495616874,8,1495616874),(20,5,'PLTP Ulubelu',8,1495616882,8,1495616882),(21,5,'PLTD Tegineneng',8,1495616893,8,1495616893),(22,5,'PLTD Teluk Betung',8,1495616903,8,1495616903),(23,5,'PLTD/G Tarahan',8,1495616912,8,1495616912),(24,5,'PLTA Besai',8,1495616921,8,1495616921),(25,5,'PLTA Batutegi',8,1495616930,8,1495616930),(26,6,'Kantor Sektor',8,1495616993,8,1495616993),(27,6,'PLTA Maninjau',8,1495617002,8,1495617002),(28,6,'PLTA Singkarak',8,1495617012,8,1495617012),(29,6,'PLTA Batang Agam',8,1495617021,8,1495617021),(30,7,'PLTA Musi',8,1495617090,8,1495617090),(31,7,'PLTA Tes',8,1495617100,8,1495617100);

/*Table structure for table `ppa` */

DROP TABLE IF EXISTS `ppa`;

CREATE TABLE `ppa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ppa_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_sector` (`sector_id`),
  KEY `FK_ppa_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_ppa_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ppa_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ppa` */

insert  into `ppa`(`id`,`sector_id`,`power_plant_id`,`ppa_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,2017,8,1487233107,8,1487233107),(2,7,5,2017,8,1487233182,8,1487233182),(3,2,4,2017,8,1487479047,8,1487479047);

/*Table structure for table `ppa_ba` */

DROP TABLE IF EXISTS `ppa_ba`;

CREATE TABLE `ppa_ba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ppaba_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_sector` (`sector_id`),
  KEY `FK_ppa_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_ppa_ba_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_ppa_ba_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_ba` */

insert  into `ppa_ba`(`id`,`sector_id`,`power_plant_id`,`ppaba_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,1,2017,8,1490334284,8,1490334284),(2,4,2,2016,8,1490334436,8,1490334436),(3,2,4,1234,8,1491714734,8,1491714734);

/*Table structure for table `ppa_ba_concentration` */

DROP TABLE IF EXISTS `ppa_ba_concentration`;

CREATE TABLE `ppa_ba_concentration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_ba_report_bm_id` int(11) NOT NULL,
  `ppabac_month` int(2) DEFAULT NULL,
  `ppabac_year` int(4) DEFAULT NULL,
  `ppabac_value` decimal(21,12) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_ba_consentration_report_bm` (`ppa_ba_report_bm_id`),
  CONSTRAINT `FK_ppa_ba_consentration_report_bm` FOREIGN KEY (`ppa_ba_report_bm_id`) REFERENCES `ppa_ba_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_ba_concentration` */

insert  into `ppa_ba_concentration`(`id`,`ppa_ba_report_bm_id`,`ppabac_month`,`ppabac_year`,`ppabac_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,7,2016,'7.200000000000',8,1490518613,8,1490520116),(2,1,8,2016,'7.940000000000',8,1490518613,8,1490520116),(3,1,9,2016,'7.480000000000',8,1490518613,8,1490520116),(4,1,10,2016,'7.140000000000',8,1490518613,8,1490520116),(5,1,11,2016,'7.240000000000',8,1490518613,8,1490520116),(6,1,12,2016,'7.510000000000',8,1490518613,8,1490520116),(7,1,1,2017,'7.260000000000',8,1490518613,8,1490520116),(8,1,2,2017,'7.780000000000',8,1490518613,8,1490520116),(9,1,3,2017,'7.910000000000',8,1490518613,8,1490520116),(10,1,4,2017,'7.090000000000',8,1490518613,8,1490520116),(11,1,5,2017,'0.000000000000',8,1490518613,8,1490520116),(12,1,6,2017,'0.000000000000',8,1490518613,8,1490520116),(13,2,7,2016,'1.000000000000',8,1490518713,8,1490518713),(14,2,8,2016,'5.000000000000',8,1490518713,8,1490518713),(15,2,9,2016,'2.000000000000',8,1490518713,8,1490518713),(16,2,10,2016,'0.000000000000',8,1490518713,8,1490518713),(17,2,11,2016,'10.000000000000',8,1490518713,8,1490518713),(18,2,12,2016,'1.000000000000',8,1490518713,8,1490518713),(19,2,1,2017,'3.000000000000',8,1490518713,8,1490518713),(20,2,2,2017,'5.000000000000',8,1490518713,8,1490518713),(21,2,3,2017,'4.000000000000',8,1490518713,8,1490518713),(22,2,4,2017,'6.000000000000',8,1490518713,8,1490518713),(23,2,5,2017,NULL,8,1490518713,8,1490518713),(24,2,6,2017,NULL,8,1490518713,8,1490518713),(25,3,7,2016,'1.000000000000',8,1490518840,8,1490518840),(26,3,8,2016,'3.000000000000',8,1490518840,8,1490518840),(27,3,9,2016,'1.000000000000',8,1490518840,8,1490518840),(28,3,10,2016,'3.000000000000',8,1490518840,8,1490518840),(29,3,11,2016,'2.000000000000',8,1490518840,8,1490518840),(30,3,12,2016,'1.000000000000',8,1490518840,8,1490518840),(31,3,1,2017,'0.400000000000',8,1490518840,8,1490518840),(32,3,2,2017,'1.900000000000',8,1490518840,8,1490518840),(33,3,3,2017,'1.100000000000',8,1490518840,8,1490518840),(34,3,4,2017,'1.900000000000',8,1490518840,8,1490518840),(35,3,5,2017,NULL,8,1490518840,8,1490518840),(36,3,6,2017,NULL,8,1490518840,8,1490518840),(37,4,7,2016,'1395.000000000000',8,1490518920,8,1490518920),(38,4,8,2016,'1395.000000000000',8,1490518920,8,1490518920),(39,4,9,2016,'1350.000000000000',8,1490518920,8,1490518920),(40,4,10,2016,'1395.000000000000',8,1490518920,8,1490518920),(41,4,11,2016,'1350.000000000000',8,1490518920,8,1490518920),(42,4,12,2016,'1395.000000000000',8,1490518920,8,1490518920),(43,4,1,2017,'1395.000000000000',8,1490518920,8,1490518920),(44,4,2,2017,'1305.000000000000',8,1490518920,8,1490518920),(45,4,3,2017,'1395.000000000000',8,1490518920,8,1490518920),(46,4,4,2017,'1395.000000000000',8,1490518920,8,1490518920),(47,4,5,2017,NULL,8,1490518920,8,1490518920),(48,4,6,2017,NULL,8,1490518920,8,1490518920),(49,5,7,2016,'121252677.000000000000',8,1490519268,8,1490519268),(50,5,8,2016,'124272600.000000000000',8,1490519268,8,1490519268),(51,5,9,2016,'130266044.000000000000',8,1490519268,8,1490519268),(52,5,10,2016,'116507959.000000000000',8,1490519268,8,1490519268),(53,5,11,2016,'74002945.000000000000',8,1490519268,8,1490519268),(54,5,12,2016,'83155247.000000000000',8,1490519268,8,1490519268),(55,5,1,2017,'77516071.000000000000',8,1490519268,8,1490519268),(56,5,2,2017,'89188124.505899995565',8,1490519268,8,1490519268),(57,5,3,2017,'63281097.520000003278',8,1490519268,8,1490519268),(58,5,4,2017,'49570318.465145699680',8,1490519268,8,1490519268),(59,5,5,2017,NULL,8,1490519268,8,1490519268),(60,5,6,2017,NULL,8,1490519268,8,1490519268);

/*Table structure for table `ppa_ba_monitoring_point` */

DROP TABLE IF EXISTS `ppa_ba_monitoring_point`;

CREATE TABLE `ppa_ba_monitoring_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_ba_id` int(11) NOT NULL,
  `ppabamp_wastewater_source` varchar(150) DEFAULT NULL,
  `ppabamp_monitoring_point_name` varchar(150) DEFAULT NULL,
  `ppabamp_coord_lat` varchar(50) DEFAULT NULL,
  `ppabamp_coord_long` varchar(50) DEFAULT NULL,
  `ppabamp_document_name` varchar(150) DEFAULT NULL,
  `ppabamp_permit_publisher` varchar(150) DEFAULT NULL,
  `ppabamp_validation_date` date DEFAULT NULL,
  `ppabamp_monitoring_frequency_code` varchar(10) DEFAULT NULL,
  `ppabamp_monitoring_status_code` varchar(10) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_ba_monitoring_point` (`ppa_ba_id`),
  CONSTRAINT `FK_ppa_ba_monitoring_point` FOREIGN KEY (`ppa_ba_id`) REFERENCES `ppa_ba` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_ba_monitoring_point` */

insert  into `ppa_ba_monitoring_point`(`id`,`ppa_ba_id`,`ppabamp_wastewater_source`,`ppabamp_monitoring_point_name`,`ppabamp_coord_lat`,`ppabamp_coord_long`,`ppabamp_document_name`,`ppabamp_permit_publisher`,`ppabamp_validation_date`,`ppabamp_monitoring_frequency_code`,`ppabamp_monitoring_status_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'WWTP','INLET AIR LAUT','05&deg; 31\' 26,22\"','105&deg; 20\' 53,4\"','KepMen LH No.109 Th 2012','Kementrian Lingkungan Hidup','2012-05-29','1M','Y',8,1490463344,8,1490464102),(2,1,'WWTP','OUTLET AIR LAUT','05&deg; 31\' 7,08\"','105&deg; 20\' 42,6\"','KepMen LH No.109 Th 2012','Kementrian Lingkungan Hidup','2012-05-29','1M','Y',8,1490463702,8,1490463702);

/*Table structure for table `ppa_ba_month` */

DROP TABLE IF EXISTS `ppa_ba_month`;

CREATE TABLE `ppa_ba_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_ba_monitoring_point_id` int(11) NOT NULL,
  `ppabam_month` int(2) NOT NULL,
  `ppabam_year` int(4) NOT NULL,
  `ppabam_cert_number` varchar(4) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_month_permit` (`ppa_ba_monitoring_point_id`),
  CONSTRAINT `FK_ppa_ba_month_monitoring_point` FOREIGN KEY (`ppa_ba_monitoring_point_id`) REFERENCES `ppa_ba_monitoring_point` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_ba_month` */

insert  into `ppa_ba_month`(`id`,`ppa_ba_monitoring_point_id`,`ppabam_month`,`ppabam_year`,`ppabam_cert_number`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,7,2016,'1212',8,1490463344,8,1490464102),(2,1,8,2016,'1376',8,1490463344,8,1490464102),(3,1,9,2016,'1515',8,1490463344,8,1490464102),(4,1,10,2016,'1789',8,1490463344,8,1490464102),(5,1,11,2016,'1975',8,1490463344,8,1490464102),(6,1,12,2016,'2251',8,1490463344,8,1490464102),(7,1,1,2017,'2453',8,1490463344,8,1490464102),(8,1,2,2017,'2596',8,1490463344,8,1490464102),(9,1,3,2017,'2766',8,1490463344,8,1490464102),(10,1,4,2017,'',8,1490463344,8,1490464102),(11,1,5,2017,'',8,1490463344,8,1490464102),(12,1,6,2017,'',8,1490463344,8,1490464102),(13,2,7,2016,'1213',8,1490463702,8,1490463702),(14,2,8,2016,'1377',8,1490463702,8,1490463702),(15,2,9,2016,'1514',8,1490463702,8,1490463702),(16,2,10,2016,'1790',8,1490463702,8,1490463702),(17,2,11,2016,'1976',8,1490463702,8,1490463702),(18,2,12,2016,'2250',8,1490463702,8,1490463702),(19,2,1,2017,'2454',8,1490463702,8,1490463702),(20,2,2,2017,'2597',8,1490463702,8,1490463702),(21,2,3,2017,'2767',8,1490463702,8,1490463702),(22,2,4,2017,'',8,1490463702,8,1490463702),(23,2,5,2017,'',8,1490463702,8,1490463702),(24,2,6,2017,'',8,1490463702,8,1490463702);

/*Table structure for table `ppa_ba_report_bm` */

DROP TABLE IF EXISTS `ppa_ba_report_bm`;

CREATE TABLE `ppa_ba_report_bm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_ba_monitoring_point_id` int(11) NOT NULL,
  `ppabar_param_code` varchar(10) NOT NULL,
  `ppabar_param_unit_code` varchar(10) DEFAULT NULL,
  `ppabar_qs_1` decimal(5,2) DEFAULT NULL,
  `ppabar_qs_2` decimal(5,2) DEFAULT NULL,
  `ppabar_qs_unit_code` varchar(10) DEFAULT NULL,
  `ppabar_qs_ref` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_ba_report_bm_monitoring_point` (`ppa_ba_monitoring_point_id`),
  CONSTRAINT `FK_ppa_ba_report_bm_monitoring_point` FOREIGN KEY (`ppa_ba_monitoring_point_id`) REFERENCES `ppa_ba_monitoring_point` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_ba_report_bm` */

insert  into `ppa_ba_report_bm`(`id`,`ppa_ba_monitoring_point_id`,`ppabar_param_code`,`ppabar_param_unit_code`,`ppabar_qs_1`,`ppabar_qs_2`,`ppabar_qs_unit_code`,`ppabar_qs_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'PH',NULL,NULL,NULL,'','',8,1490518613,8,1490520116),(2,1,'TSS',NULL,NULL,NULL,'','',8,1490518713,8,1490518713),(3,1,'OIL_FAT',NULL,NULL,NULL,'','',8,1490518839,8,1490518839),(4,1,'DBT','M3_P_M',NULL,NULL,'','',8,1490518920,8,1490518920),(5,1,'PRD','',NULL,NULL,'','',8,1490519268,8,1490519268);

/*Table structure for table `ppa_inlet_outlet` */

DROP TABLE IF EXISTS `ppa_inlet_outlet`;

CREATE TABLE `ppa_inlet_outlet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_report_bm_id` int(11) NOT NULL,
  `ppaio_month` int(2) DEFAULT NULL,
  `ppaio_year` int(4) DEFAULT NULL,
  `ppaio_inlet_value` decimal(14,5) DEFAULT NULL,
  `ppaio_outlet_value` decimal(14,5) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_inlet_outlet_report` (`ppa_report_bm_id`),
  CONSTRAINT `FK_ppa_inlet_outlet_report` FOREIGN KEY (`ppa_report_bm_id`) REFERENCES `ppa_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_inlet_outlet` */

insert  into `ppa_inlet_outlet`(`id`,`ppa_report_bm_id`,`ppaio_month`,`ppaio_year`,`ppaio_inlet_value`,`ppaio_outlet_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,7,2016,'6.30000','6.11000',8,1487653232,8,1487662500),(2,2,8,2016,'6.18000','7.88000',8,1487653232,8,1487662500),(3,2,9,2016,'7.40000','7.30000',8,1487653232,8,1487662500),(4,2,10,2016,'6.90000','6.80000',8,1487653232,8,1487662500),(5,2,11,2016,'6.27000','6.29000',8,1487653232,8,1487662500),(6,2,12,2016,'7.24000','8.33000',8,1487653232,8,1487662500),(7,2,1,2017,'6.11000','6.15000',8,1487653232,8,1487662500),(8,2,2,2017,'7.88000','6.20000',8,1487653232,8,1487662500),(9,2,3,2017,'8.02000','8.90000',8,1487653232,8,1487662500),(10,2,4,2017,'6.89000','8.33000',8,1487653232,8,1487662500),(11,2,5,2017,'0.00000','0.00000',8,1487653232,8,1487662500),(12,2,6,2017,'0.00000','0.00000',8,1487653232,8,1487662500),(13,3,7,2016,'1.00000','2.00000',8,1487663739,8,1487663739),(14,3,8,2016,'2.00000','4.00000',8,1487663739,8,1487663739),(15,3,9,2016,'3.00000','4.00000',8,1487663739,8,1487663739),(16,3,10,2016,'3.00000','1.00000',8,1487663739,8,1487663739),(17,3,11,2016,'2.00000','2.00000',8,1487663739,8,1487663739),(18,3,12,2016,'1.00000','3.00000',8,1487663739,8,1487663739),(19,3,1,2017,'0.00000','1.00000',8,1487663739,8,1487663739),(20,3,2,2017,'3.00000','5.00000',8,1487663739,8,1487663739),(21,3,3,2017,'6.00000','4.00000',8,1487663739,8,1487663739),(22,3,4,2017,'0.00000','1.00000',8,1487663739,8,1487663739),(23,3,5,2017,NULL,NULL,8,1487663739,8,1487663739),(24,3,6,2017,NULL,NULL,8,1487663739,8,1487663739),(25,4,7,2016,'2.00000','3.00000',8,1487663840,8,1487663840),(26,4,8,2016,'2.00000','1.00000',8,1487663840,8,1487663840),(27,4,9,2016,'2.00000','2.00000',8,1487663840,8,1487663840),(28,4,10,2016,'3.00000','1.00000',8,1487663840,8,1487663840),(29,4,11,2016,'2.00000','1.00000',8,1487663840,8,1487663840),(30,4,12,2016,'2.00000','4.00000',8,1487663840,8,1487663840),(31,4,1,2017,'1.30000','0.26000',8,1487663840,8,1487663840),(32,4,2,2017,'1.30000','0.00000',8,1487663840,8,1487663840),(33,4,3,2017,'0.90000','1.50000',8,1487663840,8,1487663840),(34,4,4,2017,'0.30000','0.40000',8,1487663840,8,1487663840),(35,4,5,2017,NULL,NULL,8,1487663840,8,1487663840),(36,4,6,2017,NULL,NULL,8,1487663840,8,1487663840),(37,5,7,2016,NULL,'635.29000',8,1487664152,8,1487664152),(38,5,8,2016,NULL,'286.59000',8,1487664152,8,1487664152),(39,5,9,2016,NULL,'931.86000',8,1487664152,8,1487664152),(40,5,10,2016,NULL,'2351.51000',8,1487664152,8,1487664152),(41,5,11,2016,NULL,'1494.31000',8,1487664152,8,1487664152),(42,5,12,2016,NULL,'733.74000',8,1487664152,8,1487664152),(43,5,1,2017,NULL,'1649.41000',8,1487664152,8,1487664152),(44,5,2,2017,NULL,'3331.89000',8,1487664152,8,1487664152),(45,5,3,2017,NULL,'3742.53000',8,1487664152,8,1487664152),(46,5,4,2017,NULL,'1649.41000',8,1487664152,8,1487664152),(47,5,5,2017,NULL,NULL,8,1487664152,8,1487664152),(48,5,6,2017,NULL,NULL,8,1487664152,8,1487664152);

/*Table structure for table `ppa_laboratorium` */

DROP TABLE IF EXISTS `ppa_laboratorium`;

CREATE TABLE `ppa_laboratorium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_technical_provision_id` int(11) NOT NULL,
  `labor_name` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_laboratorium_tech_prov` (`ppa_technical_provision_id`),
  CONSTRAINT `FK_ppa_laboratorium_tech_prov` FOREIGN KEY (`ppa_technical_provision_id`) REFERENCES `ppa_technical_provision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_laboratorium` */

insert  into `ppa_laboratorium`(`id`,`ppa_technical_provision_id`,`labor_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,3,'BALAI RISET DAN STANDARISASI JAMBI',8,1488604474,8,1488604474);

/*Table structure for table `ppa_laboratorium_accreditation` */

DROP TABLE IF EXISTS `ppa_laboratorium_accreditation`;

CREATE TABLE `ppa_laboratorium_accreditation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_laboratorium_id` int(11) NOT NULL,
  `lacc_number` varchar(50) NOT NULL,
  `lacc_end_date` date DEFAULT NULL,
  `lacc_remark` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_laboratorium_accreditation` (`ppa_laboratorium_id`),
  CONSTRAINT `FK_ppa_laboratorium_accreditation` FOREIGN KEY (`ppa_laboratorium_id`) REFERENCES `ppa_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_laboratorium_accreditation` */

insert  into `ppa_laboratorium_accreditation`(`id`,`ppa_laboratorium_id`,`lacc_number`,`lacc_end_date`,`lacc_remark`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,4,'LI-047-IN','2017-03-10','',8,1488604474,8,1488604474);

/*Table structure for table `ppa_laboratorium_test` */

DROP TABLE IF EXISTS `ppa_laboratorium_test`;

CREATE TABLE `ppa_laboratorium_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_laboratorium_id` int(11) NOT NULL,
  `test_month` int(2) NOT NULL,
  `test_year` int(4) NOT NULL,
  `test_value` tinyint(1) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_laboratorium_test` (`ppa_laboratorium_id`),
  CONSTRAINT `FK_ppa_laboratorium_test` FOREIGN KEY (`ppa_laboratorium_id`) REFERENCES `ppa_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_laboratorium_test` */

insert  into `ppa_laboratorium_test`(`id`,`ppa_laboratorium_id`,`test_month`,`test_year`,`test_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,4,7,2016,NULL,8,1488604474,8,1488604474),(38,4,8,2016,1,8,1488604474,8,1488604474),(39,4,9,2016,NULL,8,1488604474,8,1488604474),(40,4,10,2016,NULL,8,1488604474,8,1488604474),(41,4,11,2016,1,8,1488604474,8,1488604474),(42,4,12,2016,NULL,8,1488604474,8,1488604474),(43,4,1,2017,NULL,8,1488604474,8,1488604474),(44,4,2,2017,NULL,8,1488604474,8,1488604474),(45,4,3,2017,NULL,8,1488604474,8,1488604474),(46,4,4,2017,NULL,8,1488604474,8,1488604474),(47,4,5,2017,NULL,8,1488604474,8,1488604474),(48,4,6,2017,NULL,8,1488604474,8,1488604474);

/*Table structure for table `ppa_month` */

DROP TABLE IF EXISTS `ppa_month`;

CREATE TABLE `ppa_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_setup_permit_id` int(11) NOT NULL,
  `ppam_month` int(2) NOT NULL,
  `ppam_year` int(4) NOT NULL,
  `ppam_cert_number` varchar(4) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_month_permit` (`ppa_setup_permit_id`),
  CONSTRAINT `FK_ppa_month_permit` FOREIGN KEY (`ppa_setup_permit_id`) REFERENCES `ppa_setup_permit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_month` */

insert  into `ppa_month`(`id`,`ppa_setup_permit_id`,`ppam_month`,`ppam_year`,`ppam_cert_number`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,7,2016,'1205',8,1487513541,8,1493058301),(2,1,8,2016,'1348',8,1487513541,8,1493058303),(3,1,9,2016,'1492',8,1487513541,8,1493058303),(4,1,10,2016,'1797',8,1487513541,8,1493058303),(5,1,11,2016,'1967',8,1487513541,8,1493058303),(6,1,12,2016,'1201',8,1487513541,8,1493058303),(7,1,1,2017,'2429',8,1487513541,8,1493058303),(8,1,2,2017,'2572',8,1487513541,8,1493058303),(9,1,3,2017,'2722',8,1487513541,8,1493058303),(10,1,4,2017,'2940',8,1487513541,8,1493058303),(11,1,5,2017,'',8,1487513541,8,1493058303),(12,1,6,2017,'',8,1487513541,8,1493058303);

/*Table structure for table `ppa_pollution_load_decrease` */

DROP TABLE IF EXISTS `ppa_pollution_load_decrease`;

CREATE TABLE `ppa_pollution_load_decrease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_id` int(11) NOT NULL,
  `ppapld_activity` varchar(255) NOT NULL,
  `ppapld_parameter` varchar(50) DEFAULT NULL,
  `ppapld_unit` varchar(10) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_pollution_load_decrease_ppa` (`ppa_id`),
  CONSTRAINT `FK_ppa_pollution_load_decrease_ppa` FOREIGN KEY (`ppa_id`) REFERENCES `ppa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ppa_pollution_load_decrease` */

/*Table structure for table `ppa_pollution_load_decrease_year` */

DROP TABLE IF EXISTS `ppa_pollution_load_decrease_year`;

CREATE TABLE `ppa_pollution_load_decrease_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_pollution_load_decrease_id` int(11) NOT NULL,
  `ppapldy_year` int(4) NOT NULL,
  `ppapldy_value` decimal(7,5) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_pollution_load_decrease_year` (`ppa_pollution_load_decrease_id`),
  CONSTRAINT `FK_ppa_pollution_load_decrease_year` FOREIGN KEY (`ppa_pollution_load_decrease_id`) REFERENCES `ppa_pollution_load_decrease` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ppa_pollution_load_decrease_year` */

/*Table structure for table `ppa_question` */

DROP TABLE IF EXISTS `ppa_question`;

CREATE TABLE `ppa_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppaq_question_type_code` varchar(10) NOT NULL,
  `ppaq_question` text NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_question` */

insert  into `ppa_question`(`id`,`ppaq_question_type_code`,`ppaq_question`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'GNRL','<p>Lampirkan <em>layout</em> IPAL, saluran air limbah dan gambar konstruksi</p>',8,1487738729,8,1487739075),(2,'GNRL','<p>Lampirkan foto dan <em>layout </em>saluran air limpasan hujan (drainase)</p>',8,1487739103,8,1487739103),(3,'GNRL','<p>Lampirkan foto lokasi titik penaatan dan alat pengukur debit (flowmeter)</p>',8,1487739117,8,1487739117),(4,'GNRL','<p>Lampirkan data pengukuran pH harian</p>',8,1487739129,8,1487739129),(5,'GNRL','<p>Lampirkan data pengukuran debit harian</p>',8,1487739150,8,1487739150),(6,'GNRL','<p>Lampirkan neraca air</p>',8,1487739161,8,1487739161),(7,'OIL_IND','<p>Lampirkan jenis dan karakteristik lahan untuk aplikasi<br>(Permeabilitas dan porositas)</p>',8,1487739178,8,1487739178),(8,'OIL_IND','<p>Lampirkan peta kedalaman air tanah</p>',8,1487739191,8,1487739191),(9,'OIL_IND','<p>Lampirkan foto lokasi sumur pantau (minimal 3 lokasi)</p>',8,1487739204,8,1487739204),(10,'OIL_IND','<p>Lampirkan peta dan foto lokasi lahan aplikasi</p>',8,1487739254,8,1487739254),(11,'OIL_IND','<p>Lampirkan neraca dosis dan rotasi aplikasi</p>',8,1487739269,8,1487739269),(12,'PETRO_IND','<p>Lampirkan data pemantauan harian pH dan COD</p>',8,1487739280,8,1487739280);

/*Table structure for table `ppa_report_bm` */

DROP TABLE IF EXISTS `ppa_report_bm`;

CREATE TABLE `ppa_report_bm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_setup_permit_id` int(11) NOT NULL,
  `ppar_param_code` varchar(10) NOT NULL,
  `ppar_param_unit_code` varchar(10) DEFAULT NULL,
  `ppar_qs_1` decimal(5,2) DEFAULT NULL,
  `ppar_qs_2` decimal(5,2) DEFAULT NULL,
  `ppar_qs_unit_code` varchar(10) DEFAULT NULL,
  `ppar_qs_ref` varchar(100) DEFAULT NULL,
  `ppar_qs_max_pollution_load` decimal(5,2) DEFAULT NULL,
  `ppar_qs_load_unit_code` varchar(10) DEFAULT NULL,
  `ppar_qs_max_pollution_load_ref` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_report_bm_setup` (`ppa_setup_permit_id`),
  CONSTRAINT `FK_ppa_report_bm_setup` FOREIGN KEY (`ppa_setup_permit_id`) REFERENCES `ppa_setup_permit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_report_bm` */

insert  into `ppa_report_bm`(`id`,`ppa_setup_permit_id`,`ppar_param_code`,`ppar_param_unit_code`,`ppar_qs_1`,`ppar_qs_2`,`ppar_qs_unit_code`,`ppar_qs_ref`,`ppar_qs_max_pollution_load`,`ppar_qs_load_unit_code`,`ppar_qs_max_pollution_load_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,'PH','','6.00','9.00','','PermenLH 08/2009',NULL,'TON_P_M','',8,1487653232,8,1487662500),(3,1,'TSS',NULL,'100.00',NULL,'MG_P_L','PermenLH 08/2009',NULL,'TON_P_M','',8,1487663739,8,1487663739),(4,1,'OIL_FAT',NULL,'10.00',NULL,'MG_P_L','PermenLH 08/2009',NULL,'TON_P_M','',8,1487663840,8,1487663840),(5,1,'DBT','M3_P_M',NULL,NULL,'','',NULL,'','',8,1487664152,8,1487664152);

/*Table structure for table `ppa_setup_permit` */

DROP TABLE IF EXISTS `ppa_setup_permit`;

CREATE TABLE `ppa_setup_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_id` int(11) NOT NULL,
  `ppasp_wastewater_source` varchar(150) DEFAULT NULL,
  `ppasp_setup_point_name` varchar(150) DEFAULT NULL,
  `ppasp_coord_ls` varchar(50) DEFAULT NULL,
  `ppasp_coord_bt` varchar(50) DEFAULT NULL,
  `ppasp_wastewater_tech_code` varchar(10) DEFAULT NULL,
  `ppasp_permit_number` varchar(50) DEFAULT NULL,
  `ppasp_permit_publisher` varchar(150) DEFAULT NULL,
  `ppasp_permit_publish_date` date DEFAULT NULL,
  `ppasp_permit_end_date` date DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_setup_permit_ppa` (`ppa_id`),
  CONSTRAINT `FK_ppa_setup_permit_ppa` FOREIGN KEY (`ppa_id`) REFERENCES `ppa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_setup_permit` */

insert  into `ppa_setup_permit`(`id`,`ppa_id`,`ppasp_wastewater_source`,`ppasp_setup_point_name`,`ppasp_coord_ls`,`ppasp_coord_bt`,`ppasp_wastewater_tech_code`,`ppasp_permit_number`,`ppasp_permit_publisher`,`ppasp_permit_publish_date`,`ppasp_permit_end_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'PROSES UTAMA (WWTP)','OUTLET WWTP','05&deg; 31\' 20,6\"','105&deg; 21\' 12,7\"','ANAER','109 TAHUN 2012','KEMENTERIAN LINGKUNGAN HIDUP','2012-05-29','2017-05-29',8,1487513541,8,1493058301);

/*Table structure for table `ppa_technical_provision` */

DROP TABLE IF EXISTS `ppa_technical_provision`;

CREATE TABLE `ppa_technical_provision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_technical_provision_ppa` (`ppa_id`),
  CONSTRAINT `FK_ppa_technical_provision_ppa` FOREIGN KEY (`ppa_id`) REFERENCES `ppa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_technical_provision` */

insert  into `ppa_technical_provision`(`id`,`ppa_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,1,8,1488517482,8,1488604474);

/*Table structure for table `ppa_technical_provision_detail` */

DROP TABLE IF EXISTS `ppa_technical_provision_detail`;

CREATE TABLE `ppa_technical_provision_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_technical_provision_id` int(11) NOT NULL,
  `ppa_question_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_technical_provision_detail` (`ppa_technical_provision_id`),
  KEY `FK_ppa_technical_provision_detail_question` (`ppa_question_id`),
  CONSTRAINT `FK_ppa_technical_provision_detail` FOREIGN KEY (`ppa_technical_provision_id`) REFERENCES `ppa_technical_provision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ppa_technical_provision_detail_question` FOREIGN KEY (`ppa_question_id`) REFERENCES `ppa_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_technical_provision_detail` */

insert  into `ppa_technical_provision_detail`(`id`,`ppa_technical_provision_id`,`ppa_question_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,3,1,8,1488517483,8,1488604474),(26,3,5,8,1488517485,8,1488604474),(27,3,4,8,1488517487,8,1488604474),(28,3,2,8,1488517487,8,1488604474),(29,3,3,8,1488517487,8,1488604474),(30,3,6,8,1488517487,8,1488604474),(31,3,9,8,1488517487,8,1488604474),(32,3,7,8,1488517487,8,1488604474),(33,3,11,8,1488517487,8,1488604474),(34,3,10,8,1488517487,8,1488604474),(35,3,8,8,1488517487,8,1488604474),(36,3,12,8,1488517487,8,1488604474);

/*Table structure for table `ppu` */

DROP TABLE IF EXISTS `ppu`;

CREATE TABLE `ppu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ppu_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_power_plant` (`power_plant_id`),
  KEY `FK_ppu_sector` (`sector_id`),
  CONSTRAINT `FK_ppu_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_ppu_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `ppu` */

insert  into `ppu`(`id`,`sector_id`,`power_plant_id`,`ppu_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,7,5,2016,8,1487327122,8,1487792049),(2,7,5,2014,8,1487327211,8,1487327211),(3,7,5,2014,8,1487327355,8,1487327355),(4,4,1,2017,8,1488794828,8,1488794828),(5,7,5,2017,8,1488794922,8,1488794922),(6,7,5,2018,8,1488794978,8,1488794978),(10,2,4,2017,8,1491747358,8,1491747358),(11,2,4,2017,8,1491822879,8,1491822879),(12,10,6,2017,8,1495702726,8,1495702726),(13,10,6,1234,8,1500552166,8,1500552166);

/*Table structure for table `ppu_ambient` */

DROP TABLE IF EXISTS `ppu_ambient`;

CREATE TABLE `ppu_ambient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ppua_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_ambient_sector` (`sector_id`),
  KEY `FK_ppu_ambient_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_ppu_ambient_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_ppu_ambient_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_ambient` */

insert  into `ppu_ambient`(`id`,`sector_id`,`power_plant_id`,`ppua_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,7,5,2017,8,1488987336,8,1488987336),(4,2,4,2017,8,1491822033,8,1491822033),(5,2,4,2017,8,1491822892,8,1491822892),(6,2,4,2017,8,1491822965,8,1491822965),(7,2,4,2016,8,1491823002,8,1491823002),(8,5,19,2017,8,1500992309,8,1500992309);

/*Table structure for table `ppu_emission_load_grk` */

DROP TABLE IF EXISTS `ppu_emission_load_grk`;

CREATE TABLE `ppu_emission_load_grk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_emission_source_id` int(11) NOT NULL,
  `ppuelg_parameter` varchar(40) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_emission_load_grk` (`ppu_emission_source_id`),
  CONSTRAINT `FK_ppu_emission_load_grk` FOREIGN KEY (`ppu_emission_source_id`) REFERENCES `ppu_emission_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_emission_load_grk` */

insert  into `ppu_emission_load_grk`(`id`,`ppu_emission_source_id`,`ppuelg_parameter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,5,'CO2',8,1488825235,8,1488825235),(2,8,'Co2',8,1488825332,8,1488825332),(3,10,'CO2',8,1500782993,8,1500782993),(4,11,'Co3',8,1500783060,8,1500783060);

/*Table structure for table `ppu_emission_load_grk_calc` */

DROP TABLE IF EXISTS `ppu_emission_load_grk_calc`;

CREATE TABLE `ppu_emission_load_grk_calc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_emission_load_grk_id` int(11) NOT NULL,
  `ppueglc_year` int(4) NOT NULL,
  `ppueglc_coal_usage` decimal(11,8) NOT NULL,
  `ppueglc_carbon_content` int(3) NOT NULL,
  `ppueglc_carbon_actual_content` int(3) NOT NULL,
  `ppueglc_mw_carbondioxyde` int(3) NOT NULL,
  `ppueglc_anc` int(3) NOT NULL,
  `ppueglc_oxidation_factor` decimal(5,2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_emission_load_grk_calc` (`ppu_emission_load_grk_id`),
  CONSTRAINT `FK_ppu_emission_load_grk_calc` FOREIGN KEY (`ppu_emission_load_grk_id`) REFERENCES `ppu_emission_load_grk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_emission_load_grk_calc` */

insert  into `ppu_emission_load_grk_calc`(`id`,`ppu_emission_load_grk_id`,`ppueglc_year`,`ppueglc_coal_usage`,`ppueglc_carbon_content`,`ppueglc_carbon_actual_content`,`ppueglc_mw_carbondioxyde`,`ppueglc_anc`,`ppueglc_oxidation_factor`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,2014,'293.31600000',50,500,44,12,'0.98',8,1488825236,8,1488825236),(2,1,2015,'314.85800000',50,500,44,12,'0.98',8,1488825236,8,1488825236),(3,2,2014,'296.29900000',50,500,44,12,'0.98',8,1488825332,8,1488825332),(4,2,2015,'292.98600000',50,500,44,12,'0.98',8,1488825333,8,1488825333),(5,3,2015,'293.31600000',50,500,44,12,'0.98',8,1500782994,8,1500782994),(6,3,2016,'314.85800000',50,500,44,12,'0.98',8,1500782995,8,1500782995),(7,4,2015,'296.29000000',50,500,44,12,'0.98',8,1500783060,8,1500783060),(8,4,2016,'292.98600000',50,500,44,12,'0.98',8,1500783061,8,1500783061);

/*Table structure for table `ppu_emission_source` */

DROP TABLE IF EXISTS `ppu_emission_source`;

CREATE TABLE `ppu_emission_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_id` int(11) NOT NULL,
  `ppues_name` varchar(150) NOT NULL,
  `ppues_chimney_name` varchar(150) NOT NULL,
  `ppues_capacity` int(11) NOT NULL,
  `ppues_control_device` varchar(255) NOT NULL,
  `ppues_fuel_name_code` varchar(10) NOT NULL,
  `ppues_total_fuel` decimal(12,2) NOT NULL,
  `ppues_fuel_unit_code` varchar(10) NOT NULL,
  `ppues_operation_time` decimal(10,6) DEFAULT NULL,
  `ppues_location` varchar(150) NOT NULL,
  `ppues_coord_ls` varchar(50) NOT NULL,
  `ppues_coord_bt` varchar(50) NOT NULL,
  `ppues_chimney_shape_code` varchar(10) NOT NULL,
  `ppues_chimney_height` decimal(5,2) NOT NULL,
  `ppues_chimney_diameter` decimal(5,2) NOT NULL,
  `ppues_hole_position` int(11) NOT NULL,
  `ppues_monitoring_data_status_code` varchar(10) NOT NULL,
  `ppues_freq_monitoring_obligation_code` varchar(10) NOT NULL,
  `ppues_ref` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_emission_source` (`ppu_id`),
  CONSTRAINT `FK_ppu_emission_source` FOREIGN KEY (`ppu_id`) REFERENCES `ppu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_emission_source` */

insert  into `ppu_emission_source`(`id`,`ppu_id`,`ppues_name`,`ppues_chimney_name`,`ppues_capacity`,`ppues_control_device`,`ppues_fuel_name_code`,`ppues_total_fuel`,`ppues_fuel_unit_code`,`ppues_operation_time`,`ppues_location`,`ppues_coord_ls`,`ppues_coord_bt`,`ppues_chimney_shape_code`,`ppues_chimney_height`,`ppues_chimney_diameter`,`ppues_hole_position`,`ppues_monitoring_data_status_code`,`ppues_freq_monitoring_obligation_code`,`ppues_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,'Boiler Unit 3','CEROBONG 3',100,'Cyclone,  Bag House, Limestone Injection','FNC1','223346984.25','FUC1','4884.983332','PLTU TARAHAN','05o 31\' 15,42\"','105o 21\' 12,56\"','CYL','141.95','3.30',43,'WATCHED','FMOC1','',8,1488823079,8,1488831200),(8,1,'Boiler Unit 4','CEROBONG 4',100,'Cyclone,  Bag House, Limestone Injection','FNC1','191842365.75','FUC1','5413.000000','PLTU TARAHAN','05O 31\' 15,42\"','105O 21\' 12,56\"','CYL','141.95','3.30',43,'WATCHED','FMOC1','',8,1488824063,8,1488824063),(9,1,'Boiler Unit 5','CEROBONG 5',100,'Cyclone,  Bag House, Limestone Injection','FNC1','15467645.12','FUC1','0.000000','PLTU TARAHAN','1564467','4676467','CYL','141.95','3.30',43,'NWATCHED','FMOC1','',8,1488824116,8,1488824116),(10,12,'Sumber Emisi 1','Kode 1',100,'Alat Pengendali Emisi 1','FNC1','1283.00','FUC1','9999.999999','LOKASI 1','LS 1','BT 1','CON','999.99','112.00',123,'WATCHED','FMOC1','',8,1500019196,8,1500570766),(11,12,'Sumber Emisi 2','Kode 2',123,'Alat Pengendali Emisi 2','FNC1','123.00','FUC1','9999.999999','LOKASI 2','LS 2','BT 2','SQR','999.99','123.00',12314,'WATCHED','FMOC1','123',8,1500648741,8,1500648741);

/*Table structure for table `ppu_parameter_obligation` */

DROP TABLE IF EXISTS `ppu_parameter_obligation`;

CREATE TABLE `ppu_parameter_obligation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_emission_source_id` int(11) NOT NULL,
  `ppupo_parameter_code` varchar(10) NOT NULL,
  `ppupo_parameter_unit_code` varchar(10) DEFAULT NULL,
  `ppupo_qs` decimal(5,2) NOT NULL,
  `ppupo_qs_unit_code` varchar(10) NOT NULL,
  `ppupo_qs_ref` varchar(255) NOT NULL,
  `ppupo_qs_max_pollution_load` decimal(5,2) NOT NULL,
  `ppupo_qs_load_unit_code` varchar(10) NOT NULL,
  `ppupo_qs_max_pollution_load_ref` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_parameter_obligation` (`ppu_emission_source_id`),
  CONSTRAINT `FK_ppu_parameter_obligation` FOREIGN KEY (`ppu_emission_source_id`) REFERENCES `ppu_emission_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_parameter_obligation` */

insert  into `ppu_parameter_obligation`(`id`,`ppu_emission_source_id`,`ppupo_parameter_code`,`ppupo_parameter_unit_code`,`ppupo_qs`,`ppupo_qs_unit_code`,`ppupo_qs_ref`,`ppupo_qs_max_pollution_load`,`ppupo_qs_load_unit_code`,`ppupo_qs_max_pollution_load_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,5,'PRPC1','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824274,8,1488824846),(17,5,'PRPC2','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824329,8,1488824856),(19,5,'PRPC3','','850.00','PRQUC2','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824706,8,1488825157),(20,5,'PRPC4','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824757,8,1488824872),(21,5,'LAJUALIR','PRPUC1','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824833,8,1488824833),(22,8,'LAJUALIR','PRPUC1','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824933,8,1488824933),(23,8,'PRPC1','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825000,8,1488825000),(24,8,'PRPC3','','850.00','PRQUC2','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825030,8,1488825030),(25,8,'PRPC2','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825086,8,1488825086),(26,8,'PRPC4','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825143,8,1488825143),(27,10,'PRPC1','','100.00','PRQUC2','100','113.00','PRQLUC1','Er',8,1500646618,8,1500646618),(28,10,'LAJUALIR','PRPUC1','123.00','PRQUC1','12312','123.00','PRQLUC1','adwad',8,1500648665,8,1500648665),(29,11,'PRPC1','','123.00','PRQUC1','123','123.00','PRQLUC1','dawda',8,1500648773,8,1500648773),(30,11,'LAJUALIR','PRPUC1','999.99','PRQUC2','213','123.00','PRQLUC1','adwdaw',8,1500648817,8,1500648817);

/*Table structure for table `ppu_question` */

DROP TABLE IF EXISTS `ppu_question`;

CREATE TABLE `ppu_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppuq_question_type_code` varchar(10) DEFAULT NULL,
  `ppuq_question` varchar(255) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_question` */

insert  into `ppu_question`(`id`,`ppuq_question_type_code`,`ppuq_question`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,NULL,'<p>Lampirkan bukti hasil kalibrasi Peralatan CEMS</p>',8,1487928179,8,1487928179),(2,NULL,'<p>Lampirkan foto cerobong dan sarana perlengkapan (lubang sampling, tangga, platform, sumber listrik untuk pengambilan sampel)</p>',8,1487928199,8,1487928199),(3,NULL,'<p>Lampirkan sertifikat akreditasi laboratorium/SK Gubernur sebagai laboratorium rujukan</p>',8,1487928227,8,1487928227),(5,NULL,'<p>Hello</p>',8,1488988967,8,1488988967),(6,NULL,'<p>asd</p>',8,1488989480,8,1488989480),(7,NULL,'<p>asd</p>',8,1488991276,8,1488991276),(8,NULL,'<p>ad</p>',8,1488991991,8,1488991991);

/*Table structure for table `ppu_technical_provision` */

DROP TABLE IF EXISTS `ppu_technical_provision`;

CREATE TABLE `ppu_technical_provision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_technical_provision` (`ppu_id`),
  CONSTRAINT `FK_ppu_technical_provision` FOREIGN KEY (`ppu_id`) REFERENCES `ppu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_technical_provision` */

insert  into `ppu_technical_provision`(`id`,`ppu_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,1,8,1488991264,8,1488992000),(36,12,8,1500965848,8,1500965848);

/*Table structure for table `ppu_technical_provision_detail` */

DROP TABLE IF EXISTS `ppu_technical_provision_detail`;

CREATE TABLE `ppu_technical_provision_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_technical_provision_id` int(11) NOT NULL,
  `ppu_question_id` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppu_technical_provision_detail` (`ppu_technical_provision_id`),
  KEY `FK_ppu_technical_provision_detail_question` (`ppu_question_id`),
  CONSTRAINT `FK_ppu_technical_provision_detail` FOREIGN KEY (`ppu_technical_provision_id`) REFERENCES `ppu_technical_provision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ppu_technical_provision_detail_question` FOREIGN KEY (`ppu_question_id`) REFERENCES `ppu_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_technical_provision_detail` */

insert  into `ppu_technical_provision_detail`(`id`,`ppu_technical_provision_id`,`ppu_question_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (51,35,1,8,1488991264,8,1488992000),(52,35,2,8,1488991264,8,1488992000),(53,35,3,8,1488991264,8,1488992000),(54,35,5,8,1488991264,8,1488992000),(55,35,6,8,1488991264,8,1488992000),(56,35,7,8,1488991616,8,1488992000),(57,35,8,8,1488992000,8,1488992000),(58,36,1,8,1500965848,8,1500965848),(59,36,2,8,1500965849,8,1500965849),(60,36,3,8,1500965850,8,1500965850),(61,36,5,8,1500965850,8,1500965850),(62,36,6,8,1500965850,8,1500965850),(63,36,7,8,1500965850,8,1500965850),(64,36,8,8,1500965850,8,1500965850);

/*Table structure for table `ppua_monitoring_point` */

DROP TABLE IF EXISTS `ppua_monitoring_point`;

CREATE TABLE `ppua_monitoring_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_ambient_id` int(11) NOT NULL,
  `ppua_monitoring_location` varchar(100) NOT NULL,
  `ppua_code_location` varchar(100) NOT NULL,
  `ppua_coord_latitude` varchar(20) NOT NULL,
  `ppua_coord_longitude` varchar(20) NOT NULL,
  `ppua_env_doc_name` varchar(100) NOT NULL,
  `ppua_institution` varchar(100) NOT NULL,
  `ppua_confirm_date` date NOT NULL,
  `ppua_freq_monitoring_obligation_code` varchar(10) NOT NULL,
  `ppua_monitoring_data_status_code` varchar(10) NOT NULL,
  `ppua_ref` varchar(200) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppua_monitoring_point` (`ppu_ambient_id`),
  CONSTRAINT `FK_ppua_monitoring_point` FOREIGN KEY (`ppu_ambient_id`) REFERENCES `ppu_ambient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ppua_monitoring_point` */

insert  into `ppua_monitoring_point`(`id`,`ppu_ambient_id`,`ppua_monitoring_location`,`ppua_code_location`,`ppua_coord_latitude`,`ppua_coord_longitude`,`ppua_env_doc_name`,`ppua_institution`,`ppua_confirm_date`,`ppua_freq_monitoring_obligation_code`,`ppua_monitoring_data_status_code`,`ppua_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,'ASH DISPOSAL','LOCATION','05 31\' 28,4\"','105 21\'23,0\"','ANDAL PLTU TARAHAN 2x100 MW LAMPUNG SELATAN PROPINSI LAMPUNG','DEPARTEMEN PERTAMBANGAN DAN ENERGI','2017-03-21','PMFMOC1','PMMDSC1','ad',8,1490643184,8,1490643184),(2,2,'DUSUN GOTONG ROYONG','LOCATION','05 31\' 28,4\"','105 21\'23,0\"','ANDAL PLTU TARAHAN 2x100 MW LAMPUNG SELATAN PROPINSI LAMPUNG','DEPARTEMEN PERTAMBANGAN DAN ENERGI','2017-03-10','PMFMOC1','PMMDSC1','ad',8,1490644577,8,1490644577);

/*Table structure for table `ppua_parameter_obligation` */

DROP TABLE IF EXISTS `ppua_parameter_obligation`;

CREATE TABLE `ppua_parameter_obligation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppua_monitoring_point_id` int(11) NOT NULL,
  `ppuapo_parameter_code` varchar(10) NOT NULL,
  `ppuapo_qs` decimal(5,2) NOT NULL,
  `ppuapo_qs_unit_code` varchar(10) NOT NULL,
  `ppuapo_qs_ref` varchar(100) NOT NULL,
  `ppuapo_qs_max_pollution_load` decimal(5,2) NOT NULL,
  `ppuapo_qs_load_unit_code` varchar(10) NOT NULL,
  `ppuapo_qs_max_pollution_load_ref` varchar(100) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppua_parameter_obligation_monitoring_point` (`ppua_monitoring_point_id`),
  CONSTRAINT `FK_ppua_parameter_obligation_monitoring_point` FOREIGN KEY (`ppua_monitoring_point_id`) REFERENCES `ppua_monitoring_point` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ppua_parameter_obligation` */

insert  into `ppua_parameter_obligation`(`id`,`ppua_monitoring_point_id`,`ppuapo_parameter_code`,`ppuapo_qs`,`ppuapo_qs_unit_code`,`ppuapo_qs_ref`,`ppuapo_qs_max_pollution_load`,`ppuapo_qs_load_unit_code`,`ppuapo_qs_max_pollution_load_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'PRPC1','900.00','PRQUC1','PP RI NO 41 TH 1999','500.00','PRQLUC1','PP RI NO 41 TH 1999',8,1490644354,8,1490644354),(2,1,'PRPC2','400.00','PRQUC1','PP RI NO 41 TH 1999','500.00','PRQLUC1','PP RI NO 41 TH 1999',8,1490644535,8,1490644535),(3,2,'PRPC1','900.00','PRQUC1','PP RI NO 41 TH 1999','500.00','PRQLUC1','PP RI NO 41 TH 1999',8,1490644618,8,1490644618),(4,2,'PRPC2','400.00','PRQUC1','PP RI NO 41 TH 1999','500.00','PRQLUC1','PP RI NO 41 TH 1999',8,1490644654,8,1490644654);

/*Table structure for table `ppuapo_month` */

DROP TABLE IF EXISTS `ppuapo_month`;

CREATE TABLE `ppuapo_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppua_parameter_obligation_id` int(11) NOT NULL,
  `ppuapom_month` int(2) NOT NULL,
  `ppuapom_year` int(4) NOT NULL,
  `ppuapom_value` decimal(5,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppuapo_month_parameter_obligation` (`ppua_parameter_obligation_id`),
  CONSTRAINT `FK_ppuapo_month_parameter_obligation` FOREIGN KEY (`ppua_parameter_obligation_id`) REFERENCES `ppua_parameter_obligation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `ppuapo_month` */

insert  into `ppuapo_month`(`id`,`ppua_parameter_obligation_id`,`ppuapom_month`,`ppuapom_year`,`ppuapom_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,7,2016,'12.74',8,1490644354,8,1490644354),(2,1,8,2016,NULL,8,1490644354,8,1490644354),(3,1,9,2016,NULL,8,1490644354,8,1490644354),(4,1,10,2016,'6.20',8,1490644354,8,1490644354),(5,1,11,2016,NULL,8,1490644354,8,1490644354),(6,1,12,2016,NULL,8,1490644354,8,1490644354),(7,1,1,2017,'20.00',8,1490644354,8,1490644354),(8,1,2,2017,NULL,8,1490644354,8,1490644354),(9,1,3,2017,NULL,8,1490644354,8,1490644354),(10,1,4,2017,NULL,8,1490644354,8,1490644354),(11,1,5,2017,NULL,8,1490644354,8,1490644354),(12,1,6,2017,NULL,8,1490644354,8,1490644354),(13,2,7,2016,'20.00',8,1490644535,8,1490644535),(14,2,8,2016,NULL,8,1490644535,8,1490644535),(15,2,9,2016,NULL,8,1490644535,8,1490644535),(16,2,10,2016,'1.73',8,1490644535,8,1490644535),(17,2,11,2016,NULL,8,1490644535,8,1490644535),(18,2,12,2016,NULL,8,1490644535,8,1490644535),(19,2,1,2017,'3.03',8,1490644535,8,1490644535),(20,2,2,2017,NULL,8,1490644535,8,1490644535),(21,2,3,2017,NULL,8,1490644535,8,1490644535),(22,2,4,2017,NULL,8,1490644535,8,1490644535),(23,2,5,2017,NULL,8,1490644535,8,1490644535),(24,2,6,2017,NULL,8,1490644535,8,1490644535),(25,3,7,2016,'12.97',8,1490644618,8,1490644618),(26,3,8,2016,NULL,8,1490644618,8,1490644618),(27,3,9,2016,NULL,8,1490644618,8,1490644618),(28,3,10,2016,'16.34',8,1490644618,8,1490644618),(29,3,11,2016,NULL,8,1490644618,8,1490644618),(30,3,12,2016,NULL,8,1490644618,8,1490644618),(31,3,1,2017,'20.00',8,1490644618,8,1490644618),(32,3,2,2017,NULL,8,1490644618,8,1490644618),(33,3,3,2017,NULL,8,1490644618,8,1490644618),(34,3,4,2017,NULL,8,1490644618,8,1490644618),(35,3,5,2017,NULL,8,1490644618,8,1490644618),(36,3,6,2017,NULL,8,1490644618,8,1490644618),(37,4,7,2016,'20.00',8,1490644654,8,1490644654),(38,4,8,2016,NULL,8,1490644654,8,1490644654),(39,4,9,2016,NULL,8,1490644654,8,1490644654),(40,4,10,2016,'5.11',8,1490644654,8,1490644654),(41,4,11,2016,NULL,8,1490644654,8,1490644654),(42,4,12,2016,NULL,8,1490644654,8,1490644654),(43,4,1,2017,'8.16',8,1490644654,8,1490644654),(44,4,2,2017,NULL,8,1490644654,8,1490644654),(45,4,3,2017,NULL,8,1490644654,8,1490644654),(46,4,4,2017,NULL,8,1490644654,8,1490644654),(47,4,5,2017,NULL,8,1490644654,8,1490644654),(48,4,6,2017,NULL,8,1490644654,8,1490644654);

/*Table structure for table `ppucems_report_bm` */

DROP TABLE IF EXISTS `ppucems_report_bm`;

CREATE TABLE `ppucems_report_bm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_emission_source_id` int(11) NOT NULL,
  `ppucemsrb_parameter_code` varchar(10) NOT NULL,
  `ppucemsrb_ref` varchar(255) DEFAULT NULL,
  `ppucemsrb_sec_ref` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppucems_report_bm_emission_source` (`ppu_emission_source_id`),
  CONSTRAINT `FK_ppucems_report_bm_emission_source` FOREIGN KEY (`ppu_emission_source_id`) REFERENCES `ppu_emission_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ppucems_report_bm` */

insert  into `ppucems_report_bm`(`id`,`ppu_emission_source_id`,`ppucemsrb_parameter_code`,`ppucemsrb_ref`,`ppucemsrb_sec_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,5,'PRPC1','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875702,8,1488875702),(4,5,'PRPC3','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875724,8,1488875724),(5,8,'PRPC2','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875747,8,1488875747),(6,8,'PRPC1','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875767,8,1488875767),(7,8,'PRPC3','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875783,8,1488875783),(8,10,'PRPC2','awd',NULL,8,1501086794,8,1501086794);

/*Table structure for table `ppucemsrb_parameter_report` */

DROP TABLE IF EXISTS `ppucemsrb_parameter_report`;

CREATE TABLE `ppucemsrb_parameter_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_emission_source_id` int(11) NOT NULL,
  `ppucems_report_bm_id` int(11) NOT NULL,
  `ppucemsrbpr_month` int(2) NOT NULL,
  `ppucemsrbpr_year` int(4) NOT NULL,
  `ppucemsrbpr_quarter` varchar(30) NOT NULL,
  `ppucemsrbpr_calc_date` date NOT NULL,
  `ppucemsrbpr_avg_concentration` decimal(5,2) NOT NULL,
  `ppucemsrbpr_calc_result` decimal(2,2) NOT NULL,
  `ppucemsrbpr_operation_time` int(2) NOT NULL,
  `ppucemsrbpr_qs` decimal(5,2) NOT NULL,
  `ppucemsrbpr_qs_unit_code` varchar(10) NOT NULL,
  `ppucemsrbpr_ref` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppucemsrb_parameter_report` (`ppucems_report_bm_id`),
  KEY `FK_ppucemsrb_parameter_report_emission_source` (`ppu_emission_source_id`),
  CONSTRAINT `FK_ppucemsrb_parameter_report` FOREIGN KEY (`ppucems_report_bm_id`) REFERENCES `ppucems_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_ppucemsrb_parameter_report_emission_source` FOREIGN KEY (`ppu_emission_source_id`) REFERENCES `ppu_emission_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ppucemsrb_parameter_report` */

insert  into `ppucemsrb_parameter_report`(`id`,`ppu_emission_source_id`,`ppucems_report_bm_id`,`ppucemsrbpr_month`,`ppucemsrbpr_year`,`ppucemsrbpr_quarter`,`ppucemsrbpr_calc_date`,`ppucemsrbpr_avg_concentration`,`ppucemsrbpr_calc_result`,`ppucemsrbpr_operation_time`,`ppucemsrbpr_qs`,`ppucemsrbpr_qs_unit_code`,`ppucemsrbpr_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,5,3,7,2015,'Triwulan III 2015','2015-07-01','603.90','0.33',24,'750.00','PRPRQUC1','PerMen LH 21/2008',8,1488878649,8,1488878649),(7,5,3,7,2015,'Triwulan III 2015','2015-07-02','658.65','0.33',24,'750.00','PRPRQUC1','PerMen LH 21/2008',8,1488878708,8,1488878708),(8,8,6,7,2015,'Triwulan III 2015','2015-07-01','845.01','0.99',24,'750.00','PRPRQUC1','PerMen LH 21/2008',8,1488878761,8,1488878761),(9,8,6,7,2015,'Triwulan III 2015','2015-07-02','869.42','0.99',24,'750.00','PRPRQUC1','PerMen LH 21/2008',8,1488878794,8,1488878794);

/*Table structure for table `ppucemsrb_quarter` */

DROP TABLE IF EXISTS `ppucemsrb_quarter`;

CREATE TABLE `ppucemsrb_quarter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppucems_report_bm_id` int(11) NOT NULL,
  `ppucemsrbq_quarter` varchar(3) NOT NULL,
  `ppucemsrbq_year` int(4) NOT NULL,
  `ppucemsrbq_value` int(5) NOT NULL,
  `ppucemsrbq_qs_value` int(5) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppucemsrb_quarter` (`ppucems_report_bm_id`),
  CONSTRAINT `FK_ppucemsrb_quarter` FOREIGN KEY (`ppucems_report_bm_id`) REFERENCES `ppucems_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `ppucemsrb_quarter` */

insert  into `ppucemsrb_quarter`(`id`,`ppucems_report_bm_id`,`ppucemsrbq_quarter`,`ppucemsrbq_year`,`ppucemsrbq_value`,`ppucemsrbq_qs_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,3,'III',2015,92,92,8,1488875702,8,1488875702),(10,3,'IV',2015,92,92,8,1488875702,8,1488875702),(11,3,'I',2016,90,90,8,1488875702,8,1488875702),(12,3,'II',2016,30,30,8,1488875702,8,1488875702),(13,4,'III',2015,92,92,8,1488875724,8,1488875724),(14,4,'IV',2015,92,92,8,1488875724,8,1488875724),(15,4,'I',2016,90,90,8,1488875724,8,1488875724),(16,4,'II',2016,30,30,8,1488875724,8,1488875724),(17,5,'III',2015,92,92,8,1488875747,8,1488875747),(18,5,'IV',2015,92,92,8,1488875747,8,1488875747),(19,5,'I',2016,90,90,8,1488875747,8,1488875747),(20,5,'II',2016,30,30,8,1488875747,8,1488875747),(21,6,'III',2015,92,92,8,1488875767,8,1488875767),(22,6,'IV',2015,92,92,8,1488875767,8,1488875767),(23,6,'I',2016,90,90,8,1488875767,8,1488875767),(24,6,'II',2016,30,30,8,1488875767,8,1488875767),(25,7,'III',2015,92,92,8,1488875783,8,1488875783),(26,7,'IV',2015,92,92,8,1488875783,8,1488875783),(27,7,'I',2016,90,90,8,1488875783,8,1488875783),(28,7,'II',2016,30,30,8,1488875783,8,1488875783),(29,8,'III',2016,123,12,8,1501086794,8,1501086794),(30,8,'IV',2016,123,123,8,1501086794,8,1501086794),(31,8,'I',2017,123,123,8,1501086794,8,1501086794),(32,8,'II',2017,123,123,8,1501086794,8,1501086794);

/*Table structure for table `ppues_month` */

DROP TABLE IF EXISTS `ppues_month`;

CREATE TABLE `ppues_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_emission_source_id` int(11) NOT NULL,
  `ppuesm_month` int(2) NOT NULL,
  `ppuesm_year` int(4) NOT NULL,
  `ppuesm_operation_time` decimal(11,6) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppues_month` (`ppu_emission_source_id`),
  CONSTRAINT `FK_ppues_month` FOREIGN KEY (`ppu_emission_source_id`) REFERENCES `ppu_emission_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

/*Data for the table `ppues_month` */

insert  into `ppues_month`(`id`,`ppu_emission_source_id`,`ppuesm_month`,`ppuesm_year`,`ppuesm_operation_time`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,5,7,2015,'729.283333',8,1488823081,8,1488831200),(26,5,8,2015,'644.033333',8,1488823081,8,1488831200),(27,5,9,2015,'720.000000',8,1488823081,8,1488831200),(28,5,10,2015,'645.250000',8,1488823081,8,1488831200),(29,5,11,2015,'521.550000',8,1488823081,8,1488831201),(30,5,12,2015,'453.033333',8,1488823081,8,1488831201),(31,5,1,2016,'744.000000',8,1488823081,8,1488831201),(32,5,2,2016,'193.333333',8,1488823081,8,1488831201),(33,5,3,2016,'234.500000',8,1488823081,8,1488831201),(34,5,4,2016,'0.000000',8,1488823081,8,1488831201),(35,5,5,2016,'0.000000',8,1488823081,8,1488831201),(36,5,6,2016,'0.000000',8,1488823081,8,1488831201),(61,8,7,2015,'599.580000',8,1488824065,8,1488824065),(62,8,8,2015,'744.000000',8,1488824065,8,1488824065),(63,8,9,2015,'714.450000',8,1488824065,8,1488824065),(64,8,10,2015,'629.220000',8,1488824065,8,1488824065),(65,8,11,2015,'387.400000',8,1488824065,8,1488824065),(66,8,12,2015,'732.280000',8,1488824065,8,1488824065),(67,8,1,2016,'533.020000',8,1488824065,8,1488824065),(68,8,2,2016,'519.670000',8,1488824065,8,1488824065),(69,8,3,2016,'553.380000',8,1488824065,8,1488824065),(70,8,4,2016,'0.000000',8,1488824065,8,1488824065),(71,8,5,2016,'0.000000',8,1488824065,8,1488824065),(72,8,6,2016,'0.000000',8,1488824065,8,1488824065),(73,9,7,2015,'0.000000',8,1488824118,8,1488824118),(74,9,8,2015,'0.000000',8,1488824118,8,1488824118),(75,9,9,2015,'0.000000',8,1488824118,8,1488824118),(76,9,10,2015,'0.000000',8,1488824118,8,1488824118),(77,9,11,2015,'0.000000',8,1488824118,8,1488824118),(78,9,12,2015,'0.000000',8,1488824118,8,1488824118),(79,9,1,2016,'0.000000',8,1488824118,8,1488824118),(80,9,2,2016,'0.000000',8,1488824118,8,1488824118),(81,9,3,2016,'0.000000',8,1488824118,8,1488824118),(82,9,4,2016,'0.000000',8,1488824118,8,1488824118),(83,9,5,2016,'0.000000',8,1488824118,8,1488824118),(84,9,6,2016,'0.000000',8,1488824118,8,1488824118),(85,10,7,2016,'1231.000000',8,1500019197,8,1500570766),(86,10,8,2016,'142.000000',8,1500019197,8,1500570766),(87,10,9,2016,'213.000000',8,1500019197,8,1500570766),(88,10,10,2016,'13.000000',8,1500019197,8,1500570766),(89,10,11,2016,'12312.000000',8,1500019197,8,1500570766),(90,10,12,2016,'32.000000',8,1500019197,8,1500570766),(91,10,1,2017,'123.000000',8,1500019197,8,1500570766),(92,10,2,2017,'1231.000000',8,1500019197,8,1500570766),(93,10,3,2017,'3.000000',8,1500019197,8,1500570766),(94,10,4,2017,'0.000000',8,1500019197,8,1500570766),(95,10,5,2017,'123.000000',8,1500019197,8,1500570766),(96,10,6,2017,'3.000000',8,1500019197,8,1500570766),(97,11,7,2016,'0.000000',8,1500648742,8,1500648742),(98,11,8,2016,'99999.999999',8,1500648742,8,1500648742),(99,11,9,2016,'0.000000',8,1500648742,8,1500648742),(100,11,10,2016,'0.000000',8,1500648742,8,1500648742),(101,11,11,2016,'0.000000',8,1500648742,8,1500648742),(102,11,12,2016,'0.000000',8,1500648742,8,1500648742),(103,11,1,2017,'0.000000',8,1500648742,8,1500648742),(104,11,2,2017,'0.000000',8,1500648742,8,1500648742),(105,11,3,2017,'0.000000',8,1500648742,8,1500648742),(106,11,4,2017,'0.000000',8,1500648742,8,1500648742),(107,11,5,2017,'0.000000',8,1500648742,8,1500648742),(108,11,6,2017,'0.000000',8,1500648742,8,1500648742);

/*Table structure for table `ppupo_month` */

DROP TABLE IF EXISTS `ppupo_month`;

CREATE TABLE `ppupo_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppu_parameter_obligation_id` int(11) NOT NULL,
  `ppupom_month` int(2) NOT NULL,
  `ppupom_year` int(4) NOT NULL,
  `ppupom_value` decimal(5,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppupo_month` (`ppu_parameter_obligation_id`),
  CONSTRAINT `FK_ppupo_month` FOREIGN KEY (`ppu_parameter_obligation_id`) REFERENCES `ppu_parameter_obligation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=latin1;

/*Data for the table `ppupo_month` */

insert  into `ppupo_month`(`id`,`ppu_parameter_obligation_id`,`ppupom_month`,`ppupom_year`,`ppupom_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (181,16,7,2015,'113.70',8,1488824274,8,1488824846),(182,16,8,2015,'279.31',8,1488824274,8,1488824846),(183,16,9,2015,'259.00',8,1488824274,8,1488824846),(184,16,10,2015,'281.05',8,1488824274,8,1488824847),(185,16,11,2015,'428.09',8,1488824274,8,1488824847),(186,16,12,2015,'453.94',8,1488824274,8,1488824847),(187,16,1,2016,'281.60',8,1488824274,8,1488824847),(188,16,2,2016,'472.88',8,1488824274,8,1488824847),(189,16,3,2016,'408.15',8,1488824274,8,1488824847),(190,16,4,2016,NULL,8,1488824274,8,1488824847),(191,16,5,2016,NULL,8,1488824274,8,1488824847),(192,16,6,2016,NULL,8,1488824274,8,1488824847),(193,17,7,2015,'0.30',8,1488824330,8,1488824856),(194,17,8,2015,'7.04',8,1488824330,8,1488824856),(195,17,9,2015,'11.80',8,1488824330,8,1488824856),(196,17,10,2015,'39.15',8,1488824330,8,1488824856),(197,17,11,2015,'69.70',8,1488824330,8,1488824856),(198,17,12,2015,'528.20',8,1488824330,8,1488824856),(199,17,1,2016,'147.69',8,1488824330,8,1488824856),(200,17,2,2016,'35.61',8,1488824330,8,1488824856),(201,17,3,2016,'365.39',8,1488824330,8,1488824856),(202,17,4,2016,NULL,8,1488824330,8,1488824856),(203,17,5,2016,NULL,8,1488824330,8,1488824856),(204,17,6,2016,NULL,8,1488824330,8,1488824856),(217,19,7,2015,'10.00',8,1488824707,8,1488825157),(218,19,8,2015,'10.00',8,1488824707,8,1488825157),(219,19,9,2015,'10.00',8,1488824707,8,1488825157),(220,19,10,2015,'10.00',8,1488824707,8,1488825157),(221,19,11,2015,'10.00',8,1488824707,8,1488825157),(222,19,12,2015,'10.00',8,1488824707,8,1488825157),(223,19,1,2016,'10.00',8,1488824707,8,1488825157),(224,19,2,2016,'10.00',8,1488824707,8,1488825157),(225,19,3,2016,'10.00',8,1488824707,8,1488825157),(226,19,4,2016,NULL,8,1488824707,8,1488825157),(227,19,5,2016,NULL,8,1488824707,8,1488825157),(228,19,6,2016,NULL,8,1488824707,8,1488825157),(229,20,7,2015,'11.07',8,1488824757,8,1488824872),(230,20,8,2015,'69.30',8,1488824757,8,1488824872),(231,20,9,2015,'106.40',8,1488824757,8,1488824872),(232,20,10,2015,'72.63',8,1488824757,8,1488824872),(233,20,11,2015,'86.54',8,1488824757,8,1488824872),(234,20,12,2015,'93.30',8,1488824757,8,1488824872),(235,20,1,2016,'117.12',8,1488824758,8,1488824872),(236,20,2,2016,'150.00',8,1488824758,8,1488824872),(237,20,3,2016,'30.71',8,1488824758,8,1488824872),(238,20,4,2016,NULL,8,1488824758,8,1488824872),(239,20,5,2016,NULL,8,1488824758,8,1488824872),(240,20,6,2016,NULL,8,1488824758,8,1488824872),(241,21,7,2015,'15.26',8,1488824834,8,1488824834),(242,21,8,2015,'19.32',8,1488824834,8,1488824834),(243,21,9,2015,'21.56',8,1488824834,8,1488824834),(244,21,10,2015,'17.15',8,1488824834,8,1488824834),(245,21,11,2015,'17.18',8,1488824835,8,1488824835),(246,21,12,2015,'11.40',8,1488824835,8,1488824835),(247,21,1,2016,'19.21',8,1488824835,8,1488824835),(248,21,2,2016,'20.98',8,1488824835,8,1488824835),(249,21,3,2016,'13.96',8,1488824835,8,1488824835),(250,21,4,2016,NULL,8,1488824835,8,1488824835),(251,21,5,2016,NULL,8,1488824835,8,1488824835),(252,21,6,2016,NULL,8,1488824835,8,1488824835),(253,22,7,2015,'18.54',8,1488824933,8,1488824933),(254,22,8,2015,'17.50',8,1488824933,8,1488824933),(255,22,9,2015,'6.98',8,1488824933,8,1488824933),(256,22,10,2015,'14.05',8,1488824933,8,1488824933),(257,22,11,2015,'11.40',8,1488824933,8,1488824933),(258,22,12,2015,'10.80',8,1488824933,8,1488824933),(259,22,1,2016,'10.50',8,1488824933,8,1488824933),(260,22,2,2016,'10.52',8,1488824933,8,1488824933),(261,22,3,2016,'15.01',8,1488824933,8,1488824933),(262,22,4,2016,NULL,8,1488824933,8,1488824933),(263,22,5,2016,NULL,8,1488824933,8,1488824933),(264,22,6,2016,NULL,8,1488824933,8,1488824933),(265,23,7,2015,'66.73',8,1488825001,8,1488825001),(266,23,8,2015,'178.75',8,1488825001,8,1488825001),(267,23,9,2015,'195.00',8,1488825001,8,1488825001),(268,23,10,2015,'258.14',8,1488825001,8,1488825001),(269,23,11,2015,'590.19',8,1488825001,8,1488825001),(270,23,12,2015,'456.63',8,1488825001,8,1488825001),(271,23,1,2016,'401.75',8,1488825001,8,1488825001),(272,23,2,2016,'143.21',8,1488825001,8,1488825001),(273,23,3,2016,'542.59',8,1488825001,8,1488825001),(274,23,4,2016,NULL,8,1488825001,8,1488825001),(275,23,5,2016,NULL,8,1488825001,8,1488825001),(276,23,6,2016,NULL,8,1488825001,8,1488825001),(277,24,7,2015,'10.00',8,1488825030,8,1488825030),(278,24,8,2015,'10.00',8,1488825030,8,1488825030),(279,24,9,2015,'10.00',8,1488825030,8,1488825030),(280,24,10,2015,'10.00',8,1488825030,8,1488825030),(281,24,11,2015,'10.00',8,1488825030,8,1488825030),(282,24,12,2015,'10.00',8,1488825030,8,1488825030),(283,24,1,2016,'10.00',8,1488825030,8,1488825030),(284,24,2,2016,'10.00',8,1488825030,8,1488825030),(285,24,3,2016,'10.00',8,1488825031,8,1488825031),(286,24,4,2016,NULL,8,1488825031,8,1488825031),(287,24,5,2016,NULL,8,1488825031,8,1488825031),(288,24,6,2016,NULL,8,1488825031,8,1488825031),(289,25,7,2015,'10.50',8,1488825086,8,1488825086),(290,25,8,2015,'14.40',8,1488825086,8,1488825086),(291,25,9,2015,'10.35',8,1488825086,8,1488825086),(292,25,10,2015,'156.42',8,1488825086,8,1488825086),(293,25,11,2015,'106.42',8,1488825086,8,1488825086),(294,25,12,2015,'507.76',8,1488825086,8,1488825086),(295,25,1,2016,'122.20',8,1488825086,8,1488825086),(296,25,2,2016,'6.56',8,1488825086,8,1488825086),(297,25,3,2016,'25.00',8,1488825086,8,1488825086),(298,25,4,2016,NULL,8,1488825086,8,1488825086),(299,25,5,2016,NULL,8,1488825086,8,1488825086),(300,25,6,2016,NULL,8,1488825086,8,1488825086),(301,26,7,2015,'28.78',8,1488825143,8,1488825143),(302,26,8,2015,'47.70',8,1488825143,8,1488825143),(303,26,9,2015,'68.70',8,1488825143,8,1488825143),(304,26,10,2015,'55.50',8,1488825143,8,1488825143),(305,26,11,2015,'28.73',8,1488825143,8,1488825143),(306,26,12,2015,'54.98',8,1488825143,8,1488825143),(307,26,1,2016,'58.18',8,1488825143,8,1488825143),(308,26,2,2016,'74.04',8,1488825143,8,1488825143),(309,26,3,2016,'24.41',8,1488825143,8,1488825143),(310,26,4,2016,NULL,8,1488825143,8,1488825143),(311,26,5,2016,NULL,8,1488825144,8,1488825144),(312,26,6,2016,NULL,8,1488825144,8,1488825144),(313,27,7,2016,'123.00',8,1500646619,8,1500646619),(314,27,8,2016,'123.00',8,1500646619,8,1500646619),(315,27,9,2016,NULL,8,1500646619,8,1500646619),(316,27,10,2016,'123.00',8,1500646619,8,1500646619),(317,27,11,2016,'123.00',8,1500646619,8,1500646619),(318,27,12,2016,'123.00',8,1500646619,8,1500646619),(319,27,1,2017,'123.00',8,1500646619,8,1500646619),(320,27,2,2017,'123.00',8,1500646619,8,1500646619),(321,27,3,2017,NULL,8,1500646619,8,1500646619),(322,27,4,2017,'123.00',8,1500646619,8,1500646619),(323,27,5,2017,'123.00',8,1500646619,8,1500646619),(324,27,6,2017,'123.00',8,1500646619,8,1500646619),(325,28,7,2016,'123.00',8,1500648665,8,1500648665),(326,28,8,2016,NULL,8,1500648665,8,1500648665),(327,28,9,2016,NULL,8,1500648665,8,1500648665),(328,28,10,2016,'213.00',8,1500648665,8,1500648665),(329,28,11,2016,NULL,8,1500648665,8,1500648665),(330,28,12,2016,NULL,8,1500648665,8,1500648665),(331,28,1,2017,'123.00',8,1500648665,8,1500648665),(332,28,2,2017,NULL,8,1500648665,8,1500648665),(333,28,3,2017,NULL,8,1500648665,8,1500648665),(334,28,4,2017,NULL,8,1500648665,8,1500648665),(335,28,5,2017,NULL,8,1500648665,8,1500648665),(336,28,6,2017,NULL,8,1500648665,8,1500648665),(337,29,7,2016,NULL,8,1500648773,8,1500648773),(338,29,8,2016,NULL,8,1500648774,8,1500648774),(339,29,9,2016,NULL,8,1500648774,8,1500648774),(340,29,10,2016,NULL,8,1500648774,8,1500648774),(341,29,11,2016,NULL,8,1500648774,8,1500648774),(342,29,12,2016,NULL,8,1500648774,8,1500648774),(343,29,1,2017,NULL,8,1500648774,8,1500648774),(344,29,2,2017,NULL,8,1500648774,8,1500648774),(345,29,3,2017,NULL,8,1500648774,8,1500648774),(346,29,4,2017,'123.00',8,1500648774,8,1500648774),(347,29,5,2017,'124.00',8,1500648774,8,1500648774),(348,29,6,2017,'999.99',8,1500648774,8,1500648774),(349,30,7,2016,NULL,8,1500648817,8,1500648817),(350,30,8,2016,NULL,8,1500648817,8,1500648817),(351,30,9,2016,NULL,8,1500648817,8,1500648817),(352,30,10,2016,'123.00',8,1500648817,8,1500648817),(353,30,11,2016,NULL,8,1500648817,8,1500648817),(354,30,12,2016,NULL,8,1500648817,8,1500648817),(355,30,1,2017,'123.00',8,1500648817,8,1500648817),(356,30,2,2017,NULL,8,1500648817,8,1500648817),(357,30,3,2017,NULL,8,1500648817,8,1500648817),(358,30,4,2017,'123.00',8,1500648817,8,1500648817),(359,30,5,2017,NULL,8,1500648817,8,1500648817),(360,30,6,2017,NULL,8,1500648817,8,1500648817);

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(100) NOT NULL,
  `address` text,
  `master_email` varchar(150) NOT NULL,
  `title_tag` varchar(66) NOT NULL,
  `meta_description` varchar(160) NOT NULL,
  `meta_keyword` text NOT NULL,
  `profile_left` text,
  `profile_center` text,
  `profile_right` text,
  `active_status` varchar(1) NOT NULL DEFAULT 'Y',
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profile` */

insert  into `profile`(`id`,`app_name`,`address`,`master_email`,`title_tag`,`meta_description`,`meta_keyword`,`profile_left`,`profile_center`,`profile_right`,`active_status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'PLN - K3LH KITSBS','Sektor Sumatera Selatan','joko.hermanto19@gmail.com','-','-','-','','','','Y',8,1477904014,8,1479195188);

/*Table structure for table `project_tracking` */

DROP TABLE IF EXISTS `project_tracking`;

CREATE TABLE `project_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) DEFAULT NULL,
  `pt_name` varchar(255) NOT NULL,
  `pt_goal` varchar(255) DEFAULT NULL,
  `pt_description` text,
  `pt_owner_code` varchar(10) DEFAULT NULL,
  `pt_report_period` date DEFAULT NULL,
  `pt_controller_code` varchar(10) DEFAULT NULL,
  `pt_report_to_code` varchar(100) DEFAULT NULL,
  `pt_estimated_project_value` int(11) DEFAULT NULL,
  `pt_ao_no` varchar(100) DEFAULT NULL,
  `pt_easy_impact` varchar(1) DEFAULT NULL,
  `pt_support` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_tracking_sector` (`sector_id`),
  KEY `FK_project_tracking_powerplant` (`power_plant_id`),
  CONSTRAINT `FK_project_tracking_powerplant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_project_tracking_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `project_tracking` */

insert  into `project_tracking`(`id`,`sector_id`,`power_plant_id`,`pt_name`,`pt_goal`,`pt_description`,`pt_owner_code`,`pt_report_period`,`pt_controller_code`,`pt_report_to_code`,`pt_estimated_project_value`,`pt_ao_no`,`pt_easy_impact`,`pt_support`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,4,2,'Adendum UKL UPL PLTG Jakabaring','Izin lingkungan','Adendum ini perlu dilaksanakan\r\nkarena pada UKL UPL eksisting','PTL1','2017-04-01','PTL2','PTL1,PTL2',10000000,'AI No.PRK 123','H','Kepatuhan, Proper',8,1497949291,8,1498101191),(4,4,2,'adwad','awdawd','awd','PTL1','2017-10-01','PTL1','PTL1',1321,'1231231','H','awadawd',8,1498196467,8,1498196467),(5,11,7,'asd','daw','dawdwa','PTL1','2017-06-01','PTL1','PTL1',12312,'awdad','L','adwad',8,1498910309,8,1498910309);

/*Table structure for table `project_tracking_detail` */

DROP TABLE IF EXISTS `project_tracking_detail`;

CREATE TABLE `project_tracking_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_tracking_id` int(11) NOT NULL,
  `ptd_step` varchar(255) NOT NULL,
  `ptd_pic_code` varchar(10) DEFAULT NULL,
  `ptd_status` varchar(1) DEFAULT NULL,
  `ptd_duration` int(4) DEFAULT NULL,
  `ptd_start_date` date DEFAULT NULL,
  `ptd_progress_percentage` decimal(4,2) DEFAULT NULL,
  `ptd_information` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_tracking_detail` (`project_tracking_id`),
  CONSTRAINT `FK_project_tracking_detail` FOREIGN KEY (`project_tracking_id`) REFERENCES `project_tracking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `project_tracking_detail` */

insert  into `project_tracking_detail`(`id`,`project_tracking_id`,`ptd_step`,`ptd_pic_code`,`ptd_status`,`ptd_duration`,`ptd_start_date`,`ptd_progress_percentage`,`ptd_information`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,2,'Penyusunan Kerangka','PTL2','C',30,'2017-03-15',NULL,'',8,1498024157,8,1498749885),(3,2,'Proses Pelaksanaan','PTL1','O',40,'2017-04-14','14.29','',8,1498024477,8,1498024477),(18,2,'Kajian Adendum','PTL2','O',60,'2017-05-24','10.00','',8,1498042400,8,1498047301);

/*Table structure for table `roadmap_k3l` */

DROP TABLE IF EXISTS `roadmap_k3l`;

CREATE TABLE `roadmap_k3l` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_type_code` varchar(10) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `k3l_year` varchar(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_roadmap_k3l_sector` (`sector_id`),
  KEY `FK_roadmap_k3l_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_roadmap_k3l_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_roadmap_k3l_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l` */

insert  into `roadmap_k3l`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'K3',7,5,'2016',8,1492857183,8,1496250618);

/*Table structure for table `roadmap_k3l_attribute` */

DROP TABLE IF EXISTS `roadmap_k3l_attribute`;

CREATE TABLE `roadmap_k3l_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_type_code` varchar(10) NOT NULL,
  `attr_text` varchar(255) NOT NULL,
  `attr_parent_id` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_roadmap_k3l_attribute` (`attr_parent_id`),
  CONSTRAINT `FK_roadmap_k3l_attribute` FOREIGN KEY (`attr_parent_id`) REFERENCES `roadmap_k3l_attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l_attribute` */

insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'TGT','Tingkat Penerapan Sistem Manajemen  K3',NULL,8,1482728633,8,1482728633),(2,'TGT','Maturity Level Implementasi K2',NULL,8,1482728652,8,1482728652),(3,'TGT','Risk Rating Pembangkit',NULL,8,1482815485,8,1482815485),(4,'TGT','Maturity Level Behavioural Based Safety',NULL,8,1482822142,8,1482822142),(5,'TGT','Jumlah Nearmiss',NULL,8,1482822204,8,1482822204),(6,'PHDR','A - PENINGKATAN KAPABILITAS SDM',NULL,8,1482824515,8,1482824515),(7,'PSHDR','A.1 Sertifikasi Personil Wajib',NULL,8,1482824872,8,1482824872),(8,'PITEM','Sertifikasi Operator Pesawat Angkat Angkut',NULL,8,1482824888,8,1482824888),(9,'PITEM','Sertifikasi Operator Bejana Bertekanan',NULL,8,1482825045,8,1482825045),(10,'TGT','Jumlah Kecelakaan Kerja',NULL,8,1482826730,8,1482826730),(11,'TGT','Jumlah Kecelakaan Instalasi',NULL,8,1482909553,8,1482909553);

/*Table structure for table `roadmap_k3l_item` */

DROP TABLE IF EXISTS `roadmap_k3l_item`;

CREATE TABLE `roadmap_k3l_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roadmap_k3l_id` int(11) NOT NULL,
  `roadmap_k3l_attribute_id` int(11) NOT NULL,
  `item_value_when` date DEFAULT NULL,
  `item_value_where` text,
  `item_value_who` text,
  `item_value_how_many` text,
  `item_value_how_much` int(9) DEFAULT NULL,
  `item_order` int(2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_roadmap_k3l_item` (`roadmap_k3l_id`),
  KEY `FK_roadmap_k3l_item_attribute` (`roadmap_k3l_attribute_id`),
  CONSTRAINT `FK_roadmap_k3l_item` FOREIGN KEY (`roadmap_k3l_id`) REFERENCES `roadmap_k3l` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_roadmap_k3l_item_attribute` FOREIGN KEY (`roadmap_k3l_attribute_id`) REFERENCES `roadmap_k3l_attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l_item` */

insert  into `roadmap_k3l_item`(`id`,`roadmap_k3l_id`,`roadmap_k3l_attribute_id`,`item_value_when`,`item_value_where`,`item_value_who`,`item_value_how_many`,`item_value_how_much`,`item_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,3,8,'2017-04-13','asd','asd','asd',1231,0,8,1492857183,8,1496250618);

/*Table structure for table `roadmap_k3l_target` */

DROP TABLE IF EXISTS `roadmap_k3l_target`;

CREATE TABLE `roadmap_k3l_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roadmap_k3l_id` int(11) NOT NULL,
  `roadmap_k3l_attribute_id` int(11) NOT NULL,
  `target_value` varchar(150) NOT NULL,
  `target_order` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_roadmap_k3l_target` (`roadmap_k3l_id`),
  KEY `FK_roadmap_k3l_target_attribute` (`roadmap_k3l_attribute_id`),
  CONSTRAINT `FK_roadmap_k3l_target` FOREIGN KEY (`roadmap_k3l_id`) REFERENCES `roadmap_k3l` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_roadmap_k3l_target_attribute` FOREIGN KEY (`roadmap_k3l_attribute_id`) REFERENCES `roadmap_k3l_attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l_target` */

insert  into `roadmap_k3l_target`(`id`,`roadmap_k3l_id`,`roadmap_k3l_attribute_id`,`target_value`,`target_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,1,'23',0,8,1496250618,8,1496250618);

/*Table structure for table `safety_campaign` */

DROP TABLE IF EXISTS `safety_campaign`;

CREATE TABLE `safety_campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `sc_campaign_name` varchar(100) NOT NULL,
  `sc_description` text,
  `sc_date` date NOT NULL,
  `sc_location` varchar(100) DEFAULT NULL,
  `sc_campaigner` varchar(100) NOT NULL,
  `sc_part` varchar(100) NOT NULL,
  `sc_amount` int(11) NOT NULL,
  `sc_result` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_safety_campaign_pp` (`power_plant_id`),
  KEY `FK_safety_campaign_sector` (`sector_id`),
  CONSTRAINT `FK_safety_campaign_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_safety_campaign_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `safety_campaign` */

insert  into `safety_campaign`(`id`,`sector_id`,`power_plant_id`,`sc_campaign_name`,`sc_description`,`sc_date`,`sc_location`,`sc_campaigner`,`sc_part`,`sc_amount`,`sc_result`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,'Sosialisasi K3','<p>Sosialisasi tentang bahaya narkoba</p>','2017-05-10','','K3L PLTG Batanghari','Bagian Operasi dan Pemeliharaan',30,'<p>100% peserta telah diberikan informasi tentang bahaya narkoba<br></p>',8,1496898291,8,1496898291),(4,10,6,'Cerdar Cermat K3','<p>Perlombaan cerdas cermat antar bagian tentang K3</p>','2017-03-11','','K3L PLTG Batanghari','Bagian Operasi dan Pemeliharaan',15,'<p>3 tim finalis memiliki pemahaman yang baik tentang K3</p>',8,1496898356,8,1496898356);

/*Table structure for table `sector` */

DROP TABLE IF EXISTS `sector`;

CREATE TABLE `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(150) NOT NULL,
  `sector_code` varchar(10) DEFAULT NULL,
  `sector_order` int(2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `sector` */

insert  into `sector`(`id`,`sector_name`,`sector_code`,`sector_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'Sektor Keramasan',NULL,7,8,1479442578,8,1492871365),(4,'Sektor Jambi',NULL,8,8,1479442615,8,1492871359),(5,'Sektor Bandar Lampung',NULL,9,8,1479442635,8,1492871279),(6,'Sektor Bukit Tinggi',NULL,10,8,1479442646,8,1492871353),(7,'Sektor Bengkulu',NULL,11,8,1479442656,8,1492871346),(8,'Sektor Bukit Asam',NULL,3,8,1479442677,8,1492871289),(9,'Sektor Tarahan',NULL,4,8,1479442685,8,1492871384),(10,'Kantor Induk','KTR_IDK',1,8,1492871390,8,1492964088),(11,'Sektor Ombilin','',2,8,1495616146,8,1495616146),(12,'Sektor Teluk Sirih','',5,8,1495616156,8,1495616156),(13,'Sektor Sebalang','',6,8,1495616163,8,1495616163);

/*Table structure for table `skko` */

DROP TABLE IF EXISTS `skko`;

CREATE TABLE `skko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) DEFAULT NULL,
  `skko_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_skko_sector` (`sector_id`),
  KEY `FK_skko_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_skko_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_skko_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `skko` */

insert  into `skko`(`id`,`sector_id`,`power_plant_id`,`skko_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,10,NULL,2016,8,1493203904,8,1493203904);

/*Table structure for table `skko_detail` */

DROP TABLE IF EXISTS `skko_detail`;

CREATE TABLE `skko_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skko_id` int(11) NOT NULL,
  `skko_number` varchar(100) NOT NULL,
  `skko_date` date NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_skko_detail` (`skko_id`),
  CONSTRAINT `FK_skko_detail` FOREIGN KEY (`skko_id`) REFERENCES `skko` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `skko_detail` */

insert  into `skko_detail`(`id`,`skko_id`,`skko_number`,`skko_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,2,'Dokumen No 1/1/1','2017-04-27',8,1493203904,8,1493203904),(3,2,'Dokumen No 2/2/2','2017-04-09',8,1493203905,8,1493203905),(4,2,'Dokumen No 3/3/3','2017-04-10',8,1493203906,8,1493203906);

/*Table structure for table `slo_generator` */

DROP TABLE IF EXISTS `slo_generator`;

CREATE TABLE `slo_generator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `generator_unit` varchar(100) NOT NULL,
  `sg_form_month_type_code` varchar(10) NOT NULL,
  `sg_operation_year` int(4) NOT NULL,
  `sg_machine_name` varchar(100) DEFAULT NULL,
  `sg_machine_code` varchar(100) DEFAULT NULL,
  `sg_machine_brand` varchar(10) DEFAULT NULL,
  `sg_machine_type` varchar(100) DEFAULT NULL,
  `sg_machine_serial_number` varchar(100) DEFAULT NULL,
  `sg_generator_brand` varchar(10) DEFAULT NULL,
  `sg_generator_type` varchar(100) DEFAULT NULL,
  `sg_generator_serial_number` varchar(100) DEFAULT NULL,
  `sg_boiler_brand` varchar(10) DEFAULT NULL,
  `power_installed` decimal(5,2) NOT NULL,
  `sg_year` int(4) NOT NULL,
  `generator_status` varchar(10) NOT NULL,
  `sg_number` varchar(100) DEFAULT NULL,
  `sg_published` date DEFAULT NULL,
  `sg_end` date DEFAULT NULL,
  `sg_max_extension` date DEFAULT NULL,
  `sg_publisher` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_slo_generator_pp` (`power_plant_id`),
  KEY `FK_slo_generator_sector` (`sector_id`),
  CONSTRAINT `FK_slo_generator_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_slo_generator_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `slo_generator` */

insert  into `slo_generator`(`id`,`sector_id`,`power_plant_id`,`generator_unit`,`sg_form_month_type_code`,`sg_operation_year`,`sg_machine_name`,`sg_machine_code`,`sg_machine_brand`,`sg_machine_type`,`sg_machine_serial_number`,`sg_generator_brand`,`sg_generator_type`,`sg_generator_serial_number`,`sg_boiler_brand`,`power_installed`,`sg_year`,`generator_status`,`sg_number`,`sg_published`,`sg_end`,`sg_max_extension`,`sg_publisher`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,10,6,'PLTG PAUH LIMO #1 ','FMTC8',1983,'PLTG PAUH LIMO 1','22722330101001','SMB1','5001/PG 3541P','T 202','SGB1','','','SBB1','17.52',2015,'SGUC1','No. ','2017-06-07','2017-06-14','2017-06-15','Dalam proses pengurusan. ND No. 00197/SER.00.01/MANPRO/2015',8,1496741550,8,1499176697),(5,10,6,'PLTG PAUH LIMO #2 ','FMTC8',1983,'PLTG PAUH LIMO 2','22722330101002','SMB1','5001/PG 3541P','T 203','SGB1','','','SBB1','17.52',2015,'SGUC1','No. ',NULL,NULL,NULL,'Dalam proses pengurusan. ND No. 00197/SER.00.01/MANPRO/2015',8,1498064715,8,1499177135),(6,10,6,'PLTG PAUH LIMO #3','FMTC8',1995,'PLTG PAUH LIMO 3','22722330101003','SMB1','5001/PG 3541P','T 310','SGB1','','','SBB1','17.52',2015,'SGUC1','No. 045/PL/147A.10/BKT-JS/2010','2017-06-19','2017-06-26','2017-06-19','Dalam proses pengurusan. ND No. 00197/SER.00.01/MANPRO/2015',8,1498064914,8,1499177166);

/*Table structure for table `slo_tools` */

DROP TABLE IF EXISTS `slo_tools`;

CREATE TABLE `slo_tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `st_form_month_type_code` varchar(10) NOT NULL,
  `st_year` int(4) NOT NULL,
  `st_generator_unit` varchar(100) NOT NULL,
  `st_generator_location` varchar(100) NOT NULL,
  `st_generator_status` varchar(10) NOT NULL,
  `st_category` varchar(10) NOT NULL,
  `st_type` varchar(100) DEFAULT NULL,
  `st_location` varchar(50) DEFAULT NULL,
  `st_validation_number` varchar(100) DEFAULT NULL,
  `st_published` date DEFAULT NULL,
  `st_check1` date DEFAULT NULL,
  `st_check2` date DEFAULT NULL,
  `st_next_check` varchar(10) DEFAULT NULL,
  `st_certificate_publisher` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_slo_tools_pp` (`power_plant_id`),
  KEY `FK_slo_tools` (`sector_id`),
  CONSTRAINT `FK_slo_tools` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_slo_tools_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `slo_tools` */

insert  into `slo_tools`(`id`,`sector_id`,`power_plant_id`,`st_form_month_type_code`,`st_year`,`st_generator_unit`,`st_generator_location`,`st_generator_status`,`st_category`,`st_type`,`st_location`,`st_validation_number`,`st_published`,`st_check1`,`st_check2`,`st_next_check`,`st_certificate_publisher`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,10,6,'FMTC8',2015,'PLTG PAUH LIMO','Kota Padang','SGC1','SCC1','Overhead Travelling Crane','','','2017-07-12',NULL,NULL,'SNC1','',8,1496998037,8,1498916113),(5,10,6,'FMTC1',3212,'123123','123','SGC1','SCC1','23','213','23','2017-06-12','2017-06-27','2017-06-21','SNC1','23',8,1497156045,8,1497156045),(7,10,6,'FMTC8',2015,'PLTG PAUH LIMO','Kota Padang','SGC1','SCC2','','','',NULL,NULL,NULL,'SNC1','',8,1498072051,8,1498072051),(8,11,7,'FMTC8',2015,'awd','adwa','SGC1','SCC1','adw','daw','daw','2017-07-03',NULL,'2017-07-24','SNC1','daw',8,1498916231,8,1498916236);

/*Table structure for table `smk3` */

DROP TABLE IF EXISTS `smk3`;

CREATE TABLE `smk3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `smk3_year` int(4) NOT NULL,
  `smk3_auditor` text NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_smk3_sector` (`sector_id`),
  KEY `FK_smk3_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_smk3_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_smk3_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `smk3` */

insert  into `smk3`(`id`,`sector_id`,`power_plant_id`,`smk3_year`,`smk3_auditor`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,4,1,1234,'<p>adawdawda</p>',8,1492882423,8,1492884852);

/*Table structure for table `smk3_criteria` */

DROP TABLE IF EXISTS `smk3_criteria`;

CREATE TABLE `smk3_criteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smk3_subtitle_id` int(11) NOT NULL,
  `sctr_criteria` varchar(1000) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_smk3_criteria_subtitle` (`smk3_subtitle_id`),
  CONSTRAINT `FK_smk3_criteria_subtitle` FOREIGN KEY (`smk3_subtitle_id`) REFERENCES `smk3_subtitle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_criteria` */

insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (31,15,'awada',8,1486551819,8,1486551819),(32,16,'asdadasfas',8,1486551916,8,1486551916),(33,16,'asdafsaf',8,1486551916,8,1486551916),(34,16,'asdafsadsaf',8,1486551916,8,1486551916),(35,17,'asfasfasdasfasfasf',8,1486551916,8,1486551916),(36,17,'asfasdasf',8,1486551916,8,1486551916),(37,18,'asdadwad',8,1486552144,8,1486552144),(38,18,'saddawdawdad',8,1486552144,8,1486552144),(39,18,'adsadwadsadw',8,1486552145,8,1486552145),(40,18,'asdasdawdada',8,1486552145,8,1486552145),(41,19,'asdawdawdawd',8,1486552145,8,1486552145),(42,20,'asdwadasdw',8,1486552145,8,1486552145),(43,21,'dasdwadasdwadwad',8,1486552145,8,1486552145),(44,21,'asdadawdasd',8,1486552145,8,1486552145),(45,22,'asdwad',8,1486552301,8,1486552301),(46,22,'asdadaw',8,1486552301,8,1486552301),(47,22,'sadawdasdw',8,1486552301,8,1486552301),(48,23,'dwadasdawdadawadwadawdwadawd',8,1486552301,8,1486552301),(49,23,'asdadwad',8,1486552301,8,1486552301),(50,24,'asdawdaw',8,1486552355,8,1486552355),(51,24,'asdwadasdwad',8,1486552355,8,1486552355),(52,24,'dawdasdwadasdawdadsadw',8,1486552356,8,1486552356),(53,25,'adsadawdasdwadwad',8,1486552356,8,1486552356),(54,25,'asdsadasdawda',8,1486552356,8,1486552356),(55,26,'asdawdasdwad',8,1486552356,8,1486552356),(61,32,'asdawd',8,1486565158,8,1486565158),(63,35,'<p>asdadsdwd<strong>asdawdsad<em>asdasdsadawa<del>dasdsadwadsa</del></em></strong></p>',8,1486640348,8,1486640348),(67,37,'<p>asdwada</p>',8,1486641950,8,1486641950),(68,37,'<p>asdawd</p>',8,1486641951,8,1486641951),(69,37,'<p>asdawd</p>',8,1486641951,8,1486641951),(70,38,'<p>asdasdawd</p>',8,1486641951,8,1486641951),(71,38,'<p>asdawdsad</p>',8,1486641951,8,1486641951),(72,38,'<p>asdwadsad<em>sadadadasdwadawd<strong>sadwad</strong><strong></strong></em></p>',8,1486641951,8,1486641951);

/*Table structure for table `smk3_detail` */

DROP TABLE IF EXISTS `smk3_detail`;

CREATE TABLE `smk3_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smk3_id` int(11) NOT NULL,
  `smk3_criteria_id` int(11) NOT NULL,
  `sdtl_answer` int(2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_smk3_answer_criteria` (`smk3_criteria_id`),
  KEY `FK_smk3_answer` (`smk3_id`),
  CONSTRAINT `FK_smk3_answer` FOREIGN KEY (`smk3_id`) REFERENCES `smk3` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_smk3_answer_criteria` FOREIGN KEY (`smk3_criteria_id`) REFERENCES `smk3_criteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_detail` */

insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (390,8,31,0,8,1492882423,8,1492884852),(391,8,32,0,8,1492882423,8,1492884852),(392,8,33,0,8,1492882424,8,1492884852),(393,8,34,0,8,1492882424,8,1492884852),(394,8,35,0,8,1492882424,8,1492884852),(395,8,36,0,8,1492882424,8,1492884852),(396,8,37,0,8,1492882424,8,1492884852),(397,8,38,0,8,1492882424,8,1492884852),(398,8,39,0,8,1492882424,8,1492884852),(399,8,40,0,8,1492882424,8,1492884852),(400,8,41,0,8,1492882424,8,1492884852),(401,8,42,0,8,1492882424,8,1492884852),(402,8,43,0,8,1492882424,8,1492884852),(403,8,44,0,8,1492882424,8,1492884852),(404,8,45,0,8,1492882424,8,1492884852),(405,8,46,0,8,1492882424,8,1492884852),(406,8,47,0,8,1492882424,8,1492884852),(407,8,48,0,8,1492882424,8,1492884852),(408,8,49,0,8,1492882424,8,1492884852),(409,8,50,0,8,1492882424,8,1492884852),(410,8,51,0,8,1492882424,8,1492884852),(411,8,52,0,8,1492882424,8,1492884852),(412,8,53,0,8,1492882424,8,1492884852),(413,8,54,0,8,1492882424,8,1492884852),(414,8,55,1,8,1492882424,8,1492884852),(415,8,61,2,8,1492882424,8,1492884852),(416,8,63,0,8,1492882424,8,1492884852),(417,8,67,0,8,1492882424,8,1492884852),(418,8,68,0,8,1492882424,8,1492884852),(419,8,69,0,8,1492882424,8,1492884852),(420,8,70,0,8,1492882424,8,1492884852),(421,8,71,1,8,1492882424,8,1492884852),(422,8,72,2,8,1492882424,8,1492884852);

/*Table structure for table `smk3_subtitle` */

DROP TABLE IF EXISTS `smk3_subtitle`;

CREATE TABLE `smk3_subtitle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smk3_title_id` int(11) NOT NULL,
  `ssub_subtitle` varchar(1000) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_smk3_title` (`smk3_title_id`),
  CONSTRAINT `FK_smk3_title` FOREIGN KEY (`smk3_title_id`) REFERENCES `smk3_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_subtitle` */

insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,14,'awdadad',8,1486551819,8,1486551819),(16,15,'asdfasdasfasdasf',8,1486551916,8,1486551916),(17,15,'asdasdasdasf',8,1486551916,8,1486551916),(18,16,'sadawdasdwad',8,1486552144,8,1486552144),(19,16,'asdadadwad',8,1486552145,8,1486552145),(20,16,'asdasdwad',8,1486552145,8,1486552145),(21,16,'asdawdasdadwa',8,1486552145,8,1486552145),(22,17,'asdawad',8,1486552301,8,1486552301),(23,17,'asdawdsa',8,1486552301,8,1486552301),(24,18,'dwadzxdzdad',8,1486552355,8,1486552355),(25,18,'asdasdawdasdwada',8,1486552356,8,1486552356),(26,18,'asdasdawd',8,1486552356,8,1486552356),(32,24,'asdadw',8,1486565158,8,1486565158),(35,26,'asdwadsdw',8,1486640348,8,1486640348),(37,28,'asdawd',8,1486641950,8,1486641950),(38,28,'asdwadsd',8,1486641951,8,1486641951);

/*Table structure for table `smk3_title` */

DROP TABLE IF EXISTS `smk3_title`;

CREATE TABLE `smk3_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sttl_title` varchar(1000) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_title` */

insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'Judul',8,1486470338,8,1486470338),(14,'wadawda',8,1486551819,8,1486551819),(15,'Jududul',8,1486551915,8,1486551915),(16,'adsadwad',8,1486552144,8,1486552144),(17,'adsadawda',8,1486552299,8,1486552299),(18,'awdasdawdasda',8,1486552355,8,1486552355),(24,'adwad',8,1486565158,8,1486565158),(25,'judul',8,1486635593,8,1486635593),(26,'awdasdw',8,1486640348,8,1486640348),(28,'wdadsd',8,1486641950,8,1486641950);

/*Table structure for table `sprinkle_monitoring` */

DROP TABLE IF EXISTS `sprinkle_monitoring`;

CREATE TABLE `sprinkle_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `sm_form_month_type_code` varchar(10) NOT NULL,
  `sm_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sprinkle_monitoring_sector` (`sector_id`),
  KEY `FK_sprinkle_monitoring_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_sprinkle_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sprinkle_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sprinkle_monitoring` */

insert  into `sprinkle_monitoring`(`id`,`sector_id`,`power_plant_id`,`sm_form_month_type_code`,`sm_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,10,6,'FMTC1',2016,8,1511700414,8,1511700414);

/*Table structure for table `sprinkle_monitoring_detail` */

DROP TABLE IF EXISTS `sprinkle_monitoring_detail`;

CREATE TABLE `sprinkle_monitoring_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sprinkle_monitoring_id` int(11) NOT NULL,
  `sm_location` varchar(50) NOT NULL,
  `sm_sprinkle_head` varchar(10) DEFAULT NULL,
  `sm_detector` varchar(10) DEFAULT NULL,
  `sm_piping_condition` varchar(10) DEFAULT NULL,
  `sm_notes` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sprinkle_monitoring_detail` (`sprinkle_monitoring_id`),
  CONSTRAINT `FK_sprinkle_monitoring_detail` FOREIGN KEY (`sprinkle_monitoring_id`) REFERENCES `sprinkle_monitoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sprinkle_monitoring_detail` */

insert  into `sprinkle_monitoring_detail`(`id`,`sprinkle_monitoring_id`,`sm_location`,`sm_sprinkle_head`,`sm_detector`,`sm_piping_condition`,`sm_notes`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,2,'awd','SSH1','SD2','SPC2','adw',8,1511701667,8,1511701667),(5,2,'okasid21','SSH1','SD2','SPC2','awd',8,1511701898,8,1511701898);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(5) unsigned NOT NULL,
  `branch_id` tinyint(3) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`employee_id`,`branch_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (5,1,1,'tonny','HnE4y57oGqEFngtxia6M2Ka4W7gr2Ax0','$2y$13$3yKtjoQ/g9P89Hbc1NaFEO/GJsaE/LzikTjNIQO1LjAoKzVA1.pLm',NULL,'N',1457708718,1464334126,0,8),(6,3,1,'operator','imp4KzVp08MKpkph_ivwMsDa3OqR5xh3','$2y$13$tP8vFkjUG3AuR/LWurDadOdoQAEeos8Ejmy.tLFgBYPrSOdD7NPuy','f90Xwcim-PpzNatj9Zs5pNt3m9dUG9xF_1463481747','Y',1461898938,1463481747,5,6),(7,2,1,'supervisor','6pVYuEE-QBqQq6fGdQVBRFPGXCRyhKLP','$2y$13$MY4HcQ49hNgLzx16opFDiOOrq7eFQm2YcmG.IJZejZ77.w7zaJiPa','OWs1FsilmTVmgnBujy9C_mQqPrux_WFU_1461898973','Y',1461898973,1461899028,5,5),(8,1,1,'admin','NcRenGFqHJe153TpBrn-U_gLgiSbjT7d','$2y$13$u87MDBat2c0Q4XUiqrfpF.ADeSRhOl/QsUgo7bUR.wDnbLd6e2XeG','7fIIHhXUSFXyoEAGotFFzYemYPbwL82j_1464333703','Y',1464333703,1480133297,5,8),(12,6,1,'jokotest','M8f3j8YeCuBS7-63Wm8AznhCGK7e-Jjm','$2y$13$l9dA261SwUyWmrhZt0EtkuzBV/9p5OJhpjvl/.2KoLUFNwBjB2QCq','V73MFf6J4YiAGXZncxyQiHZRe_YqO1pi_1467276749','Y',1467276749,1480133435,8,12);

/*Table structure for table `user_sector` */

DROP TABLE IF EXISTS `user_sector`;

CREATE TABLE `user_sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL,
  `sector_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_sector_sector` (`sector_id`),
  KEY `FK_user_sector_user` (`user_id`),
  CONSTRAINT `FK_user_sector_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_sector_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `user_sector` */

insert  into `user_sector`(`id`,`user_id`,`sector_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,12,4,8,1480131607,8,1480131607),(13,12,2,8,1480131607,8,1480131607);

/*Table structure for table `wev_detail` */

DROP TABLE IF EXISTS `wev_detail`;

CREATE TABLE `wev_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `working_env_data_id` int(11) NOT NULL,
  `wevd_parameter` varchar(50) NOT NULL,
  `wevd_unit_code` varchar(10) NOT NULL,
  `wevd_qs` int(11) NOT NULL,
  `wevd_test_result` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wev_detail` (`working_env_data_id`),
  CONSTRAINT `FK_wev_detail` FOREIGN KEY (`working_env_data_id`) REFERENCES `working_env_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wev_detail` */

insert  into `wev_detail`(`id`,`working_env_data_id`,`wevd_parameter`,`wevd_unit_code`,`wevd_qs`,`wevd_test_result`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'awdad','WUC2',1231,'123123dawda',8,1498412603,8,1498413703),(2,1,'adad','WUC1',123,'312313dawda',8,1498413703,8,1498413703),(3,1,'adad','WUC2',12313231,'1231wadawda',8,1498413703,8,1498413703),(4,2,'awda','WUC1',23,'123123',8,1498916373,8,1498916373),(5,2,'awdaw','WUC2',3123,'12312312',8,1498916373,8,1498916373),(6,2,'dawda','WUC1',1231,'123213',8,1498916373,8,1498916373);

/*Table structure for table `whm_month` */

DROP TABLE IF EXISTS `whm_month`;

CREATE TABLE `whm_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `working_hour_monitoring_id` int(11) NOT NULL,
  `whmm_month` int(4) NOT NULL,
  `whmm_quantity` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_whm_month` (`working_hour_monitoring_id`),
  CONSTRAINT `FK_whm_month` FOREIGN KEY (`working_hour_monitoring_id`) REFERENCES `working_hour_monitoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `whm_month` */

insert  into `whm_month`(`id`,`working_hour_monitoring_id`,`whmm_month`,`whmm_quantity`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,1,123,8,1511877010,8,1511877111),(2,1,2,12323,8,1511877010,8,1511877111),(3,1,3,231,8,1511877010,8,1511877111),(4,1,4,123,8,1511877010,8,1511877111),(5,1,5,123,8,1511877010,8,1511877111),(6,1,6,213,8,1511877010,8,1511877111),(7,1,7,NULL,8,1511877010,8,1511877111),(8,1,8,NULL,8,1511877010,8,1511877111),(9,1,9,NULL,8,1511877010,8,1511877111),(10,1,10,NULL,8,1511877010,8,1511877111),(11,1,11,123,8,1511877010,8,1511877111),(12,1,12,NULL,8,1511877010,8,1511877111);

/*Table structure for table `work_accident` */

DROP TABLE IF EXISTS `work_accident`;

CREATE TABLE `work_accident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `wa_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_accident_power_plant` (`power_plant_id`),
  KEY `FK_work_accident_sector` (`sector_id`),
  CONSTRAINT `FK_work_accident_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_work_accident_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `work_accident` */

insert  into `work_accident`(`id`,`sector_id`,`power_plant_id`,`wa_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,2016,8,1511926720,8,1511926720),(2,10,6,2017,8,1511928267,8,1511928267);

/*Table structure for table `work_accident_detail` */

DROP TABLE IF EXISTS `work_accident_detail`;

CREATE TABLE `work_accident_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_accident_id` int(11) NOT NULL,
  `wad_date` date NOT NULL,
  `wad_event` varchar(50) NOT NULL,
  `wad_type` varchar(10) NOT NULL,
  `wad_work_area` text,
  `wad_address` text,
  `wad_impact_corp` text,
  `wad_impact_indi` text,
  `wad_chronology` text,
  `wad_inv_date` date DEFAULT NULL,
  `wad_inv_team` varchar(50) DEFAULT NULL,
  `wad_inv_k3_action` varchar(50) DEFAULT NULL,
  `wad_inv_uns_condition` varchar(50) DEFAULT NULL,
  `wad_inv_uns_action` varchar(50) DEFAULT NULL,
  `wad_result` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_accident_detail` (`work_accident_id`),
  CONSTRAINT `FK_work_accident_detail` FOREIGN KEY (`work_accident_id`) REFERENCES `work_accident` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `work_accident_detail` */

insert  into `work_accident_detail`(`id`,`work_accident_id`,`wad_date`,`wad_event`,`wad_type`,`wad_work_area`,`wad_address`,`wad_impact_corp`,`wad_impact_indi`,`wad_chronology`,`wad_inv_date`,`wad_inv_team`,`wad_inv_k3_action`,`wad_inv_uns_condition`,`wad_inv_uns_action`,`wad_result`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'2017-11-07','adw','WWAT2','aw','d','awd','dw','a','2017-11-30','adw','aawd','','awd','',8,1511927981,8,1511928224),(2,1,'2017-11-06','awd','WWAT3','awd','awd','ad','wdaw','',NULL,'','','','awd','',8,1511948423,8,1511948423);

/*Table structure for table `working_env_data` */

DROP TABLE IF EXISTS `working_env_data`;

CREATE TABLE `working_env_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `wed_test_date` date NOT NULL,
  `wed_work_area` varchar(100) NOT NULL,
  `wed_executor` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_env_data_pp` (`power_plant_id`),
  KEY `FK_working_env_data_sector` (`sector_id`),
  CONSTRAINT `FK_working_env_data_pp` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_working_env_data_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `working_env_data` */

insert  into `working_env_data`(`id`,`sector_id`,`power_plant_id`,`wed_test_date`,`wed_work_area`,`wed_executor`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'2017-06-14','dawd','adwda',8,1498412603,8,1498413703),(2,11,7,'2017-07-05','dawda','awda',8,1498916373,8,1498916373);

/*Table structure for table `working_hour_monitoring` */

DROP TABLE IF EXISTS `working_hour_monitoring`;

CREATE TABLE `working_hour_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `worker_type` varchar(10) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_hour_monitoring_power_plant` (`power_plant_id`),
  KEY `FK_working_hour_monitoring_sector` (`sector_id`),
  CONSTRAINT `FK_working_hour_monitoring_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_working_hour_monitoring_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `working_hour_monitoring` */

insert  into `working_hour_monitoring`(`id`,`sector_id`,`power_plant_id`,`worker_type`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,6,'WWT2',8,1511877010,8,1511877111);

/*Table structure for table `working_permit` */

DROP TABLE IF EXISTS `working_permit`;

CREATE TABLE `working_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) DEFAULT NULL,
  `wp_registration_number` varchar(150) NOT NULL,
  `wp_submit_date` date NOT NULL,
  `wp_revision_number` int(3) DEFAULT NULL,
  `wp_page` int(3) DEFAULT NULL,
  `wp_work_type` varchar(255) DEFAULT NULL,
  `wp_work_details` text,
  `wp_work_location` varchar(255) DEFAULT NULL,
  `wp_company_department` varchar(150) DEFAULT NULL,
  `wp_leader_name` varchar(150) DEFAULT NULL,
  `wp_leader_phone` varchar(15) DEFAULT NULL,
  `wp_supervisor_name` varchar(150) DEFAULT NULL,
  `wp_supervisor_phone` varchar(15) DEFAULT NULL,
  `wp_start_date` datetime DEFAULT NULL,
  `wp_end_date` datetime DEFAULT NULL,
  `wp_pln_noe` int(3) DEFAULT NULL,
  `wp_outsource_noe` int(3) DEFAULT NULL,
  `wp_job_classification` text,
  `wp_k3_rules` text,
  `wp_self_protection` text,
  `wp_dangerous_work_type` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_permit_sector` (`sector_id`),
  KEY `FK_working_permit_powerplant` (`power_plant_id`),
  CONSTRAINT `FK_working_permit_powerplant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_working_permit_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `working_permit` */

insert  into `working_permit`(`id`,`sector_id`,`power_plant_id`,`wp_registration_number`,`wp_submit_date`,`wp_revision_number`,`wp_page`,`wp_work_type`,`wp_work_details`,`wp_work_location`,`wp_company_department`,`wp_leader_name`,`wp_leader_phone`,`wp_supervisor_name`,`wp_supervisor_phone`,`wp_start_date`,`wp_end_date`,`wp_pln_noe`,`wp_outsource_noe`,`wp_job_classification`,`wp_k3_rules`,`wp_self_protection`,`wp_dangerous_work_type`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,'007.WP/LK2-KITSBS/2015','2015-09-15',NULL,NULL,'Redesign Ruang dan Pengadaan Furniture Ruang Rapat Lantai 1','Bongkar partisi dan Plafon\r\nPemasangan Partisi dan Plafon','Kantor Induk Lantai 1','PT. Ciliwung Utama Prima','Herman Irawan','0813 8060 8999','Eko Isdijanto (Site Manager)','0813 4210 2200','2015-09-19 17:00:00','2015-11-03 17:00:00',NULL,4,'JC1#|#JC4#|#JCO|!|pekerjaan lain','R1#|#R3#|#RO|!|peraturan lain','SP1#|#SP4#|#SP5#|#SP9|!|kebakaran jenis A','DW2#|#DW4#|#DW1|!|area 512#|#DWO|!|pekerjaan berbahaya lain',8,1497070367,8,1497157478),(2,10,6,'dawd','2017-06-27',123,12,'123','123','1231','3123','123','123','123','123','2017-06-07 09:45:00','2017-05-31 09:05:00',123,123,'JC1#|#JC4','R1#|#R3','SP4','DW2#|#DW4',8,1498805071,8,1498805071);

/*Table structure for table `working_plan` */

DROP TABLE IF EXISTS `working_plan`;

CREATE TABLE `working_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_type_code` varchar(10) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `wp_year` varchar(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_plan_sector` (`sector_id`),
  CONSTRAINT `FK_working_plan_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan` */

insert  into `working_plan`(`id`,`form_type_code`,`sector_id`,`wp_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'K3',4,'2017',8,1484970609,8,1485323406),(2,'LH',7,'2014',8,1486740207,8,1486740207),(3,'LH',7,'1231',8,1486839310,8,1486839310);

/*Table structure for table `working_plan_attribute` */

DROP TABLE IF EXISTS `working_plan_attribute`;

CREATE TABLE `working_plan_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_type_code` varchar(10) NOT NULL,
  `attr_text` varchar(255) NOT NULL,
  `attr_parent_id` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_plan_attribute` (`attr_parent_id`),
  CONSTRAINT `FK_working_plan_attribute` FOREIGN KEY (`attr_parent_id`) REFERENCES `working_plan_attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan_attribute` */

insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'PHDR','KESELAMATAN DAN KESEHATAN KERJA',NULL,8,1484375544,8,1484375544),(2,'PSHDR','A. Peningkatan Kapabilitas SDM - K3',NULL,8,1484375573,8,1484375573),(3,'PITEM','Penyusunan Roadmap Training K3',NULL,8,1484375971,8,1484375971),(4,'PITEM','Sosialisasi Roadmap Training K3',NULL,8,1484543457,8,1484543457),(5,'PHDR','LINGKUNGAN',NULL,8,1484797156,8,1484797156),(6,'PSHDR','B. Pengembangan Sistem - K3',NULL,8,1484797207,8,1484797207),(7,'PSHDR','C. Pembangunan Sarana/ Fasilitas - K3',NULL,8,1484797246,8,1484797246),(8,'PSHDR','D. Pengendalian dan Peningkatan - K3',NULL,8,1484797269,8,1484797269),(9,'PSHDR','E. Pemantauan dan Pengukuran - K3',NULL,8,1484797288,8,1484797288),(10,'PITEM','Pelatihan K3 Manajemen',NULL,8,1485313423,8,1485313423);

/*Table structure for table `working_plan_detail` */

DROP TABLE IF EXISTS `working_plan_detail`;

CREATE TABLE `working_plan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `working_plan_id` int(11) NOT NULL,
  `working_plan_attribute_id` int(11) NOT NULL,
  `wpd_rnr` varchar(2) DEFAULT NULL,
  `wpd_location` varchar(100) DEFAULT NULL,
  `wpd_pic` varchar(100) DEFAULT NULL,
  `wpd_order` int(2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_plan_detail_wp` (`working_plan_id`),
  KEY `FK_working_plan_detail_attribute` (`working_plan_attribute_id`),
  CONSTRAINT `FK_working_plan_detail_attribute` FOREIGN KEY (`working_plan_attribute_id`) REFERENCES `working_plan_attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_working_plan_detail_wp` FOREIGN KEY (`working_plan_id`) REFERENCES `working_plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan_detail` */

insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,3,'R','lokasi 1','hendra',0,8,1484970609,8,1485315493),(2,1,4,'R','lokasi 2','anton',1,8,1484970609,8,1484970609),(6,1,10,'NR','KI','Dedy',2,8,1485315493,8,1485315493),(7,3,3,'R','12312','124123',0,8,1486839310,8,1486839310);

/*Table structure for table `working_plan_month` */

DROP TABLE IF EXISTS `working_plan_month`;

CREATE TABLE `working_plan_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `working_plan_detail_id` int(11) NOT NULL,
  `wpm_month` int(2) NOT NULL,
  `wpm_week` int(1) NOT NULL,
  `wpm_value` int(1) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_plan_month_detail` (`working_plan_detail_id`),
  CONSTRAINT `FK_working_plan_month_detail` FOREIGN KEY (`working_plan_detail_id`) REFERENCES `working_plan_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan_month` */

insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (84,1,1,1,3,8,1485323406,8,1485323406),(85,1,1,2,4,8,1485323406,8,1485323406),(86,2,1,2,4,8,1485323406,8,1485323406),(87,6,1,2,4,8,1485323407,8,1485323407),(88,6,3,2,1,8,1485323407,8,1485323407),(89,6,3,3,1,8,1485323407,8,1485323407),(90,6,3,4,1,8,1485323407,8,1485323407),(91,6,4,1,2,8,1485323407,8,1485323407),(92,6,4,2,2,8,1485323407,8,1485323407),(93,6,4,3,3,8,1485323407,8,1485323407),(94,6,5,1,2,8,1485323407,8,1485323407),(95,6,10,2,1,8,1485323407,8,1485323407),(96,6,10,3,1,8,1485323407,8,1485323407),(97,6,10,4,1,8,1485323407,8,1485323407),(98,6,11,1,2,8,1485323407,8,1485323407),(99,6,11,2,2,8,1485323407,8,1485323407),(100,6,11,3,3,8,1485323407,8,1485323407);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;