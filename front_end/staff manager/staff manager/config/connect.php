<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 

function dbConnect($username='cm226', $password='cm226') {
	$dbConn = mysql_connect ("anubis", $username, $password) ;
	if (!$dbConn)
	{	?>
		<p>Cannot connect to database - check username and password<br/>
		<?php echo mysql_error().'</p>'; ?>
		</body>
   		</html>
		<?php exit();
	}
}


//select the database
function dbSelect($dbname="cm226") {
	$db = mysql_select_db($dbname);
	if (!$db)
	{
		?>
		<p>Cannot connect to database <? echo $dbname; ?> - check username and password<br/>
		<?php echo mysql_error().'</p>'; ?>
		</body>
   		</html>
		<?php exit();
	}
}

?>
