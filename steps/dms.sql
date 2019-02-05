-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 09:44 AM
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
(1, 'Check List for Tax Audit', 2, 'Check List for Tax Audit', '2019-01-26 08:15:30', '2019-01-26 08:41:34'),
(2, 'Payment', 1, 'Payment For Tax Register\r\n', '2019-01-26 08:36:17', '2019-01-26 08:41:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_step`
--
ALTER TABLE `tbl_step`
  ADD PRIMARY KEY (`step_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_step`
--
ALTER TABLE `tbl_step`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
