<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM driver WHERE status=1 ORDER BY driver_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['driver_id'] = $r['driver_id'];  
		$json[$n]['name'] = $r['name'];
		$json[$n]['cnic'] = $r['cnic'];
		$json[$n]['father_name'] = $r['father_name'];
		$json[$n]['ereferences'] = $r['ereferences'];
		$json[$n]['contact'] = $r['contact'];
		$json[$n]['address'] = $r['address'];
		$json[$n]['truck_number'] = $r['truck_number'];

		$n++;
	}

	echo json_encode($json);

?>