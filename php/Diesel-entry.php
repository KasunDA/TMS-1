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
                                <span class="caption-subject bold uppercase">Diesel Entry</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div id="de_id_div" class="hidden">
                                              <label class="col-md-2 control-label">ID:</label>
                                              <div class="col-md-3">
                                                <input type="number" class="form-control" id="de_id" name="de_id" readonly >
                                              </div>
                                            </div>
                                    
                                        </div>
                                        
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Date:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control form-control-inline input-medium date-picker"  size="16" id="datee" name="datee" value="<?php echo date('m/d/Y'); ?>"  required tabindex="1">
                                            </div>
                                            
                                            <label class="col-md-2 control-label">vehicle#:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="vehicle_id" name="vehicle_id" required tabindex="2">
                                                    <option value="">Select Vehicle</option>
                                                    <?php 

                                                      $q = mysqli_query($mycon,'SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC');

                                                      while( $r = mysqli_fetch_array($q) )
                                                        {?>
                                                        <option value="<?php echo $r['vehicle_id']; ?>"><?php echo $r['vehicle_number']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">From:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="from_yard_id" name="from_yard_id" required tabindex="3" style="width: 100%;">
                                                    <option value="">Select Yard</option>
                                                    <?php

                                                    $q = mysqli_query($mycon,'SELECT yard_id,short_form FROM yard WHERE status=1 ORDER BY yard_id DESC ');
                                                
                                                    while($r = mysqli_fetch_array($q))
                                                    {?>
                                                        <option value="<?php echo $r['yard_id'] ?>"> <?php echo $r['short_form'] ?></option>
                                                    <?php
                                                    }//END OF WHILE

                                                    ?>
                                                </select>
                                            </div>
                                    
                                            <label class="col-md-2 control-label">To:</label>
                                            <div class="col-md-3">
                                                <select class="" id="to_yard_id" name="to_yard_id" required tabindex="4" style="width: 100%;">
                                                    <option value="" >Select Yard</option>
                                                    <?php

                                                    $q = mysqli_query($mycon,'SELECT yard_id,short_form FROM yard WHERE status=1 ORDER BY yard_id DESC ');
                                                
                                                    while($r = mysqli_fetch_array($q))
                                                    {?>
                                                        <option value="<?php echo $r['yard_id'] ?>"> <?php echo $r['short_form'] ?></option>
                                                    <?php
                                                    }//END OF WHILE

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">1 Litre Rate:</label>
                                            <div class="col-md-3">
                                               <input type="number" step="0.01" min="0.0" id="litre_rate" name="litre_rate" required tabindex="5" class="form-control" placeholder="100">
                                            </div>
                                            <label class="col-md-2 control-label"> Litres:</label>
                                            <div class="col-md-3">
                                               <input type="number" readonly id="litres" value="0" name="litres" required tabindex="-1" class="form-control">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Extra Litres:</label>
                                            <div class="col-md-3">
                                               <input type="number" class="form-control" min="0" value="0" id="extra_litres" name="extra_litres" required tabindex="6" placeholder="7">
                                            </div>
                                            <label class="col-md-2 control-label">Total Price #:</label>
                                            <div class="col-md-3">
                                               <input type="number" step="0.01"  readonly id="total" name="total" class="form-control" placeholder="total" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-8">
                                               <textarea class="form-control" placeholder="Why extra Litres" rows="4" id="description" name="description" required tabindex="7" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-2">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="8">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="9">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="8">Update</button> 
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="9">Add New</button>
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
                                 <a href="" class="expand"> </a>
                             </div>
                         </div>
                         <div class="portlet-body table-both-scroll" style="display: none;">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th> Actions </th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Vehicle # </th>
                                         <th> From </th>
                                         <th> To </th>
                                         <th> 1 Litre Rate </th>
                                         <th> Litres </th>  
                                         <th> Extra Litres </th>   
                                         <th> Total Price </th>   
                                         <th> Description </th>   
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
                <div class="col-md-6 col-md-push-6">
                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> One litre Price</td>
                                            <td id="llitre_rate">  </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Total litres </td>
                                            <td id="total_litres">  </td>
                                        </tr>
                                        <tr class="uppercase">
                                            <td> 2 </td>
                                            <td> Total Extra litres </td>
                                            <td id="total_extra_litres">  </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Total Price </td>
                                            <td id="total_price">  </td>
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

        function ttotal()
        {
            var total = $('#litres').val()/1.0 + $('#extra_litres').val() / 1.0;

            $('#total').val(total * $('#litre_rate').val());
        }

        $('#litre_rate,#extra_litres').on('keyup change',function(){
            ttotal();
        });

        function getLitres(from_yard_id,to_yard_id)
        {
             $.ajax({
                url:'ajax/diesel_entry/get_litres.php?from_yard='+from_yard_id+'&to_yard='+to_yard_id,
                dataType:"JSON",
                success:function(data){
                    
                    $('#litres').val(data['limit_litre']);
                    ttotal();
                },
                error:function(){ alert("Failed litres Ajax Call.") }   
            });
        }

        $('#from_yard_id,#to_yard_id').change(function(){

            var a = $('#from_yard_id').val(),
                b = $('#to_yard_id').val();

            if( a != '' && b != '' )
            {   
                getLitres(a,b);
            }
             
        });

        //Select2 from _yard
        $('#vehicle_id,#from_yard_id,#to_yard_id').select2({
            width: 'resolve'
        });

        function dt()
        {
            $.ajax({
                url:'ajax/diesel_entry/fetch_details.php',
                dataType:"JSON",
                success:function(data){

                    $.each(data,function(index,value){

                        $('#llitre_rate').html(value['litre_rate']);
                        $('#total_litres').html(value['total_litres']);
                        $('#total_extra_litres').html(value['total_extra_litres']);
                        $('#total_price').html(value['total_price']);
                    });
                },
                error:function(){ alert("Failed Fetch Details Ajax Call.") }   
            });    
        }

        dt();

        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData()
        {
            $.ajax({
                url:'ajax/diesel_entry/fetch.php',
                dataType:"JSON",
                success:function(data){

                    var n = 1;
                    var i = 0;

                    $('#mytable').DataTable().destroy();
                    $('#mytable tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('#mytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['de_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['de_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+                       

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                                '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                                '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                                '<td>'+value['litre_rate']+'</td>'+
                                '<td>'+value['litres']+'</td>'+
                                '<td>'+value['extra_litres']+'</td>'+
                                '<td>'+value['total']+'</td>'+
                                '<td>'+value['description']+'</td>'+

                                '</tr>');

                        n++; i++;
                    })
                    myDataTable();
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        loadData();

        function add(datee,vehicle_id,from_yard_id,to_yard_id,litre_rate,litres,extra_litres,total,description)
        {
            $.ajax({
                url:'ajax/diesel_entry/add.php?datee='+datee+'&vehicle_id='+vehicle_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&litre_rate='+litre_rate+'&litres='+litres+'&extra_litres='+extra_litres+'&total='+total+'&description='+encodeURIComponent(description),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('form select').val('').trigger('change');
                        $('#extra_litres,#description').val('');
                        
                        loadData();
                        dt();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(de_id,datee,vehicle_id,vehicle_number,from_yard_id,from_yard_text,to_yard_id,to_yard_text,litre_rate,litres,extra_litres,total,description)
        {
            $.ajax({
                url:'ajax/diesel_entry/update.php?de_id='+de_id+'&datee='+datee+'&vehicle_id='+vehicle_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&litre_rate='+litre_rate+'&litres='+litres+'&extra_litres='+extra_litres+'&total='+total+'&description='+encodeURIComponent(description),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = datee;
                        temp[3] = vehicle_number;
                        temp[4] = from_yard_text;
                        temp[5] = to_yard_text;
                        temp[6] = litre_rate;
                        temp[7] = litres;
                        temp[8] = extra_litres;
                        temp[9] = total;
                        temp[10] = description;

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        dt();
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,de_id)
        {
            $.ajax({
                url:'ajax/diesel_entry/delete.php?de_id='+de_id,
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

            $('#de_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('form select').val('').trigger('change');
            $('#extra_litres,#description').val('');

            $('#de_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var de_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,de_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var de_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#de_id').val( de_id );
            $('#datee').val( trr.find('td').eq(2).text() );    
            $('#vehicle_id').val(trr.find('td').eq(3).attr('id')).trigger('change');
            $('#from_yard_id').val(trr.find('td').eq(4).attr('id')).trigger('change');
            $('#to_yard_id').val(trr.find('td').eq(5).attr('id')).trigger('change');
            $('#litre_rate').val( trr.find('td').eq(6).text() );
            // $('#litres').val( trr.find('td').eq(7).text() );
            $('#extra_litres').val( trr.find('td').eq(8).text() );
            $('#total').val( trr.find('td').eq(9).text() );    
            $('#description').val( trr.find('td').eq(10).text() );    

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var datee = $('#datee').val(),
               vehicle_id = $('#vehicle_id').val(),
               vehicle_number = $('#vehicle_id option:selected').text(), 
               from_yard_id = $('#from_yard_id').val() ,
               from_yard_text = $('#from_yard_id option:selected').text(),
               to_yard_id = $('#to_yard_id').val(),
               to_yard_text = $('#to_yard_id option:selected').text(),
               litre_rate = $('#litre_rate').val(),
               litres = $('#litres').val(),
               extra_litres = $('#extra_litres').val(),
               total = $('#total').val(),
               description = $('#description').val(),
               de_id =  $('#de_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(de_id,datee,vehicle_id,vehicle_number,from_yard_id,from_yard_text,to_yard_id,to_yard_text,litre_rate,litres,extra_litres,total,description);
           }
           else
           {
                add(datee,vehicle_id,from_yard_id,to_yard_id,litre_rate,litres,extra_litres,total,description);
           }
        });



     });
 </script>