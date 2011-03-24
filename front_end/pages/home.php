<script>
function sendData()
{
  document.searchData.submit();
}

function resetForm()
{
	document.searchData.reset();
}
</script>

<div class="left-column">
	<div id="flight-search">
		<h2>Book a flight</h2>
		<form name="searchData" method="POST" action="flights.html">
		<!--Search fields populated from available destinations in DB -->
		<table id="search-table">
			<tr class="from"><td>From</td><td><?php dropdown($destinations, 'Edinburgh', 'fromDrop', '196px'); ?></td></tr>
			<tr class="to"><td>To</td><td><?php dropdown($destinations, 'Glasgow', 'toDrop', '196px'); ?></td></tr>
			<tr class="depart"><td>Depart</td><td><?php datePicker(20, 4, 'depart'); ?></td></tr>
			<tr class="return"><td>Return</td><td><?php datePicker(21, 4, 'return'); ?></td></tr>
			<tr class="spacer small"><td></td></tr>
            <tr class="class"><td>Class</td><td><?php dropdown($classes, 'Economy', 'classDrop', '196px'); ?></td></tr>
			<tr class="people"><td>Adults<br /><?php noPsngrPicker("adult", 1); ?></td><td>Children<br /><?php noPsngrPicker("children"); ?></td></tr>
			<tr class="spacer"><td></td></tr>
			<tr class="actions"><td><a href="javascript:resetForm();">Reset Form</a></td><td><a href="javascript:sendData();">Search</a></td></tr>
		</table>
        </form>
	</div>
    
  <div id="booking-search">
    <h2>Manage Booking</h2>
    
    <table id="booking-table">
    	<tr class="last-name"><td>Last Name</td><td><input type="text" name="lName"/></td></tr>
        <tr class="booking-ref"><td>Booking Reference</td><td><input type="text" name="bookingRef" /></td></tr>
        <tr class="spacer small"><td></td></tr>
        <tr class="actions"><td><a href="manage-booking.html">Search</a></td></tr>
    </table>
    </div>
</div>
<div class="content-body">
<?php
if ($page == 'index') { ?>Welcome to Thistle Airways. 
<?php } elseif ($page == 'startOver') { ?>Unfortunately, the flights you selected are no longer available.<br /><?php } ?>
Please use our search on the left to look for flights, or lookup an existing booking.
</div>
