<?php

$query = 'SELECT * FROM flightSchedule';


$_SESSION['applyTo'] = $query;
$_SESSION['type'] = 0;


$q_user = mysql_query($query);


?>


<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="processDiscount.html">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="2">Set Schedule Discount</th></tr>
								<tr><td>Discount Type:</td> <td><?php dropdown($discountType, '', 'dType');?></td></tr>
								<tr><td>All Class Discount:</td> <td><input type="text" name="AllclassD" ></input></td></tr>
								<tr><td>Econemy Class Discount:</td> <td><input type="text" name="EconD" ></input></td></tr>
								<tr><td>Business Class Discount:</td> <td><input type="text" name="BusinessD" ></input></td></tr>
								<tr><td>Group Class Discount:</td> <td><input type="text" name="GroupD" ></input></td></tr>
								<tr><td>discount Duration(between):</td> <td><?php datePickerBackEnd('durStart');?></input></td></tr>
								<tr><td></td><td> And </td><td></td></tr>
								<tr><td></td> <td><?php datePickerBackEnd('durEnd');?></input></td></tr>
								
	
							<tr>
								<td colspan="2"><input type="submit" value="Apply" /></td>
							</tr>
						</table>
	</form>
</div>

<div id="disInfo">

<table border="1" align=left id="displayInfo">
<tr>
<th><h4>ScheduleID</h4></th>
<th><h4>FlightNo</h4></th>
<th><h4>Departure Date</h4></th>
<th><h4>Departure Time</h4></th>
<th><h4>Arrival time</h4></th>
<th><h4>Discount</h4></th>
<th><h4>Delete</h4></th>
</tr>

<?php 
for ($i =0;  $i<mysql_num_rows($q_user); $i++)
{
$data = mysql_fetch_array($q_user);
$ScheduleID = $data['ScheduleID'];
$FlightNo = $data['FlightNo'];
echo '<tr>';
echo '<td onClick="select('.$ScheduleID.',2);"">';
echo "<a href=\"scheduleInfoEdit.php?ScheduleID=".$ScheduleID."\">$ScheduleID</a>";
echo '</td>';

echo '<td>';
echo "<a href=\"ViewFlight.php?FNo=".$FlightNo."\">$FlightNo</a>";  
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);"">';
echo $data['departuredate'];
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);"">';
echo $data['departureTime'];
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);"">';
echo $data['arrivalTime'];
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);"">';
echo '0';
echo '</td>';

echo '<td>';
echo '<a href="page.htm"><img src="icons/delete.gif" /></a>';
echo '</td>';

echo '</tr>';

}?>
</table>

</div>