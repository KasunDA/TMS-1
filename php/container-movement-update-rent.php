<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
date_default_timezone_set("Asia/Karachi");
 ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Update'; echo $text; ?> Rent Container Movement</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal role="form" method="post">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                          <div id="cm_id_div">
                                            <label class="col-md-2 control-label">Container Movement ID:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="cm_id" name="cm_id" required readonly value="<?php echo $_GET['cm_id']; ?>" >
                                            </div>
                                          </div>

                                          <label class="col-md-1 control-label">Rent:</label>
                                          <div class="col-md-2">
                                            <input type="number" min="0" class="form-control" placeholder="Rent" id="rent" name="rent" tabindex="1" required >
                                          </div>

                                          <!-- <div class="form-actions "> -->
                                            <button type="submit" class="btn blue" id="update_form_btn" tabindex="2" style="margin-top: -5px;">Update</button>
                                          <!-- </div>           -->
                                        </div>
  
                                     </div>
         
                                    
                                </div>
                                
                            </form>
                        </div>
                        <!-- Form ends -->
                         <hr> 

                    </div> 
             </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include 'footer.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){

    function update(cm_id,rent)
    {
      $.ajax({
          url:'ajax/container_movement/rupdate.php',
          data:{cm_id:cm_id,rent:rent},
          type:"GET",
          dataType:'JSON',
          success:function(data){
            if(data['updated']=='true')
            {
              alertMessage('Updated Successfully.','success');
              $('#rent').val('');
            }
            else
              alertMessage('Not Updated!','error');
          },
          error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
      });
    }

    //Update 
    $('form').submit(function(e){
       e.preventDefault();
       
       var rent  = $('#rent').val(),
           cm_id =  $('#cm_id').val();

        update(cm_id,rent);
    });
  });
</script>