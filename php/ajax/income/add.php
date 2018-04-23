<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$check_number = $_GET['check_number'];
	$bank_id = $_GET['bank_id'];
	$amount = $_GET['amount'];
	$description = $_GET['description'];
	
	$q = mysqli_query($mycon,"INSERT INTO `income`(`datee`, `dd_id`, `method`, `check_number`, `bank_id`, `amount`, `description`) VALUES ( '$datee' , `$dd_id`, '$method', '$check_number', `$bank_id`, `$amount`,'$description' ) ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>