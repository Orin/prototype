<?php 

$primaryKey =  $_POST['primarykey'];
$type = $_POST['type'];

$types[0] = 'flights';
$types[1] = 'flightSchedule';

$pks[0] = 'flightNo';
$pks[1] = 'ScheduleID';

$primarys[0] = '\''.$primaryKey.'\'';
$primarys[1] = $primaryKey;

$delQuery = 'DELETE FROM '.$types[$type].' WHERE '.$pks[$type].' = '.$primarys[$type];
mysql_query($delQuery);
//echo $delQuery;
header('Location: '.$_POST['URL']);
?>
