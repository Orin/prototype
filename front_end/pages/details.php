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
    	<form action="confirmation.html" method="post" onSubmit="return(VerifForm(this))">
		<table id="details">
            <col style="width:200px" />
			<tr><td>Passenger 1</td></tr>
            <tr class="firstN-1"><td>First Name</td><td><input type="text" name="firstN-1" /></td></tr>
			<tr class="lastN-1"><td>Surname</td><td><input type="text" name="lastN-1" /></td></tr>
			<tr class="pNo-1"><td>Passport number</td><td><input type="text" name="pNo-1" /></td></tr>
            <tr><td>Passenger 2</td></tr>
            <tr class="firstN-2"><td>First Name</td><td><input type="text" name="firstN-2" /></td></tr>
			<tr class="lastN-2"><td>Surname</td><td><input type="text" name="lastN-2" /></td></tr>
			<tr class="pNo-2"><td>Passport number</td><td><input type="text" name="pNo-2" /></td></tr>
		
        	<tr><td>&nbsp;</td></tr>
        
			<tr><td>Billing Details</td></tr>
            <tr class="firstN-b"><td>First Name</td><td><input type="text" name="firstN-b" /></td></tr>
			<tr class="lastN-b"><td>Surname</td><td><input type="text" name="lastN-b" /></td></tr>
            <tr class="email"><td>Email Address</td><td><input type="text" name="email" /></td></tr>
        	<tr class="address-1"><td>1st Line Address</td><td><input type="text" name="address-1" /></td></tr>
        	<tr class="address-2"><td>2nd Line Address</td><td><input type="text" name="address-2" /></td></tr>
            <tr class="city"><td>City</td><td><input type="text" name="city" /></td></tr>
            <tr class="pcode"><td>Postcode</td><td><input type="text" name="pcode" /></td></tr>
            
            <tr><td>&nbsp;</td></tr>
            
			<tr><td>Card Details</td></tr>
            <tr class="firstN-b"><td>Type</td><td><?php dropdown(array('', 'Visa', 'Mastercard', 'AMEX', 'Switch/Solo')); ?></td></tr>
			<tr class="cc-no"><td>Card Number</td><td><input type="text" name="cc-no" /></td></tr>
        	<tr class="exp"><td>Expiry Date</td><td><input type="text" name="exp" /></td></tr>
        	<tr class="sec-code"><td>Security Code</td><td><input type="text" name="sec-code" /></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><input type="submit" name="submit" value="Make Booking" /></td></tr>
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

