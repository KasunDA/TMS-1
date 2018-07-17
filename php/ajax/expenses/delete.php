<?php 

	require '../../connection.php';

	$json['deleted']  = 'false';
	$expense_id 	  = $_POST['expense_id'];

	$q = mysqli_query($mycon,'UPDATE expenses SET status=0 WHERE expense_id='.$expense_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";
	
	echo json_encode($json);
?>