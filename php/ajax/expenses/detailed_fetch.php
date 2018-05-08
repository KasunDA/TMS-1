<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee = date('Y-m-d', strtotime( $_GET['from_datee'] ));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']) );
	

	if( isset($_GET['dd_id']) && $_GET['dd_id'] != NULL )
	{
		$dd_id = $_GET['dd_id'];
		$sql = "SELECT * FROM expenses WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and dd_id=$dd_id ";
	}
	else
	{
		$sql = "SELECT * FROM expenses WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' ";
	}

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['expense_id'] = $r['expense_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['dd_id'] = $r['dd_id'];

		$q1 = mysqli_query($mycon,'SELECT name from daily_description where dd_id='.$r['dd_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['dd_name'] = $r1['name'];

		$json[$n]['method'] = $r['method'];
		$json[$n]['check_number'] = $r['check_number'];
		$json[$n]['bank_id'] = $r['bank_id'];
		
		if( $r['bank_id'] != NULL )
		{
			$q1 = mysqli_query($mycon,'SELECT short_form from bank where bank_id='.$r['bank_id']);
			$r1 = mysqli_fetch_array($q1);
			$json[$n]['bank_name'] = $r1['short_form'];		
		}
		else
		{
			$json[$n]['bank_name'] = NULL;			
		}
		
		$json[$n]['amount'] = $r['amount'];
		$json[$n]['vehicle_id'] = $r['vehicle_id'];

		if( $r['vehicle_id'] != NULL )
		{
			$q1 = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id='.$r['vehicle_id']);
			$r1 = mysqli_fetch_array($q1);
			$json[$n]['vehicle_number'] = $r1['vehicle_number'];
		}
		else
		{
			$json[$n]['vehicle_number'] = NULL;		
		}

		$json[$n]['name'] = $r['name'];

		$json[$n]['bike_id'] = $r['bike_id'];

		if( $r['bike_id'] != NULL )
		{
			$q1 = mysqli_query($mycon,'SELECT bike_number FROM bike where bike_id='.$r['bike_id']);
			$r1 = mysqli_fetch_array($q1);
			$json[$n]['bike_number'] = $r1['bike_number'];
		}
		else
		{
			$json[$n]['bike_number'] = NULL;
		}

		$json[$n]['description'] = $r['description'];
		$n++;
	}

	echo json_encode($json);

?>