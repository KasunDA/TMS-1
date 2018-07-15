<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee = date('Y-m-d' , strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d' , strtotime($_GET['to_datee']));
	
	// if(isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL)
	// {
	// 	$vehicle_id = $_GET['vehicle_id'];
	// 	$sql = "SELECT * FROM voucher  WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id";
	// }
	// else
		$sql = "SELECT * FROM voucher  WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' ";

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['voucher_number'] = $r['voucher_number'];
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['method'] = $r['method'];
		$json[$n]['check_number'] = $r['check_number'];

		if($r['bank_id'] != NULL)
		{
			$q1 = mysqli_query($mycon,"SELECT short_form from bank WHERE bank_id=".$r['bank_id']);
			$r1 = mysqli_fetch_array($q1);

			$json[$n]['bank_name'] = $r1['short_form'];
		}
		else
		{
			$json[$n]['bank_name'] = NULL;
		}
		
		// if( $r['vehicle_id'] != NULL )
		// {
		// 	$q1 = mysqli_query($mycon,"SELECT vehicle_number from vehicle WHERE vehicle_id=".$r['vehicle_id']);
		// 	$r1 = mysqli_fetch_array($q1);
			
		// 	$json[$n]['vehicle_number'] = $r1['vehicle_number'];	
		// }
		// else
			$json[$n]['vehicle_numbers'] = $r['vehicle_number'];	

		$json[$n]['amount'] = $r['amount'];
		$json[$n]['description'] = $r['description'];
		$json[$n]['cm_id'] = $r['cm_id'];	

		$n++;
	}

	echo json_encode($json);

?>