<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee =  date('Y-m-d', strtotime($_GET['from_datee'])) ; //date('Y-m-d', strtotime(
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));

	$sql = "SELECT a.*,b.vehicle_number,b.owner_name FROM garage_entry a , vehicle b WHERE a.status=1 and a.datee BETWEEN '$from_datee' AND '$to_datee'  and a.vehicle_id = b.vehicle_id ";

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{
		$vehicle_id = $_GET['vehicle_id'];
		
		$sql .= " AND a.vehicle_id=$vehicle_id ";
	}

	if( isset($_GET['owner_name']) && $_GET['owner_name'] != NULL )
	{
		$owner_name = $_GET['owner_name'];
		
		$sql .= " AND b.owner_name='$owner_name' ";
	}
	// else
	// {
	// 	$sql = "SELECT a.*,b.vehicle_number FROM garage_entry a , vehicle b WHERE a.status=1 and a.datee BETWEEN '$from_datee' AND '$to_datee' and a.vehicle_id = b.vehicle_id";
	// }

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
		$json[$n]['owner_name'] = $r['owner_name'];
		$json[$n]['amount'] = $r['amount'];

		$n++;
	}

	echo json_encode($json);

?>