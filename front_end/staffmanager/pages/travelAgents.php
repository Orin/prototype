<?php
$q_user = mysql_query( "SELECT * FROM agents");
?>

<table id="displayInfo" border=1>
	<tr><th>Travle Agents</a></th></tr>
	
	<?php 
	for ($i =0;  $i<mysql_num_rows($q_user); $i++)
	{
		$data = mysql_fetch_array($q_user);
	?>
	<tr><td><?php echo $data['name'];?></a></td></tr>
	<?php } ?>
	<tr><th><form name="add_TA" method="post" action="addTA.html" ><input type="text" name="new" /><input type="submit" value="add"/></form></th></tr>
</table>
