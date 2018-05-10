-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 08:59 PM
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

--
-- Dumping data for table `accounts_entry`
--

INSERT INTO `accounts_entry` (`ae_id`, `datee`, `bank_id`, `action`, `method`, `amount`, `check_number`, `previous_balance`, `current_balance`, `status`) VALUES
(1, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '20000.00', '19500.00', 1),
(2, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '19500.00', '19000.00', 1),
(3, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '19000.00', '18500.00', 1),
(4, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '18500.00', '18000.00', 1),
(5, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '18000.00', '17500.00', 1),
(6, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '17500.00', '17000.00', 1),
(7, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '17000.00', '16500.00', 1),
(8, '04/19/2018', 3, 'debit', 'cash', '500.00', '', '16500.00', '16000.00', 1),
(9, '04/19/2018', 3, 'debit', 'cash', '500.00', '21346', '16000.00', '15500.00', 1),
(10, '04/19/2018', 3, 'credit', 'cash', '500.00', '', '15500.00', '16000.00', 1),
(11, '04/19/2018', 3, 'credit', 'cash', '500.00', '', '16000.00', '16500.00', 0),
(12, '04/19/2018', 3, 'credit', 'cash', '500.00', '', '16500.00', '17000.00', 1),
(13, '04/19/2018', 3, 'credit', 'cash', '500.00', '', '17000.00', '17500.00', 1),
(14, '04/19/2018', 3, 'credit', 'cash', '400.00', '', '17500.00', '17900.00', 1),
(15, '04/19/2018', 3, 'credit', 'cash', '100.00', '', '17900.00', '18000.00', 1),
(16, '04/25/2018', 4, 'debit', 'cash', '5555.00', '', '50000.00', '44445.00', 1),
(17, '05/03/2018', 4, 'credit', 'cash', '500.00', '', '44445.00', '44945.00', 1),
(18, '05/07/2018', 4, 'credit', 'cash', '200.00', '', '44945.00', '45145.00', 1),
(19, '05/07/2018', 4, 'credit', 'cash', '300.00', '', '45145.00', '45445.00', 1),
(20, '05/07/2018', 3, 'debit', 'cash', '300.00', '', '18000.00', '17700.00', 1),
(21, '05/07/2018', 3, 'debit', 'cash', '200.00', '', '17700.00', '17500.00', 1),
(22, '05/07/2018', 4, 'debit', 'cash', '500.00', '', '45445.00', '44945.00', 1),
(23, '05/07/2018', 3, 'credit', 'cash', '5000.00', '', '17500.00', '22500.00', 1),
(24, '05/07/2018', 4, 'debit', 'cash', '500.00', '', '44945.00', '44445.00', 1),
(25, '05/07/2018', 4, 'debit', 'cash', '500.00', '', '44445.00', '43945.00', 1),
(26, '05/06/2018', 1, 'debit', 'cash', '200.00', NULL, '10000.00', '9800.00', 1),
(27, '05/08/2018', 3, 'debit', 'cash', '500.00', '', '22500.00', '22000.00', 1),
(28, '05/08/2018', 4, 'debit', 'cash', '3945.00', '', '43945.00', '40000.00', 1),
(29, '05/08/2018', 3, 'credit', 'cash', '1000.00', '', '22000.00', '23000.00', 1),
(31, '05/10/2018', 3, 'credit', 'check', '150000.00', '003245', '23000.00', '173000.00', 1);

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
(1, 'raja adnan ', 'steel town', '03023056165', 1),
(2, 'tayyab', 'gulshan', '00000000000', 1),
(3, 'umer', 'gulshane hadeed', '03111111111', 1);

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
(1, 'hbl ', 'habib bank', 'butt bros', '1080-0000-25464-52-4', 'address', '10000.00', 1),
(2, 'BAHL', 'Bank Al-Habib  ', 'Butt Brothers Transport', '1080-5555-12345-21-7', 'port qasim', '20000.00', 1),
(3, 'HBL', 'Habib Bank ', 'Butt Bros', '1080-2568-96325-96-1', 'steel town', '20000.00', 1),
(4, 'Mb', 'mezaan bank', 'butt bros', '1080-5515-51545-55-5', 'quadabad', '50000.00', 1);

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
(1, '32564', 1),
(2, '369852', 1),
(3, '987456', 1);

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
(1, 'bbt', 'BUTT BROTHER TRA', 'Karachi Port Qasim', '03040025548', 1),
(2, 'jbt', 'JUTT BROTHER TRA', 'Port Qasim', '03030355003', 1),
(7, 'mbt ', 'Malik Bros Transport', 'gulshan e hadeed', '03030561651', 1),
(8, 'AST', 'Agha Steel', 'address', '03006548949', 1),
(9, 'P&G', 'a&%787', 'asad(*U(*&T^T', '03333333333', 1);

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
(1, 'Malik Brothers', 1),
(2, 'Agha Steel', 1);

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
(1, 'bbt consignee', 'Butt bros', 1),
(2, 'jbt consignee', 'Jutt bros', 1),
(3, 'mbt consignee', 'malik brothers', 1);

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
(12, 'Side Open Storage Container', 1);

-- --------------------------------------------------------

--
-- Table structure for table `container_entry`
--

CREATE TABLE `container_entry` (
  `ce_id` int(11) NOT NULL,
  `container_number` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
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

INSERT INTO `container_entry` (`ce_id`, `container_number`, `vehicle_id`, `advance`, `balance`, `color`, `mr_charges`, `remarks`, `cm_id`, `status`) VALUES
(1, 1, 4, 200, 200, 'white', 200, '', 1, 1),
(2, 420, 2, 150, 250, 'red', 100, 'ok........', 1, 1),
(3, 100, 1, 150, 250, 'white', 0, '', 1, 1);

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
  `movement` varchar(7) NOT NULL,
  `empty_terminal_id` int(11) NOT NULL,
  `from_yard_id` int(11) NOT NULL,
  `to_yard_id` int(11) NOT NULL,
  `container_size` tinyint(4) NOT NULL,
  `party_charges` int(11) NOT NULL,
  `lot_of` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `bl_cro_number` varchar(16) NOT NULL,
  `job_number` varchar(16) NOT NULL,
  `index_number` varchar(15) NOT NULL,
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
(1, '2018-05-09', 3, 8, 3, 'import', 1, 3, 2, 20, 50000, 3, 1, '42053', '365', '1506', 300, 3, 300, 200, 1, 1);

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
(6, 'Party Payment', 1);

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
(1, '04/22/2018', 2, 3, 2, '107.00', '0.00', '77.00', '8239.00', 'details', 0),
(2, '04/22/2018', 1, 3, 2, '300.00', '0.00', '100.00', '30000.00', 'asdadssdasda..............', 0),
(3, '04/22/2018', 4, 6, 3, '150.00', '0.00', '6.00', '900.00', 'falana dhimaka', 0),
(4, '04/22/2018', 4, 6, 3, '10.00', '1000.00', '7.00', '10070.00', 'aksmd', 1),
(5, '04/22/2018', 2, 1, 2, '10.00', '900.00', '8.00', '9080.00', 'falana', 1),
(6, '04/22/2018', 4, 1, 2, '10.00', '900.00', '90.00', '9900.00', 'dhimaka', 1),
(7, '05/04/2018', 5, 6, 3, '20.00', '1000.00', '50.00', '21000.00', '', 1);

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
(1, 2, 1, 900, 1),
(2, 1, 2, 900, 1),
(3, 3, 6, 1000, 1),
(4, 6, 3, 1000, 1),
(5, 1, 6, 500, 1),
(6, 6, 1, 500, 1);

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
(1, NULL, NULL, '2018-04-23', 200000, 200000),
(2, 1, NULL, '2018-04-23', 200000, 180000),
(3, NULL, 17, '2018-05-08', 180000, 180100),
(4, 27, NULL, '2018-05-08', 180100, 179600),
(5, 28, NULL, '2018-05-08', 179600, 179400),
(6, NULL, 18, '2018-05-08', 179400, 179600),
(18, NULL, 19, '2018-05-10', 179600, 329600),
(21, NULL, 21, '2018-05-10', 329600, 479600),
(22, 30, NULL, '2018-05-10', 479600, 329600);

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
(1, '2018-04-23', 4, 'cash', NULL, NULL, '20000.00', 4, 'jamal (Driver)', NULL, 0, NULL, 'asdas', 1),
(2, '2018-04-24', 4, 'check', '123456', 3, '2000.00', 2, 'hasan (Driver) ', NULL, 0, NULL, 'asda', 1),
(3, '2018-04-24', 4, 'check', '32451', 2, '2000.00', 4, 'jamal (Driver) ', NULL, 0, NULL, 'asasdasd', 1),
(4, '2018-04-24', 4, 'cash', 'NULL', NULL, '2000.00', 4, 'jamal (Driver) ', NULL, 0, NULL, 'asasdasd', 1),
(5, '2018-04-24', 4, 'cash', 'NULL', NULL, '2000.00', 4, 'jamal (Driver) ', NULL, 0, NULL, 'asasdasd', 1),
(6, '2018-04-24', 4, 'cash', 'NULL', 0, '2000.00', 4, 'jamal (Driver) ', NULL, 0, NULL, 'asasdasd', 1),
(7, '2018-04-23', 4, 'check', '123456', 1, '2000.00', 4, 'Malik brothers (Owner) ', NULL, 0, NULL, 'falana', 1),
(8, '2018-04-24', 4, 'check', '123456', 4, '56454.00', 5, 'tayyab (Driver) ', NULL, 0, NULL, 'flaan', 1),
(9, '2018-04-24', 2, 'cash', NULL, NULL, '3500.00', 5, 'tayyab (Driver) ', NULL, 0, NULL, 'loan1', 1),
(10, '2018-04-24', 2, 'check', '123456', 3, '10000.00', 4, 'Malik brothers (Owner) ', NULL, 0, NULL, 'loan1', 1),
(11, '2018-04-25', 1, 'cash', 'null', NULL, '1254.00', NULL, 'null', NULL, 0, NULL, 'asda', 1),
(12, '2018-04-25', 1, 'cash', 'null', NULL, '123456.00', NULL, 'null', NULL, 0, NULL, 'asdasd', 1),
(13, '2018-04-25', 1, 'check', '555', 4, '66666.00', NULL, 'null', NULL, 0, NULL, 'asad', 1),
(14, '2018-04-25', 1, 'check', '963258', 3, '999.00', NULL, 'null', NULL, 0, NULL, 'asdasd', 1),
(15, '2018-04-25', 1, 'check', '8547', 3, '1234.00', NULL, 'null', NULL, 0, NULL, 'asdasd', 1),
(16, '2018-04-25', 1, 'check', '9685', 2, '85847.00', NULL, 'null', NULL, 0, NULL, 'asasdasd', 1),
(17, '2018-04-25', 2, 'cash', 'null', NULL, '500.00', 4, 'jamal (Driver) ', NULL, 0, NULL, 'loan1', 1),
(18, '2018-04-25', 2, 'check', '9658', 2, '500.00', 4, 'jamal (Driver) ', NULL, 0, NULL, 'loan2', 1),
(19, '2018-04-25', 3, 'cash', NULL, NULL, '111.00', NULL, NULL, 3, 0, NULL, 'fafafaf', 1),
(20, '2018-04-25', 3, 'check', '965855', 4, '222.00', NULL, NULL, 2, 0, NULL, 'asdasdads', 1),
(21, '2018-04-25', 4, 'cash', 'null', NULL, '123456.00', 5, NULL, NULL, 0, NULL, 'asdasdadsas', 1),
(22, '2018-04-25', 1, 'cash', 'null', NULL, '333.00', NULL, 'null', NULL, 0, NULL, 'asdasd', 1),
(23, '2018-05-04', 1, 'cash', 'null', NULL, '300.00', NULL, 'null', NULL, 0, NULL, '', 1),
(24, '2018-05-04', 5, 'cash', 'null', NULL, '700.00', NULL, 'null', NULL, 0, NULL, '', 1),
(25, '2018-05-04', 2, 'cash', '', NULL, '100.00', NULL, NULL, NULL, 0, 2, '', 1),
(26, '2018-05-04', 2, 'check', '123546', 3, '500.00', NULL, NULL, NULL, 0, 2, '', 1),
(27, '2018-05-08', 1, 'cash', 'null', NULL, '500.00', NULL, 'null', NULL, 0, NULL, '', 1),
(28, '2018-05-08', 1, 'cash', 'null', NULL, '200.00', NULL, 'null', NULL, 0, NULL, '', 1),
(30, '2018-05-10', 6, 'check', '003245', 3, '150000.00', NULL, NULL, NULL, 0, NULL, 'Party Payment Received.', 1);

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
(1, '04/18/2018', 2, '20000.00', 'details', 1),
(2, '04/18/2018', 1, '1100.00', 'asdasd', 1),
(3, '04/19/2018', 2, '8990.00', 'detailsasdadadasd', 1),
(4, '04/10/2018', 1, '900.00', 'detailss...........', 0),
(5, '04/09/2018', 2, '9000000.00', 'descripton', 1),
(6, '04/20/2018', 4, '9500.00', 'falana dhimaka', 1),
(7, '04/27/2018', 4, '10000.00', 'NILL', 1),
(8, '04/27/2018', 4, '600.00', 'NILL', 1),
(9, '05/04/2018', 1, '5200.00', '', 1),
(10, '2018-05-09', 1, '200.00', 'NILL', 1),
(11, '2018-05-09', 2, '100.00', 'NILL', 1);

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
(1, '2018-04-24', 5, 'cash', NULL, NULL, '20000.00', NULL, NULL, NULL, 'asdasd', 1),
(2, '2018-04-24', 5, 'cash', NULL, NULL, '200.00', NULL, NULL, NULL, 'falana', 1),
(3, '2018-04-24', 6, 'check', '123154', 2, '63500.00', NULL, NULL, NULL, 'asdasd51asd', 1),
(4, '2018-04-25', 5, 'check', '4564', 4, '231.00', NULL, NULL, NULL, 'asdad', 1),
(5, '2018-04-25', 8, 'check', '123456', 4, '4545450.00', NULL, NULL, NULL, 'falana dhimaka......', 1),
(6, '2018-05-03', 2, 'check', '123456', 4, '500.00', NULL, 4, 'jamal (Driver) ', '', 1),
(7, '2018-05-03', 2, 'cash', '', NULL, '200.00', NULL, 4, 'jamal (Driver)', '', 1),
(8, '2018-05-03', 2, 'cash', '', NULL, '100.00', NULL, 4, 'jamal (Driver) ', '', 1),
(9, '2018-05-03', 2, 'cash', '', NULL, '50.00', NULL, 4, 'jamal (Driver) ', '', 1),
(10, '2018-05-03', 2, 'cash', '', NULL, '50.00', NULL, 4, 'jamal (Driver) ', 'text', 1),
(11, '2018-05-03', 2, 'cash', '', NULL, '100.00', NULL, 4, 'Malik brothers (Owner) ', '', 1),
(12, '2018-05-03', 2, 'cash', '', NULL, '500.00', NULL, 4, 'Malik brothers (Owner) ', '', 1),
(13, '2018-05-04', 2, 'cash', '', NULL, '500.00', 1, NULL, NULL, '', 1),
(14, '2018-05-04', 5, 'cash', '', NULL, '699.98', NULL, NULL, NULL, '', 1),
(15, '2018-05-04', 2, 'cash', '', NULL, '700.00', 2, NULL, NULL, '', 1),
(16, '2018-05-04', 2, 'cash', '', NULL, '300.00', 2, NULL, NULL, '', 1),
(17, '2018-05-08', 1, 'cash', '', NULL, '100.00', NULL, NULL, NULL, '', 1),
(18, '2018-05-08', 1, 'cash', '', NULL, '200.00', NULL, NULL, NULL, '', 1),
(21, '2018-05-10', 6, 'check', '003245', 3, '150000.00', NULL, NULL, NULL, 'Party Payment Received.', 1);

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
(1, 'jbt line', 'Jutt brothers co', 1),
(2, 'bbt line', 'Butt bros', 1),
(3, 'MBT lines', 'malik bros', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `pass`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

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
(1, 'jutt bros ', 'ahmed', 'EF1234', '987654321', '987654321', 1),
(2, 'butt bros ', 'hasan', 'AZ3215', '1515151', '98745848548', 1),
(4, 'Malik brothers', 'jamal', 'FK5495', '256485', '154565', 1),
(5, 'butt bros', 'tayyab', 'ER1234', '123456', '123456', 1);

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
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_number`, `datee`, `method`, `check_number`, `bank_id`, `amount`, `cm_id`, `status`) VALUES
(1, '2018-05-10', 'check', '003245', 3, 150000, 1, 1);

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
(1, 'jbt ', 'Jutt bros transport ', '03150033303', 'steel town', 1),
(2, 'bbt ', 'Butt bros transport ', '03459879488', 'port qasim', 1),
(3, 'Mbt', 'Malik Bros', '03030303003', 'Gulshan-e-hadeed', 1),
(6, 'AST', 'Agha Steel', '03000000000', 'address', 1);

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
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bike`
--
ALTER TABLE `bike`
  MODIFY `bike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  MODIFY `coa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `consignee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `container_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `container_entry`
--
ALTER TABLE `container_entry`
  MODIFY `ce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `container_movement`
--
ALTER TABLE `container_movement`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daily_description`
--
ALTER TABLE `daily_description`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `diesel_entry`
--
ALTER TABLE `diesel_entry`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `diesel_limit`
--
ALTER TABLE `diesel_limit`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exin`
--
ALTER TABLE `exin`
  MODIFY `exin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `garage_entry`
--
ALTER TABLE `garage_entry`
  MODIFY `ge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `yard`
--
ALTER TABLE `yard`
  MODIFY `yard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
