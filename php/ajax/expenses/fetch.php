<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM expenses WHERE status=1 ORDER BY expense_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['expense_id'] = $r['expense_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['dd_id'] = $r['dd_id'];

		$q1 = mysqli_query($mycon,'SELECT name from daily_description where dd_id='.$r['dd_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['dd_name'] = $r1['name'];

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
		}
		
		$json[$n]['amount'] = $r['amount'];
		$json[$n]['vehicle_id'] = $r['vehicle_id'];

		$q1 = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id='.$r['vehicle_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['vehicle_number'] = $r1['vehicle_number'];

		$json[$n]['name'] = $r['name'];
		$json[$n]['description'] = $r['description'];
		$n++;
	}

	echo json_encode($json);

?>