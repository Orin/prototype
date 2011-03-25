<?php
if ($page == 'details' || $page == 'confirmation') {
	$outScheduleID = $_POST['outScheduleID'];
	$returnScheduleID = $_POST['returnScheduleID'];
	$class = $_POST['class'];
	$adults = $_POST['adults'];
	$children = $_POST['children'];
	$psngrCount = $adults + $children;
	
	$outPrice = $_POST['outPrice'];
	$returnPrice = $_POST['returnPrice'];
	$totalPrice = $outPrice + $returnPrice;
	
	$outDate = $_POST['outDate'];
	$outDepart = $_POST['outDepart'];
	$outArrive = $_POST['outArrive'];
	$outFrom = $_POST['outFrom'];
	$outTo = $_POST['outTo'];
	$outFlight = $_POST['outFlight'];
	
	$returnDate = $_POST['returnDate'];
	$returnDepart = $_POST['returnDepart'];
	$returnArrive = $_POST['returnArrive'];
	$returnFrom = $_POST['returnFrom'];
	$returnTo = $_POST['returnTo'];
	$returnFlight = $_POST['returnFlight'];
}
elseif ($page == 'flights') {
	$fromDrop = ($_POST['fromDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['fromDrop'])) : 'BLANK';
	$from = airCodeLookup($fromDrop, "CODE");
	$toDrop =  ($_POST['toDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['toDrop'])) : 'BLANK';
	$to = airCodeLookup($toDrop, "CODE");
	
	$departDayDrop =  $_POST['departDay'];
	$departDay =  ($departDayDrop != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departDay'])) : 'BLANK';
	$departMonth =  ($_POST['departMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departMonth'])) : 'BLANK';
	$departMonthDrop =  date("n", strtotime($departMonth));
	$departYear =  ($_POST['departYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departYear'])) : 'BLANK';
	$departDate = date("Y-m-d", strtotime($departDay." ".$departMonth." ".$departYear));
	
	$returnDayDrop =  $_POST['returnDay'];
	$returnDay =  ($returnDayDrop != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnDay'])) : 'BLANK';
	$returnMonth =  ($_POST['returnMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnMonth'])) : 'BLANK';
	$returnMonthDrop =  date("n", strtotime($returnMonth));
	$returnYear =  ($_POST['returnYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnYear'])) : 'BLANK';
	$returnDate = date("Y-m-d", strtotime($returnDay." ".$returnMonth." ".$returnYear));
	
	$class = $_POST['classDrop'];
	
	$adults = $_POST['psngr-adult'];
	$children = $_POST['psngr-children'];
	$totalPsngrs = $adults + $children;
	$outResult = flightSearch($from, $to, $departDate, $class, $totalPsngrs);
	$returnResult = flightSearch($to, $from, $returnDate, $class, $totalPsngrs); 
}

if ($page == 'details' ) {
	if (checkStillAvailable($outScheduleID, $class, $psngrCount) && checkStillAvailable($returnScheduleID, $class, $psngrCount)) {
		//Handle session and temp hold on order
	} else {
		//Loop back to home page with error message
		redirect("startOver.html");
		exit;
	}
}
elseif ($page == 'confirmation') {
	
}


