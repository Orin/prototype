<div id="nav">
	<table id="navtable">
		<tr><th>Available Actions</th></tr>
		<tr><td><a href="report.html">Generate Report</a></td></tr>
		<tr><td><a href="editFlightSchedule.html">Edit a Flight Schedule</a></td></tr>
		<tr><td><a href="scheduleInfo.html">Add Flight Schedule</a></td></tr>
		<tr><td><a href="discountsPricing.html">Discounts and Pricing</a></td></tr>
		<tr><td><a href="airports.html">Maintain Airports</a></td></tr>
		<tr><td><a href="travelAgents.html">Maintain Travel Agents</a></td></tr>
	</table>
</div>

<div id="searches">
	<div id="flight-search">
        <div class="title-bar">Search a Flight</div>
        
        <div class="search-left">
        <form name="Flight_info" method="post" action="viewFlight.html" align=right>
        <table> <?php $test[0]='sappeningsbitch';
					  $test[1]='sappenings';
					  echo $test[0]." - ".$test[1]; ?>
        <tr><td>Flight No:</td><td><?php autoFill($test,"DestDiv");?></td></tr>
        <tr><td><input type="submit" value="Search" /></td></tr>
        </table>
        </form>        
        </div>
        
        <div class="search-right">
        <form name="Flight_info" method="post" action="flightAndScheduleSearch.html" align=right>
        <table>
        <tr><td>Depart:</td><td><?php dropdown($airports,'','Dep')?></td></tr>
        <tr><td>Arrive:</td><td><?php dropdown($airports,'','Dest')?></td></tr>
        <tr><td>Departure Date:</td><td><?php datePickerBackEnd('depDate'); ?></td></tr>
        <tr><td>Departure Time:</td><td><?php timePicker(-1,-1,'depTime');?></td></tr>
        <tr><td>Available Economy: >=</td><td><input type="text" name="avalE" ></input></td></tr>
		<tr><td>Available Business: >=</td><td><input type="text" name="avalB" ></input></td></tr>
		<tr><td>Available Group: >=</td><td><input type="text" name="avalG" ></input></td></tr>
        <tr><td><input type="submit" value="Search" /></td></tr>
		</table>
		</form>
        </div>
    </div>
    
    <div id="cust-search" style="clear:both;">
        <div class="title-bar">Search for a Customer</div>
        <div class="search-left">
            <form name="customer_info" method="post" action="viewCustomer.html" align=right>
            <table>
            <tr><td>Booking Reference:</td><td><?php autoFill(2,"BookingDiv");?></td></tr>
            <tr><td><input type="submit" value="Search" /></td></tr>
            </table>
            </form>
        </div>
        <div class="search-right">
            <form name="customer_info" method="post" action="customerSearch.html" align=right>
            <table>
            <tr><td>First Name:</td><td> <input type="text" name="Fname" ></input></td></tr>
            <tr><td>Last Name: </td><td><input type="text" name="Lname" ></input></td></tr>
            <tr><td><input type="submit" value="Search" /></td><td>
            </table>
            </form>
        </div>
    </div>
</div>
		
