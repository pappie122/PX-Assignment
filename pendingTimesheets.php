<?php
include("config.php");
session_start();

if(isset($_SESSION['login_user'])){
  // echo "Your session is running " . $_SESSION['login_user'];
  $email = $_SESSION['login_user'];

  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
  $data2 = mysqli_fetch_array($query);
  
} else {
			header("location: login.php");
	}
?>

<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<html lang="en">
	
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
	<!-- <nav class="navbar navbar-default"> -->
	<?php include("nav.php");?>
	
	
	<div class="container">
	<h2>Pending Timesheets </h2>
    <!-- <div class="jumbotron"> -->
	<div class="col-sm-12 text-left">
	<!--<div class="container">-->
		

<?php
	$conn = mysqli_connect($host,$username,$password,$dbname);
	
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
   	

	//view details button action
	if(isset($_POST['viewdetails'])){
		
		
		
		session_start();
		
			$id = $_POST["userid"];
			$_SESSION['uid'] = $id;
			
			$ts = $_POST["timesheetid"];
			$_SESSION['tsid'] = $ts;
			
			header ('location:pTimesheet.php');
	} ?>
 
 <!-- original place to start html doc type 
	nav page -->
			
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
				</div>
				<?php
				
			//if no pending timesheets exist
				} else {
									
									echo "No pending timesheets found!";
								}
				ob_flush();
				flush();
	  
				?>
				
				
			
			
	</div> 
	<!-- </div> -->
	<!-- </div> -->
	
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
        <script>
		$(document).ready(function() {
    		
	
			$('#tab_logic').DataTable({
					
    			"columnDefs": [{
					"targets": 3,
					"orderable": false
				
					},{
					"targets": 5,
					"orderable": false
				}]
    		}); 
		});
		
		
	</script>
	
	</body>
	</html>
