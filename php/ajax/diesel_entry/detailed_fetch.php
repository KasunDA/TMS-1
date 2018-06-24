<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee'])); //date('Y-m-d', strtotime(
	

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{
		$vehicle_id = $_GET['vehicle_id'];
		$sql = "SELECT * FROM diesel_entry WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id ";
	}
	else
	{
		$sql = "SELECT * FROM diesel_entry WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' ";
	}

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['de_id'] = $r['de_id'];  
		$json[$n]['datee'] = $r['datee'];  

		$vq = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id ='.$r['vehicle_id']);

		if($vq)
		{
			$rvq = mysqli_fetch_array($vq);
			$json[$n]['vehicle_id'] = $r['vehicle_id'];
			$json[$n]['vehicle_number'] = $rvq['vehicle_number'];
		}

		$fq = mysqli_query($mycon,'SELECT short_form from yard where yard_id ='.$r['from_yard_id']);

		if($fq)
		{
			$rfq = mysqli_fetch_array($fq);
			$json[$n]['from_yard_id'] = $r['from_yard_id'];
			$json[$n]['from_yard'] = $rfq['short_form'];
		}


		$tq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['to_yard_id']);

		if($tq)
		{
			$rtq = mysqli_fetch_array($tq);
			$json[$n]['to_yard_id'] = $r['to_yard_id'];
			$json[$n]['to_yard'] = $rtq['short_form'];
		}
		
		$json[$n]['litre_rate'] = $r['litre_rate'];
		$json[$n]['litres'] = $r['litres'];
		$json[$n]['extra_litres'] = $r['extra_litres'];
		$json[$n]['total'] = $r['total'];
		$json[$n]['description'] = $r['description'];

		$n++;
	}

	echo json_encode($json);

?>