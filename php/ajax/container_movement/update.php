<?php 

	require '../../connection.php';
	
	$cm_id = $_GET['cm_id'];
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
	$rent = $_GET['rent'];
	$container_id = $_GET['container_id'];
	$lolo_charges = $_GET['lolo_charges'];
	$weight_charges = $_GET['weight_charges'];

	$q = mysqli_query($mycon,"UPDATE container_movement SET datee='$datee', agent_id= $agent_id , coa_id= $coa_id, consignee_id=$consignee_id , movement='$movement', empty_terminal_id=$empty_terminal_id , from_yard_id=$from_yard_id , to_yard_id=$to_yard_id , container_size=$container_size , party_charges=$party_charges , lot_of=$lot_of , line_id=$line_id , bl_cro_number='$bl_cro_number',job_number='$job_number', index_number='$index_number' , rent=$rent , container_id=$container_id , lolo_charges=$lolo_charges , weight_charges=$weight_charges WHERE cm_id=$cm_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";

		session_start();

		$_SESSION['cm_id'] = $cm_id;
		$_SESSION['lot_of'] = $lot_of;
		$_SESSION['datee'] = $datee;
		$_SESSION['agent_id'] = $agent_id;
		$_SESSION['coa_id'] = $coa_id;
		$_SESSION['consignee_id'] = $consignee_id;
		$_SESSION['movement'] = $movement;
		$_SESSION['empty_terminal_id'] = $empty_terminal_id;
		$_SESSION['from_yard_id'] = $from_yard_id;
		$_SESSION['to_yard_id'] = $to_yard_id;
		$_SESSION['container_size'] = $container_size;
		$_SESSION['party_charges'] = $party_charges;
		$_SESSION['line_id'] = $line_id;

		$_SESSION['bl_cro_number'] = $bl_cro_number;
		$_SESSION['job_number'] = $job_number;
		$_SESSION['index_number'] = $index_number;
		$_SESSION['rent'] = $rent;
		$_SESSION['container_id'] = $container_id;
		$_SESSION['lolo_charges'] = $lolo_charges;
		$_SESSION['weight_charges'] = $weight_charges;

	}

?>