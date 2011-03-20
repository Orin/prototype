<?php $_SESSION['applyTo'] = "Select * FROM flights";  $_SESSION['type'] = 1?>
<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="processDiscount.html">
						<table border="0" id="GlobalDis">
								
								<tr><th colspan="3">Set Global Discount</th></tr>
								<!--<tr><td>Discount Type:</td> <td><?php dropdown($discountType, '', 'dType');?></td></tr>-->
								<tr><td>All Class Discount:</td> <td><input type="text" name="AllclassD" ></input></td></tr>
								<tr><td>Economy Class Discount:</td> <td><input type="text" name="EconD" ></input></td></tr>
								<tr><td>Business Class Discount:</td> <td><input type="text" name="BusinessD" ></input></td></tr>
								<tr><td>Group Class Discount:</td> <td><input type="text" name="GroupD" ></input></td></tr>
								<tr><td>Discount Duration(between):</td> <td><?php datePickerBackEnd('durStart');?></input></td></tr>
								<tr><td></td><td> And </td><td></td></tr>
								<tr><td></td> <td><?php datePickerBackEnd('durEnd');?></input></td></tr>
							<tr>
								<td colspan="2"><input type="submit" value="Apply" /></td>
							</tr>
						</table>
	</form>
</div>



<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="ApplyDiscountFlight.html">
						<table border="0" id="GlobalDis">
          
          <tr><th colspan="2">Apply Discount To All Flights Matching</th></tr>
		  <tr><td>Flight Number:</td><td> <input type="text" name="Fno"/><?php //autoFill(1,"DestDiv");?></td></tr>
          <tr><td>Destination:</td> <td><?php dropdown($airports, '', 'Dest');?></td></tr>
          <tr><td>Departure:</td> <td><?php dropdown($airports, '', 'Dep');?></td></tr>

      <tr>
          <td colspan="2"><input type="submit" value="Search" /></td>
      </tr>
  </table>
	</form>


</div>

<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="ApplyDiscountSchedule.html">
						<table border="0" id="GlobalDis">
          
          <tr><th colspan="3">Apply Discount To All Flight Schedules Matching</th></tr>
          <tr><td>Departure Date(between):</td> <td><?php datePickerBackEnd('depDateStart');?></input></td></tr>
		  <tr><td></td><td> And </td><td></td></tr>
		  <tr><td></td> <td><?php datePickerBackEnd('depDateEnd');?></input></td></tr>
          <tr><td>Departure Time(between):</td> <td><?php timePicker(-1,-1,'depTimeStart');?></input></td></tr>
		  <tr><td></td><td> And </td><td></td></tr>
		  <tr><td></td> <td><?php  timePicker(-1,-1,'depTimeEnd');?></input></td></tr>
		  <tr><td>Arrival Time(between):</td> <td><?php timePicker(-1,-1,'arriveTimeStart');?></input></td></tr>
		  <tr><td></td><td> And </td><td></td></tr>
		  <tr><td></td> <td><?php timePicker(-1,-1,'arriveTimeEnd');?></input></td></tr>

      <tr>
          <td colspan="2"><input type="submit" value="Search" /></td>
      </tr>
  </table>
	</form>


</div>

<div id="globalDiscount" >

	<form name="setGlobalDiscount" method="post" action="modFlightPrice.html">
						<table border="0" id="GlobalDis">
          
          <tr><th colspan="3">Modify Prices Of All Flights Matching</th></tr>
		   <tr><td>Flight Number:</td><td> <input type="text" name="Fno"/><?php //autoFill(1,"DestDiv");?></td></tr>
          <tr><td>Destination:</td> <td><?php dropdown($airports, '', 'Dest');?></td></tr>
          <tr><td>Departure:</td> <td><?php dropdown($airports, '', 'Dep');?></td></tr>

      <tr>
          <td colspan="2"><input type="submit" value="Search" /></td>
      </tr>
  </table>
	</form>


</div>


