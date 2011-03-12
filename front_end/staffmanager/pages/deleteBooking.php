<?php


$pks = $_POST['bookingID'];
$backTo = $_POST['URL'];
if(isset($_POST['custID'])) {$_SESSION['custID'] = $_POST['custID'];}


$getPasengers = 'SELECT passengerID FROM bookings_passengers WHERE bookingID=\''.$pks.'\'';
// delete passengers for that booking 
$result = mysql_query($getPasengers);
for ($i = 0; $i<mysql_num_rows($result) ; $i++)
{
	$data = mysql_fetch_array($result);
	$passengerID = $data['passengerID'];
	$removeQuery = 'DELETE FROM passengers WHERE passengerID=\''.$passengerID.'\'';
	mysql_query($removeQuery);
}

$removePassengerBookings = 'DELETE FROM bookings_passengers WHERE bookingID=\''.$pks.'\'';
mysql_query($removePassengerBookings);

$deleteBooking = 'DELETE FROM bookings WHERE bookingID =\''.$pks.'\'';
mysql_query($deleteBooking);

header('Location: '.$backTo);


?>
