<script type="text/javascript">
function sendData(thisForm)
{
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4 && ajax.status==200)
		{
			var success = ajax.responseText;
			if (success == 'success - refreshed') {
				document.getElementById(thisForm).submit();
			}
		}
	}
	ajax.open("GET", "ajax.php?action=refresh_session", false);
	ajax.send();
}
function newSearch()
{
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange=function()
	{
		if (ajax.readyState==4 && ajax.status==200)
		{
			var success = ajax.responseText;
			if (success == 'success - refreshed') {
				document.getElementById('searchData').submit();
			}
		}
	}
	
	ajax.open("GET", "ajax.php?action=unset&session=search", true);
	ajax.send();
 	ajax.open("GET", "ajax.php?action=refresh_session", false);
	ajax.send();
}

function resetForm()
{
	document.searchData.reset();
}
</script>
<div class="left-column">
<?php 

/**************************************************************************
*
* Index, Flights, startOver
*
**************************************************************************/
if ($page == 'index' || $page == 'flights' || $page  == 'startOver') { 
	
	/************************
	* Index / startOver
	************************/
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
		<form id="searchData" method="post" action="flights.html">
        <input type="hidden" name="confirmSubmit" value="confirmed" />
		<table id="search-table">
			<tr class="from"><td>From</td><td><?php dropdown($destinations, $fromDrop, 'fromDrop', '196px'); ?></td></tr>
			<tr class="to"><td>To</td><td><?php dropdown($destinations, $toDrop, 'toDrop', '196px'); ?></td></tr>
			<tr class="depart"><td>Depart</td><td><?php datePicker($departDayDrop, $departMonthDrop, 'depart'); ?></td></tr>
			<tr class="return"><td>Return</td><td><?php datePicker($returnDayDrop, $returnMonthDrop, 'return'); ?></td></tr>
			<tr class="spacer small"><td></td></tr>
            <tr class="class"><td>Class</td><td><?php dropdown($classes, $class, 'classDrop', '196px'); ?></td></tr>
			<tr class="people"><td>Adults<br /><?php noPsngrPicker("adult", $adults); ?></td><td>Children<br /><?php noPsngrPicker("children", $children); ?></td></tr>
			<tr class="spacer"><td></td></tr>
			<tr class="actions"><td><a href="javascript:resetForm();">Reset Form</a></td><td><a href="javascript:newSearch();">Search</a></td></tr>
		</table>
        </form>
	</div>
	<?php 
	/***********************************
	*
	* Index / startOver
	*
	***********************************/
	if ($page == 'index' || $page == 'startOver') { ?>
	  <div id="booking-search">
		<h2>Manage Booking</h2>
		<form id="manageBooking" method="post" action="manage-booking.html">
		<table id="booking-table">
			
			<tr class="last-name"><td>Last Name</td><td><input type="text" name="lName" onkeypress="return isLetters(event);" /></td></tr>
			<tr class="booking-ref"><td>Booking Reference</td><td><input type="text" name="bookingRef" /></td></tr>
			<tr class="spacer small"><td></td></tr>
			<tr class="actions"><td><a href="javascript:sendData('manageBooking');">Search</a></td></tr>
			
		</table>
		</form>
	   </div>
	<?php }
	
	/***********************************
	*
	* Flights
	*
	***********************************/
	
	if ($page == 'flights') { ?>    
		<div id="display-selected" style="height:290px;">
			<h2>Your Selected Flights</h2>
			<form id="fltDetails" method="post" action="details.html">
			<input type="hidden" name="class" value="<?php echo $class; ?>" />
			<input type="hidden" name="passengers" value="<?php echo $totalPsngrs; ?>" />
			<input type="hidden" name="adults" value="<?php echo $adults; ?>" />
			<input type="hidden" name="children" value="<?php echo $children; ?>" />
			<div id="div-display-selected-out" style="visibility:<?php if (isset($_SESSION['flights'])) {?>visible<?php } else { ?>hidden<?php } ?>">
			<b>Outbound</b>
			<span id="display-selected-out"><?php if (isset($_SESSION['flights'])) {?>
            <table class="table-selected">
            	<tbody><tr><td>£<?php echo $outPrice; ?><input type="hidden" name="outPrice" value="<?php echo $outPrice; ?>"></td>
                <td><?php echo $outDate; ?><input type="hidden" name="outDate" value="<?php echo $outDate; ?>"></td>
                <td><?php echo $outDepart; ?><input type="hidden" name="outDepart" value="<?php echo $outDepart; ?>"></td>
                <td><?php echo $outArrive; ?><input type="hidden" name="outArrive" value="<?php echo $outArrive; ?>"></td>
                <td><?php echo $outFrom; ?><input type="hidden" name="outFrom" value="<?php echo $outFrom; ?>"></td>
                <td><?php echo $outTo; ?><input type="hidden" name="outTo" value="<?php echo $outTo; ?>"></td>
                <td class="fltNo"><?php echo $outFlight; ?><input type="hidden" name="outFlight" value="<?php echo $outFlight; ?>"></td>
                <input type="hidden" name="outScheduleID" value="<?php echo $outScheduleID; ?>">
            </tr></tbody></table>
            <?php } ?>
            </span>
			</div>
			&nbsp;<br />
			<div id="div-display-selected-in" style="visibility:<?php if (isset($_SESSION['flights'])) {?>visible<?php } else { ?>hidden<?php } ?>">
			<b>Inbound</b>
			<span id="display-selected-in"><?php if (isset($_SESSION['flights'])) {?>
            <table class="table-selected">
            	<tbody><tr><td>£<?php echo $returnPrice; ?><input type="hidden" name="returnPrice" value="<?php echo $returnPrice; ?>"></td>
                <td><?php echo $retDate; ?><input type="hidden" name="returnDate" value="<?php echo $retDate; ?>"></td>
                <td><?php echo $returnDepart; ?><input type="hidden" name="returnDepart" value="<?php echo $returnDepart; ?>"></td>
                <td><?php echo $returnArrive; ?><input type="hidden" name="returnArrive" value="<?php echo $returnArrive; ?>"></td>
                <td><?php echo $returnFrom; ?><input type="hidden" name="returnFrom" value="<?php echo $returnFrom; ?>"></td>
                <td><?php echo $returnTo; ?><input type="hidden" name="returnTo" value="<?php echo $returnTo; ?>"></td>
                <td class="fltNo"><?php echo $returnFlight; ?><input type="hidden" name="returnFlight" value="<?php echo $returnFlight; ?>"></td>
                <input type="hidden" name="returnScheduleID" value="<?php echo $returnScheduleID; ?>">
            </tr></tbody></table>
            <?php } ?>
            
            </span>
			</div>
			<div id="div-selected-total" style="visibility:<?php if (isset($_SESSION['flights'])) {?>visible<?php } else { ?>hidden<?php } ?>">
			<b>Total</b>
			£<span id="display-selected-total"><?php echo $totalPrice; ?></span>
			</div>
			&nbsp;<br />
			<div id="continue" style="visibility:<?php if (isset($_SESSION['flights'])) {?>visible<?php } else { ?>hidden<?php } ?>">
			<a id="continueButton" href="javascript:cartAdd();">Continue</a>
			</div>
			</form>
		</div>       
	<?php }
}

/**************************************************************************
*
* Details or Confirmation, Manage Booking
*
**************************************************************************/
if ($page == 'details' || $page == 'confirmation' || $page == 'manage-booking') { ?>
	<div id="display-selected">
		<h2>Flight Details</h2>
			
        <div id="div-display-selected-out">
            <b>Outbound</b>
            <div id="display-selected-out">
                <table class="table-selected"><tr class="out"><?php if ($page != 'manage-booking') { ?><td>£<?php echo $outPrice; ?></td><?php } ?><td><?php echo $outDate; ?></td><td><?php echo $outDepart; ?></td><td><?php echo $outArrive; ?></td><td><?php echo $outFrom; ?></td><td><?php echo $outTo; ?></td><td><?php echo $outFlight; ?></td></tr>
                </table>
            </div>
        </div>
        &nbsp;<br />
        <div id="div-display-selected-in">
            <b>Inbound</b>
            <div id="display-selected-in">
                <table class="table-selected"><tr class="in"><?php if ($page != 'manage-booking') { ?><td>£<?php echo $returnPrice; ?></td><?php } ?><td><?php echo $retDate; ?></td><td><?php echo $returnDepart; ?></td><td><?php echo $returnArrive; ?></td><td><?php echo $returnFrom; ?></td><td><?php echo $returnTo; ?></td><td><?php echo $returnFlight; ?></td></tr>
                </table>
			</div>
        </div>
        &nbsp;<br />
        <b>Total: £<?php echo $totalPrice; ?></b>
    </div><?php

	/***********************************
	*
	* Confirmation, Manage Booking
	*
	***********************************/
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
        </div><?php
	}  	
} ?>
</div>