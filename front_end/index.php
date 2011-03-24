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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<?php
//Determine page requested as parsed by .htaccess (if directory root, $page = 'index')	
$page = (isset($_GET['page']))? $_GET['page'] : 'index'; 
?>
<head>
    <?php 
	include 'config/database.inc.php';
	include 'init.php';
	include 'config/definitions.inc.php';
	include 'config/settings.inc.php'; 
	include 'config/functions.inc.php';
	
	
	
	?>
</head>

<?php 
	include 'config/layout.inc.php';
?>
</html>
