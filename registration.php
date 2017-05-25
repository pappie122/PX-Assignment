<?php
include("config.php");
function NewUser()
{
  include("config.php");
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $telephone = $_POST['telephone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $postcode = $_POST['postcode'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $password =  $_POST['password'];

  $confirmPassword = $_POST['confirmPassword'];
  $role = $_POST['adminAccount'];
	$query = "INSERT INTO user (AccountStatus, City, Email, Fname, Gender, Lname,
                                Password, Phone, Postcode, Role, Street) VALUES
                                ('1', '$city', '$email', '$firstName', '$gender',
                                '$lastName', '$password', '$telephone', '$postcode',
                                '$role', '$address')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

	if($result)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	header("location:user_page.php");
	}
}

function SignUp()
{
include("config.php");
if(!empty($_POST['email']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$data = "SELECT * FROM user WHERE Email = '$_POST[email]' AND Password = '$_POST[password]'";
  $query = mysqli_query($conn, $data) or die(mysqli_error());
  // $row = mysqli_fetch_array($conn, $query) or die(mysqli_error());
	if(!$row = mysqli_fetch_array($conn, $query) or die(mysqli_error()))
	{
		NewUser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit'])){
if ($_POST['password'] == $_POST['confirmPassword'])
{
  if(isset($_POST['submit']))
  {
    include("config.php");
    session_start();
    SignUp();
  }
}
else
{
  echo "Password's do not match";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="index.css"> -->

  </head>
  <body>

    <!-- <nav class="navbar navbar-default"> -->

      <?php include("nav.php");?>
    <!-- <div class="col-xs-12 col-md-6 col-lg-3">First Name: </div>
    <div class="col-xs-12 col-md-6 col-lg-9"><input type="text" name="firstName" placeholder="First Name"></div> -->
    <div class="container">
      <form action="registration.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                First Name:
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="firstName" placeholder="First Name"
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
                <input type="text" name="lastName" placeholder="Last Name"
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
                <input type="number" name="telephone" placeholder="Telephone"
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
                <input type="text" name="address" placeholder="Address"
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
                <input type="text" name="city" placeholder="City"
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
                pattern="[0-9]{4}" title="Only numbers are allowed and must be 4 digits"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Email:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="email" name="email" placeholder="Email"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Gender:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                  <select name="gender" class="form-control">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                  </select>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Password:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="password" name="password" placeholder="Password"
                pattern="[0-9A-Za-z]{1-32}" title="Letters, numbers are allowed and cant exceed more than 32 characters"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Confirm Password:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="password" name="confirmPassword" placeholder="Confirm Password"
                pattern="[0-9A-Za-z]{1-32}" title="Letters, numbers are allowed and cant exceed more than 32 characters"
                class="form-control" required>
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Admin Account:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                  <select name="adminAccount" class="form-control">
                  <option value="0">IS USER</option>
                  <option value="1">IS ADMIN</option>
                  </select>
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
