<?php
$q_user = mysql_query( "SELECT * FROM airports");
?>

<table id="displayInfo" border=1>
	<tr><th>Airport Code</th><th>Airport Full Name</th></tr>
	<?php 
	for ($i =0;  $i<mysql_num_rows($q_user); $i++)
	{
		$data = mysql_fetch_array($q_user);
	?>
	<tr onclick="javascript:postValue('editAirport.html', {name:'<?php echo $data['name']; ?>', fn:'<?php echo $data['fullName']; ?>'});"><td><?php echo $data['name']; ?></td>
	<td><?php echo $data['fullName']; ?></td></tr>
	
	<?php } 
	if ($_SESSION['level'] <=1) {?><tr><th><form name="add_AP" method="post" action="addAP.html"><input type="text" name="new"><input type="submit" value="add"/></form></th></tr><?php } ?>
</table>