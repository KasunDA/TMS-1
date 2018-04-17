<?php 

	require '../../connection.php';

	$ge_id = $_GET['ge_id'];

	$q = mysqli_query($mycon,'UPDATE garage_entry SET status=0 WHERE ge_id='.$ge_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>