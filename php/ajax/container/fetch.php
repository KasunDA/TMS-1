<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM container WHERE status=1 ORDER BY container_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['container_id'] = $r['container_id'];  
		$json[$n]['type'] = $r['type'];

		$n++;
	}

	echo json_encode($json);

?>