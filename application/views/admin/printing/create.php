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
                    <h4 class="m-t-0 header-title text-center">Add Printing</h4><br>
                    <form action="<?php echo base_url('Printing/create');?>" method="post"  class="form-horizontal" >

                        <div class="row">
                             <div class="col-md-4">
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
                              </div>
                              <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Item<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="item" class="xItem" id="item">
                                      </select>
                                  </div>
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Challan<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="challan" class="sChallan" id="challan">
                                      </select>
                                  </div>
                              </div>
                              </div>
                        </div>
                        <div class="row">
                         
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Patla<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                  <select name="patla" class="sPatla"  data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                          </select>  
                                 </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">DATE<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <input placeholder="dd/mm/yy" type="text" name="date" required="" class="form-control datepicker-autoclose" autocomplete="off" value="<?php echo date('d/m/Y'); ?>">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                          <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL PCS<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL PCS" type="text" name="total_pcs" required="" class="form-control xtotalPcs" autocomplete="off" >
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

                                        <th scope="col"></th>
                                      </tr>
                                  </thead>
                                  <tbody id="tableBody">
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
                                <label for="name" class="col-4 col-form-label">TOTAL DESIGN</label>
                                <div class="col-8">
                                    <input placeholder="TOTAL DESIGN" type="number" step="any" name="t_design" required readonly class="form-control xCTotalDesign" autocomplete="off" >
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL PCS</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL PCS" type="number" name="t_pcs" required="" class="form-control xCTotalpcs  " readonly autocomplete="off" >
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL MISSPRINT</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL MISSPRINT"  type="number" step="any" name="t_missprint" class="form-control xCMissPrint  " required readonly autocomplete="off">
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
    $("select").select2();
    let appendnode=$('#xAppendNode').html();
    let tablebody=$('#tableBody').html();
    var i=2;
    
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
        var challan_no=$(this).val();
        $.ajax({                                            
            url:"<?php echo base_url('Printing/get_patla/') ?>",
            type: "POST",
            data: {challan_no: challan_no},
            success: function(result){
                var result  = JSON.parse(result);                                
                if(result.status=="success"){
                  $('.sPatla').append('<option></option>');           
                  $.each(result.patla,function(key,value)
                  {
                    $('.sPatla').append('<option value=' + value.patla_id + '>' + value.patla_name + '</option>');
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
        let patla=tr.prev().find('.xTrans').html();
        tr.before('<tr id="tr'+i+'">'+appendnode+'</tr>');
        $('select').select2();
        $('#tr'+i).find('.sdesign').focus();
        $('#tr'+i).find('.xTrans').html(patla);
        i++;
        calculate_meter();
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
  function calculate_meter(){
      var sub_meter = 0;
      var sub_taka = 0;
      
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
    let lot_pcs=parseInt($('.xtotalPcs').val());
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