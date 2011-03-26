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
            <tr id="<?php echo $i + 1; ?>" class="out" onmousedown="highlightSelect(0, <?php echo $i + 1; ?>, <?php echo $totalPsngrs; ?>);">

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
            <tr id="<?php echo $i + count($returnResult) + 1; ?>" class="in" onmousedown="highlightSelect(1, <?php echo $i + count($returnResult) + 1; ?>, <?php echo $totalPsngrs; ?>);">
            	<td>£<?php echo $price = $returnResult[$i][$priceClass] ?><input type="hidden" name="returnPrice" value="<?php echo $price; ?>" /></td><td><?php echo $returnDate = date("D j M", strtotime($returnDate)); ?><input type="hidden" name="returnDate" value="<?php echo $returnDate; ?>" /></td><td><?php echo $returnDep = formatTime($returnResult[$i]['departureTime']); ?><input type="hidden" name="returnDepart" value="<?php echo $returnDep; ?>" /></td><td><?php echo $returnArr = formatTime($returnResult[$i]['arrivalTime']); if ($returnResult[$i]['arrivalDate'] != $returnResult[$i]['departuredate']){ echo '(+1)'; } ?><input type="hidden" name="returnArrive" value="<?php echo $returnArr; ?>" /></td><td><?php echo $from; ?><input type="hidden" name="returnFrom" value="<?php echo $to; ?>" /></td><td><?php echo $from; ?><input type="hidden" name="returnTo" value="<?php echo $to; ?>" /></td><td class="fltNo"><?php echo $fltNo = $returnResult[$i]['flightNo']; ?><input type="hidden" name="returnFlight" value="<?php echo $fltNo; ?>" /></td><input type="hidden" name="returnScheduleID" value="<?php echo $returnResult[$i]['ScheduleID']; ?>" />
            </tr>
        	<?php } ?>
        </table>
    </div>
</div>

</div>