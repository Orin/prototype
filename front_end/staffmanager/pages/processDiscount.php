<?php 

$discount[0] = $_POST['dType'];
$discount[1] = $_POST['AllclassD'];
$discount[2] = $_POST['EconD'];
$discount[3] = $_POST['BusinessD'];
$discount[4] = $_POST['GroupD'];

$startEnd[0] = $_POST['durStartYear'];
$startEnd[1] = $_POST['durStartMonth'];
$startEnd[2] = $_POST['durStartDay'];
$startEnd[3] = $_POST['durEndYear'];
$startEnd[4] = $_POST['durEndMonth'];
$startEnd[5] = $_POST['durEndDay'];

$dbcolumns[1] = 'Global';
$dbcolumns[2] = 'Econ';
$dbcolumns[3] = 'Business';
$dbcolumns[4] = 'Group';



$apply = $_SESSION['applyTo'];
$type = $_SESSION['type'];

if($type)	{$pk = 'flightNo'; $table = 'flight_discounts';}
else		{$pk = 'ScheduleID'; $table = 'schedule_discounts';}
$applicants = mysql_query($apply);

$feilds = 'refID, ';
$values = '';


for ($feildCounter =1;  $feildCounter<count($discount); $feildCounter++)
{
	if($discount[$feildCounter] != '')
	{
		$feilds = $feilds.$discount[0].$dbcolumns[$feildCounter].', ';
		$values = $values.$discount[$feildCounter].', ';
	}
}

$feilds = $feilds.'startDate, endDate';
$values = $values.'\''.$startEnd[0].'-'.$startEnd[1].'-'.$startEnd[2].'\', \''.$startEnd[3].'-'.$startEnd[4].'-'.$startEnd[5].'\'';
$success = true;
for ($i =0;  $i<mysql_num_rows($applicants); $i++)
{
	$data = mysql_fetch_array($applicants);
	$flighNo = $data[$pk];
	$insert = 'INSERT INTO '.$table.'('.$feilds.') VALUES (\''.$flighNo.'\', '.$values.')';
	$res = mysql_query($insert);
	if(!$res || $startEnd[3]==''||$startEnd[4]==''||$startEnd[5]=='')
	{
		$success = false;
	}
	
}

if($success){echo "all discounts successfully entered";}
else {echo "there was a problem applying discounts please try again later";}
?>
<form action="discountsPricing.html">
<input type="submit" value="Bookings" />
</form>
<?php

unset($_SESSION['applyTo']);
unset($_SESSION['type']);
//header('Location: discountsPricing.html');
?>
