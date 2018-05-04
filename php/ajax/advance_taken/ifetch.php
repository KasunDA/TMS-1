<?php 

	require '../../connection.php';

	$json=NULL;
	$cmp_id =  $_GET['cmp_id'];

	$q = mysqli_query($mycon,"SELECT * FROM expenses WHERE dd_id=2 and cmp_id=".$cmp_id." and status=1 ORDER BY expense_id DESC ");
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['expense_id'] = $r['expense_id'];  
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