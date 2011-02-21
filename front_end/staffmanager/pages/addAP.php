<?php

$newAP = $_POST['new'];

$q_user = mysql_query( "INSERT INTO airports(name) VALUES ('$newAP')");

header('Location: airports.html');

?>