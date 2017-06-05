<?php
include("config.php");
session_start();

	$id = $_SESSION['uid'];
	$ts = $_SESSION['tsid'];
 
 echo $id;
 echo '   '.$ts;
 
if(isset($_SESSION['login_user'])){
  // echo "Your session is running " . $_SESSION['login_user'];
  $email = $_SESSION['login_user'];

  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
  $data2 = mysqli_fetch_array($query);
} else {
			header("location: login.php");
	}

//process timesheet button action
	if(isset($_POST['processtimesheet'])){
	
		
		$tsid = $_POST["timesheetid"]; 
		$msg = $_POST["msg"];
		$act = $_POST["action"];
		$emailadd = $_POST["emailaddress"];
		$admin = $email;
					
					
		if (empty($msg)&&($act == "none")){
			
				echo "<script type='text/javascript'>alert('Please complete all fields.')</script>";
				
			} else if (!empty($msg)&&($act == "none")){
				
				echo "<script type='text/javascript'>alert('Please select an action.')</script>";
				
				} else if ((empty($msg))&&($act == ("none")||("3")||("1"))){
					
					echo "<script type='text/javascript'>alert('Please enter feedback.')</script>";
					
					}else if (!empty($msg)&&($act == "3")){
						
						$approvedate = date('Y-m-d');
						//Get admin ID through session & update ApprovedBy field in database
						
							$sql = "UPDATE timesheet SET timesheetStatus = '$act', ApprovedDate = '$approvedate', ApprovedBy = '$email', Comments = '$msg' WHERE timesheet.TimesheetID = '$tsid'";
							$rs = mysqli_query($conn, $sql)
							or die (mysqli_error($conn));
							
							echo "<script type='text/javascript'>alert('Timesheet has been processed.')</script>";
							
							header('Location: pendingTimesheets.php');
							
						//email function not operational
						
								//$to = "recipient";
								//$subject = "Timesheet Approved";

								//$message = "<b>Your timesheet has been processed and approved.</b>";
								//$message .= "<h1>Timesheet Approved.</h1>";

								//$header = "From:example@email.com \r\n";
								//$retval = mail($to,$subject,$message,$header);
								//if(isset($retval))//change
								//{
								//	echo "<script type='text/javascript'>alert('Confirmation Sent.')</script>";
								//}
								//else
								//{
								//	echo "<script type='text/javascript'>alert('Confirmation Failed.')</script>";
								//}
										
	
						} else if (!empty($msg)&&($act == "1")){
							
							$rejectdate = date('Y-m-d');
														
								$sql = "UPDATE timesheet SET timesheetStatus = '$act', ApprovedDate = '$rejectdate', ApprovedBy = '$email', Comments = '$msg' WHERE timesheet.TimesheetID = '$tsid'";
								$rs = mysqli_query($conn, $sql)
								or die (mysqli_error($conn));
								
							echo "<script type='text/javascript'>alert('Timesheet has been rejected.')</script>";
								
								header('Location: pendingTimesheets.php');
									
					//email function not operational
					
								//$to = "recipient";
								//$subject = "Timesheet Approved";

								//$message = "<b>Your timesheet has been processed and approved.</b>";
								//$message .= "<h1>Timesheet Approved.</h1>";

								//$header = "From:example@email.com \r\n";
								//$retval = mail($to,$subject,$message,$header);
								//if(isset($retval))//change
								//{
								//	echo "<script type='text/javascript'>alert('Confirmation Sent.')</script>";
								//}
								//else
								//{
								//	echo "<script type='text/javascript'>alert('Confirmation Failed.')</script>";
								//}
									
								}
	}


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>pTimesheet</title>

		<link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">

</head>
<body>
	<?php include("nav.php");?>
	<div class="container">
    
	<?php 
	//view timesheet details
	
	$sql = "SELECT Email, TsDetailID, timesheetdetail.TimesheetID, timesheetdetail.JobID, job.JobName, timesheetdetail.Date, StartTime, EndTime, BreakDuration, timesheetdetail.TotalHours, timesheetdetail.Comments FROM timesheetdetail 
			INNER JOIN timesheet ON timesheetdetail.TimesheetID = timesheet.TimesheetID	
			INNER JOIN job ON timesheetdetail.JobID = job.JobID
			INNER JOIN user ON timesheet.UserID = user.UserID
			WHERE (timesheetdetail.TimesheetID='$ts')"; 
			
			$rs3 = mysqli_query($conn, $sql)
			or die (mysqli_error($conn));
			
				
				if (mysqli_num_rows($rs3)> 0 ) { ?>
				
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				
					<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	
					
						<!-- Create Table -->
						<table class="table table-hover" id="tab_logic">
						
							<tr>
								<th bgcolor="lightblue">Job Name</th>
								<th bgcolor="lightblue">Date</th>
								<th bgcolor="lightblue">Start Time</th>
								<th bgcolor="lightblue">End Time</th>
								<th bgcolor="lightblue">Break</th>
								<th bgcolor="lightblue">Hours</th>
								<th bgcolor="lightblue">Comments</th>
							</tr>
		  <?php
						// fetch data while results > 0
						
						while ($row = mysqli_fetch_array($rs3)) { ?>
						
						<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
							
							<tr>
								<td><?php echo $row["JobName"]?></td>
									<?php //Change format of date
										$changeDate = $row["Date"];
										$newDate=date("d/m/Y", strtotime($changeDate));
									?>
								<td><?php echo $newDate?></td>
								<td><?php echo $row["StartTime"]?></td>
								<td><?php echo $row["EndTime"]?></td>
								<td><?php echo $row["BreakDuration"]?></td>
								<td><?php echo $row["TotalHours"]?></td>
								<td><?php echo $row["Comments"]?></td>
								<?php echo "<td>" . "<input type=hidden name=emailaddress value=" . $row['Email'] . " </td>";?>
								<?php echo "<td>" . "<input type=hidden name=timesheetid value=" . $row['TimesheetID'] . " </td>";?>		
							</tr>				
						<?php } ?> 
									
							</table>
							
								
								<h4> Enter Feedback </h4>
									<p><textarea name="msg" ></textarea></p>
									
								<h4> Choose Action </h4>
									<p><select name="action"> 
											<option value="none" select="selected">  </option>
											<option value="3"> Approve </option>											
											<option value="1"> Reject </option>
									</select></p>
									
								<p><input name="processtimesheet" type="submit" value="Apply Changes"/></p>
									
						</form>	
																																								
				<?php } ?>
						
				  
	  
	
    </div>
							
			<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
