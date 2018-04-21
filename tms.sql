-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 05:31 PM
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
(15, '04/19/2018', 3, 'credit', 'cash', '100.00', '', '17900.00', '18000.00', 1);

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
(1, 'HBL', 'habib bank', 'butt bros', '1080-0000-25464-52-4', 'address', '10000.00', 1),
(2, 'BAHL', 'Bank Al-Habib  ', 'Butt Brothers Transport', '1080-5555-12345-21-7', 'port qasim', '20000.00', 1),
(3, 'HBL', 'Habib Bank ', 'Butt Bros', '1080-2568-96325-96-1', 'steel town', '20000.00', 1),
(4, 'Mb', 'mezaan bank', 'butt bros', '1080-5515-51545-55-5', 'quadabad', '50000.00', 1);

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
(8, 'AST', 'Agha Steel', 'address', '03006548949', 1);

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
  `bl_cro_number` varchar(16) NOT NULL,
  `job_number` varchar(16) NOT NULL,
  `container_number` int(11) NOT NULL,
  `index_number` varchar(15) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `container_id` int(11) NOT NULL,
  `lolo_charges` int(11) NOT NULL,
  `weight_charges` int(11) NOT NULL,
  `color` varchar(7) NOT NULL,
  `mr_charges` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `cm_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_entry`
--

INSERT INTO `container_entry` (`ce_id`, `bl_cro_number`, `job_number`, `container_number`, `index_number`, `vehicle_id`, `advance`, `rent`, `balance`, `container_id`, `lolo_charges`, `weight_charges`, `color`, `mr_charges`, `remarks`, `cm_id`, `status`) VALUES
(1, '123456', '123', 1, '1', 1, 0, 0, 0, 1, 0, 0, 'green', 0, 'remarks', 1, 1),
(2, '165412', '156', 2, '2', 2, 0, 0, 0, 2, 0, 0, 'red', 0, 'asd...', 1, 1),
(3, '3564', '2215', 3, '3', 2, 0, 0, 0, 2, 0, 0, 'green', 0, 'falana', 1, 1),
(4, '56151', '65151', 4, '4', 1, 0, 0, 0, 2, 0, 0, 'green', 0, 'dhimaka', 1, 1),
(5, '4894', '4984', 5, '5', 4, 0, 0, 0, 4, 0, 0, 'green', 0, 'emarkasasmdlasda', 1, 1),
(6, '156516', '51616', 6, '6', 4, 0, 0, 0, 1, 0, 0, 'red', 0, 'ASDAS', 1, 1),
(8, '123456', '123456', 1, '1', 2, 1, 1, 0, 4, 0, 0, 'green', 0, 'asdasd', 3, 1),
(9, '56456', '654', 2, '2', 4, 1, 0, 1, 4, 0, 0, 'yellow', 0, 'asdad', 3, 1),
(10, '6595', '595', 3, '3', 2, 0, 0, 0, 3, 0, 0, 'green', 0, '0asdas', 3, 1),
(11, '654321', '654321', 2, '2', 4, 100, 50, 50, 12, 0, 5, 'red', 0, 'falana', 4, 1);

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
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_movement`
--

INSERT INTO `container_movement` (`cm_id`, `datee`, `agent_id`, `coa_id`, `consignee_id`, `movement`, `empty_terminal_id`, `from_yard_id`, `to_yard_id`, `container_size`, `party_charges`, `lot_of`, `line_id`, `status`) VALUES
(1, '2018-03-17', 1, 1, 1, 'export', 1, 2, 3, 40, 20000, 6, 1, 1),
(3, '2018-04-20', 2, 8, 3, 'import', 6, 3, 1, 20, 3000, 3, 1, 1),
(4, '2018-04-21', 3, 7, 2, 'import', 6, 2, 3, 20, 200, 2, 3, 1);

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
(3, 'dinner', 1),
(4, 'dhimaka', 0);

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
  `extra_litres` decimal(13,2) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diesel_entry`
--

INSERT INTO `diesel_entry` (`de_id`, `datee`, `vehicle_id`, `from_yard_id`, `to_yard_id`, `litre_rate`, `extra_litres`, `total`, `description`, `status`) VALUES
(1, '04/16/2018', 2, 3, 2, '107.00', '77.00', '8239.00', 'details', 1),
(2, '04/02/2018', 1, 3, 2, '300.00', '100.00', '30000.00', 'asdadssdasda..............', 1),
(3, '04/20/2018', 4, 6, 3, '150.00', '6.00', '900.00', 'falana dhimaka', 1);

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
(2, 1, 2, 1000, 1),
(3, 3, 6, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `garage_entry`
--

CREATE TABLE `garage_entry` (
  `ge_id` int(11) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `description` text NOT NULL,
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
(6, '04/20/2018', 4, '9500.00', 'falana dhimaka', 1);

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
(2, 'butt bros ', '1564868486', '1515151', '98745848548', 1),
(4, 'Malik brothers', '549852', '256485', '154565', 1);

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
-- Indexes for table `garage_entry`
--
ALTER TABLE `garage_entry`
  ADD PRIMARY KEY (`ge_id`);

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
-- AUTO_INCREMENT for table `accounts_entry`
--
ALTER TABLE `accounts_entry`
  MODIFY `ae_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
-- AUTO_INCREMENT for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  MODIFY `coa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `container_movement`
--
ALTER TABLE `container_movement`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `daily_description`
--
ALTER TABLE `daily_description`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `diesel_entry`
--
ALTER TABLE `diesel_entry`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diesel_limit`
--
ALTER TABLE `diesel_limit`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `garage_entry`
--
ALTER TABLE `garage_entry`
  MODIFY `ge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `yard`
--
ALTER TABLE `yard`
  MODIFY `yard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
