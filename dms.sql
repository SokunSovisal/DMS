-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 05:26 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
  `co_name` varchar(255) NOT NULL,
  `co_type` varchar(255) NOT NULL,
  `co_tax_type` varchar(255) NOT NULL,
  `co_vat_no` varchar(11) DEFAULT NULL,
  `co_phone` varchar(255) NOT NULL,
  `co_email` varchar(255) NOT NULL,
  `co_address` varchar(255) NOT NULL,
  `co_register_date` date NOT NULL,
  `co_em_id` int(11) NOT NULL,
  `co_description` text NOT NULL,
  `co_status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`co_id`, `co_name`, `co_type`, `co_tax_type`, `co_vat_no`, `co_phone`, `co_email`, `co_address`, `co_register_date`, `co_em_id`, `co_description`, `co_status`, `created_date`, `updated_date`) VALUES
(1, 'BSS Solution TM', 'Technology', '', '0', '096 560 0934', 'me@me.com', 'Phnom Penh', '2019-01-10', 1, 'Tax Audition', 1, '2019-01-09 03:57:32', '2019-01-09 07:46:44'),
(2, 'GMM Mart Management', 'Technology', '', NULL, '096 560 0934', 'gmm@bty.com', 'Phnom Penh', '2019-01-10', 2, 'Technology company', 1, '2019-01-09 04:00:34', '2019-01-09 04:04:49'),
(3, 'GMM Coffee & Beverage', 'Food and Drink', '', NULL, '096 560 0934', 'me@bty.com', 'Phnom Penh', '2019-01-10', 2, 'GMM Coffee & Beverage\r\nFood and Drink', 1, '2019-01-09 07:15:13', '0000-00-00 00:00:00'),
(4, 'Newday Tech', 'IT', '', NULL, '0962195196', 'teysocheatha@gmail.com', 'terk thla', '2019-01-09', 0, 'testing', 0, '2019-01-09 12:58:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`doc_id`, `doc_name`, `doc_description`, `created_at`, `updated_at`) VALUES
(1, 'Certificate of tourism', '1 copy 2019', '2019-01-10 08:38:37', '2019-01-11 07:22:31'),
(2, 'Photo', 'Photo 4x6', '2019-01-10 08:38:37', '0000-00-00 00:00:00'),
(3, 'Patent', 'Patent 1 copy', '2019-01-10 08:38:37', '0000-00-00 00:00:00'),
(4, 'hello world', 'This is a document for test', '2019-01-11 07:17:08', '0000-00-00 00:00:00');

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
(1, 'Dashboard', '<i class=\"material-icons\">dashboard</i>', '', 5, 1, 1),
(2, 'Company', '<i class=\"material-icons\">store</i>', 'companies/', 10, 2, 1),
(3, 'Employee', '<i class=\"material-icons\">people</i>', '', 15, 3, 1),
(4, 'Services', '<i class=\"fa fa-hand-holding-heart\"></i>', 'services/', 20, 4, 1),
(5, 'User List', '<i class=\"fa fa-user-friends\"></i>', 'users/', 25, 5, 1),
(6, 'User Permission', '<i class=\"fa fa-user-graduate\"></i>', 'permission/', 30, 5, 1),
(7, 'User Roles', '<i class=\"fa fa-user-cog\"></i>', 'userroles/', 35, 5, 1),
(8, 'Document', '<i class=\"fa fa-file-alt\"></i>', 'documents/', 25, 4, 1),
(9, 'Transactions', '<i class=\"material-icons\">get_app</i>', '#', 25, 6, 1);

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
(1, 'Dashboard', '<i class=\"material-icons\">dashboard</i>', '', 1),
(2, 'Company', '<i class=\"material-icons\">store</i>', 'companies/', 5),
(3, 'Employee', '<i class=\"material-icons\">people</i>', 'employees/', 10),
(4, 'Data List', '<i class=\"material-icons\">dashboard</i>', '#', 15),
(5, 'User Management', '<i class=\"fa fa-users\"></i>', '#', 20),
(6, 'Transactions', '<i class=\"fa fa-users\"></i>', 'transactions/', 2);

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
(3, 2, '1', '1', '0', '0', '1'),
(3, 3, '1', '1', '0', '0', '1'),
(3, 4, '1', '1', '1', '1', '1'),
(3, 5, '1', '1', '0', '0', '1'),
(3, 6, '1', '1', '1', '1', '1'),
(3, 7, '1', '1', '1', '1', '1'),
(3, 8, '1', '1', '0', '0', '1'),
(3, 9, '1', '1', '1', '0', '1');

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
(2, 'Tax Audit', 150, 'Tax Audit', 12, 12, '2019-01-09 10:04:30', '0000-00-00 00:00:00'),
(3, 'Register', 150, 'Re-register company to...', 0, 0, '2019-01-10 08:10:18', '0000-00-00 00:00:00');

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
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `tr_id` int(11) NOT NULL,
  `tr_date` date NOT NULL,
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
(1, '2019-01-10', 1, 1, 1, 'New Company', 12, 12, '2019-01-10 09:02:49', '2019-01-10 09:04:01'),
(2, '2019-01-02', 1, 2, 4, 'Making Tax Audit', 0, 0, '2019-01-10 10:06:11', '2019-01-20 08:56:05');

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
  `td_control_by` int(11) DEFAULT NULL,
  `td_status` int(11) DEFAULT '0',
  `td_description` text,
  `td_approve_by` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_transaction_document`
--

INSERT INTO `tbl_transaction_document` (`td_id`, `td_transaction_id`, `td_document_id`, `td_file`, `td_date`, `td_control_by`, `td_status`, `td_description`, `td_approve_by`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 2, 1, NULL, '2019-02-01', 1, 2, 'Testing', 1, 0, 0, '2019-01-20 13:54:03', '2019-01-20 15:09:25'),
(12, 2, 3, NULL, '2019-02-01', 1, 1, 'Testin Problem', 1, 0, 0, '2019-01-20 13:54:03', '2019-01-20 15:09:58'),
(13, 2, 2, NULL, '02/20/2019', 3, 0, NULL, 4, 0, 0, '2019-01-20 13:54:03', '0000-00-00 00:00:00');

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
(12, 'Sokun Sovisal', 0, '098 794 2861', 'vs@gl.com', 1, '$2y$10$qRTZpWCFsqs8Un54Cle96OcqXlkwN6HTzmkv.5xXqg2IX9zyyUkoa', '1547889578_9830.png', 3);

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
(3, 'Normal', 'normal');

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
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction_document`
--
ALTER TABLE `tbl_transaction_document`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
