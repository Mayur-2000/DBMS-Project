-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 01:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plasmaproject`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcontact` ()  select * from contact$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('mayur', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(20) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `FName`, `PhoneNo`, `email`, `comments`) VALUES
(1, 'Mayur A', '7483253273', 'mayurmayur729@gmail.com', 'Its very useful website , I love this site'),
(2, 'Subhashini', '9538581898', 'Subhashini@gmail.com', 'I love this site. Thanks for making this.');

-- --------------------------------------------------------

--
-- Table structure for table `donationform`
--

CREATE TABLE `donationform` (
  `ID` int(30) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Blood_Group` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `weights` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donationform`
--

INSERT INTO `donationform` (`ID`, `FirstName`, `Blood_Group`, `Age`, `weights`, `PhoneNumber`, `city`) VALUES
(40, 'Subhashini R', 'B+', '43', '55', '9538581898', 'Banglore'),
(42, 'Chandralekha', 'B+', '55', '65', '9481818157', 'Mysore'),
(901, 'Mayur A', 'O+', '20', '50', '7483253273', 'Banglore');

--
-- Triggers `donationform`
--
DELIMITER $$
CREATE TRIGGER `backup` AFTER DELETE ON `donationform` FOR EACH ROW insert into temp
(ID,FirstName,Blood_Group,Age,weights,PhoneNumber,city) values(old.ID,old.FirstName,old.Blood_Group,old.Age,old.weights,old.PhoneNumber,old.city)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `requestform`
--

CREATE TABLE `requestform` (
  `ID` int(20) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Blood_Group` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `Addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestform`
--

INSERT INTO `requestform` (`ID`, `FirstName`, `Blood_Group`, `PhoneNumber`, `hospitalname`, `Addr`) VALUES
(5, 'Mayur A', 'O+', '7483253273', 'BGS hospital', 'Vishnuvardhan road,banglore'),
(8, 'Prakash Babu', 'B+', '9880833067', 'BGS hospital', 'Uttarahalli,Vishnuvardhan Road,Banglore'),
(9, 'Subhashini R', 'O+', '9538581898', 'BMH Hospital', 'Hunsur Road,Mysore');

--
-- Triggers `requestform`
--
DELIMITER $$
CREATE TRIGGER `backupR` AFTER DELETE ON `requestform` FOR EACH ROW INSERT into rtemp(ID,FirstName,Blood_Group,PhoneNumber,hospitalname,Addr) 
values(old.ID,old.FirstName,old.Blood_Group,old.PhoneNumber,old.hospitalname,old.Addr)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rtemp`
--

CREATE TABLE `rtemp` (
  `ID` int(20) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Blood_Group` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `hospitalname` varchar(255) NOT NULL,
  `Addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rtemp`
--

INSERT INTO `rtemp` (`ID`, `FirstName`, `Blood_Group`, `PhoneNumber`, `hospitalname`, `Addr`) VALUES
(3, 'gagan', 'B+', '9880833067', 'Rammaiah hospital', 'vv puram,bangl;ore'),
(4, 'Sathvika A P', 'A-', '9538581898', 'BGD hospital', 'banglore'),
(6, 'Hemanth', 'B+', '9581818158', 'Columbia hospital', 'near hebbal,Banglore'),
(7, 'Bhavana M', 'B+', '6363163744', 'Rammaiah hospital', 'kollegal');

-- --------------------------------------------------------

--
-- Table structure for table `signupform`
--

CREATE TABLE `signupform` (
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signupform`
--

INSERT INTO `signupform` (`name`, `pass`, `cpass`) VALUES
('Mayur A', 'mayur', 'mayur');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `ID` int(20) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `Blood_Group` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `weights` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`ID`, `FirstName`, `Blood_Group`, `Age`, `weights`, `PhoneNumber`, `city`) VALUES
(41, 'Prakash Babu', 'O+', '', '', '9880833067', 'Kolar'),
(902, 'kruthikk', 'B+', '', '', '8073096317', 'Banglore'),
(903, 'Bhavana M', 'B+', '', '', '6363196744', 'kollegal'),
(904, 'xyz', 'B+', '', '', '123456789', 'banglore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donationform`
--
ALTER TABLE `donationform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rtemp`
--
ALTER TABLE `rtemp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `signupform`
--
ALTER TABLE `signupform`
  ADD PRIMARY KEY (`pass`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donationform`
--
ALTER TABLE `donationform`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=905;

--
-- AUTO_INCREMENT for table `requestform`
--
ALTER TABLE `requestform`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
