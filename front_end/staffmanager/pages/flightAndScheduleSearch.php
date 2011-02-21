<?php
$criteria[0] = $_POST['Dest'];
$criteria[1] = $_POST['Dep'];

$criteria[2] = $_POST['depDateyear'];
$criteria[3] = $_POST['depDatemonth'];
$criteria[4] = $_POST['depDateday'];

$criteria[5] = $_POST['depTimehour'];
$criteria[6] = $_POST['depTimemin'];

$criteria[7] = $_POST['avalE'];
$criteria[8] = $_POST['avalB'];
$criteria[9] = $_POST['avalG'];


$query = "SELECT DISTINCT * FROM flight, flightSchedule WHERE flight.flightNo = flightSchedule.FlightNo";

if(!empty($criteria[0]))
{
	$query = $query." AND destination ='$criteria[0]'";
}
if(!empty($criteria[1]))
{
	$query = $query." AND departure ='$criteria[1]'";
}
if(!empty($criteria[2]) && !empty($criteria[3]) && !empty($criteria[4]))
{
	$query = $query." AND departuredate ='".$criteria[2].'-'.$criteria[3].'-'.$criteria[4]."'";
}
if(!empty($criteria[5]) && !empty($criteria[6]))
{
	$query = $query." AND departureTime ='".$criteria[5].':'.$criteria[6]."'";
}
if(!empty($criteria[7]))
{
	$query = $query." AND availableEconomySeats >='$criteria[7]'";
}
if(!empty($criteria[8]))
{
	$query = $query." AND availableBusinessSeats >='$criteria[8]'";
}
if(!empty($criteria[9]))
{
	$query = $query." AND availableGroupSeats >='$criteria[9]'";
}


$result = mysql_query($query);

?>


<table border="1" align=left id="displayInfo">
<tr>
<th><h4>ScheduleID</h4></th>
<th><h4>FlightNo</h4></th>
<th><h4>Departure</h4></th>
<th><h4>Destination</h4></th>
<th><h4>Departure Date</h4></th>
<th><h4>Departure Time</h4></th>
<th><h4>Arrival time</h4></th>
<th><h4>Available Economy Seats</h4></th>
<th><h4>Available Business Seats</h4></th>
<th><h4>Available Group Seats</h4></th>
<th><h4>Available Seats</h4></th>
</tr>

<?php 



for ($i =0;  $i<mysql_num_rows($result); $i++)
{
  $data = mysql_fetch_array($result);
 
  $ScheduleID = $data['ScheduleID'];
  $FlightNo = $data['flightNo'];

echo '<tr>';
echo '<td>';
echo "<a href=\"scheduleInfoEdit.html\">$ScheduleID</a>";
echo '</td>';

echo '<td>';
echo "<a href=\"viewFlight.html\">$FlightNo</a>";  
echo '</td>';

echo '<td>';
echo $data['departure'];
echo '</td>';

echo '<td>';
echo $data['destination'];
echo '</td>';

echo '<td>';
echo $data['departuredate'];
echo '</td>';

echo '<td>';
echo $data['departureTime'];
echo '</td>';

echo '<td>';
echo $data['arrivalTime'];
echo '</td>';

echo '<td>';
echo $data['availableEconomySeats'];
echo '</td>';

echo '<td>';
echo $data['availableBusinessSeats'];
echo '</td>';

echo '<td>';
echo $data['availableGroupSeats'];
echo '</td>';

echo '<td>';
echo $data['availableSeats'];
echo '</td>';

echo '</tr>';

}?>
</table>
</div>



