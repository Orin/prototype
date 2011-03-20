<?php 

$dest = $_POST['dest'];
$dep = $_POST['dep'];
$depDate[0] = $_POST['depDateDay'];
$depDate[1] = $_POST['depDateMonth'];
$depDate[2] = $_POST['depDateYear'];

$deptime[0] = $_POST['deptimehour'];
$deptime[1] = $_POST['deptimemin'];

$searchString = 'SELECT DISTINCT flights.flightNo, destination, departure, capacity, econSeats, busSeats, groupseats, econPrice, busPrice, groupPrice FROM flights, flightSchedule WHERE flights.flightNo = flightSchedule.FlightNo AND';
if($dest != ''){$searchString = $searchString.' destination=\''.$dest.'\' AND';}
if($dep != ''){$searchString = $searchString.' departure=\''.$dep.'\' AND';}
/*
if($depDate[0] != '' && $depDate[1] != '' && $depDate[2] != ''){$searchString = $searchString.'  departuredate=\''.$depDate[2].'-'.$depDate[1].'-'.$depDate[0].'\' AND';}
if($deptime[0] != '' && $deptime[1] != ''){$searchString = $searchString.' departureTime=\''.$deptime[0].':'.$deptime[1].'\' AND';}
*/

if($depDate[0] != '') {$searchString = $searchString." DAY(departuredate)=$depDate[0] AND";}
if($depDate[1] != '') {$searchString = $searchString." MONTH(departuredate)=$depDate[1] AND";}
if($depDate[2] != '') {$searchString = $searchString." YEAR(departuredate)=$depDate[2] AND";}
if($deptime[0] != '') {$searchString = $searchString." HOUR(departureTime)=$deptime[0] AND";}
if($deptime[1] != '') {$searchString = $searchString." MINUET(departureTime)=$deptime[1] AND";}

$searchString = substr($searchString,0,strlen($searchString)-3);

$_SESSION['refine']=$searchString;

header('Location: FlightSelect.html');

?>
