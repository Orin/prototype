<?php

$type = $_POST['type'];
$primaryKey = $_POST['primaryKey'];
$goto = $_POST['URL'];

$types[0] = 'flights';
$types[1] = 'flightSchedule';

$pks[0] = 'flightNo';
$pks[1] = 'ScheduleID';

$discounts[0] = 'flight_discounts';
$discounts[1] = 'schedule_discounts';

$primarys[0] = '\''.$primaryKey.'\'';
$primarys[1] = $primaryKey;

$edits[0] = 'editFlightSchedule.html';
$edits[1] = 'customerSearch.html';





$table = $types[$type];
$pk = $pks[$type];

$pk = $pk.'='.$primarys[$type];


$query2 = 'DELETE FROM '.$discounts[$type].' WHERE refID='.$primarys[$type];
$query = 'DELETE FROM '.$table.' WHERE '.$pk;

//echo $query2;
//echo $query;

$dependanceys = null;
if($type) {$dependanceys = checkforBookings($primaryKey);}
else {$dependanceys = checkforschedules($primaryKey);}

if ($dependanceys[0] > 0)
	{
		
		?><form name="Flight_info" method="post" action="<?php echo $edits[$type];?>">
		<input type="hidden" name="refine" value="<?php echo $dependanceys[1]; ?>" />
		The flight you are trying to delete has schedules assigned to it. 
		<input type="submit" value="Click Here" /> to be taken to the schedule management page for this flight. <?php

	}
else
	{

		mysql_query($query2);
		mysql_query($query);
		$go = 'Location: '.$goto;
		header($go);
	}


?>
