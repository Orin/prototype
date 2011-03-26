<?php
include_once 'init.php';
$action = $_GET['action'];
if ($action == 'select') {
	$_SESSION['flights']['class'] = $_GET['class'];
	$_SESSION['flights']['passengers'] = $_GET['passengers'];
	$_SESSION['flights']['adults'] = $_GET['adults'];
	$_SESSION['flights']['children'] = $_GET['children'];
	

$_SESSION['flights']['outPrice'] = $_GET['outPrice'];
$_SESSION['flights']['returnPrice'] = $_GET['returnPrice'];
$_SESSION['flights']['totalPrice'] = $_GET['totalPrice'];
	
$_SESSION['flights']['outDate'] = $_GET['outDate'];
$_SESSION['flights']['outDepart'] = $_GET['outDepart'];
$_SESSION['flights']['outArrive'] = $_GET['outArrive'];
$_SESSION['flights']['outFrom'] = $_GET['outFrom'];
$_SESSION['flights']['outTo'] = $_GET['outTo'];
$_SESSION['flights']['outFlight'] = $_GET['outFlight'];
	
$_SESSION['flights']['returnDate'] = $_GET['returnDate'];
$_SESSION['flights']['returnDepart'] = $_GET['returnDepart'];
$_SESSION['flights']['returnArrive'] = $_GET['returnArrive'];
$_SESSION['flights']['returnFrom'] = $_GET['returnFrom'];
$_SESSION['flights']['returnTo'] = $_GET['returnTo'];
$_SESSION['flights']['returnFlight'] = $_GET['returnFlight'];
	echo 'true';
}