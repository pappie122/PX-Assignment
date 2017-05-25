<?php
include("config.php");
session_start();

if(isset($_SESSION['login_user'])){
  // echo "Your session is running " . $_SESSION['login_user'];
  $email = $_SESSION['login_user'];

  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
  $data2 = mysqli_fetch_array($query);
}


?>


<!DOCTYPE html>
	<html lang="en">
	<!--<head>
		<meta charset="UTF-8">
		<title>Pending timesheets</title>
		<link rel="stylesheet" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	</head> -->
	<head>
		<meta charset="UTF-8">
		
		<title>Pending timesheets</title>
		
			<link rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="index.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
	</head>
	<body>
	
	  <!-- <h1> Pending timesheets </h1> -->
	<nav class="navbar navbar-default">  
	<?php include("nav.php");?>
	<div class="container">
    <div class="jumbotron">
	
		<!--<div class="container">-->
		

<?php
<<<<<<< HEAD
$conn = mysqli_connect("localhost","root",NULL,"px");
=======
include("db.php");

>>>>>>> dca08e6361b284370a87238d3a40c4a35b3534f0

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
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

	
	
	
	
	
	
	
	
	
	
//view details button action
		  if(isset($_POST['viewdetails'])){
			  				
			 
			$id = $_POST["userid"];
			$ts = $_POST["timesheetid"];
			
						
				
			$sql = "SELECT Email, TsDetailID, timesheetdetail.TimesheetID, timesheetdetail.JobID, job.JobName, timesheetdetail.Date, StartTime, EndTime, BreakDuration, timesheetdetail.TotalHours, timesheetdetail.Comments FROM timesheetdetail 
			INNER JOIN timesheet ON timesheetdetail.TimesheetID = timesheet.TimesheetID	
			INNER JOIN job ON timesheetdetail.JobID = job.JobID
			INNER JOIN user ON timesheet.UserID = user.UserID
			WHERE (timesheetdetail.TimesheetID='$ts')"; 
			
			$rs2 = mysqli_query($conn, $sql)
			or die (mysqli_error($conn));
				
				
				if (mysqli_num_rows($rs2)> 0 ) { ?>
				
					<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	
					
							<!-- Create Table -->
							<table class="table table-hover">
							
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
										while ($row = mysqli_fetch_array($rs2)) { ?>
										
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
							
							
							
								<label>Enter Feedback</label>
								
									<p><textarea name="msg" ></textarea></p>
									
									<label>Action</label>
									
									<p><select name="action"> 
											<option value="none" select="selected">  </option>
											<option value="3"> Approve </option>											
											<option value="1"> Reject </option>
	
											
									</select></p>
									
									<p><input name="processtimesheet" type="submit" value="Apply Changes"/></p>
									
								</form>	
								
									
									
									
								
			<?php } else {
							echo "no timesheet details available";
						} 
						
				ob_flush();
				flush();
		
//if view detials button not selected display pending timesheets
	} else { ?>
 
 
 
 
 <!-- original place to start html doc type -->

	
		
			
	<?php		

			$sql = "SELECT CONCAT (Fname,' ', Lname) AS Fullname, Email,DateCreated,DateSubmitted,TimesheetStatus,TotalHours,Comments,ApprovedDate,ApprovedBy,timesheet.UserID,TimesheetID FROM timesheet INNER JOIN
			user on timesheet.UserID = user.UserID WHERE TimesheetStatus = 2";
			$rs = mysqli_query($conn, $sql)
			or die (mysqli_error($conn));
				
				//if results > 0 create table
				if (mysqli_num_rows($rs)> 0 ) { ?>
					
					<table class="table table-hover"> <!-- border="1" style="width:100%"--> 
					
						<tr>
						
						<th bgcolor="lightblue">Fullname</th>
						<th bgcolor="lightblue">Email</th>
						<th bgcolor="lightblue">Created </th>
						<th bgcolor="lightblue">Submitted</th>
						<th bgcolor="lightblue">Status </th>
						<th bgcolor="lightblue">Total hours</th>
						<th bgcolor="lightblue">Admin Comments </th>
						<th bgcolor="lightblue">Processed Date</th>
						<th bgcolor="lightblue">Processed By</th>
						</tr>

	<?php
				// fetch data while results > 0
				while ($row = mysqli_fetch_array($rs)) { ?>
				
					<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<tr>
								
								<td><?php echo $row["Fullname"]?></td>
								<td><?php echo $row["Email"]?></td>
								
									<?php 
										$changeRow1 = $row["DateCreated"];
										$newDc=date("d/m/Y", strtotime($changeRow1));
									?>
								<!-- echo formatted date -->	
								<td><?php echo $newDc?></td>
														
									<?php 
										$changeRow2 = $row["DateSubmitted"];
										$newDs=date("d/m/Y", strtotime($changeRow2));
									?>
								<!-- echo formatted date -->	
								<td><?php echo $newDs?> </td>
								
										<?php 
										//if timesheet status = 1 set status to pending
	
										$changeTs = $row["TimesheetStatus"];
										// echo $row["TimesheetStatus"]
											if ($changeTs == 2){
												$newTs = "Pending";	
											} ?>
								<!-- echo changed timesheet status -->			
								<td><?php echo $newTs?></td>
								<td><?php echo $row["TotalHours"]?></td>
								<td><?php echo $row["Comments"]?></td>
								
									<?php 
									if(!$row["ApprovedDate"]==null){
									//format new date and if null echo nothing	
										$changeRow3 = $row["ApprovedDate"];
										$newAd=date("d/m/Y", strtotime($changeRow3));  
										?>
									<td><?php echo $newAd?></td>
										
									<?php } else { ?>
										<!-- echo relevant approved date -->
										<td><?php echo $row["ApprovedDate"];?></td>	
									<?php } ?>
									
									
											<?php 
												//if processed by not populated echo nothing
												if(!$row["ApprovedBy"]==null){	
												$ApprovedBy = $row["ApprovedBy"];
												?>
													
													<td><?php echo $ApprovedBy?></td>
													
												<?php } else { ?>
											
													<td><?php echo $row["ApprovedBy"]?></td>
												
													<?php }  ?>
								
								
								<!-- hidden field to pass UserID & TimesheetID -->
								<?php echo "<td>" . "<input type=hidden name=userid value=" . $row['UserID'] . " </td>";?>
								<?php echo "<td>" . "<input type=hidden name=timesheetid value=" . $row['TimesheetID'] . " </td>";?>
								<!-- <input type="hidden" name="id" value="" /> -->
												
								<!-- form submits to server -->
								<td>
									<!-- <form  method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
									<input type="submit" name="viewdetails" value="view details" />
									<!-- </form> -->
								</td>

							</tr>
					</form>
				
				<?php } ?>
				</table>
				<?php
				
			//if no pending timesheets exist
				} else {
									
									echo "No pending timesheets found!";
								}
				ob_flush();
				flush();
	  
				?>
				
				
			
			
		<!-- </div> -->
		
	</div>
	</div>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
	</body>
	</html>
  <?php } ?>
