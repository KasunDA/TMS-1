<?php 

	require '../../connection.php';

	$yard_id = $_GET['yard_id'];

	$q = mysqli_query($mycon,'UPDATE yard SET status=0 WHERE yard_id='.$yard_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>