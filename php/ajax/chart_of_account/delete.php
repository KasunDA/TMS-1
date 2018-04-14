<?php 

	require '../../connection.php';

	$coa_id = $_GET['coa_id'];

	$q = mysqli_query($mycon,'UPDATE chart_of_account SET status=0 WHERE coa_id='.$coa_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>