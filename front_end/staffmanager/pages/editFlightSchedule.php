<?php
if (isset($_SESSION['refine'])) 	{$q_user = mysql_query($_SESSION['refine']); unset($_SESSION['refine']);}
else 								{$q_user = mysql_query("SELECT * FROM flightSchedule");}
?>

<div id="refine">

	<form name="Flight_info" method="post" action="refineSchedule.html" align=right>
						<table border="0" id="ResultRefine">
								
								<tr><th colspan="2">Refine Schedules</th></tr>
								<tr><td>FlightNo:</td> <td><input type="text" name="FNo" ></input></td></tr>
								<tr><td>Departure Date:</td> <td><?php datePickerBackEnd('depDate');?></td></tr>
								<tr><td>Departure Time:</td> <td><?php timePicker(-1,-1,'depTime');?></td></tr>
	
							<tr>
								<td colspan="2"><input type="submit" value="Search" /></td>
							</tr>
						</table>
	</form>


</div>

<div id="disInfo">

<table border="1" align=left id="displayInfo">
<tr>
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

echo '<td>';
echo '10% (if percent selected in discount)<br/>';
echo '&pound20 (if value selected in discount)';
echo '</td>';

echo '<td>';
echo '<a href="page.htm"><img src="icons/delete.gif" /></a>';
echo '</td>';



echo '</tr>';

}?>
</table>

</div>
