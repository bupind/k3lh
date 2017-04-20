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

USE `k3lh`;

/*Table structure for table `environment_permit` */

DROP TABLE IF EXISTS `environment_permit`;

CREATE TABLE `environment_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `ep_year` int(4) NOT NULL,
  `ep_quarter` varchar(2) NOT NULL,
  `ep_district` varchar(50) NOT NULL,
  `ep_province` varchar(50) NOT NULL,
  `ep_env_ministry` varchar(50) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_environment_permit_sector` (`sector_id`),
  KEY `FK_environment_permit_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_environment_permit_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_environment_permit_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit` */

insert  into `environment_permit`(`id`,`sector_id`,`power_plant_id`,`ep_year`,`ep_quarter`,`ep_district`,`ep_province`,`ep_env_ministry`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,2,4,1231,'IV','Jambi','Jambi','Saya',8,1492675121,8,1492675121);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `environment_permit_detail` */

insert  into `environment_permit_detail`(`id`,`environment_permit_id`,`ep_document_name`,`ep_institution`,`ep_date`,`ep_limit_capacity`,`ep_realization_capacity`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,6,'awda','adwad','2017-04-18',123,123123,8,1492675121,8,1492675121);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
