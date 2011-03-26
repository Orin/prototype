<?php

$query = 'SELECT * FROM flights';
if($_POST['Fno'] != ''){$query =  $query.' WHERE flightNo= \''.$_POST['Fno'].'\'';}
else
{ 
	if($_POST['Dest'] != '' && $_POST['Dep'] != '') {$query = $query.' WHERE destination = \''.$_POST['Dest'].'\' AND departure = \''.$_POST['Dep'].'\'';}
	else if($_POST['Dep'] != '') {$query = $query.' WHERE departure = \''.$_POST['Dep'].'\'';}
	else if($_POST['Dest'] != '') {$query = $query.' WHERE destination = \''.$_POST['Dest'].'\'';}
}
$_SESSION['applyTo'] = $query;
$_SESSION['type'] = 1;


$q_user = mysql_query($query);
?>
<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="processDiscount.html">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="2">Set Flight Discount</th></tr>
								<!--<tr><td>Discount Type:</td> <td><?php dropdown($discountType, '', 'dType');?></td></tr>-->
								<input type="hidden" name="dType" value="value"></input>
								<tr><td>All Class Discount:</td> <td><input type="text" name="AllclassD" onkeypress="return isNumberKey(event)"></input></td></tr>
								<tr><td>Economy Class Discount:</td> <td><input type="text" name="EconD" onkeypress="return isNumberKey(event)"></input></td></tr>
								<tr><td>Business Class Discount:</td> <td><input type="text" name="BusinessD" onkeypress="return isNumberKey(event)"></input></td></tr>
								<tr><td>Group Class Discount:</td> <td><input type="text" name="GroupD" onkeypress="return isNumberKey(event)"></input></td></tr>
								<tr><td>discount Duration(between):</td> <td><?php datePickerBackEnd('durStart',date("d"),date("m"),date("Y"));?></input></td></tr>
								<tr><td></td><td> And </td><td></td></tr>
								<tr><td></td> <td><?php datePickerBackEnd('durEnd');?></input></td></tr>
	
							<tr>
								<td colspan="2"><input type="submit" value="Apply" /></td>
							</tr>
						</table>
	</form>
</div>
<?php showFlightTable($q_user);?>
