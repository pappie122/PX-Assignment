<?php
function NewUser()
{
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
	$query = "INSERT INTO user (AccountStatus, City, Email, Fname, Gender, Lname,
                                Password, Phone, Postcode, Role, Street) VALUES
                                ('1', '$city', '$email', '$firstName', '$gender',
                                '$lastName', '$password', '$telehone', '$postcode',
                                '0', '$address')";
	$result = mysql_query ($query)or die(mysql_error());

	if($result)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
}

function SignUp()
{
if(!empty($email))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM user WHERE Email = '$email' AND Password = '$password'") or die(mysql_error());

	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		NewUser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
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

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
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
    <form action="registration.php" method="post">
    <table>
      <tr>
        <td>First Name: </td>
        <td><input type="text" name="firstName" placeholder="First Name"
                    pattern="[A-Za-z]{0,32}" title="Can only contain Letters and
                    must not exceed more than 32 letters" required></td>
      </tr>

      <tr>
        <td>Last Name: </td>
        <td><input type="text" name="lastName" placeholder="Last Name"
                   pattern="[A-Za-z]{0,32}" title="Can only contain Letters and
                   must not exceed more than 32 letters" required></td>
      </tr>

      <tr>
        <td>Telephone: </td>
        <td><input type="tel" name="telephone" placeholder="Telephone"
                   pattern="[0-9]{0,10}" title="Can only contain Numbers and
                   must not exceed more than 10 numbers" required></td>
      </tr>

      <tr>
        <td>Address: </td>
        <td><input type="text" name="address" placeholder="Address"
                   pattern="[A-Za-z0-9]{0,32}" title="Can contain Numbers,
                   Letters and must not exceed more than 32 characters" required></td>
      </tr>

      <tr>
        <td>City: </td>
        <td><input type="text" name="city" placeholder="City"
                   pattern="[A-Za-z]{0,32}" title="Can only contain letters" required></td>
      </tr>

      <tr>
        <td>Postcode: </td>
        <td><input type="number" name="postcode" placeholder="Postcode"
                   pattern="[0-9]{0,4}" title="Can only contain Numbers and
                   must not exceed more than 4 numbers" required></td>
      </tr>

      <tr>
        <td>Email: </td>
        <td><input type="email" name="email" placeholder="Email" required></td>
      </tr>

      <tr>
        <td>Gender: </td>
        <td>
          <select name="gender" required>
            <option value=""></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </td>
      </tr>

      <tr>
        <td>Password: </td>
        <td><input type="password" name="password" placeholder="Password" required></td>
      </tr>

      <tr>
        <td>Confirm Password: </td>
        <td><input type="password" name="confirmPassword" placeholder="Confirm Password" required></td>
      </tr>

      <tr>
        <td>Admin Account: </td>
        <td><input type="checkbox" name="adminAccount"></td>
      </tr>
    </table>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
  </form>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
