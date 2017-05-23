<?php
include("config.php");
session_start();

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
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  </head>
  <body>
    <nav class="navbar navbar-default">
	<?php include("nav.php");?>
     
      
    <div class="container">
      <form action="editUserFormPopulate.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                First Name:
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="firstName" placeholder="First Name"
                >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Last Name:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="lastName" placeholder="Last Name"
                >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Telephone:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="number" name="telephone" placeholder="Telephone"
                >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Address:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="address" placeholder="Address"
                >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                City:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="city" placeholder="City"
                >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Postcode:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="number" name="postcode" placeholder="Postcode"
                >
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Email:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="email" name="email" placeholder="Email"
                >
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
