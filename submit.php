<?php
session_start();
include ("db.php");


$fname=$_POST["FirstName"]; 
$lname=$_POST["LastName"];
$addr=$_POST["Address"];
$city=$_POST["City"]; 
$postcode=$_POST["Postcode"];
$mobile=$_POST["mobile"];
$email=$_POST["Email"];
$pword=$_POST["Pword"];
$gender=$_POST["Gender"];
$AccountStatus="normal";






 




$sql= "INSERT INTO userac(LastName , FirstName, Address ,City, Postcode , mobile,Pword,Gender, AccountStatus ," ") values('$lname','$fname',
'$addr','$city ','$lname','$postcode','$mobile','$email','$pword','$gender','$AccountStatus',"") ";
//echo $sql;
 $rs = mysql_query($sql, $conn);
 

 if(! $rs )
{
  die('Could not enter data: ' . mysql_error());
}




     $sql2 = "select * from userac WHERE Email = '$email' and Pword = '$pword'";
     $rs2 = mysql_query($sql2, $conn);
if (mysql_num_rows($rs2) == 1) {
$_SESSION['Email'] = $_POST['Email'];
echo'you made it:';
echo $email;
header('Location: timesheet.php');
}

 


?>