<?php 

	require '../../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$json=NULL;
	$date = date('Y-m-d');

	$q = mysqli_query($mycon,"SELECT * FROM income WHERE status=1 and datee='$date' ORDER BY income_id DESC ");
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['income_id'] = $r['income_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['dd_id'] = $r['dd_id'];

		$q1 = mysqli_query($mycon,'SELECT name from daily_description where dd_id='.$r['dd_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['dd_name'] = $r1['name'];

		$json[$n]['method'] = $r['method'];
		$json[$n]['check_number'] = $r['check_number'];
		$json[$n]['bank_id'] = $r['bank_id'];
		
		if( $r['bank_id'] != NULL )
		{
			$q1 = mysqli_query($mycon,'SELECT short_form from bank where bank_id='.$r['bank_id']);
			$r1 = mysqli_fetch_array($q1);
			$json[$n]['bank_name'] = $r1['short_form'];		
		}
		else
		{
			$json[$n]['bank_name'] = NULL;			
		};
		
		$json[$n]['amount'] = $r['amount'];

		$json[$n]['description'] = $r['description'];
		$n++;
	}

	echo json_encode($json);

?>