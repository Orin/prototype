<?php
$FlightId = $page = (isset($_POST['flightNo']))? $_POST['flightNo'] : null; 


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
		$query = 'SELECT * FROM flights WHERE flightNo=\''.$FlightId.'\'';
		$result = mysql_query($query);
		$data = mysql_fetch_array($result);
		
		$flightData[0] = $data['flightNo'];
		$flightData[1] = $data['destination'];
		$flightData[2] = $data['departure'];
		$flightData[3] = $data['capacity'];
		$flightData[4] = $data['econSeats'];
		$flightData[5] = $data['busSeats'];
		$flightData[6] = $data['groupSeats'];
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
		<tr><td>Flight Number:<div id="invalF" style="visibility:hidden">Invalid FlightNo</div></td><td> <input type="text" name="FNo" value="<?php echo $flightData[0]; ?>"onBlur="formVal('flightInfo', 'isFlightNo')" /></td></tr>
		<tr><td>Flight Destination:<div>&nbsp;</div></td><td><?php Dropdown($airports,$flightData[1], 'dest');?></td></tr>
		<tr><td>Flight Departure:<div>&nbsp;</div></td><td><?php Dropdown($airports,$flightData[2], 'dep');?></td></tr>
		<tr><td>Flight Capacity: <div id="invalCap" style="visibility:hidden">Ivalid Capacity</div></td><td><input type="text" name="cap" value="<?php echo $flightData[3]; ?>" onBlur="formVal('invalCap', 'GreaterThan0')"/></td></tr>
		<tr><td>No of Economy Seats: <div id="invalES" style="visibility:hidden">Invalid Seats</div></td><td><input type="text" name="econmySeats"value="<?php echo $flightData[4]; ?>" onBlur="formVal('invalES', 'GreaterThan0')"/></td></tr>
		<tr><td>No of Business Seats: <div id="invalBS" style="visibility:hidden">Invalid Seats</div></td><td><input type="text" name="busSeats" value="<?php echo $flightData[5]; ?>"onBlur="formVal('invalBS', 'GreaterThan0')"/></td></tr>
		<tr><td>No of Group Seats:<div id="invalGS" style="visibility:hidden">Invalid Seats</div></td><td> <input type="text" name="groupSeats" value="<?php echo $flightData[6]; ?>"onBlur="formVal('invalGS', 'GreaterThan0')"/></td></tr>
		<tr><td>Business Cost:<div id="invalBC" style="visibility:hidden">Invalid Price</div></td><td> <input type="text" name="busCost" value="<?php echo $flightData[8]; ?>" onBlur="formVal('invalBC', 'GreaterThan0')"/></td></tr>
		<tr><td>Group Cost:<div id="invalGC" style="visibility:hidden">Invalid Price</div></td><td> <input type="text" name="groupCost" value="<?php echo $flightData[9]; ?>" onBlur="formVal('invalGC', 'GreaterThan0')"/></td></tr>
		<tr><td>Econemy Cost:<div id="invalEC" style="visibility:hidden">Invalid Price</div></td><td> <input type="text" name="EconCost" value="<?php echo $flightData[7]; ?>"onBlur="formVal('invalEC', 'GreaterThan0')"/></td></tr>
		
		<br/>
		<tr><th colspan="2"><input type="submit" /></th></tr>
	</table>
	
</form>
<br/><br/>
	
</div>
