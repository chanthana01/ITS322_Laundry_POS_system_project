-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 08:24 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbn`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generateServiceId` () RETURNS INT(11) NO SQL
BEGIN
DECLARE countId INT;
SELECT `serviceId` INTO countId from `serviceid`;


UPDATE `serviceid` SET `serviceId`= (countId+1) WHERE primaryid = 1 ;
RETURN countId+1;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(2) NOT NULL,
  `itemName` varchar(45) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `price`) VALUES
(1, 'Long-arm-shirt', 20),
(2, 'Short-arm-shirt', 15),
(3, 'Long-arm-t-shirt', 20),
(4, 'Short-arm-t-shirt', 15),
(5, 'Trousers', 20),
(6, 'Shorts', 15),
(7, 'Jeans', 25),
(8, 'Long-skirt', 20),
(9, 'Short-skirt', 15),
(10, 'Dressing-coat', 50),
(11, 'Doctor-suit', 60),
(12, 'Towel', 40);

-- --------------------------------------------------------

--
-- Table structure for table `laundryservice`
--

CREATE TABLE `laundryservice` (
  `Pid` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `dateIn` date NOT NULL,
  `dateOut` date NOT NULL,
  `serviceStatus` enum('F','NF') NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundryservice`
--

INSERT INTO `laundryservice` (`Pid`, `serviceId`, `memberId`, `staffId`, `dateIn`, `dateOut`, `serviceStatus`, `totalPrice`) VALUES
(19, 1, 2, 12, '2018-11-14', '2018-11-14', 'F', 1000),
(20, 2, 2, 12, '2018-11-14', '2018-11-14', 'F', 3000),
(21, 3, 9999, 12, '2018-11-14', '2018-11-14', 'F', 4000),
(22, 4, 9999, 12, '2018-11-14', '0000-00-00', 'NF', 200),
(23, 5, 9999, 12, '2018-11-14', '0000-00-00', 'NF', 700);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberId` int(15) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `address` varchar(45) NOT NULL,
  `memberTypeId` int(1) NOT NULL,
  `bonusPoint` int(5) NOT NULL,
  `email` varchar(45) NOT NULL,
  `memberUserId` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `firstName`, `lastName`, `mobileNo`, `address`, `memberTypeId`, `bonusPoint`, `email`, `memberUserId`, `password`, `gender`) VALUES
(2, 'user2', 'user2', '12315455', '', 3, 6000, 'user2@gmail.com', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'M'),
(3, '', '', '', '', 1, 0, '', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'M'),
(9999, 'Not_Identify', 'Not_Identify', '1234567890', 'Not_Identify', 1, 0, 'Not_Identify', 'Not_Identify', 'Not_Identify', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `m_type`
--

CREATE TABLE `m_type` (
  `m_TypeId` int(1) NOT NULL,
  `m_TypeName` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_type`
--

INSERT INTO `m_type` (`m_TypeId`, `m_TypeName`) VALUES
(1, 'Bronze'),
(2, 'Silver'),
(3, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `regisitem`
--

CREATE TABLE `regisitem` (
  `regisId` int(15) NOT NULL,
  `memberId` int(15) NOT NULL,
  `staffId` int(15) DEFAULT NULL,
  `serviceId` int(15) DEFAULT NULL,
  `itemId` int(15) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regisitem`
--

INSERT INTO `regisitem` (`regisId`, `memberId`, `staffId`, `serviceId`, `itemId`, `quantity`) VALUES
(107, 2, 12, 1, 1, 50),
(108, 2, 12, 2, 2, 200),
(109, 9999, 12, 3, 1, 200),
(110, 9999, 12, 4, 1, 10),
(111, 9999, 12, 5, 1, 10),
(112, 9999, 12, 5, 2, 10),
(113, 9999, 12, 5, 3, 10),
(114, 9999, 12, 5, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `serviceid`
--

CREATE TABLE `serviceid` (
  `primaryid` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceid`
--

INSERT INTO `serviceid` (`primaryid`, `serviceId`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(15) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `citizenNo` varchar(13) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `mobileNo` varchar(10) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userStaff` varchar(45) NOT NULL,
  `passStaff` varchar(45) NOT NULL,
  `status` enum('STAFF','ADMIN') NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `citizenNo`, `dateOfBirth`, `mobileNo`, `address`, `email`, `userStaff`, `passStaff`, `status`, `gender`) VALUES
(12, 'admin', 'admin', 'admin', '2018-11-10', 'admin', 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'M'),
(14, 'admin2modify', 'admin2modify', 'admin2mod', '2011-11-10', '12315455', 'admin2modify', 'admin2mod@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'ADMIN', 'F'),
(15, 'staff', 'staff', '1234', '2018-11-10', '1234', '1234', 'staff@gmail.com', 'staff', '1253208465b1efa876f982d8a9e73eef', 'STAFF', 'F'),
(16, '11', '11', '11', '2018-11-13', '11', '11', '11', '11', '6512bd43d9caa6e02c990b0a82652dca', 'ADMIN', 'F'),
(17, 'asdf', 'adsf', 'asdf', '2016-11-13', 'asdf', 'adf', 'asdf', 'asdf', '912ec803b2ce49e4a541068d495ab570', 'STAFF', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `laundryservice`
--
ALTER TABLE `laundryservice`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `m_type`
--
ALTER TABLE `m_type`
  ADD PRIMARY KEY (`m_TypeId`);

--
-- Indexes for table `regisitem`
--
ALTER TABLE `regisitem`
  ADD PRIMARY KEY (`regisId`);

--
-- Indexes for table `serviceid`
--
ALTER TABLE `serviceid`
  ADD PRIMARY KEY (`primaryid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `laundryservice`
--
ALTER TABLE `laundryservice`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `m_type`
--
ALTER TABLE `m_type`
  MODIFY `m_TypeId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regisitem`
--
ALTER TABLE `regisitem`
  MODIFY `regisId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `serviceid`
--
ALTER TABLE `serviceid`
  MODIFY `primaryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
