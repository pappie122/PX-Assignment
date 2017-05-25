<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Pending timesheets</title>
		<link rel="stylesheet" 
		href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	</head>
	<body>
	   <h1> Pending timesheets </h1>
	   
	 
		<div class="container">
		<!-- <div class="col-xs-9.5"> -->

<?php
include("db.php");


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
    
 //if ($_SERVER["REQUEST_METHOD"] == "POST"){
//if view details button is set show detials of selected timesheet

	
	
	
//process timesheet button action
	if(isset($_POST['processtimesheet'])){
		
		$tsid = $_POST["timesheetid"]; 
		$msg = $_POST["msg"];
		$act = $_POST["action"];
		$emailadd = $_POST["emailaddress"];
		
					
					
		if (empty($msg)&&($act == "none")){
			
				echo "<script type='text/javascript'>alert('Please complete all fields.')</script>";
				
			} else if (!empty($msg)&&($act == "none")){
			
				echo "<script type='text/javascript'>alert('Please select an action.')</script>";
				
				} else if ((empty($msg))&&($act == ("none")||("2")||("0"))){
				
					echo "<script type='text/javascript'>alert('Please enter feedback.')</script>";
					
					}else if (!empty($msg)&&($act == "2")){
						
						
						$approvedate = date('Y-m-d');
						//Get admin ID through session & update ApprovedBy field in database
						
						
							$sql = "UPDATE timesheet SET timesheetStatus = '$act', ProcessedDate = '$approvedate', Comments = '$msg' WHERE timesheet.TimesheetID = '$tsid'";
							$rs = mysqli_query($conn, $sql)
							or die (mysqli_error($conn));
							
							//Email information
								//$admin_email = "xmkayz@gmail.com";
								//$to = $emailadd;
								//$subject = "Timesheet approved";
								//$comment = $msg;
								//$headers = 'From: timesheet@uea.com.au' . "\r\n" .
											'Reply-To: timesheet@uea.com.au';
									
							//send email
								//mail(to,subject,message,headers,parameters);
								//mail($to, $subject, $comment);
																
								//echo "<script type='text/javascript'>alert('Timesheet has been approved.')</script>";
								
								$to = "mr.kay@live.com.au";
								$subject = "Timesheet Approved";

								$message = "<b>Your timesheet has been processed and approved.</b>";
								$message .= "<h1>Timesheet Approved.</h1>";

								$header = "From:xmkayz@gmail.com \r\n";
								$retval = mail($to,$subject,$message,$header);
								if(isset($retval))//change
								{
									echo "<script type='text/javascript'>alert('Confirmation Sent.')</script>";
								}
								else
								{
									echo "<script type='text/javascript'>alert('Confirmation Failed.')</script>";
								}
										
							
						} else if (!empty($msg)&&($act == "0")){
							
							$rejectdate = date('Y-m-d');
							//Get admin ID through session & update ApprovedBy field in database
							
								$sql = "UPDATE timesheet SET timesheetStatus = '$act', ProcessedDate = '$rejectdate' WHERE timesheet.TimesheetID = '$tsid'";
								$rs = mysqli_query($conn, $sql)
								or die (mysqli_error($conn));
								
									echo "<script type='text/javascript'>alert('Timesheet has been rejected.')</script>";
									
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
								
									<p><textarea name="msg" placeholder="Type your text here..."></textarea></p>
									
									<label>Action</label>
									
									<p><select name="action"> 
											<option value="none" select="selected">  </option>
											<option value="2"> Approve </option>
											<option value="0"> Reject </option>
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
			//$sql = "SELECT * FROM timesheet WHERE TimesheetStatus = 1";
			$sql = "SELECT CONCAT (Fname,' ', Lname) AS Fullname, Email,DateCreated,DateSubmitted,TimesheetStatus,TotalHours,Comments,ProcessedDate,ProcessedBy,timesheet.UserID,TimesheetID FROM timesheet INNER JOIN
			user on timesheet.UserID = user.UserID WHERE TimesheetStatus = 1";
			$rs = mysqli_query($conn, $sql)
			or die (mysqli_error($conn));
				
				//if results > 0 create table
				if (mysqli_num_rows($rs)> 0 ) { ?>
					
					<table class="table table-hover"> <!-- border="1" style="width:100%"--> 
					
						<tr>
						<!--<th bgcolor="lightblue">TimesheetID </th>-->
						<!--<th bgcolor="lightblue">User ID</th>-->
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
								<!--<td><?php// echo $row["TimesheetID"]?></td>-->
								<!--<td><?php //echo $row["UserID"]?></td>-->
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
											if ($changeTs == 1){
												$newTs = "Pending";	
											} ?>
								<!-- echo changed timesheet status -->			
								<td><?php echo $newTs?></td>
								<td><?php echo $row["TotalHours"]?></td>
								<td><?php echo $row["Comments"]?></td>
								
									<?php 
									if(!$row["ProcessedDate"]==null){
									//format new date and if null echo nothing	
										$changeRow3 = $row["ProcessedDate"];
										$newAd=date("d/m/Y", strtotime($changeRow3));  
										?>
									<td><?php echo $newAd?></td>
										
									<?php } else { ?>
										<!-- echo relevant approved date -->
										<td><?php echo $row["ProcessedDate"];?></td>	
									<?php } ?>
									
									
											<?php 
												//if processed by not populated echo nothing
												if(!$row["ProcessedBy"]==null){	
												$processedby = $row["ProcessedBy"];
												?>
													
													<td><?php echo $processedby?></td>
													
												<?php } else { ?>
											
													<td><?php echo $row["ProcessedBy"]?></td>
												
													<?php }  ?>
								
								
								<!-- hidden field to pass UserID & TimesheetID-->
								<?php echo "<td>" . "<input type=hidden name=userid value=" . $row['UserID'] . " </td>";?>
								<?php echo "<td>" . "<input type=hidden name=timesheetid value=" . $row['TimesheetID'] . " </td>";?>
								<!-- <input type="hidden" name="id" value="" /> -->
												
								<!--form submits to server -->
								<td>
									<!-- <form  method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
									<input type="submit" name="viewdetails" value="view details" />
									<!--</form>-->
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
	</body>
	</html>
  <?php } ?>
