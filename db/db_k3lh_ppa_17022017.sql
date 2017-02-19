/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ppa` */

insert  into `ppa`(`id`,`sector_id`,`power_plant_id`,`ppa_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,2017,8,1487233107,8,1487233107),(2,7,5,2017,8,1487233182,8,1487233182);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ppa_month` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ppa_setup_permit` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
