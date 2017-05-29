<?php
include("config.php");

session_start();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search User/ Admin</title>
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
  <!--   <nav class="navbar navbar-default"> -->
     <?php include("nav.php"); ?>
     <div class="container">
      <form action="seacrhUserAdminPopulate.php" method="post">
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-3">
            <strong>Search:</strong> <input type="email" name="search" placeholder="Enter Email"  class="form-control" required> <br>
          </div>
        </div>
        
      <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
          <input class="btn btn-primary" type="submit"  value="submit">
        </div>
      </div>
    </form>
    </div>
    <form action="editAdmin.php" method="post">
      
    </form>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
