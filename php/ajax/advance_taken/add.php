<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = 2;
	$method = $_GET['method'];
	
	
	if( isset($_GET['bank_id']) && isset($_GET['check_number']) && $_GET['bank_id'] != NULL && $_GET['check_number'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	
	}
	else
	{
		$check_number = NULL;
		$bank_id = 'null';

	}
		//echo '<script>alert("check_number is : '.$check_number.' and bank_id is : '.$bank_id.'")</script>';

	$amount = $_GET['amount'];

	$cmp_id = $_GET['cmp_id'];
	
	if( $_GET['description'] != NULL )	
	{
		$description = $_GET['description'];
	}
	else
	{
		$description = NULL;	
	}


	$sql = "INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, cmp_id ,description) VALUES ( '$datee' , $dd_id, '$method', '".$check_number."' , ".$bank_id.", $amount, $cmp_id,'".$description."' ) ";

echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>