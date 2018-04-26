<?php 

	require '../../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$json=NULL;
	$date = date('m/d/Y');
	// and datee='".$date."'

	// $json['total_credit'] = "";
	// $json['total_debit'] = "";

	$q = mysqli_query($mycon,"Select SUM(amount) as total_credit from accounts_entry where status =1 and action = 'credit' and datee='".$date."'");

	while($r = mysqli_fetch_array($q))
	{	
		$json[0]['total_credit'] = $r['total_credit'];
	}

	$q = mysqli_query($mycon,"Select SUM(amount) as total_debit from accounts_entry where status =1 and action = 'debit' and datee='".$date."' ");

	while($r = mysqli_fetch_array($q))
	{	
		$json[0]['total_debit'] = $r['total_debit'];
	}

	echo json_encode($json);

?>