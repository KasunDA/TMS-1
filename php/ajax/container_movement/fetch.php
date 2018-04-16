<?php 

	require '../../connection.php';

	$json="";

	$q = mysqli_query($mycon,'SELECT * FROM container_movement WHERE status=1 ORDER BY cm_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['cm_id'] = $r['cm_id'];
		$json[$n]['datee'] = $r['datee'];

		$q1 = mysqli_query($mycon,"SELECT name from agent where agent_id=".$r['agent_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['agent_name'] = $r1['name'];
		}
		
		$q1 = mysqli_query($mycon,"SELECT short_form from chart_of_account where coa_id=".$r['coa_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['coa'] = $r1['short_form'];
		}

		$q1 = mysqli_query($mycon,"SELECT short_form from consignee where consignee_id=".$r['consignee_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['consignee'] = $r1['short_form'];
		}
		
		$json[$n]['movement'] = $r['movement'];

		$q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['empty_terminal_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['empty_terminal'] = $r1['short_form'];
		}

		$q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['from_yard_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['from_yard'] = $r1['short_form'];
		}

		$q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['to_yard_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['to_yard'] = $r1['short_form'];
		}
	
		$json[$n]['bl_cro_number'] = $r['bl_cro_number'];
		$json[$n]['job_number'] = $r['job_number'];
		$json[$n]['container_number'] = $r['container_number'];
		$json[$n]['index_number'] = $r['index_number'];
		$json[$n]['container_size'] = $r['container_size'];

		$q1 = mysqli_query($mycon,"SELECT vehicle_number from vehicle where vehicle_id=".$r['vehicle_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['vehicle_number'] = $r['vehicle_number'];
		}

		$json[$n]['advance'] = $r['advance'];
		$json[$n]['diesel'] = $r['diesel'];
		$json[$n]['rent'] = $r['rent'];
		$json[$n]['balance'] = $r['balance'];
		$json[$n]['party_charges'] = $r['party_charges'];
	
		$q1 = mysqli_query($mycon,"SELECT type from container where container_id=".$r['container_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['container_type'] = $r1['type'];
		}

		$json[$n]['lot_of']= $r['lot_of'];
	
		$q1 = mysqli_query($mycon,"SELECT short_form from line where line_id=".$r['line_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['line'] = $r1['short_form'];
		}
	
		$json[$n]['lolo_charges'] = $r['lolo_charges'];
		$json[$n]['weight_charges'] = $r['weight_charges'];
		$json[$n]['color'] = $r['color'];
		$json[$n]['mr_charges'] = $r['mr_charges'];
		$json[$n]['remarks'] = $r['remarks'];

		$n++;
	}

	echo json_encode($json);

?>