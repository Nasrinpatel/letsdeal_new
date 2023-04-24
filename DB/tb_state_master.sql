-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 05:27 PM
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
-- Table structure for table `tb_state_master`
--

CREATE TABLE `tb_state_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_state_master`
--

INSERT INTO `tb_state_master` (`id`, `name`, `country_id`, `status`, `created_date`) VALUES
(5, '', 2, 1, '2023-03-16 13:10:42'),
(6, 'Goa', 1, 1, '2023-03-16 13:11:00'),
(8, 'Maharashtra', 1, 1, '2023-03-16 15:27:54'),
(9, 'Tamil Nadu', 1, 1, '2023-03-16 15:28:11'),
(10, 'Delhi', 1, 1, '2023-03-16 15:28:24'),
(11, 'Haryana', 1, 1, '2023-03-16 15:28:37'),
(12, 'Uttar Pradesh', 1, 1, '2023-03-16 15:28:47'),
(13, 'Karnataka', 1, 1, '2023-03-16 15:29:00'),
(14, 'Kerala', 1, 1, '2023-03-16 15:29:13'),
(15, 'Rajasthan', 1, 1, '2023-03-16 15:29:27'),
(16, 'Uttrakhand', 1, 1, '2023-03-16 15:29:38'),
(17, 'Bihar', 1, 1, '2023-03-16 15:29:57'),
(18, 'Jharkhand', 1, 1, '2023-03-16 15:30:11'),
(19, 'Chhatisgarh', 1, 1, '2023-03-16 15:30:28'),
(20, 'West Bengal', 1, 1, '2023-03-16 15:30:47'),
(21, 'Orissa', 1, 1, '2023-03-16 15:30:58'),
(22, 'Himachal Pradesh', 1, 1, '2023-03-16 15:31:11'),
(23, 'Punjab', 1, 1, '2023-03-16 15:31:23'),
(24, 'Jammu and Kashmir', 1, 1, '2023-03-16 15:31:41'),
(25, 'Madhya Pradesh', 1, 1, '2023-03-16 15:32:24'),
(26, 'Mizoram', 1, 1, '2023-03-16 15:32:35'),
(27, 'Meghalaya', 1, 1, '2023-03-16 15:32:48'),
(28, 'Arunachal Pradesh', 1, 1, '2023-03-16 15:32:59'),
(29, 'Andhra Pradesh', 1, 1, '2023-03-16 15:33:22'),
(30, 'Telangana', 1, 1, '2023-03-16 15:33:34'),
(31, 'test', 1, 1, '2023-03-16 19:53:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_state_master`
--
ALTER TABLE `tb_state_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_state_master`
--
ALTER TABLE `tb_state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
