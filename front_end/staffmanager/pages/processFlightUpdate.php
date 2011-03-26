<?php

$flightNo = $_POST['FNo'];
$destination = $_POST['dest'];
$departure = $_POST['dep'];
$capacity = $_POST['cap'];
$econS = $_POST['econmySeats'];
$bussS = $_POST['busSeats'];
$bCost = $_POST['busCost'];
$eCost = $_POST['EconCost'];
$flightNo = makeCaps($flightNo);
$update = "UPDATE flights SET destination='$destination', departure='$departure', capacity=$capacity, econSeats=$econS, busSeats=$bussS, econPrice=$eCost, busPrice=$bCost WHERE flightNo='$flightNo' ";

if (!mysql_query($update)){
	?><table border="1" id="error">
	<th colspan="2">MySql database error</th>;
	<tr bgcolor="#FF6633" ><td>Database Element</td><td>Error reason</td></tr>
	<tr><td>
	cannot update flight:
		<table id="displayInfo" border="1">
		<tr><td>FlightNo:</td><td><?php echo $flightNo;?></td></tr>
		<tr><td>Destination:</td><td><?php echo $destination;?></td></tr>
		<tr><td>Departure:</td><td><?php echo $departure;?></td></tr>
		<tr><td>Capacity:</td><td><?php echo $capacity;?></td></tr>
		<tr><td>Ecconemy Seats:</td><td><?php echo $econS;?></td></tr>
		<tr><td>Business Seats:</td><td><?php echo $bussS;?></td></tr>
		<tr><td>Economy Price:</td><td><?php echo $eCost;?></td></tr>
		<tr><td>Business Price:</td><td><?php echo $bCost;?></td></tr>
		</table>; 
	</td><td>
	<?php echo 'Error: '. mysql_error();?>
	</td></tr>
	</table>
	<?php }
	
  else{ ?>
	  <table border="1" id="sucessful">
	<th>Flight Sucessfully Updated</th>
	<tr><td>
		<table id="displayInfo" border="1" width=100%>
		<tr><td>FlightNo:</td><td><?php echo $flightNo;?></td></tr>
		<tr><td>Destination:</td><td><?php echo $destination;?></td></tr>
		<tr><td>Departure:</td><td><?php echo $departure;?></td></tr>
		<tr><td>Capacity:</td><td><?php echo $capacity;?></td></tr>
		<tr><td>Ecconemy seats:</td><td><?php echo $econS;?></td></tr>
		<tr><td>Business seats:</td><td><?php echo $bussS;?></td></tr>
		<tr><td>Economy Price:</td><td><?php echo $eCost;?></td></tr>
		<tr><td>Business Price:</td><td><?php echo $bCost;?></td></tr>
		</table>
	</td></tr>
	</table>
	  
  <?php } ?>
 
		<br/>
		<?php echo date('l jS \of F Y h:i:s A'); ?>
		<br/>
 		<form>
		<input type="button" value="print"/>
		</form>
