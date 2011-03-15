<?php
$details[0] = $_POST['FirstName'];
$details[1] = $_POST['LastName'];
$details[2] = $_POST['email'];
$details[3] = $_POST['ID'];
?>

<form name="Cust_info" method="post" action="processCustomerUpdate.html" >
		<table border="1" id="inputData">
			<th colspan="2">Enter Customer Information</th>
			<tr><td>Customer ID: </td><td><input type="text" name="custid" value="<?php echo $details[3];?>" readonly /></td></tr>
			<tr><td>First Name: </td><td><input type="text" name="Fnam" value="<?php echo $details[0];?>" /></td></tr>
			<tr><td>Last Name: </td><td><input type="text" name="Lnam" value="<?php echo $details[1];?>" /></td></tr>
			<tr><td>Email Address:</td><td> <input type="text" name="Email"value="<?php echo $details[2];?>" /></td></tr>
			<tr><th colspan="2"><input type="submit" /></th></tr>
		</table>
	</form>