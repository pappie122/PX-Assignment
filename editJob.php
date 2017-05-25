<?php
include("config.php");
session_start();

if(isset($_POST['submit']))
{
  // include("config.php");
  // session_start();
  $user = mysqli_real_escape_string($conn, $_POST['user']);
  $job = mysqli_real_escape_string($conn, $_POST['job']);
  $jobName = mysqli_real_escape_string($conn, $_POST['JobName']);

  // $query = "INSERT  INTO userjob (UserID, JobID, UserJobStatus) VALUES
  //                               ('$user', '$job', '1')";
	// $result = mysql_query ($query)or die(mysql_error());
  //
  // if($result)
	// {
	// echo "SUCCESSFULLY ASSIGNED JOB...";
	// }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Assign Job</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <!-- <nav class="navbar navbar-default"> -->
     <?php include("nav.php");?>
    <!-- <div class="col-xs-12 col-md-6 col-lg-3">First Name: </div>
    <div class="col-xs-12 col-md-6 col-lg-9"><input type="text" name="firstName" placeholder="First Name"></div> -->
    <div class="container">
      <form action="editJobFormPopulate.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Job:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <?php
                  $sql=mysqli_query($conn,"SELECT JobID, JobName FROM job");
                  if(mysqli_num_rows($sql)){
                    $select= '<select id="job" name="job" class="form-control">';
                    while($rs=mysqli_fetch_array($sql)){
                      $select.='<option value="'.$rs['JobID'].'">'.$rs['JobName'].'</option>';
                    }
                  }
                  $select.='</select>';
                  echo $select;
                 ?>
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
