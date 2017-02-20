/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/

insert into auth_item (name, type) values
('pengendalian-pencemaran-air', 2),
('ppa-index', 1),
('ppa-create', 1),
('ppa-update', 1),
('ppa-delete', 1),
('ppa-view', 1),
('ppa-setup-permit-index', 1),
('ppa-setup-permit-create', 1),
('ppa-setup-permit-update', 1),
('ppa-setup-permit-delete', 1),
('ppa-setup-permit-view', 1);

insert auth_item_child (parent, child) values
('pengendalian-pencemaran-air', 'ppa-index'),
('pengendalian-pencemaran-air', 'ppa-create'),
('pengendalian-pencemaran-air', 'ppa-update'),
('pengendalian-pencemaran-air', 'ppa-delete'),
('pengendalian-pencemaran-air', 'ppa-view'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-index'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-create'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-update'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-delete'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-view'),
('Administrator', 'pengendalian-pencemaran-air');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ppa` */

insert  into `ppa`(`id`,`sector_id`,`power_plant_id`,`ppa_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,2017,8,1487233107,8,1487233107),(2,7,5,2017,8,1487233182,8,1487233182),(3,2,4,2017,8,1487479047,8,1487479047);

/*Table structure for table `ppa_inlet_outlet` */

DROP TABLE IF EXISTS `ppa_inlet_outlet`;

CREATE TABLE `ppa_inlet_outlet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_report_bm_id` int(11) NOT NULL,
  `ppaio_month` int(2) DEFAULT NULL,
  `ppaio_year` int(4) DEFAULT NULL,
  `ppaio_inlet_value` decimal(7,5) DEFAULT NULL,
  `ppaio_outlet_value` decimal(7,5) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_inlet_outlet_report` (`ppa_report_bm_id`),
  CONSTRAINT `FK_ppa_inlet_outlet_report` FOREIGN KEY (`ppa_report_bm_id`) REFERENCES `ppa_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ppa_inlet_outlet` */

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_month` */

insert  into `ppa_month`(`id`,`ppa_setup_permit_id`,`ppam_month`,`ppam_year`,`ppam_cert_number`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,7,2016,'1205',8,1487513541,8,1487515069),(2,1,8,2016,'1348',8,1487513541,8,1487515069),(3,1,9,2016,'1492',8,1487513541,8,1487515069),(4,1,10,2016,'1797',8,1487513541,8,1487515069),(5,1,11,2016,'1967',8,1487513541,8,1487515069),(6,1,12,2016,'1201',8,1487513541,8,1487515069),(7,1,1,2017,'2429',8,1487513541,8,1487515069),(8,1,2,2017,'2572',8,1487513541,8,1487515069),(9,1,3,2017,'2722',8,1487513541,8,1487515069),(10,1,4,2017,'2940',8,1487513541,8,1487515069),(11,1,5,2017,'',8,1487513541,8,1487515069),(12,1,6,2017,'',8,1487513541,8,1487515069),(13,4,7,2016,'1171',8,1487563467,8,1487563490),(14,4,8,2016,'1339',8,1487563467,8,1487563490),(15,4,9,2016,'1497',8,1487563467,8,1487563490),(16,4,10,2016,'1761',8,1487563467,8,1487563490),(17,4,11,2016,'1973',8,1487563467,8,1487563490),(18,4,12,2016,'2199',8,1487563467,8,1487563490),(19,4,1,2017,'2435',8,1487563467,8,1487563490),(20,4,2,2017,'2578',8,1487563467,8,1487563490),(21,4,3,2017,'2727',8,1487563467,8,1487563490),(22,4,4,2017,'2923',8,1487563467,8,1487563490),(23,4,5,2017,'',8,1487563467,8,1487563490),(24,4,6,2017,'',8,1487563467,8,1487563490);

/*Table structure for table `ppa_report_bm` */

DROP TABLE IF EXISTS `ppa_report_bm`;

CREATE TABLE `ppa_report_bm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppa_setup_permit_id` int(11) NOT NULL,
  `ppar_param_code` varchar(10) NOT NULL,
  `ppar_param_unit_code` varchar(10) DEFAULT NULL,
  `ppar_qs_1` decimal(5,2) NOT NULL,
  `ppar_qs_2` decimal(5,2) DEFAULT NULL,
  `ppar_qs_unit_code` varchar(10) NOT NULL,
  `ppar_qs_ref` varchar(100) DEFAULT NULL,
  `ppar_qs_max_pollution_load` decimal(5,2) DEFAULT NULL,
  `ppar_qs_load_unit_code` varchar(10) NOT NULL,
  `ppar_qs_max_pollution_load_ref` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_report_bm_setup` (`ppa_setup_permit_id`),
  CONSTRAINT `FK_ppa_report_bm_setup` FOREIGN KEY (`ppa_setup_permit_id`) REFERENCES `ppa_setup_permit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ppa_report_bm` */

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_setup_permit` */

insert  into `ppa_setup_permit`(`id`,`ppa_id`,`ppasp_wastewater_source`,`ppasp_setup_point_name`,`ppasp_coord_ls`,`ppasp_coord_bt`,`ppasp_wastewater_tech_code`,`ppasp_permit_number`,`ppasp_permit_publisher`,`ppasp_permit_publish_date`,`ppasp_permit_end_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'PROSES UTAMA (WWTP)','OUTLET WWTP','05&deg; 31\' 20,6\"','105&deg; 21\' 12,7\"','ANAER','109 TAHUN 2012','KEMENTERIAN LINGKUNGAN HIDUP','2012-05-29','2017-05-29',8,1487513541,8,1487515069),(4,1,'AIR BAHANG','OUTLET CONDENSOR','05&deg; 31\' 10,1\"','105&deg; 20\' 43,8\"','ANAER','109 TAHUN 2012','KEMENTERIAN LINGKUNGAN HIDUP','2012-05-29','2017-05-29',8,1487563467,8,1487563490);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;