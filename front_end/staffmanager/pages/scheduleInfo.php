<?php

$ScheduleID = $page = (isset($_POST['scheduleID']))? $_POST['scheduleID'] : null; 

$scheduleData[0] = '';
$scheduleData[1] = '';
$scheduleData[2] = '';
$scheduleData[3] = -1;
$scheduleData[4] = -1;
$scheduleData[5] = -1;
$scheduleData[6] = -1;
$scheduleData[7] = -1;
$scheduleData[8] = -1;
$scheduleData[9] = -1;
$scheduleData[10] = -1;
$scheduleData[11] = -1;


if (!is_null($ScheduleID))
{

	$goto = 'processscheduleEdit.html';
	$q_user = mysql_query("SELECT * FROM flightSchedule WHERE ScheduleID = $ScheduleID");
	$data = mysql_fetch_array($q_user);
	
	$scheduleData[0] = $data['ScheduleID'];
	$scheduleData[1] = $data['FlightNo'];
		
		$scheduleData[2] = substr($data['departuredate'], 0,4);
		$scheduleData[3] = substr($data['departuredate'], 5,2);
		$scheduleData[4] = substr($data['departuredate'], 8,2);

		$scheduleData[5] = substr($data['departureTime'], 0,2);
		$scheduleData[6] = substr($data['departureTime'], 3,2);
		
		$scheduleData[7] = substr($data['arrivalTime'], 0,2);
		$scheduleData[8] = substr($data['arrivalTime'], 3,2);
		
		$scheduleData[9] = substr($data['arrivalDate'], 0,4);
		$scheduleData[10] = substr($data['arrivalDate'], 5,2);
		$scheduleData[10] = substr($data['arrivalDate'], 8,2);

}
else
{
	$goto = 'processSchedule.html';
}



?>
	<form name="Schedule_info" method="post" onsubmit="return validate('Schedule_info',['FlightNo','depDateDay','depDateMonth','depDateYear','depTimehour','depTimemin','ArrivTimehour','ArrivTimemin','ArrivDateDay','ArrivDateMonth','ArrivDateYear'],['Flight Number','Departure Date','Departure Date','Departure Date','Departure Time','Departure Time','Arrival Time','Arrival Time','Arrival Date','Arrival Date'])" action="<?php echo $goto;?>" >
		<table border="1" id="inputData">
			<th colspan="2">Enter Schedule Information</th>
			<?php if($scheduleData[0] != '') { ?>
			<tr><td>ScheduleID: </td><td> <input type="text" name="schID" value="<?php echo $scheduleData[0]; ?>" readonly></input></td></tr>
			<?php } ?>
			<tr><td>FlightNo:  <div id="invalF" style="visibility:hidden">Invalid FlightNo</div></td><td><input type="text" name="FlightNo" value="<?php echo $scheduleData[1]; ?>" onBlur="formVal('invalF','Schedule_info', 'FlightNo', 'isFlightNo');" /></input></td></tr>
			<tr><td>Departure Date:  </td><td><?php datePickerBackEnd('depDate',$scheduleData[4],$scheduleData[3],$scheduleData[2]);?></td></tr>
			<tr><td>Departure Time:  </td><td><?php timePicker($scheduleData[5],$scheduleData[6],'depTime');?></input></td></tr>
			<tr><td>Arrival Time:  </td><td><?php timePicker($scheduleData[7],$scheduleData[8],'ArrivTime');?></input></td></tr>
			<tr><td>Arrival Date:  </td><td><?php datePickerBackEnd('ArrivDate',$scheduleData[4],$scheduleData[3],$scheduleData[2]);?></td></tr>
			<tr><th colspan="2"><input type="submit" /></tr></tr>
		</table>
</form>
