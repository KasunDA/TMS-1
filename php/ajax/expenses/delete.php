<?php 

	require '../../connection.php';

	$expense_id = $_GET['expense_id'];

	$q = mysqli_query($mycon,'UPDATE expenses SET status=0 WHERE expense_id='.$expense_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>