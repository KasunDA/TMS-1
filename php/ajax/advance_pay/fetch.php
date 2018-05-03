<?php 

require '../../connection.php';
$json = NULL;

$q = mysqli_query($mycon,'SELECT a.expense_id,a.datee,a.name,a.description,SUM(a.amount) as total_amount , a.vehicle_id, b.vehicle_number FROM expenses a , vehicle b where a.dd_id=2 and a.paid_status=0 and a.vehicle_id = b.vehicle_id GROUP BY(a.name)');
$n = 0;

while ( $r = mysqli_fetch_array($q)) 
{
	$json[$n]['vehicle_id'] = $r['vehicle_id'];
	$json[$n]['name'] = $r['name'];
	$json[$n]['vehicle_number'] = $r['vehicle_number'];

	$q1 = mysqli_query($mycon,"SELECT SUM(amount) as received_amount from income where vehicle_id=".$r['vehicle_id']." and name='".$r['name']."' ");
	
	$r1 = mysqli_fetch_array($q1);

	$json[$n]['amount'] = $r['total_amount'] - $r1['received_amount'];

	$n++;
}

echo json_encode($json);
?>