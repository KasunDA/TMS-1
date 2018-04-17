<?php 

	require '../../connection.php';

	$json;

	$q = mysqli_query($mycon,'SELECT * FROM garage_entry WHERE status=1 ORDER BY ge_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['ge_id'] = $r['ge_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['description'] = $r['description'];
		$json[$n]['vehicle_id'] = $r['vehicle_id'];
		
		$q1 = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id='.$r['vehicle_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['vehicle_number'] = $r1['vehicle_number'];
		$json[$n]['amount'] = $r['amount'];

		$n++;
	}

	echo json_encode($json);

?>