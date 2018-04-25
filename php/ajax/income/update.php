<?php 

	require '../../connection.php';
	
	$income_id = $_GET['income_id'];
	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$amount = $_GET['amount'];
	$description = $_GET['description'];


	if( $_GET['check_number'] != NULL && $_GET['bank_id'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	

		$sql = "UPDATE income SET datee='$datee',dd_id=$dd_id,method='$method',check_number='$check_number',bank_id=$bank_id,amount=$amount, description='$description' WHERE income_id=$income_id ";
	}
	else
	{

		$sql = "UPDATE income SET datee='$datee',dd_id=$dd_id,method='$method',check_number=NULL,bank_id=NULL,amount=$amount, description='$description' WHERE income_id=$income_id ";
	}

	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>