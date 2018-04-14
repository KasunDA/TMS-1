<?php 

	require '../../connection.php';

	$type = $_GET['type'];
	
	$q = mysqli_query($mycon,"INSERT INTO container(type) VALUES('$type') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>