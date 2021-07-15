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
                    <h4 class="m-t-0 header-title text-center">Add Devide</h4><br>
                    <form action="<?php echo base_url('Packing/create');?>" method="post"  class="form-horizontal" >
                        <div class="row">         
                                         
                         <div class="col-md-6 ">
                             
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
                             
                          
                          </div>  
                          <div class="col-md-6 ">
                             
                             
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
                         
                         </div>                 
                         
                      </div>
                      <div class="row m-t-50">
                            <div class="col-md-12">
                                <div style="overflow-x:auto;">
                                  <table class="table" style="min-width: 1080px;">
                                    <thead>
                                        <tr>
                                          <th scope="col">BALA NO</th>
                                          <th scope="col">cut</th>
                                          <th scope="col">pcs</th>
                                          <th scope="col">mno</th>
                                          <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr id="xAppendNode">
                                         
                                          <td>
                                            <input type="number" name="bala_no[]" class="form-control bala_no"    placeholder="BALA NO" required >
                                          </td>
                                          
                                          <td>
                                            <input type="number" name="cut[]" class="form-control cut" step="any" placeholder="cut" required >
                                          </td>
                                          
                                          <td>
                                            <input type="number" name="pcs[]" class="form-control pcs" step="any" placeholder="pcs" required >
                                          </td>
                                          
                                          <td>
                                            <input type="text" name="mno[]" class="form-control mno" step="any" placeholder="mno" required >
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
                                    <label for="name" class="col-4 col-form-label">TOTAL BALA</label>
                                    <div class="col-8">
                                        <input placeholder="TOTAL BALA" type="number" name="t_bala" required="" class="form-control xTotalbala" readonly autocomplete="off" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">TOTAL PCS</label>
                                    <div class="col-8">
                                        <input placeholder="TOTAL pcs" type="number" step="any" name="t_pcs" required="" class="form-control xpc"  readonly autocomplete="off">
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
function calculate(){
    var rowCount = $('#myTable >tr').length;
    rowCount=rowCount-1;
    $('.xTotalbala').val(rowCount);
    var sub_meter = 0;
    $('.pcs').each(function(i, obj) {
      sub_meter += ($(obj).val() * 1);
    });
    $('.xpc').val(sub_meter.toFixed(2));
}
$(document).ready(function() {
    $('form').parsley();
    $('select').select2();
    $('body').on('keyup','.xPcs', function(e){
          $('.xCTotal_pcs').val($(this).val()); 
    });
    let appendnode=$('#xAppendNode').html();
    var i=2;
    $('#xAppendNode').attr("id", "tr1");
    $('body').on('click','.btn-add', function(){
      let tr=$(this).parents('tr');

      tr.before('<tr id="tr'+i+'">'+appendnode+'</tr>');
      let bala_no=parseFloat($('#tr'+i).prev().find('.bala_no').val());
      $('#tr'+i).find('.bala_no').val(bala_no+1);
      let cut=$('#tr'+i).prev().find('.cut').val();
      $('#tr'+i).find('.cut').val(cut);
      let mno=$('#tr'+i).prev().find('.mno').val();
      $('#tr'+i).find('.mno').val(mno);
      $('.datepicker-autoclose').datepicker({
          autoclose: true,
          todayHighlight: true,
          format: 'dd/mm/yyyy'
      });
      $('#tr'+i).find('.bala_no').focus();
      calculate();
      i++;
      return false;
    });
    $('body').on('click','.btn-remove', function(){
      var fst_tr=$(this).parents('tr').attr("id");
      if(fst_tr=="tr1"){
        return false;
      }else{
        $(this).parents('tr').remove();
        calculate();
      }
      return false;
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
            url:"<?php echo base_url('devide/get_challan/') ?>",
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
              url:"<?php echo base_url('Devide/totalpcs/')?>"+lot_no+"",
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
    $('body').on('keyup','.bala_no', function(){
        calculate();
    });
    $('body').on('keyup','.pcs', function(){
        calculate();
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