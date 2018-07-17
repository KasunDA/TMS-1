<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$coa_id = $_POST['coa_id'];

	$q = mysqli_query($mycon,'UPDATE chart_of_account SET status=0 WHERE coa_id='.$coa_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);
?>