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
<?php showFlightTable($q_user);?>