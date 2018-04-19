<?php 

	require '../../connection.php';

	$ae_id = $_GET['ae_id'];

	$q = mysqli_query($mycon,'UPDATE accounts_entry SET status=0 WHERE ae_id='.$ae_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>