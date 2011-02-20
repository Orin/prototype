<?php
$q_user = mysql_query("SELECT * FROM users");
?>


<table border="1" id="displayInfo">
<tr>
<th>Username</th>
<th>Password</th>
<th>Display Name</th>
<th>Access Level</th>
<th>Delete</th>
</tr>

<?php 
while ($data = mysql_fetch_array($q_user)) {
echo '<tr >';
echo '<td onClick="select(1,6);">'.$data['username'].'</td>';
echo '<td>'.$data['password'].'</td>';
echo '<td>'.$data['displayName'].'</td>';
echo '<td>'.$data['accessLevel'].'</td>';
echo '<td><a href="page.htm"><img src="icons/delete.gif" /></a></td>';
echo '</tr>';
}
?>
</table>
<a href="addUser.html"><img src="icons/add.gif" /></a>
