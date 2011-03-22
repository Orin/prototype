<?php

$newAP = $_POST['new'];
$name = $_POST['fulName'];

$q_user = mysql_query( "INSERT INTO airports(name,fullName) VALUES ('$newAP', '$name')");

header('Location: airports.html');

?>
