 <div class="content-body">
	<h2>Passenger Details</h2>
    	<form id="bookDetails" action="confirmation.html" method="post">
        <input type="hidden" name="class" value="<?php echo $class; ?>" />
        <input type="hidden" name="passengers" value="<?php echo $totalPsngrs; ?>" />
        <input type="hidden" name="adults" value="<?php echo $adults; ?>" />
        <input type="hidden" name="children" value="<?php echo $children; ?>" />
        
        <input type="hidden" name="outScheduleID" value="<?php echo $outScheduleID; ?>" />
        <input type="hidden" name="returnScheduleID" value="<?php echo $returnScheduleID; ?>" />
        <input type="hidden" name="outPrice" value="<?php echo $outPrice; ?>" />
        <input type="hidden" name="returnPrice" value="<?php echo $returnPrice; ?>" />
        
        <input type='hidden' name='outDate' value='<?php echo $outDate; ?>' />
		<input type='hidden' name='outDepart' value='<?php echo $outDepart; ?>' />
        <input type='hidden' name='outArrive' value='<?php echo $outArrive; ?>' />
        <input type='hidden' name='outFrom' value='<?php echo $outFrom; ?>' />
        <input type='hidden' name='outTo' value='<?php echo $outTo; ?>' />
        <input type='hidden' name='outFlight' value='<?php echo $outFlight; ?>' />
        
        <input type='hidden' name='returnDate' value='<?php echo $returnDate; ?>' />
        <input type='hidden' name='returnDepart' value='<?php echo $returnDepart; ?>' />
        <input type='hidden' name='returnArrive' value='<?php echo $returnArrive; ?>' />
        <input type='hidden' name='returnFrom' value='<?php echo $returnFrom; ?>' />
        <input type='hidden' name='returnTo' value='<?php echo $returnTo; ?>' />
        <input type='hidden' name='returnFlight' value='<?php echo $returnFlight; ?>' />

        
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

