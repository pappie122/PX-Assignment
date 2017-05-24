<?php
include("config.php");

session_start();

$email = $_SESSION['login_user'];

$data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
$query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
$data2 = mysqli_fetch_array($query);
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
      <form action="editAdminFormUpdate.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                First Name:
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="firstName"
                value="<?php echo @$data2[Fname]?>" placeholder="First Name"
                pattern="[A-Za-z]{1-32}" title="Only letters are allowed and cant exceed more than 32 letters"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Last Name:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="lastName"
                value="<?php echo @$data2[Lname]?>" placeholder="Last Name"
                pattern="[A-Za-z]{1-32}" title="Only letters are allowed and cant exceed more than 32 letters"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Telephone:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="number" name="telephone"
                value="<?php echo @$data2[Phone]?>" placeholder="Telephone"
                pattern="[0-9]{10}" title="Only numbers are allowed and cant exceed more than 10 numbers"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Address:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="address"
                value="<?php echo @$data2[Street]?>" placeholder="Address"
                pattern="[0-9A-Za-z]{1-32}" title="Letters, numbers are allowed and cant exceed more than 32 characters"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                City:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="city"
                value="<?php echo @$data2[City]?>" placeholder="City"
                pattern="[A-Za-z]{1-32}" title="Only letters are allowed and cant exceed more than 32 letters"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Postcode:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="number" name="postcode" placeholder="Postcode"
                value="<?php echo @$data2[Postcode]?>" pattern="[0-9]{4}" title="Only numbers are allowed and must be 4 digits"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Email:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="email" name="email"
                 placeholder="Email"
                value="<?php echo @$data2[Email]?>"
                class="form-control" required>
              </div>
        </div>
        <br>
      <input class="btn btn-primary" type="submit" name="submit" value="Submit">
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>
