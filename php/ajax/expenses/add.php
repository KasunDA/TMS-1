<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$check_number = $_GET['check_number'];
	$bank_id = $_GET['bank_id'];
	$amount = $_GET['amount'];
	$vehicle_id = $_GET['vehicle_id'];
	$name = $_GET['name'];
	$description = $_GET['description'];
	
	$q = mysqli_query($mycon,"INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, vehicle_id,name, description) VALUES ( '$datee' , $dd_id, '$method', '$check_number', $bank_id, $amount, $vehicle_id, '$name', '$description' ) ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>