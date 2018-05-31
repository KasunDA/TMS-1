<?php 

	require '../../connection.php';
	
	$dg_id = $_GET['dg_id'];
	$designation = $_GET['designation'];

	$q = mysqli_query($mycon,"UPDATE designation SET designation='$designation' WHERE dg_id=$dg_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>