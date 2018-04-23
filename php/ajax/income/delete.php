<?php 

	require '../../connection.php';

	$income_id = $_GET['income_id'];

	$q = mysqli_query($mycon,'UPDATE income SET status=0 WHERE income_id='.$income_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>