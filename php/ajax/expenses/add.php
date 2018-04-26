<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	
	
	if( $_GET['bank_id'] != NULL && $_GET['check_number'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	
	}
	else
	{
		$check_number = NULL;
		$bank_id = NULL;
	}

	$amount = $_GET['amount'];

	if( $_GET['vehicle_id'] != NULL )	
	{
		$vehicle_id = $_GET['vehicle_id'];
	}
	else
	{
		$vehicle_id = NULL;	
	}
	
	
	if( $_GET['name'] != NULL )	
	{
		$name = $_GET['name'];
	}
	else
	{
		$name = NULL;
	}
	
	
	if( $_GET['bike_id'] != NULL )	
	{
		$bike_id = $_GET['bike_id'];
	}
	else
	{
		$bike_id = NULL;	
	}

	$description = $_GET['description'];
	

	$sql = "INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, vehicle_id,name, bike_id , description) VALUES ( '$datee' , $dd_id, '$method', '".$check_number."' , ".$bank_id.", $amount, $vehicle_id, '$name', ".$bike_id." ,'$description' ) ";

		// $sql = "INSERT INTO expenses(datee, dd_id, method, amount, vehicle_id,name, description) VALUES ( '$datee' , $dd_id, '$method', $amount, $vehicle_id, '$name', '$description' ) ";
	
	
	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>