<?php 

	require '../../connection.php';

	$json['updated']  = 'false';
	$income_id 		  = $_GET['income_id'];
	$datee 			  = $_GET['datee'];
	$dd_id 			  = 2;
	$method 		  = $_GET['method'];
	
	if( isset($_GET['bank_id']) && isset($_GET['check_number']) && $_GET['bank_id'] != NULL && $_GET['check_number'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	
	}
	else
	{
		$check_number = NULL;
		$bank_id = 'null';
	}
	
	$amount = $_GET['amount'];
	$name   = $_GET['name'];
	
	if( $_GET['description'] != NULL )	
		$description = $_GET['description'];

	else
		$description = NULL;	
	

	if( $_GET['vehicle_id'] != NUll && $_GET['vehicle_id'] != 0 )
	{
		$vehicle_id = $_GET['vehicle_id'];
		$sql = "UPDATE income SET datee = '$datee' , dd_id = $dd_id, method = '$method' , check_number = '".$check_number."' , bank_id = ".$bank_id." , amount = $amount , vehicle_id = $vehicle_id , name = '$name' , description = '".$description."'  WHERE income_id=".$income_id;
	}
	else
	{
		$borrower_id = $_GET['borrower_id'];
		$sql = "UPDATE income SET datee = '$datee' , dd_id = $dd_id, method = '$method' , check_number = '".$check_number."' , bank_id = ".$bank_id." , amount = $amount , borrower_id = $borrower_id , name = '$name' , description = '".$description."'  WHERE income_id=".$income_id;
	}

	// echo $sql;

	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
		$json['updated'] = 'true';

	echo json_encode($json);
?>