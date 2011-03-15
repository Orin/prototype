<?php
	$from = ($_POST['fromDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['fromDrop'])) : 'BLANK';
	$from = airCodeLookup($from, "CODE");
	$to =  ($_POST['toDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['toDrop'])) : 'BLANK';
	$to = airCodeLookup($to, "CODE");
	
	$departDay =  ($_POST['departDay'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departDay'])) : 'BLANK';
	$departMonth =  ($_POST['departMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departMonth'])) : 'BLANK';
	$departYear =  ($_POST['departYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departYear'])) : 'BLANK';
	$departDate = date("Y-m-d", strtotime($departDay." ".$departMonth." ".$departYear));
	
	$returnDay =  ($_POST['returnDay'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnDay'])) : 'BLANK';
	$returnMonth =  ($_POST['returnMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnMonth'])) : 'BLANK';
	$returnYear =  ($_POST['returnYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnYear'])) : 'BLANK';
	$returnDate = date("Y-m-d", strtotime($returnDay." ".$returnMonth." ".$returnYear));
	
	$class = $_POST['classDrop'];
	
	$adults = $_POST['psngr-adult'];
	$children = $_POST['psngr-children'];

	  echo 'From: '.$from.'<br />
   		To: '.$to.'<br />
		Adults: '.$adults.'<br />
		Children: '.$children.'<br />
		Class: '.$class.'<br />
		';


$outResult = flightSearch($from, $to, $departDate, $class);
?><br />Out Result<br />
<table>
<tr><td>FlightNo</td><td>Date</td><td>Depart Time</td><td>Arrive Time</td></tr>

<?php while ($row = mysql_fetch_array($outResult)) { ?>
	<tr><td><?php echo $row['flightNo']; ?></td><td><?php echo $row['departuredate']; ?></td><td><?php echo $row['departureTime']; ?></td><td><?php echo $row['arrivalTime']; if ($row['arrivalDate'] != $row['departuredate']){ echo '(+1)'; } ?></td></tr>
<?php } ?></table><?


$returnResult = flightSearch($to, $from, $returnDate, $class);

?><br />Return Result<br />
<table>
<tr><td>FlightNo</td><td>Date</td><td>Depart Time</td><td>Arrive Time</td></tr>

<?php while ($row = mysql_fetch_array($returnResult)) { ?>
	<tr><td><?php echo $row['flightNo']; ?></td><td><?php echo $row['departuredate']; ?></td><td><?php echo $row['departureTime']; ?></td><td><?php echo $row['arrivalTime']; if ($row['arrivalDate'] != $row['departuredate']){ echo '(+1)'; } ?></td></tr>
<?php } ?></table><?

?> 