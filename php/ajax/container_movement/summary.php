<?php 

	require '../../connection.php';

	$json=NULL;	
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee'])); 
	$movement = $_GET['movement'];
	$container_size = $_GET['container_size'];

	$sql = "SELECT a.*,COUNT(b.ce_id) FROM container_movement a , container_entry b WHERE a.status=1 and a.cm_id=b.cm_id and a.datee BETWEEN '$from_datee' AND '$to_datee' and a.movement='$movement' and a.container_size=$container_size  ";

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
	
    
	// echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{

		
		$q1 = mysqli_query($mycon,"SELECT short_form from chart_of_account where coa_id=".$r['coa_id']);
		if($r1 = mysqli_fetch_array($q1))
		{ 
			$json[$n]['coa_id'] = $r['coa_id'];
			$json[$n]['coa'] = $r1['short_form'];
		}

		$json[$n]['movement'] = $r['movement'];

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

		$json[$n]['lolo_charges'] = $r['lolo_charges'];
		$json[$n]['weight_charges'] = $r['weight_charges'];
		$json[$n]['party_charges'] = $r['party_charges'];
		$json[$n]['total_party_charges'] = $r['party_charges']*$r['lot_of'];

		$n++;
	}

	echo json_encode($json);

?>