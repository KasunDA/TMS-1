<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM designation WHERE status=1 ORDER BY dg_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['dg_id'] = $r['dg_id'];  
		$json[$n]['designation'] = $r['designation'];

		$n++;
	}

	echo json_encode($json);

?>