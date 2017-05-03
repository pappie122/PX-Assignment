<?php
session_start();
include ("db.php");

$job=$_POST["inputLocation"];
$date=$_POST["date"]; 
$startTime=$_POST["StartTime"];
$endTime=$_POST["EndTime"];
$break=$_POST["Break"];
$Notes=$_POST["Comment"];
$userID="1"; 
$comments="pending";
$todaysDate=date('Y/m/d H:i:s');
$timeSheetStatus="pending";
 echo "Hi this is ".$job;
/*for(int $i=1;$i<$rowvalue;$i++){
	$job.[$i]
	
	
	*/


//echo $job ;
//echo $date ;
//echo $startTime ;
//echo $endTime ;
//echo $break ;
//echo $Notes ;
//echo $todaysDate;
 $totalhours=3;
		$timeSheetStatus=1;
		
		

		
$sql1 ="INSERT INTO timesheet (TimesheetID, UserID, DateCreated, DateSubmitted, TimesheetStatus, TotalHours, Comments, ApprovedDate, ApprovedBy) values (Null,'$userID','$todaysDate','$todaysDate','$timeSheetStatus','$totalhours','$comments',NULL,NULL)";  
//echo $sql1;




//  )";

//echo $sql;
 $rs = mysqli_query($conn, $sql1);
  $last_id = mysqli_insert_id($conn);
 
 

 
$sql2="INSERT INTO timesheetdetail (TsDetailID, TimesheetID, JobID, Date, StartTime, EndTime, BreakDuration, TotalHours, Comments) VALUEs (NUll,'$last_id','$job','$date','$startTime','$endTime','$break','$totalhours','$comments')";
 echo $sql2;
 
 $rs2 = mysqli_query($conn, $sql2);
 if(! $rs )
{
  die('Could not enter data: ' . mysqli_error($conn));
}
if(! $rs2 )
{
  die('Could not enter data: ' . mysqli_error($conn));
}

	


?>