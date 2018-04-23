<?php 

	require '../../connection.php';
	
	$expense_id = $_GET['expense_id'];
	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$check_number = $_GET['check_number'];
	$bank_id = $_GET['bank_id'];
	$amount = $_GET['amount'];
	$vehicle_id = $_GET['vehicle_id'];
	$name = $_GET['name'];
	$description = $_GET['description'];

	$q = mysqli_query($mycon,"UPDATE `expenses` SET `datee`='$datee',`dd_id`=$dd_id,`method`='$method',`check_number`='$check_number',`bank_id`=$bank_id,`amount`=$amount,`vehicle_id`=$vehicle_id,`name`='$name',`description`='$description' WHERE expense_id=$expense_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>