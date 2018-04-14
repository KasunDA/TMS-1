<?php 

	require '../../connection.php';

	$owner_name = $_GET['owner_name'];
	$vehicle_number = $_GET['vehicle_number'];
	$engine_number= $_GET['engine_number'];
	$chassis_number = $_GET['chassis_number'];
	
	$q = mysqli_query($mycon,"INSERT INTO vehicle(owner_name,vehicle_number,engine_number,chassis_number) VALUES('$owner_name','$vehicle_number','$engine_number','$chassis_number') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>