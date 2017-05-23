<?php
include("config.php");
session_start();
$u= $_SESSION["userId"];
if(isset($_SESSION['login_user'])){
  // echo "Your session is running " . $_SESSION['login_user'];
  $email = $_SESSION['login_user'];


echo $u;
  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
  $data2 = mysqli_fetch_array($query);
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">UEA TIMESHEET</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-nav-demo">
        <ul class="nav navbar-nav">
          <!-- <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li> -->
		  
		 
        </ul>
	
        <ul class="nav navbar-nav navbar-right">
          <li><a href="assignJob.php">Assign Job</a></li>
		  
          <li><a href="addJob.php">Add Job</a></li>
          <li><a href="editAdmin.php">Edit User Details</a></li>
          <li><a href="registration.php">Register User</a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-3" style="text-align:center;">Welcome, <?php echo @$data2[Fname]?> </h1>
      <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> -->
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
