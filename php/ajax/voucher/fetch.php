<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$cm_id = $_GET['cm_id'];
	

	$sql = "SELECT * FROM voucher  WHERE status=1 and cm_id=$cm_id";

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{

		$json[$n]['voucher_number'] = $r['voucher_number'];
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['method'] = $r['method'];
		$json[$n]['check_number'] = $r['check_number'];

		$q1 = mysqli_query($mycon,"SELECT short_form from bank WHERE bank_id=".$r['bank_id']);
		$r1 = mysqli_fetch_array($q1);

		$json[$n]['bank_name'] = $r1['short_form'];
		$json[$n]['amount'] = $r['amount'];

		$n++;
	}

	echo json_encode($json);

?>