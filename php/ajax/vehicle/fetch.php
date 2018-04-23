<?php 

	require '../../connection.php';

	$json='';

	$q = mysqli_query($mycon,'SELECT * FROM vehicle WHERE status=1 ORDER BY vehicle_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['vehicle_id'] = $r['vehicle_id'];  
		$json[$n]['owner_name'] = $r['owner_name'];
		$json[$n]['vehicle_number'] = $r['vehicle_number'];
		$json[$n]['engine_number'] = $r['engine_number'];
		$json[$n]['chassis_number'] = $r['chassis_number'];
		$json[$n]['driver_name'] = $r['driver_name'];

		$n++;
	}

	echo json_encode($json);

?>