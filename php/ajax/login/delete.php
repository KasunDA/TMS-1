<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$login_id 		 = $_POST['login_id'];

	$q = mysqli_query($mycon,'UPDATE login SET status=0 WHERE login_id='.$login_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>