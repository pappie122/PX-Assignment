<?php
include("config.php");

session_start();

echo "USER DETAILS UPDATED SUCCESSFULLY...";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$data = "UPDATE user SET Fname='$firstName', Lname='$lastName', Phone='$telephone',
                         Street='$address', City='$city', Postcode='$postcode'
                         WHERE Email=".'"'.$email.'"';
$query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());



// $password = $_POST['password'];
// $confirmPassword = $_POST['confirmPassword'];
// $data = "UPDATE user SET Fname='$firstName', Lname='$lastName', Phone='$telephone',
//                          Street='$address', City='$city', Postcode='$postcode', Password='$password'
//                          WHERE Email=".'"'.$email.'"';
// $query = mysql_query($data) or die("Couldn't execute query. ". mysql_error());
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Admin</title>
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
          <a href="admin_page.php" class="navbar-brand">UEA TIMESHEET</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-nav-demo">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="assignJob.php">Assign Job</a></li>
            <li><a href="addJob.php">Add Job</a></li>
            <li><a href="registration.php">Register User</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <!-- <form action="registration.php" method="post"> -->
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                <strong>First Name: </strong>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <?php echo $firstName?>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                <strong>Last Name: </strong>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <?php echo $lastName?>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                <strong>Telephone: </strong>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <?php echo $telephone?>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                <strong>City: </strong>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
              <?php echo $city?>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                <strong>Postcode: </strong>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <?php echo $postcode?>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                <strong>Email: </strong>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <?php echo $email?>
              </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
