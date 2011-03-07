<?php 
function autoFill($dataSet, $divName)
{ ?>
	<SCRIPT >
	
	
	function autoFillsPre(key,textBox, divname) 
	{
	
		var dataSet=[];
		
		dataSet[0] = 'hi';
		dataSet[1] = 'hffffi';
	<?php	for ($i =0;  $i<count($dataSet); $i++) { ?>
		dataSet[<?php echo $i; ?>] = '<?php echo $dataSet[$i]; ?>';
	<?php } ?>
	autoFills(key,textBox,dataSet,divname);
	
	}

	</SCRIPT>
	
	<?php echo '<div id="'.$divName.'"><input  id="blargh" type=text autocomplete="off" name="FNo" onkeyup="autoFillsPre(event.keyCode,this,\''.$divName.'\');"/></div>';
}

function accessLevel ($page, $level)
{
	return true;

}

function showFlightTable($q_user)
{
echo '<div id="disInfo">';
echo '<table border="1" align=left id="displayInfo">';
echo '<tr class="d0">';
echo '<th><h4>FlightNo</h4></th>';
echo '<th><h4>Destination</h4></th>';
echo '<th><h4>Departure</h4></th>';
echo '<th><h4>Capacity</h4></th>';
echo '<th><h4>Economy Seats</h4></th>';
echo '<th><h4>Business Seats</h4></th>';
echo '<th><h4>Group Seats</h4></th>';
echo '<th><h4>Business Cost</h4></th>';
echo '<th><h4>Economy Cost</h4></th>';
echo '<th><h4>Group Cost</h4></th>';
echo '<th><h4>Discount All Classes</h4></th>';
echo '<th><h4>Delete</h4></th>';
echo '</tr>';

for ($i =0;  $i<mysql_num_rows($q_user); $i++)
{
$data = mysql_fetch_array($q_user);
$flightNo = $data['flightNo'];
$discounts = getDiscounts($flightNo, 1);
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
echo ($data['busPrice']*(1-($discounts[4]/100)))-$discounts[5].'(&pound'.$data['busPrice'].')';
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo ($data['econPrice']*(1-($discounts[2]/100)))-$discounts[3].'(&pound'.$data['econPrice'].')';
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo ($data['groupPrice']*(1-($discounts[6]/100)))-$discounts[7].'(&pound'.$data['groupPrice'].')';
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo 'percentage : %'.$discounts[0].'<BR/>';
echo 'value :    &pound'.$discounts[1];
echo '</td>';

echo '<td>';
echo '<a href="removeDBrow.html"><img src="icons/delete.gif" /></a>';
echo '</td>';

echo '</tr>';

}
echo '</table>';
echo '</div>';
}


function showScheduleTable($q_user)
{

echo '<div id="disInfo">

<table border="1" align=left id="displayInfo">
<tr>
<th><h4>FlightNo</h4></th>
<th><h4>Departure Date</h4></th>
<th><h4>Departure Time</h4></th>
<th><h4>Arrival time</h4></th>
<th><h4>Discount</h4></th>
<th><h4>Delete</h4></th>
</tr>';

for ($i =0;  $i<mysql_num_rows($q_user); $i++)
{
$data = mysql_fetch_array($q_user);
$ScheduleID = $data['ScheduleID'];
$discounts = getDiscounts($ScheduleID, 0);
$FlightNo = $data['FlightNo'];
echo '<td>';
echo '<a href="ViewFlight.php?FNo='.$FlightNo.'">'.$FlightNo.'</a>';  
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);">';
echo $data['departuredate'];
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);">';
echo $data['departureTime'];
echo '</td>';

echo '<td onClick="select('.$ScheduleID.',2);">';
echo $data['arrivalTime'];
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',2);">';
echo 'percentage : %'.$discounts[0].'<BR/>';
echo 'value :    &pound'.$discounts[1];
echo '</td>';

echo '<td>';
echo '<a href="removeDBrow.html"><img src="icons/delete.gif" /></a>';
echo '</td>';



echo '</tr>';

}
echo '</table>';
echo '</div>';
}

function getDiscounts ($primaryKey, $type)
{
	$discounts[0] = 0;
	$discounts[1] = 0;
	$discounts[2] = 0;
	$discounts[3] = 0;
	$discounts[4] = 0;
	$discounts[5] = 0;
	$discounts[6] = 0;
	$discounts[7] = 0;
	
	if($type == 1) 	{$query = 'SELECT * FROM flight_discounts WHERE refID = \''.$primaryKey.'\'';}
	else			{$query = 'SELECT * FROM schedule_discounts WHERE refID = \''.$primaryKey.'\'';}
	$q_user = mysql_query($query);
	for ($i =0;  $i<mysql_num_rows($q_user); $i++)
	{
		$data = mysql_fetch_array($q_user);
		$discounts[0] += $data['percentageGlobal'];
		$discounts[1] += $data['valueGlobal'];
		$discounts[2] += $data['percentageEcon'];
		$discounts[3] += $data['valueEcon'];
		$discounts[4] += $data['percentageBusiness'];
		$discounts[5] += $data['valueBusiness'];
		$discounts[6] += $data['percentageGroup'];
		$discounts[7] += $data['valueGroup'];
	}
	return $discounts;
}
function dropdown($entries, $default = '', $name='') {
	echo "<select name=\"$name\">";
	for ($i = 0; $i < count($entries); $i++) {
		if ($entries[$i] == $default) { ?><option selected><?php } else { ?><option><?php }
		echo $entries[$i]; ?></option>
	<?php	}
	echo '</select>';
}

function datePicker($defDay = FALSE, $defMonth = FALSE, $name = '') {
	if (!$defDay) { $defDay = date("d") + 1; }
	if (!$defMonth) { $defMonth = date("m"); }
	if (!$name) { $name = ''; }
	echo '<div class="date-select">';
	//Day
	echo '<select class="day" name='.$name.'Day'.'>';
	for ($i = 1; $i < 31; $i++) {
		if ($i == $defDay) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '<option></option>';
	echo '</select>';
	
	echo '<select class="month"  name='.$name.'Month'.'>';
	for ($i = 1; $i < 12; $i++) {
		if ($i == $defMonth) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '<option></option>';
	echo '</select>';
	
	echo '<select class="year"  name='.$name.'Year'.'>';
	for ($i = 2010; $i < 2012; $i++) {
		echo '<option>'.$i.'</option>';
	}
	echo '<option></option>';
	echo '</select>
	</div>';
}

function datePickerBackEnd($name = '', $defDay = -1, $defMonth= -1, $defYear= '') {
	if (!$name) { $name = ''; }
	echo '<div class="date-select">';
	//Day
	echo '<select class="day" name='.$name.'Day'.'>';
	for ($i = 1; $i < 31; $i++) {
		if ($i == $defDay) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '<option selected></option>';
	echo '</select>';
	
	echo '<select class="month"  name='.$name.'Month'.'>';
	for ($i = 1; $i < 12; $i++) {
		if ($i == $defMonth) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '<option selected></option>';
	echo '</select>';
	echo '<input size="2" type="text" class="year"  name='.$name.'Year value="'.$defYear.'">
	</div>';
}

function timePicker ($defHour = -1, $defMin = -1, $name = '')
{
	echo '<div class="time-select">';
	//hour
	echo '<select class="hour" name='.$name.'hour'.'>';
	echo '<option/>';
	for ($i = 0; $i<24; $i++)
	{
		if($i == $defHour ){?> <option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '</select>';
	
	echo '<select class="min" name='.$name.'min'.'>';
	echo '<option/>';
	for ($i = 0; $i<60; $i++)
	{
		if($i == $defMin ){?> <option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '</select>';
	echo '</div>';
}

function noPsngrPicker($psngrType, $defNo = 0) {
	?><div class="no-passengers">
    <select class="psngr-select <?php echo $psngrType; ?>">
    <?php
	for ($i = 0; $i < 10; $i++) {
		if ($i == $defNo) { ?><option selected><?php } else { ?><option><?php }
		echo $i; ?></option>
        <?php
	} ?>
    </select>
    </div>
    <?php
}

function kill_session() {
	$_SESSION = array();
	$session_name = session_name();
	session_destroy();
	if ( isset( $_COOKIE[ $session_name ] ) ) {
		if ( setcookie(session_name(), '', time()-3600, '/') ) {
			header("Location: index.html");
			exit();    
		}
	}
}

function show_header($page, $admin_no_header) {
	for ($i = 0; $i < count($admin_no_header); $i++) {
		if ($admin_no_header[$i] == $page) { return false; }
	}
	return true;
}
?>
