<?php

$type = $_POST['type'];
$primaryKey = $_POST['primaryKey'];
$goto = $_POST['URL'];

$types[0] = 'flight';
$types[1] = 'flightSchedule';

$pks[0] = 'flightNo';
$pks[1] = 'ScheduleID';

$discounts[0] = 'flight_discounts';
$discounts[1] = 'schedule_discounts';

$primarys[0] = '\''.$primaryKey.'\'';
$primarys[1] = $primaryKey;





$table = $types[$type];
$pk = $pks[$type];

$pk = $pk.'='.$primarys[$type];


$query2 = 'DELETE FROM '.$discounts[$type].' WHERE refID='.$primarys[$type];
$query = 'DELETE FROM '.$table.' WHERE '.$pk;

echo $query2;
echo $query;

mysql_query($query2);
if(!mysql_query($query))
{
	echo 'couldent delete the schedule/flight with ID: '.$primaryKey.' as there are bookings/schedule for this schedule/flight';
}
else
{
$go = 'Location: '.$goto;
header($go);
}




?>