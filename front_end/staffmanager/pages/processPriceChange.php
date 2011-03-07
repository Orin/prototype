<?php 

$alteration[0] = $_POST['AllclassA'];
$alteration[1] = $_POST['EconA'];
$alteration[2] = $_POST['BusinessA'];
$alteration[3] = $_POST['GroupA'];


$dbcolumns[1] = 'econPrice';
$dbcolumns[2] = 'busPrice';
$dbcolumns[3] = 'groupPrice';



$apply = $_SESSION['applyTo'];

$applicants = mysql_query($apply);

$newVals = '';


if($alteration[0] == '')
	{
		$alteration[0] = 0;
	}

for ($feildCounter =1;  $feildCounter<count($alteration); $feildCounter++)
{
	
	if($alteration[$feildCounter] != '')
	{
		$sum = $alteration[$feildCounter]+$alteration[0];
		$newVals = $newVals.$dbcolumns[$feildCounter].'='.$sum.', ';
	}
}

$newVals = substr($newVals, 0, -2);



for ($i =0;  $i<mysql_num_rows($applicants); $i++)
{
	$data = mysql_fetch_array($applicants);
	$flighNo = $data['flightNo'];
	$update = 'UPDATE flight SET '.$newVals.' WHERE flightNo = \''.$flighNo.'\'';
	//echo $update;
	mysql_query($update);
}

unset($_SESSION['applyTo']);
unset($_SESSION['type']);
header('Location: discountsPricing.html');

?>