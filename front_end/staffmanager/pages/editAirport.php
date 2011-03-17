<?php
$name = $_POST['name'];
$fn = $_POST['fn'];
?>
<form method="post" action="processeditAirport.html" align=right>
<table border="1" id="displayInfo" width="50%">
<tr><th colspan=2>Enter new Details</th></tr>
<tr><td>Code Name:</td><td><input type="text" value="<?php echo $name; ?>" name="name"></td></tr>
<tr><td>Full Name:</td><td><input type="test" value="<?php echo $fn; ?>" name="fn"/></td></tr>
<input type="hidden" value="<?php echo $name; ?>" name="oname"/>
</table>
<input type="submit" value="add"/>
</form>
