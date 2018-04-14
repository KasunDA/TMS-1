<?php 

	require '../../connection.php';

	$dd_id = $_GET['dd_id'];

	$q = mysqli_query($mycon,'UPDATE daily_description SET status=0 WHERE dd_id='.$dd_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>