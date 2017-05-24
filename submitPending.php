<?php
include ("db.php");
	$id=$_GET["id"];
$sql5="UPDATE timesheet SET TimesheetStatus=2  WHERE TimesheetID=$id";
$update1 = mysqli_query($conn, $sql5);
	
				
				
				if (!$update1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
			
		}
			
			header("location:editTime.php");	
			
			


?>