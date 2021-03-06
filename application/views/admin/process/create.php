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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Process/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Add Process</h4><br>
                    <form action="<?php echo base_url('Process/create');?>" method="post"  class="form-horizontal" >
                        <div class="row">
                          <div class="col-md-4">
                          <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">CENTER<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="party" required class="xParty" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
                                        <?php foreach ($center as $key => $value): ?>
                                            <option value="<?php echo $value->emuser_id; ?>"><?php echo $value->em_name; ?></option>
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
                         
                          <div class="col-md-4">
                                <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PARTY<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="party" required class="xParty" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
                                        <?php foreach ($party as $key => $value): ?>
                                            <option value="<?php echo $value->party_id; ?>"><?php echo $value->party_name; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">ITEM<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="item" required class="xItem" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
                                        <?php foreach ($item as $key => $value): ?>
                                            <option value="<?php echo $value->item_id; ?>"><?php echo $value->item_name; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                         
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PRINT CODE<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="lot_no" required class="xLot_no" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
                                        <?php foreach ($lot_no as $key => $value): ?>
                                            <option value="<?php echo $value->lot_no; ?>"><?php echo LOT.$value->lot_no; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">PROCESS<span class="text-danger">*</span></label>
                                  <div class="col-8">
                                      <select name="sb_id" required class="xProcess" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                        <option value="0">None</option>
                                        <?php foreach ($sub_process as $key => $value): ?>
                                            <option value="<?php echo $value->id_sub_process; ?>"><?php echo $value->name; ?></option>
                                        <?php endforeach; ?>
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
                                        <th scope="col" width="20%">DESIGN NO</th>
                                        <th scope="col">COLOR</th>
                                        <th scope="col">TOTAL PCS</th>
                                        <th scope="col"></th>
                                      </tr>
                                  </thead>
                                  <tbody id="tableBody">
                                      <tr id="tr1">
                                        <td>
                                          <select class="sDesign" name="design_no[]" data-parsley-min="1"  data-parsley-min-message="Select Any Design">
                                          </select>
                                        <td>
                                          <input type="text" name="color[]" class="form-control sColor" step="any" placeholder="COLOR" required readonly>
                                        </td>
                                        <td>
                                          <input type="number" name="pcs[]" class="form-control sD_Pcs" step="any" placeholder="TOTAL PCS" required >
                                        </td>
                                       
                                        <td>
                                          <button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm btn-remove "><i class=" fa fa-minus"></i></button>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="3">
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
                                    <input placeholder="TOTAL DESIGN" type="number" step="any" name="t_design" required readonly class="form-control xT_Design" autocomplete="off" >
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">TOTAL PCS</label>
                                  <div class="col-8">
                                      <input placeholder="TOTAL PCS" type="number" name="t_pcs" required="" class="form-control xT_Pcs" readonly autocomplete="off" >
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
    let appendnode=$('#tr1').html();
    let trappnode='<tr class=""><td><select name="design_no[]"><option value="LTfJxVlLLcpF">miss-print</option></select></td><td><input name="color[]" type="text" class="form-control sColor number" placeholder="COLOR" value="mix" required="" readonly></td><td><input name="pcs[]" type="number" class="form-control sD_Pcs" placeholder="TOTAL PCS" required=""></td><td><select name="patla[]" class="sPatla"><option value="1">All Patla</option></select></td><td><button type="button" class="btn btn-icon waves-effect waves-light btn-danger btn-sm btn-remove "><i class=" fa fa-minus"></i></button></td> </tr>';
    let tablebody=$('#tableBody').html();
    var i=2;
    $('body').on('change','.xLot_no', function(){
          $('#tableBody').empty();      
          $('#tableBody').html(tablebody);
          $("select").select2();
          /*calculate_meter();*/
          $(this).focus();      
    });
    $('body').on('change','.xProcess', function(){
          let lot_no=$('.xLot_no').val(); 
          let s_process=$(this).val();
          let data={lot_no:lot_no,process:s_process}
          $('#tableBody').empty();
          if(s_process==2){
            $('#tableBody').html(tablebody);
            $('#tr1').before(trappnode);
          }else{
            $('#tableBody').html(tablebody);
          }
          $("select").select2();
          $('#tr1').find('.sDesign').attr('id','design');
          $(this).focus();  
          $.ajax({
              url: "<?php echo base_url('Process/get_design'); ?>",
              type: "POST",
              data:data,          
              success: function(data){
                var data  = JSON.parse(data);                                          
                      if(data.status=="success"){
                          $('.xPand_val').val(data.balance.process_val);
                          $('.sDesign').append('<option value="0">None</option>');
                          $.each(data.design,function(key,value)
                          { 
                            $('.sDesign').append('<option value=' + value.design_id+ '>' + value.design + '</option>');
                          });
                          calculate_meter();
                      }
              }
          });     
    });
    $('body').on('change','.sDesign', function(){
          let design=$(this).val();
          let tr=$(this).parents('tr').attr('id');
          let obj=$(this).parents('tr');
          let s_process=$('.xProcess').val();
          let data= {s_process:s_process,design:design}
          $(".sDesign").each(function() {
              find_tr=$(this).parents('tr').attr('id');
              if(find_tr==tr){
              }else{
                $('#'+find_tr).find('.sDesign option[value='+design+']').remove();
              }
          });
          $.ajax({
              url: "<?php echo base_url('Process/design_row'); ?>",
              type: "POST",
              data:data,          
              success: function(data){
                var data  = JSON.parse(data);                                          
                if(data.status=="success"){
                    obj.find('.sColor').val(data.datail.color);
                    obj.find('.sD_Pcs').val(data.datail.pcs);                         
                    obj.find('.sPatla').html('<option value=' + data.datail.patla_id+ '>' +data.datail.p_name  + '</option>');
                    calculate_meter();
                }
              }
          }); 
    });
    $('body').on('keyup','.sD_Pcs', function(e){
          calculate_meter();
    }); 
    $('body').on('keyup','.xColth_val', function(e){
          calculate_meter();
    });
    $('body').on('click','.btn-add', function(){
          let tr=$(this).parents('tr');
          let design_no=$('#tr1').find('.sDesign').html();
          tr.before('<tr id="tr'+i+'">'+appendnode+'</tr>');
          $('select').select2();
          $('#tr'+i).find('.sDesign').focus();
          $('#tr'+i).find('.sDesign').html(design_no);
          i++;
          calculate_meter();
          return false;
    });
    $('body').on('click','.btn-remove', function(){
          var fst_tr=$(this).parents('tr').attr("id");
          if(fst_tr=="tr1"){
            return false;
          }else{
            $(this).parents('tr').remove();
          }
          calculate_meter();
          return false;
    });
    $('select').select2();
});
function calculate_meter(){
      var sub_meter = 0;
      var sub_taka = 0;
      var rowCount = $('#tableBody >tr').length;
      $('.xT_Design').val(rowCount-1);
      var D_Pcs = 0;
      $('.sD_Pcs').each(function(){
          D_Pcs += parseFloat($(this).val());        
      });
      $('.xT_Pcs').val(D_Pcs);      
      var cloth_val=parseFloat($('.xColth_val').val());
      var Pand_val=parseFloat($('.xPand_val').val());
      $('.xProcess_value').val((cloth_val+Pand_val).toFixed(2));
      var T_Pcs=parseFloat($('.xT_Pcs').val());     
      sub_total=cloth_val*T_Pcs;
      $('.xSub_Total').val(sub_total.toFixed(2));     
      tax=(sub_total*5)/100;
      $('.xTax').val(tax.toFixed(2));
      g_total=Math.round(sub_total+tax);
      $('.xGrand_Total').val(g_total.toFixed(2));
      $('form').parsley().reset();
}
</script> 