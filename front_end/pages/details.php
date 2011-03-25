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
 <div id="display-selected">
		<h2>Flight Details</h2>
			
				
        <div id="div-display-selected-out">
        <b>Outbound</b>
        <span id="display-selected-out">
        <table class="table-selected"><tr class="out"><td>£<?php echo $outPrice; ?></td><td><?php echo $_POST['outDate']; ?></td><td><?php echo $_POST['outDepart']; ?></td><td><?php echo $_POST['outArrive']; ?></td><td><?php echo $_POST['outFrom']; ?></td><td><?php echo $_POST['outTo']; ?></td><td><?php echo $_POST['outFlight']; ?></td></tr>
        </table>
        </span>
        </div>
        &nbsp;<br />
        <div id="div-display-selected-in">
        <b>Inbound</b>
        <span id="display-selected-in">
         <table class="table-selected"><tr class="in"><td>£<?php echo $returnPrice; ?></td><td><?php echo $_POST['returnDate']; ?></td><td><?php echo $_POST['returnDepart']; ?></td><td><?php echo $_POST['returnArrive']; ?></td><td><?php echo $_POST['returnFrom']; ?></td><td><?php echo $_POST['returnTo']; ?></td><td><?php echo $_POST['returnFlight']; ?></td></tr>
        </table>
        </div>
        &nbsp;<br />
        <b>Total: £<?php echo $totalPrice; ?></b>
    </div>
</div>

<div class="content-body">
	<h2>Passenger Details</h2>
    	<form id="bookDetails" action="confirmation.html" method="post">
		<table class="booking-form">
            <?php
			for ($i = 0; $i < $adults; $i++) { 
			$j = $i + 1; ?>
			<tr><td>Passenger <?php echo $j; ?></td></tr>
            <tr class="firstN-<?php echo $j; ?>"><td>First Name</td><td><input type="text" name="firstN-<?php echo $j; ?>" onkeypress="return isLetters(event);"/></td></tr>
			<tr class="lastN-<?php echo $j; ?>"><td>Surname</td><td><input type="text" name="lastN-<?php echo $j; ?>" onkeypress="return isLetters(event);" /></td></tr>
			<tr class="pNo-<?php echo $j; ?>"><td>Passport number</td><td><input type="text" name="pNo-<?php echo $j; ?>" onkeypress="return isNumberKey(event);" /></td></tr>
			<?php }
			for ($i; $i < $adults + $children; $i++) { 
			$j = $i + 1; ?>
			<tr><td>Passenger <?php echo $j; ?> (child)</td></tr>
            <tr class="firstN-<?php echo $j; ?>"><td>First Name</td><td><input type="text" name="firstN-<?php echo $j; ?>" onkeypress="return isLetters(event);"/></td></tr>
			<tr class="lastN-<?php echo $j; ?>"><td>Surname</td><td><input type="text" name="lastN-<?php echo $j; ?>" onkeypress="return isLetters(event);" /></td></tr>
			<tr class="pNo-<?php echo $j; ?>"><td>Passport number</td><td><input type="text" name="pNo-<?php echo $j; ?>" onkeypress="return isNumberKey(event);" /></td></tr>
			<?php } ?>
			
       </table>
       &nbsp; <br />&nbsp; <br />
       <h2>Billing Details</h2>
       <table class="booking-form">
            <tr class="firstN-b"><td class="label">First Name</td><td><input type="text" name="firstN-b" onkeypress="return isLetters(event);" /></td></tr>
			<tr class="lastN-b"><td class="label">Surname</td><td><input type="text" name="lastN-b" onkeypress="return isLetters(event);" /></td></tr>
            <tr class="email"><td class="label">Email Address</td><td><input type="text" name="email" /></td></tr>
        	<tr class="address-1"><td class="label">1st Line Address</td><td><input type="text" name="address-1" /></td></tr>
        	<tr class="address-2"><td class="label">2nd Line Address</td><td><input type="text" name="address-2" /></td></tr>
            <tr class="city"><td class="label">City</td><td><input type="text" name="city" onkeypress="return isLetters(event);" /></td></tr>
            <tr class="pcode"><td class="label">Postcode</td><td><input type="text" name="pcode" /></td></tr>
            
            <tr><td>&nbsp;</td></tr>
            
			<tr><td>Card Details</td></tr>
            <tr class="firstN-b"><td class="label">Type</td><td><?php dropdown(array('', 'Visa', 'Mastercard', 'AMEX', 'Switch/Solo'), '', 'cardType', '157px'); ?></td></tr>
			<tr class="cc-no"><td class="label">Card Number</td><td><input type="text" name="cc-no" onkeypress="return isNumberKey(event);" /></td></tr>
        	<tr class="exp"><td class="label">Expiry Date</td><td><?php datePicker(FALSE, FALSE, 'exp', 'M-Y'); ?></td></tr>
        	<tr class="sec-code"><td class="label">Security Code</td><td><input type="text" name="sec-code" onkeypress="return isNumberKey(event);" /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="javascript:sendData('bookDetails');">Continue</a></td></tr>
            </table>
		</form>
        
   <div id="travel-agent" style="margin-top:20px; margin-bottom:20px">
   		<h2> Travel Agents</h2>
        <form action="ta-login.html" method="post">
        <table id="ta-login" >
        <col style="width:200px" />
        <tr><td>Account</td><td><input type="text" name="ta-account" /></td></tr>
        <tr><td>Password</td><td><input type="password" name="ta-pwd" /></td></tr>
        <tr><td><input type="submit" name="ta-submit" value="Login" /></td></tr>
        </table>
        </form>
</div>

