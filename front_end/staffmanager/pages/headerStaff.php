<?php
//get from a query later on 	
$airports[0] = '';
$airports[1] = 'EDI';
$airports[2] = 'GLA';
$airports[3] = 'ABZ';

$discountType[0] = 'percentage';
$discountType[1] = 'value';


$costing[0] = '';
$costing[1] = 'EDI-GLA';
$costing[2] = 'EDI-ABZ';
$costing[3] = 'GLA-ABZ';

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
    <div class="menu-item"><a href="scheduleInfo.html"><span class="item">Add Schedule</span></a></div>
    <div class="menu-item"><a href="editFlightSchedule.html"><span class="item">Edit Schedule</span></a></div>
	<div class="menu-item"><a href="discountsPricing.html"><span class="item">Discounts and Pricing</span></a></div>
  </div>
</div>

<p>Welcome, <?php echo $_SESSION["name"]; ?></p>