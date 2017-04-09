/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/

insert into auth_item (name, type) values
('pengendalian-pencemaran-air', 2),
('pertanyaan-pengendalian-pencemaran-air', 2),
('ppa-index', 1),
('ppa-create', 1),
('ppa-update', 1),
('ppa-delete', 1),
('ppa-view', 1),
('ppa-pollution-load', 1),
('ppa-pollution-load-actual', 1),
('ppa-setup-permit-index', 1),
('ppa-setup-permit-create', 1),
('ppa-setup-permit-update', 1),
('ppa-setup-permit-delete', 1),
('ppa-setup-permit-view', 1),
('ppa-report-bm-index', 1),
('ppa-report-bm-create', 1),
('ppa-report-bm-update', 1),
('ppa-report-bm-delete', 1),
('ppa-report-bm-view', 1),
('ppa-question-index', 1),
('ppa-question-create', 1),
('ppa-question-update', 1),
('ppa-question-delete', 1),
('ppa-question-view', 1),
('ppa-technical-provision-index', 1),
('ppa-technical-provision-create', 1),
('ppa-technical-provision-update', 1),
('ppa-technical-provision-delete', 1),
('ppa-technical-provision-view', 1),
('ppa-laboratorium-ajax-delete', 1),
('ppa-laboratorium-accreditation-ajax-delete', 1),
('ppa-pollution-load-decrease-index', 1),
('ppa-pollution-load-decrease-create', 1),
('ppa-pollution-load-decrease-update', 1),
('ppa-pollution-load-decrease-delete', 1),
('ppa-pollution-load-decrease-view', 1),
('ppa-ba-index', 1),
('ppa-ba-create', 1),
('ppa-ba-update', 1),
('ppa-ba-delete', 1),
('ppa-ba-view', 1),
('ppa-ba-monitoring-point-index', 1),
('ppa-ba-monitoring-point-create', 1),
('ppa-ba-monitoring-point-update', 1),
('ppa-ba-monitoring-point-delete', 1),
('ppa-ba-monitoring-point-view', 1),
('ppa-ba-report-bm-index', 1),
('ppa-ba-report-bm-create', 1),
('ppa-ba-report-bm-update', 1),
('ppa-ba-report-bm-delete', 1),
('ppa-ba-report-bm-view', 1);

insert auth_item_child (parent, child) values
('Administrator', 'pengendalian-pencemaran-air'),
('Administrator', 'pertanyaan-pengendalian-pencemaran-air'),
('pengendalian-pencemaran-air', 'ppa-index'),
('pengendalian-pencemaran-air', 'ppa-create'),
('pengendalian-pencemaran-air', 'ppa-update'),
('pengendalian-pencemaran-air', 'ppa-delete'),
('pengendalian-pencemaran-air', 'ppa-view'),
('pengendalian-pencemaran-air', 'ppa-pollution-load'),
('pengendalian-pencemaran-air', 'ppa-pollution-load-actual'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-index'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-create'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-update'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-delete'),
('pengendalian-pencemaran-air', 'ppa-setup-permit-view'),
('pengendalian-pencemaran-air', 'ppa-report-bm-index'),
('pengendalian-pencemaran-air', 'ppa-report-bm-create'),
('pengendalian-pencemaran-air', 'ppa-report-bm-update'),
('pengendalian-pencemaran-air', 'ppa-report-bm-delete'),
('pengendalian-pencemaran-air', 'ppa-report-bm-view'),
('pengendalian-pencemaran-air', 'ppa-technical-provision-index'),
('pengendalian-pencemaran-air', 'ppa-technical-provision-create'),
('pengendalian-pencemaran-air', 'ppa-technical-provision-update'),
('pengendalian-pencemaran-air', 'ppa-technical-provision-delete'),
('pengendalian-pencemaran-air', 'ppa-technical-provision-view'),
('pengendalian-pencemaran-air', 'ppa-laboratorium-ajax-delete'),
('pengendalian-pencemaran-air', 'ppa-laboratorium-accreditation-ajax-delete'),
('pengendalian-pencemaran-air', 'ppa-pollution-load-decrease-index'),
('pengendalian-pencemaran-air', 'ppa-pollution-load-decrease-create'),
('pengendalian-pencemaran-air', 'ppa-pollution-load-decrease-update'),
('pengendalian-pencemaran-air', 'ppa-pollution-load-decrease-delete'),
('pengendalian-pencemaran-air', 'ppa-pollution-load-decrease-view'),
('pengendalian-pencemaran-air', 'ppa-ba-index'),
('pengendalian-pencemaran-air', 'ppa-ba-create'),
('pengendalian-pencemaran-air', 'ppa-ba-update'),
('pengendalian-pencemaran-air', 'ppa-ba-delete'),
('pengendalian-pencemaran-air', 'ppa-ba-view'),
('pengendalian-pencemaran-air', 'ppa-ba-monitoring-point-index'),
('pengendalian-pencemaran-air', 'ppa-ba-monitoring-point-create'),
('pengendalian-pencemaran-air', 'ppa-ba-monitoring-point-update'),
('pengendalian-pencemaran-air', 'ppa-ba-monitoring-point-delete'),
('pengendalian-pencemaran-air', 'ppa-ba-monitoring-point-view'),
('pengendalian-pencemaran-air', 'ppa-ba-report-bm-index'),
('pengendalian-pencemaran-air', 'ppa-ba-report-bm-create'),
('pengendalian-pencemaran-air', 'ppa-ba-report-bm-update'),
('pengendalian-pencemaran-air', 'ppa-ba-report-bm-delete'),
('pengendalian-pencemaran-air', 'ppa-ba-report-bm-view')
('pertanyaan-pengendalian-pencemaran-air', 'ppa-question-index'),
('pertanyaan-pengendalian-pencemaran-air', 'ppa-question-create'),
('pertanyaan-pengendalian-pencemaran-air', 'ppa-question-update'),
('pertanyaan-pengendalian-pencemaran-air', 'ppa-question-delete'),
('pertanyaan-pengendalian-pencemaran-air', 'ppa-question-view');

delete from codeset where cset_name in ('WWATER_TECH_CODE', 'PPA_RBM_PARAM_CODE', 'PPA_RBM_PARAM_UNIT_CODE', 'QS_UNIT_CODE', 'QS_LOAD_UNIT_CODE', 'PPA_QUESTION_TYPE_CODE', 'PPABA_MONITORING_FREQUENCY', 'PPABA_MONITORING_STATUS_PERIOD');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WWATER_TECH_CODE','AER','Aerob','Aerob','',NULL,'1487480771','1487480771','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WWATER_TECH_CODE','ANAER','Anaerob','Anaerob','',NULL,'1487480798','1487480798','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','PH','pH','pH','',NULL,'1487578197','1487578197','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','TSS','TSS','TSS','',NULL,'1487578410','1487578410','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','OIL_FAT','Minyak dan Lemak','Minyak dan Lemak','',NULL,'1487578436','1487578436','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','CL2','Cl2','Cl2','',NULL,'1487578456','1487578456','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','CR','Cr','Cr','',NULL,'1487578473','1487578473','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','CU','Tembaga (Cu)','Tembaga (Cu)','',NULL,'1487578489','1487578489','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','DBT','Debit','Debit','',NULL,'1487578698','1487578698','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_CODE','PRD','Produksi','Produksi','',NULL,'1487578712','1487578712','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_UNIT_CODE','TON_P_M','Ton/Bulan','Ton/bulan','',NULL,'1487578817','1487578817','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_UNIT_CODE','MW_P_M','MW/Bulan','MW/bulan','',NULL,'1487578841','1487578841','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_UNIT_CODE','BRL_P_M','Barrel/Bulan','Barrel/bulan','',NULL,'1487578873','1487578873','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_RBM_PARAM_UNIT_CODE','M3_P_M','m3/bulan','m3/bulan','',NULL,'1487578895','1487578895','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('QS_UNIT_CODE','MG_P_L','mg/L','mg/L','',NULL,'1487590895','1487590895','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('QS_LOAD_UNIT_CODE','TON_P_M','Ton/bulan','Ton/bulan','',NULL,'1487590957','1487590957','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_QUESTION_TYPE_CODE','GNRL','Umum','Pertanyaan Umum Ketentuan Teknis','',NULL,'1487738034','1487738034','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_QUESTION_TYPE_CODE','OIL_IND','Industri Sawit','Khusus untuk Industri Sawit melakukan Land Aplikasi ditambahkan:','',NULL,'1487738110','1487738110','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPA_QUESTION_TYPE_CODE','PETRO_IND','Industri Petrokimia','Khusus untuk Industri Petrokimia ditambahkan:','',NULL,'1487738163','1487738163','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('QS_LOAD_UNIT_CODE','GR_P_M3','Gram/m3','Gram/m3','',NULL,'1489745755','1489745755','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('QS_LOAD_UNIT_CODE','KG_P_TON','Kg/Ton','Kg/Ton','',NULL,'1489745788','1489745788','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_FREQUENCY','NON','Tidak Wajib Dipantau','Tidak Wajib Dipantau','','6','1490422256','1490422256','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_FREQUENCY','1M','1 Bulan Sekali','1 Bulan Sekali','','1','1490422281','1490422281','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_FREQUENCY','3M','3 Bulan Sekali','3 Bulan Sekali','','2','1490422296','1490422296','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_FREQUENCY','6M','6 Bulan Sekali','6 Bulan Sekali','','3','1490422310','1490422310','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_FREQUENCY','1Y','1 Tahun Sekali','1 Tahun Sekali','','4','1490422326','1490422326','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_FREQUENCY','3Y','3 Tahun Sekali','3 Tahun Sekali','','5','1490422344','1490422344','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_STATUS_PERIOD','Y','Dipantau','Dipantau','','1','1490422399','1490422399','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PPABA_MONITORING_STATUS_PERIOD','N','Tidak Dipantau','Tidak Dipantau','','2','1490422413','1490422413','8','8');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_ba` */

insert  into `ppa_ba`(`id`,`sector_id`,`power_plant_id`,`ppaba_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,1,2017,8,1490334284,8,1490334284),(2,4,2,2016,8,1490334436,8,1490334436);

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
  `ppaio_inlet_value` decimal(21,12) DEFAULT NULL,
  `ppaio_outlet_value` decimal(21,12) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ppa_inlet_outlet_report` (`ppa_report_bm_id`),
  CONSTRAINT `FK_ppa_inlet_outlet_report` FOREIGN KEY (`ppa_report_bm_id`) REFERENCES `ppa_report_bm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_inlet_outlet` */

insert  into `ppa_inlet_outlet`(`id`,`ppa_report_bm_id`,`ppaio_month`,`ppaio_year`,`ppaio_inlet_value`,`ppaio_outlet_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,7,2016,'6.300000000000','6.110000000000',8,1487653232,8,1487662500),(2,2,8,2016,'6.180000000000','7.880000000000',8,1487653232,8,1487662500),(3,2,9,2016,'7.400000000000','7.300000000000',8,1487653232,8,1487662500),(4,2,10,2016,'6.900000000000','6.800000000000',8,1487653232,8,1487662500),(5,2,11,2016,'6.270000000000','6.290000000000',8,1487653232,8,1487662500),(6,2,12,2016,'7.240000000000','8.330000000000',8,1487653232,8,1487662500),(7,2,1,2017,'6.110000000000','6.150000000000',8,1487653232,8,1487662500),(8,2,2,2017,'7.880000000000','6.200000000000',8,1487653232,8,1487662500),(9,2,3,2017,'8.020000000000','8.900000000000',8,1487653232,8,1487662500),(10,2,4,2017,'6.890000000000','8.330000000000',8,1487653232,8,1487662500),(11,2,5,2017,'0.000000000000','0.000000000000',8,1487653232,8,1487662500),(12,2,6,2017,'0.000000000000','0.000000000000',8,1487653232,8,1487662500),(13,3,7,2016,'1.000000000000','2.000000000000',8,1487663739,8,1487663739),(14,3,8,2016,'2.000000000000','4.000000000000',8,1487663739,8,1487663739),(15,3,9,2016,'3.000000000000','4.000000000000',8,1487663739,8,1487663739),(16,3,10,2016,'3.000000000000','1.000000000000',8,1487663739,8,1487663739),(17,3,11,2016,'2.000000000000','2.000000000000',8,1487663739,8,1487663739),(18,3,12,2016,'1.000000000000','3.000000000000',8,1487663739,8,1487663739),(19,3,1,2017,'0.000000000000','1.000000000000',8,1487663739,8,1487663739),(20,3,2,2017,'3.000000000000','5.000000000000',8,1487663739,8,1487663739),(21,3,3,2017,'6.000000000000','4.000000000000',8,1487663739,8,1487663739),(22,3,4,2017,'0.000000000000','1.000000000000',8,1487663739,8,1487663739),(23,3,5,2017,NULL,NULL,8,1487663739,8,1487663739),(24,3,6,2017,NULL,NULL,8,1487663739,8,1487663739),(25,4,7,2016,'2.000000000000','3.000000000000',8,1487663840,8,1490278176),(26,4,8,2016,'2.000000000000','1.000000000000',8,1487663840,8,1490278176),(27,4,9,2016,'2.000000000000','2.000000000000',8,1487663840,8,1490278176),(28,4,10,2016,'3.000000000000','1.000000000000',8,1487663840,8,1490278176),(29,4,11,2016,'2.000000000000','1.000000000000',8,1487663840,8,1490278176),(30,4,12,2016,'2.000000000000','4.000000000000',8,1487663840,8,1490278176),(31,4,1,2017,'1.300000000000','0.260000000000',8,1487663840,8,1490278176),(32,4,2,2017,'1.300000000000','0.400000000000',8,1487663840,8,1490278176),(33,4,3,2017,'0.900000000000','1.500000000000',8,1487663840,8,1490278176),(34,4,4,2017,'0.300000000000','0.400000000000',8,1487663840,8,1490278176),(35,4,5,2017,'0.000000000000','0.000000000000',8,1487663840,8,1490278176),(36,4,6,2017,'0.000000000000','0.000000000000',8,1487663840,8,1490278176),(37,5,7,2016,'0.000000000000','635.293333333336',8,1487664152,8,1489899689),(38,5,8,2016,'0.000000000000','286.589655172404',8,1487664152,8,1489899689),(39,5,9,2016,'0.000000000000','931.862068965520',8,1487664152,8,1489899689),(40,5,10,2016,'0.000000000000','2351.510344827590',8,1487664152,8,1489899689),(41,5,11,2016,'0.000000000000','1494.310344827570',8,1487664152,8,1489899689),(42,5,12,2016,'0.000000000000','733.737931034492',8,1487664152,8,1489899689),(43,5,1,2017,'0.000000000000','1649.406666666660',8,1487664152,8,1489899689),(44,5,2,2017,'0.000000000000','3331.892857142840',8,1487664152,8,1489899689),(45,5,3,2017,'0.000000000000','3742.526666666670',8,1487664152,8,1489899689),(46,5,4,2017,'0.000000000000','1649.406666666660',8,1487664152,8,1489899689),(47,5,5,2017,'0.000000000000','0.000000000000',8,1487664152,8,1489899689),(48,5,6,2017,'0.000000000000','0.000000000000',8,1487664152,8,1489899689),(49,6,7,2016,'121252677.000000000000','121252677.000000000000',8,1489745021,8,1489745021),(50,6,8,2016,'124272600.000000000000','124272600.000000000000',8,1489745021,8,1489745021),(51,6,9,2016,'130266044.000000000000','130266044.000000000000',8,1489745021,8,1489745021),(52,6,10,2016,'116507959.000000000000','116507959.000000000000',8,1489745021,8,1489745021),(53,6,11,2016,'74002945.000000000000','74002945.000000000000',8,1489745021,8,1489745021),(54,6,12,2016,'83155246.000000000000','83155246.000000000000',8,1489745021,8,1489745021),(55,6,1,2017,'77516070.000000000000','77516070.000000000000',8,1489745021,8,1489745021),(56,6,2,2017,'89188125.000000000000','89188125.000000000000',8,1489745021,8,1489745021),(57,6,3,2017,'63281098.000000000000','63281098.000000000000',8,1489745021,8,1489745021),(58,6,4,2017,'49570318.000000000000','49570318.000000000000',8,1489745021,8,1489745021),(59,6,5,2017,NULL,NULL,8,1489745021,8,1489745021),(60,6,6,2017,NULL,NULL,8,1489745021,8,1489745021);

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

insert  into `ppa_laboratorium_accreditation`(`id`,`ppa_laboratorium_id`,`lacc_number`,`lacc_end_date`,`lacc_remark`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (8,4,'LI-047-IN','2017-03-10','',8,1488604474,8,1489491325);

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

insert  into `ppa_laboratorium_test`(`id`,`ppa_laboratorium_id`,`test_month`,`test_year`,`test_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (37,4,7,2016,NULL,8,1488604474,8,1489491325),(38,4,8,2016,1,8,1488604474,8,1489491325),(39,4,9,2016,NULL,8,1488604474,8,1489491325),(40,4,10,2016,NULL,8,1488604474,8,1489491325),(41,4,11,2016,1,8,1488604474,8,1489491325),(42,4,12,2016,NULL,8,1488604474,8,1489491325),(43,4,1,2017,NULL,8,1488604474,8,1489491325),(44,4,2,2017,NULL,8,1488604474,8,1489491325),(45,4,3,2017,NULL,8,1488604474,8,1489491325),(46,4,4,2017,NULL,8,1488604474,8,1489491325),(47,4,5,2017,NULL,8,1488604474,8,1489491325),(48,4,6,2017,NULL,8,1488604474,8,1489491325);

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

insert  into `ppa_month`(`id`,`ppa_setup_permit_id`,`ppam_month`,`ppam_year`,`ppam_cert_number`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,7,2016,'1205',8,1487513541,8,1487515069),(2,1,8,2016,'1348',8,1487513541,8,1487515069),(3,1,9,2016,'1492',8,1487513541,8,1487515069),(4,1,10,2016,'1797',8,1487513541,8,1487515069),(5,1,11,2016,'1967',8,1487513541,8,1487515069),(6,1,12,2016,'1201',8,1487513541,8,1487515069),(7,1,1,2017,'2429',8,1487513541,8,1487515069),(8,1,2,2017,'2572',8,1487513541,8,1487515069),(9,1,3,2017,'2722',8,1487513541,8,1487515069),(10,1,4,2017,'2940',8,1487513541,8,1487515069),(11,1,5,2017,'',8,1487513541,8,1487515069),(12,1,6,2017,'',8,1487513541,8,1487515069);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_pollution_load_decrease` */

insert  into `ppa_pollution_load_decrease`(`id`,`ppa_id`,`ppapld_activity`,`ppapld_parameter`,`ppapld_unit`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'Kegiatan 1','param 1','mg/ton',8,1490276962,8,1490276962);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_pollution_load_decrease_year` */

insert  into `ppa_pollution_load_decrease_year`(`id`,`ppa_pollution_load_decrease_id`,`ppapldy_year`,`ppapldy_value`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,2014,'12.00000',8,1490276962,8,1490276962),(2,1,2015,'23.00000',8,1490276962,8,1490276962),(3,1,2016,'34.00000',8,1490276962,8,1490276962),(4,1,2017,'56.00000',8,1490276962,8,1490276962);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `ppa_report_bm` */

insert  into `ppa_report_bm`(`id`,`ppa_setup_permit_id`,`ppar_param_code`,`ppar_param_unit_code`,`ppar_qs_1`,`ppar_qs_2`,`ppar_qs_unit_code`,`ppar_qs_ref`,`ppar_qs_max_pollution_load`,`ppar_qs_load_unit_code`,`ppar_qs_max_pollution_load_ref`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,1,'PH','','6.00','9.00','','PermenLH 08/2009',NULL,'TON_P_M','',8,1487653232,8,1487662500),(3,1,'TSS',NULL,'100.00',NULL,'MG_P_L','PermenLH 08/2009',NULL,'TON_P_M','',8,1487663739,8,1487663739),(4,1,'OIL_FAT',NULL,NULL,NULL,'MG_P_L','PermenLH 08/2009',NULL,'TON_P_M','',8,1487663840,8,1490278176),(5,1,'DBT','M3_P_M',NULL,NULL,'','',NULL,'','',8,1487664152,8,1489899689),(6,1,'PRD','MW_P_M',NULL,NULL,'','',NULL,'','',8,1489745020,8,1489745020);

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

insert  into `ppa_setup_permit`(`id`,`ppa_id`,`ppasp_wastewater_source`,`ppasp_setup_point_name`,`ppasp_coord_ls`,`ppasp_coord_bt`,`ppasp_wastewater_tech_code`,`ppasp_permit_number`,`ppasp_permit_publisher`,`ppasp_permit_publish_date`,`ppasp_permit_end_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'PROSES UTAMA (WWTP)','OUTLET WWTP','05&deg; 31\' 20,6\"','105&deg; 21\' 12,7\"','ANAER','109 TAHUN 2012','KEMENTERIAN LINGKUNGAN HIDUP','2012-05-29','2017-05-29',8,1487513541,8,1487515069);

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

insert  into `ppa_technical_provision`(`id`,`ppa_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,1,8,1488517482,8,1489491324);

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

insert  into `ppa_technical_provision_detail`(`id`,`ppa_technical_provision_id`,`ppa_question_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (25,3,1,8,1488517483,8,1489491325),(26,3,5,8,1488517485,8,1489491325),(27,3,4,8,1488517487,8,1489491325),(28,3,2,8,1488517487,8,1489491325),(29,3,3,8,1488517487,8,1489491326),(30,3,6,8,1488517487,8,1489491326),(31,3,9,8,1488517487,8,1489491326),(32,3,7,8,1488517487,8,1489491326),(33,3,11,8,1488517487,8,1489491326),(34,3,10,8,1488517487,8,1489491326),(35,3,8,8,1488517487,8,1489491326),(36,3,12,8,1488517487,8,1489491326);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;