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
                                <span class="caption-subject bold uppercase">Add new Bank</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row hidden" id="bank_id_div"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" name="bank_id" id="bank_id" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Bank Short Form:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" id="short_form" name="short_form" required tabindex="1" placeholder="HBL">
                                            </div>
                                            <label class="col-md-2 control-label">Bank Full Form:</label>
                                            <div class="col-md-4">
                                               <input type="text" class="form-control" id="full_form" name="full_form" required tabindex="2" placeholder="Habib Bank Limited">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Title of account:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" id="account_title" name="account_title" required tabindex="3" placeholder="Butt Brothers">
                                            </div>
                                            <label class="col-md-2 control-label">Account #:</label>
                                            <div class="col-md-4">
                                               <input type="text" class="form-control" id="account_number" name="account_number" required pattern="[\d]{4}-[\d]{4}-[\d]{5}-[\d]{2}-[\d]{1}" maxlength="20" tabindex="4" placeholder="1080-0081-00381-01-9">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Address:</label>
                                            <div class="col-md-3">
                                               <textarea type="text" class="form-control" id="address" name="address" required tabindex="5" placeholder="here"></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-2">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="6">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="7">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="6">Update</button> 
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="7">Add New</button>
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
                                 <span class="caption-subject bold uppercase">All Banks</span>
                             </div>
                             <div class="tools">
                                 <a href="" class="collapse"> </a>
                             </div>
                         </div>
                         <div class="portlet-body table-both-scroll">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                 <thead>
                                     <tr>
                                         <th> Action </th>  
                                         <th> # </th>
                                         <th> Short Form </th>
                                         <th> Full Form </th>
                                         <th> Name </th>
                                         <th> Account # </th>
                                         <th> Address </th> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 

                                        require 'connection.php';


                                        $q = mysqli_query($mycon,'SELECT * FROM bank WHERE status=1 ORDER BY bank_id DESC ');
                                        $n  = 1;
                                        while($r = mysqli_fetch_array($q))
                                        {?>
                                            <tr class="odd gradeX">

                                            <td> 
                                              <ul class="addremove">
                                                <li> <button class="btn btn-xs green update_btn" id="<?php echo $r['bank_id']; ?>"  type="button">  
                                                <i class="fa fa-plus-square"></i>
                                                </button> </li>
                                                <li>  <button class="btn btn-xs red delete_btn" id="<?php echo $r['bank_id']; ?>" type="button">  
                                                <i class="fa fa-minus-square"></i>
                                                </button> </li>
                                              </ul>
                                            </td>
                                            <td><?php echo $n ?></td>
                                            <td><?php echo $r['short_form']; ?> </td>
                                            <td><?php echo $r['full_form']; ?> </td>
                                            <td><?php echo $r['account_title']; ?></td>
                                            <td><?php echo $r['account_number']; ?></td>
                                            <td><?php echo $r['address']; ?> </td>

                                        </tr>

                                        <?php 
                                            $n++;
                                        }// END OF WHILE


                                     ?>

                                     <!-- <tr class="odd gradeX">
                                         <td> 
                                           <ul class="addremove">
                                             <li> <button class="btn btn-xs green" type="button">  
                                             <i class="fa fa-plus-square"></i>
                                             </button> </li>
                                             <li>  <button class="btn btn-xs red" type="button">  
                                             <i class="fa fa-minus-square"></i>
                                             </button> </li>
                                           </ul>
                                         </td>
                                         <td> 1 </td>
                                         <td> HBL </td>
                                         <td> Habib Bank Limited </td>
                                         <td> Butt Brothers </td>
                                         <td> 1080-0081-00381-01-9 </td>
                                         <td> West Road </td>
                                     </tr> -->
                                 </tbody>
                             </table>
                         </div>
                     </div>
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

 <script type="text/javascript">
     
     $(document).ready(function(){

        function loadData()
        {
            // $.ajax({
            //     url:'',
            //     dataType:"JSON",
            //     success:function(data){},
            //     error:function(){}
            // });

            $.ajax({
                url:'ajax/bank/fetch.php',
                dataType:"JSON",
                success:function(data){

                    var n = 1;
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['bank_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['bank_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+                       

                                '<td>'+n+'</td>'+
                                '<td>'+value['short_form']+'</td>'+
                                '<td>'+value['full_form']+'</td>'+
                                '<td>'+value['account_title']+'</td>'+
                                '<td>'+value['account_number']+'</td>'+
                                '<td>'+value['address']+'</td>'+

                                '</tr>');

                        n++;
                    })
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        //loadData();

        function add(short_form,full_form,account_title,account_number,address)
        {
            $.ajax({
                url:'ajax/bank/add.php?short_form='+short_form+'&full_form='+full_form+'&account_title='+account_title+'&account_number='+account_number+'&address='+address,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#short_form').val("");
                        $('#full_form').val("");
                        $('#account_title').val("");
                        $('#account_number').val("");
                        $('#address').val("");
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(bank_id,short_form,full_form,account_title,account_number,address)
        {
            $.ajax({
                url:'ajax/bank/update.php?bank_id='+bank_id+'&short_form='+short_form+'&full_form='+full_form+'&account_title='+account_title+'&account_number='+account_number+'&address='+address,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(short_form);
                        trr.find('td').eq(3).text(full_form);
                        trr.find('td').eq(4).text(account_title);
                        trr.find('td').eq(5).text(account_number);
                        trr.find('td').eq(6).text(address);
                        
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,bank_id)
        {
            $.ajax({
                url:'ajax/bank/delete.php?bank_id='+bank_id,
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

            $('#bank_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#short_form').val('');
            $('#full_form').val('');
            $('#account_title').val('');
            $('#account_number').val('');
            $('#address').val('');

            $('#bank_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var bank_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,bank_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var bank_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#bank_id').val( bank_id );
            $('#short_form').val( trr.find('td').eq(2).text() );
            $('#full_form').val( trr.find('td').eq(3).text() );    
            $('#account_title').val( trr.find('td').eq(4).text() );
            $('#account_number').val( trr.find('td').eq(5).text() );
            $('#address').val( trr.find('td').eq(6).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var short_form = $('#short_form').val() ,
               full_form = $('#full_form').val(),
               account_title = $('#account_title').val(),
               account_number = $('#account_number').val(),
               address = $('#address').val(),
               bank_id =  $('#bank_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(bank_id,short_form,full_form,account_title,account_number,address);
           }
           else
           {
                add(short_form,full_form,account_title,account_number,address);
           }
        });



     });
 </script>