<?php 

	require '../../connection.php';
	
	$ge_id = $_GET['ge_id'];
	$datee = $_GET['datee'];
	$description = $_GET['description'];
	$vehicle_id = $_GET['vehicle_id'];
	$amount = $_GET['amount'];

	$q = mysqli_query($mycon,"UPDATE garage_entry SET datee='$datee' , description='$description', vehicle_id=$vehicle_id , amount=$amount WHERE ge_id=$ge_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>