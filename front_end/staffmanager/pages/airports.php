<?php
$q_user = mysql_query( "SELECT * FROM airports");
?>

<table id="displayInfo" border=1>
	<tr><th>Airport List</a></th></tr>
	<?php 
	for ($i =0;  $i<mysql_num_rows($q_user); $i++)
	{
		$data = mysql_fetch_array($q_user);
	?>
	<tr><td><?php echo $data['name']; ?></td></tr>
	
	<?php } ?>
	<tr><th><form name="add_AP" method="post" action="addAP.html"><input type="text" name="new"><input type="submit" value="add"/></form></th></tr>
</table>