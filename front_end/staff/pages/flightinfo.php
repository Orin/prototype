<?php
$FlightId = $page = (isset($_GET['FlightID']))? $_GET['FlightID'] : null; 

if (!is_null($FlightId))
{
	$q_user = mysql_query("SELECT * FROM flightSchedule WHERE FlightID = '".$FlightId."'");
	if(mysql_num_rows($q_user) != 1)
	{
		echo 'something really wierd just happened';
	}
	$data = mysql_fetch_array($q_user);
} else {
	$data['FlightID'] = "";
}
?>


<form name="Flight_info" method="post" action="processFlight.html">
	<table border="1" id="inputData">
		<tr ><th colspan="2"><h4>Enter Flight Information</h4></th></tr>
		<tr><td>Flight Number:</td><td> <input type="text" name="FNo"/></td></tr>
		<tr><td>Flight Destination: </td><td><?php dropDown($airports);?></td></tr>
		<tr><td>Flight Departure: </td><td><?php dropDown($airports);?></td></tr>
		<tr><td>Flight Capacity: </td><td><input type="text" name="cap"  /></td></tr>
		<tr><td>No of Economy Seats: </td><td><input type="text" name="econmySeats" /></td></tr>
		<tr><td>No of Business Seats: </td><td><input type="text" name="busSeats" /></td></tr>
		<tr><td>No of Group Seats:</td><td> <input type="text" name="groupSeats" /></td></tr>
		<tr><td>Business Cost:</td><td> <input type="text" name="groupSeats" /></td></tr>
		<tr><td>Group Cost:</td><td> <input type="text" name="groupSeats" /></td></tr>
		<tr><td>Individual Cost:</td><td> <input type="text" name="groupSeats" /></td></tr>
		
		<br/>
		<tr><th colspan="2"><input type="submit" /></th></tr>
	</table>
	
</form>
<br/><br/>
	
</div>
