-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2016 at 03:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `password`, `fullName`, `age`, `contact`, `lastLogin`) VALUES
(1, 'muqiao', '123', 'muqiao yang', 20, 66666666, '2016-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `CustomerId` int(11) NOT NULL,
  `CouponId` varchar(30) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`CustomerId`, `CouponId`, `Status`) VALUES
(24, 'htRkFb7q.TkRI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `university` varchar(50) NOT NULL,
  `major` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`userId`, `username`, `password`, `fullName`, `university`, `major`, `age`, `contact`, `lastLogin`) VALUES
(20, 'Trump', '$3vn6q0nPYtac', 'Donald Trump', 'PolyU', 'Busniess', 71, 'dtrump@gmail.com', '0000-00-00'),
(21, 'twq', '$3X6obrtC1PCk', 'twq', 'hkpu', 'Busniess', 20, 'twq@gmail.com', '0000-00-00'),
(22, 'hilary', '$3X6obrtC1PCk', 'hilary', 'hkpu', 'Art', 50, 'us@gmail.com', '0000-00-00'),
(23, 'EDO', '$37oekFhrmskg', 'EDO packs', 'HKU', 'Science', 15, 'edo@gmail.com', '0000-00-00'),
(24, 'ow', '$3XqVg7JoEWb2', 'overwatch', 'Unknown', 'Engineering', 1, 'ow@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `FlightId` varchar(20) NOT NULL,
  `AirCompany` varchar(20) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `FirstPrice` int(11) NOT NULL,
  `EcoPrice` int(11) NOT NULL,
  `FromCity` varchar(20) NOT NULL,
  `ToCity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`FlightId`, `AirCompany`, `StartTime`, `EndTime`, `FirstPrice`, `EcoPrice`, `FromCity`, `ToCity`) VALUES
('GT100', 'GuoTai Airline', '06:00:00', '09:00:00', 1900, 1100, 'Hong Kong', 'Shanghai'),
('GT145', 'GuoTai Airline', '07:00:00', '10:00:00', 2600, 1600, 'Hong Kong', 'Beijing'),
('HK2176', 'Hong Kong Airline', '08:35:00', '10:49:00', 1500, 800, 'Hong Kong', 'Shanghai'),
('HK459', 'Hong Kong Airline', '12:00:00', '17:14:00', 2100, 1200, 'Hong Kong', 'Beijing'),
('HK789', 'Hong Kong Airline', '13:48:00', '18:00:00', 2000, 1100, 'Hong Kong', 'XiAn'),
('MU256', 'Eastern Airline', '06:00:00', '10:45:00', 1800, 1300, 'Hong Kong', 'Qingdao');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `OrgID` int(11) NOT NULL,
  `OrgName` varchar(50) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`OrgID`, `OrgName`, `rate`) VALUES
(110, 'Red Cross', 0),
(259, 'Hand Action', 3),
(354, 'Green Green', 3.5),
(359, 'Green Colo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `Name`, `organization`, `city`, `startDate`, `endDate`, `description`, `cost`) VALUES
(1, 'Green Idea', 'Green Green', 'Shanghai', '2016-12-14', '2016-12-19', 'This is a green activity organized by Green Green. The whole program is based in Shanghai rural areas.', 500),
(2, 'XiAnChild', 'Hand Action', 'XiAn', '2016-09-01', '2016-09-08', 'This program is organized by Hand Action. We would help primary school students and give them help.', -300),
(3, 'Culture Gala', 'Red Cross', 'Urumqi', '2016-07-07', '2016-07-13', 'Red Cross will organize a culture gala in XinJiang province and wants students from different backgrounds.', -1000),
(4, 'Green Jiangnan', 'Green Green', 'Shanghai', '2016-12-16', '2016-12-26', 'This is organized by Green Green to protect environment of Jiangnan.', 300),
(5, 'Gouging Help', 'Red Cross', 'Beijing', '2017-10-02', '2017-10-06', 'Help to be volunteer at Gugong.', 600),
(6, 'Clean Clean', 'Hand Action', 'Qingdao', '2017-05-04', '2017-05-10', 'Clean the beach.', 500);

-- --------------------------------------------------------

--
-- Table structure for table `program_order`
--

CREATE TABLE `program_order` (
  `orderID` int(11) NOT NULL,
  `programID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `flightID` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `totalCost` int(11) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_order`
--

INSERT INTO `program_order` (`orderID`, `programID`, `customerID`, `flightID`, `class`, `totalCost`, `Rate`) VALUES
(10, 1, 20, 'GT100', 'first', 2400, 3),
(11, 1, 21, 'GT100', 'eco', 1600, 0),
(12, 2, 21, 'HK789', 'first', 1700, 5),
(13, 4, 21, 'HK2176', 'eco', 1100, 2),
(14, 1, 22, 'HK2176', 'first', 2000, 4),
(15, 1, 22, 'GT100', 'first', 2400, 0),
(16, 1, 22, '', '', 500, 0),
(17, 4, 23, 'HK2176', 'eco', 1100, 5),
(18, 2, 23, 'HK789', 'first', 1700, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`FlightId`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`OrgID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`);

--
-- Indexes for table `program_order`
--
ALTER TABLE `program_order`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `ProgramID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `program_order`
--
ALTER TABLE `program_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
