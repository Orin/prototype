<?php
//Handle Session//
//$sessname = $_SESSION['name'];
session_name("MyLogin");
session_start();
//$sessname2 = $_SESSION['name'];
//echo 'sessname: '.$sessname.' / sessname2: '.$sessname2;

//Determine page requested as parsed by .htaccess (if directory root, $page = 'index')	
$page = (isset($_GET['page']))? $_GET['page'] : 'index'; 
?>
<head>
    <?php 
	include '../config/definitions.inc.php';
	include '../config/functions.inc.php';
	require 'config/log.php';
	include 'config/admin-settings.inc.php'; 
	
	?>
</head>

<?php 
	//if the session is not registered
	if(session_is_registered("name") == false) {
		include 'pages/login.php';
	}

	if ($page != 'login') {
	include 'config/adminlayout.inc.php';
	}
?>
</html>
