
<?php

function checkEmpty($formData){


$a=true;
	for($i = 0; $i < count($formData); $i++){
  if ($formData[$i]["date"]==null) {
    echo   "Date is required";
	//echo $_POST["date"];
	$a= false;
	header("location:timesheet3.php");
	die;
  } else {

$a=true;
  }

  if ($formData[$i]["startTime"]==null) {
   echo "Start Time is required";
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
 