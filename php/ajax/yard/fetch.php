<?php 

	require '../../connection.php';

	$json='';

	$q = mysqli_query($mycon,'SELECT * FROM yard WHERE status=1 ORDER BY yard_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['yard_id'] = $r['yard_id'];  
		$json[$n]['short_form'] = $r['short_form'];
		$json[$n]['full_form'] = $r['full_form'];
		$json[$n]['contact'] = $r['contact'];
		$json[$n]['location'] = $r['location'];

		$n++;
	}

	echo json_encode($json);

?>