<?php

/**************************************************************************
*
* Manage Booking
*
**************************************************************************/

/**************************************************************************
*
* Flights, Details or Confirmation
*
**************************************************************************/
if ($page == 'flights' || $page == 'details' || $page == 'confirmation') {
	
	
	if (isset($_SESSION['flights']) || $page == 'details' || $page == 'confirmation') {
		$outScheduleID = $_SESSION['flights']['outScheduleID'];
		$returnScheduleID = $_SESSION['flights']['returnScheduleID'];
	
		$class = $_SESSION['flights']['class'];
		$adults = $_SESSION['flights']['adults'];
		$children = $_SESSION['flights']['children'];
		
		$psngrCount = $adults + $children;
		
		$outPrice = $_SESSION['flights']['outPrice'];
		$returnPrice = $_SESSION['flights']['returnPrice'];
		$totalPrice = $_SESSION['flights']['totalPrice'];
		
		$outDate = $_SESSION['flights']['outDate'];
		$outDepart = $_SESSION['flights']['outDepart'];
		$outArrive = $_SESSION['flights']['outArrive'];
		$outFrom = $_SESSION['flights']['outFrom'];
		$outTo = $_SESSION['flights']['outTo'];
		$outFlight = $_SESSION['flights']['outFlight'];
		
		$retDate = $_SESSION['flights']['returnDate']; 
		$returnDepart = $_SESSION['flights']['returnDepart'];
		$returnArrive = $_SESSION['flights']['returnArrive'];
		$returnFrom = $_SESSION['flights']['returnFrom'];
		$returnTo = $_SESSION['flights']['returnTo'];
		$returnFlight = $_SESSION['flights']['returnFlight'];
	}
	
	/***********************************
	*
	* Details / Confirmation
	*
	***********************************/
	if ($page == 'details' || $page == 'confirmation') {
		if (!inOrdersTemp()) { 
			cart_destroy();
			redirect("startOver.html");
		}
	}
	/***********************************
	*
	* Details
	*
	***********************************/
	if ($page == 'details') {
		if (!(checkStillAvailable($outScheduleID, $class, $psngrCount) && checkStillAvailable($returnScheduleID, $class, $psngrCount))) {
			//Loop back to home page with error message
			redirect("startOver.html");
			exit;
		}
	}
	/***********************************
	*
	* Confirmation
	*
	***********************************/
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
		if (!$psngrResult) die('Invalid psngrResult query: ' . mysql_error());
		
		$psngrIDs = array();
		for ($i = 0; $i < mysql_affected_rows(); $i++) {
			$id = mysql_insert_id() + $i;
			array_push($psngrIDs, $id);
		}
		
		//Start DB transaction
		dbStart();
		$customerQuery = "INSERT into customers VALUES ('', '".$email."', '".$billFirstN."','".$billLastN."','".$billAddress1."','".$billAddress2."','".$billCity."','".$billPostcode."', '".$billCountry."')";
		$custResult = mysql_query($customerQuery);
		if (!$custResult) { dbRoll(); die('Invalid custResult query: ' . mysql_error()); }
		
		$bookingQuery = "INSERT into bookings VALUES ('".$bookingRef."', '".$outScheduleID."', '".$returnScheduleID."', '".mysql_insert_id()."', '', '".classLookup($class)."', '".$totalPrice."', CURRENT_TIMESTAMP)";
		$bookResult = mysql_query($bookingQuery);
		if (!$bookResult) { dbRoll(); die('Invalid bookResult query: ' . mysql_error()); }
		
		$bookPsngrsQuery = "INSERT into bookings_passengers VALUES ";
		for ($i = 0; $i < $psngrCount; $i++) {
			$bookPsngrsQuery = $bookPsngrsQuery."('".$bookingRef."', '".$psngrIDs[$i]."')";
			if ($i != $psngrCount - 1) { $bookPsngrsQuery = $bookPsngrsQuery.', '; }
		}
		$bookPsngrsResult = mysql_query($bookPsngrsQuery);
		if (!$bookPsngrsResult) {
			echo $bookPsngrsQuery;
			dbRoll();
			die('Invalid bookPsngrsResult query: ' . mysql_error());
		}
		dbCommit();
	}
}


/**************************************************************************
*
* Flights
*
**************************************************************************/

if ($page == 'flights') {
	if (!isset($_SESSION['search'])) {
		$confirmSubmit = (isset($_POST['confirmSubmit']))? $_POST['confirmSubmit'] : '';
		if ($confirmSubmit != 'confirmed') {
			redirect('startOver.html');
		}
		$fromDrop = $_SESSION['search']['fromDrop'] = ($_POST['fromDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['fromDrop'])) : 'BLANK';
		$from = $_SESSION['search']['from'] = airCodeLookup($fromDrop, "CODE");
		$toDrop = $_SESSION['search']['toDrop'] = ($_POST['toDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['toDrop'])) : 'BLANK';
		$to = $_SESSION['search']['to'] = airCodeLookup($toDrop, "CODE");
		
		$departDayDrop = $_SESSION['search']['departDayDrop'] = $_POST['departDay'];
		$departDay = $_SESSION['search']['departDay'] = ($departDayDrop != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departDay'])) : 'BLANK';
		$departMonth = $_SESSION['search']['departMonth'] = ($_POST['departMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departMonth'])) : 'BLANK';
		$departMonthDrop = $_SESSION['search']['departMonthDrop'] = date("n", strtotime($departMonth));
		$departYear = $_SESSION['search']['departYear'] = ($_POST['departYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departYear'])) : 'BLANK';
		$departDate = $_SESSION['search']['departDate'] = date("Y-m-d", strtotime($departDay." ".$departMonth." ".$departYear));
		
		$returnDayDrop = $_SESSION['search']['returnDayDrop'] = $_POST['returnDay'];
		$returnDay = $_SESSION['search']['returnDay'] = ($returnDayDrop != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnDay'])) : 'BLANK';
		$returnMonth = $_SESSION['search']['returnMonth'] = ($_POST['returnMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnMonth'])) : 'BLANK';
		$returnMonthDrop = $_SESSION['search']['returnMonthDrop'] = date("n", strtotime($returnMonth));
		$returnYear = $_SESSION['search']['returnYear'] = ($_POST['returnYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnYear'])) : 'BLANK';
		$returnDate = $_SESSION['search']['returnDate'] = date("Y-m-d", strtotime($returnDay." ".$returnMonth." ".$returnYear));
		
		$class = $_SESSION['search']['class'] = $_POST['classDrop'];
		
		$adults = $_SESSION['search']['adults'] = $_POST['psngr-adult'];
		$children = $_SESSION['search']['children'] = $_POST['psngr-children'];
		$totalPsngrs = $_SESSION['search']['totalPsngrs'] = $adults + $children;
		
		redirect('flights.html');
	} else {
		$fromDrop = $_SESSION['search']['fromDrop'];
		$from = $_SESSION['search']['from'];
		$toDrop = $_SESSION['search']['toDrop'];
		$to = $_SESSION['search']['to'];
		
		$departDayDrop = $_SESSION['search']['departDayDrop'];
		$departDay = $_SESSION['search']['departDay'];
		$departMonth = $_SESSION['search']['departMonth'];
		$departMonthDrop = $_SESSION['search']['departMonthDrop'];
		$departYear = $_SESSION['search']['departYear'];
		$departDate = $_SESSION['search']['departDate'];
		
		$returnDayDrop = $_SESSION['search']['returnDayDrop'];
		$returnDay = $_SESSION['search']['returnDay'];
		$returnMonth = $_SESSION['search']['returnMonth'];
		$returnMonthDrop = $_SESSION['search']['returnMonthDrop'];
		$returnYear = $_SESSION['search']['returnYear'];
		$returnDate = $_SESSION['search']['returnDate'];
		
		$class = $_SESSION['search']['class'];
		
		$adults = $_SESSION['search']['adults'];
		$children = $_SESSION['search']['children'];
		$totalPsngrs = $_SESSION['search']['totalPsngrs'];
	}
	
	$outResult = flightSearch($from, $to, $departDate, $class, $totalPsngrs);
	$returnResult = flightSearch($to, $from, $returnDate, $class, $totalPsngrs); 
}


/**************************************************************************
*
* Manage Booking
*
**************************************************************************/
if ($page == 'manage-booking') {
	$lName = $_POST['lName'];
	$bookingRef = $_POST['bookingRef'];
	$query = "
	SELECT
		flights.flightNo, flights.`departure`, flights.`destination`,
		flightSchedule.ScheduleID, flightSchedule.departuredate, flightSchedule.departureTime, 
		flightSchedule.arrivalDate, flightSchedule.arrivalTime,
		bookings.`totalCost`, classes.`className` AS class,
		`customers`.`bill_fName`, customers.`bill_lName`, customers.`bill_line1`, customers.`bill_line2`, customers.`bill_city`, customers.`bill_pCode`, customers.bill_country, customers.`email`
	
	FROM
		flights, flightSchedule, bookings, bookings_passengers, customers, classes
	
	WHERE
		bookings.`bookingID` = '".$bookingRef."'
		AND customers.bill_lName = '".$lName."'
		AND bookings.`classID` = classes.`classID`
		AND (flightSchedule.`ScheduleID` = bookings.`FlightScheduleID`
		OR flightSchedule.`ScheduleID` = bookings.`returnFlightScheduleID`)
		AND flights.flightNo = flightSchedule.`FlightNo`
		AND bookings.`customerID` = customers.`customerID`
	
	GROUP BY
		flights.flightNo";
	$result = mysql_query($query);
	if (!$result) { die('Invalid result query: ' . mysql_error()); }
	
	if (mysql_num_rows($result) == 0) {
		redirect('index.html');
	}
	
	$fltCount = 1;
	while ($row = mysql_fetch_array($result)) {
		
		$class = $row['class'];
		$totalPrice = $row['totalCost'];
		
		if ($fltCount == 1) {
			$outDate = $row['departuredate'];
			$outDepart = $row['departureTime'];
			$outArrive = $row['arrivalTime'];
			$outFrom = $row['departure'];
			$outTo = $row['destination'];
			$outFlight = $row['flightNo'];
		}
		if ($fltCount == 2) {
			$returnDate = $row['departuredate'];
			$returnDepart = $row['departureTime'];
			$returnArrive = $row['arrivalTime'];
			$returnFrom = $row['departure'];
			$returnTo = $row['destination'];
			$returnFlight = $row['flightNo'];
		}
			
		$billFirstN = $row['bill_fName'];
		$billLastN = $row['bill_lName'];
		$email = $row['email'];
		$billAddress1 = $row['bill_line1'];
		$billAddress2 = $row['bill_line2'];
		$billCity = $row['bill_city'];
		$billPostcode = $row['bill_pCode'];
		$billCountry = $row['bill_country'];
			
		$fltCount++;
	}
	
	$psngrQuery = "
		SELECT
			passengers.`fName`, passengers.`lName`
		
		FROM
			bookings, bookings_passengers, `passengers`, customers
		
		WHERE
			bookings.`bookingID` = '".$bookingRef."'
			AND customers.bill_lName = '".$lName."'
			AND bookings.`bookingID` = `bookings_passengers`.`bookingID`
			AND passengers.`passengerID` = `bookings_passengers`.`passengerID`";
	$psngrResult = mysql_query($psngrQuery);
	if (!$psngrResult) { die('Invalid psngrResult query: ' . mysql_error()); }
	$psngrCount = mysql_num_rows($psngrResult);
	$firstN = array();
	$lastN = array();
	while ($row = mysql_fetch_array($psngrResult)) {
		array_push($firstN, $row['fName']);
		array_push($lastN, $row['lName']);
	}
}
?>