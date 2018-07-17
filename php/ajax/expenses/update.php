<?php 

	require '../../connection.php';
	
	$json['updated']  = 'false';
	$expense_id 	  = $_GET['expense_id'];
	$datee 			  = $_GET['datee'];
	$dd_id 			  = $_GET['dd_id'];
	$method 		  = $_GET['method'];
	$description 	  = $_GET['description'];
	
	if( $_GET['bank_id'] != NULL && $_GET['check_number'] != NULL  )
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

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL && $_GET['vehicle_id'] != 'null' )	
		$vehicle_id = $_GET['vehicle_id'];
	else
		$vehicle_id = 'null';	
	
	
	if( isset($_GET['name']) &&  $_GET['name'] != NULL && $_GET['name'] != 'null' )	
		$name = $_GET['name'];
	else
		$name = '';
	

	if( isset($_GET['bike_id']) &&  $_GET['bike_id'] != NULL && $_GET['bike_id'] != 'null' )	
		$bike_id = $_GET['bike_id'];
	else
		$bike_id = 'null';

	if( isset($_GET['borrower_id']) && $_GET['borrower_id'] != NULL && $_GET['borrower_id'] != 'null' )	
	{
		$borrower_id = $_GET['borrower_id'];
		$bq1  = mysqli_query($mycon,'SELECT name FROM borrower WHERE borrower_id='.$_GET['borrower_id']);
		$rq1  = mysqli_fetch_array($bq1);
		$name = $rq1['name'];
	}
	else
		$borrower_id = 'null';	

	$sql = "UPDATE expenses SET datee='$datee',dd_id=$dd_id,method='$method',check_number='$check_number',bank_id=$bank_id,amount=$amount,vehicle_id=$vehicle_id , name='$name', bike_id = $bike_id , borrower_id=$borrower_id , description='$description' WHERE expense_id=$expense_id ";

	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
		$json['updated'] = "true";

	echo json_encode($json);
?>