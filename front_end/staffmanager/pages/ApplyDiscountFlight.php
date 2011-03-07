<?php

$query = 'SELECT * FROM flight';
if($_POST['Fno'] != ''){$query =  $query.' WHERE flightNo= \''.$_POST['Fno'].'\'';}
else
{ 
	if($_POST['Dest'] != '' && $_POST['Dep'] != '') {$query = $query.' WHERE destination = \''.$_POST['Dest'].'\' AND departure = \''.$_POST['Dep'].'\'';}
	else if($_POST['Dep'] != '') {$query = $query.' WHERE departure = \''.$_POST['Dep'].'\'';}
	else if($_POST['Dest'] != '') {$query = $query.' WHERE destination = \''.$_POST['Dest'].'\'';}
}
$_SESSION['applyTo'] = $query;


$q_user = mysql_query($query);
?>
<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="processDiscount.html">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="2">Set Flight Discount</th></tr>
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
<?php showFlightTable($q_user);?>