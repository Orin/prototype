<?php
include_once 'init.php';
include_once'config/functions.inc.php';
$action = $_GET['action'];
$status = 'fail - '.$action;
if ($action == 'select') {
	$_SESSION['flights']['class'] = $_GET['class'];
	$_SESSION['flights']['passengers'] = $_GET['passengers'];
	$_SESSION['flights']['adults'] = $_GET['adults'];
	$_SESSION['flights']['children'] = $_GET['children'];
	
	if (isset($_GET['outPrice'])) {
		$_SESSION['flights']['outPrice'] = $_GET['outPrice'];	
		$_SESSION['flights']['outDate'] = $_GET['outDate'];
		$_SESSION['flights']['outDepart'] = $_GET['outDepart'];
		$_SESSION['flights']['outArrive'] = $_GET['outArrive'];
		$_SESSION['flights']['outFrom'] = $_GET['outFrom'];
		$_SESSION['flights']['outTo'] = $_GET['outTo'];
		$_SESSION['flights']['outFlight'] = $_GET['outFlight'];
		$_SESSION['flights']['outScheduleID'] = $_GET['outScheduleID'];
	}
	
	if (isset($_GET['returnPrice'])) {
		$_SESSION['flights']['returnPrice'] = $_GET['returnPrice'];
		$_SESSION['flights']['returnDate'] = $_GET['returnDate'];
		$_SESSION['flights']['returnDepart'] = $_GET['returnDepart'];
		$_SESSION['flights']['returnArrive'] = $_GET['returnArrive'];
		$_SESSION['flights']['returnFrom'] = $_GET['returnFrom'];
		$_SESSION['flights']['returnTo'] = $_GET['returnTo'];
		$_SESSION['flights']['returnFlight'] = $_GET['returnFlight'];
		$_SESSION['flights']['returnScheduleID'] = $_GET['returnScheduleID'];
	}
	
	$_SESSION['flights']['totalPrice'] = $_GET['totalPrice'];	
	$status = 'success';
}

if ($action == 'cartAdd') {
	if (isset($_SESSION['flights']['outScheduleID'])) {
		$outQuery = "UPDATE orders_temp SET date_updated=NOW(), scheduleID = '".$_SESSION['flights']['outScheduleID']."', passengers=".$_SESSION['flights']['passengers']." WHERE outReturn='out' AND session_id='".session_id()."'";
		$outResult = mysql_query($outQuery);
		
		if (mysql_affected_rows() == 0) {
			$outQuery = "INSERT INTO orders_temp VALUES (NOW(),NOW(),'".session_id()."', '".$_SESSION['flights']['outScheduleID']."', '".$_SESSION['flights']['passengers']."', 'out')";
			$outResult = mysql_query($outQuery); 
			
			if (mysql_affected_rows() == 1 && (!isset($_SESSION['flights']['returnScheduleID']))) {
				$status = 'success';
			}
		} else {
			if (!isset($_SESSION['flights']['returnScheduleID'])) $status = 'success';
		}
	}
	if (isset($_SESSION['flights']['returnScheduleID'])) { 	
				$returnQuery = "UPDATE orders_temp SET date_updated=NOW(), scheduleID = '".$_SESSION['flights']['returnScheduleID']."', passengers=".$_SESSION['flights']['passengers']." WHERE outReturn='in' AND session_id='".session_id()."'";
				$returnResult = mysql_query($returnQuery);
				if (mysql_affected_rows() == 0) {
					$returnQuery = "INSERT INTO orders_temp VALUES (NOW(),NOW(),'".session_id()."', '".$_SESSION['flights']['returnScheduleID']."', '".$_SESSION['flights']['passengers']."', 'in' )";
					$returnResult = mysql_query($returnQuery); 
					echo mysql_error();
					if (mysql_affected_rows() == 1) {
						$status = 'success';
					}
				} else {
					$status = 'success';
				}
	}
	/*
				$query = "UPDATE orders_temp SET date_updated=NOW(), passengers=".$_SESSION['flights']['passengers']." WHERE scheduleID='".$_SESSION['flights']['outScheduleID']."' and session_id='".session_id()."'";
			} else {
				$_SESSION['ecfs_cart'][$product_id] = $quantity;
				
			}
			*/
}

if ($action == 'debug') {
	echo $_SESSION['flights']['class'].'<br />';
	echo $_SESSION['flights']['passengers'].'<br />';
	echo $_SESSION['flights']['adults'].'<br />';
	echo $_SESSION['flights']['children'].'<br />';
	
	echo $_SESSION['flights']['outPrice'].'<br />';
	echo $_SESSION['flights']['outDate'].'<br />';
	echo $_SESSION['flights']['outDepart'].'<br />';
	echo $_SESSION['flights']['outArrive'].'<br />';
	echo $_SESSION['flights']['outFrom'].'<br />';
	echo $_SESSION['flights']['outTo'].'<br />';
	echo $_SESSION['flights']['outFlight'].'<br />';
	echo $_SESSION['flights']['outScheduleID'].'<br />';
	
	echo $_SESSION['flights']['returnPrice'].'<br />';
	echo $_SESSION['flights']['returnDate'].'<br />';
	echo $_SESSION['flights']['returnDepart'].'<br />';
	echo $_SESSION['flights']['returnArrive'].'<br />';
	echo $_SESSION['flights']['returnFrom'].'<br />';
	echo $_SESSION['flights']['returnTo'].'<br />';
	echo $_SESSION['flights']['returnFlight'].'<br />';
	echo $_SESSION['flights']['returnScheduleID'].'<br />';
	
	echo $_SESSION['flights']['totalPrice'].'<br />';
	
	echo '<h2>flights_cart_t</h2>';
	echo $_SESSION['flights_cart_t']['timestamp'].'<br />';
	echo $time = date("Y-m-d H:i:s", mktime(date('H'),date('i')+20,date('s'),date('m'),date('d'),date('Y'))).'<br />';
	if ($_SESSION['flights_cart_t']['timestamp'] < $time) { } else {
		echo 'destroy session<br />';
	}
}

echo $status;