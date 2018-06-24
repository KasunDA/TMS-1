<?php 

	require '../../connection.php';
	
	$borrower_id = $_GET['borrower_id'];
	$name = $_GET['name'];

	$q = mysqli_query($mycon,"UPDATE borrower SET name='$name' WHERE borrower_id=$borrower_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>