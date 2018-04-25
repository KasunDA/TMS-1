<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM chart_of_account WHERE status=1 ORDER BY coa_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['coa_id'] = $r['coa_id'];  
		$json[$n]['short_form'] = $r['short_form'];
		$json[$n]['full_form'] = $r['full_form'];
		$json[$n]['address'] = $r['address'];
		$json[$n]['contact'] = $r['contact'];

		$n++;
	}

	echo json_encode($json);

?>