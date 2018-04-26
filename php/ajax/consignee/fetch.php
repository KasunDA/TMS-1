<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM consignee WHERE status=1 ORDER BY consignee_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['consignee_id'] = $r['consignee_id'];  
		$json[$n]['short_form'] = $r['short_form'];
		$json[$n]['full_form'] = $r['full_form'];

		$n++;
	}

	echo json_encode($json);

?>