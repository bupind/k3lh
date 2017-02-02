-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5056
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bengkel.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(2) unsigned NOT NULL,
  `code` varchar(12) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `beginning_balance` bigint(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `fk-acc-ac-01` FOREIGN KEY (`category_id`) REFERENCES `account_category` (`id`) ON DELETE NO action ON UPDATE NO action
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.account: ~13 rows (approximately)
DELETE FROM `account`;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(1, 1, 'KAS', 'KAS', 5000000, '2013-11-27', '2013-11-27');
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(2, 1, NULL, 'PIUTANG USAHA', 0, '2013-11-25', '2013-11-25');
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(3, 1, NULL, 'BANK BCA', 0, '2013-11-27', '2013-11-27');
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(4, 1, NULL, 'BANK MANDIRI', 0, '2013-11-27', '2013-11-27');
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(5, 12, NULL, 'BEBAN LISTRIK', 0, '2013-12-03', '2013-11-28');
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(6, 12, NULL, 'BEBAN AIR', 0, '2013-12-01', '2013-12-05');
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(7, 10, NULL, 'PENJUALAN', 0, '2015-08-28', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(8, 12, NULL, 'PEMBELIAN', 0, '2015-08-28', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(9, 11, 'PDLU', 'PENDAPATAN LAIN-LAIN', 0, '2015-08-28', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(10, 6, '123', 'HUTANG PEMBELIAN', 0, '2015-09-05', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(11, 13, '500', 'PENGELUARAN', 100000, '2015-09-06', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(12, 11, 'PDT', 'Undian BCA', 0, '2015-09-06', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(13, 11, 'TIPS', 'TIPS', 0, '2015-09-06', NULL);
INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
	(14, 12, 'BRI', 'Bank BRI', 0, NULL, NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table bengkel.account_category
CREATE TABLE IF NOT EXISTS `account_category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(2) unsigned NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `fc-ac-ag` FOREIGN KEY (`group_id`) REFERENCES `account_group` (`id`) ON DELETE NO action ON UPDATE NO action
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.account_category: ~13 rows (approximately)
DELETE FROM `account_category`;
/*!40000 ALTER TABLE `account_category` DISABLE KEYS */;
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(1, 1, 'HALC', 'HARTA LANCAR');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(2, 1, 'HAI', 'HARTA INVESTASI');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(3, 1, 'HATB', 'HARTA TAK BERWUJUD');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(4, 1, 'HAT', 'HARTA TETAP');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(5, 1, 'HAL', 'HARTA LAINNYA');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(6, 2, 'HUC', 'HUTANG LANCAR');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(7, 2, 'HUJP', 'HUTANG JANGKA PANJANG');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(8, 2, 'HULL', 'HUTANG LAIN-LAIN');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(9, 3, 'MDL', 'MODAL');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(10, 4, 'PU', 'PENDAPATAN USAHA');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(11, 4, 'PLU', 'PENDAPATAN DI LUAR USAHA');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(12, 5, 'BU', 'BEBAN USAHA');
INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
	(13, 5, 'BLU', 'BEBAN DI LUAR USAHA');
/*!40000 ALTER TABLE `account_category` ENABLE KEYS */;

-- Dumping structure for table bengkel.account_group
CREATE TABLE IF NOT EXISTS `account_group` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.account_group: ~7 rows (approximately)
DELETE FROM `account_group`;
/*!40000 ALTER TABLE `account_group` DISABLE KEYS */;
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(1, 'ASET', 'ASET/HARTA');
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(2, 'KWJB', 'KEWAJIBAN');
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(3, 'EQTS', 'EQUITAS');
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(4, 'PDPT', 'PENDAPATAN');
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(5, 'PGLR', 'PENGELUARAN');
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(6, 'BDA', 'BIAYA DEPRESIASI DAN AMORTASI');
INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
	(7, 'LAIN', 'LAIN');
/*!40000 ALTER TABLE `account_group` ENABLE KEYS */;

-- Dumping structure for table bengkel.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.auth_assignment: ~17 rows (approximately)
DELETE FROM `auth_assignment`;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Accounting', '12', 1420160339);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Accounting', '19', 1430718623);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Administrator', '6', 1419223312);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Administrator', '7', 1419223993);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Kepala Cabang', '16', 1430718513);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Kepala Cabang', '17', 1430718548);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Owner', '8', 1419224032);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '10', 1420117993);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '11', 1420118327);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '13', 1420419972);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '15', 1420419972);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '18', 1430718577);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '20', 1430718669);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '21', 1430718697);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '22', 1433222686);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '23', 1434860437);
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Sales Admin', '24', 1439350656);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Dumping structure for table bengkel.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx_auth_item_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.auth_item: ~8 rows (approximately)
DELETE FROM `auth_item`;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Accounting', 1, NULL, NULL, NULL, 1419222292, 1419222292);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Administrator', 1, NULL, NULL, NULL, 1419222292, 1419222292);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Finance', 1, NULL, NULL, NULL, 1419222292, 1419222292);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Kepala Cabang', 1, NULL, NULL, NULL, 1419222292, 1419222292);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Owner', 1, NULL, NULL, NULL, 1419222292, 1419222292);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Sales Admin', 1, NULL, NULL, NULL, 1419222292, 1419222292);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('updatePaidTicket', 2, 'Update Paid Ticket', NULL, NULL, 1424848942, 1424848942);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('updateUser', 2, 'Update user', NULL, NULL, 1419222291, 1419222291);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Dumping structure for table bengkel.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.auth_item_child: ~9 rows (approximately)
DELETE FROM `auth_item_child`;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Accounting', 'updatePaidTicket');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Accounting', 'updateUser');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', 'updatePaidTicket');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', 'updateUser');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Finance', 'updatePaidTicket');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Finance', 'updateUser');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Owner', 'updatePaidTicket');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Owner', 'updateUser');
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Sales Admin', 'updateUser');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Dumping structure for table bengkel.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.auth_rule: ~0 rows (approximately)
DELETE FROM `auth_rule`;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping structure for table bengkel.bill_footer
CREATE TABLE IF NOT EXISTS `bill_footer` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `footer` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.bill_footer: ~0 rows (approximately)
DELETE FROM `bill_footer`;
/*!40000 ALTER TABLE `bill_footer` DISABLE KEYS */;
INSERT INTO `bill_footer` (`id`, `footer`) VALUES
	(1, 'Disc 25% untuk tiap sabtu pagi.\r\n');
/*!40000 ALTER TABLE `bill_footer` ENABLE KEYS */;

-- Dumping structure for table bengkel.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` tinyint(3) unsigned NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `province_id` (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.city: ~0 rows (approximately)
DELETE FROM `city`;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `province_id`, `code`, `name`) VALUES
	(1, 7, 'DJBK', 'Jambi Kota');
INSERT INTO `city` (`id`, `province_id`, `code`, `name`) VALUES
	(2, 25, 'TMBL', 'Tembilahan');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table bengkel.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(48) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `city_id` smallint(5) unsigned DEFAULT NULL,
  `province_id` tinyint(3) unsigned DEFAULT NULL,
  `zip_code` int(6) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) unsigned DEFAULT NULL,
  `price_category_id` tinyint(3) unsigned DEFAULT NULL,
  `limit` int(10) unsigned DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `province_id` (`province_id`),
  KEY `price_category_id` (`price_category_id`),
  KEY `term_of_payment_id` (`term_of_payment_id`),
  CONSTRAINT `fk-cust-city` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-cust-pricecat` FOREIGN KEY (`price_category_id`) REFERENCES `price_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-cust-prov` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-cust-top` FOREIGN KEY (`term_of_payment_id`) REFERENCES `term_of_payment` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.customer: ~0 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `city_id`, `province_id`, `zip_code`, `term_of_payment_id`, `price_category_id`, `limit`, `password`, `note`) VALUES
	(1, 'CASH', '', '', '', 1, 7, NULL, 1, 1, NULL, NULL, '');
INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `city_id`, `province_id`, `zip_code`, `term_of_payment_id`, `price_category_id`, `limit`, `password`, `note`) VALUES
	(2, 'tonny sofijan', 'tonny.chua@gmail.com', '+628192588008', 'Jl. H.M.O. Bapadal no.39 RT/RW 12/05', 1, 7, 36134, 2, 2, NULL, NULL, '');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table bengkel.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `joined_date` date NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(32) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `commission` decimal(5,2) DEFAULT NULL,
  `note` text,
  `status` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.employee: ~5 rows (approximately)
DELETE FROM `employee`;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`id`, `joined_date`, `name`, `address`, `phone`, `salary`, `commission`, `note`, `status`) VALUES
	(1, '2016-03-11', 'Tonny Sofijan', 'Cempaka Putih', '08192588008', 10000000, 20.00, '', 'Y');
INSERT INTO `employee` (`id`, `joined_date`, `name`, `address`, `phone`, `salary`, `commission`, `note`, `status`) VALUES
	(2, '2016-03-24', 'Owner', '', '0819', NULL, NULL, NULL, 'Y');
INSERT INTO `employee` (`id`, `joined_date`, `name`, `address`, `phone`, `salary`, `commission`, `note`, `status`) VALUES
	(3, '2016-03-24', 'Accounting', '', '0852', NULL, NULL, NULL, 'Y');
INSERT INTO `employee` (`id`, `joined_date`, `name`, `address`, `phone`, `salary`, `commission`, `note`, `status`) VALUES
	(4, '2016-03-24', 'Finance', '', '0812', NULL, NULL, NULL, 'Y');
INSERT INTO `employee` (`id`, `joined_date`, `name`, `address`, `phone`, `salary`, `commission`, `note`, `status`) VALUES
	(5, '2016-03-24', 'Operator', '', '0811', NULL, NULL, NULL, 'Y');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table bengkel.expense
CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `amount` int(10) unsigned NOT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `debet` (`debet`),
  KEY `credit` (`credit`),
  CONSTRAINT `fk-exps-acc-01` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-exps-acc-02` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-exps-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-exps-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.expense: ~2 rows (approximately)
DELETE FROM `expense`;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` (`id`, `invoice_no`, `debet`, `credit`, `amount`, `detail`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'EX160228-0001', 6, 1, 100000, 'bulan desember', '2016-02-28', '2016-02-28', NULL, NULL, NULL);
INSERT INTO `expense` (`id`, `invoice_no`, `debet`, `credit`, `amount`, `detail`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(2, 'EX160313-0001', 5, 3, 100000, 'ok', '2016-03-13', '2016-03-13', 5, NULL, NULL);
INSERT INTO `expense` (`id`, `invoice_no`, `debet`, `credit`, `amount`, `detail`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(3, 'EX160324-0001', 5, 3, 100000, 'bulan maret', '2016-03-24', '2016-03-24', 5, NULL, NULL);
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;

-- Dumping structure for table bengkel.income
CREATE TABLE IF NOT EXISTS `income` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `amount` int(10) unsigned NOT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `debet` (`debet`),
  KEY `credit` (`credit`),
  CONSTRAINT `fk-inc-acc-01` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-inc-acc-02` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-inc-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-inc-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.income: ~0 rows (approximately)
DELETE FROM `income`;
/*!40000 ALTER TABLE `income` DISABLE KEYS */;
INSERT INTO `income` (`id`, `invoice_no`, `debet`, `credit`, `amount`, `detail`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'IN160228-0001', 3, 12, 500000, 'horeee', '2016-02-28', '2016-02-28', NULL, NULL, NULL);
INSERT INTO `income` (`id`, `invoice_no`, `debet`, `credit`, `amount`, `detail`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(2, 'IN160324-0001', 1, 13, 50000, 'pak narto', '2016-03-24', '2016-03-24', 5, NULL, NULL);
/*!40000 ALTER TABLE `income` ENABLE KEYS */;

-- Dumping structure for table bengkel.parameter
CREATE TABLE IF NOT EXISTS `parameter` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(48) NOT NULL,
  `address` varchar(96) NOT NULL,
  `city` varchar(24) NOT NULL,
  `province` varchar(24) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `mobile` varchar(32) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `facebook` varchar(64) DEFAULT NULL,
  `twitter` varchar(64) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `slogan` varchar(128) DEFAULT NULL,
  `app_name` varchar(48) NOT NULL,
  `header` varchar(128) DEFAULT NULL,
  `footer` varchar(128) DEFAULT NULL,
  `invoice_printer` char(1) NOT NULL DEFAULT '0' COMMENT '0=struk;1=invoice;2=kwitansi',
  `receipt_printer` char(1) NOT NULL DEFAULT '1' COMMENT '0=struk;1=invoice;2=kwitansi',
  `reset_username` varchar(24) DEFAULT NULL,
  `reset_password` varchar(50) DEFAULT NULL,
  `empty_username` varchar(24) DEFAULT NULL,
  `empty_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.parameter: ~0 rows (approximately)
DELETE FROM `parameter`;
/*!40000 ALTER TABLE `parameter` DISABLE KEYS */;
INSERT INTO `parameter` (`id`, `name`, `address`, `city`, `province`, `zip_code`, `phone`, `mobile`, `pin`, `facebook`, `twitter`, `logo`, `slogan`, `app_name`, `header`, `footer`, `invoice_printer`, `receipt_printer`, `reset_username`, `reset_password`, `empty_username`, `empty_password`) VALUES
	(1, 'Bagena', 'Jl. H.M. Bapadhal', 'Jambi', 'Jambi', 0, '21212', '', '', '', '', '', '', 'Bagena', '', '', '2', '2', '', '', '', '');
/*!40000 ALTER TABLE `parameter` ENABLE KEYS */;

-- Dumping structure for table bengkel.price_category
CREATE TABLE IF NOT EXISTS `price_category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(4) NOT NULL,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.price_category: ~3 rows (approximately)
DELETE FROM `price_category`;
/*!40000 ALTER TABLE `price_category` DISABLE KEYS */;
INSERT INTO `price_category` (`id`, `code`, `name`) VALUES
	(1, 'ECR', 'ECERAN');
INSERT INTO `price_category` (`id`, `code`, `name`) VALUES
	(2, 'MBR', 'Member');
INSERT INTO `price_category` (`id`, `code`, `name`) VALUES
	(3, 'GSR', 'Grosir');
/*!40000 ALTER TABLE `price_category` ENABLE KEYS */;

-- Dumping structure for table bengkel.price_list
CREATE TABLE IF NOT EXISTS `price_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned DEFAULT NULL,
  `price_category_id` tinyint(3) unsigned DEFAULT NULL,
  `price` double(14,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `price_category_id` (`price_category_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `fk-pl-pc-01` FOREIGN KEY (`price_category_id`) REFERENCES `price_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pl-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.price_list: ~18 rows (approximately)
DELETE FROM `price_list`;
/*!40000 ALTER TABLE `price_list` DISABLE KEYS */;
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(8, 3, 1, 1600.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(9, 3, 3, 1400.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(10, 3, 2, 1100.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(11, 5, 1, 2000.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(12, 5, 2, 1900.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(13, 5, 3, 1800.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(14, 6, 1, 3000.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(15, 6, 2, 2500.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(16, 6, 3, 2800.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(18, 1, 1, 2000.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(19, 1, 2, 1900.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(20, 1, 3, 1800.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(24, 2, 1, 1600.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(25, 2, 2, 1500.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(26, 2, 3, 1400.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(27, 7, 1, 10000.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(28, 7, 2, 9000.00);
INSERT INTO `price_list` (`id`, `product_id`, `price_category_id`, `price`) VALUES
	(29, 7, 3, 8000.00);
/*!40000 ALTER TABLE `price_list` ENABLE KEYS */;

-- Dumping structure for table bengkel.printer
CREATE TABLE IF NOT EXISTS `printer` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `computer_name` varchar(32) NOT NULL,
  `computer_user` varchar(24) DEFAULT NULL,
  `computer_password` varchar(24) DEFAULT NULL,
  `printer_name` varchar(32) NOT NULL,
  `printer_type` char(1) NOT NULL,
  `printer_port` varchar(5) DEFAULT NULL,
  `print_quality` char(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.printer: ~3 rows (approximately)
DELETE FROM `printer`;
/*!40000 ALTER TABLE `printer` DISABLE KEYS */;
INSERT INTO `printer` (`id`, `computer_name`, `computer_user`, `computer_password`, `printer_name`, `printer_type`, `printer_port`, `print_quality`, `description`) VALUES
	(1, 'rio-pc', 'rio', '123456789', 'lq310', '1', 'LPT1', '0', '');
INSERT INTO `printer` (`id`, `computer_name`, `computer_user`, `computer_password`, `printer_name`, `printer_type`, `printer_port`, `print_quality`, `description`) VALUES
	(2, 'tsx220', 'tonny', '21292', 'LX310', '2', 'lpt1', '0', '');
INSERT INTO `printer` (`id`, `computer_name`, `computer_user`, `computer_password`, `printer_name`, `printer_type`, `printer_port`, `print_quality`, `description`) VALUES
	(3, 'rio-pc', 'rio', '123456789', 'lq310', '1', 'lpt1', '1', '');
/*!40000 ALTER TABLE `printer` ENABLE KEYS */;

-- Dumping structure for table bengkel.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(16) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `category_id` smallint(5) unsigned DEFAULT NULL,
  `brand_id` smallint(5) unsigned DEFAULT NULL,
  `pricelist` int(10) unsigned NOT NULL DEFAULT '0',
  `discount1` decimal(4,2) unsigned NOT NULL DEFAULT '0.00',
  `discount2` decimal(4,2) NOT NULL DEFAULT '0.00',
  `capital` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `minimum_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `unit_id` tinyint(3) unsigned DEFAULT NULL,
  `location` varchar(12) DEFAULT NULL,
  `note` text,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `unit_id` (`unit_id`),
  KEY `created_by` (`created_by`,`updated_by`),
  KEY `updated_by` (`updated_by`),
  KEY `updated_by_2` (`updated_by`),
  KEY `unit_id_2` (`unit_id`),
  CONSTRAINT `fk-product-ib-01` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-product-ic-01` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-product-unit-01` FOREIGN KEY (`unit_id`) REFERENCES `product_unit` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-product-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-product-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.product: ~6 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `code`, `name`, `category_id`, `brand_id`, `pricelist`, `discount1`, `discount2`, `capital`, `price`, `quantity`, `minimum_quantity`, `unit_id`, `location`, `note`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, NULL, 'Air Aki Biasa', 1, 1, 5000, 50.00, 0.00, 2500, 5000, 0, 0, 1, NULL, NULL, '2016-03-24', 5, NULL, NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table bengkel.product_brand
CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.product_brand: ~5 rows (approximately)
DELETE FROM `product_brand`;
/*!40000 ALTER TABLE `product_brand` DISABLE KEYS */;
INSERT INTO `product_brand` (`id`, `name`) VALUES
	(1, '-');
INSERT INTO `product_brand` (`id`, `name`) VALUES
	(2, 'Suzuki');
/*!40000 ALTER TABLE `product_brand` ENABLE KEYS */;

-- Dumping structure for table bengkel.product_category
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.product_category: ~0 rows (approximately)
DELETE FROM `product_category`;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` (`id`, `name`) VALUES
	(1, 'Air Aki');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;

-- Dumping structure for table bengkel.product_history
CREATE TABLE IF NOT EXISTS `product_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `fk-sh-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sh-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sh-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.product_history: ~2 rows (approximately)
DELETE FROM `product_history`;
/*!40000 ALTER TABLE `product_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_history` ENABLE KEYS */;

-- Dumping structure for table bengkel.product_unit
CREATE TABLE IF NOT EXISTS `product_unit` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `code` char(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.product_unit: ~0 rows (approximately)
DELETE FROM `product_unit`;
/*!40000 ALTER TABLE `product_unit` DISABLE KEYS */;
INSERT INTO `product_unit` (`id`, `name`, `code`) VALUES
	(1, 'Pieces', 'PCs');
INSERT INTO `product_unit` (`id`, `name`, `code`) VALUES
	(2, 'Set', 'SET');
/*!40000 ALTER TABLE `product_unit` ENABLE KEYS */;

-- Dumping structure for table bengkel.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(28) NOT NULL,
  `capital` varchar(24) NOT NULL,
  `iso_code` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iso_code` (`iso_code`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.province: ~34 rows (approximately)
DELETE FROM `province`;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(1, 'Aceh', 'Banda Aceh', 'ID_AC');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(2, 'Bali', 'Denpasar', 'ID_BA');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(3, 'Banten', 'Serang', 'ID_BT');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(4, 'Bengkulu', 'Bengkulu', 'ID_BE');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(5, 'Gorontalo', 'Gorontalo', 'ID_GO');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(6, 'Jakarta', 'Jakarta', 'ID_JK');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(7, 'Jambi', 'Jambi', 'ID_JA');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(8, 'Jawa Barat', 'Bandung', 'ID_JB');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(9, 'Jawa Tengah', 'Semarang', 'ID_JT');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(10, 'Jawa Timur', 'Surabaya', 'ID_JI');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(11, 'Kalimantan Barat', 'Pontianak', 'ID_KB');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(12, 'Kalimantan Selatan', 'Banjarmasin', 'ID_KS');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(13, 'Kalimantan Tengah', 'Palangkaraya', 'ID_KT');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(14, 'Kalimantan Timur', 'Samarinda', 'ID_KI');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(15, 'Kalimantan Utara', 'Tanjung Selor', 'ID_KU');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(16, 'Kepulauan Bangka Belitung', 'Pangkal Pinang', 'ID_BB');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(17, 'Kepulauan Riau', 'Pangkal Pinang', 'ID_KR');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(18, 'Lampung', 'Bandar Lampung', 'ID_LA');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(19, 'Maluku', 'Ambon', 'ID_MA');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(20, 'Maluku Utara', 'Sofifi', 'ID_MU');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(21, 'Nusa Tenggara Barat', 'Mataram', 'ID_NB');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(22, 'Nusa Tenggara Timur', 'Kupang', 'ID_NT');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(23, 'Papua', 'Jayapura', 'ID_PA');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(24, 'Papua Barat', 'Manokrawi', 'ID_PB');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(25, 'Riau', 'Pekanbaru', 'ID_RI');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(26, 'Sulawesi Barat', 'Mamuju', 'ID_SR');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(27, 'Sulawesi Selatan', 'Makassar', 'ID_SN');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(28, 'Sulawesi Tengah', 'Palu', 'ID_ST');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(29, 'Sulawesi Tenggara', 'Kendari', 'ID_SG');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(30, 'Sulawesi Utara', 'Manado', 'ID_SA');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(31, 'Sumatera Barat', 'Padang', 'ID_SB');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(32, 'Sumatera Selatan', 'Palembang', 'ID_SS');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(33, 'Sumatera Utara', 'Medan', 'ID_SU');
INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
	(34, 'Yogyakarta', 'Yogyakarta', 'ID_YO');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table bengkel.purchase_order
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) NOT NULL,
  `supplier_id` smallint(5) unsigned DEFAULT NULL,
  `receipt_id` int(10) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) DEFAULT NULL,
  `tax_id` tinyint(3) unsigned DEFAULT NULL,
  `tax_no` varchar(24) DEFAULT NULL,
  `other_costs` int(10) unsigned NOT NULL DEFAULT '0',
  `include_ppn` char(1) NOT NULL DEFAULT 'N',
  `ppn` decimal(4,2) NOT NULL DEFAULT '0.00',
  `discount` double(5,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'O' COMMENT 'O=open;L=locked;S=settled',
  `printed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `payment_id` (`receipt_id`),
  KEY `tax_id` (`tax_id`),
  KEY `term_of_payment_id` (`term_of_payment_id`),
  CONSTRAINT `fk-purch-receipt-01` FOREIGN KEY (`receipt_id`) REFERENCES `purchase_receipt` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-purch-suppl-01` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-purch-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-purch-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-purhc-tax-01` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.purchase_order: ~3 rows (approximately)
DELETE FROM `purchase_order`;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;

-- Dumping structure for table bengkel.purchase_order_detail
CREATE TABLE IF NOT EXISTS `purchase_order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `pricelist` int(10) unsigned NOT NULL DEFAULT '0',
  `disc1` decimal(4,2) NOT NULL DEFAULT '0.00',
  `disc2` decimal(4,2) NOT NULL DEFAULT '0.00',
  `price` int(10) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `purchase_id` (`order_id`),
  CONSTRAINT `fk-pod-po-01` FOREIGN KEY (`order_id`) REFERENCES `purchase_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-pod-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.purchase_order_detail: ~5 rows (approximately)
DELETE FROM `purchase_order_detail`;
/*!40000 ALTER TABLE `purchase_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_detail` ENABLE KEYS */;

-- Dumping structure for table bengkel.purchase_payment
CREATE TABLE IF NOT EXISTS `purchase_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `invoice_no` varchar(13) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `amount` int(10) unsigned NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `debet` (`debet`),
  KEY `credit` (`credit`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `fk-pp-acc-cr` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pp-acc-dr` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pp-po-01` FOREIGN KEY (`order_id`) REFERENCES `purchase_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pp-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pp-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.purchase_payment: ~7 rows (approximately)
DELETE FROM `purchase_payment`;
/*!40000 ALTER TABLE `purchase_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_payment` ENABLE KEYS */;

-- Dumping structure for table bengkel.purchase_receipt
CREATE TABLE IF NOT EXISTS `purchase_receipt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) DEFAULT NULL,
  `supplier_id` smallint(5) unsigned DEFAULT NULL,
  `total` int(10) NOT NULL,
  `printed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `fk_pr_supplier_01` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_pr_user_01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_pr_user_02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.purchase_receipt: ~0 rows (approximately)
DELETE FROM `purchase_receipt`;
/*!40000 ALTER TABLE `purchase_receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_receipt` ENABLE KEYS */;

-- Dumping structure for table bengkel.purchase_return
CREATE TABLE IF NOT EXISTS `purchase_return` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: waiting for approval, 1: approved',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `fk-pr-po-01` FOREIGN KEY (`order_id`) REFERENCES `purchase_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pr-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-pr-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.purchase_return: ~1 rows (approximately)
DELETE FROM `purchase_return`;
/*!40000 ALTER TABLE `purchase_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_return` ENABLE KEYS */;

-- Dumping structure for table bengkel.purchase_return_detail
CREATE TABLE IF NOT EXISTS `purchase_return_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `return_id` int(10) unsigned DEFAULT NULL,
  `order_detail_id` int(10) unsigned DEFAULT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `return_id` (`return_id`),
  KEY `order_detail_id` (`order_detail_id`),
  CONSTRAINT `fk-prd-pod-01` FOREIGN KEY (`order_detail_id`) REFERENCES `purchase_order_detail` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-prd-pr-01` FOREIGN KEY (`return_id`) REFERENCES `purchase_return` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.purchase_return_detail: ~1 rows (approximately)
DELETE FROM `purchase_return_detail`;
/*!40000 ALTER TABLE `purchase_return_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_return_detail` ENABLE KEYS */;

-- Dumping structure for table bengkel.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL,
  `name` varchar(48) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.role: ~7 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(1, 'ADM', 'ADMINISTRATOR');
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(2, 'OWN', 'Owner');
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(3, 'ACC', 'Accounting');
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(4, 'FINANCE', 'Finance');
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(5, 'SLA', 'Sales Admin');
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(6, 'OB', 'Office Boy');
INSERT INTO `role` (`id`, `code`, `name`) VALUES
	(7, 'BM', 'Branch Manager');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table bengkel.sale_order
CREATE TABLE IF NOT EXISTS `sale_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) NOT NULL,
  `customer_id` smallint(5) unsigned DEFAULT NULL,
  `receipt_id` int(10) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) DEFAULT NULL,
  `tax_id` tinyint(3) unsigned DEFAULT NULL,
  `tax_no` varchar(24) DEFAULT NULL,
  `other_costs` int(10) unsigned NOT NULL DEFAULT '0',
  `include_ppn` char(1) NOT NULL DEFAULT 'N',
  `ppn` decimal(4,2) NOT NULL DEFAULT '0.00',
  `discount` double(5,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'O' COMMENT 'O=Open;L=locked;S=settled',
  `printed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `payment_id` (`receipt_id`),
  KEY `tax_id` (`tax_id`),
  KEY `term_of_payment_id` (`term_of_payment_id`),
  CONSTRAINT `fk-so-cust-01` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-so-receipt-01` FOREIGN KEY (`receipt_id`) REFERENCES `sale_receipt` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-so-tax-01` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-so-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-so-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.sale_order: ~5 rows (approximately)
DELETE FROM `sale_order`;
/*!40000 ALTER TABLE `sale_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_order` ENABLE KEYS */;

-- Dumping structure for table bengkel.sale_order_detail
CREATE TABLE IF NOT EXISTS `sale_order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `capital` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `disc` double(4,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `sale_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `fk-sod-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sod-so-01` FOREIGN KEY (`order_id`) REFERENCES `sale_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.sale_order_detail: ~6 rows (approximately)
DELETE FROM `sale_order_detail`;
/*!40000 ALTER TABLE `sale_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_order_detail` ENABLE KEYS */;

-- Dumping structure for table bengkel.sale_payment
CREATE TABLE IF NOT EXISTS `sale_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `invoice_no` varchar(13) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `debet` (`debet`),
  KEY `credit` (`credit`),
  CONSTRAINT `fk-sp-acc-cr` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sp-acc-dr` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sp-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sp-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.sale_payment: ~2 rows (approximately)
DELETE FROM `sale_payment`;
/*!40000 ALTER TABLE `sale_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_payment` ENABLE KEYS */;

-- Dumping structure for table bengkel.sale_receipt
CREATE TABLE IF NOT EXISTS `sale_receipt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) DEFAULT NULL,
  `customer_id` smallint(5) unsigned DEFAULT NULL,
  `total` int(10) NOT NULL,
  `printed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `fk_sr_customer_01` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_sr_user_01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_sr_user_02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.sale_receipt: ~0 rows (approximately)
DELETE FROM `sale_receipt`;
/*!40000 ALTER TABLE `sale_receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_receipt` ENABLE KEYS */;

-- Dumping structure for table bengkel.sale_return
CREATE TABLE IF NOT EXISTS `sale_return` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(13) NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: waiting for approval, 1: approved',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_no` (`invoice_no`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `fk-sr-so-01` FOREIGN KEY (`order_id`) REFERENCES `sale_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sr-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-sr-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.sale_return: ~1 rows (approximately)
DELETE FROM `sale_return`;
/*!40000 ALTER TABLE `sale_return` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_return` ENABLE KEYS */;

-- Dumping structure for table bengkel.sale_return_detail
CREATE TABLE IF NOT EXISTS `sale_return_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `return_id` int(10) unsigned DEFAULT NULL,
  `order_detail_id` int(10) unsigned DEFAULT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `return_id` (`return_id`),
  KEY `sale_detail_id` (`order_detail_id`),
  CONSTRAINT `fk-srd-sod-01` FOREIGN KEY (`order_detail_id`) REFERENCES `sale_order_detail` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk-srd-sr-01` FOREIGN KEY (`return_id`) REFERENCES `sale_return` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.sale_return_detail: ~2 rows (approximately)
DELETE FROM `sale_return_detail`;
/*!40000 ALTER TABLE `sale_return_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_return_detail` ENABLE KEYS */;

-- Dumping structure for table bengkel.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(48) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `city_id` smallint(5) unsigned DEFAULT NULL,
  `province_id` tinyint(3) unsigned DEFAULT NULL,
  `zip_code` int(6) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) unsigned DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.supplier: ~0 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `name`, `email`, `phone`, `address`, `city_id`, `province_id`, `zip_code`, `term_of_payment_id`, `password`, `note`) VALUES
	(1, 'MEGATAMA', '', '', '', 1, 7, 36134, 1, NULL, '');
INSERT INTO `supplier` (`id`, `name`, `email`, `phone`, `address`, `city_id`, `province_id`, `zip_code`, `term_of_payment_id`, `password`, `note`) VALUES
	(2, 'Asrtindo', '', '21212', '', 1, 1, NULL, 2, NULL, '');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table bengkel.tax
CREATE TABLE IF NOT EXISTS `tax` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bengkel.tax: ~0 rows (approximately)
DELETE FROM `tax`;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax` ENABLE KEYS */;

-- Dumping structure for table bengkel.term_of_payment
CREATE TABLE IF NOT EXISTS `term_of_payment` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `name` varchar(24) NOT NULL,
  `amount` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table bengkel.term_of_payment: ~6 rows (approximately)
DELETE FROM `term_of_payment`;
/*!40000 ALTER TABLE `term_of_payment` DISABLE KEYS */;
INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
	(1, 'CASH', 'Tunai', 0);
INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
	(2, 'BANK', 'Transfer', 1);
INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
	(3, 'TOP3', 'Kredit 3', 3);
INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
	(4, 'TOP7', 'Kredit 7', 7);
INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
	(5, 'TOP15', 'Kredit 15', 15);
INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
	(6, 'TOP30', 'Kredit 30', 30);
/*!40000 ALTER TABLE `term_of_payment` ENABLE KEYS */;

-- Dumping structure for table bengkel.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` smallint(5) unsigned NOT NULL,
  `branch_id` tinyint(3) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table bengkel.user: ~5 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `employee_id`, `branch_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 'accounting', 'q-R5WGn7RqxotA4u35q3pdYOIzHHm8IB', '$2y$13$FVALODN41G78oL.m4Ed/MuNOL1DpGk3U3Y7JOdjKy/wxasFkVVoV6', NULL, 'accounting@gmail.com', 30, 10, 1419223312, 1458829783);
INSERT INTO `user` (`id`, `employee_id`, `branch_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
	(2, 2, 1, 'owner', 'BcbIKNYO3oAHyfv2Rbkt4HeZS79aCBcg', '$2y$13$mDNm.7GgjziCHAyII6IJ4eSIvOwCTiYBaKsTAzkPBTnhpNLcVFUT2', NULL, 'b@b.com', 20, 10, 1419223993, 1458829718);
INSERT INTO `user` (`id`, `employee_id`, `branch_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
	(5, 1, 1, 'tonny', 'HnE4y57oGqEFngtxia6M2Ka4W7gr2Ax0', '$2y$13$3yKtjoQ/g9P89Hbc1NaFEO/GJsaE/LzikTjNIQO1LjAoKzVA1.pLm', NULL, 'a@a.com', 10, 10, 1457708718, 1458829678);
INSERT INTO `user` (`id`, `employee_id`, `branch_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
	(6, 5, 1, 'operator', '6RUvh4yPd5RedXkdpkRncXCYqZjTiwzT', '$2y$13$SsDL7b4M69z4sAEaOkc9AeyciXRWYGJHyu1ZIXpe0rK/pEXR3MmJO', NULL, 'op@a.com', 60, 10, 1458790068, 1458829828);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
