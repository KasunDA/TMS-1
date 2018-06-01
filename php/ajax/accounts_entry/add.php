<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$bank_id = $_GET['bank_id'];
	$action = $_GET['action'];
	$method = $_GET['method'];
	$amount = $_GET['amount'];
	$check_number = $_GET['check_number'];
	$current_balance=0;
	$previous_balance=0;
	$description = ($_GET['description']!=NULL?$_GET['description']:'NILL');


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


	if( $action == 'debit' )
    {
        $current_balance = $previous_balance - $amount;
    }
    else
    {
     	$current_balance = $previous_balance + $amount;   
    }
	
	$q = mysqli_query($mycon,"INSERT INTO accounts_entry(datee,bank_id,action,method,amount,check_number,previous_balance,current_balance,description ) VALUES('$datee',$bank_id,'$action','$method',$amount,'$check_number',$previous_balance,$current_balance, '$description') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>