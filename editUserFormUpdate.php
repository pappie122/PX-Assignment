<?php
include("config.php");

session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];

$data = "UPDATE user SET Fname='$firstName', Lname='$lastName', Phone='$telephone',
                         Street='$address', City='$city', Postcode=$postcode
                         WHERE Email=".'"'.$email.'"';
$query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit User</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <!-- <nav class="navbar navbar-default"> -->
      <?php include("nav.php");?>
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
