<html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />

<link href="news.css" rel="stylesheet" type="text/css" />

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />

<link href="news.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.zrssfeed.min.js" type="text/javascript"></script>
<script src="jquery.vticker.js" type="text/javascript"></script>
<body>
<div style="width: 600px; text-align: left;">
<form name="Timesheet">
<div id="container" style="width:700px">

<div id="header" style="background-color:#980000 ;">
<h1 style="margin-bottom:0;">Time Sheet</h1></div>

<div id="menu" style="background-color:#C0C0C0;height:200px;width:200px;float:left;">
<p>welcome User</P>
<input name="logout"type="button" action="logout.php" logout>



</div>

<div id="content" style="background-color:#EEEEEE;height:1100px;width:400px;float:left;">




<table>
<tr><th>Day of Week</th><th>start time</th><th>end time</th><th>break</th><th>Job</th></tr>
<?php
	  $myCalendar = new tc_calendar("date5", true, false);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(date('d'), date('m'), date('Y'));
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2000, 2017);
	  $myCalendar->dateAllow('2008-05-13', '2017-03-01');
	  $myCalendar->setDateFormat('j F Y');
	  $myCalendar->setAlignment('left', 'bottom');
	  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
	  $myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
	  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
	  $myCalendar->writeScript();
	  ?>
<tr><td>Monday</td><td>
<input type="text" name="Monday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')"  onblur="calc()">

<select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>




<tr><td>Tuesday</td>
<td><input type="text" name="Tuesday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')" onblur="calc()">
 
 <select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>
</td>
 
 
 
 
 
 
 
 
 
</td></tr>


<tr><td>Wednesday</td>
<td><input type="text" name="Wednesday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')"  onblur="calc()">
 <select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>
</td>
</td></tr>


<tr><td>Thursday</td>
<td><input type="text" name="Thursday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')"  onblur="calc()">
 <select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>
</td>
</td></tr>


<tr><td>Friday</td>
<td><input type="text" name="Friday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')"  onblur="calc()">
 <select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>
</td>
</td></tr>


<tr><td>Saturday</td>
<td><input type="text" name="Saturday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')"  onblur="calc()">
 <select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>
</td>
</td></tr>


<tr><td>Sunday</td>
<td><input type="text" name="Sunday" size="3" maxlength="4" value=""
 onkeypress="return inputLimiter(event,'Numbers')"  onblur="calc()">
 <select>
  <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>

<td>
<select>
   <option value="12am">12am</option>
  <option value="1am">1am</option>
  <option value="2am">2am</option>
  <option value="3am">3am</option>
   <option value="4am">4am</option>
  <option value="5am">5am</option>
   <option value="6am">6am</option>
  <option value="7am">7am</option>
   <option value="8am">8am</option>
  <option value="9am">9am</option>
    <option value="10am">10am</option>
   <option value="11am">11am</option>
  <option value="12pm">12pm</option>
    <option value="1pm">1pm</option>
   <option value="2pm">2pm</option>
  <option value="3pm">3pm</option>
   <option value="4pm">4pm</option>
  <option value="5pm">5pm</option>
  
    <option value="6pm">6pm</option>
    <option value="7pm">7pm</option>
    <option value="8pm">8pm</option>
    <option value="9pm">9pm</option>
	  <option value="10pm">10pm</option>
	  <option value="11pm">11pm</option>
	  	  <option value="12pm">12pm</option>
		  
</select>
</td>
<td>
<input type="text" name="break"value="" size="3"/>
</td>
<td>
<select>
   <option value="Drilling">Drilling</option>
  <option value="cutting">cutting</option>
  <option value="Digging">Digging</option>

		  
</select>
</td>
</td></tr>


<tr>
<td><button type="button">save</button></td>
<td><button type="button">addrow</button></td>
<td><button type="button">submit</button></td>
</td></tr>

<tr><td>Notes:</td>
<td><input type="number" name="ReportTime" id="ReportTime" readonly="readonly" size="5" value="">
</td></tr>

</table>
</form>

<script type="text/javascript" language="javascript">

//////////////////////////////////////////////////////////////////////////////////////////////


function calc(){
  Monday = document.Timesheet.Monday.value;
  Tuesday = document.Timesheet.Tuesday.value; 
  Wednesday = document.Timesheet.Wednesday.value;
  Thursday = document.Timesheet.Thursday.value;
  Friday = document.Timesheet.Friday.value;
  Saturday = document.Timesheet.Saturday.value;
  Sunday = document.Timesheet.Sunday.value;
  var RptTime = (Monday*1) + (Tuesday*1) + (Wednesday*1) + (Thursday*1) + (Friday*1) + (Saturday*1) + (Sunday*1);
  document.Timesheet.Total.value = RptTime.toFixed(2);
  var Frac = 0;
  var Full = parseInt(RptTime);
  RptTimeFrac = RptTime - Full;
  if (RptTimeFrac < 0.25) { Frac = 0; } 
  else { if (RptTimeFrac < 0.5) { Frac = 0.25; }
         else { if (RptTimeFrac < 0.75) { Frac = 0.5; }
                else { Frac = 0.75; }
              }
       }
  document.Timesheet.ReportTime.value = (Full+Frac).toFixed(2);
}

//////////////////////////////////////////////////////////////////////////////////////////////

function inputLimiter(e,allow) {
  var AllowableCharacters = '';
  if (allow == 'Numbers'){AllowableCharacters='.1234567890';}
  var k;
  k=document.all?parseInt(e.keyCode): parseInt(e.which);
  if (k!=13 && k!=8 && k!=0){
    if ((e.ctrlKey==false) && (e.altKey==false)) {
      return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
    } else {
      return true;
    }
  } else {
    return true;
  }
}

//////////////////////////////////////////////////////////////////////////////////////////////

</script>
</div>
</body>
</html>  