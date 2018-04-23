<?php 

	require '../../connection.php';

	$cm_id = $_GET['cm_id'];

	$q = mysqli_query($mycon,'UPDATE container_movement SET status=0 WHERE cm_id='.$cm_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";

		session_start();

		$_SESSION['cm_id'] = "";
		$_SESSION['lot_of'] = "";

	}

?>