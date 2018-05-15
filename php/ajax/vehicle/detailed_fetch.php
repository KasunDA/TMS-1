<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee =  date('Y-m-d', strtotime($_GET['from_datee'])) ; //date('Y-m-d', strtotime(
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));

	if( isset($_GET['from_yard_id']) && $_GET['from_yard_id'] != NULL )
	{
		$from_yard_id = $_GET['from_yard_id'];
	}
	else
	{
		$from_yard_id = 'NULL';
	}

	if( isset($_GET['to_yard_id']) && $_GET['to_yard_id'] != NULL )
	{
		$to_yard_id = $_GET['to_yard_id'];
	}
	else
	{
		$to_yard_id = 'NULL';
	}
	
    
    if( isset($_GET['coa_id']) && $_GET['coa_id'] != NULL )
	{
		$coa_id = $_GET['coa_id'];
	}
	else
	{
		$coa_id = 'NULL';
	}

	if( isset($_GET['consignee_id']) && $_GET['consignee_id'] != NULL )
	{
		$consignee_id = $_GET['consignee_id'];
	}
	else
	{
		$consignee_id = 'NULL';
	}

    $movement = $_GET['movement'];
    
    if( isset($_GET['empty_terminal_id']) && $_GET['empty_terminal_id'] != NULL )
	{
		$empty_terminal_id = $_GET['empty_terminal_id'];
	}
	else
	{
		$empty_terminal_id ='NULL';
	}

    
    if( isset($_GET['container_number']) && $_GET['container_number'] != NULL )
	{
		$container_number = $_GET['container_number'];
	}
	else
	{
		$container_number = 'NULL';
	}
    
    
    $container_size = $_GET['container_size'];


    if( isset($_GET['container_id']) && $_GET['container_id'] != NULL )
	{
		$container_id = $_GET['container_id'];
	}
	else
	{
		$container_id = 'NULL';
	}
    

    if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL )
	{
		$vehicle_id = $_GET['vehicle_id'];
	}
	else
	{
		$vehicle_id = 'NULL';
	}
    
    
    if( isset($_GET['line_id']) && $_GET['line_id'] != NULL )
	{
		$line_id = $_GET['line_id'];
	}
	else
	{
		$line_id = 'NULL';
	}
    
    if( isset($_GET['bl_cro_number']) && $_GET['bl_cro_number'] != NULL )
	{
		$bl_cro_number = $_GET['bl_cro_number'];
		$sql = "SELECT a.*, b.*,c.owner_name,c.driver_name,c.vehicle_number FROM container_entry a , container_movement b , vehicle c  WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and a.vehicle_id=c.vehicle_id and b.datee BETWEEN '$from_datee' AND '$to_datee' and b.from_yard_id=$from_yard_id and b.to_yard_id=$to_yard_id and b.coa_id=$coa_id and b.consignee_id=$consignee_id and b.movement='$movement' and b.empty_terminal_id=$empty_terminal_id and a.container_number=$container_number and b.bl_cro_number='$bl_cro_number' and b.container_size=$container_size  and b.container_id=$container_id and a.vehicle_id =$vehicle_id and b.line_id=$line_id";
	}
	else
	{
		$sql = "SELECT a.*, b.*,c.owner_name,c.driver_name,c.vehicle_number FROM container_entry a , container_movement b , vehicle c WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and a.vehicle_id=c.vehicle_id and b.datee BETWEEN '$from_datee' AND '$to_datee' and b.from_yard_id=$from_yard_id and b.to_yard_id=$to_yard_id and b.coa_id=$coa_id and b.consignee_id=$consignee_id and b.movement='$movement' and b.empty_terminal_id=$empty_terminal_id and a.container_number=$container_number and b.container_size=$container_size  and b.container_id=$container_id and a.vehicle_id =$vehicle_id and b.line_id=$line_id";
	}


	// $sql = "SELECT a.*, b.* FROM container_entry a , container_movement b WHERE a.status=1 and b.status=1 and a.cm_id = b.cm_id and b.datee BETWEEN '$from_datee' AND '$to_datee' ";
	
	echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		if( isset($_GET['owner_name']) && $_GET['owner_name'] != NULL )
		{
			$owner_name = $_GET['owner_name'];

			if( $r['owner_name'] == $owner_name )
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

				// $q1 = mysqli_query($mycon,"SELECT vehicle_number,driver_name,owner_name from vehicle where vehicle_id=".$r['vehicle_id']);
				// if($r1 = mysqli_fetch_array($q1))
				// { 
					$json[$n]['vehicle_id'] = $r['vehicle_id'];	
					$json[$n]['vehicle_number'] = $r['vehicle_number'];
					$json[$n]['driver_name'] = $r['driver_name'];
					$json[$n]['owner_name'] = $r['owner_name'];
				// }

				$q1 = mysqli_query($mycon,"SELECT type from container where container_id=".$r['container_id']);
				if($r1 = mysqli_fetch_array($q1))
				{ 
					$json[$n]['container_id'] = $r['line_id'];
					$json[$n]['container_type'] = $r1['type'];
				}
				$json[$n]['bl_cro_number'] = $r['bl_cro_number'];
				$json[$n]['container_number'] = $r['container_number'];
				$json[$n]['advance'] = $r['advance'];
				$json[$n]['balance'] = $r['balance'];
				$json[$n]['remarks'] = $r['remarks'];
			}

		}
		else
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

			// $q1 = mysqli_query($mycon,"SELECT vehicle_number,driver_name,owner_name from vehicle where vehicle_id=".$r['vehicle_id']);
			// if($r1 = mysqli_fetch_array($q1))
			// { 
				$json[$n]['vehicle_id'] = $r['vehicle_id'];	
				$json[$n]['vehicle_number'] = $r['vehicle_number'];
				$json[$n]['driver_name'] = $r['driver_name'];
				$json[$n]['owner_name'] = $r['owner_name'];
			// }

			$q1 = mysqli_query($mycon,"SELECT type from container where container_id=".$r['container_id']);
			if($r1 = mysqli_fetch_array($q1))
			{ 
				$json[$n]['container_id'] = $r['line_id'];
				$json[$n]['container_type'] = $r1['type'];
			}
			$json[$n]['bl_cro_number'] = $r['bl_cro_number'];
			$json[$n]['container_number'] = $r['container_number'];
			$json[$n]['advance'] = $r['advance'];
			$json[$n]['balance'] = $r['balance'];
			$json[$n]['remarks'] = $r['remarks'];
		}
			
		$n++;
	}

	echo json_encode($json);

?>