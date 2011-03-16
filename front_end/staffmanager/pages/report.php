<form name="report" action="genReport.html" method="POST">
<table id="inputData">
	<tr><th colspan=2>Select Report Period</th></tr>
	<tr><td>Period:</td><td>
		<?php monthPicker(1,'month');?>
	</td></tr>
</table>
<br/><br/>


<table id="inputData">
	<tr><th colspan=2>Select Report Content</th></tr>
	<tr><td>Revenue Per Class</td><td><input type="checkbox" name="Class"/></td></tr>
	<tr><td>Sales Per Flight</td><td><input type="checkbox" name="SPF" /></td></tr>
	<tr><td>Group Bookings</td><td><input type="checkbox" name="GB"/></td></tr>
	<tr><td>Sales Per Schedule</td><td><input type="checkbox" name="SPS"/></td></tr>
	<tr><td>Total Period Income</td><td><input type="checkbox" name="TIP" value="CS" /></td></tr>
	<tr><td>Source of Business Per Flight</td><td><input type="checkbox" name="SBPF"/></td></tr>
	<tr><td>Flight Frequency</td><td><input type="checkbox" name="FF"/></td></tr>
	<tr><td>Overbooking Per Flight Schedule</td><td><input type="checkbox" name="OBPFC"/></td></tr>
	<tr><td>Total Overbooking Per Flight</td><td><input type="checkbox" name="TOBPF" /></td></tr>
	
</table>

<br/>

<table id="inputData">
<tr><th>Generate</th></tr>
<tr><td align="center"><input type="submit" value="Generate Report"/></td></tr>
</table>

</form>
