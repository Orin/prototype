<?php 

$FNumber = $_POST['FNo'];

$depDate[0] = $_POST['depDateDay'];
$depDate[1] = $_POST['depDateMonth'];
$depDate[2] = $_POST['depDateYear'];

$deptime[0] = $_POST['deptimehour'];
$deptime[1] = $_POST['deptimemin'];


$searchString = 'SELECT DISTINCT * FROM flightSchedule WHERE';
if($FNumber != ''){$searchString = $searchString.' FlightNo=\''.$FNumber.'\' AND';}
if($depDate[0] != '' && $depDate[1] != '' && $depDate[2] != ''){$searchString = $searchString.'  departuredate=\''.$depDate[2].'-'.$depDate[1].'-'.$depDate[0].'\' AND';}
if($deptime[0] != '' && $deptime[1] != ''){$searchString = $searchString.' departureTime=\''.$deptime[0].':'.$deptime[1].'\' AND';}

$searchString = substr($searchString,0,strlen($searchString)-3);
$_SESSION['refine']=$searchString;

header('Location: editFlightSchedule.html');

?>