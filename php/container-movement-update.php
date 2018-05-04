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
                                <span class="caption-subject bold uppercase"> Update Container Movement</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'add_entry_form' ?>" role="form" method="post">
                                <div class="form-body">
                                   
                                    <div class="row"> 
                                        <div class="form-group">
                                                <div id="cm_id_div" class="hidden">
                                                  <label class="col-md-2 control-label">Transaction ID:</label>
                                                  <div class="col-md-3">
                                                    <input type="text" class="form-control" id="cm_id" name="cm_id" required readonly >
                                                  </div>
                                                </div>
                                    
                                                <label class="col-md-2 control-label">Transaction Date:</label>
                                                <div class="col-md-3">
                                                  <input type="date" class="form-control" id="datee" name="datee" value="<?php echo date('Y-m-d'); ?>" required tabindex="1" />
                                                </div>
                                         </div>  
                                     </div>
                                     <div class="row"> 
                                           <div class="form-group">
                                                 <label class="col-md-2 control-label"> Clearing Agent:</label>
                                                 <div class="col-md-3">
                                                     <select class="form-control" name="agent_id" id="agent_id" required tabindex="2" >
                                                         <option value="">Select Agent</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT agent_id,name from agent where status=1 ORDER BY agent_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['agent_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
                                                 </div>
                                                 
                                             </div> 
                                       </div>
                                     <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">On Account Of:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="coa_id" name="coa_id" required tabindex="3" >
                                                        <option value="">Select Account</option>
                                                        <?php 

                                                          $q = mysqli_query($mycon,'SELECT coa_id,short_form from chart_of_account where status=1 ORDER BY coa_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['coa_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="coa_id_full_form" readonly>
                                                </div>
                                            </div> 
                                      </div>
                                          <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">Consignee:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="consignee_id" name="consignee_id" required tabindex="4">
                                                        <option value="">Select Consignee</option>
                                                        <?php 

                                                          $q = mysqli_query($mycon,'SELECT consignee_id,short_form from consignee where status=1 ORDER BY consignee_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['consignee_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="consignee_id_full_form" readonly>
                                                </div>
                                            </div> 
                                      </div>
                                    <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label"> Movement:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="movement" name="movement" tabindex="5" >
                                                        <option value="empty">Empty</option>
                                                        <option value="import">Import</option>
                                                        <option value="export">Export</option> 
                                                    </select>
                                                </div>
                                                
                                            </div> 
                                      </div>
                                      <div class="row"> 
                                            <div class="form-group">
                                                  <label class="col-md-2 control-label"> Empty Terminal:</label>
                                                  <div class="col-md-3">
                                                      <select class="form-control" id="empty_terminal_id" name="empty_terminal_id" required tabindex="6" >
                                                          <option value="">Select Terminal</option>
                                                          <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                      </select>
                                                  </div>
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Full Form" id="empty_terminal_id_full_form" readonly>
                                                  </div>
                                              </div> 
                                        </div>
                                        <div class="row"> 
                                              <div class="form-group">
                                                    <label class="col-md-2 control-label">From Yard:</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="from_yard_id" name="from_yard_id" required tabindex="7" >
                                                            <option value="">Select Yard</option>
                                                            <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                      <input type="text" class="form-control" placeholder="Full Form" id="from_yard_id_full_form" readonly>
                                                    </div>
                                                </div> 
                                          </div>
                                          <div class="row"> 
                                                <div class="form-group">
                                                      <label class="col-md-2 control-label">To Yard:</label>
                                                      <div class="col-md-3">
                                                          <select class="form-control" id="to_yard_id" name="to_yard_id" required tabindex="8"  >
                                                              <option value="">Select Yard</option>
                                                                <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                              
                                                          </select>
                                                      </div>
                                                      <div class="col-md-5">
                                                        <input type="text" class="form-control" placeholder="Full Form" id="to_yard_id_full_form" readonly>
                                                      </div>
                                                  </div> 
                                            </div>
                                           
                                             <div class="row">        
                                              <div class="form-group">
                                                <div class="col-md-3 small-lab2">
                                                  <label class=" control-label">Container Size:</label>
                                                  <select class="form-control" id="container_size" name="container_size" tabindex="9">
                                                      <option value="20">20</option>
                                                      <option value="40">40</option>
                                                      <option value="45">45</option>
                                                  </select>
                                                </div>
                
                                                <label class="col-md-2 control-label">Party Rent:</label>
                                                <div class="col-md-2">
                                                  <input type="number" min="0" class="form-control" placeholder="Party Chagers" id="party_charges" name="party_charges" required tabindex="10"/>
                                                </div>
                                 
                                                  <label class="col-md-1 control-label">Lot Of :</label>
                                                  <div class="col-md-2">
                                                    <input type="number" min="0"  class="form-control" placeholder="Lot Of" id="lot_of" name="lot_of" required tabindex="11"/>
                                                  </div>
                                                  </div>  
                                              </div>
                                              <div class="row"> 
                                                        
                                                    </div>

                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Shipping Line:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" id="line_id" name="line_id" required tabindex="12" >
                                                                    <option value="">Select Shipping Line</option>
                                                                    <?php 

                                                          $q = mysqli_query($mycon,'SELECT line_id,short_form from line where status=1 ORDER BY line_id ');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['line_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Full Form" id="line_id_full_form" readonly>
                                                            </div>
                                                        </div> 
                                                  </div>
                              
                                    <div class="form-actions ">
                                        <!-- <button type="submit" class="btn blue" id="btn_submit" tabindex="13">Submit (F2)</button>  -->
                                        

                                        <button type="submit" class="btn blue" id="update_form_btn" disabled tabindex="13">Update</button>
                                        <!-- <button type="reset" class="btn default" id="btn_reset" tabindex="14">Cancel</button> -->
                                        <!-- <button type="button" class="btn default hidden"  id="add_new" tabindex="14">Add New</button> -->
                                    </div>
                                </div>
                                
                            </form>

                        </div>
                        <!-- Form ends -->
                         <hr> 
                         <div class="row">
                     <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                  
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                        <thead>
                                            <tr>
                                               
                                                <th> Action </th> 
                                              
                                                <th> # </th>
                                                <th> Container Movement Id </th>
                                                <th> Date </th>
                                                <th> Agent Name </th>
                                                <th> Chart of Account </th>
                                                <th> Consignee </th>
                                                <th> Movement </th>
                                                <th> Empty Terminal </th>
                                                <th> From  </th>
                                                <th> To </th>
                                                <th> Size </th>
                                                <th> Party Charges </th>
                                                <th> Lot Of </th>
                                                <th> Line </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                     </div>
                    </div>
                    <!-- end table -->
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
 <script src="../assets/global/scripts/select2.full.min.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){

      document.onkeyup = KeyCheck;

      function KeyCheck(e)
      {
       var KeyID = (window.event) ? event.keyCode : e.keyCode;
       if(KeyID == 113)
       {
          $('#btn_submit').trigger('click');
       }
      }

      $('#advance,#rent').on('keyup change',function(){
          $('#balance').val($('#advance').val()-$('#rent').val());
        });


      
      $('#agent_id,#coa_id,#consignee_id,#empty_terminal_id,#movement,#vehicle_id,#line_id,#container_size,#from_yard_id,#to_yard_id').select2({
            width: 'resolve'
          });  
      

      function load_full_form(v,param)
      {
        $.ajax({
          url:'ajax/container_movement/full_form.php?'+v+'='+param,
          dataType:'JSON',
          success:function(data){
            $('#'+v+'_full_form').val(data['val']);
          },
          error:function(){  alert('Error Ajax Call.') }
        })
      }

      $(document).on('change','#coa_id,#consignee_id,#line_id,#empty_terminal_id,#from_yard_id,#to_yard_id,#vehicle_id', function(){

        var param = $(this).val();

        if( $(this).val() == "" )
        {
          return;
        }

        if( $(this).attr('id') == 'coa_id' )
        {
          var v = 'coa_id';
        }
        else if( $(this).attr('id') == 'consignee_id' )
        {
          var v = 'consignee_id';
        }
        else if( $(this).attr('id') == 'empty_terminal_id' )
        {
          var v = 'empty_terminal_id';
        }
        else if( $(this).attr('id') == 'from_yard_id' )
        {
          var v = 'from_yard_id';
        }
        else if( $(this).attr('id') == 'to_yard_id' )
        {
          var v = 'to_yard_id';
        }
        else if( $(this).attr('id') == 'line_id' )
        {
          var v = 'line_id';
        }
        else
        {
          var v = 'vehicle_id';
        }

        load_full_form(v,param);

      });


      function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

      myDataTable();

      function loadData()
      {
        $.ajax({
            url:'ajax/container_movement/fetch.php',
            dataType:"JSON",
            success:function(data){

                var n = 1;
                var i = 0;

                $('#mytable').DataTable().destroy();
                $('tbody').html("");
                
                $.each(data,function(index,value){

                    $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                            '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    '<li>  <button class="btn btn-xs red delete_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+                       

                            '<td style="color:#000;">'+n+'</td>'+
                            '<td>'+value['cm_id']+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['agent_id']+'">'+value['agent_name']+'</td>'+
                            '<td id="'+value['coa_id']+'">'+value['coa']+'</td>'+
                            '<td id="'+value['consignee_id']+'">'+value['consignee']+'</td>'+
                            '<td>'+value['movement']+'</td>'+
                            '<td id="'+value['empty_terminal_id']+'">'+value['empty_terminal']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td>'+value['container_size']+'</td>'+
                            '<td>'+value['party_charges']+'</td>'+
                            '<td>'+value['lot_of']+'</td>'+
                            '<td id="'+value['line_id']+'">'+value['line']+'</td>'+

                            '</tr>');

                    n++; i++;
                })

                myDataTable();
            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
      }

      loadData();

      function update(cm_id,datee,agent_id,agent_name,coa_id,coa,consignee_id,consignee,movement,empty_terminal_id,empty_terminal,from_yard_id,from_yard,to_yard_id,to_yard,container_size,party_charges,lot_of,line_id,line)
      {
          $.ajax({
              url:'ajax/container_movement/update.php?cm_id='+cm_id+'&datee='+encodeURIComponent(datee)+'&agent_id='+agent_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&container_size='+container_size+'&party_charges='+party_charges+'&lot_of='+lot_of+'&line_id='+line_id,
              type:"POST",
              success:function(data){
                  if(data)
                  {
                      var i = $('.selectedd').attr('index');
                      var temp = $('#mytable').DataTable().row(i).data();
                      
                      addNewClick();

                      temp[3] = datee;
                      temp[4] = agent_name;
                      temp[5] = coa;
                      temp[6] = consignee;
                      temp[7] = movement;
                      temp[8] = empty_terminal;
                      temp[9] = from_yard;
                      temp[10] = to_yard;
                      temp[11] = container_size;
                      temp[12] = party_charges;
                      temp[13] = lot_of;
                      temp[14] = line;

                      $('#mytable').DataTable().row(i).data(temp).draw();

                    $('.selectedd').css('');
                  }
              },
              error:function(){ alert("Error in Update Ajax Call.") }
          });
      }

      function deletetr(trr,cm_id)
      {
          $.ajax({
              url:'ajax/container_movement/delete.php?cm_id='+cm_id,
              type:"POST",
              success:function(data){
                  trr.fadeOut(100,function(){
                     trr.remove(); 
                  });
              },
              error:function(){ alert("Error in Delete ajax Call.") }
          });
      }

      function updateClick()
      {

          $('form').addClass('update_form');

          $('#cm_id_div').removeClass('hidden');
          $('#update_form_btn').removeAttr('disabled');

      }

      function addNewClick()
      {

          $('form').removeClass('update_form');

          $('form select').val("").trigger('change');
          $('#movement').val('empty').trigger('change');
          $('#container_size').val('20').trigger('change');
          $('#party_charges,#lot_of').val('');

          $('#cm_id_div').addClass('hidden');
          $('#update_form_btn').attr('disabled','disabled');
      }

      //DELETE 
      $(document).on('click','.delete_btn',function(){

          var cm_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          deletetr(trr,cm_id);
      });

      //ADD NEW 
      $(document).on('click','#add_new',function(){
          addNewClick();
      });

      //UPDATE 
      $(document).on('click','.update_btn',function(){

          updateClick();

          var cm_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          $('tr').each(function(){
              if( $(this).hasClass('selectedd') )
              {
                $(this).removeClass('selectedd'); 
              }
          });

          trr.addClass('selectedd');   

          $('#cm_id').val( cm_id );
          $('#datee').val(trr.find('td').eq(3).text());
          $('#agent_id').val( trr.find('td').eq(4).attr('id') ).trigger('change');
          $('#coa_id').val( trr.find('td').eq(5).attr('id') ).trigger('change');
          $('#consignee_id').val( trr.find('td').eq(6).attr('id') ).trigger('change');
          $('#movement').val( trr.find('td').eq(7).text() ).trigger('change');
          $('#empty_terminal_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
          $('#from_yard_id').val( trr.find('td').eq(9).attr('id') ).trigger('change');
          $('#to_yard_id').val( trr.find('td').eq(10).attr('id') ).trigger('change');
          $('#container_size').val( trr.find('td').eq(11).text() ).trigger('change');
          $('#party_charges').val( trr.find('td').eq(12).text() );
          $('#lot_of').val( trr.find('td').eq(13).text() );
          $('#line_id').val( trr.find('td').eq(14).attr('id') ).trigger('change');
      });

      //Update
      $('form').submit(function(e){
         e.preventDefault();
         
         var datee = $('#datee').val() ,
             agent_id = $('#agent_id').val(),
             agent_name = $('#agent_id option:selected').text(),
             coa_id = $('#coa_id').val(),
             coa = $('#coa_id option:selected').text(),
             consignee_id = $('#consignee_id').val(),
             consignee = $('#consignee_id option:selected').text(),
             movement = $('#movement').val(),
             empty_terminal_id = $('#empty_terminal_id').val(),
             empty_terminal = $('#empty_terminal_id option:selected').text(),
             from_yard_id = $('#from_yard_id').val(),
             from_yard = $('#from_yard_id option:selected').text(),
             to_yard_id = $('#to_yard_id').val(),
             to_yard = $('#to_yard_id option:selected').text(),
             container_size = $('#container_size').val(),
             party_charges = $('#party_charges').val(),
             lot_of = $('#lot_of').val(),
             line_id = $('#line_id').val(),
             line = $('#line_id option:selected').text(),
             cm_id =  $('#cm_id').val();

         if( $(this).hasClass('update_form') ) 
         {
            update(cm_id,datee,agent_id,agent_name,coa_id,coa,consignee_id,consignee,movement,empty_terminal_id,empty_terminal,from_yard_id,from_yard,to_yard_id,to_yard,container_size,party_charges,lot_of,line_id,line);
         }
         else
         {

         }
      });

    });
 </script>