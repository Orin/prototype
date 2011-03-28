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


$dependanceys = null;
if($type) {$dependanceys = checkforBookings($primaryKey);}
else {$dependanceys = checkforschedules($primaryKey);}

if ($dependanceys[0] > 0)
	{
		
		?><form name="Flight_info" method="post" action="<?php echo $edits[$type];?>">
		<input type="hidden" name="refine" value="<?php echo $dependanceys[1]; ?>" />
		<?php 
		if(!$type) 
		{
				echo 'The flight you are trying to delete has these schedules assigned to it. ';
				echo '<input type="submit" value="Click Here" /> to be taken to the schedule management page for this flight. ';
				
		}
		else 
		{
				echo 'The schedule you are trying to delete has bookings assigned to it. ';
				echo '<input type="submit" value="Click Here" /> to be taken to the booking management page for this flight. ';
		}
		?></form>
		<form name="Flight_info" method="post" action="deleteDependanceys.html">
		<p>or click here to delete all dependenceys</p>
		<input type="hidden" name="primarykey" value="<?php echo $primaryKey; ?>" />
		<input type="hidden" name="type" value="<?php echo $type; ?>" />
		<input type="hidden" name="URL" value="<?php echo $goto; ?>" />
		<input type="submit" value="Click Here" />
		</form>
		<?php 
		if(!$type){
			echo '<h3> Dependant Schedules </h3>';
			showScheduleTable(mysql_query($dependanceys[1]), 'removeDBrow.html');
			}
		else {
		echo '<h3> Dependant flights </h3>';
		showFlightTable(mysql_query($dependanceys[1]), 'removeDBrow.html');}
	}
else
	{

		mysql_query($query2);
		mysql_query($query);
		$go = 'Location: '.$goto;
		header($go);
	}
?>
