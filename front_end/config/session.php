<?php 
$sessPages = array('flights', 'details', 'confirmation');
if (in_array($page, $sessPages)) {

	$query_update = "UPDATE orders_temp SET date_updated=NOW() WHERE session_id='".session_id()."'";
	$result_update = mysql_query($query_update);

	if (isset($_SESSION['flights_t']['timestamp'])) {
		if ($_SESSION['flights_t']['timestamp'] < date("Y-m-d H:i:s", mktime(date('H'),date('i')-10,date('s'),date('m'),date('d'),date('Y')))) {
			$query = "DELETE FROM orders_temp WHERE session_id='".session_id()."'";
			$result = mysql_query($query);
			cart_destroy();
		}
	} else {
		$_SESSION['flights_t']['timestamp'] = date("Y-m-d H:i:s");
	}
	$query = "DELETE FROM orders_temp WHERE  NOW() > DATE_ADD(date_updated, INTERVAL 1 MINUTE)";
	$result = mysql_query($query);
}
?>