<?php 

	require '../../connection.php';

	$borrower_id = $_GET['borrower_id'];

	$q = mysqli_query($mycon,'UPDATE borrower SET status=0 WHERE borrower_id='.$borrower_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>