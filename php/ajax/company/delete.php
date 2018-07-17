<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$cmp_id = $_POST['cmp_id'];

	$q = mysqli_query($mycon,'UPDATE company SET status=0 WHERE cmp_id='.$cmp_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>