<?php 

	require '../../connection.php';

	$login_id = $_GET['login_id'];

	$q = mysqli_query($mycon,'UPDATE login SET status=0 WHERE login_id='.$login_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>