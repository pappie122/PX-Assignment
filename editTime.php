<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="temp.css">
</head>
<body>

<?php include("nav.php");?>
<h1>Edit Draft</h1>
        <form name="Timesheet" method="post" action="timesheet3.php">
            <input type="hidden" id="rowCount" name="rowCount" />
       
                      
					  <?php
     include("db.php");
     	  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	$u= $_SESSION["userId"];
	
	
	
	 $id=1;
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

WHERE (( TimesheetStatus =       1                          ) AND ( UserID = $u))";
	 
	 	$result1=mysqli_query($conn,$sql1);
		
		


   
	 
	 


    ?>

	
	
	
					 <div class="row clearfix">
                            <div class="col-md-12 column">
							
                                <table class="table table-bordered table-hover" id="tab_logic" >
						<thead>
                                        <tr>
										
                                        
                                            <th class="text-center">
                                                Job
                                            </th>
                                            <th class="text-center">
                                                Date
                                            </th>
                                            <th class="text-center">
                                                Start Time
                                            </th>
                                            <th class="text-center">
                                                End Time
                                            </th>
                                            <th class="text-center">
                                                Break
                                            </th>
                                            <th class="text-center">
                                              Hours
                                            </th>
											 <th class="text-center">
                                                Comment
                                            </th>
											 <th class="text-center">
                                               Edit
                                            </th>
											<th class="text-center">
                                               Submit
                                            </th>
											
											
											<th class="text-center">
											Admin Comment
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
                                                <?php echo $rows["Date"];?>
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
											
											
											 <a href="editTimeSheet.php?id=<?php echo $rows["TimesheetID"];?>"> edit 
                                          
                                            </td>
											
											
									<td>
									<a href="submitPending.php?id=<?php echo $rows["TimesheetID"];?>"> submit
									<?php $aaa=$rows["TimesheetID"];?>
								
									</td>	
					  <td>
					  <?php $sqlComments="SELECT timesheet.TimesheetID, timesheet.UserID, timesheet.Comments
FROM timesheet
WHERE ( TimesheetID = $aaa);";
$result2=mysqli_query($conn,$sqlComments);

while($fetchAdminComment=mysqli_fetch_assoc($result2)){




?>
<?php echo $fetchAdminComment["Comments"];
}

 ?>





					 </td>
                                          </tr>
								
										<?php }  ?>
										</tbody>
												</table>
					  
					   
					   
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <!-- polyfiller file to detect and load polyfills -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <script>
        webshims.setOptions('waitReady', false);
        webshims.setOptions('forms-ext', {
            types: 'date'
        });
        webshims.polyfill('forms forms-ext');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
        <script>
		$(document).ready(function() {
    		
	
			$('#tab_logic').DataTable({
					
    			"columnDefs": [{
					"targets": 3,
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