<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
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
                                <span class="caption-subject bold uppercase">Add New Diesel Limit:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row hidden" id="dl_id_div"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" name="dl_id" id="dl_id" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">From:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="from_yard" name="from_yard" required tabindex="1" style="width: 100%;">
                                                    <option value="">Select Yard</option>
                                                    <?php

                                                    $q = mysqli_query($mycon,'SELECT * FROM yard WHERE status=1 ORDER BY yard_id DESC ');
                                                
                                                    while($r = mysqli_fetch_array($q))
                                                    {?>
                                                        <option value="<?php echo $r['yard_id'] ?>"> <?php echo $r['short_form'] ?>
                                                            <span class="caption"> ( <?php echo $r['full_form'] ?> ) </span>
                                                        </option>
                                                    <?php
                                                    }//END OF WHILE

                                                    ?>
                                                </select>
                                            </div>
                                    
                                            <label class="col-md-2 control-label">To:</label>
                                            <div class="col-md-3">
                                                <select class="" id="to_yard" name="to_yard" required tabindex="2" style="width: 100%;">
                                                    <option value="" >Select Yard</option>
                                                    <?php

                                                    $q = mysqli_query($mycon,'SELECT * FROM yard WHERE status=1 ORDER BY yard_id DESC ');
                                                
                                                    while($r = mysqli_fetch_array($q))
                                                    {?>
                                                        <option value="<?php echo $r['yard_id'] ?>"> <?php echo $r['short_form'] ?>
                                                            <span class="caption"> ( <?php echo $r['full_form'] ?> ) </span>
                                                        </option>
                                                    <?php
                                                    }//END OF WHILE

                                                    ?>
                                                </select>
                                            </div>
                                         </div>    
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Diesel in Litters:</label>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" placeholder="10" id="limit_litre" name="limit_litre" required tabindex="3" min="0">
                                            </div>
                                          </div>  
                                    <div class="row">
                                        <div class="col-md-5 col-md-push-2">
                                            <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="4">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="5">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="4">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="5">Add New</button>
                                            </div>
                                        </div>
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
                                                    <th> # </th>
                                                    <th> From </th>
                                                    <th> To </th>
                                                    <th> Diesel in Litters </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                $q = mysqli_query($mycon,'SELECT * FROM diesel_limit WHERE status=1 ORDER BY dl_id DESC ');
                                                $n  = 1;
                                                while($r = mysqli_fetch_array($q))
                                                {?>
                                                    <tr class="odd gradeX">

                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green update_btn" id="<?php echo $r['dl_id']; ?>"  type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red delete_btn" id="<?php echo $r['dl_id']; ?>" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                    </td>
                                                    <td><?php echo $n ?></td>
                                                    <?php

                                                        $fq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['from_yard']);

                                                        if($fq)
                                                        {
                                                            $rfq = mysqli_fetch_array($fq);?>
                                                            <td from_yard_id="<?php echo $r['from_yard'] ?>"><?php echo $rfq['short_form'].' ( '.$rfq['full_form'].')'; ?></td> ;
                                                        
                                                        <?php

                                                        }

                                                        $tq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['to_yard']);

                                                        if($tq)
                                                        {
                                                            $rtq = mysqli_fetch_array($tq);?>
                                                            <td to_yard_id="<?php echo $r['to_yard'] ?>"><?php echo $rtq['short_form'].' ( '.$rtq['full_form'].')'; ?></td>
                                                        <?php    
                                                        }
                                                    ?>
                                                    <td><?php echo $r['limit_litre']; ?></td>

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
<script src="../assets/global/scripts/select2.full.min.js"></script>
 <script type="text/javascript">
     
     $(document).ready(function(){

        // // initialize the Selectize control for from_yard
        // var $fselect = $('#from_yard').selectize({
        //   create: false
        // });

        // // fetch the instance
        // var fselectize = $fselect[0].selectize;


        // // initialize the Selectize control for to_yard
        // var $tselect = $('#to_yard').selectize({
        //   create: false
        // });

        // // fetch the instance
        // var tselectize = $tselect[0].selectize;

        //Select2 from _yard
        $('#from_yard').select2({
            width: 'resolve'
        });

        //Select2 to_yard
        $('#to_yard').select2({
            width: 'resolve'
        });

        function loadData()
        {
            // $.ajax({
            //     url:'',
            //     dataType:"JSON",
            //     success:function(data){},
            //     error:function(){}
            // });

            $.ajax({
                url:'ajax/diesel_limit/fetch.php',
                dataType:"JSON",
                success:function(data){

                    var n = 1;
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['dl_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['dl_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+                       

                                '<td>'+n+'</td>'+
                                '<td from_yard_id="'+value['from_yard_id']+'">'+value['from_yard']+' ('+value['from_yard_full']+') </td>'+
                                '<td to_yard_id="'+value['to_yard_id']+'">'+value['to_yard']+' ('+value['to_yard_full']+') </td>'+
                                '<td>'+value['limit_litre']+'</td>'+

                                '</tr>');

                        n++;
                    })
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        //loadData();

        function add(from_yard,to_yard,limit_litre)
        {
            $.ajax({
                url:'ajax/diesel_limit/add.php?from_yard='+from_yard+'&to_yard='+to_yard+'&limit_litre='+limit_litre,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        // fselectize.clear();
                        // tselectize.clear();
                        $('#from_yard').val('').trigger('change');
                        $('#to_yard').val('').trigger('change');
                        $('#limit_litre').val("");
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(dl_id,from_yard,from_yard_text,to_yard,to_yard_text,limit_litre)
        {
            $.ajax({
                url:'ajax/diesel_limit/update.php?dl_id='+dl_id+'&from_yard='+from_yard+'&to_yard='+to_yard+'&limit_litre='+limit_litre,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(from_yard_text);
                        trr.find('td').eq(3).text(to_yard_text);
                        trr.find('td').eq(4).text(limit_litre);
                        
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,dl_id)
        {
            $.ajax({
                url:'ajax/diesel_limit/delete.php?dl_id='+dl_id,
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

            $('#dl_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            // fselectize.clear();
            // tselectize.clear();
            $('#from_yard').val('').trigger('change');
            $('#to_yard').val('').trigger('change');
            $('#limit_litre').val('');

            $('#dl_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var dl_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,dl_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var dl_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#dl_id').val( dl_id );

            var from_yard_id = trr.find('td').eq(2).attr('from_yard_id'),
                to_yard_id = trr.find('td').eq(3).attr('to_yard_id');

            $('#from_yard').val(from_yard_id).trigger('change');
            $('#to_yard').val(to_yard_id).trigger('change');

            $('#limit_litre').val( trr.find('td').eq(4).text() );    

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var from_yard = $('#from_yard').val() ,
               from_yard_text = $('#from_yard option:selected').text(),
               to_yard = $('#to_yard').val(),
               to_yard_text = $('#to_yard option:selected').text(),
               limit_litre = $('#limit_litre').val(),
               dl_id =  $('#dl_id').val();

              // alert( from_yard_text + '  ' + to_yard_text );

           if( $(this).hasClass('update_form') ) 
           {
                update(dl_id,from_yard,from_yard_text,to_yard,to_yard_text,limit_litre);
           }
           else
           {
                add(from_yard,to_yard,limit_litre);
           }
        });



     });
 </script>