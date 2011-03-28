<?php 

$FNumber = $_POST['FNo'];

if(isset ($_POST['goto'])) {$goto = $_POST['goto'];}
else {$goto = 'editFlightSchedule.html';}

$depDate[0] = $_POST['depDateDay'];
$depDate[1] = $_POST['depDateMonth'];
$depDate[2] = $_POST['depDateYear'];

$deptime[0] = $_POST['depTimehour'];
$deptime[1] = $_POST['depTimemin'];


$searchString = 'SELECT DISTINCT * FROM flightSchedule WHERE';
if($FNumber != ''){$searchString = $searchString.' FlightNo=\''.$FNumber.'\' AND';}


if($depDate[0] != '') {$searchString = $searchString." DAY(departuredate)=$depDate[0] AND";}
if($depDate[1] != '') {$searchString = $searchString." MONTH(departuredate)=$depDate[1] AND";}
if($depDate[2] != '') {$searchString = $searchString." YEAR(departuredate)=$depDate[2] AND";}
if($deptime[0] != '') {$searchString = $searchString." HOUR(departureTime)=$deptime[0] AND";}
if($deptime[1] != '') {$searchString = $searchString." MINUTE(departureTime)=$deptime[1] AND";}


$searchString = substr($searchString,0,strlen($searchString)-3);

$_SESSION['refine']=$searchString;

header('Location: '.$goto.'');

?>
