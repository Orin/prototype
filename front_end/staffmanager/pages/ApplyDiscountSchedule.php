<?php

$query = 'SELECT * FROM flightSchedule';


if($_POST['depDateStartDay'] != '' || $_POST['depTimeStarthour'] != '' || $_POST['arriveTimeStarthour'] != '')
{
	$query = $query.' WHERE ';
	if($_POST['depDateStartDay'] != '')
	{
		$query = $query.'departuredate >= \''.$_POST['depDateStartYear'].'-'.$_POST['depDateStartMonth'].'-'.$_POST['depDateStartDay'].'\' AND departuredate <= \''.$_POST['depDateEndYear'].'-'.$_POST['depDateEndMonth'].'-'.$_POST['depDateEndDay'].'\' AND ';
	}
	if($_POST['depTimeStarthour'] != '')
	{
		$query = $query.'departureTime >= \''.$_POST['depTimeStarthour'].':'.$_POST['depTimeStartmin'].'\' AND departureTime <= \''.$_POST['depTimeEndhour'].'-'.$_POST['depTimeEndmin'].'\' AND ';
	}
	if($_POST['arriveTimeStarthour'] != '') 
	{
		$query = $query.'arrivalTime >= \''.$_POST['arriveTimeStarthour'].':'.$_POST['arriveTimeStartmin'].'\' AND arrivalTime <= \''.$_POST['arriveTimeEndhour'].'-'.$_POST['arriveTimeEndmin'].'\' AND ';
	}
	$query = substr($query, 0,-4);
}


$_SESSION['applyTo'] = $query;
$_SESSION['type'] = 0;

$q_user = mysql_query($query);


?>


<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="processDiscount.html">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="2">Set Schedule Discount</th></tr>
								<!--<tr><td>Discount Type:</td> <td><?php dropdown($discountType, '', 'dType');?></td></tr>-->
								<input type="hidden" name="dType" value="value"></input>
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
<?php showScheduleTable($q_user); ?>
