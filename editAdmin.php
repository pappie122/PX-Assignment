<?php
session_start();

echo 'Welcome to Admin Homepage<br />'; //testing purposes
echo $_SESSION['login_user']; //testing purposes
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Admin Details</title>
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
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <form action="editAdminFormPopulate.php" method="post">
    <table>
      <tr>
        <td>First Name: </td>
        <td><input type="text" name="firstName"</tr>

      <tr>
        <td>Last Name: </td>
        <td><input type="text" name="lastName"</td>
      </tr>

      <tr>
        <td>Telephone: </td>
        <td><input type="number" name="telephone"></td>
      </tr>

      <tr>
        <td>Address: </td>
        <td><input type="text" name="address"></td>
      </tr>

      <tr>
        <td>City: </td>
        <td><input type="text" name="city"></td>
      </tr>

      <tr>
        <td>Postcode: </td>
        <td><input type="number" name="postcode"></td>
      </tr>

      <tr>
        <td>Email: </td>
        <td><input type="email" name="email"></td>
      </tr>
    </table>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
  </form>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
