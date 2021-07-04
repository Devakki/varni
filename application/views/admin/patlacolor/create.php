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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('PatlaColor/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Add Patla Color</h4><br>
                    <form action="<?php echo base_url('PatlaColor/create');?>" method="post"  class="form-horizontal" >
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Patla<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="patla" id="patla" class="xPatla" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
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
                              
                          </div>
                          
                      </div>
                      <div class="row m-t-50">
                          <div class="col-lg-12">
                              <div style="overflow-x:auto; ">
                                <table class="table" id="myTable" style="min-width: 1080px;">
                                  <thead>
                                      <tr>
                                        <th scope="col" width="15%">Color</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col"></th>
                                      </tr>
                                  </thead>
                                  <tbody id="tableBody">
                                      <tr id="xAppendNode">
                                        <td>
                                        <select name="color[]" class="sColor">
                                       <?php foreach ($color as $key => $value): ?>
                                                      <option value="<?php echo $value->color_id; ?>"><?php echo $value->color_name; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                        <td>
                                          <input type="number" name="qty[]" class="form-control sQty" step="any" placeholder="Qty(gm)" required  >
                                        </td>
                                        <td>
                                          <input type="number" step="any" name="rate[]" class="form-control sRate" placeholder="rate" required >
                                        </td>
                                        <td>
                                          <input type="number" step="any" name="amount[]" class="form-control sAmount" readonly placeholder="Amount" required >
                                        </td>
                                        <td>
                                          <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm btn-remove "><i class=" fa fa-minus"></i></button>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="5">
                                        </td>
                                        <td>
                                          <button type="button" class="btn waves-effect waves-light btn-secondary btn-add btn-sm"> <i class="fa fa-plus"></i> </button>
                                        </td>
                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div class="offset-md-8 col-md-4">
                             
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL Qty</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL COLOR"  type="number" step="any" name="t_color_qty" class="form-control xQty" required readonly autocomplete="off">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL" type="number" step="any" name="total" required="" class="form-control xTotal" readonly autocomplete="off" >
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group text-center m-t-20 m-b-20">
                        <button class="btn btn-primary waves-effect waves-light"  type="submit">
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
    let appendnode=$('#xAppendNode').html();
    let tablebody=$('#tableBody').html();
    var i=2;
    $('body').on('change','.xpatla', function(e){
        var id = $(this).val(); 
        $('#tableBody').empty();      
        $('#tableBody').html(tablebody);
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
    });
    $('body').on('change','.xItem', function(e){
        var item=$(this).val(); 
        $('#tableBody').empty();      
        $('#tableBody').html(tablebody);
        $("select").select2();
        $(this).focus();
        var patla=$(".xpatla").val();
        $.ajax({                                            
            url:"<?php echo base_url('cut/get_challan/') ?>",
            type: "POST",
            data: {item: item, patla: patla},
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
        var id = $(this).val();
        var tr =$(this).parents('tr'); 
        var patla=$('.xpatla').val();
        var item=$('.xItem').val(); 
        $.ajax({                                            
            url:"<?php echo base_url('cut/get_rowdetail/') ?>",
            type: "POST",
            data:{challan:id,patla:patla,item:item},
            success: function(result){
              var result  = JSON.parse(result);                                
              if(result.status=="success"){ 
                tr.find('.sPMeter').val(result.row.total_meter);
                calculate_meter();            
              }
            }
        });
    });
    $('body').on('keyup','.sQty', function(e){
        tr=$(this).parents('tr');
        calculate_obj(tr);
        calculate_meter();
    });
    $('body').on('keyup','.sRate', function(e){
        tr=$(this).parents('tr');
        calculate_obj(tr);
        calculate_meter();
    });
    $('.xLotno').keyup(function() {
      
        let value=$(this).val();        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('PatlaColor/check_lotno')?>",
            data: {lot_no:value},
            success: function(data){
              var data  = JSON.parse(data);                                          
              if(data.status=="success")
              {
                $("#exist").val("1");
                $(".xLotno").removeClass("has-error"); 
              }else
              {
                $("#exist").val("0");
                $.toast({
                        text: data.msg,
                        position: 'top-right',
                        loaderBg: '#bf441d',
                        icon: 'error',
                        hideAfter: 3000,
                        stack: 1
                });
                $(".xLotno").addClass("has-error");               
              }
            } 
        });
    });
    $('body').on('click','.btn-add', function(){
      let tr=$(this).parents('tr');
      var challan=$("#xAppendNode").find('.sColor').html();
      tr.before('<tr id="tr'+i+'">'+appendnode+'</tr>');
      $("#tr"+i+"").find('.sColor').html(challan);  
      $('select').select2();
      i++;
      return false;
    });
    $('body').on('click','.btn-remove', function(){
      var fst_tr=$(this).parents('tr').attr("id");
      if(fst_tr=="xAppendNode"){
        return false;
      }else{
        $(this).parents('tr').remove();
        calculate_meter()
      }
      return false;
    });
    $('select').select2();
});
function calculate_obj($tr){
    var sQty=parseInt($tr.find('.sQty').val());
    var sRate =parseFloat($tr.find('.sRate').val());
    var amount = sQty * sRate;
    $tr.find('.sAmount').val(amount);
}
function calculate_meter(){
  
    var sQty=0
    $('.sQty').each(function(){
      sQty += parseFloat($(this).val());        
    });
    $('.xQty').val(sQty);
    var sAmount =0;
    $('.sAmount').each(function(){
      sAmount  += parseFloat($(this).val());        
    });
    $('.xTotal').val(sAmount);
   
  }
  
</script> 