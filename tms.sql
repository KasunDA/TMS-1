-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 08:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_entry`
--

CREATE TABLE `accounts_entry` (
  `ae_id` int(11) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `action` varchar(10) NOT NULL,
  `method` varchar(10) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `check_number` varchar(30) DEFAULT NULL,
  `previous_balance` decimal(13,2) NOT NULL,
  `current_balance` decimal(13,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `name`, `address`, `contact`, `status`) VALUES
(1, 'Tayyab ul Islam', 'address', '03156065162', 1),
(2, 'Umar Bilal', 'address', '03030606165', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `short_form` varchar(60) NOT NULL,
  `full_form` varchar(60) NOT NULL,
  `account_title` varchar(60) NOT NULL,
  `account_number` varchar(35) NOT NULL,
  `address` text NOT NULL,
  `balance` decimal(13,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `short_form`, `full_form`, `account_title`, `account_number`, `address`, `balance`, `status`) VALUES
(1, 'HBL', 'Habib Bank Limited', 'Butt  Brothers', '1080-2818-5151', 'address', '20000.00', 1),
(2, 'UBL', 'United Bank limited', 'Butt Brothers', '20651616', 'address', '50000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE `bike` (
  `bike_id` int(11) NOT NULL,
  `bike_number` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`bike_id`, `bike_number`, `status`) VALUES
(1, 'KT6456', 1),
(2, 'KG5484', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account`
--

CREATE TABLE `chart_of_account` (
  `coa_id` int(11) NOT NULL,
  `short_form` varchar(16) NOT NULL,
  `full_form` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(15) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_of_account`
--

INSERT INTO `chart_of_account` (`coa_id`, `short_form`, `full_form`, `address`, `contact`, `status`) VALUES
(1, 'AST', 'Agha Steel.', 'address', '03030303030', 1),
(2, 'STM', 'Pak Steel Mill', 'address', '03216516161', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cmp_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cmp_id`, `name`, `status`) VALUES
(1, 'Agha Steel', 1),
(2, 'Pakistan Steel Mill', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `consignee_id` int(11) NOT NULL,
  `short_form` varchar(100) NOT NULL,
  `full_form` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`consignee_id`, `short_form`, `full_form`, `status`) VALUES
(1, 'consignee 1', 'consignee 1', 1),
(2, 'consignee 2', 'consignee 2', 1),
(3, 'consignee 3', 'consignee 3', 1),
(4, 'consignee 4', 'consignee 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE `container` (
  `container_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`container_id`, `type`, `status`) VALUES
(1, 'Tanki', 1),
(2, 'Dry Containers', 1),
(3, 'Open Top Containers', 1),
(4, 'Tunnel Container', 1),
(5, 'Side Open Storage Container', 1);

-- --------------------------------------------------------

--
-- Table structure for table `container_entry`
--

CREATE TABLE `container_entry` (
  `ce_id` int(11) NOT NULL,
  `container_number` varchar(30) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `diesel` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `color` varchar(7) NOT NULL,
  `mr_charges` int(11) NOT NULL,
  `remarks` text,
  `cm_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_entry`
--

INSERT INTO `container_entry` (`ce_id`, `container_number`, `vehicle_id`, `advance`, `diesel`, `balance`, `color`, `mr_charges`, `remarks`, `cm_id`, `status`) VALUES
(1, 'APZU123456', 3, 500, 0, 500, 'white', 0, '', 1, 1),
(2, 'APZU369852', 2, 500, 0, 500, 'white', 0, '', 1, 1),
(3, 'APZU135454', 1, 500, 0, 500, 'white', 0, '', 1, 1),
(4, 'APZU123456', 3, 500, 0, 500, 'white', 0, '', 2, 1),
(5, 'APZU369852', 2, 500, 0, 500, 'white', 0, '', 2, 1),
(6, 'APZU135454', 1, 500, 0, 500, 'white', 0, '', 2, 1),
(7, 'APZU123456', 3, 500, 0, 500, 'white', 0, '', 3, 1),
(8, 'APZU369852', 2, 500, 0, 500, 'white', 0, '', 3, 1),
(9, 'APZU135454', 1, 500, 0, 500, 'white', 0, '', 3, 1),
(10, 'APZU123456', 3, 500, 0, 500, 'white', 0, '', 4, 1),
(11, 'APZU369852', 2, 500, 0, 500, 'white', 0, '', 4, 1),
(12, 'APZU135454', 1, 500, 0, 500, 'white', 0, '', 4, 1),
(13, '231561', 2, 500, 0, 500, 'white', 0, '', 5, 1),
(14, '321654', 2, 200, 0, 800, 'white', 0, '', 5, 1),
(15, '1616156', 1, 200, 0, 1466, 'white', 0, '', 6, 1),
(16, '165161651', 1, 500, 0, 1166, 'white', 0, '', 6, 1),
(17, 'Apzu11331', 3, 200, 0, 700, 'white', 0, '', 7, 1),
(18, '1234564', 3, 500, 0, 500, 'white', 500, '', 8, 1),
(19, '2313', 2, 300, 3300, 322, 'white', 0, '', 9, 1),
(20, '321564', 1, 321, 600, 301, 'white', 0, '', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `container_movement`
--

CREATE TABLE `container_movement` (
  `cm_id` int(11) NOT NULL,
  `datee` varchar(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `coa_id` int(11) NOT NULL,
  `consignee_id` int(11) NOT NULL,
  `movement` varchar(17) NOT NULL,
  `empty_terminal_id` int(11) NOT NULL,
  `from_yard_id` int(11) NOT NULL,
  `to_yard_id` int(11) NOT NULL,
  `container_size` tinyint(4) NOT NULL,
  `party_charges` int(11) NOT NULL,
  `lot_of` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `bl_cro_number` varchar(30) NOT NULL,
  `job_number` varchar(30) NOT NULL,
  `index_number` varchar(30) NOT NULL,
  `rent` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `lolo_charges` int(11) NOT NULL,
  `weight_charges` int(11) NOT NULL,
  `paid_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_movement`
--

INSERT INTO `container_movement` (`cm_id`, `datee`, `agent_id`, `coa_id`, `consignee_id`, `movement`, `empty_terminal_id`, `from_yard_id`, `to_yard_id`, `container_size`, `party_charges`, `lot_of`, `line_id`, `bl_cro_number`, `job_number`, `index_number`, `rent`, `container_id`, `lolo_charges`, `weight_charges`, `paid_status`, `status`) VALUES
(1, '2018-05-17', 2, 1, 1, 'import', 5, 5, 4, 20, 25000, 3, 1, '123465', '1321655', '6516', 600, 3, 600, 200, 0, 1),
(2, '2018-05-17', 2, 2, 1, 'import', 5, 5, 4, 40, 25000, 3, 1, '123465', '1321655', '6516', 600, 3, 600, 200, 0, 1),
(3, '2018-05-17', 2, 1, 1, 'import', 5, 5, 4, 45, 25000, 3, 1, '123465', '1321655', '6516', 600, 3, 600, 200, 0, 1),
(4, '2018-05-17', 2, 2, 1, 'export', 5, 5, 4, 20, 25000, 3, 1, '123465', '1321655', '6516', 600, 3, 600, 200, 0, 1),
(5, '2018-05-19', 1, 2, 2, 'import', 1, 1, 3, 20, 81000, 2, 2, 'APZ123545', '13464', '1651615', 200, 4, 900, 100, 0, 1),
(6, '2018-05-19', 2, 1, 3, 'export', 5, 1, 2, 20, 50000, 2, 2, 'APUZ64516561', '661516', '1313', 155, 3, 2111, 600, 0, 1),
(7, '2018-05-19', 1, 1, 3, 'import', 3, 3, 2, 20, 50000, 3, 2, '11111', '156161', '1616', 500, 3, 600, 200, 0, 1),
(8, '2018-05-29', 2, 2, 4, 'import', 5, 5, 4, 20, 50000, 2, 1, '123456', '123564', '13', 600, 4, 600, 200, 0, 1),
(9, '2018-05-30', 2, 2, 4, 'open_cargo', 3, 4, 3, 20, 20000, 2, 1, '213456', '123546', '12312', 522, 5, 300, 200, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_description`
--

CREATE TABLE `daily_description` (
  `dd_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_description`
--

INSERT INTO `daily_description` (`dd_id`, `name`, `status`) VALUES
(1, 'lunch', 1),
(2, 'Advance', 1),
(3, 'Bike Expenses', 1),
(4, 'Driver Salary', 1),
(5, 'breakfast', 1),
(6, 'Party Payment', 1),
(7, 'Vehicle Monthly Payment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `dg_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`dg_id`, `designation`, `status`) VALUES
(1, 'driver', 1),
(2, 'd2', 0),
(3, 'officer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diesel_entry`
--

CREATE TABLE `diesel_entry` (
  `de_id` int(11) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `from_yard_id` int(11) NOT NULL,
  `to_yard_id` int(11) NOT NULL,
  `litre_rate` decimal(13,2) NOT NULL,
  `litres` decimal(13,2) NOT NULL,
  `extra_litres` decimal(13,2) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diesel_entry`
--

INSERT INTO `diesel_entry` (`de_id`, `datee`, `vehicle_id`, `from_yard_id`, `to_yard_id`, `litre_rate`, `litres`, `extra_litres`, `total`, `description`, `status`) VALUES
(1, '05/13/2018', 1, 1, 2, '60.00', '100.00', '10.00', '6600.00', '', 1),
(2, '05/13/2018', 1, 1, 2, '60.00', '100.00', '20.00', '7200.00', '', 1),
(3, '05/13/2018', 1, 1, 2, '60.00', '100.00', '0.00', '6000.00', '', 1),
(4, '05/13/2018', 1, 1, 2, '60.00', '100.00', '50.00', '9000.00', '', 1),
(5, '05/13/2018', 1, 1, 2, '60.00', '100.00', '10.00', '6600.00', '', 1),
(6, '05/13/2018', 1, 1, 2, '60.00', '100.00', '50.00', '9000.00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diesel_limit`
--

CREATE TABLE `diesel_limit` (
  `dl_id` int(11) NOT NULL,
  `from_yard` int(11) NOT NULL COMMENT 'yard',
  `to_yard` int(11) NOT NULL COMMENT 'yard',
  `limit_litre` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diesel_limit`
--

INSERT INTO `diesel_limit` (`dl_id`, `from_yard`, `to_yard`, `limit_litre`, `status`) VALUES
(1, 1, 2, 100, 1),
(2, 2, 3, 202, 1),
(3, 4, 5, 300, 1),
(4, 3, 4, 600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(16) NOT NULL,
  `ereferences` text,
  `truck_number` varchar(30) NOT NULL,
  `img_cnic` text NOT NULL,
  `img_license` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `name`, `cnic`, `father_name`, `address`, `contact`, `ereferences`, `truck_number`, `img_cnic`, `img_license`, `status`) VALUES
(1, 'Ahmed khan', '42501-5646845-7', 'Nazim khan', 'new address', '03377777777', 'NILL', '', 'uploads/caced7f7.jpg', 'uploads/f4927eb8.jpg', 1),
(2, 'asdasd', '42201-1565848-5', 'asdasd', 'asdads', '03055555555', 'NILL', '', 'uploads/7352d714.png', 'uploads/72709113.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `cnic_valid` varchar(15) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `e_contact_name1` varchar(30) NOT NULL,
  `relation1` varchar(20) NOT NULL,
  `e_contact1` varchar(20) NOT NULL,
  `e_contact_name2` varchar(30) DEFAULT NULL,
  `relation2` varchar(20) DEFAULT NULL,
  `e_contact2` varchar(20) DEFAULT NULL,
  `qualification` varchar(30) NOT NULL,
  `institute_name` varchar(30) NOT NULL,
  `subject` varchar(16) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `joining_date` varchar(20) NOT NULL,
  `dg_id` int(11) NOT NULL,
  `ereferences` text,
  `img_signature` text NOT NULL,
  `img_picture` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `cnic`, `cnic_valid`, `father_name`, `dob`, `email`, `address`, `e_contact_name1`, `relation1`, `e_contact1`, `e_contact_name2`, `relation2`, `e_contact2`, `qualification`, `institute_name`, `subject`, `contact`, `joining_date`, `dg_id`, `ereferences`, `img_signature`, `img_picture`, `status`) VALUES
(1, 'Ahmed khan', '42501-5646845-7', '11/21/2025', 'Nazim khan', '05/06/1983', 'ahmed_khan@yahoo.com', 'new address', 'Nazim khan', 'Father', '03106666666', '', '', '', 'b.com', 'indus', 'subject', '03377777777', '07/01/2018', 1, 'NILL', 'uploads/caced7f7.jpg', 'uploads/f4927eb8.jpg', 1),
(11, 'asdasd', '42201-1565848-5', '06/05/2018', 'asdasd', '05/28/2018', 'adad@gmail.com', 'asdads', 'asdasd', 'asdad', '03000000000', '', '', '', 'asdad', 'asdads', 'asdasd', '03055555555', '06/13/2018', 3, 'NILL', 'uploads/7352d714.png', 'uploads/72709113.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exin`
--

CREATE TABLE `exin` (
  `exin_id` int(11) NOT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `datee` varchar(30) NOT NULL,
  `previous_balance` bigint(20) NOT NULL,
  `current_balance` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exin`
--

INSERT INTO `exin` (`exin_id`, `expense_id`, `income_id`, `datee`, `previous_balance`, `current_balance`) VALUES
(1, NULL, NULL, '2018-01-01', 500000, 500000),
(2, 1, NULL, '2018-05-12', 500000, 490000),
(3, NULL, 1, '2018-05-13', 490000, 490500),
(4, NULL, 2, '2018-05-13', 490500, 490800),
(5, NULL, 3, '2018-05-13', 490800, 491500),
(6, NULL, 4, '2018-05-13', 491500, 516500),
(7, 2, NULL, '2018-05-13', 516500, 511500),
(8, 3, NULL, '2018-05-13', 511500, 511000),
(9, 4, NULL, '2018-05-13', 511000, 506000),
(10, 5, NULL, '2018-05-13', 506000, 503000),
(11, 6, NULL, '2018-05-13', 503000, 501000),
(12, NULL, 5, '2018-05-13', 501000, 501500),
(13, 7, NULL, '2018-05-13', 501500, 501000),
(14, NULL, 6, '2018-05-13', 501000, 502000),
(15, NULL, 7, '2018-05-13', 502000, 503000),
(16, NULL, 8, '2018-05-13', 503000, 504000),
(17, NULL, 9, '2018-05-13', 504000, 504200),
(18, NULL, 10, '2018-05-13', 504200, 505200),
(19, NULL, 11, '2018-05-13', 505200, 505500),
(20, NULL, 12, '2018-05-13', 505500, 506500),
(21, 8, NULL, '2018-05-13', 506500, 506000),
(22, 9, NULL, '2018-05-13', 506000, 505000),
(23, 10, NULL, '2018-05-13', 505000, 503000),
(24, 11, NULL, '2018-05-13', 503000, 502600),
(25, 12, NULL, '2018-05-13', 502600, 502500),
(26, NULL, 13, '2018-05-13', 502500, 502700),
(27, NULL, 14, '2018-05-13', 502700, 503000),
(28, NULL, 15, '2018-05-13', 503000, 503500),
(29, NULL, 16, '2018-05-13', 503500, 504500),
(30, 13, NULL, '2018-05-13', 504500, 503500),
(31, 14, NULL, '2018-05-29', 503500, 424800),
(32, 15, NULL, '2018-05-29', 424800, 346100);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `dd_id` int(11) NOT NULL,
  `method` varchar(10) NOT NULL,
  `check_number` varchar(30) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `amount` decimal(13,2) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `bike_id` int(11) DEFAULT NULL,
  `paid_status` tinyint(4) NOT NULL DEFAULT '0',
  `cmp_id` int(11) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `datee`, `dd_id`, `method`, `check_number`, `bank_id`, `amount`, `vehicle_id`, `name`, `bike_id`, `paid_status`, `cmp_id`, `description`, `status`) VALUES
(1, '2018-05-13', 2, 'cash', 'null', NULL, '10000.00', 1, 'Jamal (Driver) ', NULL, 0, NULL, 'Loan', 1),
(2, '2018-05-13', 2, 'cash', '', NULL, '5000.00', NULL, NULL, NULL, 0, 1, '', 1),
(3, '2018-05-13', 2, 'cash', '', NULL, '500.00', NULL, NULL, NULL, 0, 1, '', 1),
(4, '2018-05-13', 2, 'cash', '', NULL, '5000.00', NULL, NULL, NULL, 0, 1, '', 1),
(5, '2018-05-13', 2, 'cash', '', NULL, '3000.00', NULL, NULL, NULL, 0, 1, '', 1),
(6, '2018-05-13', 2, 'cash', '', NULL, '2000.00', NULL, NULL, NULL, 0, 1, '', 1),
(7, '2018-05-13', 2, 'cash', '', NULL, '500.00', NULL, NULL, NULL, 0, 1, '', 1),
(8, '2018-05-13', 2, 'cash', 'null', NULL, '500.00', 1, 'Jamal (Driver) ', NULL, 0, NULL, '', 1),
(9, '2018-05-13', 2, 'cash', 'null', NULL, '1000.00', 1, 'Jamal (Driver) ', NULL, 0, NULL, '', 1),
(10, '2018-05-13', 2, 'cash', 'null', NULL, '2000.00', 1, 'Jamal (Driver) ', NULL, 0, NULL, '', 1),
(11, '2018-05-13', 2, 'cash', 'null', NULL, '400.00', 1, 'Jamal (Driver) ', NULL, 0, NULL, '', 1),
(12, '2018-05-13', 2, 'cash', 'null', NULL, '100.00', 1, 'Jamal (Driver) ', NULL, 0, NULL, '', 1),
(13, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, NULL, NULL, 0, 1, '', 1),
(14, '2018-05-29', 7, 'cash', NULL, NULL, '78700.00', NULL, NULL, NULL, 0, NULL, 'Vehicle Owner Payment.', 1),
(15, '2018-05-29', 7, 'cash', NULL, NULL, '78700.00', NULL, NULL, NULL, 0, NULL, 'Vehicle Owner Payment.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `garage_entry`
--

CREATE TABLE `garage_entry` (
  `ge_id` int(11) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garage_entry`
--

INSERT INTO `garage_entry` (`ge_id`, `datee`, `vehicle_id`, `amount`, `description`, `status`) VALUES
(1, '05/13/2018', 1, '500.00', '', 1),
(2, '05/13/2018', 1, '1000.00', '', 1),
(3, '05/07/2018', 1, '2000.00', '', 1),
(4, '05/13/2018', 1, '2000.00', '', 1),
(5, '05/13/2018', 1, '5000.00', '', 1),
(6, '05/13/2018', 1, '5000.00', '', 1),
(7, '05/29/2018', 3, '500.00', 'NILL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `dd_id` int(11) NOT NULL,
  `method` varchar(10) NOT NULL,
  `check_number` varchar(30) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `amount` decimal(13,2) NOT NULL,
  `cmp_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `datee`, `dd_id`, `method`, `check_number`, `bank_id`, `amount`, `cmp_id`, `vehicle_id`, `name`, `description`, `status`) VALUES
(1, '2018-05-13', 2, 'cash', '', NULL, '500.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(2, '2018-05-13', 2, 'cash', '', NULL, '300.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(3, '2018-05-13', 2, 'cash', '', NULL, '700.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(4, '2018-05-13', 2, 'cash', '', NULL, '25000.00', 1, NULL, NULL, '', 1),
(5, '2018-05-13', 2, 'cash', '', NULL, '500.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(6, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(7, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, 1, 'Jamal (Driver)', '', 1),
(8, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, 1, 'Jamal (Driver)', '', 1),
(9, '2018-05-13', 2, 'cash', '', NULL, '200.00', NULL, 1, 'Jamal (Driver)', '', 1),
(10, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, 1, 'Jamal (Driver)', '', 1),
(11, '2018-05-13', 2, 'cash', '', NULL, '300.00', NULL, 1, 'Jamal (Driver)', '', 1),
(12, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, 1, 'Jamal (Driver)', '', 1),
(13, '2018-05-13', 2, 'cash', '', NULL, '200.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(14, '2018-05-13', 2, 'cash', '', NULL, '300.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(15, '2018-05-13', 2, 'cash', '', NULL, '500.00', NULL, 1, 'Jamal (Driver) ', '', 1),
(16, '2018-05-13', 2, 'cash', '', NULL, '1000.00', NULL, 1, 'Jamal (Driver) ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `line_id` int(11) NOT NULL,
  `short_form` varchar(100) NOT NULL,
  `full_form` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`line_id`, `short_form`, `full_form`, `status`) VALUES
(1, 'line 1', 'line 1', 1),
(2, 'line 2', 'line 2', 1),
(3, 'line 3', 'line 3', 1),
(4, 'line 4', 'line 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pass` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `name`, `username`, `pass`, `role`, `status`) VALUES
(1, 'Ahsan', 'ahsan', '3d68b18bd9042ad3dc79643bde1ff351', 'admin', 1),
(2, 'Rashid', 'rashid', '2e7b988d682cb0f860e7a8eb863f4a3b', 'only view', 1),
(3, 'Sajad', 'sajad', '406210a311f8fdb08aa8c2e363200b6f', 'reporting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `owner_name` varchar(60) NOT NULL,
  `driver_name` varchar(60) NOT NULL,
  `vehicle_number` varchar(30) NOT NULL,
  `engine_number` varchar(30) NOT NULL,
  `chassis_number` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `owner_name`, `driver_name`, `vehicle_number`, `engine_number`, `chassis_number`, `status`) VALUES
(1, 'Malik Brothers', 'Jamal', 'KG36565', 'EN123', 'CG1265', 1),
(2, 'Malik Brothers', 'Ahmed', 'KH1254', '', '', 1),
(3, 'butt brothers', 'Inayat', 'KF1515', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_number` int(11) NOT NULL,
  `datee` varchar(30) NOT NULL,
  `method` varchar(10) NOT NULL,
  `check_number` varchar(30) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `amount` bigint(20) NOT NULL,
  `cm_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yard`
--

CREATE TABLE `yard` (
  `yard_id` int(11) NOT NULL,
  `short_form` varchar(100) NOT NULL,
  `full_form` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `location` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yard`
--

INSERT INTO `yard` (`yard_id`, `short_form`, `full_form`, `contact`, `location`, `status`) VALUES
(1, 'yard 1', 'yard1', '03156516516', 'location', 1),
(2, 'yard 2', 'yard 2', '03216561651', 'location', 1),
(3, 'yard 3', 'yard 3', '03165161651', 'location', 1),
(4, 'yard 4', 'yard 4', '03000000000', 'location', 1),
(5, 'yard 5', 'yard 5', '03161651616', 'location', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_entry`
--
ALTER TABLE `accounts_entry`
  ADD PRIMARY KEY (`ae_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bike`
--
ALTER TABLE `bike`
  ADD PRIMARY KEY (`bike_id`);

--
-- Indexes for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  ADD PRIMARY KEY (`coa_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`consignee_id`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`container_id`);

--
-- Indexes for table `container_entry`
--
ALTER TABLE `container_entry`
  ADD PRIMARY KEY (`ce_id`);

--
-- Indexes for table `container_movement`
--
ALTER TABLE `container_movement`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `daily_description`
--
ALTER TABLE `daily_description`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`dg_id`);

--
-- Indexes for table `diesel_entry`
--
ALTER TABLE `diesel_entry`
  ADD PRIMARY KEY (`de_id`);

--
-- Indexes for table `diesel_limit`
--
ALTER TABLE `diesel_limit`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `exin`
--
ALTER TABLE `exin`
  ADD PRIMARY KEY (`exin_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `garage_entry`
--
ALTER TABLE `garage_entry`
  ADD PRIMARY KEY (`ge_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`line_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_number`);

--
-- Indexes for table `yard`
--
ALTER TABLE `yard`
  ADD PRIMARY KEY (`yard_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_entry`
--
ALTER TABLE `accounts_entry`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bike`
--
ALTER TABLE `bike`
  MODIFY `bike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  MODIFY `coa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `consignee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `container_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `container_entry`
--
ALTER TABLE `container_entry`
  MODIFY `ce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `container_movement`
--
ALTER TABLE `container_movement`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `daily_description`
--
ALTER TABLE `daily_description`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `dg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diesel_entry`
--
ALTER TABLE `diesel_entry`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `diesel_limit`
--
ALTER TABLE `diesel_limit`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `exin`
--
ALTER TABLE `exin`
  MODIFY `exin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `garage_entry`
--
ALTER TABLE `garage_entry`
  MODIFY `ge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yard`
--
ALTER TABLE `yard`
  MODIFY `yard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
