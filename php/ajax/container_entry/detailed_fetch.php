<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$cm_id = $_GET['cm_id'];
	

	$sql = "SELECT a.vehicle_id ,b.container_size,b.index_number FROM container_entry a , container_movement b WHERE a.status=1 and a.vehicle_id= c.vehicle_id and a.cm_id=$cm_id and b.cm_id=$cm_id";

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{

		$json[$n]['vehicle_id'] = $r['vehicle_id'];

		$q1 = mysqli_query($mycon,"SELECT driver_name,vehicle_number from vehicle where vehicle_id=".$r['vehicle_id']);
		$r1 = mysqli_fetch_array($q1);

		$json[$n]['driver_name'] = $r1['driver_name'];
		$json[$n]['vehicle_number'] = $r1['vehicle_number'];
		
		$json[$n]['container_size'] = $r['container_size'];
		$json[$n]['index_number'] = $r['index_number'];

		$n++;
	}

	echo json_encode($json);

?>