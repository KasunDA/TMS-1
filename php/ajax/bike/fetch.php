<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM bike WHERE status=1 ORDER BY bike_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['bike_id'] = $r['bike_id'];  
		$json[$n]['bike_number'] = $r['bike_number'];

		$n++;
	}

	echo json_encode($json);

?>