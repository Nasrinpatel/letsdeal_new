-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 10:41 AM
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
-- Table structure for table `tbl_reminder_master`
--

CREATE TABLE `tbl_reminder_master` (
  `id` int(11) NOT NULL,
  `model_type` enum('Property','Customer','Channel Partner','Lead') NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `startdate` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `priority` varchar(255) NOT NULL,
  `repeat_everyday` varchar(255) NOT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(11) DEFAULT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `custom_recurring` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(15) NOT NULL,
  `is_notified` int(11) NOT NULL DEFAULT 0 COMMENT '1=read,0=not read',
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reminder_master`
--

INSERT INTO `tbl_reminder_master` (`id`, `model_type`, `model_id`, `name`, `type`, `date_time`, `startdate`, `duedate`, `priority`, `repeat_everyday`, `cycles`, `recurring_type`, `repeat_every`, `recurring`, `total_cycles`, `custom_recurring`, `description`, `is_notified`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Customer', 7, 'Nasrin', 'name', '2023-04-30 22:22:00', '1970-01-01', NULL, 'Urgent', '', 1, 'month', 6, 1, 0, 0, 'tu', 0, 1, '2023-04-29 12:48:50', '2023-05-03 07:25:28'),
(11, 'Customer', 7, 'seema', 'name1', '2023-04-30 02:42:00', '1970-01-01', NULL, 'Urgent', '', 0, 'year', 66, 1, 0, 1, '', 0, 1, '2023-04-29 17:08:51', NULL),
(27, 'Channel Partner', 2, 'nas', '2', '2023-05-21 13:39:00', '1970-01-01', NULL, 'Urgent', '', 1, 'month', 6, 1, 0, 0, 'test', 0, 1, '2023-05-03 06:09:36', '2023-05-03 06:10:07'),
(28, 'Channel Partner', 2, 'ds', '1', '2023-05-04 12:57:00', '1970-01-01', NULL, 'Urgent', '', 0, 'week', 1, 1, 0, 0, 'fd', 0, 1, '2023-05-03 07:27:12', NULL),
(29, 'Customer', 11, 'gh', '1', '2023-05-12 13:58:00', '1970-01-01', NULL, 'Medium', '', 0, 'week', 1, 1, 0, 0, 'vc', 0, 1, '2023-05-03 07:28:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_reminder_master`
--
ALTER TABLE `tbl_reminder_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_reminder_master`
--
ALTER TABLE `tbl_reminder_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
