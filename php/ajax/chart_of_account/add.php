<?php 

	require '../../connection.php';

	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];

	$q = mysqli_query($mycon,"INSERT INTO chart_of_account(short_form,full_form,address,contact) VALUES('$short_form','$full_form','$address','$contact') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>