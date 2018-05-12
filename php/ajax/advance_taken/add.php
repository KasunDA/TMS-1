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

// echo '<script>alert("'.$sql.'")</script>';

	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		$expense_id_q = mysqli_query($mycon,'SELECT expense_id from expenses ORDER BY expense_id DESC limit 1');
		$r_expense_id = mysqli_fetch_array($expense_id_q);

		$previous_balance_q = mysqli_query($mycon,'SELECT current_balance from exin ORDER BY exin_id DESC limit 1');
		$r_previous_balance = mysqli_fetch_array($previous_balance_q);

		$expense_id = $r_expense_id['expense_id'];
		$previous_balance = $r_previous_balance['current_balance'];
		$current_balance = $previous_balance - $amount;

		$q1 = mysqli_query($mycon,"INSERT INTO exin (expense_id, datee, previous_balance, current_balance) VALUES ($expense_id,'$datee',$previous_balance,$current_balance) ");
		
		if(mysqli_affected_rows($mycon))
		{
			echo "true";
		}
	}
?>