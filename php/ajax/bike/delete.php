<?php 

	require '../../connection.php';

	$bike_id = $_GET['bike_id'];

	$q = mysqli_query($mycon,'UPDATE bike SET status=0 WHERE bike_id='.$bike_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>