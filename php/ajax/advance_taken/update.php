<?php 

	require '../../connection.php';

	$json['updated']  = 'false';
	$expense_id       = $_GET['expense_id'];
	$datee  		  = $_GET['datee'];
	$dd_id  		  = 2;
	$method 		  = $_GET['method'];
	$amount 		  = $_GET['amount'];
	$cmp_id 		  = $_GET['cmp_id'];
	$check_number 	  = NULL;
	$bank_id 		  = 'NULL';
	$vehicle_id 	  = 'NULL';	
	$name 			  = 'NULL';
	$bike_id 		  = 'NULL';
	$borrower_id 	  = 'NULL';	
	$description 	  = $_GET['description'];
	
	if( isset($_GET['bank_id']) && isset($_GET['check_number']) && $_GET['bank_id'] != NULL && $_GET['check_number'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	
	}
		

	$sql = "UPDATE expenses SET datee='$datee', dd_id=$dd_id , method='$method', check_number='$check_number', bank_id=$bank_id , amount=$amount , cmp_id=$cmp_id , description='$description' WHERE expense_id=".$expense_id;

	// echo $sql;

	$q = mysqli_query($mycon,$sql);
	if(mysqli_affected_rows($mycon))
		$json['updated'] = 'true';

	echo json_encode($json);
?>