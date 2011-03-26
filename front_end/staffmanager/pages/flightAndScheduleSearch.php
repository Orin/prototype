<?php
if(isset($_POST['Dest'])) {$criteria[0] = $_POST['Dest'];} else {$criteria[0] = '';}
if(isset($_POST['Dep'])) {$criteria[1] = $_POST['Dep'];} else {$criteria[1] = '';}
if(isset($_POST['depDateYear'])) {$criteria[2] = $_POST['depDateYear'];} else {$criteria[2] = '';}
if(isset($_POST['depDateMonth'])) {$criteria[3] = $_POST['depDateMonth'];} else {$criteria[3] = '';}
if(isset($_POST['depDateDay'])) {$criteria[4] = $_POST['depDateDay'];} else {$criteria[4] = '';}
if(isset($_POST['depTimehour'])) {$criteria[5] = $_POST['depTimehour'];} else {$criteria[5] = '';}
if(isset($_POST['depTimemin'])) {$criteria[6] = $_POST['depTimemin'];} else {$criteria[6] = '';}
if(isset($_POST['avalE'])) {$criteria[7] = $_POST['avalE'];} else {$criteria[7] = '';}
if(isset($_POST['avalB'])) {$criteria[8] = $_POST['avalB'];} else {$criteria[8] = '';}



$query = "SELECT * FROM flights, flightSchedule WHERE flights.flightNo = flightSchedule.FlightNo";

if(!empty($criteria[0]))
{
	$query = $query." AND destination ='$criteria[0]'";
}
if(!empty($criteria[1]))
{
	$query = $query." AND departure ='$criteria[1]'";
}

if(!empty($criteria[2]))
{
	$query = $query." AND YEAR(departuredate) = $criteria[2]";
}

if(!empty($criteria[3]))
{
	$query = $query." AND MONTH(departuredate) = $criteria[3]";
}

if(!empty($criteria[4]))
{
	$query = $query." AND DAY(departuredate) = $criteria[4]";
}

if(!empty($criteria[5]))
{
	$query = $query." AND HOUR(departureTime) = $criteria[5]";
}

if(!empty($criteria[6]))
{
	$query = $query." AND MINUTE(departureTime) = $criteria[6]";
}
$result = mysql_query($query);

?>

<h3>Flights With Schedules</h3>
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
<th><h4>Available Seats</h4></th>
</tr>

<?php 



for ($i =0;  $i<mysql_num_rows($result); $i++)
{
  $data = mysql_fetch_array($result);
 
  $ScheduleID = $data['ScheduleID'];
  $FlightNo = $data['flightNo'];
  if(!empty($criteria[7])) {if (availableSeats($ScheduleID, 'Economy')<$criteria[7]){continue;}}
  if(!empty($criteria[8])) {if (availableSeats($ScheduleID, 'Business')<$criteria[8]){continue;}}

echo '<tr>';
echo '<td>';
echo '<a href="javascript:postValue(\'scheduleInfo.html\', {scheduleID:\''.$ScheduleID.'\'});">'.$ScheduleID.'</a>';
echo '</td>';

echo '<td>';
echo '<a href="javascript:postValue(\'viewFlight.html\', {flightNo:\''.$FlightNo.'\'});">'.$FlightNo.'</a>';  
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
echo availableSeats($ScheduleID, 'Economy');
echo '</td>';

echo '<td>';
echo availableSeats($ScheduleID, 'Business');
echo '</td>';


echo '<td>';
echo availableSeats($ScheduleID, 'Business') + availableSeats($ScheduleID, 'Economy');
echo '</td>';

echo '</tr>';

}?>
</table>
</div>

<h3>All Flights</h3>
<?php

$query = "SELECT * FROM flights WHERE ";

if(!empty($criteria[0]))
{
	$query = $query." destination ='$criteria[0]' AND";
}
if(!empty($criteria[1]))
{
	$query = $query." departure ='$criteria[1]' AND";
}

$query = substr($query, 0,-3);

$result = mysql_query($query);

showFlightTable($result, 'flightAndScheduleSearch.html',$criteria);
?>



