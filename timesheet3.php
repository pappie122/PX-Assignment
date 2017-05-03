<html>
<head>

<?php
require_once('calendar/tc_calendar.php');
require_once('loga.php');
?>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />

<link href="news.css" rel="stylesheet" type="text/css" />

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />



  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>
<body>
<div style="width:600px; text-align: left;">
<form name="Timesheet"method="post" action="submitTimesheet.php">
<div id="container" style="width:900px">

<div id="header" style="background-color:#980000 ;">
<h1 style="margin-bottom:0;">Time Sheet</h1></div>

<div id="menu" style="background-color:#C0C0C0;height:200px;width:100px;float:left;">
<p>welcome User</P>
<input name="logout"type="button" action="logout.php" logout>



</div>

<div id="content" style="background-color:#EEEEEE;height:1100px;width:600px;float:left;">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>




<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
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
						
				
					
				<!--		
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Job
  　<span class="sr-only">Toggle Dropdown
  </span>
  </button>
  <ul class="dropdown-menu" role="menu" id="a">
--><script>
   
   $(document).ready(function(){



	  
  
 
	
	 var i=1;
	
	
     $("#add_row").click(function(){
	
		   

		 
     $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select class='form-control'  name='Joblist"+i+"' Class='form-control' name='Joblist"+i+"'><option value='hi'><?php echo aa(); ?></option>'</select></td><td><input  name='date"+i+"' type='date' placeholder='Date'  class='form-control input-md'></td><td><input  name='StartTime"+i+"' type='time' placeholder='StartTime'  class='form-control input-md'></td><td><input  name='EndTime"+i+"' type='text' placeholder='EndTime'  class='form-control input-md' /></td><td><input  name='Break"+i+"' type='text' placeholder='Break'  class='form-control input-md' /></td><td><input  name='Comment"+i+"' type='text' placeholder='Comment'  class='form-control input-md' /></td>");
//$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='Job"+i+"' type='text' placeholder='Job' class='form-control input-md'  /> </td>");

//	 $('#addr'+i).html("<td>"+ (i+1) +"<td><?php $myCalendar = new tc_calendar("date_theme", true, false); $myCalendar->setIcon("calendar/images/iconCalendar.gif");$myCalendar->setDate(1, date('m'), date('Y'));$myCalendar->setPath("calendar/");$myCalendar->setYearInterval(2000, 2015);$myCalendar->setDateFormat('j F Y');$myCalendar->setAlignment('left', 'bottom');$myCalendar->setAutoHide(true, 10000);?></td>");
	  
	  
	  
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
</script>
		<select class="form-control" id="Joblist" name="inputLocation">				
		<?php
include("db.php");
$sql="SELECT 
	j.JobID AS jobID,
	j.JobName AS jobName
FROM job AS j
INNER JOIN userJob AS uj ON uj.JobID = j.JobID
	AND uj.UserJobStatus = 1
	AND j.JobStatus = 1
INNER JOIN user AS u ON uj.UserID = u.UserID
	AND u.UserID = 1   /* id goes here */
	AND u.AccountStatus = 1 ";
	
	$result=mysqli_query($conn,$sql);
	//echo '<option value="">Please select...</option>';
	
	$jobss=array();
while($row = mysqli_fetch_array($result))
  {
	 ///ho $row['jobName'];

 //   echo '<option value="'.$row['jobID'].'">' . $row['jobName'] . "</option>";
   // echo $row['jobName'] ."<br/>";
   //    echo '<li><a href="#">$row['jobName']</a></li>';
   
   
  // echo' <li><a href="#">   '.$row['jobName'].'</a></li>';
   echo '<option value="'.$row['jobID'].'">'.$row['jobName'].'</option>';
$jobss[]=$row['jobID'];
   
   
   
   
	//<input type="text" name='Job'  placeholder='Job' class="form-control"/>
  }
 
mysqli_free_result($result);
//mysqli_close($connection);
		//	<input type="text" name='Job'  placeholder='Job' class="form-control"/>


?>
 
</select>
 

<?php echo $jobss[1];?>
    
<!--  </ul>  -->
						</td>
						<td>

    <input type="date"name="date" placeholder='date' class="form-control">																																										
						</td>
						<td>
						<input type="text" name='StartTime' placeholder='StartTime' class="form-control"/>
						</td>
						<td>
						<input type="text" name='EndTime' placeholder='EndTime' class="form-control"/>
						</td>
							<td>
						<input type="text" name='Break' placeholder='Break' class="form-control"/>
						</td>
							<td>
						<input type="text" name='Comment' placeholder='Comment' class="form-control"/>
						</td>
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
		</div>
	</div>
	<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
	
	  <button type="submit" class="btn btn-primary">Submit</button>

</div>
  
  