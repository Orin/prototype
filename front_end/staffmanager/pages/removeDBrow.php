<?php

$types[0] = 'flight';
$types[1] = 'flightSchedule';

$pks[0] = 'flightNo';
$pks[1] = 'ScheduleID';

////////////////////////////////////////////
$type = 0;
$primaryKey = 'im a primary';
///////////////////////////////////////////


$table = $types[$type];
$pk = $pks[$type].'=\''.$primaryKey.'\'';


$query = 'DELETE FROM'.$table.'WHERE '.$pk;
echo $query;

?>