<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$amount = $_GET['amount'];
	$vehicle_id = $_GET['vehicle_id'];
	$name = $_GET['name'];
	$description = $_GET['description'];
	
	if( $_GET['check_number'] != NULL && $_GET['bank_id'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	

		$sql = "INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, vehicle_id,name, description) VALUES ( '$datee' , $dd_id, '$method', '$check_number', $bank_id, $amount, $vehicle_id, '$name', '$description' ) ";
	}
	else
	{

		$sql = "INSERT INTO expenses(datee, dd_id, method, amount, vehicle_id,name, description) VALUES ( '$datee' , $dd_id, '$method', $amount, $vehicle_id, '$name', '$description' ) ";
	}
	
	
	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>