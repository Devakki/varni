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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Devide/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Update Return Devide</h4><br>
                    <form action="<?php echo base_url('ReturnDevide/update');?>" method="post"  class="form-horizontal" >
                        <div class="row">         
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label for="name" class="col-4 col-form-label">PATLA <span class="text-danger">*</span></label>
                              <div class="col-8">
                                <select name="patla" id="patla" class="xParty">
                                  <option value="<?php echo $patla->patla_id; ?>"><?php echo $patla->patla_name; ?></option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">DATE<span class="text-danger">*</span></label>
                            <div class="col-8">
                              <input placeholder="dd/mm/yy" type="text" name="date" required="" class="form-control datepicker-autoclose" autocomplete="off" value="<?php echo date('d/m/Y',strtotime($devide->date)); ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">TOTAL PCS<span class="text-danger">*</span></label>
                            <div class="col-8">
                                <input placeholder="TOTAL PCS" type="text"  required="" class="form-control xTotalPis" autocomplete="off" readonly value="<?php echo $devide_lot->total_pcs?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">PARTY<span class="text-danger">*</span></label>
                            <div class="col-8">
                              <select name="party" id="party" class="xParty" >
                                  <option value="<?php echo $party->party_id; ?>"><?php echo $party->party_name; ?></option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label for="name" class="col-4 col-form-label">ITEM<span class="text-danger">*</span></label>
                            <div class="col-8">
                              <select name="item" class="xItem" id="item">
                                <option value="<?php echo $item->item_id; ?>"><?php echo $item->item_name; ?></option>
                              </select>
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
                                        <th scope="col" width="25%">CHALLAN</th>
                                        <th scope="col">PCS</th>
                                        <th scope="col">MISS PRINT</th>
                                        <th scope="col">RATE</th>
                                      </tr>
                                  </thead>
                                  <tbody id="tableBody">
                                      <tr id="xAppendNode">
                                        <td>
                                          <select name="challan" class="sChallan" id="challan">
                                              <option value="<?php echo $devide->returndevide_id; ?>"><?php echo $devide->devide_challan_no; ?></option>
                                          </select>
                                        <td>
                                          <input placeholder="PCS" type="text" name="total_pcs" required=""  class="form-control xtotalPcs" value="<?php echo $devide->total_pcs; ?>" >
                                          <input type="hidden" name="returndevide_id" value="<?php echo $devide->returndevide_id; ?>" >
                                        </td>
                                        <td>
                                          <input placeholder="MISS PRINT" type="text" name="miss_print" required="" class="form-control vMissPrint" value="<?php echo $devide->miss_pcs; ?>" >
                                        </td>
                                        <td>
                                          <input placeholder="RATE" type="text" name="rate" required="" class="form-control vRate" value="<?php echo $devide->rate; ?>">
                                        </td>
                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div class="offset-md-6 col-md-6 mt-5">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL AMOUNT</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL AMOUNT"  type="number" step="any" name="total_rate" class="form-control xVtRate" required readonly value="<?php echo $devide->g_total; ?>">
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
    $('select').select2();
    $('body').on('keyup','.xtotalPcs,.vMissPrint,.vRate', function(e){
      calculate();
    });
});
function validateForm(){
    var t_total_pcs= parseInt($('.xTotalPis').val());
    var t_devide_pcs= parseInt($('.xtotalPcs').val());
    var t_miss_pcs=parseInt($('.vMissPrint').val());
    if(t_total_pcs >= (t_devide_pcs + t_miss_pcs) ){
      return true;
    }
    swal("error","TOTAL PCS GRATHER THEN PCS","warning","#4fa7f3");
    return false;
}
function calculate(){
  var pcs=parseFloat($('.xtotalPcs').val());
  var rate=parseFloat($('.vRate').val());
  var total=pcs*rate;
  total=total.toFixed(1);
  $('.xVtRate').val(total);
}
  
</script> 