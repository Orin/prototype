<?php
	$from = ($_POST['fromDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['fromDrop'])) : 'BLANK';
	$from = airCodeLookup($from, "CODE");
	$to =  ($_POST['toDrop'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['toDrop'])) : 'BLANK';
	$to = airCodeLookup($to, "CODE");
	
	$departDay =  ($_POST['departDay'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departDay'])) : 'BLANK';
	$departMonth =  ($_POST['departMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departMonth'])) : 'BLANK';
	$departYear =  ($_POST['departYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['departYear'])) : 'BLANK';
	$departDate = date("Y-m-d", strtotime($departDay." ".$departMonth." ".$departYear));
	
	$returnDay =  ($_POST['returnDay'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnDay'])) : 'BLANK';
	$returnMonth =  ($_POST['returnMonth'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnMonth'])) : 'BLANK';
	$returnYear =  ($_POST['returnYear'] != '')? str_replace("\\", "\\\\", rawurldecode($_POST['returnYear'])) : 'BLANK';
	$returnDate = date("Y-m-d", strtotime($returnDay." ".$returnMonth." ".$returnYear));
	
	$class = $_POST['classDrop'];
	
	$adults = $_POST['psngr-adult'];
	$children = $_POST['psngr-children'];

	  echo 'From: '.$from.'<br />
   		To: '.$to.'<br />
		Adults: '.$adults.'<br />
		Children: '.$children.'<br />
		Class: '.$class.'<br />
		';


$outResult = flightSearch($from, $to, $departDate, $class);
?><br />Out Result<br /><?php
while ($row = mysql_fetch_array($outResult)) {
	echo $row['flightNo'].'<br />';
	echo $row['departuredate'].'<br />';
}


$returnResult = flightSearch($to, $from, $returnDate, $class);
?><br />Return Result<br /><?php
while ($row = mysql_fetch_array($returnResult)) {
	echo $row['flightNo'].'<br />';
	echo $row['departuredate'].'<br />';
}

?> 