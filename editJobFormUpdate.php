<?php
include("config.php");
session_start();
if(isset($_SESSION['login_user'])){
	
	$email = $_SESSION['login_user'];

	  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
	  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
	  $data2 = mysqli_fetch_array($query);
	  
	} else {
			header("location: login.php");
	}
	
  if(isset($_POST['submit']))
  {
    //$job=$_POST['job'];
    $jobName = $_POST['jobName'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	$description = $_POST['description'];
	
		//Change format of date
		$startDateVariable = $startDate;
		$newStartDate= str_replace('/', '-', $startDateVariable);
		$newSD = date("Y-m-d", strtotime($newStartDate));
  
		//Change format of date
		$endDateVariable = $endDate;
		$newEndDate= str_replace('/', '-', $endDateVariable);
		$newED = date("Y-m-d", strtotime($newEndDate));
		
  	$query = "UPDATE job SET JobStatus = 1, StartDate='$newSD',
              EndDate='$newED', Description='$description'
              WHERE JobName=".'"'.$jobName.'"';
			  
			  
  	$result = mysqli_query ($conn, $query)or die(mysqli_error($conn));

  	if($result)
  	{
  	  // echo "<script type='text/javascript'>alert('Job information has now been updated.')</script>";
  	}
  }

 ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Edit Job</title>
      <link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
  <body>
      <?php include("nav.php");?>
      <div class="container">
        <!-- <form action="registration.php" method="post"> -->
          <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3">
                  <strong>Job Name: </strong>
                </div>
                  <div class="col-xs-12 col-md-6 col-lg-3">
                  <?php echo $jobName?>
                </div>
          </div>
          <br>
          <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3">
                  <strong>Start Date: </strong>
                </div>
                  <div class="col-xs-12 col-md-6 col-lg-3">
                  <?php echo $startDate?>
                </div>
          </div>
          <br>
          <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3">
                  <strong>End Date: </strong>
                </div>
                  <div class="col-xs-12 col-md-6 col-lg-3">
                  <?php echo $endDate?>
                </div>
          </div>
          <br>
          <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3">
                  <strong>Description: </strong>
                </div>
                  <div class="col-xs-12 col-md-6 col-lg-3">
                <?php echo $description?>
                </div>
          </div>
		  <br>
          <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-3">
                  <strong>Data Entered: </strong>
                </div>
                  <div class="col-xs-12 col-md-6 col-lg-3">
                  <?php echo "succesfull";?>
                </div>
          </div>
          
        </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>
