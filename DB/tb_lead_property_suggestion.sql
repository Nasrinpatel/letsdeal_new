-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 08:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `tb_lead_property_suggestion`
--

CREATE TABLE `tb_lead_property_suggestion` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lead_property_suggestion`
--

INSERT INTO `tb_lead_property_suggestion` (`id`, `lead_id`, `property_id`, `created_date`) VALUES
(1, 23, 1, '2023-06-15 08:25:28'),
(2, 23, 4, '2023-06-15 08:25:28'),
(3, 22, 2, '2023-06-15 11:40:07'),
(4, 22, 9, '2023-06-15 11:40:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lead_property_suggestion`
--
ALTER TABLE `tb_lead_property_suggestion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lead_property_suggestion`
--
ALTER TABLE `tb_lead_property_suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
