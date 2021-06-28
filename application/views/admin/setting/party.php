<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left"><?php echo $page_title; ?></h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashbord');?>"><?php echo COMPANY; ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Party/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-box">
                    <center><h4 class="header-title m-t-0"><?php echo (($method=="edit")?"Update Party":"Add Party" )?></h4></center><br>
                    <form id="<?php echo (($method=="edit")?"$frm_id":"$frm_id");?>" class="form-horizontal" role="form" >
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">NAME<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="PARTY NAME" type="text" name="name" title="Party Name" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->party_name:"");  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">SRT NAME<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="SRT NAME" type="text" name="srt_name" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->srt_name:"");  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">MOBILE<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="MOBILE" type="number" name="mobile" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->mobile_number:"");  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">CITY<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="CITY Name" type="text" name="city" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->city:"");  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">ADDRESS<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="ADDRESS" type="text" name="address" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->address:"");  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">GST NO<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="GST NO" type="text" name="gst_no" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->gst_number:"");  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">PAN NO<span class="text-danger">*</span></label>
                            <div class="col-9">
                                <input placeholder="PAN NO" type="text" name="pan_no" required="" class="form-control" autocomplete="off" value="<?php echo (($method=="edit")?$result->pan_number:"");  ?>">
                            </div>
                        </div>
                        <?php if($method=="edit"): ?> 
                        <div class="form-group row">
                            <label for="status" class="col-3 col-form-label">STATUS</label>
                            <div class="col-9">
                                <select class="selectpicker" name="status"  data-style="btn-custom">
                                    <option value="1" <?php echo (($method=="edit")?(($result->status=="1")?"selected":""):"");  ?>>Active</option>                
                                    <option value="0" <?php echo (($method=="edit")?(($result->status=="0")?"selected":""):"");  ?>>InActive</option>
                                </select>
                                <?php echo (($method=="edit")?'<input type="hidden" name="id" value="'.$result->party_id.'">':""); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group text-center m-t-20 m-b-20 ">
                          <button class="btn btn-primary waves-effect waves-light" type="submit">
                              <?php echo (($method=="edit")?"Update":"Add") ?>
                          </button>
                      </div>
                    </form>
                </div>
            </div>
            <?php if($method !="edit") :?>
            <div class="col-md-8">
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>PARTY</th>
                            <th>SRT NAME</th>
                            <th>MOBILE</th>
                            <th>CITY</th>
                            <th>ADDRESS</th>
                            <th>GST NO</th>
                            <th>PAN NO</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
          <?php endif; ?>
        </div>
    </div> 
</div> 
<script type="text/javascript">
    $(document).ready(function() {
      $('form').parsley();
      $('select').select2();
      <?php if($method !="edit") :?>
        var table = $('#datatable-buttons').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            dom: 'Blfrtip',
            ajax: {
                   "url": "<?php echo base_url('Party/getLists/'); ?>",
                   "type": "POST",
               },
            columnDefs: [{ "targets": [8], "orderable": false}],
            buttons: ['print','copy', 'excel', 'colvis'],
            lengthChange: false,
        });
      <?php endif; ?>
       $('#datatable-buttons').on('click', '[data-id=delete]', function () {                        
            var id= $(this).data("value");
            swal({
                    title: 'Are you sure delete?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4fa7f3',
                    cancelButtonColor: '#d57171',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('Party/delete/');?>"+id+"",
                  success: function(data){
                    var data  = JSON.parse(data);
                    if(data.status=="success"){
                        swal("success",data.message,"success","#4fa7f3");
                       table.ajax.reload();
                    }else{
                        swal("error",data.message,"warning","#4fa7f3");
                    }
                  }
                });
            })
        });
        $("#Add_frm").submit(function(event){
           event.preventDefault();
           var data=$(this).serialize();            
           $.ajax({
               url: "<?php echo base_url('Party/create')?>",
               type: "POST",
               data: data,              
               success: function(result){
                   var result  = JSON.parse(result);
                   if(result.status=="success"){
                       swal("success",result.msg,"success","#4fa7f3");
                        $('#Add_frm')[0].reset();
                        table.ajax.reload();
                   }else{
                       swal("error",result.msg,"warning","#4fa7f3");
                   }
               }
           });
        });
        $("#Edit_frm").submit(function(event){
           event.preventDefault();              
           var data=$(this).serialize();            
           $.ajax({
               url: "<?php echo base_url('Party/update')?>",
               type: "POST",
               data: data,              
               success: function(result){
                   var result  = JSON.parse(result);
                   if(result.status=="success"){
                       swal("success",result.msg,"success","#4fa7f3").then(function () { 
                        window.location="<?php echo base_url("Party");?>";            
                   });
                   }else{
                       swal("error",result.msg,"warning","#4fa7f3");
                   }
               }
           });
       });
    });
</script>