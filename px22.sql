-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 07:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `Description` varchar(40) COLLATE utf8_unicode_ci NOT NULL
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
(6, 'It', 1, '2016-04-12 00:00:00', '2017-06-30 00:00:00', 'Improving website'),
(7, 'Minning', 1, '2017-04-12 00:00:00', '2017-06-30 00:00:00', 'Minning'),
(8, 'Minning', 1, '2017-04-12 00:00:00', '2017-06-30 00:00:00', 'Minning'),
(9, '', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', ''),
(10, '', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', ''),
(11, '', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', ''),
(12, 'asdc', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', ''),
(13, 'asdfasdf', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', 'adsfasdf'),
(14, 'Random', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', ''),
(15, 'Toilet Cleaning', 1, '2017-05-04 00:00:00', '2017-05-09 00:00:00', ''),
(16, 'Minning', 1, '2017-04-12 00:00:00', '2017-06-30 00:00:00', 'Minning'),
(17, 'Minning', 1, '2017-04-12 00:00:00', '2017-06-30 00:00:00', 'Minning');

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
(2, 2, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 2, 5, 'Approved', '2017-04-12 00:00:00', 'Alex'),
(3, 3, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 2, 3, 'none', '2017-04-12 00:00:00', 'Angelene'),
(4, 4, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 3, 3, 'Rejected', '2017-04-12 00:00:00', 'Jess'),
(5, 5, '2017-04-05 00:00:00', '2017-04-11 00:00:00', 3, 3, 'Rejected', '2017-04-12 00:00:00', 'Drew'),
(6, 1, '2017-05-22 00:00:00', '2017-05-22 07:39:50', 0, 12, 'fdsgsdfg', NULL, NULL),
(7, 2, '2017-05-22 00:00:00', '2017-05-22 07:40:39', 2, 11, 'sdvf', NULL, NULL),
(8, 2, '2017-05-22 00:00:00', '2017-05-22 08:54:10', 2, 11, 'sfgdfg', NULL, NULL),
(9, 2, '2017-05-22 00:00:00', '2017-05-22 08:54:57', 1, 10, '', NULL, NULL),
(10, 1, '2017-05-22 00:00:00', '2017-05-22 08:55:22', 2, 12, '', NULL, NULL),
(11, 2, '2017-05-22 00:00:00', '2017-05-22 08:56:31', 1, 3, 'Will it work?', NULL, NULL),
(12, 2, '2017-05-22 00:00:00', '2017-05-22 08:56:26', 1, 4, 'Will it work 2 ', NULL, NULL),
(13, 1, '2017-05-22 00:00:00', '2017-05-22 10:52:06', 2, 8, 'asdf', NULL, NULL),
(14, 1, '2017-05-22 00:00:00', '2017-05-22 11:24:13', 2, 10, 'asdf', NULL, NULL),
(15, 6, '2017-05-22 00:00:00', '2017-05-22 11:43:35', 1, 11, '', NULL, NULL),
(16, 6, '2017-05-23 00:00:00', '2017-05-23 07:00:25', 2, 15, 'test', NULL, NULL),
(17, 1, '2017-05-23 00:00:00', '2017-05-23 07:36:28', 2, 8, '', NULL, NULL),
(18, 1, '2017-05-23 00:00:00', '2017-05-23 08:16:32', 0, 11, 'mum', NULL, NULL),
(19, 1, '2017-05-23 00:00:00', '2017-05-23 08:16:43', 0, 0, 'mum1', NULL, NULL),
(20, 1, '2017-05-23 00:00:00', '2017-05-23 09:20:01', 0, 10, 'I worked well today', NULL, NULL),
(21, 1, '2017-05-23 00:00:00', '2017-05-23 09:19:39', 0, 2, 'Wet weather', NULL, NULL),
(22, 1, '2017-05-23 00:00:00', '2017-05-23 09:19:54', 0, 4, 'Afternoon shift', NULL, NULL),
(23, 1, '2017-05-24 00:00:00', '2017-05-24 06:01:27', 0, 1, '', NULL, NULL),
(24, 1, '2017-05-24 00:00:00', '2017-05-24 07:19:02', 1, 1, '', NULL, NULL),
(25, 1, '2017-05-24 00:00:00', '2017-05-24 07:21:55', 1, 13, '', NULL, NULL),
(26, 1, '2017-05-24 00:00:00', '2017-05-24 07:23:29', 1, 0, '', NULL, NULL),
(27, 1, '2017-05-24 00:00:00', '2017-05-24 07:25:04', 1, 4, '0000000000', NULL, NULL),
(28, 1, '2017-05-24 00:00:00', '2017-05-24 07:25:06', 1, 5, '1111111', NULL, NULL),
(29, 1, '2017-05-24 00:00:00', '2017-05-24 07:25:02', 1, 6, '22222222222', NULL, NULL);

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
(1, 1, 1, '2017-04-12 00:00:00', '00:00:00', '00:00:00', 1, 1, 'Hard Days Work'),
(2, 2, 2, '2017-04-12 00:00:00', '06:00:00', '16:00:00', 10000, 9, 'Hard Days Work'),
(3, 3, 3, '2017-04-12 00:00:00', '07:00:00', '16:00:00', 10000, 8, 'Easy day'),
(4, 4, 4, '2017-04-12 00:00:00', '07:00:00', '16:00:00', 10000, 8, 'Good Day'),
(5, 5, 5, '2017-04-12 00:00:00', '07:00:00', '16:00:00', 10000, 8, 'Hard Days Work'),
(6, 6, 1, '2017-05-20 00:00:00', '02:24:00', '15:04:00', 0.5, 12.1, 'fdsgsdfg'),
(7, 7, 3, '2017-05-11 00:00:00', '02:42:00', '14:13:00', 0, 11.31, 'sdvf'),
(8, 8, 3, '2017-05-04 00:00:00', '02:34:00', '14:34:00', 0.5, 11.3, 'sfgdfg'),
(9, 9, 3, '2017-07-09 00:00:00', '12:34:00', '00:34:00', 2, 10, ''),
(10, 10, 2, '2017-05-04 00:00:00', '14:13:00', '02:13:00', 0, 12, ''),
(11, 11, 3, '2017-08-12 00:00:00', '02:13:00', '06:03:00', 0.5, 3.2, 'Will it work?'),
(12, 12, 3, '2017-12-20 00:00:00', '12:31:00', '17:31:00', 0.5, 4.3, 'Will it work 2 '),
(13, 13, 1, '2017-05-03 00:00:00', '03:23:00', '12:31:00', 0.5, 8.38, 'asdf'),
(14, 14, 2, '2017-05-10 00:00:00', '12:31:00', '00:03:00', 2, 10.28, 'asdf'),
(15, 15, 4, '2017-05-04 00:00:00', '13:00:00', '02:00:00', 0.5, 10.3, ''),
(16, 16, 4, '2017-06-16 00:00:00', '00:34:00', '16:57:00', 1, 15.23, 'test'),
(17, 17, 1, '2017-01-05 00:00:00', '04:32:00', '14:34:00', 1.5, 8.32, 'hi'),
(18, 18, 1, '2017-02-09 00:00:00', '12:31:00', '00:31:00', 0.5, 11.3, 'mum'),
(19, 19, 1, '2017-02-25 00:00:00', '14:31:00', '12:31:00', 0, 2, 'mum1'),
(20, 20, 2, '2017-05-18 00:00:00', '02:42:00', '14:34:00', 2, 9.52, 'I worked well today'),
(21, 21, 1, '2017-05-18 00:00:00', '03:42:00', '06:42:00', 0.5, 2.3, 'Wet weather'),
(22, 22, 1, '2017-05-24 00:00:00', '15:22:00', '19:45:00', 0.5, 3.53, 'Afternoon shift'),
(23, 23, 1, '2017-04-06 00:00:00', '14:34:00', '16:34:00', 0.5, 1.3, ''),
(24, 24, 1, '2016-12-14 00:00:00', '12:31:00', '11:12:00', 0, 1.19, ''),
(25, 25, 1, '2017-02-03 00:00:00', '02:23:00', '15:24:00', 0, 13.1, ''),
(26, 26, 1, '2017-08-19 00:00:00', '14:43:00', '15:04:00', 0, 0.21, ''),
(27, 27, 2, '2016-04-22 00:00:00', '14:34:00', '18:34:00', 0, 4, '0000000000'),
(28, 28, 1, '2018-02-04 00:00:00', '12:31:00', '18:34:00', 0.5, 5.33, '1111111'),
(29, 29, 1, '2018-06-15 00:00:00', '12:34:00', '19:46:00', 0.5, 6.42, '22222222222');

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
(1, 'Alan', 'map', '12 Fake Street', 2332, 433904996, 'mapalex@hotmail.com', '12345', 1, 1, 1, 'Sydney'),
(2, 'George', 'Smith', '14 Waterloo Road', 2342, 433904991, 'GeorgeSmith@hotmail.com', 'password1', 1, 1, 1, 'Sydney'),
(3, 'Andrew', 'Man', '1 AngleView Street', 2832, 466904993, 'AngleView@hotmail.com', 'passwrod2', 1, 1, 1, 'Sydney'),
(4, 'Jess', 'Never', '30 Alambie Cresent', 3332, 477904999, 'JessNever@hotmail.com', 'enter1', 2, 1, 1, 'Sydney'),
(5, 'Drew', 'Flip', '4 Birds View  Street', 7332, 488904992, 'DrewFlip@hotmail.com', 'coolkid', 1, 1, 1, 'Sydney'),
(6, 'asdf', 'asdf', '234 asdf ', 23232, 8345234, 'George333Smith@hotmail.com', '12345', 0, 1, 0, 'asdfsadf '),
(7, 'asdfasd', 'asdfasdf', '121 ', 2222, 23243, 'mapal333333ex@hotmail.com', '12345', 0, 1, 0, 'asdfa'),
(9, 'alex', 'mmm', '12 fake street', 2300, 2, 'fake@hotmail.com', '12345', 0, 1, 0, 'xi  an');

-- --------------------------------------------------------

--
-- Table structure for table `userjob`
--

CREATE TABLE `userjob` (
  `UserJobID` int(8) NOT NULL,
  `UserID` int(8) NOT NULL,
  `JobID` int(8) NOT NULL,
  `UserJobStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userjob`
--

INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 3, 1),
(4, 3, 4, 1),
(5, 4, 5, 1);

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
ALTER TABLE `userjob`
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
  MODIFY `JobID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `TimesheetID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `timesheetdetail`
--
ALTER TABLE `timesheetdetail`
  MODIFY `TsDetailID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `userjob`
--
ALTER TABLE `userjob`
  MODIFY `UserJobID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
ALTER TABLE `userjob`
  ADD CONSTRAINT `UserJob_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `UserJob_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `job` (`JobID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
