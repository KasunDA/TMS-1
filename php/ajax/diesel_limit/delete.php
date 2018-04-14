<?php 

	require '../../connection.php';

	$dl_id = $_GET['dl_id'];

	$q = mysqli_query($mycon,'UPDATE diesel_limit SET status=0 WHERE dl_id='.$dl_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>