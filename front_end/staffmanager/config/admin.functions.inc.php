<?php
function RevByClass($month) {
$query = "SELECT
	flightSchedule.`departuredate` AS Date,
	classes.className AS 'Class',
    COUNT(passengers.passengerID) AS 'Total Passengers',
    sum(DISTINCT bookings.totalCost) AS 'Total Revenue'
FROM
	bookings,
    `flightSchedule`,
    classes,
    `passengers`,
	`bookings_passengers`
WHERE
	classes.classID = bookings.`classID` AND
    bookings.`FlightScheduleID` = flightSchedule.`ScheduleID` AND
    passengers.`passengerID` = `bookings_passengers`.`passengerID` AND
    bookings.`bookingID` = bookings_passengers.`bookingID` AND 
    MONTH(flightSchedule.`departuredate`) = ".$month."

GROUP BY
   	flightSchedule.`departuredate`,
    bookings.classID
    ";
	return mysql_query($query);
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

function showScheduleTable($q_user, $URL = 'main.html', $goto = 'scheduleInfo.html')
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
echo '<tr onClick="javascript:postValue(\''.$goto.'\', {scheduleID:\''.$ScheduleID.'\'});">';
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



function monthPicker($def = FALSE, $name= '')
{
if (!$def) {$def = -1;}
	echo '<select class="month"  name='.$name.'>';
	for ($i = 1; $i < 12; $i++) {
		if ($i == $def) { ?><option selected value="<?php echo $i; ?>"><?php } else { ?><option value="<?php echo $i; ?>"><?php }
		echo date("F", mktime(0,0,0,$i)).'</option>';
	}
	
	if($defMonth == -1) {echo '<option selected><option>';}
	else {echo '<option></option>';}

	echo '</select>';
}

function calcPrevMonth() {
	$now = date("n");
	if ($now == 1) { $now = 12; }
	else $now = $now - 1;
	return $now;
}

function datePickerBackEnd($name = '', $defDay = FALSE, $defMonth = FALSE, $defYear = '') {
	if (!$name) { $name = ''; }
	if (!$defDay) {$defDay = -1;}
	if (!$defMonth) {$defMonth = -1;}
	echo '<div class="date-select">';
	//Day
	echo '<select class="day" name="'.$name.'Day'.'">';
	echo '<option></option>';
	for ($i = 1; $i < 32; $i++) {
		if ($defDay==$i) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	
	
	echo '</select>';
	
	//Month
	echo '<select class="month"  name='.$name.'Month'.'>';
	echo '<option></option>';
	for ($i = 1; $i < 13; $i++) {
		if ($i == $defMonth) { ?><option selected><?php } else { ?><option><?php }
		echo $i.'</option>';
	}
	

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

function show_header($page, $admin_no_header) {
	for ($i = 0; $i < count($admin_no_header); $i++) {
		if ($admin_no_header[$i] == $page) { return false; }
	}
	return true;
}

function incomeAllFlights ($month)
{
	$getFlights = ' SELECT sum(totalCost) AS "Income"
					,flightSchedule.FlightNo 
					FROM flightSchedule, bookings 
					WHERE 
							bookings.FlightScheduleID = flightSchedule.ScheduleID 
							AND MONTH(departuredate) = '.$month.' 
							
					GROUP BY flightSchedule.FlightNo;';
					
	$result = mysql_query($getFlights);
	return $result;
}


function incomePerSchedule ($month)
{
	$getScheduleIncome = 'SELECT flightSchedule.ScheduleID, flightSchedule.departuredate, flightSchedule.FlightNo, sum(totalCost) AS "Income"
						  FROM flightSchedule, bookings
						  WHERE 
								flightSchedule.ScheduleID = bookings.FlightScheduleID AND
								MONTH(departuredate) = '.$month.' 
						  GROUP BY ScheduleID';
						  
	$result = mysql_query($getScheduleIncome);
	return $result;
}

//sales per scedule
//        add date time and flight number passenger count (total passengers)



function incomeTotalPeriod ($month)
{
	$getIncomeTotal = 'SELECT className AS "Class", sum(totalCost) AS "Income"
					   FROM classes, flightSchedule, bookings 
					   WHERE 
							bookings.FlightScheduleID = flightSchedule.ScheduleID  
							AND bookings.classID = classes.classID 
							AND MONTH(flightSchedule.departuredate) ='.$month.' 
					   GROUP BY className';
					   
	$result = mysql_query($getIncomeTotal);
	return $result;
	
}

function flightFrequency ($month)
{
	$frequencys = 'SELECT flights.flightNo, count(flightSchedule.FlightNo) AS "Frequency"
				   FROM flights, flightSchedule 
				   WHERE 
						flights.flightNo = flightSchedule.FlightNo AND
						MONTH(flightSchedule.departuredate) = '.$month.' 
				   GROUP BY flights.flightNo';
				   
	$result = mysql_query($frequencys);
	return $result;
	
}
 //SELECT flights.flightNo, IF (customerID='FALSE', COUNT(travelAgent), count(customerID)) AS bookeeCount FROM flights, bookings, flightSchedule WHERE flights.flightNo = flightSchedule.FlightNo AND flightSchedule.ScheduleID = bookings.FlightScheduleID AND bookings.travelAgent != '' GROUP BY flights.flightNo;

 

function buildTable($result) {
	$numFields = mysql_num_fields( $result );
    for ( $i = 0; $i < $numFields; $i++ ) {
        $fieldNames[] = mysql_field_name( $result, $i );
    } ?>
	<table id="displayInfo">
	<tr>
	<?php for ($i = 0; $i < $numFields; $i++) { ?>
	<th><?php echo $fieldNames[$i]; ?></th>
	<?php } ?>
	</tr>
	<?php
	while ($row = mysql_fetch_array($result)) { ?>
		<tr>
		<?php for ($i = 0; $i < $numFields; $i++) { ?>
		<td><?php echo $row[$fieldNames[$i]]; ?></td>
		<?php } ?>
		</tr>
	<?php }	?>
	</table>
	<?php
}
?>