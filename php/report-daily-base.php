<?php 
include 'header.php';
include 'nav.php';
 ?>    <!-- BEGIN CONTENT -->
 <style type="text/css">
     section#skills-pgr {
       padding: 3px 10px 0;
     }
     #skills-pgr div.progress {
       font-weight: bolder;
       color: #fff;
       background-color: #f3f3f3;
       border: 0px none;
       box-shadow: none;
       height: 2.5em;
     }
     div.progress-bar > span {
       float: left;
       position: relative;
       top: 9px;
       left: 2%;
       font-size: 14px;
     }
 </style>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                
            <!-- END PAGE HEAD-->
            <div class="row widget-row">
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Today Income</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">PKR</span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Today Expenses</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">PKR</span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Monthly Avg Income</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">PKR</span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>
                <div class="col-md-3">
                    <!-- BEGIN WIDGET THUMB -->
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">Monthly Avg Expenses</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">PKR</span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET THUMB -->
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption ">
                                <span class="caption-subject font-dark bold uppercase">Daily Expenses / Income Report</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-2">From:</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" placeholder="Date From" />
                                            </div>
                                            <label class="control-label col-md-2">To:</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" value="" placeholder="Date To" />
                                            </div>

                                        </div>
                                    </div>    
                                     <div class="row"> 
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">For:</label>
                                            <div class="col-md-3">
                                              <input type="text" id="daily_expense_auto" name="daily_expense_auto" class="form-control" placeholder="Only For Single Search" /> 
                                            </div>
                                        </div>  
                                      </div> 
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue">Submit</button> 
                                        <button type="button" class="btn default">Clear</button>
                                    </div> 
                                </div>
                                
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet-body" >
                                    <h3>Expenses</h3>
                                    <section id="skills-pgr">
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="10">
                                          <span>Lunch = 8,000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="16">
                                          <span>Photography = 3,000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="18">
                                          <span>Advance = 60,000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10">
                                          <span>Website = 15000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="0" value="erfc">
                                          <span>Software = 6000</span>
                                        </div>
                                      </div>
                                    </section>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet-body" >
                                    <h3>Income</h3>
                                    <section id="skills-pgr">
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="10">
                                          <span>Lunch = 8,000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="16">
                                          <span>Photography = 3,000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="18">
                                          <span>Advance = 60,000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="10">
                                          <span>Website = 15000</span>
                                        </div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="0" value="erfc">
                                          <span>Software = 6000</span>
                                        </div>
                                      </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN PAGE BASE CONTENT -->
            
            <!-- </div> -->
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
<script type="text/javascript">
 
// <script type="text/javascript">
// Load google charts
// google.charts.load('current', {'packages':['corechart']});
// google.charts.setOnLoadCallback(drawChart);

// // Draw the chart and set the chart values
// function drawChart() {
//   var data = google.visualization.arrayToDataTable([
//   ['Task', 'Hours per Day'],
//   ['Lunch = 8000', 8000],
//   ['Bike Expenses = 2000', 2000],
//   ['Bills = 400', 400],
//   ['Diesel = 200', 200],
//   ['other = 800', 800]
// ]);

//   // Optional; add a title and set the width and height of the chart
//   var options = {'title':'Today Report', 'width':950, 'height':400};

//   // Display the chart inside the <div> element with id="piechart"
//   var chart = new google.visualization.PieChart(document.getElementById('piechart'));
//   chart.draw(data, options);
// }
$(function() {
  $('.progress-bar').each(function() {
    var bar_value = $(this).attr('aria-valuenow') + '%';                
    $(this).animate({ width: bar_value }, { duration: 2000 });
  });
});
</script> 