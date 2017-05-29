
<?php
//Checks if field is not set 
function checkEmpty($formData){


$a=true;
	for($i = 0; $i < count($formData); $i++){
  if ($formData[$i]["date"]==null) {
    echo   "Date is required" ."\n";
	//echo $_POST["date"];
	$a= false;
	//header("location:timesheet3.php");
	//die;
  } else {

$a=true;
  }

  if ($formData[$i]["startTime"]==null) {
   echo "Start Time is required"."\n";
  // header("location:timesheet3.php");
$a= false;
 
  } else {

$a=true;
  }

  if ($formData[$i]["endTime"]==null) {
    echo  "end time required";
	//header("location:timesheet3.php");
$a= false;
	
  } else {

	$a=true;
  }
  return $a;
}


}
/*
function checkifDate($formData){
for($i = 0; $i < count($formData); $i++){
	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    {
		echo "good Date";
        return true;
    }else{
		echo "bad mate  Date";
        return false;
    }
}
}
*/
/*
*Checks for overlapping time 
*
*/
function checkOverlap($formData){

	for($i = 0; $i < count($formData); $i++){
	//$row["date"][$i];

		for($j = $i+1; $j < count($formData); $j ++){
			if($formData[$i]["date"] == $formData[$j]["date"]) {
				if($formData[$i]["startTime"]>=$formData[$j]["endTime"]&&$formData[$i]["endTime"]<=$formData[$j]["startTime"]&&$formData[$i]["startTime"]<$formData[$i]["endTime"]){
					echo "Success";
				}else {
					echo "error over lap time";
					header("location:timesheet3.php");
				}
			}
		}
	}
}


	

	?>
 