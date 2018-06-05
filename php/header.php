<?php
@ob_start();
session_start();
if(!isset($_SESSION['login_id']) && !isset($_SESSION['username']) )
{
    echo '<script> location.assign("../index.php") </script>';      
} 
// echo '<script>alert("'.basename($_SERVER['PHP_SELF']).'")</script>';

if ( $_SESSION['role'] == 'reporting' )
{
    if( basename($_SERVER['PHP_SELF']) != 'recivePartyPayment.php' && basename($_SERVER['PHP_SELF']) != 'report-vehicle.php' && basename($_SERVER['PHP_SELF']) != 'report-vehicle-voucher.php' && basename($_SERVER['PHP_SELF']) != 'recivePartyPaymentSingle.php'  )
    {
        echo '<script> location.assign("recivePartyPayment.php") </script>';     
    }
}

if ( $_SESSION['role'] != 'admin' )
{
    // || basename($_SERVER['PHP_SELF']) == 'employees.php'
    
    if( basename($_SERVER['PHP_SELF']) == 'user.php'  )
    {
        echo '<script> location.assign("container-entry.php") </script>';     
    }
}
?>
<!DOCTYPE html>
<!-- 
Template Name: Logic Saint | Transport Managment System
Version: 0.0.1
Author: UKK Software House
Website: http://www.logicsaint.com/
Contact: info@logicsaint.com
Like: www.facebook.com/logicsaint
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>TMS | Logic Saint</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../assets/global/css/jquery-ui-git.css">
        <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/style.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
    
    <link href="../assets/global/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .selectedd
        {
            background-color: #000;
            /*color: #fff;*/
        }

        .select {
            background-color: white;
            border: 1px solid #cacaca;
            border-radius: 1px;
            cursor: text;
            /*padding-top: 3px;*/
        }

        #message {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            margin-top: 55px;
        }
        #inner-message {
            margin: 0 auto;
        }
    </style>

    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md page-sidebar-closed">