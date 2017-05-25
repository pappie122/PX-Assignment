<?php
include("config.php");
function NewJob()
{
  include("config.php");
  $jobName = $_POST['jobName'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $description = $_POST['description'];

	$query = "INSERT INTO job (JobName, JobStatus, StartDate, EndDate, Description)
            VALUES ('$jobName', '1', '$startDate', '$endDate', '$description')";
	$result = mysqli_query($conn, $query) or die(mysqli_error());

	if($result)
	{
	echo "NEW JOB SUCCESSFULLY ADDED...";
	}
}

if(isset($_POST['submit']))
{
  include("config.php");
  session_start();
  NewJob();
}


// function AddJob()
// {
//   if(!empty($_POST['JobName']))
//   {
// 	   $query = mysql_query("SELECT * FROM job WHERE JobName = '$_POST[jobName]'") or die(mysql_error());
//
// 	    if(!$row = mysql_fetch_array($query) or die(mysql_error()))
// 	     {
// 		       NewJob();
// 	     }
// 	      else
// 	     {
// 		       echo "THAT JOB IS ALREADY ADDED...";
// 	     }
//      }
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Job</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="index.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- <nav class="navbar navbar-default"> -->
     <?php include("nav.php");?>
    <!-- <div class="col-xs-12 col-md-6 col-lg-3">First Name: </div>
    <div class="col-xs-12 col-md-6 col-lg-9"><input type="text" name="firstName" placeholder="First Name"></div> -->
    <div class="container">
      <form action="addJob.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Job Name:
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="jobName" placeholder="Job Name" class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Start Date:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="date" name="startDate" placeholder="Start Date" class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                End Date:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="date" name="endDate" placeholder="End Date" class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Description:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <!-- <input type="text" name="description" placeholder="Description" class="form-control"> -->
                 <textarea class="form-control" name="description" id="exampleTextarea" rows="3" placeholder="Description" required></textarea>
              </div>
        </div>
        <br>
      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    </form>
  </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
