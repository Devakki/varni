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
                    <h4 class="m-t-0 header-title text-center">Update Devide</h4><br>
                    <form action="<?php echo base_url('Devide/update');?>" method="post"  class="form-horizontal" >
                          <div class="row">         
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">PATLA ACCOUNT<span class="text-danger">*</span></label>
                                <div class="col-8">
                                  <select name="patla" id="patla" class="xParty">
                                    <option value="<?php echo $patla->patla_id; ?>"><?php echo $patla->patla_name; ?></option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="name" class="col-4 col-form-label">DATE<span class="text-danger">*</span></label>
                              <div class="col-8">
                                <input placeholder="dd/mm/yy" type="text" name="date" required="" class="form-control datepicker-autoclose" autocomplete="off" value="<?php echo date('d/m/Y',strtotime($devide->date)); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="name" class="col-4 col-form-label">PARTY<span class="text-danger">*</span></label>
                              <div class="col-8">

                                <select name="party" id="party" class="xParty">
                                    <option value="<?php echo $party->party_id; ?>"><?php echo $party->party_name; ?></option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
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
                                          <th scope="col" width="50%">CHALLAN</th>
                                          <th scope="col">PCS</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr id="xAppendNode">
                                          <td>
                                            <select name="challan" class="sChallan" id="challan">
                                                <option value="<?php echo $devide->cutlot_id; ?>"><?php echo $devide->cutlot_challan; ?></option>
                                            </select>
                                          <td>                                            
                                            <input type="hidden" name="devide_id" value="<?php echo $devide->devide_id;  ?>" >
                                            <input placeholder="TOTAL PCS" type="text" name="total_pcs" required="" class="form-control xtotalPcs" value="<?php echo $devide->total_pcs;  ?>" >
                                          </td>
                                        </tr>
                                    </tbody>
                                  </table>
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
    
  });
</script> 