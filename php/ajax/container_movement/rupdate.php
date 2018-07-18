<?php 
	require '../../connection.php';
	
	$json['updated'] = 'false';
	$cm_id 			 = $_GET['cm_id'];
	$rent 			 = $_GET['rent'];
	$lolo_charges    = 0;
	$weight_charges  = 0;

	$q1 = mysqli_query($mycon,"SELECT * FROM container_movement WHERE status=1 AND cm_id=".$cm_id);
	if ( $r1 = mysqli_fetch_array($q1) )
	{
		$lolo_charges    = $r1['lolo_charges'];
		$weight_charges  = $r1['weight_charges'];
	}

	$a = $rent + $lolo_charges + $weight_charges;

	$q = mysqli_query($mycon,"SELECT * FROM container_entry WHERE status=1 AND cm_id=".$cm_id);
	while ( $r=mysqli_fetch_array($q) ) 
	{
		$advance = $r['advance'];
		$diesel  = $r['diesel'];
		$b 		 = $advance + $diesel;
		$balance = $a - $b;

		$sql = "UPDATE container_entry SET rent=$rent , balance=$balance WHERE status=1 AND ce_id=".$r['ce_id'];
		$q1 = mysqli_query($mycon,$sql);
		if(mysqli_affected_rows($mycon))
			$json['updated'] = 'true';	
	}

	echo json_encode($json);
?>