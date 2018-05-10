<?php

require '../../connection.php';
$json = NULL;

$q = mysqli_query($mycon,' SELECT voucher_number from voucher ORDER BY voucher_number DESC limit 1 ');

if( $r = mysqli_fetch_array($q) )
{
	$json['voucher_number'] = $r['voucher_number']+1;
}
else
{
	$json['voucher_number'] = 1;
}

echo json_encode($json);

?>