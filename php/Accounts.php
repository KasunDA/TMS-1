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
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Account Transactions</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                          <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div id="ae_id_div" class="hidden">
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
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker"  placeholder="Today Date" id="datee" name="datee" value="<?php echo date('m/d/Y'); ?>"  required tabindex="1" />
                                            </div>
                                            <label class="col-md-2 control-label">Bank:</label>
                                            <div class="col-md-3">
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
                                                        <input type="radio" id="method" name="method" required tabindex="6" value="cash" checked> Cash
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" id="method" name="method" required tabindex="5" value="check" > Check
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Amount #</label>
                                             <div class="col-md-3">
                                               <input type="number" step="0.01" min="0" class="form-control" id="amount" name="amount" required tabindex="7" placeholder="58680">
                                             </div>
                                            
                                            <div id="check_number_div" class="hidden"> 
                                                 <label class="col-md-2 control-label">Check #</label>
                                                 <div class="col-md-3">
                                                   <input type="text" class="form-control" id="check_number" name="check_number"  tabindex="8" placeholder="58680">
                                                 </div>
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
                            <?php }//END OF IF?>
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
                             <table class="table table-striped table-bordered table-hover table-checkable order-column " id="mytable">
                                 <thead>
                                     <tr>
                                         <th> </th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Bank </th>
                                         <th> Debit </th>
                                         <th> Credit </th>
                                         <th> Check # </th>
                                         <th> Previous Balance </th>
                                         <th> Current Balance </th>   
                                     </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light" id="table_balance">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> Bank Name </td>
                                            <td> Prevoius Balance </td>
                                            <td> Today Debit</td>
                                            <td> Today Credit</td>
                                            <td> Current Balance </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE PORTLET-->
                </div>
                <!-- col-md-push-6 
                 <div class="col-md-6 ">
                     BEGIN BORDERED TABLE PORTLET
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> Previous Balance</td>
                                            <td id="today_previous_balance"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Today Debit </td>
                                            <td id="today_debit"></td>
                                        </tr>
                                        <tr class="uppercase">
                                            <td> 2 </td>
                                            <td> Today Credit </td>
                                            <td id="today_credit"></td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Current Balance </td>
                                            <td id="today_balance"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE PORTLET
                </div> -->
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


        function loadPreviousBalance()
        {
            $.ajax({
                url:'ajax/accounts_entry/fetch_details.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    
                    $('#table_balance tbody').html("");
                    
                    $.each(data,function(index,value){
                          
                        $('#table_balance tbody').append('<tr class="odd gradeX">'+

                                '<td>'+n+'</td>'+
                                '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                                '<td>'+value['previous_balance']+'</td>'+
                                '<td>'+value['total_debit']+'</td>'+
                                '<td>'+value['total_credit']+'</td>'+
                                '<td>'+value['balance']+'</td>'+
                                '</tr>');
                        n++;
                    });
                },
                error:function(){ alert("Failed Previous Balance Fetch Ajax Call.") }
            });
        }

        function getTotal(name)
        {
          var sum = 0,
              value = null;

          $('td[name="'+name+'"]').each(function(){
              value = $(this).text()/1;

              if( !isNaN(value) && value != null )
              {
                  sum +=value; 
              }
          });

          return sum;
        }

        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        //Select2
       $('#bank_id').select2({
          width: 'resolve',
          theme: "classic"
       });
       $('.select2-selection').addClass('select');

       $('input[name="method"]').change(function(){

            if( $(this).val() == 'check' )
            {
                $('#check_number').attr('required','required');
                $('#check_number_div').removeClass('hidden');
            }
            else
            {
                $('#check_number').removeAttr('required');
                $('#check_number_div').addClass('hidden');   
            }

       });

        function loadData()
        {
            $.ajax({
                url:'ajax/accounts_entry/fetch.php',
                dataType:"JSON",
                //async:false,
                success:function(data){
                    var n = 1,
                        old_bank_id = [],
                        nameAttr = '';


                    
                    $('#mytable').DataTable().destroy();
                    $('#mytable tbody').html("");
                    
                    $.each(data,function(index,value){
                          
                          if( !old_bank_id.includes(value['bank_id']) )
                          {
                            old_bank_id.push(value['bank_id']);
                            nameAttr = 'name="today_previous_balance"';
                          }
                          else
                          {
                            nameAttr = '';
                          }
                        
                        $('#mytable tbody').append('<tr class="odd gradeX">'+

                                // '<td>'+ 
                                //     '<ul class="addremove">'+
                                //         '<li> <button class="btn btn-xs green update_btn" id="'+value['ae_id']+'" type="button">  '+
                                //         '<i class="fa fa-plus-square"></i>'+
                                //         '</button> </li>'+
                                //         '<li>  <button class="btn btn-xs red delete_btn" id="'+value['ae_id']+'" type="button">  '+
                                //         '<i class="fa fa-minus-square"></i>'+
                                //         '</button> </li>'+
                                //     '</ul>'+
                                // '</td>'+                       
                                '<td></td>'+
                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td id="'+value['bank_id']+'">'+value['short_form']+'</td>'+
                                '<td name="today_debit">'+value['debit']+'</td>'+
                                '<td name="today_credit">'+value['credit']+'</td>'+
                                '<td>'+value['check_number']+'</td>'+
                                '<td '+nameAttr+'>'+value['previous_balance']+'</td>'+
                                '<td>'+value['current_balance']+'</td>'+
                                '</tr>');

                        n++;
                    })

                    myDataTable();
                    loadPreviousBalance();

                    // var today_previous_balance = getTotal('today_previous_balance');
                    //     today_debit = getTotal('today_debit'),
                    //     today_credit = getTotal('today_credit'),
                    //     today_balance = today_previous_balance + today_credit;

                    // $('#today_previous_balance').html(today_previous_balance);
                    // $('#today_debit').html(today_debit);
                    // $('#today_credit').html(today_credit);
                    // $('#today_balance').html(today_balance-today_debit);
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }


        loadData(); 

        function add(datee,bank_id,action,method,amount,check_number)
        {
            $.ajax({
                url:'ajax/accounts_entry/add.php?datee='+datee+'&bank_id='+bank_id+'&action='+action+'&method='+method+'&amount='+amount+'&check_number='+check_number,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#bank_id').val("").trigger('change');
                        $('#btn_reset').trigger('click');
                        
                        loadData();

                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(ae_id,datee,bank_id,action,method,amount,check_number)
        {
            $.ajax({
                url:'ajax/accounts_entry/update.php?ae_id='+ae_id+'&datee='+datee+'&bank_id='+bank_id+'&action='+action+'&method='+method+'&amount='+amount+'&check_number='+check_number,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(datee);
                        trr.find('td').eq(3).text();
                        trr.find('td').eq(4).text();
                        trr.find('td').eq(5).text(amount);

                        dt();
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,ae_id)
        {
            $.ajax({
                url:'ajax/accounts_entry/delete.php?ae_id='+ae_id,
                type:"POST",
                success:function(data){
                    trr.fadeOut(100,function(){
                       trr.remove(); 
                    });
                    dt();
                },
                error:function(){ alert("Error in Delete ajax Call.") }
            });
        }

        function updateClick()
        {

            $('form').addClass('update_form');

            $('#ae_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#bank_id').val('').trigger('change');
            $('#btn_reset').trigger('click');

            $('#ae_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var ae_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,ae_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var ae_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#ae_id').val( ae_id );
            $('#datee').val( trr.find('td').eq(2).text() );
            $('#bank_id').val( trr.find('td').eq(3).attr('id') ).trigger('change');
            $('#').val( trr.find('td').eq(4).text() );
            $('#amount').val( trr.find('td').eq(5).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var datee = $('#datee').val() ,
               bank_id = $('#bank_id').val() ,
               short_form = $('#bank_id option:selected').text() ,
               action= $('input[name="action"]:checked').val() ,
               method= $('input[name="method"]:checked').val() ,
               amount = $('#amount').val() ,
               check_number = $('#check_number').val() ,
               ae_id =  $('#ae_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(ae_id,datee,bank_id,action,method,amount,check_number);
           }
           else
           {
                add(datee,bank_id,action,method,amount,check_number);
           }
        });



     });
 </script>