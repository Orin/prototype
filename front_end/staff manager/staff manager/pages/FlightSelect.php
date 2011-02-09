<?php
$q_user = mysql_query("SELECT * FROM flight");
?>
<div id="refine">

<form name="Flight_info" method="post" action="" align=right>
  <table border="0" id="ResultRefine">
          
          <tr><th colspan="2">Refine Flights</th></tr>
          <tr><td>Destination:</td> <td><?php dropdown($airports);?></td></tr>
          <tr><td>Departure:</td> <td><?php dropdown($airports);?></td></tr>
          <tr><td>Departure Date:</td> <td><?php datePicker();?></input></td></tr>
          <tr><td>Departure Time:</td> <td><?php datePicker();?></input></td></tr>

      <tr>
          <td colspan="2"><input type="submit" value="Search" /></td>
      </tr>
  </table>
</form>
</div>
<?php showFlightTable($q_user);?>