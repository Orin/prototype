<?php
$q_user = mysql_query("SELECT * FROM flight");
?>
<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="2">Set Flight Discount</th></tr>
								<tr><td>Discount Type:</td> <td><?php dropdown($discountType);?></td></tr>
								<tr><td>All Class Discount:</td> <td><input type="text" name="AllclassD" ></input></td></tr>
								<tr><td>Econemy Class Discount:</td> <td><input type="text" name="EconD" ></input></td></tr>
								<tr><td>Business Class Discount:</td> <td><input type="text" name="BusinessD" ></input></td></tr>
								<tr><td>Group Class Discount:</td> <td><input type="text" name="GroupD" ></input></td></tr>
								<tr><td>discount Duration(between):</td> <td><?php datePicker();?></input></td></tr>
								<tr><td></td><td> And </td><td></td></tr>
								<tr><td></td> <td><?php datePicker();?></input></td></tr>
								
	
							<tr>
								<td colspan="2"><input type="submit" value="Apply" /></td>
							</tr>
						</table>
	</form>
</div>

<div id="disInfo">
<table border="1" align=left id="displayInfo">
<tr class="d0">
<th><h4>FlightNo</h4></th>
<th><h4>Destination</h4></th>
<th><h4>Departure</h4></th>
<th><h4>Capacity</h4></th>
<th><h4>Economy Seats</h4></th>
<th><h4>Business Seats</h4></th>
<th><h4>Group Seats</h4></th>
<th><h4>Costing Structure</h4></th>
<th><h4>Delete</h4></th>
</tr>

<?php 
for ($i =0;  $i<mysql_num_rows($q_user); $i++)
{
$data = mysql_fetch_array($q_user);
$flightNo = $data['flightNo'];
echo '<tr>';
echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo "<a href=\"flightinfoEdit.php?flightNo=".$flightNo."\">$flightNo</a>";
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['destination'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['departure'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['capacity'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['econemyseats'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['businessseats'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['groupseats'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo $data['price'];
echo '</td>';

echo '<td>';
echo '<a href="page.htm"><img src="icons/delete.gif" /></a>';
echo '</td>';

echo '</tr>';

}?>
</table>
</div>