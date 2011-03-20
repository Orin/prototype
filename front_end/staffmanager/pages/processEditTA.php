<?php 
$nameold = $_POST['oname'];
$name = $_POST['name'];

$query = 'UPDATE agents SET name = \''.$name.'\' WHERE name = \''.$nameold.'\'';

mysql_query($query);

header('Location: travelAgents.html');
?>