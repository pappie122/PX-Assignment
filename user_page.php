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
	  
	  <?php
     include("db.php");
     if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
		
	$u= $_SESSION["userId"];
	 //$id=1;
	 $sql=	"SELECT 
				j.JobID AS jobID,
				j.JobName AS jobName
			FROM job AS j
			INNER JOIN userJob AS uj ON uj.JobID = j.JobID
				AND uj.UserJobStatus = 1
				AND j.JobStatus = 1
			INNER JOIN user AS u ON uj.UserID = u.UserID
				AND u.UserID = $u   /* id goes here */
				AND u.AccountStatus = 1 
				
				" ; 
	$result=mysqli_query($conn,$sql); 
	$temp=$result; $json=array(); 
	if(mysqli_num_rows($result)> 0){ 
		while($row = mysqli_fetch_array($temp)) { 
			array_push($json, array("ID" => $row["jobID"], "Name" => $row["jobName"])); 
		} 
	} 
	$jobss=array(); 

	 $sql1="SELECT timesheetdetail.*, timesheet.UserID, timesheet.TimesheetStatus
FROM timesheet
LEFT JOIN timesheetdetail ON timesheet.TimesheetID = timesheetdetail.TimesheetID

WHERE (( TimesheetStatus =       3                          ) AND ( UserID = $u))";
	 
	 	$result1=mysqli_query($conn,$sql1);
		
		

	 
	 
    ?>
</div>
<body>



    
   
	
    <div class="col-sm-8 text-left"> 
      <h2>Accepted Timesheets </h2>
      
	  
	   <div class="row clearfix">
                            <div class="col-md-12 column">
							
                                <table class="table table-bordered table-hover" id="tab_logic" >
						<thead>
                                        <tr>
										
                                        
                                            <th class="text-center" bgcolor="lightgrey">
                                                Job
                                            </th>
                                            <th class="text-center" bgcolor="lightgrey">
                                                Date
                                            </th>
                                            <th class="text-center" bgcolor="lightgrey">
                                                Start Time
                                            </th>
                                            <th class="text-center" bgcolor="lightgrey">
                                                End Time
                                            </th>
                                            <th class="text-center" bgcolor="lightgrey">
                                                Break
                                            </th>
                                            <th class="text-center" bgcolor="lightgrey">
                                              Hours
                                            </th>
											 <th class="text-center" bgcolor="lightgrey">
                                                Comment
                                            </th>
											
											<th class="text-center" bgcolor="lightgrey">
											
											Admin Comments
											</th>
                                        </tr>
								  
											</thead>	
										<tbody>
                                            <tr>
											   <?php while($rows=mysqli_fetch_array($result1)){	?>	
                                            <td>
											
                                                    <?php foreach($json as $key=> $val){ ?>
														<?php if($val['ID']==$rows["JobID"]){?>


														
                                                            <?php echo $val[ 'Name']; ?>
                                                      
                                                    <?php } 
													} ?>
                                            
												
                                            </td>
										
																			
                                            <td>
                                             <?php echo date('d-m-Y',strtotime($rows["Date"]));?>
                                            </td>
                                            <td>
                                               <?php echo $rows["StartTime"];?>
                                            </td>
                                            <td>
                                               <?php echo $rows["EndTime"];?>
                                            </td>
                                            <td>
											<?php echo $rows["BreakDuration"];?>
										
                                               
                                            </td>
                                            <td>
											
											  	  <?php echo $rows["TotalHours"];?>
                                          
                                            </td>
											 <td>
											<?php echo $rows["Comments"];?>
											
                                          
                                            </td>
											
								<td>
								 <?php 
								 
								 $aaa=$rows["TimesheetID"];
								 $sqlComments="SELECT timesheet.TimesheetID, timesheet.UserID, timesheet.Comments
FROM timesheet
WHERE ( TimesheetID = $aaa);";
$result2=mysqli_query($conn,$sqlComments);




while($fetchAdminComment=mysqli_fetch_assoc($result2)){
if($fetchAdminComment["Comments"]==null){
	echo "No Admin Comments made yet";
	
} else {




 echo $fetchAdminComment["Comments"];
}
}
 ?>
								</td>
						
					  
                                          </tr>
								
										<?php }  ?>
										</tbody>
												</table>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
    
    </div>
    
     
    </div>
  </div>
  
</div>
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
        <script>
		$(document).ready(function() {
    			
	
			$('#tab_logic').DataTable({
					
    			"columnDefs": [{
					"targets": 8,
					"orderable": false
				
					},{
					"targets": 8,
					"orderable": false
				}]
    		}); 
		});
		

		
	</script>


</body>
</html>
    </div>
  </div>
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="index.css">

  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</body>
</html>
