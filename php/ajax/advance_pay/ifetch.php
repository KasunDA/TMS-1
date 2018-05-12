<?php 

	require '../../connection.php';

	$json=NULL;
	$vehicle_id =  $_GET['vehicle_id'];
	$name =  $_GET['name'];

	$q = mysqli_query($mycon,"SELECT * FROM income WHERE dd_id=2 and vehicle_id=$vehicle_id and name='$name' and status=1 ORDER BY income_id DESC ");
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['income_id'] = $r['income_id'];  
		$json[$n]['datee'] = $r['datee'];
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