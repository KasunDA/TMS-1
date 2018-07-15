<?php 

	require '../../connection.php';

	function updateStatus($mycon,$ce_id,$voucher_number)
	{
		$q = mysqli_query($mycon,'UPDATE container_entry SET paid_status=1 , voucher_number='.$voucher_number.' WHERE ce_id='.$ce_id);
		if ( mysqli_affected_rows($mycon) )
			return true;
	}

	$json['inserted'] = 'false';
	$sql  = '';
	$isql = '';
	$vehicle_number  = str_replace( str_split("[]"),"",$_POST['vehicle_number']);
	$datee 		 	 = $_POST['datee'];
	$method 	 	 = $_POST['method'];
	$amount 	     = $_POST['amount'];
	$description 	 = $_POST['description'];
	$ce_ids 	 	 = json_decode($_POST['ce_ids']);
	
	
	if( $_POST['bank_id'] != NULL && $_POST['check_number'] != NULL  )
	{
		$check_number = $_POST['check_number'];
		$bank_id  	  = $_POST['bank_id'];	

		$sql = "INSERT INTO voucher(datee, method, check_number, bank_id, amount, vehicle_number) VALUES ( '$datee' , '$method', '".$check_number."' , ".$bank_id.", $amount, '$vehicle_number' ) ";

		$isql = "INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, description) VALUES ( '$datee' , 7, '$method', '".$check_number."' , ".$bank_id.", $amount ,'$description' ) ";
	}
	else
	{
		$sql  = "INSERT INTO voucher(datee, method, amount, vehicle_number) VALUES ( '$datee' , '$method', $amount, '$vehicle_number' ) ";

		$isql = "INSERT INTO expenses(datee, dd_id, method, amount, description) VALUES ( '$datee' , 7, '$method', $amount ,'$description' ) ";
	}

	$q = mysqli_query($mycon,$sql);
	if(mysqli_affected_rows($mycon))
	{
		$vnq  = mysqli_query($mycon,'SELECT voucher_number from voucher ORDER BY voucher_number DESC LIMIT 1');
		if ( $rvnq = mysqli_fetch_array($vnq) )
			$voucher_number = $rvnq['voucher_number'];
		
		if($method == 'check')
		{
			//Account Code
			$action = 'debit';
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

    	 	$current_balance = $previous_balance - $amount;  
    	 	$date = date('m/d/Y',strtotime($datee)); //05/08/2018 
			$q = mysqli_query($mycon,"INSERT INTO accounts_entry(datee,bank_id,action,method,amount,check_number,previous_balance,current_balance) VALUES('$date',$bank_id,'$action','$method',$amount,'$check_number',$previous_balance,$current_balance) ");

			//Income Code 
			$sql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, description) VALUES ( '$datee' , 7, '$method', '$check_number', $bank_id, $amount ,'$description' ) ";

			$income_q = mysqli_query($mycon,$sql);

			$income_id_q = mysqli_query($mycon,'SELECT income_id from income ORDER BY income_id DESC limit 1');
			$r_income_id = mysqli_fetch_array($income_id_q);

			//Previous Balance from exin Table
			$previous_balance_q = mysqli_query($mycon," SELECT exin_id,datee,current_balance FROM exin WHERE datee<='$datee' ORDER BY exin_id DESC , datee limit 1 ");
			$r_previous_balance = mysqli_fetch_array($previous_balance_q);
		
			$income_id = $r_income_id['income_id'];
			$previous_balance = $r_previous_balance['current_balance'];
			$current_balance = $previous_balance + $amount;

			$q1 = mysqli_query($mycon,"INSERT INTO exin (income_id, datee, previous_balance, current_balance) VALUES ($income_id,'$datee',$previous_balance,$current_balance) ");
		}

		//Expense Code
		$expense_q 	  = mysqli_query($mycon,$isql);
		$expense_id_q = mysqli_query($mycon,'SELECT expense_id from expenses ORDER BY expense_id DESC limit 1');
		$r_expense_id = mysqli_fetch_array($expense_id_q);

		//Previous Balance from exin Table
		$previous_balance_q = mysqli_query($mycon,"SELECT exin_id,datee,current_balance FROM exin WHERE datee<='$datee' ORDER BY exin_id DESC , datee limit 1 ");
		$r_previous_balance = mysqli_fetch_array($previous_balance_q);

		$expense_id 	  = $r_expense_id['expense_id'];
		$previous_balance = $r_previous_balance['current_balance'];
		$current_balance  = $previous_balance - $amount;

		$q1 = mysqli_query($mycon,"INSERT INTO exin (expense_id, datee, previous_balance, current_balance) VALUES ($expense_id,'$datee',$previous_balance,$current_balance) ");

		// $cm_update_q = mysqli_query($mycon,"UPDATE container_movement SET paid_status=1 WHERE vehicle_id=$vehicle_id");
		
		if(mysqli_affected_rows($mycon))
		{
			$json['inserted'] = 'true';

			$l = count($ce_ids);
			for ($i=0; $i < $l ; $i++) { 
					updateStatus($mycon,$ce_ids[$i],$voucher_number);
				}	
		}
	}

	echo json_encode($json);
?>