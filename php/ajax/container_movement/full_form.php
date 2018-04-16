<?php

require '../../connection.php';

$url='';

if( isset( $_GET['coa_id'] ) &&  $_GET['coa_id']!=NULL )
{
	$coa_id = $_GET['coa_id'];
	$url = " SELECT full_form from chart_of_account where coa_id=$coa_id";
}
else if( isset( $_GET['consignee_id'] ) &&  $_GET['consignee_id']!=NULL )
{
	$consignee_id = $_GET['consignee_id'];
	$url = " SELECT full_form from consignee where consignee_id=$consignee_id";
}
else if( isset( $_GET['empty_terminal_id'] ) &&  $_GET['empty_terminal_id']!=NULL )
{
	$yard_id = $_GET['empty_terminal_id'];
	$url = " SELECT full_form from yard where yard_id=$yard_id";
}
else if( isset( $_GET['from_yard_id'] ) &&  $_GET['from_yard_id']!=NULL )
{
	$yard_id = $_GET['from_yard_id'];
	$url = " SELECT full_form from yard where yard_id=$yard_id";
}
else if( isset( $_GET['to_yard_id'] ) &&  $_GET['to_yard_id']!=NULL )
{
	$yard_id = $_GET['to_yard_id'];
	$url = " SELECT full_form from yard where yard_id=$yard_id";
}
else if( isset( $_GET['line_id'] ) &&  $_GET['line_id']!=NULL )
{
	$line_id = $_GET['line_id'];
	$url = " SELECT full_form from line where line_id=$line_id";
}
else
{
	$vehicle_id = $_GET['vehicle_id'];
	$url = " SELECT owner_name from vehicle where vehicle_id=$vehicle_id";
}

$q = mysqli_query($mycon,$url);

if( $r = mysqli_fetch_array($q) )
{
	$json['val'] = $r[0]; 
}

echo json_encode($json);

?>