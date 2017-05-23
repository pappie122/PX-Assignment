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