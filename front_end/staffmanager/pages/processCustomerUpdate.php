<?php 
$details[0] = $_POST['Fnam'];
$details[1] = $_POST['Lnam'];
$details[2] = $_POST['Email'];
$details[3] = $_POST['custid'];

$query = 'UPDATE customers SET Firstname = \''.$details[0].'\', LastName = \''.$details[1].'\', EmailAddress = \''.$details[2].'\' WHERE customerID = '.$details[3].'';
mysql_query($query);
header('Location: index.html');
?>