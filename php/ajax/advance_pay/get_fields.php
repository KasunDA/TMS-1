<?php 

require '../../connection.php';
$json  = NULL;
$sql   = "";
$isql  = "";

$name =  $_GET['name'];

if( $_GET['vehicle_id'] != NULL && $_GET['vehicle_id'] != 0   )
{
	$vehicle_id =  $_GET['vehicle_id'];
	$sql = "SELECT SUM(amount) as  total_given_amount FROM expenses where dd_id=2  AND status=1 AND vehicle_id=".$vehicle_id." and name='".$name."'";

	$isql = "SELECT SUM(amount) as total_taken_amount FROM income where dd_id=2 AND  status=1 AND vehicle_id=".$vehicle_id." and name='".$name."'";
}
else
{
	$borrower_id =  $_GET['borrower_id'];
	$sql = "SELECT SUM(amount) as total_given_amount FROM expenses where dd_id=2 AND status=1 AND borrower_id=".$borrower_id;

	$isql = "SELECT SUM(amount) as total_taken_amount  FROM income where dd_id=2 AND status=1 AND borrower_id=".$borrower_id;	
}

$q = mysqli_query($mycon,$sql);

if ( $r = mysqli_fetch_array($q) ) 
{
	$json['total_given_amount'] = $r['total_given_amount'];
}


$q1 = mysqli_query($mycon,$isql);

if ( $r1 = mysqli_fetch_array($q1) ) 
{
	$json['total_taken_amount'] = $r1['total_taken_amount'];
}

$json['amount'] =  $json['total_given_amount'] - $json['total_taken_amount'];

echo json_encode($json);
?>