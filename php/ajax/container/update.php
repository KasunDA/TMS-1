<?php 

	require '../../connection.php';
	
	$container_id = $_GET['container_id'];
	$type = $_GET['type'];

	$q = mysqli_query($mycon,"UPDATE container SET type='$type' WHERE container_id=$container_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>