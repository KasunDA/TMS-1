<?php 

	require '../../connection.php';

	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];
	$account_title = $_GET['account_title'];
	$account_number = $_GET['account_number'];
	$balance = $_GET['balance'];
	$address = $_GET['address'];

	
	$q = mysqli_query($mycon,"INSERT INTO bank(short_form,full_form,account_title,account_number,balance,address) VALUES('$short_form','$full_form','$account_title','$account_number',$balance,'$address') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>