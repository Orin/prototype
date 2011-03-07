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
$_SESSION['type'] = 1;


$q_user = mysql_query($query);
?>
<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="processPriceChange.html">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="2">Set Flight Discount</th></tr>
								<tr><td>All Class Adjustment:</td> <td><input type="text" name="AllclassA" ></input></td></tr>
								<tr><td>Econemy Class Adjustment:</td> <td><input type="text" name="EconA" ></input></td></tr>
								<tr><td>Business Class Adjustment:</td> <td><input type="text" name="BusinessA" ></input></td></tr>
								<tr><td>Group Class Adjustment:</td> <td><input type="text" name="GroupA" ></input></td></tr>

							<tr>
								<td colspan="2"><input type="submit" value="Apply" /></td>
							</tr>
						</table>
	</form>
</div>

<?php showFlightTable($q_user);?>