<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$cm_id = $_GET['cm_id'];
	

	$sql = "SELECT a.* ,b.short_form FROM voucher a , bank b  WHERE a.status=1 and a.bank_id= b.bank_id and a.cm_id=$cm_id";

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{

		$json[$n]['voucher_number'] = $r['voucher_number'];
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['method'] = $r['method'];
		$json[$n]['check_number'] = $r['check_number'];
		$json[$n]['bank_name'] = $r['short_form'];
		$json[$n]['amount'] = $r['amount'];

		$n++;
	}

	echo json_encode($json);

?>