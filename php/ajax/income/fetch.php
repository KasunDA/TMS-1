<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM income WHERE status=1 ORDER BY income_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['income_id'] = $r['income_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['dd_id'] = $r['dd_id'];

		$q1 = mysqli_query($mycon,'SELECT name from daily_description where dd_id='.$r['dd_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['dd_name'] = $r1['name'];

		$json[$n]['check_number'] = $r['check_number'];
		$json[$n]['bank_id'] = $r['bank_id'];
		
		$q1 = mysqli_query($mycon,'SELECT short_form from bank where bank_id='.$r['bank_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['bank_name'] = $r1['short_form'];
		
		$json[$n]['amount'] = $r['amount'];

		$json[$n]['description'] = $r1['description'];
		$n++;
	}

	echo json_encode($json);

?>