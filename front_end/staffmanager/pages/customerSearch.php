<?php
if (isset($_POST['Fname'])) {$criteria[0] = $_POST['Fname'];}
if (isset($_POST['Lname'])) {$criteria[1] = $_POST['Lname'];}



$query = "SELECT * FROM customers, flightSchedule, bookings WHERE customers.customerID = bookings.customerID AND bookings.FlightScheduleID = flightSchedule.ScheduleID";

if (isset($_POST['refine'])) 	{$query = $query.' AND '.$_POST['refine'];}
else{
if(!empty($criteria[0]))
{
	$query = $query." AND customers.Firstname ='$criteria[0]'";
}
if(!empty($criteria[1]))
{
	$query = $query." AND customers.LastName ='$criteria[1]'";
}
}

$result = mysql_query($query);
?>



<table border="1" align=left id="displayInfo">
<tr>
<th><h4>Booking Reference</h4></th>
<th><h4>CustomerID</h4></th>
<th><h4>First Name</h4></th>
<th><h4>Last Name</h4></th>
<th><h4>Email Address</h4></th>
<th><h4>ScheduleID</h4></th>
<th><h4>FlightNo</h4></th>
<th><h4>Departure Date</h4></th>
<th><h4>Daparture Time</h4></th>
<th><h4>Arrival Time</h4></th>
<th><h4>Delete Customer (cancel booking)</h4></th>
</tr>

<?php 



for ($i =0;  $i<mysql_num_rows($result); $i++)
{
  $data = mysql_fetch_array($result);
 
  $ScheduleID = $data['ScheduleID'];
  $FlightNo = $data['FlightNo'];
  $custID = $data['customerID'];
  $bookingID = $data['bookingID'];
echo '<tr onClick="javascript:postValue(\'viewBooking.html\', {bookingref:\''.$bookingID.'\'});">';
  echo '<td>';
echo $bookingID;
echo '</td>';
 
 echo '<td>';
echo $custID;
echo '</td>';

echo '<td onClick="window.location=\'custInfoEdit.html\';">';
echo $data['bill_fName'];
echo '</td>';

echo '<td  onClick="window.location=\'custInfoEdit.html\';">';
echo $data['bill_lName'];
echo '</td>';

echo '<td>';
echo $data['email'];
echo '</td>';

echo '<td>';
echo '<a href="javascript:postValue(\'scheduleInfo.html\', {scheduleID:\''.$ScheduleID.'\'});">'.$ScheduleID.'</a>';
echo '</td>';

echo '<td>';
echo '<a href="javascript:postValue(\'viewFlight.html\', {flightNo:\''.$FlightNo.'\'});">'.$FlightNo.'</a>';  
echo '</td>';

echo '<td>';
echo $data['departuredate'];
echo '</td>';

echo '<td>';
echo $data['departureTime'];
echo '</td>';

echo '<td>';
echo $data['arrivalTime'];
echo '</td>';

echo '<td>';
echo '<a href="javascript:postValue(\'deleteBooking.html\', {bookingID:\''.$bookingID.'\', URL:\'customerSearch.html\'});"><img src="icons/delete.gif" /></a>';
echo '</td>';


echo '</tr>';

}?>
</table>



</div>

