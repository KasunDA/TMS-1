<?php 

	require '../../connection.php';
	
	$json['updated'] = 'false';
	$exin_id 	  	 = $_POST['exin_id'];
	$datee 			 = $_POST['datee'];

	$sql = "UPDATE exin SET datee='$datee' WHERE exin_id=".$exin_id;
	$q = mysqli_query($mycon,$sql);
	if(mysqli_affected_rows($mycon))
		$json['updated'] = 'true';

	echo json_encode($json);
?>