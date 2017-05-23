<?php
include("config.php");

session_start();


$search=$_POST['search'];

  $data = 'SELECT * FROM user WHERE Email = "'.$search.'"';
  $query = mysqli_query($conn,$data) or die("Couldn't execute query. ". mysql_error($conn));
  $data2 = mysqli_fetch_array($query);


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
     <form action="seacrhUserAdminUpdate.php" method="post">
     <table>
       <tr>
         <td>First Name: </td>
         <td><input type="text" name="firstName"value="<?php echo @$data2[Fname]?>" ><td>
       </tr>

       <tr>
         <td>Last Name: </td>
         <td><input type="text" name="lastName" value="<?php echo @$data2[Lname]?>" ></td>
       </tr>

       <tr>
         <td>Telephone: </td>
         <td><input type="number" name="telephone" value="<?php echo @$data2[Phone]?>" ></td>
       </tr>

       <tr>
         <td>Address: </td>
         <td><input type="text" name="address" value="<?php echo @$data2[Street]?>" ></td>
       </tr>

       <tr>
         <td>City: </td>
         <td><input type="text" name="city" value="<?php echo @$data2[City]?>" ></td>
       </tr>

       <tr>
         <td>Postcode: </td>
         <td><input type="number" name="postcode" value="<?php echo @$data2[Postcode]?>" ></td>
       </tr>

       <tr>
         <td>Email: </td>
         <td><input type="email" name="email" value="<?php echo @$data2[Email]?>" ></td>
       </tr>
     </table>
     <input class="btn btn-primary" type="submit" name="submit" value="Submit">
   </form>
   <br>
   <form action="editUserAdmin.php" method="post">
     <input class="btn btn-primary" type="submit" name="submit" value="Go Back">
   </form>
     <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </html>
