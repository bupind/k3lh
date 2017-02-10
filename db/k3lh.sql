/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `attachment` */

insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'1485318881_eTicket_GNLREQ.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'1485318881_eTicket_DVWQIV_165908.pdf',NULL,'pdf','WORKPLAN',8,1485318881,8,1485318881);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'1486485061_D3JEUY.pdf',NULL,'pdf','MAT_LEV',8,1486485061,8,1486485061);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'1486485061_AirAsia___Pembelian___Beli_tiket_penerbangan_murah_secara_online.pdf',NULL,'pdf','MAT_LEV',8,1486485061,8,1486485061);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,'1486531756_B8C8QJ.pdf',NULL,'pdf','WORKPLAN',8,1486531756,8,1486531756);
insert  into `attachment`(`id`,`atf_filename`,`atf_filesize`,`atf_filetype`,`atf_location`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,'1486532961_B8C8QJ.pdf',NULL,'pdf','MAT_LEV',8,1486532961,8,1486532961);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `attachment_owner` */

insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,1,'WORKPLAN',1,8,1485318881,8,1485318881);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,3,'WORKPLAN',6,8,1485318881,8,1485318881);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,4,'MAT_LEV',23,8,1486485061,8,1486485061);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,5,'MAT_LEV',25,8,1486485061,8,1486485061);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,8,'WORKPLAN',2,8,1486531756,8,1486531756);
insert  into `attachment_owner`(`id`,`attachment_id`,`atfo_module_code`,`atfo_module_pk`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,12,'MAT_LEV',3,8,1486532961,8,1486532961);

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

insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-create');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-detail-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-index');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-realization');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-update');
insert  into `auth_item_child`(`parent`,`child`) values ('monitoring-anggaran','budget-monitoring-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','codeset');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-create');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-index');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-update');
insert  into `auth_item_child`(`parent`,`child`) values ('codeset','codeset-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','log');
insert  into `auth_item_child`(`parent`,`child`) values ('log','log-dirty-delete-all');
insert  into `auth_item_child`(`parent`,`child`) values ('log','log-dirty-index');
insert  into `auth_item_child`(`parent`,`child`) values ('log','login-history-delete-all');
insert  into `auth_item_child`(`parent`,`child`) values ('log','login-history-index');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','maturity-level');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-create');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-index');
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
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-update');
insert  into `auth_item_child`(`parent`,`child`) values ('maturity-level','maturity-level-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','monitoring-anggaran');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pembangkit-listrik');
insert  into `auth_item_child`(`parent`,`child`) values ('Operator','pembangkit-listrik');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pengguna');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','pertanyaan-maturity-level');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-ajax-plant');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-index');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pembangkit-listrik','power-plant-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','profil-pengguna');
insert  into `auth_item_child`(`parent`,`child`) values ('Operator','profil-pengguna');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','profil-perusahaan');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-create');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-index');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-update');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-perusahaan','profile-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','rencana-kerja');
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
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','roadmap-k3l-kitsbs');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-target-ajax-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-update');
insert  into `auth_item_child`(`parent`,`child`) values ('roadmap-k3l-kitsbs','roadmap-k3l-view');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-create');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-index');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-update');
insert  into `auth_item_child`(`parent`,`child`) values ('sektor','sector-view');
insert  into `auth_item_child`(`parent`,`child`) values ('Administrator','sektor');
insert  into `auth_item_child`(`parent`,`child`) values ('Operator','sektor');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-create');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-delete');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-index');
insert  into `auth_item_child`(`parent`,`child`) values ('profil-pengguna','user-profile-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-update');
insert  into `auth_item_child`(`parent`,`child`) values ('pengguna','user-view');
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
insert  into `budget_monitoring`(`id`,`form_type_code`,`sector_id`,`power_plant_id`,`k3l_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'LH',4,1,'2017',8,1486035723,8,1486035723);
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

insert  into `budget_monitoring_detail`(`id`,`budget_monitoring_id`,`bmd_no_prk`,`bmd_program`,`bmd_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'asdf','asdf',11,8,1486035644,8,1486035644);
insert  into `budget_monitoring_detail`(`id`,`budget_monitoring_id`,`bmd_no_prk`,`bmd_program`,`bmd_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,2,'asdf','asdf',110000,8,1486035724,8,1486035724);
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

insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,2,11,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,3,11,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,1,4,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,1,5,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,6,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,1,7,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,1,8,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,1,9,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,1,10,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,1,11,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,1,12,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,1,13,NULL,NULL,8,1486035644,8,1486035644);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,2,2,110000,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,2,3,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,2,4,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,2,5,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,2,6,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,2,7,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,2,8,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,2,9,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,2,10,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,2,11,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,2,12,NULL,NULL,8,1486035724,8,1486035724);
insert  into `budget_monitoring_month`(`id`,`budget_monitoring_detail_id`,`bmv_month`,`bmv_plan_value`,`bmv_realization_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,2,13,NULL,NULL,8,1486035724,8,1486035724);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

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
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (18,'UNIT_CODE','BH','Buah','Buah','',NULL,1486366163,1486366163,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (19,'UNIT_CODE','KL','Kali','Kali','',NULL,1486366179,1486366179,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (20,'UNIT_CODE','RP','Rupiah','Rupiah','',NULL,1486366191,1486366191,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (21,'UNIT_CODE','UIP','Unit Induk & Pelaksana','Unit Induk & Pelaksana','',NULL,1486366211,1486366211,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (22,'UNIT_CODE','UP','Unit Pelaksana','Unit Pelaksana','',NULL,1486366227,1486366227,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (23,'UNIT_CODE','UNT','Unit','Unit','',NULL,1486366242,1486366242,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (24,'UNIT_CODE','PCT','%','%','',NULL,1486366270,1486366270,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (25,'UNIT_CODE','TMN','Temuan','Temuan','',NULL,1486366285,1486366285,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (26,'UNIT_CODE','TTK','Titik','Titik','',NULL,1486366300,1486366300,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (27,'UNIT_CODE','BLN','Bulan','Bulan','',NULL,1486366314,1486366314,8,8);
insert  into `codeset`(`id`,`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (28,'UNIT_CODE','LPRN','Laporan','Laporan','',NULL,1486366325,1486366325,8,8);

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
) ENGINE=InnoDB AUTO_INCREMENT=928 DEFAULT CHARSET=latin1;

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
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (678,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #15',8,1486308433,8,1486308433);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (679,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #16',8,1486308455,8,1486308455);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (680,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #17',8,1486308469,8,1486308469);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (681,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #18',8,1486366163,8,1486366163);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (682,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #19',8,1486366179,8,1486366179);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (683,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #20',8,1486366192,8,1486366192);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (684,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #21',8,1486366211,8,1486366211);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (685,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #22',8,1486366227,8,1486366227);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (686,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #23',8,1486366242,8,1486366242);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (687,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #24',8,1486366271,8,1486366271);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (688,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #25',8,1486366285,8,1486366285);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (689,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #26',8,1486366300,8,1486366300);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (690,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #27',8,1486366314,8,1486366314);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (691,'SUCCESS','codeset','INSERTING NEW DATA WITH ID #28',8,1486366325,8,1486366325);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (692,'SUCCESS','maturity_level_title','INSERTING NEW DATA WITH ID #1',8,1486371354,8,1486371354);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (693,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #1',8,1486372863,8,1486372863);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (694,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #2',8,1486373299,8,1486373299);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (695,'SUCCESS','maturity_level_question','UPDATING DATA ID #1',8,1486374550,8,1486374550);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (696,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #19',8,1486374551,8,1486374551);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (697,'SUCCESS','maturity_level_question','UPDATING DATA ID #1',8,1486374568,8,1486374568);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (698,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #20',8,1486374568,8,1486374568);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (699,'SUCCESS','maturity_level_title','INSERTING NEW DATA WITH ID #2',8,1486374660,8,1486374660);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (700,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #3',8,1486374732,8,1486374732);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (701,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #4',8,1486374856,8,1486374856);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (702,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #5',8,1486375089,8,1486375089);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (703,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #6',8,1486401206,8,1486401206);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (704,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #7',8,1486401262,8,1486401262);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (705,'SUCCESS','maturity_level_title','INSERTING NEW DATA WITH ID #3',8,1486401278,8,1486401278);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (706,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #8',8,1486401560,8,1486401560);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (707,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #9',8,1486401811,8,1486401811);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (708,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #10',8,1486401883,8,1486401883);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (709,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #11',8,1486401943,8,1486401943);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (710,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #12',8,1486402015,8,1486402015);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (711,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #13',8,1486402073,8,1486402073);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (712,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #14',8,1486402112,8,1486402112);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (713,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #15',8,1486402162,8,1486402162);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (714,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #16',8,1486402202,8,1486402202);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (715,'SUCCESS','maturity_level_title','INSERTING NEW DATA WITH ID #4',8,1486402218,8,1486402218);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (716,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #17',8,1486402260,8,1486402260);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (717,'SUCCESS','maturity_level_title','INSERTING NEW DATA WITH ID #5',8,1486402274,8,1486402274);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (718,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #18',8,1486402297,8,1486402297);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (719,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #19',8,1486402335,8,1486402335);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (720,'SUCCESS','maturity_level_question','INSERTING NEW DATA WITH ID #20',8,1486402369,8,1486402369);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (721,'SUCCESS','maturity_level_title','INSERTING NEW DATA WITH ID #6',8,1486457047,8,1486457047);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (722,'SUCCESS','maturity_level_title','UPDATING DATA ID #6',8,1486457260,8,1486457260);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (723,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #21',8,1486457260,8,1486457260);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (724,'SUCCESS','maturity_level_title','DELETING DATA ID #6',8,1486457267,8,1486457267);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (725,'SUCCESS','smk3_title','INSERTING NEW DATA WITH ID #1',8,1486478121,8,1486478121);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (726,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #1',8,1486478121,8,1486478121);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (727,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #1',8,1486478121,8,1486478121);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (728,'SUCCESS','smk3_subtitle','INSERTING NEW DATA WITH ID #2',8,1486478121,8,1486478121);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (729,'SUCCESS','smk3_criteria','INSERTING NEW DATA WITH ID #2',8,1486478121,8,1486478121);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (735,'SUCCESS','maturity_level','INSERTING NEW DATA WITH ID #6',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (736,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #1',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (737,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #2',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (738,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #3',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (739,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #4',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (740,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #5',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (741,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #6',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (742,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #7',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (743,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #8',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (744,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #9',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (745,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #10',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (746,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #11',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (747,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #12',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (748,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #13',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (749,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #14',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (750,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #15',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (751,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #16',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (752,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #17',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (753,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #18',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (754,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #19',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (755,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #20',8,1486484967,8,1486484967);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (756,'SUCCESS','maturity_level','UPDATING DATA ID #6',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (757,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #21',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (758,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #22',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (759,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #23',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (760,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #4',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (761,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #10',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (762,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #24',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (763,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #25',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (764,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #5',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (765,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #11',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (766,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #26',8,1486485061,8,1486485061);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (767,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #27',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (768,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #28',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (769,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #29',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (770,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #30',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (771,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #31',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (772,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #32',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (773,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #33',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (774,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #34',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (775,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #35',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (776,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #36',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (777,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #37',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (778,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #38',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (779,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #39',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (780,'SUCCESS','maturity_level_detail','INSERTING NEW DATA WITH ID #40',8,1486485062,8,1486485062);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (781,'SUCCESS','maturity_level','UPDATING DATA ID #6',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (782,'SUCCESS','maturity_level_detail','UPDATING DATA ID #1',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (783,'SUCCESS','maturity_level_detail','UPDATING DATA ID #2',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (784,'SUCCESS','log_dirty','INSERTING NEW DATA WITH ID #22',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (785,'SUCCESS','maturity_level_detail','UPDATING DATA ID #3',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (786,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #6',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (787,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #12',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (788,'SUCCESS','maturity_level_detail','UPDATING DATA ID #4',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (789,'SUCCESS','maturity_level_detail','UPDATING DATA ID #5',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (790,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #7',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (791,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #13',8,1486485195,8,1486485195);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (792,'SUCCESS','maturity_level_detail','UPDATING DATA ID #6',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (793,'SUCCESS','maturity_level_detail','UPDATING DATA ID #7',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (794,'SUCCESS','maturity_level_detail','UPDATING DATA ID #8',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (795,'SUCCESS','maturity_level_detail','UPDATING DATA ID #9',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (796,'SUCCESS','maturity_level_detail','UPDATING DATA ID #10',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (797,'SUCCESS','maturity_level_detail','UPDATING DATA ID #11',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (798,'SUCCESS','maturity_level_detail','UPDATING DATA ID #12',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (799,'SUCCESS','maturity_level_detail','UPDATING DATA ID #13',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (800,'SUCCESS','maturity_level_detail','UPDATING DATA ID #14',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (801,'SUCCESS','maturity_level_detail','UPDATING DATA ID #15',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (802,'SUCCESS','maturity_level_detail','UPDATING DATA ID #16',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (803,'SUCCESS','maturity_level_detail','UPDATING DATA ID #17',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (804,'SUCCESS','maturity_level_detail','UPDATING DATA ID #18',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (805,'SUCCESS','maturity_level_detail','UPDATING DATA ID #19',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (806,'SUCCESS','maturity_level_detail','UPDATING DATA ID #20',8,1486485196,8,1486485196);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (807,'SUCCESS','attachment','DELETING DATA ID #6',8,1486531422,8,1486531422);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (808,'SUCCESS','attachment','DELETING DATA ID #7',8,1486531572,8,1486531572);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (809,'SUCCESS','attachment','DELETING DATA ID #2',8,1486531725,8,1486531725);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (810,'SUCCESS','working_plan','UPDATING DATA ID #1',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (811,'SUCCESS','working_plan_detail','UPDATING DATA ID #1',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (812,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #101',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (813,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #102',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (814,'SUCCESS','working_plan_detail','UPDATING DATA ID #2',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (815,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #8',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (816,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #14',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (817,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #103',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (818,'SUCCESS','working_plan_detail','UPDATING DATA ID #6',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (819,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #104',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (820,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #105',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (821,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #106',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (822,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #107',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (823,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #108',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (824,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #109',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (825,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #110',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (826,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #111',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (827,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #112',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (828,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #113',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (829,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #114',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (830,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #115',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (831,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #116',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (832,'SUCCESS','working_plan_month','INSERTING NEW DATA WITH ID #117',8,1486531756,8,1486531756);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (833,'SUCCESS','maturity_level','UPDATING DATA ID #6',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (834,'SUCCESS','maturity_level_detail','UPDATING DATA ID #1',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (835,'SUCCESS','maturity_level_detail','UPDATING DATA ID #2',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (836,'SUCCESS','maturity_level_detail','UPDATING DATA ID #3',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (837,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #9',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (838,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #15',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (839,'SUCCESS','maturity_level_detail','UPDATING DATA ID #4',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (840,'SUCCESS','maturity_level_detail','UPDATING DATA ID #5',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (841,'SUCCESS','maturity_level_detail','UPDATING DATA ID #6',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (842,'SUCCESS','maturity_level_detail','UPDATING DATA ID #7',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (843,'SUCCESS','maturity_level_detail','UPDATING DATA ID #8',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (844,'SUCCESS','maturity_level_detail','UPDATING DATA ID #9',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (845,'SUCCESS','maturity_level_detail','UPDATING DATA ID #10',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (846,'SUCCESS','maturity_level_detail','UPDATING DATA ID #11',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (847,'SUCCESS','maturity_level_detail','UPDATING DATA ID #12',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (848,'SUCCESS','maturity_level_detail','UPDATING DATA ID #13',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (849,'SUCCESS','maturity_level_detail','UPDATING DATA ID #14',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (850,'SUCCESS','maturity_level_detail','UPDATING DATA ID #15',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (851,'SUCCESS','maturity_level_detail','UPDATING DATA ID #16',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (852,'SUCCESS','maturity_level_detail','UPDATING DATA ID #17',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (853,'SUCCESS','maturity_level_detail','UPDATING DATA ID #18',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (854,'SUCCESS','maturity_level_detail','UPDATING DATA ID #19',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (855,'SUCCESS','maturity_level_detail','UPDATING DATA ID #20',8,1486531800,8,1486531800);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (856,'SUCCESS','attachment','DELETING DATA ID #9',8,1486531817,8,1486531817);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (857,'SUCCESS','maturity_level','UPDATING DATA ID #6',8,1486531835,8,1486531835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (858,'SUCCESS','maturity_level_detail','UPDATING DATA ID #1',8,1486531835,8,1486531835);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (859,'SUCCESS','maturity_level_detail','UPDATING DATA ID #2',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (860,'SUCCESS','maturity_level_detail','UPDATING DATA ID #3',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (861,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #10',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (862,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #16',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (863,'SUCCESS','maturity_level_detail','UPDATING DATA ID #4',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (864,'SUCCESS','maturity_level_detail','UPDATING DATA ID #5',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (865,'SUCCESS','maturity_level_detail','UPDATING DATA ID #6',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (866,'SUCCESS','maturity_level_detail','UPDATING DATA ID #7',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (867,'SUCCESS','maturity_level_detail','UPDATING DATA ID #8',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (868,'SUCCESS','maturity_level_detail','UPDATING DATA ID #9',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (869,'SUCCESS','maturity_level_detail','UPDATING DATA ID #10',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (870,'SUCCESS','maturity_level_detail','UPDATING DATA ID #11',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (871,'SUCCESS','maturity_level_detail','UPDATING DATA ID #12',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (872,'SUCCESS','maturity_level_detail','UPDATING DATA ID #13',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (873,'SUCCESS','maturity_level_detail','UPDATING DATA ID #14',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (874,'SUCCESS','maturity_level_detail','UPDATING DATA ID #15',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (875,'SUCCESS','maturity_level_detail','UPDATING DATA ID #16',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (876,'SUCCESS','maturity_level_detail','UPDATING DATA ID #17',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (877,'SUCCESS','maturity_level_detail','UPDATING DATA ID #18',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (878,'SUCCESS','maturity_level_detail','UPDATING DATA ID #19',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (879,'SUCCESS','maturity_level_detail','UPDATING DATA ID #20',8,1486531836,8,1486531836);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (880,'SUCCESS','attachment','DELETING DATA ID #10',8,1486532872,8,1486532872);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (881,'SUCCESS','maturity_level','UPDATING DATA ID #6',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (882,'SUCCESS','maturity_level_detail','UPDATING DATA ID #1',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (883,'SUCCESS','maturity_level_detail','UPDATING DATA ID #2',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (884,'SUCCESS','maturity_level_detail','UPDATING DATA ID #3',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (885,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #11',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (886,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #17',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (887,'SUCCESS','maturity_level_detail','UPDATING DATA ID #4',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (888,'SUCCESS','maturity_level_detail','UPDATING DATA ID #5',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (889,'SUCCESS','maturity_level_detail','UPDATING DATA ID #6',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (890,'SUCCESS','maturity_level_detail','UPDATING DATA ID #7',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (891,'SUCCESS','maturity_level_detail','UPDATING DATA ID #8',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (892,'SUCCESS','maturity_level_detail','UPDATING DATA ID #9',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (893,'SUCCESS','maturity_level_detail','UPDATING DATA ID #10',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (894,'SUCCESS','maturity_level_detail','UPDATING DATA ID #11',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (895,'SUCCESS','maturity_level_detail','UPDATING DATA ID #12',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (896,'SUCCESS','maturity_level_detail','UPDATING DATA ID #13',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (897,'SUCCESS','maturity_level_detail','UPDATING DATA ID #14',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (898,'SUCCESS','maturity_level_detail','UPDATING DATA ID #15',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (899,'SUCCESS','maturity_level_detail','UPDATING DATA ID #16',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (900,'SUCCESS','maturity_level_detail','UPDATING DATA ID #17',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (901,'SUCCESS','maturity_level_detail','UPDATING DATA ID #18',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (902,'SUCCESS','maturity_level_detail','UPDATING DATA ID #19',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (903,'SUCCESS','maturity_level_detail','UPDATING DATA ID #20',8,1486532925,8,1486532925);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (904,'SUCCESS','attachment','DELETING DATA ID #11',8,1486532942,8,1486532942);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (905,'SUCCESS','maturity_level','UPDATING DATA ID #6',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (906,'SUCCESS','maturity_level_detail','UPDATING DATA ID #1',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (907,'SUCCESS','maturity_level_detail','UPDATING DATA ID #2',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (908,'SUCCESS','maturity_level_detail','UPDATING DATA ID #3',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (909,'SUCCESS','attachment','INSERTING NEW DATA WITH ID #12',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (910,'SUCCESS','attachment_owner','INSERTING NEW DATA WITH ID #18',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (911,'SUCCESS','maturity_level_detail','UPDATING DATA ID #4',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (912,'SUCCESS','maturity_level_detail','UPDATING DATA ID #5',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (913,'SUCCESS','maturity_level_detail','UPDATING DATA ID #6',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (914,'SUCCESS','maturity_level_detail','UPDATING DATA ID #7',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (915,'SUCCESS','maturity_level_detail','UPDATING DATA ID #8',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (916,'SUCCESS','maturity_level_detail','UPDATING DATA ID #9',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (917,'SUCCESS','maturity_level_detail','UPDATING DATA ID #10',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (918,'SUCCESS','maturity_level_detail','UPDATING DATA ID #11',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (919,'SUCCESS','maturity_level_detail','UPDATING DATA ID #12',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (920,'SUCCESS','maturity_level_detail','UPDATING DATA ID #13',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (921,'SUCCESS','maturity_level_detail','UPDATING DATA ID #14',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (922,'SUCCESS','maturity_level_detail','UPDATING DATA ID #15',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (923,'SUCCESS','maturity_level_detail','UPDATING DATA ID #16',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (924,'SUCCESS','maturity_level_detail','UPDATING DATA ID #17',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (925,'SUCCESS','maturity_level_detail','UPDATING DATA ID #18',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (926,'SUCCESS','maturity_level_detail','UPDATING DATA ID #19',8,1486532961,8,1486532961);
insert  into `log`(`id`,`type`,`table_name`,`action`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (927,'SUCCESS','maturity_level_detail','UPDATING DATA ID #20',8,1486532961,8,1486532961);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,1,'maturity-level-question','MaturityLevelQuestion','Satuan','BH','KL',8,1486374551,8,1486374551);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,1,'maturity-level-question','MaturityLevelQuestion','Satuan','KL','BH',8,1486374568,8,1486374568);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,6,'maturity-level-title','MaturityLevelTitle','Judul','YRDY','YRDYGFDGDFG',8,1486457260,8,1486457260);
insert  into `log_dirty`(`id`,`data_id`,`controller`,`model`,`label`,`original_value`,`changed_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,2,'maturity-level','MaturityLevelDetail','Realisasi','2000.00','2500',8,1486485195,8,1486485195);

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

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
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (62,8,NULL,NULL,'LOGOUT','::1',1486044319,1486044319);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (63,8,NULL,NULL,'LOGIN SUCCESS','::1',1486096134,1486096134);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (64,8,NULL,NULL,'LOGOUT','::1',1486097163,1486097163);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (65,8,NULL,NULL,'LOGIN SUCCESS','::1',1486305525,1486305525);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (66,8,NULL,NULL,'LOGOUT','::1',1486402415,1486402415);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (67,8,NULL,NULL,'LOGIN SUCCESS','::1',1486456169,1486456169);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (68,8,NULL,NULL,'LOGOUT','::1',1486486775,1486486775);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (69,8,NULL,NULL,'LOGIN SUCCESS','::1',1486529313,1486529313);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (70,8,NULL,NULL,'LOGOUT','::1',1486541317,1486541317);
insert  into `login_history`(`id`,`user_id`,`username`,`password`,`remark`,`ip_address`,`created_at`,`updated_at`) values (71,8,NULL,NULL,'LOGIN SUCCESS','::1',1486635934,1486635934);

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

insert  into `maturity_level`(`id`,`sector_id`,`mlvl_quarter`,`mlvl_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,4,'IV',2016,8,1486484967,8,1486532961);

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

insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,6,1,'11.00','11.00',8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,6,2,'1500.00','2500.00',8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,6,3,'68.00','50.00',8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,6,4,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,6,5,'4.00','4.00',8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,6,6,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,6,7,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,6,8,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,6,9,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,6,10,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,6,11,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,6,12,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,6,13,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,6,14,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,6,15,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,6,16,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,6,17,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,6,18,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,6,19,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,6,20,NULL,NULL,8,1486484967,8,1486532961);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,6,1,'11.00','11.00',8,1486485061,8,1486485061);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,6,2,'1500.00','2000.00',8,1486485061,8,1486485061);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,6,3,'68.00','50.00',8,1486485061,8,1486485061);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,6,4,NULL,NULL,8,1486485061,8,1486485061);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,6,5,'4.00','4.00',8,1486485061,8,1486485061);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (26,6,6,NULL,NULL,8,1486485061,8,1486485061);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (27,6,7,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (28,6,8,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (29,6,9,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (30,6,10,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (31,6,11,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (32,6,12,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (33,6,13,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (34,6,14,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,6,15,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (36,6,16,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,6,17,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (38,6,18,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (39,6,19,NULL,NULL,8,1486485062,8,1486485062);
insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,6,20,NULL,NULL,8,1486485062,8,1486485062);

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

insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'<p>Pimpinan unit membuat Komitmen dan kebijakan K2/K3 &amp; Keamanan</p>','<ul><li>Komitmen dan kebijakan K2/K3 &amp; Kemanan dibuat, ditandatangani untuk seluruh Unit Induk dan Unit Pelaksana.</li><li>Komitmen dan kebijakan K2/K3 &amp; Keamanan disosialisasikan ke seluruh tenaga kerja di unitnya.</li></ul>','BH','1.50',8,1486372863,8,1486374568);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,'<p>Menyusun RKAP bidang K2/K3 &amp; Keamanan di unit induk yang mencakup program kerja di unit pelaksana.</p>','<p>Program kerja dan Anggaran bidang K2/K3 &amp; Keamanan Unit Induk dan Unit Pelaksana tertuang dalam RKAP per semester</p>','RP','10.00',8,1486373299,8,1486373299);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,2,'<p>Manajemen Unit Induk dan unit pelaksana wajib mengikuti pelatihan K2/K3</p>','<ul><li>Peserta :<br>Unit Induk : General Manager &amp; Manajer Bidang<br>Unit Pelaksana : Manajer Area/yang setingkat,  dan Asman/ yang setingkat.</li><li>Target pelatihan peserta adalah 1 (satu) kali per semester</li></ul>','BH','3.00',8,1486374732,8,1486374732);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,2,'<p>Melakukan sertifikasi SMK3 (Sistem Manajemen K3) untuk unit induk &amp; unit pelaksana</p>','<ul><li>Mendapatkan sertifikasi SMK3 untuk Unit induk.</li><li>dan  seluruh unit pelaksana. Apabila Unit Induk dan Unit Pelaksana dilakukan sertifikasi secara terpadu, maka</li><li>Unit Induk mendapatkan sertifikat SMK3 terpadu<br>Target sertifikasi :<br>Semester 1 : 70% unit sudah sertifikasi SMK3<br>Semester 2 : 100% unit sudah sertifikasi SMK3</li></ul>','UIP','8.00',8,1486374856,8,1486374856);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,2,'<p>Melakukan sertifikasi SMP (Sistem Manajemen Pengamanan ) untuk aset yang termasuk dalam Obyek Vital / Obyek Vital Nasional (Obvit / Obvitnas) di Unitnya</p>','<p>Mendapatkan sertifikasi SMP untuk aset Obvitnas di Unitnya<br>Target :<br>- Selesai sertifikasi SMP (100%)<br>- Proses set up SMP (50%)<br>- Tidak ada progres set up SMP (0%)</p>','UP','7.00',8,1486375089,8,1486375089);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,2,'<p>Melakukan sertifikasi kompetensi bagi pengawas dan pelaksana pekerjaan </p>','<ul><li>Pengawas pekerjaan dan Pelaksana Pekerjaan di Unit Induk (UI) , Unit Pelaksana (UP) dan Sub Unit Pelaksana (SUP) memiliki sertifikasi kompetensi</li><li>Target sertifikasi :<br>- UP : 3 Pengawas dan 6 Pelaksan. </li></ul>','BH','3.00',8,1486401206,8,1486401206);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,2,'<p>Sertifikasi Laik Operasi (SLO) pada Intalasi Ketenagalistrikan<br>(Pembangkit, Transmisi, Distribusi )</p>','<ul><li>Instalasi Pembangkit, Transmisi dan Distribusi yang beroperasi wajib memiliki sertifikat SLO</li><li>Target SLO Instalasi per Semester :<br>- Pembangkit : Semua instalasi wajib ber-SLO</li></ul>','UNT','10.00',8,1486401262,8,1486401262);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,3,'<p>Melakukan Sosialisasi K2/K3 &amp; Keamanan kepada seluruh pegawai dan mitra kerja (vendor) di setiap unit induk dan unit pelaksana </p>','<ul><li>Jumlah pelaksanaan sosialisasi K2/K3 dan keamanan di Induk dan di Unit Pelaksana, termasuk mitra kerja (vendor)</li><li>Target : sosialisasi dilakukan minimal 1 (satu) kali per triwulan, baik di Induk maupun di Unit Pelaksana.</li></ul>','KL','2.00',8,1486401560,8,1486401560);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (9,3,'<p>Melakukan Sosialisasi K2/K3 &amp; Keamanan kepada Masyarakat umum, Sekolah &amp; Instansi pemerintah di setiap unit induk dan unit pelaksana</p>','<ul><li>Jumlah pelaksanaan sosialisasi K2/K3 &amp; Keamanan di Induk dan di Unit Pelaksana.</li><li>Target : sosialisasi dilakukan minimal 1 (satu) kali per triwulan, baik di Induk maupun di Unit Pelaksana.</li></ul>','KL','2.00',8,1486401811,8,1486401811);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,3,'<p>Melakukan penilaian kinerja K2/K3 Mitra Kerja (vendor) terhadap aspek kompetensi teknik pengawas dan pelaksana pekerjaan, kompetensi pengawas K2/K3, ketersediaan SOP, peralatan kerja dan APD sesuai standard yang diwujudkan dalam bentuk Raport Triwulanan</p>','<ul><li>Jumlah pegawai mitra kerja yang memiliki sertifikat kompetensi teknik bagi pengawas dan pelaksana pekerjaan serta kompetensi pengawas K2/K3 (100% bila memadai seluruhnya; 50% bila sebagian tidak memadai)</li><li>Kelengkapan SOP, peralatan kerja dan APD sesuai standart pada setiap pelaksanaan pekerjaan yang berpotensi bahaya (100% bila lengkap dan sesuai standar; 50% bila tidak lengkap dan tidak sesuai standar)</li><li>Jumlah korban luka ringan, luka berat dan meninggal dunia akibat kecelakaan kerja (0% bila terjadi kecelakaan kerja)</li></ul>','PCT','10.00',8,1486401883,8,1486401883);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (11,3,'<p>Melakukan inspeksi instalasi ketenagalistrikan &amp; Keamanan pada instalasi yang berpotensi bahaya di Unit Induk dan seluruh Unit Pelaksana secara berkala</p>','<ul><li>Jumlah temuan dan tindaklanjut inspeksi dalam pelaksanaan inspeksi instalasi ketenagalistrikan dan keamanan di Unit Induk dan Unit Pelaksana per periode</li><li>Target seluruh Unit Pelaksana melakukan inspeksi instalasi ketenagalistrikan dan keamanan serta membuat daftar hasil temuan</li></ul>','TMN','5.00',8,1486401943,8,1486401943);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (12,3,'<p>Menyediakan Sistem proteksi kebakaran di unit induk, seluruh kantor unit pelaksana dan instalasi pembangkit terbesar dan/atau instalasi Gardu Induk (GI) terbesar serta melakukan simulasi minimal 1 (satu) kali dalam 1 (satu) semester.</p>','<ul><li>Sistem proteksi kebakaran minimal terpasang di Kantor unit induk, Kantor unit pelaksana dan instalasi Pembangkit terbesar dan/atau Instalasi GI terbesar di unit tersebut.</li><li>Target :<br>Semester 1 :<br>50 % unit sudah terpasang proteksi kebakaran<br>Semester 2 :<br>100% unit sudah terpasang proteksi kebakaran</li></ul>','PCT','10.00',8,1486402015,8,1486402015);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,3,'<p>Membuat visual management terkait informasi K3 yang selalu diupdate di unit induk dan seluruh unit pelaksana</p>','<ul><li>Visual management K3 terpasang di tempat yang strategis dan Update</li><li>Target : seluruh unit terpasang pada Semester 1</li></ul>','PCT','3.00',8,1486402073,8,1486402073);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,3,'Memasukan klausul K2/K3 pada dokumen pengadaan barang &amp; jasa dan memberikan penjelasan kepada kontraktor/mitra kerja','<p>Semua dokumen kontrak telah mencantumkan klausul K2/K3</p>','PCT','3.00',8,1486402111,8,1486402111);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,3,'<p>Melakukan pemeriksaan kesehatan bagi pegawai secara berkala</p>','<ul><li>Pemeriksaan kesehatan dilaksanakan secara berkala minimal 1x setiap tahun, bagi pegawai berusia &gt;40 tahun, operator pembangkit dan pekerja pada resiko tinggi.</li><li>Target :<br>Semester 1 : 45% dari pegawai yang berhak<br>Semester 2 : 100% dari pegawai yang berhak</li></ul>','KL','3.00',8,1486402162,8,1486402162);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,3,'General Manager melakukan inspeksi mendadak (SIDAK) K2/K3 &amp; KEAMANAN pada unit yang dipimpinnya.','<ul><li>SIDAK dilakukan oleh GM ke Unit Pelaksana/Unit Pembangkit/setingkat di unitnya.</li><li>Target : SIDAK dilakukan minimal 1(satu) kali per bulan atau 6 (enam) kali per semester</li></ul>','KL','5.00',8,1486402202,8,1486402202);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,4,'<p>Memasang rambu-rambu tanda bahaya dan/atau memasang kunci pengaman pada instalasi ketenagalistrikan yang berpotensi bahaya.</p>','<ul><li>Rambu-rambu tanda bahaya dan kunci pengaman terpasang pada instalasi ketenagalistrikan yang berpotensi bahaya di Unit Induk (UI) dan Unit Pelaksanan (UP)</li><li>Target Per semester :<br>- UP : memasang minimal 60 titik instalasi<br>- UI : memasang minimal 60 (enam puluh) titik x jumlah unit pelaksananya</li></ul>','TTK','5.00',8,1486402260,8,1486402260);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,5,'Membuat tabel rangkuman laporan kecelakaan dan laporan keamanan bulanan','<p>Tabel rangkuman laporan kecelakaan (baik Nihil maupun ada kecelakaan) dikirim paling lambat tanggal 10 bulan berikutnya</p>','BLN','2.00',8,1486402297,8,1486402297);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,5,'Membuat Laporan P2K3 di Unit Induk dan seluruh Unit Pelaksana','<p>Laporan P2K3 dilaporkan ke Disnaker setempat</p>','LPRN','2.00',8,1486402335,8,1486402335);
insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,5,'<p>Self asesmen kuisioner maturity dibuat dan dilaporkan sesuai dengan kondisi implementasi di lapangan</p>','<p>Hasil asesmen dibuat dengan akurat dan sesuai implementasi di lapangan</p>','PCT','4.00',8,1486402369,8,1486402369);

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

insert  into `maturity_level_title`(`id`,`title_text`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'KEPEMIMPINAN, KEBIJAKAN DAN KOMITMEN MANAJEMEN',8,1486371353,8,1486371353);
insert  into `maturity_level_title`(`id`,`title_text`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'SERTIFIKASI/DIKLAT',8,1486374660,8,1486374660);
insert  into `maturity_level_title`(`id`,`title_text`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'PEMANTAUAN IMPLEMENTASI K2/K3 & SISTEM PENGAMANAN',8,1486401278,8,1486401278);
insert  into `maturity_level_title`(`id`,`title_text`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,' PEMASANGAN RAMBU-RAMBU PERINGATAN TANDA BAHAYA',8,1486402218,8,1486402218);
insert  into `maturity_level_title`(`id`,`title_text`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'INTEGRITAS PELAPORAN',8,1486402274,8,1486402274);

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
  `smk3_semester` int(2) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_smk3_sector` (`sector_id`),
  KEY `FK_smk3_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_smk3_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_smk3_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `smk3` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_criteria` */

insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'kriteria 1',8,1486478121,8,1486478121);
insert  into `smk3_criteria`(`id`,`smk3_subtitle_id`,`sctr_criteria`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,2,'kriteria 2',8,1486478121,8,1486478121);

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
  KEY `FK_smk3_answer` (`smk3_id`),
  KEY `FK_smk3_answer_criteria` (`smk3_criteria_id`),
  CONSTRAINT `FK_smk3_answer` FOREIGN KEY (`smk3_id`) REFERENCES `smk3` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_smk3_answer_criteria` FOREIGN KEY (`smk3_criteria_id`) REFERENCES `smk3_criteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `smk3_detail` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_subtitle` */

insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'sub title 1',8,1486478121,8,1486478121);
insert  into `smk3_subtitle`(`id`,`smk3_title_id`,`ssub_subtitle`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,'sub title 2',8,1486478121,8,1486478121);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `smk3_title` */

insert  into `smk3_title`(`id`,`sttl_title`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'title 1',8,1486478121,8,1486478121);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan` */

insert  into `working_plan`(`id`,`form_type_code`,`sector_id`,`wp_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'K3',4,'2017',8,1484970609,8,1486531756);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan_detail` */

insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,3,'R','lokasi 1','hendra',0,8,1484970609,8,1485315493);
insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,4,'R','lokasi 2','anton',1,8,1484970609,8,1484970609);
insert  into `working_plan_detail`(`id`,`working_plan_id`,`working_plan_attribute_id`,`wpd_rnr`,`wpd_location`,`wpd_pic`,`wpd_order`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,1,10,'NR','KI','Dedy',2,8,1485315493,8,1485315493);

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `working_plan_month` */

insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (101,1,1,1,3,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (102,1,1,2,4,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (103,2,1,2,4,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (104,6,1,2,4,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (105,6,3,2,1,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (106,6,3,3,1,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (107,6,3,4,1,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (108,6,4,1,2,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (109,6,4,2,2,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (110,6,4,3,3,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (111,6,5,1,2,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (112,6,10,2,1,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (113,6,10,3,1,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (114,6,10,4,1,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (115,6,11,1,2,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (116,6,11,2,2,8,1486531756,8,1486531756);
insert  into `working_plan_month`(`id`,`working_plan_detail_id`,`wpm_month`,`wpm_week`,`wpm_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (117,6,11,3,3,8,1486531756,8,1486531756);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
