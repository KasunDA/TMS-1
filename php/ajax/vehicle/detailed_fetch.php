<?php 

	require '../../connection.php';

	$json=NULL;
	$vids=[0];
	$sql='';
	$from_datee =  date('Y-m-d', strtotime($_GET['from_datee'])) ; //date('Y-m-d', strtotime(
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));


	$sql = "SELECT a.*, b.*,c.owner_name,c.driver_name,c.vehicle_number FROM container_entry a , container_movement b , vehicle c  WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and a.vehicle_id=c.vehicle_id and b.datee BETWEEN '$from_datee' AND '$to_datee' ";

	
	if( isset($_GET['movement']) && $_GET['movement'] != NULL )
	{
		$movement = $_GET['movement'];
		$sql .= " and b.movement='$movement' ";       
	}

	if( isset($_GET['container_size']) && $_GET['container_size'] != NULL )
	{
		$container_size = $_GET['container_size'];
		$sql .= " and b.container_size=$container_size ";       
	}

	if( isset($_GET['from_yard_id']) && $_GET['from_yard_id'] != NULL )
	{
		$from_yard_id = $_GET['from_yard_id'];
		$sql .= " and b.from_yard_id=$from_yard_id ";       
	}

	if( isset($_GET['to_yard_id']) && $_GET['to_yard_id'] != NULL )
	{
		$to_yard_id = $_GET['to_yard_id'];
		$sql .= "and b.to_yard_id=$to_yard_id ";
	}

    if( isset($_GET['coa_id']) && $_GET['coa_id'] != NULL )
	{
		$coa_id = $_GET['coa_id'];
		$sql .= "and b.coa_id=$coa_id ";
	}
	
	if( isset($_GET['consignee_id']) && $_GET['consignee_id'] != NULL )
	{
		$consignee_id = $_GET['consignee_id'];
		$sql .= "and b.consignee_id=$consignee_id ";
	}

    if( isset($_GET['empty_terminal_id']) && $_GET['empty_terminal_id'] != NULL )
	{
		$empty_terminal_id = $_GET['empty_terminal_id'];
		$sql .= " and b.empty_terminal_id=$empty_terminal_id ";
	}
	
    if( isset($_GET['container_number']) && $_GET['container_number'] != NULL )
	{
		$container_number = $_GET['container_number'];
		$sql .= " and a.container_number LIKE '%$container_number%' ";
	}
    
    if( isset($_GET['bl_cro_number']) && $_GET['bl_cro_number'] != NULL )
	{
		$bl_cro_number = $_GET['bl_cro_number'];
		$sql .= " and b.bl_cro_number LIKE '%$bl_cro_number%' ";
	}

    if( isset($_GET['container_id']) && $_GET['container_id'] != NULL )
	{
		$container_id = $_GET['container_id'];
		$sql .= " and b.container_id=$container_id ";
	}
	
    if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{
		$vehicle_id = $_GET['vehicle_id'];
		$sql .= " and a.vehicle_id =$vehicle_id ";
	}

	if( isset($_GET['owner_name']) && $_GET['owner_name'] != NULL )
	{
		$owner_name = strtolower($_GET['owner_name']);
		$sql .= " and c.owner_name ='$owner_name' ";
	}
    
    if( isset($_GET['line_id']) && $_GET['line_id'] != NULL )
	{
		$line_id = $_GET['line_id'];
		$sql .= " and b.line_id=$line_id ";
	}
    
	// $sql = "SELECT a.*, b.* FROM container_entry a , container_movement b WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and b.datee BETWEEN '$from_datee' AND '$to_datee' ";
	
	// echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['transaction_id'] = $r['ce_id'];  
		$json[$n]['datee'] = $r['datee'];

		$q1 = mysqli_query($mycon,"SELECT short_form from chart_of_account where coa_id=".$r['coa_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['coa_id'] = $r['coa_id'];
			$json[$n]['coa'] = $r1['short_form'];
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
	
		$q1 = mysqli_query($mycon,"SELECT short_form from line where line_id=".$r['line_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['line_id'] = $r['line_id'];
			$json[$n]['line'] = $r1['short_form'];
		}

		$json[$n]['vehicle_id'] = $r['vehicle_id'];	
		$json[$n]['vehicle_number'] = $r['vehicle_number'];
		$json[$n]['driver_name'] = $r['driver_name'];
		$json[$n]['owner_name'] = $r['owner_name'];

		$q1 = mysqli_query($mycon,"SELECT type from container where container_id=".$r['container_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['container_id'] = $r['line_id'];
			$json[$n]['container_type'] = $r1['type'];
		}
		$json[$n]['bl_cro_number'] = $r['bl_cro_number'];
		$json[$n]['container_number'] = $r['container_number'];
		$json[$n]['rent'] = $r['rent'];
		$json[$n]['advance'] = $r['advance'];
		$json[$n]['diesel'] = $r['diesel'];
		$json[$n]['mr_charges'] = $r['mr_charges'];
		$json[$n]['balance'] = $r['balance'];
		$json[$n]['remarks'] = $r['remarks'];
		
		if( !in_array($r['vehicle_id'] , $vids) )
			array_push($vids ,$r['vehicle_id']);
			
		$n++;
	}
	$json['vids'] = $vids;
	echo json_encode($json);
?>