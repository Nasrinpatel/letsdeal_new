-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 01:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsdeal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_followup_master`
--

CREATE TABLE `tb_followup_master` (
  `id` int(11) NOT NULL,
  `model_type` enum('Property','Customer','Channel Partner','Lead') NOT NULL,
  `model_id` int(11) NOT NULL,
  `followtype_id` int(11) NOT NULL,
  `followup_date` datetime NOT NULL,
  `is_reminder` int(11) NOT NULL DEFAULT 0 COMMENT '1=checked,0=unchecked',
  `reminder_date` datetime DEFAULT NULL,
  `description` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_followup_master`
--

INSERT INTO `tb_followup_master` (`id`, `model_type`, `model_id`, `followtype_id`, `followup_date`, `is_reminder`, `reminder_date`, `description`, `status`, `created_date`, `updated_date`) VALUES
(6, 'Customer', 9, 13, '2023-06-22 05:47:00', 1, '2023-06-30 07:41:00', 'tt', 1, '2023-06-20 18:11:39', '2023-06-20 18:12:56'),
(7, 'Channel Partner', 1, 14, '2023-06-23 20:22:00', 1, '2023-07-01 17:27:00', 'abc', 1, '2023-06-21 11:52:43', '2023-06-21 11:56:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_followup_master`
--
ALTER TABLE `tb_followup_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_followup_master`
--
ALTER TABLE `tb_followup_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
