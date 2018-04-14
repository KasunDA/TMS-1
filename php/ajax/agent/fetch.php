<?php 

	require '../../connection.php';

	$json;

	$q = mysqli_query($mycon,'SELECT * FROM agent WHERE status=1 ORDER BY agent_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['agent_id'] = $r['agent_id'];  
		$json[$n]['name'] = $r['name'];
		$json[$n]['address'] = $r['address'];
		$json[$n]['contact'] = $r['contact'];

		$n++;
	}

	echo json_encode($json);

?>