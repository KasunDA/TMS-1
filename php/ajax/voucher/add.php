<?php 

	require '../../connection.php';

	$sql = '';
	$isql = '';
	$cm_id = $_GET['cm_id'];
	$datee = $_GET['datee'];
	$method = $_GET['method'];
	
	$amount = $_GET['amount'];

	$description = 'Party Payment Received.';
	
	if( $_GET['bank_id'] != NULL && $_GET['check_number'] != NULL  )
	{
		$check_number = $_GET['check_number'];
		$bank_id = $_GET['bank_id'];	

		$sql = "INSERT INTO voucher(datee, method, check_number, bank_id, amount, cm_id) VALUES ( '$datee' , '$method', '".$check_number."' , ".$bank_id.", $amount, $cm_id ) ";

		$isql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, description) VALUES ( '$datee' , 6, '$method', '$check_number', $bank_id, $amount ,'$description' ) ";
	}
	else
	{
		$sql = "INSERT INTO voucher(datee, method, amount, cm_id) VALUES ( '$datee' , '$method', $amount, $cm_id ) ";

		$isql = "INSERT INTO income(datee, dd_id, method, amount, description) VALUES ( '$datee' , 6, '$method', $amount ,'$description' ) ";
	}


	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		//Income Code 
	
		$income_q = mysqli_query($mycon,$isql);

		// $income_id_q = mysqli_query($mycon,'SELECT income_id from income ORDER BY income_id DESC limit 1');
		// $r_income_id = mysqli_fetch_array($income_id_q);

		// //Previous Balance from exin Table
		// $previous_balance_q = mysqli_query($mycon,'SELECT current_balance from exin ORDER BY exin_id DESC limit 1');
		// $r_previous_balance = mysqli_fetch_array($previous_balance_q);
	
		// $income_id = $r_income_id['income_id'];
		// $previous_balance = $r_previous_balance['current_balance'];
		// $current_balance = $previous_balance + $amount;

		// $q1 = mysqli_query($mycon,"INSERT INTO exin (income_id, datee, previous_balance, current_balance) VALUES ($income_id,'$datee',$previous_balance,$current_balance) ");


		if($method == 'check')
		{
			//Expense Code
			$sql = "INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, description) VALUES ( '$datee' , 6, '$method', '".$check_number."' , ".$bank_id.", $amount ,'$description' ) ";

			$expense_q = mysqli_query($mycon,$sql);

			// $expense_id_q = mysqli_query($mycon,'SELECT expense_id from expenses ORDER BY expense_id DESC limit 1');
			// $r_expense_id = mysqli_fetch_array($expense_id_q);

			// //Previous Balance from exin Table
			// $previous_balance_q = mysqli_query($mycon,'SELECT current_balance from exin ORDER BY exin_id DESC limit 1');
			// $r_previous_balance = mysqli_fetch_array($previous_balance_q);


			// $expense_id = $r_expense_id['expense_id'];
			// $previous_balance = $r_previous_balance['current_balance'];
			// $current_balance = $previous_balance - $amount;

			// $q1 = mysqli_query($mycon,"INSERT INTO exin (expense_id, datee, previous_balance, current_balance) VALUES ($expense_id,'$datee',$previous_balance,$current_balance) ");


			//Account Code
			$action = 'credit';
			$current_balance=0;
			$previous_balance=0;

			$aq = mysqli_query($mycon,'SELECT current_balance from accounts_entry where bank_id='.$bank_id.' ORDER BY ae_id DESC limit 1');

			if ( $raq = mysqli_fetch_array($aq) )
			{
				$previous_balance = $raq['current_balance'];
			}
			else
			{
				$bq = mysqli_query($mycon,'SELECT balance from bank where bank_id='.$bank_id);
				$rbq = mysqli_fetch_array($bq);

				$previous_balance = $rbq['balance'];	
			}


    	 	$current_balance = $previous_balance + $amount;  

    	 	$date = date('m/d/Y',strtotime($datee)); //05/08/2018 
	
			$q = mysqli_query($mycon,"INSERT INTO accounts_entry(datee,bank_id,action,method,amount,check_number,previous_balance,current_balance) VALUES('$date',$bank_id,'$action','$method',$amount,'$check_number',$previous_balance,$current_balance) ");
		}


		$cm_update_q = mysqli_query($mycon,"UPDATE container_movement SET paid_status=1 WHERE cm_id=$cm_id");
		
		if(mysqli_affected_rows($mycon))
		{
			echo "true";
		}
	}

?>