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
('ppa-setup-permit-view', 1),
('ppa-report-bm-index', 1),
('ppa-report-bm-create', 1),
('ppa-report-bm-update', 1),
('ppa-report-bm-delete', 1),
('ppa-report-bm-view', 1);

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
('Administrator', 'pengendalian-pencemaran-air'),
('pengendalian-pencemaran-air', 'ppa-report-bm-index'),
('pengendalian-pencemaran-air', 'ppa-report-bm-create'),
('pengendalian-pencemaran-air', 'ppa-report-bm-update'),
('pengendalian-pencemaran-air', 'ppa-report-bm-delete'),
('pengendalian-pencemaran-air', 'ppa-report-bm-view');

insert into auth_item (name, type) values
;

insert auth_item_child (parent, child) values
;

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
  `ppaio_inlet_value` decimal(14,5) DEFAULT NULL,
  `ppaio_outlet_value` decimal(14,5) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_inlet_outlet_report` (`ppa_report_bm_id`),
  CONSTRAINT `FK_ppa_inlet_outlet_report` FOREIGN KEY (`ppa_report_bm_id`) REFERENCES `ppa_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_inlet_outlet` */

insert  into `ppa_inlet_outlet`(`id`,`ppa_report_bm_id`,`ppaio_month`,`ppaio_year`,`ppaio_inlet_value`,`ppaio_outlet_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,7,2016,'6.30000','6.11000',8,1487653232,8,1487662500),(2,2,8,2016,'6.18000','7.88000',8,1487653232,8,1487662500),(3,2,9,2016,'7.40000','7.30000',8,1487653232,8,1487662500),(4,2,10,2016,'6.90000','6.80000',8,1487653232,8,1487662500),(5,2,11,2016,'6.27000','6.29000',8,1487653232,8,1487662500),(6,2,12,2016,'7.24000','8.33000',8,1487653232,8,1487662500),(7,2,1,2017,'6.11000','6.15000',8,1487653232,8,1487662500),(8,2,2,2017,'7.88000','6.20000',8,1487653232,8,1487662500),(9,2,3,2017,'8.02000','8.90000',8,1487653232,8,1487662500),(10,2,4,2017,'6.89000','8.33000',8,1487653232,8,1487662500),(11,2,5,2017,'0.00000','0.00000',8,1487653232,8,1487662500),(12,2,6,2017,'0.00000','0.00000',8,1487653232,8,1487662500),(13,3,7,2016,'1.00000','2.00000',8,1487663739,8,1487663739),(14,3,8,2016,'2.00000','4.00000',8,1487663739,8,1487663739),(15,3,9,2016,'3.00000','4.00000',8,1487663739,8,1487663739),(16,3,10,2016,'3.00000','1.00000',8,1487663739,8,1487663739),(17,3,11,2016,'2.00000','2.00000',8,1487663739,8,1487663739),(18,3,12,2016,'1.00000','3.00000',8,1487663739,8,1487663739),(19,3,1,2017,'0.00000','1.00000',8,1487663739,8,1487663739),(20,3,2,2017,'3.00000','5.00000',8,1487663739,8,1487663739),(21,3,3,2017,'6.00000','4.00000',8,1487663739,8,1487663739),(22,3,4,2017,'0.00000','1.00000',8,1487663739,8,1487663739),(23,3,5,2017,NULL,NULL,8,1487663739,8,1487663739),(24,3,6,2017,NULL,NULL,8,1487663739,8,1487663739),(25,4,7,2016,'2.00000','3.00000',8,1487663840,8,1487663840),(26,4,8,2016,'2.00000','1.00000',8,1487663840,8,1487663840),(27,4,9,2016,'2.00000','2.00000',8,1487663840,8,1487663840),(28,4,10,2016,'3.00000','1.00000',8,1487663840,8,1487663840),(29,4,11,2016,'2.00000','1.00000',8,1487663840,8,1487663840),(30,4,12,2016,'2.00000','4.00000',8,1487663840,8,1487663840),(31,4,1,2017,'1.30000','0.26000',8,1487663840,8,1487663840),(32,4,2,2017,'1.30000','0.00000',8,1487663840,8,1487663840),(33,4,3,2017,'0.90000','1.50000',8,1487663840,8,1487663840),(34,4,4,2017,'0.30000','0.40000',8,1487663840,8,1487663840),(35,4,5,2017,NULL,NULL,8,1487663840,8,1487663840),(36,4,6,2017,NULL,NULL,8,1487663840,8,1487663840),(37,5,7,2016,NULL,'635.29000',8,1487664152,8,1487664152),(38,5,8,2016,NULL,'286.59000',8,1487664152,8,1487664152),(39,5,9,2016,NULL,'931.86000',8,1487664152,8,1487664152),(40,5,10,2016,NULL,'2351.51000',8,1487664152,8,1487664152),(41,5,11,2016,NULL,'1494.31000',8,1487664152,8,1487664152),(42,5,12,2016,NULL,'733.74000',8,1487664152,8,1487664152),(43,5,1,2017,NULL,'1649.41000',8,1487664152,8,1487664152),(44,5,2,2017,NULL,'3331.89000',8,1487664152,8,1487664152),(45,5,3,2017,NULL,'3742.53000',8,1487664152,8,1487664152),(46,5,4,2017,NULL,'1649.41000',8,1487664152,8,1487664152),(47,5,5,2017,NULL,NULL,8,1487664152,8,1487664152),(48,5,6,2017,NULL,NULL,8,1487664152,8,1487664152),(49,6,7,2016,NULL,'121252677.00000',8,1487665069,8,1487665069),(50,6,8,2016,NULL,'124282600.00000',8,1487665069,8,1487665069),(51,6,9,2016,NULL,'130266044.00000',8,1487665069,8,1487665069),(52,6,10,2016,NULL,'116507959.00000',8,1487665069,8,1487665069),(53,6,11,2016,NULL,'7402945.00000',8,1487665069,8,1487665069),(54,6,12,2016,NULL,'83155246.00000',8,1487665069,8,1487665069),(55,6,1,2017,NULL,'77516070.00000',8,1487665069,8,1487665069),(56,6,2,2017,NULL,'89188125.00000',8,1487665069,8,1487665069),(57,6,3,2017,NULL,'63281098.00000',8,1487665069,8,1487665069),(58,6,4,2017,NULL,'49570318.00000',8,1487665069,8,1487665069),(59,6,5,2017,NULL,NULL,8,1487665069,8,1487665069),(60,6,6,2017,NULL,NULL,8,1487665069,8,1487665069);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_report_bm` */

insert  into `ppa_report_bm`(`id`,`ppa_setup_permit_id`,`ppar_param_code`,`ppar_param_unit_code`,`ppar_qs_1`,`ppar_qs_2`,`ppar_qs_unit_code`,`ppar_qs_ref`,`ppar_qs_max_pollution_load`,`ppar_qs_load_unit_code`,`ppar_qs_max_pollution_load_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,'PH','','6.00','9.00','','PermenLH 08/2009',NULL,'TON_P_M','',8,1487653232,8,1487662500),(3,1,'TSS',NULL,'100.00',NULL,'MG_P_L','PermenLH 08/2009',NULL,'TON_P_M','',8,1487663739,8,1487663739),(4,1,'OIL_FAT',NULL,'10.00',NULL,'MG_P_L','PermenLH 08/2009',NULL,'TON_P_M','',8,1487663840,8,1487663840),(5,1,'DBT','M3_P_M',NULL,NULL,'','',NULL,'','',8,1487664152,8,1487664152),(6,1,'PRD','MW_P_M',NULL,NULL,'','',NULL,'','',8,1487665069,8,1487665069);

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