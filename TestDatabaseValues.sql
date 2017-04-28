​INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Street`, `Postcode`, `Phone`, `Email`, `Password`, `Gender`, `AccountStatus`, `Role`, `City`) VALUES (NULL, 'Alex', 'map', '12 Fake Street', '2332', '0433904996', 'mapalex@hotmail.com', '12345', '1', '1', '1', 'Sydney');
​INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Street`, `Postcode`, `Phone`, `Email`, `Password`, `Gender`, `AccountStatus`, `Role`, `City`) VALUES (NULL, 'George', 'Smith', '14 Waterloo Road', '2342', '0433904991', 'GeorgeSmith@hotmail.com', 'password1', '1', '1', '1', 'Sydney');
​INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Street`, `Postcode`, `Phone`, `Email`, `Password`, `Gender`, `AccountStatus`, `Role`, `City`) VALUES (NULL, 'Andrew', 'Man', '1 AngleView Street', '2832', '0466904993', 'AngleView@hotmail.com', 'passwrod2', '1', '1', '1', 'Sydney');
​INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Street`, `Postcode`, `Phone`, `Email`, `Password`, `Gender`, `AccountStatus`, `Role`, `City`) VALUES (NULL, 'Jess', 'Never', '30 Alambie Cresent', '3332', '0477904999', 'JessNever@hotmail.com', 'enter1', '2', '1', '1', 'Sydney');
​INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Street`, `Postcode`, `Phone`, `Email`, `Password`, `Gender`, `AccountStatus`, `Role`, `City`) VALUES (NULL, 'Drew', 'Flip', '4 Birds View  Street', '7332', '0488904992', 'DrewFlip@hotmail.com', 'coolkid', '1', '1', '1', 'Sydney');

​INSERT INTO `job` (`JobID`, `JobName`, `JobStatus`, `StartDate`, `EndDate`, `Description`) VALUES (NULL, 'Minning', '1', '2017-04-12 00:00:00', '2017-06-30 00:00:00', 'Minning');
​INSERT INTO `job` (`JobID`, `JobName`, `JobStatus`, `StartDate`, `EndDate`, `Description`) VALUES (NULL, 'Drilling', '1', '2017-03-12 00:00:00', '2017-05-30 00:00:00', 'Minning');
​INSERT INTO `job` (`JobID`, `JobName`, `JobStatus`, `StartDate`, `EndDate`, `Description`) VALUES (NULL, 'Removal', '1', '2017-01-12 00:00:00', '2017-09-30 00:00:00', 'Removing excess rubish from the site');
​INSERT INTO `job` (`JobID`, `JobName`, `JobStatus`, `StartDate`, `EndDate`, `Description`) VALUES (NULL, 'It', '1', '2016-04-12 00:00:00', '2017-06-30 00:00:00', 'Improving website');
​INSERT INTO `job` (`JobID`, `JobName`, `JobStatus`, `StartDate`, `EndDate`, `Description`) VALUES (NULL, 'Minning', '1', '2017-03-22 00:00:00', '2017-09-30 00:00:00', 'Minning');

INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES (NULL, '1', '1', '1');
INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES (NULL, '1', '2', '1');
INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES (NULL, '2', '3', '1');
INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES (NULL, '3', '4', '1');
INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES (NULL, '4', '5', '1');
INSERT INTO `userjob` (`UserJobID`, `UserID`, `JobID`, `UserJobStatus`) VALUES (NULL, '5', '1', '2');

​INSERT INTO `timesheet` (`TimesheetID`, `UserID`, `DateCreated`, `DateSubmitted`, `TimesheetStatus`, `TotalHours`, `Comments`, `ApprovedDate`, `ApprovedBy`) VALUES (NULL, '1', '2017-04-05 00:00:00', '2017-04-11 00:00:00', '1', '3', 'pending',Null,NUll);
​INSERT INTO `timesheet` (`TimesheetID`, `UserID`, `DateCreated`, `DateSubmitted`, `TimesheetStatus`, `TotalHours`, `Comments`, `ApprovedDate`, `ApprovedBy`) VALUES (NULL, '2', '2017-04-05 00:00:00', '2017-04-11 00:00:00', '2', '5', 'Approved', '2017-04-12 00:00:00', 'Alex');
​INSERT INTO `timesheet` (`TimesheetID`, `UserID`, `DateCreated`, `DateSubmitted`, `TimesheetStatus`, `TotalHours`, `Comments`, `ApprovedDate`, `ApprovedBy`) VALUES (NULL, '3', '2017-04-05 00:00:00', '2017-04-11 00:00:00', '2', '3', 'none', '2017-04-12 00:00:00', 'Angelene');
​INSERT INTO `timesheet` (`TimesheetID`, `UserID`, `DateCreated`, `DateSubmitted`, `TimesheetStatus`, `TotalHours`, `Comments`, `ApprovedDate`, `ApprovedBy`) VALUES (NULL, '4', '2017-04-05 00:00:00', '2017-04-11 00:00:00', '3', '3', 'Rejected', '2017-04-12 00:00:00', 'Jess');
​INSERT INTO `timesheet` (`TimesheetID`, `UserID`, `DateCreated`, `DateSubmitted`, `TimesheetStatus`, `TotalHours`, `Comments`, `ApprovedDate`, `ApprovedBy`) VALUES (NULL, '5', '2017-04-05 00:00:00', '2017-04-11 00:00:00', '3', '3', 'Rejected', '2017-04-12 00:00:00', 'Drew');

INSERT INTO `timesheetdetail` (`TsDetailID`, `TimesheetID`, `JobID`, `Date`, `StartTime`, `EndTime`, `BreakDuration`, `TotalHours`, `Comments`) VALUES (NULL, '1', '1', '2017-04-12 00:00:00', '07:00:00', '16:00:00', '01:00:00', '8', 'Hard Days Work');
INSERT INTO `timesheetdetail` (`TsDetailID`, `TimesheetID`, `JobID`, `Date`, `StartTime`, `EndTime`, `BreakDuration`, `TotalHours`, `Comments`) VALUES (NULL, '2', '2', '2017-04-12 00:00:00', '06:00:00', '16:00:00', '01:00:00', '9', 'Hard Days Work');
INSERT INTO `timesheetdetail` (`TsDetailID`, `TimesheetID`, `JobID`, `Date`, `StartTime`, `EndTime`, `BreakDuration`, `TotalHours`, `Comments`) VALUES (NULL, '3', '3', '2017-04-12 00:00:00', '07:00:00', '16:00:00', '01:00:00', '8', 'Easy day');
INSERT INTO `timesheetdetail` (`TsDetailID`, `TimesheetID`, `JobID`, `Date`, `StartTime`, `EndTime`, `BreakDuration`, `TotalHours`, `Comments`) VALUES (NULL, '4', '4', '2017-04-12 00:00:00', '07:00:00', '16:00:00', '01:00:00', '8', 'Good Day');
INSERT INTO `timesheetdetail` (`TsDetailID`, `TimesheetID`, `JobID`, `Date`, `StartTime`, `EndTime`, `BreakDuration`, `TotalHours`, `Comments`) VALUES (NULL, '5', '5', '2017-04-12 00:00:00', '07:00:00', '16:00:00', '01:00:00', '8', 'Hard Days Work');

