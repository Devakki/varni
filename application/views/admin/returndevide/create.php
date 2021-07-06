<style type="text/css">
  .form-group.error input, .form-group.error select, .form-group.error textarea {
    border: 2px solid #ef5350;
}
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left"><?php echo $page_title; ?></h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashbord');?>"><?php echo COMPANY; ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('ReturnDevide/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Add ReturnDevide</h4><br>
                    <form action="<?php echo base_url('ReturnDevide/create');?>" method="post"  class="form-horizontal" >
                        <div class="row">         
                            <div class="col-md-8 ofset-2">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PATLA ACCOUNT<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="patla" id="patla" class="xParty" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                       <?php foreach ($patla as $key => $value): ?>
                                                      <option value="<?php echo $value->patla_id; ?>"><?php echo $value->patla_name; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">DATE<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <input placeholder="dd/mm/yy" type="text" name="date" required="" class="form-control datepicker-autoclose" autocomplete="off" value="<?php echo date('d/m/Y'); ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PARTY<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="party" id="party" class="xParty" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
                                        <?php foreach ($party as $key => $value): ?>
                                            <option value="<?php echo $value->party_id; ?>"><?php echo $value->party_name; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Item<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="item" class="xItem" id="item">
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Challan<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="challan" class="sChallan" id="challan">
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL PCS<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL PCS" type="text" name="total_pcs" required="" class="form-control xtotalPcs" autocomplete="off" >
                                  </div>
                              </div>
                          </div>                 
                         
                      </div>
                     
                      <div class="form-group text-center m-t-20 m-b-20">
                        <button class="btn btn-primary waves-effect waves-light" onclick="return validateForm()" type="submit">
                          Add
                        </button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('form').parsley();
    $('select').select2();
    $('body').on('keyup','.xPcs', function(e){
          $('.xCTotal_pcs').val($(this).val()); 
    });
    $('body').on('change','.xParty', function(e){
        var id = $(this).val(); 
        $('.xItem').empty();
        $(this).focus();
        $("select").select2();
        $.ajax({                                            
          url:"<?php echo base_url('cut/get_item/') ?>"+id+"",
          type: "POST",
          success: function(result){
            var result  = JSON.parse(result);                            
            if(result.status=="success"){
              $('.xItem').append('<option></option>');
              $.each(result.item,function(key, value)
              {               
                $('.xItem').append('<option value=' + value[0] + '>' + value[1] + '</option>');
              });
            }
          }
        });
    })
    $('body').on('change','.xItem', function(e){
        var item=$(this).val(); 
        $("select").select2();
        $(this).focus();
        var party=$(".xParty").val();
        $.ajax({                                            
            url:"<?php echo base_url('returndevide/get_challan/') ?>",
            type: "POST",
            data: {item: item, party: party},
            success: function(result){
                var result  = JSON.parse(result);                                
                if(result.status=="success"){
                  $('.sChallan').append('<option></option>');           
                  $.each(result.challan_no,function(key,value)
                  {
                    $('.sChallan').append('<option value=' + value.challan_no + '>' + value.challan_no + '</option>');
                  });             
                }
            }
        });
    });
    $('body').on('change','.sChallan', function(e){
        var lot_no=$(this).val();
        $.ajax({                                            
              url:"<?php echo base_url('ReturnDevide/totalpcs/')?>"+lot_no+"",
              type: "POST",
              success: function(result){
                  var result  = JSON.parse(result);                                
              if(result.status=="success"){
                    $('.xtotalPcs').val((result.flag.total_pcs));
                  }
                } 
            });
        });
    });
  function validateForm(){
     var Lot_pcs=parseInt($('.xtotalPcs').val());
          if(Lot_pcs==0){
            $.toast({
                      heading: 'Oh snap!',
                      text: 'Pcs is zero',
                      position: 'top-right',
                      loaderBg: '#bf441d',
                      icon: 'error',
                      hideAfter: 3000,
                      stack: 1
              });
              return false;
          }
          else{
            return true;
          }
  }
</script> 