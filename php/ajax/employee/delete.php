<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$employee_id 	 = $_POST['employee_id'];

	$q = mysqli_query($mycon,'UPDATE employee SET status=0 WHERE employee_id='.$employee_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>