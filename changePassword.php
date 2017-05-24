<?php
include("config.php");

session_start();

$email = $_SESSION['login_user'];

$data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
$query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysql_error());

function ChangePassword()
{
  $password =  $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  $data = "UPDATE user SET Password=$password
                           WHERE Email=".'"'.$email.'"';
  $result = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());

  if($result)
	{
	   echo "YOUR PASSWORD HAS SUCCESSFULLY BEEN CHANGED...";
	    header("location:user_page.php");
	}
}

if(isset($_POST['submit'])){
  if ($_POST['password'] == $_POST['confirmPassword'])
  {
      include("config.php");
      session_start();
      ChangePassword();
  }
  else
  {
    echo "Password's do not match";
  }
}

//$data2 = mysqli_fetch_array($query);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>User Page</title>
 		<link rel="stylesheet"
     href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet"
     href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="index.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
 			<?php include("nav.php");?>
      <div class="container">
         <form action="user_page.php" method="post">
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
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
         </form>
      </div>
   <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
 </html>
