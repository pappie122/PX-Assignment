<?php
function totalHours($startTime,$endTime,$break){
//$startTime="03:29:00";
//$endTime="16:00:00";
//$break = 0.5;



if($break>3){
	echo "please enter a date thats unnder 3 hours ";
	header("location:timesheet3.php");
	
}
$firstMinus= date_create($startTime)->diff(date_create($endTime))->format('%H:%i');
//echo $minutes;
//echo $firstMinus;
//echo "\r\n";
//echo "\r\n";



$breakCal= floor($break) . ':' . (($break * 60) % 60);











$secondMinus =date_create($firstMinus)->diff(date_create($breakCal))->format('%H:%i');
//echo $nn;
//echo "\r\n";
$replaceDot= str_replace(":",".",$secondMinus);

  $num = floatval($replaceDot);
    //echo $num;


return $num;
}


function CheckBreakOverLap($startTime,$endTime,$break){
$firstMinus= date_create($startTime)->diff(date_create($endTime))->format('%H:%i');
//echo $minutes;
//echo $firstMinus;
//echo "\r\n";
//echo "\r\n";


$m=true;
$breakCal= floor($break) . ':' . (($break * 60) % 60);
echo $breakCal."this is the break cal ";
echo $firstMinus."this is the break cal ";
if($breakCal>=$firstMinus){
	Echo "Stop bludging" ;
header("location:timesheet3.php");
$m=false;
}


}



?>