<?php 
if (isset ($_POST['bookingID'])) {$bookingID = $_POST['bookingID']; $_SESSION['bookingID'] =  $_POST['bookingID'];}
else {$bookingID = $_SESSION['bookingID'];}


if (isset($_POST['scheduleID'])) {$scheduleID = $_POST['scheduleID'];}
else {$scheduleID = null;}

$query = "SELECT * FROM bookings where bookingID = '$bookingID'";
$result = mysql_query($query);
$data = mysql_fetch_array($result);

$getclass = "SELECT className FROM classes WHERE classID = ".$data['classID']."";
$class = mysql_query($query);
$clasname = mysql_fetch_array($class);

$classes[0] = "Economy";
$classes[1] = "Business";

?>


	<form name="Flight_info" method="post" action="processEditBooking.html" >
		<table border="1" id="inputData">
			<th colspan="2">Edit Booking</th>
			<tr><td>Booking ID: </td><td><label><?php echo $bookingID; ?></label></td></tr>
			<tr><td>Schedule ID:  </td><td><input type="text" name="scheduleID" value="<?php if($scheduleID != null) {echo $scheduleID;} else {echo $data['FlightScheduleID'];} ?>" ></input></td></tr>
			<tr><td>Flight Class:  </td><td><?php dropdown($classes,$clasname,'class'); ?></td></tr>
			<input type="hidden" name="bookingID" value="<?php echo $bookingID; ?>" />
			<tr><th colspan="2"><input type="submit" /></tr></tr>
		</table>
</form>

<p>to change flight schdule please select a schedule fom below </p>

<?php
if (isset($_SESSION['refine'])) 	{$q_user = mysql_query($_SESSION['refine']); unset($_SESSION['refine']);}
else 								{$q_user = mysql_query("SELECT * FROM flightSchedule");}
?>

<div id="refine">

	<form name="Flight_info" method="post" action="refineSchedule.html" align=right>
						<table border="0" id="ResultRefine">
								
								<tr><th colspan="2">Refine Schedules</th></tr>
								<tr><td>FlightNo:</td> <td><input type="text" name="FNo" ></input></td></tr>
								<tr><td>Departure Date:</td> <td><?php datePickerBackEnd('depDate');?></td></tr>
								<tr><td>Departure Time:</td> <td><?php timePicker(-1,-1,'depTime');?></td></tr>
								<input name="goto" type="hidden" value="editBooking.html"/>
	
							<tr>
								<td colspan="2"><input type="submit" value="Search" /></td>
							</tr>
						</table>
	</form>


</div>

<?php 
showScheduleTable($q_user, 'editFlightSchedule.html','editBooking.html');
?>
