<?php 

	require '../../connection.php';

	$driver_id = $_GET['driver_id'];

	$q = mysqli_query($mycon,'UPDATE driver SET status=0 WHERE driver_id='.$driver_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>