<?php 

	require '../../connection.php';

	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];

	
	$q = mysqli_query($mycon,"INSERT INTO line(short_form,full_form) VALUES('$short_form','$full_form') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>