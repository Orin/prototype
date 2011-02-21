<?php

$newTA = $_POST['new'];

$q_user = mysql_query( "INSERT INTO agents(name) VALUES ('$newTA')");

header('Location: travelAgents.html');

?>