<?php 
$sessPages = array('details', 'confirmation', 'flights');
if (in_array($page, $sessPages)) {

	$query_update = "UPDATE orders_temp SET date_updated=NOW() WHERE session_id='".session_id()."'";
	$result_update = mysql_query($query_update);

	if (isset($_SESSION['flights_cart_t']['timestamp'])) {
		
		if ($_SESSION['flights_cart_t']['timestamp'] < date("Y-m-d H:i:s", mktime(date('H'),date('i')+20,date('s'),date('m'),date('d'),date('Y')))) {
		
		} else {
			$query = "DELETE FROM orders_temp WHERE session_id='".session_id()."'";
			$result = mysql_query($query);
			unset($_SESSION['flights_cart']);
			session_destroy();
		}
		
		
	} else {
		$_SESSION['flights_cart_t']['timestamp'] = date("Y-m-d H:i:s");
	}
	$query = "DELETE FROM orders_temp WHERE  NOW() > DATE_ADD(date_updated, INTERVAL 1 MINUTE)";
	$result = mysql_query($query);
}
?>