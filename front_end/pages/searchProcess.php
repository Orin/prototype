<?php
	$fromDrop = ($_POST['fromDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['fromDrop'])) : 'BLANK';
	$from = airCodeLookup($fromDrop, "CODE");
	$toDrop =  ($_POST['toDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['toDrop'])) : 'BLANK';
	$to = airCodeLookup($toDrop, "CODE");
	
	$departDayDrop =  $_POST['departDay'];
	$departDay =  ($departDayDrop != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departDay'])) : 'BLANK';
	$departMonth =  ($_POST['departMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departMonth'])) : 'BLANK';
	$departMonthDrop =  date("n", strtotime($departMonth));
	$departYear =  ($_POST['departYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departYear'])) : 'BLANK';
	$departDate = date("Y-m-d", strtotime($departDay." ".$departMonth." ".$departYear));
	
	$returnDayDrop =  $_POST['returnDay'];
	$returnDay =  ($returnDayDrop != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnDay'])) : 'BLANK';
	$returnMonth =  ($_POST['returnMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnMonth'])) : 'BLANK';
	$returnMonthDrop =  date("n", strtotime($returnMonth));
	$returnYear =  ($_POST['returnYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnYear'])) : 'BLANK';
	$returnDate = date("Y-m-d", strtotime($returnDay." ".$returnMonth." ".$returnYear));
	
	$class = $_POST['classDrop'];
	
	$adults = $_POST['psngr-adult'];
	$children = $_POST['psngr-children'];
	
	$outResult = flightSearch($from, $to, $departDate, $class, $adults + $children);
	$returnResult = flightSearch($to, $from, $returnDate, $class, $adults + $children); 

/*Debug output
	  echo 'From: '.$from.'<br />
   		To: '.$to.'<br />
		Adults: '.$adults.'<br />
		Children: '.$children.'<br />
		Class: '.$class.'<br />
		';


?><br />Out Result<br />
<table>
<tr><td>FlightNo</td><td>Date</td><td>Depart Time</td><td>Arrive Time</td><td>Available Seats</td></tr>

<?php
for ($i = 0; $i < count($outResult); $i++) { ?>
	<tr><td><?php echo $outResult[$i]['flightNo']; ?></td><td><?php echo $outResult[$i]['departuredate']; ?></td><td><?php echo $outResult[$i]['departureTime']; ?></td><td><?php echo $outResult[$i]['arrivalTime']; if ($outResult[$i]['arrivalDate'] != $outResult[$i]['departuredate']){ echo '(+1)'; } ?></td><td><?php echo availableSeats($outResult[$i]['ScheduleID'], $class); ?></td></tr>
<?php } ?></table>
Return Result<br /><?php
?>
<table>
<tr><td>FlightNo</td><td>Date</td><td>Depart Time</td><td>Arrive Time</td><td>Available Seats</td></tr>
<?php
for ($i = 0; $i < count($returnResult); $i++) { ?>
	<tr><td><?php echo $returnResult[$i]['flightNo']; ?></td><td><?php echo $returnResult[$i]['departuredate']; ?></td><td><?php echo $returnResult[$i]['departureTime']; ?></td><td><?php echo $returnResult[$i]['arrivalTime']; if ($returnResult[$i]['arrivalDate'] != $returnResult[$i]['departuredate']){ echo '(+1)'; } ?></td><td><?php echo availableSeats($returnResult[$i]['ScheduleID'], $class); ?></td></tr>
<?php } ?></table>
*/ ?>