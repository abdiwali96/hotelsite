-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2020 at 12:17 PM
-- Server version: 5.6.23-log
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m_isys17004_n0899718`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `extra` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classics`
--

CREATE TABLE `classics` (
  `author` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` char(4) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `ID` int(11) NOT NULL,
  `roomtype` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descrip` text COLLATE utf8_unicode_ci NOT NULL,
  `NumberOfRooms` int(11) NOT NULL,
  `AvailableRooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`ID`, `roomtype`, `descrip`, `NumberOfRooms`, `AvailableRooms`) VALUES
(1, 'SINGLE PROFESSIONAL ROOM', 'this is descrip of room1', 25, 0),
(2, 'QUEEN PREMIUM ROOM', 'this is descrip of room2', 25, 12),
(3, 'KING MASTER SUITE', 'this is room 3 ', 25, 13);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Roomtype` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Numberofguests` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `CheckIn` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Price` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `NoNights` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransID`, `UserID`, `FirstName`, `LastName`, `Roomtype`, `Numberofguests`, `CheckIn`, `Price`, `NoNights`) VALUES
(3, 1, 'Abdiwali', 'Abdi', 'QUEEN PREMIUM ROOM', '1', '2020-12-01', '199', 1),
(4, 1, 'Abdiwali', 'Abdi', 'KING MASTER SUITE', '3', '2021-01-12', '399', 1),
(5, 5, 'Sarah', 'Smith', 'SINGLE PROFESSIONAL ROOM', '1', '2020-12-15', '99', 1),
(6, 6, 'tom', 'smith', 'QUEEN PREMIUM ROOM', '2', '2020-12-02', '99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `GlobalPrivileges` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Gender`, `Email`, `Password`, `Address`, `City`, `Postcode`, `Mobile`, `GlobalPrivileges`) VALUES
(1, 'Abdiwali', 'Abdi', 'Male', 'abdiwali123@gmail.com', 'password', 'farm street', 'Milton keynes', 'mk7 9fg', '07946258913', 1),
(3, 'Omar', 'Smith', 'Male', 'omar@gmail.com', 'password', 'Grand street', 'birmingham', 'w13i7g', '07851329461', 0),
(4, 'John', 'smith ', 'Male', 'john@gmail.com', 'password', 'surrey street', 'surrey', 'gu17ug', '07945628135', 0),
(5, 'Sarah', 'Smith', 'Female', 'sarah@gmail.com', 'password', 'milan road', 'London', 'w148hg', '07946235816', 1),
(6, 'tom', 'smith', 'Male', 'tom@gmail.com', 'password', 'liverpool street', 'london', 'w13 8uh', '07854232596', 1),
(7, 'matt', 'robert', 'Male', 'matt@gmail.com', 'password1', 'Milton street', 'london', 'w139uj', '07854232596', 1),
(8, 'tim', 'timmy', 'Male', 'tim@gmail.com', 'password', 'london street', 'london', 'w13i8g', '07945232156', 1),
(9, 'Jones', 'Smith', 'Male', 'jones123@gmail.com', 'password', 'barn street', 'London', 'sw3u8i', '07945862358', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
