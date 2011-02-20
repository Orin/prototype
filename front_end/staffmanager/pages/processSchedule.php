<?php
$schedule[0] = $_POST['schID'];
$schedule[1] = $_POST['FlightNo'];

$schedule[2] = $_POST['depDateDay'];
$schedule[3] = $_POST['depDateMonth'];
$schedule[4] = $_POST['depDateYear'];

$schedule[5] = $_POST['depTimehour'];
$schedule[6] = $_POST['depTimemin'];

$schedule[7] = $_POST['ArrivTimehour'];
$schedule[8] = $_POST['ArrivTimemin'];


$insert = "INSERT INTO flightSchedule (ScheduleID, FlightNo, departuredate, departureTime, arrivalTime,availableEconomySeats, availableBusinessSeats, availableGroupSeats) VALUES($schedule[0],'$schedule[1]','".$schedule[4].'-'.$schedule[3].'-'.$schedule[2]."','".$schedule[5].':'.$schedule[6]."','".$schedule[7].':'.$schedule[8]."',(SELECT econemyseats FROM flight WHERE flightNo = '$schedule[1]'),(SELECT businessseats FROM flight WHERE flightNo = '$schedule[1]'),(SELECT groupseats FROM flight WHERE flightNo = '$schedule[1]'))";

$updateTotals = "UPDATE flightSchedule SET availableSeats= availableEconomySeats+availableBusinessSeats+availableGroupSeats WHERE ScheduleID = $schedule[0]";

if (!mysql_query($insert) || !mysql_query($updateTotals))
{
	echo '<table border="1" id="error">';
	echo'<th colspan="2">MySql database error</th>';
	echo '<tr bgcolor="#FF6633" ><td>Database Element</td><td>Error reason</td></tr>';
	echo'<tr><td>';
	echo'cannot insert schedule:';
		echo '<table id="displayInfo" border="1">';
		echo '<tr><td>schedule ID:</td><td>'.$schedule[0].'</td></tr>';
		echo '<tr><td>Flight Number:</td><td>'.$schedule[1].'</td></tr>';
		echo '<tr><td>departure date:</td><td>'.$schedule[4].'-'.$schedule[3].'-'.$schedule[2].'</td></tr>';
		echo '<tr><td>departure time:</td><td>'.$schedule[5].':'.$schedule[6].'</td></tr>';
		echo '<tr><td>arriavl time:</td><td>'.$schedule[7].':'.$schedule[8].'</td></tr>';
		echo '</table>'; 
		echo '
		';
	echo '</td><td>';
	echo('Error: ' . mysql_error());
	echo'</td></tr>';
	echo '</table>';
	echo '<br/>';
	
	} else {
	  echo '<table border="1" id="sucessful">';
	echo'<th>flight sucessfully entered</th>';
	echo'<tr><td>';
		echo '<table id="displayInfo" border="1" width=100%>';
		echo '<tr><td>schedule ID:</td><td>'.$schedule[0].'</td></tr>';
		echo '<tr><td>flight number:</td><td>'.$schedule[1].'</td></tr>';
		echo '<tr><td>departure date:</td><td>'.$schedule[4].'-'.$schedule[3].'-'.$schedule[2].'</td></tr>';
		echo '<tr><td>departure time:</td><td>'.$schedule[5].':'.$schedule[6].'</td></tr>';
		echo '<tr><td>arrival time:</td><td>'.$schedule[7].':'.$schedule[8].'</td></tr>';
		echo '</table>'; 
	echo'</td></tr>';
	echo '</table>';
	  
  };
  
 echo '<br/>';
		echo date('l jS \of F Y h:i:s A');
		echo '<br/>';
 		echo '<form>'; 
		echo '<input type="button" value="print"/> ';
		echo '</form>';
?>

