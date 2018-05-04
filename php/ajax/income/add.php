<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$amount = $_GET['amount'];
	$description = $_GET['description'];


	if( isset($_GET['cmp_id']) && $_GET['cmp_id'] != NULL  )
	{
		$cmp_id = $_GET['cmp_id'];
	}
	else
	{
		$cmp_id = 'null';	
	}

	if(  isset($_GET['check_number']) &&  isset($_GET['bank_id']) && $_GET['check_number'] != NULL && $_GET['bank_id'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	
	}
	else
	{
		$check_number = NULL;
		$bank_id = 'null';
	}

	$sql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, cmp_id, description) VALUES ( '$datee' , $dd_id, '$method', '$check_number', $bank_id, $amount, $cmp_id ,'$description' ) ";
	
	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>