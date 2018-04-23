<?php 

	require '../../connection.php';

	$json['owner_name'] = "";
	$json['driver_name'] = "";

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{


		$vehicle_id = $_GET['vehicle_id'];

		$q = mysqli_query($mycon,'SELECT owner_name,driver_name from vehicle where vehicle_id = '.$vehicle_id);

		if( $r = mysqli_fetch_array($q) )
		{
			$json['owner_name'] = $r['owner_name'].' (Owner) ';
			$json['driver_name'] = $r['driver_name'].' (Driver) ';
		}
	}
	
	echo json_encode($json);
?>