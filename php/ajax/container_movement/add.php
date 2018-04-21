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
	
	$json;

	$q = mysqli_query($mycon,"INSERT INTO container_movement(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,container_size,party_charges,lot_of,line_id) VALUES( '$datee',$agent_id,$coa_id,$consignee_id,'$movement',$empty_terminal_id,$from_yard_id,$to_yard_id,$container_size,$party_charges,$lot_of,$line_id ) ");

	if(mysqli_affected_rows($mycon))
	{

		$iq = mysqli_query($mycon,'SELECT cm_id,lot_of FROM container_movement ORDER BY cm_id DESC LIMIT 1');

		$riq = mysqli_fetch_array($iq);

		session_start();

		$_SESSION['cm_id'] = $riq['cm_id'];
		$_SESSION['lot_of'] = $riq['lot_of'];

		$json['inserted'] = 'true';
		$json['cm_id'] = $riq['cm_id'];
	}

	echo json_encode($json);

?>