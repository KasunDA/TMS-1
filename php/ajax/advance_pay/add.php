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

	$vehicle_id = $_GET['vehicle_id'];
	
	$name = $_GET['name'];
	
	
	if( $_GET['description'] != NULL )	
	{
		$description = $_GET['description'];
	}
	else
	{
		$description = NULL;	
	}


	$sql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, vehicle_id,name, description) VALUES ( '$datee' , $dd_id, '$method', '".$check_number."' , ".$bank_id.", $amount, $vehicle_id, '$name','".$description."' ) ";

// echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		$income_id_q = mysqli_query($mycon,'SELECT income_id from income ORDER BY income_id DESC limit 1');
		$r_income_id = mysqli_fetch_array($income_id_q);

		$previous_balance_q = mysqli_query($mycon,'SELECT current_balance from exin ORDER BY exin_id DESC limit 1');
		$r_previous_balance = mysqli_fetch_array($previous_balance_q);

		$income_id = $r_income_id['income_id'];
		$previous_balance = $r_previous_balance['current_balance'];
		$current_balance = $previous_balance + $amount;

		$q1 = mysqli_query($mycon,"INSERT INTO exin (income_id, datee, previous_balance, current_balance) VALUES ($income_id,'$datee',$previous_balance,$current_balance) ");
		
		if(mysqli_affected_rows($mycon))
		{
			echo "true";
		}
	}

?>