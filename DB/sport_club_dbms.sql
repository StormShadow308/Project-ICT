-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2023 at 11:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_club_dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account login`
--

CREATE TABLE `account login` (
  `Email` int(10) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Account Type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `Coach_ID` int(10) NOT NULL,
  `Hire Date` date DEFAULT NULL,
  `Salary` int(10) DEFAULT NULL,
  `Account LoginEmail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equiment`
--

CREATE TABLE `equiment` (
  `Equiment Name` int(10) NOT NULL,
  `Number of Equiment` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event ID` int(10) NOT NULL,
  `Team ID` int(10) NOT NULL,
  `Event Name` int(10) DEFAULT NULL,
  `Event Locatiion` varchar(255) NOT NULL,
  `Event Date` date NOT NULL,
  `Event Time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Member_ID` int(10) NOT NULL,
  `Amount_Paid` int(10) NOT NULL,
  `DOP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Email` int(10) NOT NULL,
  `PaymentMember_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `Player ID` int(11) NOT NULL,
  `PaymentMember_ID` int(10) DEFAULT NULL,
  `Member Renewal Date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Event ID` int(10) NOT NULL,
  `Participating Team` int(10) NOT NULL,
  `Winning Team` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `Team_ID` int(10) NOT NULL,
  `Player ID` int(11) NOT NULL,
  `Team Coach` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account login`
--
ALTER TABLE `account login`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`Coach_ID`);

--
-- Indexes for table `equiment`
--
ALTER TABLE `equiment`
  ADD PRIMARY KEY (`Equiment Name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event ID`),
  ADD KEY `FKEvent610490` (`Team ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Member_ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`Player ID`),
  ADD KEY `FKPlayer569882` (`PaymentMember_ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`Event ID`),
  ADD KEY `Participate` (`Participating Team`),
  ADD KEY `won by` (`Winning Team`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Team_ID`),
  ADD KEY `Supervise` (`Team Coach`),
  ADD KEY `Plays in` (`Player ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `Coach_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equiment`
--
ALTER TABLE `equiment`
  MODIFY `Equiment Name` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Member_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `Player ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `Event ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `Team_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account login`
--
ALTER TABLE `account login`
  ADD CONSTRAINT `Login` FOREIGN KEY (`Email`) REFERENCES `person` (`Email`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FKEvent610490` FOREIGN KEY (`Team ID`) REFERENCES `team` (`Team_ID`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FKPlayer569882` FOREIGN KEY (`PaymentMember_ID`) REFERENCES `payment` (`Member_ID`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `Participate` FOREIGN KEY (`Participating Team`) REFERENCES `event` (`Event ID`),
  ADD CONSTRAINT `won by` FOREIGN KEY (`Winning Team`) REFERENCES `event` (`Event ID`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `Plays in` FOREIGN KEY (`Player ID`) REFERENCES `player` (`Player ID`),
  ADD CONSTRAINT `Supervise` FOREIGN KEY (`Team Coach`) REFERENCES `coach` (`Coach_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
