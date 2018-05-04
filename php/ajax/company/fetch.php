<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM company WHERE status=1 ORDER BY cmp_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['cmp_id'] = $r['cmp_id'];  
		$json[$n]['name'] = $r['name'];

		$n++;
	}

	echo json_encode($json);

?>