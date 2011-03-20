<?php
$bookingID = $_POST['bookingID'];
$nschedule = $_POST['scheduleID'];
$nclass = $_POST['class'];


$getclass = "SELECT classID FROM classes WHERE className = '$nclass'";
$class = mysql_query ($getclass);
$classID =  mysql_fetch_array($class);
$classID1 = $classID['classID'];

$seats = availableSeats($nschedule,$nclass);

$getpassengers = "SELECT COUNT(*) FROM bookings_passengers WHERE bookingID = '$bookingID'";
$noOfpassengers = mysql_query ($getpassengers);
$No = mysql_fetch_array($noOfpassengers);

if($seats <$No['COUNT(*)'])
{
	echo 'the schedule does not have '.$No.' seats avalable this booking was not changed';
	?>
	<form>
	<input type="button" value="Back To Bookings" onclick="window.location.href='customerSearch.html'"> 
	</form>
	<?php
	
}
else
{
	$update = "UPDATE bookings SET FlightScheduleID = $nschedule, classID = $classID1 WHERE bookingID = '$bookingID'";
	$result = mysql_query ($update);

	if(!$result){
	echo 'bad query';
	}
	else 
	{
	echo 'data booking sccesfully updated';

	?>
	<form>
	<input type="button" value="Back To Bookings" onclick="window.location.href='customerSearch.html'"> 
	</form>
	<?php 
	}
}
?>