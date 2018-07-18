<?php 

	require '../../connection.php';

	$json  = NULL;
	$n     = 0;
	$cm_id = $_GET['cm_id'];

	$q = mysqli_query($mycon,'SELECT a.*,b.lolo_charges,b.weight_charges FROM container_entry a , container_movement b WHERE a.status=1 AND b.status=1 AND a.cm_id=b.cm_id AND a.cm_id='.$cm_id);
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['ce_id'] = $r['ce_id'];	
		$json[$n]['vehicle_id'] = $r['vehicle_id'];
		$q1 = mysqli_query($mycon,"SELECT vehicle_id,vehicle_number from vehicle where vehicle_id=".$r['vehicle_id']);
		if($r1 = mysqli_fetch_array($q1)) 
			$json[$n]['vehicle_number'] = $r1['vehicle_number'];
		else
			$json[$n]['vehicle_number'] = '';

		$json[$n]['rent'] 	    	= $r['rent'];
		$json[$n]['advance'] 	    = $r['advance'];
		$json[$n]['diesel'] 		= $r['diesel'];
		$json[$n]['balance'] 		= $r['balance'];
		$json[$n]['lolo_charges']   = $r['lolo_charges'];
		$json[$n]['weight_charges'] = $r['weight_charges'];

		$n++;
	}

	echo json_encode($json);

?>