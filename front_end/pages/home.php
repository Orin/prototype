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
		<form name="searchData" method="POST" action="searchProcess.html">
		<!--Search fields populated from available destinations in DB -->
		<table id="search-table">
			<tr class="from"><td>From</td><td><?php dropdown($destinations, '', 'fromDrop', '196px'); ?></td></tr>
			<tr class="to"><td>To</td><td><?php dropdown($destinations,'', 'to', '196px'); ?></td></tr>
			<tr class="depart"><td>Depart</td><td><?php datePicker(FALSE, FALSE, 'depart'); ?></td></tr>
			<tr class="return"><td>Return</td><td><?php datePicker(FALSE, FALSE, 'return'); ?></td></tr>
			<tr class="spacer small"><td></td></tr>
			<tr class="people"><td>Adults<br /><?php noPsngrPicker("adult"); ?></td><td>Children<br /><?php noPsngrPicker("children"); ?></td></tr>
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
Welcome to Thistle Airways. Please use our search on the left to look for flights, or lookup an existing booking.
</div>
