<?php 

	require '../../connection.php';

	$container_id = $_GET['container_id'];

	$q = mysqli_query($mycon,'UPDATE container SET status=0 WHERE container_id='.$container_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>