<?php 

	require '../../connection.php';
	
	$income_id = $_GET['income_id'];
	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$check_number = $_GET['check_number'];
	$bank_id = $_GET['bank_id'];
	$amount = $_GET['amount'];
	$description = $_GET['description'];

	$q = mysqli_query($mycon,"UPDATE `income` SET `datee`='$datee',`dd_id`=$dd_id,`method`='$method',`check_number`='$check_number',`bank_id`=$bank_id,`amount`=$amount, `description`='$description' WHERE income_id=$income_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>