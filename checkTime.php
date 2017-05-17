
<?php

function checkOverlap($formData){

	for($i = 0; $i < count($formData); $i++){
	//$row["date"][$i];

		for($j = $i+1; $j < count($formData); $j ++){
			if($formData[$i]["date"] == $formData[$j]["date"]) {
				if($formData[$i]["startTime"]>=$formData[$j]["endTime"]&&$formData[$i]["endTime"]<=$formData[$j]["startTime"]&&$formData[$i]["startTime"]<$formData[$i]["endTime"]){
					echo "Success";
				}else {
					echo "error over lap time";
				}
			}
		}

	}
}
	?>
 