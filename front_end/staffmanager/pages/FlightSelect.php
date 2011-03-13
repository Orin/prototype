<?php

if (isset($_SESSION['refine'])) 	{$q_user = mysql_query($_SESSION['refine']); unset($_SESSION['refine']);}
else 								{$q_user = mysql_query("SELECT * FROM flights");}

?>
<div id="refine">

<form name="Flight_info" method="post" action="refineFlights.html" align=right>
  <table border="0" id="ResultRefine">
          
          <tr><th colspan="2">Refine Flights</th></tr>
          <tr><td>Destination:</td> <td><?php Dropdown($airports,'','dest');?></td></tr>
          <tr><td>Departure:</td> <td><?php Dropdown($airports,'','dep');?></td></tr>
          <tr><td>Departure Date:</td> <td><?php datePickerBackEnd('depDate');?></input></td></tr>
          <tr><td>Departure Time:</td> <td><?php timePicker(-1,-1,'deptime');?></input></td></tr>

      <tr>
          <td colspan="2"><input type="submit" value="Search" /></td>
      </tr>
  </table>
</form>
</div>
<?php showFlightTable($q_user, 'FlightSelect.html');?>
