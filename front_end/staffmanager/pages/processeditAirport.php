<?php 
$nameold = $_POST['oname'];
$name = $_POST['name'];
$full = $_POST['fn'];

$query = 'UPDATE airports SET name = \''.$name.'\', fullName = \''.$full.'\' WHERE name = \''.$nameold.'\'';

mysql_query($query);

header('Location: airports.html');
?>