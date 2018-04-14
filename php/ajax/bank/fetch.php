<?php 

	require '../../connection.php';

	$json='';

	$q = mysqli_query($mycon,'SELECT * FROM bank WHERE status=1 ORDER BY bank_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['bank_id'] = $r['bank_id'];  
		$json[$n]['short_form'] = $r['short_form'];
		$json[$n]['full_form'] = $r['full_form'];
		$json[$n]['account_title'] = $r['account_title'];
		$json[$n]['account_number'] = $r['account_number'];
		$json[$n]['address'] = $r['address'];

		$n++;
	}

	echo json_encode($json);

?>