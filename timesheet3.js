     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
     $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='Job"+i+"' type='text' placeholder='Job' class='form-control input-md'  /> </td><td><input  name='Date"+i+"' type='date' placeholder='Date'  class='form-control input-md'></td><td><input  name='StartTime"+i+"' type='text' placeholder='StartTime'  class='form-control input-md'></td><td><input  name='EndTime"+i+"' type='text' placeholder='EndTime'  class='form-control input-md' /></td><td><input  name='Break"+i+"' type='text' placeholder='Break'  class='form-control input-md' /></td><td><input  name='Comment"+i+"' type='text' placeholder='Comment'  class='form-control input-md' /></td>");
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