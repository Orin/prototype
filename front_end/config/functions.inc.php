<?php 
/**
* Main functions file
* Contains all PHP functions that are relevant to the whole site.
* The contents of this file can be accessed by any php file that is built using
* config/layout.php or staffmanager/config/admin-layout.php
*
* @author Michael Shannon and Craig Matear
*/
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


/**		
* Used for tranlating short-code to full name and back.
* @param String needle Search string
* @param String type Format of desired result
* @return String
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
* Returns an array containing the number of results and the search query use to get them
* @param String flightNo The flight number of the flight you want the schedules for
* @return Array[integer][String]
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
* Performs database search for all flights matching criteria, and returns as a mysql_query result
* @param String from Departure airport
* @param String to Arrival airport
* @param String date The date of travel
* @param String class The class of travel
* @param integer passengers Number of passengers to find available flights for
* @return Array returns arraylist of $row items containing all relevant flights with seats remaining
*/
function flightSearch($from, $to, $date, $class, $passengers=1) {
	//Initial query to determine all flights for selected route/date
	$initQuery = "
	SELECT 
		flights.flightNo, flightSchedule.ScheduleID,
		flightSchedule.departuredate, flightSchedule.departureTime, 
		flightSchedule.arrivalDate, flightSchedule.arrivalTime,
		flights.econSeats, flights.econPrice, flights.busSeats, flights.busPrice
	FROM 
		flights, flightSchedule
	WHERE 
		flights.departure = '".$from."' 
		AND flights.destination = '".$to."' 
		AND flightSchedule.departuredate = '".$date."'
		AND flights.flightNo = flightSchedule.flightNo";
	$initResult = mysql_query($initQuery);
	
	$availableFlights = array();
	//Exit if no flights listed
	if (mysql_num_rows($initResult) == 0) {
		//echo "Function Error [flightSearch(".$from.", ".$to.", ".$date.", ".$class.")]: initResult - No flights found.";
		return $availableFlights;
	} 
	
	$availableFlights = array();
	while ($row = mysql_fetch_array($initResult)) {
		$thisCapacity = classCapacity($row['ScheduleID'], $class);
		if (availableSeats($row['ScheduleID'], $class) >= $passengers) {
		array_push($availableFlights, $row);
		}
	}
	return $availableFlights;
}

/**
* Used to determine remaining seats on a specified flight in specified class
* @param integer scheduleID The scheduleID of the particular flight (note: Not flightNo)
* @param String class The class of travel in question
* @return integer The number of unbooked seats
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
			
			$availableSeats = ($capacity*OVERBOOK_MOD) - $boughtSeats;
			return floor($availableSeats);
		}
	} elseif (validScheduleID($scheduleID)) {
		return floor(classCapacity($scheduleID, $class)*OVERBOOK_MOD);
	} else return "Function Error [availableSeats(".$scheduleID.", ".$class.")]: Invalid scheduleID.";
	
}

/**
* Used for checking if a provided scheduleID exists in the flightSchedule table
* @param integer scheduleID the scheduleID you want to lookup
* @return boolean
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
* Returns the total capacity of a given class on a given flight
* @param integer scheduleID The scheduleID of the particular flight (note: Not flightNo)
* @param String class The class of travel in question
* @return integer The total capacity of that class on that flight
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

/**
* Generates a unique booking reference following the regex format
* [ABCDEFGHJKLMNPQRSTUVWXYZ]{3}[23456789][ABCDEFGHJKLMNPQRSTUVWXYZ]
* This will not contain ambiguous characters (such as O & 0)
* return bookingRef
*/
function bookingRefGenerator() {
	$chars = preg_split('//', 'ABCDEFGHJKLMNPQRSTUVWXYZ', -1, PREG_SPLIT_NO_EMPTY);
	$nums = preg_split('//', '23456789', -1, PREG_SPLIT_NO_EMPTY);
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


function formatTime($input) {
	 $time = explode(":", $input); 
	 return $time[0].':'.$time[1];
}
?>
