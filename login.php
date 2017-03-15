<?php 

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == "admin" && $password == "password"){
        header("Location: http://localhost/demo/PX/admin_page.php");
        exit;
    }
    else if ($username == "user" && $password == "password"){
        header("Location: http://localhost/demo/PX/user_page.php");
        exit;
    }
    else {
        echo "Username or pasword is incorrect";
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
</head>
<body>
   <h1> Login Page </h1>
    <div class="container">
        <div class="col-xs-6">
           <form action="login.php" method="post">
             <div class="form-group">
             <label for="username">Username</label>
             <input type="text" name="username" class="form-control">  
             </div>
             
             <div class="form-group">
             <label for="password">Password</label>
             <input type="password" name="password" class="form-control">
             </div> 
             <input class="btn btn-primary" type="submit" name="submit" value="Submit">
           </form> 
        </div>
    </div>
</body>
</html>