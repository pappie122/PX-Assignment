-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 05:04 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `px`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JobID` int(8) NOT NULL,
  `JobName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `JobStatus` int(1) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `Description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobID`, `JobName`, `JobStatus`, `StartDate`, `EndDate`, `Description`) VALUES
(1, 'Minning', 1, '2017-04-12 00:00:00', '2017-06-30 00:00:00', 'Minning'),
(2, 'Drilling', 1, '2017-03-12 00:00:00', '2017-05-30 00:00:00', 'Minning'),
(3, 'Removal', 1, '2017-01-12 00:00:00', '2017-09-30 00:00:00', 'Removing excess rubish from the site'),
(4, 'It', 1, '2016-04-12 00:00:00', '2017-06-30 00:00:00', 'Improving website'),
(5, 'Minning', 1, '2017-03-22 00:00:00', '2017-09-30 00:00:00', 'Minning'),
(6, 'Toilet Cleaning', 1, '2017-07-13 00:00:00', '2017-08-18 00:00:00', 'Clean the office toilets'),
(7, 'Driver', 1, '2017-05-04 00:00:00', '2017-09-22 00:00:00', 'Drive truck');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `TimesheetID` int(8) NOT NULL,
  `UserID` int(8) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `DateSubmitted` datetime NOT NULL,
  `TimesheetStatus` int(1) NOT NULL DEFAULT '0',
  `TotalHours` int(8) NOT NULL,
  `Comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ApprovedDate` datetime DEFAULT NULL,
  `ApprovedBy` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`TimesheetID`, `UserID`, `DateCreated`, `DateSubmitted`, `TimesheetStatus`, `TotalHours`, `Comments`, `ApprovedDate`, `ApprovedBy`) VALUES
(1, 1, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 1, 3, 'pending', NULL, NULL),
(2, 2, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 3, 5, 'sfg', '2017-05-26 00:00:00', 'mapalex@hotmail.com'),
(3, 3, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 1, 3, 'Bad break', '2017-05-26 00:00:00', 'mapalex@hotmail.com'),
(4, 4, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 3, 3, 'Rejected', '2017-04-12 00:00:00', 'Jess'),
(5, 5, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 3, 3, 'Rejected', '2017-04-12 00:00:00', 'Drew'),
(6, 1, '2017-05-26 00:00:00', '2017-05-26 02:25:20', 3, 2, 'Approved Mate', '2017-05-26 00:00:00', 'mapalex@hotmail.com'),
(7, 1, '2017-05-26 00:00:00', '2017-05-26 02:34:10', 1, 4, '', NULL, NULL),
(8, 1, '2017-05-26 00:00:00', '2017-05-26 02:36:28', 1, 4, 'Very bad Bathroom', NULL, NULL),
(9, 1, '2017-05-26 00:00:00', '2017-05-26 02:36:28', 1, 2, 'Did some drilling', NULL, NULL),
(10, 1, '2017-05-26 00:00:00', '2017-05-26 02:39:52', 1, 16, 'first submit', NULL, NULL),
(11, 1, '2017-05-26 00:00:00', '2017-05-26 02:56:58', 2, 6, 'pending', NULL, NULL),
(12, 1, '2017-05-26 00:00:00', '2017-05-26 04:23:20', 1, 12, 'pending', NULL, NULL),
(13, 9, '2017-05-26 00:00:00', '2017-05-26 04:57:41', 1, 0, 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timesheetdetail`
--

CREATE TABLE `timesheetdetail` (
  `TsDetailID` int(8) NOT NULL,
  `TimesheetID` int(8) NOT NULL,
  `JobID` int(8) NOT NULL,
  `Date` datetime NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `BreakDuration` float NOT NULL,
  `TotalHours` float NOT NULL,
  `Comments` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timesheetdetail`
--

INSERT INTO `timesheetdetail` (`TsDetailID`, `TimesheetID`, `JobID`, `Date`, `StartTime`, `EndTime`, `BreakDuration`, `TotalHours`, `Comments`) VALUES
(1, 1, 1, '2017-04-12 00:00:00', '07:00:00', '08:00:00', 2, 1, 'Hard Days Work'),
(2, 2, 2, '2017-04-12 00:00:00', '06:00:00', '16:00:00', 10000, 9, 'Hard Days Work'),
(3, 3, 3, '2017-04-12 00:00:00', '07:00:00', '16:00:00', 10000, 8, 'Easy day'),
(4, 4, 4, '2017-04-12 00:00:00', '07:00:00', '16:00:00', 10000, 8, 'Good Day'),
(5, 5, 5, '2017-04-12 00:00:00', '07:00:00', '16:00:00', 10000, 8, 'Hard Days Work'),
(6, 6, 2, '2017-05-10 00:00:00', '02:32:00', '05:23:00', 1, 1.51, ''),
(7, 7, 1, '2017-05-24 00:00:00', '14:32:00', '17:34:00', 7, 3.58, ''),
(8, 8, 6, '2017-07-07 00:00:00', '12:31:00', '17:34:00', 1, 4.3, 'Very bad Bathroom'),
(9, 9, 1, '2017-07-07 00:00:00', '08:00:00', '11:00:00', 0.5, 2.3, 'Did some drilling'),
(10, 10, 2, '2017-05-17 00:00:00', '00:32:00', '18:57:00', 2, 16.25, 'Long day'),
(11, 11, 2, '2017-05-08 00:00:00', '03:22:00', '10:12:00', 0.5, 6.2, 'overnight work'),
(12, 12, 2, '2017-07-01 00:00:00', '05:45:00', '08:43:00', 15, 12.2, ''),
(13, 13, 7, '2017-05-12 00:00:00', '08:00:00', '09:00:00', 1, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(8) NOT NULL,
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
  `City` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Street`, `Postcode`, `Phone`, `Email`, `Password`, `Gender`, `AccountStatus`, `Role`, `City`) VALUES
(1, 'Alex', 'map', '12 Fake Street', 2332, 433904996, 'mapalex@hotmail.com', '12345', 1, 1, 1, 'Sydney'),
(2, 'George', 'Smith', '14 Waterloo Road', 2342, 433904991, 'GeorgeSmith@hotmail.com', 'password1', 1, 1, 1, 'Sydney'),
(3, 'Andrew', 'Man', '1 AngleView Street', 2832, 466904993, 'AngleView@hotmail.com', 'passwrod2', 1, 1, 1, 'Sydney'),
(4, 'Jess', 'Never', '30 Alambie Cresent', 3332, 477904999, 'JessNever@hotmail.com', 'enter1', 2, 1, 1, 'Sydney'),
(5, 'Drew', 'Flip', '4 Birds View  Street', 7332, 488904992, 'DrewFlip@hotmail.com', 'coolkid', 1, 1, 1, 'Sydney'),
(6, 'Moe', 'Cool', '122 fake street', 2234, 33334443, 'Moe@hotmail.com', '12345', 0, 1, 0, 'Sydney'),
(7, 'Alex', 'Pap', '12 New street', 2133, 9999993, 'Alantest@hotmail.com', '12345', 0, 1, 0, 'Sydney '),
(8, 'Alex ', 'test', '12 fake street', 2234, 1234567, 'Testjob@hotmail.com', '12345', 0, 1, 0, 'Sydney'),
(9, 'alex', 'asdfasdf', '234234', 2234, 24234234, 'Alanl@hotmail.com', '12345', 0, 1, 0, 'sdvdasv');

-- --------------------------------------------------------

--
-- Table structure for table `userjob`
--

CREATE TABLE `userJob` (
  `UserJobID` int(8) NOT NULL,
  `UserID` int(8) NOT NULL,
  `JobID` int(8) NOT NULL,
  `UserJobStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userjob`
--

INSERT INTO `userJob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 3, 1),
(4, 3, 4, 1),
(5, 4, 5, 1),
(6, 5, 1, 2),
(7, 1, 6, 1),
(8, 2, 6, 1),
(9, 4, 6, 1),
(10, 6, 6, 1),
(11, 8, 6, 1),
(12, 9, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`TimesheetID`),
  ADD KEY `Timesheet_ibfk_1` (`UserID`);

--
-- Indexes for table `timesheetdetail`
--
ALTER TABLE `timesheetdetail`
  ADD PRIMARY KEY (`TsDetailID`),
  ADD KEY `TimesheetDetail_ibfk_2` (`JobID`),
  ADD KEY `TimesheetDetail_ibfk_1` (`TimesheetID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userjob`
--
ALTER TABLE `userJob`
  ADD PRIMARY KEY (`UserJobID`),
  ADD KEY `UserJob_ibfk_1` (`UserID`),
  ADD KEY `UserJob_ibfk_2` (`JobID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JobID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `TimesheetID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `timesheetdetail`
--
ALTER TABLE `timesheetdetail`
  MODIFY `TsDetailID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `userjob`
--
ALTER TABLE `userJob`
  MODIFY `UserJobID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD CONSTRAINT `Timesheet_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `timesheetdetail`
--
ALTER TABLE `timesheetdetail`
  ADD CONSTRAINT `TimesheetDetail_ibfk_1` FOREIGN KEY (`TimesheetID`) REFERENCES `timesheet` (`TimesheetID`),
  ADD CONSTRAINT `TimesheetDetail_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `job` (`JobID`);

--
-- Constraints for table `userjob`
--
ALTER TABLE `userJob`
  ADD CONSTRAINT `UserJob_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `UserJob_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `job` (`JobID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
