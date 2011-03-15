<?php 
function autoFill($dataSet, $divName, $elName = '')
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
	
	<?php echo '<div id="'.$divName.'"><input  id="blargh" type=text autocomplete="off" name="'.$elName.'" onkeyup="autoFillsPre(event.keyCode,this,\''.$divName.'\');"/></div>';
}

function accessLevel ($page, $level)
{
	return true;

}
function showFlightTable($q_user, $URL = 'main.html')
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
echo '<th><h4>Business Cost</h4></th>';
echo '<th><h4>Economy Cost</h4></th>';
echo '<th><h4>Group Cost</h4></th>';
echo '<th><h4>Applied Discounts</h4></th>';
echo '<th><h4>Delete</h4></th>';
echo '</tr>';

for ($i =0;  $i<mysql_num_rows($q_user); $i++)
{
$data = mysql_fetch_array($q_user);
$flightNo = $data['flightNo'];
$discounts = getDiscounts($flightNo, 1);
echo '<tr onClick="javascript:postValue(\'flightinfo.html\', {flightNo:\''.$flightNo.'\'});">';
echo '<td>';
echo '<a href="javascript:postValue(\'viewFlight.html\', {flightNo:\''.$flightNo.'\'});">'.$flightNo.'</a>';
echo '</td>';


echo '<td >';
echo $data['destination'];
echo '</td>';

echo '<td>';
echo $data['departure'];
echo '</td>';

echo '<td>';
echo $data['capacity'];
echo '</td>';

echo '<td>';
echo $data['econSeats'];
echo '</td>';

echo '<td>';
echo $data['busSeats'];
echo '</td>';


echo '<td>';
echo displayDiscounts($data['busPrice'],$discounts[5],$discounts[4],$discounts[1],$discounts[0]);
echo '</td>';

echo '<td>';
echo displayDiscounts($data['econPrice'],$discounts[3],$discounts[2],$discounts[1],$discounts[0]);
//echo ($data['econPrice']*(1-($discounts[2]/100)))-$discounts[3].'(&pound;'.$data['econPrice'].')';
echo '</td>';

echo '<td>';
echo displayDiscounts($data['groupPrice'],$discounts[7],$discounts[6],$discounts[1],$discounts[0]);
//echo ($data['groupPrice']*(1-($discounts[6]/100)))-$discounts[7].'(&pound;'.$data['groupPrice'].')';
echo '</td>';

echo '<td>';
//echo 'percentage : %'.$discounts[0].'<BR/>';
//echo 'value :    &pound;'.$discounts[1];
echo displayDisDetails($discounts);
echo '</td>';

echo '<td>';
echo '<a href="javascript:postValue(\'removeDBrow.html\', {type:0 , primaryKey:\''.$flightNo.'\', URL:\''.$URL.'\'});"><img src="icons/delete.gif" /></a>';
echo '</td>';

echo '</tr>';

}
echo '</table>';
echo '</div>';
}

function displayDisDetails ($alldiscounts)
{
	$returnString = '';
	if($alldiscounts[0] != 0){$returnString = $returnString.'GlobalPercentage: %'.$alldiscounts[0].'<br/>';}
	if($alldiscounts[1] != 0){$returnString = $returnString.'GlobalValue: &pound;'.$alldiscounts[1].'<br/>';}
	if($alldiscounts[2] != 0){$returnString = $returnString.'Percentage Economy: %'.$alldiscounts[2].'<br/>';}
	if($alldiscounts[3] != 0){$returnString = $returnString.'Value Economy: &pound;'.$alldiscounts[3].'<br/>';}
	if($alldiscounts[4] != 0){$returnString = $returnString.'Percentage Business: %'.$alldiscounts[4].'<br/>';}
	if($alldiscounts[5] != 0){$returnString = $returnString.'Value Business: &pound;'.$alldiscounts[5].'<br/>';}
	if($alldiscounts[6] != 0){$returnString = $returnString.'Percentage Group: %'.$alldiscounts[6].'<br/>';}
	if($alldiscounts[7] != 0){$returnString = $returnString.'Value Group: &pound;'.$alldiscounts[7].'<br/>';}
	
	return $returnString;
	
}

function displayDiscounts ($originalPrice, $valuedis, $percentDis, $globalValue, $globalpercent)
{

	$discountTotal = ((($originalPrice*(1-($percentDis/100)))-$valuedis)*(1-($globalpercent/100)))-$globalValue;
	if($discountTotal == $originalPrice){return '&pound;'.$originalPrice;}
	else {return '<p class="normPrice"> &pound;'.$originalPrice.'</p> <p class="disPrice"> &pound;'.$discountTotal.'</p>';}
}

function showScheduleTable($q_user, $URL = 'main.html')
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
echo '<tr onClick="javascript:postValue(\'scheduleInfo.html\', {scheduleID:\''.$ScheduleID.'\'});">';
echo '<td>';
echo '<a href="javascript:postValue(\'viewFlight.html\', {flightNo:\''.$FlightNo.'\'});">'.$FlightNo.'</a>';  
echo '</td>';

echo '<td>';
echo $data['departuredate'];
echo '</td>';

echo '<td>';
echo $data['departureTime'];
echo '</td>';

echo '<td>';
echo $data['arrivalTime'];
echo '</td>';

echo '<td>';
echo 'percentage : %'.$discounts[0].'<BR/>';
echo 'value :    &pound;'.$discounts[1];
echo '</td>';

echo '<td>';
echo '<a href="javascript:postValue(\'removeDBrow.html\', {type:1 , primaryKey:'.$ScheduleID.', URL:\''.$URL.'\'});"><img src="icons/delete.gif" /></a>';
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
function dropdown($entries, $default = '', $name='', $width = 'auto') {
	echo "<select name=\"".$name."\" style=\"width:".$width."\">";
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
	?>

    <?php
	echo '<select class="day" name="'.$name.'Day">';
	for ($i = 1; $i < 32; $i++) {
		if ($i == $defDay) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	echo '<option></option>';
	echo '</select>';
	
	echo '<select class="month"  name="'.$name.'Month">';
	for ($i = 1; $i < 13; $i++) {
		if ($i == $defMonth) { ?><option selected><?php } else { ?><option><?php }
		echo date("F", mktime(0,0,0,$i)).'</option>';
	}
	echo '<option></option>';
	echo '</select>';
	
	echo '<select class="year"  name="'.$name.'Year">';
	for ($i = date("Y"); $i < (date("Y") + 2); $i++) {
		echo '<option>'.$i.'</option>';
	}
	echo '<option></option>';
	echo '</select>
	</div>';
}

function datePickerBackEnd($name = '', $defDay = FALSE, $defMonth = FALSE, $defYear = '') {
	if (!$name) { $name = ''; }
	if (!$defDay) {$defDay = -1;}
	if (!$defMonth) {$defMonth = -1;}
	echo '<div class="date-select">';
	//Day
	echo '<select class="day" name="'.$name.'Day'.'">';
	for ($i = 1; $i < 31; $i++) {
		if ($defDay==$i) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	
	
	if($defDay == -1) {echo '<option selected><option>';}
	else {echo '<option></option>';}
	
	echo '</select>';
	
	//Month
	echo '<select class="month"  name='.$name.'Month'.'>';
	for ($i = 1; $i < 12; $i++) {
		if ($i == $defMonth) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	
	if($defMonth == -1) {echo '<option selected><option>';}
	else {echo '<option></option>';}

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
    <select class="psngr-select <?php echo $psngrType; ?>" name="psngr-<?php echo $psngrType; ?>">
    <?php
	for ($i = 0; $i < 11; $i++) {
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

/**		
*Used for tranlating short-code to full name and back.
*@param needle Search string
*@param type Format of desired result
*@return converted name or error
**/
function airCodeLookup($needle, $type) {
	if ($needle == "BLANK") return $needle;
	
	if ($type == "CODE") {
		$query = "SELECT name FROM airports WHERE fullName = '".$needle."'";
		$result = mysql_query($query);
	} elseif ($type == "FULL") {
		$query = "SELECT fullName FROM airports WHERE name = '".$needle."'";
		$result = mysql_query($query);
	} else {
		return "Function Error [airCodeLookup(".$needle.", ".$type.")]: Invalid type.";
	}
	
	if (mysql_num_rows($result) == 0) {
		return "Function Error [airCodeLookup(".$needle.", ".$type.")]: Needle not found.";
	}
	while ($row = mysql_fetch_array($result)) {
		if ($type == "CODE") { return $row['name']; }
		elseif ($type == "FULL") { return $row['fullName']; }
		else return "Function Error [airCodeLookup(".$needle.", ".$type.")]: Invalid type.";
	}
}
/*
*returns an array containing the number of results and the search query use to get them
*@param flightNo - the flight number of teh flight you want the schedules for
*/
function checkforschedules($flightNo)
{
	$query = "SELECT * FROM flightSchedule WHERE FlightNo='".$flightNo."'";
	$result = mysql_query($query);
	$res[0] = mysql_num_rows($result);
	$res[1] = $query;
	return $res;
}

function checkforBookings($scheduleID)
{
	$query = "SELECT * FROM bookings WHERE FlightScheduleID=".$scheduleID;
	$result = mysql_query($query);
	$res[0] = mysql_num_rows($result);
	$res[1] = "FlightScheduleID=".$scheduleID;
	return $res;
}

/**
*Performs database search for all flights matching criteria, and returns as a mysql_query result
*@param - From airport
*@param To airport
*@param Date of travel
*@param Class of travel
*@return Returns mysql_query result
*/
function flightSearch($from, $to, $date, $class) {
	
	
	$query = "
	SELECT 
		flights.flightNo, flightSchedule.scheduleID,
		flightSchedule.departuredate, flightSchedule.departureTime, 
		flightSchedule.arrivalDate, flightSchedule.arrivalTime, 
		classes.className,
		COUNT(passengers.passengerID),
		flights.econSeats, flights.econPrice, flights.busSeats, flights.busPrice
	FROM 
		flights, flightSchedule, bookings, passengers, classes, bookings_passengers 
	WHERE 
		flights.departure = '".$from."' 
		AND flights.destination = '".$to."' 
		AND flightSchedule.departuredate = '".$date."'
		AND classes.className = '".$class."'
		
		AND flights.flightNo = flightSchedule.flightNo 
		AND bookings.FlightScheduleID = flightSchedule.ScheduleID
		AND bookings_passengers.bookingID = bookings.bookingID 
		AND bookings_passengers.passengerID = passengers.passengerID 
		AND bookings.classID = classes.classID 
	GROUP BY 
		flights.flightNo,
		classes.className
		";
	$result = mysql_query($query);
	if (mysql_num_rows($result) == 0) {
		echo "Function Error [flightSearch(".$from.", ".$to.", ".$date.", ".$class.")]: No flights found.";
	} 
	
	return $result;
}

/**
*Used to determine remaining seats on a specified flight in specified class
*@param scheduleID The scheduleID of the particular flight (note: Not flightNo)
*@param class The class of travel in question
*@return availableSeats The number of unbooked seats
*/
function availableSeats($scheduleID, $class) {
	$query = "
	SELECT 
		COUNT(passengers.passengerID),
		flights.econSeats, flights.busSeats
	FROM 
		flights, flightSchedule, bookings, passengers, classes, bookings_passengers 
	WHERE 
		flightSchedule.scheduleID = '".$scheduleID."'
		AND classes.className = '".$class."'
		
		AND flights.flightNo = flightSchedule.flightNo 
		AND bookings.FlightScheduleID = flightSchedule.ScheduleID
		AND bookings_passengers.bookingID = bookings.bookingID 
		AND bookings_passengers.passengerID = passengers.passengerID 
		AND bookings.classID = classes.classID 
	GROUP BY 
		flights.flightNo,
		classes.className
		";
	$result = mysql_query($query);
	if (mysql_num_rows($result) == 1) {
		while ($row = mysql_fetch_array($result)) {
			$boughtSeats = $row['COUNT(passengers.passengerID)'];
			if ($class == "Economy") $capacity = $row['econSeats'];
			elseif ($class == "Business") $capacity = $row['busSeats'];
			else return "Function Error [availableSeats(".$scheduleID.", ".$class.")]: Invalid class type.";
			
			$availableSeats = $capacity - $boughtSeats;
			return $availableSeats;
		}
	} elseif (validScheduleID($scheduleID)) {
		return classCapacity($scheduleID, $class);
	} else return "Function Error [availableSeats(".$scheduleID.", ".$class.")]: Invalid scheduleID.";
	
}

/**
*Used for checking if a provided scheduleID exists in the flightSchedule table
*@param scheduleID the scheduleID you want to lookup
*@return boolean
*/
function validScheduleID($scheduleID) {
	$query = "
	SELECT
		scheduleID
	FROM
		flightSchedule
	WHERE
		scheduleID = '".$scheduleID."'";
	$result = mysql_query($query);
	if (mysql_num_rows($result) == 1) return true;
	else return false;
}

/**
*Returns the total capacity of a given class on a given flight
*@param scheduleID The scheduleID of the particular flight (note: Not flightNo)
*@param class The class of travel in question
*@return The total capacity of that class on that flight
*/
function classCapacity($scheduleID, $class) {
	if ($class == "Economy") { $classID = "econSeats"; }
	elseif ($class == "Business") { $classID = "busSeats"; }
	else return "Function Error [classCapacity(".$scheduleID.", ".$class.")]: Invalid class type.";
	
	$query = "
	SELECT
		flights.".$classID."
	FROM
		flights, flightSchedule
	WHERE
		flightSchedule.scheduleID = '".$scheduleID."'
		
		AND flights.flightNo = flightSchedule.flightNo";
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_array($result)) {
		if ($class == "Economy") return $row['econSeats'];
		elseif ($class == "Business")return $row['busSeats'];
		else return "Function Error [classCapacity(".$scheduleID.", ".$class.")]: Invalid class type.";
	}
}


function bookingRefGenerator() {
	$chars = preg_split('//', 'ABCDEFGHJKLMNPQRSTUVWXYZ', -1, PREG_SPLIT_NO_EMPTY);
	$nums = preg_split('//', '123456789', -1, PREG_SPLIT_NO_EMPTY);
	$bookRef = '';
	$new = false;
	
	while (!($new)) {
		for ($i = 0; $i < 5; $i++) {
			if ($i < 3 || $i == 4) {
				$rand = mt_rand(0, 23);
				$bookRef = $bookRef.$chars[$rand];
			} else {
				$rand = mt_rand(0, 8);
				$bookRef = $bookRef.$nums[$rand];
			}
		}
		if (!validBookRef($bookRef)) {
			$new = true;
		}
	}
	
	return $bookRef;
}

function validBookRef($bookingRef) {
	$query = "
	SELECT
		bookingID
	FROM
		bookings
	WHERE
		bookingID = '".$bookingRef."'";
	if (mysql_num_rows(mysql_query($query)) > 0) return true;
	else return false;
}
?>
