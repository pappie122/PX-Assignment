<?php
include("config.php");
session_start();


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Admin Details</title>
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
      <form action="editAdminFormPopulate.php" method="post">
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
