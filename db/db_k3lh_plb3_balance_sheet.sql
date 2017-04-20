/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.5-10.1.19-MariaDB : Database - k3lh
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_balance_sheet` */

insert  into `plb3_balance_sheet`(`id`,`sector_id`,`power_plant_id`,`plb3_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,4,2017,8,1491896765,8,1491896765),(2,2,4,23,8,1492438405,8,1492438405);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_balance_sheet_detail` */

insert  into `plb3_balance_sheet_detail`(`id`,`form_type_code`,`plb3_balance_sheet_id`,`plb3_waste_type`,`plb3_waste_source_code`,`plb3_waste_unit_code`,`plb3_previous_waste`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (40,'GD',1,'FLY ASH & BOTTOM ASH','PBWTC1','PBWUC1','189333.515000000',8,1492281063,8,1492410673),(41,'AD',1,'1232132312adwada','PBWTC3','PBWUC1','123213.000000000',8,1492366292,8,1492366292),(43,'GD',1,'asdasdwad','PBWTC1','PBWUC1','943784.000000000',8,1492416280,8,1492416280);

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
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_balance_sheet_treatment` */

insert  into `plb3_balance_sheet_treatment`(`id`,`plb3_balance_sheet_detail_id`,`plb3bst_treatment_type_code`,`plb3bst_ref`,`plb3bst_manifest_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (128,40,'PBTTC1','abc','def',8,1492281063,8,1492281063),(129,40,'PBTTC2','','',8,1492281064,8,1492281064),(130,40,'PBTTC3','0','0',8,1492281064,8,1492281064),(131,40,'PBTTC4','0','0',8,1492281064,8,1492281064),(132,40,'PBTTC5','0','0',8,1492281064,8,1492281064),(133,40,'PBTTC6','0','0',8,1492281064,8,1492281064),(134,40,'PBTTC7','0','0',8,1492281064,8,1492281064),(135,41,'PBTTC1','','',8,1492366292,8,1492366292),(136,41,'PBTTC2','','',8,1492366292,8,1492366292),(137,41,'PBTTC3','','',8,1492366292,8,1492366292),(138,41,'PBTTC4','','',8,1492366293,8,1492366293),(139,41,'PBTTC5','','',8,1492366293,8,1492366293),(140,41,'PBTTC6','','',8,1492366293,8,1492366293),(141,41,'PBTTC7','','',8,1492366293,8,1492366293),(149,43,'PBTTC1','','',8,1492416280,8,1492416280),(150,43,'PBTTC2','','',8,1492416280,8,1492416280),(151,43,'PBTTC3','','',8,1492416280,8,1492416280),(152,43,'PBTTC4','','',8,1492416280,8,1492416280),(153,43,'PBTTC5','','',8,1492416281,8,1492416281),(154,43,'PBTTC6','','',8,1492416281,8,1492416281),(155,43,'PBTTC7','','',8,1492416281,8,1492416281);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

insert into auth_item (name, type) values
('plb3-neraca', 2),
('plb3-balance-sheet-index', 1),
('plb3-balance-sheet-create', 1),
('plb3-balance-sheet-update', 1),
('plb3-balance-sheet-delete', 1),
('plb3-balance-sheet-view', 1);

insert auth_item_child (parent, child) values
('plb3-neraca', 'plb3-balance-sheet-index'),
('plb3-neraca', 'plb3-balance-sheet-create'),
('plb3-neraca', 'plb3-balance-sheet-update'),
('plb3-neraca', 'plb3-balance-sheet-delete'),
('plb3-neraca', 'plb3-balance-sheet-view'),
('Administrator', 'plb3-neraca');

insert into auth_item (name, type) values
('plb3-neraca-detail', 2),
('plb3-balance-sheet-detail-index', 1),
('plb3-balance-sheet-detail-create', 1),
('plb3-balance-sheet-detail-update', 1),
('plb3-balance-sheet-detail-delete', 1),
('plb3-balance-sheet-detail-view', 1);

insert auth_item_child (parent, child) values
('plb3-neraca-detail', 'plb3-balance-sheet-detail-index'),
('plb3-neraca-detail', 'plb3-balance-sheet-detail-create'),
('plb3-neraca-detail', 'plb3-balance-sheet-detail-update'),
('plb3-neraca-detail', 'plb3-balance-sheet-detail-delete'),
('plb3-neraca-detail', 'plb3-balance-sheet-detail-view'),
('Administrator', 'plb3-neraca-detail');

delete from codeset where cset_name in ('FORM_TYPE_CODE', 'PLB3_BS_WASTE_TYPE_CODE', 'PLB3_BS_WASTE_UNIT_CODE', 'PLB3_BS_TREATMENT_TYPE_CODE');
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('FORM_TYPE_CODE','K3','K3','K3','',NULL,1482483701,1482483701,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('FORM_TYPE_CODE','LH','Lingkungan Hidup','Lingkungan Hidup','',NULL,1482483722,1482483722,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('FORM_TYPE_CODE','AD','Dominan di Ash Disposal','Ash DIsposal','',NULL,1491901009,1491901164,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('FORM_TYPE_CODE','GD','Non Dominan Gudang LB3','Gudang LB3','',NULL,1491901030,1491901182,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_WASTE_TYPE_CODE','PBWTC1','Proses','','',NULL,1491923820,1491923820,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_WASTE_TYPE_CODE','PBWTC2','Utilitas','','',NULL,1491923832,1491923832,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_WASTE_TYPE_CODE','PBWTC3','Proses & Utilitas','','',NULL,1491923843,1491923843,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_WASTE_UNIT_CODE','PBWUC1','Ton','','',NULL,1491923955,1491923955,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC1','Dihasilkan','','',1,1491983907,1491984260,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC3','Dimanfaatkan Sendiri','','',2,1491983982,1491984633,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC4','Diolah Sendiri','','',3,1491983995,1491984624,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC5','Ditimbun Sendiri','','',4,1491984008,1491984616,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC6','Diserahkan Kepihak Ketiga Berizin','','',5,1491984024,1491984606,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC7','Tidak Dikelola','','',6,1491984048,1491984597,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_BS_TREATMENT_TYPE_CODE','PBTTC2','Disimpan di TPS','','',7,1492052493,1492052536,8,8);