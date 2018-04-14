<?php 

	require '../../connection.php';
	
	$bank_id = $_GET['bank_id'];
	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];
	$account_title = $_GET['account_title'];
	$account_number = $_GET['account_number'];
	$address = $_GET['address'];


	$q = mysqli_query($mycon,"UPDATE bank SET short_form='$short_form', full_form = '$full_form', account_title='$account_title' , account_number='$account_number', address = '$address' WHERE bank_id=$bank_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>