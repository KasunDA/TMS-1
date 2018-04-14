<?php 

	require '../../connection.php';

	$vehicle_id = $_GET['vehicle_id'];

	$q = mysqli_query($mycon,'UPDATE vehicle SET status=0 WHERE vehicle_id='.$vehicle_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>