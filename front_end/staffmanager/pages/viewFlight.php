<?php
$flightNo = $_POST['flightNo'];
$query = "SELECT * FROM flights WHERE flightNo = '$flightNo'";
$result = mysql_query($query);
$data = mysql_fetch_array($result);
?>
<div id="flightContainer">
<table border="1" align=left id="displayInfo" width="50%">

	<tr><th colspan="2"><h4> Flight Details</h4></th></tr>
	<tr><td>FlightNo:</td><td> <?php echo $data['flightNo'];?></td></tr>
	<tr><td>Destination: </td><td><?php echo $data['destination'];?></td></tr>
	<tr><td>Departure: </td><td><?php echo $data['departure'];?></td></tr>
	<tr><td>Capacity: </td><td><?php echo $data['capacity'];?></td></tr>
	<tr><td>Economy Seats:</td><td> <?php echo $data['econSeats'];?></td></tr>
	<tr><td>Business Seats: </td><td><?php echo $data['busSeats'];?></td></tr>
	<tr><td>Group Seats: </td><td><?php echo $data['groupseats'];?></td></tr>
	<tr><td>Economy Price: </td><td>&pound;<?php echo $data['econPrice']; ?></td></tr>
	<tr><td>Business Price: </td><td>&pound;<?php echo $data['busPrice']; ?></td></tr>
	<tr><td>Group Price: </td><td>&pound;<?php echo $data['groupPrice']; ?></td></tr>
</table>

</div>



<div id="scheduleContainer">

<h3> Flight Number: <?php echo $flightNo;?> flight schedules </h3>

<?php
$schedules = "SELECT * FROM flightSchedule WHERE flightNo = '$flightNo'";
$schedules_result = mysql_query($schedules);
showScheduleTable($schedules_result, 'viewFlight.html');
?>
</div>
