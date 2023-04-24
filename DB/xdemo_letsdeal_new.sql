-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2023 at 05:22 PM
-- Server version: 5.7.27
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xdemo_letsdeal_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `source_category_master`
--

CREATE TABLE `source_category_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `source_category_master`
--

INSERT INTO `source_category_master` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(2, 'TENNUR (SHARAT)', 1, '2023-04-17 05:31:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `source_option_master`
--

CREATE TABLE `source_option_master` (
  `id` int(11) NOT NULL,
  `source_cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `source_option_master`
--

INSERT INTO `source_option_master` (`id`, `source_cat_id`, `name`, `created_date`, `updated_date`) VALUES
(1, 1, 'Male', '2023-04-14 08:57:17', NULL),
(2, 1, 'Female', '2023-04-14 08:57:17', NULL),
(3, 2, 'JUNI', '2023-04-17 05:31:28', NULL),
(4, 2, 'NAVI', '2023-04-17 05:31:28', NULL),
(5, 2, '73AA', '2023-04-17 05:31:28', NULL),
(6, 2, 'BIN KHETI PRI', '2023-04-17 05:31:28', NULL),
(7, 2, 'KALAM 43', '2023-04-17 05:31:28', NULL);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_note_master`
--

CREATE TABLE `tbl_agent_note_master` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note_master`
--

CREATE TABLE `tbl_note_master` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_master`
--

INSERT INTO `tbl_staff_master` (`id`, `first_name`, `last_name`, `email`, `phone`, `status`, `created_date`, `updated_date`) VALUES
(1, 'ADITYA', 'GUPTA', 'shahvaibhavshah18@gmail.com', '9574148776', 1, '2023-04-13 12:34:22', NULL);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agent_specialist_for`
--

INSERT INTO `tb_agent_specialist_for` (`id`, `agent_id`, `pro_category_id`, `pro_subcategory_id`, `status`, `created_date`, `updated_date`) VALUES
(4, 1, 1, 2, 1, '2023-04-20 21:17:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_master`
--

CREATE TABLE `tb_area_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_city_master`
--

CREATE TABLE `tb_city_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_country_master`
--

CREATE TABLE `tb_country_master` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_country_master`
--

INSERT INTO `tb_country_master` (`id`, `name`, `status`, `created_date`) VALUES
(1, 'Gujarat', 1, '2023-04-24 09:37:02'),
(2, 'Maharashtra', 1, '2023-04-24 09:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_master`
--

CREATE TABLE `tb_customer_master` (
  `id` int(11) NOT NULL,
  `inquiry_type` varchar(10) NOT NULL COMMENT 'agent, direct',
  `agent_id` int(11) DEFAULT NULL,
  `source_id` int(11) NOT NULL,
  `assigned_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_master`
--

CREATE TABLE `tb_master` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_master`
--

INSERT INTO `tb_master` (`id`, `code`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, '001', 'WANT TO SALE', 1, '2023-04-17 05:11:41', NULL),
(2, '02', 'WANT TO PURCHASE', 1, '2023-04-17 05:12:48', NULL),
(3, '03', 'AVAILABLE ON RENT', 1, '2023-04-17 05:13:05', NULL),
(5, '05', 'AVAILABLE FOR LONG LEASE', 1, '2023-04-17 05:13:41', NULL),
(7, '005', 'AVAILABLE PRE LEASED FOR SALE', 1, '2023-04-17 05:14:56', NULL),
(8, '06', 'REQUIRED ON RENT', 1, '2023-04-17 05:15:38', NULL),
(9, '07', 'REQUIRED ON LONG LEASE', 1, '2023-04-17 05:15:51', NULL),
(10, '08', 'REQUIRED PRE LEASE FOR PURCHASE', 1, '2023-04-17 05:16:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_phase_master`
--

CREATE TABLE `tb_phase_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_phase_master`
--

INSERT INTO `tb_phase_master` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 'PHASE 1', 1, '2023-04-13 12:15:34', NULL),
(2, 'PHASE 2', 1, '2023-04-13 12:15:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_position_master`
--

CREATE TABLE `tb_position_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_position_master`
--

INSERT INTO `tb_position_master` (`id`, `name`, `status`, `created_date`) VALUES
(2, 'OWNER', 1, '2023-04-13 12:40:17'),
(3, 'ASST MARKETING', 1, '2023-04-13 12:41:36'),
(4, 'HEAD MARKETING', 1, '2023-04-13 12:41:50'),
(5, 'VISIT BOY', 1, '2023-04-13 12:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_category`
--

CREATE TABLE `tb_property_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_category`
--

INSERT INTO `tb_property_category` (`id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 'RESIDENCIAL', 1, '2023-04-13 12:05:52', NULL),
(2, 'COMMERCIAL', 1, '2023-04-17 04:54:36', NULL),
(3, 'INDUSTRIAL', 1, '2023-04-17 04:55:07', NULL),
(4, 'OPEN LAND', 1, '2023-04-17 04:55:44', NULL),
(5, 'FARM HOUSE', 1, '2023-04-17 05:08:45', NULL);

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_question_answer`
--

CREATE TABLE `tb_property_question_answer` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question` text NOT NULL,
  `answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_question_answer`
--

INSERT INTO `tb_property_question_answer` (`id`, `property_id`, `phase_id`, `question_id`, `answer_ids`, `question`, `answers`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 25, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'BHK', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-14 14:29:38', NULL),
(2, 1, 1, 26, '{\"answer_type\":\"Radio\",\"options\":[{\"1\":false},{\"2\":false}]}', 'test q', '{\"answer_type\":\"Radio\",\"options\":[{\"Male\":false},{\"Female\":false}]}', '2023-04-14 14:29:38', NULL),
(3, 2, 1, 25, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'BHK', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-14 14:38:03', NULL),
(4, 2, 1, 26, '{\"answer_type\":\"Radio\",\"options\":[{\"1\":false},{\"2\":false}]}', 'test q', '{\"answer_type\":\"Radio\",\"options\":[{\"Male\":false},{\"Female\":false}]}', '2023-04-14 14:38:03', NULL),
(5, 3, 1, 25, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'BHK', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-14 14:50:27', NULL),
(6, 3, 1, 26, '{\"answer_type\":\"Radio\",\"options\":[{\"1\":false},{\"2\":false}]}', 'test q', '{\"answer_type\":\"Radio\",\"options\":[{\"Male\":false},{\"Female\":false}]}', '2023-04-14 14:50:27', NULL),
(7, 4, 1, 25, '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', 'BHK', '{\"answer_type\":\"Textbox\",\"options\":[{\"\":true}]}', '2023-04-14 15:10:23', NULL),
(8, 4, 1, 26, '{\"answer_type\":\"Radio\",\"options\":[{\"1\":false},{\"2\":false}]}', 'test q', '{\"answer_type\":\"Radio\",\"options\":[{\"Male\":false},{\"Female\":false}]}', '2023-04-14 15:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_subcategory`
--

CREATE TABLE `tb_property_subcategory` (
  `id` int(11) NOT NULL,
  `property_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_property_subcategory`
--

INSERT INTO `tb_property_subcategory` (`id`, `property_category_id`, `name`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'APARTMENT / FLAT', 1, '2023-04-13 12:06:12', NULL),
(2, 1, 'ROW HOUSE', 1, '2023-04-17 04:56:23', NULL),
(3, 1, 'BUNGLOW', 1, '2023-04-17 04:56:42', NULL),
(4, 1, 'SERVICE APARTMENT', 1, '2023-04-17 04:57:06', NULL),
(5, 1, 'TENAMENT', 1, '2023-04-17 04:57:17', NULL),
(6, 2, 'SHOP', 1, '2023-04-17 04:57:52', NULL),
(7, 2, 'SHOW ROOM ', 1, '2023-04-17 04:58:05', NULL),
(8, 2, 'OFFICE', 1, '2023-04-17 04:58:20', NULL),
(9, 2, 'CORPORATE SPACE', 1, '2023-04-17 04:58:38', NULL),
(10, 2, 'HOTEL', 1, '2023-04-17 04:59:27', '2023-04-17 04:59:40'),
(11, 2, 'RESORT', 1, '2023-04-17 04:59:54', NULL),
(12, 2, 'RESTAURANT', 1, '2023-04-17 05:00:09', NULL),
(13, 2, 'HOSPITAL', 1, '2023-04-17 05:00:22', NULL),
(14, 2, 'GODOWN', 1, '2023-04-17 05:00:50', NULL),
(15, 2, 'WAREHOUSE', 1, '2023-04-17 05:01:01', '2023-04-17 05:01:14'),
(16, 2, 'COLDSTORAGE', 1, '2023-04-17 05:01:26', NULL),
(17, 2, 'CO WORKING SPACE', 1, '2023-04-17 05:02:11', NULL),
(18, 2, 'DRYPORT', 1, '2023-04-17 05:02:35', NULL),
(19, 3, 'SHED', 1, '2023-04-17 05:02:55', NULL),
(20, 3, 'RCC GALA', 1, '2023-04-17 05:03:28', NULL),
(21, 4, 'AGREECULTURE LAND ', 1, '2023-04-17 05:03:48', NULL),
(22, 4, 'NON AGREECULTURE', 1, '2023-04-17 05:04:02', NULL),
(23, 4, 'COMMERCIAL PROJECT LAND', 1, '2023-04-17 05:04:46', NULL),
(24, 4, 'RESIDENCIAL PROJECT LAND', 1, '2023-04-17 05:05:05', NULL),
(25, 4, 'INDUSTRIAL PLOTING LAND', 1, '2023-04-17 05:05:22', NULL),
(26, 4, 'FARM HOUSE PROJECT LAND', 1, '2023-04-17 05:05:40', NULL),
(27, 4, 'BUNGLOW PLOT', 1, '2023-04-17 05:06:10', '2023-04-17 05:06:18'),
(28, 4, 'ROW HOUSE PLOT', 1, '2023-04-17 05:06:34', NULL),
(29, 4, 'TENAMENT PLOT', 1, '2023-04-17 05:06:45', NULL),
(30, 4, 'SEZ', 1, '2023-04-17 05:08:25', NULL),
(31, 5, 'FARM HOUSE', 1, '2023-04-17 05:09:06', NULL),
(32, 5, 'WEEK END HOME', 1, '2023-04-17 05:09:20', NULL),
(33, 5, 'WEEK END VILLA', 1, '2023-04-17 05:09:47', NULL),
(34, 5, 'WEEK END BUNGLOW', 1, '2023-04-17 05:10:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_property_type`
--

CREATE TABLE `tb_property_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_question_master`
--

INSERT INTO `tb_question_master` (`id`, `question`, `question_answer_inputtype`, `source_id`, `is_require`, `status`, `created_date`, `updated_date`) VALUES
(1, 'AREA LOCATION', 'Dropdown', 0, 0, 1, '2023-04-13 12:19:16', NULL),
(2, 'LAND MARK', 'Dropdown', 0, 0, 1, '2023-04-13 12:19:33', NULL),
(3, 'BUILDING NAME', 'Dropdown', 0, 0, 1, '2023-04-13 12:19:55', NULL),
(4, 'TOTAL TOWARS', 'Textbox', 0, 0, 1, '2023-04-13 12:20:53', NULL),
(5, 'TOTAL FLOOR', 'Textbox', 0, 0, 1, '2023-04-13 12:21:08', NULL),
(6, 'PROPERTY IN TOWAR', 'Textbox', 0, 0, 1, '2023-04-13 12:21:42', NULL),
(7, 'PROPERTY ON FLOOR', 'Textbox', 0, 0, 1, '2023-04-13 12:22:08', NULL),
(8, 'VASTU', 'Dropdown', 0, 0, 1, '2023-04-13 12:22:29', NULL),
(9, 'SQFT CARPET', 'Number', 0, 0, 1, '2023-04-13 12:23:25', NULL),
(10, 'SQFT SALEBLE', 'Number', 0, 0, 1, '2023-04-13 12:23:48', NULL),
(11, 'FURNITURE', 'Dropdown', 0, 0, 1, '2023-04-13 12:24:11', NULL),
(12, 'ELECTRONICS', 'Dropdown', 0, 0, 1, '2023-04-13 12:24:46', NULL),
(13, 'AMENITIS', 'Dropdown', 0, 0, 1, '2023-04-13 12:25:23', NULL),
(14, 'UNIT NO', 'Textbox', 0, 0, 1, '2023-04-13 12:25:45', NULL),
(15, 'ASKING PRICE', 'Textbox', 0, 0, 1, '2023-04-13 12:26:11', NULL),
(16, 'LEAGALPRICE', 'Textbox', 0, 0, 1, '2023-04-13 12:26:28', NULL),
(17, 'MAINTENANCE', 'Textbox', 0, 0, 1, '2023-04-13 12:26:41', NULL),
(18, 'OTHER EXP.ANY', 'Select Q&A Input type', 0, 0, 1, '2023-04-13 12:27:01', NULL),
(19, 'ALLOTED PARKING', 'Textbox', 0, 0, 1, '2023-04-13 12:27:28', NULL),
(20, 'SOCIETY NAME', 'Textbox', 0, 0, 1, '2023-04-13 12:28:52', NULL),
(21, 'PLOT AREA IN SQYRD', 'Textbox', 0, 0, 1, '2023-04-13 12:29:07', NULL),
(22, 'CONS.FLOOR', 'Textbox', 0, 0, 1, '2023-04-13 12:29:30', NULL),
(23, 'FLOOR HIGHT', 'Textbox', 0, 0, 1, '2023-04-13 12:30:09', NULL),
(24, 'BUILDING AGE APP.', 'Textbox', 0, 0, 1, '2023-04-13 12:30:34', NULL),
(25, 'BHK', 'Textbox', 0, 0, 1, '2023-04-13 12:47:28', NULL),
(26, 'DISTRICT', 'Dropdown', 0, 1, 1, '2023-04-17 05:28:32', NULL),
(27, 'SUB DISTRICT', 'Dropdown', 0, 1, 1, '2023-04-17 05:28:46', NULL),
(28, 'MOJE', 'Dropdown', 0, 1, 1, '2023-04-17 05:28:59', NULL),
(29, 'TENNUR (SHARAT)', 'Dropdown', 2, 1, 1, '2023-04-17 05:29:22', NULL),
(30, 'ACRE', 'Textbox', 0, 1, 1, '2023-04-17 05:32:19', NULL),
(31, 'VIGHA', 'Textbox', 0, 0, 1, '2023-04-17 05:32:44', NULL),
(32, 'ZONE', 'Dropdown', 0, 1, 1, '2023-04-17 05:33:04', NULL),
(33, 'AUTHORITIES', 'Dropdown', 0, 1, 1, '2023-04-17 05:33:20', NULL),
(34, 'TP', 'Dropdown', 0, 1, 1, '2023-04-17 05:33:38', NULL),
(35, 'OP', 'Textbox', 0, 1, 1, '2023-04-17 05:34:01', NULL),
(36, 'FP', 'Textbox', 0, 0, 1, '2023-04-17 05:34:12', NULL),
(37, 'CANAL PASS THROUGH', 'Radio', 0, 1, 1, '2023-04-17 05:34:48', NULL),
(38, 'RAILWAY LINE PASS THROUGH', 'Radio', 0, 1, 1, '2023-04-17 05:35:17', NULL),
(39, 'HIGH TENSION ELE LINE PASS THROUGH', 'Radio', 0, 0, 1, '2023-04-17 05:35:40', NULL),
(40, 'ROAD ALIAMENT ANY', 'Radio', 0, 1, 1, '2023-04-17 05:36:02', NULL),
(41, 'ANY NATURAL BEOUTY', 'Dropdown', 0, 1, 1, '2023-04-17 05:36:34', NULL),
(42, 'LAND LEVEL', 'Dropdown', 0, 1, 1, '2023-04-17 05:37:11', NULL),
(43, 'ACCESS ROAD TYPE', 'Dropdown', 0, 1, 1, '2023-04-17 05:37:26', NULL),
(44, 'ACCESS ROAD SIZE', 'Dropdown', 0, 1, 1, '2023-04-17 05:38:04', NULL),
(45, 'POWAR', 'Dropdown', 0, 1, 1, '2023-04-17 05:38:25', NULL),
(46, 'AVAILABALE OF STP', 'Radio', 0, 1, 1, '2023-04-17 05:39:28', NULL),
(47, 'AVAILABLE CEPT LINE', 'Radio', 0, 1, 1, '2023-04-17 05:41:46', NULL),
(48, 'PLOT SIZE L x W', 'Textbox', 0, 1, 1, '2023-04-17 05:43:19', NULL),
(49, 'SQURE YARD', 'Textbox', 0, 1, 1, '2023-04-17 05:43:39', NULL),
(50, 'SQURE FEET', 'Textbox', 0, 1, 1, '2023-04-17 05:43:51', NULL),
(51, 'SQURE METER', 'Textbox', 0, 1, 1, '2023-04-17 05:44:06', NULL),
(52, 'DOCUMENTS AVAILABLE', 'Dropdown', 0, 1, 1, '2023-04-17 05:45:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_source_master`
--

CREATE TABLE `tb_source_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_source_master`
--

INSERT INTO `tb_source_master` (`id`, `name`, `status`, `created_date`) VALUES
(1, 'DIRECT OWNER', 1, '2023-04-13 12:13:20'),
(2, 'NEWS PAPER ADVERTISE', 1, '2023-04-17 05:20:55'),
(3, 'WHATS APP GROUP', 1, '2023-04-17 05:21:09'),
(4, 'CHANNEL PARTNER', 1, '2023-04-17 05:21:32'),
(5, 'REFRANCE FRIENDS & RELATIVE', 1, '2023-04-17 05:21:47'),
(6, 'FACE BOOK', 1, '2023-04-17 05:21:55'),
(7, 'MAGIC BRIKS', 1, '2023-04-17 05:22:05'),
(8, '99 ACRE', 1, '2023-04-17 05:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_state_master`
--

CREATE TABLE `tb_state_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `source_category_master`
--
ALTER TABLE `source_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `source_option_master`
--
ALTER TABLE `source_option_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_agent_contact_master`
--
ALTER TABLE `tbl_agent_contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_agent_note_master`
--
ALTER TABLE `tbl_agent_note_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer_contact_master`
--
ALTER TABLE `tbl_customer_contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_note_master`
--
ALTER TABLE `tbl_note_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_staff_master`
--
ALTER TABLE `tbl_staff_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_agent_master`
--
ALTER TABLE `tb_agent_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_agent_specialist_area`
--
ALTER TABLE `tb_agent_specialist_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_agent_specialist_for`
--
ALTER TABLE `tb_agent_specialist_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_area_master`
--
ALTER TABLE `tb_area_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_city_master`
--
ALTER TABLE `tb_city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_country_master`
--
ALTER TABLE `tb_country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_customer_master`
--
ALTER TABLE `tb_customer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_form_master`
--
ALTER TABLE `tb_form_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_master`
--
ALTER TABLE `tb_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_phase_master`
--
ALTER TABLE `tb_phase_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_position_master`
--
ALTER TABLE `tb_position_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_property_category`
--
ALTER TABLE `tb_property_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_property_master`
--
ALTER TABLE `tb_property_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_property_question_answer`
--
ALTER TABLE `tb_property_question_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_property_subcategory`
--
ALTER TABLE `tb_property_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_property_type`
--
ALTER TABLE `tb_property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_question_master`
--
ALTER TABLE `tb_question_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_source_master`
--
ALTER TABLE `tb_source_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_state_master`
--
ALTER TABLE `tb_state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
