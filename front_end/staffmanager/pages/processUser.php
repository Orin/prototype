<?php 

$userID = $_POST['userID'];
$Password = $_POST['Password'];
$dpName = $_POST['dpName'];
$access = $_POST['AL'];

$q_user = mysql_query("INSERT INTO users(username, password, accessLevel, displayName) VALUES ('$userID', '$Password', $access, '$dpName')");
header('Location: users.html');

?>