<?php
define ("SITE_NAME", "Thistle Airways");
define ("OVERBOOK_MOD", 1.1);

//$destinations = array('', 'Edinburgh', 'Glasgow', 'Aberdeen', 'Inverness');
$airResult = mysql_query("SELECT fullName from airports");
$destinations = array('');
while ($row = mysql_fetch_array($airResult)) {
	array_push($destinations, $row['fullName']);
}
$classes = array('Economy', 'Business');
?>