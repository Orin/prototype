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
	<div id="flight-search">
		<h2>Book a flight</h2>
		<form id="searchData" method="POST" action="flights.html">
		<!--Search fields populated from available destinations in DB -->
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
    
    <div id="display-selected" style="height:290px;">
		<h2>Flight Details</h2>
        <form id="fltDetails" method="POST" action="details.html">
        <input type="hidden" name="class" value="<?php echo $class; ?>" />
        <input type="hidden" name="passengers" value="<?php echo $totalPsngrs; ?>" />
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
        <a href="javascript:sendData('fltDetails');">Continue</a>
        </div>
        </form>
    </div>
</div>

<div class="content-body">
<h2>Select your flights</h2>
<div class="results-box outbound">
    <div class="heading">
        <p class = "flights title">Outbound</p>
        <p class = "flights subtitle"><?php echo $fromDrop.' - '.$toDrop; ?></p>
    </div>
    <div class="results">
 <?php $flightsID = 1;   	
        //Determine price class
        if ($class == 'Economy') $priceClass = 'econPrice';
		elseif ($class == 'Business') $priceClass = 'busPrice';
		else $priceClass = 'ERROR'; ?>
		
		<table class="displayFlights outbound">
            <tr class="row-title"><td>Price</td><td>Date</td><td>Depart</td><td>Arrive</td><td>From</td><td>To</td><td>Flight No</td></tr>
            <?php if (count($outResult) == 0) { ?>
			<tr><td>No available flights</td></tr>
            <?php }	
            for ($i = 0; $i < count($outResult); $i++) { ?>
            <tr id="<?php echo $i + 1; ?>" class="out" onmousedown="highlightSelect(0, <?php echo $i + 1; ?>, <?php echo $outResult[$i][$priceClass]; ?>);">

            	<td>£<?php echo $price = $outResult[$i][$priceClass] ?><input type="hidden" name="outPrice" value="<?php echo $price; ?>" /></td><td><?php echo $outDate = date("D j M", strtotime($departDate)); ?><input type="hidden" name="outDate" value="<?php echo $outDate; ?>" /></td><td><?php echo $outDep = formatTime($outResult[$i]['departureTime']); ?><input type="hidden" name="outDepart" value="<?php echo $outDep; ?>" /></td><td><?php echo $outArr = formatTime($outResult[$i]['arrivalTime']); if ($outResult[$i]['arrivalDate'] != $outResult[$i]['departuredate']){ echo '(+1)'; } ?><input type="hidden" name="outArrive" value="<?php echo $outArr; ?>" /></td><td><?php echo $from; ?><input type="hidden" name="outFrom" value="<?php echo $from; ?>" /></td><td><?php echo $to; ?><input type="hidden" name="outTo" value="<?php echo $to; ?>" /></td><td class="fltNo"><?php echo $fltNo = $outResult[$i]['flightNo']; ?><input type="hidden" name="outFlight" value="<?php echo $fltNo; ?>" /></td><input type="hidden" name="outScheduleID" value="<?php echo $outResult[$i]['ScheduleID']; ?>" />
            </tr>
        	<?php } ?>
        </table>
    </div>
</div>

<div class="results-box inbound">
    <div class="heading">
        <p class = "flights title">Inbound</p>
        <p class = "flights subtitle"><?php echo $toDrop.' - '.$fromDrop; ?></p>
    </div>
    <div class="results">
    	
        
        <table class="displayFlights inbound">
        <tr class="row-title"><td>Price</td><td>Date</td><td>Depart</td><td>Arrive</td><td>From</td><td>To</td><td>Flight No</td></tr>
        <?php if (count($returnResult) == 0) { ?>
			<tr><td>No available flights</td></tr>
         <?php }	
         for ($i = 0; $i < count($returnResult); $i++) { ?>
            <tr id="<?php echo $i + count($returnResult) + 1; ?>" class="in" onmousedown="highlightSelect(1, <?php echo $i + count($returnResult) + 1; ?>, <?php echo $returnResult[$i][$priceClass]; ?>);">
            	<td>£<?php echo $price = $returnResult[$i][$priceClass] ?><input type="hidden" name="returnPrice" value="<?php echo $price; ?>" /></td><td><?php echo $returnDate = date("D j M", strtotime($returnDate)); ?><input type="hidden" name="returnDate" value="<?php echo $returnDate; ?>" /></td><td><?php echo $returnDep = formatTime($returnResult[$i]['departureTime']); ?><input type="hidden" name="returnDepart" value="<?php echo $returnDep; ?>" /></td><td><?php echo $returnArr = formatTime($returnResult[$i]['arrivalTime']); if ($returnResult[$i]['arrivalDate'] != $returnResult[$i]['departuredate']){ echo '(+1)'; } ?><input type="hidden" name="returnArrive" value="<?php echo $returnArr; ?>" /></td><td><?php echo $from; ?><input type="hidden" name="returnFrom" value="<?php echo $to; ?>" /></td><td><?php echo $from; ?><input type="hidden" name="returnTo" value="<?php echo $to; ?>" /></td><td class="fltNo"><?php echo $fltNo = $returnResult[$i]['flightNo']; ?><input type="hidden" name="returnFlight" value="<?php echo $fltNo; ?>" /></td><input type="hidden" name="returnScheduleID" value="<?php echo $returnResult[$i]['ScheduleID']; ?>" />
            </tr>
        	<?php } ?>
        </table>
    </div>
</div>

</div>