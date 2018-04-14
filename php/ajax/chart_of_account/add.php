<?php 

	require '../../connection.php';

	$party_name = $_GET['party_name'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];

	$q = mysqli_query($mycon,"INSERT INTO chart_of_account(party_name,address,contact) VALUES('$party_name','$address','$contact') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>