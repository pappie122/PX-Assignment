<?php
include("config.php");

session_start();

echo 'Welcome to User Homepage<br />'; //testing purposes
echo $_SESSION['login_user']; //testing purposes

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
$query = mysqli_query($conn,$data) or die("Couldn't execute query. ". mysqli_error($conn));

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit User</title>
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
    First Name: <?php echo $firstName?><br>
    Last Name: <?php echo $lastName?><br>
    Telephone: <?php echo $telephone?><br>
    Address: <?php echo $address?><br>
    city: <?php echo $city?><br>
    Postcode: <?php echo $postcode?><br>
    Email: <?php echo $email?><br>
    <form action="editUserAdminPopulate.php" method="post">
      <input class="btn btn-primary" type="submit" name="submit" value="Go Back">
    </form>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
