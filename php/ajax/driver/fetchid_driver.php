<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT driver_id FROM driver  ORDER BY driver_id DESC limit 1 ');
	$r = mysqli_fetch_array($q);

	$json['driver_id'] = $r['driver_id']+1;  
	

	echo json_encode($json);

?>