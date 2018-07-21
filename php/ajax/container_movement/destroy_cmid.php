<?php 

session_start();

$_SESSION['cm_id'] = "";
$_SESSION['lot_of'] = "";
$_SESSION['datee'] = "";
$_SESSION['agent_id'] = "";
$_SESSION['coa_id'] = "";
$_SESSION['consignee_id'] = "";
$_SESSION['movement'] = "";
$_SESSION['empty_terminal_id'] = "";
$_SESSION['from_yard_id'] = "";
$_SESSION['to_yard_id'] = "";
$_SESSION['container_size'] = "";
$_SESSION['party_charges'] = "";
$_SESSION['line_id'] = "";
$_SESSION['bl_cro_number'] = "";
$_SESSION['job_number'] = "";
$_SESSION['index_number'] = "";
$_SESSION['container_id'] = "";
$_SESSION['lolo_charges'] = "";
$_SESSION['weight_charges'] = "";
$_SESSION['advance_charges'] = "";

echo "<script>location.assign('../../container-entry.php');</script>";

?>