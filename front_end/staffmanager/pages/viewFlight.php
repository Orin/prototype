<?php
$flightNo = $_POST['flightNo'];
$query = "SELECT * FROM flight WHERE flightNo = '$flightNo'";
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
	<tr><td>Economy Seats:</td><td> <?php echo $data['econemyseats'];?></td></tr>
	<tr><td>Business Seats: </td><td><?php echo $data['businessseats'];?></td></tr>
	<tr><td>Group Seats: </td><td><?php echo $data['groupseats'];?></td></tr>
	<tr><td>Economy Price: </td><td>&pound;<?php echo $data['econPrice']; ?></td></tr>
	<tr><td>Business Price: </td><td>&pound;<?php echo $data['busPrice']; ?></td></tr>
	<tr><td>Group Price: </td><td>&pound;<?php echo $data['groupPrice']; ?></td></tr>
</table>

</div>



<div id="scheduleContainer">

<h3> Flight Number: <?php echo $flightNo;?> flight schedules </h3>

<table border="1" align=left id="displayInfo">
<tr>
<th><h4>ScheduleID</h4></th>
<th><h4>FlightNo</h4></th>
<th><h4>Departure Date</h4></th>
<th><h4>Departure Time</h4></th>
<th><h4>Arrival time</h4></th>
<th><h4>Available Economy Seats</h4></th>
<th><h4>Available Business Seats</h4></th>
<th><h4>Available Group Seats</h4></th>
<th><h4>Available Seats</h4></th>
</tr>

<?php
$schedules = "SELECT * FROM flightSchedule WHERE flightNo = '$flightNo'";
$schedules_result = mysql_query($schedules);

for ($i =0;  $i<mysql_num_rows($schedules_result); $i++)
{
$schedule_data = mysql_fetch_array($schedules_result);
$ScheduleID = $schedule_data['ScheduleID'];
$FlightNo = $schedule_data['FlightNo'];

echo '<tr>';
echo '<td>';
echo "<a href=\"scheduleInfoEdit.html\">$ScheduleID</a>";
echo '</td>';

echo '<td>';
echo "<a href=\"flightinfoEdit.html\">$FlightNo</a>";  
echo '</td>';

echo '<td>';
echo $schedule_data['departuredate'];
echo '</td>';

echo '<td>';
echo $schedule_data['departureTime'];
echo '</td>';

echo '<td>';
echo $schedule_data['arrivalTime'];
echo '</td>';

echo '<td>';
echo $schedule_data['availableEconomySeats'];
echo '</td>';

echo '<td>';
echo $schedule_data['availableBusinessSeats'];
echo '</td>';

echo '<td>';
echo $schedule_data['availableGroupSeats'];
echo '</td>';

echo '<td>';
echo $schedule_data['availableSeats'];
echo '</td>';

echo '</tr>';

}?>
</table>
</div>
</div>
