/*
SQLyog Enterprise - MySQL GUI
MySQL - 5.5.25a 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

insert into auth_item (name, type) values
('izin-kerja', 2),
('working-permit-index', 1),
('working-permit-create', 1),
('working-permit-update', 1),
('working-permit-delete', 1),
('working-permit-view', 1),
('working-permit-export', 1);

insert auth_item_child (parent, child) values
('Administrator', 'izin-kerja'),
('izin-kerja', 'working-permit-index'),
('izin-kerja', 'working-permit-create'),
('izin-kerja', 'working-permit-update'),
('izin-kerja', 'working-permit-delete'),
('izin-kerja', 'working-permit-view'),
('izin-kerja', 'working-permit-export');

delete from codeset where cset_name in ('WP_JOB_CLASSIFICATION', 'WP_K3_RULES', 'WP_SELF_PROTECTION', 'WP_DANGEROUS_WORK');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC1','Pipanisasi','','','1','1496806870','1496806870','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC2','Perakitan','','','2','1496806899','1496806899','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC3','Konstruksi','','','3','1496806914','1496806914','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC4','Pengelasan','','','4','1496806925','1496806925','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC5','Pemeriksaan / Inspeksi','','','5','1496806940','1496806940','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC6','Pekerjaan PVC','','','6','1496806957','1496806957','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC7','Pengecatan','','','7','1496806973','1496806973','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC8','Pekerjaan Dalam Ruang Tertutup / Terbatas','','','8','1496806997','1496806997','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC8','Penggalian','','','9','1496807008','1496807008','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC9','Isolasi','','','10','1496807020','1496807020','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC10','Instrumentasi','','','11','1496807031','1496807031','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC11','Penyetelan','','','12','1496807051','1496807051','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JC12','Kelistrikan','','','13','1496807065','1496807065','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_JOB_CLASSIFICATION','JCO','Pekerjaan Lainnya','','','14','1496807084','1496807084','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R1','Undang-undang K3 - UU No.1 tahun 1970','','','1','1496807184','1496807184','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R2','Peraturan Umum K3 untuk Kontraktor','','','2','1496807202','1496807202','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R3','Surat Izin Kerja Berbahaya','','','3','1496807222','1496807222','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R4','Syarat-syarat Kerja yang Akan Dilaksanakan','','','4','1496807244','1496807244','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R5','Claim dan Ganti Rugi','','','5','1496807260','1496807260','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R6','Pelaporan & Penyelidikan Kecelakaan','','','6','1496807282','1496807282','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','R7','P3K','','','7','1496807297','1496807297','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_K3_RULES','RO','Peraturan Lainnya','','','8','1496807316','1496807316','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP1','APD Kepala','','','1','1496807367','1496807367','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP2','APD Pernapasan','','','2','1496807381','1496807381','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP3','APD Pendengaran','','','3','1496807394','1496807394','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP4','APD Kaki','','','4','1496807405','1496807405','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP5','APD Tangan','','','5','1496807417','1496807417','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP6','APD / Pelindung Jatuh dari Ketinggian','','','6','1496807438','1496807438','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP7','APD Mata','','','7','1496807455','1496807455','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP8','APD Muka','','','8','1496807466','1496807466','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP9','Proteksi Kebakaran Jenis','','','10','1496807543','1496807543','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SP10','Rambu K3','','','9','1496807564','1496807564','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_SELF_PROTECTION','SPO','Sarana K3 Lainnya','','','11','1496807582','1496807582','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW1','Masuk Areal Kritikal / Berpotensi Bahaya Tinggi / Terlarang dan Sejenisnya, sebutkan Areal tersebut','','','10','1496807758','1496807758','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW2','Melakukan Pekerjaan Panas','','','1','1496807781','1496807781','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW3','Gudang Zat Kimia','','','2','1496807796','1496807796','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW4','Pipa Gas / Bahan Bakar','','','3','1496807813','1496807813','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW5','Basement Power Plant','','','4','1496807827','1496807827','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW6','Tangki Bahan Bakar','','','5','1496807845','1496807845','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW7','Pekerjaan Penggalian','','','6','1496807865','1496807865','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW8','Melakukan Pekerjaan di Ketinggian (semua pekerjaan yang tingginya lebih dari 2M dari atas tanah, lantai atau flatform)','','','7','1496808270','1496808270','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW9','Masuk Ruang Tertutup','','','8','1496808434','1496808434','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DW10','Tanki / Vessel','','','9','1496808451','1496808451','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('WP_DANGEROUS_WORK','DWO','Pekerjaan Berbahaya Lainnya','','','11','1496808474','1496808474','8','8');

/*Table structure for table `working_permit` */

DROP TABLE IF EXISTS `working_permit`;

CREATE TABLE `working_permit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) DEFAULT NULL,
  `wp_registration_number` varchar(150) NOT NULL,
  `wp_submit_date` date NOT NULL,
  `wp_revision_number` int(3) DEFAULT NULL,
  `wp_page` int(3) DEFAULT NULL,
  `wp_work_type` varchar(255) DEFAULT NULL,
  `wp_work_details` text,
  `wp_work_location` varchar(255) DEFAULT NULL,
  `wp_company_department` varchar(150) DEFAULT NULL,
  `wp_leader_name` varchar(150) DEFAULT NULL,
  `wp_leader_phone` varchar(15) DEFAULT NULL,
  `wp_supervisor_name` varchar(150) DEFAULT NULL,
  `wp_supervisor_phone` varchar(15) DEFAULT NULL,
  `wp_start_date` datetime DEFAULT NULL,
  `wp_end_date` datetime DEFAULT NULL,
  `wp_pln_noe` int(3) DEFAULT NULL,
  `wp_outsource_noe` int(3) DEFAULT NULL,
  `wp_job_classification` text,
  `wp_k3_rules` text,
  `wp_self_protection` text,
  `wp_dangerous_work_type` text,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_working_permit_sector` (`sector_id`),
  KEY `FK_working_permit_powerplant` (`power_plant_id`),
  CONSTRAINT `FK_working_permit_powerplant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_working_permit_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `working_permit` */

insert  into `working_permit`(`id`,`sector_id`,`power_plant_id`,`wp_registration_number`,`wp_submit_date`,`wp_revision_number`,`wp_page`,`wp_work_type`,`wp_work_details`,`wp_work_location`,`wp_company_department`,`wp_leader_name`,`wp_leader_phone`,`wp_supervisor_name`,`wp_supervisor_phone`,`wp_start_date`,`wp_end_date`,`wp_pln_noe`,`wp_outsource_noe`,`wp_job_classification`,`wp_k3_rules`,`wp_self_protection`,`wp_dangerous_work_type`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,'007.WP/LK2-KITSBS/2015','2015-09-15',NULL,NULL,'Redesign Ruang dan Pengadaan Furniture Ruang Rapat Lantai 1','Bongkar partisi dan Plafon\r\nPemasangan Partisi dan Plafon','Kantor Induk Lantai 1','PT. Ciliwung Utama Prima','Herman Irawan','0813 8060 8999','Eko Isdijanto (Site Manager)','0813 4210 2200','2015-09-19 17:00:00','2015-11-03 17:00:00',NULL,4,'JC1#|#JC4#|#JCO|!|pekerjaan lain','R1#|#R3#|#RO|!|peraturan lain','SP1#|#SP4#|#SP5#|#SP9|!|kebakaran jenis A','DW2#|#DW4#|#DW1|!|area 512#|#DWO|!|pekerjaan berbahaya lain',8,1497070367,8,1497157478);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
