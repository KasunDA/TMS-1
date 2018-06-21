<?php 

	require '../../connection.php';

	$json=NULL;	
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee'])); 
	

	$sql = "SELECT * FROM container_movement WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' ";


	if( isset($_GET['movement']) && $_GET['movement'] != NULL )
	{
		$movement = $_GET['movement'];

		$sql .= " and b.movement=$movement ";       

	}

	if( isset($_GET['container_size']) && $_GET['container_size'] != NULL )
	{
		$container_size = $_GET['container_size'];

		$sql .= " and b.container_size=$container_size ";       

	}

	if( isset($_GET['from_yard_id']) && $_GET['from_yard_id'] != NULL )
	{
		$from_yard_id = $_GET['from_yard_id'];

		$sql .= " and from_yard_id=$from_yard_id ";       

	}
	

	if( isset($_GET['to_yard_id']) && $_GET['to_yard_id'] != NULL )
	{
		$to_yard_id = $_GET['to_yard_id'];

		$sql .= "and to_yard_id=$to_yard_id ";
	}

	
    
    if( isset($_GET['coa_id']) && $_GET['coa_id'] != NULL )
	{
		$coa_id = $_GET['coa_id'];

		$sql .= "and coa_id=$coa_id ";
	}
	

	if( isset($_GET['consignee_id']) && $_GET['consignee_id'] != NULL )
	{
		$consignee_id = $_GET['consignee_id'];

		$sql .= "and consignee_id=$consignee_id ";
	}

    
    if( isset($_GET['empty_terminal_id']) && $_GET['empty_terminal_id'] != NULL )
	{
		$empty_terminal_id = $_GET['empty_terminal_id'];

		$sql .= " and empty_terminal_id=$empty_terminal_id ";
	}
	

    if( isset($_GET['bl_cro_number']) && $_GET['bl_cro_number'] != NULL )
	{
		$bl_cro_number = $_GET['bl_cro_number'];

		$sql .= " and bl_cro_number LIKE '%$bl_cro_number%' ";
	}


    if( isset($_GET['container_id']) && $_GET['container_id'] != NULL )
	{
		$container_id = $_GET['container_id'];

		$sql .= " and container_id=$container_id ";
	}
	
    
    if( isset($_GET['line_id']) && $_GET['line_id'] != NULL )
	{
		$line_id = $_GET['line_id'];

		$sql .= " and line_id=$line_id ";
	}
    
	// echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['paid_status'] = $r['paid_status'];
		$json[$n]['cm_id'] = $r['cm_id'];
		$json[$n]['datee'] = $r['datee'];

		$q1 = mysqli_query($mycon,"SELECT name from agent where agent_id=".$r['agent_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['agent_id'] = $r['agent_id'];
			$json[$n]['agent_name'] = $r1['name'];
		}
		
		$q1 = mysqli_query($mycon,"SELECT short_form from chart_of_account where coa_id=".$r['coa_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['coa_id'] = $r['coa_id'];
			$json[$n]['coa'] = $r1['short_form'];
		}

		$q1 = mysqli_query($mycon,"SELECT short_form from consignee where consignee_id=".$r['consignee_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['consignee_id'] = $r['consignee_id'];
			$json[$n]['consignee'] = $r1['short_form'];
		}
		
		$json[$n]['movement'] = $r['movement'];

		$q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['empty_terminal_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['empty_terminal_id'] = $r['empty_terminal_id'];
			$json[$n]['empty_terminal'] = $r1['short_form'];
		}

		$q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['from_yard_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['from_yard_id'] = $r['from_yard_id'];
			$json[$n]['from_yard'] = $r1['short_form'];
		}

		$q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['to_yard_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['to_yard_id'] = $r['to_yard_id'];
			$json[$n]['to_yard'] = $r1['short_form'];
		}
	
		$json[$n]['container_size'] = $r['container_size'];
		$json[$n]['lot_of']= $r['lot_of'];
	
		$q1 = mysqli_query($mycon,"SELECT short_form from line where line_id=".$r['line_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['line_id'] = $r['line_id'];
			$json[$n]['line'] = $r1['short_form'];
		}

		$json[$n]['bl_cro_number'] = $r['bl_cro_number'];
		$json[$n]['job_number'] = $r['job_number'];
		$json[$n]['index_number'] = $r['index_number'];
		// $json[$n]['rent'] = $r['rent'];

		$q1 = mysqli_query($mycon,"SELECT type from container where container_id=".$r['container_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['container_id'] = $r['container_id'];
			$json[$n]['container_type'] = $r1['type'];
		}

		$json[$n]['lolo_charges'] = $r['lolo_charges'];
		$json[$n]['weight_charges'] = $r['weight_charges'];
		$json[$n]['party_charges'] = $r['party_charges'];
		$json[$n]['total_party_charges'] = $r['party_charges']*$r['lot_of'];

		$n++;
	}

	echo json_encode($json);

?>