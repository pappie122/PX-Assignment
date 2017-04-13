<html>
<head>
<?php
require_once('calendar/classes/tc_calendar.php');
?>
</style>

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
<form name="Timesheet">
<div id="container" style="width:900px">

<div id="header" style="background-color:#980000 ;">
<h1 style="margin-bottom:0;">Time Sheet</h1></div>

<div id="menu" style="background-color:#C0C0C0;height:200px;width:100px;float:left;">
<p>welcome User</P>
<input name="logout"type="button" action="logout.php" logout>



</div>

<div id="content" style="background-color:#EEEEEE;height:1100px;width:600px;float:left;">

<form>
  <div class="form-group">
<?php
		  $myCalendar = new tc_calendar("date_theme", true, false);
		  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
		  $myCalendar->setDate(1, date('m'), date('Y'));
		  $myCalendar->setPath("calendar/");
		  $myCalendar->setYearInterval(2000, 2015);
		  $myCalendar->setDateFormat('j F Y');
		  //$myCalendar->autoSubmit(true, "form1");
		  $myCalendar->setAlignment('left', 'bottom');
		  $myCalendar->setAutoHide(true, 10000); //10 secs
		  $myCalendar->showWeeks(true);
		  $myCalendar->startMonday(true);
		  $myCalendar->writeScript();
		  ?>
		  
<!--   <label for="date">Date:</label>
    <input type="date" class="form-control" id="date">
	-->
  </div>

   <div class="form-group">
   <label for="starttime">Start Time :</label>
    <input type="time"id="time">
 <div style="overflow:hidden;">
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <div id="datetimepicker12"></div>
            </div>
        </div>
    </div>
</div>
  <div class="form-group">
    <label for="pwd">Break Time :</label>
    <input type="" class="time" id="pwd">
  </div>
  <div class="form-group">
   <label for="End Time">End Time :</label>
    <input type="time"id="time">
 <div style="overflow:hidden;">
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <div id="datetimepicker12"></div>
            </div>
        </div>
    </div>
</div>
 <div class="form-group">
  <label for="sel1">Job</label>
  <select class="form-control" id="sel1">
    <option>Job1</option>
    <option>Job2</option>
    <option>Job3</option>
    <option>Job4</option>
  </select>
</div>

 <div class="form-group">
    <label for="notes">Notes:</label>
    <input type="text/css" class="form-control" id="notes">
  </div>
<button type="button" class="btn btn-primary active">SUBMIT</button>


</body>
</html>  