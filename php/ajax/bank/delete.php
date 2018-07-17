<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$bank_id = $_POST['bank_id'];

	$q = mysqli_query($mycon,'UPDATE bank SET status=0 WHERE bank_id='.$bank_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>