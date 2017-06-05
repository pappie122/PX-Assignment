
<?php

function checkStartTime($formData){
	echo "this is working mate yeeew";
	$a=true;
	for($i = 0; $i < count($formData); $i++){
  if ($formData[$i]["startTime"]==null) {
	 echo "Start Time is required"."\n";

 
$a= true;

	
}else {
	$a=true;
	return $a;
}
	}
}


function checkEmpty($formData){
$a=true;
	for($i = 0; $i < count($formData); $i++){
  if ($formData[$i]["date"]==null) {
   // echo   "Date is required" ."\n";
	$dateError="Date is required";
	
	checkError($dateError);
	//echo "<script type='text/javascript'>alert('Time clash. Enter a new start and end time.')</script>";
	
	
	//echo $_POST["date"];
	$a= false;
	header("location:timesheet3.php");

  } else {
$a=true;
  }
  if ($formData[$i]["startTime"]==null) {
 $startTimeError ="Start Time is required";
 checkError($startTimeError);
  // header("location:timesheet3.php");
$a= false;
 
  } else {
$a=true;
  }
  if ($formData[$i]["endTime"]==null) {
    $endTimeError=  "end time required";
	 checkError($endTimeError);
	//header("location:timesheet3.php");
$a= false;
	
  } else {
	$a=true;
	//echo "why is this working?";
	
  }

}
  return $a;
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

function checkifDate($formData){
$a=true;
	for($i = 0; $i < count($formData); $i++){
		
		
		if (DateTime::createFromFormat('Y-m-d', $formData[$i]["date"]) !== FALSE) {
			//everything all good 
			return $a;
  // it's a date
}else {
	$message="its not a date";
	checkError($message);
	$a=false;

 return $a; 
}
}
	
	
}
function checkError($error){
	//$error="hihi";
	echo' <script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal("show");
	});
</script>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Error Message</h4>
            </div>
            <div class="modal-body">
                <p>'.$error.'
				</p>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
        </div>
		 </div>
        </div>
		';
	
	
	
	
	
	
	
	
	
	echo "<script type='text/javascript'>
$(document).ready(function(){
	$('.open-modal').click(function(){
		$('#myModal').modal('show');
	}); 
});
</script>";
	
	

	
	
}
function checkstartVal($formData){
$a=true;
	for($i=0;$i<Count($formData);$i++){
	if(preg_match('/^(?:[01][0-9]|2[0-3]):[0-5][0-9]$/',$formData[$i]["startTime"])) {
		
		
		
        // $input is valid HH:MM format.
}else {
	
	$message="its not a valid startTime";
	checkError($message);
	$a=false;
	return $a;
	
	
}
	
	
	}	
	
}
function checkendVal($formData){
$a=true;
	for($i=0;$i<Count($formData);$i++){
	if(preg_match('/^(?:[01][0-9]|2[0-3]):[0-5][0-9]$/',$formData[$i]["endTime"])) {
		
		
		
        // $input is valid HH:MM format.
}else {
	
	$message="It's not a valid End Time";
	checkError($message);
	$a=false;
	return $a;
	
	
}
	
	
	}	
	
}

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
				$overlap ="error over lap time";
				checkError($overlap);
					//header("location:timesheet3.php");
				}
			}
		}
	}
}
	
	?>