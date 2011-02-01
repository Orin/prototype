<?php
//get from a query later on 	
$airports[0] = '';
$airports[1] = 'MAN';
$airports[2] = 'LBA';
$airports[3] = 'LPL';
$airports[4] = 'EMA';
$airports[5] = 'BHX';
$airports[6] = 'LTN';
$airports[7] = 'STN';
$airports[8] = 'LHR';
$airports[9] = 'LGW';
$airports[10] = 'LCY';
$airports[11] = 'BRS';
$airports[12] = 'CWL';
$airports[13] = 'ABZ';
$airports[14] = 'NCL';
$airports[15] = 'EDI';


$costing[0] = '';
$costing[1] = 'LTN-BRS';
$costing[2] = 'CWL-LPL';
$costing[3] = 'LCY-ABZ';
$costing[4] = 'EDI-NCL';
$costing[5] = 'EDI-CWL';
$costing[6] = 'BHX-LPL';

$accessLvl[0] = '';
$accessLvl[1] = 'Manager';
$accessLvl[2] = 'Staff';								
?>

<div id="header">
<span id="main-title">Thistle Airways Booking and Management System Portal</span><br />
  <form align="right" style="padding:0px; margin:0px;"> 
      <input type="button" value="Logout" onClick="window.location = 'logout.html';"> 
  </form>
</div>
<div id="topNav">
  <div id="topNav-wrapper">
    <div class="menu-item"><a href="index.html"><span class="item">Home</span></a></div>
    <div class="menu-item"><a href="flightinfo.html"><span class="item">Add Flight</span></a></div>
    <div class="menu-item"><a href="FlightSelect.html"><span class="item">Edit Flight</span></a></div>
    <div class="menu-item"><a href="scheduleInfo.html"><span class="item">Add Schedule</span></a></div>
    <div class="menu-item"><a href="editFlightSchedule.html"><span class="item">Edit Schedule</span></a></div>
    <div class="menu-item"><a href="AddCostingStruc.html"><span class="item">Add Costing Structure</span></a></div>
    <div class="menu-item"><a href="EditCostingStruc.html"><span class="item">Edit Costing Structure</span></a></div>
    <div class="menu-item"><a href="users.html"><span class="item">Users</span></a></div>
  </div>
</div>

<p>Welcome, <?php echo $_SESSION["name"]; ?></p>