-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 08:30 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` smallint(5) unsigned NOT NULL,
  `category_id` tinyint(2) unsigned NOT NULL,
  `code` varchar(12) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `beginning_balance` bigint(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `category_id`, `code`, `name`, `beginning_balance`, `created_at`, `updated_at`) VALUES
(1, 1, 'KAS', 'KAS', 5000000, '2013-11-27', '2013-11-27'),
(2, 1, NULL, 'PIUTANG USAHA', 0, '2013-11-25', '2013-11-25'),
(3, 1, NULL, 'BANK BCA', 0, '2013-11-27', '2013-11-27'),
(4, 1, NULL, 'BANK MANDIRI', 0, '2013-11-27', '2013-11-27'),
(5, 12, NULL, 'BEBAN LISTRIK', 0, '2013-12-03', '2013-11-28'),
(6, 12, NULL, 'BEBAN AIR', 0, '2013-12-01', '2013-12-05'),
(7, 10, NULL, 'PENJUALAN', 0, '2015-08-28', NULL),
(8, 12, NULL, 'PEMBELIAN', 0, '2015-08-28', NULL),
(9, 11, '', 'PENDAPATAN LAIN-LAIN', 0, '2015-08-28', NULL),
(10, 6, '123', 'HUTANG PEMBELIAN', 0, '2015-09-05', NULL),
(11, 13, '500', 'PENGELUARAN', 100000, '2015-09-06', NULL),
(12, 11, 'PDT', 'Undian BCA', 0, '2015-09-06', NULL),
(13, 11, 'TIPS', 'TIPS', 0, '2015-09-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_category`
--

CREATE TABLE IF NOT EXISTS `account_category` (
  `id` tinyint(3) unsigned NOT NULL,
  `group_id` tinyint(2) unsigned NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_category`
--

INSERT INTO `account_category` (`id`, `group_id`, `code`, `name`) VALUES
(1, 1, 'HALC', 'HARTA LANCAR'),
(2, 1, 'HAI', 'HARTA INVESTASI'),
(3, 1, 'HATB', 'HARTA TAK BERWUJUD'),
(4, 1, 'HAT', 'HARTA TETAP'),
(5, 1, 'HAL', 'HARTA LAINNYA'),
(6, 2, 'HUC', 'HUTANG LANCAR'),
(7, 2, 'HUJP', 'HUTANG JANGKA PANJANG'),
(8, 2, 'HULL', 'HUTANG LAIN-LAIN'),
(9, 3, 'MDL', 'MODAL'),
(10, 4, 'PU', 'PENDAPATAN USAHA'),
(11, 4, 'PLU', 'PENDAPATAN DI LUAR USAHA'),
(12, 5, 'BU', 'BEBAN USAHA'),
(13, 5, 'BLU', 'BEBAN DI LUAR USAHA');

-- --------------------------------------------------------

--
-- Table structure for table `account_group`
--

CREATE TABLE IF NOT EXISTS `account_group` (
  `id` tinyint(3) unsigned NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_group`
--

INSERT INTO `account_group` (`id`, `code`, `name`) VALUES
(1, 'ASET', 'ASET/HARTA'),
(2, 'KWJB', 'KEWAJIBAN'),
(3, 'EQTS', 'EQUITAS'),
(4, 'PDPT', 'PENDAPATAN'),
(5, 'PGLR', 'PENGELUARAN'),
(6, 'BDA', 'BIAYA DEPRESIASI DAN AMORTASI'),
(7, 'LAIN', 'LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Accounting', '12', 1420160339),
('Accounting', '19', 1430718623),
('Administrator', '6', 1419223312),
('Administrator', '7', 1419223993),
('Kepala Cabang', '16', 1430718513),
('Kepala Cabang', '17', 1430718548),
('Owner', '8', 1419224032),
('Sales Admin', '10', 1420117993),
('Sales Admin', '11', 1420118327),
('Sales Admin', '13', 1420419972),
('Sales Admin', '15', 1420419972),
('Sales Admin', '18', 1430718577),
('Sales Admin', '20', 1430718669),
('Sales Admin', '21', 1430718697),
('Sales Admin', '22', 1433222686),
('Sales Admin', '23', 1434860437),
('Sales Admin', '24', 1439350656);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Accounting', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('Administrator', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('Finance', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('Kepala Cabang', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('Office Boy', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('Owner', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('Sales Admin', 1, NULL, NULL, NULL, 1419222292, 1419222292),
('updatePaidTicket', 2, 'Update Paid Ticket', NULL, NULL, 1424848942, 1424848942),
('updateUser', 2, 'Update user', NULL, NULL, 1419222291, 1419222291);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Accounting', 'updatePaidTicket'),
('Administrator', 'updatePaidTicket'),
('Finance', 'updatePaidTicket'),
('Owner', 'updatePaidTicket'),
('Accounting', 'updateUser'),
('Administrator', 'updateUser'),
('Finance', 'updateUser'),
('Office Boy', 'updateUser'),
('Owner', 'updateUser'),
('Sales Admin', 'updateUser');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_footer`
--

CREATE TABLE IF NOT EXISTS `bill_footer` (
  `id` tinyint(3) unsigned NOT NULL,
  `footer` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_footer`
--

INSERT INTO `bill_footer` (`id`, `footer`) VALUES
(1, 'Disc 25% untuk tiap sabtu pagi.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` smallint(5) unsigned NOT NULL,
  `province_id` tinyint(3) unsigned NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `province_id`, `code`, `name`) VALUES
(1, 7, 'DJBK', 'Jambi Kota');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` smallint(5) unsigned NOT NULL,
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
  `note` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `city_id`, `province_id`, `zip_code`, `term_of_payment_id`, `price_category_id`, `limit`, `password`, `note`) VALUES
(1, 'ECERAN', '', '', '', 1, 7, NULL, 1, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` smallint(5) unsigned NOT NULL,
  `joined_date` date NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(32) NOT NULL,
  `salary` int(11) NOT NULL,
  `commission` decimal(5,2) DEFAULT NULL,
  `note` text,
  `status` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(11) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `amount` int(10) unsigned NOT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(11) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `amount` int(10) unsigned NOT NULL,
  `detail` varchar(128) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `id` tinyint(3) unsigned NOT NULL,
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
  `backend_theme` varchar(24) DEFAULT NULL,
  `frontend_theme` varchar(24) DEFAULT NULL,
  `reset_username` varchar(24) DEFAULT NULL,
  `reset_password` varchar(50) DEFAULT NULL,
  `empty_username` varchar(24) DEFAULT NULL,
  `empty_password` varchar(50) DEFAULT NULL,
  `purchase_account` smallint(5) unsigned DEFAULT NULL,
  `cash_purchase_account` smallint(5) unsigned DEFAULT NULL,
  `credit_purchase_account` smallint(5) unsigned DEFAULT NULL,
  `sale_account` smallint(5) unsigned DEFAULT NULL,
  `cash_sale_account` smallint(5) unsigned DEFAULT NULL,
  `credit_sale_account` smallint(5) unsigned DEFAULT NULL,
  `expense_account` smallint(5) unsigned DEFAULT NULL,
  `income_account` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id`, `name`, `address`, `city`, `province`, `zip_code`, `phone`, `mobile`, `pin`, `facebook`, `twitter`, `logo`, `slogan`, `app_name`, `header`, `footer`, `backend_theme`, `frontend_theme`, `reset_username`, `reset_password`, `empty_username`, `empty_password`, `purchase_account`, `cash_purchase_account`, `credit_purchase_account`, `sale_account`, `cash_sale_account`, `credit_sale_account`, `expense_account`, `income_account`) VALUES
(1, 'Aneka', 'Jl. H.M. Bapadhal', 'Jambi', 'Jambi', 0, '21212', '', '', '', '', '', '', 'Aneka', '', '', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `price_category`
--

CREATE TABLE IF NOT EXISTS `price_category` (
  `id` tinyint(3) unsigned NOT NULL,
  `code` varchar(4) NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price_category`
--

INSERT INTO `price_category` (`id`, `code`, `name`) VALUES
(1, 'ECR', 'ECERAN');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE IF NOT EXISTS `price_list` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `price_category_id` tinyint(3) unsigned DEFAULT NULL,
  `price` double(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE IF NOT EXISTS `printer` (
  `id` tinyint(3) unsigned NOT NULL,
  `computer_name` varchar(32) NOT NULL,
  `computer_user` varchar(24) DEFAULT NULL,
  `computer_password` varchar(24) DEFAULT NULL,
  `printer_name` varchar(32) NOT NULL,
  `printer_type` char(1) NOT NULL,
  `printer_port` varchar(5) DEFAULT NULL,
  `print_quality` char(1) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`id`, `computer_name`, `computer_user`, `computer_password`, `printer_name`, `printer_type`, `printer_port`, `print_quality`, `description`) VALUES
(1, 'rio-pc', 'rio', '123456789', 'lq310', '4', 'LPT1', '0', ''),
(2, 'user-pc', 'User', '123456', 'lq310', '0', 'lpt1', '1', ''),
(3, 'rio-pc', 'rio', '123456789', 'lq310', '0', 'lpt1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL,
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
  `unit_id` tinyint(3) unsigned DEFAULT NULL,
  `location` varchar(12) DEFAULT NULL,
  `note` text,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `category_id`, `brand_id`, `pricelist`, `discount1`, `discount2`, `capital`, `price`, `quantity`, `unit_id`, `location`, `note`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'IDM001', 'Indomie Mi Goreng', 1, 1, 2000, '20.00', '0.00', 1600, 2000, 110, 1, '12', '', NULL, NULL, '2016-02-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` smallint(5) unsigned NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`) VALUES
(1, 'Indome');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` smallint(5) unsigned NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `product_history`
--

CREATE TABLE IF NOT EXISTS `product_history` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(11) DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(28) NOT NULL,
  `capital` varchar(24) NOT NULL,
  `iso_code` varchar(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`, `capital`, `iso_code`) VALUES
(1, 'Aceh', 'Banda Aceh', 'ID_AC'),
(2, 'Bali', 'Denpasar', 'ID_BA'),
(3, 'Banten', 'Serang', 'ID_BT'),
(4, 'Bengkulu', 'Bengkulu', 'ID_BE'),
(5, 'Gorontalo', 'Gorontalo', 'ID_GO'),
(6, 'Jakarta', 'Jakarta', 'ID_JK'),
(7, 'Jambi', 'Jambi', 'ID_JA'),
(8, 'Jawa Barat', 'Bandung', 'ID_JB'),
(9, 'Jawa Tengah', 'Semarang', 'ID_JT'),
(10, 'Jawa Timur', 'Surabaya', 'ID_JI'),
(11, 'Kalimantan Barat', 'Pontianak', 'ID_KB'),
(12, 'Kalimantan Selatan', 'Banjarmasin', 'ID_KS'),
(13, 'Kalimantan Tengah', 'Palangkaraya', 'ID_KT'),
(14, 'Kalimantan Timur', 'Samarinda', 'ID_KI'),
(15, 'Kalimantan Utara', 'Tanjung Selor', 'ID_KU'),
(16, 'Kepulauan Bangka Belitung', 'Pangkal Pinang', 'ID_BB'),
(17, 'Kepulauan Riau', 'Pangkal Pinang', 'ID_KR'),
(18, 'Lampung', 'Bandar Lampung', 'ID_LA'),
(19, 'Maluku', 'Ambon', 'ID_MA'),
(20, 'Maluku Utara', 'Sofifi', 'ID_MU'),
(21, 'Nusa Tenggara Barat', 'Mataram', 'ID_NB'),
(22, 'Nusa Tenggara Timur', 'Kupang', 'ID_NT'),
(23, 'Papua', 'Jayapura', 'ID_PA'),
(24, 'Papua Barat', 'Manokrawi', 'ID_PB'),
(25, 'Riau', 'Pekanbaru', 'ID_RI'),
(26, 'Sulawesi Barat', 'Mamuju', 'ID_SR'),
(27, 'Sulawesi Selatan', 'Makassar', 'ID_SN'),
(28, 'Sulawesi Tengah', 'Palu', 'ID_ST'),
(29, 'Sulawesi Tenggara', 'Kendari', 'ID_SG'),
(30, 'Sulawesi Utara', 'Manado', 'ID_SA'),
(31, 'Sumatera Barat', 'Padang', 'ID_SB'),
(32, 'Sumatera Selatan', 'Palembang', 'ID_SS'),
(33, 'Sumatera Utara', 'Medan', 'ID_SU'),
(34, 'Yogyakarta', 'Yogyakarta', 'ID_YO');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(13) NOT NULL,
  `supplier_id` smallint(5) unsigned DEFAULT NULL,
  `receipt_id` int(10) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) unsigned DEFAULT NULL,
  `tax_id` tinyint(3) unsigned DEFAULT NULL,
  `tax_no` varchar(24) DEFAULT NULL,
  `other_costs` int(10) unsigned NOT NULL DEFAULT '0',
  `include_ppn` char(1) NOT NULL DEFAULT 'N',
  `ppn` decimal(4,2) NOT NULL DEFAULT '0.00',
  `discount` double(5,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'O' COMMENT 'O=open;L=locked;S=settled',
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `invoice_no`, `supplier_id`, `receipt_id`, `term_of_payment_id`, `tax_id`, `tax_no`, `other_costs`, `include_ppn`, `ppn`, `discount`, `total`, `status`, `print`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, 'PO160223-0001', 1, NULL, 1, NULL, NULL, 0, 'N', '0.00', 0.00, 12800.00, 'S', 0, '2016-02-23', '2016-02-23', NULL, '2016-02-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_order_detail` (
  `id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `pricelist` int(10) unsigned NOT NULL DEFAULT '0',
  `disc1` decimal(4,2) NOT NULL DEFAULT '0.00',
  `disc2` decimal(4,2) NOT NULL DEFAULT '0.00',
  `price` int(10) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`id`, `order_id`, `product_id`, `pricelist`, `disc1`, `disc2`, `price`, `quantity`) VALUES
(2, 6, 1, 2000, '20.00', '0.00', 1600, 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE IF NOT EXISTS `purchase_payment` (
  `id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `invoice_no` varchar(13) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_payment`
--

INSERT INTO `purchase_payment` (`id`, `order_id`, `invoice_no`, `debet`, `credit`, `note`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(10, 6, 'PO160224-0001', 3, NULL, '', '2016-02-24', '2016-02-24', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt`
--

CREATE TABLE IF NOT EXISTS `purchase_receipt` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(13) DEFAULT NULL,
  `total` int(10) NOT NULL,
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE IF NOT EXISTS `purchase_return` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(13) NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: waiting for approval, 1: approved',
  `date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_return_detail` (
  `id` int(10) unsigned NOT NULL,
  `return_id` int(10) unsigned DEFAULT NULL,
  `order_detail_id` int(10) unsigned DEFAULT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` tinyint(3) unsigned NOT NULL,
  `code` varchar(8) NOT NULL,
  `name` varchar(48) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `code`, `name`) VALUES
(1, 'ADM', 'ADMINISTRATOR'),
(2, 'OWN', 'Owner'),
(3, 'ACC', 'Accounting'),
(4, 'FINANCE', 'Finance'),
(5, 'SLA', 'Sales Admin'),
(6, 'OB', 'Office Boy'),
(7, 'BM', 'Branch Manager');

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE IF NOT EXISTS `sale_order` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(13) NOT NULL,
  `customer_id` smallint(5) unsigned DEFAULT NULL,
  `receipt_id` int(10) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) unsigned DEFAULT NULL,
  `tax_id` tinyint(3) unsigned DEFAULT NULL,
  `tax_no` varchar(24) DEFAULT NULL,
  `other_costs` int(10) unsigned NOT NULL DEFAULT '0',
  `include_ppn` char(1) NOT NULL DEFAULT 'N',
  `ppn` decimal(4,2) NOT NULL DEFAULT '0.00',
  `discount` double(5,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'N',
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_detail`
--

CREATE TABLE IF NOT EXISTS `sale_order_detail` (
  `id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `capital` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `disc` double(4,2) unsigned DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_payment`
--

CREATE TABLE IF NOT EXISTS `sale_payment` (
  `id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `invoice_no` varchar(13) DEFAULT NULL,
  `debet` smallint(5) unsigned DEFAULT NULL,
  `credit` smallint(5) unsigned DEFAULT NULL,
  `method` char(2) NOT NULL DEFAULT 'DR' COMMENT 'DR=debit;CR=credit',
  `total` int(10) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'O' COMMENT 'O=Open;L=locked;S=settled',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_receipt`
--

CREATE TABLE IF NOT EXISTS `sale_receipt` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(13) DEFAULT NULL,
  `total` int(10) NOT NULL,
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_return`
--

CREATE TABLE IF NOT EXISTS `sale_return` (
  `id` int(10) unsigned NOT NULL,
  `invoice_no` varchar(13) NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `print` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0: waiting for approval, 1: approved',
  `date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_return_detail`
--

CREATE TABLE IF NOT EXISTS `sale_return_detail` (
  `id` int(10) unsigned NOT NULL,
  `return_id` int(10) unsigned DEFAULT NULL,
  `order_detail_id` int(10) unsigned DEFAULT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` smallint(5) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` smallint(5) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` smallint(5) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(48) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `city_id` smallint(5) unsigned DEFAULT NULL,
  `province_id` tinyint(3) unsigned DEFAULT NULL,
  `zip_code` int(6) unsigned DEFAULT NULL,
  `term_of_payment_id` tinyint(3) unsigned DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `phone`, `address`, `city_id`, `province_id`, `zip_code`, `term_of_payment_id`, `password`, `note`) VALUES
(1, 'MEGATAMA', '', '', '', 1, 7, 36134, 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` tinyint(3) unsigned NOT NULL,
  `code` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `amount` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_of_payment`
--

CREATE TABLE IF NOT EXISTS `term_of_payment` (
  `id` tinyint(3) unsigned NOT NULL,
  `code` varchar(6) NOT NULL,
  `name` varchar(24) NOT NULL,
  `amount` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `term_of_payment`
--

INSERT INTO `term_of_payment` (`id`, `code`, `name`, `amount`) VALUES
(1, 'CASH', 'Tunai', 0),
(2, 'CREDIT', 'Kredit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(24) NOT NULL,
  `code` char(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `code`) VALUES
(1, 'Pieces', 'PCs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL,
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
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `employee_id`, `branch_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'abun', 't-skOKowBtxDXoOgfjm4KNbsFaIdcw10', '$2y$13$9c9g1Q4RHJ6yR7a/0qNhTe2HbcxPweRoRmOaB2TakvrGaNqcOXwJ2', NULL, 'abunsandi.nas@gmail.com', 10, 10, 1419223312, 1432514607),
(2, 2, 1, 'tonnyadm', 'Pi3TKtm3BvSzTHitbfwwp_p9_25gnKm4', '$2y$13$7SpG8RvKfN4aeMcG0vWcoeheM6jUXNZWbs4JUtChpQ21SUSrGBzFa', NULL, 'tonny.chua@gmail.com', 10, 10, 1419223993, 1430717698),
(3, 5, 1, 'IKA', '5yk-cyl2FKAmNerBRdk0ykWNVBNKs78G', '$2y$13$Ruc/2uY.UQcEnYExmlE7NOEoe9H5CyKT/FwwVkBKHP8TeQrVfZ51a', NULL, 'nusantara.tour@yahoo.com', 10, 10, 1420117993, 1420117993),
(4, 6, 1, 'LARAS', 'QX1mMKXVBJ2bEfAHC-1xmg2vJNoGOHcd', '$2y$13$w1BgsxE3gCGjCJGPQaYOJuHTDdtJvsOvf2irqW.DObCz8ZPHBcVam', NULL, 'nusantara.tour@yahoo.co.id', 10, 10, 1420118327, 1420160134);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `account_category`
--
ALTER TABLE `account_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `account_group`
--
ALTER TABLE `account_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx_auth_item_type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `bill_footer`
--
ALTER TABLE `bill_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `price_category_id` (`price_category_id`),
  ADD KEY `term_of_payment_id` (`term_of_payment_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `debet` (`debet`),
  ADD KEY `credit` (`credit`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `debet` (`debet`),
  ADD KEY `credit` (`credit`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_category`
--
ALTER TABLE `price_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_category_id` (`price_category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `created_by` (`created_by`,`updated_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `updated_by_2` (`updated_by`),
  ADD KEY `unit_id_2` (`unit_id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_history`
--
ALTER TABLE `product_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iso_code` (`iso_code`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `payment_id` (`receipt_id`),
  ADD KEY `tax_id` (`tax_id`),
  ADD KEY `term_of_payment_id` (`term_of_payment_id`);

--
-- Indexes for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `purchase_id` (`order_id`);

--
-- Indexes for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `debet` (`debet`),
  ADD KEY `credit` (`credit`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `purchase_receipt`
--
ALTER TABLE `purchase_receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `purchase_return_detail`
--
ALTER TABLE `purchase_return_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_id` (`return_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `order_detail_id` (`order_detail_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `payment_id` (`receipt_id`),
  ADD KEY `tax_id` (`tax_id`),
  ADD KEY `term_of_payment_id` (`term_of_payment_id`);

--
-- Indexes for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `sale_payment`
--
ALTER TABLE `sale_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `debet` (`debet`),
  ADD KEY `credit` (`credit`);

--
-- Indexes for table `sale_receipt`
--
ALTER TABLE `sale_receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `sale_return`
--
ALTER TABLE `sale_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `sale_return_detail`
--
ALTER TABLE `sale_return_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_id` (`return_id`),
  ADD KEY `sale_detail_id` (`order_detail_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_of_payment`
--
ALTER TABLE `term_of_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `account_category`
--
ALTER TABLE `account_category`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `account_group`
--
ALTER TABLE `account_group`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bill_footer`
--
ALTER TABLE `bill_footer`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `price_category`
--
ALTER TABLE `price_category`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `printer`
--
ALTER TABLE `printer`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_history`
--
ALTER TABLE `product_history`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchase_receipt`
--
ALTER TABLE `purchase_receipt`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_return_detail`
--
ALTER TABLE `purchase_return_detail`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_payment`
--
ALTER TABLE `sale_payment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_receipt`
--
ALTER TABLE `sale_receipt`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_return`
--
ALTER TABLE `sale_return`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_return_detail`
--
ALTER TABLE `sale_return_detail`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `term_of_payment`
--
ALTER TABLE `term_of_payment`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk-acc-ac-01` FOREIGN KEY (`category_id`) REFERENCES `account_category` (`id`) ON DELETE NO action ON UPDATE NO action;

--
-- Constraints for table `account_category`
--
ALTER TABLE `account_category`
  ADD CONSTRAINT `fc-ac-ag` FOREIGN KEY (`group_id`) REFERENCES `account_group` (`id`) ON DELETE NO action ON UPDATE NO action;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk-cust-city` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-cust-pricecat` FOREIGN KEY (`price_category_id`) REFERENCES `price_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-cust-prov` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-cust-top` FOREIGN KEY (`term_of_payment_id`) REFERENCES `term_of_payment` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `fk-exps-acc-01` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-exps-acc-02` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-exps-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-exps-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `fk-inc-acc-01` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-inc-acc-02` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-inc-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-inc-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `price_list`
--
ALTER TABLE `price_list`
  ADD CONSTRAINT `fk-pl-pc-01` FOREIGN KEY (`price_category_id`) REFERENCES `price_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pl-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk-product-ib-01` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-product-ic-01` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-product-unit-01` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-product-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-product-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_history`
--
ALTER TABLE `product_history`
  ADD CONSTRAINT `fk-sh-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sh-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sh-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `fk-purch-receipt-01` FOREIGN KEY (`receipt_id`) REFERENCES `purchase_receipt` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-purch-suppl-01` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-purch-top_01` FOREIGN KEY (`term_of_payment_id`) REFERENCES `term_of_payment` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-purch-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-purch-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-purhc-tax-01` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD CONSTRAINT `fk-pod-po-01` FOREIGN KEY (`order_id`) REFERENCES `purchase_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pod-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD CONSTRAINT `fk-pp-acc-cr` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pp-acc-dr` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pp-po-01` FOREIGN KEY (`order_id`) REFERENCES `purchase_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pp-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pp-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD CONSTRAINT `fk-pr-po-01` FOREIGN KEY (`order_id`) REFERENCES `purchase_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pr-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-pr-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `purchase_return_detail`
--
ALTER TABLE `purchase_return_detail`
  ADD CONSTRAINT `fk-prd-pod-01` FOREIGN KEY (`order_detail_id`) REFERENCES `purchase_order_detail` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-prd-pr-01` FOREIGN KEY (`return_id`) REFERENCES `purchase_return` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-prd-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-prd-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD CONSTRAINT `fk-so-cust-01` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-so-receipt-01` FOREIGN KEY (`receipt_id`) REFERENCES `sale_receipt` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-so-tax-01` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-so-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-so-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  ADD CONSTRAINT `fk-sod-product-01` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sod-so-01` FOREIGN KEY (`order_id`) REFERENCES `sale_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sale_payment`
--
ALTER TABLE `sale_payment`
  ADD CONSTRAINT `fk-sp-acc-cr` FOREIGN KEY (`credit`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sp-acc-dr` FOREIGN KEY (`debet`) REFERENCES `account` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sp-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sp-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sale_return`
--
ALTER TABLE `sale_return`
  ADD CONSTRAINT `fk-sr-so-01` FOREIGN KEY (`order_id`) REFERENCES `sale_order` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sr-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-sr-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sale_return_detail`
--
ALTER TABLE `sale_return_detail`
  ADD CONSTRAINT `fk-srd-sod-01` FOREIGN KEY (`order_detail_id`) REFERENCES `sale_order_detail` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-srd-sr-01` FOREIGN KEY (`return_id`) REFERENCES `sale_return` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-srd-user-01` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-srd-user-02` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
