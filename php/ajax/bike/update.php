<?php 

	require '../../connection.php';
	
	$bike_id = $_GET['bike_id'];
	$bike_number = $_GET['bike_number'];

	$q = mysqli_query($mycon,"UPDATE bike SET bike_number='$bike_number' WHERE bike_id=$bike_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>