<?php
if(isset($_POST['submit']))
{
	include("config.php");

  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  $_SESSION['login_user'] = $username;
  $activeAdmin = mysql_query("SELECT * FROM user WHERE Email='$username' AND
                 Password='$password' AND AccountStatus = '1' AND Role = '1'");
  $nonActiveAdmin = mysql_query("SELECT * FROM user WHERE Email='$username' AND
                 Password='$password' AND AccountStatus = '0' AND Role = '1'");
  $activeUser = mysql_query("SELECT * FROM user WHERE Email='$username' AND
                 Password='$password' AND AccountStatus = '1' AND Role = '0'");
  $nonActiveUser = mysql_query("SELECT * FROM user WHERE Email='$username' AND
                 Password='$password' AND AccountStatus = '0' AND Role = '0'");

  if(mysql_num_rows($activeAdmin) != 0)
  {
    header("Location: http://localhost/PX/admin_page.php");
  }

  else if(mysql_num_rows($activeUser) != 0)
  {
    header("Location: http://localhost/PX/user_page.php");
  }

  else if(mysql_num_rows($nonActiveAdmin) != 0)
  {
    echo "This Account has been deactivated, please speak with your admininstrator";
  }

  else if(mysql_num_rows($nonActiveUser) != 0)
  {
    echo "This Account has been deactivated, please speak with your admininstrator";
  }

  else {
    echo "Username or Password is incorrect";
  }



}

// if(isset($_POST['submit'])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $connection = mysqli_connect('localhost', 'root', '', 'px');
//
//     $query = "'SELECT * FROM user WHERE Email='$username' and Password='$password'";
//     $result = mysqli_query($connection, $query);
//

// if ($username == "admin" && $password == "password"){
//     header("Location: http://localhost/PX/admin_page.php");
//     exit;
// }
// else if ($username == "user" && $password == "password"){
//     header("Location: http://localhost/PX/user_page.php");
//     exit;
// }
// else {
//     echo "Username or pasword is incorrect";
// }

// if($connection)
// {
//     echo "We are connected";
// }
// else
// {
//     die("Database connected failed");
// }
//
// $query = "SELECT * FROM user";
// $result = mysqli_query($connection, $query);
// if(!$result)
// {
//     die('Query FAILED' . mysqli_error());
// }

// $sql = "'SELECT * FROM user WHERE Email = '$username' and password='$Password'";
// $result = mysqli_query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <a href="#"></a>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h1> Login Page </h1>
            </div>
            <form action="login.php" method="post">
            <div class="form-group">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <label for="username">Username</label>
                </div>
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <input type="text" name="username" class="form-control" required="username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <label for="password">Password</label>
                </div>
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <input type="password" name="password" class="form-control" required="password">
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
