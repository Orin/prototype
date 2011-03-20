<?php
$name = $_POST['TA'];
?>
<form method="post" action="processEditTA.html" align=right>
<table border="1" id="displayInfo" width="50%">
<tr><th colspan=2>Enter new Details</th></tr>
<tr><td>Name:</td><td><input type="text" value="<?php echo $name; ?>" name="name"></td></tr>
<input type="hidden" value="<?php echo $name; ?>" name="oname"/>
</table>
<input type="submit" value="Edit"/>
</form>
