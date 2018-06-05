<?php

require '../../connection.php';

$n=0;
$json=NULL;
$sql='';
$termid =$_GET['id'];
$term = 'short_form';
$stermid=NULL;


if( $termid=='agent_id' )
{
	$term = 'name';
	$sql = " SELECT agent_id,name from agent where status=1 ORDER BY agent_id DESC ";
}

else if( $termid=='coa_id' )
{	
	$sql = " SELECT coa_id,short_form from chart_of_account where status=1 ORDER BY coa_id DESC";
}
else if( $termid=='consignee_id' )
{
	$sql = " SELECT consignee_id,short_form from consignee where status=1 ORDER BY consignee_id DESC";
}
else if( $termid=='empty_terminal_id' || $termid=='from_yard_id' || $termid=='to_yard_id'  )
{
	$stermid = 'yard_id';
	$sql = " SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC";
}

else if( $termid=='line_id' )
{
	$sql = " SELECT line_id,short_form from line where status=1 ORDER BY line_id DESC ";
}
else if ( $termid=='vehicle_id' ) 
{
	$term = 'vehicle_number';
	$sql = " SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC ";
}
else if ( $termid=='owner_name' ) 
{
	$term = 'owner_name';
	$sql = " SELECT owner_name from vehicle where status=1 GROUP BY owner_name ";
}
else if ( $termid=='dd_id' || $termid=='idd_id' ) 
{
	$stermid = 'dd_id';
	$term = 'name';
	$sql = " SELECT dd_id,name from daily_description where status=1 and dd_id!=6 and dd_id!=7 ORDER BY dd_id DESC ";
}
else if ( $termid=='bank_id' || $termid=='ibank_id') 
{
	$stermid = 'bank_id';
	$sql = " SELECT bank_id,short_form from bank where status=1 ORDER BY bank_id DESC ";
}
else if ( $termid=='bike_id' ) 
{
	$term = 'bike_number';
	$sql = " SELECT bike_id,bike_number from bike where status=1 ORDER BY bike_id DESC ";
}
else if ( $termid=='cmp_id' ) 
{
	$term = 'name';
	$sql = " SELECT * from company where status=1 ORDER BY cmp_id DESC ";
}
else if ( $termid=='dg_id' ) 
{
	$term = 'designation';
	$sql = " SELECT * FROM designation WHERE status=1 ";
}
else
{
	$term = 'type';
	$sql = " SELECT container_id,type from container where status=1 ORDER BY container_id DESC ";	
}

$q = mysqli_query($mycon,$sql);

while( $r = mysqli_fetch_array($q) )
{
	if($stermid !=NULL)
	{
		$json[$n][$stermid] = $r[$stermid]; 
	}
	else
	{
		$json[$n][$termid] = $r[$termid]; 
	}

	$json[$n][$term] = $r[$term]; 

	$n++;
}

echo json_encode($json);

?>