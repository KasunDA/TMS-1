<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$description = $_GET['description'];
	$vehicle_id = $_GET['vehicle_id'];
	$amount = $_GET['amount'];
	
	$q = mysqli_query($mycon,"INSERT INTO garage_entry(datee,description,vehicle_id,amount) VALUES('$datee','$description',$vehicle_id,$amount) ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>