<?php 

	require '../../connection.php';

	$employee_id = $_GET['employee_id'];

	$q = mysqli_query($mycon,'UPDATE employee SET status=0 WHERE employee_id='.$employee_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>