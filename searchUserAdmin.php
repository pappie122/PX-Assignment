<?php
include("config.php");

session_start();
if(isset($_SESSION['login_user'])){
	
	$email = $_SESSION['login_user'];

	  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
	  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
	  $data2 = mysqli_fetch_array($query);
	  
	} else {
			header("location: login.php");
	}
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
          <div class="search-box">
        <input class="form-control" type="text" name="search"" autocomplete="off" placeholder="Search Email..." />
        <div class="result"></div>
    </div>
          </div>
        </div>
        <br>
      <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
          <input class="btn btn-primary form-control" type="submit"  value="Submit">
        </div>
      </div>
    </form>
    </div>
    <form action="editAdmin.php" method="post">
      
    </form>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html><script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("ss.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
