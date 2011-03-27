<script>
function sendData(thisForm)
{
 document.getElementById(thisForm).submit();
}


function resetForm()
{
	document.searchData.reset();
}
</script>
<div class="left-column">
<?php 
if ($page == 'index' || $page == 'flights' || $page  == 'startOver') { 
	if ($page == 'index' || $page == 'startOver') { 
	$fromDrop = 'Edinburgh';
	$toDrop = 'Glasgow';
	$departDayDrop = 20;
	$returnMonthDrop = $departMonthDrop = 4;
	$returnDayDrop = 21;
	$class = 'Economy';
	$adults = 1;
	$children = 0;
	} ?>
	<div id="flight-search">
		<h2>Book a flight</h2>
		<form id="searchData" method="POST" action="flights.html">
		<table id="search-table">
			<tr class="from"><td>From</td><td><?php dropdown($destinations, $fromDrop, 'fromDrop', '196px'); ?></td></tr>
			<tr class="to"><td>To</td><td><?php dropdown($destinations, $toDrop, 'toDrop', '196px'); ?></td></tr>
			<tr class="depart"><td>Depart</td><td><?php datePicker($departDayDrop, $departMonthDrop, 'depart'); ?></td></tr>
			<tr class="return"><td>Return</td><td><?php datePicker($returnDayDrop, $returnMonthDrop, 'return'); ?></td></tr>
			<tr class="spacer small"><td></td></tr>
            <tr class="class"><td>Class</td><td><?php dropdown($classes, $class, 'classDrop', '196px'); ?></td></tr>
			<tr class="people"><td>Adults<br /><?php noPsngrPicker("adult", $adults); ?></td><td>Children<br /><?php noPsngrPicker("children", $children); ?></td></tr>
			<tr class="spacer"><td></td></tr>
			<tr class="actions"><td><a href="javascript:resetForm();">Reset Form</a></td><td><a href="javascript:sendData('searchData');">Search</a></td></tr>
		</table>
        </form>
	</div>
<?php }

if ($page == 'index' || $page == 'startOver') { ?>
  <div id="booking-search">
    <h2>Manage Booking</h2>
    <table id="booking-table">
    	<form id="manageBooking" method="POST" action="manage-booking.html">
    	<tr class="last-name"><td>Last Name</td><td><input type="text" name="lName" onkeypress="return isLetters(event);" /></td></tr>
        <tr class="booking-ref"><td>Booking Reference</td><td><input type="text" name="bookingRef" /></td></tr>
        <tr class="spacer small"><td></td></tr>
        <tr class="actions"><td><a href="javascript:sendData('manageBooking');">Search</a></td></tr>
        </form>
    </table>
   </div>
<?php }

if ($page == 'flights') { ?>    
    <div id="display-selected" style="height:290px;">
		<h2>Flight Details</h2>
        <form id="fltDetails" method="POST" action="details.html">
        <input type="hidden" name="class" value="<?php echo $class; ?>" />
        <input type="hidden" name="passengers" value="<?php echo $totalPsngrs; ?>" />
        <input type="hidden" name="adults" value="<?php echo $adults; ?>" />
        <input type="hidden" name="children" value="<?php echo $children; ?>" />
        <div id="div-display-selected-out" style="visibility:hidden">
        <b>Outbound</b>
        <span id="display-selected-out"></span>
        </div>
        &nbsp;<br />
        <div id="div-display-selected-in" style="visibility:hidden">
        <b>Inbound</b>
        <span id="display-selected-in"></span>
        </div>
        <div id="div-selected-total" style="visibility:hidden">
        <b>Total</b>
        £<span id="display-selected-total"></span>
        </div>
        &nbsp;<br />
        <div id="continue" style="visibility:hidden">
        <a id="continueButton" href="javascript:cartAdd();">Continue</a>
        </div>
        </form>
    </div>
<?php }

if ($page == 'details' || $page == 'confirmation' || $page == 'manage-booking') { ?>
 <div id="display-selected">
		<h2>Flight Details</h2>
			
        <div id="div-display-selected-out">
        <b>Outbound</b>
        <span id="display-selected-out">
        <table class="table-selected"><tr class="out"><?php if ($page != 'manage-booking') { ?><td>£<?php echo $outPrice; ?></td><?php } ?><td><?php echo $outDate; ?></td><td><?php echo $outDepart; ?></td><td><?php echo $outArrive; ?></td><td><?php echo $outFrom; ?></td><td><?php echo $outTo; ?></td><td><?php echo $outFlight; ?></td></tr>
        </table>
        </span>
        </div>
        &nbsp;<br />
        <div id="div-display-selected-in">
        <b>Inbound</b>
        <span id="display-selected-in">
         <table class="table-selected"><tr class="in"><?php if ($page != 'manage-booking') { ?><td>£<?php echo $returnPrice; ?></td><?php } ?><td><td><?php echo $returnDate; ?></td><td><?php echo $returnDepart; ?></td><td><?php echo $returnArrive; ?></td><td><?php echo $returnFrom; ?></td><td><?php echo $returnTo; ?></td><td><?php echo $returnFlight; ?></td></tr>
        </table>
        </div>
        &nbsp;<br />
        <b>Total: £<?php echo $totalPrice; ?></b>
    </div>
<?php }

if ($page == 'confirmation' || $page == 'manage-booking') { ?>
    <div id="passenger-details" style="padding-top:5px">
    <h2>Passenger Details</h2>
    <?php
	for ($i = 0; $i < $psngrCount; $i++) { ?>
		<?php if ($psngrCount > 1) { ?>Passenger <?php echo $i + 1; ?>: <?php } echo $firstN[$i].' '.$lastN[$i]; ?><br />
    <?php } ?>
    &nbsp;<br />
    <h2>Billing Details</h2>
    <?php echo $billFirstN.' '.$billLastN; ?><br />
    <?php echo $billAddress1; ?><br />
    <?php if ($billAddress2) echo $billAddress2.'<br />'; ?>
    <?php echo $billCity; ?><br />
    <?php echo $billPostcode; ?><br />
    <?php //echo $billCountry; <br />?>
    &nbsp;<br />
    <i>Email: <?php echo $email; ?></i><br />
    &nbsp;<br />
    </div>
<?php } ?>
</div>