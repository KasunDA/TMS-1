<?php 

	require '../../connection.php';
	
	$cm_id = $_GET['$cm_id'];
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

	$q = mysqli_query($mycon,"UPDATE container_movement SET datee='$datee', agent_id= $agent_id,coa_id= $coa_id, consignee_id=$consignee_id,movement='$movement',empty_terminal_id=$empty_terminal_id,from_yard_id=$from_yard_id,to_yard_id=$to_yard_id, container_size=$container_size , party_charges=$party_charges , lot_of=$lot_of , line_id=$line_id , WHERE cm_id=$cm_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>