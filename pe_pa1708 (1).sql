-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2017 at 07:15 AM
-- Server version: 5.1.73
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pe_pa1708`
--

-- --------------------------------------------------------

--
-- Table structure for table `Job`
--

CREATE TABLE IF NOT EXISTS `Job` (
  `JobID` int(8) NOT NULL AUTO_INCREMENT,
  `JobName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `JobStatus` int(1) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `Description` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Timesheet`
--

CREATE TABLE IF NOT EXISTS `Timesheet` (
  `TimesheetID` int(8) NOT NULL AUTO_INCREMENT,
  `UserID` int(8) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateSubmitted` datetime NOT NULL,
  `TimesheetStatus` int(1) NOT NULL DEFAULT '0',
  `TotalHours` int(8) NOT NULL,
  `Comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ApprovedDate` datetime DEFAULT NULL,
  `ApprovedBy` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TimesheetID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TimesheetDetail`
--

CREATE TABLE IF NOT EXISTS `TimesheetDetail` (
  `TsDetailID` int(8) NOT NULL AUTO_INCREMENT,
  `TimesheetID` int(8) NOT NULL,
  `JobID` int(8) NOT NULL,
  `Date` datetime NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `BreakDuration` time NOT NULL,
  `TotalHours` int(8) NOT NULL,
  `Comments` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TsDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserID` int(8) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Lname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Street` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` int(8) NOT NULL,
  `Phone` int(16) NOT NULL,
  `Email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` int(1) NOT NULL DEFAULT '0',
  `AccountStatus` int(1) NOT NULL,
  `Role` int(1) NOT NULL DEFAULT '0',
  `City` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserJob`
--

CREATE TABLE IF NOT EXISTS `UserJob` (
  `UserJobID` int(8) NOT NULL AUTO_INCREMENT,
  `UserID` int(8) NOT NULL,
  `JobID` int(8) NOT NULL,
  `UserJobStatus` int(1) NOT NULL,
  PRIMARY KEY (`UserJobID`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Timesheet`
--
ALTER TABLE `Timesheet`
  ADD CONSTRAINT `Timesheet_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `TimesheetDetail`
--
ALTER TABLE `TimesheetDetail`
  ADD CONSTRAINT `TimesheetDetail_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `Job` (`JobID`),
  ADD CONSTRAINT `TimesheetDetail_ibfk_1` FOREIGN KEY (`TimesheetID`) REFERENCES `Timesheet` (`TimesheetID`);

--
-- Constraints for table `UserJob`
--
ALTER TABLE `UserJob`
  ADD CONSTRAINT `UserJob_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `UserJob_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `Job` (`JobID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
