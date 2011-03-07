<?php

$flightNo = $_POST['FNo'];
$destination = $_POST['dest'];
$departure = $_POST['dep'];
$capacity = $_POST['cap'];
$econS = $_POST['econmySeats'];
$bussS = $_POST['busSeats'];
$gropS = $_POST['groupSeats'];
$bCost = $_POST['busCost'];
$eCost = $_POST['EconCost'];
$gCost = $_POST['groupCost'];

$update = "UPDATE flight SET destination='$destination', departure='$departure', capacity=$capacity, econemyseats=$econS, businessseats=$bussS, groupseats=$gropS, econPrice=$eCost, busPrice=$bCost, groupPrice=$gCost WHERE flightNo='$flightNo' ";

echo $update;
if (!mysql_query($update)){
	?><table border="1" id="error">
	<th colspan="2">MySql database error</th>;
	<tr bgcolor="#FF6633" ><td>Database Element</td><td>Error reason</td></tr>
	<tr><td>
	cannot update flight:
		<table id="displayInfo" border="1">
		<tr><td>flightNo:</td><td><?php echo $flightNo;?></td></tr>
		<tr><td>destination:</td><td><?php echo $destination;?></td></tr>
		<tr><td>departure:</td><td><?php echo $departure;?></td></tr>
		<tr><td>capacity:</td><td><?php echo $capacity;?></td></tr>
		<tr><td>ecconemy seats:</td><td><?php echo $econS;?></td></tr>
		<tr><td>business seats:</td><td><?php echo $bussS;?></td></tr>
		<tr><td>group seats:</td><td><?php echo $gropS;?></td></tr>
		<tr><td>Economy Price:</td><td><?php echo $eCost;?></td></tr>
		<tr><td>Business Price:</td><td><?php echo $bCost;?></td></tr>
		<tr><td>Group Price:</td><td><?php echo $gCost;?></td></tr>
		</table>; 
	</td><td>
	<?php echo 'Error: '. mysql_error();?>
	</td></tr>
	</table>
	<?php }
	
  else{ ?>
	  <table border="1" id="sucessful">
	<th>flight sucessfully updated</th>
	<tr><td>
		<table id="displayInfo" border="1" width=100%>
		<tr><td>FlightNo:</td><td><?php echo $flightNo;?></td></tr>
		<tr><td>Destination:</td><td><?php echo $destination;?></td></tr>
		<tr><td>Departure:</td><td><?php echo $departure;?></td></tr>
		<tr><td>Capacity:</td><td><?php echo $capacity;?></td></tr>
		<tr><td>Ecconemy seats:</td><td><?php echo $econS;?></td></tr>
		<tr><td>Business seats:</td><td><?php echo $bussS;?></td></tr>
		<tr><td>Group seats:</td><td><?php echo $gropS;?></td></tr>
		<tr><td>Economy Price:</td><td><?php echo $eCost;?></td></tr>
		<tr><td>Business Price:</td><td><?php echo $bCost;?></td></tr>
		<tr><td>Group Price:</td><td><?php echo $gCost;?></td></tr>
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