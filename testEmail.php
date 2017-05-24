<?php 

$to ="localhost.sealex001@gmail.com";
$subject='LOCALHOST SUBJECT';
$message='Send from localhost';

$headers="from sealex001@gmail.com";
if(mail($to,$subject,$message,$headers))
	echo "email sent";
else 
	echo "email sending failed";





?>