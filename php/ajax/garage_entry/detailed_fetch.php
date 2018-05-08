<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee =  $_GET['from_datee'] ; //date('Y-m-d', strtotime(
	$to_datee = $_GET['to_datee'];

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{
		$vehicle_id = $_GET['vehicle_id'];
		$sql = "SELECT a.*,b.vehicle_number FROM garage_entry a , vehicle b WHERE a.status=1 and a.datee BETWEEN '$from_datee' AND '$to_datee' and a.vehicle_id=$vehicle_id and a.vehicle_id = b.vehicle_id";
	}
	else
	{
		$sql = "SELECT a.*,b.vehicle_number FROM garage_entry a , vehicle b WHERE a.status=1 and a.datee BETWEEN '$from_datee' AND '$to_datee' and a.vehicle_id = b.vehicle_id";
	}

	$q = mysqli_query($mycon,$sql);

	$q = mysqli_query($mycon,$sql);
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['ge_id'] = $r['ge_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['description'] = $r['description'];
		$json[$n]['vehicle_id'] = $r['vehicle_id'];	
		$json[$n]['vehicle_number'] = $r['vehicle_number'];
		$json[$n]['amount'] = $r['amount'];

		$n++;
	}

	echo json_encode($json);

?>