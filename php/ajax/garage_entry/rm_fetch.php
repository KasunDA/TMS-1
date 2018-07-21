<?php 

	require '../../connection.php';

	$json=NULL;
	$ge_ids = [];
	$n  = 0;
	$sql='';
	$from_datee =  date('Y-m-d', strtotime($_GET['from_datee'])) ; //date('Y-m-d', strtotime(
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL && $_GET['vehicle_id'] != 'null' )
	{
		$vehicle_id = str_replace( str_split("[]"),"",$_GET['vehicle_id']);
		$sql = "SELECT * FROM garage_entry  where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' AND vehicle_id IN (".$vehicle_id.") ";
	}
	else
	{
		$vids = str_replace( str_split("[]"),"",$_GET['vids']);

		$sql = "SELECT * FROM garage_entry  where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' AND vehicle_id IN (".$vids.") ";
	}

	$q = mysqli_query($mycon,$sql);

	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['ge_id'] = $r['ge_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['description'] = $r['description'];
		$json[$n]['vehicle_id'] = $r['vehicle_id'];
		
		$q1 = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id='.$r['vehicle_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['vehicle_number'] = $r1['vehicle_number'];
		$json[$n]['amount'] = $r['amount'];

		$n++;

		array_push($ge_ids,$r['ge_id']);
	}
	$json['ge_ids'] = $ge_ids;
	echo json_encode($json);


?>