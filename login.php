<?php
if(isset($_POST['submit']))
{
	include("db.php");

  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  $_SESSION['login_user'] = $username;
  // $activeAdmin = mysqli_query("SELECT * FROM user WHERE Email='$username' AND
  //                Password='$password' AND AccountStatus = '1' AND Role = '1'");
  // $nonActiveAdmin = mysqli_query("SELECT * FROM user WHERE Email='$username' AND
  //                Password='$password' AND AccountStatus = '0' AND Role = '1'");
  // $activeUser = mysqli_query("SELECT * FROM user WHERE Email='$username' AND
  //                Password='$password' AND AccountStatus = '1' AND Role = '0'");
  // $nonActiveUser = mysqli_query("SELECT * FROM user WHERE Email='$username' AND
  //                Password='$password' AND AccountStatus = '0' AND Role = '0'");

  $getuserId= "SELECT * FROM user WHERE Email='$username' AND
               Password='$password'";

			  $r=mysqli_query($conn,$getuserId)or die("Couldn't execute query. ". mysqli_error($conn));
				while($row=mysqli_fetch_array($r)){
	$userId=$row["UserID"];
	$_SESSION["userId"]=$userId;


				}



$activeAdmin = "SELECT * FROM user WHERE Email='$username' AND
               Password='$password' AND AccountStatus = '1' AND Role = '1'";
$nonActiveAdmin = "SELECT * FROM user WHERE Email='$username' AND
               Password='$password' AND AccountStatus = '0' AND Role = '1'";
$activeUser = "SELECT * FROM user WHERE Email='$username' AND
               Password='$password' AND AccountStatus = '1' AND Role = '0'";
$nonActiveUser = "SELECT * FROM user WHERE Email='$username' AND
               Password='$password' AND AccountStatus = '0' AND Role = '0'";



$activeAdmin_query = mysqli_query($conn, $activeAdmin);




$nonActiveAdmin_query = mysqli_query($conn, $nonActiveAdmin);
$activeUser_query = mysqli_query($conn, $activeUser);




$nonActiveUser_query = mysqli_query($conn, $nonActiveUser);

  if(mysqli_num_rows($activeAdmin_query) != 0)
  {
    header("Location: user_page.php");
  }

  else if(mysqli_num_rows($activeUser_query) != 0)
  {
    header("Location: user_page.php");
  }

  else if(mysqli_num_rows($nonActiveAdmin_query) != 0)
  {
    //echo "This Account has been deactivated, please speak with your admininstrator";
	echo "<script type='text/javascript'>alert('This Account has been deactivated, please speak with your admininstrator')</script>";
  }

  else if(mysqli_num_rows($nonActiveUser_query) != 0)
  {
    //echo "This Account has been deactivated, please speak with your admininstrator";
	echo "<script type='text/javascript'>alert('This Account has been deactivated, please speak with your admininstrator')</script>";
  }

  else {
    //echo "Username or Password is incorrect";
	echo "<script type='text/javascript'>alert('Username or Password is incorrect')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
  <a href="#"></a>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h2> UEA TRENCHLESS TIMESHEET</h2>
            </div>
            <form action="login.php" method="post">
            <div class="form-group">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <label for="username">Email Address:</label>
                </div>
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <input type="text" name="username" class="form-control"
                    placeholder="Email Address"required="username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <label for="password">Password:</label>
                </div>
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <input type="password" name="password" class="form-control"
                    placeholder="Password" required="password">
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </div>
            </form>
        </div>
    </div>
</body>
</html>
