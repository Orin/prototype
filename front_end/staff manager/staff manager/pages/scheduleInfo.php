<?php

$ScheduleID = $page = (isset($_GET['ScheduleID']))? $_GET['ScheduleID'] : null; 


if (!is_null($ScheduleID))
{
	$q_user = mysql_query("SELECT * FROM flightSchedule WHERE ScheduleID = $ScheduleID");

	if(mysql_num_rows($q_user) != 1)
	{
		echo 'something really weard just happened';
	}
	$data = mysql_fetch_array($q_user);
}
?>




	<form name="Flight_info" method="post" action="processSchedule.html" >
		<table border="1" id="inputData">
			<th colspan="2">Enter Schedule Information</th>
			<tr><td>ScheduleID: </td><td> <input type="text" name="schID" ></input></td></tr>
			<tr><td>FlightNo:  </td><td><input type="text" name="FlightNo"></input></td></tr>
			<tr><td>Departure Date:  </td><td><?php datePicker();?></td></tr>
			<tr><td>Departure Time:  </td><td><?php timePicker();?></input></td></tr>
			<tr><td>Arrival Time:  </td><td><?php timePicker();?></input></td></tr>
			<tr><th colspan="2"><input type="submit" /></tr></tr>
		</table>
</form>
