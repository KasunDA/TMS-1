<?php 

	require '../../connection.php';

	$line_id = $_GET['line_id'];

	$q = mysqli_query($mycon,'UPDATE line SET status=0 WHERE line_id='.$line_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>