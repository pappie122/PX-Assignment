<?php
include("config.php");

  session_start();
  $job=$_POST['job'];
  $data = 'SELECT * FROM job WHERE JobID = "'.$job.'"';
  $query = mysqli_query($conn,$data) or die("Couldn't execute query. ". mysqli_error($conn));
  $data2 = mysqli_fetch_array($query);

  // function editJob()
  // {
  //   $jobName = $_POST['jobName'];
  //   $startDate = $_POST['startDate'];
  //   $endDate = $_POST['endDate'];
  //   $description = $_POST['description'];
  //
  // 	$query = "UPDATE job (JobName, JobStatus, StartDate, EndDate, Description)
  //             VALUES ('$jobName', '1', '$startDate', '$endDate', '$description')";
  // 	$result = mysqli_query ($conn, $query)or die(mysqli_error($conn));
  //
  // 	if($result)
  // 	{
  // 	echo "NEW JOB SUCCESSFULLY UPDATED...";
  // 	}
  // }
  //
  // if(isset($_POST['submit']))
  // {
  //
  // }
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
    <nav class="navbar navbar-default">
     <?php include("nav.php");?>
    <div class="container">
      <form action="editJobFormUpdate.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Job Name:
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <input class="form-control" type="text" name="jobName"value="<?php echo @$data2[JobName]?>" >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Start Date:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <?php
				$startDate= date('Y-m-d',strtotime($data2["StartDate"]));  
                  //$changeRow1 = @$data2[StartDate];
                 //$startDate = date("Y/m/d", strtotime($changeRow1));
                 ?>
                <input class="form-control" type="date" name="startDate"value="<?php echo $startDate;?>" >
              </div>
        </div>
        <br>
		
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                End Date:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <?php
                 // $changeRow2 = @$data2[EndDate];
                  //$endDate = date("d/m/Y", strtotime($changeRow2));
$endDate= date('Y-m-d',strtotime($data2["EndDate"]));  
				  
                 ?>
                <input class="form-control" type="date" name="endDate"value="<?php echo $endDate?>" >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Description:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <!-- <input type="text" name="description" placeholder="Description" class="form-control"> -->
                 <input class="form-control" type="text" name="description"value="<?php echo @$data2[Description]?>" >
              </div>
        </div>
        <br>
      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    </form>
  </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>
