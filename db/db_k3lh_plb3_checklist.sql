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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_checklist` */

insert  into `plb3_checklist`(`id`,`sector_id`,`power_plant_id`,`plb3c_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,4,2017,8,1492543020,8,1492543020);

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_checklist_answer` */

insert  into `plb3_checklist_answer`(`id`,`plb3_checklist_detail_id`,`plb3_question_id`,`plb3ca_answer`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (28,5,21,1,8,1492620466,8,1492625954),(29,5,22,0,8,1492620466,8,1492625954),(30,5,23,1,8,1492620466,8,1492625954),(31,5,24,1,8,1492620466,8,1492625954),(32,5,25,1,8,1492620466,8,1492625954),(33,5,26,1,8,1492620466,8,1492625954),(34,5,27,1,8,1492620466,8,1492625954),(35,5,29,1,8,1492620466,8,1492625954),(36,5,28,1,8,1492620466,8,1492625954),(37,6,30,1,8,1492621043,8,1492621043),(38,6,31,1,8,1492621043,8,1492621043),(39,6,45,1,8,1492621043,8,1492621043),(40,6,46,1,8,1492621043,8,1492621043),(41,6,34,1,8,1492621043,8,1492621043),(42,6,35,1,8,1492621043,8,1492621043),(43,6,37,1,8,1492621043,8,1492621043),(44,6,36,1,8,1492621043,8,1492621043),(45,7,39,1,8,1492621145,8,1492621145),(46,7,38,1,8,1492621145,8,1492621145),(47,7,42,1,8,1492621145,8,1492621145),(48,7,40,1,8,1492621145,8,1492621145),(49,7,41,1,8,1492621145,8,1492621145),(50,7,43,1,8,1492621145,8,1492621145),(51,7,44,1,8,1492621145,8,1492621145);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_checklist_detail` */

insert  into `plb3_checklist_detail`(`id`,`plb3_checklist_id`,`plb3cd_form_type_code`,`plb3cd_company_name`,`plb3cd_industrial_sector`,`plb3cd_location`,`plb3cd_assessment_team`,`plb3cd_assessment_date`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,1,'PCFTC1','PT. PLN (PERSERO) PEMBANGKITAN SBS ','ENERGI','Kab. LAMPUNG SELATAN','Penilai 1','2017-04-03',8,1492620464,8,1492625953),(6,1,'PCFTC2','PT. PLN (PERSERO) PEMBANGKITAN SBS ','ENERGI','Kab./Kota Lampung Selatan','Tim Penilai 2','2017-04-05',8,1492621041,8,1492621041),(7,1,'PCFTC3','PT. PLN (PERSERO) PEMBANGKITAN SBS ','ENERGI','Kab. LAMPUNG SELATAN','Tim Penilai 3','2017-03-14',8,1492621143,8,1492621143);

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_question` */

insert  into `plb3_question`(`id`,`plb3_form_type_code`,`plb3_question_type_code`,`plb3_question`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,'PCFTC1','PQTCP11','<p>apakah bagian luar bangunan diberi papan nama? </p>',8,1492619986,8,1492619986),(22,'PCFTC1','PQTCP11','<p>apakah bagian luar diberi simbol limbah B3 sesuai dengan karakteristik limbah B3 yang disimpan?</p>',8,1492620019,8,1492620019),(23,'PCFTC1','PQTCP12','<p>apakah pengemasan limbah B3 dilakukan sesuai dengan bentuk limbah B3?</p>',8,1492620040,8,1492620040),(24,'PCFTC1','PQTCP12','<p>apakah pengemasan limbah B3 dilakukan sesuai dengan karakteristik limbah B3?</p>',8,1492620054,8,1492620062),(25,'PCFTC1','PQTCP13','<p>apakah ada logbook/catatan untuk mencatat keluar masuk limbah limbah B3?</p>',8,1492620084,8,1492620084),(26,'PCFTC1','PQTCP13','<p>apakah jumlah dan jenis limbah B3 sesuai dengan yang tercatat di logbook/catatan?</p>',8,1492620097,8,1492620097),(27,'PCFTC1','PQTCP14','<p>apakah melakukan pengelolaan lanjutan terhadap limbah B3 yang disimpan? (diserahkan ke pihak ketiga/dimanfaatkan internal)</p>',8,1492620113,8,1492620113),(28,'PCFTC1','PQTCP15','<p>apakah memiliki SOP tanggap darurat?</p>',8,1492620127,8,1492620127),(29,'PCFTC1','PQTCP15','<p>Apakah memiliki Sistem Tanggap Darurat dalam melakukan pengelolaan limbah B3</p>',8,1492620138,8,1492620138),(30,'PCFTC2','PQTCP21','<p>apakah Jenis limbah B3 yang ditimbun sesuai dengan izin ?</p>',8,1492620154,8,1492620154),(31,'PCFTC2','PQTCP21','<p>apakah jenis limbah yang ditimbun memenuhi bakumutu TCLP?</p>',8,1492620165,8,1492620165),(34,'PCFTC2','PQTCP23','<p>apakah berada di area lokasi landfill dan memiliki 1 unit pompa?</p>',8,1492620208,8,1492620208),(35,'PCFTC2','PQTCP23','<p>apakah konstruksi pondasi, lantai dan dinding dari beton?</p>',8,1492620223,8,1492620223),(36,'PCFTC2','PQTCP24','<p>terdiakah tersedia alat tanggap darurat yang sesuai dan mudah dijangkau?</p>',8,1492620234,8,1492620976),(37,'PCFTC2','PQTCP24','<p>apakah memiliki SOP tanggap darurat?</p>',8,1492620246,8,1492620987),(38,'PCFTC3','PQTCP31','<p>Pihak ke-3 memiliki izin sebagai Pengelola limbah B3 (pengangkut/pengumpul/pengolah/pemanfaat)</p>',8,1492620262,8,1492620262),(39,'PCFTC3','PQTCP31','<p>Izin pengelolaan Limbah B3 pihak ke-3 belum habis masa berlaku</p>',8,1492620272,8,1492620272),(40,'PCFTC3','PQTCP32','<p>Perpindahan / pergerakan limbah B3 yang dilakukan oleh pihak ke-3 dilengkapi dengan dokumen manifest limbah B3</p>',8,1492620285,8,1492620285),(41,'PCFTC3','PQTCP32','<p>Pihak yang melakukan pengelola limbah B3 memperoleh salinan dokumen manifest limbah B3 sesuai dipersyaratkan</p>',8,1492620298,8,1492620298),(42,'PCFTC3','PQTCP32','<p>Dokumen manifest limbah B3 diisi sesuai dengan tatacara pengisian Dokumen Limbah B3</p>',8,1492620306,8,1492620306),(43,'PCFTC3','PQTCP33','<p>Dokumen manifest limbah B3 diisi sesuai dengan tatacara pengisian Dokumen Limbah B3</p>',8,1492620317,8,1492620317),(44,'PCFTC3','PQTCP33','<p>Kode manifest sesuai dengan yang tercantum pada rekomendasi pengangkutan limbah B3</p>',8,1492620328,8,1492620328),(45,'PCFTC2','PQTCP22','<p>apakah lapisan dasar (sub base) adalah tanah lempung yang dipadatkan dengan permeabilitas 1 x 10-9 m/det?</p>',8,1492620748,8,1492620748),(46,'PCFTC2','PQTCP22','<p>apakah permeabilitas dari sistem pendeteksi kebocoran (k) = 1 x 10-4 m/det?</p>',8,1492620759,8,1492620759);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

delete from codeset where cset_name in ('PLB3_CHECKLIST_FORM_TYPE_CODE', 'PLB3_QUESTION_TYPE_CODE_PCFTC1', 'PLB3_QUESTION_TYPE_CODE_PCFTC2', 'PLB3_QUESTION_TYPE_CODE_PCFTC3');
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_CHECKLIST_FORM_TYPE_CODE','PCFTC1','TPS','','',NULL,1492488297,1492488297,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_CHECKLIST_FORM_TYPE_CODE','PCFTC2','LandFill','','',NULL,1492488307,1492488307,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_CHECKLIST_FORM_TYPE_CODE','PCFTC3','Pihak Ketiga','','',NULL,1492488319,1492488319,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP11','Bangunan dan Penyimpanan','','',1,1492590892,1492590980,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP12','Pengemasan','','',2,1492590927,1492590927,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP13','Pemantauan','','',3,1492590941,1492590941,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP14','Pengelolaan Lanjutan','','',4,1492590955,1492590955,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC1','PQTCP15','Tanggap Darurat dan Kebersihan','','',5,1492590965,1492590965,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP21','Data Penataan','','',1,1492610220,1492610220,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP22','Rancang Bangun Fasilitas Penimbunan','','',2,1492610331,1492620705,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP23','Bak Pengumpul Lindi','','',3,1492610364,1492610364,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC2','PQTCP24','Lain Lain','','',4,1492610379,1492620932,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC3','PQTCP31','Pihak Ketiga Penerima Limbah B3 Memiliki Izin Yang Sesuai Ketentuan','','',1,1492610558,1492610558,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC3','PQTCP32','Pengangkutan Limbah B3 Memenuhi Ketentuan Yang Berlaku','','',2,1492610594,1492610594,8,8);
insert  into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_QUESTION_TYPE_CODE_PCFTC3','PQTCP33','Manifest Dan Pengelolaan Manifest Sesuai Dengan Ketentuan','','',3,1492610619,1492610619,8,8);

insert into auth_item (name, type) values
('plb3-pertanyaan', 2),
('plb3-question-index', 1),
('plb3-question-create', 1),
('plb3-question-update', 1),
('plb3-question-delete', 1),
('plb3-question-view', 1);

insert auth_item_child (parent, child) values
('plb3-pertanyaan', 'plb3-question-index'),
('plb3-pertanyaan', 'plb3-question-create'),
('plb3-pertanyaan', 'plb3-question-update'),
('plb3-pertanyaan', 'plb3-question-delete'),
('plb3-pertanyaan', 'plb3-question-view'),
('Administrator', 'plb3-pertanyaan');

insert into auth_item (name, type) values
('plb3-question-ajax-question-type', 1);

insert auth_item_child (parent, child) values
('plb3-pertanyaan', 'plb3-question-ajax-question-type');

insert into auth_item (name, type) values
('plb3-ceklist', 2),
('plb3-checklist-index', 1),
('plb3-checklist-create', 1),
('plb3-checklist-update', 1),
('plb3-checklist-delete', 1),
('plb3-checklist-view', 1);

insert auth_item_child (parent, child) values
('plb3-ceklist', 'plb3-checklist-index'),
('plb3-ceklist', 'plb3-checklist-create'),
('plb3-ceklist', 'plb3-checklist-update'),
('plb3-ceklist', 'plb3-checklist-delete'),
('plb3-ceklist', 'plb3-checklist-view'),
('Administrator', 'plb3-ceklist');

insert into auth_item (name, type) values
('plb3-ceklist-detail', 2),
('plb3-checklist-detail-index', 1),
('plb3-checklist-detail-create', 1),
('plb3-checklist-detail-update', 1),
('plb3-checklist-detail-delete', 1),
('plb3-checklist-detail-view', 1);

insert auth_item_child (parent, child) values
('plb3-ceklist-detail', 'plb3-checklist-detail-index'),
('plb3-ceklist-detail', 'plb3-checklist-detail-create'),
('plb3-ceklist-detail', 'plb3-checklist-detail-update'),
('plb3-ceklist-detail', 'plb3-checklist-detail-delete'),
('plb3-ceklist-detail', 'plb3-checklist-detail-view'),
('Administrator', 'plb3-ceklist-detail');