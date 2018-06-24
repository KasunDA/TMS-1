<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM borrower WHERE status=1 ORDER BY borrower_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['borrower_id'] = $r['borrower_id'];  
		$json[$n]['name'] = $r['name'];

		$n++;
	}

	echo json_encode($json);

?>