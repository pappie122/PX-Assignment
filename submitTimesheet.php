<?php
session_start();
include ("db.php");

if (isset($_POST["test"]))
{
  $rowCount = $_POST["test"];
 // echo $rowCount;
  //echo " is your rowcount";
} 
else 
{
  $rowCount = null;
  echo "only one line";
  include_Once("submitTimsheet22.php");
}









	


$obj=array();



for($i=0;$i<$rowCount;$i++){
if($i==0){
$job=$_POST["inputLocation"];
}
else {
$job=$_POST["inputLocation".$i];
}

if($i==0){
$date=$_POST["date"];
}
else {
$date[$i]=$_POST["date".$i];
}

if($i==0){
$startTime[$i]=$_POST["StartTime"];
}
else {
$startTime[$i]=$_POST["StartTime".$i];
}
if($i==0){
$endTime[$i]=$_POST["EndTime"];
}
else {
$endTime[$i]=$_POST["EndTime".$i];
}
if($i==0){
$break=$_POST["Break"];
}
else {
$break[$i]=$_POST["Break".$i];
}

if($i==0){
$Notes=$_POST["Comment"];
}
else {
$Notes[$i]=$_POST["Comment".$i];
}
	array_push($obj, array("jobs"=>$job,
	$date[$i],
	$startTime[$i],
	$endTime[$i],
	$break[$i],
	$Notes[$i]));
}
//echo $obj;


echo $obj[0][3]."THi is";



if($i<=2&&$date[$i]==$date){
	
	echo "PlESASEEEEEEEEEEEEEEEEEEEEEEEE21111";
	if($startTime[$i]>=$endTime&&$endTime[$i]<=$startTime){
		echo "good to go";	
} else {
		//echo "Clash" .$startTime123;
	//	echo "clash";
		 //header("location:timesheet3.php");
		 
		echo "error";
		

}

	
	
	
	
}
if($i>2&&$date[$i]==$date[$i-1]){
	echo "PlESASEEEEEEEEEEEEEEEEEEEEEEEE1";
//check if previous date clashes with the row about to inserted 
if($startTime[$i]>=$endTime[$i-1]&&$endTime[$i]<=$startTime[$i-1]){
		echo "good to go";	
} else {
		//echo "Clash" .$startTime123;
	//	echo "clash";
		 //header("location:timesheet3.php");
		 
		echo "error";
		

}

}






// to check if date in database overlaps with the submitted date. 

$datecheck=$date;
$startTime123 =$startTime;
$endTime123=$endTime;
echo $datecheck;
$sql123="SELECT `timesheet`.`UserID`, `timesheet`.`TimesheetID`, `timesheetdetail`.`TsDetailID`, `timesheetdetail`.`TimesheetID`, `timesheetdetail`.`StartTime`, `timesheetdetail`.`EndTime`, `timesheetdetail`.`Date` FROM `timesheet` LEFT JOIN `timesheetdetail` ON `timesheet`.`TimesheetID` = `timesheetdetail`.`TimesheetID` WHERE (( `Date` ='$date' ) AND ( `UserID` = 1)); "; 


$result123 = mysqli_query($conn, $sql123);
while($row=mysqli_fetch_assoc($result123)){
	if($startTime123>=$row["EndTime"]&&$endTime123<=$row["StartTime"]){
		echo "good to go";	
} else {
		//echo "Clash" .$startTime123;
		echo "clash".$row["StartTime"];
		 header("location:timesheet3.php");
		 
		echo "error";
		

}







$userID="1"; 
$comments="pending";
$todaysDate=date('Y/m/d H:i:s');
$timeSheetStatus="pending";


/*
echo "Job is ".$job;
echo "\r\n";
echo "date is ".$date;
echo "\r\n";
echo "StartTime is ".$startTime;
echo "\r\n";
echo "endTime is ".$endTime;
echo "\r\n";
echo "break is ".$break;
echo "\r\n";
echo "Notes is ".$Notes;
echo "\r\n";
echo "userid is ".$userID;
echo "\r\n";
echo "comments is ".$comments;
echo "\r\n";
echo "todaysDate is ".$todaysDate;
echo "\r\n";
echo "timeSheetStatus is ".$timeSheetStatus;
echo "\r\n";

*/
 $totalhours=3;
		$timeSheetStatus=1;
		
		
		
		
		
		
		
		
		
		
		//echo $startTime;
		
		
		
		
		
		
		
		
		//delete this bracket



	
			

 echo $startTime[$i];
 echo "\r\n";
  echo $endTime[$i];
  echo "\r\n";
 
	// remove bracket and put one at end 

	

		
		
		
$sql1[$i] ="INSERT INTO timesheet (TimesheetID, UserID, DateCreated, DateSubmitted, TimesheetStatus, TotalHours, Comments, ApprovedDate, ApprovedBy) values (Null,'$userID','$todaysDate','$todaysDate','$timeSheetStatus','$totalhours','$comments',NULL,NULL)";  
//echo $sql1;



//  )";

//echo $sql;
 $rs = mysqli_query($conn, $sql1[$i]);
  $last_id[$i] = mysqli_insert_id($conn);
 



 
$sql2[$i]="INSERT INTO timesheetdetail (TsDetailID, TimesheetID, JobID, Date, StartTime, EndTime, BreakDuration, TotalHours, Comments) VALUEs (NULL,'$last_id[$i]','$job','$date[$i]','$startTime[$i]','$endTime[$i]','$break[$i]','$totalhours','$Notes[$i]')";

 
 $rs2 = mysqli_query($conn, $sql2[$i]);
 if(! $rs )
{
  die('Could not enter data: ' . mysqli_error($conn));
}
if(! $rs2 )
{
  die('Could not enter data: ' . mysqli_error($conn));
}




}
//add this bracket 





?>