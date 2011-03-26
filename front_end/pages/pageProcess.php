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
if ($page == 'flights') {
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
if ($page == 'confirmation') {
	$bookingRef = bookingRefGenerator();
	$firstN = array();
	$lastN = array();
	$pNo = array();
	for ($i = 1; $i < $psngrCount + 1; $i++) {
		array_push($firstN, $_POST['firstN-'.$i]);
		array_push($lastN, $_POST['lastN-'.$i]);
		array_push($pNo, $_POST['pNo-'.$i]);
	}
	$billFirstN = (isset($_POST['firstN-b']))? $_POST['firstN-b'] : ''; 
	$billLastN = (isset($_POST['lastN-b']))? $_POST['lastN-b'] : ''; 
	$email = (isset($_POST['email']))? $_POST['email'] : ''; 
	$billAddress1 = (isset($_POST['address-1']))? $_POST['address-1'] : ''; 
	$billAddress2 = (isset($_POST['address-2']))? $_POST['address-2'] : FALSE; 
	$billCity = (isset($_POST['city']))? $_POST['city'] : ''; 
	$billPostcode = (isset($_POST['pcode']))? $_POST['pcode'] : ''; 
	$billCountry = (isset($_POST['country']))? $_POST['country'] : ''; 
	
	$cardType = (isset($_POST['cardType']))? $_POST['cardType'] : ''; 
	$ccNo = (isset($_POST['cc-no']))? $_POST['cc-no'] : ''; 
	$exp = (isset($_POST['exp']))? $_POST['exp'] : ''; 
	$secCode = (isset($_POST['sec-code']))? $_POST['sec-code'] : ''; 
	
	$psngrQuery = "INSERT into passengers VALUES ";
	for ($i = 0; $i < $psngrCount; $i++) {
		$psngrQuery = $psngrQuery."('', '".$firstN[$i]."', '".$lastN[$i]."', '".$pNo[$i]."', ";
		if ($i > $adults) { $psngrQuery = $psngrQuery."'1')";} else { $psngrQuery = $psngrQuery."'0')"; }
		if ($i != $psngrCount - 1) { $psngrQuery = $psngrQuery.', '; }
	}
	$psngrResult = mysql_query($psngrQuery);
	if (!$psngrResult) die('Invalid query: ' . mysql_error());
	
	$psngrIDs = array();
	for ($i = 0; $i < mysql_affected_rows(); $i++) {
		$id = mysql_insert_id() - $i;
		array_push($psngrIDs, $id);
	}
		
	$customerQuery = "INSERT into customers VALUES ('', '".$email."', '".$billFirstN."','".$billLastN."','".$billAddress1."','".$billAddress2."','".$billCity."','".$billPostcode."', '".$billCountry."')";
	$custResult = mysql_query($customerQuery);
	if (!$custResult) die('Invalid query: ' . mysql_error());
	
	$bookingQuery = "INSERT into bookings VALUES ('".$bookingRef."', '".$outScheduleID."', '".$returnScheduleID."', '".mysql_insert_id()."', '', '".classLookup($class)."', '".$totalPrice."', CURRENT_TIMESTAMP)";
	$bookResult = mysql_query($bookingQuery);
	if (!$bookResult) die('Invalid query: ' . mysql_error());
	
	$bookPsngrsQuery = "INSERT into bookings_passengers VALUES ";
	for ($i = 0; $i < $psngrCount; $i++) {
		$bookPsngrsQuery = $bookPsngrsQuery."('".$bookingRef."', '".$psngrIDs[$i]."')";
		if ($i != $psngrCount - 1) { $bookPsngrsQuery = $bookPsngrsQuery.', '; }
	}
	$bookPsngrsResult = mysql_query($bookPsngrsQuery);
	if (!$bookPsngrsResult) die('Invalid query: ' . mysql_error());
} ?>