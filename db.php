<?php
$host="localhost";
$password="";
$username="root";
$dbname="px";
$errorMessage="could not connect properly";
$conn=  mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
echo'failure';
}
$select_db=mysqli_select_db($conn,$dbname)or die ("couldnt select db");

$query="SELECT * FROM user";
$fetch=mysqli_query($conn,$query) or die("could not find user");
//mysqli_close($conn);

?>