<?php 

require '../../connection.php';
$json   = NULL;
$sql    = "";
$isql   = "";
$cmp_id =  $_GET['cmp_id'];


$sql  = "SELECT SUM(amount) AS total_taken_amount FROM  income where status=1 AND dd_id=2  AND cmp_id=".$cmp_id;

$isql = "SELECT SUM(amount) as total_given_amount FROM expenses where status=1 AND dd_id=2  AND cmp_id=".$cmp_id;


$q = mysqli_query($mycon,$sql);

if ( $r = mysqli_fetch_array($q) ) 
{
	$json['total_taken_amount'] = $r['total_taken_amount'];
}


$q1 = mysqli_query($mycon,$isql);

if ( $r1 = mysqli_fetch_array($q1) ) 
{
	$json['total_given_amount'] = $r1['total_given_amount'];
}

$json['amount'] =  $json['total_taken_amount'] - $json['total_given_amount'];

echo json_encode($json);
?>