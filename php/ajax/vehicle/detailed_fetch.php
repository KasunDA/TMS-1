<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee =  date('Y-m-d', strtotime($_GET['from_datee'])) ; //date('Y-m-d', strtotime(
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{
		$vehicle_id = $_GET['vehicle_id'];
		$sql = "SELECT a.*, b.* , c.vehicle_number,c.driver_name,c.owner_name, d.short_form FROM container_entry a , container_movement b , vehicle c , line d WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and a.vehicle_id = c.vehicle_id and b.line_id = d.line_id and b.datee BETWEEN '$from_datee' AND '$to_datee' AND a.vehicle_id =$vehicle_id";
	}
	else
	{
		$sql = "SELECT a.*, b.* , c.vehicle_number,c.driver_name,c.owner_name, d.short_form FROM container_entry a , container_movement b , vehicle c , line d WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and a.vehicle_id = c.vehicle_id and b.line_id = d.line_id and b.datee BETWEEN '$from_datee' AND '$to_datee' ";
	}


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
		$json[$n]['container_number'] = $r['container_number'];
		$json[$n]['advance'] = $r['advance'];
		$json[$n]['balance'] = $r['balance'];
		$json[$n]['remarks'] = $r['remarks'];

		$n++;
	}

	echo json_encode($json);

?>