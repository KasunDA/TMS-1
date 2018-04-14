<?php 

	require '../../connection.php';
	
	$line_id = $_GET['line_id'];
	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];

	$q = mysqli_query($mycon,"UPDATE line SET short_form='$short_form', full_form = '$full_form' WHERE line_id=$line_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>