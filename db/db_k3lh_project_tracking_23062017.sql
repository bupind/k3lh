insert into auth_item (name, type) values
('project-tracking', 2),
('project-tracking-index', 1),
('project-tracking-create', 1),
('project-tracking-update', 1),
('project-tracking-delete', 1),
('project-tracking-view', 1),
('project-tracking-detail-index', 1),
('project-tracking-detail-create', 1),
('project-tracking-detail-update', 1),
('project-tracking-detail-delete', 1),
('project-tracking-detail-view', 1);

insert auth_item_child (parent, child) values
('project-tracking', 'project-tracking-index'),
('project-tracking', 'project-tracking-create'),
('project-tracking', 'project-tracking-update'),
('project-tracking', 'project-tracking-delete'),
('project-tracking', 'project-tracking-view'),
('project-tracking', 'project-tracking-detail-index'),
('project-tracking', 'project-tracking-detail-create'),
('project-tracking', 'project-tracking-detail-update'),
('project-tracking', 'project-tracking-detail-delete'),
('project-tracking', 'project-tracking-detail-view');

insert into auth_assignment (item_name, user_id) values
('project-tracking', 8);

delete from `codeset` where `cset_name` = 'PROJECT_TRACKING_LIST';
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PROJECT_TRACKING_LIST','PTL1','MSKRM','MSKRM','',NULL,'1497947985','1497947985','8','8');
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('PROJECT_TRACKING_LIST','PTL2','SPVK3L','SPVK3L','',NULL,'1497948009','1497948009','8','8');

/*Table structure for table `project_tracking` */

DROP TABLE IF EXISTS `project_tracking`;

CREATE TABLE `project_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) DEFAULT NULL,
  `pt_name` varchar(255) NOT NULL,
  `pt_goal` varchar(255) DEFAULT NULL,
  `pt_description` text,
  `pt_owner_code` varchar(10) DEFAULT NULL,
  `pt_report_period` date DEFAULT NULL,
  `pt_controller_code` varchar(10) DEFAULT NULL,
  `pt_report_to_code` varchar(100) DEFAULT NULL,
  `pt_estimated_project_value` int(11) DEFAULT NULL,
  `pt_ao_no` varchar(100) DEFAULT NULL,
  `pt_easy_impact` varchar(1) DEFAULT NULL,
  `pt_support` varchar(100) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_tracking_sector` (`sector_id`),
  KEY `FK_project_tracking_powerplant` (`power_plant_id`),
  CONSTRAINT `FK_project_tracking_powerplant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_project_tracking_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `project_tracking` */

insert  into `project_tracking`(`id`,`sector_id`,`power_plant_id`,`pt_name`,`pt_goal`,`pt_description`,`pt_owner_code`,`pt_report_period`,`pt_controller_code`,`pt_report_to_code`,`pt_estimated_project_value`,`pt_ao_no`,`pt_easy_impact`,`pt_support`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,4,2,'Adendum UKL UPL PLTG Jakabaring','Izin lingkungan','Adendum ini perlu dilaksanakan\r\nkarena pada UKL UPL eksisting','PTL1','2017-04-01','PTL2','PTL1,PTL2',10000000,'AI No.PRK 123','H','Kepatuhan, Proper',8,1497949291,8,1498101191);

/*Table structure for table `project_tracking_detail` */

DROP TABLE IF EXISTS `project_tracking_detail`;

CREATE TABLE `project_tracking_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_tracking_id` int(11) NOT NULL,
  `ptd_step` varchar(255) NOT NULL,
  `ptd_pic_code` varchar(10) DEFAULT NULL,
  `ptd_status` varchar(1) DEFAULT NULL,
  `ptd_duration` int(4) DEFAULT NULL,
  `ptd_start_date` date DEFAULT NULL,
  `ptd_progress_percentage` decimal(4,2) DEFAULT NULL,
  `ptd_information` varchar(255) DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_project_tracking_detail` (`project_tracking_id`),
  CONSTRAINT `FK_project_tracking_detail` FOREIGN KEY (`project_tracking_id`) REFERENCES `project_tracking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `project_tracking_detail` */

insert  into `project_tracking_detail`(`id`,`project_tracking_id`,`ptd_step`,`ptd_pic_code`,`ptd_status`,`ptd_duration`,`ptd_start_date`,`ptd_progress_percentage`,`ptd_information`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,2,'Penyusunan Kerangka','PTL2','C',30,'2017-03-15','14.29','',8,1498024157,8,1498024157),(3,2,'Proses Pelaksanaan','PTL1','O',40,'2017-04-14','14.29','',8,1498024477,8,1498024477),(18,2,'Kajian Adendum','PTL2','O',60,'2017-05-24','10.00','',8,1498042400,8,1498047301);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
