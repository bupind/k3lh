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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ppu` */

insert  into `ppu`(`id`,`sector_id`,`power_plant_id`,`ppu_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,7,5,2016,8,1487327122,8,1487792049),(2,7,5,2014,8,1487327211,8,1487327211),(3,7,5,2014,8,1487327355,8,1487327355),(4,4,1,2017,8,1488794828,8,1488794828),(5,7,5,2017,8,1488794922,8,1488794922),(6,7,5,2018,8,1488794978,8,1488794978),(8,7,5,2101,8,1488987478,8,1488987478),(9,7,5,123,8,1488987563,8,1488987563);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_ambient` */

insert  into `ppu_ambient`(`id`,`sector_id`,`power_plant_id`,`ppua_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,7,5,2017,8,1488987336,8,1488987336),(3,7,5,2314,8,1488987603,8,1488987603);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_emission_load_grk` */

insert  into `ppu_emission_load_grk`(`id`,`ppu_emission_source_id`,`ppuelg_parameter`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,5,'CO2',8,1488825235,8,1488825235),(2,8,'Co2',8,1488825332,8,1488825332);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_emission_load_grk_calc` */

insert  into `ppu_emission_load_grk_calc`(`id`,`ppu_emission_load_grk_id`,`ppueglc_year`,`ppueglc_coal_usage`,`ppueglc_carbon_content`,`ppueglc_carbon_actual_content`,`ppueglc_mw_carbondioxyde`,`ppueglc_anc`,`ppueglc_oxidation_factor`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,2014,'293.31600000',50,500,44,12,'0.98',8,1488825236,8,1488825236),(2,1,2015,'314.85800000',50,500,44,12,'0.98',8,1488825236,8,1488825236),(3,2,2014,'296.29900000',50,500,44,12,'0.98',8,1488825332,8,1488825332),(4,2,2015,'292.98600000',50,500,44,12,'0.98',8,1488825333,8,1488825333);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_emission_source` */

insert  into `ppu_emission_source`(`id`,`ppu_id`,`ppues_name`,`ppues_chimney_name`,`ppues_capacity`,`ppues_control_device`,`ppues_fuel_name_code`,`ppues_total_fuel`,`ppues_fuel_unit_code`,`ppues_operation_time`,`ppues_location`,`ppues_coord_ls`,`ppues_coord_bt`,`ppues_chimney_shape_code`,`ppues_chimney_height`,`ppues_chimney_diameter`,`ppues_hole_position`,`ppues_monitoring_data_status_code`,`ppues_freq_monitoring_obligation_code`,`ppues_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,'Boiler Unit 3','CEROBONG 3',100,'Cyclone,  Bag House, Limestone Injection','FNC1','223346984.25','FUC1','4884.983332','PLTU TARAHAN','05o 31\' 15,42\"','105o 21\' 12,56\"','CYL','141.95','3.30',43,'WATCHED','FMOC1','',8,1488823079,8,1488831200),(8,1,'Boiler Unit 4','CEROBONG 4',100,'Cyclone,  Bag House, Limestone Injection','FNC1','191842365.75','FUC1','5413.000000','PLTU TARAHAN','05O 31\' 15,42\"','105O 21\' 12,56\"','CYL','141.95','3.30',43,'WATCHED','FMOC1','',8,1488824063,8,1488824063),(9,1,'Boiler Unit 5','CEROBONG 5',100,'Cyclone,  Bag House, Limestone Injection','FNC1','15467645.12','FUC1','0.000000','PLTU TARAHAN','1564467','4676467','CYL','141.95','3.30',43,'NWATCHED','FMOC1','',8,1488824116,8,1488824116);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_parameter_obligation` */

insert  into `ppu_parameter_obligation`(`id`,`ppu_emission_source_id`,`ppupo_parameter_code`,`ppupo_parameter_unit_code`,`ppupo_qs`,`ppupo_qs_unit_code`,`ppupo_qs_ref`,`ppupo_qs_max_pollution_load`,`ppupo_qs_load_unit_code`,`ppupo_qs_max_pollution_load_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,5,'PRPC1','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824274,8,1488824846),(17,5,'PRPC2','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824329,8,1488824856),(19,5,'PRPC3','','850.00','PRQUC2','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824706,8,1488825157),(20,5,'PRPC4','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824757,8,1488824872),(21,5,'LAJUALIR','PRPUC1','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824833,8,1488824833),(22,8,'LAJUALIR','PRPUC1','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488824933,8,1488824933),(23,8,'PRPC1','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825000,8,1488825000),(24,8,'PRPC3','','850.00','PRQUC2','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825030,8,1488825030),(25,8,'PRPC2','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825086,8,1488825086),(26,8,'PRPC4','','850.00','PRQUC1','Permen LH 21 tahun 2008','500.00','PRQLUC1','PERMENLH 21/2008',8,1488825143,8,1488825143);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_technical_provision` */

insert  into `ppu_technical_provision`(`id`,`ppu_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (35,1,8,1488991264,8,1488992000);

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `ppu_technical_provision_detail` */

insert  into `ppu_technical_provision_detail`(`id`,`ppu_technical_provision_id`,`ppu_question_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (51,35,1,8,1488991264,8,1488992000),(52,35,2,8,1488991264,8,1488992000),(53,35,3,8,1488991264,8,1488992000),(54,35,5,8,1488991264,8,1488992000),(55,35,6,8,1488991264,8,1488992000),(56,35,7,8,1488991616,8,1488992000),(57,35,8,8,1488992000,8,1488992000);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ppucems_report_bm` */

insert  into `ppucems_report_bm`(`id`,`ppu_emission_source_id`,`ppucemsrb_parameter_code`,`ppucemsrb_ref`,`ppucemsrb_sec_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,5,'PRPC2','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488827682,8,1488875674),(3,5,'PRPC1','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875702,8,1488875702),(4,5,'PRPC3','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875724,8,1488875724),(5,8,'PRPC2','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875747,8,1488875747),(6,8,'PRPC1','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875767,8,1488875767),(7,8,'PRPC3','TW II 2016 DATA HANYA BULAN APRIL',NULL,8,1488875783,8,1488875783);

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `ppucemsrb_quarter` */

insert  into `ppucemsrb_quarter`(`id`,`ppucems_report_bm_id`,`ppucemsrbq_quarter`,`ppucemsrbq_year`,`ppucemsrbq_value`,`ppucemsrbq_qs_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'III',2015,92,92,8,1488827683,8,1488875674),(2,1,'IV',2015,92,92,8,1488827683,8,1488875674),(3,1,'I',2016,90,90,8,1488827683,8,1488875674),(4,1,'II',2016,30,30,8,1488827683,8,1488875674),(9,3,'III',2015,92,92,8,1488875702,8,1488875702),(10,3,'IV',2015,92,92,8,1488875702,8,1488875702),(11,3,'I',2016,90,90,8,1488875702,8,1488875702),(12,3,'II',2016,30,30,8,1488875702,8,1488875702),(13,4,'III',2015,92,92,8,1488875724,8,1488875724),(14,4,'IV',2015,92,92,8,1488875724,8,1488875724),(15,4,'I',2016,90,90,8,1488875724,8,1488875724),(16,4,'II',2016,30,30,8,1488875724,8,1488875724),(17,5,'III',2015,92,92,8,1488875747,8,1488875747),(18,5,'IV',2015,92,92,8,1488875747,8,1488875747),(19,5,'I',2016,90,90,8,1488875747,8,1488875747),(20,5,'II',2016,30,30,8,1488875747,8,1488875747),(21,6,'III',2015,92,92,8,1488875767,8,1488875767),(22,6,'IV',2015,92,92,8,1488875767,8,1488875767),(23,6,'I',2016,90,90,8,1488875767,8,1488875767),(24,6,'II',2016,30,30,8,1488875767,8,1488875767),(25,7,'III',2015,92,92,8,1488875783,8,1488875783),(26,7,'IV',2015,92,92,8,1488875783,8,1488875783),(27,7,'I',2016,90,90,8,1488875783,8,1488875783),(28,7,'II',2016,30,30,8,1488875783,8,1488875783);

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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

/*Data for the table `ppues_month` */

insert  into `ppues_month`(`id`,`ppu_emission_source_id`,`ppuesm_month`,`ppuesm_year`,`ppuesm_operation_time`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,5,7,2015,'729.283333',8,1488823081,8,1488831200),(26,5,8,2015,'644.033333',8,1488823081,8,1488831200),(27,5,9,2015,'720.000000',8,1488823081,8,1488831200),(28,5,10,2015,'645.250000',8,1488823081,8,1488831200),(29,5,11,2015,'521.550000',8,1488823081,8,1488831201),(30,5,12,2015,'453.033333',8,1488823081,8,1488831201),(31,5,1,2016,'744.000000',8,1488823081,8,1488831201),(32,5,2,2016,'193.333333',8,1488823081,8,1488831201),(33,5,3,2016,'234.500000',8,1488823081,8,1488831201),(34,5,4,2016,'0.000000',8,1488823081,8,1488831201),(35,5,5,2016,'0.000000',8,1488823081,8,1488831201),(36,5,6,2016,'0.000000',8,1488823081,8,1488831201),(61,8,7,2015,'599.580000',8,1488824065,8,1488824065),(62,8,8,2015,'744.000000',8,1488824065,8,1488824065),(63,8,9,2015,'714.450000',8,1488824065,8,1488824065),(64,8,10,2015,'629.220000',8,1488824065,8,1488824065),(65,8,11,2015,'387.400000',8,1488824065,8,1488824065),(66,8,12,2015,'732.280000',8,1488824065,8,1488824065),(67,8,1,2016,'533.020000',8,1488824065,8,1488824065),(68,8,2,2016,'519.670000',8,1488824065,8,1488824065),(69,8,3,2016,'553.380000',8,1488824065,8,1488824065),(70,8,4,2016,'0.000000',8,1488824065,8,1488824065),(71,8,5,2016,'0.000000',8,1488824065,8,1488824065),(72,8,6,2016,'0.000000',8,1488824065,8,1488824065),(73,9,7,2015,'0.000000',8,1488824118,8,1488824118),(74,9,8,2015,'0.000000',8,1488824118,8,1488824118),(75,9,9,2015,'0.000000',8,1488824118,8,1488824118),(76,9,10,2015,'0.000000',8,1488824118,8,1488824118),(77,9,11,2015,'0.000000',8,1488824118,8,1488824118),(78,9,12,2015,'0.000000',8,1488824118,8,1488824118),(79,9,1,2016,'0.000000',8,1488824118,8,1488824118),(80,9,2,2016,'0.000000',8,1488824118,8,1488824118),(81,9,3,2016,'0.000000',8,1488824118,8,1488824118),(82,9,4,2016,'0.000000',8,1488824118,8,1488824118),(83,9,5,2016,'0.000000',8,1488824118,8,1488824118),(84,9,6,2016,'0.000000',8,1488824118,8,1488824118);

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
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;

/*Data for the table `ppupo_month` */

insert  into `ppupo_month`(`id`,`ppu_parameter_obligation_id`,`ppupom_month`,`ppupom_year`,`ppupom_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (181,16,7,2015,'113.70',8,1488824274,8,1488824846),(182,16,8,2015,'279.31',8,1488824274,8,1488824846),(183,16,9,2015,'259.00',8,1488824274,8,1488824846),(184,16,10,2015,'281.05',8,1488824274,8,1488824847),(185,16,11,2015,'428.09',8,1488824274,8,1488824847),(186,16,12,2015,'453.94',8,1488824274,8,1488824847),(187,16,1,2016,'281.60',8,1488824274,8,1488824847),(188,16,2,2016,'472.88',8,1488824274,8,1488824847),(189,16,3,2016,'408.15',8,1488824274,8,1488824847),(190,16,4,2016,NULL,8,1488824274,8,1488824847),(191,16,5,2016,NULL,8,1488824274,8,1488824847),(192,16,6,2016,NULL,8,1488824274,8,1488824847),(193,17,7,2015,'0.30',8,1488824330,8,1488824856),(194,17,8,2015,'7.04',8,1488824330,8,1488824856),(195,17,9,2015,'11.80',8,1488824330,8,1488824856),(196,17,10,2015,'39.15',8,1488824330,8,1488824856),(197,17,11,2015,'69.70',8,1488824330,8,1488824856),(198,17,12,2015,'528.20',8,1488824330,8,1488824856),(199,17,1,2016,'147.69',8,1488824330,8,1488824856),(200,17,2,2016,'35.61',8,1488824330,8,1488824856),(201,17,3,2016,'365.39',8,1488824330,8,1488824856),(202,17,4,2016,NULL,8,1488824330,8,1488824856),(203,17,5,2016,NULL,8,1488824330,8,1488824856),(204,17,6,2016,NULL,8,1488824330,8,1488824856),(217,19,7,2015,'10.00',8,1488824707,8,1488825157),(218,19,8,2015,'10.00',8,1488824707,8,1488825157),(219,19,9,2015,'10.00',8,1488824707,8,1488825157),(220,19,10,2015,'10.00',8,1488824707,8,1488825157),(221,19,11,2015,'10.00',8,1488824707,8,1488825157),(222,19,12,2015,'10.00',8,1488824707,8,1488825157),(223,19,1,2016,'10.00',8,1488824707,8,1488825157),(224,19,2,2016,'10.00',8,1488824707,8,1488825157),(225,19,3,2016,'10.00',8,1488824707,8,1488825157),(226,19,4,2016,NULL,8,1488824707,8,1488825157),(227,19,5,2016,NULL,8,1488824707,8,1488825157),(228,19,6,2016,NULL,8,1488824707,8,1488825157),(229,20,7,2015,'11.07',8,1488824757,8,1488824872),(230,20,8,2015,'69.30',8,1488824757,8,1488824872),(231,20,9,2015,'106.40',8,1488824757,8,1488824872),(232,20,10,2015,'72.63',8,1488824757,8,1488824872),(233,20,11,2015,'86.54',8,1488824757,8,1488824872),(234,20,12,2015,'93.30',8,1488824757,8,1488824872),(235,20,1,2016,'117.12',8,1488824758,8,1488824872),(236,20,2,2016,'150.00',8,1488824758,8,1488824872),(237,20,3,2016,'30.71',8,1488824758,8,1488824872),(238,20,4,2016,NULL,8,1488824758,8,1488824872),(239,20,5,2016,NULL,8,1488824758,8,1488824872),(240,20,6,2016,NULL,8,1488824758,8,1488824872),(241,21,7,2015,'15.26',8,1488824834,8,1488824834),(242,21,8,2015,'19.32',8,1488824834,8,1488824834),(243,21,9,2015,'21.56',8,1488824834,8,1488824834),(244,21,10,2015,'17.15',8,1488824834,8,1488824834),(245,21,11,2015,'17.18',8,1488824835,8,1488824835),(246,21,12,2015,'11.40',8,1488824835,8,1488824835),(247,21,1,2016,'19.21',8,1488824835,8,1488824835),(248,21,2,2016,'20.98',8,1488824835,8,1488824835),(249,21,3,2016,'13.96',8,1488824835,8,1488824835),(250,21,4,2016,NULL,8,1488824835,8,1488824835),(251,21,5,2016,NULL,8,1488824835,8,1488824835),(252,21,6,2016,NULL,8,1488824835,8,1488824835),(253,22,7,2015,'18.54',8,1488824933,8,1488824933),(254,22,8,2015,'17.50',8,1488824933,8,1488824933),(255,22,9,2015,'6.98',8,1488824933,8,1488824933),(256,22,10,2015,'14.05',8,1488824933,8,1488824933),(257,22,11,2015,'11.40',8,1488824933,8,1488824933),(258,22,12,2015,'10.80',8,1488824933,8,1488824933),(259,22,1,2016,'10.50',8,1488824933,8,1488824933),(260,22,2,2016,'10.52',8,1488824933,8,1488824933),(261,22,3,2016,'15.01',8,1488824933,8,1488824933),(262,22,4,2016,NULL,8,1488824933,8,1488824933),(263,22,5,2016,NULL,8,1488824933,8,1488824933),(264,22,6,2016,NULL,8,1488824933,8,1488824933),(265,23,7,2015,'66.73',8,1488825001,8,1488825001),(266,23,8,2015,'178.75',8,1488825001,8,1488825001),(267,23,9,2015,'195.00',8,1488825001,8,1488825001),(268,23,10,2015,'258.14',8,1488825001,8,1488825001),(269,23,11,2015,'590.19',8,1488825001,8,1488825001),(270,23,12,2015,'456.63',8,1488825001,8,1488825001),(271,23,1,2016,'401.75',8,1488825001,8,1488825001),(272,23,2,2016,'143.21',8,1488825001,8,1488825001),(273,23,3,2016,'542.59',8,1488825001,8,1488825001),(274,23,4,2016,NULL,8,1488825001,8,1488825001),(275,23,5,2016,NULL,8,1488825001,8,1488825001),(276,23,6,2016,NULL,8,1488825001,8,1488825001),(277,24,7,2015,'10.00',8,1488825030,8,1488825030),(278,24,8,2015,'10.00',8,1488825030,8,1488825030),(279,24,9,2015,'10.00',8,1488825030,8,1488825030),(280,24,10,2015,'10.00',8,1488825030,8,1488825030),(281,24,11,2015,'10.00',8,1488825030,8,1488825030),(282,24,12,2015,'10.00',8,1488825030,8,1488825030),(283,24,1,2016,'10.00',8,1488825030,8,1488825030),(284,24,2,2016,'10.00',8,1488825030,8,1488825030),(285,24,3,2016,'10.00',8,1488825031,8,1488825031),(286,24,4,2016,NULL,8,1488825031,8,1488825031),(287,24,5,2016,NULL,8,1488825031,8,1488825031),(288,24,6,2016,NULL,8,1488825031,8,1488825031),(289,25,7,2015,'10.50',8,1488825086,8,1488825086),(290,25,8,2015,'14.40',8,1488825086,8,1488825086),(291,25,9,2015,'10.35',8,1488825086,8,1488825086),(292,25,10,2015,'156.42',8,1488825086,8,1488825086),(293,25,11,2015,'106.42',8,1488825086,8,1488825086),(294,25,12,2015,'507.76',8,1488825086,8,1488825086),(295,25,1,2016,'122.20',8,1488825086,8,1488825086),(296,25,2,2016,'6.56',8,1488825086,8,1488825086),(297,25,3,2016,'25.00',8,1488825086,8,1488825086),(298,25,4,2016,NULL,8,1488825086,8,1488825086),(299,25,5,2016,NULL,8,1488825086,8,1488825086),(300,25,6,2016,NULL,8,1488825086,8,1488825086),(301,26,7,2015,'28.78',8,1488825143,8,1488825143),(302,26,8,2015,'47.70',8,1488825143,8,1488825143),(303,26,9,2015,'68.70',8,1488825143,8,1488825143),(304,26,10,2015,'55.50',8,1488825143,8,1488825143),(305,26,11,2015,'28.73',8,1488825143,8,1488825143),(306,26,12,2015,'54.98',8,1488825143,8,1488825143),(307,26,1,2016,'58.18',8,1488825143,8,1488825143),(308,26,2,2016,'74.04',8,1488825143,8,1488825143),(309,26,3,2016,'24.41',8,1488825143,8,1488825143),(310,26,4,2016,NULL,8,1488825143,8,1488825143),(311,26,5,2016,NULL,8,1488825144,8,1488825144),(312,26,6,2016,NULL,8,1488825144,8,1488825144);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

insert into auth_item (name, type) values
('ppu-ambient', 2),
('ppu-ambient-index', 1),
('ppu-ambient-create', 1),
('ppu-ambient-update', 1),
('ppu-ambient-delete', 1),
('ppu-ambient-view', 1);

insert auth_item_child (parent, child) values
('ppu-ambient', 'ppu-ambient-index'),
('ppu-ambient', 'ppu-ambient-create'),
('ppu-ambient', 'ppu-ambient-update'),
('ppu-ambient', 'ppu-ambient-delete'),
('ppu-ambient', 'ppu-ambient-view'),
('Administrator', 'ppu-ambient');

insert into auth_item (name, type) values
('ppu-titik-pemantauan-ambient', 2),
('ppua-monitoring-point-index', 1),
('ppua-monitoring-point-create', 1),
('ppua-monitoring-point-update', 1),
('ppua-monitoring-point-delete', 1),
('ppua-monitoring-point-view', 1);

insert auth_item_child (parent, child) values
('ppu-titik-pemantauan-ambient', 'ppua-monitoring-point-index'),
('ppu-titik-pemantauan-ambient', 'ppua-monitoring-point-create'),
('ppu-titik-pemantauan-ambient', 'ppua-monitoring-point-update'),
('ppu-titik-pemantauan-ambient', 'ppua-monitoring-point-delete'),
('ppu-titik-pemantauan-ambient', 'ppua-monitoring-point-view'),
('Administrator', 'ppu-titik-pemantauan-ambient');

insert into auth_item (name, type) values
('ppu-ketaatan-parameter-ambient', 2),
('ppua-parameter-obligation-index', 1),
('ppua-parameter-obligation-create', 1),
('ppua-parameter-obligation-update', 1),
('ppua-parameter-obligation-delete', 1),
('ppua-parameter-obligation-view', 1);

insert auth_item_child (parent, child) values
('ppu-ketaatan-parameter-ambient', 'ppua-parameter-obligation-index'),
('ppu-ketaatan-parameter-ambient', 'ppua-parameter-obligation-create'),
('ppu-ketaatan-parameter-ambient', 'ppua-parameter-obligation-update'),
('ppu-ketaatan-parameter-ambient', 'ppua-parameter-obligation-delete'),
('ppu-ketaatan-parameter-ambient', 'ppua-parameter-obligation-view'),
('Administrator', 'ppu-ketaatan-parameter-ambient');

insert into auth_item (name, type) values
('ppu-pelaporan-parameter-cems', 2),
('ppucemsrb-parameter-report-index', 1),
('ppucemsrb-parameter-report-create', 1),
('ppucemsrb-parameter-report-update', 1),
('ppucemsrb-parameter-report-delete', 1),
('ppucemsrb-parameter-report-view', 1);

insert auth_item_child (parent, child) values
('ppu-pelaporan-parameter-cems', 'ppucemsrb-parameter-report-index'),
('ppu-pelaporan-parameter-cems', 'ppucemsrb-parameter-report-create'),
('ppu-pelaporan-parameter-cems', 'ppucemsrb-parameter-report-update'),
('ppu-pelaporan-parameter-cems', 'ppucemsrb-parameter-report-delete'),
('ppu-pelaporan-parameter-cems', 'ppucemsrb-parameter-report-view'),
('Administrator', 'ppu-pelaporan-parameter-cems');

insert into auth_item (name, type) values
('ppu-pelaporan-bm-cems', 2),
('ppucems-report-bm-index', 1),
('ppucems-report-bm-create', 1),
('ppucems-report-bm-update', 1),
('ppucems-report-bm-delete', 1),
('ppucems-report-bm-view', 1);

insert auth_item_child (parent, child) values
('ppu-pelaporan-bm-cems', 'ppucems-report-bm-index'),
('ppu-pelaporan-bm-cems', 'ppucems-report-bm-create'),
('ppu-pelaporan-bm-cems', 'ppucems-report-bm-update'),
('ppu-pelaporan-bm-cems', 'ppucems-report-bm-delete'),
('ppu-pelaporan-bm-cems', 'ppucems-report-bm-view'),
('Administrator', 'ppu-pelaporan-bm-cems');

insert into auth_item (name, type) values
('ppu', 2),
('ppu-index', 1),
('ppu-create', 1),
('ppu-update', 1),
('ppu-delete', 1),
('ppu-view', 1),
('ppu-pollution-load', 1),
('ppu-emission-load-calc', 1);

insert auth_item_child (parent, child) values
('ppu', 'ppu-index'),
('ppu', 'ppu-create'),
('ppu', 'ppu-update'),
('ppu', 'ppu-delete'),
('ppu', 'ppu-view'),
('ppu', 'ppu-pollution-load'),
('ppu', 'ppu-emission-load-calc'),
('Administrator', 'ppu');

insert into auth_item (name, type) values
('ppu-perhitungan-beban-emisi-grk', 2),
('ppu-emission-load-grk-index', 1),
('ppu-emission-load-grk-create', 1),
('ppu-emission-load-grk-update', 1),
('ppu-emission-load-grk-delete', 1),
('ppu-emission-load-grk-view', 1);

insert auth_item_child (parent, child) values
('ppu-perhitungan-beban-emisi-grk', 'ppu-emission-load-grk-index'),
('ppu-perhitungan-beban-emisi-grk', 'ppu-emission-load-grk-create'),
('ppu-perhitungan-beban-emisi-grk', 'ppu-emission-load-grk-update'),
('ppu-perhitungan-beban-emisi-grk', 'ppu-emission-load-grk-delete'),
('ppu-perhitungan-beban-emisi-grk', 'ppu-emission-load-grk-view'),
('Administrator', 'ppu-perhitungan-beban-emisi-grk');

insert into auth_item (name, type) values
('ppu-pertanyaan', 2),
('ppu-question-index', 1),
('ppu-question-create', 1),
('ppu-question-update', 1),
('ppu-question-delete', 1),
('ppu-question-view', 1);

insert auth_item_child (parent, child) values
('ppu-pertanyaan', 'ppu-question-index'),
('ppu-pertanyaan', 'ppu-question-create'),
('ppu-pertanyaan', 'ppu-question-update'),
('ppu-pertanyaan', 'ppu-question-delete'),
('ppu-pertanyaan', 'ppu-question-view'),
('Administrator', 'ppu-pertanyaan');

insert into auth_item (name, type) values
('ppu-ketentuan-teknis', 2),
('ppu-technical-provision-index', 1),
('ppu-technical-provision-create', 1),
('ppu-technical-provision-update', 1),
('ppu-technical-provision-delete', 1),
('ppu-technical-provision-view', 1);

insert auth_item_child (parent, child) values
('ppu-ketentuan-teknis', 'ppu-technical-provision-index'),
('ppu-ketentuan-teknis', 'ppu-technical-provision-create'),
('ppu-ketentuan-teknis', 'ppu-technical-provision-update'),
('ppu-ketentuan-teknis', 'ppu-technical-provision-delete'),
('ppu-ketentuan-teknis', 'ppu-technical-provision-view'),
('Administrator', 'ppu-ketentuan-teknis');

insert into auth_item (name, type) values
('ppu-sumber-emisi', 2),
('ppu-emission-source-ajax-emission', 1),
('ppu-emission-source-index', 1),
('ppu-emission-source-create', 1),
('ppu-emission-source-update', 1),
('ppu-emission-source-delete', 1),
('ppu-emission-source-view', 1);

insert auth_item_child (parent, child) values
('ppu-sumber-emisi', 'ppu-emission-source-index'),
('ppu-sumber-emisi', 'ppu-emission-source-create'),
('ppu-sumber-emisi', 'ppu-emission-source-update'),
('ppu-sumber-emisi', 'ppu-emission-source-delete'),
('ppu-sumber-emisi', 'ppu-emission-source-view'),
('ppu-sumber-emisi', 'ppu-emission-source-ajax-emission'),
('Administrator', 'ppu-sumber-emisi');

insert into auth_item (name, type) values
('ppu-ketaatan-parameter-pelaporan-bm', 2),
('ppu-parameter-obligation-index', 1),
('ppu-parameter-obligation-create', 1),
('ppu-parameter-obligation-update', 1),
('ppu-parameter-obligation-delete', 1),
('ppu-parameter-obligation-view', 1);

insert auth_item_child (parent, child) values
('ppu-ketaatan-parameter-pelaporan-bm', 'ppu-parameter-obligation-index'),
('ppu-ketaatan-parameter-pelaporan-bm', 'ppu-parameter-obligation-create'),
('ppu-ketaatan-parameter-pelaporan-bm', 'ppu-parameter-obligation-update'),
('ppu-ketaatan-parameter-pelaporan-bm', 'ppu-parameter-obligation-delete'),
('ppu-ketaatan-parameter-pelaporan-bm', 'ppu-parameter-obligation-view'),
('Administrator', 'ppu-ketaatan-parameter-pelaporan-bm');