<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$agent_id = $_GET['agent_id'];
	$coa_id = $_GET['coa_id'];
	$consignee_id = $_GET['consignee_id'];
	$movement = $_GET['movement'];
	$empty_terminal_id = $_GET['empty_terminal_id'];
	$from_yard_id = $_GET['from_yard_id'];
	$to_yard_id = $_GET['to_yard_id'];
	$container_size = $_GET['container_size'];
	$party_charges = $_GET['party_charges'];
	$lot_of= $_GET['lot_of'];
	$line_id = $_GET['line_id'];

	$bl_cro_number = $_GET['bl_cro_number'];
	$job_number = $_GET['job_number'];
	$index_number = $_GET['index_number'];
	
	$container_id = $_GET['container_id'];
	$lolo_charges = $_GET['lolo_charges'];
	$weight_charges = $_GET['weight_charges'];
	
	$json;

	$q = mysqli_query($mycon,"INSERT INTO container_movement(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,container_size,party_charges,lot_of,line_id,bl_cro_number,job_number,index_number,container_id,lolo_charges,weight_charges) VALUES( '$datee',$agent_id,$coa_id,$consignee_id,'$movement',$empty_terminal_id,$from_yard_id,$to_yard_id,$container_size,$party_charges,$lot_of,$line_id,'$bl_cro_number','$job_number','$index_number',$container_id,$lolo_charges,$weight_charges ) ");

	if(mysqli_affected_rows($mycon))
	{

		$iq = mysqli_query($mycon,'SELECT * FROM container_movement ORDER BY cm_id DESC LIMIT 1');

		$riq = mysqli_fetch_array($iq);

		session_start();

		$_SESSION['cm_id'] = $riq['cm_id'];
		$_SESSION['datee'] = $riq['datee'];
		$_SESSION['lot_of'] = $riq['lot_of'];
		$_SESSION['agent_id'] = $riq['agent_id'];
		$_SESSION['coa_id'] = $riq['coa_id'];
		$_SESSION['consignee_id'] = $riq['consignee_id'];
		$_SESSION['movement'] = $riq['movement'];
		$_SESSION['empty_terminal_id'] = $riq['empty_terminal_id'];
		$_SESSION['from_yard_id'] = $riq['from_yard_id'];
		$_SESSION['to_yard_id'] = $riq['to_yard_id'];
		$_SESSION['container_size'] = $riq['container_size'];
		$_SESSION['party_charges'] = $riq['party_charges'];
		$_SESSION['line_id'] = $riq['line_id'];

		$_SESSION['bl_cro_number'] = $riq['bl_cro_number'];
		$_SESSION['job_number'] = $riq['job_number'];
		$_SESSION['index_number'] = $riq['index_number'];
		
		$_SESSION['container_id'] = $riq['container_id'];
		$_SESSION['lolo_charges'] = $riq['lolo_charges'];
		$_SESSION['weight_charges'] = $riq['weight_charges'];

		$json['inserted'] = 'true';
		$json['cm_id'] = $riq['cm_id'];
	}

	echo json_encode($json);

?>