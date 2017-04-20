/*
SQLyog Enterprise - MySQL GUI v7.15
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/

insert into auth_item (name, type) values
('plb3-self-assessment', 2),
('pertanyaan-plb3-self-assessment', 2),
('plb3-self-assessment-index', 1),
('plb3-self-assessment-update', 1),
('plb3-self-assessment-delete', 1),
('plb3-self-assessment-view', 1),
('plb3-sa-company-profile-index', 1),
('plb3-sa-company-profile-create', 1),
('plb3-sa-company-profile-update', 1),
('plb3-sa-company-profile-delete', 1),
('plb3-sa-company-profile-view', 1),
('plb3-sa-question-index', 1),
('plb3-sa-question-create', 1),
('plb3-sa-question-update', 1),
('plb3-sa-question-delete', 1),
('plb3-sa-question-view', 1),
('plb3-sa-form-index', 1),
('plb3-sa-form-create', 1),
('plb3-sa-form-update', 1),
('plb3-sa-form-delete', 1),
('plb3-sa-form-view', 1);

insert auth_item_child (parent, child) values
('Administrator', 'plb3-self-assessment'),
('Administrator', 'pertanyaan-plb3-self-assessment'),
('plb3-self-assessment', 'plb3-self-assessment-index'),
('plb3-self-assessment', 'plb3-self-assessment-update'),
('plb3-self-assessment', 'plb3-self-assessment-delete'),
('plb3-self-assessment', 'plb3-self-assessment-view'),
('plb3-self-assessment', 'plb3-sa-company-profile-index'),
('plb3-self-assessment', 'plb3-sa-company-profile-create'),
('plb3-self-assessment', 'plb3-sa-company-profile-update'),
('plb3-self-assessment', 'plb3-sa-company-profile-delete'),
('plb3-self-assessment', 'plb3-sa-company-profile-view'),
('pertanyaan-plb3-self-assessment', 'plb3-sa-question-index'),
('pertanyaan-plb3-self-assessment', 'plb3-sa-question-create'),
('pertanyaan-plb3-self-assessment', 'plb3-sa-question-update'),
('pertanyaan-plb3-self-assessment', 'plb3-sa-question-delete'),
('pertanyaan-plb3-self-assessment', 'plb3-sa-question-view'),
('plb3-self-assessment', 'plb3-sa-form-index'),
('plb3-self-assessment', 'plb3-sa-form-create'),
('plb3-self-assessment', 'plb3-sa-form-update'),
('plb3-self-assessment', 'plb3-sa-form-delete'),
('plb3-self-assessment', 'plb3-sa-form-view');

delete from codeset where cset_name in ('PLB3_SA_QUESTION_CATEGORY', 'PLB3_SA_QUESTION_INPUT_TYPE');
insert into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_SA_QUESTION_CATEGORY','GNRL','Umum','Umum','',1,1492342442,1492342442,8,8);
insert into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_SA_QUESTION_CATEGORY','HZRD','Pengelolaan Limbah Bahan Berbahaya dan Beracun','Pengelolaan Limbah Bahan Berbahaya dan Beracun','',2,1492342514,1492342514,8,8);
insert into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_SA_QUESTION_INPUT_TYPE','YN','Ya / Tidak','Ya / Tidak','',1,1492342645,1492342645,8,8);
insert into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_SA_QUESTION_INPUT_TYPE','QTR','Triwulan','Triwulan','',2,1492342683,1492342683,8,8);
insert into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_SA_QUESTION_INPUT_TYPE','PCT','Prosentase','Prosentase','',3,1492342723,1492342723,8,8);
insert into `codeset`(`cset_name`,`cset_code`,`cset_value`,`cset_description`,`cset_parent_pk`,`cset_order`,`created_at`,`updated_at`,`created_by`,`updated_by`) values ('PLB3_SA_QUESTION_INPUT_TYPE','FILE','File Dokumen','File Dokumen','',4,1492344463,1492344463,8,8);

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

/*Table structure for table `plb3_sa_form` */

DROP TABLE IF EXISTS `plb3_sa_form`;

CREATE TABLE `plb3_sa_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_self_assessment_id` int(11) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_self_assessment` (`plb3_self_assessment_id`),
  CONSTRAINT `FK_plb3_sa_form_self_assessment` FOREIGN KEY (`plb3_self_assessment_id`) REFERENCES `plb3_self_assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form` */

insert  into `plb3_sa_form`(`id`,`plb3_self_assessment_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,2,8,1492696547,8,1492703355);

/*Table structure for table `plb3_sa_form_detail` */

DROP TABLE IF EXISTS `plb3_sa_form_detail`;

CREATE TABLE `plb3_sa_form_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_sa_form_id` int(11) NOT NULL,
  `plb3_sa_question_id` int(11) NOT NULL,
  `plb3safd_yes_no` varchar(1) DEFAULT NULL,
  `plb3safd_percentage` int(3) DEFAULT NULL,
  `plb3safd_description` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_detail_form` (`plb3_sa_form_id`),
  KEY `FK_plb3_sa_form_detail_question` (`plb3_sa_question_id`),
  CONSTRAINT `FK_plb3_sa_form_detail_form` FOREIGN KEY (`plb3_sa_form_id`) REFERENCES `plb3_sa_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_sa_form_detail_question` FOREIGN KEY (`plb3_sa_question_id`) REFERENCES `plb3_sa_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form_detail` */

insert  into `plb3_sa_form_detail`(`id`,`plb3_sa_form_id`,`plb3_sa_question_id`,`plb3safd_yes_no`,`plb3safd_percentage`,`plb3safd_description`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,1,NULL,NULL,NULL,8,1492696547,8,1492703355),(2,3,3,'Y',NULL,'Izin Tempat Penyimpanan Sementara Ash Disposal Area',8,1492696550,8,1492703355),(3,3,4,'Y',NULL,'Izin TPS Gudang Limbah B3',8,1492696550,8,1492703355),(4,3,7,NULL,100,NULL,8,1492696550,8,1492703355),(5,3,9,'Y',NULL,'',8,1492696550,8,1492703355),(6,3,10,NULL,NULL,NULL,8,1492696550,8,1492703355),(7,3,13,'Y',NULL,'- Nama pihak ketiga : PT. SEMEN BATURAJA PERSERO\r\n- Izin/SK Nomor : 203 TAHUN 2012\r\n- Jenis Limbah B3 yang diizinkan dikelola oleh pihak ketiga : PEMANFAATAN\r\n- Instansi yang mengeluarkan izin : KEMENTERIAN LINGKUNGAN HIDUP',8,1492696550,8,1492703355),(8,3,14,'Y',NULL,'',8,1492696550,8,1492703355),(9,3,21,'Y',NULL,'',8,1492696550,8,1492703355),(10,3,16,'Y',NULL,'',8,1492696550,8,1492703355),(11,3,17,'Y',NULL,'',8,1492696550,8,1492703355),(12,3,18,'Y',NULL,'',8,1492696550,8,1492703355),(13,3,19,'Y',NULL,'',8,1492696550,8,1492703355),(14,3,20,'Y',NULL,'',8,1492696550,8,1492703355);

/*Table structure for table `plb3_sa_form_detail_static` */

DROP TABLE IF EXISTS `plb3_sa_form_detail_static`;

CREATE TABLE `plb3_sa_form_detail_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_sa_form_id` int(11) NOT NULL,
  `plb3safds_ans_1` varchar(1) DEFAULT NULL,
  `plb3safds_ans_2` varchar(1) DEFAULT NULL,
  `plb3safds_ans_3` varchar(1) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_detail_static` (`plb3_sa_form_id`),
  CONSTRAINT `FK_plb3_sa_form_detail_static` FOREIGN KEY (`plb3_sa_form_id`) REFERENCES `plb3_sa_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form_detail_static` */

insert  into `plb3_sa_form_detail_static`(`id`,`plb3_sa_form_id`,`plb3safds_ans_1`,`plb3safds_ans_2`,`plb3safds_ans_3`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,'Y','N','Y',8,1492696550,8,1492703284);

/*Table structure for table `plb3_sa_form_detail_static_quarter` */

DROP TABLE IF EXISTS `plb3_sa_form_detail_static_quarter`;

CREATE TABLE `plb3_sa_form_detail_static_quarter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plb3_sa_form_id` int(11) NOT NULL,
  `plb3safdsq_quarter` int(1) NOT NULL,
  `plb3safdsq_ans_1` varchar(1) DEFAULT NULL,
  `plb3safdsq_ans_2` varchar(1) DEFAULT NULL,
  `plb3safdsq_ans_3` varchar(1) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_form_detail_static_quarter` (`plb3_sa_form_id`),
  CONSTRAINT `FK_plb3_sa_form_detail_static_quarter` FOREIGN KEY (`plb3_sa_form_id`) REFERENCES `plb3_sa_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_form_detail_static_quarter` */

insert  into `plb3_sa_form_detail_static_quarter`(`id`,`plb3_sa_form_id`,`plb3safdsq_quarter`,`plb3safdsq_ans_1`,`plb3safdsq_ans_2`,`plb3safdsq_ans_3`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,3,3,'Y','Y','Y',8,1492696552,8,1492703355),(2,3,4,'N','N','N',8,1492696552,8,1492703355),(3,3,1,'Y','Y','Y',8,1492696552,8,1492703355),(4,3,2,'N','N','N',8,1492696552,8,1492703355);

/*Table structure for table `plb3_sa_question` */

DROP TABLE IF EXISTS `plb3_sa_question`;

CREATE TABLE `plb3_sa_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(10) NOT NULL,
  `input_type_code` varchar(10) DEFAULT NULL,
  `label` text,
  `is_question` varchar(1) NOT NULL DEFAULT 'Y',
  `parent_id` int(11) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plb3_sa_question_self` (`parent_id`),
  CONSTRAINT `FK_plb3_sa_question_self` FOREIGN KEY (`parent_id`) REFERENCES `plb3_sa_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_sa_question` */

insert  into `plb3_sa_question`(`id`,`category_code`,`input_type_code`,`label`,`is_question`,`parent_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'GNRL','FILE','<p>Jelaskan gambaran secara umum pengelolaan untuk masing-masing jenis limbah B3 yang dilakukan perusahaan Saudara, dan lengkapi dengan diagram proses produksi (maksimal 1 lembar A4):</p>','Y',NULL,8,1492344596,8,1492344596),(2,'HZRD','','<p><strong>Perizinan Pengelolaan Limbah B3</strong><strong></strong></p>','N',NULL,8,1492345665,8,1492420923),(3,'HZRD','YN','<p>- Memiliki izin pengelolaan limbah B3</p>','Y',2,8,1492345728,8,1492658462),(4,'HZRD','YN','<p>- Memiliki izin pengelolaan limbah B3</p>','Y',2,8,1492421349,8,1492421349),(5,'HZRD','','<p><strong>Pemenuhan ketentuan izin</strong><strong></strong></p>','N',NULL,8,1492421369,8,1492421369),(6,'HZRD','','<p><strong>a. Mengisi cheklist sesuai pengelolaan limbah B3 yang dilakukan (Form terlampir)</strong><strong></strong></p>','N',5,8,1492421386,8,1492421386),(7,'HZRD','PCT','<p>- Persentase pemenuhan ketentuan teknis pengelolaan limbah B3sesuai checklist yang telah diisi<br>(jika izin lebih dari satu, silahkan menambahkan baris)</p>','Y',6,8,1492421415,8,1492421415),(8,'HZRD','','<p><strong>Jumlah limbah B3 yang dikelola</strong><strong></strong></p>','N',NULL,8,1492421589,8,1492421589),(9,'HZRD','YN','- Apakah memiliki pencatatan jumlah limbah B3 yang telah dikelola selama periode penilaian','Y',8,8,1492421632,8,1492421632),(10,'HZRD','PCT','<p>-Prosentase Limbah B3 yang dikelola sesuai dengan ketentuan</p>','Y',8,8,1492421654,8,1492421654),(11,'HZRD','','<p><strong>Pengelolaan limbah B3 oleh pihak ke-3</strong><strong></strong></p>','N',NULL,8,1492421679,8,1492421679),(12,'HZRD','','<strong>a. Pengumpul/pengolah/pemanfaat/penimbun</strong><strong></strong>','N',11,8,1492421699,8,1492421699),(13,'HZRD','YN','<p>- Apakah limbah B3 dikelola oleh pihak ketiga (pengumpul/pengolah/pemanfaat/penimbun) yang berizin</p>','Y',12,8,1492421786,8,1492421786),(14,'HZRD','YN','<p>- Apakah memiliki kontrak kerja sama antara penghasil dengan pihak ketiga yang mengelola limbah B3 (pengumpul/pengolah/pemanfaat/penimbun)</p>','Y',12,8,1492421833,8,1492421833),(15,'HZRD','','<p><strong>b. Pengangkut</strong><strong></strong></p>','N',11,8,1492421865,8,1492421865),(16,'HZRD','YN','- Apakah pihak pengangkut memiliki rekomendasi pengangkutan limbah B3 dari KLH (PT. SEMEN BATURAJA PERSERO)','Y',15,8,1492421900,8,1492421900),(17,'HZRD','YN','- Apakah pihak pengangkut memiliki izin pengangkutan limbah B3 dari kementerian perhubungan ( PT. SEMEN BATURAJA PERSEO)','Y',15,8,1492421975,8,1492421975),(18,'HZRD','YN','- Apakah jenis limbah B3 yang diangkut telah sesuai dengan rekomendasi dan izin yang dimiliki oleh pihak pengangkut','Y',15,8,1492422000,8,1492422000),(19,'HZRD','YN','- Apakah pihak pengangkut memiliki dokumen manifest yang sah sesuai dengan ketentuan kep.Ka. Bapedal Nomor: Kep-02/Bapedal/09/1996','Y',15,8,1492422036,8,1492422036),(20,'HZRD','YN','- Apakah pihak pengangkut sedang memiliki permasalahan pencemaran lingkungan (PT. PRIMANRU JAYA)','Y',15,8,1492422054,8,1492422054),(21,'HZRD','YN','<p>- Apakah pihak ketiga (pengumpul/pengolah/pemanfaat/ penimbun) sedang memiliki permasalahan pencemaran lingkungan (PT. SEMEN BATURAJA PERSERO)</p>','Y',12,8,1492602290,8,1492602290);

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
  CONSTRAINT `FK_plb3_self_assessment_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_plb3_self_assessment_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `plb3_self_assessment` */

insert  into `plb3_self_assessment`(`id`,`sector_id`,`power_plant_id`,`plb3_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,4,1,2016,8,1492149488,8,1492149488);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
