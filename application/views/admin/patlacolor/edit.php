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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Cut/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Update Patla Color</h4><br>
                    <form action="<?php echo base_url('PatlaColor/update');?>" method="post"  class="form-horizontal" >
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">PATLA<span class="text-danger">*</span></label>
                                    <div class="col-8">
                                        <select name="patla" id="patla" class="xPatla" >
                                              <option value="<?php echo $patla->patla_id; ?>"><?php echo $patla->patla_name; ?></option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">DATE<span class="text-danger">*</span></label>
                                    <div class="col-8">
                                        <input placeholder="dd/mm/yy" type="text" name="date" required="" class="form-control datepicker-autoclose" autocomplete="off" value="<?php echo date('d/m/Y',strtotime($patla_color->date)); ?>">
                                        <input type="hidden" name="patlacolor_id" required="" value="<?php echo $patla_color->patlacolor_id; ?>">
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
                                          <th scope="col" width="25%">COLOR</th>
                                          <th scope="col">QTY</th>
                                          <th scope="col">RATE</th>
                                          <th scope="col">AMOUNT</th>
                                          <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <?php foreach ($patla_color_lot as $key => $value) { ?>
                                        <tr>
                                          <td>
                                          <select name="color[]" class="sColor">
                                            <?php foreach ($color as $key1 => $value2): ?>
                                              <option value="<?php echo $value2->color_id; ?>" <?= ($value2->color_id == $value->color_id ?"selected":"" )?>><?php echo ucwords($value2->color_name); ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                          <td>
                                            <input type="hidden" name="lot_id[]" required value="<?= $value->pcd_id; ?>" >
                                            <input type="number" name="qty[]" class="form-control sQty" step="any" placeholder="Qty(gm)" required value="<?= $value->qty; ?>" >
                                          </td>
                                          <td>
                                            <input type="number" step="any" name="rate[]" class="form-control sRate" placeholder="RATE" required value="<?= $value->rate; ?>" >
                                          </td>
                                          <td>
                                            <input type="number" step="any" name="amount[]" class="form-control sAmount" readonly placeholder="AMOUNT" required value="<?= $value->amount; ?>">
                                          </td>
                                          <td>
                                          </td>
                                        </tr>
                                        <?php } ?>
                                        <tr id="xAppendNode">
                                          <td>
                                          <select name="color[]" class="sColor">
                                         <?php foreach ($color as $key => $value): ?>
                                              <option value="<?php echo $value->color_id; ?>"><?php echo ucwords($value->color_name); ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                          <td>
                                            <input type="number" name="qty[]" class="form-control sQty" step="any" placeholder="Qty(gm)" required  >
                                          </td>
                                          <td>
                                            <input type="number" step="any" name="rate[]" class="form-control sRate" placeholder="RATE" required >
                                          </td>
                                          <td>
                                            <input type="number" step="any" name="amount[]" class="form-control sAmount" readonly placeholder="AMOUNT" required >
                                          </td>
                                          <td>
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm btn-remove "><i class=" fa fa-minus"></i></button>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="4">
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
                                    <label for="name" class="col-4 col-form-label">TOTAL QTY</label>
                                    <div class="col-8">
                                        <input placeholder="TOTAL COLOR"  type="number" step="any" name="t_color_qty" class="form-control xQty" required readonly value="<?= $patla_color->total_qty; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">TOTAL</label>
                                    <div class="col-8">
                                        <input placeholder="TOTAL" type="number" step="any" name="total" required="" class="form-control xTotal" readonly value="<?= $patla_color->total; ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20 m-b-20">
                          <button class="btn btn-primary waves-effect waves-light"  type="submit">
                            Update
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
    $('#xAppendNode').remove();
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
      $(this).parents('tr').remove();
        calculate_meter()
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