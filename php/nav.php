<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.php" class="logo-default set-logo"> Butt Brothers</a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                   
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile" style="text-transform: capitalize;"> <?php echo $_SESSION['name']; ?></span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="../assets/layouts/layout4/img/avatar.png" /> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <!-- <li>
                                <a href="#">
                                    <i class="icon-user"></i> My Profile </a>
                            </li> -->
                            <li>
                                <a href="logout.php">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- <li class="nav-item start active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li> 
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">Container Entry</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="container-entry.php" class="nav-link ">
                                <span class="title">Entry 1</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="container-entry2.php" class="nav-link ">
                                <span class="title">Entry 2</span>
                            </a>
                        </li>
                       
                    </ul>
                </li> -->
<!--                 <li class="heading">
                    <h3 class="uppercase">Definations</h3>
                </li> -->
                <?php
                    // session_start();

                    if($_SESSION['role'] == 'reporting')
                    {?>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pie-chart"></i>
                                <span class="title">Reports</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
                                <li class="nav-item  ">
                                    <a href="report-vehicle.php" class="nav-link ">
                                        <span class="title">Vehicle Report</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="report-vehicle-voucher.php" class="nav-link ">
                                        <span class="title">Voucher Vehicle Report</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="recivePartyPayment.php" class="nav-link ">
                                        <span class="title">Receive Party Payment</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php   } 
                    else{?>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-database"></i>
                                <span class="title">Definitions</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="Chart_Of_Account.php" class="nav-link ">
                                        <span class="title">Chart Of Account</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="clearingAgent.php" class="nav-link ">
                                        <span class="title">Clearing Agent</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="container_type.php" class="nav-link ">
                                        <span class="title">Container Type</span>
                                    </a>
                                </li>
                             
                                <li class="nav-item  ">
                                    <a href="Vechile.php" class="nav-link ">
                                        <span class="title">Vehicle</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="bike.php" class="nav-link ">
                                        <span class="title">Bike</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="Yard.php" class="nav-link ">
                                        <span class="title">Destination</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="line.php" class="nav-link ">
                                        <span class="title">Line</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="consignee.php" class="nav-link ">
                                        <span class="title">Consignee</span>
                                    </a>
                                </li>
                                 
                                <li class="nav-item  ">
                                    <a href="dailyDisc.php" class="nav-link ">
                                        <span class="title">Daily description</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="company.php" class="nav-link ">
                                        <span class="title">Company</span>
                                    </a>
                                </li>
                               <li class="nav-item  ">
                                   <a href="Banks.php" class="nav-link ">
                                       <span class="title">Banks</span>
                                   </a>
                               </li>
                               <li class="nav-item  ">
                                   <a href="dieselLimite.php" class="nav-link ">
                                       <span class="title">Diesel Limit</span>
                                   </a>
                               </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-exchange"></i>
                                <span class="title">Transactions</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="container-entry.php" class="nav-link ">
                                        <span class="title">Container Movement</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="container-movement-update.php" class="nav-link ">
                                        <span class="title">Update Container Movement</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="garageEntry.php" class="nav-link ">
                                        <span class="title">Repair & Maintenance </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="Accounts.php" class="nav-link ">
                                        <span class="title">Accounts</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="Diesel-entry.php" class="nav-link ">
                                        <span class="title">Diesel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-notebook"></i>
                                <span class="title">Daily Book</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="dailyExpens.php" class="nav-link ">
                                        <span class="title">Daily Expenses</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="dailyAdvanceRecover.php" class="nav-link ">
                                        <span class="title">Advance Recover</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="AdvanceTaken.php" class="nav-link ">
                                        <span class="title">Advance Pay</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pie-chart"></i>
                                <span class="title">Reports</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="report-detailed-daily.php" class="nav-link ">
                                        <span class="title">Daily Detailed Report</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="report-garage.php" class="nav-link ">
                                        <span class="title">Repair & Maintenance</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="report-diesel.php" class="nav-link ">
                                        <span class="title">Diesel Report</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="report-vehicle.php" class="nav-link ">
                                        <span class="title">Vehicle Report</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="report-vehicle-voucher.php" class="nav-link ">
                                        <span class="title">Voucher Vehicle Report</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="reportAccounts.php" class="nav-link ">
                                        <span class="title">Accounts Report</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="recivePartyPayment.php" class="nav-link ">
                                        <span class="title">Receive Party Payment</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="user.php" class="nav-link">
                                <i class="fa fa-users"></i>
                                <span class="title">Users</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                    <?php } // END OF ELSE?>   
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->  