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
                                <span class="caption-subject bold uppercase"> Add New Chart Of Account</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form"  method="post">
                                <div class="form-body">
                                    <div class="row hidden" id="coa_id_div"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" name="coa_id" id="coa_id" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">

                                                <label class="col-md-2 control-label">Party Name:</label>
                                                <div class="col-md-3">
                                                  <input type="text" name="party_name" id="party_name" tabindex="1" class="form-control" placeholder="here" required>
                                                </div>
                                    
                                                  <label class="col-md-2 control-label">Address</label>
                                                <div class="col-md-3">
                                                  <textarea class="form-control" name="address" tabindex="2" id="address" placeholder="here" required></textarea>
                                                </div>
                                         </div>  
                                     </div>   
                                     <div class="row"> 
                                         <div class="form-group">
                                                   <label class="col-md-2 control-label">Contact Number:</label>
                                                 <div class="col-md-3">
                                                   <input type="text" name="contact" id="contact" maxlength="11" tabindex="3" class="form-control" pattern="[\d]{11}" placeholder="03XXXXXXXXX" required>
                                                 </div>
                                     
                                                   <!-- <label class="col-md-2 control-label">City</label>
                                                 <div class="col-md-3">
                                                   <input type="text" class="form-control" placeholder="here">
                                                 </div> -->
                                          </div>  
                                      </div>


                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="4">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="5">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="4">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="5">Add New</button>
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
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Action </th> 
                                                    <th>#</th>
                                                   <th> Party Name </th>
                                                    <th> Address </th>
                                                    <th> Contact Number  </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php 

                                                require 'connection.php';


                                                $q = mysqli_query($mycon,'SELECT * FROM chart_of_account WHERE status=1 ORDER BY coa_id DESC ');
                                                $n  = 1;
                                                while($r = mysqli_fetch_array($q))
                                                {?>
                                                    <tr class="odd gradeX">

                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green update_btn" id="<?php echo $r['coa_id']; ?>"  type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red delete_btn" id="<?php echo $r['coa_id']; ?>" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                    </td>
                                                    <td><?php echo $n ?></td>
                                                    <td><?php echo $r['party_name']; ?> </td>
                                                    <td><?php echo $r['address']; ?></td>
                                                    <td><?php echo $r['contact']; ?></td>

                                                </tr>

                                                <?php 
                                                    $n++;
                                                }// END OF WHILE


                                             ?>

                                                
                                                     
                                              
                                                 
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
                url:'ajax/chart_of_account/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['coa_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['coa_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+                       

                                '<td>'+n+'</td>'+
                                '<td>'+value['party_name']+'</td>'+
                                '<td>'+value['address']+'</td>'+
                                '<td>'+value['contact']+'</td>'+

                                '</tr>');

                        n++;
                    })
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        // loadData();

        function add(party_name,contact,address)
        {
            $.ajax({
                url:'ajax/chart_of_account/add.php?party_name='+party_name+'&contact='+contact+'&address='+address,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#party_name').val("");
                        $('#address').val("");
                        $('#contact').val("");
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(coa_id,party_name,contact,address)
        {
            $.ajax({
                url:'ajax/chart_of_account/update.php?coa_id='+coa_id+'&party_name='+party_name+'&contact='+contact+'&address='+address,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(party_name);
                        trr.find('td').eq(3).text(address);
                        trr.find('td').eq(4).text(contact);
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,coa_id)
        {
            $.ajax({
                url:'ajax/chart_of_account/delete.php?coa_id='+coa_id,
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

            $('#coa_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#party_name').val('');
            $('#contact').val('');
            $('#address').val('');


            $('#coa_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var coa_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,coa_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var coa_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#coa_id').val( coa_id );
            $('#party_name').val( trr.find('td').eq(2).text() );
            $('#address').val( trr.find('td').eq(3).text() );
            $('#contact').val( trr.find('td').eq(4).text() );    

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var party_name = $('#party_name').val() ,
               address = $('#address').val(),
               contact = $('#contact').val(),
               coa_id =  $('#coa_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(coa_id,party_name,contact,address);
           }
           else
           {
                add(party_name,contact,address);
           }
        });



     });
 </script>