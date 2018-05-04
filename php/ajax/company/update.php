<?php 

	require '../../connection.php';
	
	$cmp_id = $_GET['cmp_id'];
	$name = $_GET['name'];

	$q = mysqli_query($mycon,"UPDATE company SET name='$name' WHERE cmp_id=$cmp_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>