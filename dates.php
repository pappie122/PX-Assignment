<?php
function totalHours($startTime,$endTime,$break){
//$startTime="03:29:00";
//$endTime="16:00:00";
//$break = 0.5;




$firstMinus= date_create($startTime)->diff(date_create($endTime))->format('%H:%i');
//echo $minutes;
//echo $firstMinus;
//echo "\r\n";
//echo "\r\n";



$breakCal= floor($break) . ':' . (($break * 60) % 60);
//echo $break;
$secondMinus =date_create($firstMinus)->diff(date_create($breakCal))->format('%H:%i');
//echo $nn;
//echo "\r\n";
$replaceDot= str_replace(":",".",$secondMinus);

  $num = floatval($replaceDot);
    //echo $num;


return $num;
}

?>