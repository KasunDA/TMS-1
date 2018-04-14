<?php 

	require '../../connection.php';
	
	$vehicle_id = $_GET['vehicle_id'];
	$owner_name = $_GET['owner_name'];
	$vehicle_number = $_GET['vehicle_number'];
	$engine_number= $_GET['engine_number'];
	$chassis_number = $_GET['chassis_number'];


	$q = mysqli_query($mycon,"UPDATE vehicle SET owner_name='$owner_name', vehicle_number = '$vehicle_number' , engine_number = '$engine_number' , chassis_number= '$chassis_number'  WHERE vehicle_id=$vehicle_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>