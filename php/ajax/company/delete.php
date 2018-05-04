<?php 

	require '../../connection.php';

	$cmp_id = $_GET['cmp_id'];

	$q = mysqli_query($mycon,'UPDATE company SET status=0 WHERE cmp_id='.$cmp_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>