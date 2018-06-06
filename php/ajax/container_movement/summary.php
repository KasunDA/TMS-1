<?php 

	require '../../connection.php';

	$json=NULL;	
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee'])); 

	$sql = "SELECT * FROM container_movement  WHERE status=1 and  datee BETWEEN '$from_datee' AND '$to_datee' ";

	if( isset($_GET['movement']) && $_GET['movement'] != NULL )
	{
		$movement = $_GET['movement'];

		$sql .= " and movement='$movement' ";       

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

    
	$sql .= " GROUP BY coa_id,from_yard_id,to_yard_id,movement  ";

	// echo '<script>alert("'.$sql.'")</script>';
	
	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['hr_total'] = 0;
		
		$q1 = mysqli_query($mycon,"SELECT short_form from chart_of_account where coa_id=".$r['coa_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['coa_id'] = $r['coa_id'];
			$json[$n]['coa'] = $r1['short_form'];
		}

		$json[$n]['movement'] = $r['movement'];
		// $json[$n]['container_size'] = $r['container_size'];

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


		$json[$n]['20'] = 0;
		$json[$n]['40'] = 0;
		$json[$n]['45'] = 0;


		$q1 = mysqli_query($mycon," SELECT * FROM container_movement where status=1 and coa_id=".$r['coa_id']." and movement='".$r['movement']."' and from_yard_id=".$r['from_yard_id']." and to_yard_id=".$r['to_yard_id']." and  datee BETWEEN '$from_datee' AND '$to_datee' "); 
		
		while( $r1 = mysqli_fetch_array($q1) )
		{
			$sql1 = " SELECT COUNT(ce_id) as total_cs FROM container_entry where cm_id=".$r1['cm_id']." and status=1 ";

			if( isset($_GET['ids']) && $_GET['ids'] != NULL )
			{
				$ids   = $_GET['ids'];
				$sql1 .= "  and ce_id NOT IN ( '" . implode( "', '" , $ids ) . "' ) ";
			}

			$q2 = mysqli_query($mycon,$sql1); 
			$r2 = mysqli_fetch_array($q2);

			if( $r1['container_size'] == '20' )
			{	
				$json[$n]['20'] += $r2['total_cs'];
			}
			else if( $r1['container_size'] == '40' )
			{
				$json[$n]['40'] += $r2['total_cs'];
			}
			else
			{
				$json[$n]['45'] += $r2['total_cs'];
			}

		}

		$json[$n]['hr_total'] +=  $json[$n]['20']+$json[$n]['40']+$json[$n]['45'];


		$n++;
	}

	echo json_encode($json);

?>