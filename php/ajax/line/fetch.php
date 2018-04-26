<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM line WHERE status=1 ORDER BY line_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['line_id'] = $r['line_id'];  
		$json[$n]['short_form'] = $r['short_form'];
		$json[$n]['full_form'] = $r['full_form'];

		$n++;
	}

	echo json_encode($json);

?>