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
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div id="ge_id_div" class="hidden">
                                              <label class="col-md-2 control-label">ID:</label>
                                              <div class="col-md-3">
                                                <input type="text" class="form-control" id="" name="" required readonly >
                                              </div>
                                            </div>
                                    
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Date:</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker"  placeholder="Today Date" id="datee" name="datee" value="<?php echo date('m-d-Y'); ?>"  required tabindex="1" />
                                            </div>
                                            <label class="col-md-2 control-label">Bank:</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="bank_id" name="bank_id" required tabindex="2">
                                                    <option value="">Select Bank</option>
                                                    <?php 

                                                      $q = mysqli_query($mycon,'SELECT bank_id,short_form from bank where status=1 ORDER BY bank_id DESC');

                                                      while( $r = mysqli_fetch_array($q) )
                                                        {?>
                                                        <option value="<?php echo $r['bank_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                                    
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
                                                        <input type="radio" id="action" name="action" required tabindex="3" value="debit" checked> Debit
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" id="action" name="action" required tabindex="4" value="credit"> Credit
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label">Method:</label>
                                            <div class="col-md-3">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" id="method" name="method" required tabindex="5" value="check" checked> Check
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" id="method" name="method" required tabindex="6" value="cash"> Cash
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Amount #</label>
                                             <div class="col-md-3">
                                               <input type="number" step="0.01" class="form-control" id="amount" name="amount" required tabindex="7" placeholder="58680">
                                             </div>

                                             <label class="col-md-2 control-label">Check #</label>
                                             <div class="col-md-3">
                                               <input type="text" class="form-control" id="check_number" name="check_number" required tabindex="8" placeholder="58680">
                                             </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-2">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="9">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="10">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="9">Update</button> 
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="10">Add New</button>
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
                                         <th> # </th>
                                         <th> Date: </th>
                                         <th> Debit </th>
                                         <th> Credit </th>
                                         <th> Check # </th>
                                         <th> Previous Balance </th>
                                         <th> Current Balance </th>   
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 

                                                $q = mysqli_query($mycon,'SELECT * FROM accounts_entry WHERE status=1 ORDER BY ae_id DESC ');
                                                $n  = 1;
                                                while($r = mysqli_fetch_array($q))
                                                {?>
                                                    <tr class="odd gradeX">

                                                    <td><?php echo $n ?></td>
                                                    <td><?php echo $r['datee']; ?></td>
                                                    <?php 

                                                        if( $r['action'] == 'debit' )
                                                        {
                                                            echo '<td>'.$r['amount'].'</td>';
                                                            echo '<td></td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td></td>';
                                                            echo '<td>'.$r['amount'].'</td>';
                                                        }
                                                    
                                                     $q1 = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id='.$r['vehicle_id']);
                                                    $r1 = mysqli_fetch_array($q1)?>
                                                    <td id="<?php echo $r['vehicle_id']?>"><?php echo $r1['vehicle_number']; ?></td>
                                                    <!-- <td><?php //echo $r['']; ?></td> -->

                                                </tr>

                                                <?php 
                                                    $n++;
                                                }// END OF WHILE


                                             ?>
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
 <script src="../assets/global/scripts/select2.full.min.js"></script>
 <script type="text/javascript">
     
     $(document).ready(function(){

        //Select2
       $('#bank_id').select2({
          width: 'resolve'
       });

        function loadData()
        {
            $.ajax({
                url:'ajax/garage_entry/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['ge_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['ge_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+                       

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td>'+value['description']+'</td>'+
                                '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                                '<td>'+value['amount']+'</td>'+
                                '</tr>');

                        n++;
                    })
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        // loadData();

        function add(datee,description,vehicle_id,amount)
        {
            $.ajax({
                url:'ajax/garage_entry/add.php?datee='+datee+'&description='+description+'&vehicle_id='+vehicle_id+'&amount='+amount,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#vehicle_id').val("").trigger('change');
                        $('#btn_reset').trigger('click');
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(ge_id,datee,description,vehicle_id,amount,vehicle_number)
        {
            $.ajax({
                url:'ajax/garage_entry/update.php?ge_id='+ge_id+'&datee='+datee+'&description='+description+'&vehicle_id='+vehicle_id+'&amount='+amount,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(datee);
                        trr.find('td').eq(3).text(description);
                        trr.find('td').eq(4).text(vehicle_number);
                        trr.find('td').eq(5).text(amount);
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,ge_id)
        {
            $.ajax({
                url:'ajax/garage_entry/delete.php?ge_id='+ge_id,
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

            $('#ge_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#vehicle_id').val('').trigger('change');
            $('#btn_reset').trigger('click');

            $('#ge_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var ge_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,ge_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var ge_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#ge_id').val( ge_id );
            $('#datee').val( trr.find('td').eq(2).text() );
            $('#description').val( trr.find('td').eq(3).text() );
            $('#vehicle_id').val( trr.find('td').eq(4).attr('id') ).trigger('change');
            $('#amount').val( trr.find('td').eq(5).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var datee = $('#datee').val() ,
               description = $('#description').val() ,
               vehicle_id = $('#vehicle_id').val() ,
               vehicle_number = $('#vehicle_id option:selected').text() ,
               amount = $('#amount').val() ,
               ge_id =  $('#ge_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(ge_id,datee,description,vehicle_id,amount,vehicle_number);
           }
           else
           {
                add(datee,description,vehicle_id,amount);
           }
        });



     });
 </script>