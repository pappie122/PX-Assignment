<?php

include ("db.php");


   

    // Do whatever you want with the $uid



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

	
	


 $totalhours=3;
		$timeSheetStatus=1;
		
		

		
$sql33 ="INSERT INTO timesheet (TimesheetID, UserID, DateCreated, DateSubmitted, TimesheetStatus, TotalHours, Comments, ApprovedDate, ApprovedBy) values (Null,'$userID','$todaysDate','$todaysDate','$timeSheetStatus','$totalhours','$Notes',NULL,NULL)";  
//echo $sql1;




//  )";

//echo $sql;
 $rs11 = mysqli_query($conn, $sql33);
  $last_id = mysqli_insert_id($conn);
 
 

 
$sql44="INSERT INTO timesheetdetail (TsDetailID, TimesheetID, JobID, Date, StartTime, EndTime, BreakDuration, TotalHours, Comments) VALUEs (NUll,'$last_id','$job','$date','$startTime','$endTime','$break','$totalhours','$Notes')";
 echo $sql44;
 
 $rs22 = mysqli_query($conn, $sql44);
 if(! $rs11 )
{
  die('Could not enter data: ' . mysqli_error($conn));
}
if(! $rs22 )
{
  die('Could not enter data: ' . mysqli_error($conn));
}

	


?>
?>