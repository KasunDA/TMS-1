<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$cm_id 			 = $_POST['cm_id'];

	$q = mysqli_query($mycon,'UPDATE container_movement SET status=0 WHERE cm_id='.$cm_id);

	if(mysqli_affected_rows($mycon))
	{
		$json['deleted'] = 'true';

		session_start();
		$_SESSION['cm_id'] = "";
		$_SESSION['lot_of'] = "";
	}

	echo json_encode($json);

?>