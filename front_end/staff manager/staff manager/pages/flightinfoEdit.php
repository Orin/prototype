<?php
//$flightNo = $_GET['flightNo'];
$flightNo = "TA-EDI-LBA-101";
if (!is_null($flightNo))
{
	$q_user = mysql_query("SELECT * FROM flight WHERE flightNo = '".$flightNo."'");

	if(mysql_num_rows($q_user) != 1)
	{
		echo 'something really weard just happened';
	}
	$data = mysql_fetch_array($q_user);
}
?>
<form name="Flight_info" method="post" action="processFlightEdit.php?action=PFlight" >
  <table border="1" id="inputData">
      <th colspan="2">Enter Flight Information</th>
      <tr><td>Flight Number: </td><td><?php echo $data['flightNo'];?></td></tr>
      <tr><td>Flight Destination: </td><td><?php dropDown($airports, 'NCL');?> </td></tr>
      <tr><td>Flight Departure: </td><td><?php dropDown($airports, 'EDI');?></td></tr>
      <tr><td>Flight Capacity: </td><td><input type="text" name="cap" value=<?php echo $data['capacity'];?> /></td></tr>
      <tr><td>No of Economy Seats:</td><td> <input type="text" name="econmySeats"value=<?php echo $data['econemyseats'];?> /></td></tr>
      <tr><td>No of Business Seats:</td><td> <input type="text" name="busSeats"value=<?php echo $data['businessseats'];?> /></td></tr>
      <tr><td>No of Group Seats: </td><td><input type="text" name="groupSeats" value=<?php echo $data['groupseats'];?> /></td></tr>
      <tr><td>Business Cost:</td><td> <input type="text" name="groupSeats" value=100 /></td></tr>
	  <tr><td>Group Cost:</td><td> <input type="text" name="groupSeats" value=50 /></td></tr>
	  <tr><td>Individual Cost:</td><td> <input type="text" name="groupSeats" value=75 /></td></tr>
      <tr><th colspan="2"><input type="submit" /></th></tr>
  </table>
</form>

