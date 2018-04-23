<?php 

	require '../../connection.php';

	$owner_name = $_GET['owner_name'];
	$vehicle_number = $_GET['vehicle_number'];
	$engine_number= $_GET['engine_number'];
	$chassis_number = $_GET['chassis_number'];
	$driver_name = $_GET['driver_name'];
	
	$q = mysqli_query($mycon,"INSERT INTO vehicle(owner_name,vehicle_number,engine_number,chassis_number,driver_name) VALUES('$owner_name','$vehicle_number','$engine_number','$chassis_number','$driver_name') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>