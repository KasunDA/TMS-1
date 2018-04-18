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
                                            <label class="col-md-2 control-label">1 Litter Rate:</label>
                                            <div class="col-md-3">
                                               <input type="number" step="0.01" min="0.0" id="litre_rate" name="litre_rate" required tabindex="5" class="form-control" placeholder="100">
                                            </div>
                                            <label class="col-md-2 control-label">Total Price #:</label>
                                            <div class="col-md-3">
                                               <input type="number" step="0.01"  readonly id="total" name="total" class="form-control" placeholder="total" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Extra Litters:</label>
                                            <div class="col-md-3">
                                               <input type="number" class="form-control" min="0" id="extra_litres" name="extra_litres" required tabindex="6" placeholder="7">
                                            </div>
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-3">
                                               <textarea class="form-control" placeholder="Why extra Litters" id="description" name="description" required tabindex="7" ></textarea>
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
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                 <thead>
                                     <tr>
                                         <th> Actions </th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Vehicle # </th>
                                         <th> From </th>
                                         <th> To </th>
                                         <th> 1 Litter Rate </th>
                                         <th> Extra Litters </th>   
                                         <th> Total Price </th>   
                                         <th> Description </th>   
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php 

                                                $q = mysqli_query($mycon,'SELECT * FROM diesel_entry WHERE status=1 ORDER BY de_id DESC ');
                                                $n  = 1;
                                                while($r = mysqli_fetch_array($q))
                                                {?>
                                                    <tr class="odd gradeX">

                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green update_btn" id="<?php echo $r['de_id']; ?>"  type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red delete_btn" id="<?php echo $r['de_id']; ?>" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                    </td>
                                                    <td><?php echo $n ?></td>
                                                    <td><?php echo $r['datee']; ?></td>
                                                    <?php  $q1 = mysqli_query($mycon,'SELECT vehicle_number from vehicle where vehicle_id='.$r['vehicle_id']);
                                                    $r1 = mysqli_fetch_array($q1)?>
                                                    <td id="<?php echo $r['vehicle_id']?>"><?php echo $r1['vehicle_number']; ?></td>
                                                    
                                                    <?php

                                                        $fq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['from_yard_id']);

                                                        if($fq)
                                                        {
                                                            $rfq = mysqli_fetch_array($fq);?>
                                                            <td id="<?php echo $r['from_yard_id'] ?>"><?php echo $rfq['short_form']; ?></td> ;
                                                        
                                                        <?php

                                                        }

                                                        $tq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['to_yard_id']);

                                                        if($tq)
                                                        {
                                                            $rtq = mysqli_fetch_array($tq);?>
                                                            <td id="<?php echo $r['to_yard_id'] ?>"><?php echo $rtq['short_form'];?></td>
                                                        <?php    
                                                        }
                                                    ?>
                                                    <td><?php echo $r['litre_rate']; ?></td>
                                                    <td><?php echo $r['extra_litres']; ?></td>
                                                    <td><?php echo $r['total']; ?></td>
                                                    <td><?php echo $r['description']; ?></td>

                                                </tr>

                                                <?php 
                                                    $n++;
                                                }// END OF WHILE


                                             ?>
                                     <!-- <tr class="odd gradeX">
                                         <td> 15 </td>
                                         <td> 02/3/2018 </td>
                                         <td> EN865 </td>
                                         <td> Port Qasim </td>
                                         <td> Agha Steel </td>
                                         <td> 110 </td>
                                         <td> Nil </td>
                                         <td> Nil </td>
                                         <td> 11000 </td>
                                     </tr> -->
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
                                            <td> One litter Price</td>
                                            <td> 110 </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Total Litters </td>
                                            <td> 120 </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Extra Litters </td>
                                            <td> 20 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Total Price </td>
                                            <td> 15400 </td>
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

        $('#litre_rate,#extra_litres').on('keyup change',function(){
            $('#total').val($('#litre_rate').val()*$('#extra_litres').val());
        });

        //Select2 from _yard
        $('#vehicle_id,#from_yard_id,#to_yard_id').select2({
            width: 'resolve'
        });

        function loadData()
        {
            $.ajax({
                url:'ajax/diesel_entry/fetch.php',
                dataType:"JSON",
                success:function(data){

                    var n = 1;
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

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
                                '<td>'+value['extra_litres']+'</td>'+
                                '<td>'+value['total']+'</td>'+
                                '<td>'+value['description']+'</td>'+

                                '</tr>');

                        n++;
                    })
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        // loadData();

        function add(datee,vehicle_id,from_yard_id,to_yard_id,litre_rate,extra_litres,total,description)
        {
            $.ajax({
                url:'ajax/diesel_entry/add.php?datee='+datee+'&vehicle_id='+vehicle_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&litre_rate='+litre_rate+'&extra_litres='+extra_litres+'&total='+total+'&description='+description,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('form select').val('').trigger('change');
                        $('#extra_litres,#description').val('');
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(de_id,datee,vehicle_id,vehicle_number,from_yard_id,from_yard_text,to_yard_id,to_yard_text,litre_rate,extra_litres,total,description)
        {
            $.ajax({
                url:'ajax/diesel_entry/update.php?de_id='+de_id+'&datee='+datee+'&vehicle_id='+vehicle_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&litre_rate='+litre_rate+'&extra_litres='+extra_litres+'&total='+total+'&description='+description,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(datee);
                        trr.find('td').eq(3).text(vehicle_number);
                        trr.find('td').eq(4).text(from_yard_text);
                        trr.find('td').eq(5).text(to_yard_text);
                        trr.find('td').eq(6).text(litre_rate);
                        trr.find('td').eq(7).text(extra_litres);
                        trr.find('td').eq(8).text(total);
                        trr.find('td').eq(9).text(description);
                        
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
            $('#extra_litres').val( trr.find('td').eq(7).text() );
            $('#total').val( trr.find('td').eq(8).text() );    
            $('#description').val( trr.find('td').eq(9).text() );    

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
               extra_litres = $('#extra_litres').val(),
               total = $('#total').val(),
               description = $('#description').val(),
               de_id =  $('#de_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(de_id,datee,vehicle_id,vehicle_number,from_yard_id,from_yard_text,to_yard_id,to_yard_text,litre_rate,extra_litres,total,description);
           }
           else
           {
                add(datee,vehicle_id,from_yard_id,to_yard_id,litre_rate,extra_litres,total,description);
           }
        });



     });
 </script>