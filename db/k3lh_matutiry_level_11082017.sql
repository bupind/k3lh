insert into auth_item (name, type) values
('maturity-level-title-ajax-create', 1),
('maturity-level-export', 1);

insert auth_item_child (parent, child) values
('pertanyaan-maturity-level', 'maturity-level-title-ajax-create'),
('maturity-level', 'maturity-level-export');


delete from codeset where cset_name = 'UNIT_CODE';
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('UNIT_CODE','UC1','Buah','','',NULL,'1492887010','1502425678','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('UNIT_CODE','UC2','Kali','','',NULL,'1502425697','1502425697','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('UNIT_CODE','UC3','Rupiah','','',NULL,'1502425710','1502425710','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('UNIT_CODE','UC4','Unit Induk & Pelaksana','','',NULL,'1502425730','1502425730','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('UNIT_CODE','UC5','Unit Pelaksana','','',NULL,'1502425748','1502425748','8','8');

DROP TABLE IF EXISTS `maturity_level`;

CREATE TABLE `maturity_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `mlvl_quarter` varchar(2) NOT NULL,
  `mlvl_year` int(4) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maturity_level_sector` (`sector_id`),
  CONSTRAINT `FK_maturity_level_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level` */

insert  into `maturity_level`(`id`,`sector_id`,`mlvl_quarter`,`mlvl_year`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,10,'12',1231,8,1492887754,8,1502427501);

/*Table structure for table `maturity_level_detail` */

DROP TABLE IF EXISTS `maturity_level_detail`;

CREATE TABLE `maturity_level_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maturity_level_id` int(11) NOT NULL,
  `maturity_level_question_id` int(11) NOT NULL,
  `mld_target` decimal(14,2) DEFAULT NULL,
  `mld_realization` decimal(14,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maturity_level_detail` (`maturity_level_id`),
  KEY `FK_maturity_level_detail_question` (`maturity_level_question_id`),
  CONSTRAINT `FK_maturity_level_detail` FOREIGN KEY (`maturity_level_id`) REFERENCES `maturity_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_maturity_level_detail_question` FOREIGN KEY (`maturity_level_question_id`) REFERENCES `maturity_level_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_detail` */

insert  into `maturity_level_detail`(`id`,`maturity_level_id`,`maturity_level_question_id`,`mld_target`,`mld_realization`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,19,1,'11.00','11.00',8,1492887754,8,1502427501),(2,19,2,'7329152564.00',NULL,8,1502427502,8,1502427502),(3,19,3,'68.00',NULL,8,1502427502,8,1502427502),(4,19,4,'11.00',NULL,8,1502427502,8,1502427502),(5,19,5,'4.00','4.00',8,1502427503,8,1502427503);

/*Table structure for table `maturity_level_question` */

DROP TABLE IF EXISTS `maturity_level_question`;

CREATE TABLE `maturity_level_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maturity_level_title_id` int(11) NOT NULL,
  `q_action_plan` text,
  `q_criteria` text,
  `q_unit_code` varchar(10) NOT NULL,
  `q_weight` decimal(5,2) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maturity_level_question_title` (`maturity_level_title_id`),
  CONSTRAINT `FK_maturity_level_question_title` FOREIGN KEY (`maturity_level_title_id`) REFERENCES `maturity_level_title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `maturity_level_question` */

insert  into `maturity_level_question`(`id`,`maturity_level_title_id`,`q_action_plan`,`q_criteria`,`q_unit_code`,`q_weight`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,'<p>Pimpinan unit membuat Komitmen dan kebijakan K2/K3 &amp; Keamanan</p>','<p>Komitmen dan kebijakan K2/K3 &amp; Kemanan dibuat, ditandatangani untuk seluruh Unit Induk dan Unit Pelaksana</p>','UC1','1.50',8,1492887022,8,1502425782),(2,1,'<p>Menyusun RKAP bidang K2/K3 &amp; Keamanan di unit induk yang mencakup program kerja di unit pelaksana.</p>','<p>Program kerja dan Anggaran bidang K2/K3 &amp; Keamanan Unit Induk dan Unit Pelaksana tertuang dalam RKAP per semester</p>','UC3','10.00',8,1502425822,8,1502425822),(3,2,'<p>Manajemen Unit Induk dan unit pelaksana wajib mengikuti pelatihan K2/K3</p>','<p>Peserta :<br>Unit Induk : General Manager &amp; Manajer Bidang<br>Unit Pelaksana : Manajer Area/yang setingkat,  dan Asman/ yang setingkat<br></p><p>Target pelatihan peserta adalah 1 (satu) kali per semester</p>','UC1','3.00',8,1502426652,8,1502440613),(4,2,'<p>Melakukan sertifikasi SMK3 (Sistem Manajemen K3) untuk unit induk &amp; unit pelaksana</p>','<p>Mendapatkan sertifikasi SMK3 untuk Unit induk dan seluruh unit pelaksana</p><p>Apabila Unit Induk dan Unit Pelaksana dilakukan sertifikasi secara terpadu, maka Unit Induk mendapatkan sertifikat SMK3 terpadu</p><p>Target sertifikasi :</p>','UC4','8.00',8,1502426711,8,1502441329),(5,2,'<p>Melakukan sertifikasi SMP (Sistem Manajemen Pengamanan ) untuk aset yang termasuk dalam Obyek Vital / Obyek Vital Nasional (Obvit / Obvitnas) di Unitnya</p>','<p>Mendapatkan sertifikasi SMP untuk aset Obvitnas di Unitny</p>Target:<br>- Selesai sertifikasi SMP (100%)<br>- Proses set up SMP (50%)<br>- Tidak ada progres set up SMP (0%)','UC5','7.00',8,1502426767,8,1502508645);