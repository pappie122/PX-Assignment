
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="temp.css">
	
</head>

    <?php 
	//indclude the database connection string and some validation functions
	include( "db.php");
	include ("checkTime.php");
	include ("dates.php");
	
	session_start();
	 
	if(isset($_SESSION['login_user'])){
	
	$email = $_SESSION['login_user'];


			  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
		//user id 

	  $data = 'SELECT * FROM user WHERE Email = "'.$email.'"';
	  $query = mysqli_query($conn, $data) or die("Couldn't execute query. ". mysqli_error());
	  $data2 = mysqli_fetch_array($query);
	  
	} else {
			header("location: login.php");
	}
		

	$u= $_SESSION["userId"];
	
		if (isset($_POST["rowCount"])){
			
			$rowCount=mysqli_real_escape_string($conn,$_POST["rowCount"]);
		}
		




	
	//echo $rowCount;
	
	
	
	//Selects jobs from user when the account is active
	$sql=	"SELECT 
				j.JobID AS jobID,
				j.JobName AS jobName
			FROM job AS j
			INNER JOIN userJob AS uj ON uj.JobID = j.JobID
				AND uj.UserJobStatus = 1
				AND j.JobStatus = 1
			INNER JOIN user AS u ON uj.UserID = u.UserID
				AND u.UserID = $u   /* id goes here */
				AND u.AccountStatus = 1 " ; 
	$result=mysqli_query($conn,$sql); 
	$temp=$result; 
	$json=array(); 
	
	//puts data into JSON array 
	if(mysqli_num_rows($result)> 0){ 
		while($row = mysqli_fetch_array($temp)) { 
			array_push($json, array("ID" => $row["jobID"], "Name" => $row["jobName"])); 
		} 
	} 
	//$jobss=array(); important
	
	
	
	
	//echo $_Post["break"];

	
	
	//$rowCount=1;
	$formData=array();
	$errorMsg = "";
	if(isset($_POST) && isset($_POST['submit'])){
		// Update form data with postback information
	
	
	
	
	
	
	
	
	
	
	//Loops through all the rows added
		for($i=0; $i < $rowCount; $i++){
			
		if($_POST['break'.$i]==""){
		$_POST["break".$i]=0;
	
	}
			//Puts data into an array
			array_push($formData, array("job" => $_POST["inputLocation" . $i], "date" => $_POST["date" . $i], "startTime" => $_POST["startTime" . $i], "endTime" => $_POST["endTime" . $i], "break" => $_POST["break" . $i], "comment" => $_POST["comment" . $i]));
			
		}
//print_r ($formData[0]["job"]);
		// checkifDate($formData); checks if input is date 
		$isValid =checkEmpty($formData);
		//$isValid=checkStartTime($formData);
		//echo $formData[1]["startTime"];
		//$isValid = true;
		
		
	$isValid=checkstartVal($formData);//Check StartTime
	$isValid=checkendVal($formData);//Checks EndTime 
	
  checkOverlap($formData); // checks if data is valid
$isValid=checkifDate($formData);




//checks if form data is date 
	//	echo $n[0]= $row["date"];	
		//echo $n[1]= $row["date"];	
		
		
		
		
		// Check rows against themselves
		
		// Check form data for existing records
		if($isValid){
			foreach($formData as $row){
			//	echo $row['date'];
				// Need to work on query
				$check = "SELECT `timesheet`.`UserID`, `timesheet`.`TimesheetID`, `timesheetdetail`.`TsDetailID`, `timesheetdetail`.`TimesheetID`, `timesheetdetail`.`StartTime`, `timesheetdetail`.`EndTime`, `timesheetdetail`.`Date` FROM `timesheet` LEFT JOIN `timesheetdetail` ON `timesheet`.`TimesheetID` = `timesheetdetail`.`TimesheetID` WHERE (( `Date` ='" .  $row['date'] . "' ) AND ( `UserID` = $u)); ";
				
				$res = mysqli_query($conn, $check);
		
				while($a=mysqli_fetch_assoc($res)){
					
					
					if($row["startTime"]>=$a["EndTime"]&&$row['endTime']<=$a["StartTime"]&&$row["startTime"]<$row['endTime']){
				echo "no clash";
					}else {
						//echo "enter new start time end time";
						$timeClashError='Time clash. Enter a new start and end time';
						//outputs modal
						checkError($timeClashError);
						
						
						
				}
				if(mysqli_num_rows($res) > 0){
					$isValid = false;
					// implement error message
					
					$errorMsg += ("");
					
				}
			}
		}
		}
		
	//if valid insert into db 
		if($isValid){
			//$insertTime = Date();
			foreach($formData as $row){
			    $todaysDate=date('Y/m/d');
			$job=mysqli_real_escape_string($conn,$row["job"]);
			 

			  $n  =gmdate('Y-m-d h:i:s');


$dateSubmitted = date('Y-m-d h:i:s', strtotime($n.rand(30,  3).' seconds'));
				$date=mysqli_real_escape_string($conn,$row['date']);
				$startTime=mysqli_real_escape_string($conn,$row['startTime']);
				$endTime=mysqli_real_escape_string($conn,$row['endTime']); 
				$comment=mysqli_real_escape_string($conn,$row['comment']);
				$break=mysqli_real_escape_string($conn,$row['break']);
			$totalhours=3;
			
				$timeSheetStatus=1;
				$newtime=$break*60;
				
				
	
			
/*
// hour function 
$start = explode(':', $startTime);
$end = explode(':', $endTime);
$total_hours = $end[0] - $start[0] - ($end[1] < $start[1]);

$total_hours-$break;
*/
//Total hours function
$total_hours=totalHours($startTime,$endTime,$break);
			
			
			$comment1="pending";
    
				//echo $row['comment'];
				//echo "hu";
				$sql1[$i] ="INSERT INTO timesheet (TimesheetID, UserID, DateCreated, DateSubmitted, TimesheetStatus, TotalHours, Comments, ApprovedDate, ApprovedBy) 
				values (Null,'$u','$todaysDate','$dateSubmitted','$timeSheetStatus','$total_hours','$comment1',NULL,NULL);";  
			
				 $rs = mysqli_query($conn, $sql1[$i]);
				
				
				
				
				$userIds[$i] ="SELECT `timesheet`.`TimesheetID`, `timesheet`.`UserID`, `timesheet`.`DateSubmitted` FROM `timesheet` WHERE (( `DateSubmitted` = '$dateSubmitted' ) AND ( `UserID` = $u)) ;";  
				
				
				
				
				$userI = mysqli_query($conn, $userIds[$i]);
	
				
				
				if (!$userI) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

				
				while($fetchUser=mysqli_fetch_assoc($userI)){
				$lasttimesheetId= $fetchUser["TimesheetID"];
				echo $lasttimesheetId."this is the last id";
				}
				
				//Gets the id of the last user submitted in db
			echo $lasttimesheetId."this is the last id AAAAAAAAAAAA";
				// Insert into database
				$sql2[$i]="INSERT INTO timesheetdetail (TsDetailID, TimesheetID, JobID, Date, StartTime, EndTime, BreakDuration, TotalHours, Comments) VALUEs (NULL,'$lasttimesheetId','$job','$date','$startTime','$endTime','$break','$total_hours','$comment');";
			
					$insert2 = mysqli_query($conn, $sql2[$i]);
		
		
			if (!$insert2) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
				
			}
		header("location:editTime.php");
		}
	}
	
	
	
	?>

<body>
<!-- <nav class="navbar navbar-default">  -->
<?php include("nav.php");?>
<div class="container">  
<!-- <div class="jumbotron">  -->
<!-- original place for include nav -->


    
      <h2>Add Timesheet</h2>
      
	  
 <form name="Timesheet" method="post" action="timesheet3.php"  data-fv-framework="bootstrap"
    data-fv-message="This value is not valid"
    data-fv-feedbackicons-valid="glyphicon glyphicon-ok"
    data-fv-feedbackicons-invalid="glyphicon glyphicon-remove"
    data-fv-feedbackicons-validating="glyphicon glyphicon-refresh">
 
            <input type="hidden" id="rowCount" name="rowCount" />
          <div class="row clearfix">
                            <div class="col-md-12 column">
							
                                <table class="table table-bordered table-hover" id="tab_logic">
								
                                    <thead>
                                        <tr>
                                            <th class="text-center" bgcolor="lightblue">
                                                #
                                            </th>
                                            <th class="text-center" bgcolor="lightblue">
                                                Job
                                            </th>
                                            <th class="text-center" bgcolor="lightblue">
                                                Date
                                            </th>
                                            <th class="text-center" bgcolor="lightblue">
                                                Start Time
                                            </th>
                                            <th class="text-center" bgcolor="lightblue">
                                                End Time
                                            </th>
                                            <th class="text-center" bgcolor="lightblue">
                                                Break
                                            </th>
                                            <th class="text-center" bgcolor="lightblue">
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
                                                <input type="date" name="date0" placeholder='date' class="form-control" required
               data-fv-uri-message="The input is not a valid website address" >
                                            </td>
                                            <td>
                                                <input type="time" name='startTime0' placeholder='StartTime' class="form-control" required
               data-fv-uri-message="The input is not a valid website address"  />
                                            </td>
                                            <td>
                                                <input type="time" name='endTime0' placeholder='EndTime' class="form-control" required
               data-fv-uri-message="The input is not a valid website address" />
                                            </td>
                                            <td>
											  <input type="number" name="break0" min="0" max="2" step="0.5" placeholder='Break' class="form-control">
                                               
                                            </td>
                                            <td>
                                                <input type="text" name='comment0' placeholder='Comment' class="form-control" />
                                            </td>
                                        </tr>
                                        <tr id='addr1'></tr>
                                    </tbody>
								
                                </table>
								
                            </div>
                        </div>
                        <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
				</div>
			</div>
		</form>
		
	</div>
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
    <script>
        $(document).ready(function() {
		
    

	 

			var i = 1;
			$('#rowCount').val(i);
			$("#add_row").click(function() {
				$('#addr' + i).html("<td>" + (i + 1) + "</td><td><select class='form-control'  name='inputLocation" + i + "' Class='form-control' name='Joblist" + i + "'>" <?php foreach($json as $key => $val) { ?>
					+"<option value='<?php echo $val['ID']; ?>'><?php echo $val['Name']; ?></option>"
				<?php } ?> +"</select></td><td><input  name='date" + i + "' type='date' placeholder='Date'  class='form-control input-md'required></td><td><input  name='startTime" + i + "' type='time' placeholder='StartTime'  class='form-control input-md'required></td><td><input  name='endTime" + i + "' type='time' placeholder='endTime'  class='form-control input-md'required /></td><td><input  name='break" + i + "' type='number' placeholder='Break'  class='form-control input-md' min='0' max='2' step='0.5' /></td><td><input  name='comment" + i + "' type='text' placeholder='Comment'  class='form-control input-md' /></td>");
				
				$('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
				i++;
				$('#rowCount').val(i);
			});
			$("#delete_row").click(function() {
				if (i > 1) {
					$("#addr" + (i - 1)).html('');
				
					i--;
					$('#rowCount').val(i);
				}
			
	
			
		});
		
		
			//$('#Timesheet').formValidation();
		});
		
			
		
			/*
	
		}
			
			
			});
			<?php if(isset($_POST) && isset($_POST['submit'])) { ?>
				function phpUpdateRows() {
					
					i = "<?php echo $_POST['rowCount']; ?>";
					//i = <?php echo $rowCount;?>;
					alert(i);
					
				
					
					for(j=0; j < i; j++){
						if(j == 0){
						alert("hey");
							// Add data to row that exists;
							
						} else {
							
					alert("hey");
							t = j+1;
							
							$('#addr' + t).html("<td>" + (j + 1) + "</td><td><select class='form-control'  name='inputLocation" + i + "' Class='form-control' name='Joblist" + i + "'>" <?php foreach($json as $key => $val) { ?>
					+"<option value='<?php echo $val['ID']; ?>'<?php echo ($val['ID'] == $_POST['inputLocation' + j]) ? "selected" : ""; ?> > <?php echo $val['Name']; ?></option>"
				<?php } ?> +"</select></td><td><input  name='date" + t + "' type='date' placeholder='Date'  class='form-control input-md'"<?php echo $_POST['date' + j]; ?>"></td><td><input  name='startTime" + t + "' type='time' placeholder='StartTime'  class='form-control input-md'   value="<?php echo $_POST['startTime' + j]; ?>"></td><td><input  name='endTime" + t + "' type='time' placeholder='EndTime'  class='form-control input-md' "<?php echo $_POST['endTime' + t]; ?>"/></td><td><input  name='break" +t  + "' type='time' placeholder='Break'  class='form-control input-md' value="<?php echo $_POST['break' + j]; ?>" /></td><td><input  name='comment" + t + "' type='text' placeholder='Comment'  class='form-control input-md' value="<?php echo $_POST['comment' + j]; ?>"/></td>");
				
				
				
				$('#tab_logic').append('<tr id="addr' + (j + 1) + '"></tr>');
						}
					}
				}
				phpUpdateRows();
			<?php } ?>
		});
*/
		
	</script>
	

	</div>  
	<!-- </div> -->
    </body>
</html>