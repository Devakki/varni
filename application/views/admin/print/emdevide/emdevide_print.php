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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('PrintAll/emdevide');?>"><?php echo $page_title; ?></a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card-box">
                    <?php if($display):?>
                    <div class="row m-t-50">
                        <div class="col-md-12 divscroll">
                            <?php if($display):?>
                            <div class="row m-t-0">
                                <div class="col-md-12 divscroll">
                                    <?php if(isset($em_devide) && !empty($em_devide)) :?>
                                    <h4 class="m-t-10 header-title text-center">Em Devide  &nbsp;  &nbsp; <?php echo $emuser_name->em_name; ?></h4>
                                    <table class="table text-center table-bordered m-t-0 restable" >
                                        <thead>
                                            <tr>
                                                <th>No</th> 
                                                <th>Challan No</th>   
                                                <th>Lot No</th>
                                                <th>Date</th>
                                                <th>Design</th>
                                                <th>Color</th>
                                                <th>Pcs</th>
                                            </tr>                                  
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($em_devide as $key => $value):?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->challan_no; ?></td>
                                                <td><?php echo LOT.$value->lot_no; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($value->date)); ?></td>
                                                <td><?php echo $value->n_design; ?></td>
                                                <td><?php echo $value->color;  ?></td>
                                                <td><?php $pcs[]=$value->pcs; echo $value->pcs;  ?></td>
                                            </tr> 
                                            <?php $i++; endforeach;?>
                                            <tr>
                                              <td colspan="6"></td>
                                              <td><?php echo array_sum($pcs); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <h4 class="m-t-10 header-title text-center">N-A</h4>
                                <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
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
    window.print();
});
</script>
               