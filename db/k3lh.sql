/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.5-10.1.19-MariaDB : Database - k3lh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`k3lh` /*!40100 DEFAULT CHARACTER SET latin1 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `attachment` */

insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'1485318881_eTicket_GNLREQ.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'1485318881_eTicket_KEGBAF.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'1485318881_eTicket_DVWQIV_165908.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'1486821633_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1486821633,8,1486821633);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'1486838453_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1486838453,8,1486838453);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'1486838453_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1486838453,8,1486838453);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,'1486839310_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','WORKPLAN',8,1486839310,8,1486839310);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,'1486909069_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1486909069,8,1486909069);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,'1486909069_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1486909069,8,1486909069);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,'1486909070_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1486909070,8,1486909070);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,'1487061100_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1487061100,8,1487061100);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,'1487061975_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1487061975,8,1487061975);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,'1487061975_Monitoring_Anggaran_LK2.xlsx',NULL,'xlsx','ENV_PERM',8,1487061975,8,1487061975);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `attachment_owner` */

insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,1,'WORKPLAN',1,8,1485318881,8,1485318881);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,2,'WORKPLAN',2,8,1485318881,8,1485318881);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,3,'WORKPLAN',6,8,1485318881,8,1485318881);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,9,'WORKPLAN',7,8,1486839310,8,1486839310);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,13,'ENV_PERM',1,8,1487061100,8,1487061100);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,15,'ENV_PERM',3,8,1487061975,8,1487061975);

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

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('Administrator','8',NULL);
insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('Operator','12',NULL);

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

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('Administrator',4,'Level akses admin',NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-realization',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('budget-monitoring-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('codeset',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('codeset-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('codeset-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('codeset-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('codeset-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('codeset-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('environment-permit-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('environment-permit-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('environment-permit-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('environment-permit-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('environment-permit-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('environment-permit-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('izin-lingkungan',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('log',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('log-dirty-delete-all',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('log-dirty-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('login-history-delete-all',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('login-history-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-question-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-question-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-question-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-question-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-question-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-title-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-title-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-title-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-title-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-title-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('maturity-level-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('monitoring-anggaran',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('Operator',3,'Level akses operator',NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('pembangkit-listrik',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('pengguna',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('pertanyaan-maturity-level',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('pertanyaan-smk3',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('power-plant-ajax-plant',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('power-plant-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('power-plant-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('power-plant-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('power-plant-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('power-plant-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profil-pengguna',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profil-perusahaan',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profile-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profile-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profile-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profile-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('profile-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('rencana-kerja',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-ajax-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-ajax-search',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-attribute-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-item-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-kitsbs',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-target-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('roadmap-k3l-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('sector-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('sector-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('sector-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('sector-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('sector-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('sektor',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3',2,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-criteria-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-detail-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-subtitle-ajax-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-title-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-title-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-title-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-title-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-title-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('smk3-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('user-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('user-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('user-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('user-profile-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('user-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('user-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-ajax-delete-detail',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-ajax-read-detail',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-ajax-save-detail',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-ajax-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-ajax-search',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-attribute-view',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-create',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-delete',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-index',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-update',1,NULL,NULL,NULL,NULL,NULL);
insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('working-plan-view',1,NULL,NULL,NULL,NULL,NULL);

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

insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','codeset');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','izin-lingkungan');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','log');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','maturity-level');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','monitoring-anggaran');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pembangkit-listrik');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pengguna');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pertanyaan-maturity-level');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pertanyaan-smk3');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','profil-pengguna');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','profil-perusahaan');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','rencana-kerja');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','roadmap-k3l-kitsbs');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','sektor');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','smk3');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-create');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-index');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-update');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-view');
insert  into `auth_item_child`(`parent`,`child`) values ('izin-lingkungan','environment-permit-create');
insert  into `auth_item_child`(`parent`,`child`) values ('izin-lingkungan','environment-permit-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('izin-lingkungan','environment-permit-detail-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('izin-lingkungan','environment-permit-index');
insert  into `auth_item_child`(`parent`,`child`) values ('izin-lingkungan','environment-permit-update');
insert  into `auth_item_child`(`parent`,`child`) values ('izin-lingkungan','environment-permit-view');
insert  into `auth_item_child`(`parent`,`child`) values ('log','log-dirty-delete-all');
insert  into `auth_item_child`(`parent`,`child`) values ('log','log-dirty-index');
insert  into `auth_item_child`(`parent`,`child`) values ('log','login-history-delete-all');
insert  into `auth_item_child`(`parent`,`child`) values ('log','login-history-index');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-create');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-index');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-update');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-view');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-create');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-detail-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-index');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-realization');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-update');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Operator','pembangkit-listrik');
insert  into `auth_item_child`(`parent`,`child`) values ('Operator','profil-pengguna');
insert  into `auth_item_child`(`parent`,`child`) values ('Operator','sektor');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-ajax-plant');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-index');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-view');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-index');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-view');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-question-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-question-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-question-index');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-question-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-question-view');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-title-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-title-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-title-index');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-title-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-maturity-level','maturity-level-title-view');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-criteria-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-detail-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-subtitle-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-title-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-title-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-title-index');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-title-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pertanyaan-smk3','smk3-title-view');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-pengguna','user-profile-update');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-create');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-index');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-update');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-view');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-ajax-delete-detail');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-ajax-read-detail');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-ajax-save-detail');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-ajax-create');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-ajax-search');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-create');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-index');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-update');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-attribute-view');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-create');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-index');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-update');
insert  into `auth_item_child`(`parent`,`child`) values ('rencana-kerja','working-plan-view');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-ajax-create');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-ajax-search');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-create');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-index');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-update');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-attribute-view');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-create');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-index');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-item-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-target-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-update');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-view');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-create');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-index');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-update');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-view');
insert  into `auth_item_child`(`parent`,`child`) values ('smk3','smk3-create');
insert  into `auth_item_child`(`parent`,`child`) values ('smk3','smk3-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('smk3','smk3-index');
insert  into `auth_item_child`(`parent`,`child`) values ('smk3','smk3-update');
insert  into `auth_item_child`(`parent`,`child`) values ('smk3','smk3-view');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `budget_monitoring` */

insert  into `budget_monitoring`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'LH',4,1,'2017',8,1486035644,8,1486035644);
insert  into `budget_monitoring`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'LH',4,1,'2017',8,1486035723,8,1486565752);
insert  into `budget_monitoring`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'LH',4,1,'2017',8,1486036303,8,1486036303);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `budget_monitoring_detail` */

insert  into `budget_monitoring_detail`(`id`,`budget_monitoring_id`,`bmd_no_prk`,`bmd_program`,`bmd_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,2,'asdf','asdf',110000,8,1486035724,8,1486565753);
insert  into `budget_monitoring_detail`(`id`,`budget_monitoring_id`,`bmd_no_prk`,`bmd_program`,`bmd_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,4,'asdf','asdf',11000,8,1486036303,8,1486036303);
insert  into `budget_monitoring_detail`(`id`,`budget_monitoring_id`,`bmd_no_prk`,`bmd_program`,`bmd_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,4,'qwer','qwer',11000,8,1486036304,8,1486036304);

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `budget_monitoring_month` */

insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,2,2,110000,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,2,3,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,2,4,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,2,5,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,2,6,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,2,7,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,2,8,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,2,9,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,2,10,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,2,11,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,2,12,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,2,13,NULL,NULL,8,1486035724,8,1486565753);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,4,2,11000,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (38,4,3,NULL,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (39,4,4,NULL,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,4,5,NULL,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (41,4,6,NULL,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (42,4,7,NULL,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (43,4,8,NULL,NULL,8,1486036303,8,1486036303);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (44,4,9,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (45,4,10,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (46,4,11,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (47,4,12,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (48,4,13,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (49,5,2,11000,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (50,5,3,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (51,5,4,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (52,5,5,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (53,5,6,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (54,5,7,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (55,5,8,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (56,5,9,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (57,5,10,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (58,5,11,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (59,5,12,NULL,NULL,8,1486036304,8,1486036304);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (60,5,13,NULL,NULL,8,1486036304,8,1486036304);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `codeset` */

insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,'WEB_CONFIG','ALLOWED_IP','127.0.0.1; ::1; 36.68.179.127; 36.77.140.14; 36.77.110.187','IP Address yang diijinkan untuk akses aplikasi. Pisahkan berdasarkan titik koma. Cth: 127.0.01; 128.1.1.2','',6,1462779626,1462786889,5,5);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (2,'POST_TYPE_CODE','PAGE','Halaman','','',NULL,1474948722,1474948722,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (3,'POST_TYPE_CODE','NEWS','Berita','','',NULL,1475051416,1475051416,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (4,'FORM_TYPE_CODE','K3','K3','K3','',NULL,1482483701,1482483701,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (5,'FORM_TYPE_CODE','LH','Lingkungan Hidup','Lingkungan Hidup','',NULL,1482483722,1482483722,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (6,'ATTRIBUTE_TYPE_CODE','TGT','Target','','',NULL,1482729769,1482729769,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (7,'ATTRIBUTE_TYPE_CODE','PHDR','Header','','',1,1482729801,1482729801,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (8,'ATTRIBUTE_TYPE_CODE','PSHDR','Sub Header','','',2,1482729814,1482729814,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (9,'ATTRIBUTE_TYPE_CODE','PITEM','Item','','',3,1482729825,1482729825,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (10,'WP_LEGEND','1','Persiapan Program (TOR, RAB)','','',NULL,1484796129,1484796129,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (11,'WP_LEGEND','2','Proses Pengadaan Barang / Jasa','','',NULL,1484796147,1484796147,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (12,'WP_LEGEND','3','Pelaksanaan Program','','',NULL,1484796162,1484796162,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (13,'WP_LEGEND','4','Monitoring Evaluasi','','',NULL,1484796174,1484796174,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (14,'WP_LEGEND','5','Penyusunan Laporan','','',NULL,1484796190,1484796190,8,8);

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

insert  into `employee`(`id`,`name`,`address`,`email`,`phone`,`salary`,`commission`,`note`,`joined_date`,`status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Joko Hermanto','Lorong Jengkol. Talang Banjar.','joko.hermanto19@gmail.com','085228292014',0,'20.00','','2016-04-01','Y',0,0,8,1480133297);
insert  into `employee`(`id`,`name`,`address`,`email`,`phone`,`salary`,`commission`,`note`,`joined_date`,`status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'Supervisor','',NULL,'0819',NULL,NULL,NULL,'2016-03-24','Y',0,0,5,1460139806);
insert  into `employee`(`id`,`name`,`address`,`email`,`phone`,`salary`,`commission`,`note`,`joined_date`,`status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'Operator','',NULL,'0852',NULL,NULL,NULL,'2016-03-24','Y',0,0,0,0);
insert  into `employee`(`id`,`name`,`address`,`email`,`phone`,`salary`,`commission`,`note`,`joined_date`,`status`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'Joko Test','Bhayangkara','','123123131231231',0,NULL,NULL,'2016-06-30','Y',8,1467276747,12,1480133435);

/*Table structure for table `environment_permit` */

DROP TABLE IF EXISTS `environment_permit`;

CREATE TABLE `environment_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ep_year` int(4) NOT NULL,
  `ep_quarter` varchar(2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_sector` (`sector_id`),
  KEY `FK_environment_permit_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_environment_permit_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_environment_permit_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit` */

insert  into `environment_permit`(`id`,`sector_id`,`power_plant_id`,`ep_year`,`ep_quarter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,7,5,2131,'13',8,1487061099,8,1487061634);
insert  into `environment_permit`(`id`,`sector_id`,`power_plant_id`,`ep_year`,`ep_quarter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,7,5,12312,'12',8,1487061974,8,1487061974);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_detail` */

insert  into `environment_permit_detail`(`id`,`environment_permit_id`,`ep_document_name`,`ep_institution`,`ep_date`,`ep_limit_capacity`,`ep_realization_capacity`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'wadwad','wadawd','2017-03-01',12312332,123123,8,1487061100,8,1487061634);
insert  into `environment_permit_detail`(`id`,`environment_permit_id`,`ep_document_name`,`ep_institution`,`ep_date`,`ep_limit_capacity`,`ep_realization_capacity`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,2,'awdadw','awdawd','2017-02-02',12312,123123,8,1487061975,8,1487061975);

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
) ENGINE=InnoDB AUTO_INCREMENT=1700 DEFAULT CHARSET=latin1;

/*Data for the table `log` */

insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'SUCCESS','sector','INSERTING NEW DATA WITH ID #1',8,1479442400,8,1479442400);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'SUCCESS','sector','UPDATING DATA ID #1',8,1479442515,8,1479442515);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #1',8,1479442515,8,1479442515);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'SUCCESS','sector','UPDATING DATA ID #1',8,1479442528,8,1479442528);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #2',8,1479442528,8,1479442528);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'SUCCESS','sector','INSERTING NEW DATA WITH ID #2',8,1479442578,8,1479442578);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'SUCCESS','sector','INSERTING NEW DATA WITH ID #3',8,1479442600,8,1479442600);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,'SUCCESS','sector','INSERTING NEW DATA WITH ID #4',8,1479442615,8,1479442615);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,'SUCCESS','sector','INSERTING NEW DATA WITH ID #5',8,1479442635,8,1479442635);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,'SUCCESS','sector','INSERTING NEW DATA WITH ID #6',8,1479442646,8,1479442646);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,'SUCCESS','sector','INSERTING NEW DATA WITH ID #7',8,1479442656,8,1479442656);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,'SUCCESS','sector','INSERTING NEW DATA WITH ID #8',8,1479442677,8,1479442677);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,'SUCCESS','sector','INSERTING NEW DATA WITH ID #9',8,1479442685,8,1479442685);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,'SUCCESS','power_plant','INSERTING NEW DATA WITH ID #1',8,1479444423,8,1479444423);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,'SUCCESS','power_plant','UPDATING DATA ID #1',8,1479444562,8,1479444562);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #3',8,1479444562,8,1479444562);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,'SUCCESS','power_plant','UPDATING DATA ID #1',8,1479444587,8,1479444587);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #4',8,1479444587,8,1479444587);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,'SUCCESS','power_plant','INSERTING NEW DATA WITH ID #2',8,1479444739,8,1479444739);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,'SUCCESS','power_plant','INSERTING NEW DATA WITH ID #3',8,1479444771,8,1479444771);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,'SUCCESS','power_plant','INSERTING NEW DATA WITH ID #4',8,1479444945,8,1479444945);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,'SUCCESS','power_plant','INSERTING NEW DATA WITH ID #5',8,1479445219,8,1479445219);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,'SUCCESS','auth_item_child','DELETING DATA ID #administrator-sektor',8,1479728932,8,1479728932);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #administrator-sektor',8,1479729076,8,1479729076);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,'SUCCESS','auth_item_child','DELETING DATA ID #administrator-sektor',8,1479729495,8,1479729495);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (26,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #administrator-sektor',8,1479729513,8,1479729513);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (27,'SUCCESS','auth_item','INSERTING NEW DATA WITH ID #Operator',8,1480052146,8,1480052146);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (28,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #Operator-pembangkit-listrik',8,1480052177,8,1480052177);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (29,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #Operator-sektor',8,1480052177,8,1480052177);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (30,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #Operator-profil',8,1480052200,8,1480052200);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (31,'SUCCESS','employee','UPDATING DATA ID #6',8,1480052276,8,1480052276);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (32,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480052276,8,1480052276);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (33,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480052276,8,1480052276);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (34,'SUCCESS','employee','UPDATING DATA ID #6',8,1480052326,8,1480052326);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480052326,8,1480052326);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (36,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480052326,8,1480052326);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,'SUCCESS','employee','UPDATING DATA ID #6',8,1480052516,8,1480052516);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (38,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480052516,8,1480052516);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (39,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480052516,8,1480052516);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #1',8,1480052516,8,1480052516);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (41,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #2',8,1480052516,8,1480052516);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (42,'SUCCESS','employee','UPDATING DATA ID #6',8,1480052537,8,1480052537);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (43,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480052537,8,1480052537);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (44,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480052537,8,1480052537);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (45,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #3',8,1480052537,8,1480052537);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (46,'SUCCESS','employee','UPDATING DATA ID #6',8,1480053994,8,1480053994);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (47,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480053994,8,1480053994);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (48,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480053994,8,1480053994);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (49,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #4',8,1480053994,8,1480053994);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (50,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #5',8,1480053994,8,1480053994);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (53,'SUCCESS','employee','UPDATING DATA ID #6',8,1480131494,8,1480131494);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (54,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480131494,8,1480131494);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (55,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480131494,8,1480131494);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (56,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480131494,8,1480131494);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (57,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #6',8,1480131494,8,1480131494);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (58,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #7',8,1480131494,8,1480131494);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (59,'SUCCESS','employee','UPDATING DATA ID #6',8,1480131503,8,1480131503);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (60,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480131503,8,1480131503);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (61,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480131503,8,1480131503);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (62,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #8',8,1480131503,8,1480131503);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (63,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #9',8,1480131503,8,1480131503);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (66,'SUCCESS','employee','UPDATING DATA ID #6',8,1480131585,8,1480131585);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (67,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480131585,8,1480131585);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (68,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #10',8,1480131585,8,1480131585);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (69,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #11',8,1480131585,8,1480131585);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (70,'SUCCESS','employee','UPDATING DATA ID #6',8,1480131592,8,1480131592);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (71,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480131592,8,1480131592);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (72,'SUCCESS','employee','UPDATING DATA ID #6',8,1480131607,8,1480131607);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (73,'SUCCESS','{{%user}}','UPDATING DATA ID #12',8,1480131607,8,1480131607);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (74,'SUCCESS','auth_assignment','INSERTING NEW DATA WITH ID #',8,1480131607,8,1480131607);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (75,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #12',8,1480131607,8,1480131607);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (76,'SUCCESS','user_sector','INSERTING NEW DATA WITH ID #13',8,1480131607,8,1480131607);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (77,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #Administrator-profil-pengguna',8,1480132915,8,1480132915);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (78,'SUCCESS','employee','UPDATING DATA ID #1',8,1480133279,8,1480133279);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (79,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #5',8,1480133279,8,1480133279);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (80,'SUCCESS','{{%user}}','UPDATING DATA ID #8',8,1480133279,8,1480133279);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (81,'SUCCESS','employee','UPDATING DATA ID #1',8,1480133297,8,1480133297);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (82,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #6',8,1480133297,8,1480133297);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (83,'SUCCESS','{{%user}}','UPDATING DATA ID #8',8,1480133297,8,1480133297);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (84,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #Operator-profil-pengguna',8,1480133395,8,1480133395);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (85,'SUCCESS','auth_item_child','DELETING DATA ID #Operator-profil-perusahaan',8,1480133404,8,1480133404);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (86,'SUCCESS','employee','UPDATING DATA ID #6',12,1480133428,12,1480133428);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (87,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #7',12,1480133428,12,1480133428);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (88,'SUCCESS','{{%user}}','UPDATING DATA ID #12',12,1480133428,12,1480133428);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (89,'SUCCESS','employee','UPDATING DATA ID #6',12,1480133435,12,1480133435);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (90,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #8',12,1480133435,12,1480133435);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (91,'SUCCESS','{{%user}}','UPDATING DATA ID #12',12,1480133435,12,1480133435);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (92,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #4',8,1482483701,8,1482483701);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (93,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #5',8,1482483722,8,1482483722);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (94,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #1',8,1482559889,8,1482559889);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (95,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #2',8,1482559935,8,1482559935);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (96,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #3',8,1482560032,8,1482560032);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (97,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #4',8,1482560070,8,1482560070);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (98,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #5',8,1482560152,8,1482560152);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (99,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #6',8,1482560797,8,1482560797);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (100,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #7',8,1482560814,8,1482560814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (101,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #8',8,1482560865,8,1482560865);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (102,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #9',8,1482566240,8,1482566240);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (103,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #10',8,1482566255,8,1482566255);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (104,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #11',8,1482566327,8,1482566327);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (105,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #12',8,1482566341,8,1482566341);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (106,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #13',8,1482566403,8,1482566403);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (107,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #14',8,1482566416,8,1482566416);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (108,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #15',8,1482566480,8,1482566480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (109,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #16',8,1482566549,8,1482566549);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (110,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #1',8,1482728633,8,1482728633);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (111,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #2',8,1482728652,8,1482728652);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (112,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #6',8,1482729769,8,1482729769);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (113,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #7',8,1482729801,8,1482729801);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (114,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #8',8,1482729814,8,1482729814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (115,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #9',8,1482729825,8,1482729825);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (116,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #3',8,1482815485,8,1482815485);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (117,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #4',8,1482822142,8,1482822142);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (118,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #5',8,1482822205,8,1482822205);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (119,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #6',8,1482824515,8,1482824515);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (120,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #7',8,1482824872,8,1482824872);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (121,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #8',8,1482824888,8,1482824888);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (122,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #9',8,1482825046,8,1482825046);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (123,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #10',8,1482826730,8,1482826730);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (124,'SUCCESS','roadmap_k3l_attribute','INSERTING NEW DATA WITH ID #11',8,1482909553,8,1482909553);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (125,'SUCCESS','auth_item_child','DELETING DATA ID #Administrator-sektor',8,1482914856,8,1482914856);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (126,'SUCCESS','auth_item_child','INSERTING NEW DATA WITH ID #Administrator-sektor',8,1482915155,8,1482915155);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (127,'SUCCESS','roadmap_k3l','INSERTING NEW DATA WITH ID #1',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (128,'SUCCESS','roadmap_k3l_item','INSERTING NEW DATA WITH ID #1',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (129,'SUCCESS','roadmap_k3l_item','INSERTING NEW DATA WITH ID #2',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (130,'SUCCESS','roadmap_k3l_item','INSERTING NEW DATA WITH ID #3',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (131,'SUCCESS','roadmap_k3l_item','INSERTING NEW DATA WITH ID #4',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (132,'SUCCESS','roadmap_k3l_target','INSERTING NEW DATA WITH ID #1',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (133,'SUCCESS','roadmap_k3l_target','INSERTING NEW DATA WITH ID #2',8,1483431973,8,1483431973);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (134,'SUCCESS','roadmap_k3l','UPDATING DATA ID #1',8,1483676974,8,1483676974);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (135,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #9',8,1483676974,8,1483676974);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (139,'SUCCESS','roadmap_k3l','UPDATING DATA ID #1',8,1483694441,8,1483694441);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (140,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #11',8,1483694441,8,1483694441);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (143,'SUCCESS','roadmap_k3l','UPDATING DATA ID #1',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (144,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #1',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (145,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #2',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (146,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #3',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (147,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #4',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (148,'SUCCESS','roadmap_k3l_target','UPDATING DATA ID #1',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (149,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #12',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (150,'SUCCESS','roadmap_k3l_target','UPDATING DATA ID #2',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (151,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #13',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (152,'SUCCESS','roadmap_k3l_target','INSERTING NEW DATA WITH ID #3',8,1483694734,8,1483694734);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (153,'SUCCESS','roadmap_k3l_target','DELETING DATA ID #3',8,1483694753,8,1483694753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (154,'SUCCESS','roadmap_k3l_item','DELETING DATA ID #3',8,1483694849,8,1483694849);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (155,'SUCCESS','roadmap_k3l','UPDATING DATA ID #1',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (156,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #14',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (157,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #1',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (158,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #2',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (159,'SUCCESS','roadmap_k3l_item','UPDATING DATA ID #4',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (160,'SUCCESS','roadmap_k3l_item','INSERTING NEW DATA WITH ID #5',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (161,'SUCCESS','roadmap_k3l_target','UPDATING DATA ID #1',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (162,'SUCCESS','roadmap_k3l_target','UPDATING DATA ID #2',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (163,'SUCCESS','roadmap_k3l_target','INSERTING NEW DATA WITH ID #4',8,1483694887,8,1483694887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (164,'SUCCESS','roadmap_k3l','DELETING DATA ID #1',8,1483695755,8,1483695755);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (165,'SUCCESS','roadmap_k3l','INSERTING NEW DATA WITH ID #2',8,1483699622,8,1483699622);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (166,'SUCCESS','roadmap_k3l_item','INSERTING NEW DATA WITH ID #6',8,1483699622,8,1483699622);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (167,'SUCCESS','roadmap_k3l_target','INSERTING NEW DATA WITH ID #5',8,1483699622,8,1483699622);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (168,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #1',8,1484374821,8,1484374821);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (169,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #2',8,1484375233,8,1484375233);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (170,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #3',8,1484375363,8,1484375363);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (171,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #1',8,1484375544,8,1484375544);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (172,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #2',8,1484375573,8,1484375573);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (173,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #3',8,1484375971,8,1484375971);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (174,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #4',8,1484543457,8,1484543457);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (175,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #10',8,1484796129,8,1484796129);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (176,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #11',8,1484796147,8,1484796147);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (177,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #12',8,1484796162,8,1484796162);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (178,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #13',8,1484796174,8,1484796174);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (179,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #14',8,1484796190,8,1484796190);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (180,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #5',8,1484797156,8,1484797156);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (181,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #6',8,1484797207,8,1484797207);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (182,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #7',8,1484797246,8,1484797246);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (183,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #8',8,1484797269,8,1484797269);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (184,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #9',8,1484797288,8,1484797288);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (185,'SUCCESS','working_plan','INSERTING NEW DATA WITH ID #1',8,1484804918,8,1484804918);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (186,'SUCCESS','working_plan','INSERTING NEW DATA WITH ID #1',8,1484893091,8,1484893091);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (187,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #1',8,1484893092,8,1484893092);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (188,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #2',8,1484893092,8,1484893092);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (283,'SUCCESS','working_plan','INSERTING NEW DATA WITH ID #31',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (284,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #44',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (285,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #17',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (286,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #18',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (287,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #19',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (288,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #20',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (289,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #45',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (290,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #21',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (291,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #22',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (292,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #23',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (293,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #24',8,1484968988,8,1484968988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (294,'SUCCESS','working_plan','INSERTING NEW DATA WITH ID #1',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (295,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #1',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (296,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #5',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (297,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #5',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (298,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #1',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (299,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #2',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (300,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #2',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (301,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #6',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (302,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #6',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (303,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #3',8,1484970609,8,1484970609);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (304,'SUCCESS','working_plan_attribute','INSERTING NEW DATA WITH ID #10',8,1485313423,8,1485313423);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (329,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (330,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (331,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #18',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (332,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #13',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (333,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #14',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (334,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (335,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #15',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (336,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #6',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (337,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #16',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (338,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #17',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (339,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #18',8,1485315493,8,1485315493);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (340,'SUCCESS','attachment','DELETING DATA ID #5',8,1485318070,8,1485318070);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (341,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (342,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (343,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #1',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (344,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #7',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (345,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #19',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (346,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #20',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (347,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (348,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #2',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (349,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #8',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (350,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #21',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (351,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (352,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #3',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (353,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #9',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (354,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #22',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (355,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #23',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (356,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #24',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (357,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #25',8,1485318881,8,1485318881);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (358,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485318918,8,1485318918);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (359,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (360,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #26',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (361,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #27',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (362,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (363,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #28',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (364,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (365,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #29',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (366,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #30',8,1485318919,8,1485318919);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (367,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (368,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (369,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #31',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (370,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #32',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (371,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (372,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #33',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (373,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (374,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #34',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (375,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #35',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (376,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #36',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (377,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #37',8,1485319006,8,1485319006);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (378,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (379,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (380,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #38',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (381,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #39',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (382,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (383,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #40',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (384,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (385,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #41',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (386,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #42',8,1485320169,8,1485320169);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (387,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (388,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (389,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #43',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (390,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #44',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (391,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (392,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #45',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (393,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (394,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #46',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (395,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #47',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (396,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #48',8,1485320261,8,1485320261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (417,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (418,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (419,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #61',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (420,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #62',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (421,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (422,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #63',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (423,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (424,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #64',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (425,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #65',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (426,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #66',8,1485320480,8,1485320480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (437,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (438,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (439,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #73',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (440,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #74',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (441,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (442,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #75',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (443,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (444,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #76',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (445,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #77',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (446,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #78',8,1485320692,8,1485320692);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (447,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (448,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (449,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #79',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (450,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (451,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #80',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (452,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (453,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #81',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (454,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #82',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (455,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #83',8,1485320785,8,1485320785);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (456,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1485323406,8,1485323406);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (457,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1485323406,8,1485323406);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (458,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #84',8,1485323406,8,1485323406);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (459,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #85',8,1485323406,8,1485323406);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (460,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1485323406,8,1485323406);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (461,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #86',8,1485323406,8,1485323406);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (462,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (463,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #87',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (464,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #88',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (465,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #89',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (466,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #90',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (467,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #91',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (468,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #92',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (469,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #93',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (470,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #94',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (471,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #95',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (472,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #96',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (473,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #97',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (474,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #98',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (475,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #99',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (476,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #100',8,1485323407,8,1485323407);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (477,'SUCCESS','budget_monitoring','UPDATING DATA ID #35',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (478,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #83',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (479,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1166',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (480,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1167',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (481,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1168',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (482,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1169',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (483,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1170',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (484,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1171',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (485,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1172',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (486,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1173',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (487,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1174',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (488,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1175',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (489,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1176',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (490,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1177',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (491,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #84',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (492,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1178',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (493,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1179',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (494,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1180',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (495,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1181',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (496,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1182',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (497,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1183',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (498,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1184',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (499,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1185',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (500,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1186',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (501,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1187',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (502,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1188',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (503,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1189',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (504,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #85',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (505,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1190',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (506,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1191',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (507,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1192',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (508,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1193',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (509,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1194',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (510,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1195',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (511,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1196',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (512,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1197',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (513,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1198',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (514,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1199',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (515,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1200',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (516,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1201',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (517,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #86',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (518,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1202',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (519,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1203',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (520,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1204',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (521,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1205',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (522,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1206',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (523,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1207',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (524,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1208',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (525,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1209',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (526,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1210',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (527,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1211',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (528,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1212',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (529,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1213',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (530,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #93',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (531,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1250',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (532,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1251',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (533,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1252',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (534,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1253',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (535,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1254',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (536,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1255',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (537,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1256',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (538,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1257',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (539,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1258',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (540,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1259',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (541,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1260',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (542,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1261',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (543,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #95',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (544,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1274',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (545,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1275',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (546,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1276',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (547,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1277',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (548,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1278',8,1486034835,8,1486034835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (549,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1279',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (550,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1280',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (551,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1281',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (552,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1282',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (553,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1283',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (554,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1284',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (555,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1285',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (556,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #96',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (557,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1286',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (558,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1287',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (559,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1288',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (560,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1289',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (561,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1290',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (562,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1291',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (563,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1292',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (564,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1293',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (565,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1294',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (566,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1295',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (567,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1296',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (568,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1297',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (569,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #97',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (570,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1298',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (571,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1299',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (572,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1300',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (573,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1301',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (574,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1302',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (575,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1303',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (576,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1304',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (577,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1305',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (578,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1306',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (579,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1307',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (580,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1308',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (581,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1309',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (582,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #98',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (583,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1310',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (584,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1311',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (585,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1312',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (586,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1313',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (587,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1314',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (588,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1315',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (589,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1316',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (590,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1317',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (591,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1318',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (592,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1319',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (593,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1320',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (594,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #1321',8,1486034836,8,1486034836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (609,'SUCCESS','budget_monitoring','INSERTING NEW DATA WITH ID #1',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (610,'SUCCESS','budget_monitoring_detail','INSERTING NEW DATA WITH ID #1',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (611,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #1',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (612,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #2',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (613,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #3',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (614,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #4',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (615,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #5',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (616,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #6',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (617,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #7',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (618,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #8',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (619,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #9',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (620,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #10',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (621,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #11',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (622,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #12',8,1486035644,8,1486035644);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (623,'SUCCESS','budget_monitoring','INSERTING NEW DATA WITH ID #2',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (624,'SUCCESS','budget_monitoring_detail','INSERTING NEW DATA WITH ID #2',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (625,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #13',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (626,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #14',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (627,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #15',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (628,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #16',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (629,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #17',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (630,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #18',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (631,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #19',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (632,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #20',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (633,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #21',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (634,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #22',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (635,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #23',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (636,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #24',8,1486035724,8,1486035724);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (651,'SUCCESS','budget_monitoring','INSERTING NEW DATA WITH ID #4',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (652,'SUCCESS','budget_monitoring_detail','INSERTING NEW DATA WITH ID #4',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (653,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #37',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (654,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #38',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (655,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #39',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (656,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #40',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (657,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #41',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (658,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #42',8,1486036303,8,1486036303);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (659,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #43',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (660,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #44',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (661,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #45',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (662,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #46',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (663,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #47',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (664,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #48',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (665,'SUCCESS','budget_monitoring_detail','INSERTING NEW DATA WITH ID #5',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (666,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #49',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (667,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #50',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (668,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #51',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (669,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #52',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (670,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #53',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (671,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #54',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (672,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #55',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (673,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #56',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (674,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #57',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (675,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #58',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (676,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #59',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (677,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #60',8,1486036304,8,1486036304);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (681,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #4',8,1486307185,8,1486307185);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (682,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #1',8,1486307185,8,1486307185);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (683,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #1',8,1486307185,8,1486307185);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (684,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #2',8,1486307185,8,1486307185);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (685,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #2',8,1486307185,8,1486307185);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (686,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #3',8,1486307185,8,1486307185);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (687,'SUCCESS','smk3_title','UPDATING DATA ID #4',8,1486320971,8,1486320971);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (688,'SUCCESS','smk3_title','UPDATING DATA ID #4',8,1486321015,8,1486321015);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (689,'SUCCESS','smk3_subtitle','UPDATING DATA ID #1',8,1486321015,8,1486321015);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (690,'SUCCESS','smk3_criteria','UPDATING DATA ID #2',8,1486321015,8,1486321015);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (691,'SUCCESS','smk3_subtitle','UPDATING DATA ID #2',8,1486321015,8,1486321015);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (692,'SUCCESS','smk3_title','UPDATING DATA ID #4',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (693,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #19',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (694,'SUCCESS','smk3_subtitle','UPDATING DATA ID #1',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (695,'SUCCESS','smk3_criteria','UPDATING DATA ID #1',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (696,'SUCCESS','smk3_criteria','UPDATING DATA ID #2',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (697,'SUCCESS','smk3_subtitle','UPDATING DATA ID #2',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (698,'SUCCESS','smk3_criteria','UPDATING DATA ID #3',8,1486400612,8,1486400612);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (699,'SUCCESS','smk3_title','DELETING DATA ID #4',8,1486400936,8,1486400936);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (700,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #5',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (701,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #3',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (702,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #4',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (703,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #5',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (704,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #6',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (705,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #4',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (706,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #7',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (707,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #8',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (708,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #5',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (709,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #9',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (710,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #10',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (711,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #11',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (712,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #12',8,1486401063,8,1486401063);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (713,'SUCCESS','smk3_title','UPDATING DATA ID #5',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (714,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #20',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (715,'SUCCESS','smk3_subtitle','UPDATING DATA ID #3',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (716,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #21',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (717,'SUCCESS','smk3_criteria','UPDATING DATA ID #4',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (718,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #22',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (719,'SUCCESS','smk3_criteria','UPDATING DATA ID #5',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (720,'SUCCESS','smk3_criteria','UPDATING DATA ID #6',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (721,'SUCCESS','smk3_subtitle','UPDATING DATA ID #4',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (722,'SUCCESS','smk3_criteria','UPDATING DATA ID #7',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (723,'SUCCESS','smk3_criteria','UPDATING DATA ID #8',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (724,'SUCCESS','smk3_subtitle','UPDATING DATA ID #5',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (725,'SUCCESS','smk3_criteria','UPDATING DATA ID #9',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (726,'SUCCESS','smk3_criteria','UPDATING DATA ID #10',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (727,'SUCCESS','smk3_criteria','UPDATING DATA ID #11',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (728,'SUCCESS','smk3_criteria','UPDATING DATA ID #12',8,1486401422,8,1486401422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (729,'SUCCESS','smk3_title','UPDATING DATA ID #5',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (730,'SUCCESS','smk3_subtitle','UPDATING DATA ID #3',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (731,'SUCCESS','smk3_criteria','UPDATING DATA ID #4',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (732,'SUCCESS','smk3_criteria','UPDATING DATA ID #5',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (733,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #23',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (734,'SUCCESS','smk3_criteria','UPDATING DATA ID #6',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (735,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #24',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (736,'SUCCESS','smk3_subtitle','UPDATING DATA ID #4',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (737,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #25',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (738,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #13',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (739,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #14',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (740,'SUCCESS','smk3_criteria','UPDATING DATA ID #7',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (741,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #26',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (742,'SUCCESS','smk3_criteria','UPDATING DATA ID #8',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (743,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #27',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (744,'SUCCESS','smk3_subtitle','UPDATING DATA ID #5',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (745,'SUCCESS','smk3_criteria','UPDATING DATA ID #9',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (746,'SUCCESS','smk3_criteria','UPDATING DATA ID #10',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (747,'SUCCESS','smk3_criteria','UPDATING DATA ID #11',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (748,'SUCCESS','smk3_criteria','UPDATING DATA ID #12',8,1486402988,8,1486402988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (749,'SUCCESS','smk3_title','UPDATING DATA ID #5',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (750,'SUCCESS','smk3_subtitle','UPDATING DATA ID #3',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (751,'SUCCESS','smk3_criteria','UPDATING DATA ID #4',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (752,'SUCCESS','smk3_criteria','UPDATING DATA ID #5',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (753,'SUCCESS','smk3_criteria','UPDATING DATA ID #6',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (754,'SUCCESS','smk3_subtitle','UPDATING DATA ID #4',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (755,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #15',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (756,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #16',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (757,'SUCCESS','smk3_criteria','UPDATING DATA ID #7',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (758,'SUCCESS','smk3_criteria','UPDATING DATA ID #8',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (759,'SUCCESS','smk3_criteria','UPDATING DATA ID #13',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (760,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #28',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (761,'SUCCESS','smk3_criteria','UPDATING DATA ID #14',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (762,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #29',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (763,'SUCCESS','smk3_subtitle','UPDATING DATA ID #5',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (764,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #30',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (765,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #17',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (766,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #18',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (767,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #19',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (768,'SUCCESS','smk3_criteria','UPDATING DATA ID #9',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (769,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #31',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (770,'SUCCESS','smk3_criteria','UPDATING DATA ID #10',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (771,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #32',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (772,'SUCCESS','smk3_criteria','UPDATING DATA ID #11',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (773,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #33',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (774,'SUCCESS','smk3_criteria','UPDATING DATA ID #12',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (775,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #34',8,1486409906,8,1486409906);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (776,'SUCCESS','smk3_title','UPDATING DATA ID #5',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (777,'SUCCESS','smk3_subtitle','UPDATING DATA ID #3',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (778,'SUCCESS','smk3_criteria','UPDATING DATA ID #4',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (779,'SUCCESS','smk3_criteria','UPDATING DATA ID #5',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (780,'SUCCESS','smk3_criteria','UPDATING DATA ID #6',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (781,'SUCCESS','smk3_subtitle','UPDATING DATA ID #4',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (782,'SUCCESS','smk3_criteria','UPDATING DATA ID #15',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (783,'SUCCESS','smk3_criteria','UPDATING DATA ID #7',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (784,'SUCCESS','smk3_criteria','UPDATING DATA ID #8',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (785,'SUCCESS','smk3_criteria','UPDATING DATA ID #13',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (786,'SUCCESS','smk3_criteria','UPDATING DATA ID #14',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (787,'SUCCESS','smk3_criteria','UPDATING DATA ID #16',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (788,'SUCCESS','smk3_subtitle','UPDATING DATA ID #5',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (789,'SUCCESS','smk3_criteria','UPDATING DATA ID #9',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (790,'SUCCESS','smk3_criteria','UPDATING DATA ID #10',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (791,'SUCCESS','smk3_criteria','UPDATING DATA ID #11',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (792,'SUCCESS','smk3_criteria','UPDATING DATA ID #12',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (793,'SUCCESS','smk3_criteria','UPDATING DATA ID #17',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (794,'SUCCESS','smk3_criteria','UPDATING DATA ID #18',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (795,'SUCCESS','smk3_criteria','UPDATING DATA ID #19',8,1486410025,8,1486410025);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (796,'SUCCESS','smk3_title','UPDATING DATA ID #5',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (797,'SUCCESS','smk3_subtitle','UPDATING DATA ID #3',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (798,'SUCCESS','smk3_criteria','UPDATING DATA ID #4',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (799,'SUCCESS','smk3_criteria','UPDATING DATA ID #5',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (800,'SUCCESS','smk3_criteria','UPDATING DATA ID #6',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (801,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #20',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (802,'SUCCESS','smk3_subtitle','UPDATING DATA ID #4',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (803,'SUCCESS','smk3_criteria','UPDATING DATA ID #7',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (804,'SUCCESS','smk3_criteria','UPDATING DATA ID #8',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (805,'SUCCESS','smk3_criteria','UPDATING DATA ID #13',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (806,'SUCCESS','smk3_criteria','UPDATING DATA ID #14',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (807,'SUCCESS','smk3_criteria','UPDATING DATA ID #15',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (808,'SUCCESS','smk3_criteria','UPDATING DATA ID #16',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (809,'SUCCESS','smk3_subtitle','UPDATING DATA ID #5',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (810,'SUCCESS','smk3_criteria','UPDATING DATA ID #9',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (811,'SUCCESS','smk3_criteria','UPDATING DATA ID #10',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (812,'SUCCESS','smk3_criteria','UPDATING DATA ID #11',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (813,'SUCCESS','smk3_criteria','UPDATING DATA ID #12',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (814,'SUCCESS','smk3_criteria','UPDATING DATA ID #17',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (815,'SUCCESS','smk3_criteria','UPDATING DATA ID #18',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (816,'SUCCESS','smk3_criteria','UPDATING DATA ID #19',8,1486410590,8,1486410590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (817,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #6',8,1486470322,8,1486470322);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (818,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #6',8,1486470322,8,1486470322);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (819,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #21',8,1486470322,8,1486470322);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (820,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #7',8,1486470338,8,1486470338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (821,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #7',8,1486470338,8,1486470338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (822,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #22',8,1486470338,8,1486470338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (823,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #23',8,1486470338,8,1486470338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (824,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #8',8,1486470338,8,1486470338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (825,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #24',8,1486470338,8,1486470338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (827,'SUCCESS','smk3','INSERTING NEW DATA WITH ID #2',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (828,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #1',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (829,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #2',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (830,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #3',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (831,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #4',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (832,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #5',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (833,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #6',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (834,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #7',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (835,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #8',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (836,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #9',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (837,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #10',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (838,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #11',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (839,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #12',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (840,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #13',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (841,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #14',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (842,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #15',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (843,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #16',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (844,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #17',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (845,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #18',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (846,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #19',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (847,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #20',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (848,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #21',8,1486496275,8,1486496275);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (849,'SUCCESS','smk3','UPDATING DATA ID #2',8,1486535874,8,1486535874);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (850,'SUCCESS','smk3','UPDATING DATA ID #2',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (851,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #22',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (852,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #23',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (853,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #24',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (854,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #25',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (855,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #26',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (856,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #27',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (857,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #28',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (858,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #29',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (859,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #30',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (860,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #31',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (861,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #32',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (862,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #33',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (863,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #34',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (864,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #35',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (865,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #36',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (866,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #37',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (867,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #38',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (868,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #39',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (869,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #40',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (870,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #41',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (871,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #42',8,1486535897,8,1486535897);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (872,'SUCCESS','smk3','UPDATING DATA ID #2',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (873,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #43',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (874,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #44',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (875,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #45',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (876,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #46',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (877,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #47',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (878,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #48',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (879,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #49',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (880,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #50',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (881,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #51',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (882,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #52',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (883,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #53',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (884,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #54',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (885,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #55',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (886,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #56',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (887,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #57',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (888,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #58',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (889,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #59',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (890,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #60',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (891,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #61',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (892,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #62',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (893,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #63',8,1486535904,8,1486535904);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (894,'SUCCESS','smk3','UPDATING DATA ID #2',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (895,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #64',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (896,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #65',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (897,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #66',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (898,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #67',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (899,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #68',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (900,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #69',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (901,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #70',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (902,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #71',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (903,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #72',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (904,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #73',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (905,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #74',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (906,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #75',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (907,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #76',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (908,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #77',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (909,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #78',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (910,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #79',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (911,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #80',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (912,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #81',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (913,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #82',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (914,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #83',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (915,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #84',8,1486535952,8,1486535952);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (916,'SUCCESS','smk3','UPDATING DATA ID #2',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (917,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #85',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (918,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #86',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (919,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #87',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (920,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #88',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (921,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #89',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (922,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #90',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (923,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #91',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (924,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #92',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (925,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #93',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (926,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #94',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (927,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #95',8,1486535977,8,1486535977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (928,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #96',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (929,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #97',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (930,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #98',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (931,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #99',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (932,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #100',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (933,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #101',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (934,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #102',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (935,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #103',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (936,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #104',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (937,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #105',8,1486535978,8,1486535978);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (938,'SUCCESS','smk3','DELETING DATA ID #2',8,1486538364,8,1486538364);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (939,'SUCCESS','smk3','INSERTING NEW DATA WITH ID #3',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (940,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #106',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (941,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #107',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (942,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #108',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (943,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #109',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (944,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #110',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (945,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #111',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (946,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #112',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (947,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #113',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (948,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #114',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (949,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #115',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (950,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #116',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (951,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #117',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (952,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #118',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (953,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #119',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (954,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #120',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (955,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #121',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (956,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #122',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (957,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #123',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (958,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #124',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (959,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #125',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (960,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #126',8,1486538380,8,1486538380);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (961,'SUCCESS','smk3','INSERTING NEW DATA WITH ID #4',8,1486538835,8,1486538835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (962,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #127',8,1486538835,8,1486538835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (963,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #128',8,1486538835,8,1486538835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (964,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #129',8,1486538835,8,1486538835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (965,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #130',8,1486538835,8,1486538835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (966,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #131',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (967,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #132',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (968,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #133',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (969,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #134',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (970,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #135',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (971,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #136',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (972,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #137',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (973,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #138',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (974,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #139',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (975,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #140',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (976,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #141',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (977,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #142',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (978,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #143',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (979,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #144',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (980,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #145',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (981,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #146',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (982,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #147',8,1486538836,8,1486538836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (992,'SUCCESS','smk3','UPDATING DATA ID #4',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (993,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #148',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (994,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #149',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (995,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #150',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (996,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #151',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (997,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #152',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (998,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #153',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (999,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #154',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1000,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #155',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1001,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #156',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1002,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #157',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1003,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #158',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1004,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #159',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1005,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #160',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1006,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #161',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1007,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #162',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1008,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #163',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1009,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #164',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1010,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #165',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1011,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #166',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1012,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #167',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1013,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #168',8,1486545030,8,1486545030);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1014,'SUCCESS','smk3','DELETING DATA ID #4',8,1486545176,8,1486545176);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1015,'SUCCESS','smk3','DELETING DATA ID #3',8,1486545181,8,1486545181);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1016,'SUCCESS','smk3','INSERTING NEW DATA WITH ID #5',8,1486545260,8,1486545260);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1017,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #169',8,1486545260,8,1486545260);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1018,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #170',8,1486545260,8,1486545260);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1019,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #171',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1020,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #172',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1021,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #173',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1022,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #174',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1023,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #175',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1024,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #176',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1025,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #177',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1026,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #178',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1027,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #179',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1028,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #180',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1029,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #181',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1030,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #182',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1031,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #183',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1032,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #184',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1033,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #185',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1034,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #186',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1035,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #187',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1036,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #188',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1037,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #189',8,1486545261,8,1486545261);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1038,'SUCCESS','smk3','UPDATING DATA ID #5',8,1486545272,8,1486545272);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1039,'SUCCESS','smk3_detail','UPDATING DATA ID #169',8,1486545272,8,1486545272);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1040,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #35',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1041,'SUCCESS','smk3_detail','UPDATING DATA ID #170',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1042,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #36',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1043,'SUCCESS','smk3_detail','UPDATING DATA ID #171',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1044,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #37',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1045,'SUCCESS','smk3_detail','UPDATING DATA ID #172',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1046,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #38',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1047,'SUCCESS','smk3_detail','UPDATING DATA ID #173',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1048,'SUCCESS','smk3_detail','UPDATING DATA ID #174',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1049,'SUCCESS','smk3_detail','UPDATING DATA ID #175',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1050,'SUCCESS','smk3_detail','UPDATING DATA ID #176',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1051,'SUCCESS','smk3_detail','UPDATING DATA ID #177',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1052,'SUCCESS','smk3_detail','UPDATING DATA ID #178',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1053,'SUCCESS','smk3_detail','UPDATING DATA ID #179',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1054,'SUCCESS','smk3_detail','UPDATING DATA ID #180',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1055,'SUCCESS','smk3_detail','UPDATING DATA ID #181',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1056,'SUCCESS','smk3_detail','UPDATING DATA ID #182',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1057,'SUCCESS','smk3_detail','UPDATING DATA ID #183',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1058,'SUCCESS','smk3_detail','UPDATING DATA ID #184',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1059,'SUCCESS','smk3_detail','UPDATING DATA ID #185',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1060,'SUCCESS','smk3_detail','UPDATING DATA ID #186',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1061,'SUCCESS','smk3_detail','UPDATING DATA ID #187',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1062,'SUCCESS','smk3_detail','UPDATING DATA ID #188',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1063,'SUCCESS','smk3_detail','UPDATING DATA ID #189',8,1486545273,8,1486545273);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1064,'SUCCESS','smk3','UPDATING DATA ID #5',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1065,'SUCCESS','smk3_detail','UPDATING DATA ID #169',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1066,'SUCCESS','smk3_detail','UPDATING DATA ID #170',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1067,'SUCCESS','smk3_detail','UPDATING DATA ID #171',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1068,'SUCCESS','smk3_detail','UPDATING DATA ID #172',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1069,'SUCCESS','smk3_detail','UPDATING DATA ID #173',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1070,'SUCCESS','smk3_detail','UPDATING DATA ID #174',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1071,'SUCCESS','smk3_detail','UPDATING DATA ID #175',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1072,'SUCCESS','smk3_detail','UPDATING DATA ID #176',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1073,'SUCCESS','smk3_detail','UPDATING DATA ID #177',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1074,'SUCCESS','smk3_detail','UPDATING DATA ID #178',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1075,'SUCCESS','smk3_detail','UPDATING DATA ID #179',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1076,'SUCCESS','smk3_detail','UPDATING DATA ID #180',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1077,'SUCCESS','smk3_detail','UPDATING DATA ID #181',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1078,'SUCCESS','smk3_detail','UPDATING DATA ID #182',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1079,'SUCCESS','smk3_detail','UPDATING DATA ID #183',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1080,'SUCCESS','smk3_detail','UPDATING DATA ID #184',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1081,'SUCCESS','smk3_detail','UPDATING DATA ID #185',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1082,'SUCCESS','smk3_detail','UPDATING DATA ID #186',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1083,'SUCCESS','smk3_detail','UPDATING DATA ID #187',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1084,'SUCCESS','smk3_detail','UPDATING DATA ID #188',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1085,'SUCCESS','smk3_detail','UPDATING DATA ID #189',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1086,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #39',8,1486545296,8,1486545296);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1087,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #8',8,1486545317,8,1486545317);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1088,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #9',8,1486545317,8,1486545317);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1089,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #25',8,1486545317,8,1486545317);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1093,'SUCCESS','smk3_title','DELETING DATA ID #8',8,1486551480,8,1486551480);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1097,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #11',8,1486551509,8,1486551509);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1098,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #12',8,1486551509,8,1486551509);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1099,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #28',8,1486551509,8,1486551509);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1100,'SUCCESS','smk3_title','DELETING DATA ID #11',8,1486551658,8,1486551658);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1107,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #14',8,1486551819,8,1486551819);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1108,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #15',8,1486551819,8,1486551819);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1109,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #31',8,1486551819,8,1486551819);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1110,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #190',8,1486551819,8,1486551819);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1111,'SUCCESS','smk3','UPDATING DATA ID #5',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1112,'SUCCESS','smk3_detail','UPDATING DATA ID #169',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1113,'SUCCESS','smk3_detail','UPDATING DATA ID #170',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1114,'SUCCESS','smk3_detail','UPDATING DATA ID #171',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1115,'SUCCESS','smk3_detail','UPDATING DATA ID #172',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1116,'SUCCESS','smk3_detail','UPDATING DATA ID #173',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1117,'SUCCESS','smk3_detail','UPDATING DATA ID #174',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1118,'SUCCESS','smk3_detail','UPDATING DATA ID #175',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1119,'SUCCESS','smk3_detail','UPDATING DATA ID #176',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1120,'SUCCESS','smk3_detail','UPDATING DATA ID #177',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1121,'SUCCESS','smk3_detail','UPDATING DATA ID #178',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1122,'SUCCESS','smk3_detail','UPDATING DATA ID #179',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1123,'SUCCESS','smk3_detail','UPDATING DATA ID #180',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1124,'SUCCESS','smk3_detail','UPDATING DATA ID #181',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1125,'SUCCESS','smk3_detail','UPDATING DATA ID #182',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1126,'SUCCESS','smk3_detail','UPDATING DATA ID #183',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1127,'SUCCESS','smk3_detail','UPDATING DATA ID #184',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1128,'SUCCESS','smk3_detail','UPDATING DATA ID #185',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1129,'SUCCESS','smk3_detail','UPDATING DATA ID #186',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1130,'SUCCESS','smk3_detail','UPDATING DATA ID #187',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1131,'SUCCESS','smk3_detail','UPDATING DATA ID #188',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1132,'SUCCESS','smk3_detail','UPDATING DATA ID #189',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1133,'SUCCESS','smk3_detail','UPDATING DATA ID #190',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1134,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #40',8,1486551854,8,1486551854);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1135,'SUCCESS','smk3','INSERTING NEW DATA WITH ID #6',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1136,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #191',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1137,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #192',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1138,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #193',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1139,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #194',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1140,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #195',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1141,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #196',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1142,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #197',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1143,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #198',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1144,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #199',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1145,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #200',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1146,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #201',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1147,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #202',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1148,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #203',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1149,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #204',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1150,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #205',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1151,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #206',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1152,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #207',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1153,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #208',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1154,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #209',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1155,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #210',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1156,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #211',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1157,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #212',8,1486551887,8,1486551887);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1158,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #15',8,1486551915,8,1486551915);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1159,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #16',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1160,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #32',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1161,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #213',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1162,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #214',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1163,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #33',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1164,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #215',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1165,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #216',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1166,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #34',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1167,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #217',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1168,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #218',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1169,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #17',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1170,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #35',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1171,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #219',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1172,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #220',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1173,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #36',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1174,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #221',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1175,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #222',8,1486551916,8,1486551916);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1176,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #16',8,1486552144,8,1486552144);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1177,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #18',8,1486552144,8,1486552144);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1178,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #37',8,1486552144,8,1486552144);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1179,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #223',8,1486552144,8,1486552144);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1180,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #224',8,1486552144,8,1486552144);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1181,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #38',8,1486552144,8,1486552144);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1182,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #225',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1183,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #226',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1184,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #39',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1185,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #227',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1186,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #228',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1187,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #40',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1188,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #229',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1189,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #230',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1190,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #19',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1191,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #41',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1192,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #231',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1193,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #232',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1194,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #20',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1195,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #42',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1196,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #233',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1197,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #234',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1198,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #21',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1199,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #43',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1200,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #235',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1201,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #236',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1202,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #44',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1203,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #237',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1204,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #238',8,1486552145,8,1486552145);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1205,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #17',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1206,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #22',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1207,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #45',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1208,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #239',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1209,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #240',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1210,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #46',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1211,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #241',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1212,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #242',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1213,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #47',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1214,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #243',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1215,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #244',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1216,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #23',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1217,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #48',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1218,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #245',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1219,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #246',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1220,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #49',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1221,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #247',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1222,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #248',8,1486552301,8,1486552301);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1223,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #18',8,1486552355,8,1486552355);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1224,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #24',8,1486552355,8,1486552355);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1225,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #50',8,1486552355,8,1486552355);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1226,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #249',8,1486552355,8,1486552355);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1227,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #250',8,1486552355,8,1486552355);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1228,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #51',8,1486552355,8,1486552355);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1229,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #251',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1230,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #252',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1231,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #52',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1232,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #253',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1233,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #254',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1234,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #25',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1235,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #53',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1236,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #255',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1237,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #256',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1238,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #54',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1239,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #257',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1240,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #258',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1241,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #26',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1242,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #55',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1243,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #259',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1244,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #260',8,1486552356,8,1486552356);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1245,'SUCCESS','smk3_title','UPDATING DATA ID #5',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1246,'SUCCESS','smk3_subtitle','UPDATING DATA ID #3',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1247,'SUCCESS','smk3_criteria','UPDATING DATA ID #4',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1248,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #41',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1249,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #261',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1250,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #262',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1251,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #263',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1252,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #264',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1253,'SUCCESS','smk3_criteria','UPDATING DATA ID #5',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1254,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #42',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1255,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #265',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1256,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #266',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1257,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #267',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1258,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #268',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1259,'SUCCESS','smk3_criteria','UPDATING DATA ID #6',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1260,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #43',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1261,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #269',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1262,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #270',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1263,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #271',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1264,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #272',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1265,'SUCCESS','smk3_criteria','UPDATING DATA ID #20',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1266,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #44',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1267,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #273',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1268,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #274',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1269,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #275',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1270,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #276',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1271,'SUCCESS','smk3_subtitle','UPDATING DATA ID #4',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1272,'SUCCESS','smk3_criteria','UPDATING DATA ID #7',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1273,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #45',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1274,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #277',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1275,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #278',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1276,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #279',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1277,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #280',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1278,'SUCCESS','smk3_criteria','UPDATING DATA ID #8',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1279,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #46',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1280,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #281',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1281,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #282',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1282,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #283',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1283,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #284',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1284,'SUCCESS','smk3_criteria','UPDATING DATA ID #13',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1285,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #47',8,1486564003,8,1486564003);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1286,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #285',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1287,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #286',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1288,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #287',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1289,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #288',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1290,'SUCCESS','smk3_criteria','UPDATING DATA ID #14',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1291,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #48',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1292,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #289',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1293,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #290',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1294,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #291',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1295,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #292',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1296,'SUCCESS','smk3_criteria','UPDATING DATA ID #15',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1297,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #49',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1298,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #293',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1299,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #294',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1300,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #295',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1301,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #296',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1302,'SUCCESS','smk3_criteria','UPDATING DATA ID #16',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1303,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #50',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1304,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #297',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1305,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #298',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1306,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #299',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1307,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #300',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1308,'SUCCESS','smk3_subtitle','UPDATING DATA ID #5',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1309,'SUCCESS','smk3_criteria','UPDATING DATA ID #9',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1310,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #51',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1311,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #301',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1312,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #302',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1313,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #303',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1314,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #304',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1315,'SUCCESS','smk3_criteria','UPDATING DATA ID #10',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1316,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #52',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1317,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #305',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1318,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #306',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1319,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #307',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1320,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #308',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1321,'SUCCESS','smk3_criteria','UPDATING DATA ID #11',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1322,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #53',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1323,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #309',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1324,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #310',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1325,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #311',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1326,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #312',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1327,'SUCCESS','smk3_criteria','UPDATING DATA ID #12',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1328,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #54',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1329,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #313',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1330,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #314',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1331,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #315',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1332,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #316',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1333,'SUCCESS','smk3_criteria','UPDATING DATA ID #17',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1334,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #55',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1335,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #317',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1336,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #318',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1337,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #319',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1338,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #320',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1339,'SUCCESS','smk3_criteria','UPDATING DATA ID #18',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1340,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #56',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1341,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #321',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1342,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #322',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1343,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #323',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1344,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #324',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1345,'SUCCESS','smk3_criteria','UPDATING DATA ID #19',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1346,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #57',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1347,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #325',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1348,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #326',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1349,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #327',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1350,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #328',8,1486564004,8,1486564004);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1351,'SUCCESS','smk3_title','DELETING DATA ID #5',8,1486564335,8,1486564335);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1352,'SUCCESS','smk3_title','UPDATING DATA ID #6',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1353,'SUCCESS','smk3_subtitle','UPDATING DATA ID #6',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1354,'SUCCESS','smk3_criteria','UPDATING DATA ID #21',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1355,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #58',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1356,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #329',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1357,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #330',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1358,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #331',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1359,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #332',8,1486564491,8,1486564491);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1391,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #24',8,1486565158,8,1486565158);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1392,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #32',8,1486565158,8,1486565158);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1393,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #61',8,1486565158,8,1486565158);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1394,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #333',8,1486565158,8,1486565158);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1395,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #334',8,1486565158,8,1486565158);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1396,'SUCCESS','smk3_title','DELETING DATA ID #6',8,1486565220,8,1486565220);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1397,'SUCCESS','smk3_title','UPDATING DATA ID #7',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1398,'SUCCESS','smk3_subtitle','UPDATING DATA ID #7',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1399,'SUCCESS','smk3_criteria','UPDATING DATA ID #22',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1400,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #63',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1401,'SUCCESS','smk3_criteria','UPDATING DATA ID #23',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1402,'SUCCESS','smk3_subtitle','UPDATING DATA ID #8',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1403,'SUCCESS','smk3_criteria','UPDATING DATA ID #24',8,1486565232,8,1486565232);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1404,'SUCCESS','budget_monitoring_detail','DELETING DATA ID #1',8,1486565699,8,1486565699);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1405,'SUCCESS','budget_monitoring','UPDATING DATA ID #2',8,1486565752,8,1486565752);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1406,'SUCCESS','budget_monitoring_detail','UPDATING DATA ID #2',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1407,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #13',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1408,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #14',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1409,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #15',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1410,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #16',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1411,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #17',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1412,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #18',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1413,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #19',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1414,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #20',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1415,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #21',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1416,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #22',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1417,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #23',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1418,'SUCCESS','budget_monitoring_month','UPDATING DATA ID #24',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1419,'SUCCESS','budget_monitoring_detail','INSERTING NEW DATA WITH ID #6',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1420,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #61',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1421,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #62',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1422,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #63',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1423,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #64',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1424,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #65',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1425,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #66',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1426,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #67',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1427,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #68',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1428,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #69',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1429,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #70',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1430,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #71',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1431,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #72',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1432,'SUCCESS','budget_monitoring_detail','INSERTING NEW DATA WITH ID #7',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1433,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #73',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1434,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #74',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1435,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #75',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1436,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #76',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1437,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #77',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1438,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #78',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1439,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #79',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1440,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #80',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1441,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #81',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1442,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #82',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1443,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #83',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1444,'SUCCESS','budget_monitoring_month','INSERTING NEW DATA WITH ID #84',8,1486565753,8,1486565753);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1445,'SUCCESS','budget_monitoring_detail','DELETING DATA ID #7',8,1486565840,8,1486565840);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1446,'SUCCESS','budget_monitoring_detail','DELETING DATA ID #6',8,1486565871,8,1486565871);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1447,'SUCCESS','smk3_criteria','DELETING DATA ID #23',8,1486567637,8,1486567637);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1448,'SUCCESS','smk3_subtitle','DELETING DATA ID #8',8,1486567658,8,1486567658);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1449,'SUCCESS','smk3_subtitle','DELETING DATA ID #7',8,1486567673,8,1486567673);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1450,'SUCCESS','smk3_title','UPDATING DATA ID #7',8,1486568027,8,1486568027);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1451,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #33',8,1486568027,8,1486568027);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1452,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #62',8,1486568027,8,1486568027);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1453,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #335',8,1486568027,8,1486568027);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1454,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #336',8,1486568027,8,1486568027);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1455,'SUCCESS','smk3_criteria','DELETING DATA ID #62',8,1486568083,8,1486568083);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1456,'SUCCESS','smk3_subtitle','DELETING DATA ID #33',8,1486635547,8,1486635547);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1457,'SUCCESS','smk3_title','UPDATING DATA ID #7',8,1486635551,8,1486635551);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1458,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #25',8,1486635593,8,1486635593);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1459,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #34',8,1486635594,8,1486635594);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1460,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #62',8,1486635594,8,1486635594);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1461,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #335',8,1486635594,8,1486635594);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1462,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #336',8,1486635594,8,1486635594);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1463,'SUCCESS','smk3_subtitle','DELETING DATA ID #34',8,1486635604,8,1486635604);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1464,'SUCCESS','smk3_title','UPDATING DATA ID #25',8,1486635607,8,1486635607);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1465,'SUCCESS','smk3','UPDATING DATA ID #5',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1466,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #64',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1467,'SUCCESS','smk3_detail','UPDATING DATA ID #190',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1468,'SUCCESS','smk3_detail','UPDATING DATA ID #213',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1469,'SUCCESS','smk3_detail','UPDATING DATA ID #215',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1470,'SUCCESS','smk3_detail','UPDATING DATA ID #217',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1471,'SUCCESS','smk3_detail','UPDATING DATA ID #219',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1472,'SUCCESS','smk3_detail','UPDATING DATA ID #221',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1473,'SUCCESS','smk3_detail','UPDATING DATA ID #223',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1474,'SUCCESS','smk3_detail','UPDATING DATA ID #225',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1475,'SUCCESS','smk3_detail','UPDATING DATA ID #227',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1476,'SUCCESS','smk3_detail','UPDATING DATA ID #229',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1477,'SUCCESS','smk3_detail','UPDATING DATA ID #231',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1478,'SUCCESS','smk3_detail','UPDATING DATA ID #233',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1479,'SUCCESS','smk3_detail','UPDATING DATA ID #235',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1480,'SUCCESS','smk3_detail','UPDATING DATA ID #237',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1481,'SUCCESS','smk3_detail','UPDATING DATA ID #239',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1482,'SUCCESS','smk3_detail','UPDATING DATA ID #241',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1483,'SUCCESS','smk3_detail','UPDATING DATA ID #243',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1484,'SUCCESS','smk3_detail','UPDATING DATA ID #245',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1485,'SUCCESS','smk3_detail','UPDATING DATA ID #247',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1486,'SUCCESS','smk3_detail','UPDATING DATA ID #249',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1487,'SUCCESS','smk3_detail','UPDATING DATA ID #251',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1488,'SUCCESS','smk3_detail','UPDATING DATA ID #253',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1489,'SUCCESS','smk3_detail','UPDATING DATA ID #255',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1490,'SUCCESS','smk3_detail','UPDATING DATA ID #257',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1491,'SUCCESS','smk3_detail','UPDATING DATA ID #259',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1492,'SUCCESS','smk3_detail','UPDATING DATA ID #333',8,1486636814,8,1486636814);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1493,'SUCCESS','smk3','UPDATING DATA ID #6',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1494,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #65',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1495,'SUCCESS','smk3_detail','UPDATING DATA ID #212',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1496,'SUCCESS','smk3_detail','UPDATING DATA ID #214',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1497,'SUCCESS','smk3_detail','UPDATING DATA ID #216',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1498,'SUCCESS','smk3_detail','UPDATING DATA ID #218',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1499,'SUCCESS','smk3_detail','UPDATING DATA ID #220',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1500,'SUCCESS','smk3_detail','UPDATING DATA ID #222',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1501,'SUCCESS','smk3_detail','UPDATING DATA ID #224',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1502,'SUCCESS','smk3_detail','UPDATING DATA ID #226',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1503,'SUCCESS','smk3_detail','UPDATING DATA ID #228',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1504,'SUCCESS','smk3_detail','UPDATING DATA ID #230',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1505,'SUCCESS','smk3_detail','UPDATING DATA ID #232',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1506,'SUCCESS','smk3_detail','UPDATING DATA ID #234',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1507,'SUCCESS','smk3_detail','UPDATING DATA ID #236',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1508,'SUCCESS','smk3_detail','UPDATING DATA ID #238',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1509,'SUCCESS','smk3_detail','UPDATING DATA ID #240',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1510,'SUCCESS','smk3_detail','UPDATING DATA ID #242',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1511,'SUCCESS','smk3_detail','UPDATING DATA ID #244',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1512,'SUCCESS','smk3_detail','UPDATING DATA ID #246',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1513,'SUCCESS','smk3_detail','UPDATING DATA ID #248',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1514,'SUCCESS','smk3_detail','UPDATING DATA ID #250',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1515,'SUCCESS','smk3_detail','UPDATING DATA ID #252',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1516,'SUCCESS','smk3_detail','UPDATING DATA ID #254',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1517,'SUCCESS','smk3_detail','UPDATING DATA ID #256',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1518,'SUCCESS','smk3_detail','UPDATING DATA ID #258',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1519,'SUCCESS','smk3_detail','UPDATING DATA ID #260',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1520,'SUCCESS','smk3_detail','UPDATING DATA ID #334',8,1486636827,8,1486636827);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1521,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #26',8,1486640348,8,1486640348);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1522,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #35',8,1486640348,8,1486640348);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1523,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #63',8,1486640348,8,1486640348);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1524,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #337',8,1486640348,8,1486640348);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1525,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #338',8,1486640348,8,1486640348);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1537,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #28',8,1486641950,8,1486641950);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1538,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #37',8,1486641950,8,1486641950);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1539,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #67',8,1486641950,8,1486641950);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1540,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #345',8,1486641950,8,1486641950);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1541,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #346',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1542,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #68',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1543,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #347',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1544,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #348',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1545,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #69',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1546,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #349',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1547,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #350',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1548,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #38',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1549,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #70',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1550,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #351',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1551,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #352',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1552,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #71',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1553,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #353',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1554,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #354',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1555,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #72',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1556,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #355',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1557,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #356',8,1486641951,8,1486641951);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1558,'SUCCESS','smk3','INSERTING NEW DATA WITH ID #7',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1559,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #357',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1560,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #358',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1561,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #359',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1562,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #360',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1563,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #361',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1564,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #362',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1565,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #363',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1566,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #364',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1567,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #365',8,1486653338,8,1486653338);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1568,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #366',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1569,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #367',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1570,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #368',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1571,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #369',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1572,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #370',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1573,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #371',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1574,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #372',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1575,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #373',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1576,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #374',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1577,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #375',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1578,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #376',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1579,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #377',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1580,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #378',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1581,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #379',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1582,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #380',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1583,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #381',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1584,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #382',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1585,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #383',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1586,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #384',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1587,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #385',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1588,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #386',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1589,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #387',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1590,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #388',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1591,'SUCCESS','smk3_detail','INSERTING NEW DATA WITH ID #389',8,1486653339,8,1486653339);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1592,'SUCCESS','working_plan','INSERTING NEW DATA WITH ID #2',8,1486740207,8,1486740207);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1593,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #1',8,1486791057,8,1486791057);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1594,'SUCCESS','environment_permit','DELETING DATA ID #1',8,1486791310,8,1486791310);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1595,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #2',8,1486805408,8,1486805408);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1596,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #1',8,1486805408,8,1486805408);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1603,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #6',8,1486820278,8,1486820278);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1604,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #5',8,1486820278,8,1486820278);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1609,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #9',8,1486820592,8,1486820592);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1610,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #8',8,1486820592,8,1486820592);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1611,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #4',8,1486820592,8,1486820592);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1612,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #10',8,1486820592,8,1486820592);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1613,'SUCCESS','environment_permit','DELETING DATA ID #9',8,1486820857,8,1486820857);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1614,'SUCCESS','environment_permit','DELETING DATA ID #2',8,1486820985,8,1486820985);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1615,'SUCCESS','environment_permit','DELETING DATA ID #6',8,1486820988,8,1486820988);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1616,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #10',8,1486821633,8,1486821633);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1617,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #9',8,1486821633,8,1486821633);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1618,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #5',8,1486821633,8,1486821633);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1619,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #11',8,1486821633,8,1486821633);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1620,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #11',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1621,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #10',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1622,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #6',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1623,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #12',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1624,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #11',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1625,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #7',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1626,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #13',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1627,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #12',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1628,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #8',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1629,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #14',8,1486838453,8,1486838453);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1630,'SUCCESS','working_plan','INSERTING NEW DATA WITH ID #3',8,1486839310,8,1486839310);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1631,'SUCCESS','working_plan_detail','INSERTING NEW DATA WITH ID #7',8,1486839310,8,1486839310);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1632,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #9',8,1486839310,8,1486839310);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1633,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #15',8,1486839310,8,1486839310);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1634,'SUCCESS','environment_permit','UPDATING DATA ID #11',8,1486840140,8,1486840140);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1635,'SUCCESS','environment_permit','UPDATING DATA ID #11',8,1486840150,8,1486840150);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1636,'SUCCESS','environment_permit','UPDATING DATA ID #11',8,1486840181,8,1486840181);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1637,'SUCCESS','environment_permit_detail','UPDATING DATA ID #10',8,1486840181,8,1486840181);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1638,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #66',8,1486840181,8,1486840181);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1639,'SUCCESS','environment_permit_detail','UPDATING DATA ID #11',8,1486840181,8,1486840181);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1640,'SUCCESS','environment_permit_detail','UPDATING DATA ID #12',8,1486840181,8,1486840181);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1641,'SUCCESS','environment_permit','UPDATING DATA ID #11',8,1486840589,8,1486840589);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1642,'SUCCESS','environment_permit_detail','UPDATING DATA ID #10',8,1486840589,8,1486840589);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1643,'SUCCESS','environment_permit_detail','UPDATING DATA ID #11',8,1486840589,8,1486840589);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1644,'SUCCESS','environment_permit_detail','UPDATING DATA ID #12',8,1486840589,8,1486840589);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1645,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #13',8,1486840589,8,1486840589);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1646,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #10',8,1486840589,8,1486840589);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1647,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #16',8,1486840590,8,1486840590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1648,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #14',8,1486840590,8,1486840590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1649,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #11',8,1486840590,8,1486840590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1650,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #17',8,1486840590,8,1486840590);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1651,'SUCCESS','attachment','DELETING DATA ID #11',8,1486841229,8,1486841229);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1652,'SUCCESS','attachment','DELETING DATA ID #10',8,1486841242,8,1486841242);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1653,'SUCCESS','attachment','DELETING DATA ID #8',8,1486841246,8,1486841246);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1654,'SUCCESS','environment_permit','UPDATING DATA ID #11',8,1486841254,8,1486841254);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1655,'SUCCESS','environment_permit_detail','UPDATING DATA ID #10',8,1486841254,8,1486841254);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1656,'SUCCESS','environment_permit_detail','UPDATING DATA ID #11',8,1486841254,8,1486841254);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1657,'SUCCESS','environment_permit_detail','UPDATING DATA ID #12',8,1486841254,8,1486841254);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1658,'SUCCESS','environment_permit_detail','UPDATING DATA ID #13',8,1486841254,8,1486841254);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1659,'SUCCESS','environment_permit_detail','UPDATING DATA ID #14',8,1486841254,8,1486841254);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1660,'SUCCESS','environment_permit_detail','DELETING DATA ID #9',8,1486887186,8,1486887186);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1661,'SUCCESS','environment_permit_detail','DELETING DATA ID #10',8,1486887230,8,1486887230);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1662,'SUCCESS','environment_permit','DELETING DATA ID #10',8,1486908977,8,1486908977);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1663,'SUCCESS','environment_permit','DELETING DATA ID #11',8,1486908994,8,1486908994);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1664,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #12',8,1486909069,8,1486909069);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1665,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #15',8,1486909069,8,1486909069);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1666,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #10',8,1486909069,8,1486909069);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1667,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #16',8,1486909069,8,1486909069);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1668,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #16',8,1486909069,8,1486909069);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1669,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #11',8,1486909069,8,1486909069);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1670,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #17',8,1486909070,8,1486909070);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1671,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #17',8,1486909070,8,1486909070);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1672,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #12',8,1486909070,8,1486909070);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1673,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #18',8,1486909070,8,1486909070);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1674,'SUCCESS','attachment_owner','DELETING DATA ID #16',8,1486909114,8,1486909114);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1675,'SUCCESS','environment_permit_detail','DELETING DATA ID #15',8,1486909114,8,1486909114);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1676,'SUCCESS','attachment_owner','DELETING DATA ID #17',8,1486909416,8,1486909416);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1677,'SUCCESS','attachment_owner','DELETING DATA ID #18',8,1486909416,8,1486909416);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1678,'SUCCESS','environment_permit','DELETING DATA ID #12',8,1486909417,8,1486909417);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1679,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #1',8,1487061100,8,1487061100);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1680,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #1',8,1487061100,8,1487061100);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1681,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #13',8,1487061100,8,1487061100);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1682,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #16',8,1487061100,8,1487061100);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1683,'SUCCESS','environment_permit','UPDATING DATA ID #1',8,1487061634,8,1487061634);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1684,'SUCCESS','environment_permit_detail','UPDATING DATA ID #1',8,1487061634,8,1487061634);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1685,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #67',8,1487061634,8,1487061634);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1686,'SUCCESS','environment_permit','INSERTING NEW DATA WITH ID #2',8,1487061974,8,1487061974);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1687,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #2',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1688,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #14',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1689,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #17',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1690,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #3',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1691,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #15',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1692,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #18',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1693,'SUCCESS','environment_permit_detail','INSERTING NEW DATA WITH ID #4',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1694,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #16',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1695,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #19',8,1487061975,8,1487061975);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1696,'SUCCESS','attachment_owner','DELETING DATA ID #19',8,1487062536,8,1487062536);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1697,'SUCCESS','environment_permit_detail','DELETING DATA ID #4',8,1487062536,8,1487062536);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1698,'SUCCESS','attachment','DELETING DATA ID #14',8,1487062999,8,1487062999);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1699,'SUCCESS','environment_permit_detail','DELETING DATA ID #2',8,1487062999,8,1487062999);

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `log_dirty` */

insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'sector','Sector','Nama','Pekanbaru','Pekanbaru1',8,1479442515,8,1479442515);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,'sector','Sector','Nama','Pekanbaru1','Pekanbaru',8,1479442528,8,1479442528);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,1,'power-plant','PowerPlant','Sektor','4','8',8,1479444562,8,1479444562);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,1,'power-plant','PowerPlant','Sektor','8','4',8,1479444587,8,1479444587);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,'user-profile','Employee','Alamat','Lorong Jengkol. Talang Banjar.','Lorong Jengkol. Talang Banjar. Edit',8,1480133279,8,1480133279);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,1,'user-profile','Employee','Alamat','Lorong Jengkol. Talang Banjar. Edit','Lorong Jengkol. Talang Banjar.',8,1480133297,8,1480133297);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,6,'user-profile','Employee','Nama','Joko Test','Joko Test Edit',12,1480133428,12,1480133428);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,6,'user-profile','Employee','Nama','Joko Test Edit','Joko Test',12,1480133435,12,1480133435);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,1,'roadmap-k3l','RoadmapK3l','Pembangkit Listrik','2','1',8,1483676974,8,1483676974);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,1,'roadmap-k3l','RoadmapK3l','Pembangkit Listrik','1','3',8,1483694441,8,1483694441);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,1,'roadmap-k3l','RoadmapK3lTarget','Nilai','50%','51%',8,1483694734,8,1483694734);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,2,'roadmap-k3l','RoadmapK3lTarget','Nilai','100%','99%',8,1483694734,8,1483694734);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,1,'roadmap-k3l','RoadmapK3l','Pembangkit Listrik','3','2',8,1483694887,8,1483694887);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,1,'working-plan','WorkingPlanDetail','R / NR','NR','R',8,1485315493,8,1485315493);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,4,'smk3-title','Smk3Title','Judul SMK3','awda','awdas',8,1486400612,8,1486400612);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,5,'smk3-title','Smk3Title','Judul SMK3','Judul','Pembangunan dan Pemeliharaan Komitmen',8,1486401422,8,1486401422);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,3,'smk3-title','Smk3Subtitle','Sub-Judul SMK3','awda','Kebijakan',8,1486401422,8,1486401422);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,4,'smk3-title','Smk3Criteria','Kriteria','awda','Terdapat kebijakan K3 yang tertulis, bertanggal, ditandatangan oleh pengusaha atau pengurus secara jelas menyatakan tujuan dan sasaran K3 serta komitmen terhadap peningkatan K3',8,1486401422,8,1486401422);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,5,'smk3-title','Smk3Criteria','Kriteria','aawdawd','Kebijakan disusun oleh pengusaha dan atau pengurus setelah melalui proses konsultasi dengan wakil tenaga kerja.',8,1486402988,8,1486402988);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,6,'smk3-title','Smk3Criteria','Kriteria','adwadadawda','Perusahaan mengkomunikasikan kebijakan K3\r\nkepada seluruh tenaga kerja, tamu, kontraktor, pelanggan dan pemasok dengan tata cara yang tepat.',8,1486402988,8,1486402988);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,4,'smk3-title','Smk3Subtitle','Sub-Judul SMK3','adwwadasd','Tanggung Jawab & Wewenang untuk Bertindak',8,1486402988,8,1486402988);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (26,7,'smk3-title','Smk3Criteria','Kriteria','asdsadwad','Tanggung jawab dan wewenang untuk mengambil tindakan dan melaporkan kepada semua pihak yang terkait dalam perusahaan di bidang K3 yang telah ditetapkan, diinformasikan dan didokumentasikan.',8,1486402988,8,1486402988);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (27,8,'smk3-title','Smk3Criteria','Kriteria','asdasd','Penunjukan penanggung jawab K3 harus sesuai peraturan perundang-undangan.',8,1486402988,8,1486402988);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (28,13,'smk3-title','Smk3Criteria','Kriteria','Kebijakan khusus dibuat untuk masalah K3 yang bersifat khusus.','Pimpinan unit kerja dalam suatu perusahaan bertanggung jawab atas kinerja K3 pada unit kerjanya.',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (29,14,'smk3-title','Smk3Criteria','Kriteria','Kebijakan K3 dan kebijakan khusus lainnya ditinjau ulang secara berkala untuk menjamin bahwa kebijakan tersebut sesuai dengan perubahan yang terjadi dalam perusahaan dan dalam peraturan per undang-undangan','Pengusaha atau pengurus bertanggung jawab secara penuh untuk menjamin pelaksanaan SMK3.',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (30,5,'smk3-title','Smk3Subtitle','Sub-Judul SMK3','asdadasd','Tinjauan dan Evaluasi',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (31,9,'smk3-title','Smk3Criteria','Kriteria','azcxzczxvzxv','Tinjauan terhadap penerapan SMK3 meliputi kebijakan, perencanaan, pelaksanaan, pemantauan\r\ndan evaluasi telah dilakukan, dicatat dan\r\ndidokumentasikan.',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (32,10,'smk3-title','Smk3Criteria','Kriteria','zxvxzv','Hasil tinjauan ulang dimasukkan dalam perencanaan tindakan manajemen.',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (33,11,'smk3-title','Smk3Criteria','Kriteria','zxvzxv','Keterlibatan tenaga kerja dan penjadwalan konsultasi tenaga kerja dengan wakil perusahaan didokumentasikan dan disebarluaskan ke seluruh tenaga kerja.',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (34,12,'smk3-title','Smk3Criteria','Kriteria','zxvxzvzx','Pengurus harus meninjau ulang pelaksanaan SMK3 secara berkala untuk menilai kesesuaian dan efektivitas SMK3.',8,1486409906,8,1486409906);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,169,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (36,170,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,171,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (38,172,'smk3','Smk3Detail','Jawaban','0','1',8,1486545273,8,1486545273);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (39,189,'smk3','Smk3Detail','Jawaban','0','1',8,1486545296,8,1486545296);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,190,'smk3','Smk3Detail','Jawaban','0','1',8,1486551854,8,1486551854);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (41,4,'smk3-title','Smk3Criteria','Kriteria','Terdapat kebijakan K3 yang tertulis, bertanggal, ditandatangan oleh pengusaha atau pengurus secara jelas menyatakan tujuan dan sasaran K3 serta komitmen terhadap peningkatan K3','<strong></strong><p>Terdapat kebijakan K3 yang tertulis, bertanggal, ditandatangan oleh pengusaha atau pengurus secara jelas menyatakan tujuan dan sasaran K3 serta komitmen terhadap peningkatan </p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (42,5,'smk3-title','Smk3Criteria','Kriteria','Kebijakan disusun oleh pengusaha dan atau pengurus setelah melalui proses konsultasi dengan wakil tenaga kerja.','<p>Kebijakan disusun oleh pengusaha dan atau pengurus setelah melalui proses konsultasi dengan wakil tenaga kerja.</p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (43,6,'smk3-title','Smk3Criteria','Kriteria','Perusahaan mengkomunikasikan kebijakan K3\r\nkepada seluruh tenaga kerja, tamu, kontraktor, pelanggan dan pemasok dengan tata cara yang tepat.','<p>Perusahaan mengkomunikasikan kebijakan K3</p><p>kepada seluruh tenaga kerja, tamu, kontraktor, pelanggan dan pemasok dengan tata cara yang tepat.</p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (44,20,'smk3-title','Smk3Criteria','Kriteria','awd','<p>awd</p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (45,7,'smk3-title','Smk3Criteria','Kriteria','Tanggung jawab dan wewenang untuk mengambil tindakan dan melaporkan kepada semua pihak yang terkait dalam perusahaan di bidang K3 yang telah ditetapkan, diinformasikan dan didokumentasikan.','<p>Tanggung jawab dan wewenang untuk mengambil tindakan dan melaporkan kepada semua pihak yang terkait dalam perusahaan di bidang K3 yang telah ditetapkan, diinformasikan dan didokumentasikan.</p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (46,8,'smk3-title','Smk3Criteria','Kriteria','Penunjukan penanggung jawab K3 harus sesuai peraturan perundang-undangan.','<p>Penunjukan penanggung jawab K3 harus sesuai peraturan perundang-undangan.</p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (47,13,'smk3-title','Smk3Criteria','Kriteria','Pimpinan unit kerja dalam suatu perusahaan bertanggung jawab atas kinerja K3 pada unit kerjanya.','<p>Pimpinan unit kerja dalam suatu perusahaan bertanggung jawab atas kinerja K3 pada unit kerjanya.</p>',8,1486564003,8,1486564003);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (48,14,'smk3-title','Smk3Criteria','Kriteria','Pengusaha atau pengurus bertanggung jawab secara penuh untuk menjamin pelaksanaan SMK3.','<p>Pengusaha atau pengurus bertanggung jawab secara penuh untuk menjamin pelaksanaan SMK3.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (49,15,'smk3-title','Smk3Criteria','Kriteria','Kebijakan khusus dibuat untuk masalah K3 yang bersifat khusus.','<p>Kebijakan khusus dibuat untuk masalah K3 yang bersifat khusus.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (50,16,'smk3-title','Smk3Criteria','Kriteria','Kebijakan K3 dan kebijakan khusus lainnya ditinjau ulang secara berkala untuk menjamin bahwa kebijakan tersebut sesuai dengan perubahan yang terjadi dalam perusahaan dan dalam peraturan per undang-undangan','<p>Kebijakan K3 dan kebijakan khusus lainnya ditinjau ulang secara berkala untuk menjamin bahwa kebijakan tersebut sesuai dengan perubahan yang terjadi dalam perusahaan dan dalam peraturan per undang-undangan</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (51,9,'smk3-title','Smk3Criteria','Kriteria','Tinjauan terhadap penerapan SMK3 meliputi kebijakan, perencanaan, pelaksanaan, pemantauan\r\ndan evaluasi telah dilakukan, dicatat dan\r\ndidokumentasikan.','<p>Tinjauan terhadap penerapan SMK3 meliputi kebijakan, perencanaan, pelaksanaan, pemantauan</p><p>dan evaluasi telah dilakukan, dicatat dan</p><p>didokumentasikan.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (52,10,'smk3-title','Smk3Criteria','Kriteria','Hasil tinjauan ulang dimasukkan dalam perencanaan tindakan manajemen.','<p>Hasil tinjauan ulang dimasukkan dalam perencanaan tindakan manajemen.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (53,11,'smk3-title','Smk3Criteria','Kriteria','Keterlibatan tenaga kerja dan penjadwalan konsultasi tenaga kerja dengan wakil perusahaan didokumentasikan dan disebarluaskan ke seluruh tenaga kerja.','<p>Keterlibatan tenaga kerja dan penjadwalan konsultasi tenaga kerja dengan wakil perusahaan didokumentasikan dan disebarluaskan ke seluruh tenaga kerja.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (54,12,'smk3-title','Smk3Criteria','Kriteria','Pengurus harus meninjau ulang pelaksanaan SMK3 secara berkala untuk menilai kesesuaian dan efektivitas SMK3.','<p>Pengurus harus meninjau ulang pelaksanaan SMK3 secara berkala untuk menilai kesesuaian dan efektivitas SMK3.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (55,17,'smk3-title','Smk3Criteria','Kriteria','Petugas yang bertanggung jawab untuk menangani keadaan darurat telah ditetapkan dan mendapatkan pelatihan.','<p>Petugas yang bertanggung jawab untuk menangani keadaan darurat telah ditetapkan dan mendapatkan pelatihan.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (56,18,'smk3-title','Smk3Criteria','Kriteria','Perusahaan mendapatkan saran-saran dari para ahli di bidang K3 yang berasal dari dalam dan/atau luar perusahaan.','<p>Perusahaan mendapatkan saran-saran dari para ahli di bidang K3 yang berasal dari dalam dan/atau luar perusahaan.</p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (57,19,'smk3-title','Smk3Criteria','Kriteria','Kinerja K3 termuat dalam laporan tahunan perusahaan atau laporan lain yang setingkat.','<strong></strong><p>Kinerja K3 termuat dalam laporan tahunan perusahaan atau laporan lain yang setingkat.<strong>asdasdawd</strong></p>',8,1486564004,8,1486564004);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (58,21,'smk3-title','Smk3Criteria','Kriteria','test','testatat',8,1486564491,8,1486564491);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (63,22,'smk3-title','Smk3Criteria','Kriteria','test','testaadasdaw',8,1486565232,8,1486565232);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (64,5,'smk3','Smk3','Triwulan','6','IV',8,1486636814,8,1486636814);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (65,6,'smk3','Smk3','Triwulan','1','V',8,1486636827,8,1486636827);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (66,10,'environment-permit','EnvironmentPermitDetail','Tanggal','2017-02-01','2017-02-21',8,1486840181,8,1486840181);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (67,1,'environment-permit','EnvironmentPermitDetail','Batasan Kapasitas','123123','12312332',8,1487061634,8,1487061634);

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `login_history` */

insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (1,8,NULL,NULL,'LOGOUT','::1',1479269759,1479269759);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (2,8,NULL,NULL,'LOGIN SUCCESS','::1',1479269767,1479269767);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (3,8,NULL,NULL,'LOGOUT','::1',1479398320,1479398320);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (4,8,NULL,NULL,'LOGIN SUCCESS','::1',1479440555,1479440555);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (5,8,NULL,NULL,'LOGOUT','::1',1479730129,1479730129);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (6,8,NULL,NULL,'LOGIN SUCCESS','::1',1480046393,1480046393);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (7,12,NULL,NULL,'LOGIN SUCCESS','::1',1480052102,1480052102);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (8,12,NULL,NULL,'LOGOUT','::1',1480052214,1480052214);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (9,12,NULL,NULL,'LOGIN SUCCESS','::1',1480052222,1480052222);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (10,12,NULL,NULL,'LOGOUT','::1',1480053606,1480053606);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (11,8,NULL,NULL,'LOGOUT','::1',1480053612,1480053612);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (12,12,NULL,NULL,'LOGIN SUCCESS','::1',1480053621,1480053621);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (13,8,NULL,NULL,'LOGIN SUCCESS','::1',1480053978,1480053978);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (14,12,NULL,NULL,'LOGOUT','::1',1480129987,1480129987);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (15,8,NULL,NULL,'LOGIN SUCCESS','::1',1480130000,1480130000);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (16,8,NULL,NULL,'LOGOUT','::1',1480131778,1480131778);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (17,12,NULL,NULL,'LOGIN SUCCESS','::1',1480131788,1480131788);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (18,12,NULL,NULL,'LOGOUT','::1',1480149980,1480149980);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (19,12,NULL,NULL,'LOGIN SUCCESS','::1',1480150043,1480150043);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (20,12,NULL,NULL,'LOGOUT','::1',1480150050,1480150050);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (21,8,NULL,NULL,'LOGOUT','::1',1480150107,1480150107);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (22,8,NULL,NULL,'LOGIN SUCCESS','::1',1481598277,1481598277);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (23,8,NULL,NULL,'LOGOUT','::1',1481599145,1481599145);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (24,8,NULL,NULL,'LOGIN SUCCESS','::1',1482375151,1482375151);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (25,8,NULL,NULL,'LOGOUT','::1',1482394645,1482394645);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (26,8,NULL,NULL,'LOGIN SUCCESS','::1',1482394655,1482394655);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (27,8,NULL,NULL,'LOGOUT','::1',1482413207,1482413207);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (28,8,NULL,NULL,'LOGIN SUCCESS','::1',1482482524,1482482524);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (29,8,NULL,NULL,'LOGOUT','::1',1482826243,1482826243);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (30,8,NULL,NULL,'LOGIN SUCCESS','::1',1482826390,1482826390);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (31,8,NULL,NULL,'LOGOUT','::1',1482830435,1482830435);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (32,8,NULL,NULL,'LOGIN SUCCESS','::1',1482904018,1482904018);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (33,8,NULL,NULL,'LOGOUT','::1',1482908945,1482908945);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (34,8,NULL,NULL,'LOGIN SUCCESS','::1',1482908955,1482908955);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (35,8,NULL,NULL,'LOGOUT','::1',1482913301,1482913301);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (36,8,NULL,NULL,'LOGIN SUCCESS','::1',1482913439,1482913439);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (37,8,NULL,NULL,'LOGOUT','::1',1482980058,1482980058);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (38,8,NULL,NULL,'LOGIN SUCCESS','::1',1483074651,1483074651);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (39,8,NULL,NULL,'LOGOUT','::1',1483082347,1483082347);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (40,8,NULL,NULL,'LOGIN SUCCESS','::1',1483082384,1483082384);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (41,8,NULL,NULL,'LOGOUT','::1',1483419405,1483419405);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (42,8,NULL,NULL,'LOGIN SUCCESS','::1',1483419453,1483419453);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (43,8,NULL,NULL,'LOGIN SUCCESS','::1',1483590963,1483590963);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (44,8,NULL,NULL,'LOGOUT','::1',1483676171,1483676171);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (45,8,NULL,NULL,'LOGIN SUCCESS','::1',1483676266,1483676266);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (46,8,NULL,NULL,'LOGOUT','::1',1483699644,1483699644);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (47,8,NULL,NULL,'LOGIN SUCCESS','::1',1483760748,1483760748);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (48,8,NULL,NULL,'LOGOUT','::1',1484042329,1484042329);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (49,8,NULL,NULL,'LOGIN SUCCESS','::1',1484105381,1484105381);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (50,8,NULL,NULL,'LOGOUT','::1',1484301026,1484301026);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (51,8,NULL,NULL,'LOGIN SUCCESS','::1',1484301803,1484301803);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (52,8,NULL,NULL,'LOGOUT','::1',1484543719,1484543719);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (53,8,NULL,NULL,'LOGIN SUCCESS','::1',1484543730,1484543730);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (54,8,NULL,NULL,'LOGOUT','::1',1484714239,1484714239);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (55,8,NULL,NULL,'LOGIN SUCCESS','::1',1484795562,1484795562);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (56,8,NULL,NULL,'LOGOUT','::1',1485264263,1485264263);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (57,8,NULL,NULL,'LOGIN SUCCESS','::1',1485264914,1485264914);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (58,8,NULL,NULL,'LOGOUT','::1',1485344838,1485344838);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (59,8,NULL,NULL,'LOGIN SUCCESS','::1',1485422635,1485422635);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (60,8,NULL,NULL,'LOGOUT','::1',1485444933,1485444933);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (61,8,NULL,NULL,'LOGIN SUCCESS','::1',1486025491,1486025491);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level` */

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_detail` */

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_question` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_title` */

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `power_plant` */

insert  into `power_plant`(`id`,`sector_id`,`pp_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,'PLTG Batanghari 1',8,1479444423,8,1479444587);
insert  into `power_plant`(`id`,`sector_id`,`pp_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,4,'PLTG Batanghari 2',8,1479444739,8,1479444739);
insert  into `power_plant`(`id`,`sector_id`,`pp_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,4,'PLTG Payo Selincah',8,1479444770,8,1479444770);
insert  into `power_plant`(`id`,`sector_id`,`pp_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,2,'PLTU Pembangkit 1',8,1479444945,8,1479444945);
insert  into `power_plant`(`id`,`sector_id`,`pp_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,7,'PLTG Pembangkit 1',8,1479445219,8,1479445219);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l` */

insert  into `roadmap_k3l`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'K3',4,2,'2017',8,1483699622,8,1483699622);

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

insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'TGT','Tingkat Penerapan Sistem Manajemen  K3',NULL,8,1482728633,8,1482728633);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'TGT','Maturity Level Implementasi K2',NULL,8,1482728652,8,1482728652);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'TGT','Risk Rating Pembangkit',NULL,8,1482815485,8,1482815485);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'TGT','Maturity Level Behavioural Based Safety',NULL,8,1482822142,8,1482822142);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'TGT','Jumlah Nearmiss',NULL,8,1482822204,8,1482822204);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'PHDR','A - PENINGKATAN KAPABILITAS SDM',NULL,8,1482824515,8,1482824515);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'PSHDR','A.1 Sertifikasi Personil Wajib',NULL,8,1482824872,8,1482824872);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,'PITEM','Sertifikasi Operator Pesawat Angkat Angkut',NULL,8,1482824888,8,1482824888);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,'PITEM','Sertifikasi Operator Bejana Bertekanan',NULL,8,1482825045,8,1482825045);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,'TGT','Jumlah Kecelakaan Kerja',NULL,8,1482826730,8,1482826730);
insert  into `roadmap_k3l_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,'TGT','Jumlah Kecelakaan Instalasi',NULL,8,1482909553,8,1482909553);

/*Table structure for table `roadmap_k3l_item` */

DROP TABLE IF EXISTS `roadmap_k3l_item`;

CREATE TABLE `roadmap_k3l_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roadmap_k3l_id` int(11) NOT NULL,
  `roadmap_k3l_attribute_id` int(11) NOT NULL,
  `item_value_when` varchar(150) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l_item` */

insert  into `roadmap_k3l_item`(`id`,`roadmap_k3l_id`,`roadmap_k3l_attribute_id`,`item_value_when`,`item_value_where`,`item_value_who`,`item_value_how_many`,`item_value_how_much`,`item_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,2,8,'semester 1','asdf','asdf','asdf',50000,0,8,1483699622,8,1483699622);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `roadmap_k3l_target` */

insert  into `roadmap_k3l_target`(`id`,`roadmap_k3l_id`,`roadmap_k3l_attribute_id`,`target_value`,`target_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,2,2,'51%',0,8,1483699622,8,1483699622);

/*Table structure for table `sector` */

DROP TABLE IF EXISTS `sector`;

CREATE TABLE `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(150) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `sector` */

insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Pekanbaru',8,1479442400,8,1479442528);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'Keramasan',8,1479442578,8,1479442578);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'Medan',8,1479442600,8,1479442600);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'Jambi',8,1479442615,8,1479442615);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'Bandar Lampung',8,1479442635,8,1479442635);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'Bukit Tinggi',8,1479442646,8,1479442646);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'Bengkulu',8,1479442656,8,1479442656);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,'Bukit Asam',8,1479442677,8,1479442677);
insert  into `sector`(`id`,`sector_name`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,'Tarahan',8,1479442685,8,1479442685);

/*Table structure for table `smk3` */

DROP TABLE IF EXISTS `smk3`;

CREATE TABLE `smk3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `smk3_year` int(4) NOT NULL,
  `smk3_quarter` varchar(2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_smk3_sector` (`sector_id`),
  KEY `FK_smk3_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_smk3_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_smk3_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `smk3` */

insert  into `smk3`(`id`,`sector_id`,`power_plant_id`,`smk3_year`,`smk3_quarter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,7,5,131,'IV',8,1486545260,8,1486636814);
insert  into `smk3`(`id`,`sector_id`,`power_plant_id`,`smk3_year`,`smk3_quarter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,7,5,2332,'V',8,1486551887,8,1486636827);
insert  into `smk3`(`id`,`sector_id`,`power_plant_id`,`smk3_year`,`smk3_quarter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,7,5,2016,'5',8,1486653338,8,1486653338);

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

insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (31,15,'awada',8,1486551819,8,1486551819);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (32,16,'asdadasfas',8,1486551916,8,1486551916);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (33,16,'asdafsaf',8,1486551916,8,1486551916);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (34,16,'asdafsadsaf',8,1486551916,8,1486551916);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,17,'asfasfasdasfasfasf',8,1486551916,8,1486551916);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (36,17,'asfasdasf',8,1486551916,8,1486551916);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,18,'asdadwad',8,1486552144,8,1486552144);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (38,18,'saddawdawdad',8,1486552144,8,1486552144);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (39,18,'adsadwadsadw',8,1486552145,8,1486552145);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,18,'asdasdawdada',8,1486552145,8,1486552145);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (41,19,'asdawdawdawd',8,1486552145,8,1486552145);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (42,20,'asdwadasdw',8,1486552145,8,1486552145);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (43,21,'dasdwadasdwadwad',8,1486552145,8,1486552145);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (44,21,'asdadawdasd',8,1486552145,8,1486552145);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (45,22,'asdwad',8,1486552301,8,1486552301);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (46,22,'asdadaw',8,1486552301,8,1486552301);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (47,22,'sadawdasdw',8,1486552301,8,1486552301);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (48,23,'dwadasdawdadawadwadawdwadawd',8,1486552301,8,1486552301);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (49,23,'asdadwad',8,1486552301,8,1486552301);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (50,24,'asdawdaw',8,1486552355,8,1486552355);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (51,24,'asdwadasdwad',8,1486552355,8,1486552355);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (52,24,'dawdasdwadasdawdadsadw',8,1486552356,8,1486552356);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (53,25,'adsadawdasdwadwad',8,1486552356,8,1486552356);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (54,25,'asdsadasdawda',8,1486552356,8,1486552356);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (55,26,'asdawdasdwad',8,1486552356,8,1486552356);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (61,32,'asdawd',8,1486565158,8,1486565158);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (63,35,'<p>asdadsdwd<strong>asdawdsad<em>asdasdsadawa<del>dasdsadwadsa</del></em></strong></p>',8,1486640348,8,1486640348);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (67,37,'<p>asdwada</p>',8,1486641950,8,1486641950);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (68,37,'<p>asdawd</p>',8,1486641951,8,1486641951);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (69,37,'<p>asdawd</p>',8,1486641951,8,1486641951);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (70,38,'<p>asdasdawd</p>',8,1486641951,8,1486641951);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (71,38,'<p>asdawdsad</p>',8,1486641951,8,1486641951);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (72,38,'<p>asdwadsad<em>sadadadasdwadawd<strong>sadwad</strong><strong></strong></em></p>',8,1486641951,8,1486641951);

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
  CONSTRAINT `FK_smk3_answer` FOREIGN KEY (`smk3_id`) REFERENCES `smk3` (`id`),
  CONSTRAINT `FK_smk3_answer_criteria` FOREIGN KEY (`smk3_criteria_id`) REFERENCES `smk3_criteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=390 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_detail` */

insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (190,5,31,1,8,1486551819,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (212,6,31,1,8,1486551887,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (213,5,32,0,8,1486551916,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (214,6,32,0,8,1486551916,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (215,5,33,0,8,1486551916,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (216,6,33,0,8,1486551916,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (217,5,34,0,8,1486551916,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (218,6,34,0,8,1486551916,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (219,5,35,0,8,1486551916,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (220,6,35,0,8,1486551916,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (221,5,36,0,8,1486551916,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (222,6,36,0,8,1486551916,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (223,5,37,0,8,1486552144,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (224,6,37,0,8,1486552144,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (225,5,38,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (226,6,38,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (227,5,39,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (228,6,39,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (229,5,40,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (230,6,40,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (231,5,41,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (232,6,41,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (233,5,42,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (234,6,42,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (235,5,43,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (236,6,43,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (237,5,44,0,8,1486552145,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (238,6,44,0,8,1486552145,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (239,5,45,0,8,1486552301,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (240,6,45,0,8,1486552301,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (241,5,46,0,8,1486552301,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (242,6,46,0,8,1486552301,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (243,5,47,0,8,1486552301,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (244,6,47,0,8,1486552301,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (245,5,48,0,8,1486552301,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (246,6,48,0,8,1486552301,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (247,5,49,0,8,1486552301,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (248,6,49,0,8,1486552301,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (249,5,50,0,8,1486552355,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (250,6,50,0,8,1486552355,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (251,5,51,0,8,1486552355,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (252,6,51,0,8,1486552356,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (253,5,52,0,8,1486552356,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (254,6,52,0,8,1486552356,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (255,5,53,0,8,1486552356,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (256,6,53,0,8,1486552356,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (257,5,54,0,8,1486552356,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (258,6,54,0,8,1486552356,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (259,5,55,0,8,1486552356,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (260,6,55,0,8,1486552356,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (333,5,61,0,8,1486565158,8,1486636814);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (334,6,61,0,8,1486565158,8,1486636827);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (337,5,63,0,8,1486640348,8,1486640348);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (338,6,63,0,8,1486640348,8,1486640348);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (345,5,67,0,8,1486641950,8,1486641950);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (346,6,67,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (347,5,68,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (348,6,68,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (349,5,69,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (350,6,69,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (351,5,70,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (352,6,70,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (353,5,71,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (354,6,71,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (355,5,72,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (356,6,72,0,8,1486641951,8,1486641951);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (357,7,31,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (358,7,32,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (359,7,33,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (360,7,34,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (361,7,35,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (362,7,36,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (363,7,37,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (364,7,38,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (365,7,39,0,8,1486653338,8,1486653338);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (366,7,40,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (367,7,41,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (368,7,42,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (369,7,43,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (370,7,44,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (371,7,45,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (372,7,46,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (373,7,47,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (374,7,48,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (375,7,49,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (376,7,50,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (377,7,51,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (378,7,52,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (379,7,53,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (380,7,54,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (381,7,55,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (382,7,61,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (383,7,63,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (384,7,67,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (385,7,68,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (386,7,69,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (387,7,70,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (388,7,71,0,8,1486653339,8,1486653339);
insert  into `smk3_detail`(`id`,`smk3_id`,`smk3_criteria_id`,`sdtl_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (389,7,72,0,8,1486653339,8,1486653339);

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

insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,14,'awdadad',8,1486551819,8,1486551819);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,15,'asdfasdasfasdasf',8,1486551916,8,1486551916);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,15,'asdasdasdasf',8,1486551916,8,1486551916);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,16,'sadawdasdwad',8,1486552144,8,1486552144);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,16,'asdadadwad',8,1486552145,8,1486552145);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,16,'asdasdwad',8,1486552145,8,1486552145);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,16,'asdawdasdadwa',8,1486552145,8,1486552145);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,17,'asdawad',8,1486552301,8,1486552301);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,17,'asdawdsa',8,1486552301,8,1486552301);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,18,'dwadzxdzdad',8,1486552355,8,1486552355);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,18,'asdasdawdasdwada',8,1486552356,8,1486552356);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (26,18,'asdasdawd',8,1486552356,8,1486552356);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (32,24,'asdadw',8,1486565158,8,1486565158);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,26,'asdwadsdw',8,1486640348,8,1486640348);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,28,'asdawd',8,1486641950,8,1486641950);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (38,28,'asdwadsd',8,1486641951,8,1486641951);

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

insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'Judul',8,1486470338,8,1486470338);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,'wadawda',8,1486551819,8,1486551819);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,'Jududul',8,1486551915,8,1486551915);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,'adsadwad',8,1486552144,8,1486552144);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,'adsadawda',8,1486552299,8,1486552299);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,'awdasdawdasda',8,1486552355,8,1486552355);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,'adwad',8,1486565158,8,1486565158);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,'judul',8,1486635593,8,1486635593);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (26,'awdasdw',8,1486640348,8,1486640348);
insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (28,'wdadsd',8,1486641950,8,1486641950);

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

insert  into `user`(`id`,`employee_id`,`branch_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (5,1,1,'tonny','HnE4y57oGqEFngtxia6M2Ka4W7gr2Ax0','$2y$13$3yKtjoQ/g9P89Hbc1NaFEO/GJsaE/LzikTjNIQO1LjAoKzVA1.pLm',NULL,'N',1457708718,1464334126,0,8);
insert  into `user`(`id`,`employee_id`,`branch_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (6,3,1,'operator','imp4KzVp08MKpkph_ivwMsDa3OqR5xh3','$2y$13$tP8vFkjUG3AuR/LWurDadOdoQAEeos8Ejmy.tLFgBYPrSOdD7NPuy','f90Xwcim-PpzNatj9Zs5pNt3m9dUG9xF_1463481747','Y',1461898938,1463481747,5,6);
insert  into `user`(`id`,`employee_id`,`branch_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (7,2,1,'supervisor','6pVYuEE-QBqQq6fGdQVBRFPGXCRyhKLP','$2y$13$MY4HcQ49hNgLzx16opFDiOOrq7eFQm2YcmG.IJZejZ77.w7zaJiPa','OWs1FsilmTVmgnBujy9C_mQqPrux_WFU_1461898973','Y',1461898973,1461899028,5,5);
insert  into `user`(`id`,`employee_id`,`branch_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (8,1,1,'admin','NcRenGFqHJe153TpBrn-U_gLgiSbjT7d','$2y$13$u87MDBat2c0Q4XUiqrfpF.ADeSRhOl/QsUgo7bUR.wDnbLd6e2XeG','7fIIHhXUSFXyoEAGotFFzYemYPbwL82j_1464333703','Y',1464333703,1480133297,5,8);
insert  into `user`(`id`,`employee_id`,`branch_id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (12,6,1,'jokotest','M8f3j8YeCuBS7-63Wm8AznhCGK7e-Jjm','$2y$13$l9dA261SwUyWmrhZt0EtkuzBV/9p5OJhpjvl/.2KoLUFNwBjB2QCq','V73MFf6J4YiAGXZncxyQiHZRe_YqO1pi_1467276749','Y',1467276749,1480133435,8,12);

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

insert  into `user_sector`(`id`,`user_id`,`sector_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,12,4,8,1480131607,8,1480131607);
insert  into `user_sector`(`id`,`user_id`,`sector_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,12,2,8,1480131607,8,1480131607);

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

insert  into `working_plan`(`id`,`form_type_code`,`sector_id`,`wp_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'K3',4,'2017',8,1484970609,8,1485323406);
insert  into `working_plan`(`id`,`form_type_code`,`sector_id`,`wp_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'LH',7,'2014',8,1486740207,8,1486740207);
insert  into `working_plan`(`id`,`form_type_code`,`sector_id`,`wp_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'LH',7,'1231',8,1486839310,8,1486839310);

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

insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'PHDR','KESELAMATAN DAN KESEHATAN KERJA',NULL,8,1484375544,8,1484375544);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'PSHDR','A. Peningkatan Kapabilitas SDM - K3',NULL,8,1484375573,8,1484375573);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'PITEM','Penyusunan Roadmap Training K3',NULL,8,1484375971,8,1484375971);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'PITEM','Sosialisasi Roadmap Training K3',NULL,8,1484543457,8,1484543457);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'PHDR','LINGKUNGAN',NULL,8,1484797156,8,1484797156);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'PSHDR','B. Pengembangan Sistem - K3',NULL,8,1484797207,8,1484797207);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,'PSHDR','C. Pembangunan Sarana/ Fasilitas - K3',NULL,8,1484797246,8,1484797246);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,'PSHDR','D. Pengendalian dan Peningkatan - K3',NULL,8,1484797269,8,1484797269);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,'PSHDR','E. Pemantauan dan Pengukuran - K3',NULL,8,1484797288,8,1484797288);
insert  into `working_plan_attribute`(`id`,`attr_type_code`,`attr_text`,`attr_parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,'PITEM','Pelatihan K3 Manajemen',NULL,8,1485313423,8,1485313423);

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

insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,3,'R','lokasi 1','hendra',0,8,1484970609,8,1485315493);
insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,4,'R','lokasi 2','anton',1,8,1484970609,8,1484970609);
insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,1,10,'NR','KI','Dedy',2,8,1485315493,8,1485315493);
insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,3,3,'R','12312','124123',0,8,1486839310,8,1486839310);

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

insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (84,1,1,1,3,8,1485323406,8,1485323406);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (85,1,1,2,4,8,1485323406,8,1485323406);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (86,2,1,2,4,8,1485323406,8,1485323406);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (87,6,1,2,4,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (88,6,3,2,1,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (89,6,3,3,1,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (90,6,3,4,1,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (91,6,4,1,2,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (92,6,4,2,2,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (93,6,4,3,3,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (94,6,5,1,2,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (95,6,10,2,1,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (96,6,10,3,1,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (97,6,10,4,1,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (98,6,11,1,2,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (99,6,11,2,2,8,1485323407,8,1485323407);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (100,6,11,3,3,8,1485323407,8,1485323407);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
