<html>
<head>
<?php 
	include( "db.php");
		
		

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
	$temp=$result; 
	$json=array(); 
	if(mysqli_num_rows($result)> 0){ 
		while($row = mysqli_fetch_array($temp)) { 
			array_push($json, array("ID" => $row["jobID"], "Name" => $row["jobName"])); 
		} 
	} 


	
	//echo $rowCount;
	
	
	
	
	$sql1=	"SELECT 
				j.JobID AS jobID,
				j.JobName AS jobName
			FROM job AS j
			INNER JOIN userJob AS uj ON uj.JobID = j.JobID
				AND uj.UserJobStatus = 1
				AND j.JobStatus = 1
			INNER JOIN user AS u ON uj.UserID = u.UserID
				AND u.UserID = 1   /* id goes here */
				AND u.AccountStatus = 1 " ; 
	$result=mysqli_query($conn,$sql1); 
	$temp=$result; $json=array(); 
	if(mysqli_num_rows($result)> 0){ 
		while($row = mysqli_fetch_array($temp)) { 
			array_push($json, array("ID" => $row["jobID"], "Name" => $row["jobName"])); 
		} 
	} 
	$jobss=array(); 
	
	$id=$_GET["id"];
	$sqlSelectTimeSheet="SELECT * FROM `timesheetdetail` WHERE TimesheetID=$id";
	
	
$selectID = mysqli_query($conn, $sqlSelectTimeSheet);

		$formData1=array();
	
	
	
	
		if(isset($_POST) && isset($_POST['submit'])){
				
			array_push($formData1, array("job" => $_POST["inputLocation0"], "date" => $_POST["date0"], "startTime" => $_POST["startTime0"], "endTime" => $_POST["endTime0"], "break" => $_POST["break0"], "comment" => $_POST["comment0"]));
			
			
			
		
		
		$job1=$formData1[0]["job"];
		$date1=$formData1[0]["date"];
		$startTime=$formData1[0]["startTime"];
		$endTime=$formData1[0]["endTime"];
        $break=$formData1[0]["break"];
		$comment=$formData1[0]["comment"];
			//print_r ($formData1[0]["date"]);
			/*
			echo $job1;
			echo "\r\n";
			echo $date1;
			echo "\r\n";
			echo $startTime;
			echo "\r\n";
			echo $endTime;
			echo "\r\n";
			echo $break;
			echo "\r\n";
		    echo $comment;
			echo "\r\n";
			
			*/
			
			
			
			$s=$startTime;
			$e=$endTime;
			$start = explode(':', $s);
$end = explode(':', $e);
$total_hours = $end[0] - $start[0] - ($end[1] < $start[1]);

$total_hours-$break;
	//$total_hours=1;		
			
		$sql2 = "UPDATE timesheetdetail SET JobID='$job1',Date='$date1',StartTime='$startTime',EndTime='$endTime',BreakDuration='$break',TotalHours='$total_hours',Comments='$comment' WHERE TimesheetID='$id'";
		
			
			
			$update = mysqli_query($conn, $sql2);
	
				
				
				if (!$update) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
			
		}
			
		header("location:editTime.php");
	
		}			
	
	
	
		if(isset($_POST) && isset($_POST['delete_row'])){
			
		}
	
	?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div style="width:600px; text-align: left;">
        <form name="Timesheet" method="post" action="editTimeSheet.php?id=
		<?php echo $id ;?>">
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
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
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
                                                Comment
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='addr0'>
										
                                            <td>
                                            </td>
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
											<?php while($fetchUser=mysqli_fetch_assoc($selectID)){ 
											
											 ?>
                                                <input type="date" name="date0" placeholder='date' class="form-control" value='<?php echo date('Y-m-d',strtotime($fetchUser["Date"]));  ?>'	/>
                                            </td>
											
                                            <td>
											
                                                <input type="time" name='startTime0' placeholder='StartTime' class="form-control"  value="<?php echo $fetchUser["StartTime"];?>"/>
						
						
                                            </td>
                                            <td>
                                                <input type="time" name='endTime0' placeholder='EndTime' class="form-control" value="<?php echo $fetchUser["EndTime"];?>"/>
                                            </td>
                                            <td>
											  <input type="number" name="break0" min="0" max="2" step="0.5" placeholder='Break' class="form-control"
											  value="<?php echo $fetchUser["BreakDuration"];?>"
											  />
                                               
                                            </td>
                                            <td>
                                                <input type="text" name='comment0' placeholder='Comment' class="form-control" value="<?php echo $fetchUser["Comments"];?>"/>
                                            </td>
											<?php } ?>
                                        </tr>
                                        <tr id='addr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
						 <button type="submit" class="btn btn-primary" name="delete_row">delete</button>
                    </div>
				


				
				</div>
			</div>
		</form>
	</div>