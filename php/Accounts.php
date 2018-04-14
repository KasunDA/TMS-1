<?php 
include 'header.php';
include 'nav.php';
 ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase">Accounts</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Date:</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" value="" placeholder="Today Date" />
                                            </div>
                                            <label class="col-md-2 control-label">Bank:</label>
                                            <div class="col-md-4">
                                                <select class="form-control">
                                                    <option>HBL</option>
                                                    <option>Meezan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Action:</label>
                                            <div class="col-md-3">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios22" value="option1" checked> Debit
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios23" value="option2" checked> Credit
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label">Method:</label>
                                            <div class="col-md-3">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" id="optionsRadios22" value="option1" checked> Check
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios1" id="optionsRadios23" value="option2" checked> Cash
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Amount:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="5688">
                                            </div>
                                            <label class="col-md-2 control-label">Check #:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="506000">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-2">
                                                <div class="">
                                                    <button type="submit" class="btn blue">Submit</button> 
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Form ends -->
                        <!-- end table -->
                        
                    </div> 
                </div>
            </div>
            <div class="row">
                 <div class="col-md-12">
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
                     <div class="portlet light bordered">
                         <div class="portlet-title">
                             <div class="caption font-green">
                                 <i class="icon-settings font-green"></i>
                                 <span class="caption-subject bold uppercase">Detailed Report</span>
                             </div>
                             <div class="tools">
                                 <a href="" class="collapse "> </a>
                             </div>
                         </div>
                         <div class="portlet-body table-both-scroll">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                 <thead>
                                     <tr>
                                        <th> ID: </th>
                                         <th> Date: </th>
                                         <th> Debit </th>
                                         <th> Credit </th>
                                         <th> Check # </th>
                                         <th> Previous Balance </th>
                                         <th> Current Balance </th>   
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="odd gradeX">
                                         <td> 15 </td>
                                         <td> 02/3/2018 </td>
                                         <td> 50000 </td>
                                         <td> Nil </td>
                                         <td> 8555 </td>
                                         <td> 800000 </td>
                                         <td> 800000 </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-push-6">
                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> Previous Balance</td>
                                            <td> 900000 </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Today Debit </td>
                                            <td> 9000 </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Today Credit </td>
                                            <td> 80000 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Current Balance </td>
                                            <td> 810000 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php 
include 'footer.php';
 ?>