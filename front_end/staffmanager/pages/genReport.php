<?php
$allFlights = flightFrequency(3);

while ($row = mysql_fetch_array($allFlights))
{
	echo '<br/>';
	echo $row['flightNo'];
	echo $row['count(flightSchedule.FlightNo)'];
	
}
buildTable(revByClass(3));
?>
