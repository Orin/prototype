<?php
$allFlights = incomeAllFlights();

while ($row = mysql_fetch_array($allFlights))
{
	echo '<br/>';
	echo $row['FlightNo'];
	echo $row['sum(totalCost)'];
	
}

?>
