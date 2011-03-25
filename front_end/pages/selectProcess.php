<?php
$outScheduleID = $_POST['outScheduleID'];
$returnScheduleID = $_POST['returnScheduleID'];
$class = $_POST['class'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$psngrCount = $adults + $children;
if (checkStillAvailable($outScheduleID, $class, $psngrCount) && checkStillAvailable($returnScheduleID, $class, $psngrCount)) {
	//Handle session and temp hold on order
} else {
	//Loop back to home page with error message
	redirect("startOver.html");
	exit;
}

$outPrice = $_POST['outPrice'];
$returnPrice = $_POST['returnPrice'];
$totalPrice = $outPrice + $returnPrice;

?>

