<?php

require '../../connection.php';
$json = NULL;

$q = mysqli_query($mycon,' SELECT ce_id from container_entry ORDER BY ce_id DESC limit 1 ');

if( $r = mysqli_fetch_array($q) )
	$json['ce_id'] = $r['ce_id']+1;
else
	$json['ce_id'] = 1;

echo json_encode($json);

?>