
<?php
$bookingID = $_POST['bookingref'];

$query = "SELECT * FROM bookings, flightSchedule, customers, classes WHERE bookingID='$bookingID' AND FlightScheduleID = ScheduleID AND bookings.customerID = customers.customerID AND bookings.classID = classes.classID";

$result = mysql_query($query);
  $data = mysql_fetch_array($result);
?>
<table id="displayInfo" border=1>
<tr><th colspan=2>Booking Details</th></tr>
<tr><th colspan=2>Customer Details: </td></tr>
<tr><td>customerID: </td> <td><?php echo $data['customerID'];?></td></tr>
<tr><td>First Name: </td> <td><?php echo $data['Firstname'];?></td></tr>
<tr><td>Last Name: </td> <td><?php echo $data['LastName'];?></td></tr>
<tr><td>Email: </td> <td><?php echo $data['EmailAddress'];?></td></tr>
<tr><th colspan=2>Billing Information: </td></tr>
<tr><td>Billing First Name: </td> <td><?php echo $data['bill_fName'];?></td></tr>
<tr><td>Billing Last Name: </td> <td><?php echo $data['bill_lName'];?></td></tr>
<tr><td>Billing Address Line 1: </td> <td><?php echo $data['bill_line1'];?></td></tr>
<tr><td>Billing Address Line 2: </td> <td><?php echo $data['bill_line2'];?></td></tr>
<tr><td>Bllling City: </td> <td><?php echo $data['bill_city'];?></td></tr>
<tr><td>Billing Code: </td> <td><?php echo $data['bill_pCode'];?></td></tr>
<tr><th colspan=2>Flight Details: </td></tr>
<tr><td>Flight No:</td> <td><?php echo $data['FlightNo'];?></td></tr>
<tr><td>Departure Date:</td> <td><?php echo $data['departuredate'];?></td></tr>
<tr><td>Departure Time:</td> <td><?php echo $data['departureTime'];?></td></tr>
<tr><td>Arrival Date:</td> <td><?php echo $data['arrivalDate'];?></td></tr>
<tr><td>Arrival Time:</td> <td><?php echo $data['arrivalTime'];?></td></tr>
<tr><td>Class: </td> <td><?php echo $data['className'];?></td></tr>
<tr><td>travleAgent: </td> <td><?php echo $data['travelAgent'];?></td></tr>

<tr><th colspan=2>
	<form method="post" action="custInfoEdit.html">
		<input type="hidden" value="<?php echo $data['customerID'];?>" name="ID"/>
		<input type="hidden" value="<?php echo $data['Firstname'];?>" name="FirstName"/>
		<input type="hidden" value="<?php echo $data['LastName'];?>" name="LastName"/>
		<input type="hidden" value="<?php echo $data['EmailAddress'];?>" name="email"/>
		<input type="submit" value="Edit"/> 
	</form>
</th></tr>

</table>
