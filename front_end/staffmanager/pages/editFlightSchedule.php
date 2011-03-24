<?php
if (isset($_SESSION['refine'])) 	{$q_user = mysql_query($_SESSION['refine']); unset($_SESSION['refine']);}
else if(isset($_POST['refine']))	{$q_user = mysql_query($_POST['refine']);}
else 								{$q_user = mysql_query("SELECT * FROM flightSchedule");}
?>

<div id="refine">

	<form name="Flight_info" method="post" action="refineSchedule.html" align=right>
						<table border="0" id="ResultRefine">
								
								<tr><th colspan="2">Refine Schedules</th></tr>
								<tr><td>FlightNo:<div id="invalF" style="visibility:hidden">Invalid FlightNo</div></td> <td><input type="text" name="FNo" onBlur="formVal('invalF', 'isFlightNo')" ></input></td></tr>
								<tr><td>Departure Date:</td> <td><?php datePickerBackEnd('depDate');?></td></tr>
								<tr><td>Departure Time:</td> <td><?php timePicker(-1,-1,'depTime');?></td></tr>
	
							<tr>
								<td colspan="2"><input type="submit" value="Search" /></td>
							</tr>
						</table>
	</form>


</div>

<?php 
showScheduleTable($q_user, 'editFlightSchedule.html');
?>

