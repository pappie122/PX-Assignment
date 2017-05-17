<html>
<head>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
</head>
<body>
    <div style="width:600px; text-align: left;">
        <form name="Timesheet" method="post" action="timesheet3.php">
            <input type="hidden" id="rowCount" name="rowCount" />
            <div id="container" style="width:900px">
                <div id="header" style="background-color:#980000 ;">
                    <h1 style="margin-bottom:0;">Time Sheet</h1>
                </div>
                <div id="menu" style="background-color:#C0C0C0;height:200px;width:100px;float:left;">
                    <p>welcome User</P>
                    <input name="logout" type="button" action="logout.php" logout>
                </div>
                <div id="content" style="background-color:#EEEEEE;height:1100px;width:600px;float:left;">
                    <div class="container">
                      
					  <?php
     include("db.php");
     
	 
	 $sql=	"SELECT 
				j.JobID AS jobID,
				j.JobName AS jobName
			FROM job AS j
			INNER JOIN userJob AS uj ON uj.JobID = j.JobID
				AND uj.UserJobStatus = 1
				AND j.JobStatus = 1
			INNER JOIN user AS u ON uj.UserID = u.UserID
				AND u.UserID = 1   /* id goes here */
				AND u.AccountStatus = 1 " ; 
	$result=mysqli_query($conn,$sql); 
	$temp=$result; $json=array(); 
	if(mysqli_num_rows($result)> 0){ 
		while($row = mysqli_fetch_array($temp)) { 
			array_push($json, array("ID" => $row["jobID"], "Name" => $row["jobName"])); 
		} 
	} 
	$jobss=array(); 

	 $sql1="SELECT `timesheetdetail`.`TimesheetID`, `timesheetdetail`.`JobID`, `timesheetdetail`.`Date`, `timesheetdetail`.`StartTime`, `timesheetdetail`.`EndTime`, `timesheetdetail`.`BreakDuration`, `timesheetdetail`.`TotalHours`, `timesheetdetail`.`Comments`, `timesheet`.`UserID`
FROM `timesheetdetail`
LEFT JOIN `timesheet` ON `timesheetdetail`.`TimesheetID` = `timesheet`.`TimesheetID` 
WHERE (( `UserID` =        1                         ))
ORDER BY `Date` DESC ";
	 
	 	$result1=mysqli_query($conn,$sql1);
		
		


   
	 
	 
	 
	 
    ?>
					 <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-bordered table-hover" id="tab_logic" name="alex">
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
                                        </tr>
								    
												<?php while($rows=mysqli_fetch_array($result1)){	?>	
                                            <tr>
                                            <td>
												<select class="form-control" id="Joblist" name="inputLocation0">
                                                    <?php foreach($json as $key=> $val){ ?>
														<option value="<?php echo $val['ID']; ?>">
                                                            <?php echo $val[ 'Name']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
												

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
											
											 <a href="editTImeSheet.php?id=<?php echo $rows["TimesheetID"];?>"> edit 
                                          
                                            </td>
											<td>
											</td>
											
									
                                          </tr>
                              
    
   		<?php }  ?>
					  
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
					"targets": 8,
					"orderable": false
					},{
					"targets": 0,
					"orderable": false
				}]
    		}); 
		});
		

	</script>
    </body>
</html>