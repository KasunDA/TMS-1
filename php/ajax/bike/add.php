<?php 

	require '../../connection.php';

	$bike_number = $_GET['bike_number'];
	
	$q = mysqli_query($mycon,"INSERT INTO bike(bike_number) VALUES('$bike_number') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>