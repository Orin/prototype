<?php
$FlightId = $page = (isset($_GET['FlightID']))? $_GET['FlightID'] : null; 

$FlightId = 'ABZ-EDI-101';

$flightData[0] = '';
$flightData[1] = '';
$flightData[2] = '';
$flightData[3] = '';
$flightData[4] = '';
$flightData[5] = '';
$flightData[6] = '';
$flightData[7] = '';
$flightData[8] = '';
$flightData[9] = '';

if($FlightId != null)
	{
		$goto = 'processFlightUpdate.html';
		$query = 'SELECT * FROM flight WHERE flightNo=\''.$FlightId.'\'';
		$result = mysql_query($query);
		$data = mysql_fetch_array($result);
		
		$flightData[0] = $data['flightNo'];
		$flightData[1] = $data['destination'];
		$flightData[2] = $data['departure'];
		$flightData[3] = $data['capacity'];
		$flightData[4] = $data['econemyseats'];
		$flightData[5] = $data['businessseats'];
		$flightData[6] = $data['groupseats'];
		$flightData[7] = $data['econPrice'];
		$flightData[8] = $data['busPrice'];
		$flightData[9] = $data['groupPrice'];
	}
else
	{
		$goto = 'processFlight.html';
	}
	
	

?>


<form name="Flight_info" method="post" action="<?php echo $goto;?>">
	<table border="1" id="inputData">
		<tr ><th colspan="2"><h4>Enter Flight Information</h4></th></tr>
		<tr><td>Flight Number:</td><td> <input type="text" name="FNo" value="<?php echo $flightData[0]; ?>" /></td></tr>
		<tr><td>Flight Destination: </td><td><?php Dropdown($airports,$flightData[1], 'dest');?></td></tr>
		<tr><td>Flight Departure: </td><td><?php Dropdown($airports,$flightData[2], 'dep');?></td></tr>
		<tr><td>Flight Capacity: </td><td><input type="text" name="cap" value="<?php echo $flightData[3]; ?>" /></td></tr>
		<tr><td>No of Economy Seats: </td><td><input type="text" name="econmySeats"value="<?php echo $flightData[4]; ?>" /></td></tr>
		<tr><td>No of Business Seats: </td><td><input type="text" name="busSeats" value="<?php echo $flightData[5]; ?>"/></td></tr>
		<tr><td>No of Group Seats:</td><td> <input type="text" name="groupSeats" value="<?php echo $flightData[6]; ?>"/></td></tr>
		<tr><td>Business Cost:</td><td> <input type="text" name="busCost" value="<?php echo $flightData[8]; ?>" /></td></tr>
		<tr><td>Group Cost:</td><td> <input type="text" name="groupCost" value="<?php echo $flightData[9]; ?>" /></td></tr>
		<tr><td>Econemy Cost:</td><td> <input type="text" name="EconCost" value="<?php echo $flightData[7]; ?>"/></td></tr>
		
		<br/>
		<tr><th colspan="2"><input type="submit" /></th></tr>
	</table>
	
</form>
<br/><br/>
	
</div>
