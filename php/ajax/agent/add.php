<?php 

	require '../../connection.php';

	$name = $_GET['name'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];

	$q = mysqli_query($mycon,"INSERT INTO agent(name,address,contact) VALUES('$name','$address','$contact') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>