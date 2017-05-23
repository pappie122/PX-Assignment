  <nav class="navbar navbar-default">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  
<!--   <nav class="navbar navbar-inverse">   default nav withblack  -->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <!-- <a class="navbar-brand" href="#"></a> -->
	 
	 

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    				  <ul class="nav navbar-nav">
					  
	    <!-- <li class="active"><a href="#">Home</a></li> -->
			<?php 
			include("db.php");
			  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
		
			
			//get user session variable  too test for admin if admin make rows 
			$um= $_SESSION["userId"];
			$sql="SELECT * FROM `user` WHERE `UserID`=$um";
			
			$res = mysqli_query($conn, $sql);
		
				

			?>
			

    
     <li><a href="pendingTimesheet.php">Pending TimeSheets</a></li>
		<li><a href="aTimesheets.php">Accepted timesheets</a></li>
        <li><a href="timesheet3.php">Add TimeSheets</a></li>
        <li><a href="editTime.php">edit Drafts</a></li>
		<li><a href="editUser.php">edit Details</a></li>
	
   
 
  


	
		<?php while($a=mysqli_fetch_assoc($res)){ ?>
   <?php if($a["Role"]==1){
	   
	   
	       
		
	   echo  "<li><a href='addUser.php'>Add User</a></li>";
	     echo  "<li><a href='editJob.php'>Edit Job</a></li>";
		      echo  "<li><a href='addJob.php'>add Job</a></li>";
			
   }
		}
	   ?>
 	  </ul>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
      </ul>
	  
    </div>
  </div>
</nav>
  