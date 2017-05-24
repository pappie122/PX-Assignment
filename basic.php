<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
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
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- <div class="col-xs-12 col-md-6 col-lg-3">First Name: </div>
    <div class="col-xs-12 col-md-6 col-lg-9"><input type="text" name="firstName" placeholder="First Name"></div> -->
    <div class="container">
      <form action="registration.php" method="post">
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                First Name:
              </div>
                <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="firstName" placeholder="First Name" class="form-control">
              </div>
        </div>
        <br>
        <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                Last Name:
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3">
                <input type="text" name="lastName" placeholder="Last Name" class="form-control">
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
