<?php
include("config.php");

session_start();

echo 'Welcome to Admin Homepage<br />'; //testing purposes
echo $_SESSION['login_user']; //testing purposes
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search User/ Admin</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
          <a href="#" class="navbar-brand">UAE TIMESHEET</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-nav-demo">
          <ul class="nav navbar-nav">
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="editAdmin.php">Edit User Details</a></li>
            <li><a href="registration.php">Register User</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <form action="seacrhUserAdminPopulate.php" method="post">
    Search: <input type="email" name="search" placeholder="Enter Email" required> <br><br>
    <input class="btn btn-primary" type="submit"  value="submit">
  </form>
  <form action="editAdmin.php" method="post">
    <input class="btn btn-primary" type="submit" name="submit" value="Go Back">
  </form>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
