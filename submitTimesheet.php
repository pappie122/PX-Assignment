<?php
session_start();
include ("db.php");


$date=$_POST["datet"]; 
$startTime=$_POST["startTime"];
$endTime=$_POST["endTime"];
$job=$_POST["jobID"];
$Notes=$_POST["Notes"];

$break=!_POST["break"];






 




$sql= "INSERT INTO TimeSheet(datet , startTime, endTime ,jobID, Notes) values('$date','$startTime',
'$endTime','$endTime ','$job','$Notes') ";
//echo $sql;
 $rs = mysqli_query($conn, $sql);
 

 if(! $rs )
{
  die('Could not enter data: ' . mysqli_error());
}




?>