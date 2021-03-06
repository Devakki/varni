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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Printing/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Update Printing</h4><br>
                    <form action="<?php echo base_url('Printing/update');?>" method="post"  class="form-horizontal" >
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">LOT NO<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="lot_no" required class="xLot_No" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="<?php echo $printing->lot_no; ?>"><?php echo LOT.$printing->lot_no; ?></option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">DATE<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <input placeholder="dd/mm/yy" type="text" name="date" required="" class="form-control datepicker-autoclose" autocomplete="off" value="<?php echo date('d/m/Y',strtotime($printing->date)); ?>">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">LOT PCS<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <input placeholder="LOT PCS" type="text" name="lot_pcs" required="" class="form-control xlot_pcs" autocomplete="off" readonly value="<?php echo $lot_pcs->lot_pcs; ?>">
                                      <input  type="hidden" name="printing_id" required="" value="<?php echo $printing->printing_id; ?>">
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
                                        <th scope="col">DESIGN NO</th>
                                        <th scope="col">COLOR</th>
                                        <th scope="col">TOTAL PCS</th>
                                        <th scope="col">MISS PRINT</th>
                                        <th scope="col">PATLA</th>
                                        <th scope="col"></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php  foreach ($printing_lot as $key => $value) :?>
                                      <tr>
                                        <td>
                                          <input type="text" name="design_no[]" class="form-control sdesign"  placeholder="DESIGN NO"  required value="<?php echo $value->design_no; ?>" >
                                        <td>
                                          <input type="text" name="color[]" class="form-control" step="any" placeholder="COLOR" required value="<?php echo $value->color; ?>">
                                          <input type="hidden" name="pl_id[]" class="form-control" value="<?php echo $value->pl_id; ?>">
                                        </td>
                                        <td>
                                          <input type="number" name="pcs[]" class="form-control xTotal_Pcs" step="any" placeholder="TOTAL PCS" required value="<?php echo $value->pcs; ?>">
                                        </td>
                                        <td>
                                          <input type="number" name="miss_print[]" class="form-control xMiss_Print " step="any" placeholder="MISS PRINT" required value="<?php echo $value->miss_pcs; ?>">
                                        </td>
                                        <td width="20%">
                                          <select name="patla[]" class="xTrans" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                            <?php foreach ($patla as $key ): ?>
                                              <option value="<?php echo $key->patla_id; ?>" <?php echo (($key->patla_id==$value->patla_id)?"selected":"") ?>><?php echo $key->patla_name; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </td>
                                        <td>
                                        </td>
                                      </tr>
                                      <?php endforeach; ?>
                                      <tr id="xAppendNode">
                                        <td>
                                          <input type="text" name="design_no[]" class="form-control sdesign"  placeholder="DESIGN NO"  required >
                                        <td>
                                          <input type="text" name="color[]" class="form-control" step="any" placeholder="COLOR" required >
                                        </td>
                                        <td>
                                          <input type="number" name="pcs[]" class="form-control xTotal_Pcs" step="any" placeholder="TOTAL PCS" required >
                                        </td>
                                        <td>
                                          <input type="number" name="miss_print[]" class="form-control xMiss_Print " step="any" placeholder="MISS PRINT" required>
                                        </td>
                                        <td width="20%">
                                          <select name="patla[]" class="xTrans" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                            <?php foreach ($patla as $key ): ?>
                                              <option value="<?php echo $key->patla_id; ?>"><?php echo $key->patla_name; ?></option>
                                            <?php endforeach; ?>
                                          </select>
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
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PREVOIUS CLOTH VAL</label>
                                  <div class="col-8">
                                      <input placeholder="CLOTH VAL" type="number" step="any" name="" required class="form-control xCloth_Value" readonly autocomplete="off" value="<?php echo $balance->cut_pcs; ?>" >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PRINTING VAL</label>
                                  <div class="col-8">
                                      <input placeholder="PRINTING VAL"  type="number" step="any" name="printing_val" class="form-control xPrint_value" required readonly autocomplete="off" value="<?php echo $balance->cut_pcs+$printing->cloth_value; ?>">
                                  </div>
                              </div>
                          </div>
                          <div class="offset-md-4 col-md-4">
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">TOTAL DESIGN</label>
                                <div class="col-8">
                                    <input placeholder="TOTAL DESIGN" type="number" step="any" name="t_design" required readonly class="form-control xCTotalDesign" autocomplete="off" value="<?php echo $printing->t_design; ?>" >
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL PCS</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL PCS" type="number" name="t_pcs" required="" class="form-control xCTotalpcs  " readonly autocomplete="off" value="<?php echo $printing->t_pcs; ?>" >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL MISSPRINT</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL MISSPRINT"  type="number" step="any" name="t_missprint" class="form-control xCMissPrint  " required readonly autocomplete="off" value="<?php echo $printing->t_missprint; ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">CLOTH VAL</label>
                                  <div class="col-8">
                                      <input placeholder="CLOTH VAL" type="number" step="any" name="cloth_val" required class="form-control XC_Meter_Value" autocomplete="off" value="<?php echo $printing->cloth_value; ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">SUB TOTAL</label>
                                  <div class="col-8">
                                      <input placeholder="SUB TOTAL" type="number" step="any" name="sub_total" required="" class="form-control xSub_Total " readonly autocomplete="off" value="<?php echo $printing->sub_total; ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TAX (<?php echo TAX;?>%)</label>
                                  <div class="col-8">
                                      <input placeholder="TAX"  type="number" step="any" name="tax" required="" class="form-control xxTax " readonly  autocomplete="off" value="<?php echo $printing->t_design; ?>" value="<?php echo $printing->tax; ?>"> 
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">GRAND TOTAL</label>
                                  <div class="col-8">
                                      <input placeholder="GRAND TOTAL" type="number" step="any" name="g_total" required="" class="form-control xCGrand_Total" autocomplete="off" readonly="" value="<?php echo $printing->g_total; ?>">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group text-center m-t-20 m-b-20">
                        <button class="btn btn-primary waves-effect waves-light" onclick="return validateForm()" type="submit">
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
    $('#xAppendNode').remove();
    var i=2;
    $('body').on('keyup','.xTotal_Pcs', function(e){
        calculate_meter();
    });
    $('body').on('keyup','.xMiss_Print', function(e){
        calculate_meter();
    }); 
    $('body').on('keyup','.XC_Meter_Value', function(e){
        calculate_meter();
    });
    $('body').on('keyup','.sdesig', function(e){
        calculate_meter();
    });
    $('body').on('click','.btn-add', function(){
        let tr=$(this).parents('tr');
        tr.before('<tr id="tr'+i+'">'+appendnode+'</tr>');
        $('select').select2();
        $('#tr'+i).find('.sdesign').focus();
        i++;
        calculate_meter();
        return false;
    });
    $('body').on('click','.btn-remove', function(){
        $(this).parents('tr').remove();
        calculate_meter()
        return false;
    });
    $('select').select2();
});
  function calculate_meter(){
      var sub_meter = 0;
      var sub_taka = 0;
      var cloth_value=$(".xCloth_Value").val();
      if(!cloth_value){
        $.toast({
                 heading: 'Oh snap!',
                 text: 'Please Select Lot No',
                 position: 'top-right',
                 loaderBg: '#bf441d',
                 icon: 'error',
                 hideAfter: 3000,
                 stack: 1
         });
        return false;
      }else{
        pcs_value=$('.XC_Meter_Value').val();
        $('.xPrint_value') .val((pcs_value*1+cloth_value*1).toFixed(2));
      }
      var rowCount = $('#myTable >tbody >tr').length;
      $('.xCTotalDesign ').val(rowCount-1);
        var totalpcs = 0;
      $('.xTotal_Pcs').each(function(){
          totalpcs += parseFloat($(this).val());         
      });
      $('.xCTotalpcs').val(totalpcs);
        var missprint = 0;
      $('.xMiss_Print').each(function(){
          missprint += parseFloat($(this).val());         
      });
      var xCTotalpcs=$('.xCTotalpcs').val();
      var xC_Meter_Value=$('.XC_Meter_Value').val();
      $('.xCMissPrint').val(missprint);
      xCMetervalue=xCTotalpcs*xC_Meter_Value;
      $('.xSub_Total').val(xCMetervalue.toFixed(2))
      tax=(xCMetervalue*5)/100;
      g_total=Math.round(xCMetervalue+tax);
      $('.xCGrand_Total').val(g_total);
      $('.xxTax').val(tax.toFixed(2));
    }
  function validateForm(){
    let t_pcs=parseInt($('.xCTotalpcs').val());
    let lot_pcs=parseInt($('.xlot_pcs').val());
    let t_missprint=parseInt($('.xCMissPrint').val());
    let total_pcs=t_pcs+t_missprint;
    if(total_pcs <= lot_pcs){
      return true;
    }else{
      $.toast({
              text: 'ENTER PCS UNDER '+lot_pcs,
              position: 'top-right',
              loaderBg: '#bf441d',
              icon: 'error',
              hideAfter: 3000,
              stack: 1
      });
      return false;
    }
  }
</script> 