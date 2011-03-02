<?php 
function autoFill($dataSet, $divName)
{
	echo '<SCRIPT language="JavaScript">
	';
	
	echo 'function autoFillsPre(key,textBox, divname) 
	{';
	
	echo '
	var dataSet=[];
	';
	
	for ($i =0;  $i<count($dataSet); $i++)
	{
		echo 'dataSet['.$i.'] = "'.$dataSet[$i].'";
		';
	}
	
	echo 'document.write(dataSet[1]);
	';
	echo 'autoFills(key,textBox,dataSet,divname);';
	echo '
	}';

	echo '</SCRIPT>
	';
	echo '<div id="'.$divName.'"><input  id="blargh" type=text autocomplete="off" name="FNo" onkeyup="autoFillsPre(event.keyCode,this,\''.$divName.'\');"/></div>';
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
echo '<th><h4>Delete</h4></th>';
echo '</tr>';

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
echo '&pound100';
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo '&pound75';
echo '</td>';

echo '<td onClick="select(\''.$flightNo.'\',1);">';
echo '&pound50';
echo '</td>';

echo '<td>';
echo '<a href="page.htm"><img src="icons/delete.gif" /></a>';
echo '</td>';

echo '</tr>';

}
echo '</table>';
echo '</div>';
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

function datePickerBackEnd($name = '') {
	if (!$name) { $name = ''; }
	echo '<div class="date-select">';
	//Day
	echo '<select class="day" name='.$name.'Day'.'>';
	for ($i = 1; $i < 31; $i++) {
		?><option><?php
		echo $i.'</option>';
	}
	echo '<option selected></option>';
	echo '</select>';
	
	echo '<select class="month"  name='.$name.'Month'.'>';
	for ($i = 1; $i < 12; $i++) {
		?><option><?php
		echo $i.'</option>';
	}
	echo '<option selected></option>';
	echo '</select>';
	echo '<input size="2" type="text" class="year"  name='.$name.'Year>
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
