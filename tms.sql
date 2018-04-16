-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 06:43 PM
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
(1, 'adnan', 'address', '03023056165', 1),
(2, 'tayyab', 'gulshan', '00000000000', 1);

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
(1, 'HBL', 'habib bank', 'butt bros', '1080-0000-25464-52-4', 'address', '10000.00', 1),
(2, 'BAHL', 'Bank Al-Habib  ', 'Butt Brothers Transport', '1080-5555-12345-21-7', '20000.00', '20000.00', 1),
(3, 'HBL', 'Habib Bank ', 'Jutt Bros', '1080-2568-96325-96-1', 'address', '20000.00', 1);

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
(7, 'mbt ', 'Malik Bros Transport', 'gulshan e hadeed', '03030561651', 1);

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
(2, 'jbt consignee', 'Jutt bros', 1);

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
(1, '20', 0),
(2, '20', 0),
(3, '20', 1),
(4, '40', 1),
(5, '60', 1),
(6, 'Tanki', 1),
(7, 'Dry Containers', 1),
(8, 'Open Top Containers', 1),
(9, 'Tunnel Container', 1);

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
  `bl_cro_number` varchar(15) NOT NULL,
  `job_number` varchar(15) NOT NULL,
  `container_number` int(11) NOT NULL,
  `index_number` varchar(11) NOT NULL,
  `container_size` tinyint(4) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `diesel` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `party_charges` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `lot_of` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `lolo_charges` int(11) NOT NULL,
  `weight_charges` int(11) NOT NULL,
  `color` varchar(7) NOT NULL,
  `mr_charges` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'breakfast', 1),
(2, 'lunch', 1),
(3, 'dinner', 1);

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
(2, 1, 2, 1000, 1);

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
(2, 'bbt line', 'Butt bros', 1);

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
  `vehicle_number` varchar(30) NOT NULL,
  `engine_number` varchar(30) NOT NULL,
  `chassis_number` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `owner_name`, `vehicle_number`, `engine_number`, `chassis_number`, `status`) VALUES
(1, 'jutt bros ', '987654321', '987654321', '987654321', 1),
(2, 'butt bros ', '1564868486', '1515151', '98745848548', 1);

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
(3, 'Mbt', 'Malik Bros', '03030303003', 'Gulshan-e-hadeed', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  ADD PRIMARY KEY (`coa_id`);

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
-- Indexes for table `diesel_limit`
--
ALTER TABLE `diesel_limit`
  ADD PRIMARY KEY (`dl_id`);

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
-- Indexes for table `yard`
--
ALTER TABLE `yard`
  ADD PRIMARY KEY (`yard_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  MODIFY `coa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `consignee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `container_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `container_movement`
--
ALTER TABLE `container_movement`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daily_description`
--
ALTER TABLE `daily_description`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diesel_limit`
--
ALTER TABLE `diesel_limit`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `yard`
--
ALTER TABLE `yard`
  MODIFY `yard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
