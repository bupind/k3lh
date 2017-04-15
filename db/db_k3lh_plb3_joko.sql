/*
SQLyog Enterprise - MySQL GUI v7.15
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/

insert into auth_item (name, type) values
('plb3-self-assessment', 2),
('plb3-self-assessment-index', 1),
('plb3-self-assessment-update', 1),
('plb3-self-assessment-delete', 1),
('plb3-self-assessment-view', 1),
('plb3-sa-company-profile-index', 1),
('plb3-sa-company-profile-create', 1),
('plb3-sa-company-profile-update', 1),
('plb3-sa-company-profile-delete', 1),
('plb3-sa-company-profile-view', 1);

insert auth_item_child (parent, child) values
('Administrator', 'plb3-self-assessment'),
('plb3-self-assessment', 'plb3-self-assessment-index'),
('plb3-self-assessment', 'plb3-self-assessment-update'),
('plb3-self-assessment', 'plb3-self-assessment-delete'),
('plb3-self-assessment', 'plb3-self-assessment-view'),
('plb3-self-assessment', 'plb3-sa-company-profile-index'),
('plb3-self-assessment', 'plb3-sa-company-profile-create'),
('plb3-self-assessment', 'plb3-sa-company-profile-update'),
('plb3-self-assessment', 'plb3-sa-company-profile-delete'),
('plb3-self-assessment', 'plb3-sa-company-profile-view');

/*Table structure for table `plb3_sa_company_profile` */

DROP TABLE IF EXISTS `plb3_sa_company_profile`;

CREATE TABLE `plb3_sa_company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_self_assessment_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `profile_activity_loc_address` text,
  `profile_phone_fax` varchar(100) DEFAULT NULL,
  `profile_main_office_address` text,
  `profile_holding_name` varchar(255) DEFAULT NULL,
  `profile_holding_office_address` text,
  `profile_holding_phone_fax` varchar(100) DEFAULT NULL,
  `profile_company_established_year` varchar(100) DEFAULT NULL,
  `profile_industry_field` varchar(150) DEFAULT NULL,
  `profile_capital_status` varchar(150) DEFAULT NULL,
  `profile_area_factory` varchar(50) DEFAULT NULL,
  `profile_number_of_employees` varchar(150) DEFAULT NULL,
  `profile_production_capacity_installed` varchar(50) DEFAULT NULL,
  `profile_production_capacity_realization` varchar(50) DEFAULT NULL,
  `profile_raw_material` varchar(150) DEFAULT NULL,
  `profile_adjuvant_material` varchar(150) DEFAULT NULL,
  `profile_production_process` text,
  `profile_export_marketing_percentage` varchar(150) DEFAULT NULL,
  `profile_local_marketing_percentage` varchar(150) DEFAULT NULL,
  `profile_environment_document` text,
  `profile_contacts_name` text,
  `profile_contacts_mobile_phone` text,
  `profile_contacts_email` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_company_profile_sa` (`plb3_self_assessment_id`),
  CONSTRAINT `FK_plb3_sa_company_profile_sa` FOREIGN KEY (`plb3_self_assessment_id`) REFERENCES `plb3_self_assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_company_profile` */

insert  into `plb3_sa_company_profile`(`id`,`plb3_self_assessment_id`,`profile_name`,`profile_activity_loc_address`,`profile_phone_fax`,`profile_main_office_address`,`profile_holding_name`,`profile_holding_office_address`,`profile_holding_phone_fax`,`profile_company_established_year`,`profile_industry_field`,`profile_capital_status`,`profile_area_factory`,`profile_number_of_employees`,`profile_production_capacity_installed`,`profile_production_capacity_realization`,`profile_raw_material`,`profile_adjuvant_material`,`profile_production_process`,`profile_export_marketing_percentage`,`profile_local_marketing_percentage`,`profile_environment_document`,`profile_contacts_name`,`profile_contacts_mobile_phone`,`profile_contacts_email`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,'PT. PLN (PERSERO) PEMBANGKITAN SUMATERA BAGIAN SELATAN SEKTOR PEMBANGKITAN TARAHAN','JALAN LINTAS SUMATERA KM.15, KECAMATAN KATIBUNG, KABUPATEN LAMPUNG SELATAN, LAMPUNG, 35452','0721-341815/ 341819','PT. PLN (PERSERO) PEMBANGKITAN SUMATERA BAGIAN SELATAN \r\nJALAN DEMANG LEBAR DAUN NO. 375, PALEMBANG 30128','PT. PLN (PERSERO) KANTOR PUSAT','JALAN TRUNOJOYO BLOK M I/135 KEBAYORAN BARU, JAKARTA 12160','021-72616875,7261122/ 7251234','20 Februari 2008 (STO Desember 2007)','KETENAGALISTRIKAN','BADAN USAHA MILIK NEGARA','374.705 m2','121 PEGAWAI (per Mei 2016)','2 X 100 MW','2 X 100 MW','BATUBARA KELAS SUB BITUMINOUS','LIMESTONE (KAPUR)','BAHAN BAKAR (BATUBARA) --> BOILER CFB DENGAN FLUIDA AIR --> AIR BERUBAH MENJADI UAP --> UAP MEMUTAR TURBIN GENERATOR --> TRAFO STEP UP 6/11 kV MENJADI 150 kV --> GARDU INDUK NEW TARAHAN','NIHIL','MENYUPLAI SISTEM KELISTRIKAN PROVINSI LAMPUNG','AMDAL DENGAN PERSETUJUAN NOMOR : 3463/0115/SJ.T/1996 TANGGAL 03 SEPTEMBER 1996','SAHRONI ; TIZADIN ASHSEPTIAN ; MEILY PRILIANI','085378002526 ; 085268934407 ; 081214686288','s_roni16@yahoo.co.id ; tizadin2@pln.co.id ; meilypriliani@pln.co.id',8,1492163271,8,1492247368);

/*Table structure for table `plb3_self_assessment` */

DROP TABLE IF EXISTS `plb3_self_assessment`;

CREATE TABLE `plb3_self_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `plb3_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_self_assessment_power_plant` (`power_plant_id`),
  KEY `FK_plb3_self_assessment_sector` (`sector_id`),
  CONSTRAINT `FK_plb3_self_assessment_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_self_assessment_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_self_assessment` */

insert  into `plb3_self_assessment`(`id`,`sector_id`,`power_plant_id`,`plb3_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,4,1,2016,8,1492149488,8,1492149488);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
