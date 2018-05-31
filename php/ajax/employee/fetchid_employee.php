<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT employee_id FROM employee  ORDER BY employee_id DESC limit 1 ');
	$r = mysqli_fetch_array($q);

	$json['employee_id'] = $r['employee_id']+1;  
	

	echo json_encode($json);

?>