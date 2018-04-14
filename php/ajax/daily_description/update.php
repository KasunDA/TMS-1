<?php 

	require '../../connection.php';
	
	$dd_id = $_GET['dd_id'];
	$name = $_GET['name'];

	$q = mysqli_query($mycon,"UPDATE daily_description SET name='$name' WHERE dd_id=$dd_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>