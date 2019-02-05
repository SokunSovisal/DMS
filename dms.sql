-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 07:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `co_id` int(11) NOT NULL,
  `co_name_en` varchar(255) NOT NULL,
  `co_name_kh` varchar(191) NOT NULL,
  `co_type` varchar(255) NOT NULL,
  `co_vat_no` varchar(11) DEFAULT NULL,
  `co_phone` varchar(255) NOT NULL,
  `co_email` varchar(255) NOT NULL,
  `co_address` varchar(255) NOT NULL,
  `co_register_date` date NOT NULL,
  `co_em_id` int(11) NOT NULL,
  `co_description` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`co_id`, `co_name_en`, `co_name_kh`, `co_type`, `co_vat_no`, `co_phone`, `co_email`, `co_address`, `co_register_date`, `co_em_id`, `co_description`, `created_date`, `updated_date`) VALUES
(1, 'BSS Solution TM', 'ប៊ីអេសអេស សូឡូសិន ខូអិលធីឌី', 'Technology', '0', '096 560 0934', 'me@me.com', 'Phnom Penh', '2019-01-01', 1, 'Tax Audition', '2019-01-09 03:57:32', '2019-02-02 06:11:33'),
(2, 'GMM Mart Management', '', 'Technology', NULL, '096 560 0934', 'gmm@bty.com', 'Phnom Penh', '2019-01-10', 2, 'Technology company', '2019-01-09 04:00:34', '2019-01-09 04:04:49'),
(3, 'GMM Coffee & Beverage', '', 'Food and Drink', NULL, '096 560 0934', 'me@bty.com', 'Phnom Penh', '2019-01-10', 2, 'GMM Coffee & Beverage\r\nFood and Drink', '2019-01-09 07:15:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_description` text NOT NULL,
  `doc_service_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`doc_id`, `doc_name`, `doc_description`, `doc_service_id`, `created_at`, `updated_at`) VALUES
(1, 'Certificate of tourism', '1 copy 2019', 1, '2019-01-10 08:38:37', '2019-01-11 07:22:31'),
(2, 'Photo', 'Photo 4x6', 1, '2019-01-10 08:38:37', '0000-00-00 00:00:00'),
(3, 'Patent', 'Patent 1 copy', 1, '2019-01-10 08:38:37', '0000-00-00 00:00:00'),
(4, 'hello world', 'This is a document for test', 1, '2019-01-11 07:17:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `em_id` int(11) NOT NULL,
  `em_name` varchar(255) NOT NULL,
  `em_gender` char(6) NOT NULL,
  `em_phone` varchar(255) NOT NULL,
  `em_email` varchar(255) NOT NULL,
  `em_position` varchar(255) NOT NULL,
  `em_join_date` date NOT NULL,
  `em_status` int(11) NOT NULL,
  `em_description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`em_id`, `em_name`, `em_gender`, `em_phone`, `em_email`, `em_position`, `em_join_date`, `em_status`, `em_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dara Phan', 'Male', '096451575', 'dara@gmail.com', 'Tax Audition', '2013-01-01', 0, 'Tax Audition', 12, 12, '2019-01-09 03:49:13', '2019-01-09 09:53:36'),
(2, 'Phanuth Soeum', 'Female', '010434310', 'dara@gmail.com', 'Tax Audition', '2017-01-16', 0, 'Tax Audition', 12, 12, '2019-01-09 03:50:28', '2019-01-09 09:05:28'),
(3, 'Chanthy Chum', 'Female', '4546565', 'me@bty.com', 'Manager', '2015-01-01', 1, 'Manager', 0, 0, '2019-01-09 09:29:01', '2019-01-09 09:48:31'),
(4, 'Nita Moun', 'Female', '4546565', 'me@bty.com', 'Manager', '2015-01-01', 1, 'Manager', 0, 0, '2019-01-09 09:42:29', '2019-01-09 09:48:12'),
(5, 'Tey Socheatha', 'Male', '0882195196', 'teysocheatha@yahoo.com', 'Manager', '2019-01-09', 1, 'des', 0, 0, '2019-01-09 12:59:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `inv_id` int(11) NOT NULL,
  `inv_number` varchar(255) NOT NULL,
  `inv_date` varchar(255) NOT NULL,
  `inv_customer` varchar(255) DEFAULT NULL,
  `inv_company_name_en` varchar(255) DEFAULT NULL,
  `inv_company_name_kh` varchar(255) DEFAULT NULL,
  `inv_company_vat` varchar(255) DEFAULT NULL,
  `inv_company_phone` varchar(255) DEFAULT NULL,
  `inv_company_email` varchar(255) DEFAULT NULL,
  `inv_vat_percentage` int(10) NOT NULL,
  `inv_company_address_kh` tinytext,
  `inv_company_address_en` tinytext,
  `inv_description` text,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`inv_id`, `inv_number`, `inv_date`, `inv_customer`, `inv_company_name_en`, `inv_company_name_kh`, `inv_company_vat`, `inv_company_phone`, `inv_company_email`, `inv_vat_percentage`, `inv_company_address_kh`, `inv_company_address_en`, `inv_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, '1901001', '02/06/2019', 'Mr. Visal', 'BSS Solution TM', 'ប៊ីអេសអេស សូឡូសិន ខូអិលធីឌី', '0', '096 560 0934', 'me@me.com', 10, 'Phnom Penh', '', '', 12, 12, '2019-02-04 15:38:12', '2019-02-05 18:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_detail`
--

CREATE TABLE `tbl_invoice_detail` (
  `invd_id` int(11) NOT NULL,
  `invd_invoice_id` int(11) NOT NULL,
  `invd_service_id` int(11) NOT NULL,
  `invd_unit_price` float NOT NULL,
  `invd_qty` int(11) NOT NULL DEFAULT '1',
  `invd_description` text,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoice_detail`
--

INSERT INTO `tbl_invoice_detail` (`invd_id`, `invd_invoice_id`, `invd_service_id`, `invd_unit_price`, `invd_qty`, `invd_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 100, 1, '1asreewr', 0, 0, '2019-02-04 17:32:57', '2019-02-05 18:11:02'),
(2, 13, 2, 150, 2, 'qwe', 0, 0, '2019-02-05 18:19:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_left_menu`
--

CREATE TABLE `tbl_left_menu` (
  `lm_id` int(11) NOT NULL,
  `lm_name` char(50) NOT NULL,
  `lm_icon` char(50) NOT NULL,
  `lm_directory` char(50) NOT NULL,
  `lm_index_order` tinyint(4) NOT NULL,
  `lm_main_menu` int(11) NOT NULL,
  `lm_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_left_menu`
--

INSERT INTO `tbl_left_menu` (`lm_id`, `lm_name`, `lm_icon`, `lm_directory`, `lm_index_order`, `lm_main_menu`, `lm_status`) VALUES
(1, 'ផ្ទាំងដើម', '<i class=\"material-icons\">dashboard</i>', '', 1, 1, 1),
(2, 'ក្រុមហ៊ុន', '<i class=\"material-icons\">store</i>', 'companies_list/', 26, 2, 1),
(3, 'បុគ្គលិក', '<i class=\"material-icons\">people</i>', 'employees/', 15, 4, 1),
(4, 'សេវាកម្ម', '<i class=\"fa fa-hand-holding-heart\"></i>', 'services/', 11, 4, 1),
(5, 'អ្នកប្រើប្រាស់', '<i class=\"fa fa-user-friends\"></i>', 'users/', 25, 5, 1),
(6, 'សិទ្ធិអ្នកប្រើប្រាស់', '<i class=\"fa fa-user-graduate\"></i>', 'permission/', 30, 5, 1),
(7, 'ឋានៈអ្នកប្រើប្រាស់', '<i class=\"fa fa-user-cog\"></i>', 'userroles/', 35, 5, 1),
(8, 'ឯកសារ', '<i class=\"fa fa-file-alt\"></i>', 'documents/', 12, 4, 1),
(9, 'ប្រតិបត្តិការ', '<i class=\"fa fa-exchange-alt\"></i>', 'transactions/', 3, 4, 1),
(10, 'បញ្ជីក្រុមហ៊ុន', '<i class=\"fa fa-building\"></i>', 'companies_list/', 11, 4, 1),
(11, 'ជំហាន', '<i class=\"fa fa-project-diagram\"></i>', 'steps/', 13, 4, 1),
(12, 'វិក្កយបត្រ', '<i class=\"fa fa-file-alt\"></i>', 'invoice', 7, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_menu`
--

CREATE TABLE `tbl_main_menu` (
  `mm_id` int(11) NOT NULL,
  `mm_name` char(50) NOT NULL,
  `mm_icon` char(50) NOT NULL,
  `mm_directory` char(50) NOT NULL,
  `mm_index_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_main_menu`
--

INSERT INTO `tbl_main_menu` (`mm_id`, `mm_name`, `mm_icon`, `mm_directory`, `mm_index_order`) VALUES
(1, 'ផ្ទាំងដើម', '<i class=\"material-icons\">dashboard</i>', '', 1),
(2, 'ក្រុមហ៊ុន', '<i class=\"material-icons\">store</i>', 'companies/', 2),
(3, 'បុគ្គលិក', '<i class=\"material-icons\">people</i>', 'employees/', 10),
(4, 'ទិន្នន័យ', '<i class=\"fa fa-database\"></i>', '#', 15),
(5, 'គ្រប់គ្រងបុគ្គលិក', '<i class=\"fa fa-users\"></i>', '#', 20),
(6, 'ប្រតិបត្តិការ', '<i class=\"fa fa-exchange-alt\"></i>', 'transactions/', 3),
(7, 'វិក្កយបត្រ', '<i class=\"fa fa-file-alt\"></i>', 'invoice/', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `p_position` int(11) NOT NULL,
  `p_module` int(11) NOT NULL,
  `p_view` enum('0','1') NOT NULL DEFAULT '0',
  `p_add` enum('0','1') NOT NULL DEFAULT '0',
  `p_edit` enum('0','1') NOT NULL DEFAULT '0',
  `p_delete` enum('0','1') NOT NULL DEFAULT '0',
  `p_only_group` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`p_position`, `p_module`, `p_view`, `p_add`, `p_edit`, `p_delete`, `p_only_group`) VALUES
(1, 1, '1', '0', '0', '1', '0'),
(1, 2, '1', '0', '1', '0', '0'),
(1, 3, '1', '0', '0', '1', '0'),
(1, 4, '0', '0', '0', '0', '0'),
(1, 5, '1', '0', '1', '0', '0'),
(1, 6, '1', '1', '0', '0', '0'),
(1, 7, '1', '0', '0', '0', '0'),
(1, 8, '1', '0', '0', '1', '0'),
(1, 9, '1', '1', '0', '0', '0'),
(3, 1, '1', '1', '1', '1', '1'),
(3, 2, '1', '1', '1', '1', '1'),
(3, 3, '1', '1', '1', '1', '1'),
(3, 4, '1', '1', '1', '1', '1'),
(3, 5, '1', '1', '1', '1', '1'),
(3, 6, '1', '1', '1', '1', '1'),
(3, 7, '1', '1', '1', '1', '1'),
(3, 8, '1', '1', '1', '1', '1'),
(3, 9, '1', '1', '1', '1', '1'),
(3, 10, '1', '1', '1', '1', '1'),
(3, 11, '1', '1', '1', '1', '1'),
(3, 12, '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_price` int(11) NOT NULL,
  `s_description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`s_id`, `s_name`, `s_price`, `s_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Register', 100, 'Register New Company', 0, 0, '2019-01-09 10:03:41', '2019-01-10 08:18:17'),
(2, 'Tax Audit', 150, 'Tax Audit', 12, 12, '2019-01-09 10:04:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `st_id` int(11) NOT NULL,
  `st_title` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`st_id`, `st_title`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_step`
--

CREATE TABLE `tbl_step` (
  `step_id` int(11) NOT NULL,
  `step_name` varchar(255) NOT NULL,
  `step_service` int(11) NOT NULL,
  `step_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_step`
--

INSERT INTO `tbl_step` (`step_id`, `step_name`, `step_service`, `step_description`, `created_at`, `updated_at`) VALUES
(1, 'Check List for Tax Audit', 2, 'Check List for Tax Audit', '2019-01-26 01:15:30', '2019-01-26 01:41:34'),
(2, 'Payment', 1, 'Payment For Tax Register\r\n', '2019-01-26 01:36:17', '2019-01-26 01:41:56'),
(4, '123', 1, '123', '2019-01-26 17:12:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_td_status`
--

CREATE TABLE `tbl_td_status` (
  `tds_id` int(11) NOT NULL,
  `tds_name` varchar(50) NOT NULL,
  `tds_icon` varchar(50) NOT NULL,
  `tds_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_td_status`
--

INSERT INTO `tbl_td_status` (`tds_id`, `tds_name`, `tds_icon`, `tds_color`) VALUES
(0, 'Not Received', 'times-circle', 'danger'),
(1, 'Received', 'check', 'success'),
(2, 'Problem', 'exclamation-triangle', 'warning');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `tr_id` int(11) NOT NULL,
  `tr_date` varchar(255) NOT NULL,
  `tr_company` int(11) NOT NULL,
  `tr_service` int(11) NOT NULL,
  `tr_em_id` int(11) NOT NULL,
  `tr_description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`tr_id`, `tr_date`, `tr_company`, `tr_service`, `tr_em_id`, `tr_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(26, '02/02/2019', 3, 1, 3, '', 12, 12, '2019-02-02 07:03:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_document`
--

CREATE TABLE `tbl_transaction_document` (
  `td_id` int(11) NOT NULL,
  `td_transaction_id` int(11) NOT NULL,
  `td_document_id` int(11) NOT NULL,
  `td_file` varchar(255) DEFAULT NULL,
  `td_date` varchar(191) DEFAULT NULL,
  `td_date_alert` varchar(255) DEFAULT NULL,
  `td_control_by` int(11) DEFAULT NULL,
  `td_status` int(11) DEFAULT '0',
  `td_description` text,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transaction_document`
--

INSERT INTO `tbl_transaction_document` (`td_id`, `td_transaction_id`, `td_document_id`, `td_file`, `td_date`, `td_date_alert`, `td_control_by`, `td_status`, `td_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(65, 26, 1, NULL, '2019-02-02', '2019-02-28', 1, 1, '123', 12, 12, '2019-02-02 07:03:43', '2019-02-02 07:03:55'),
(66, 26, 4, NULL, '02/02/2019', NULL, 3, 0, NULL, 12, 12, '2019-02-02 07:03:43', '0000-00-00 00:00:00'),
(67, 26, 3, NULL, '02/02/2019', NULL, 3, 0, NULL, 12, 12, '2019-02-02 07:03:43', '0000-00-00 00:00:00'),
(68, 26, 2, NULL, '02/02/2019', NULL, 3, 0, NULL, 12, 12, '2019-02-02 07:03:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_step`
--

CREATE TABLE `tbl_transaction_step` (
  `ts_id` int(11) NOT NULL,
  `ts_transaction_id` int(11) NOT NULL,
  `ts_step_id` int(11) NOT NULL,
  `ts_control_by` int(11) DEFAULT NULL,
  `ts_date` varchar(50) DEFAULT NULL,
  `ts_date_alert` varchar(50) NOT NULL,
  `ts_description` text,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transaction_step`
--

INSERT INTO `tbl_transaction_step` (`ts_id`, `ts_transaction_id`, `ts_step_id`, `ts_control_by`, `ts_date`, `ts_date_alert`, `ts_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(31, 26, 4, 3, '02/02/2019', '03/30/2019', '123', 12, 12, '2019-02-02 07:04:11', '2019-02-02 07:04:11'),
(32, 26, 2, 3, NULL, '', NULL, 12, 12, '2019-02-02 07:03:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_gender` tinyint(1) NOT NULL DEFAULT '1',
  `u_phone` varchar(12) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `u_status` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL,
  `u_image` varchar(255) DEFAULT 'default_user.png',
  `u_role_id` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_gender`, `u_phone`, `email`, `u_status`, `password`, `u_image`, `u_role_id`) VALUES
(12, 'Sokun Sovisal', 0, '098 794 2861', 'vs@gl.com', 1, '$2y$10$qRTZpWCFsqs8Un54Cle96OcqXlkwN6HTzmkv.5xXqg2IX9zyyUkoa', '1548496113_1731.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `ur_name` varchar(25) NOT NULL,
  `ur_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `ur_name`, `ur_description`) VALUES
(1, 'Administrator', 'Admin'),
(2, 'Editor', 'editor'),
(3, 'Normal', 'normal'),
(5, 'qwe', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `tbl_invoice_detail`
--
ALTER TABLE `tbl_invoice_detail`
  ADD PRIMARY KEY (`invd_id`);

--
-- Indexes for table `tbl_left_menu`
--
ALTER TABLE `tbl_left_menu`
  ADD PRIMARY KEY (`lm_id`);

--
-- Indexes for table `tbl_main_menu`
--
ALTER TABLE `tbl_main_menu`
  ADD PRIMARY KEY (`mm_id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`p_position`,`p_module`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_step`
--
ALTER TABLE `tbl_step`
  ADD PRIMARY KEY (`step_id`);

--
-- Indexes for table `tbl_td_status`
--
ALTER TABLE `tbl_td_status`
  ADD PRIMARY KEY (`tds_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `tbl_transaction_document`
--
ALTER TABLE `tbl_transaction_document`
  ADD PRIMARY KEY (`td_id`);

--
-- Indexes for table `tbl_transaction_step`
--
ALTER TABLE `tbl_transaction_step`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_role_id` (`u_role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_invoice_detail`
--
ALTER TABLE `tbl_invoice_detail`
  MODIFY `invd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_step`
--
ALTER TABLE `tbl_step`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_td_status`
--
ALTER TABLE `tbl_td_status`
  MODIFY `tds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_transaction_document`
--
ALTER TABLE `tbl_transaction_document`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_transaction_step`
--
ALTER TABLE `tbl_transaction_step`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`u_role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
