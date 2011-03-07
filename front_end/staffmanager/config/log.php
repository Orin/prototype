<?php
$action = (isset($_POST['action']))? $_POST['action'] : 'FALSE'; 
if($action == "login") {
	/*
mysql_pconnect ("anubis","cm226", "cm226") ;
$db = mysql_select_db("cm226");
*/
$name = $_POST['uname'];
echo $name;
$q_user = "SELECT * FROM users WHERE username='$name'";
$query = mysql_query($q_user);

if(mysql_num_rows($query) == 1) 
{
	$query = mysql_query("SELECT * FROM users WHERE username='$name'");
	$data = mysql_fetch_array($query);

	if($_POST['pw'] == $data['password']) 
	{ 
		$_SESSION['name']=$data['displayName'];
		$_SESSION['level']=$data['accessLevel'];
		header("Location: index.html");
		exit;
	} 
	else 
	{
		header("Location: loginfail-pw.html");
		exit;
	}
}
else 
{
	header("Location: loginfail-nousr.html");
	exit;
}
}



?>

