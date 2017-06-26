/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.5.25a : Database - k3lh
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `common_upload` */

insert into auth_item (name, type) values
('unggah-umum', 2),
('common-upload-index', 1),
('common-upload-create', 1),
('common-upload-update', 1),
('common-upload-delete', 1);

insert auth_item_child (parent, child) values
('unggah-umum', 'common-upload-index'),
('unggah-umum', 'common-upload-create'),
('unggah-umum', 'common-upload-update'),
('unggah-umum', 'common-upload-delete');

insert into auth_assignment (item_name, user_id) values
('unggah-umum', 8);

delete from `codeset` where `cset_name` = 'UPLOAD_TYPE_CODE';
insert into `codeset` (`cset_name`, `cset_code`, `cset_value`, `cset_description`, `cset_parent_pk`, `cset_order`, `created_at`, `updated_at`, `created_by`, `updated_by`) values('UPLOAD_TYPE_CODE','HIRADC','HIRADC','','',NULL,'1498386240','1498386240','8','8');

DROP TABLE IF EXISTS `common_upload`;

CREATE TABLE `common_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `power_plant_id` int(11) NOT NULL,
  `upload_type_code` varchar(10) NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` smallint(5) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_common_upload_sector` (`sector_id`),
  KEY `FK_common_upload_power_plant` (`power_plant_id`),
  CONSTRAINT `FK_common_upload_power_plant` FOREIGN KEY (`power_plant_id`) REFERENCES `power_plant` (`id`),
  CONSTRAINT `FK_common_upload_sector` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `common_upload` */

insert  into `common_upload`(`id`,`sector_id`,`power_plant_id`,`upload_type_code`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,4,2,'HIRADC',8,1498390428,8,1498390428);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
