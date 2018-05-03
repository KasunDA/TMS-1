<?php 

require '../../connection.php';
$json = NULL;
$vehicle_id =  $_GET['vehicle_id'];
$name =  $_GET['name'];

$q = mysqli_query($mycon,"SELECT * FROM expenses where dd_id=2 and vehicle_id=".$vehicle_id." and name='".$name."'");
$n = 0;

while ( $r = mysqli_fetch_array($q)) 
{
	$json[$n]['expense_id'] = $r['expense_id'];
	$json[$n]['datee'] = $r['datee'];
	$json[$n]['name'] = $r['name'];
	$json[$n]['description'] = $r['description'];
	$json[$n]['amount'] = $r['amount'];

	$n++;
}

echo json_encode($json);
?>