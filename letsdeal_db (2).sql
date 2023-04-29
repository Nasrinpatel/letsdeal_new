-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 11:54 AM
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
-- Table structure for table `source_category_master`
--

CREATE TABLE `source_category_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `source_category_master`
--

INSERT INTO `source_category_master` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(16, 'City', 1, '2023-03-04 09:40:21', NULL),
(17, 'Gender', 1, '2023-03-06 18:42:47', NULL),
(18, 'Numbers', 1, '2023-03-08 09:28:18', NULL),
(19, 'd', 1, '2023-04-25 10:35:57', NULL),
(20, 'U', 1, '2023-04-25 10:41:15', NULL),
(21, 'sdf', 1, '2023-04-25 11:07:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `source_option_master`
--

CREATE TABLE `source_option_master` (
  `id` int(11) NOT NULL,
  `source_cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `source_option_master`
--

INSERT INTO `source_option_master` (`id`, `source_cat_id`, `name`, `created_date`, `updated_date`) VALUES
(2, 10, 'new', '2023-02-27 10:28:03', NULL),
(3, 14, 'State', '2023-02-27 10:33:28', NULL),
(4, 12, 'a', '2023-02-27 10:45:18', NULL),
(5, 12, 'b', '2023-02-27 10:45:19', NULL),
(20, 17, 'Male', '2023-03-06 18:42:47', NULL),
(21, 17, 'Female', '2023-03-06 18:42:47', NULL),
(24, 15, 'one', '2023-03-06 18:43:48', NULL),
(25, 15, 'two', '2023-03-06 18:43:48', NULL),
(32, 18, '1', '2023-03-08 09:29:20', NULL),
(33, 18, '2', '2023-03-08 09:29:20', NULL),
(34, 18, '3', '2023-03-08 09:29:20', NULL),
(35, 19, 'gf', '2023-04-25 10:35:57', NULL),
(36, 19, 'fg', '2023-04-25 10:35:57', NULL),
(37, 20, 'K', '2023-04-25 10:41:15', NULL),
(38, 20, 'JH', '2023-04-25 10:41:15', NULL),
(39, 21, 'dgf', '2023-04-25 11:07:36', NULL),
(40, 21, 'fg', '2023-04-25 11:07:36', NULL),
(58, 16, 'Vadodara', '2023-04-25 18:00:44', NULL),
(59, 16, 'Bharuch', '2023-04-25 18:00:44', NULL),
(60, 16, 'Kosamba', '2023-04-25 18:00:44', NULL),
(61, 16, 'jamnagar', '2023-04-25 18:01:04', NULL),
(62, 16, 'rajkot', '2023-04-25 18:01:04', NULL),
(63, 16, 'ahemdabad', '2023-04-25 18:01:04', NULL),
(64, 16, 'jamnagar', '2023-04-26 09:07:13', NULL),
(65, 16, 'rajkot', '2023-04-26 09:07:13', NULL),
(66, 16, 'ahemdabad', '2023-04-26 09:07:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_contact_master`
--

CREATE TABLE `tbl_agent_contact_master` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent_contact_master`
--

INSERT INTO `tbl_agent_contact_master` (`id`, `agent_id`, `first_name`, `last_name`, `position_id`, `company_name`, `email`, `phone`, `description`, `status`, `created_date`, `updated_date`) VALUES
(25, 2, 'xyz', 'opq', 71, 'gfg', 'test@gmail.com', '09903214560', 'fdg', 1, '2023-04-08 15:29:18', NULL),
(26, 3, 'xyz', 'opq', 71, 'jh', 'test@gmail.com', '09903214560', 'jh', 1, '2023-04-29 07:09:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_note_master`
--

CREATE TABLE `tbl_agent_note_master` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent_note_master`
--

INSERT INTO `tbl_agent_note_master` (`id`, `agent_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 2, 'agent not', 1, '2023-04-08 15:29:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_contact_master`
--

CREATE TABLE `tbl_customer_contact_master` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_contact_master`
--

INSERT INTO `tbl_customer_contact_master` (`id`, `customer_id`, `first_name`, `last_name`, `position_id`, `company_name`, `email`, `phone`, `description`, `status`, `created_date`, `updated_date`) VALUES
(2, 6, 'xyz', 'opq', 71, 'h', 'test@gmail.com', '09903214560', 'gf', 1, '2023-03-23 07:12:56', NULL),
(13, 7, 'nasu', 'jh', 71, 'h', 'nasu@gmail.com', '9904707610', 'test', 1, '2023-03-24 07:12:51', '2023-04-28 09:28:01'),
(23, 7, 'xyz', 'opq', 71, 'sd', 'test@gmail.com', '09903214560', 'x', 1, '2023-03-24 13:01:27', NULL),
(24, 7, 'xyz', 'opq', 71, 'gf', 'test@gmail.com', '09903214560', 'fg', 1, '2023-04-28 09:27:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note_master`
--

CREATE TABLE `tbl_note_master` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_note_master`
--

INSERT INTO `tbl_note_master` (`id`, `customer_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(4, 7, 'nasuh', 1, '2023-03-24 11:20:19', NULL),
(7, 7, 'h', 1, '2023-03-24 12:41:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reminder_master`
--

CREATE TABLE `tbl_reminder_master` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `model_type` enum('Property','Customer','Channel Partner','Lead') NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `priority` varchar(255) NOT NULL,
  `repeat_everyday` varchar(255) NOT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(10) DEFAULT NULL,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `description` varchar(15) NOT NULL,
  `is_notified` int(11) NOT NULL DEFAULT 0 COMMENT '1=read,0=not read',
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reminder_master`
--

INSERT INTO `tbl_reminder_master` (`id`, `customer_id`, `model_type`, `model_id`, `name`, `type`, `date_time`, `priority`, `repeat_everyday`, `cycles`, `recurring_type`, `repeat_every`, `total_cycles`, `description`, `is_notified`, `status`, `created_date`, `updated_date`) VALUES
(6, 13, 'Property', 0, 'gvhg', 'name', '2023-04-29 19:45:00', 'Urgent', '6 Months', 0, NULL, NULL, 0, 'hyt', 0, 1, '2023-04-28 10:16:01', NULL),
(7, 13, 'Property', 0, 'gvhg', 'name', '2023-04-29 19:45:00', 'Urgent', '6 Months', 0, NULL, NULL, 0, 'hyt', 0, 1, '2023-04-28 10:16:04', NULL),
(8, 13, 'Property', 0, 'gvhg', 'name', '2023-04-29 19:45:00', 'Urgent', '6 Months', 0, NULL, NULL, 0, 'hyt', 0, 1, '2023-04-28 10:16:33', NULL),
(9, 13, 'Customer', 13, 'tfut', 'name', '2023-05-07 19:50:00', 'Urgent', '6 Months', 0, NULL, NULL, 0, 'uyguy', 0, 1, '2023-04-28 10:20:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_master`
--

CREATE TABLE `tbl_staff_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_master`
--

INSERT INTO `tbl_staff_master` (`id`, `first_name`, `last_name`, `email`, `phone`, `status`, `created_date`, `updated_date`) VALUES
(2, 'Nasrin1', 'Patel1', 'nasu1@gmail.com', '12365478901', 1, '2023-03-22 16:11:50', '2023-04-19 18:12:33'),
(5, 'Nasu', 'patel', 'nasupatel007@gmail.com', '09903214560', 1, '2023-04-06 12:45:59', '2023-04-11 05:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agent_master`
--

CREATE TABLE `tb_agent_master` (
  `id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `assigned_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agent_master`
--

INSERT INTO `tb_agent_master` (`id`, `source_id`, `assigned_id`, `position_id`, `first_name`, `last_name`, `nick_name`, `phone`, `email`, `company_name`, `description`, `status`, `created_date`, `updated_date`) VALUES
(2, 1, 2, 71, 'Mohit', 'Soni', 'ms', '9903214560', 'test@gmail.com', 'hghg', 'vh', 1, '2023-03-26 12:32:18', '2023-04-12 06:24:10'),
(3, 1, 2, 71, 'xyz', 'opq', '', '1236548790', 'test@gmail.com', 'ds', 'fd', 1, '2023-04-11 09:57:33', '2023-04-11 15:02:38'),
(4, 1, 2, 71, 'nasrin', 'patel', 'nasu', '7896512330', 'test@gmail.com', 'df', 'ffd', 1, '2023-04-11 10:00:04', '2023-04-12 06:24:16'),
(5, 1, 2, 71, 'xyz', 'opq', '', '9630125478', 'test@gmail.com', 'fg', 'gf', 1, '2023-04-11 10:02:23', '2023-04-11 15:03:19'),
(6, 2, 2, 71, 'xyz', 'opq', '', '09903214560', 'test@gmail.com', 'nk', 'nk', 1, '2023-04-12 06:10:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_agent_specialist_area`
--

CREATE TABLE `tb_agent_specialist_area` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agent_specialist_area`
--

INSERT INTO `tb_agent_specialist_area` (`id`, `agent_id`, `state_id`, `city_id`, `area_id`, `status`, `created_date`, `updated_date`) VALUES
(2, 3, 32, 18, 19, 1, '2023-04-24 08:14:37', NULL),
(3, 2, 32, 18, 19, 1, '2023-04-24 11:06:07', NULL),
(4, 2, 32, 18, 19, 0, '2023-04-25 09:23:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_agent_specialist_for`
--

CREATE TABLE `tb_agent_specialist_for` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `pro_category_id` int(11) NOT NULL,
  `pro_subcategory_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agent_specialist_for`
--

INSERT INTO `tb_agent_specialist_for` (`id`, `agent_id`, `pro_category_id`, `pro_subcategory_id`, `status`, `created_date`, `updated_date`) VALUES
(4, 2, 3, 2, 1, '2023-04-25 09:21:02', NULL),
(5, 2, 4, 7, 1, '2023-04-25 09:21:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_master`
--

CREATE TABLE `tb_area_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `area_code` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_area_master`
--

INSERT INTO `tb_area_master` (`id`, `name`, `area_code`, `city_id`, `status`, `created_date`) VALUES
(1, 'Raopura Tower', 102, 3, 1, '2023-04-27 15:05:52'),
(2, 'VIP ', 805, 5, 1, '2023-04-27 15:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_assigned_master`
--

CREATE TABLE `tb_assigned_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 'Bharuch', 32, 1, '2023-04-24 08:13:52'),
(19, 'jamnagAar', 32, 1, '2023-04-26 11:48:13'),
(20, 'rajkot', 32, 1, '2023-04-26 11:48:13'),
(21, 'ahemdabad', 32, 1, '2023-04-26 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_country_master`
--

CREATE TABLE `tb_country_master` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_country_master`
--

INSERT INTO `tb_country_master` (`id`, `name`, `status`, `created_date`) VALUES
(2, 'India', 1, '2023-03-16 09:08:28'),
(3, 'USA', 1, '2023-03-16 09:14:52'),
(4, 'Canada', 1, '2023-03-16 09:24:27'),
(8, 'jamnagAar', 1, '2023-04-26 11:07:56'),
(9, 'rajkot', 1, '2023-04-26 11:07:56'),
(10, 'ahemdabad', 1, '2023-04-26 11:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_master`
--

CREATE TABLE `tb_customer_master` (
  `id` int(11) NOT NULL,
  `inquiry_type` varchar(10) NOT NULL COMMENT 'direct,agent',
  `agent_id` int(11) DEFAULT NULL,
  `source_id` int(11) NOT NULL,
  `assigned_id` int(11) DEFAULT NULL COMMENT 'staff',
  `position_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer_master`
--

INSERT INTO `tb_customer_master` (`id`, `inquiry_type`, `agent_id`, `source_id`, `assigned_id`, `position_id`, `first_name`, `last_name`, `phone`, `email`, `company_name`, `description`, `status`, `created_date`, `updated_date`) VALUES
(7, 'agent', 2, 1, 2, 71, 'Fida', 'Vohara', '+91 9903214560', 'test@gmail.com', 'Gauraj infotech', 'ghj', 1, '2023-03-23 06:30:38', '2023-04-19 18:06:30'),
(11, 'direct', 2, 1, NULL, 71, 'Nasrin', 'Patel', '+91 852009631', 'nasu@gmail.com', 'Abcd', 'fg', 1, '2023-03-25 11:51:59', '2023-04-11 15:11:45'),
(12, 'direct', 2, 2, NULL, 71, 'xyz', 'opq', '+911236547890', 'test@gmail.com', 'fg', 'gh', 1, '2023-04-11 05:24:37', '2023-04-11 15:09:29'),
(13, 'direct', 2, 1, NULL, 71, 'Nasrin usman', 'Dadu', '+919632587410', 'nasupatel007@gmail.com', 'kl', 'm', 1, '2023-04-11 09:31:39', '2023-04-11 15:09:38'),
(14, 'agent', 2, 1, 5, 71, 'nasrin', 'dadu', '09903214560', 'test@gmail.com', 'hj', 'hjk', 1, '2023-04-11 16:17:31', '2023-04-11 16:20:25'),
(15, 'agent', 2, 1, 2, 71, 'Nasrin usman', 'Dadu', '09903214560', 'nasupatel007@gmail.com', 'nb', 'nb', 1, '2023-04-11 16:21:51', NULL),
(16, 'agent', 2, 1, 5, 71, 'xyz', 'opq', '09903214560', 'test@gmail.com', 'jk', 'uy', 1, '2023-04-12 06:20:14', NULL),
(17, 'agent', 5, 1, 5, 71, 'xyz', 'opq', '09903214560', 'test@gmail.com', 'jh', 'jh', 1, '2023-04-12 06:26:55', NULL),
(18, 'direct', 2, 1, NULL, 71, 'xyz', 'opq', '09903214560', 'test@gmail.com', 'gh', 'gh', 1, '2023-04-14 09:37:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_form_master`
--

CREATE TABLE `tb_form_master` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `category_ids` text NOT NULL,
  `sub_category_ids` text NOT NULL,
  `phase_id` int(11) NOT NULL,
  `question_ids` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_form_master`
--

INSERT INTO `tb_form_master` (`id`, `master_id`, `category_ids`, `sub_category_ids`, `phase_id`, `question_ids`, `status`, `created_date`, `updated_date`) VALUES
(27, 97, '3', '1', 2, '1,13,14', 1, '2023-04-12 12:51:09', NULL),
(28, 94, '3', '1', 1, '4,31', 1, '2023-04-12 13:15:07', NULL),
(29, 96, '3', '1', 1, '1,2,31', 1, '2023-04-12 16:40:06', NULL),
(30, 95, '3', '1', 1, '17,18,21,20,16', 1, '2023-04-14 10:23:09', NULL),
(31, 95, '3', '1', 2, '2', 1, '2023-04-14 10:23:28', NULL),
(32, 95, '3', '1', 3, '13', 1, '2023-04-14 10:23:48', NULL),
(33, 94, '3', '1', 1, '22,29', 1, '2023-04-15 15:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_master`
--

CREATE TABLE `tb_master` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_master`
--

INSERT INTO `tb_master` (`id`, `code`, `name`, `status`, `created_date`, `updated_date`) VALUES
(94, '001', 'Buy', 1, '2023-02-15 08:24:52', '2023-04-06 17:59:13'),
(95, '001', 'Sale', 1, '2023-02-15 08:24:52', '2023-02-15 11:02:00'),
(96, '003', 'Rent', 1, '2023-02-15 08:24:52', '2023-02-15 08:25:05'),
(97, '004', 'Lease', 1, '2023-02-15 08:24:52', '2023-02-15 08:25:05'),
(98, '005', 'Long Lease', 1, '2023-02-15 08:24:52', '2023-02-15 08:25:05'),
(99, '006', 'Bartter', 1, '2023-02-15 08:24:52', '2023-02-15 08:25:05'),
(100, '007', 'Auction', 1, '2023-02-15 08:24:52', '2023-02-15 11:03:18'),
(101, '008', 'PG/Co-living', 1, '2023-02-15 08:24:52', '2023-02-15 11:03:18'),
(102, '009', 'Co-working', 1, '2023-02-15 08:24:52', '2023-02-15 11:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_phase_master`
--

CREATE TABLE `tb_phase_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_phase_master`
--

INSERT INTO `tb_phase_master` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Phase one', 1, '2023-02-14 08:38:15', NULL),
(2, 'Phase two', 1, '2023-02-14 08:38:15', NULL),
(3, 'Phase three', 1, '2023-02-14 08:38:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_position_master`
--

CREATE TABLE `tb_position_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_position_master`
--

INSERT INTO `tb_position_master` (`id`, `name`, `status`, `created_date`) VALUES
(71, 'Admin', 1, '2023-03-16 15:23:24'),
(72, 'Family', 1, '2023-03-16 15:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_category`
--

CREATE TABLE `tb_property_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_category`
--

INSERT INTO `tb_property_category` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(3, 'Residence', 1, '2023-02-07 18:21:09', '2023-02-10 06:35:49'),
(4, 'Commercial', 1, '2023-02-13 10:03:26', '2023-02-20 07:22:59'),
(5, 'Land', 1, '2023-02-13 10:05:05', '2023-02-20 07:23:46'),
(6, 'New Project', 1, '2023-02-07 18:22:31', '2023-02-10 06:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_master`
--

CREATE TABLE `tb_property_master` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `pro_master_id` int(11) NOT NULL,
  `pro_category_id` int(11) NOT NULL,
  `pro_subcategory_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_master`
--

INSERT INTO `tb_property_master` (`id`, `customer_id`, `agent_id`, `pro_master_id`, `pro_category_id`, `pro_subcategory_id`, `status`, `created_date`, `updated_date`) VALUES
(30, 7, NULL, 94, 3, 1, 1, '2023-04-12 12:57:01', NULL),
(31, 7, 2, 94, 3, 1, 0, '2023-04-12 13:17:44', NULL),
(32, 7, 2, 94, 3, 1, 0, '2023-04-12 13:18:26', NULL),
(33, 7, 2, 94, 3, 1, 1, '2023-04-12 13:19:54', NULL),
(34, 7, 2, 94, 3, 1, 1, '2023-04-12 13:22:10', NULL),
(35, 7, 2, 94, 3, 1, 1, '2023-04-12 14:22:28', NULL),
(36, 7, 2, 96, 3, 1, 1, '2023-04-12 18:11:55', NULL),
(37, 7, 2, 94, 3, 1, 1, '2023-04-13 15:22:08', NULL),
(38, 7, 2, 96, 3, 1, 1, '2023-04-13 15:29:04', NULL),
(39, 7, 2, 94, 3, 1, 1, '2023-04-13 15:32:15', NULL),
(40, 7, 2, 94, 3, 1, 1, '2023-04-13 16:56:23', NULL),
(41, 7, NULL, 96, 3, 1, 1, '2023-04-14 11:17:44', NULL),
(42, 13, NULL, 94, 3, 2, 1, '2023-04-28 09:53:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_question_answer`
--

CREATE TABLE `tb_property_question_answer` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`answer_ids`)),
  `question` text NOT NULL,
  `answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`answers`)),
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_question_answer`
--

INSERT INTO `tb_property_question_answer` (`id`, `property_id`, `phase_id`, `question_id`, `answer_ids`, `question`, `answers`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"96\":true},{\"87\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"96\":true},{\"87\":true}]}', '2023-03-29 10:59:38', NULL),
(2, 1, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[]}', '2023-03-29 10:59:38', NULL),
(3, 1, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true}]}', '2023-03-29 10:59:38', NULL),
(4, 2, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"6\":true},{\"8\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"6\":true},{\"8\":true}]}', '2023-03-29 11:04:32', NULL),
(5, 2, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[]}', '2023-03-29 11:04:32', NULL),
(6, 2, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/ab.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/ab.com\":true}]}', '2023-03-29 11:04:32', NULL),
(7, 3, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"3352\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"3352\":true}]}', '2023-03-29 11:15:42', NULL),
(8, 3, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[]}', '2023-03-29 11:15:42', NULL),
(9, 3, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true}]}', '2023-03-29 11:15:42', NULL),
(10, 4, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"3352\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"3352\":true}]}', '2023-03-29 11:16:54', NULL),
(11, 4, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[]}', '2023-03-29 11:16:54', NULL),
(12, 4, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true}]}', '2023-03-29 11:16:54', NULL),
(13, 5, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"3352\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"3352\":true}]}', '2023-03-29 11:22:59', NULL),
(14, 5, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[{\"1680069179-2023-03-290.png\":true},{\"1680069179-2023-03-291.png\":true},{\"1680069179-2023-03-292.png\":true}]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[{\"1680069179-2023-03-290.png\":true},{\"1680069179-2023-03-291.png\":true},{\"1680069179-2023-03-292.png\":true}]}', '2023-03-29 11:22:59', NULL),
(15, 5, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true}]}', '2023-03-29 11:22:59', NULL),
(19, 6, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"99919\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"99919\":true},{\"99919\":true}]}', '2023-03-29 12:16:39', NULL),
(20, 6, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[[],[],[]]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[[],[],[]]}', '2023-03-29 12:16:40', NULL),
(21, 6, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/xyz.com\":true},{\"https:\\/\\/xyz.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/xyz.com\":true},{\"https:\\/\\/xyz.com\":true}]}', '2023-03-29 12:16:40', NULL),
(22, 7, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"522\":true},{\"5225\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"522\":true},{\"5225\":true}]}', '2023-03-29 12:41:23', NULL),
(23, 7, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[{\"1680073884-2023-03-290.png\":true},{\"1680073884-2023-03-291.png\":true},{\"1680073884-2023-03-292.png\":true}]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[{\"1680073884-2023-03-290.png\":true},{\"1680073884-2023-03-291.png\":true},{\"1680073884-2023-03-292.png\":true}]}', '2023-03-29 12:41:24', NULL),
(24, 7, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true},{\"https:\\/\\/xyz.com\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/abc.com\":true},{\"https:\\/\\/xyz.com\":true},{\"https:\\/\\/xyz.com\":true}]}', '2023-03-29 12:41:24', NULL),
(25, 8, 1, 18, '{\"answer_type\":\"Google Map\",\"options\":[{\"5435\":true},{\"456\":true}]}', 'map', '{\"answer_type\":\"Google Map\",\"options\":[{\"5435\":true},{\"456\":true}]}', '2023-03-30 15:15:31', NULL),
(26, 8, 1, 20, '{\"answer_type\":\"Image Gallery\",\"options\":[{\"1680169532-2023-03-300.png\":true},{\"1680169532-2023-03-301.png\":true},{\"1680169532-2023-03-302.png\":true}]}', 'Image Gallery', '{\"answer_type\":\"Image Gallery\",\"options\":[{\"1680169532-2023-03-300.png\":true},{\"1680169532-2023-03-301.png\":true},{\"1680169532-2023-03-302.png\":true}]}', '2023-03-30 15:15:32', NULL),
(27, 8, 1, 21, '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/youtu.be\\/O3MUdhuHbpw\":true}]}', 'video gallery', '{\"answer_type\":\"Video Gallery\",\"options\":[{\"https:\\/\\/youtu.be\\/O3MUdhuHbpw\":true}]}', '2023-03-30 15:15:32', NULL),
(34, 9, 1, 1, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":true},{\"33\":false},{\"34\":false}]}', '', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":true},{\"2\":false},{\"3\":false}]}', '2023-04-11 16:47:12', NULL),
(35, 9, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":true},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":true},{\"Bharuch\":false}]}', '2023-04-11 16:47:14', NULL),
(36, 9, 1, 3, '{\"answer_type\":\"Dropdown\",\"options\":[{\"20\":false},{\"21\":true}]}', 'Question 3', '{\"answer_type\":\"Dropdown\",\"options\":[{\"Male\":false},{\"Female\":true}]}', '2023-04-11 16:47:14', NULL),
(37, 9, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":true}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":true}]}', '2023-04-11 16:47:14', NULL),
(38, 9, 1, 11, '{\"answer_type\":\"Textarea\",\"options\":[{\"df\":true}]}', 'Question 5', '{\"answer_type\":\"Textarea\",\"options\":[{\"df\":true}]}', '2023-04-11 16:47:14', NULL),
(39, 9, 1, 12, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":true},{\"33\":false},{\"34\":false}]}', 'Question 6', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":true},{\"2\":false},{\"3\":false}]}', '2023-04-11 16:47:14', NULL),
(40, 26, 1, 1, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":false},{\"33\":false},{\"34\":false}]}', '', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":false},{\"2\":false},{\"3\":false}]}', '2023-04-11 20:10:49', NULL),
(41, 26, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-11 20:10:49', NULL),
(42, 26, 1, 3, '{\"answer_type\":\"Dropdown\",\"options\":[{\"20\":false},{\"21\":false}]}', 'Question 3', '{\"answer_type\":\"Dropdown\",\"options\":[{\"Male\":false},{\"Female\":false}]}', '2023-04-11 20:10:49', NULL),
(43, 26, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-11 20:10:50', NULL),
(44, 26, 1, 11, '{\"answer_type\":\"Textarea\",\"options\":[{\"fg\":true}]}', 'Question 5', '{\"answer_type\":\"Textarea\",\"options\":[{\"fg\":true}]}', '2023-04-11 20:10:50', NULL),
(45, 26, 1, 12, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":false},{\"33\":false},{\"34\":false}]}', 'Question 6', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":false},{\"2\":false},{\"3\":false}]}', '2023-04-11 20:10:50', NULL),
(46, 30, 1, 1, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":false},{\"33\":false},{\"34\":false}]}', '', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":false},{\"2\":false},{\"3\":false}]}', '2023-04-12 18:27:02', NULL),
(47, 30, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-12 18:27:02', NULL),
(48, 30, 1, 3, '{\"answer_type\":\"Dropdown\",\"options\":[{\"20\":false},{\"21\":false}]}', 'Question 3', '{\"answer_type\":\"Dropdown\",\"options\":[{\"Male\":false},{\"Female\":false}]}', '2023-04-12 18:27:03', NULL),
(49, 30, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-12 18:27:03', NULL),
(50, 30, 1, 11, '{\"answer_type\":\"Textarea\",\"options\":[{\"dsf\":true}]}', 'Question 5', '{\"answer_type\":\"Textarea\",\"options\":[{\"dsf\":true}]}', '2023-04-12 18:27:03', NULL),
(51, 30, 1, 12, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":false},{\"33\":false},{\"34\":false}]}', 'Question 6', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":false},{\"2\":false},{\"3\":false}]}', '2023-04-12 18:27:04', NULL),
(52, 31, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-12 18:47:44', NULL),
(53, 31, 1, 29, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'q1', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-12 18:47:45', NULL),
(54, 32, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":true},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":true},{\"Bharuch\":false}]}', '2023-04-12 18:48:27', NULL),
(55, 32, 1, 29, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'q1', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-12 18:48:27', NULL),
(56, 33, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":true},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":true},{\"Bharuch\":false}]}', '2023-04-12 18:49:54', NULL),
(57, 33, 1, 30, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-12 18:49:55', NULL),
(58, 34, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-12 18:52:10', NULL),
(59, 34, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-12 18:52:11', NULL),
(60, 35, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":true},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":true},{\"Bharuch\":false}]}', '2023-04-12 19:52:28', NULL),
(61, 35, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-12 19:52:29', NULL),
(62, 36, 1, 1, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":false},{\"33\":false},{\"34\":false}]}', 'nas', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":false},{\"2\":false},{\"3\":false}]}', '2023-04-12 23:41:56', NULL),
(63, 36, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-12 23:41:56', NULL),
(64, 36, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-12 23:41:57', NULL),
(65, 37, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-13 20:52:08', NULL),
(66, 37, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-13 20:52:08', NULL),
(67, 38, 1, 1, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":true},{\"33\":false},{\"34\":false}]}', 'nas', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":true},{\"2\":false},{\"3\":false}]}', '2023-04-13 20:59:04', NULL),
(68, 38, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":true},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":true},{\"Bharuch\":false}]}', '2023-04-13 20:59:04', NULL),
(69, 38, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-13 20:59:04', NULL),
(70, 39, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-13 21:02:15', NULL),
(71, 39, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-13 21:02:15', NULL),
(72, 40, 1, 4, '{\"answer_type\":\"Checkbox\",\"options\":[{\"22\":false},{\"23\":false}]}', 'Question 4', '{\"answer_type\":\"Checkbox\",\"options\":[{\"Vadodara\":false},{\"Bharuch\":false}]}', '2023-04-13 22:26:23', NULL),
(73, 40, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-13 22:26:23', NULL),
(74, 41, 1, 1, '{\"answer_type\":\"Dropdown\",\"options\":[{\"32\":true},{\"33\":false},{\"34\":false}]}', 'nas', '{\"answer_type\":\"Dropdown\",\"options\":[{\"1\":true},{\"2\":false},{\"3\":false}]}', '2023-04-14 16:47:44', NULL),
(75, 41, 1, 2, '{\"answer_type\":\"Radio\",\"options\":[{\"22\":true},{\"23\":false}]}', 'Question 2', '{\"answer_type\":\"Radio\",\"options\":[{\"Vadodara\":true},{\"Bharuch\":false}]}', '2023-04-14 16:47:44', NULL),
(76, 41, 1, 31, '{\"answer_type\":\"Textbox\",\"options\":[{\"test\":true}]}', 'req q', '{\"answer_type\":\"Textbox\",\"options\":[{\"test\":true}]}', '2023-04-14 16:47:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_subcategory`
--

CREATE TABLE `tb_property_subcategory` (
  `id` int(11) NOT NULL,
  `property_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_subcategory`
--

INSERT INTO `tb_property_subcategory` (`id`, `property_category_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 3, 'Independent House/ Villa', 1, '2023-02-09 10:27:56', '2023-02-09 19:02:19'),
(2, 3, 'Apartment / Flat', 1, '2023-02-09 10:28:14', NULL),
(3, 3, 'Plot / Land', 1, '2023-02-09 10:28:36', NULL),
(4, 3, 'Farm House', 1, '2023-02-09 10:28:54', NULL),
(5, 4, 'Office', 1, '2023-02-09 10:30:29', '2023-02-09 10:30:50'),
(6, 4, 'Shop', 1, '2023-02-09 10:31:04', NULL),
(7, 4, 'Factory', 1, '2023-02-09 10:31:30', NULL),
(8, 4, 'Warehouse', 1, '2023-02-09 10:31:45', NULL),
(9, 4, 'Hotel/Resort', 1, '2023-02-09 10:32:00', NULL),
(10, 4, 'Restaurant', 1, '2023-02-09 10:32:14', '2023-02-10 06:36:40'),
(11, 4, 'Industrial Land', 1, '2023-02-09 10:32:31', NULL),
(12, 4, 'Commercial Land', 1, '2023-02-09 10:32:45', NULL),
(13, 5, 'Agriculture Land', 1, '2023-02-09 10:33:00', NULL),
(14, 5, 'Commercial Land', 1, '2023-02-09 10:33:14', NULL),
(15, 5, 'Residential Land', 1, '2023-02-09 10:33:29', NULL),
(16, 5, 'Non Agriculture land', 1, '2023-02-09 10:33:42', '2023-02-10 06:36:50'),
(18, 6, 'Apartment', 1, '2023-02-09 10:35:41', NULL),
(19, 6, 'Independent House Villa', 1, '2023-02-09 10:35:56', NULL),
(20, 6, 'Shop', 1, '2023-02-09 10:36:10', NULL),
(21, 6, 'Office', 1, '2023-02-09 10:36:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_type`
--

CREATE TABLE `tb_property_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_type`
--

INSERT INTO `tb_property_type` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(7, 'Commercial', 1, '2023-02-07 16:21:21', NULL),
(8, 'Land', 1, '2023-02-07 16:21:35', NULL),
(9, 'New Projects', 1, '2023-02-07 16:21:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_question_master`
--

CREATE TABLE `tb_question_master` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `question_answer_inputtype` varchar(255) NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  `is_require` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_question_master`
--

INSERT INTO `tb_question_master` (`id`, `question`, `question_answer_inputtype`, `source_id`, `is_require`, `status`, `created_date`, `updated_date`) VALUES
(1, 'nas', 'Dropdown', 18, 0, 1, '2023-02-16 11:58:06', NULL),
(2, 'Question 2', 'Radio', 16, 1, 1, '2023-02-16 11:58:47', NULL),
(3, 'Question 3', 'Dropdown', 17, 0, 1, '2023-02-19 07:46:50', NULL),
(4, 'Question 4', 'Checkbox', 16, 0, 1, '2023-02-19 08:04:17', NULL),
(11, 'Question 5', 'Textarea', 0, 1, 1, '2023-03-06 18:41:32', NULL),
(12, 'Question 6', 'Dropdown', 18, 0, 1, '2023-03-06 18:41:56', NULL),
(13, 'email', 'Email', 0, 0, 1, '2023-03-25 18:38:22', NULL),
(14, 'link', 'Link', 0, 0, 1, '2023-03-25 18:38:38', NULL),
(15, 'no', 'Phone', 0, 0, 1, '2023-03-25 18:38:54', NULL),
(16, 'img', 'Image', 0, 0, 1, '2023-03-25 18:39:05', NULL),
(17, 'VIDEO', 'Video Gallery', 0, 0, 1, '2023-03-26 06:30:23', NULL),
(18, 'Location', 'Google Map', 0, 0, 1, '2023-03-26 06:30:36', NULL),
(20, 'Image Gallery', 'Image Gallery', 0, 0, 1, '2023-03-27 07:03:31', NULL),
(21, 'video gallery', 'Video Gallery', 0, 0, 1, '2023-03-28 09:53:10', NULL),
(22, 'q radio', 'Radio', 17, 1, 1, '2023-04-12 10:15:58', NULL),
(23, 'hgg', 'Textbox', 0, 0, 1, '2023-04-12 10:17:09', NULL),
(24, 'bhg', 'Textbox', 0, 0, 1, '2023-04-12 10:29:52', NULL),
(25, 'tg', 'Textbox', 0, 0, 1, '2023-04-12 10:30:37', NULL),
(26, 'xcv', 'Textbox', 0, 1, 1, '2023-04-12 11:05:21', NULL),
(27, 'vb', 'Textbox', 0, 0, 1, '2023-04-12 11:05:54', NULL),
(28, 'gvb', 'Dropdown', 15, 1, 1, '2023-04-12 11:06:23', NULL),
(29, 'q1', 'Textbox', 0, 0, 1, '2023-04-12 12:49:55', NULL),
(31, 'req q', 'Textbox', 0, 0, 1, '2023-04-12 13:20:49', NULL),
(32, 'nnnnn', 'Dropdown', 15, 0, 1, '2023-04-13 01:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_source_master`
--

CREATE TABLE `tb_source_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_source_master`
--

INSERT INTO `tb_source_master` (`id`, `name`, `status`, `created_date`) VALUES
(1, 'Facebook', 1, '2023-03-21 10:58:37'),
(2, 'Youtube', 1, '2023-03-21 10:58:47');

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
(32, 'Gujarat', 1, 1, '2023-04-24 08:13:31'),
(33, 'jamnagAar', 2, 0, '2023-04-26 10:57:54'),
(34, 'rajkot', 2, 0, '2023-04-26 10:57:54'),
(35, 'ahemdabad', 2, 0, '2023-04-26 10:57:54'),
(36, 'jamnagAar', 3, 0, '2023-04-26 10:58:32'),
(37, 'rajkot', 3, 0, '2023-04-26 10:58:32'),
(38, 'ahemdabad', 3, 0, '2023-04-26 10:58:32'),
(39, 'jamnagAar', 2, 1, '2023-04-26 11:04:19'),
(40, 'rajkot', 2, 1, '2023-04-26 11:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_master`
--

CREATE TABLE `tb_status_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `source_category_master`
--
ALTER TABLE `source_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source_option_master`
--
ALTER TABLE `source_option_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agent_contact_master`
--
ALTER TABLE `tbl_agent_contact_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agent_note_master`
--
ALTER TABLE `tbl_agent_note_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_contact_master`
--
ALTER TABLE `tbl_customer_contact_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_note_master`
--
ALTER TABLE `tbl_note_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reminder_master`
--
ALTER TABLE `tbl_reminder_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff_master`
--
ALTER TABLE `tbl_staff_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agent_master`
--
ALTER TABLE `tb_agent_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agent_specialist_area`
--
ALTER TABLE `tb_agent_specialist_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agent_specialist_for`
--
ALTER TABLE `tb_agent_specialist_for`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_area_master`
--
ALTER TABLE `tb_area_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_assigned_master`
--
ALTER TABLE `tb_assigned_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_city_master`
--
ALTER TABLE `tb_city_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_country_master`
--
ALTER TABLE `tb_country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_customer_master`
--
ALTER TABLE `tb_customer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_form_master`
--
ALTER TABLE `tb_form_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master`
--
ALTER TABLE `tb_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_phase_master`
--
ALTER TABLE `tb_phase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_position_master`
--
ALTER TABLE `tb_position_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_property_category`
--
ALTER TABLE `tb_property_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_property_master`
--
ALTER TABLE `tb_property_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_property_question_answer`
--
ALTER TABLE `tb_property_question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_property_subcategory`
--
ALTER TABLE `tb_property_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_category_id` (`property_category_id`);

--
-- Indexes for table `tb_property_type`
--
ALTER TABLE `tb_property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_question_master`
--
ALTER TABLE `tb_question_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_source_master`
--
ALTER TABLE `tb_source_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_state_master`
--
ALTER TABLE `tb_state_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status_master`
--
ALTER TABLE `tb_status_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `source_category_master`
--
ALTER TABLE `source_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `source_option_master`
--
ALTER TABLE `source_option_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_agent_contact_master`
--
ALTER TABLE `tbl_agent_contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_agent_note_master`
--
ALTER TABLE `tbl_agent_note_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_contact_master`
--
ALTER TABLE `tbl_customer_contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_note_master`
--
ALTER TABLE `tbl_note_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_reminder_master`
--
ALTER TABLE `tbl_reminder_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_staff_master`
--
ALTER TABLE `tbl_staff_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_agent_master`
--
ALTER TABLE `tb_agent_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_agent_specialist_area`
--
ALTER TABLE `tb_agent_specialist_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_agent_specialist_for`
--
ALTER TABLE `tb_agent_specialist_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_area_master`
--
ALTER TABLE `tb_area_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_assigned_master`
--
ALTER TABLE `tb_assigned_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_city_master`
--
ALTER TABLE `tb_city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_country_master`
--
ALTER TABLE `tb_country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_customer_master`
--
ALTER TABLE `tb_customer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_form_master`
--
ALTER TABLE `tb_form_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_master`
--
ALTER TABLE `tb_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tb_phase_master`
--
ALTER TABLE `tb_phase_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_position_master`
--
ALTER TABLE `tb_position_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_property_category`
--
ALTER TABLE `tb_property_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_property_master`
--
ALTER TABLE `tb_property_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_property_question_answer`
--
ALTER TABLE `tb_property_question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tb_property_subcategory`
--
ALTER TABLE `tb_property_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_property_type`
--
ALTER TABLE `tb_property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_question_master`
--
ALTER TABLE `tb_question_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_source_master`
--
ALTER TABLE `tb_source_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_state_master`
--
ALTER TABLE `tb_state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_status_master`
--
ALTER TABLE `tb_status_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_property_subcategory`
--
ALTER TABLE `tb_property_subcategory`
  ADD CONSTRAINT `tb_property_subcategory_ibfk_1` FOREIGN KEY (`property_category_id`) REFERENCES `tb_property_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
