<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM daily_description WHERE status=1 and dd_id!=6 ORDER BY dd_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['dd_id'] = $r['dd_id'];  
		$json[$n]['name'] = $r['name'];

		$n++;
	}

	echo json_encode($json);

?>