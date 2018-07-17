<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$borrower_id = $_POST['borrower_id'];

	$q = mysqli_query($mycon,'UPDATE borrower SET status=0 WHERE borrower_id='.$borrower_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>