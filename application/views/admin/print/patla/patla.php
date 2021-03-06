<style type="text/css">
    .restable{
        width: 100%; 
        min-width: 720px;   
    }
    .divscroll{
        overflow-x: auto;
    }
    @media print {
        .header-title {
          font-size: 15px;
        }
    }
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
          padding: 4px 8px;
    }
    @media print {
       .table thead th {
           border: 1px solid #0c0c0c !important;
         }
        .table-bordered td, .table-bordered th {
            border: 1px solid #0c0c0c !important;
        }
        .table thead th {
            border: 1px solid #0c0c0c !important;
          }
        .table-bordered td, .table-bordered th {
             border: 1px solid #0c0c0c !important;
             font-size: 15px;
        }
    }
    .table thead th {
           border: 1px solid #0c0c0c !important;
     }
    .table-bordered td, .table-bordered th {
        border: 1px solid #0c0c0c !important;
    }
    .table thead th {
        border: 1px solid #0c0c0c !important;
      }
    .table-bordered td, .table-bordered th {
         border: 1px solid #0c0c0c !important;
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('PrintAll/patla');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="m-t-0 m-b-20 header-title text-center">Patla</h4>
                        </div>
                        <div class="col-md-12">
                            <form method="get" action="<?php echo base_url("PrintAll/patla")?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Patla</label>
                                            <div class="col-sm-9">
                                              <select name="patla">
                                                  <?php foreach ($patla as $key => $value):?>
                                                  <option value="<?php echo $value->patla_id; ?>"   <?php echo (($display)?(($value->patla_id==$edit_patla)?"selected":"") :"") ; ?> ><?php echo $value->patla_name; ?></option>
                                                  <?php endforeach; ?>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Date</label>
                                            <div class="col-sm-1">
                                                <div class="form-check form-check-inline">
                                                    <input id="checkbox11" class="form-check-input" type="checkbox">
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                    <div class="input-daterange input-group" id="date-range">
                                                        <input type="text" autocomplete="off" class="form-control" name="start" value="<?php echo ((isset($start) && !empty($start))?$start:date('d/m/Y',strtotime('-1 month'))); ?>">
                                                        <input type="text" autocomplete="off" class="form-control" name="end" value="<?php echo ((isset($end) && !empty($end))?$end:date('d/m/Y')); ?>">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary btn-bordered waves-effect w-md waves-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if($display):?>
                    <div class="row m-t-50">
                        <div class="col-md-12 divscroll">
                            <h4 class="m-t-10 header-title text-center">Devide Process</h4>
                            <?php if(isset($devide) && !empty($devide)) :?>
                            <table class="table text-center table-bordered m-t-0 restable" >
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Inv No</th> 
                                        <th>Challan No</th>   
                                        <th>Date</th>
                                        <th>Patla</th>
                                        <th>Devide Pcs</th>
                                    </tr>                                  
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($devide as $key => $value):?>
                                    <tr>
                                        <?php
                                            $devide_pcs[]=$value->total_pcs;
                                        ?>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->challan_no; ?></td>
                                        <td><?php echo $value->cutlot_challan; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value->date)); ?></td>
                                        <td><?php echo $value->patla_name; ?></td>
                                        <td><?php echo $value->total_pcs;  ?></td>
                                    </tr> 
                                    <?php $i++; endforeach;?>
                                    <tr>
                                        <td colspan="5"><b>Total</b></td>
                                        <td><?php echo array_sum($devide_pcs);  ?></td>
                                    </tr> 
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h4 class="m-t-10 header-title text-center">N-A</h4>
                        <?php endif; ?>
                        </div>
                        <div class="col-md-12 divscroll">
                            <h4 class="m-t-10 header-title text-center">Return Process</h4>
                            <?php if(isset($returndevide) && !empty($returndevide)) :?>
                            <table class="table text-center table-bordered m-t-0 restable" >
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Inv No</th>  
                                        <th>Challan No</th>  
                                        <th>Date</th>
                                        <th>Patla</th>
                                        <th>Pcs</th>
                                        <th>M Pcs</th>
                                        <th>Rate</th>
                                        <th>Total</th>
                                    </tr>                                  
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($returndevide as $key => $value):?>
                                    <tr>
                                        <?php
                                           $returndevide_pcs[]=$value->total_pcs;
                                           $returndevide_mpcs[]=$value->miss_pcs;
                                           $returndevide_g_total[]=$value->g_total;
                                        ?>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->challan_no; ?></td>
                                        <td><?php echo $value->devide_challan_no; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value->date)); ?></td>
                                        <td><?php echo $value->patla_name; ?></td>
                                        <td><?php echo $value->total_pcs;  ?></td>
                                        <td><?php echo $value->miss_pcs;  ?></td>
                                        <td><?php echo number_format($value->rate,1);  ?></td>
                                        <td><?php echo number_format($value->g_total,1);  ?></td>
                                    </tr> 
                                    <?php $i++; endforeach;?>
                                    <tr>
                                        <td colspan="5"><b>Total</b></td>
                                        <td><?php echo array_sum($returndevide_pcs);  ?></td>
                                        <td><?php echo array_sum($returndevide_mpcs);  ?></td>
                                        <td></td>
                                        <td><?php echo number_format(array_sum($returndevide_g_total),1);  ?></td>
                                    </tr> 
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h4 class="m-t-10 header-title text-center">N-A</h4>
                        <?php endif; ?>
                        </div><div class="col-md-12 divscroll">
                            <h4 class="m-t-10 header-title text-center">Color </h4>
                            <?php if(isset($color) && !empty($color)) :?>
                            <table class="table text-center table-bordered m-t-0 restable" >
                                <thead>
                                    <tr>
                                        <th>No</th>  
                                        <th>Inv No</th>
                                        <th>Date</th>
                                        <th>Patla</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>                                  
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($color as $key => $value):?>
                                    <tr>
                                        <?php
                                           $color_qty[]=$value->total_qty;
                                           $color_total[]=$value->total;
                                        ?>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->challan_no; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($value->date)); ?></td>
                                        <td><?php echo $value->patla_name; ?></td>
                                        <td><?php echo $value->total_qty; ?></td>
                                        <td><?php echo number_format($value->total,2);  ?></td>
                                    </tr> 
                                    <?php $i++; endforeach;?>
                                    <tr>
                                        <td colspan="4"><b>Total</b></td>
                                        <td><?php echo array_sum($color_qty);  ?></td>
                                        <td><?php echo number_format(array_sum($color_total),2);  ?></td>
                                    </tr> 
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h4 class="m-t-10 header-title text-center">N-A</h4>
                        <?php endif; ?>
                        </div>
                        <div class="col-md-12 text-center m-t-20">
                           <a href="<?php echo $button;?>" target="_blank"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="mdi mdi-printer"></i> </button></a> 
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> 
</div> 
<script type="text/javascript">
$(document).ready(function() {
    jQuery('#date-range').datepicker({
        toggleActive: true,
        autoclose: true,
        format: 'dd/mm/yyyy'
    });
    var date=$('#date-range').html();
    $('#date-range').empty();
    var lot=$('#setlot').html();
    $('#setlot').empty();
    $('.Lotselect').change(function() {             
        if ($(this).is(':checked')) {
            $("#setlot").html(lot);
            $('select').select2();                  
        }
        if (!$(this).is(':checked')) {
            $('#setlot').empty();
        }
    });
    $('#checkbox11').change(function() {
        if ($(this).is(':checked')) {
            $("#date-range").html(date);
            jQuery('#date-range').datepicker({
                toggleActive: true,
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
        }
        if (!$(this).is(':checked')) {
            $("#date-range").empty();
        }
    });
    $('select').select2();
});
</script>
               