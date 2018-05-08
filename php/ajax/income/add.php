<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$dd_id = $_GET['dd_id'];
	$method = $_GET['method'];
	$amount = $_GET['amount'];
	$description = $_GET['description'];


	if( isset($_GET['cmp_id']) && $_GET['cmp_id'] != NULL  )
	{
		$cmp_id = $_GET['cmp_id'];
	}
	else
	{
		$cmp_id = 'null';	
	}

	if(  isset($_GET['check_number']) &&  isset($_GET['bank_id']) && $_GET['check_number'] != NULL && $_GET['bank_id'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	
	}
	else
	{
		$check_number = NULL;
		$bank_id = 'null';
	}

	$sql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, cmp_id, description) VALUES ( '$datee' , $dd_id, '$method', '$check_number', $bank_id, $amount, $cmp_id ,'$description' ) ";
	
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