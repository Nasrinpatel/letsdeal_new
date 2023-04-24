-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 05:26 PM
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
-- Table structure for table `tb_city_master`
--

CREATE TABLE `tb_city_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_city_master`
--

INSERT INTO `tb_city_master` (`id`, `name`, `state_id`, `status`, `created_date`) VALUES
(3, 'Bharuch', 5, 1, '2023-03-16 13:21:59'),
(5, 'Vadodara', 5, 1, '2023-03-16 15:34:06'),
(6, 'Mumbai', 8, 1, '2023-03-16 15:34:20'),
(7, 'Nagpur', 8, 1, '2023-03-16 15:34:38'),
(8, 'Rajkot', 5, 1, '2023-03-16 15:34:53'),
(9, 'Navsari', 5, 1, '2023-03-16 15:35:03'),
(10, 'Ahemdabad', 5, 1, '2023-03-16 15:35:16'),
(11, 'vapi', 5, 1, '2023-03-16 15:35:35'),
(17, 'n', 6, 1, '2023-04-19 09:04:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_city_master`
--
ALTER TABLE `tb_city_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_city_master`
--
ALTER TABLE `tb_city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
