<?php
include("config.php");
session_start();

if(isset($_SESSION['login_user'])){
  // echo "Your session is running " . $_SESSION['login_user'];
  $email = $_SESSION['login_user'];

  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
  $data2 = mysqli_fetch_array($query);
}
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">

</head>
<body>



			<?php include("nav.php");?>
	<div class="container">
    <div class="jumbotron">
      <h1 class="display-3" style="text-align:center;">Welcome, <?php echo @$data2[Fname]?> </h1>
      <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> -->
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
