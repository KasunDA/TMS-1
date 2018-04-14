<?php 

	require '../../connection.php';

	$bank_id = $_GET['bank_id'];

	$q = mysqli_query($mycon,'UPDATE bank SET status=0 WHERE bank_id='.$bank_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>