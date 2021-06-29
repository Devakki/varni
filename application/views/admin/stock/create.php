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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Stock/index');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title text-center">Add Stock</h4><br>
                    <form action="<?php echo base_url('Stock/create');?>" method="post"  class="form-horizontal" >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">PARTY<span class="text-danger">*</span></label>
                                    <div class="col-8">
                                        <select name="party" id="party" data-parsley-min="1" data-parsley-min-message="Select AtList One">
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
                                        <select name="item" id="item" data-parsley-min="1" data-parsley-min-message="Select AtList One" >
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
                                    <label for="name" class="col-4 col-form-label">TRANSPORT<span class="text-danger">*</span></label>
                                    <div class="col-8">
                                        <select name="transport" id="transport" data-parsley-min="1" data-parsley-min-message="Select AtList One">
                                          <option value="0">None</option>
                                          <?php foreach ($transport as $key => $value): ?>
                                              <option value="<?php echo $value->transport_id; ?>"><?php echo $value->transport_name; ?></option>
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
                                    <label for="name" class="col-4 col-form-label">DO NO<span class="text-danger">*</span></label>
                                    <div class="col-8">
                                        <input placeholder="CHALLON NO" type="text" name="challan_no" required="" id="challan_no" class="form-control" autocomplete="off">
                                        <input type="hidden" id="exist">
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
                                        <th scope="col">LR NO</th>
                                          <th scope="col">BALA NO</th>
                                          <th scope="col">MTR</th>
                                          <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr id="xAppendNode">
                                          <td>
                                            <input type="text" name="lr_no[]" class="form-control lr_no"             placeholder="LR NO" required >
                                          </td>
                                          <td>
                                            <input type="number" name="bala_no[]" class="form-control bala_no"    placeholder="BALA NO" required >
                                          </td>
                                          
                                          <td>
                                            <input type="number" name="mtr[]" class="form-control mtr" step="any" placeholder="MTR" required >
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
                                    <label for="name" class="col-4 col-form-label">TOTAL BALA</label>
                                    <div class="col-8">
                                        <input placeholder="TOTAL BALA" type="number" name="t_bala" required="" class="form-control xTotalbala" readonly autocomplete="off" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">TOTAL MTR</label>
                                    <div class="col-8">
                                        <input placeholder="TOTAL MTR" type="number" step="any" name="t_mtr" required="" class="form-control xTotalmeter"  readonly autocomplete="off">
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
    $('.mtr').each(function(i, obj) {
      sub_meter += ($(obj).val() * 1);
    });
    $('.xTotalmeter').val(sub_meter.toFixed(2));
}
function validateForm(){
    let party=$("#party").val();
    let item=$("#item").val();
    if(party=="0"){
      $(this).val('');
      $("#party").focus();
      return false;
    }
    var val=$('#exist').val();
    if(val=="1"){
      return true;      
    }else{
      $("#challan_no").focus();
      return false;
    }
  }
$(document).ready(function() {
    $('form').parsley();
    $('select').select2();
    var i=2;
    let appendnode=$('#xAppendNode').html();
    $('#xAppendNode').attr("id", "tr1");
    $('body').on('click','.btn-add', function(){
      let tr=$(this).parents('tr');

      tr.before('<tr id="tr'+i+'">'+appendnode+'</tr>');
      let bala_no=parseFloat($('#tr'+i).prev().find('.bala_no').val());
      $('#tr'+i).find('.bala_no').val(bala_no+1);
      let mtr=$('#tr'+i).prev().find('.mtr').val();
      $('#tr'+i).find('.mtr').val(mtr);
      let lr_no=$('#tr'+i).prev().find('.lr_no').val();
      $('#tr'+i).find('.lr_no').val(lr_no);
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
    $('body').on('keyup','.bala_no', function(){
        calculate();
    });
    $('body').on('keyup','.mtr', function(){
        calculate();
    });
    $('body').on('keyup','.lr_no', function(){
        calculate();
    });
    $('#challan_no').keyup(function() {
        let value=$(this).val();
        let party=$("#party").val();
        let item=$("#item").val();
        if(party=="0"){
          $(this).val('');
          $("#party").focus();
          return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Stock/check_challan')?>",
            data: {party:party,challan_no:value},
            success: function(data){
              var data  = JSON.parse(data);
              console.log(data);                                          
              if(data.status=="success")
              {
                $("#exist").val("1");
                $("#challan_no").removeClass("has-error"); 
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
                $("#challan_no").addClass("has-error");               
              }
            } 
        });
    });
});
</script> 