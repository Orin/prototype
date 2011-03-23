<?php
/*
//Force HTTPS
if (!$_SERVER['HTTPS']) { 
	$domain = explode(".", $_SERVER['HTTP_HOST'], 2);
	header("Location: https://www.".$domain[1].$_SERVER["REQUEST_URI"]);
}
*/
//Force use of www2 (NB: Only use if FORCE HTTPS is disabled, as www2 does not support https)
$domain = explode(".", $_SERVER['HTTP_HOST'], 2);
if ($domain[0] == 'www') { 
	header("Location: http://www2.".$domain[1].$_SERVER["REQUEST_URI"]);
}
//Include all functions
include '../config/definitions.inc.php';
include '../config/functions.inc.php';
include 'config/admin-definitions.inc.php';
include 'config/admin.functions.inc.php';
include 'config/database.inc.php';
include 'init.php';

/* Handle Session */
session_name("MyLogin");
session_start();

//Determine page requested as parsed by .htaccess (if directory root, $page = 'index')	
$page = (isset($_GET['page']))? $_GET['page'] : 'index'; 
if ($page == 'logout') { kill_session(); }

?>
<head>
    <?php 
	require 'config/log.php';
	include 'config/admin-settings.inc.php'; 
	?>
</head>

<?php 

	//if the session is not registered
	if(session_is_registered("name") == false) {
		include 'pages/login.php';
	} else {
	include 'config/admin-layout.inc.php';
	}
?>
</html>
