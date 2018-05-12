<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee = $_GET['from_datee'];
	$to_datee = $_GET['to_datee'];
	
	if(isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL)
	{
		$vehicle_id = $_GET['vehicle_id'];
		
		$sql = "SELECT a.* ,b.short_form FROM voucher a , bank b , vehicle c  WHERE a.status=1 and a.bank_id= b.bank_id and a.vehicle_id=c.vehicle_id  and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id";
	}
	else
	{
		$sql = "SELECT a.* ,b.short_form FROM voucher a , bank b , vehicle c  WHERE a.status=1 and a.bank_id= b.bank_id and a.vehicle_id=c.vehicle_id  and datee BETWEEN '$from_datee' AND '$to_datee' ";
	}


	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{

		$json[$n]['voucher_number'] = $r['voucher_number'];
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['method'] = $r['method'];
		$json[$n]['check_number'] = $r['check_number'];
		$json[$n]['bank_name'] = $r['short_form'];
		$json[$n]['vehicle_number'] = $r['vehicle_number'];
		$json[$n]['amount'] = $r['amount'];

		$n++;
	}

	echo json_encode($json);

?>